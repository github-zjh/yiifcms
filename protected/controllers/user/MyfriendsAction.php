<?php
/**
 * 我的好友
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class MyfriendsAction extends CAction
{
	public $_seoTitle;
	public $_setting;
	public $_static_public;
	public $_stylePath;
	
	public function run(){
		$controller  = $this->getController();	
		$controller->layout = 'main';	
		$this->_setting = $controller->_setting;	
		$this->_stylePath = $controller->_stylePath;
		$this->_static_public = $controller->_static_public;	
		
		$this->_seoTitle = Yii::t('common','User Center').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");		
		
		//我的好友
		$uid = Yii::app()->user->id;	
		$friend_mod = new Friend();		
		$uid = Yii::app()->user->id;
		$criteria = new CDbCriteria();
		$criteria->condition = 't.uid1='.$uid.' OR t.uid2='.$uid;
		$criteria->order = 't.id DESC';
		
		//分页
		$count = $friend_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;
		$criteria->limit = $pages->pageSize;
		$criteria->offset = $pages->currentPage * $pages->pageSize;
		$datalist = $friend_mod->findAll($criteria);
		foreach((array)$datalist as $k =>$v){
			if($v->uid1 == $uid){
				$user = User::model()->findByPk($v->uid2);
			}else{
				$user = User::model()->findByPk($v->uid1);
			}
			$datalist[$k]['friend_name'] = $user->username;
			$datalist[$k]['friend_id'] = $user->uid;
		}
		
		$controller->render('my_friends', array('datalist'=>$datalist, 'pages'=>$pages));
	}

}