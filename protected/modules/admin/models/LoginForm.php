<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	public $verifyCode;
	public $status;
	public $groupid;

	private $_identity;
	private $_adminGroupID = 10;

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
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
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
			if(!$this->_identity->authenticate()){
				$this->addError('password',Yii::t('common','Incorrect username or password.'));
				return false;
			}
			if(!$this->checkAcl($tmpuser->groupid, 'default/login') || $tmpuser->status != 1){
				$this->addError('username', Yii::t('admin','You have no right to visit.'));
				return false;
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{			
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}	
	
	/**
	 * 校验登录权限
	 * @param string $groupid
	 * @param string $acl
	 * @return boolean
	 */
	public function checkAcl($groupid='', $acl=''){
		$bool = false;
		if($groupid && $acl){
			$group = UserGroup::model()->findByPk($groupid);			
			if($group->acl){
				if($groupid == $this->_adminGroupID && $group->acl == 'Administrator'){
					$bool = true;
				}else {
					$acl = str_replace('/', '|', $acl);				
					if(strstr($group->acl, $acl)){
						$bool = true;
					}
				}			
			}
		}
		
		return $bool;
			
	}
}
