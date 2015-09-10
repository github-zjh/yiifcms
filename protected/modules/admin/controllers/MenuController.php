<?php
/**
 * 导航菜单
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class MenuController extends Backend
{
	public $_menu;
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
	public function init(){		
		//菜单
		parent::init();
		$this->_menu = Menu::model()->findAll();		
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
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //站点设置
            'create'   => 'Create',       //添加
            'update'   => 'Update',       //编辑
            'batch'    => 'Batch',        //批量操作
         
        ), 'application.modules.admin.controllers.menu');
        return array_merge($actions, $extra_actions);
    }
	
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
    	if($this->_model===null)
    	{
    		if(isset($_GET['id']))
    			$this->_model=Menu::model()->findbyPk($_GET['id']);
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }

}