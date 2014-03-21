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
		
	}
}