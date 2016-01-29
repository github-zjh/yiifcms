<?php
/**
 * 缓存管理
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 * 
 */
class CacheController extends Backend{
	
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'  => 'Index',    //缓存管理
            'update' => 'Update',   //更新缓存            
        ), 'application.modules.admin.controllers.cache');
        return array_merge($actions, $extra_actions);
    }
}
