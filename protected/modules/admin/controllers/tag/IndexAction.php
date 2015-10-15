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
        
        $model = new Tag();        
        //条件
        $criteria = new CDbCriteria();
        $tag_name = trim(Yii::app()->request->getParam('tag_name'));        
        $tag_name && $criteria->addSearchCondition('tag_name', $tag_name);        
        $criteria->order = 't.id ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ('model' => $model, 'datalist' => $result , 'pagebar' => $pages ));
	}
}