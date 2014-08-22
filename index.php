<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors","on");
// remove the following lines when in production mode
define('WWWPATH', str_replace(array('\\', '\\\\'), '/', dirname(__FILE__)));
define('DS','/');
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
