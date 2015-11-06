<?php
/**
 * 封面图片ajax上传
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UploadAvatarAction extends CAction
{	
	public function run(){
        $uploader = new Uploader();
        if(Yii::app()->request->isPostRequest) {
            //普通上传
            $uploader->initSimple('avatar')->uploadSimple('avatar');
            $error = $uploader->getError();
            if (!$error) {
                $data = array(                                  
                    'thumb_path'      => $uploader->thumb_path,
                    'thumb_path_full' => Helper::getFullUrl($uploader->thumb_path),
                    'file_ext'        => $uploader->file_ext
                );                
                App::response(200, 'success', $data);
            } else {                
                App::response(101 , $error);
            }
        }
	}
}