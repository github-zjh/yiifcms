<?php
/**
 * 会员管理控制器
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class UserController extends Backend
{
    protected $group_list;
    
    public function init(){
    	parent::init();
    	//用户组
    	$group_list = UserGroup::model()->findAll();    	
    	if($group_list){
    		foreach($group_list as $key => $g){    			
    			$this->group_list[$g['id']] = $g->attributes;
    		}
    	}        		
    }
    
    /**
     * 会员列表
     *
     */
    public function actionIndex ()
    {       
        $model = new User();
        $criteria = new CDbCriteria();
        $groupid = intval( $this->_request->getParam( 'groupid' ) );
        $username = trim( $this->_request->getParam( 'username' ) );
        $realname = trim( $this->_request->getParam( 'realname' ) );     
        $groupid && $condition .= ' AND groupid =' . $groupid;
        $username && $condition .= ' AND username LIKE \'%' . $username . '%\'';
        $realname && $condition .= ' AND realname LIKE \'%' . $realname . '%\'';   
        $criteria->condition = '1=1 '.$condition;     
        $criteria->order = 'uid ASC';        
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('user_index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
     * 
     * 管理员列表
     */
    public function actionAdmin(){
    	$model = new User();
    	$criteria = new CDbCriteria();
    	$username = trim( $this->_request->getParam( 'username' ) );
    	$username && $condition .= ' AND username LIKE \'%' . $username . '%\'';
    	$criteria->condition = "status=1 AND groupid=".$this->_adminGroupID. $condition;
    	$criteria->order = 'uid DESC';
    	$count = $model->count($criteria);
    	$pages = new CPagination($count);
    	$pages->pageSize = 13;
    	$criteria->limit = $pages->pageSize;
    	$criteria->offset = $pages->currentPage * $pages->pageSize;
    	$result = $model->findAll($criteria);
    	$this->render('user_index', array ('adminPage'=>1,'datalist' => $result , 'pagebar' => $pages ));
    }
    
    
    /**
     * 会员添加
     *
     */
    public function actionCreate ()
    {        
        $model = new User;             
        if (isset($_POST['User'])) {            
            $model->attributes = $_POST['User'];
            $user = $model->find('username=:username', array(':username'=>$model->username));
            if($user){
            	$this->message('error',Yii::t('admin','UserName Is Exist'));
            }  
            if ($model->save()) {               
                $this->message('success',Yii::t('admin','Add Success'),$this->createUrl('user/index'));
            }
        }        
        $this->render('user_create', array ('model' => $model ));
    }

    /**
     * 会员编辑
     *
     * @param  $id
     */
    public function actionUpdate ($id)
    {        
        $model = User::model()->findByPk($id); 
       
        if (isset($_POST['User'])) { 
              
            if(empty($_POST['User']['password'])){
            	$_POST['User']['password'] = $model->password;
            }else{
            	$_POST['User']['password'] = CPasswordHelper::hashPassword($_POST['User']['password']);
            }     
            
            $model->attributes = $_POST['User'];
            
            if ($model->save()) {               
                $this->message('success',Yii::t('admin','Update Success'),$this->createUrl('user/index'));
            }
        }        
        $this->render('user_update', array ('model' => $model ));
    
    }

    /**
     * 用户组
     *
     */
    public function actionGroup ()
    {        
        $model = new UserGroup();
        $criteria = new CDbCriteria();       
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('user_group', array ('datalist' => $result , 'pagebar' => $pages ));
    }
    
    /**
     * 用户组添加
     *
     * @param  $id
     */
    public function actionGroupCreate ()
    {
    	$model = new UserGroup();
    	if (isset($_POST['UserGroup'])) {
    		$model->attributes = $_POST['UserGroup'];    		 		
    		if ($model->save()) {
    			$this->redirect(array ('group' ));
    		}
    	}
    
    	$this->render('group_create', array ('model' => $model ));
    }
    

    /**
     * 用户组编辑
     *
     * @param  $id
     */
    public function actionGroupUpdate ($id)
    {        
        $data = UserGroup::model()->findByPk($id);
        if (isset($_POST['UserGroup'])) {
            $data->attributes = $_POST['UserGroup'];
            $acl = Yii::app()->request->getParam('acl');
            if (is_array($acl))
                $data->acl = implode(',', array_unique($acl));
            else 
                $data->acl = 'administrator';
            if ($data->save()) {               
                $this->redirect(array ('group' ));
            }
        }
        
        $this->render('group_update', array ('model' => $data ));
    }


    /**
     * 批量操作
     *
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
        	
        	case 'userLock':
        		foreach((array)$ids as $id){
        			$userModel = User::model()->findByPk($id);
        			if($userModel){
        				$userModel->status = 0;
        				$userModel->save();
        			}
        		}
        		break;
        	
        	case 'userunLock':
        		foreach((array)$ids as $id){
        			$userModel = User::model()->findByPk($id);
        			if($userModel){
        				$userModel->status = 1;
        				$userModel->save();
        			}
        		}
        		break;
            
            case 'userDelete':               
        		foreach((array)$ids as $id){
            		$userModel = User::model()->findByPk($id);
            		if($userModel){
            			$userModel->delete();
            		}
            	}
                break;
            case 'groupDelete':
        		foreach((array)$ids as $id){
            		$groupModel = UserGroup::model()->findByPk($id);
            		if($groupModel){
            			$groupModel->delete();
            		}
            	}
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));
				break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('user/index'));
    }

}
