<?php

/**
 *  ajax操作[收藏、关注]
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class AjaxAction extends CAction {

    public function run() {        
        $act = Yii::app()->request->getParam('act');        
        switch ($act) {
            case 'attention':
                $ret = $this->_opAttention();                        
                break;
            case 'collect':
                $ret = $this->_opCollection();                        
                break;
            case 'catChildren':   //获取子分类
                $ret = $this->_getCatalogChildren();
                break;
            default:
                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Operation Failed'));
                break;            
        }        
        exit(CJSON::encode($ret));
    }
    
    /**
     * ajax关注操作
     * 
     * @return string
     */
    private function _opAttention()
    {
        $uid = Yii::app()->user->id;        
        $ret = array();
        if (!$uid) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Need Login'));
            return $ret;
        }
        $postid = Yii::app()->request->getParam('id');
        $post = Post::model()->findByPk($postid);
        if (!$post) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'Collect Failed'));
            return $ret;
        }
        $attention_mod = new Attention();
        //判断是否已经关注了
        $type_id = $this->controller->_type_ids['post'];
        $exist_attention = $attention_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid' => $uid, ':cid' => $postid, ':type_id' => $type_id));
        if ($exist_attention) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Have Attented it'));
        } else {
            //关注
            $attention_mod->cid = $postid;
            $attention_mod->title = $post->title;
            $attention_mod->user_id = $uid;
            $attention_mod->url = Yii::app()->request->hostinfo . $this->controller->createUrl('post/view', array('id' => $postid));
            $attention_mod->type = $type_id;
            $attention_mod->create_time = time();
            if ($attention_mod->save()) {
                $post->updateCounters(array('attention_count' => 1), 'id=:id', array('id' => $postid));
                $ret = array('state' => 'success', 'message' => Yii::t('common', 'Attent Success'), 'count' => $post->attention_count + 1);
            } else {
                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Attent Failed'));
            }
        }
        return $ret;
    }
    
    /**
     * 处理ajax收藏操作
     * 
     */
    private function _opCollection()
    {
        $uid = Yii::app()->user->id;
        if (!$uid) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Need Login'));
            return $ret;
        }
        $postid = Yii::app()->request->getParam('id');
        $post = Post::model()->findByPk($postid);
        if (!$post) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'Collect Failed'));
            return $ret;
        }
        $collect_mod = new Collect();
        //判断是否已经收藏
        $type_id = $this->controller->_type_ids['post'];
        $exist_collect = $collect_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid' => $uid, ':cid' => $postid, ':type_id' => $type_id));
        if ($exist_collect) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Have Collected it'));
        } else {
            //收藏
            $collect_mod->cid = $postid;
            $collect_mod->title = $post->title;
            $collect_mod->user_id = $uid;
            $collect_mod->url = Yii::app()->request->hostinfo . $this->controller->createUrl('post/view', array('id' => $postid));
            $collect_mod->type = $type_id;
            $collect_mod->create_time = time();
            if ($collect_mod->save()) {
                $post->updateCounters(array('favorite_count' => 1), 'id=:id', array('id' => $postid));
                $ret = array('state' => 'success', 'message' => Yii::t('common', 'Collect Success'), 'count' => $post->favorite_count + 1);
            } else {
                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Collect Failed'));
            }
        }
        return $ret;
    }
    
    /**
     * 获取分类下子分类
     * 
     * @return array
     */
    private function _getCatalogChildren()
    {
        $parent_id = intval(Yii::app()->request->getParam('catalog_id'));
        return Catalog::getChildren($parent_id, true, $this->controller->_type_ids['post']);
    }
}
