<?php
/**
 * 专题管理控制器类
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class SpecialController extends Backend
{	
	protected $_special;
	
	public function init(){
		parent::init();		
		//专题
		$this->_special = Special::model()->findAll('status=:status',array('status'=>'Y'));
	}
    
    /**
     * 所有动作
     */
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',             //专题列表
            'create'       => 'Create',            //专题添加
            'update'       => 'Update',            //专题编辑
            'batch'        => 'Batch',             //批量操作
            'uploadCover'  => 'UploadCover',       //封面图片上传
            'uploadBanner' => 'UploadBanner',      //横幅图片上传
        ), 'application.modules.admin.controllers.special');
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
                $this->model = Special::model()->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }  
}
