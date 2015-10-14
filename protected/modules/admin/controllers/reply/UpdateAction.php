<?php
/**
 *  编辑
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
	public function run(){        
        $model = $this->controller->loadModel();
        if (isset($_POST['Reply'])) {            
            $model->attributes = $_POST['Reply'];           
            if ($model->save()) {               
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
            }
        }        
        $this->controller->render('update', array ('model' => $model ));
	}
}