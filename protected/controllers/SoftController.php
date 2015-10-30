<?php
/**
 * 前端软件控制器
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class SoftController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'soft';
		//栏目		
		$this->_catalog = Catalog::model()->getCatalog($this->_type_ids['soft']);
	}
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //列表
            'view'     => 'View',           //详情
            'download' => 'Download',       //下载           
        ), 'application.controllers.soft');
        return array_merge($actions, $extra_actions);    
    }   
  
}
 
