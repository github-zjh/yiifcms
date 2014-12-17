<?php
/**
 * 添加好友操作
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class AddfriendAction extends CAction
{
	public $_seoTitle;
	public $_setting;
	public $_static_public;
	public $_stylePath;	
		
	public function run(){	
		$controller  = $this->getController();
		$uid = Yii::app()->user->id;
		$ret = array();
		if(!$uid){
			$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You Need Login'));
		}else{
			$act = Yii::app()->request->getParam('act');
			$friendid = Yii::app()->request->getParam('id');
			$friend = User::model()->findByPk($friendid);
			if(!$friend){
				$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Add Friend Failed'));
			}else{
				$friend_mod = new Friend();
				if($act == 'friend'){
					$exist_friend = $friend_mod->find('uid1=:uid AND uid2=:friendid', array(':uid'=>$uid, ':friendid'=>$friendid));
					if(!$exist_friend){
						$exist_friend = $friend_mod->find('uid1=:uid AND uid2=:friendid', array(':uid'=>$friendid, ':friendid'=>$uid));
					}
					if($exist_friend){
						$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You`are Friend'));
					}else{
						//添加好友
						$friend_mod->uid1 = $uid;
						$friend_mod->uid2 = $friendid;						
						if($friend_mod->save()){							
							$ret = array('state'=>'success', 'message'=>Yii::t('common', 'Add Friend Success'));
						}else{
							$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Add Friend Failed'));
						}
					}
					
				}else{
					$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Operation Failed'));				
				}
		
			}
		}
		exit(CJSON::encode($ret));
		
	}

}
