<?php
/**
 * KindEditor图片管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
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
                $data = array(
                    'file_name' => $uploader->file_name,
                    'file_path' => $uploader->file_path,
                    'thumb_path'=> $uploader->thumb_path,
                    'file_ext'  => $uploader->file_ext
                );
                //返回kindeditor接收的json格式
                exit(CJSON::encode(array('error'=>0, 'url'=>$uploader->file_path)));                
            } else {          
                exit(CJSON::encode(array('error'=>0, 'message'=>$error)));
            }
        }
    }
   
}