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
        $config = OAuth::getConf('weixin');			   
        $wx = new WeiXin($config['app_id'], $config['app_secret'], $config['callback']);
        $wx->tryGetBase();
    }

}
