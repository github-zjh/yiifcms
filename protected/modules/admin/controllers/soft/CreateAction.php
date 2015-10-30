<?php
/**
 * 软件添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
		$model = new Soft();       
    	if(isset($_POST['Soft']))
    	{
    		$model->attributes=$_POST['Soft'];
    		
    		//封面、图标、 文件
    		$model->cover_image = isset($_POST['cover_image']) ? $_POST['cover_image'] : '';
            $model->soft_icon = isset($_POST['soft_icon']) ? $_POST['soft_icon'] : ''; 
            $model->soft_file = isset($_POST['soft_file']) ? $_POST['soft_file'] : ''; 
    		
    		//摘要
    		$model->introduce = trim($_POST['Soft']['introduce'])?$_POST['Soft']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Soft']['content']), 200);    		
            
            //标签   (前5个标签有效) 		
    		$tags = trim($_POST['Soft']['tags']);    		
    		$unique_tags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $tags)));    		
    		$explodeTags = array_slice($unique_tags, 0, 5);  
    		$model->tags = implode(',',$explodeTags);
            
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