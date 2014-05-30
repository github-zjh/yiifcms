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
			array('username','length','min'=>6, 'max'=>40, 
				'tooShort'=>Yii::t('common','username length is between 6 and 40'),
				'tooLong'=>Yii::t('common','username length is between 6 and 40')					
			),
			array('username','checkUsername'),	
			array('password','length','min'=>6, 'max'=>30, 
				'tooShort'=>Yii::t('common','password length is between 6 and 30'),
				'tooLong'=>Yii::t('common','password length is between 6 and 40'),					
			),
			array('email','checkEmail'),
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
	 * 校验用户名
	 */
	function checkUsername(){
		$user = User::model()->find("username=:username", array(':username'=>$this->username));
		if($user){
			$this->addError('username', Yii::t('common','Username is exists'));
			return false;
		}
	}
	/**
	 * 校验邮箱
	 */
	function checkEmail(){
		$reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
		if(!preg_match($reg, $this->email)){
			$this->addError('email', Yii::t('common','Email Format Is Wrong'));
			return false;
		}
		$email = User::model()->find("email=:email", array(':email'=>$this->email));
		if($email){
			$this->addError('email', Yii::t('common','Existing Email'));
			return false;
		}
	}
	
	
}
