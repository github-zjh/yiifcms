<?php
/**
 *  栏目管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new Catalog();
        
        //一级分类条件
        $criteria = new CDbCriteria();           
        $type = intval( Yii::app()->request->getParam( 'type' ) );        
        $type && $criteria->addColumnCondition(array('type' => $type ));
        $criteria->addColumnCondition(array('parent_id' => 0));
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;        
        $pages->applyLimit($criteria);
        $result = $model->findAll( $criteria );          
        $this->controller->render('index', array ( 'model' => $model, 'datalist' => $result , 'pages' => $pages));
	}
}