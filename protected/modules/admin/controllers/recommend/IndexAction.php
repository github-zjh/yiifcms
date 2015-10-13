<?php
/**
 * 推荐内容列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
		$model = new Recommend();
		$criteria = new CDbCriteria();
        $postion_id = intval(Yii::app()->request->getParam('position_id'));
		$title = trim(Yii::app()->request->getParam('title'));
        $postion_id && $criteria->addColumnCondition(array('position_id' => $postion_id));
        $title && $criteria->addSearchCondition('title', $title);
        
        //推荐位
		$recomPosition = $postion_id ? RecommendPosition::model()->findByPk($postion_id) : array();
        $recomTitle = $recomPosition ? $recomPosition->title : '全部';
        //模型表	        
        $count = $model->count($criteria);
        
    	//分页
        $pages = new CPagination( $count );
        $pages->pageSize = 20;        
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll( $criteria );        
        $this->controller->render( 'index', array ( 'model' => $model,  'recom_title'=>$recomTitle, 'datalist' => $result , 'pagebar' => $pages ) );
	}
}