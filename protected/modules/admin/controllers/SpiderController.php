<?php
/**
 * 数据采集
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SpiderController extends Backend
{	
    public $postModel = null;
    public $imageModel = null;
    public $softModel = null;
    public $videoModel = null;
    public $_catalog = array();
    
    /*var $charset 数据采集编码*/
    public $charset = array(
        'UTF-8' => 'UTF-8',
        'GBK'   => 'GBK',
        'GB2312'=> 'GB2312'
    );
    
    /*@var $status 数据采集状态*/
    public $status = array();
    
    public function init()
    {
        parent::init();
        $this->status = array(            
            SpiderPostList::STATUS_NONE_C  => '未采集',
            SpiderPostList::STATUS_C       => '已采集',
            SpiderPostList::STATUS_SUCCESS => '已导入',
        );
    }
    /**
     * 所有动作
     */
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',             //采集设置
            'create'       => 'Create',            //添加采集站点
            'update'       => 'Update',            //更新采集站点
            'batch'        => 'Batch',             //批量操作  
            'post'         => 'Post',              //文章采集列表
            'postCreate'   => 'PostCreate',        //添加文章数据
            'postUpdate'   => 'PostUpdate',        //更新文章数据
            'postImport'   => 'PostImport',        //文章导入
            'image'        => 'Image',             //图集采集
            'imageCreate'  => 'ImageCreate',       //添加图集数据
            'imageUpdate'  => 'ImageUpdate',       //更新图集数据
            'imageImport'  => 'ImageImport',       //图集导入
            'soft'         => 'Soft',              //软件采集
            'softCreate'   => 'SoftCreate',        //添加软件数据
            'softUpdate'   => 'SoftUpdate',        //更新软件数据
            'softImport'   => 'SoftImport',        //软件导入
            'video'        => 'Video',             //视频采集
            'videoCreate'  => 'VideoCreate',       //添加视频采集数据
            'videoUpdate'  => 'VideoUpdate',       //更新视频数据
            'videoImport'  => 'VideoImport',       //视频导入
            'ajax'         => 'Ajax',              //Ajax请求
            'uploadSimple' => 'UploadSimple',      //上传单个图片
        ), 'application.modules.admin.controllers.spider');
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
                $this->model = SpiderSetting::model()->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }
    
    /**
     * 判断文章列表数据是否存在
     * 
     * return \$this->postModel
     */
    public function loadPostModel()
    {
    	if ($this->postModel === null) {
            if (isset($_GET['id'])) {
                $this->postModel = SpiderPostList::model()->with('content')->findbyPk($_GET['id']);
            }
            if ($this->postModel === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->postModel;
    }
    
    /**
     * 判断图片列表数据是否存在
     * 
     * return \$this->imageModel
     */
    public function loadImageModel()
    {
    	if ($this->imageModel === null) {
            if (isset($_GET['id'])) {
                $this->imageModel = SpiderImageList::model()->with('content')->findbyPk($_GET['id']);
            }
            if ($this->imageModel === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->imageModel;
    }
    
    /**
     * 判断软件列表数据是否存在
     * 
     * return \$this->postModel
     */
    public function loadSoftModel()
    {
    	if ($this->softModel === null) {
            if (isset($_GET['id'])) {
                $this->softModel = SpiderSoftList::model()->with('content')->findbyPk($_GET['id']);
            }
            if ($this->softModel === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->softModel;
    }
    
    /**
     * 判断视频列表数据是否存在
     * 
     * return \$this->videoModel
     */
    public function loadVideoModel()
    {
    	if ($this->videoModel === null) {
            if (isset($_GET['id'])) {
                $this->videoModel = SpiderVideoList::model()->with('content')->findbyPk($_GET['id']);
            }
            if ($this->videoModel === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->videoModel;
    }
    
    /**
     * 格式化 无http或者无https的详情页链接
     * 
     * @param string $url  站点url
     * @param string $view_url  详情链接url
     * @return string
     */
    public function formatViewUrl($url = '', $view_url = '')
    {
        if(stripos($view_url, 'http') === false) {
            $parse_url = parse_url($url);
            $scheme = $parse_url['scheme'];
            $host = $parse_url['host'];
            $view_url = $scheme. '://'.$host.'/'.ltrim($view_url, '\/');
        }
        return $view_url;
    }
}
