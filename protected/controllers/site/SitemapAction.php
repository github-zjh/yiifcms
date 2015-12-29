<?php
/**
 *  网站地图列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class SitemapAction extends CAction
{	
	public function run(){
		$this->controller->layout = false;
		//rss创建
		$obj = new Sitemap();
        $rss = $obj->show();        
		$this->controller->render('sitemap',array('rss'=>$rss));      
	}
}