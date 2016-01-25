<?php
/**
 *  视频采集编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class VideoUpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadVideoModel();        
        if ( isset( $_POST['SpiderVideoList'] ) ) {
            $model->attributes = $_POST['SpiderVideoList'];
            $model->content->attributes = $_POST['SpiderVideoContent'];            
            if ( $model->save() && $model->content->save()) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('video'));
            }
        }
        $this->controller->render( 'videoupdate', array ( 'model' => $model ) );
	}
}