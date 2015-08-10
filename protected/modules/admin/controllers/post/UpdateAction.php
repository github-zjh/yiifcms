<?php
/**
 * 文章编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run($id){
		$model = Post::model()->findByPk($id);    	
    	if(isset($_POST['Post']))
    	{
    		$model->attributes=$_POST['Post'];    		
    		//标题样式
    		$title_style = $this->_request->getPost('style');   
    		if($title_style['bold'] != 'Y'){
    			unset($title_style['bold']);
    		}
    		if($title_style['underline'] != 'Y'){
    			unset($title_style['underline']);
    		}
    		if(!$title_style['color']){
    			unset($title_style['color']);
    		}
    		if($title_style){    			
    			$model->title_style = serialize($title_style);
    		}else{
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
	    			$this->message('error', Yii::t('admin',$upload->_error));
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
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];
    		
    		//标签   (前10个标签有效) 		
    		$tags = trim($_POST['Post']['tags']);    		
    		$explodeTags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $tags)));    		
    		$explodeTags = array_slice($explodeTags, 0, 10);  
    		    		  	
    		//摘要
    		$model->introduce = trim($_POST['Post']['introduce'])?$_POST['Post']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Post']['content']), 200);
    		
    		$model->tags = implode(',',$explodeTags);
    		$model->update_time = time();
    		
    		if($model->save()){
    			//更新标签数据
				Tag::model()->updateTagData($explodeTags, array('content_id'=>$model->id, 'status'=>$model->status, 'type_id'=>$this->_type_ids['post']));
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    		}
    	}else{
    		$imageList = unserialize($model->image_list);
    		$style = unserialize($model->title_style);
    	}   	
    	    	
    	$this->controller->render('update',array(
    			'model'=>$model,
    			'imageList' => $imageList,
    			'style' => $style,
    	));    	
	}
}