<?php
/**
 * KindEditor图片管理
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 * 
 */
class KindEditorController extends Backend
{		
	
    /**
	 * KindEditor管理
	 *
	 */
    public function actionIndex ()
    {  
    	Yii::import('application.widget.kindeditor.file_manager_json',true);     	
    }
    
    /**
     * 文件上传
     */
    public function actionUpload()
    {
        $uploader = new Uploader();
        if(Yii::app()->request->isPostRequest) {
            //断点上传
            $uploader->initSimple('kindeditor')->uploadSimple('kindeditor_file');
            $error = $uploader->getError();
            if (!$error) {                
                //返回kindeditor接收的json格式
                exit(CJSON::encode(array('error'=>0, 'url'=> Helper::getFullUrl($uploader->file_path))));                
            } else {          
                exit(CJSON::encode(array('error'=>0, 'message'=>$error)));
            }
        }
    }
   
}