<?php
/**
 * 第三方登录管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */
class OAuthController extends Backend
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
        $model = new OAuth();
        $criteria = new CDbCriteria();
        $condition = '1';
        $apiname = trim($this->_request->getParam('apiname'));
        $apiname && $condition .= ' AND apiname LIKE \'%' . $apiname . '%\'';
        $criteria->condition = $condition;        
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('appname' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }
    
    /**
     * 添加新接口
     * 
     */
    public function actionCreate ()
    {
        $model = new OAuth();
        if (isset($_POST['OAuth'])) {
            $model->attributes = $_POST['OAuth'];            
            if ($model->save()) {                
                $this->redirect(array ('index' ));
            }
        }
        
        $this->render('create', array ('model' => $model ));
    
    }

    /**
	 * 更新接口
	 *
	 */
    public function actionUpdate ($id)
    {
        $model = $this->loadModel();              
        if (isset($_POST['OAuth'])) {
            $remove = $this->_request->getParam('remove');
            $model->attributes = $_POST['OAuth'];                    
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
            case 'Show':
        		foreach((array)$ids as $id){
            		$oauthModel = OAuth::model()->findByPk($id);
            		if($oauthModel){
            			$oauthModel->status = 'Y';
            			$oauthModel->save();
            		}
            	}
                break;
            case 'Hidden':
        		foreach((array)$ids as $id){
            		$oauthModel = OAuth::model()->findByPk($id);
            		if($oauthModel){
            			$oauthModel->status = 'N';
            			$oauthModel->save();
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
    			$this->_model=OAuth::model()->findbyPk(trim($_GET['id']));
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }
    

}
