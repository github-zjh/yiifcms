<?php
/**
 *  附件列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        
        $model = new Attachment();        
        //条件
        $criteria = new CDbCriteria();        
        $real_name = trim(Yii::app()->request->getParam('real_name'));
        $file_name = trim(Yii::app()->request->getParam('file_name'));
        $real_name && $criteria->addSearchCondition('real_name', $real_name);
        $file_name && $criteria->addSearchCondition('file_name', $file_name);
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