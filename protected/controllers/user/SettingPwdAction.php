<?php

/**
 * 修改密码
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class SettingPwdAction extends CAction {

    public function run() {       
        $user = $this->controller->loadModel();
        //判断账号是否已激活
        if ($this->controller->_active_need && $user->status == User::STATUS_AUDIT) {
            $this->controller->redirect($this->controller->createUrl('activeEmail'));
        }
        //判断账号的密码是否为空
        if ($user->validatePassword()) {
            $password_empty = true;
        } else {
            $password_empty = false;
        }
        $model = new SetPwdForm();
        $model->id = $user->uid;

        if (isset($_POST['SetPwdForm'])) {
            $model->attributes = $_POST['SetPwdForm'];
            if (!$password_empty) {
                //校验原始密码
                $model->checkPwd();
            }
            if (!$model->getErrors() && $model->validate()) {
                $user->password = User::createPassword($model->newpassword);
                if ($user->save()) {
                    Yii::app()->user->logout(false);
                    //提示信息
                    Yii::app()->user->setFlash('success', Yii::t('common', 'Update Password Success'));                    
                }
            }
        }
        $this->controller->_seoTitle = Yii::t('common', 'User Setting') . ' - ' . Yii::t('common', 'Setting Pwd') . ' - ' . $this->controller->_setting['site_name'];       
        $this->controller->render('setting_pwd', array('model' => $model, 'user' => $user, 'password_empty' => $password_empty));
    }

}
