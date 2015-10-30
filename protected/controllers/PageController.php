<?php
/**
 * 单页内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class PageController extends FrontBase
{	
	public $_menu_unique;
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //详情               
        ), 'application.controllers.page');
        return array_merge($actions, $extra_actions);    
    }
  
}
