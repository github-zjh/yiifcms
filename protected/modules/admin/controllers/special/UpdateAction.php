<?php
/**
 *  编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadModel();
        if ( isset( $_POST['Special'] ) ) {
            $model->attributes = $_POST['Special'];
        	//封面、图标、 文件
    		$model->img_cover  = isset($_POST['img_cover']) ? $_POST['img_cover'] : '';
            $model->img_banner = isset($_POST['img_banner']) ? $_POST['img_banner'] : '';             
            if ( $model->save() ) {                
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
            }
        }
        $this->controller->render( 'update', array ( 'model' => $model ) );
	}
}