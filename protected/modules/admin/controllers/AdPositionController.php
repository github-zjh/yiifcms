<?php
/**
 * 广告位管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class AdPositionController extends Backend
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
	 * 广告位管理
	 *
	 */
    public function actionIndex ()
    {        
        $model = new AdPosition();
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
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 广告位添加
	 *
	 */
    public function actionCreate ()
    {        
        $model = new AdPosition();       
        
        if (isset($_POST['AdPosition'])) {
            $model->attributes = $_POST['AdPosition'];        	      
            if ($model->save()) {
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
            }
        }        
        $this->render('create', array ('model' => $model ));
    }

    /**
	 * 更新广告位
	 */
    public function actionUpdate ($id)
    {        
        $model = AdPosition::model()->findByPk($id);           
        if (isset($_POST['AdPosition'])) {        	
            $model->attributes = $_POST['AdPosition'];            
            if ($model->save()) {               
                $this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
            }
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
            case 'Delete':
       			 foreach((array)$ids as $id){
            		$adModel = AdPosition::model()->findByPk($id);
            		if($adModel){
            			XUpload::deleteFile($adModel->attach_file);
            			$adModel->delete();
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