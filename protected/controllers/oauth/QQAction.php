<?php

/**
 *  QQ授权登录
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class QQAction extends CAction {

    public function run() {
        require_once (Yii::getPathOfAlias('ext') . "/OAuth/qq/qqConnectAPI.php");        
        $qc = new QC();
        $qc->qq_login();
    }

}
