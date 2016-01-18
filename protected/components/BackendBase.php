<?php
/**
 * 
 * 后端控制基础类  
 * @author GoldHan.zhao <326196998@qq.com>
 * @copyright Copyright (c) 2014-2016 Personal. All rights reserved.
 * @version v1.0.0
 * 
 */
class BackendBase extends AppController
{
	/**
	 * 后端布局
	 * @var $layout
	 */
	public $layout=''; //default 'main'
	
	public $menu=array();
	
	public $breadcrumbs=array();	
		
	protected  $_static_admin = ''; //后端样式目录
	public function init(){
		parent::init();
		$this->_static_admin = 'styles';
	}
	
	/**
	 * 登录验证
	 *
	 */
	public function auth(){
		if (isset($_POST['sessionId'])) {
			$session = Yii::app()->getSession();
			$session->close();
			$session->sessionID = $_POST['sessionId'];
			$session->open();
		}
		if(Yii::app()->user->getIsGuest()){
			$loginUrl = $this->createUrl('/admin/default/login');	
			$this->rediretParentUrl($loginUrl);
		}
	}	
}
