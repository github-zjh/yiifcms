<?php

/**
 * 找回密码
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class ForgetPwdAction extends CAction {

    public function run() {
        $model = new ForgetPwdForm();
        if (isset($_POST['ForgetPwdForm'])) {
            $model->attributes = $_POST['ForgetPwdForm'];
            if ($model->validate()) {
                $safestr = $this->_setting['safe_str'];  //安全密匙
                $important_string = $model->id;
                $authcode = urlencode(Helper::authcode($important_string, 'ENCODE', $safestr, 600)); //加密处理，10分钟内过期               
                $authurl = Yii::app()->request->hostInfo . $this->createUrl('resetPwd', array('authcode' => $authcode));
                $subject = Yii::t('common', 'Reset Pwd');
                $message = Yii::t('common', 'ResetPwd Email', array('{username}' => $model->username,
                            '{sitename}' => $this->_setting['site_name'],
                            '{authurl}' => $authurl,
                            '{admin_email}' => $this->_setting['admin_email']));
                Helper::sendMail($model->id, $model->email, $subject, $message);
                $this->message('success', Yii::t('common', 'Send ResetPwd Email Success'), $this->createUrl('forgetpwd'), 5);
            }
        }

        //set seo
        $this->_seoTitle = Yii::t('common', 'Find Pwd') . ' - ' . $this->_setting['site_name'];
        $this->_seoKeywords = Yii::t('common', 'Find Pwd');
        $this->_seoDescription = Yii::t('common', 'Find Pwd');
        //加载css,js
        Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
        Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");

        $this->render('forgetpwd', array('model' => $model));
    }

}
