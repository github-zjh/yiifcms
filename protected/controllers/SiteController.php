<?php
/**
 * 默认前端控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SiteController extends FrontBase
{
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		//首页banner幻灯片
		$banner = Ad::model()->findAll('position_id=:pid', array(':pid'=>1));
		//SEO
		$this->_seoTitle = $this->_setting['seo_title'];	
		$this->_seoKeywords = $this->_setting['seo_keywords'];
		$this->_seoDescription = $this->_setting['seo_description'];
		
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/index.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		
		//友情链接
		$links = Link::model()->findAll("logo !=''", array('order'=>'sortorder ASC, id DESC'));
		$this->render('index',array('banner'=>$banner,'links'=>$links));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				//加载css,js
				Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/error.css");	
				Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
				
				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/contact.css");
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * 登录
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
		if (str_replace(array('site/login', 'site/logout', 'site/register'), '', $ret_url) != $ret_url)
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
	    $authurl = $this->_request->hostInfo.$this->createUrl('site/authEmail', array('id'=>$params['id'], 'authcode'=>$authcode));
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
		if((time()-$user->addtime)/1 > 2){
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
	 * 关于我们
	 */
	public function actionAbout(){
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/about.css");
		$this->render('about');
	}

	
}