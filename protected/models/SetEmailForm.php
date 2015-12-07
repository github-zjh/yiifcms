<?php

/**
 * 
 * 修改邮箱表单
 * 
 * @author        GoldHan.Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 *
 */
class SetEmailForm extends CFormModel
{	
	public $uid;             //用户id
	public $initEmail;      //原始邮箱
	public $newEmail;       //新邮箱
	public $verifyCode;     //验证码	 

	
	/**
	 * Declares the validation rules.
	 * The rules state that username and Email are required,
	 * and Email needs to be authenticated.
	 */
	public function rules()
	{
		return array(			
			array('newEmail','required'),			
			array('newEmail','checkEmail'),			
	        array('initEmail, newEmail, verifyCode','safe'),
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(			
			'initEmail'    => Yii::t('common','Init Email'),
			'newEmail'     => Yii::t('common','New Email'),
            'verifyCode'   => Yii::t('common','VerifyCode'),
		);
	}	
	
	/**
	 * 校验邮箱
     * 
	 * @return boolean
	 */	
	public function checkEmail(){	        
		$reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
		if(!preg_match($reg, $this->newEmail)){
			$this->addError('newEmail', Yii::t('common','Email Format Is Wrong'));
			return false;
		}
		$email = User::model()->find('email=:email AND uid != :uid', array(':email'=>$this->newEmail, ':uid' => $this->uid));
		if($email){
			$this->addError('newEmail', Yii::t('common','Existing Email'));
			return false;
		}
	}
}
