<?php
/**
 * 头像剪切
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class AvatarCutAction extends CAction
{	
	public function run(){
        $uploader = new Uploader();
        if(Yii::app()->request->isPostRequest) {
            //开始剪切
            $image = $_POST['file'];            
            $uploader->initSimple('avatar');
            $cut_image = $uploader->imageCut($image, 
                array(
                    'cut_w' => 100,
                    'cut_h' => 100,
                    'pos_x' => $_POST['x'],
                    'pos_y' => $_POST['y'],
                )
            );           
            $error = $uploader->getError();
            if (!$error) {
                $data = array(
                    'cut_avatar'  => $cut_image,
                );                
                App::response(200, '裁剪成功', $data);
            } else {                
                App::response(101 , $error);
            }
        }
	}
}