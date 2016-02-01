<?php
/**
 *  软件采集列表
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SoftAction extends CAction
{	
	public function run(){
        $model = new SpiderSoftList();
        //查询条件
        $criteria = new CDbCriteria();
        $gstatus = Yii::app()->request->getParam( 'status' );        
        $title = Yii::app()->request->getParam( 'title' );
        $status = isset($gstatus) ? $gstatus : SpiderSoftList::STATUS_C;
        $criteria->addColumnCondition(array('status' => $status));       
        $title && $criteria->addSearchCondition('title', $title);
        $criteria->order = 't.id DESC';
        $criteria->with = array('spiderset');
        $count = $model->count( $criteria );
        
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;       
        $pages->applyLimit($criteria);
        
        //结果
        $result = $model->findAll( $criteria );
        $this->controller->render( 'soft', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages, 'status' => $status ) );
	}
}