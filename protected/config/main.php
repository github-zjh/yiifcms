<?php
/**
 * 网站配置文件
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved.
 *
 */
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',	
	'name' =>'Yiifcms',
	'language'=>'zh_cn',
	'theme'=>'default',
	'timeZone'=>'Asia/Shanghai',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'admin'=>array(
			'class' => 'application.modules.admin.AdminModule'		
		)
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(			
			//'urlFormat'=>'path',
			'showScriptName'=>false,			
			//'urlSuffix'=>'.htm',			
			'rules'=>array(	
				'page/<title_alias:\w+>'=>'page/index',   //单页		
				'<controller:\w+>/<action:\w+>/cat_<catalog_id:\d+>/page_<page:\d+>'=>'<controller>/<action>', //分页
				'<controller:\w+>/<action:\w+>/page_<page:\d+>'=>'<controller>/<action>', //分页
				'<controller:\w+>/<action:\w+>/cat_<catalog_id:\d+>' => '<controller>/<action>',  //内容列表				
				'tag/index/<tag:\w+>' => 'tag/index',            //标签搜索页		
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',				
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',				
			),
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
				'class'=>'system.db.CDbConnection',				
				'connectionString'=>'mysql:host=localhost;port=3306;dbname=yiifcms',
				'username'=>'root',
				'password'=>'123456',
				'emulatePrepare'=>true,  // needed by some MySQL installations
				'charset'=>'utf8',
				'tablePrefix' => 'yiif_',
		),
		
		//Configure SESSION 
		'session'=>array(
				'class'=>'CDbHttpSession',
				'connectionID' => 'db',
				'sessionTableName' => 'yiif_session',
				'timeout'=>3600,    //default 1440 seconds
				'autoStart'=>true,								
				'sessionName'=>'YIIFCMS',	
		),
		
		//Configure Authorization Manager
		'authManager' => array(
			'class'	=> 'CDbAuthManager',
			'connectionID' => 'db'
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(		
		//邮件配置
		'mailer'=>array(
			'Host' => 'smtp.126.com', //邮件服务器
			'Port' => '25', 		  //邮件服务器端口
			'Timeout' => '2',		  //发送请求超时
			'ContentType' => 'text/html', //发送文档类型
			'Username' => 'admin@126.com',  //发件人邮箱
			'Password' => 'emailpassword',    //发件人邮箱密码
			'FromName' => 'Yiifcms',       //发送人名称			
		),
		'safestr'=> substr(md5(uniqid()),2,6), //生成随机安全分隔符		
	),
);