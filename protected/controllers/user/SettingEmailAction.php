<?php

/**
 * 修改邮箱
 * 
 * @author        GoldHan.Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */

class SettingEmailAction extends CAction
{	
	public function run(){
        $this->controller->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Email').' - '.$this->controller->_setting['site_name'];		
		$user_model = $this->controller->loadModel();		
		$model = new SetEmailForm();
        $model->initEmail = $user_model->email;
        $model->uid = $user_model->uid;
		//判断账号是否已激活	
		if($this->controller->_active_need && $user_model->status == User::STATUS_AUDIT){
			$this->controller->redirect($this->controller->createUrl('activeEmail'));
		}        
		if(Yii::app()->request->isPostRequest){
            $model->attributes = $_POST['SetEmailForm'];
            if(Yii::app()->request->isAjaxRequest && Yii::app()->request->getParam('ajax') == 'sendEmailVerifyCode') {
                $this->_sendEmailVerifyCode($user_model, $model);            
            } else {
                $this->_operPost($user_model, $model);        
            }
        }
		$this->controller->render('setting_email', array('model'=>$model, 'need_active'=>$this->controller->_active_need));	
	}    
    
    /**
     * 发送邮箱验证码
     * 
     * @param object $model
     * @return json
     */
    private function _sendEmailVerifyCode($user_model, $model)
    {          
        if($model->validate()) {
            if($this->controller->_active_need) {
                $acceptCaptcha = Yii::app()->session[$model->newEmail.'_captcha'] = substr(mt_rand(0,time()),2,6);
                $subject = Yii::t('common','Reset Email Subject');
                $message = Yii::t('common','Reset Email Content', array('{username}'=>$user_model->username, '{email_captcha}'=>$acceptCaptcha,'{admin_email}'=>$this->controller->_setting['admin_email']));
                Helper::sendMail($model->uid, $model->newEmail, $subject, $message);
            }
            exit( CJSON::encode( array ( 'status' => 'success' , 'message' => Yii::t('common','Send Success') ) ) );
        } else {
            $errors = $model->getErrors();        
            foreach($errors as $error) {
                $msg = reset($error);
                break;
            }
            exit( CJSON::encode( array ( 'status' => 'error' , 'message' => $msg ) ) );
        }
        
    }
        
    /**
     * 处理POST请求
     * 
     * @param object $user_model
     * @param object $model 
     * @return json
     */
    private function _operPost($user_model, $model)
    {           
        $validate_captcha = true;
        if($this->controller->_active_need) {            
            $store_captcha = Yii::app()->session [$model->newEmail . '_captcha'];           
            if($store_captcha != $model->verifyCode) {
                $model->addError('verifyCode', Yii::t('common', 'Please Input Right Email Captcha'));
                $validate_captcha = false;
            }
        }        
        
        if ($validate_captcha && $model->validate()) {            
            $user_model->email = $model->newEmail;
            $user_model->save();
            unset(Yii::app()->session[$model->newEmail . '_captcha']);
            //提示信息
            Yii::app()->user->setFlash('success', Yii::t('common', 'Reset Email Success'));
        }
    }    
}
