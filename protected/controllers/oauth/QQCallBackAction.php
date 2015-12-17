<?php

/**
 *  QQ授权登录回调
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class QQCallBackAction extends CAction {

    public function run() {
        require_once(Yii::getPathOfAlias('ext') . "/OAuth/qq/qqConnectAPI.php");
        $qc = new QC();
        $access_token = $qc->qq_callback();
        $openid = $qc->get_openid();
        $qcL = new QC($access_token, $openid);
        $user_info = $qcL->get_user_info();
        //查看是否已绑定
        $bind = OAuthQQ::model()->findByPk($openid);

        //数据
        $data = array(
            'type'         => 'qq',
            'access_token' => $access_token,
            'openid'       => $openid,
            'uid'          => $bind ? $bind->uid : 0,
            'username'     => $user_info['nickname'],
            'avatar'       => $user_info['figureurl_2']
        );

        //绑定注册
        $this->controller->bind_register($bind, $data);
    }

}
