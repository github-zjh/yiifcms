<?php
/**
 * 软件编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){
		$model = $this->controller->loadModel();    	
    	if(isset($_POST['Soft']))
    	{
    		$model->attributes=$_POST['Soft'];
            
    		//封面、图标、 文件
    		$model->cover_image = isset($_POST['cover_image']) ? $_POST['cover_image'] : '';
            $model->soft_icon = isset($_POST['soft_icon']) ? $_POST['soft_icon'] : ''; 
                   
            //内容相关
    		$model->content->attributes = $_POST['SoftContent'];
            $model->content->soft_file = isset($_POST['soft_file']) ? $_POST['soft_file'] : '';     
    		if($model->save() && $model->content->save()){    			
    			$this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
    		}
    	}
        $parents = Catalog::getParantsCatalog($model->catalog_id);
        $catalog = Catalog::model()->findByPk($model->catalog_id);
        $belong = $catalog ? implode('>', $parents) .'>'. $catalog->catalog_name : '';
    	$this->controller->render('update',array(
    			'model'=>$model,
                'parents'   => $belong,   			
    	));    	
	}
}