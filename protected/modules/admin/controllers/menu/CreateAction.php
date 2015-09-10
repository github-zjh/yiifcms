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
        $model = new Menu();    	
    	if(isset($_POST['Menu']))
    	{    		
    		$model->attributes=$_POST['Menu'];     		    		
    		if($model->save()) {
                $this->controller->redirect(array('index'));    		            
            }
    	}    	
    	$this->controller->render('create',array(
    			'model'=>$model
    	));
	}
}