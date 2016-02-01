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
        $title = Yii::app()->request->getParam('title');
        $titleAlias = Yii::app()->request->getParam('titleAlias');
        $title && $criteria->addSearchCondition('title', $title);
        $titleAlias && $criteria->addSearchCondition('title_alias', $titleAlias);        
        $criteria->order = 't.id DESC';        
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