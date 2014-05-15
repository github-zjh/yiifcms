<?php
/**
 * 推荐位管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class RecommendPositionController extends Backend
{
	protected $_recom_type = array(); //推荐位类型
	public function init(){
		parent::init();
		$this->_recom_type =array(				
				'article'=>Yii::t('admin','Type Article'), 
				'image'=>Yii::t('admin','Type Image'), 
				'soft'=>Yii::t('admin','Type Soft'), 
				'video'=>Yii::t('admin','Type Video'), 
				'goods'=>Yii::t('admin','Type Goods')		
		);
	}
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
	 * 推荐位管理
	 *
	 */
    public function actionIndex ()
    {        
        $model = new RecommendPosition();
        $criteria = new CDbCriteria();
        $condition = '1';
        $recommend_type = $this->_request->getParam('recommend_type');
        $recommend_name = $this->_request->getParam('recommend_name');   
        $recommend_type && $condition .= ' AND type= "'.$recommend_type.'"';
        $recommend_name && $condition .= ' AND recommend_name LIKE \'%' . $recommend_name . '%\'';
        $criteria->condition = $condition;    
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('recommend_name' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 推荐位添加
	 *
	 */
    public function actionCreate ()
    {        
        $model = new RecommendPosition();       
        
        if (isset($_POST['RecommendPosition'])) {
            $model->attributes = $_POST['RecommendPosition'];        	      
            if ($model->save()) {
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
            }
        }        
        $this->render('create', array ('model' => $model ));
    }

    /**
	 * 更新推荐位
	 */
    public function actionUpdate ($id)
    {        
        $model = RecommendPosition::model()->findByPk($id);           
        if (isset($_POST['RecommendPosition'])) {        	
            $model->attributes = $_POST['RecommendPosition'];            
            if ($model->save()) {               
                $this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
            }
        }        
        $this->render('update', array ('model' => $model ));
    
    }
    /**
     * 查看推荐的内容
     * @param unknown $id
     */    
	public function actionView($id){
		$recomPosition = RecommendPosition::model()->findByPk($id);
		$model = new RecommendPost();
		$criteria = new CDbCriteria();
		$condition = '1 = 1';		
		$id = $this->_request->getParam('id');
		$title = $this->_request->getParam('title');
		$id && $condition .= ' AND t.id =' . $id;
		$title && $condition .= ' AND posts.title LIKE \'%' . $title . '%\'';
		$criteria->condition = $condition;				
		$criteria->with = array('posts');
		$count = $model->count($criteria);		
		$pages = new CPagination($count);
		$pages->pageSize = 20;
		$pageParams = $this->buildCondition($_GET, array ('id', 'title' ));
		$pages->params = is_array($pageParams) ? $pageParams : array ();		
		$criteria->limit = $pages->pageSize;
		$criteria->offset = $pages->currentPage * $pages->pageSize;
		$result = $model->findAll($criteria);	
		$this->render('view', array ('datalist' => $result , 'recom_position'=>$recomPosition, 'pagebar' => $pages ));
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
            		$reModel = RecommendPosition::model()->findByPk($id);
            		if($reModel){            			
            			$reModel->delete();
            			//同时删除推荐的内容
            			RecommendPost::model()->deleteAll('id='.$id);
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