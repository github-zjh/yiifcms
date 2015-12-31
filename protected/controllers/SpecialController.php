<?php
/**
 * 专题页控制器
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class SpecialController extends FrontBase
{	
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //专题页          
        ), 'application.controllers.special');
        return array_merge($actions, $extra_actions);    
    }   
  
}
 
