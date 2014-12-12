<?php
/**
 * 邮件日志管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class MaillogController extends Backend
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
        $model = new MailLog();
        $criteria = new CDbCriteria();
        $condition = '1';
        $accept = $this->_request->getParam( 'accept' ); //收件人
        $subject = $this->_request->getParam( 'subject' ); //主题
        $start_time = $this->_request->getParam( 'start_time' );  
        $end_time = $this->_request->getParam( 'end_time' );
        
        $accept && $condition .= " AND accept='{$accept}'";
        $subject && $condition .= " AND subject like '%{$subject}%'";
        //发送时间查询
        $start_time && $start_time = strtotime($start_time);
        $end_time && $end_time = strtotime($end_time);
        $start_time && $end_time && $condition .= " AND sendtime BETWEEN {$start_time} AND {$end_time}";      
        
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';        
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 20;
        $pageParams = $this->buildCondition( $_GET, array ( 'accept' ,'subject', 'start_time','end_time' ) );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );      
        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages, 'model'=>$model) );
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
	        case 'Delete':       
	        	//删除邮件  
	            foreach((array)$ids as $id){
	        		$maillogModel = MailLog::model()->findByPk($id);
	        		if($maillogModel){
	        			$maillogModel->delete();
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