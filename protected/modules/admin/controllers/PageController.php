<?php
/**
 * 单页管理
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class PageController extends Backend
{
    /*
	 * 首页
	 */
    public function actionIndex ()
    {        
        $model = new Page();
        $criteria = new CDbCriteria();
        $condition = '1';
        $title = $this->_request->getParam('title');
        $titleAlias = $this->_request->getParam('titleAlias');
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $titleAlias && $condition .= ' AND title_alias LIKE \'%' . $titleAlias . '%\'';
        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('page_name_alias' , 'page_name' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 单页添加
	 */
    public function actionCreate ()
    {        
        $model = new Page();
        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
            if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
            	$upload = new Uploader();
            	$upload->_thumb_width = '200';
            	$upload->_thumb_height = '180';
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
            if ($model->save()) {               
                $this->redirect(array ('index' ));
            }
        }
        $this->render('create', array ('model' => $model ));
    }

    /**
	 * 单页更新
	 *
	 * @param $id        	
	 */
    public function actionUpdate ($id)
    {        
        $model = Page::model()->findByPk($id);
        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
        	if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
        		
            	$upload = new Uploader();
            	$upload->_thumb_width = '200';
            	$upload->_thumb_height = '180';
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
            $model->create_time = $model->create_time?$model->create_time:time();
            $model->update_time = time();
            
            if ($model->save()) {                
                $this->redirect(array ('index' ));
            }
           
        }
        $this->render('update', array ('model' => $model ));
    
    }
    
    /**
	 * 批量操作
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
            case 'delete':
        		foreach((array)$ids as $id){
            		$pageModel = Page::model()->findByPk($id);
            		if($pageModel){
            			Uploader::deleteFile($pageModel->attach_file);
            			Uploader::deleteFile($pageModel->attach_thumb);
            			$pageModel->delete();
            		}
            	}
            	break;
            case 'show' :
				foreach ( ( array ) $ids as $id ) {
					$pageModel = Page::model ()->findByPk ( $id );
					if ($pageModel) {
						$pageModel->status = 'Y';
						$pageModel->save ();
					}
				}
				break;
			case 'hidden' :
				foreach ( ( array ) $ids as $id ) {
					$pageModel = Page::model ()->findByPk ( $id );
					if ($pageModel) {
						$pageModel->status = 'N';
						$pageModel->save ();
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