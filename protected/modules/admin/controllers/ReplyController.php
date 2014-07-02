<?php
/**
 * 回复管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class ReplyController extends Backend
{	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),'','',true);
			return false;
		}
		return true;
	}
	
	
 	/**
     * 回复管理
     *
     */
    public function actionIndex() {    	
        $model = new Reply();
        $criteria = new CDbCriteria();
        $condition = '1';
        $status = $this->_request->getParam( 'status' );       
        $status && $condition .= " AND t.status='{$status}'";       
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 15;
        $pageParams = $this->buildCondition( $_GET, array ('status') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        
        Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");       
        Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
        
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {        
        $model = Reply::model()->findByPk($id);
        if ( isset( $_POST['Reply'] ) ) {
            $model->attributes = $_POST['Reply'];
            if ( $model->save() ) {               
                $this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
            }
        }
        $this->render( 'update', array ( 'model' => $model ) );
    }
	
    /**
	 * 批量操作
	 *
	 */
    public function actionBatch ()
    {
        
        if ($this->method() == 'GET') {
            $command = trim($_GET['command']);
            $ids = intval($_GET['id']);
        } else 
            if ($this->method() == 'POST') {
                $command = trim($_POST['command']);
                $ids = $_POST['id'];               
            } else {
                $this->message('errorBack', Yii::t('admin','Only POST Or GET'));
            }
        empty($ids) && $this->message('error', Yii::t('admin','No Select'));
        
        switch ($command) {
	        case 'delete':       
	        	//删除回复
	            foreach((array)$ids as $id){
	        		$replyModel = Reply::model()->findByPk($id);
	        		if($replyModel){
	        			$replyModel->delete();
	        		}
	            }
            	break;
	        case 'verify':         
	        	//回复审核通过  
	         	foreach((array)$ids as $id){
	        		$replyModel = Reply::model()->findByPk($id);        		
	        		if($replyModel){
	        			$replyModel->status = 'Y';
	        			$replyModel->save();
	        		}
	            }
	            break;
	        case 'unVerify':    
	        	//回复取消审核
	        	foreach((array)$ids as $id){
	        		$replyModel = Reply::model()->findByPk($id);        		
	        		if($replyModel){
	        			$replyModel->status = 'N';
	        			$replyModel->save();
	        		}
	            }
	            break;
            default:
                throw new CHttpException(404,  Yii::t('admin','Error Operation'));
                break;
        }
        
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('index'));
        
    }

}