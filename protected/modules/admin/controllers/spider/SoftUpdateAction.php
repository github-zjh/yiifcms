<?php
/**
 *  软件采集编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class SoftUpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadSoftModel();        
        if ( isset( $_POST['SpiderSoftList'] ) ) {
            $model->attributes = $_POST['SpiderSoftList'];
            $model->content->attributes = $_POST['SpiderSoftContent'];            
            if ( $model->save() && $model->content->save()) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('soft'));
            }
        }
        $this->controller->render( 'softupdate', array ( 'model' => $model ) );
	}
}