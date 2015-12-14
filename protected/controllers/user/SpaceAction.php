<?php
/**
 * 个人空间
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */

class SpaceAction extends CAction
{
	public $_request;	
	public function run($id){
		$controller  = $this->getController();		
		$myself = false;
		
		//用户信息
		$user = User::model()->findByPk($id);
		//当前登录用户
		$uid = Yii::app()->user->id;
		if(!$user){
			throw new CHttpException(404, Yii::t('common','The requested page does not exist.'));			
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
			$controller->_seoTitle = $user->username.' - '.Yii::t('common','User Space').' - '.$controller->_setting['site_name'];
			//判断是否是自己
			if($uid == $user->uid)
			{
				$myself = true;
			}			
			//判断是否是好友
			$friend_mod = new Friend();
			$friend = $friend_mod->find('user_id = :uid AND friend_user_id =:friendid', array(':uid'=>$uid, ':friendid'=>$user->uid));			
		}
		$controller->render('user_space', array('user'=>$data, 'myself'=>$myself, 'friend'=>$friend));
	}
}