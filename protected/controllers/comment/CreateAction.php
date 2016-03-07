<?php

/**
 *  评论
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class CreateAction extends CAction {

    public function run() {
        $this->controller->layout = false;
        $view_url = Yii::app()->request->getParam('view_url');
        $content_id = Yii::app()->request->getParam('content_id');
        $topic_type = Yii::app()->request->getParam('topic_type');
        $cur_url = Yii::app()->request->hostinfo . Yii::app()->request->getUrl();
        $post = false;
        //评论类型
        switch ($topic_type) {
            case 'post':
                $post = Post::model()->findByPk($content_id);
                break;
            case 'album':
                $post = Album::model()->findByPk($content_id);
                break;
            case 'soft':
                $post = Soft::model()->findByPk($content_id);
                break;
            case 'video':
                $post = Video::model()->findByPk($content_id);
                break;
        }
        if (!$post) {
            throw new CHttpException(404, Yii::t('admin', 'Loading Error'));            
        }
        //评论内容    
        $model = new Comment('create');
        $criteria = new CDbCriteria();        
        $criteria->with = array('user');
        $criteria->addColumnCondition(array('content_id' => $content_id));
        $criteria->addColumnCondition(array('t.status' => Comment::STATUS_SHOW));
        $criteria->addColumnCondition(array('type' => $this->controller->_type_ids[$topic_type]));
        $criteria->addCondition('u.uid > 0');
        $criteria->order = 't.id DESC';
        $criteria->select = 't.id, user_id, content_id, content, t.create_time ';

        //分页
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $comments = $model->findAll($criteria);

        //回复
        if ($comments) {
            foreach ($comments as $c) {
                $replies[$c->id] = Reply::model()->with('user')->findAll(array('condition' => 'cid = '.$c->id.' AND t.status = "'.Reply::STATUS_SHOW.'" AND u.uid > 0', 'order' => 'id'));
            }
        } else {
            $comments = array();
            $replies = array();
        }
        
        if (Yii::app()->request->isPostRequest) {
            $uid = Yii::app()->user->id;
            if (!$uid) {
                $this->message('script', Yii::t('common', 'You Need Login'));
            }

            $model->attributes = $_POST['Comment'];
            $model->content_id = $content_id;
            $model->type = $this->controller->_type_ids[$topic_type];
            $model->user_id = $uid;
            $model->status = 'N';
            $model->client_ip = Yii::app()->request->userHostAddress;
            $model->create_time = time();

            $ret_url = $_POST['ret_url'];

            if ($model->save()) {
                //更新内容评论数
                $post->updateCounters(array ('reply_count' => 1 ), 'id=:id', array ('id' => $content_id ));
                $this->controller->message('script', Yii::t('common', 'Submit Success, Waiting Pass'), $ret_url);                
            }
        }
        $data = array(
            'model' => $model,
            'view_url' => $view_url,
            'cur_url' => $cur_url,
            'comments' => $comments,
            'pagebar' => $pages,
            'replies' => $replies
        );
        $this->controller->render('create', $data);
    }
}
