<?php
/**
 *  专题列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new Special();
        //查询条件
        $criteria = new CDbCriteria();        
        $title = Yii::app()->request->getParam( 'title' );       
        $title && $criteria->addSearchCondition('title', $title);
        $criteria->order = 't.id DESC';
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;       
        $pages->applyLimit($criteria);
        
        //结果
        $result = $model->findAll( $criteria );
        $this->controller->render( 'index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages ) );
	}
}