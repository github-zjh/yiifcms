<?php
/**
 * 附件管理
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class AttachController extends Backend
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
	
	public function actionIndex ()
	{		
		$model = new Upload();
		$criteria = new CDbCriteria();
		$condition = '1';
		$realname = trim($this->_request->getParam('realname'));
		$filename = trim($this->_request->getParam('file'));
		$realname && $condition .= ' AND t.real_name LIKE \'%' . $realname . '%\'';
		$filename && $condition .= ' AND t.file_name LIKE \'%' . $filename . '%\'';
		$criteria->condition = $condition;
		// $criteria->params = '';
		$criteria->order = 't.id DESC';
		$count = $model->count($criteria);
	
		$pages = new CPagination($count);
		$pages->pageSize = 13;
		$pageParams = $this->buildCondition($_GET, array ('filename' , 'nickname' ));
		$pages->params = is_array($pageParams) ? $pageParams : array ();
	
		$criteria->limit = $pages->pageSize;
		$criteria->offset = $pages->currentPage * $pages->pageSize;
		$result = $model->findAll($criteria);
		$this->render('attach_index', array ('datalist' => $result , 'pagebar' => $pages ));
	}
	
	/**
	 * 批量操作
	 * @throws CHttpException
	 */
	public function actionBatch ()
	{
		if ($this->method() == 'GET') {
			$command = trim($this->_request->getParam('command'));
			$ids = intval($this->_request->getParam('id'));
		} elseif ($this->method() == 'POST') {
			$command = $this->_request->getPost('command');
			$ids = $this->_request->getPost('id');			
		} else {
			throw new CHttpException(404, Yii::t('admin','Only POST Or GET'));
		}
		empty($ids) && $this->message('error',  Yii::t('admin','No Select'));		
		switch ($command) {
			case 'attachDelete':		
				foreach((array)$ids as $id){
            		$uploadModel = Upload::model()->findByPk($id);
            		if($uploadModel){
            			Uploader::deleteFile($uploadModel->file_name);
            			$uploadModel->delete();
            		}
            	}
            	break;	
			default:
				throw new CHttpException(404, Yii::t('admin','Error Operation'));
				break;
		}
		$this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('index'));
	
	}

}