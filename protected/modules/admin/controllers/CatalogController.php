<?php
/**
 * 栏目分类
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class CatalogController extends Backend
{
	public $_catalog;
	protected $_model_type;	
	private $_model;
	
	public function init(){		
		//栏目
		parent::init();
		$this->_catalog = Catalog::model()->findAll();
		$this->_model_type = ModelType::model()->findAll();
	}
	/**
	 * 动作权限控制
	 * 
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action_id = $action->id;
		if(!$this->checkAcl($controller.'/'.$action_id)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //站点设置
            'create'   => 'Create',       //添加
            'update'   => 'Update',       //编辑
            'batch'    => 'Batch',        //批量操作
         
        ), 'application.modules.admin.controllers.catalog');
        return array_merge($actions, $extra_actions);
    } 	

    /**
     * 编辑
     *
     * @param  $id
     */
    public function actionUpdate1 ($id)
    {
        $model=$this->loadModel();
        
        //旧文件
        $old_file = $model->attach_file;
        $old_thumb = $model->attach_thumb;  
        
        if(isset($_POST['Catalog']))
        {
        	$model->attributes=$_POST['Catalog'];           		
       		if($_FILES['attach']['error'] == UPLOAD_ERR_OK){
    			$upload = new Uploader;    			
	    		$upload->uploadFile($_FILES['attach'], 'image', true);
	    		if($upload->_error){
	    			$upload->deleteFile($upload->_file_name);
	    			$upload->deleteFile($upload->_thumb_name);
	    			$this->message('error', Yii::t('admin',$upload->_error));
	    			return;
	    		}
	    		
	    		//删除旧文件
	    		$upload->deleteFile($old_file);
	    		$upload->deleteFile($old_thumb);
	    		
	    		$model->attach_file = $upload->_file_name;
	    		$model->attach_thumb = $upload->_thumb_name;
    		}
    		$model->update_time = time();
        	if($model->save())
        		$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
        }
        
        $this->render('update',array(
        		'model'=>$model,
        ));
    
    }

    /**
     * 检测上级分类是否合法
     *
     * @param  $item
     * @param  $parentId
     */
    protected function parentTrue ($item = 0, $parentId = 0)
    {
        $subCategory = Catalog::get($item, $this->_catalog);
        if (empty($subCategory)) {
            $getCategory[] = $item;
        } else {
            foreach ((array) $subCategory as $row) {
                $getCategory[] = $row['id'];
            }
            //将本身ID加入检测对象
            array_push($getCategory, $item);
        }
        if (in_array($parentId, $getCategory))
            $this->message('error', Yii::t('admin','Selected Category is Current Category or Children Category'));
    
    }

    /**
     * 批量操作
     *
     */
    public function actionBatch ()
    {        
    	 if ( $this->method() == 'GET' ) {
            $command = trim( $_GET['command'] );
            $ids = intval( $_GET['id'] );
        } elseif ( $this->method() == 'POST' ) {
            $command = trim($_POST['command']);
            $ids = $_POST['id'];            
        } else {
            $this->message('errorBack', Yii::t('admin','Only POST'));
        }       
        empty($ids) && $this->message('error', Yii::t('admin','No Select'));
        switch ($command) {
            case 'delete':
            	foreach((array)$ids as $id){
            		$catalogModel = Catalog::model()->findByPk($id);
            		if($catalogModel){            			
            			$catalogModel->delete();
            		}
            	}				
                break;
            case 'sortOrder':            	
                $sortOrder = $_POST['sortOrder'];
                foreach((array)$ids as $id){
                    $catalogModel = Catalog::model()->findByPk($id);                    
                    if($catalogModel){
                        $catalogModel->sort_order = $sortOrder[$id];
                        $catalogModel->save();
                    }
                }
                
                break;
            case 'show':
            	foreach((array)$ids as $id){
            		$catalogModel = Catalog::model()->findByPk($id);
            		if($catalogModel){
            			$catalogModel->status = 'Y';
            			$catalogModel->save();
            		}
            	}
            	break;
            case 'hidden':
            	foreach((array)$ids as $id){
            		$catalogModel = Catalog::model()->findByPk($id);
            		if($catalogModel){
            			$catalogModel->status = 'N';
            			$catalogModel->save();
            		}
            	}
            	break;
            default:
            	$this->message('error', Yii::t('admin','Error Operation'),$this->createUrl('index'));                
                break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('catalog/index'));
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
    			$this->_model=Catalog::model()->findbyPk($_GET['id']);
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }

}