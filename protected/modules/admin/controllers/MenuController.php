<?php
/**
 * 导航菜单
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class MenuController extends Backend
{
	protected $_menu;
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
	public function init(){		
		//菜单
		parent::init();
		$this->_menu = Menu::model()->findAll();		
	}
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
	}
	
    /**
     * 首页
     */
    public function actionIndex ()
    {   
        $datalist = Menu::get(0, $this->_menu);
        $this->render('index', array ('datalist' => $datalist ));
    }

    /**
     * 添加菜单
     *
     */
    public function actionCreate ()
    {
    	$model = new Menu();    	
    	if(isset($_POST['Menu']))
    	{    		
    		$model->attributes=$_POST['Menu'];     		
    		if($model->save())
    			$this->redirect(array('index'));    		
    	}
    	$parentId =intval($_GET['id']);
    	$this->render('create',array(
    			'model'=>$model,
    			'parentId' => $parentId
    	));
    }

    /**
     * 编辑
     *
     * @param  $id
     */
    public function actionUpdate ($id)
    {
        $model=$this->loadModel();
        
        if(isset($_POST['Menu']))
        {
        	$model->attributes=$_POST['Menu'];      
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
        $subCategory = Menu::get($item, $this->_menu);
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
            		$menuModel = Menu::model()->findByPk($id);
            		if($menuModel){            			
            			$menuModel->delete();
            		}
            	}				
                break;
            case 'sortOrder':            	
                $sortOrder = $_POST['sortOrder'];
                foreach((array)$ids as $id){
                    $menuModel = Menu::model()->findByPk($id);                    
                    if($menuModel){
                        $menuModel->sort_order = $sortOrder[$id];
                        $menuModel->save();
                    }
                }
                
                break;
            case 'show':
            	foreach((array)$ids as $id){
            		$menuModel = Menu::model()->findByPk($id);
            		if($menuModel){
            			$menuModel->status_is = 'Y';
            			$menuModel->save();
            		}
            	}
            	break;
            case 'hidden':
            	foreach((array)$ids as $id){
            		$menuModel = Menu::model()->findByPk($id);
            		if($menuModel){
            			$menuModel->status_is = 'N';
            			$menuModel->save();
            		}
            	}
            	break;
            default:
            	$this->message('error', Yii::t('admin','Error Operation'),$this->createUrl('index'));                
                break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('menu/index'));
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
    			$this->_model=Menu::model()->findbyPk($_GET['id']);
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }

}