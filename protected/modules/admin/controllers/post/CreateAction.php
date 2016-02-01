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
        $model->content = new PostContent();
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
    		
    		if($model->save()){
                //更新内容
                $model->content->attributes = $_POST['PostContent'];
                $model->content->post_id = $model->id;
                $model->content->save();    			
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