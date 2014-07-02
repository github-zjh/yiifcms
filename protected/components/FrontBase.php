<?php
/**
 * 
 * 前端控制基础类
 * @author zhaojinhan <326196998@qq.com>
 * @copyright Copyright (c) 2014-2015 Personal. All rights reserved.
 * @link http://yiicms.icode100.com
 * @version v1.0.0
 * 
 */
class FrontBase extends Controller
{
	/**
	 * 前端布局
	 * @var $layout
	 */
	public $layout='';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	*/
	public $breadcrumbs=array();
	
	public $_seoTitle = '';
	public $_seoKeywords = '';
	public $_seoDescription = '';
	public $_stylePath = ''; //当前主题对应的样式目录
	public $_public_menu = ''; //菜单导航
	public $_cur_url = ''; //当前URL
	public $_login_status = false; //当前登录状态
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::init()
	 */
	public function init(){		
		parent::init();		
		if($this->_setting['site_status'] == 'close'){
			//网站关闭			
			$encode_intro = CHtml::encode($this->_setting['site_status_intro']);
			$site_name = CHtml::encode($this->_setting['site_name']);
			echo <<<EOT
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>$site_name</title>
</head>
<body>
	<p style="width:800px; line-height:40px;  margin:0 auto; margin-top:50px; color:#FFFFFF; text-align:center; background-color:#3C5880;">$encode_intro</p>
</body>
</html>	
EOT;
		    exit;
		}
		
		//主题设置
		Yii::app()->theme = $this->_setting['theme'];
		$this->_stylePath = $this->_baseUrl.'/themes/'.$this->_setting['theme'].'/styles';
		
		//菜单导航
		$menus = Menu::model()->findAll();	
		$tree = new Xtree();	
		foreach((array)$menus as $menu){
			$data[] = $menu->attributes;
		}
		$tree->setTree($data, 'id', 'parent_id', array('menu_name','menu_link','unique','target'));
		$this->_public_menu = $tree->getArrayList(0);		
		$this->_cur_url = Yii::app()->request->getUrl();
		//登录状态
		if(!Yii::app()->user->getIsGuest()){
			$this->_login_status = true;
		}
		//加载公共资源
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/global.css");		
	}
	
	/**
	 * 验证登录状态
	 *
	 */
	public function auth($ret_url = '/'){
		if (isset($_POST['sessionId'])) {
			$session = Yii::app()->getSession();
			$session->close();
			$session->sessionID = $_POST['sessionId'];
			$session->open();
		}
		if(Yii::app()->user->getIsGuest()){
			$loginUrl = $this->createUrl('user/login',array('ret_url'=>$ret_url));
			$this->redirect($loginUrl);			
		}		
	}
	
	/**
	 * 需要登录验证配置
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){		
		$controller = Yii::app()->getController()->id;
		$actionID = $action->id;	
	
		//需要登录的页面,要小写
		$need_auth = array(
				'user/index',				
				'user/setting',
				'user/settingpwd',
				'user/settingemail',
				'uploadify/index',
				'uploadify/avatar',
				'uploadify/submitcut',
				'uploadify/file',
				'comment/index',
				'comment/reply'
				
		);		
		if(in_array(strtolower($controller.'/'.$actionID), $need_auth)){
			$this->auth($this->createUrl($controller.'/'.$actionID));			
		}		
		return true;
	}
}