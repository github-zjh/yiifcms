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
		$model = new RecommendPosition();       
    	if(isset($_POST['RecommendPosition']))
    	{
    		$model->attributes=$_POST['RecommendPosition'];            
    		if($model->save()){    			
				$this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
    		}
    	}    	
    	$this->controller->render('create',array(
    			'model'     =>$model
    	));      	
	}
}