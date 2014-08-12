<?php
/**
 * 第三方授权控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class OAuthController extends FrontBase
{	
	/**
	 * QQ授权登录
	 * when an action is not explicitly requested by users.
	 */
	public function actionQq()
	{			
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		$qc->qq_login();
	}

	/**
	 * QQ回调地址 
	 *
	 */
	public function actionQq_callback()
	{
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		$access_token = $qc->qq_callback();
		$openid = $qc->get_openid();
		$qc = new QC($access_token, $openid);
		$user_info = $qc->get_user_info();
		//查看是否已绑定
		$bind = OAuthQQ::model()->findByPk($openid);

		//数据
		$data = array(
				'type'=>'qq', 
				'access_token'=>$access_token, 
				'openid'=>$openid,
				'uid'=>$bind?$bind->uid:0,
				'username'=>$user_info['nickname'],
				'avatar'=>$user_info['figureurl_2']
		);
		
		//绑定注册
		$this->bind_register($bind, $data);
				
	}

	/**
	 * 新浪微博授权登录
	 * sinawb login
	 */
	public function actionSinawb(){
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/config.php");
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/saetv2.ex.class.php");

	    $sinawb = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
		$code_url = $sinawb->getAuthorizeURL( WB_CALLBACK_URL );
		$this->redirect($code_url);
	}
	
	/**
	 * 新浪微博回调地址
	 * sinawb login
	 */
	public function actionSinawb_callback(){
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/config.php");
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/saetv2.ex.class.php");

	    $sinawb = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
        
		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
				$token = $sinawb->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
				throw new CHttpException(500,$e->getMessage());
			}
		}

		if ($token) {
			$access_token = Yii::app()->session['access_token'] = $token['access_token'];
			$openid = $token['uid'];
			//设置cookie
			$cookie_name = 'weibojs_'.$openid;
			$cookie = new CHttpCookie($cookie_name, http_build_query($token));
			$cookie->expire = time()+60*60*24*30;  //有限期30天
			Yii::app()->request->cookies[$cookie_name]=$cookie;
            
			//获取用户信息
			$user_info = $sinawb->get('https://api.weibo.com/2/users/show.json', array('uid'=>$openid, 'access_token'=>$access_token));

			//查看是否已绑定
			$bind = OAuthSinawb::model()->findByPk($openid);

			//数据
			$data = array(
					'type'=>'sinawb', 
					'access_token'=>$access_token, 
					'openid'=>$openid,
					'uid'=>$bind?$bind->uid:0,
					'username'=>$user_info['screen_name'],
					'avatar'=>$user_info['avatar_large']
					);
			//绑定注册
			$this->bind_register($bind, $data);

		}else{
			throw new CHttpException(500,Yii::t('common','Login Failed').'(1000)');
		}
	}

	/**
	 *
	 * 绑定注册
	 * @param $bind 是否已经绑定
	 * @param $data 接收的第三方用户数据
	 *
	 */
	public function bind_register($bind, $data=array()){
		
		//初始密码
		$initPwd = ' ';
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
					throw new CHttpException(500,Yii::t('common','Login Failed').'(1000)');
					break;
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
				$user_model->last_login_ip = $this->getClientIP();
				$user_model->username_editable = 'Y';  //允许修改用户名
				if($user_model->save()){
					$model->uid = $uid = $user_model->uid;
					//保存第三方授权信息
					$model->save();
				}else{
					throw new CHttpException(500,Yii::t('common','Login Failed').'(1001)');
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
			$user->last_login_ip = $this->getClientIP();
			$user->logins = $user->logins + 1;
			if($user->save()){
				$this->redirect(Yii::app()->homeUrl);
			}else{
				throw new CHttpException(500,Yii::t('common','Login Failed').'(1003)');
			}
		}else{
			throw new CHttpException(500,Yii::t('common','Login Failed').'(1004)');
		}

	
	}	
	
}
