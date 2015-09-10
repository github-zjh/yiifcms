<?php
/**
 * 添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
		$model = new Page();       
    	if(isset($_POST['Page']))
    	{
    		$model->attributes=$_POST['Page'];
            //摘要
    		$model->introduce = trim($_POST['Page']['introduce'])?$_POST['Page']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Page']['content']), 200);            
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save()){    			
				$this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
    		}
    	}    	
    	$this->controller->render('create',array(
    			'model'     =>$model
    	));      	
	}
}