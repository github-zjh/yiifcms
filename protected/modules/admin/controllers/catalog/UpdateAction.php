<?php
/**
 *  栏目编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){		
        $model=$this->controller->loadModel();         	
    	if(isset($_POST['Catalog']))
    	{    		
    		$model->attributes=$_POST['Catalog'];            
    		$now = time();    	
    		$model->update_time = $now;
    		if($model->save()) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));                
            }
    	}        
        $this->controller->render('update',array(
                'model'=>$model                   
        ));        
	}   
}