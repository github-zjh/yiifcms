<?php
/**
 * 栏目分类
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class CatalogController extends Backend
{	
	protected $_model_type;	
	
	public function init(){		
		//栏目
		parent::init();
        $this->_catalog = Catalog::getTopCatalog();
		$this->_model_type = ModelType::model()->findAll();
	}

    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //站点设置
            'create'   => 'Create',       //添加
            'update'   => 'Update',       //编辑
            'batch'    => 'Batch',        //批量操作
            'children' => 'Children',     //获取子分类
        ), 'application.modules.admin.controllers.catalog');
        return array_merge($actions, $extra_actions);
    }
   
    /**
     * 判断数据是否存在
     * 
     */
    public function loadModel()
    {
    	if($this->model===null)
    	{
    		if(isset($_GET['id'])) {
                $this->model=Catalog::model()->findbyPk($_GET['id']);            
            }
    		if($this->model===null) {
                throw new CHttpException(404,'The requested page does not exist.');             
            }
    	}
    	return $this->model;
    }

}