<?php
/**
 *  邮件设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class EmailAction extends CAction
{	
	public function run(){		
        if(isset($_POST['Setting']) && $_POST['Setting']) {
            $this->controller->updateData($_POST['Setting'], 'email');        
        } else {            
            $this->controller->render('email', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'email'))));        
        }
	}
}