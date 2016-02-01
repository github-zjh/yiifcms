<?php
/**
 *  添加
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CreateAction extends CAction
{	
	public function run(){		
        $model = new SpiderSetting();
        if ( isset( $_POST['SpiderSetting'] ) ) {
            $model->attributes = $_POST['SpiderSetting'];
            if ( $model->save() ) {                
                $this->controller->message('success',Yii::t('admin','Add Success'),$this->controller->createUrl('index'));
            }
        }
        $this->controller->render( 'update', array ( 'model' => $model ) );
	}
}