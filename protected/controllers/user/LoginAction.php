<?php
/**
 * 前端登录
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */


class LoginAction extends CAction
{	
	public function run(){
        $this->controller->layout = false;
        
		//登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->controller->redirect(Yii::app()->homeUrl);
			exit;
		}
		//获取登录前的URL
		$get_url = Yii::app()->request->getParam('ret_url');
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
		/* 防止登陆成功后跳转到登陆、退出等页面 */		
        $deny_enter = array(
            'user/login', 
            'user/logout', 
            'user/register',
            'user/forgetPwd',
            'user/resetPwd',
            'user/authEmail',
            'user/cancel',
        );
		if (str_replace($deny_enter, '', $ret_url) != $ret_url)
		{
			$ret_url = Yii::app()->user->returnUrl;
		}	
		
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
				$user = $this->controller->loadModel();					
				$user->logins = $user->logins + 1;
				$user->last_login_ip = Yii::app()->request->userHostAddress;
				$user->save();				
				$this->controller->redirect($ret_url);
			}
		}
		//set seo
		$this->controller->_seoTitle = Yii::t('common','Login').' - '.$this->controller->_setting['site_name'];
		$this->controller->_seoKeywords = Yii::t('common','Login');
		$this->controller->_seoDescription = Yii::t('common','Login');
		
		//第三方登录授权
		$oauth = OAuth::model()->findAll('status=:status', array(':status'=>'Y'));
	
		// display the login form
		$this->controller->render('login',array('model'=>$model,'ret_url'=>$ret_url, 'oauth'=>$oauth));		
	}

}
