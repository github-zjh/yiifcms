<?php
/**
 * 图集管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class ImageController extends Backend
{
	protected $_catalog;
	protected $_special;
	public $_type;
	
	public function init(){
		parent::init();
		//内容模型id
		$this->_type = $this->_type_ids['image'];
		//图集栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type=:type',array(':status'=>'Y',':type'=>$this->_type));
		//专题
		$this->_special = Special::model()->findAll('status=:status',array('status'=>'Y'));
	}
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
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
        ), 'application.modules.admin.controllers.image');
        return array_merge($actions, $extra_actions);
    }          
}
