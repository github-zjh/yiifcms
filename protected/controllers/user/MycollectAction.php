<?php
/**
 * 我的收藏
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class MycollectAction extends CAction
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
		//收藏列表
		$uid = Yii::app()->user->id;	
		$profile = User::model()->findByPk($uid);
		$controller->render('mycollect', array('profile'=>$profile));
	}

}