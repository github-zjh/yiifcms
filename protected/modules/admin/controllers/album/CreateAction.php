<?php
/**
 * 图集添加
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
		$model = new Album();       
        $model->content = new AlbumContent();
    	if(isset($_POST['Album']))
    	{
    		$model->attributes=$_POST['Album'];
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
    		//封面
    		$model->attach_file = isset($_POST['attach_file']) ? $_POST['attach_file'] : '';
            $model->attach_thumb = isset($_POST['attach_thumb']) ? $_POST['attach_thumb'] : '';   
            
            //组图
    		$imageList = isset($_POST['imagelist']) ? $_POST['imagelist'] : array();
            if($imageList) {
                $model->content->album_list = implode(',', $imageList);
            }
    		
    		if($model->save()){
                //保存内容
                $model->content->attributes = $_POST['AlbumContent'];
                $model->content->album_id = $model->id;
                $model->content->save();
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