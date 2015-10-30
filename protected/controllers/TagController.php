<?php
/**
 * Tag控制器
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class TagController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	protected $_tags;
	
	public function init(){
		parent::init();
		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //详情
            'all'      => 'All',            //所有标签
            'ajax'     => 'Ajax',            //搜索
        ), 'application.controllers.tag');
        return array_merge($actions, $extra_actions);    
    }
    
}
