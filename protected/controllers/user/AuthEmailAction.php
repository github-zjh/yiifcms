<?php

/**
 * 验证账号激活邮件
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */
class AuthEmailAction extends CAction {

    public function run() {
        //解密
        $authcode = urldecode(Yii::app()->request->getParam('authcode'));
        $safestr = $this->controller->_setting['safe_str'];  //安全密匙
        $decode = Helper::authcode($authcode, 'DECODE', $safestr);
        if ($decode) {
            $id = intval($decode);
            $user = User::model()->findByPk($id);
            if (!$user) {
                $this->controller->message('error', Yii::t('common', 'Auth Account Do Not Exist'), $this->controller->createUrl('site/index'), 0, true);
            } else {
                if ($user->status == 1) {
                    $this->controller->message('success', Yii::t('common', 'Auth Is Ok'), $this->controller->createUrl('login'));
                } else {
                    $user->status = User::STATUS_NORMAL;
                    $user->save();
                    $this->controller->message('success', Yii::t('common', 'Auth Success'), $this->controller->createUrl('login'), 5);
                }
            }
        } else {
            $this->controller->message('error', Yii::t('common', 'The link is invalid'), $this->controller->createUrl('site/index'), 0, true);
        }
    }

}