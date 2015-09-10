<?php
/**
 *  栏目添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){		
        $model = new Catalog();    	
    	if(isset($_POST['Catalog']))
    	{    		
    		$model->attributes=$_POST['Catalog'];     		
    		$now = time();
    		$model->create_time = $now;
    		$model->update_time = $now;
    		if($model->save()) {                
                $this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));                
            }
    	}
    	$parentId = intval(Yii::app()->request->getParam('id'));
    	$this->controller->render('create',array(
    			'model'=>$model,
    			'parentId' => $parentId
    	));
	}
}