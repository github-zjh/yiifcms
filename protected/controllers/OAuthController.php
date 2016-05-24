<?php
/**
 * 第三方授权控制器
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */

/*error_reporting ( E_ALL );
ini_set ( 'display_errors', true );*/

class OAuthController extends FrontBase
{	    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'qq'              => 'QQ',              //QQ授权登录
            'qq_callback'     => 'QQCallBack',      //QQ授权回调
            
            'sinawb'          => 'Sinawb',          //新浪微博授权登录
            'sinawb_callback' => 'SinawbCallBack',  //新浪微博授权回调
            
            'renren'          => 'Renren',          //人人网授权登录
            'renren_callback' => 'RenrenCallBack',  //人人网授权回调
            
            'weixin'          => 'Weixin',          //微信授权登录
            'weixin_callback' => 'WeixinCallBack',  //微信授权回调   
        ), 'application.controllers.oauth');
        return array_merge($actions, $extra_actions);
    }

	/**
	 * 绑定注册
     * 
	 * @param $bind 是否已经绑定
	 * @param $data 接收的第三方用户数据
	 */
	public function bind_register($bind, $data=array())
    {		
		if(!$data['username']){
			throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1000)');
		}
		//初始密码
        $initPwd = substr(md5($data['username'].'_'.$data['type']), 0, 8);
		if(!$bind){
			
			//生成本地用户名
			$username = $data['username'].'_'.$data['type'];
			
			//调取不同接口
            switch($data['type']){
				case 'qq':
					$model = new OAuthQQ();
					break;
                case 'sinawb':
					$model = new OAuthSinawb();
					break;
				case 'weixin':
					$model = new OAuthWinxin();
					break;
				case 'renren':
					$model = new OAuthRenren();
					break;
				default:
					throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1001)');
			}
			$model->uid = 0; 
			$model->openid = $data['openid'];
			$model->access_token = $data['access_token'];

			//判断用户名是否已经存在
			$if_exist = User::model()->find('username=:username', array(':username'=>$username));
			if(!$if_exist){
				
				//注册本地账号
				$user_model = new User('bind_register');
				$user_model->username = $username; //分配用户名
				$user_model->password = $initPwd;				
				$user_model->avatar = $data['avatar'];     //调用空间头像(100*100)	
				$user_model->status = 1;
				$user_model->groupid = 1;
				$user_model->logins = 0;
				$user_model->register_ip = Yii::app()->request->userHostAddress;  //注册ip
				$user_model->last_login_ip = Yii::app()->request->userHostAddress;
				$user_model->username_editable = 'Y';  //允许修改用户名
				if($user_model->save()){
					$model->uid = $uid = $user_model->uid;					
					//保存第三方授权信息
					$model->save();
					
					//保存远程图片到本地
					$avatar_name = 'small_'.$user_model->uid.'_'.substr(md5(uniqid('file')), 0,11);
					$filepath = 'upload/avatar/'.date('Ym',time());
					$remote = Helper::downloadImage($data['avatar'], ROOT_PATH.'/'.$filepath, $avatar_name);
					if($remote){
						$local_avatar = $filepath.'/'.$remote['filename'];
						$bind_user = User::model()->findByPk($uid);
						$bind_user->avatar = $local_avatar;
						$bind_user->save();
					}
					
				}else{
					throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1002)');
				}	
			}else{
				$uid = $if_exist->uid;
				$model->uid = $uid;
				//保存绑定qq用户
				$model->save();
			}			
						
		}else{
			//已经绑定
			$uid = $data['uid'];
		}
		$user = User::model()->findByPk($uid);
		$username = $user->username;
		
		//自动登录
		$duration=3600*24*30; // 30 days	
		$identity = new OAuthUserIdentity($username,'');
		$identity->authenticate();
		if($identity->errorCode === OAuthUserIdentity::ERROR_NONE){
			Yii::app()->user->login($identity, $duration);
			//更新登录次数和登录ip
			$user->last_login_ip = Yii::app()->request->userHostAddress;
			$user->logins = $user->logins + 1;
			if($user->save()){
				$this->redirect(Yii::app()->homeUrl);
			}else{
				throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1003)');
			}
		}else{
			throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1004)');
		}
	}	
}
