<?php

/**
 *  微信授权登录
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class WeixinAction extends CAction {

    public function run() {        
        require_once (Yii::getPathOfAlias('ext') . "/OAuth/weixin/weixin.class.php");
        Yii::import('application.extensions.qrcode.QrCode');
        
        $config = OAuth::getConf('weixin');			   
        $wx = new WeiXin($config['app_id'], $config['app_secret'], $config['callback']);
        $qr = new QrCode();
        $qrcode_url = $qr->createCode($config['callback'], 8);   
        $this->controller->layout = false;
        $this->controller->_seoTitle = '微信扫一扫登录'.' - '.$this->controller->_setting['site_name'];
        $this->controller->render('wx_qrcode', array('qrcode_url' => $qrcode_url));
    }

}
