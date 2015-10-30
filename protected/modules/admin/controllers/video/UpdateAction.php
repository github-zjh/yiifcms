<?php
/**
 * 视频编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){
		$model = $this->controller->loadModel();    	
    	if(isset($_POST['Video']))
    	{
    		$model->attributes=$_POST['Video'];
            
    		//封面、文件
    		$model->cover_image = isset($_POST['cover_image']) ? $_POST['cover_image'] : '';           
            $model->video_file = isset($_POST['video_file']) ? $_POST['video_file'] : '';
            
            //标签   (前5个标签有效) 		
    		$tags = trim($_POST['Video']['tags']);    		
    		$unique_tags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $tags)));    		
    		$explodeTags = array_slice($unique_tags, 0, 5);  
    		$model->tags = implode(',',$explodeTags);
            
    		$model->update_time = time();    		
    		if($model->save()){    			
    			$this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
    		}
    	}        
    	$this->controller->render('update',array(
    			'model'=>$model   			
    	));    	
	}
}