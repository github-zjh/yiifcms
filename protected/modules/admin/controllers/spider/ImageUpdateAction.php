<?php
/**
 *  图集采集编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class ImageUpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadImageModel();        
        if ( isset( $_POST['SpiderImageList'] ) ) {
            $model->attributes = $_POST['SpiderImageList'];
            $model->content->content = $_POST['SpiderImageContent']['content'];            
            if ( $model->save() && $model->content->save()) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('image'));
            }
        }
        $this->controller->render( 'imageupdate', array ( 'model' => $model ) );
	}
}