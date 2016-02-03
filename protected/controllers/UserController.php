<?php

/**
 * 用户中心控制器
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class UserController extends FrontBase
{
	
	public $_model;	
	public $_active_need;
	
	public function init(){
		parent::init();
		//邮箱激活设置
		if($this->_setting['email_active'] == 'open'){			
			$this->_active_need = true;
		}else{			
			$this->_active_need = false;
		}
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array(
            'captcha'=>array(
                'class'=>'MyCaptchaAction',
                'backColor'=>0xCCCCCC,  //背景色
                'foreColor'=> 0x3C5880,	//前景色
                'fontFile' =>  $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
                'padding'=>0,
                'width' => 90,
                'height'=>30,
                'minLength'=>6,
                'maxLength'=>6,
                'testLimit'=>0,   //不限制输错次数
                'offset' => 2,    //字符间距
			),
        );
        $actions = $this->actionMapping(array(
            'index'       => 'Index',          //个人中心
            'setting'     => 'Setting',        //修改资料
            'settingEmail'=> 'SettingEmail',   //修改邮箱
            'settingPwd'  => 'SettingPwd',     //修改密码
            'forgetPwd'   => 'ForgetPwd',      //找回密码
            'resetPwd'    => 'ResetPwd',       //重置密码
	        'activeEmail' => 'ActiveEmail',    //重新激活邮箱
            'authEmail'   => 'AuthEmail',      //验证邮箱
            'login'       => 'Login',          //登录
            'logout'      => 'Logout',         //退出
            'register'    => 'Register',       //注册
            'space'       => 'Space',          //个人空间
            'addfriend'   => 'Addfriend',      //添加好友
            'mycollect'   => 'Mycollect',      //我的收藏
            'myattention' => 'Myattention',    //我的关注
            'mycomments'  => 'Mycomments',     //我的评论
            'myreplys'    => 'Myreplys',       //我的回复
            'myfriends'   => 'Myfriends',      //我的好友
            'cancel'      => 'Cancel',         //取消操作
            'uploadAvatar'=> 'UploadAvatar',   //上传头像
            'avatarCut'   => 'AvatarCut',      //头像剪切
        ), 'application.controllers.user');
        return array_merge($actions, $extra_actions);
    }
	
			
	/**
	 * 发送账号激活邮件
	 * @param array $params
	 */
	public function sendActiveAccount($params = array())
	{
		//生成校验字符串
		if(!$params['id'] || !$params['username'] || !$params['email']){
			return false;
		}
		$safestr = $this->_setting['safe_str'];  //安全密匙
		$important_string = $params['id'];
		$authcode = urlencode(Helper::authcode($important_string, 'ENCODE', $safestr, 3600*2)); //加密处理，2个小时过期			
		$authurl = Yii::app()->request->hostInfo.$this->createUrl('authEmail', array('authcode'=>$authcode));
		$subject = Yii::t('common','Account Active');
		$message = Yii::t('common','Register Email',
            array(
                '{username}'    => $params['username'],
                '{sitename}'    => $this->_setting['site_name'],
                '{authurl}'     => $authurl,
                '{admin_email}' => $this->_setting['admin_email']
            )
        );
		Helper::sendMail(0, $params['email'], $subject, $message);
	
	}
	
	
	/**
     * 加载model
	 * 
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			$uid = Yii::app()->user->id;
			if(isset($uid)) {
                $this->_model=User::model()->findbyPk($uid);             
            }
			if($this->_model===null) {
                throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));                    
            }
		}
		return $this->_model;
	}
	
}
