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
        $criteria = new CDbCriteria();
        $condition = "type = ".$this->controller->_type;
        $title = trim( Yii::app()->request->getParam( 'title' ) );        
        $catalogId = intval( Yii::app()->request->getParam( 'catalogId' ) );
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';        
        $catalogId && $condition .= ' AND catalog_id= ' . $catalogId;
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据title,catelogId,titleAlias查询
        $pageParams = $this->controller->buildCondition( $_GET, array ( 'title' , 'catalogId' ) );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    
        //推荐位
        $recom_list = RecommendPosition::model()->findAll('type=:type', array(':type'=>$this->controller->_type), array('order'=>'id'));
        $this->controller->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ,'recom_list'=>$recom_list) );
	}
}