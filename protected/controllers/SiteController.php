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
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
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
			else
				$this->render('error', $error);
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
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->redirect(Yii::app()->homeUrl);
			exit;
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
				$this->message('success','登录成功',Yii::app()->user->returnUrl);
				//$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		//seo
		$this->_seoTitle = '登录 - '.$this->_setting['site_name'];
		$this->_seoKeywords = '登录';
		$this->_seoDescription = '登录';		
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->homeUrl);
	}
	/**
	 * 关于我们
	 */
	public function actionAbout(){
		$this->render('about');
	}

	
}