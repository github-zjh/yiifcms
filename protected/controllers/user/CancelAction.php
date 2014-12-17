<?php
/**
 * 取消操作(取消收藏、取消关注、取消好友)
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class CancelAction extends CAction
{
	public $_seoTitle;
	public $_setting;
	public $_static_public;
	public $_stylePath;	
	public $_type_ids;
	
	public function run(){	
		$controller  = $this->getController();		
		$op = Yii::app()->request->getParam('op');	
		$ids = Yii::app()->request->getParam('id');
		$uid = Yii::app()->user->id;		
		$res = false;    //操作状态
		$count = true;   //是否需要统计
		$count_field = ''; //统计数据的字段名
		$action = ''; //要返回的action名
		if(!$uid){
			$message = Yii::t('common','You Need Login');			
		}else{	
			if(!$ids){
				$message = Yii::t('common','Operation Failed');
			}else{	
				switch($op){
					case 'collect':
						$collect_mod = new Collect();
						//检测是否是自己收藏的
						foreach((array)$ids as $k => $id){
							$tmp = $collect_mod->findByPk($id);
							if($tmp->user_id != $uid){
								unset($ids[$k]);
							}else{
								$content[] = $collect_mod->findByPk($id);
							}
						}
						$collect_mod->deleteByPk($ids);											
						$res = true;	
						$count_field = 'favorite_count';
						$action = 'mycollect';
						break;
					case 'attention':
						$attention_mod = new Attention();
						//检测是否是自己关注的
						foreach((array)$ids as $k => $id){
							$tmp = $attention_mod->findByPk($id);
							if($tmp->user_id != $uid){
								unset($ids[$k]);
							}else{
								$content[] = $attention_mod->findByPk($id);
							}
						}
											
						$attention_mod->deleteByPk($ids);					
						$res = true;					
						$count_field = 'attention_count';
						$action = 'myattention';
						break;
					case 'friend':
						$friend_mod = new Friend();
						//检测是否是自己的好友
						foreach((array)$ids as $k => $id){
							$tmp = $friend_mod->findByPk($id);
							if($tmp->uid1 != $uid && $tmp->uid2 != $uid){
								unset($ids[$k]);
							}
						}											
						$friend_mod->deleteByPk($ids);
						$res = true;			
						$count = false;			
						$action = 'myfriends';
						break;
					default:										
						break;
				}			
				if($res){				
					$message = Yii::t('common', 'Cancel Success');			
					if($count && $content)	{
						//减少统计数据
						$model_type = new ModelType();					
						foreach($content as $c){						
							$type = $model_type->findByPk($c->type);				
							$type_name = ucfirst($type->type_key);
							if($type_name && $c && $count_field){		
								$content_mod = new $type_name();
								$cur_post = $content_mod->findByPk($c->cid);
								if($cur_post->$count_field > 0){
									$content_mod->updateCounters(array ($count_field => -1 ), 'id=:id', array ('id' => $c->cid ));				
								}
							}  
						}
					}
				}else{				
					$message = Yii::t('common', 'Operation Failed');
				}
			}
		}		
		//用setFlash提示信息(类似alert)
		$controller->layout = false;
		Yii::app()->user->setFlash($res?'success':'error',$message);
		$controller->redirect($controller->createUrl('user/'.$action));		
	}

}
