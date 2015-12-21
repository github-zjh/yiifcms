<?php

/**
 * 安装程序
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016 . All rights reserved. 
 * 
 */
class InstallController extends Controller {

    public $tplPath;
    public $configPath;
    public $_data = '';
    public $lockfile = 'install.lock';
    public $title;
    public $org_url = 'http://www.yiifcms.com/';  //官方网址
    public $org_help_url = 'http://www.yiifcms.com/help'; //官方帮助中心网址    
    public $layout = false;

    public function init() {
        $this->_static_public = Yii::app()->baseUrl . '/public';
        $this->_theme = Yii::app()->theme;
        $this->_data = ROOT_PATH . '/protected/data/';
        $this->tplPath = $this->_data . 'temp/';
        $this->defaultAction = 'step1';
        $this->configPath = Yii::app()->basePath . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;
    }

    /**
     * 检测是否已经安装
     */
    private function _checkInstall() {
        if (file_exists($this->_data . $this->lockfile)) {
            $this->redirect(array('stop'));
        }
    }

    /**
     * 已经安装
     */
    public function actionStop() {
        $this->title = '安装停止';
        $this->render('stop');
    }

    /**
     * 安装第一步(安装许可协议)
     */
    public function actionStep1() {
        self::_checkInstall();
        $this->title = '安装许可协议';
        $this->render('step1');
    }

    /**
     * 安装第二步(环境检测)
     */
    public function actionStep2() {
        self::_checkInstall();        
        $this->title = '检测运行环境';        
        $this->render('step2');
    }
    
    /**
     * 安装第三步(选择模块)
     */
    public function actionStep3() {
        self::_checkInstall();        
        $this->title = '选择模块';        
        $this->render('step3');
    }
    
    /**
     * 安装第四步(文件权限检测)
     */
    public function actionStep4() {
        self::_checkInstall();        
        $this->title = '文件权限检测';        
        $this->render('step4');
    }

    /**
     * 安装第五步(数据库信息设置)
     */
    public function actionStep5() {
        self::_checkInstall();
        $this->title = '填写数据库信息';
        $this->render('step5');
    }

    /**
     * 追加安装日志
     */
    private function _appendLog($message, $callBack = false) {
        if ($callBack) {
            $callBack = " <a href='" . $this->createUrl('db') . "' class='red'>返回检查</a>";
        }
        ob_flush();
        flush();
        echo '<script type="text/javascript">$("#progress").append("' . $message . $callBack . '<br />");showmessage();</script>';
    }

    /**
     * 安装进程
     *  
     * 1.检测数据库配置信息
     * 2.写入数据库配置信息
     * 3.创建数据表
     * 4.写入默认信息
     * 5.根据选择，是否安装测试数据
     */
    public function actionProgress() {
        self::_checkInstall();
        $dbHost = Yii::app()->request->getParam('dbHost');
        $dbPort = Yii::app()->request->getParam('dbPort');
        $dbName = Yii::app()->request->getParam('dbName');
        $dbUsername = Yii::app()->request->getParam('dbUsername');
        $dbPassword = Yii::app()->request->getParam('dbPassword');
        $tbPre = Yii::app()->request->getParam('tbPre');
        $username = Yii::app()->request->getParam('username');
        $password = Yii::app()->request->getParam('password');
        $email = Yii::app()->request->getParam('email');
        $testData = Yii::app()->request->getParam('testData');
        $this->title = '安装数据表';
        $this->render('progress', $data);
        try {
            $dbObj = new CDbConnection('mysql:host=' . $dbHost . ';port=' . $dbPort . ';', $dbUsername, $dbPassword);
            self::_appendLog('数据库信息检测通过');
            $configTpl = file_get_contents($this->tplPath . '/config.main.php');
            $configIni = str_replace(array('~dbHost~', '~dbPort~', '~dbName~', '~dbUsername~', '~dbPassword~', '~dbPre~'), array($dbHost, $dbPort, $dbName, $dbUsername, $dbPassword, $tbPre), $configTpl);
            //写入数据库配置信息
            file_put_contents($this->configPath . 'main.php', $configIni);
            self::_appendLog('配置文件写入成功');

            //创建数据库.
            $result = $dbObj->createCommand("SHOW DATABASES")->queryAll();
            foreach ((array) $result as $v) {
                if ($v['Database'] == $dbName) {
                    $dbnameExist = true;
                    break;
                }
            }
            if (!$dbnameExist) {
                //如果不存在数据库，则重新创建
                $dbObj->createCommand("CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET UTF8")->execute();
            }
            self::_appendLog("数据库{$dbName}创建完成");

            //创建数据表
            $tableSql = file_get_contents($this->tplPath . 'install_db.sql');
            $dbObj->createCommand("USE `{$dbName}`")->execute();
            $dbObj->createCommand("SET NAMES 'utf8',character_set_client=binary,sql_mode=''")->execute();

            //替换表前缀
            $realSqls = str_replace('#@__', $tbPre, $tableSql);

            //分割sql
            preg_match_all('/DROP TABLE IF EXISTS.*?CREATE TABLE `([a-zA-Z_-]*?)`.*?;/ius', $realSqls, $matches);
            foreach ((array) $matches[0] as $sk => $sql) {
                $dbObj->createCommand($sql)->execute();
                self::_appendLog('创建数据表: ' . $matches[1][$sk] . ' 完成!');
            }

            //安装必要数据
            $dataSql = str_replace('#@__', $tbPre, file_get_contents($this->tplPath . 'install_data.sql'));
            $dbObj->createCommand($dataSql)->execute();
            self::_appendLog('安装必要数据完成!');

            //写入管理员信息
            $password = md5($password);
            $register_ip = Yii::app()->request->userHostAddress;
            $admin_sql = "INSERT INTO `" . $tbPre . "user`(`uid`, `username`, `password`,`groupid`,`register_ip`,`email`,`addtime`) VALUES('1','" . $username . "','" . $password . "', '10', '" . $register_ip . "', '" . $email . "', " . time() . ")";
            $dbObj->createCommand($admin_sql)->execute();

            //安装测试数据
            if ($testData == 'Y') {
                $testData = file_get_contents($this->tplPath . 'test_data.sql');
                $command = $dbObj->createCommand(str_replace('#@__', $tbPre, $testData))->execute();
                self::_appendLog('测试数据导入完成');
            }
            //写入锁定文件
            @touch($this->_data . $this->lockfile);

            echo '<script>setTimeout(function(){window.location="' . $this->createUrl('complete') . '"}, 2000);</script>';
        } catch (Exception $e) {
            $error = self::_dbError($e->getMessage(), array('dbHost' => $dbHost, 'dbName' => $dbName));
            if ($error == false)
                self::_appendLog($e->getMessage(), true);
            else
                self::_appendLog($error, true);
        }
    }

