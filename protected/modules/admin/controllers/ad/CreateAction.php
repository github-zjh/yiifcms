<?php
/**
 *  添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){        
        $model = new Ad();
        if (isset($_POST['Ad'])) {            
            $model->attributes = $_POST['Ad'];
            //图片
    		$model->attach_file = isset($_POST['attach_file']) ? $_POST['attach_file'] : '';
            if ($model->save()) {               
                $this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
            }
        }        
        $this->controller->render('create', array ('model' => $model ));
	}
}