<?php
/**
 * 标签管理控制器类
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class TagController extends Backend
{
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',         //列表页            
            'reset'        => 'Reset',         //重新统计标签
            'batch'        => 'Batch',         //批量操作
            'words'        => 'Words',         //搜索词库
        ), 'application.modules.admin.controllers.tag');
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
                $this->model = Tag::model()->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }
}
