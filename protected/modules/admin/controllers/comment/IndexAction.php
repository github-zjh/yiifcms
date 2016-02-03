<?php
/**
 *  列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        
        $model = new Comment();        
        //条件
        $criteria = new CDbCriteria();
        $type = trim(Yii::app()->request->getParam('type'));        
        $type && $criteria->addColumnCondition(array('type' => $type));
        $status = trim(Yii::app()->request->getParam('status'));        
        $status && $criteria->addColumnCondition(array('status' => $status)); 
        $title = trim(Yii::app()->request->getParam('content'));        
        $title && $criteria->addSearchCondition('content', $title);        
        $criteria->order = 't.id DESC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        
        //全部类型
        $model_types = ModelType::model()->findAll();

        $this->controller->render('index', array ('model' => $model, 'model_types' => $model_types, 'datalist' => $result , 'pagebar' => $pages ));
	}
}