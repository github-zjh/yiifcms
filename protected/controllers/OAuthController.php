<?php
/**
 * 第三方授权控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class OAuthController extends FrontBase
{	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionQq()
	{			
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		$qc->qq_login();
	}
	public function actionQq_callback()
	{
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		echo $qc->qq_callback();
		echo $qc->get_openid();
	}
	
}