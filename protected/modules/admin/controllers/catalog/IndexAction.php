<?php
/**
 *  栏目管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){		
        $datalist = Catalog::get(0, $this->controller->_catalog);              
        $this->controller->render('index', array ('datalist' => $datalist ));
	}
}