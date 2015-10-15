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
        
        $model = new MailLog();        
        //条件
        $criteria = new CDbCriteria();
        $accept     = trim(Yii::app()->request->getParam( 'accept' ));   //收件人
        $subject    = trim(Yii::app()->request->getParam( 'subject' ));  //主题
        $start_time = Yii::app()->request->getParam( 'start_time' );  
        $end_time   = Yii::app()->request->getParam( 'end_time' );        
               
        $accept && $criteria->addSearchCondition('accept', $accept);
        $subject && $criteria->addSearchCondition('subject', $subject);
        $start_time && $criteria->compare('sendtime', '>='.strtotime($start_time));
        $end_time && $criteria->compare('sendtime', '<='.strtotime($end_time));
        $criteria->order = 't.id DESC';        
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