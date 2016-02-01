<?php
/**
 *  广告列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        
        $model = new Ad();        
        //条件
        $criteria = new CDbCriteria();        
        $title = trim(Yii::app()->request->getParam('title'));
        $position_id = intval(Yii::app()->request->getParam('position_id'));
        $title && $criteria->addColumnCondition(array('title' =>$title));
        $position_id && $criteria->addColumnCondition(array('position_id', $position_id));
        $criteria->order = 't.id ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages ));
	}
}