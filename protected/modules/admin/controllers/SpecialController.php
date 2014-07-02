<?php
/**
 * 专题管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class SpecialController extends Backend
{
	protected $_catalog;
	protected $_special;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status',array('status'=>'Y'));
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
        $model = new Special();
        $criteria = new CDbCriteria();
        $condition = '1';
        $title = $this->_request->getParam( 'title' );
        $titleAlias = $this->_request->getParam( 'titleAlias' );
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $titleAlias && $condition .= ' AND title_alias LIKE \'%' . $titleAlias . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition( $_GET, array ( 'page_name_alias' , 'page_name' ) );
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
        
       $model = new Special();
        if ( isset( $_POST['Special'] ) ) {
            $model->attributes = $_POST['Special'];
            
	        if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	            $upload = new Uploader();
	            $upload->_thumb_width = '500';
	            $upload->_thumb_height = '400';
	            $upload->uploadFile( $_FILES['attach'], true);
		           
	            if($upload->_error){
	            	$upload->deleteFile($upload->_file_name);
	            	$upload->deleteFile($upload->_thumb_name);
	            	$this->message('error', Yii::t('admin',$upload->_error));
	            	return;
	            }
	            $model->attach_file = $upload->_file_name;
	            $model->attach_thumb = $upload->_thumb_name;
            }
            $model->create_time = time();            
            if ( $model->save() ) {               
                $this->redirect( array( 'special/index' ) );
            }
        }
        $this->render( 'create', array ( 'model' => $model ) );
    }

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {
    	$model = Special::model()->findByPk( $id );
        if ( isset( $_POST['Special'] ) ) {
            $model->attributes = $_POST['Special'];
        	if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
	            $upload = new Uploader();
	            $upload->_thumb_width = '500';
	            $upload->_thumb_height = '400';
	            $upload->uploadFile( $_FILES['attach'], true);
		           
	            if($upload->_error){
	            	$upload->deleteFile($upload->_file_name);
	            	$upload->deleteFile($upload->_thumb_name);
	            	$this->message('error', Yii::t('admin',$upload->_error));
	            	return;
	            }
	            $model->attach_file = $upload->_file_name;
	            $model->attach_thumb = $upload->_thumb_name;
            }
            if ( $model->save() ) {                
                $this->redirect( array( 'special/index' ) );
            }
        }
        $this->render( 'update', array ( 'model' => $model ) );
        
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
            $this->message( 'errorBack', Yii::t('admin','Only POST Or GET'));
        }
        empty( $ids ) && $this->message( 'error', Yii::t('admin','No Select') );

        switch ( $command ) {        
        case 'specialDelete':          
        	foreach((array)$ids as $id){
        		$specialModel = Special::model()->findByPk($id);
        		if($specialModel){
        			Uploader::deleteFile($specialModel->attach_file);
        			Uploader::deleteFile($specialModel->attach_thumb);
        			$specialModel->delete();
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
