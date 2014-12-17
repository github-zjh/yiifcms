<?php
/**
 * 个人空间
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */

class SpaceAction extends CAction
{
	public $_seoTitle;
	public $_setting;
	public $_static_public;
	public $_stylePath;
	public $_request;
	
	public function run($id){
		$controller  = $this->getController();
		$this->_setting = $controller->_setting;
		$this->_stylePath = $controller->_stylePath;
		$this->_static_public = $controller->_static_public;
		$myself = false;
		
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		
		//用户信息
		$user = User::model()->findByPk($id);
		//当前登录用户
		$uid = Yii::app()->user->id;
		if(!$user){
			throw new CHttpException(404, Yii::t('common','The requested page does not exist.'));
			exit;
		}else{
			$data = array();
			$group = UserGroup::model()->findByPk($user->groupid);
			$data['uid'] = $user->uid;
			$data['username'] = $user->username;
			$data['email'] = $user->email;
			$data['register_ip'] = $user->register_ip;
			$data['last_login_ip'] = $user->last_login_ip;
			$data['group_name'] = $group->group_name;
			$data['mobile'] = $user->mobile;
			$data['web'] = $user->web;
			$data['qq'] = $user->qq;
			$data['addtime'] = $user->addtime;		
			$data['avatar'] = $user->avatar;
			$data['sign'] = $user->sign;
			
			//SEO
			$controller->_seoTitle = $user->username.' - '.Yii::t('common','User Space').' - '.$this->_setting['site_name'];
			//判断是否是自己
			if($uid == $user->uid)
			{
				$myself = true;
			}			
			//判断是否是好友
			$friend_mod = new Friend();
			$friend = $friend_mod->find('uid1=:uid AND uid2=:friendid', array(':uid'=>$uid, ':friendid'=>$user->uid));
			if(!$friend){
				$friend = $friend_mod->find('uid1=:uid AND uid2=:friendid', array(':uid'=>$user->uid, ':friendid'=>$uid));
			}
			
		}
		$controller->render('user_space', array('user'=>$data, 'myself'=>$myself, 'friend'=>$friend));
	}
}