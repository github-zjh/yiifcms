<?php
/**
 * 会员管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 bagesoft. All rights reserved.
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
    	$criteria->condition = "status=1 AND groupid=".$this->_adminGroupID;
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
            $model->addtime = time();    
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
        
        if (XUtils::method() == 'GET') {
            $command = trim($_GET['command']);
            $ids = intval($_GET['id']);
        } elseif (XUtils::method() == 'POST') {
            $command = trim($_POST['command']);
            $ids = $this->_gets->getPost('id');
            is_array($ids) && $ids = implode(',', $ids);
        } else {
            XUtils::message('errorBack', '只支持POST,GET数据');
        }
        empty($ids) && XUtils::message('error', '未选择记录');
        
        switch ($command) {
            
            case 'adminDelete':
                parent::_acl('admin_delete');
                parent::_adminiLogger(array ('catalog' => 'delete' , 'intro' => '删除管理员,ID:' . $ids ));
                parent::_delete(new Admin(), $ids, array ('index' ));
                break;
            case 'groupDelete':
                parent::_acl('admin_group_delete');
                parent::_groupPrivate($ids);
                parent::_adminiLogger(array ('catalog' => 'delete' , 'intro' => '删除管理员用户组,ID:' . $ids ));
                parent::_delete(new AdminGroup(), $ids, array ('group' ));
                break;
            default:
                throw new CHttpException(404, '错误的操作类型:' . $command);
                break;
        }
    
    }

}
