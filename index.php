<?php

/**
 * 程序入口文件
 * 
 * @author Sim Zhao <326196998@qq.com>
 * @copyright (c) 2015, Sim Zhao
 *  
 */

$yii    = dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';

//全局常量
defined('ROOT_PATH') or define('ROOT_PATH', str_replace(array('\\', '\\\\'), '/', dirname(__FILE__)));
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('UPLOAD_PATH') or define('UPLOAD_PATH', ROOT_PATH . DS . 'upload');
defined('PUBLIC_PATH') or define('PUBLIC_PATH', ROOT_PATH . DS . 'public');
defined('YII_DEBUG') or define('YII_DEBUG',false);

//是否开启调试模式
if(YII_DEBUG) {    
    error_reporting(E_ALL);
    ini_set("display_errors","on");
}
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
Yii::createWebApplication($config)->run();
