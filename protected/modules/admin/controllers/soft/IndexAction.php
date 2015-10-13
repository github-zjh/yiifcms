<?php
/**
 * 软件列表管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
		$model = new Soft();
        //条件
        $criteria = new CDbCriteria();        
        $title = trim( Yii::app()->request->getParam( 'title' ) );        
        $catalogId = intval( Yii::app()->request->getParam( 'catalogId' ) );
        $criteria->addColumnCondition(array('type' => $this->controller->_type ));      
        $title && $criteria->addSearchCondition('title', $title);        
        $catalogId && $criteria->addColumnCondition(array('catalog_id' => $catalogId));
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 10;        
        $pages->applyLimit($criteria);
        $result = $model->findAll( $criteria );
        
        $this->controller->render( 'index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages) );
	}
}