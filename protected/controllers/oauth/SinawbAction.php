<?php

/**
 *  新浪微博授权登录
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class SinawbAction extends CAction {

    public function run() {        
		require_once(Yii::getPathOfAlias('ext')."/OAuth/sinawb/saetv2.ex.class.php");
        $config = OAuth::getConf('sinawb');		
	    $sinawb = new SaeTOAuthV2( $config['wb_akey'] , $config['wb_skey'] );
		$code_url = $sinawb->getAuthorizeURL( $config['callback'] );
		$this->controller->redirect($code_url);
    }

}
