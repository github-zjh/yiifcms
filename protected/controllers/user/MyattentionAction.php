<?php
/**
 * 我的关注
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class MyattentionAction extends CAction
{
	public $_seoTitle;
	public $_setting;
	public $_static_public;
	public $_stylePath;
	
	public function run(){
		$controller  = $this->getController();			
		$this->_setting = $controller->_setting;	
		$this->_stylePath = $controller->_stylePath;
		$this->_static_public = $controller->_static_public;	
		
		$controller->_seoTitle = Yii::t('common','User Center').' - '.Yii::t('common','Attention Manage').' - '.$this->_setting['site_name'];
		
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");		
		
		//关注列表
		$attention_mod = new Attention();
		$uid = Yii::app()->user->id;			
		$criteria = new CDbCriteria();		
		$criteria->condition = 't.user_id='.$uid;
		$criteria->order = 't.id DESC';		
		
		//分页
		$count = $attention_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;		
		$criteria->limit = $pages->pageSize;
		$criteria->offset = $pages->currentPage * $pages->pageSize;				
		$datalist = $attention_mod->findAll($criteria);				
		$controller->render('my_attention', array('datalist'=>$datalist, 'pages'=>$pages));
	}

}