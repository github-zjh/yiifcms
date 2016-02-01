<?php
/**
 * 图集管理控制器类
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class AlbumController extends Backend
{	
	protected $_special;
	public $_type;
	
	public function init(){
		parent::init();
		//内容模型id
		$this->_type = $this->_type_ids['album'];
		//图集栏目
		$this->_catalog = Catalog::getTopCatalog(true, $this->_type);
		//专题
		$this->_special = Special::model()->findAll('status=:status',array('status'=>'Y'));
	}	
	
    /**
     * 所有动作
     *     
     */
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
        ), 'application.modules.admin.controllers.album');
        return array_merge($actions, $extra_actions);
    }
    
    /**
     * 判断数据是否存在
     * 
     * return \$this->model
     */
    public function loadModel()
    {
    	if($this->model===null)
    	{
    		if(isset($_GET['id'])) {
                $this->model = Album::model()->with('content')->findbyPk($_GET['id']);            
            }
    		if($this->model === null) {
                throw new CHttpException(404,Yii::t('common', 'The requested page does not exist.'));            
            }
    	}
    	return $this->model;
    }  
}
