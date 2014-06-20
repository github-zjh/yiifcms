<?php
/**
 * 内容模型管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class ModeltypeController extends Backend
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
	 * 模型管理
	 *
	 */
    public function actionIndex ()
    {        
        $model = new ModelType();
        $criteria = new CDbCriteria();
        $condition = '1';        
        $title = $this->_request->getParam('type_name');      
        $title && $condition .= ' AND type_name LIKE \'%' . $title . '%\'';
        $criteria->condition = $condition;    
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('type_name' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);        
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 模型添加
	 *
	 */
    public function actionAdCreate ()
    {        
        $model = new ModelType();   
        if (isset($_POST['ModelType'])) {
            $model->attributes = $_POST['ModelType'];        	    
            if ($model->save()) {
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
            }
        }        
        $this->render('create', array ('model' => $model));
    }

    /**
	 * 更新模型
	 */
    public function actionUpdate ($id)
    {        
        $model = ModelType::model()->findByPk($id);   
        if (isset($_POST['ModelType'])) {
            $model->attributes = $_POST['ModelType'];        	    
            if ($model->save()) {
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
            }
        }        
        $this->render('update', array ('model' => $model));
    
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
            case 'show':
        		foreach((array)$ids as $id){
            		$model = ModelType::model()->findByPk($id);
            		if($model){
            			$model->status = 'Y';
            			$model->save();
            		}
            	}
                break;
            case 'hidden':
        		foreach((array)$ids as $id){
            		$model = ModelType::model()->findByPk($id);
            		if($model){
            			$model->status = 'N';
            			$model->save();
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