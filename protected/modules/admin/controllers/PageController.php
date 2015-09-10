<?php
/**
 * 单页管理
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class PageController extends Backend
{
    /**
	 * 动作权限判断
	 * 
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
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'  => 'Index',    //列表页
            'create' => 'Create',   //添加文章
            'update' => 'Update',   //编辑文章
            'batch'  => 'Batch',    //批量操作            
        ), 'application.modules.admin.controllers.page');
        return array_merge($actions, $extra_actions);
    }     
}