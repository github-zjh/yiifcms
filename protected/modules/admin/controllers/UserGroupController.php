<?php
/**
 * 用户组管理控制器
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class UserGroupController extends Backend
{
   
    /**
     * 所有动作
     */
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',             //用户组列表           
            'create'       => 'Create',            //用户组添加
            'update'       => 'Update',            //用户组编辑
        ), 'application.modules.admin.controllers.usergroup');
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
                $this->model=UserGroup::model()->findbyPk($_GET['id']);            
            }
    		if($this->model===null) {
                throw new CHttpException(404,Yii::t('common', 'The requested page does not exist.'));            
            }
    	}
    	return $this->model;
    }  
}
