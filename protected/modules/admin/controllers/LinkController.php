<?php
/**
 * 链接管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */
class LinkController extends Backend
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
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
	 * 首页
	 */
    public function actionIndex ()
    {
        $model = new Link();
        $criteria = new CDbCriteria();
        $condition = '1';
        $siteName = trim($this->_request->getParam('title'));
        $siteName && $condition .= ' AND title LIKE \'%' . $siteName . '%\'';
        $criteria->condition = $condition;
        //$criteria->params = '';
        $criteria->order = 't.id DESC';
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('title' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }
    
    /**
     * 添加新链接
     * 
     */
    public function actionCreate ()
    {
        $model = new Link();
        if (isset($_POST['Link'])) {
            $model->attributes = $_POST['Link'];
            if($_FILES['logo']['error'] == UPLOAD_ERR_OK){
				$upload = new Uploader;
				$upload->uploadFile($_FILES['logo']);
				if ($upload->_error) {
					$this->message('error', Yii::t('admin',$upload->_error));
					return;            	

				}
				$model->logo = $upload->_file_name;
			}
            if ($model->save()) {                
                $this->redirect(array ('index' ));
            }
        }
        
        $this->render('create', array ('model' => $model ));
    
    }

    /**
	 * 更新链接
	 *
	 */
    public function actionUpdate ($id)
    {
        $model = $this->loadModel();
        
        //旧logo
        $old_logo = $model->logo;
       
        
        if (isset($_POST['Link'])) {
            $remove = $this->_request->getParam('remove');
            $model->attributes = $_POST['Link'];
            if($_FILES['logo']['error'] == UPLOAD_ERR_OK){
    			$upload = new Uploader;    			
	    		$upload->uploadFile($_FILES['logo']);
	    		if($upload->_error){
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}
	    		
	    		//删除旧logo
	    		$upload->deleteFile($old_logo);	    		
	    		$model->logo = $upload->_file_name;	    		
    		}
        	if($model->save())
        		$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
        }
        $this->render('update', array ('model' => $model ));
    
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
            case 'linkDelete':
       			 foreach((array)$ids as $id){
            		$linkModel = Link::model()->findByPk($id);
            		if($linkModel){
            			Uploader::deleteFile($linkModel->logo);
            			$linkModel->delete();
            		}
            	}
                break;           
            case 'linkVerify':
        		foreach((array)$ids as $id){
            		$linkModel = Link::model()->findByPk($id);
            		if($linkModel){
            			$linkModel->status_is = 'Y';
            			$linkModel->save();
            		}
            	}
                break;
            case 'linkUnVerify':
        		foreach((array)$ids as $id){
            		$linkModel = Link::model()->findByPk($id);
            		if($linkModel){
            			$linkModel->status_is = 'N';
            			$linkModel->save();
            		}
            	}
                break;          
            default:
                throw new CHttpException(404,  Yii::t('admin','Error Operation'));
                break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('index'));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
    	if($this->_model===null)
    	{     		
    		if(isset($_GET['id']))
    			$this->_model=Link::model()->findbyPk(intval($_GET['id']));
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }
    

}
