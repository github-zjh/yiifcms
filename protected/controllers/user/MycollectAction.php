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
				
		$this->_setting = $controller->_setting;	
		$this->_stylePath = $controller->_stylePath;
		$this->_static_public = $controller->_static_public;	
		
		//SEO
		$controller->_seoTitle = Yii::t('common','User Center').' - '.Yii::t('common','Collect Manage').' - '.$this->_setting['site_name'];
		
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");		
		
		//收藏列表
		$collect_mod = new Collect();
		$uid = Yii::app()->user->id;			
		$criteria = new CDbCriteria();		
		$criteria->condition = 't.user_id='.$uid;
		$criteria->order = 't.id DESC';		
		
		//分页
		$count = $collect_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;		
		$criteria->limit = $pages->pageSize;
		$criteria->offset = $pages->currentPage * $pages->pageSize;				
		$datalist = $collect_mod->findAll($criteria);
		$controller->render('my_collect', array('datalist'=>$datalist, 'pages'=>$pages));
	}

}