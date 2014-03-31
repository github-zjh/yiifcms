<?php
/**
 * 广告管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class AdController extends Backend
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
	 * 广告管理
	 *
	 */
    public function actionIndex ()
    {        
        $model = new Ad();
        $criteria = new CDbCriteria();
        $condition = '1';
        $title = $this->_request->getParam('title');
        $title && $condition .= ' AND title LIKE \'%' . $title . '%\'';
        $criteria->condition = $condition;    
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('title' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('ad_index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 广告添加
	 *
	 */
    public function actionAdCreate ()
    {        
        $model = new Ad();       
        
        if (isset($_POST['Ad'])) {
            $model->attributes = $_POST['Ad'];
        	if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
    			$upload = new XUpload;    			
	    		$upload->uploadFile($_FILES['attach']);
	    		if($upload->_error){
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}	    	
	    		$model->attach_file = $upload->_file_name;	    		
    		}            
            if ($model->save()) {
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('ad/index'));
            }
        }        
        $this->render('ad_create', array ('model' => $model ));
    }

    /**
	 * 更新广告
	 */
    public function actionAdUpdate ($id)
    {        
        $model = Ad::model()->findByPk($id);
        //旧图片
        $old_attach = $model->attach_file;
        
        if (isset($_POST['Ad'])) {
        	if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
    			$upload = new XUpload;    			
	    		$upload->uploadFile($_FILES['attach']);
	    		if($upload->_error){
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}	    		
	    		//删除旧图片
	    		$upload->deleteFile($old_attach);	    		
	    		$model->attach_file = $upload->_file_name;	    		
    		}
            $model->attributes = $_POST['Ad'];            
            if ($model->save()) {               
                $this->message('success',Yii::t('admin','Update Success'),$this->createUrl('ad/index'));
            }
        }        
        $this->render('ad_update', array ('model' => $model ));
    
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
                is_array($ids) && $ids = implode(',', $ids);
            } else {
                $this->message('errorBack', Yii::t('admin','Only POST Or GET'));
            }
        empty($ids) && $this->message('error', Yii::t('admin','No Select'));
        
        switch ($command) {
            case 'adDelete':
       			 foreach((array)$ids as $id){
            		$adModel = Ad::model()->findByPk($id);
            		if($adModel){
            			XUpload::deleteFile($adModel->attach_file);
            			$adModel->delete();
            		}
            	}
                break;           
            case 'adVerify':
        		foreach((array)$ids as $id){
            		$adModel = Ad::model()->findByPk($id);
            		if($adModel){
            			$adModel->status_is = 'Y';
            			$adModel->save();
            		}
            	}
                break;
            case 'adUnVerify':
        		foreach((array)$ids as $id){
            		$adModel = Ad::model()->findByPk($id);
            		if($adModel){
            			$adModel->status_is = 'N';
            			$adModel->save();
            		}
            	}
                break;          
            default:
                throw new CHttpException(404,  Yii::t('admin','Error Operation'));
                break;
        }
        
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('ad/index'));
        
    }

}