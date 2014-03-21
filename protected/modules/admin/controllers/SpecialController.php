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
		$this->_catalog = Catalog::model()->findAll('status_is=:status',array('status'=>'Y'));
		//专题
		$this->_special = Special::model()->findAll('status_is=:status',array('status'=>'Y'));
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
	            $upload = new XUpload();
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
	            $upload = new XUpload();
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
