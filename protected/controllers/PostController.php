<?php
/**
 * 文章内容控制器
 *
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016 . All rights reserved. 
 */
class PostController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	protected $_tags;
	
	public function init(){
		parent::init();
		//一级栏目
		$this->_catalog = Catalog::getTopCatalog(true, $this->_type_ids['post']);		
		//导航标示
		$this->_menu_unique = 'post';
		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}
    
	//所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //文章列表
            'view'     => 'View',           //详情
            'ajax'     => 'Ajax',           //ajax[收藏、关注]           
        ), 'application.controllers.post');
        return array_merge($actions, $extra_actions);
    }  
}
