<?php
/**
 * 文章添加
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
		$model = new Post();       
    	if(isset($_POST['Post']))
    	{
    		$model->attributes=$_POST['Post'];
    		//标题样式
    		$title_style = Yii::app()->request->getPost('style');            
            if(isset($title_style['bold']) && $title_style['bold'] != 'Y'){
                unset($title_style['bold']);
            }
            if(isset($title_style['underline']) && $title_style['underline'] != 'Y'){
                unset($title_style['underline']);
            }
            if(isset($title_style['color']) && !$title_style['color']){
                unset($title_style['color']);
            }
            if($title_style) {
                $model->title_style = serialize($title_style);
            } else {    		
    			$model->title_style = '';
    		}
    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new Uploader;
	    		$upload->_thumb_width = 100;
	    		$upload->_thumb_height = 100;
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->controller->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->attach_file = $upload->_file_name;
	    		$model->attach_thumb = $upload->_thumb_name;
    		}else{
    			//未改变前的封面图片
    			$model->attach_file = $_POST['old_file'];
    			$model->attach_thumb = $_POST['old_thumb'];
    		}
    		//组图
    		$imageList = Yii::app()->request->getPost( 'imageList' );
    		$imageListSerialize = $this->controller->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];
    		
    		//标签(只要前10个标签)
    		$tags = trim($_POST['Post']['tags']);    		
    		$explodeTags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $tags)));    		
    		
    		$explodeTags = array_slice($explodeTags, 0, 10);  
    		$model->tags = implode(',',$explodeTags);
    		
    		//摘要
    		$model->introduce = trim($_POST['Post']['introduce'])?$_POST['Post']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Post']['content']), 200);
    		
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save()){
    			//更新标签数据
				Tag::model()->updateTagData($explodeTags, array('content_id'=>$model->id, 'status'=>$model->status, 'type_id'=>$this->controller->_type_ids['post']));
				$this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
    		}
    	}
    	//判断有无文章栏目
    	$article_cat = Catalog::model()->find('type=:type', array(':type'=>$this->controller->_type));
    	if(!$article_cat){
    		$this->controller->message('error',Yii::t('admin','No Catalog'),$this->controller->createUrl('index'));
    	}
    	$this->controller->render('create',array(
    			'model'     =>$model
    	));      	
	}
}