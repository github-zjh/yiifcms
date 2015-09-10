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
        $criteria = new CDbCriteria(); 
        $condition = '1';
        $title = Yii::app()->request->getParam('title');
        $titleAlias = Yii::app()->request->getParam('titleAlias');
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $titleAlias && $condition .= ' AND title_alias LIKE \'%' . $titleAlias . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据title, titleAlias查询
        $pageParams = $this->controller->buildCondition($_GET, array ('page_name_alias' , 'page_name' ));
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        $this->controller->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
	}
}