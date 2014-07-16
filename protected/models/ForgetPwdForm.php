<?php

/**
 * 
 * 忘记密码表单
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 *
 */
class ForgetPwdForm extends CFormModel
{	
	public $username;        //用户名
	public $email;           //注册邮箱
	public $id;             //用户id
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required	
			array('username, email','required'),				
			array('email','checkUserEmail'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(			
			'username' => Yii::t('common','UserName'),
			'email' => Yii::t('common','Email')
		);
	}	
	
	/**
	 * 校验用户名和邮箱
	 * @return boolean
	 */
	
	public function checkUserEmail(){		
		if($this->username && $this->email){
			$reg = '/^[a-zA-Z0-9_]+@(qq|126|163|sina|hotmail|yahoo|gmail|sohu|live)(\.com|\.com\.cn)$/';
			if(!preg_match($reg, $this->email)){
				$this->addError('email', Yii::t('common','Email Format Is Wrong'));
				return false;
			}
			$user = User::model()->find('username=:username AND email=:email', array(':username'=>$this->username, ':email'=>$this->email));
			if(!$user){
				$this->addError('username', Yii::t('common','Auth Account Do Not Exist'));
				return false;
			}
		}else{
			return false;
		}
		$this->id = $user->uid;
		return true;
	}
}
