<?php
/**
 * 取消操作(取消收藏、取消关注、取消好友)
 * 
 * @author        Sim Zhao <326196998@qq.com>
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
    private $_uid = 0;
	
	public function run(){	
		$controller  = $this->getController();		
		$op = Yii::app()->request->getParam('op');	
		$id = Yii::app()->request->getParam('id');
		$this->_uid = Yii::app()->user->id;	
		$action = ''; //要返回的action名
        $ids = array();
        if($id) {
            if(is_array($id)) {
                $ids = $id;
            } else {
                $ids = array($id);
            }
        }        
		if(!$this->_uid){
			$message = Yii::t('common','You Need Login');			
		}else{	
			if(!$ids){
				$message = Yii::t('common','No Select Content');
			}else{	
                $flag = true;
				switch($op){
					case 'collect':
						$linkContent = $this->_deleteBaseData(new Collect(), $ids);
                        $this->_updateLinkData($linkContent, 'favorite_count');						
						$action = 'mycollect';
						break;
					case 'attention':
                        $linkContent = $this->_deleteBaseData(new Attention(), $ids);
                        $this->_updateLinkData($linkContent, 'attention_count');						
						$action = 'myattention';
						break;
					case 'friend':
                        $this->_deleteBaseData(new Friend(), $ids);
						$action = 'myfriends';
						break;
					default:
                        $flag = false;
						break;
				}
			}
		}		
        if($action) {
            //用setFlash提示信息(类似alert)
            $controller->layout = false;
            $message = Yii::t('common', 'Cancel Success');
            Yii::app()->user->setFlash('success',$message);            
            $controller->redirect($controller->createUrl('user/'.$action));
        } else {
            Yii::app()->user->setFlash('error',$message);
            $controller->redirect($_SERVER['HTTP_REFERER']);
        }
	}
    
    /**
     * 删除基本数据 并返回需要删除的关联数据
     * 
     * @param object $model
     * @param array $ids
     * @return array
     */
    private function _deleteBaseData($model = '', $ids = array())
    {        
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);
        $criteria->addColumnCondition(array('user_id'=>$this->_uid));
        $res = $model->findAll($criteria);
        $content = array();
        foreach($res as $v) {
            if(in_array($v->id, $ids)) {
                $content[] = $v;
            }                            
        }
        $model->deleteByPk($ids);
        return $content;
    }
    
    /**
     * 更新统计数据
     * 
     * @param array $contents
     * @param string $count_field
     */
    private function _updateLinkData($contents = array(), $count_field = '')
    {        
        $model_type = new ModelType();
        var_dump($contents);
        foreach($contents as $c){                            
            $type = $model_type->findByPk($c->type);
            if($type && $count_field){
                $type_name = ucfirst($type->type_key);
                $content_mod = new $type_name();
                $cur_post = $content_mod->findByPk($c->cid);
                if($cur_post->$count_field > 0){
                    $content_mod->updateCounters(array ($count_field => -1 ), 'id=:id', array ('id' => $c->cid ));				
                }
            }  
        }
    }

}
