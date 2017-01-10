<?php
/**
 * 网站配置文件
 *
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016 . All rights reserved.
 *
 */
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',	
	'name' =>'yiifcms',
	'language'=>'zh_cn',
	'theme'=>'default',
	'timeZone'=>'Asia/Shanghai',
    
    //开启日志记录
	'preload'=>array(
        'log'
    ),

	//自动加载
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*'
	),
    
    //模块配置
	'modules'=>array(		
		'admin'=>array(
			'class' => 'application.modules.admin.AdminModule'		
		),		
	),

	//组件配置
	'components'=>array(
		'user'=>array(
			//开启自动登录
			'allowAutoLogin'=>true,
		),
		//配置路由规则
		'urlManager'=>array(			
			//'urlFormat'=>'path',
			'showScriptName'=>false,			
			'urlSuffix'=>'/',			
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
		//数据库配置
		'db'=>array(
				'class'=>'system.db.CDbConnection',				
				'connectionString'=>'mysql:host=~dbHost~;port=~dbPort~;dbname=~dbName~',
				'username'=>'~dbUsername~',
				'password'=>'~dbPassword~',				
				'charset'=>'utf8',
				'tablePrefix' => '~dbPre~',
                'enableProfiling'=>true,  
                'enableParamLogging'=>true,
		),
		
		//配置session
		//'session'=>array(
		//		'class'=>'CHttpSession',
		//		'autoStart'=>true,
		//		'sessionName'=>'YFCMSSN',
		//),
		//配置错误页面
		'errorHandler'=>array(			
			'errorAction'=>'site/error',
		),
        //配置日志等级
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),				
			),
		),       
	),
);
//配置缓存
$cache =  require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cache.php');
if (!empty($cache)) {
	$config['components'] = CMap::mergeArray($config['components'],$cache);
}
return $config;
