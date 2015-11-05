<?php

/**
 * 修改基本资料
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */

class SettingAction extends CAction
{	
	public function run(){
       $this->_seoTitle = Yii::t('common','User Setting').' - '.Yii::t('common','Setting Profile').' - '.$this->_setting['site_name'];
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/jquery.Jcrop.min.css");		
		
	    $model = $this->loadModel();	   
	    
	    //判断账号是否已激活
	    if($this->_active_need && $model->status == -1){
	    	$this->redirect($this->createUrl('activeEmail'));
	    }
	     
	    $old_avatar = $model->avatar;	   
	  	    
	    if(isset($_POST['User'])){
	    	$model->attributes = array_map('trim',$_POST['User']);
	    	//把确定上传的头像重命名
	    	$new_avatar =  str_replace('old_','',$model->avatar);	 
	    	rename($model->avatar,$new_avatar);
	    	$model->avatar = $new_avatar;    		    	
	    	if($model->save()){	    	
	    		if($old_avatar != $model->avatar){
	    			Uploader::deleteFile($old_avatar);	    		   			
	    		}	
	    		//删除游离的图片
	    		$avatar_path =  'uploads/avatar';
	    		$old_files = Helper::scanfDir($avatar_path, true);	    		
	    		foreach((array)$old_files['files'] as $old){		    			    			  			
	    			$path_parts = pathinfo ( $old );
    				if (! strstr ( $path_parts ['basename'], $model->uid.'_old_' )) {
    					continue;
    				}
    				Uploader::deleteFile($old);	    			
	    		}	   		  
				//同步昵称
				Yii::app()->user->nickname = $model->nickname;
				//提示信息
				Yii::app()->user->setFlash('success',Yii::t('common','Update Profile Success'));	    		
	    	}
	    }
		$this->render('setting_profile', array('model'=>$model));
	}

}
