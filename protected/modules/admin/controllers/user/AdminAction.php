<?php
/**
 *  管理员用户列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class AdminAction extends CAction
{	
	public function run(){
        $model = new User();
        
        //条件        
        $criteria = new CDbCriteria();
        $username = trim( Yii::app()->request->getParam( 'username' ) );
        $criteria->addSearchCondition('username', $username);
        $criteria->addColumnCondition(array('status' => User::STATUS_NORMAL, 'groupid' => User::AdminGroupID));       
    	$criteria->order = 'uid DESC';   
        $count = $model->count($criteria);
        
        //分页
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        
        //查询
        $result = $model->findAll($criteria);
        $this->controller->render('index', array ('adminPage'=>1,'datalist' => $result , 'pagebar' => $pages ));
	}
}