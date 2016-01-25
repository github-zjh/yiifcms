<?php
/**
 * 前端视频控制器
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class VideoController extends FrontBase
{
	protected $_catalog;
	protected $_video_type;
	protected $_menu_unique;
	
	public function init(){
		parent::init();
		//一级栏目
		$this->_catalog = Catalog::getTopCatalog(true, $this->_type_ids['video']);
		$this->_video_type = array(
                '' => '未知',
				'comedy'=>'喜剧',
				'active'=>'动作',
				'story' => '剧情',
				'science'=>'科幻',
				'terrified'=>'惊悚',
				'war'=>'战争',
				'sexy'=>'伦理'
		);
		//导航标示
		$this->_menu_unique = 'video';
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',          //列表
            'view'     => 'View',           //详情
            'score'    => 'Score',          //评分
            'download' => 'Download',       //下载
            'ajax'     => 'Ajax',           //ajax操作
        ), 'application.controllers.video');
        return array_merge($actions, $extra_actions);    
    }  
  
}