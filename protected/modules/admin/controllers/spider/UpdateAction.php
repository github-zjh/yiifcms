<?php
/**
 *  采集设置编辑
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadModel();
        if ( isset( $_POST['SpiderSetting'] ) ) {            
            $model->attributes = $_POST['SpiderSetting'];            
            if ( $model->save() ) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
            }
        }
        $this->controller->render( 'update', array ( 'model' => $model ) );
	}
}