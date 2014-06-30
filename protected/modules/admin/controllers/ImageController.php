<?php
/**
 * 图集管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class ImageController extends Backend
{
	protected $_catalog;
	protected $_special;
	protected $_type;
	
	public function init(){
		parent::init();
		//内容模型id
		$this->_type = $this->_type_ids['image'];
		//图集栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type=:type',array(':status'=>'Y',':type'=>$this->_type));
		//专题
		$this->_special = Special::model()->findAll('status=:status',array('status'=>'Y'));
	}
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
	}
	
    /**
     * 首页
     *
     */
	
    public function actionIndex() {
        $model = new Image();
        $criteria = new CDbCriteria();
        $condition = "type = ".$this->_type;
        $title = trim( $this->_request->getParam( 'title' ) );      
        $catalogId = intval( $this->_request->getParam( 'catalogId' ) );
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';       
        $catalogId && $condition .= ' AND catalog_id= ' . $catalogId;
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据title,catelogId,titleAlias查询
        $pageParams = $this->buildCondition( $_GET, array ( 'title' , 'catalogId','titleAlias' ) );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    
        //推荐位
        $recom_list = RecommendPosition::model()->findAll('type=:type', array(':type'=>$this->_type));
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ,'recom_list'=>$recom_list) );
    }

    /**
     * 新增数据
     *
     */
    public function actionCreate() {
        
        $model = new Image();       
    	if(isset($_POST['Image']))
    	{
    		$model->attributes=$_POST['Image'];
    		//标题样式
    		$title_style = $this->_request->getPost('style');   
    		if($title_style['bold'] != 'Y'){
    			unset($title_style['bold']);
    		}
    		if($title_style['underline'] != 'Y'){
    			unset($title_style['underline']);
    		}
    		if(!$title_style['color']){
    			unset($title_style['color']);
    		}
    		if($title_style){    			
    			$model->title_style = serialize($title_style);
    		}else{
    			$model->title_style = '';
    		}
    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;
	    		$upload->_thumb_width = 300;
	    		$upload->_thumb_height = 300;
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->attach_file = $upload->_file_name;
	    		$model->attach_thumb = $upload->_thumb_name;
    		}
    		//组图
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];
    		
    		//标签
    		$tags = trim($_POST['Image']['tags']);
    		$explodeTags = array_unique(explode(',', str_replace(array (' ' , '，' ), ',', $tags)));
    		$tagCount = 0;
    		foreach ((array) $explodeTags as $value) {
    			$tagCount ++;
    			if ($tagCount >= 10) {
    				unset($explodeTags);
    				break;
    			}
    			$model_tag = new PostTags();
    			$get_tags = $model_tag->find('tag_name=:tagname', array(':tagname'=>$value));
    			if($get_tags){
    				$get_tags->data_count = $get_tags->data_count+1;
    				$get_tags->save();
    			}else{
    				$model_tag->data_count = 1;
    				$model_tag->tag_name = $value;
    				$model_tag->create_time = time();
    				$model_tag->save();
    			}
    		}
    		$model->create_time = time();
    		$model->last_update_time = $model->create_time;
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    	}
    	//判断有无图集栏目
    	$image_cat = Catalog::model()->find('type=:type', array(':type'=>$this->_type));
    	if(!$image_cat){
    		$this->message('error',Yii::t('admin','No Catalog'),$this->createUrl('index'));
    	}
    	$this->render('update',array(
    			'model'=>$model,
    	));       
    }   

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {
    	$model = Image::model()->findByPk($id);    	
    	if(isset($_POST['Image']))
    	{
    		$model->attributes=$_POST['Image'];
    		//标题样式
    		$title_style = $this->_request->getPost('style');   
    		if($title_style['bold'] != 'Y'){
    			unset($title_style['bold']);
    		}
    		if($title_style['underline'] != 'Y'){
    			unset($title_style['underline']);
    		}
    		if(!$title_style['color']){
    			unset($title_style['color']);
    		}
    		if($title_style){    			
    			$model->title_style = serialize($title_style);
    		}else{
    			$model->title_style = '';
    		}
    		
    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;
	    		$upload->_thumb_width = 300;
	    		$upload->_thumb_height = 300;    		
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->attach_file = $upload->_file_name;
	    		$model->attach_thumb = $upload->_thumb_name;
    		}
    		//组图
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];
    		
    		//标签    		
    		$tags = trim($_POST['Image']['tags']);    		
    		$explodeTags = array_unique(explode(',', str_replace(array (' ' , '，' ), ',', $tags)));
    		$tagCount = 0;
    		foreach ((array) $explodeTags as $value) {
    			$tagCount ++;
    			if ($tagCount >= 10) {
    				unset($explodeTags);
    				break;
    			}    			
    			$model_tag = new PostTags();
    			$get_tags = $model_tag->find('tag_name=:tagname', array(':tagname'=>$value));    			
    			if(!$get_tags){    				    				
    				$model_tag->data_count = 1;
    				$model_tag->tag_name = $value;
    				$model_tag->create_time = time();
    				$model_tag->save();
    			}
    		}    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    	}else{
    		$imageList = unserialize($model->image_list);
    		$style = unserialize($model->title_style);
    	}   	
    	    	
    	$this->render('update',array(
    			'model'=>$model,
    			'imageList' => $imageList,
    			'style' => $style,
    	));    	
        
    }

    /**
     * 评论管理
     *
     */
    public function actionComment() {
        
        $model = new PostComment();
        $criteria = new CDbCriteria();
        $condition = '1';
        $postTitle = $this->_request->getParam( 'postTitle' );
        $content = $this->_request->getParam( 'content' );
        $postTitle && $condition .= ' AND post.title LIKE \'%' . $postTitle . '%\'';
        $content && $condition .= ' AND t.content LIKE \'%' . $content . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'post' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition( $_GET, array ( 'postTitle' , 'content' ) );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        $this->render( 'post_comment', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionCommentUpdate( $id ) {        
        $model = PostComment::model()->findByPk($id);
        if ( isset( $_POST['PostComment'] ) ) {
            $model->attributes = $_POST['PostComment'];
            if ( $model->save() ) {               
                $this->redirect( array ( 'comment' ) );
            }
        }
        $this->render( 'post_comment_update', array ( 'model' => $model ) );
    }

    /**
     * 标签管理
     *
     */
    public function actionTags() {
        $model = new PostTags();
        $criteria = new CDbCriteria();
        $condition = '1';
        $tagName = $this->_request->getParam( 'tagName' );
        $tagName && $condition .= ' AND tag_name LIKE \'%' . $tagName . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition( $_GET, array ( 'tagName') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        $this->render( 'post_tags', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 批量操作
     *
     */
    public function actionBatch() {
        if ( $this->method() == 'GET' ) {
            $command = trim( $_GET['command'] );
            $ids = intval( $_GET['id'] );
        } elseif ( $this->method() == 'POST' ) {
            $command = trim( $_POST['command'] );
            $ids = $_POST['id'];
        } else {
            $this->message( 'errorBack', Yii::t('admin','Only POST Or GET') );
        }
        empty( $ids ) && $this->message( 'error', Yii::t('admin','No Select') );

        switch ( $command ) {
        case 'delete':      
        	//删除图集     
        	foreach((array)$ids as $id){
        		$postModel = Image::model()->findByPk($id);
        		if($postModel){
        			$image_list = $postModel->image_list;
        			$image_list && $image_list = unserialize($image_list);
        			if($image_list){
        				foreach($image_list as $image){
        					XUpload::deleteFile($image['file']);
        					$file = Upload::model()->findByPk($image['fileId']);
        					if($file){
        						$file->delete();
        					}
        				}
        			}
        			
        			XUpload::deleteFile($postModel->attach_file);
        			XUpload::deleteFile($postModel->attach_thumb);
        			
        			$postModel->delete();
        		}
        	}
            break;      
        case 'show':     
        	//图集显示      
        	foreach((array)$ids as $id){
        		$postModel = Image::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status = 'Y';
        			$postModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//图集隐藏      
        	foreach((array)$ids as $id){
        		$postModel = Image::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status = 'N';
        			$postModel->save();
        		}
            }
            break;
        case 'commend':     
        	//图集推荐
        	foreach((array)$ids as $id){        		
        		$recom_id = intval($_POST['recom_id']);
        		if($recom_id){
        			$postModel = Image::model()->findByPk($id);
	        		if($postModel){
	        			$postModel->commend = 'Y';
	        			$postModel->save();
	        			$recom_post = new RecommendPost();
	        			$recom_post->id = $recom_id;
	        			$recom_post->post_id = $id;
	        			$recom_post->save();
	        		}
        		}else{
        			$this->message('error', Yii::t('admin','RecommendPosition is Required'));
        		}
        	}                 
            break;
        case 'unCommend': 
        	//图集取消推荐
        	foreach((array)$ids as $id){
        		$postModel = Image::model()->findByPk($id);
        		if($postModel){
        			$postModel->commend = 'N';
        			$postModel->save();
        		}
        	}                    
            break;        
         default:
            throw new CHttpException(404, Yii::t('admin','Error Operation'));
            break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'));
    }
}
