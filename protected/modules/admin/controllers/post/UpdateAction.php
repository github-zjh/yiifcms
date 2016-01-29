<?php
/**
 * 文章编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){
		$model = $this->controller->loadmodel();    	
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
    		if($title_style){    			
    			$model->title_style = serialize($title_style);
    		}else{
    			$model->title_style = '';
    		}
            //内容相关
            $model->content->attributes = $_POST['PostContent'];
    		
    		if($model->save() && $model->content->save()){    			
    			$this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
    		}
    	}else{    		
    		$style = unserialize($model->title_style);
    	}   	        
        $parents = Catalog::getParantsCatalog($model->catalog_id);
        $catalog = Catalog::model()->findByPk($model->catalog_id);
        $belong = $catalog ? implode('>', $parents) .'>'. $catalog->catalog_name : '';
    	$this->controller->render('update',array(
    			'model'=>$model,    			
    			'style' => $style,
                'parents' => $belong,
    	));    	
	}
}