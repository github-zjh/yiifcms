<?php
/**
 * 评论管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class CommentController extends Backend
{
	protected $_model_type;
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
     * 评论管理
     *
     */
    public function actionIndex() {
    	$this->_model_type = ModelType::model()->findAll();
        $model = new Comment();
        $criteria = new CDbCriteria();
        $condition = '1';
        $status = $this->_request->getParam( 'status' );
        $title = $this->_request->getParam( 'postTitle' );
        $content = $this->_request->getParam( 'content' );
        $type = $this->_request->getParam( 'type' )?$this->_request->getParam( 'type' ):$this->_type_ids['post'];
        $type && $condition .= " AND type={$type}";
        $status && $condition .= " AND t.status='{$status}'";
        $table = array_search($type,$this->_type_ids);
        if($table == 'goods'){
        	$title && $condition .= " AND {$table}.goods_name LIKE '%$title %'";
        }else{
        	$title && $condition .= " AND {$table}.title LIKE '%$title %'";
        }        
        $content && $condition .= ' AND t.content LIKE \'%' . $content . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $criteria->with = array ( $table );
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition( $_GET, array ( 'postTitle' ,'status', 'content','type' ) );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );
        
        Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
        Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
        
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages, 'table'=>$table ) );
    }

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {        
        $model = Comment::model()->findByPk($id);
        if ( isset( $_POST['Comment'] ) ) {
            $model->attributes = $_POST['Comment'];
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
	        case 'commentDelete':       
	        	//删除评论   
	            foreach((array)$ids as $id){
	        		$commentModel = Comment::model()->findByPk($id);
	        		if($commentModel){
	        			$commentModel->delete();
	        		}
	            }
            	break;
	        case 'commentVerify':         
	        	//评论审核通过  
	         	foreach((array)$ids as $id){
	        		$commentModel = Comment::model()->findByPk($id);        		
	        		if($commentModel){
	        			$commentModel->status = 'Y';
	        			$commentModel->save();
	        		}
	            }
	            break;
	        case 'commentUnVerify':    
	        	//评论取消审核
	        	foreach((array)$ids as $id){
	        		$commentModel = Comment::model()->findByPk($id);        		
	        		if($commentModel){
	        			$commentModel->status = 'N';
	        			$commentModel->save();
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