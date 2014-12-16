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
	private $_active_need;
	
	public function init(){
		parent::init();
		//邮箱激活设置
		if($this->_setting['email_active'] == 'open'){			
			$this->_active_need = true;
		}else{			
			$this->_active_need = false;
		}
	}
	
	
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
						'fontFile' =>  $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
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
				
				//收藏
				'mycollect' => array(
						'class'=>'application.controllers.user.MycollectAction'						
				),
				//关注
				'myattention' => array(
						'class'=>'application.controllers.user.MyattentionAction'
				),
				//评论
				'mycomments' => array(
						'class'=>'application.controllers.user.MycommentsAction'
				),
				//回复
				'myreplys' => array(
						'class'=>'application.controllers.user.MyreplysAction'
				),
				//好友
				'myfriends' => array(
						'class'=>'application.controllers.user.MyfriendsAction'
				),
				//取消操作
				'cancel' => array(
						'class'=>'application.controllers.user.CancelAction'
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
	 * 修改基本资料
	 * @param string $setting
	 */	
	public function actionSetting()
	{		
		
		$this->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Profile').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/jquery.Jcrop.min.css");		
		
	    $model = $this->loadModel();	   
	    
	    //判断账号是否已激活
	    if($this->_active_need && $model->status == -1){
	    	$this->redirect($this->createUrl('activeEmail'));
	    }
	     
	    $old_avatar = $model->avatar;	   
	  	    
	    if(isset($_POST['User'])){
	    	$model->attributes = array_map('trim',$_POST['User']);
	    	//把确定上传的头像重命名
	    	$new_avatar =  str_replace('old_','',$model->avatar);	 
	    	@rename($model->avatar,$new_avatar);
	    	$model->avatar = $new_avatar;    		    	
	    	if($model->save()){	    	
	    		if($old_avatar != $model->avatar){
	    			Uploader::deleteFile($old_avatar);	    		   			
	    		}	
	    		//删除游离的图片
	    		$avatar_path =  'uploads/avatar';
	    		$old_files = Helper::scanfDir($avatar_path, true);	    		
	    		foreach((array)$old_files['files'] as $old){		    			    			  			
	    			$path_parts = pathinfo ( $old );
    				if (! strstr ( $path_parts ['basename'], $model->uid.'_old_' )) {
    					continue;
    				}
    				Uploader::deleteFile($old);	    			
	    		}	   		  
				//同步昵称
				Yii::app()->user->nickname = $model->nickname;
				//提示信息
				Yii::app()->user->setFlash('success',Yii::t('common','Update Profile Success'));	    		
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
		
		
		//判断账号是否已激活	
		if($this->_active_need && $model->status == -1){
			$this->redirect($this->createUrl('activeEmail'));
		}
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
							if($this->_active_need) {
								$acceptCaptcha = Yii::app()->session[$email.'_captcha'] = substr(mt_rand(0,time()),2,6);
								$subject = Yii::t('common','Reset Email Subject');
								$message = Yii::t('common','Reset Email Content', array('{username}'=>$model->username, '{email_captcha}'=>$acceptCaptcha,'{admin_email}'=>$this->_setting['admin_email']));
								Helper::sendMail($model->uid, $email, $subject, $message);
								exit( CJSON::encode( array ( 'status' => 'success' , 'message' => Yii::t('common','Send Success') ) ) );
							}else{			
								exit( CJSON::encode( array ( 'status' => 'success'  ) ) );
							}
						}else{
							exit( CJSON::encode( array ( 'status' => 'error' , 'field'=>'newEmail', 'message' => Yii::t('common','Existing Email') ) ) );
						}
					}else{
						exit( CJSON::encode( array ( 'status' => 'error' , 'field'=>'newEmail', 'message' => Yii::t('common','Please Input Right New Email') ) ) );					
					}		
				}			
			}else{
			
				$post = array_map('trim', $_POST);
				$newemail = $post['newEmail'];
				if($this->_active_need) {
					//激活设置开启时，需接收验证码
					$captcha = $post['captchaEmail'];
				}

				if(!$newemail || !preg_match($reg, $newemail)){
					$model->addError('email',Yii::t('common','Please Input Right New Email'));
				}else{
					if($newemail == $model->email){
						//校验邮箱唯一性
						$model->addError('email',Yii::t('common','Please Input Different Email'));
					}else{
						if($this->_active_need) {
							//激活设置开启时，需接收验证码
							$acceptCaptcha = Yii::app()->session[$newemail.'_captcha'];
							if(!$captcha || $captcha != $acceptCaptcha){
								$model->addError('email',Yii::t('common','Please Input Right Email Captcha'));
							}
						}
					}
				}
				if(!$model->getErrors()){
					$model->email = $newemail;	
					$model->save();
					unset(Yii::app()->session[$newemail.'_captcha']);
					//提示信息
					Yii::app()->user->setFlash('success',Yii::t('common','Reset Email Success'));					
				}
			}
		}
		$this->render('setting_email', array('model'=>$model,'post'=>$post ,'need_active'=>$this->_active_need));
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
		
		//判断账号是否已激活
		if($this->_active_need && $user->status == -1){
			$this->redirect($this->createUrl('activeEmail'));
		}
	    //判断账号的密码是否为空
		if($user->validatePassword(' ')){
			$password_empty = true;
		}else{
			$password_empty = false;
		}
		$model = new SetPwdForm();
		$model->id = $user->uid;	
							
		if(isset($_POST['SetPwdForm'])){
			$model->attributes = $_POST['SetPwdForm'];
			if(!$password_empty){
				//校验原始密码
				$model->checkPwd();
			}
			if(!$model->getErrors() && $model->validate()){
				$user->password = User::createPassword($model->newpassword);
				if($user->save()){
					Yii::app()->user->logout(false);
					//提示信息
					Yii::app()->user->setFlash('success',Yii::t('common','Update Password Success'));
					$this->redirect($this->createUrl('user/login'));
				}	
			}
		}		
		$this->render('setting_pwd', array('model'=>$model,'user'=>$user,'password_empty'=>$password_empty));
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
		$get_url = $this->_request->getParam('ret_url');
		if (!empty($get_url))
		{
			$ret_url = trim($get_url);
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
				$user->last_login_ip = $this->_request->userHostAddress;
				$user->save();				
				$this->redirect($ret_url);
			}
		}
		//set seo
		$this->_seoTitle = Yii::t('common','Login').' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Login');
		$this->_seoDescription = Yii::t('common','Login');
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/login.css");
		
		//第三方登录授权
		$oauth = OAuth::model()->findAll('status=:status', array(':status'=>'Y'));
	
		// display the login form
		$this->render('login',array('model'=>$model,'ret_url'=>$ret_url, 'oauth'=>$oauth));
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
		if (str_replace(array('user/login', 'user/logout', 'user/register', 'user/authEmail'), '', $ret_url) != $ret_url)
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
				$user->last_login_ip = $this->_request->userHostAddress;
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
		
		//注册ip访问控制
		$cur_ip = $this->_request->userHostAddress;		
		$access_ips = $this->_setting['deny_register_ip'];
		$access_ips && $access_ips = explode("\r\n", trim($access_ips));
		$access = Helper::ipAccess($cur_ip, $access_ips);		
		if(!$access) {
			throw new CHttpException(403, Yii::t('common', 'Register Deny!'));
			exit;
		}
		
		$model=new RegisterForm();
		$userModel = new User('register');
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
			$userModel->status = $this->_active_need?-1:1;  //审核状态
			$userModel->groupid = 1;			
			$userModel->nickname = $userModel->username;
			$userModel->logins = 0;
			// validate user input and redirect to the previous page if valid
			if($userModel->save()){			
				
				if($this->_active_need){	
					//发送激活邮件				
					$this->activeAccount(array('id'=>$userModel->uid, 'email'=>$userModel->email, 'username'=>$userModel->username));
					$this->message('success', Yii::t('common','Register Success And Active Email'), $this->createUrl('login'), 5);
				}else{					
					$this->message('success', Yii::t('common','Register Success'), $this->createUrl('login'), 5);
				}
			}else{
				$this->message('error',Yii::t('common','Register Failed'), $this->createUrl('register'));
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
		$safestr = $this->_setting['safe_str'];  //安全分隔符
		$salt = base64_encode(mt_rand(0,time()));  //随机盐
		
		$authcode = crypt($params['id'].$safestr.$params['email'], $salt);
		$authurl = $this->_request->hostInfo.$this->createUrl('authEmail', array('id'=>$params['id'], 'authcode'=>$authcode));
		$subject = Yii::t('common','Account Active');
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
		if($user->status == 1){
			$this->message('success',Yii::t('common','Auth Is Ok'), $this->createUrl('login'));
		}
		
		//需验证的邮箱		
		$email = $user->email;
		//邮件标题
		$subject = Yii::t('common','Account Active');
		
		//获取邮件发送成功的时间
		$maillog = MailLog::model()->find('accept=:accept AND status=:status AND subject=:subject ORDER BY sendtime DESC', array(':accept'=>$email, ':status'=>'success', ':subject'=>$subject));
		$maillog && $sendTime = $maillog->sendtime;
		
		if((time()-$sendTime)/60 > 20){
			//超过20分钟视为过期
			$this->message('error',Yii::t('common','The link is invalid'), $this->createUrl('site/index'),0, true);
		}
		$safestr = $this->_setting['safe_str'];  //安全分隔符
		
		$authcode = $this->_request->getParam('authcode');
		if(crypt($id.$safestr.$email, $authcode) == $authcode){
			//验证通过
			$user->status = 1;
			$user->save();			
			$this->message('success',Yii::t('common','Auth Success'), $this->createUrl('login'),5);
		}else{
			$this->message('error',Yii::t('common','Auth Failed'), $this->createUrl('register'));
		}
	}
	
	/**
	 * 重发验证邮件，进行账号激活
	 * 
	 */
	public function actionActiveEmail(){
		$this->_seoTitle = Yii::t('common','Account Active').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		$model = $this->loadModel();
		
		if($model->status == 1){
			$this->redirect($this->createUrl('index'));
		}else{
			if($this->_request->isPostRequest){
				if($_POST['ajax'] == 'ajax_active_form'){
					$this->activeAccount(array('id'=>$model->uid, 'username'=>$model->username,'email'=>$model->email));
					exit(CJSON::encode(array('message'=>Yii::t('common','Send Success'))));
				}else{
					exit(CJSON::encode(array('message'=>Yii::t('common','Send Failed'))));
				}
			}
			$this->render('active_email', array('model'=>$model));
		}
	}
	
	/**
	 * 找回密码
	 * 
	 */
	public function actionForgetpwd(){		
		
		$model = new ForgetPwdForm();
		if(isset($_POST['ForgetPwdForm'])){
			$model->attributes = $_POST['ForgetPwdForm'];
			if($model->validate()){				
				$safestr = $this->_setting['safe_str'];  //安全分隔符
				$salt = base64_encode(mt_rand(0,time()));  //随机盐
				$authcode = crypt($model->username.$safestr.$model->email, $salt);
				//SESSION保存重要信息
				Yii::app()->session[$model->id.'_forgetpwd'] = array('email'=>$model->email, 'time'=>time());
								
				$authurl = $this->_request->hostInfo.$this->createUrl('resetPwd', array('id'=>$model->id, 'authcode'=>$authcode));
				$subject = Yii::t('common','Reset Pwd');
				$message = Yii::t('common','ResetPwd Email',
						array('{username}'=>$model->username,
								'{sitename}'=>$this->_setting['site_name'],
								'{authurl}'=>$authurl,
								'{admin_email}'=>$this->_setting['admin_email']));
				Helper::sendMail($model->id, $model->email, $subject, $message);
				$this->message('success', Yii::t('common','Send ResetPwd Email Success'), $this->createUrl('forgetpwd'), 5);
			}
		}		
		
		//set seo
		$this->_seoTitle = Yii::t('common','Find Pwd').' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Find Pwd');
		$this->_seoDescription = Yii::t('common','Find Pwd');
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
					
		$this->render('forgetpwd', array('model'=>$model));
	}
	/**
	 * 
	 * 重置密码
	 * 
	 */	
	public function actionResetPwd(){		
		
		$id = $this->_request->getParam('id');
		$user = User::model()->findByPk($id);	
		$authcode = $this->_request->getParam('authcode');
		
		if(!$id || !$user || !$authcode){
			$this->message('error',Yii::t('common','The link is invalid'), $this->createUrl('forgetPwd'));
		}
		
		//校验session
		$sessionEmail = Yii::app()->session[$id.'_forgetpwd']['email'];
		$sessionTime = Yii::app()->session[$id.'_forgetpwd']['time'];		
		if(!$sessionEmail || ($sessionEmail != $user->email)){
			$this->message('error',Yii::t('common','The link is invalid'), $this->createUrl('forgetPwd'));
		}
		
		//超过20分钟视为过期
		if(!$sessionTime || ($sessionTime + 1200) < time()){
			$this->message('error',Yii::t('common','The link is invalid'), $this->createUrl('forgetPwd'));
		}		
		
		
		$safestr = $this->_setting['safe_str'];  //安全分隔符
		if(crypt($user->username.$safestr.$sessionEmail, $authcode) != $authcode){
			//验证不通过
			$this->message('error',Yii::t('common','Auth Failed'), $this->createUrl('forgetPwd'));
		}
		$model = new ResetPwdForm();
		if(isset($_POST['ResetPwdForm'])){
			$model->attributes = $_POST['ResetPwdForm'];
			if($model->validate()){				
				$user->password = User::createPassword($model->newpassword);
				$user->save();	
				//清除session
				unset(Yii::app()->session[$id.'_forgetpwd']);
				
				$this->message('success', Yii::t('common','ResetPwd Success'), $this->createUrl('login'), 5);
			}
			
		}
		//set seo
		$this->_seoTitle = Yii::t('common','Reset Pwd').' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Reset Pwd');
		$this->_seoDescription = Yii::t('common','Reset Pwd');
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
			
		$this->render('resetpwd', array('model'=>$model));
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
