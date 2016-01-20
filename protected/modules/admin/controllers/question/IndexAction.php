<?php
/**
 *  留言列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        
        $model = new Question();        
        //条件
        $criteria = new CDbCriteria();       
        $realname = trim( Yii::app()->request->getParam( 'realname' ) );
        $question = trim( Yii::app()->request->getParam( 'question' ) );
        $question && $criteria->addSearchCondition('question', $question);
        $realname && $criteria->addSearchCondition('realname', $realname);
        $criteria->order = 't.id ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ( 'model' => $model, 'datalist' => $result , 'pagebar' => $pages ));
	}
}