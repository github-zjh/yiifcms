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
		$res = false;
		$count_field = ''; //统计数据的字段名
		$action = ''; //要返回的action名
		if(!$uid){
			$dialogMessage = Yii::t('common','You Need Login');			
		}else{	
			if(!$ids){
				$dialogMessage = Yii::t('common','Operation Failed');
			}else{	
				switch($op){
					case 'collect':
						$collect_mod = new Collect();
						foreach((array)$ids as $id){
							$content[] = $collect_mod->findByPk($id);
						}
						$collect_mod->deleteByPk($ids);											
						$res = true;	
						$count_field = 'favorite_count';
						$action = 'mycollect';
						break;
					case 'attention':
						$attention_mod = new Attention();
						foreach((array)$ids as $id){
							$content[] = $attention_mod->findByPk($id);						
						}						
						$attention_mod->deleteByPk($ids);					
						$res = true;					
						$count_field = 'attention_count';
						$action = 'myattention';
						break;
					case 'friend':
						$friend_mod = new Friend();
						foreach((array)$ids as $id){
							$content[] = $friend_mod->findByPk($id);		
						}						
						$friend_mod->deleteByPk($ids);
						$res = true;						
						$action = 'myfriend';
						break;
					default:										
						break;
				}			
				if($res && $content){				
					$dialogMessage = Yii::t('common', 'Cancel Success');				
					//减少统计数据
					$model_type = new ModelType();					
					foreach($content as $c){						
						$type = $model_type->findByPk($c->type);				
						$type_name = ucfirst($type->type_key);
						$content_mod = new $type_name();
						if($c && $count_field){					
							$content_mod->updateCounters(array ($count_field => -1 ), 'id=:id', array ('id' => $c->cid ));				
						}  
					}
				}else{				
					$dialogMessage = Yii::t('common', 'Operation Failed');
				}
			}
		}		
		//用setFlash提示信息(类似alert)
		$controller->layout = false;
		Yii::app()->user->setFlash($res?'success':'error',$dialogMessage);
		$controller->redirect($controller->createUrl('user/'.$action));		
	}

}