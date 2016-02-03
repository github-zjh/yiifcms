<?php
/**
 * 前端图集控制器
 *
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016 . All rights reserved. 
 */
class AlbumController extends FrontBase
{
	public $_catalog;
	public $_menu_unique;
	public $_tags;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::getTopCatalog(true, $this->_type_ids['album']);
		//导航标示
		$this->_menu_unique = 'album';
		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}	
    
    //所有动作
    public function actions()
    {
        $extra_actions = array(            
        );
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //列表
            'view'     => 'View',         //详情         
            'ajax'     => 'Ajax',         //ajax操作
        ), 'application.controllers.album');
        return array_merge($actions, $extra_actions);
    } 
}
 
