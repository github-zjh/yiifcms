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
        $random_uuid = $this->_createUUid();
        $wx = new WeiXin($config['app_id'], $config['app_secret'], $config['callback'], $random_uuid);
        $qr = new QrCode();        
        $qrcode_url = $qr->createCode($wx->auth_url, 8);   
        $this->controller->layout = false;
        $this->controller->_seoTitle = '微信扫一扫登录'.' - '.$this->controller->_setting['site_name'];
        $this->controller->render('wx_qrcode', array('qrcode_url' => $qrcode_url));
    }
    
    /**
     * 生成一个随机数
     * 
     * @param string $url
     * @return string
     */
    private function _createUUid()
    {
        return md5(mt_rand().time());        
    }

}
