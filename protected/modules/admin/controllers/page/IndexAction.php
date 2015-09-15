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
		$model = new Page();
        //条件
        $criteria = new CDbCriteria(); 
        $condition = '1';
        $title = Yii::app()->request->getParam('title');
        $titleAlias = Yii::app()->request->getParam('titleAlias');
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $titleAlias && $condition .= ' AND title_alias LIKE \'%' . $titleAlias . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        //分页
        $pages = new CPagination( $count );
        $pages->pageSize = 10;        
        $pages->applyLimit($criteria);
        //查询
        $result = $model->findAll( $criteria );
        $this->controller->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
	}
}