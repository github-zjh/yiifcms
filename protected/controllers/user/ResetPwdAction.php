<?php

/**
 * 重置密码
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class ResetPwdAction extends CAction {

    public function run() {
        $authcode = urldecode(Yii::app()->request->getParam('authcode')); //解码	
        $safestr = $this->_setting['safe_str'];  //安全密匙
        $decode = Helper::authcode($authcode, 'DECODE', $safestr);  //解密	
        if ($decode) {
            $id = intval($decode);
            $user = User::model()->findByPk($id);
            if (!$user) {
                $this->message('error', Yii::t('common', 'Auth Account Do Not Exist'), $this->createUrl('site/index'), 0, true);
            } else {
                $model = new ResetPwdForm();
                if (isset($_POST['ResetPwdForm'])) {
                    $model->attributes = $_POST['ResetPwdForm'];
                    if ($model->validate()) {
                        $user->password = User::createPassword($model->newpassword);
                        $user->save();
                        //清除session
                        unset(Yii::app()->session[$id . '_forgetpwd']);

                        $this->message('success', Yii::t('common', 'ResetPwd Success'), $this->createUrl('login'), 5);
                    }
                }

                //set seo
                $this->_seoTitle = Yii::t('common', 'Reset Pwd') . ' - ' . $this->_setting['site_name'];
                $this->_seoKeywords = Yii::t('common', 'Reset Pwd');
                $this->_seoDescription = Yii::t('common', 'Reset Pwd');
                //加载css,js
                Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/user.css");
                Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");

                $this->render('resetpwd', array('model' => $model));
            }
        } else {
            $this->message('error', Yii::t('common', 'The link is invalid'), $this->createUrl('forgetPwd'), 0, true);
        }
    }

}
