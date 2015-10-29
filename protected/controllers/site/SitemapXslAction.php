<?php
/**
 *  网站xsl索引
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class SitemapXslAction extends CAction
{	
	public function run(){
        $this->controller->layout = false;
		$this->controller->render('sitemapxsl');      
	}
}