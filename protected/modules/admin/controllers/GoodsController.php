<?php
/**
 * 内容管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class GoodsController extends Backend
{
	protected $_catalog;
	protected $_special;
	protected $_type;
	
	public function init(){
		parent::init();
		//内容模型id
		$this->_type = $this->_type_ids['goods'];
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type=:type',array(':status'=>'Y',':type'=>$this->_type));
		
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
        $model = new Goods();
        $criteria = new CDbCriteria();
        $condition = "type = ".$this->_type;
        $goods_name = trim( $this->_request->getParam( 'goods_name' ) );     
        $catalogId = intval( $this->_request->getParam( 'catalogId' ) );
        $goods_name && $condition .= ' AND goods_name LIKE \'%' . $goods_name . '%\'';       
        $catalogId && $condition .= ' AND catalog_id= ' . $catalogId;
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( 'catalog' );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据goods_name,catelogId查询
        $pageParams = $this->buildCondition( $_GET, array ( 'goods_name' , 'catalogId') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    
        //推荐位
        $recom_list = RecommendPosition::model()->findAll('type=:type', array(':type'=>$this->_type), array('order'=>'id'));
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ,'recom_list'=>$recom_list) );
    }

    /**
     * 新增数据
     *
     */
    public function actionCreate() {
        
        $model = new Goods();       
    	if(isset($_POST['Goods']))
    	{
    		$model->attributes=$_POST['Goods'];
    		    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new Uploader;
	    		$upload->_thumb_width = 300;
	    		$upload->_thumb_height = 300;
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->default_image = $upload->_file_name;
	    		$model->default_thumb = $upload->_thumb_name;
    		}
    		//组图
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];    
    		//添加时间
    		$model->create_time = time();
    		$model->update_time = $model->create_time;
    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    	}
    	//判断有无商品栏目
    	$goods_cat = Catalog::model()->find('type=:type', array(':type'=>$this->_type));
    	if(!$goods_cat){
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
    	$model = Goods::model()->findByPk($id);    	
    	if(isset($_POST['Goods']))
    	{
    		$model->attributes=$_POST['Goods'];
    		    		
    		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	    		//封面图片
	    		$upload = new Uploader;
	    		$upload->_thumb_width = 300;
	    		$upload->_thumb_height = 300;
	    		$upload->uploadFile($_FILES['attach'], true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}    		
	    		$model->default_image = $upload->_file_name;
	    		$model->default_thumb = $upload->_thumb_name;
    		}
    		//组图
    		$imageList = $this->_request->getPost( 'imageList' );
    		$imageListSerialize = $this->imageListSerialize($imageList);
    		$model->image_list = $imageListSerialize['dataSerialize'];    
    		
    		//更新时间
    		$model->update_time = time();
    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    	}else{
    		$imageList = unserialize($model->image_list);    		
    	}   	
    	    	
    	$this->render('update',array(
    			'model'=>$model,
    			'imageList' => $imageList    			
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
        	//删除商品     
        	foreach((array)$ids as $id){
        		$goodsModel = Goods::model()->findByPk($id);
        		if($goodsModel){
        			$image_list = $goodsModel->image_list;
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
        			
        			Uploader::deleteFile($goodsModel->default_image);
        			Uploader::deleteFile($goodsModel->default_thumb);
        			
        			$goodsModel->delete();
        		}
        	}
            break;
       
        case 'show':     
        	//商品显示      
        	foreach((array)$ids as $id){
        		$goodsModel = Goods::model()->findByPk($id);        		
        		if($goodsModel){
        			$goodsModel->status = 'Y';
        			$goodsModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//商品隐藏      
        	foreach((array)$ids as $id){
        		$goodsModel = Goods::model()->findByPk($id);        		
        		if($goodsModel){
        			$goodsModel->status = 'N';
        			$goodsModel->save();
        		}
            }
            break;
        case 'commend':     
        	//商品推荐
        	foreach((array)$ids as $id){        		
        		$recom_id = intval($_POST['recom_id']);
        		if($recom_id){
        			$goodsModel = Goods::model()->findByPk($id);
	        		if($goodsModel){
	        			$goodsModel->recommend = 'Y';
	        			$goodsModel->save();	        			
	        		}
        		}else{
        			$this->message('error', Yii::t('admin','RecommendPosition is Required'));
        		}
        	}                 
            break;
        case 'unCommend': 
        	//商品取消推荐
        	foreach((array)$ids as $id){
        		$goodsModel = Goods::model()->findByPk($id);
        		if($goodsModel){
        			$goodsModel->commend = 'N';
        			$goodsModel->save();
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
