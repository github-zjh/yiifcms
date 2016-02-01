<?php
/**
 * 软件添加
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){
		$model = new Soft();
        $model->content = new SoftContent();
    	if(isset($_POST['Soft']))
    	{
    		$model->attributes=$_POST['Soft'];
    		
    		//封面、图标、 文件
    		$model->cover_image = isset($_POST['cover_image']) ? $_POST['cover_image'] : '';
            $model->soft_icon = isset($_POST['soft_icon']) ? $_POST['soft_icon'] : ''; 
            
    		if($model->save()){
                $model->content->attributes = $_POST['SoftContent'];
                $model->content->soft_file = isset($_POST['soft_file']) ? $_POST['soft_file'] : '';
                $model->content->soft_id = $model->id;
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