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
		//基本资料
		$uid = Yii::app()->user->id;
		$profile = User::model()->findByPk($uid);		
		$this->render('index', array('profile'=>$profile));
	}
	
	/**
	 * 用户设置
	 * @param string $setting
	 */	
	public function actionSetting()
	{		
		
		$this->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Base Profile').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/jquery.Jcrop.min.css");		
		
	    $model = $this->loadModel();	    
	    $old_avatar = $model->avatar;	   
	  	    
	    if(isset($_POST['User'])){
	    	$model->attributes = $_POST['User'];
	    	//把确定上传的头像重命名
	    	$new_avatar =  str_replace('old_','',$model->avatar);	 
	    	@rename($model->avatar,$new_avatar);
	    	$model->avatar = $new_avatar;    		    	
	    	if($model->save()){	    	
	    		if($old_avatar != $model->avatar){
	    			XUpload::deleteFile($old_avatar);	    		   			
	    		}	
	    		//删除游离的图片
	    		$avatar_path =  'uploads/avatar';
	    		$old_files = Helper::scanfDir($avatar_path, true);	    		
	    		foreach((array)$old_files['files'] as $old){		    			    			  			
	    			$path_parts = pathinfo ( $old );
    				if (! strstr ( $path_parts ['basename'], $model->uid.'_old_' )) {
    					continue;
    				}
    				XUpload::deleteFile($old);	    			
	    		}	   		  
	    		$this->redirect($this->createUrl('index'));
	    	}
	    }
		$this->render('setting_profile', array('model'=>$model));
	}
	
	/**
	 * 修改邮箱
	 * @param string $setting
	 */
	public function actionSettingEmail()
	{
		$this->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Email').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		$model = $this->loadModel();	
		
		if($this->_request->isPostRequest){	
			//发送验证码		
			$reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
			if($_POST['ajax'] == 'edit_form'){
				
				//ajax 请求
				$initemail = trim($_POST['initemail']);
				if($initemail != $model->email){
					exit( CJSON::encode( array ( 'status' => 'error' , 'field'=>'initEmail', 'message' => Yii::t('common','Please Input Right Init Email') ) ) );
				}else{
					$email = trim($_POST['email']);				
					if($email && preg_match($reg, $email)){
						if($email == $model->email){
							//新邮箱和旧邮箱相同
							exit( CJSON::encode( array ( 'status' => 'error' ,  'field'=>'newEmail', 'message' => Yii::t('common','Please Input Different Email') ) ) );
						}
						$exit_email = User::model()->find('email=:email', array(':email'=>$email));
						if(!$exit_email){
							//校验邮箱唯一性
							$acceptCaptcha = Yii::app()->session[$email.'_captcha'] = substr(mt_rand(0,time()),2,6);
							$subject = Yii::t('common','Reset Email Subject');
							$message = Yii::t('common','Reset Email Content', array('{username}'=>$model->username, '{email_captcha}'=>$acceptCaptcha,'{admin_email}'=>$this->_setting['admin_email']));
							Helper::sendMail(0, $email, $subject, $message);			
							exit( CJSON::encode( array ( 'status' => 'success' , 'message' => Yii::t('common','Send Success') ) ) );
						}else{
							exit( CJSON::encode( array ( 'status' => 'error' , 'field'=>'newEmail', 'message' => Yii::t('common','Existing Email') ) ) );
						}
					}else{
						exit( CJSON::encode( array ( 'status' => 'error' , 'field'=>'newEmail', 'message' => Yii::t('common','Please Input Right New Email') ) ) );					
					}		
				}			
			}else{
			
				$post = array_map('trim', $_POST);
				$initemail = $post['initEmail'];
				$newemail = $post['newEmail'];
				$captcha = $post['captchaEmail'];
				if($initemail != $model->email){
					$model->addError('email',Yii::t('common','Please Input Right Init Email'));
				}else{
					
					if(!$newemail || !preg_match($reg, $newemail)){
						$model->addError('email',Yii::t('common','Please Input Right New Email'));
					}else{
						if($newemail == $model->email){
							//校验邮箱唯一性
							$model->addError('email',Yii::t('common','Please Input Different Email'));
						}else{
							$acceptCaptcha = Yii::app()->session[$newemail.'_captcha'];
							if(!$captcha || $captcha != $acceptCaptcha){
								$model->addError('email',Yii::t('common','Please Input Right Email Captcha'));
							}
						}
					}
				}
				$model->email = $newemail;		
				if(!$model->getErrors() && $model->save()){
					unset(Yii::app()->session[$newemail.'_captcha']);
					$this->message('success',Yii::t('common','Reset Email Success'),$this->createUrl('index'));
				}
			}
		}
		$this->render('setting_email', array('model'=>$model,'post'=>$post));
	}
	
	/**
	 * 修改密码
	 * @param string $setting
	 */
	public function actionSettingPwd()
	{
		$this->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Pwd').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		$user = $this->loadModel();
		
		$model = new SetPwdForm();
		$model->id = $user->uid;	
							
		if(isset($_POST['SetPwdForm'])){
			$model->attributes = $_POST['SetPwdForm'];	
			if($model->validate()){
				$user->password = User::createPassword($model->newpassword);
				if($user->save()){
					$this->message('success',Yii::t('common','Update Password Success'),$this->createUrl('user/logout'));
				}	
			}
		}		
		$this->render('setting_pwd', array('model'=>$model));
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
				
				//更新登录次数和ip				
				$user = $this->loadModel();					
				$user->logins = $user->logins + 1;
				$user->last_login_ip = $this->getClientIP();
				$user->save();
				
				$this->message('success',Yii::t('common','Login Success'),$_POST['ret_url']);
				//$this->redirect($ret_url);
			}
		}
		//set seo
		$this->_seoTitle = Yii::t('common','Login').' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Login');
		$this->_seoDescription = Yii::t('common','Login');
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/login.css");
	
		// display the login form
		$this->render('login',array('model'=>$model,'ret_url'=>$ret_url));
	}
	
	
	/**
	 * ajax登录
	 *
	 */
	public function actionAjaxLogin()
	{
		//登录状态
		if(!Yii::app()->user->getIsGuest()){			
			exit('您已经登录了');
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
	
				//更新登录次数和ip
				$user = $this->loadModel();
				$user->logins = $user->logins + 1;
				$user->last_login_ip = $this->getClientIP();
				$user->save();
				$this->rediretParentUrl($ret_url);
			}
		}
		
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/ajax_login.css");
	
		// display the login form
		$this->render('ajax_login',array('model'=>$model,'ret_url'=>$ret_url));
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
			$userModel->nickname = $userModel->username;
			$userModel->logins = 0;
			// validate user input and redirect to the previous page if valid
			if($userModel->save()){				
				$this->activeAccount(array('id'=>$userModel->uid, 'email'=>$userModel->email, 'username'=>$userModel->username));
				$this->message('success', Yii::t('Register Success'), $this->createUrl('login'), 5);
			}else{
				$this->message('error',Yii::t('Register Failed'), $this->createUrl('register'));
			}
		}
		//set seo
		$this->_seoTitle = Yii::t('common','Register New User').' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Register New User');
		$this->_seoDescription = Yii::t('common','Register New User');
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
		$subject = $this->_setting['site_name'].' '.Yii::t('common','Account Active');
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
			$this->message('error',Yii::t('common','Auth Account Do Not Exist'), $this->createUrl('site/index'),0, true);
		}
		if((time()-$user->addtime)/3600 > 2){
			//超过2小时视为过期
			$this->message('error',Yii::t('common','The link is invalid'), $this->createUrl('site/index'),0, true);
		}
		$safestr = Yii::app ()->params ['safestr'];  //安全分隔符
		$email = $user->email;
		$authcode = $this->_request->getParam('authcode');
		if(crypt($id.$safestr.$email, $authcode) == $authcode){
			//验证通过
			$user->status = 1;
			$user->save();
			$this->message('success',Yii::t('common','Auth Success'), $this->createUrl('login'));
		}else{
			$this->message('error',Yii::t('common','Auth Failed'), $this->createUrl('register'));
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
			$uid = Yii::app()->user->id;
			if(isset($uid))
				$this->_model=User::model()->findbyPk($uid);
			if($this->_model===null)
				throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
		}
		return $this->_model;
	}
	
}
