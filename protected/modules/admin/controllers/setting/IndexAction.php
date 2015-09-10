<?php
/**
 *  站点设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){		
        if(isset($_POST['Setting']) && $_POST['Setting']) {
            $this->controller->updateData($_POST['Setting'],'base');        
        } else {
            //检查crypt加密是否支持
            $crypt = true;
            if(!function_exists('crypt') || !defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
                $crypt = false;
            }
            $this->controller->render('index', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'base')),'crypt'=>$crypt ));        
        }
	}
}