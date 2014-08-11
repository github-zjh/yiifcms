<?php

/**
 * 第三方授权登录
 * @author zhao jinhan <326196998@qq.com>
 * @version 1.2
 * @oauth 2.0
 */
class OAuthUserIdentity extends CUserIdentity
{	
	public $id;

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
		$user=User::model()->find('username=:username',array(':username'=>$this->username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else{
			$this->id=$user->uid;
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
		return $this->id;
	}
}
