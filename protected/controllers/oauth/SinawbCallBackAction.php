<?php

/**
 *  新浪微博授权回调
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class SinawbCallBackAction extends CAction {

    public function run() {        
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/saetv2.ex.class.php");
		$config = OAuth::getConf('sinawb');		
	    $sinawb = new SaeTOAuthV2( $config['wb_akey'] , $config['wb_skey'] );
		
		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = $config['callback'];
			try {
				$token = $sinawb->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
				throw new CHttpException(500,'Error:'.$e->getMessage());
			}
		}
		if ($token) {
            Yii::app()->session['access_token'] = $access_token = $token['access_token'];
			$openid = $token['uid'];
			
            //设置cookie
			$cookie_name = 'weibojs_'.$openid;
			$cookie = new CHttpCookie($cookie_name, http_build_query($token));
			$cookie->expire = time()+60*60*24*30;  //有限期30天
			Yii::app()->request->cookies[$cookie_name]=$cookie;
            
			//获取用户信息
			$c = new SaeTClientV2( $config['wb_akey'] , $config['wb_skey'] , $access_token );
			$user_info = $c->show_user_by_id( $openid);//根据ID获取用户等基本信息
			if(isset($user_info['error']) && $user_info['error']){
				throw new CHttpException('500', Yii::t('common','Login Failed').'('.$user_info['error_code'].')');
			}
			
			//查看是否已绑定
			$bind = OAuthSinawb::model()->findByPk($openid);

			//数据
			$data = array(
                'type'          => 'sinawb', 
                'access_token'  => $access_token, 
                'openid'        => $openid,
                'uid'           => $bind ? $bind->uid : 0,
                'username'      => $user_info['screen_name'],
                'avatar'        => $user_info['avatar_large']
            );
		    
			//绑定注册
			$this->controller->bind_register($bind, $data);

		}else{
			$this->controller->message('error', Yii::t('common','Login Failed').'(sinawb_x_0000)', $this->createUrl('user/login'));
		}
    }

}
