<?php
/**
 * 数据采集
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SpiderController extends Backend
{	
    public $charset = array(
        'UTF-8' => 'UTF-8',
        'GBK'   => 'GBK',
        'GB2312'=> 'GB2312'
    );
    
    /**
     * 所有动作
     */
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'        => 'Index',             //采集设置
            'create'       => 'Create',            //添加采集站点
            'update'       => 'Update',            //更新采集站点
            'batch'        => 'Batch',             //批量操作  
            'post'         => 'Post',              //文章采集
            'image'        => 'Image',             //图集采集            
        ), 'application.modules.admin.controllers.spider');
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
                $this->model = SpiderSetting::model()->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }  
}
