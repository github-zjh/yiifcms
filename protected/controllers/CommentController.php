<?php
/**
 * 评论控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class CommentController extends FrontBase
{

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'MyCaptchaAction',
						'backColor'=>0xCCCCCC,  //背景色
						'foreColor'=> 0x3C5880,	//前景色
						//'fontFile' => $this->_webRoot.'/static/public/fonts/maturasc.ttf', //自定义字体
						'padding'=>0,
						'width' => 90,
						'height'=>30,
						'minLength'=>4,
						'maxLength'=>6,
						'testLimit'=>0,   //不限制输错次数
						'offset' => 2,    //字符间距
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}

  /**
   * 提交评论
   *
   * @return [type] [description]
   */
  public function actionCreate() {
  	
  	$this->layout = false;  

  	$view_url = $this->_request->getParam('view_url');
  	$topic_id = $this->_request->getParam('topic_id');
  	$topic_type = $this->_request->getParam('topic_type');
  	$cur_url = $this->_request->getUrl();
  	$post = false;
  	//评论类型
  	switch($topic_type){
  		case 'article':
  			$post = Post::model()->findByPk($topic_id);
  			break;
  		case 'image':
  			$post = Post::model()->findByPk($topic_id);
  			break;
  		case 'soft':
  			$post = Soft::model()->findByPk($topic_id);
  			break;
  		case 'video':
  			$post = Video::model()->findByPk($topic_id);
  			break;
  	}
  	if(!$post){
  		throw new CHttpException(404, Yii::t('admin','Submit Error'));
  		break;
  	}
  	//评论内容
  	$comments = Comment::model()->findAll("topic_id=:topic_id AND status=:status AND type=:type order by id DESC" , array(":topic_id"=>$topic_id, ":status"=>'Y',':type'=>$topic_type));
  	  	
  	$model = new Comment('create');
  	
  	//加载css,js
  	Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/comment.css");
  	Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
  	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
  	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
  	
  	if($this->_request->isPostRequest){
  		
  		$model->attributes = $_POST['Comment'];
  		$model->topic_id = $topic_id;
  		$model->type = $topic_type;
  		$model->user_id = Yii::app()->user->id;
  		$model->status = 'N';
  		$model->client_ip = $this->getClientIP();
  		$model->create_time = time();
  		
  		$ret_url = $_POST['ret_url'];  	
  			
  		if($model->save()){
  			$this->message('script', Yii::t('common','Submit Success, Waiting Pass'),$ret_url);
  			//$this->redirect($ret_url);
  		}
  	}

  	$this->render('create', array('model'=>$model, 'view_url'=>$view_url, 'cur_url'=>$cur_url, 'comments'=>$comments));
    
  }
  
  
}
