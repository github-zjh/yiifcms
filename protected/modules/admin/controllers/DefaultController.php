<?php
/**
 * 默认后端控制器类
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class DefaultController extends BackendBase
{		
	protected $setting_base = array();
	public function init(){		
		parent::init();
		$config = Setting::model()->findAll('scope=:scope',array(':scope'=>'base'));
		foreach ($config as $key => $row) {
			$this->setting_base[$row['variable']] = $row['value'];
		}		
	}
		
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'MyCaptchaAction',
						'backColor'=>0xf4f4f4,  //背景色		
						'foreColor'=> 0x3C5880,	//前景色			
						'fontFile' => $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
						'padding'=>0,
						'width' => 90,
						'height'=>30,
						'minLength'=>4,
						'maxLength'=>4,
						'testLimit'=>0,   //不限制输错次数
						'offset' => 2,    //字符间距		
				),
		);
	}
	
	public function actionLogin(){
		$returnUrl = Yii::app()->user->__returnUrl;
		if(!Yii::app()->user->getIsGuest()){
			//$this->redirect(array('/admin/'));
			$this->rediretParentUrl($returnUrl);
		}		
		
		$model=new LoginForm;		
		$this->layout = false;
		$this->pageTitle = Yii::t('admin','admin login').' - '.$this->setting_base['site_name'];
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->message('success', Yii::t('common', 'Login Success'), $returnUrl, 2);
		}				
		$this->render('login', array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect($this->createUrl('login'));
	}
	
	public function actionIndex()
	{		
		parent::auth();
		$this->layout = false;
		$this->pageTitle = Yii::t('common','Admin Manage');
		
		$this->render('index');
	}
		
	public function actionHome()
	{			
		
		parent::auth();
		$data['serverSoft'] = $_SERVER['SERVER_SOFTWARE'];
		$data['serverOs'] = PHP_OS;
		$data['phpVersion'] = PHP_VERSION;
		$data['fileupload'] = ini_get('file_uploads') ? ini_get('upload_max_filesize') : Yii::t('admin','Forbidden to upload');
		$data['maxExcuteTime'] = ini_get('max_execution_time') . Yii::t('admin', 'Seconds');
		$data['maxExcuteMemory'] = ini_get('memory_limit');		
		$data['allow_url_fopen'] = ini_get('allow_url_fopen') ? Yii::t('admin', 'Open') : Yii::t('admin', 'Close');
		$dbsize = 0;
		$connection = Yii::app()->db;
		//$sql = 'SHOW TABLE STATUS LIKE \'' . $connection->tablePrefix . '%\'';
		$sql = 'SHOW TABLE STATUS';
		$command = $connection->createCommand($sql)->queryAll();
		foreach ($command as $table)
			$dbsize += $table['Data_length'] + $table['Index_length'];
		$mysqlVersion = $connection->createCommand("SELECT version() AS version")->queryAll();
		$data['mysqlVersion'] = $mysqlVersion[0]['version'];
		$data['dbsize'] = $this->byteFormat($dbsize);
		$this->render('home', array ('server' => $data ));
		
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
			else
				$this->render('error', $error);
		}
	}
	
	
	/**
	 * 自动获取关键词(调用第三方插件)
	 * @return [type] [description]
	 */
	public function actionKeyword()
	{
		parent::auth();
		$mailer = Yii::createComponent ( 'application.extensions.autokeyword.Autokeyword' );
		$title = trim($this->_request->getParam('title'));
		$content = trim($this->_request->getParam('content'));
		//$return  = XAutoKeyword::discuz($string);		
		$return = AutoKeyword::simple($title,$content);
		if($return  == 'empty'){
			$data['state'] = 'error';
			$data['message'] = Yii::t('admin','Failed Get');
		}else{
			$data['state'] = 'success';
			$data['message'] = Yii::t('success','Success Get');
			$data['datas'] = $return;
		}
		exit(CJSON::encode($data));
	}
	
	
}