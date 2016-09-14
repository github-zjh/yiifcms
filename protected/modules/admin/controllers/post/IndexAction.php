<?php
/**
 * 文章列表管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
		$model = new Post();
        //条件
        $criteria  = new CDbCriteria();
        $status    = trim(Yii::app()->request->getParam('status'));
        $title     = trim( Yii::app()->request->getParam( 'title' ) );        
        $catalogId = intval( Yii::app()->request->getParam( 'catalogId' ) );
        $criteria->addColumnCondition(array('type' => $this->controller->_type ));
        if(!$status) {
            $status = $model::STATUS_SHOW;
        }
        $status != 'all' && $criteria->addColumnCondition(array('t.status' => $status));

        $title && $criteria->addSearchCondition('title', $title);        
        $catalogId && $criteria->addColumnCondition(array('catalog_id' => $catalogId));        
        $criteria->order = 't.id DESC';
        $criteria->with  = array ( 'catalog' );
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;        
        $pages->applyLimit($criteria);
        $result = $model->findAll( $criteria );

        //审核状态
        $statusList = array(
            'all'               => '所有',
            $model::STATUS_SHOW => '显示',
            $model::STATUS_HIDE => '隐藏'
        );

        $this->controller->render('index', array(
            'model'      => $model,
            'status'     => $status,
            'statusList' => $statusList,
            'datalist'   => $result,
            'pagebar'    => $pages
        ));
	}
}