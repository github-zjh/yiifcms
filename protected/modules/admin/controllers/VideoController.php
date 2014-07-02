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
	protected $_type;
	
	public function init(){
		parent::init();
		$this->_type = $this->_type_ids['video'];
		//视频栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type=:type',array(':status'=>'Y',':type'=>$this->_type));
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
        $condition = "type = ".$this->_type;
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
        $recom_list = RecommendPosition::model()->findAll('type=:type', array(':type'=>$this->_type));
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
	    		$upload = new Uploader;	    		
	    		$upload->uploadFile($_FILES['attach']);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);	    		
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->cover_image = $upload->_file_name;	    		
    		}else{
    			//未改变前的封面图片
    			$model->cover_image = $_POST['old_cover'];    			
    		}
    		  
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    	}
    	//判断有无视频栏目
    	$video_cat = Catalog::model()->find('type=:type', array(':type'=>$this->_type));
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
	    		$upload = new Uploader;
	    		$upload->_thumb_width = 100;
	    		$upload->_thumb_height = 100;    		
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);	    			
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->cover_image = $upload->_file_name;	    		
    		}else{
    			//未改变前的封面图片
    			$model->cover_image = $_POST['old_cover'];    			
    		}
    		$model->update_time = time();
    		if($model->save())
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    	}	
    	    	
    	$this->render('update',array('model'=>$model));    	
        
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
        	//删除视频     
        	foreach((array)$ids as $id){
        		$postModel = Video::model()->findByPk($id);
        		if($postModel){        			
        			Uploader::deleteFile($postModel->cover_image);
        			$postModel->delete();
        		}
        	}
            break;      
        case 'show':     
        	//视频显示      
        	foreach((array)$ids as $id){
        		$postModel = Video::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status = 'Y';
        			$postModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//视频隐藏      
        	foreach((array)$ids as $id){
        		$postModel = Video::model()->findByPk($id);  
        		if($postModel){
        			$postModel->status = 'N';
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
