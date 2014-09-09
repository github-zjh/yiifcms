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
		
		//后台头部一级菜单
		$FirstMenus = array(
			'0' => array('url'=>'', 'name'=>Yii::t('admin','BM_Home')),
			'1' => array('url'=>'', 'name'=>Yii::t('admin','BM_Setting')),
			'2' => array('url'=>'', 'name'=>Yii::t('admin','BM_Catalog')),
			'3' => array('url'=>'', 'name'=>Yii::t('admin','BM_Content')),
			'4' => array('url'=>'', 'name'=>Yii::t('admin','BM_User')),
			'5' => array('url'=>'', 'name'=>Yii::t('admin','BM_Ad')),		
			'6' => array('url'=>'', 'name'=>Yii::t('admin','BM_Component')),
			'7' => array('url'=>'', 'name'=>Yii::t('admin','BM_Model')),
			'8' => array('url'=>'', 'name'=>Yii::t('admin','BM_Tools')),
			'9' => array('url'=>'', 'name'=>Yii::t('admin','BM_Oauth')),
		);
		//后台左侧二级菜单
		$SecMenus = array(
			'0' => array(
				array('url'=> $this->createUrl('default/home'), 'name'=>Yii::t('admin','System Home')),					
			),
			'1' => array(
				array('url'=> $this->createUrl('setting/index'), 'name'=>Yii::t('admin','Web Set')),
				array('url'=> $this->createUrl('setting/seo'), 'name'=>Yii::t('admin','SEO Set')),
				array('url'=> $this->createUrl('setting/upload'), 'name'=>Yii::t('admin','Upload Set')),
				array('url'=> $this->createUrl('setting/template'), 'name'=>Yii::t('admin','Template Set')),
				array('url'=> $this->createUrl('setting/email'), 'name'=>Yii::t('admin','Email Set')),
				array('url'=> $this->createUrl('setting/custom'), 'name'=>Yii::t('admin','Custom Set')),
			),	
			'2' => array(
					array('url'=> $this->createUrl('catalog/index'), 'name'=>Yii::t('admin','Catalog Manage')),
					array('url'=> $this->createUrl('menu/index'), 'name'=>Yii::t('admin','Menu Manage')),
					array('url'=> $this->createUrl('special/index'), 'name'=>Yii::t('admin','Special Manage')),					
			),
			'3' => array(
					array('url'=> $this->createUrl('post/index'), 'name'=>Yii::t('admin','Article Manage')),
					array('url'=> $this->createUrl('image/index'), 'name'=>Yii::t('admin','Image Manage')),
					array('url'=> $this->createUrl('soft/index'), 'name'=>Yii::t('admin','Soft Manage')),
					array('url'=> $this->createUrl('video/index'), 'name'=>Yii::t('admin','Video Manage')),
					array('url'=> $this->createUrl('goods/index'), 'name'=>Yii::t('admin','Goods Manage')),
					array('url'=> $this->createUrl('page/index'), 'name'=>Yii::t('admin','Page Manage')),
			),
			'4' => array(
					array('url'=> $this->createUrl('user/index'), 'name'=>Yii::t('admin','User List')),
					array('url'=> $this->createUrl('user/admin'), 'name'=>Yii::t('admin','Admin List')),
					array('url'=> $this->createUrl('user/group'), 'name'=>Yii::t('admin','Group Manage')),
					array('url'=> $this->createUrl('question/index'), 'name'=>Yii::t('admin','Question List')),				
			),
			'5' => array(
					array('url'=> $this->createUrl('ad/index'), 'name'=>Yii::t('admin','Ads Manage')),
					array('url'=> $this->createUrl('adPosition/index'), 'name'=>Yii::t('admin','Adposition Manage')),				
			),
			'6' => array(
					array('url'=> $this->createUrl('recommendPosition/index'), 'name'=>Yii::t('admin','RecommendPosition Manage')),
					array('url'=> $this->createUrl('attach/index'), 'name'=>Yii::t('admin','Attach Manage')),
					array('url'=> $this->createUrl('link/index'), 'name'=>Yii::t('admin','Link Manage')),
					array('url'=> $this->createUrl('comment/index'), 'name'=>Yii::t('admin','Comment Manage')),
					array('url'=> $this->createUrl('reply/index'), 'name'=>Yii::t('admin','Reply Manage')),
					array('url'=> $this->createUrl('tag/index'), 'name'=>Yii::t('admin','Tags Manage')),
					array('url'=> $this->createUrl('maillog/index'), 'name'=>Yii::t('admin','Maillog Manage')),
			),
			'7' => array(
					array('url'=> $this->createUrl('modeltype/index'), 'name'=>Yii::t('admin','Modeltype Manage')),					
			),
			'8' => array(
					array('url'=> $this->createUrl('database/index'), 'name'=>Yii::t('admin','Database Manage')),
					array('url'=> $this->createUrl('cache/index'), 'name'=>Yii::t('admin','Cache Manage')),
					array('url'=> $this->createUrl('zip/index'), 'name'=>Yii::t('admin','Zip Manage')),					
			),
			'9' => array(
					array('url'=> $this->createUrl('oAuth/index'), 'name'=>Yii::t('admin','OAuth Manage')),					
			),
		);
		
		//只显示授权的菜单
		$groupid = Yii::app()->user->groupid;
		$group = UserGroup::model()->findByPk($groupid);
		if($groupid != $this->_adminGroupID){
			//非超级管理员
			$acls = explode(',', $group->acl);
			$loginkey = array_search('default|login', $acls); //删除login授权
			$acls[$loginkey] = 'default|home';
			foreach($acls as $ak => $av){
				$av = str_replace('|', '/', $av);
				$tmpacls[] = $this->createUrl($av);				
			}
			
			foreach($SecMenus as $sk => $sv){
				foreach($sv as $sek => $sev){						
					if(in_array($sev['url'], $tmpacls)){
						$OAuthSecMenus[$sk][$sek] = $sev;
					}
				}
				if(!$OAuthSecMenus[$sk]){
					unset($FirstMenus[$sk]);
				}
			}			
		}else{
			$OAuthSecMenus = $SecMenus;
		}

		//取左侧菜单第一个菜单作为头部菜单的链接
		foreach($FirstMenus as $key=>$val){
			$OAuthSecMenus[$key] && $firstUrl = reset($OAuthSecMenus[$key]);
			$FirstMenus[$key]['url'] = $firstUrl['url'];
		}
		
		$this->render('index', array('FirstMenus' => $FirstMenus, 'SecMenus' => $OAuthSecMenus));
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
		$data['dbsize'] = Helper::byteFormat($dbsize);
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
		$mailer = Yii::createComponent ( 'application.extensions.autokeyword.AutoKeyword' );
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
