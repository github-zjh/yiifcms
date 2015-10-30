<?php

/**
 *  评论回复
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class ReplyAction extends CAction {

    public function run() {
        $this->controller->layout = false;
        if (Yii::app()->request->isPostRequest) {
            //当前登录用户id
            $uid = Yii::app()->user->id;
            if (!$uid) {
                exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'You Need Login'))));
            }
            $cid = intval($_POST['cid']);
            $reply_id = intval($_POST['reply_id']);
            $content = $_POST['content'];
            $comment = Comment::model()->findByPk($cid);
            $reply = Reply::model()->findByPk($reply_id);
            if ($comment) {
                //不能对自己的评论和回复而回复
                if (($comment->user_id == $uid && !$reply) || ($reply && $reply->user_id == $uid)) {
                    exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'You Can not Rely Yourself'))));
                }
                if (!$content || strlen($content) < 10) {
                    exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'Reply Content Is Too Small'))));
                }
                $model = new Reply('create');
                $model->cid = $cid;
                $model->user_id = $uid;
                $model->reply_id = $reply_id;
                $model->content = $content;
                $model->status = 'Y';
                $model->create_time = time();
                if ($model->save()) {
                    exit(CJSON::encode(array('status' => 'success', 'message' => Yii::t('common', 'Reply Success'))));                
                }
                else {
                    exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'Reply Failed'))));                
                }
            }else {
                exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'Reply Failed'))));
            }
        } else {
            exit(CJSON::encode(array('status' => 'error', 'message' => Yii::t('common', 'Reply Failed'))));
        }
    }

}
