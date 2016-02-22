<?php
/**
 * 我的回复
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */


class MyreplysAction extends CAction
{
	public $_content_models;
	
	public function run(){
		$controller  = $this->getController();
		$controller->_seoTitle = Yii::t('common','User Center').' - '.Yii::t('common','My Replys').' - '.$controller->_setting['site_name'];
		
		//我的回复
		$uid = Yii::app()->user->id;
		$comment_mod = new Comment();
		$reply_mod = new Reply();		
		$criteria = new CDbCriteria();
		$criteria->addColumnCondition(array('t.user_id' => $uid));
		$criteria->order = 't.id DESC';
		
		//分页
		$count = $reply_mod->count( $criteria );
		$pages = new CPagination( $count );
		$pages->pageSize = 15;
		$pages->applyLimit($criteria);
		$datalist = $reply_mod->findAll($criteria);	
		foreach((array)$datalist as $k => $v){
			$reply = $comment_mod->findByPk($v->cid);			
			if($reply) {
				$c_mod_class = $controller->_content_models[$reply->type];
				$c_mod_name = strtolower($c_mod_class);
				$content_mod = new $c_mod_class();
				$content = $content_mod->findByPk($reply->content_id);
				if($content) {
					$datalist[$k]['title'] = $content->title;
					$datalist[$k]['url'] = $controller->createUrl($c_mod_name.'/view', array('id'=>$reply->content_id));
				}
			}			
		}			
		$controller->render('my_replys', array('datalist'=>$datalist, 'pages' => $pages));
	}

}