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
        
        $model = new ModelType();        
        //条件
        $criteria = new CDbCriteria();        
        
        $type_name = trim(Yii::app()->request->getParam('type_name'));        
        $type_name && $criteria->addSearchCondition('type_name', $type_name);        
        $criteria->order = 't.id ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ('model' => $model, 'datalist' => $result , 'pagebar' => $pages ));
	}
}