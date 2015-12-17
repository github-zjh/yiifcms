<?php

/**
 *  微信授权回调
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class WeixinCallBackAction extends CAction {

    public function run() {
        
        require_once (Yii::getPathOfAlias('ext') . "/OAuth/weixin/weixin.class.php");
        $wx = new WeiXin();        
        $wx->getToken();
        var_dump($wx);
    }

}
