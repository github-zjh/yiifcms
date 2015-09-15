<?php
/**
 * 栏目分类
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class CatalogController extends Backend
{
	public $_catalog;
	protected $_model_type;	
	private $_model;
	
	public function init(){		
		//栏目
		parent::init();
		$this->_catalog = Catalog::model()->findAll();
		$this->_model_type = ModelType::model()->findAll();
	}
	/**
	 * 动作权限控制
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
            'index'    => 'Index',        //站点设置
            'create'   => 'Create',       //添加
            'update'   => 'Update',       //编辑
            'batch'    => 'Batch',        //批量操作
         
        ), 'application.modules.admin.controllers.catalog');
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
    		if(isset($_GET['id'])) {
                $this->_model=Catalog::model()->findbyPk($_GET['id']);            
            }
    		if($this->_model===null) {
                throw new CHttpException(404,'The requested page does not exist.');             
            }
    	}
    	return $this->_model;
    }

}