    /**
     * 安装完成
     */
    public function actionComplete() {
        $this->title = '安装完成';
        $this->render('complete');
    }

    /**
     * 数据库错误信息
     */
    private function _dbError($message, $params = array()) {
        if (preg_match('/failed to open the DB/', $message))
            return '连接失败，请检查数据库配置';
        elseif (preg_match('/1044/', $message))
            return '当前用户没有访问数据库的权限';
        else
            return false;
    }

    /**
     * 数据库信息检测
     */
    public function actionDbCheck() {
        self::_checkInstall();

        $dbHost = Yii::app()->request->getParam('dbHost');
        $dbPort = Yii::app()->request->getParam('dbPort');
        $dbName = Yii::app()->request->getParam('dbName');
        $dbUsername = Yii::app()->request->getParam('dbUsername');
        $dbPassword = Yii::app()->request->getParam('dbPassword');
        try {
            if (empty($dbHost) || empty($dbPort) || empty($dbName) || empty($dbUsername) || empty($dbPassword))
                throw new Exception('数据库信息必须填写完整');
            $dbObj = new CDbConnection('mysql:host=' . $dbHost . ';port=' . $dbPort . ';', $dbUsername, $dbPassword);
            $dbObj->active = true;
            $dbObj->createCommand("USE {$dbName}")->execute();
            $var['state'] = 'success';
            $var['message'] = '连接成功';
        } catch (Exception $e) {
            $var['state'] = 'error';
            $error = self::_dbError($e->getMessage(), array('dbHost' => $dbHost, 'dbName' => $dbName));
            if ($error == false)
                $var['message'] = '无法连接，请检查数据库配置信息是否正确';
            else
                $var['message'] = $error;
        }
        exit(CJSON::encode($var));
    }

}

/**
 * 检测服务器变量
 */
function checkServerVar() {
    $vars = array('HTTP_HOST', 'SERVER_NAME', 'SERVER_PORT', 'SCRIPT_NAME', 'SCRIPT_FILENAME', 'PHP_SELF', 'HTTP_ACCEPT', 'HTTP_USER_AGENT');
    $missing = array();
    foreach ($vars as $var) {
        if (!isset($_SERVER[$var]))
            $missing[] = $var;
    }
    if (!empty($missing))
        return '$_SERVER缺少' . implode(',', $missing);
    /* if(realpath($_SERVER["SCRIPT_FILENAME"]) !== realpath(__FILE__))
      return '$_SERVER["SCRIPT_FILENAME"]必须与入口文件路径一致。'; */

    if (!isset($_SERVER["REQUEST_URI"]) && isset($_SERVER["QUERY_STRING"]))
        return '$_SERVER["REQUEST_URI"]或$_SERVER["QUERY_STRING"]必须存在。';
    if (!isset($_SERVER["PATH_INFO"]) && strpos($_SERVER["PHP_SELF"], $_SERVER["SCRIPT_NAME"]) !== 0)
        return '无法确定URL path info。请检查$_SERVER["PATH_INFO"]（或$_SERVER["PHP_SELF"]和$_SERVER["SCRIPT_NAME"]）的值是否正确。';
    return '';
}

/**
 * 检测图片处理类
 */
function checkCaptchaSupport() {
    if (extension_loaded('imagick')) {
        $imagick = new Imagick();
        $imagickFormats = $imagick->queryFormats('PNG');
    }
    if (extension_loaded('gd'))
        $gdInfo = gd_info();
    if (isset($imagickFormats) && in_array('PNG', $imagickFormats))
        return '';
    elseif (isset($gdInfo)) {
        if ($gdInfo['FreeType Support'])
            return '';
        return 'GD 库已安装,<br />FreeType 未安装';
    }
    return 'GD or ImageMagick 均未安装';
}
