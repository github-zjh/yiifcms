<?php
/**
 * 编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){
		$model = $this->controller->loadModel();    	
    	if(isset($_POST['Page']))
    	{
    		$model->attributes=$_POST['Page'];  
    		//摘要
    		$model->introduce = trim($_POST['Page']['introduce'])?$_POST['Page']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Page']['content']), 200);    		
    		$model->update_time = time();    		
    		if($model->save()){    			
    			$this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
    		}
    	} 	        
    	$this->controller->render('update',array('model'=>$model));    	
	}
}