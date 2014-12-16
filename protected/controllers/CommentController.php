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
  	$cur_url = $this->_request->hostinfo.$this->_request->getUrl();
  	$post = false;
  	//评论类型
  	switch($topic_type){
  		case 'post':
  			$post = Post::model()->findByPk($topic_id);
  			break;
  		case 'image':
  			$post = Image::model()->findByPk($topic_id);
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
  	$model = new Comment('create');
  	$criteria = new CDbCriteria();
  	$condition = "topic_id={$topic_id} AND status='Y' AND type={$this->_type_ids[$topic_type]}";
  	$criteria->condition = $condition;
  	$criteria->order = 'id DESC';  
  	$criteria->select = "id, user_id, topic_id, content, create_time ";
  	
  	//分页
  	$count = $model->count( $criteria );
  	$pages = new CPagination( $count );
  	$pages->pageSize = 10;  	 
  	$criteria->limit = $pages->pageSize;
  	$criteria->offset = $pages->currentPage * $pages->pageSize;
  	$comments = $model->findAll($criteria);   
  	
  	//回复
  	if($comments){
  		foreach((array)$comments as $c){  			
  			$replies[$c->id] = Reply::model()->findAll('cid=:cid AND status=:status ORDER BY id' , array(':cid'=>$c->id,':status'=>'Y'));
  		}
  	}
  	
  	//加载css,js
  	Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/comment.css");
  	Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
  	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
  	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
  	
  	if($this->_request->isPostRequest){
  		$uid = Yii::app()->user->id;
  		if(!$uid){
  			$this->message('script', Yii::t('common','You Need Login'));
  		}
  		
  		$model->attributes = $_POST['Comment'];
  		$model->topic_id = $topic_id;
  		$model->type = $this->_type_ids[$topic_type];
  		$model->user_id = $uid;
  		$model->status = 'N';
  		$model->client_ip = $this->_request->userHostAddress;
  		$model->create_time = time();
  		
  		$ret_url = $_POST['ret_url'];  	
  			
  		if($model->save()){
  			$this->message('script', Yii::t('common','Submit Success, Waiting Pass'),$ret_url);
  			//$this->redirect($ret_url);
  		}
  	}
  	$data = array(
  		'model'=>$model, 
  		'view_url'=>$view_url, 
  		'cur_url'=>$cur_url, 
  		'comments'=>$comments,
  		'pagebar'=>$pages,
  		'replies'=>$replies
  	);  	
  	$this->render('create', $data);
    
  }
  
  /**
   * 
   * 对评论的回复
   * @author zhao jinhan
   * @return JSON
   * 
   */
  public function actionReply(){
  	  $this->layout = false;
  	  if($this->_request->isPostRequest){
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
