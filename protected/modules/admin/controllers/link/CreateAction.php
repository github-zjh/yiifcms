<?php
/**
 *  添加
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){        
        $model = new Link();
        if (isset($_POST['Link'])) {            
            $model->attributes = $_POST['Link'];
            $model->logo = isset($_POST['logo']) ? $_POST['logo'] : '';
            if ($model->save()) {               
                $this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
            }
        }        
        $this->controller->render('create', array ('model' => $model ));
	}
}