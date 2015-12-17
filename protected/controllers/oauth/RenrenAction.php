<?php

/**
 *  人人网授权登录
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class RenrenAction extends CAction {

    public function run() {        
		require_once(Yii::getPathOfAlias('ext')."/OAuth/renren/RennClient.php");
        $config = OAuth::getConf('renren');
		$rennClient = new RennClient ( $config['app_key'], $config['app_secret'] );
		// 生成state并存入SESSION，以供CALLBACK时验证使用
		$state = uniqid ( 'renren_', true );
		Yii::app()->session['renren_state'] = $state;

		// 取得认证授权的url
		$code_url = $rennClient->getAuthorizeURL ( $config['callback'], 'code', $state );
		$this->controller->redirect($code_url);
    }

}
