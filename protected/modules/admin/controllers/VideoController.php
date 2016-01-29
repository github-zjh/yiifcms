<?php
/**
 * 视频管理控制器类
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class VideoController extends Backend
{	
	public $_video_type;	
	public $_type;
	
	public function init(){
		parent::init();
		$this->_type = $this->_type_ids['video'];
		//视频栏目
		$this->_catalog = Catalog::getTopCatalog(true, $this->_type);
		$this->_video_type = array(
            'comedy'=>'喜剧',
            'active'=>'动作',
            'story' => '剧情',
            'science'=>'科幻',
            'terrified'=>'惊悚',
            'war'=>'战争', 
            'sexy'=>'伦理'
        );    	
	}	
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'  => 'Index',    //列表页
            'create' => 'Create',   //添加文章
            'update' => 'Update',   //编辑文章
            'batch'  => 'Batch',    //批量操作  
            'uploadSimple' => 'UploadSimple',   //图片ajax上传
            'uploadResumable' => 'UploadResumable',   //图片断点上传
        ), 'application.modules.admin.controllers.video');
        return array_merge($actions, $extra_actions);
    }      
	
    /**
     * 判断数据是否存在
     * 
     * return \$this->model
     */
    public function loadModel()
    {
    	if ($this->model === null) {
            if (isset($_GET['id'])) {
                $this->model = Video::model()->with('content')->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }   
}
