<?php

/**
 * 
 * 修改密码表单
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 *
 */
class SetPwdForm extends CFormModel
{	
	public $id;              //用户id
	public $initpassword;    //原始密码
	public $newpassword;     //新密码
	public $confirmpassword; //确认密码	 

	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required	
			array('newpassword, confirmpassword','required'),			
			array('newpassword','length','min'=>6, 'max'=>30, 
				'tooShort'=>Yii::t('common','new password length is between 6 and 30'),
				'tooLong'=>Yii::t('common','new password length is between 6 and 40'),					
			),
			array('confirmpassword', 'compare', 'compareAttribute'=>'newpassword','message'=>Yii::t('common','The two passwords do not match')),
	        array('initpassword, newpassword, confirmpassword','safe'),	
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(			
			'initpassword' => Yii::t('common','Init Password'),
			'newpassword' => Yii::t('common','New Password'),
			'confirmpassword' => Yii::t('common','Confirm Password'),
		);
	}	
	
	/**
	 * 校验原始密码
	 * @return boolean
	 */
	
	public function checkPwd(){	
		$user = User::model()->findByPk($this->id);
		if(!$this->initpassword || !$user->validatePassword($this->initpassword)){
			$this->addError('initpassword', Yii::t('common','Init Password Is Wrong'));
			return false;
		}
	}
}
