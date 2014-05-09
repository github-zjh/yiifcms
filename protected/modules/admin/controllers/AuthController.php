<?php
/**
 * RBAC 授权体系控制器[测试阶段，暂时不用此功能]
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class AuthController extends Backend
{
	private $_db;
	public function init ()
	{
		parent::init();
		parent::auth();
		$this->_db = Yii::app()->db;	
		exit('暂不开启,后续待开发');
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
	 * 管理
	 */
	public function actionIndex(){
		$this->render('index');
	}
	
    /**
	 * 初始化授权体系
	 *
	 */
    public function actionInit ()
    {    
        $auth=Yii::app()->authManager;  
        // remove all operations, roles, child relationships, and assignments
        $auth->clearAll();    
        
	    $auth->createOperation('createPost','create a post');  
	    $auth->createOperation('readPost','read a post');  
	    $auth->createOperation('updatePost','update a post');  
	    $auth->createOperation('deletePost','delete a post');  
	       
	    $bizRule='return Yii::app()->user->id==$params["post"]->authID;';  
	    $task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);  
	    $task->addChild('updatePost');  
	       
	    $role=$auth->createRole('reader');  
	    $role->addChild('readPost');  
	       
	    $role=$auth->createRole('author');  
	    $role->addChild('reader');  
	    $role->addChild('createPost');  
	    $role->addChild('updateOwnPost');  
	       
	    $role=$auth->createRole('editor');  
	    $role->addChild('reader');  
	    $role->addChild('updatePost');  
	       
	    $role=$auth->createRole('admin');  
	    $role->addChild('editor');  
	    $role->addChild('author');  
	    $role->addChild('deletePost');  
	       
	    $auth->assign('reader','readerA');  
	    $auth->assign('author','authorB');  
	    $auth->assign('editor','editorC');  
	    $auth->assign('admin','adminD');  
	    $this->message('success','初始化授权体系成功！',$this->createUrl('index'));
    }
    /**
     * 初始化RBAC表
     */
    private function actionInitTable(){
    	$auth_sql = $this->_basePath.'/data/schema.auth.sql';
    	if(!file_exists($auth_sql)){
    		$this->message('error','授权sql文件('.$auth_sql.')不存在');
    	}else{
    		$sql = file_get_contents($auth_sql);
    		$this->_sqlExecute($sql);
    	}
    	$this->message('success','初始化授权体系表成功！',$this->createUrl('index'));
    }
    
    /**
     * 执行SQL
     * @param  $sql
     */
    private function _sqlExecute ($sql)
    {
    	$sqls = self::_sqlSplit($sql);
    	if (is_array($sqls)) {
    		foreach ($sqls as $sql) {
    			if (trim($sql) != '') {
    				$this->_db->createCommand($sql)->execute();
    			}
    		}
    	} else {
    		$this->_db->createCommand($sql)->execute();
    	}
    	return true;
    }
    
    /**
     * 拆分sql
     * @param  $sql
     */
    private function _sqlSplit ($sql)
    {
    	if ($this->_db->serverVersion > '4.1' && $this->_db->charset) {
    		$sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=" . $this->_db->charset, $sql);
    	}
    	if ($this->_db->tablePrefix != "os_")
    		$sql = str_replace("`os_", '`' . $this->_db->tablePrefix, $sql);
    	$sql = str_replace("\r", "\n", $sql);
    	$ret = array ();
    	$num = 0;
    	$queriesarray = explode(";\n", trim($sql));
    	unset($sql);
    	foreach ($queriesarray as $query) {
    		$ret[$num] = '';
    		$queries = explode("\n", trim($query));
    		$queries = array_filter($queries);
    		foreach ($queries as $query) {
    			$str1 = substr($query, 0, 1);
    			if ($str1 != '#' && $str1 != '-')
    				$ret[$num] .= $query;
    		}
    		$num ++;
    	}
    	return ($ret);
    }

}