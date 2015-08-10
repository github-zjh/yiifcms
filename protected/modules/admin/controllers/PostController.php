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
	public $_type;
	
	public function init(){
		parent::init();
		//内容模型id
		$this->_type = $this->_type_ids['post'];
		//文章栏目
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
    
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'  => 'Index',    //列表页
            'create' => 'Create',   //添加文章
            'update' => 'Update',   //编辑文章
            'batch'  => 'Batch',    //批量操作
        ), 'application.modules.admin.controllers.post');
        return array_merge($actions, $extra_actions);
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
	    		$upload = new Uploader;
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
    		}else{
    			//未改变前的封面图片
    			$model->attach_file = $_POST['old_file'];
    			$model->attach_thumb = $_POST['old_thumb'];
    		}
    		//组图
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];
    		
    		//标签(只要前10个标签)
    		$tags = trim($_POST['Post']['tags']);    		
    		$explodeTags = array_unique(explode(',', str_replace(array (' ' , '，' ), array('',','), $tags)));    		
    		
    		$explodeTags = array_slice($explodeTags, 0, 10);  
    		$model->tags = implode(',',$explodeTags);
    		
    		//摘要
    		$model->introduce = trim($_POST['Post']['introduce'])?$_POST['Post']['introduce']:Helper::truncate_utf8_string(preg_replace('/\s+/',' ',$_POST['Post']['content']), 200);
    		
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		if($model->save()){
    			//更新标签数据
				Tag::model()->updateTagData($explodeTags, array('content_id'=>$model->id, 'status'=>$model->status, 'type_id'=>$this->_type_ids['post']));
				$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    		}
    	}
    	//判断有无文章栏目
    	$article_cat = Catalog::model()->find('type=:type', array(':type'=>$this->_type));
    	if(!$article_cat){
    		$this->message('error',Yii::t('admin','No Catalog'),$this->createUrl('index'));
    	}
    	$this->render('update',array(
    			'model'=>$model,
    	));       
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
        					Uploader::deleteFile($image['file']);
        					$file = Upload::model()->findByPk($image['fileId']);
        					if($file){
        						$file->delete();
        					}
        				}
        			}
        			
        			Uploader::deleteFile($postModel->attach_file);
        			Uploader::deleteFile($postModel->attach_thumb);
        			
        			$postModel->delete();
        			
        			//删除关联的标签
        			TagData::model()->deleteAll('content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->_type_ids['post']));
        		}
        	}
            break;       
        case 'show':     
        	//文章显示      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status = 'Y';
        			$postModel->save();
        			//更新关联的标签
        			$tagData = TagData::model()->updateAll(array('status'=>'Y'),'content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->_type_ids['post']));
        		}
            }
            break;
        case 'hidden':     
        	//文章隐藏      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->status = 'N';
        			$postModel->save();
        			//更新关联的标签
        			$tagData = TagData::model()->updateAll(array('status'=>'N'),'content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->_type_ids['post']));
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
		
		case 'stick':     
        	//文章置顶      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->top_line = 'Y';
        			$postModel->save();
        		}
            }
            break;
        case 'cancelStick':     
        	//文章取消置顶      
        	foreach((array)$ids as $id){
        		$postModel = Post::model()->findByPk($id);        		
        		if($postModel){
        			$postModel->top_line = 'N';
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
