<?php
/**
 *  采集设置列表
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new SpiderSetting();
        //查询条件
        $criteria = new CDbCriteria();        
        $type = Yii::app()->request->getParam( 'type' );
        $title = Yii::app()->request->getParam( 'site' );       
        $type && $criteria->addColumnCondition(array('type' => $type));       
        $title && $criteria->addSearchCondition('site', $title);
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