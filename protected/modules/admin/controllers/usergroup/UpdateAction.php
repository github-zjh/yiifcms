<?php
/**
 *  用户组编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){
        $model = $this->controller->loadModel();
        $has_acls = $model->acl ? explode(',', $model->acl) : array();
        if (isset($_POST['UserGroup'])) {             
            $model->attributes = $_POST['UserGroup'];            
            $model->acl = isset($_POST['acls']) ? $_POST['acls'] : '';   
            if ($model->save()) {               
                $this->controller->message('success',Yii::t('admin','Update Success'), $this->controller->createUrl('index'));
            }
        }        
        $this->controller->render('update', array ('model' => $model , 'acls' => $this->controller->acl(), 'has_acls'=>$has_acls));
	}
}