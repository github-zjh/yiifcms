<?php
/**
 * 个人中心
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */


class IndexAction extends CAction
{	
	public function run(){
		$this->controller->_seoTitle = Yii::t('common','User Center').' - '.$this->controller->_setting['site_name'];		
		//基本资料
		$uid = Yii::app()->user->id;
		$profile = User::model()->with('group')->findByPk($uid);	
		$this->controller->render('index', array('profile'=>$profile));		
	}

}
