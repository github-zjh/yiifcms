<?php
/**
 * 视频管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class VideoController extends Backend
{
	protected $_catalog;
	protected $_video_type;	
	
	public function init(){
		parent::init();
		//视频栏目
		$this->_catalog = Catalog::model()->findAll('status_is=:status AND type=:type',array(':status'=>'Y',':type'=>'video'));
		$this->_video_type = array(
					'comedy'=>'喜剧',
					'active'=>'动作',
					'story' => '剧情',
					'science'=>'科幻',
					'terrified'=>'惊悚',
					'war'=>'战争', 
	    			'sexy'=>'伦理'
				);    	
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
        $model = new Video();
        $criteria = new CDbCriteria();
        $condition = "type = 'video'";
        $name = trim( $this->_request->getParam( 'name' ) );        
        $catalogId = intval( $this->_request->getParam( 'catalogId' ) );
        $title && $condition .= ' AND name LIKE \'%' . $name . '%\'';        
        $catalogId && $condition .= ' AND catalog_id= ' . $catalogId;
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据title,catelogId,titleAlias查询
        $pageParams = $this->buildCondition( $_GET, array ( 'name' , 'catalogId') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    
        //推荐位
        $recom_list = RecommendPosition::model()->findAll('type=:type', array(':type'=>'video'));
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ,'recom_list'=>$recom_list) );
    }

    /**
     * 新增数据
     *
     */
    public function actionCreate() 
    {        
     	$model = new Video();       
    	if(isset($_POST['Video']))
    	{    		
    		$model->attributes=$_POST['Video'];      		
    		//软件文件
    		$fileids = is_array($_POST['fileid'])?implode(',',$_POST['fileid']):'';
    		$model->fileid = $fileids;
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;	    		
	    		$upload->uploadFile($_FILES['attach']);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);	    		
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->cover_image = $upload->_file_name;	    		
    		}  
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    	}
    	//判断有无视频栏目
    	$video_cat = Catalog::model()->find('type=:type', array(':type'=>'video'));
    	if(!$video_cat){
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
    	$model = Video::model()->findByPk($id);    	
    	if(isset($_POST['Video']))
    	{
    		$model->attributes=$_POST['Video']; 
    		//视频文件    		
    		$fileids = is_array($_POST['fileid'])?implode(',',$_POST['fileid']):'';
    		$model->fileid = $fileids;
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new XUpload;
	    		$upload->_thumb_width = 100;
	    		$upload->_thumb_height = 100;    		
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);	    			
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->cover_image = $upload->_file_name;	    		
    		}
    		$model->update_time = time();
    		if($model->save())
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    	}	
    	    	
    	$this->render('update',array('model'=>$model));    	
        
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
        	//删除文章     
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);
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
        case 'commentDelete':       
        	//删除评论   
            foreach((array)$ids as $id){
        		$commentModel = PostComment::model()->findByPk($id);
        		if($commentModel){
        			$commentModel->delete();
        		}
            }
            break;
        case 'commentVerify':         
        	//评论审核通过  
         	foreach((array)$ids as $id){
        		$commentModel = PostComment::model()->findByPk($id);        		
        		if($commentModel){
        			$commentModel->status_is = 'Y';
        			$commentModel->save();
        		}
            }
            break;
        case 'commentUnVerify':    
        	//评论取消审核
        	foreach((array)$ids as $id){
        		$commentModel = PostComment::model()->findByPk($id);        		
        		if($commentModel){
        			$commentModel->status_is = 'N';
        			$commentModel->save();
        		}
            }
            break;
        case 'show':     
        	//文章显示      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status_is = 'Y';
        			$postModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//文章隐藏      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status_is = 'N';
        			$postModel->save();
        		}
            }
            break;
        case 'commend':     
        	//文章推荐
        	foreach((array)$ids as $id){        		
        		$recom_id = intval($_POST['recom_id']);
        		if($recom_id){
        			$postModel = Post::model()->findByPk($id);
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
        	//文章取消推荐
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);
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
