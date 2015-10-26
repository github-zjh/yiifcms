<?php
/**
 *  列表管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new OAuth();
        //条件
        $criteria = new CDbCriteria();
        $apiname   = trim( Yii::app()->request->getParam( 'apiname' ) );             
        $apiname && $criteria->addSearchCondition('apiname', $apiname);
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 10;        
        $pages->applyLimit($criteria);
        $result = $model->findAll( $criteria );        
        
        $this->controller->render( 'index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages) );
	}
}