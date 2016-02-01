<?php
/**
 *  用户列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){
        $model = new User();
        //审核状态
        $user_status = array(
            'all'                => '所有',
            User::STATUS_AUDIT   => '待审核', 
            User::STATUS_DISABLE => '禁用', 
            User::STATUS_NORMAL  => '正常'
        );
        //条件
        $criteria = new CDbCriteria();       
        $groupid  = intval( Yii::app()->request->getParam( 'groupid' ) );
        $username = trim( Yii::app()->request->getParam( 'username' ) );
        $status = Yii::app()->request->getParam( 'status' , 'all');       
        $groupid > 0 && $criteria->addColumnCondition(array('groupid' => $groupid));        
        if($status != 'all') {
            $criteria->addSearchCondition('status', $status);
        }
        $criteria->addSearchCondition('username', $username);
        $criteria->order = 'uid ASC';        
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ('datalist' => $result , 'pagebar' => $pages, 'status' => $status, 'user_status' => $user_status));
	}
}