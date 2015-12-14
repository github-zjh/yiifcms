<?php
/**
 * 添加好友操作
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class AddfriendAction extends CAction
{	
	public function run(){
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
					$exist_friend = $friend_mod->find('user_id = :uid AND friend_user_id = :friendid', array(':uid'=>$uid, ':friendid'=>$friendid));					
					if($exist_friend){
						$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You are Friend'));
					}else{
						//添加好友
						$friend_mod->user_id = $uid;
						$friend_mod->friend_user_id = $friendid;						
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
