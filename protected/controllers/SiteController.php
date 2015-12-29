<?php
/**
 * 默认前端控制器
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SiteController extends FrontBase
{	
	protected $_menu_unique;
	
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'index';	
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'       => 'Index',          
            'error'       => 'Error',          
            'sitemap'     => 'Sitemap',
            'sitemapxsl'  => 'SitemapXsl',
            'version'     => 'Version',                 
        ), 'application.controllers.site');
        return array_merge($actions, $extra_actions);
    }
}
