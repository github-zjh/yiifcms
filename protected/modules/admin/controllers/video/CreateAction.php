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
		$model = new Video();       
    	if(isset($_POST['Video']))
    	{
    		$model->attributes=$_POST['Video'];
    		
    		//封面、文件
    		$model->cover_image = isset($_POST['cover_image']) ? $_POST['cover_image'] : '';           
            $model->video_file = isset($_POST['video_file']) ? $_POST['video_file'] : ''; 
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save()){    			
				$this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
    		}
    	}
    	//判断有无栏目
    	$article_cat = Catalog::model()->find('type=:type', array(':type'=>$this->controller->_type));
    	if(!$article_cat){
    		$this->controller->message('error',Yii::t('admin','No Catalog'),$this->controller->createUrl('index'));
    	}
    	$this->controller->render('create',array(
    			'model'     =>$model
    	));      	
	}
}