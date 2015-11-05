<?php

/**
 * 重发验证邮件，进行账号激活
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class ActiveEmailAction extends CAction {

    public function run() {
        $this->_seoTitle = Yii::t('common', 'Account Active') . ' - ' . $this->_setting['site_name'];
        //加载css,js
        Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
        Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
        $model = $this->loadModel();

        if ($model->status == 1) {
            $this->redirect($this->createUrl('index'));
        } else {
            if (Yii::app()->request->isPostRequest) {
                if ($_POST['ajax'] == 'ajax_active_form') {
                    $this->sendActiveAccount(array('id' => $model->uid, 'username' => $model->username, 'email' => $model->email));
                    exit(CJSON::encode(array('message' => Yii::t('common', 'Send Success'))));
                } else {
                    exit(CJSON::encode(array('message' => Yii::t('common', 'Send Failed'))));
                }
            }
            $this->render('active_email', array('model' => $model));
        }
    }

}
