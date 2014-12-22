<?php
/**
 * 网站配置文件
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved.
 *
 */
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',	
	'name' =>'yiifcms',
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
		),
		/*'bbs'=>array(
			'class' => 'application.modules.bbs.BbsModule'		
		)*/
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
			//'urlSuffix'=>'/',			
			'rules'=>array(
				'sitemap\.xml' => 'site/sitemap', //网站地图
				'sitemap\.xsl' => 'site/sitemapxsl', //网站索引
				'page/<id:\w+>'=>'page/index', //单页	
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
				'connectionString'=>'mysql:host=localhost;port=3306;dbname=default',
				'username'=>'root',
				'password'=>'default',
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
				'sessionName'=>'YFCMSSN',	
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
	),
);
$cache =  require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cache.php');
if (!empty($cache)) {
	$config['components'] = CMap::mergeArray($config['components'],$cache);	
}
return $config;
