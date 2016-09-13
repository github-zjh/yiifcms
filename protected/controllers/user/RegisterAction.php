<?php
/**
 * 注册
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */


class RegisterAction extends CAction
{	
	public function run(){
        $this->controller->layout = false;
		
        //登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->controller->redirect(Yii::app()->homeUrl);
			exit;
		}
		
		//注册ip访问控制
		$cur_ip = Yii::app()->request->userHostAddress;		
		$access_ips = $this->controller->_setting['deny_register_ip'];
        if($access_ips) {
            $access_ips = explode("\r\n", trim($access_ips));
            $access = Helper::ipAccess($cur_ip, $access_ips);		
            if(!$access) {
                throw new CHttpException(403, Yii::t('common', 'Register Deny!'));                
            }
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
			$userModel->status = $this->controller->_active_need ? User::STATUS_AUDIT : User::STATUS_NORMAL;  //审核状态
			$userModel->groupid = 1;			
			$userModel->nickname = $userModel->username;
			$userModel->logins = 0;
			$userModel->register_ip = Yii::app()->request->userHostAddress;  //注册ip
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $userModel->save()){
				if($this->controller->_active_need){	
					//发送激活邮件				
					$this->controller->sendActiveAccount(array('id'=>$userModel->uid, 'email'=>$userModel->email, 'username'=>$userModel->username));
					$this->controller->message('success', Yii::t('common','Register Success And Active Email'), $this->controller->createUrl('login'), 5);
				}else{					
					$this->controller->message('success', Yii::t('common','Register Success'), $this->controller->createUrl('login'), 5);
				}
			} else {
				$model->addErrors($userModel->getErrors());
			}
		}
		//set seo
		$this->controller->_seoTitle = Yii::t('common','Register New User').' - '.$this->controller->_setting['site_name'];
		$this->controller->_seoKeywords = Yii::t('common','Register New User');
		$this->controller->_seoDescription = Yii::t('common','Register New User');
		
		$this->controller->render('register',array('model'=>$model));	
	}

}
