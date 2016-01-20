<?php
/**
 * 列表管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
		$model = new RecommendPosition();
        //条件
        $criteria = new CDbCriteria();        
        $title = Yii::app()->request->getParam('title');        
        $title && $criteria->addSearchCondition('title', $title);
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;        
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll( $criteria );        
        $this->controller->render( 'index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages ) );
	}
}