<?php
/**
 * 第三方授权控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */

/*error_reporting ( E_ALL );
ini_set ( 'display_errors', true );*/

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
				throw new CHttpException(500,'Error:'.$e->getMessage());
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
			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $access_token );
			$user_info = $c->show_user_by_id( $openid);//根据ID获取用户等基本信息
			if($user_info['error']){
				throw new CHttpException('500', Yii::t('common','Login Failed').'('.$user_info['error_code'].')');
			}
			
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
			$this->message('error', Yii::t('common','Login Failed').'(sinawb_x_0000)', $this->createUrl('user/login'));
		}
	}
	
	/**
	 * 人人网授权登录
	 * sinawb login
	 */
	public function actionRenren(){
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/config.php");
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/rennclient/RennClient.php");

		$rennClient = new RennClient ( APP_KEY, APP_SECRET );
		// 生成state并存入SESSION，以供CALLBACK时验证使用
		$state = uniqid ( 'renren_', true );
		Yii::app()->session['renren_state'] = $state;

		// 得认证授权的url
		$code_url = $rennClient->getAuthorizeURL ( CALLBACK_URL, 'code', $state );
		$this->redirect($code_url);
	}
	
	/**
	 * 人人网回调地址
	 * sinawb login
	 */
	public function actionRenren_callback(){
	
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/config.php");
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/rennclient/RennClient.php");
		$rennClient = new RennClient ( APP_KEY, APP_SECRET );
		
		// 处理code -- 根据code来获得token
		if (isset ( $_REQUEST ['code'] )) {

			$keys = array ();
			// 验证state，防止伪造请求跨站攻击
			$state = $_REQUEST ['state'];
			if (empty ( $state ) || $state !== Yii::app()->session ['renren_state']) {
				throw new CHttpException(500,'Error: Illegal Request');
			}
			unset ( Yii::app()->session ['renren_state'] );

			// 获得code
			$code = $_REQUEST ['code'];
			$redirect_uri = CALLBACK_URL;
			try {				
				// 根据code来获得token
				$token = $rennClient->authWithAuthorizationCode ( $code, $redirect_uri);
			} catch ( RennException $e ) {
				throw new CHttpException(500,'Error:'.$e->getMessage());
			}
		}else{
			throw new CHttpException(500,'Auth Failed');
		}
		if ($token) {
		
			$renn_client = new RennClient ( APP_KEY, APP_SECRET );

			// 获得保存的token
			$renn_client->authWithStoredToken ();
			// 获得用户接口
			$user_service = $renn_client->getUserService ();
			// 获得用户信息
			$user = $user_service->getUser (null);
			if(!$user){
				throw new CHttpException('500', Yii::t('common','Login Failed').'(get userinfo failed)');
			}
            // 获取accessToken
			$access_token = $token->accessToken;
			$openid = $user['id'];
			
			//查看是否已绑定
			$bind = OAuthRenren::model()->findByPk($openid);

			//数据
			$data = array(
					'type'=>'renren', 
					'access_token'=>$access_token, 
					'openid'=>$openid,
					'uid'=>$bind?$bind->uid:0,
					'username'=>$user['name'],
					'avatar'=>$user['avatar'][1]['url']
					);
		    
			//绑定注册
			$this->bind_register($bind, $data);

		}else{
			$this->message('error', Yii::t('common','Login Failed').'(renren_x_0000)', $this->createUrl('user/login'));
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
		
		if(!$data['username']){
			throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1000)');
		}


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
					throw new CHttpException(500,Yii::t('common','Login Failed').'(bind_x_1001)');
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
				$user_model->register_ip = $this->_request->userHostAddress;  //注册ip
				$user_model->last_login_ip = $this->_request->userHostAddress;
				$user_model->username_editable = 'Y';  //允许修改用户名
				if($user_model->save()){
					$model->uid = $uid = $user_model->uid;
					
					//保存第三方授权信息
					$model->save();
					
					//保存远程图片到本地
					$avatar_name = 'small_'.$user_model->uid.'_'.substr(md5(uniqid('file')), 0,11);
					$filepath = 'uploads/avatar/'.date('Ym',time());
					$remote = Helper::downloadImage($data['avatar'], WWWPATH.'/'.$filepath, $avatar_name);
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
			$user->last_login_ip = $this->_request->userHostAddress;
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
