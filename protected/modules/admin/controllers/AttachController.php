<?php
/**
 * 附件管理
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class AttachController extends Backend
{
		
	public function actionIndex ()
	{		
		$model = new Upload();
		$criteria = new CDbCriteria();
		$condition = '1';
		$realname = trim(Yii::app()->request->getParam('realname'));
		$filename = trim(Yii::app()->request->getParam('file'));
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
			$command = trim(Yii::app()->request->getParam('command'));
			$ids = intval(Yii::app()->request->getParam('id'));
		} elseif ($this->method() == 'POST') {
			$command = Yii::app()->request->getPost('command');
			$ids = Yii::app()->request->getPost('id');			
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