<?php
/**
 * 广告管理
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 * 
 */
class AdController extends Backend
{
	public $_adposition = ''; //广告位
	
	public function init(){
		parent::init();
		//广告位
		$positions = AdPosition::model()->findAll(array('condition' => 'status = "'.AdPosition::STATUS_SHOW.'"'));
		foreach((array)$positions as $pv){
			$this->_adposition[''] = "==请选择广告位=="; 
			$this->_adposition[$pv->id] = $pv->title;
		}
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'  => 'Index',    //列表页
            'create' => 'Create',   //创建
            'update' => 'Update',   //编辑
            'batch'  => 'Batch',    //批量操作
            'uploadSimple' => 'UploadSimple', //ajax上传
        ), 'application.modules.admin.controllers.ad');
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
                $this->model = Ad::model()->findbyPk($_GET['id']);
            }
            if ($this->model === null) {
                throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
            }
        }
        return $this->model;
    }

}
