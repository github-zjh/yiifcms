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
            case 'image':
                $post = Image::model()->findByPk($content_id);
                break;
            case 'soft':
                $post = Soft::model()->findByPk($content_id);
                break;
            case 'video':
                $post = Video::model()->findByPk($content_id);
                break;
        }
        if (!$post) {
            throw new CHttpException(404, Yii::t('admin', 'Submit Error'));            
        }
        //评论内容    
        $model = new Comment('create');
        $criteria = new CDbCriteria();
        $condition = "content_id={$content_id} AND status='Y' AND type={$this->controller->_type_ids[$topic_type]}";
        $criteria->condition = $condition;
        $criteria->order = 'id DESC';
        $criteria->select = "id, user_id, content_id, content, create_time ";

        //分页
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $comments = $model->findAll($criteria);

        //回复
        if ($comments) {
            foreach ((array) $comments as $c) {
                $replies[$c->id] = Reply::model()->findAll('cid=:cid AND status=:status ORDER BY id', array(':cid' => $c->id, ':status' => 'Y'));
            }
        } else {
            $replies = array();
        }
        
        if (Yii::app()->request->isPostRequest) {
            $uid = Yii::app()->user->id;
            if (!$uid) {
                $this->message('script', Yii::t('common', 'You Need Login'));
            }

            $model->attributes = $_POST['Comment'];
            $model->content_id = $content_id;
            $model->type = $this->_type_ids[$topic_type];
            $model->user_id = $uid;
            $model->status = 'N';
            $model->client_ip = Yii::app()->request->userHostAddress;
            $model->create_time = time();

            $ret_url = $_POST['ret_url'];

            if ($model->save()) {
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
