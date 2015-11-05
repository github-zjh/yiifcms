<?php

/**
 * 修改邮箱
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */

class SettingEmailAction extends CAction
{	
	public function run(){
        $this->controller->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Email').' - '.$this->controller->_setting['site_name'];		
		$model = $this->controller->loadModel();		
		
		//判断账号是否已激活	
		if($this->controller->_active_need && $model->status == -1){
			$this->controller->redirect($this->createUrl('activeEmail'));
		}
        $post = array(
            'newEmail' => '',
            'captchaEmail' => '',
        );
		if(Yii::app()->request->isPostRequest){	
			//发送验证码		
			$reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
			if(isset($_POST['ajax']) && $_POST['ajax'] == 'edit_form'){
				
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
							if($this->controller->_active_need) {
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
				if($this->controller->_active_need) {
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
						if($this->controller->_active_need) {
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
		$this->controller->render('setting_email', array('model'=>$model,'post'=>$post ,'need_active'=>$this->controller->_active_need));	
	}

}
