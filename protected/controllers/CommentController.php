<?php
/**
 * 评论控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class CommentController extends FrontBase
{
    //所有动作
    public function actions()
    {
        $extra_actions = array(
            'captcha'=>array(
                'class'=>'MyCaptchaAction',
                'backColor'=>0xFFFFFF,  //背景色
                'foreColor'=> 0x3C5880,	//前景色
                'fontFile' =>  $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
                'padding'=>0,
                'width' => 100,
                'height'=>30,
                'minLength'=>4,
                'maxLength'=>6,
                'testLimit'=>0,   //不限制输错次数
                'offset' => 2,    //字符间距
            ),
        );
        $actions = $this->actionMapping(array(
            'create'    => 'Create',        //评论
            'reply'     => 'Reply',         //回复
            'ajax'      => 'Ajax',           //ajax[收藏、关注]           
        ), 'application.controllers.comment');
        return array_merge($actions, $extra_actions);
    }
    
  /**
   * 
   * 对评论的回复
   * @author zhao jinhan
   * @return JSON
   * 
   */
  public function actionReply1(){
  	  $this->layout = false;
  	  if(Yii::app()->request->isPostRequest){
  	  	//当前登录用户id
  	  	$uid = Yii::app()->user->id;  	  	
  	  	if(!$uid){
  	  		exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','You Need Login'))));
  	  	}
  	  	$cid = intval($_POST['cid']);
  	  	$reply_id = intval($_POST['reply_id']);
  	  	$content = $_POST['content'];
  	  	$comment = Comment::model()->findByPk($cid);
  	  	$reply = Reply::model()->findByPk($reply_id);
  	  	if($comment){  	  		
  	  		//不能对自己的评论和回复而回复
  	  		if(($comment->user_id == $uid && !$reply) || ($reply && $reply->user_id == $uid)){
  	  			exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','You Can not Rely Yourself'))));
  	  		}
  	  		if(!$content || strlen($content)<10){
  	  			exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','Reply Content Is Too Small'))));
  	  		}
  	  		$model = new Reply('create');
  	  		$model->cid = $cid;
  	  		$model->user_id = $uid;
  	  		$model->reply_id = $reply_id;
  	  		$model->content = $content;
  	  		$model->status = 'Y';
  	  		$model->create_time = time();
  	  		if($model->save())
  	  			exit(CJSON::encode(array('status'=>'success','message'=>Yii::t('common','Reply Success'))));
  	  		else 
  	  			exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','Reply Failed'))));
  	  	}else{
  	  		exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','Reply Failed'))));
  	  	}
  	  }else{
  	  	exit(CJSON::encode(array('status'=>'error','message'=>Yii::t('common','Reply Failed'))));
  	  }	  
  }  
  
}
