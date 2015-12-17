<?php

/**
 *  人人网授权回调
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class RenrenCallBackAction extends CAction {

    public function run() {        
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/rennclient/RennClient.php");
        $config = OAuth::getConf('renren');
		$rennClient = new RennClient ( $config['app_key'], $config['app_secret'] );
		
		// 处理code -- 根据code来获得token
		if (isset ( $_REQUEST ['code'] )) {
            
			// 验证state，防止伪造请求跨站攻击
			$state = $_REQUEST ['state'];
			if (empty ( $state ) || $state !== Yii::app()->session ['renren_state']) {
				throw new CHttpException(500,'Error: Illegal Request');
			}
			unset ( Yii::app()->session ['renren_state'] );

			// 获得code
			$code = $_REQUEST ['code'];
			$redirect_uri = $config['callback'];
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
			
			// 获得保存的token
			$rennClient->authWithStoredToken ();
			// 获得用户接口
			$user_service = $rennClient->getUserService ();
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
                'type'          => 'renren', 
                'access_token'  => $access_token, 
                'openid'        => $openid,
                'uid'           => $bind ? $bind->uid : 0,
                'username'      => $user['name'],
                'avatar'        => $user['avatar'][1]['url']
            );
		    
			//绑定注册
			$this->controller->bind_register($bind, $data);

		}else{
			$this->controller->message('error', Yii::t('common','Login Failed').'(renren_x_0000)', $this->createUrl('user/login'));
		}
    }

}
