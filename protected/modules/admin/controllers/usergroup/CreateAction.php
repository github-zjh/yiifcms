<?php
/**
 *  用户组添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
        $model = new UserGroup();        
        if (isset($_POST['UserGroup'])) {             
            $model->attributes = $_POST['UserGroup'];
            $model->acl = isset($_POST['acls']) ? $_POST['acls'] : array();           
            if ($model->save()) {               
                $this->controller->message('success',Yii::t('admin','Add Success'), $this->controller->createUrl('index'));
            }
        }        
        $this->controller->render('create', array ('model' => $model, 'acls' => $this->controller->acl()));
	}
}