<?php

/**
 * 微信接口基类
 * 
 * @author Sim Zhao <326196998@qq.com>
 * @link www.artart.cn
 * @version v 1.0
 */

class WeiXin
{
	public  $url        = 'https://api.weixin.qq.com';
    public  $redirect_url  = '';
	public  $token      = '';
	public  $open_id    = '';
    public  $base_url   = '';   //直接尝试获取用户信息url
    public  $auth_url   = '';   //授权登录url
    public  $state      = '';   //自定义参数
    
	private $_appid     = '';
	private $_appsecret = '';
    
	
	public function __construct($app_id = '', $app_secret = '', $callback = '', $state = 0)
	{
        $this->_appid = $app_id;
        $this->_appsecret = $app_secret;
        $this->redirect_url = $callback;
        $this->state = $state;
        $this->base_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->_appid.'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_base&state='.$state.'#wechat_redirect';
        $this->auth_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->_appid.'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect';
	}

	/**
	 * 获取token令牌
	 *
	 */
	public function getToken($code = '')
	{
		$token_url = $this->url.'/sns/oauth2/access_token?appid='.$this->_appid.'&secret='.$this->_appsecret.'&code='.$code.'&grant_type=authorization_code';
		$res = file_get_contents($token_url);
		if($res) {
			$json = json_decode($res);
			$this->open_id = $json->openid;
			$this->token   = $json->access_token;
			return true;
		}
		return false;
	}
	
	/**
	 * 获取微信用户信息
	 *
	 */
	public function getUserInfo()
	{
		$user_info_url = $this->url.'/sns/userinfo?access_token='.$this->token.'&openid='.$this->open_id.'&lang=zh_CN';
		$res = file_get_contents($user_info_url);
		if($res) {
			$json = json_decode($res);
			if(!isset($json->errcode)) { //获取成功
				return $json;		
			}
		}
		return NULL;
	}

}
