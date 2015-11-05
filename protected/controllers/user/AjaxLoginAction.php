<?php
/**
 * ajax登录
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */


class AjaxLoginAction extends CAction
{	
	public function run(){
        
        $this->controller->layout = false;
        
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
		/* 防止登陆成功后跳转到登陆、退出、验证等页面 */
		$ret_url = strtolower($ret_url);
		if (str_replace(array('user/login', 'user/logout', 'user/register', 'user/authEmail', 'user/forgetpwd', 'user/resetpwd'), '', $ret_url) != $ret_url)
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
				$user = $this->loadModel();
				$user->logins = $user->logins + 1;
				$user->last_login_ip = Yii::app()->request->userHostAddress;
				$user->save();
				$this->rediretParentUrl($ret_url);
			}
		}
		
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/ajax_login.css");
	
		// display the login form
		$this->render('ajax_login',array('model'=>$model,'ret_url'=>$ret_url));	
	}

}
