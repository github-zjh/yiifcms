<?php

/**
 * 
 * 注册表单
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 *
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $email;
	public $verifyCode;	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username', 'required', 'message' => Yii::t('common','Username is required')),
			array('password', 'required', 'message' => Yii::t('common','Password is required')),
			array('email','required','message'=>Yii::t('common','Email is required')),			
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username' => Yii::t('model','username'),
			'password' => Yii::t('model','password'),
			'email' => Yii::t('model','email'),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate()
	{
		if(!$this->hasErrors())
		{
			$tmpuser = User::model()->find('username=:username',array('username'=>$this->username));
			$this->_identity=new UserIdentity($this->username,$this->password);					
			if(!$this->_identity->authenticate())
				$this->addError('password',Yii::t('common','Incorrect username or password.'));
		}
	}
	
}
