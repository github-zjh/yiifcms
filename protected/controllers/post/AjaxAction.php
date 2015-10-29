<?php

/**
 *  ajax操作[收藏、关注]
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class AjaxAction extends CAction {

    public function run() {
        $uid = Yii::app()->user->id;
        $ret = array();
        if (!$uid) {
            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Need Login'));
        } else {
            $act = Yii::app()->request->getParam('act');
            $postid = Yii::app()->request->getParam('id');
            $post = Post::model()->findByPk($postid);
            $type_id = $this->_type_ids['post'];
            if (!$post) {
                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Collect Failed'));
            } else {
                $attention_mod = new Attention();
                $collect_mod = new Collect();
                switch ($act) {
                    case 'attention':
                        //判断是否已经关注了
                        $exist_attention = $attention_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid' => $uid, ':cid' => $postid, ':type_id' => $type_id));
                        if ($exist_attention) {
                            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Have Attented it'));
                        } else {
                            //关注
                            $attention_mod->cid = $postid;
                            $attention_mod->title = $post->title;
                            $attention_mod->user_id = $uid;
                            $attention_mod->url = Yii::app()->request->hostinfo . $this->createUrl('post/view', array('id' => $postid));
                            $attention_mod->type = $type_id;
                            $attention_mod->create_time = time();
                            if ($attention_mod->save()) {
                                $post->updateCounters(array('attention_count' => 1), 'id=:id', array('id' => $postid));
                                $ret = array('state' => 'success', 'message' => Yii::t('common', 'Attent Success'), 'count' => $post->attention_count + 1);
                            } else {
                                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Attent Failed'));
                            }
                        }
                        break;
                    case 'collect':
                        //判断是否已经收藏
                        $exist_collect = $collect_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid' => $uid, ':cid' => $postid, ':type_id' => $type_id));
                        if ($exist_collect) {
                            $ret = array('state' => 'error', 'message' => Yii::t('common', 'You Have Collected it'));
                        } else {
                            //收藏
                            $collect_mod->cid = $postid;
                            $collect_mod->title = $post->title;
                            $collect_mod->user_id = $uid;
                            $collect_mod->url = Yii::app()->request->hostinfo . $this->createUrl('post/view', array('id' => $postid));
                            $collect_mod->type = $type_id;
                            $collect_mod->create_time = time();
                            if ($collect_mod->save()) {
                                $post->updateCounters(array('favorite_count' => 1), 'id=:id', array('id' => $postid));
                                $ret = array('state' => 'success', 'message' => Yii::t('common', 'Collect Success'), 'count' => $post->favorite_count + 1);
                            } else {
                                $ret = array('state' => 'error', 'message' => Yii::t('common', 'Collect Failed'));
                            }
                        }
                        break;
                    default:
                        $ret = array('state' => 'error', 'message' => Yii::t('common', 'Operation Failed'));
                        break;
                }
            }
        }
        exit(CJSON::encode($ret));
    }
}
