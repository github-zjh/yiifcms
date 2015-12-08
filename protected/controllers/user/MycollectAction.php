<?php
/**
 * 我的收藏
 * 
 * @author        Sim Zhao <326196998@qq.com>
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
		
		//收藏列表
		$collect_mod = new Collect();
		$uid = Yii::app()->user->id;			
		$criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('t.user_id' => $uid));		
		$criteria->order = 't.id DESC';		
		
		//分页
		$count = $collect_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;		
		$pages->applyLimit($criteria);				
		$datalist = $collect_mod->findAll($criteria);
		$controller->render('my_collect', array('datalist'=>$datalist, 'pages'=>$pages));
	}

}