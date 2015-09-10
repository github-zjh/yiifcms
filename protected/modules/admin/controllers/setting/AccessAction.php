<?php
/**
 *  访问控制设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class AccessAction extends CAction
{	
	public function run(){		
        if(isset($_POST['Setting']) && $_POST['Setting']) {
            $this->controller->updateData($_POST['Setting'],'access');        
        } else {            
            $this->controller->render('access', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'access'))));        
        }
	}
}