<?php
/**
 * 专题管理控制器类
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class SpecialController extends Backend
{
	protected $_catalog;
	protected $_special;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status',array('status'=>'Y'));
		//专题
		$this->_special = Special::model()->findAll('status=:status',array('status'=>'Y'));
	}
	
	/**
	 * 动作权限控制
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action_id = $action->id;
		if(!$this->checkAcl($controller.'/'.$action_id)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
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
}
