<?php

/**
 * 
 * 用户中心控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */

class UserController extends FrontBase
{
	
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'MyCaptchaAction',
						'backColor'=>0xCCCCCC,  //背景色
						'foreColor'=> 0x3C5880,	//前景色
						'fontFile' => $this->_webRoot.'/static/public/fonts/maturasc.ttf', //自定义字体
						'padding'=>0,
						'width' => 90,
						'height'=>30,
						'minLength'=>6,
						'maxLength'=>6,
						'testLimit'=>0,   //不限制输错次数
						'offset' => 2,    //字符间距
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}
	

	/**
	 * 个人中心
	 *
	 */
	public function actionIndex()
	{
		$this->_seoTitle = Yii::t('common','User Center').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	
		$this->render('index');
	}
	
	

	/**
	 * 编辑资料
	 *
	 */
	public function actionEdit()
	{
		$this->_seoTitle = Yii::t('common','Edit User').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	
		$this->render('edit');
	}
	
	/**
	 * 登录
	 * 
	 */
	public function actionLogin()
	{
		//登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->redirect(Yii::app()->homeUrl);
			exit;
		}
		//获取登录前的URL
		if (!empty($_GET['ret_url']))
		{
			$ret_url = trim($_GET['ret_url']);
		}
		else
		{
			if (isset($_SERVER['HTTP_REFERER']))
			{
				$ret_url = $_SERVER['HTTP_REFERER'];
			}
			else
			{
				$ret_url = Yii::app()->user->returnUrl;
			}
		}
		/* 防止登陆成功后跳转到登陆、退出的页面 */
		$ret_url = strtolower($ret_url);
		if (str_replace(array('user/login', 'user/logout', 'user/register'), '', $ret_url) != $ret_url)
		{
			$ret_url = Yii::app()->user->returnUrl;
		}
	
		$this->layout = false;
		$model=new FloginForm;
	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	
		// collect user input data
		if(isset($_POST['FloginForm']))
		{
			$model->attributes=$_POST['FloginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->message('success','登录成功',$_POST['ret_url']);
				//$this->redirect($ret_url);
			}
		}
		//set seo
		$this->_seoTitle = '登录 - '.$this->_setting['site_name'];
		$this->_seoKeywords = '登录';
		$this->_seoDescription = '登录';
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/login.css");
	
		// display the login form
		$this->render('login',array('model'=>$model,'ret_url'=>$ret_url));
	}
	
	/**
	 * 退出
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * 注册
	 */
	public function actionRegister(){
	
		//登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->redirect(Yii::app()->homeUrl);
			exit;
		}
		$this->layout = false;
		$model=new RegisterForm();
		$userModel = new User();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	
		// collect user input data
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
				
			$userModel->username = $model->username;
			$userModel->password = $model->password;
			$userModel->email = $model->email;
			$userModel->status = -1; //待审核，要验证邮箱
			$userModel->groupid = 1;
			// validate user input and redirect to the previous page if valid
			if($userModel->save()){
				$this->activeAccount(array('id'=>$userModel->uid, 'email'=>$userModel->email, 'username'=>$userModel->username));
				$this->message('success','注册成功, 请登录您的邮箱进行账号激活！', $this->createUrl('login'), 5);
			}else{
				$this->message('error','注册失败', $this->createUrl('register'));
			}
		}
		//set seo
		$this->_seoTitle = '注册新用户 - '.$this->_setting['site_name'];
		$this->_seoKeywords = '注册新用户';
		$this->_seoDescription = '注册新用户';
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/register.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.mailAutoComplete-4.0.js", CClientScript::POS_END);
	
		$this->render('register',array('model'=>$model));
	}
	/**
	 * 账号激活
	 * @param unknown $params
	 */
	public function activeAccount($params = array())
	{
		//生成校验字符串
		if(!$params['id'] || !$params['username'] || !$params['email']){
			return false;
		}
		$safestr = Yii::app ()->params ['safestr'];  //安全分隔符
		$salt = base64_encode(mt_rand(0,time()));  //随机盐
		$authcode = crypt($params['id'].$safestr.$params['email'], $salt);
		$authurl = $this->_request->hostInfo.$this->createUrl('authEmail', array('id'=>$params['id'], 'authcode'=>$authcode));
		$subject = $this->_setting['site_name'].' 账号激活';
		$message = Yii::t('common','Register Email',
				array('{username}'=>$params['username'],
						'{sitename}'=>$this->_setting['site_name'],
						'{authurl}'=>$authurl,
						'{admin_email}'=>$this->_setting['admin_email']));
		Helper::sendMail(0, $params['email'], $subject, $message);
	
	}
	/**
	 * 验证账号激活邮件
	 */
	public function actionAuthEmail(){
		$id = $this->_request->getParam('id');
		$user = User::model()->findByPk($id);
		if(!$user){
			$this->message('error','验证用户不存在', $this->createUrl('site/index'),0, true);
		}
		if((time()-$user->addtime)/3600 > 2){
			//超过2小时视为过期
			$this->message('error','链接已失效！', $this->createUrl('site/index'),0, true);
		}
		$safestr = Yii::app ()->params ['safestr'];  //安全分隔符
		$email = $user->email;
		$authcode = $this->_request->getParam('authcode');
		if(crypt($id.$safestr.$email, $authcode) == $authcode){
			//验证通过
			$user->status = 1;
			$user->save();
			$this->message('success','验证通过，您的账号已激活。', $this->createUrl('login'));
		}else{
			$this->message('error','验证失败，请重新发送邮件。', $this->createUrl('register'));
		}
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}
