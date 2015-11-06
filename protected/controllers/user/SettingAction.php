<?php

/**
 * 修改基本资料
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class SettingAction extends CAction {

    public function run() {        
        $model = $this->controller->loadModel();

        //判断账号是否已激活
        if ($this->controller->_active_need && $model->status == User::STATUS_AUDIT) {
            $this->controller->redirect($this->controller->createUrl('activeEmail'));
        }
        if (isset($_POST['User'])) {
            $model->attributes = array_map('trim', $_POST['User']);
            if ($model->save()) {                
                //同步昵称
                Yii::app()->user->nickname = $model->nickname;
                //提示信息
                Yii::app()->user->setFlash('success', Yii::t('common', 'Update Profile Success'));
            }
        }
        $this->controller->_seoTitle = Yii::t('common', 'User Setting') . ' - ' . Yii::t('common', 'Setting Profile') . ' - ' . $this->controller->_setting['site_name'];
        $this->controller->render('setting_profile', array('model' => $model));
    }

}
