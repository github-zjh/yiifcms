<?php
/**
 * 内容管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class PostController extends Backend
{
	protected $_catalog;
	protected $_special;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status_is=:status',array('status'=>'Y'));
		//专题
		$this->_special = Special::model()->findAll('status_is=:status',array('status'=>'Y'));
	}
    /**
     * 首页
     *
     */
	
    public function actionIndex() {
        $model = new Post();
        $criteria = new CDbCriteria();
        $condition = '1';
        $title = trim( $this->_request->getParam( 'title' ) );
        $titleAlias = trim( $this->_request->getParam( 'titleAlias' ) );
        $catalogId = intval( $this->_request->getParam( 'catalogId' ) );
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $titleAlias && $condition .= ' AND title_alias LIKE \'%' . $titleAlias . '%\'';
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
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 新增数据
     *
     */
    public function actionCreate() {
        
        $model = new Post();       
    	if(isset($_POST['Post']))
    	{
    		$model->attributes=$_POST['Post'];
    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;
	    		$upload->_thumb_width = 100;
	    		$upload->_thumb_height = 100;
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
    		$tags = trim($_POST['Post']['tags']);
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
    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('post/index'));
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
    	$model = Post::model()->findByPk($id);    	
    	if(isset($_POST['Post']))
    	{
    		$model->attributes=$_POST['Post'];
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;
	    		$upload->_thumb_width = 100;
	    		$upload->_thumb_height = 100;    		
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
    		$tags = trim($_POST['Post']['tags']);    		
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
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('post/index'));
    	}else{
    		$imageList = unserialize($model->image_list);
    	}   	
    	
    	$this->render('update',array(
    			'model'=>$model,
    			'imageList' => $imageList,
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
        parent::_acl( 'post_comment_update' );
        $model = parent::_dataLoad( new PostComment(), $id );
        if ( isset( $_POST['PostComment'] ) ) {
            $model->attributes = $_POST['PostComment'];
            if ( $model->save() ) {
                parent::_adminiLogger( array ( 'catalog' => 'update' , 'intro' => '编辑内容评论，ID:' . $id ) ); 
                $this->redirect( array ( 'comment' ) );
            }
        }
        $this->render( 'post_comment_update', array ( 'model' => $model ) );
    }

    /**
     * 标签管理
     *
     */
    public function actionPostTags() {
        $model = new PostTags();
        $criteria = new CDbCriteria();
        $condition = '1';
        $tagName = $this->_request->getParam( 'tagName' );
        $tagName && $condition .= ' AND tag_name LIKE \'%' . $tagName . '%\'';
        $catalog_id = intval( $this->_request->getParam( 'catalog_id' ) );
        $catalog_id && $condition .= ' AND t.catalog_id= ' . $catalog_id;
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = 'catalog';
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = XUtils::buildCondition( $_GET, array ( 'tagName' , 'catalog_id' ) );
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
            is_array( $ids ) && $ids = implode( ',', $ids );
        } else {
            $this->message( 'errorBack', '只支持POST,GET数据' );
        }
        empty( $ids ) && $this->message( 'error', '未选择记录' );

        switch ( $command ) {
        case 'delete':           
            $commentModel = new PostComment();
            $commentModel->deleteAll( 'post_id IN(' . $ids . ')' );           
            parent::_delete( new Post(), $ids, array ( 'index' ), array( 'attach_file', 'attach_thumb' ) );
            break;
        case 'commentDelete':          
            parent::_delete( new PostComment(), $ids, array ( 'comment' ) );
            break;
        case 'commentVerify':           
            parent::_verify( new PostComment(), 'verify', $ids, array ( 'comment' ) );
            break;
        case 'commentUnVerify':           
            parent::_verify( new PostComment(), 'unVerify', $ids, array ( 'comment' ) );
            break;
        case 'verify':           
            parent::_verify( new Post(), 'verify', $ids, array ( 'index' ) );
            break;
        case 'unVerify':           
            parent::_verify( new Post(), 'unVerify', $ids, array ( 'index' ) );
            break;
        case 'commend':           
            parent::_commend( new Post(), 'commend', $ids, array ( 'index' ) );
            break;
        case 'unCommend':          
            parent::_commend( new Post(), 'unCommend', $ids, array ( 'index' ) );
            break;
        case 'specialDelete':          
            parent::_delete( new Special(), $ids, array ( 'special' ), array( 'attach_file', 'attach_thumb' ) );
            break;
        default:
            throw new CHttpException(404, '错误的操作类型:' . $command);
            break;
        }
    }
}
