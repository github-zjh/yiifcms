<?php
/**
 * 我的好友
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class MyfriendsAction extends CAction
{
	
	public function run(){
		$controller  = $this->getController();	
		$controller->layout = 'main';			
		$controller->_seoTitle = Yii::t('common','User Center').' - '.$controller->_setting['site_name'];
        
		//我的好友
		$uid = Yii::app()->user->id;	
		$friend_mod = new Friend();
		$criteria = new CDbCriteria();
		$criteria->condition = 't.user_id='.$uid;
		$criteria->order = 't.id DESC';
		
		//分页
		$count = $friend_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;
		$pages->applyLimit($criteria);
		$datalist = $friend_mod->findAll($criteria);
		foreach((array)$datalist as $k =>$v){
			$user = User::model()->findByPk($v->friend_user_id);
			$datalist[$k]['friend_name'] = $user->username;			
		}		
		$controller->render('my_friends', array('datalist'=>$datalist, 'pages'=>$pages));
	}

}