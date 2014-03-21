<?php
/**
 * 单页管理
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
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
	 * 单页更新
	 */
    public function actionCreate ()
    {        
        $model = new Page();
        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
            if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
            	$upload = new XUpload();
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
        		
            	$upload = new XUpload();
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
        if (XUtils::method() == 'GET') {
            $command = trim($this->_request->getParam('command'));
            $ids = intval($this->_request->getParam('id'));
        } elseif (XUtils::method() == 'POST') {
            $command = $this->_request->getPost('command');
            $ids = $this->_request->getPost('id');
            is_array($ids) && $ids = implode(',', $ids);
        } else {
            throw new CHttpException(404, '只支持POST,GET数据');
        }
        empty($ids) && XUtils::message('error', '未选择记录');
        
        switch ($command) {
            case 'delete':
                parent::_acl('page_delete');
                parent::_adminiLogger(array('catalog'=>'delete', 'intro'=>'删除单页，ID:'.$ids));
                parent::_delete(new Page(), $ids, array ('index' ),array('attach_file', 'attach_thumb'));
                break;
            default:
                throw new CHttpException(404, '错误的操作类型:' . $command);
                break;
        }
    }

}