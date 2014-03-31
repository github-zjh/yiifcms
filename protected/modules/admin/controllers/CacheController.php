<?php
/**
 * 缓存管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class CacheController extends Backend{
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),'','',true);
			return false;
		}
		return true;
	}
	

	/**
	 * 缓存管理
	 */
	public function actionIndex() {		
		$this->render( 'index');
	}

	/**
	 * 缓存更新
	 */
	public function actionCacheUpdate() {
		
	}
}
