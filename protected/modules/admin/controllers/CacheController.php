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
