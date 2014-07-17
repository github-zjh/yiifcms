<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $_id = null;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @param $admin
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{		
		$user=User::model()->find('username=:username OR email=:email',array(':username'=>$this->username,':email'=>$this->username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password) || $user->status == 0)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$user->uid;
			//把用户信息存入SESSION
			$group = UserGroup::model()->findByPk($user->groupid);
			$this->setState('status', $user->status);
			$this->setState('nickname', $user->nickname?$user->nickname:$user->username);
			$this->setState('groupid', $user->groupid);			
			$this->setState('groupname', $group->group_name);
			$this->setState('email', $user->email);
			
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}