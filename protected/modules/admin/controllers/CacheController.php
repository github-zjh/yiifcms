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
		$cache = $this->_request->getPost('cache');
		foreach((array)$cache as $value){
			if($value == 'style'){
				//更新样式缓存
				$assets = $this->_webRoot.'/assets';				
				if(is_dir($assets)){
					$dirs = Helper::scanfDir($assets,true);
															
					//先删除文件
					foreach((array)$dirs['files'] as $file){
						$pathinfo = pathinfo($file);
						if($pathinfo['basename'] != 'README.md'){
							@unlink($file);							
						}
					}
									
					// 再删除目录 
					rsort($dirs['dirs']);  //降序
					foreach((array)$dirs['dirs'] as $dir){						
						@rmdir($dir);
					}
				}	
			}
			if($value == 'content'){
				
				$file_caches = Yii::app()->runtimePath.'/cache';
				if(is_dir($file_caches)){
					$dirs = Helper::scanfDir($file_caches,true);						
					//先删除文件
					foreach((array)$dirs['files'] as $file){						
						@unlink($file);						
					}
						
					// 再删除目录
					rsort($dirs['dirs']);  //降序
					foreach((array)$dirs['dirs'] as $dir){
						@rmdir($dir);
					}
				}
				
				//更新内容缓存
				try {
					Yii::app()->cache && Yii::app()->cache->flush();
				} catch (CHttpException $e){
					throw new CHttpException(500, Yii::t('admin','Cache Error Msg', array('{msg}'=>$e->getMessage())));
				}
			}
		}
		$this->message('success',Yii::t('admin','Update Cache Success'), $this->createUrl('index'));
	}
}
