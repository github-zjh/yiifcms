<?php
/**
 * 自定义设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CustomAction extends CAction
{	
	public function run(){		
        if(isset($_POST['Setting']) && $_POST['Setting']) {
            $this->controller->updateData($_POST['Setting'], 'custom');            
        } else {
            $this->controller->render('custom', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'custom'))));        
        }
	}
}