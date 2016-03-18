<?php

/**
 * 安装程序
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016 . All rights reserved. 
 * 
 */
class InstallController extends AppController {

    public $tplPath;
    public $configPath;
    public $_data = '';
    public $lockfile = 'install.lock';
    public $title;
    public $mysql_cut_line = '-----------------------------------mysql_cut_line---------------------------------';
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
    
    public function beforeAction($action)
    {        
        if(!in_array($this->action->id, array('complete', 'stop'))) {
            $this->_checkInstall();
        }
        return true;
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
        $this->title = '安装许可协议';
        $this->render('step1');
    }

    /**
     * 安装第二步(环境检测)
     */
    public function actionStep2() {        
        $this->title = '检测运行环境';
        //PHP版本 >= 5.3.0
        $php_version = phpversion() >= '5.3.0' ? true : false;        
        //PDO扩展
        $pdo_ext = extension_loaded('pdo') ? true : false;
        //ICONV/MB_STRING 扩展
        $iconv_mbs = extension_loaded('iconv') || extension_loaded('mbstring') ? true : false;
        //Mcrypt 扩展
        $mcrypt = extension_loaded("mcrypt") ? true : false;
        //是否全部通过
        $pass = false;
        if($php_version && $pdo_ext && $iconv_mbs && $mcrypt) {
            $pass = true;
        }        
        $this->render('step2', array(
            'php_version' => $php_version,
            'pdo_ext'     => $pdo_ext,
            'iconv_mbs'   => $iconv_mbs,
            'mcrypt'      => $mcrypt,
            'pass'        => $pass
        ));
    }
    
    /**
     * 安装第三步(选择模块)
     */
    public function actionStep3() {           
        $this->title = '选择模块';        
        $this->render('step3');
    }
    
    /**
     * 安装第四步(文件权限检测)
     */
    public function actionStep4() {           
        $this->title = '文件权限检测';
        
        //是否安装测试数据
        $test_data = Yii::app()->request->getParam('testdata');
        if(isset($test_data) && $test_data == 1) {             
            Yii::app()->session['test_data'] = 1;
        } else {
            unset(Yii::app()->session['test_data']);
        }
        
        //临时文件可读写
        $runtime = Helper::is_writeable(Yii::app()->runtimePath) ? true : false;
        //上传目录可读写
        $upload = Helper::is_writeable(ROOT_PATH . DS . 'upload') ? true : false;
        //数据库备份目录
        $data = Helper::is_writeable($this->_data) ? true : false;
        //配置文件目录
        $config = Helper::is_writeable(ROOT_PATH . DS . 'protected' . DS . 'config') ? true : false;
        //公共资源目录
        $assets = Helper::is_writeable(ROOT_PATH . DS . 'assets') ? true : false;
        //是否全部通过
        $pass = false;
        if($runtime && $upload && $data && $config && $assets) {
            $pass = true;
        }        
        $this->render('step4', array(
            'runtime' => $runtime, 
            'upload'  => $upload, 
            'data'    => $data, 
            'config'  => $config, 
            'assets'  => $assets,
            'pass'    => $pass
        ));
    }

    /**
     * 安装第五步(数据库信息设置)
     */
    public function actionStep5() {        
        $this->title = '填写数据库信息';
        $this->render('step5');
    }
    
    /**
     * 安装第六步(安装进度)
     *  
     * 1.检测数据库配置信息
     * 2.写入数据库配置信息
     * 3.创建数据表
     * 4.写入默认信息
     * 5.根据选择，是否安装测试数据
     */
    public function actionStep6() {
        set_time_limit(600);        
        $dbHost = Yii::app()->request->getParam('dbhost');
        $dbPort = Yii::app()->request->getParam('dbport');
        $dbName = Yii::app()->request->getParam('dbname');
        $dbUsername = Yii::app()->request->getParam('dbuser');
        $dbPassword = Yii::app()->request->getParam('dbpw');
        $tbPre = Yii::app()->request->getParam('tablepre');
        $username = Yii::app()->request->getParam('username');
        $password = Yii::app()->request->getParam('password');
        //$email = Yii::app()->request->getParam('email');        
        $this->title = '安装数据表';
        $this->render('step6');
        try {            
            $dbObj = new CDbConnection('mysql:host=' . $dbHost . ';port=' . $dbPort . ';', $dbUsername, $dbPassword);
            self::_appendLog('数据库信息检测通过');
            $configTpl = file_get_contents($this->tplPath . '/config.main.php');
            $configIni = str_replace(array('~dbHost~', '~dbPort~', '~dbName~', '~dbUsername~', '~dbPassword~', '~dbPre~'), array($dbHost, $dbPort, $dbName, $dbUsername, $dbPassword, $tbPre), $configTpl);
            //写入数据库配置信息
            file_put_contents($this->configPath . 'main.php', $configIni);
            self::_appendLog('配置文件写入成功');

            //创建数据库.
//            $result = $dbObj->createCommand("SHOW DATABASES")->queryAll();
//            foreach ((array) $result as $v) {
//                if ($v['Database'] == $dbName) {
//                    $dbnameExist = true;
//                    break;
//                }
//            }
//            if (!$dbnameExist) {
//                //如果不存在数据库，则重新创建
//                $dbObj->createCommand("CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET UTF8")->execute();
//            }
//            self::_appendLog("数据库{$dbName}创建完成");

            //创建数据表
            $tableSql = file_get_contents($this->tplPath . 'install_table.sql');
            $dbObj->createCommand("USE `{$dbName}`")->execute();
            $dbObj->createCommand("SET NAMES 'utf8',character_set_client=binary,sql_mode=''")->execute();

            //替换表前缀
            $realSqls = str_replace('#@__', $tbPre, $tableSql);

            //创建数据表
            $matches = array();
            preg_match_all('/DROP TABLE IF EXISTS.*?CREATE TABLE `([a-zA-Z_-]*?)`.*?;/ius', $realSqls, $matches);            
            foreach ($matches[0] as $sk => $sql) {
                $dbObj->createCommand($sql)->execute();
                isset($matches[1][$sk]) && self::_appendLog('创建数据表: ' . $matches[1][$sk] . ' 完成!');
            }
            //安装必要数据
            self::_appendLog('导入必要数据开始... ');
            $matches_n = array();
            preg_match_all('/INSERT INTO `([a-zA-Z_-]*?)`(.*?\));/ius', $realSqls, $matches_n);            
            foreach ($matches_n[0] as $sql) {                
                $dbObj->createCommand($sql)->execute();                
            }            
            self::_appendLog('安装必要数据完成!');
            
            //写入管理员信息
            $adpassword = md5($password);
            $register_ip = Yii::app()->request->userHostAddress;
            $admin_sql = "INSERT INTO `" . $tbPre . "user`(`uid`, `username`, `password`,`groupid`,`register_ip`,`addtime`) VALUES('1','" . $username . "','" . $adpassword . "', '10', '" . $register_ip . "', " . time() . ")";
            $dbObj->createCommand($admin_sql)->execute();

            //安装测试数据
            $testData = isset(Yii::app()->session['test_data']) ? Yii::app()->session['test_data'] : 0;
            if ($testData == 1) {
                $testData = file_get_contents($this->tplPath . 'install_data.sql');
                //替换表前缀
                $realSqls = str_replace('#@__', $tbPre, $testData);
                self::_appendLog('导入测试数据开始... ');
                $matches_t = explode($this->mysql_cut_line, $realSqls);                
                foreach ($matches_t as $sql) {
                    usleep(10000);
                    if(trim($sql)) {
                        $dbObj->createCommand($sql)->execute();                    
                    }
                }                 
                self::_appendLog('测试数据导入完成');
            }
            $complete_url = $this->createUrl('complete');
            echo '<script>$("#finish").attr("href", "'.$complete_url.'").html("安装完成");</script>';
            self::_appendLog('安装完成');            
            //写入锁定文件
            touch($this->_data . $this->lockfile);
            echo '<script>setTimeout(function(){window.location="' . $complete_url . '"}, 3000);</script>';            
        } catch (Exception $e) {
            $error = self::_dbError($e->getMessage(), array('dbHost' => $dbHost, 'dbName' => $dbName));
            if ($error == false) {
                self::_appendLog($e->getMessage());
            } else {
                self::_appendLog($error);
            }
        }
    }

    /**
     * 安装完成
     */
    public function actionComplete() {        
        unset(Yii::app()->session['test_data']);
        $this->title = '安装完成';
        $this->render('complete');
    }
    
    /**
     * 数据库信息检测
     */
    public function actionDbCheck() {        
        $dbHost = Yii::app()->request->getParam('dbHost');
        $dbPort = Yii::app()->request->getParam('dbPort');
        $dbName = Yii::app()->request->getParam('dbName');
        $dbUsername = Yii::app()->request->getParam('dbUsername');
        $dbPassword = Yii::app()->request->getParam('dbPassword');
        try {
            if (empty($dbHost) || empty($dbPort) || empty($dbName) || empty($dbUsername)) {
                $var['state'] = 'error';
                $var['message'] = '请填写完整';               
            } else {
                $dbObj = new CDbConnection('mysql:host=' . $dbHost . ';port=' . $dbPort . ';', $dbUsername, $dbPassword);
                $dbObj->active = true;
                $dbObj->createCommand("USE `{$dbName}`")->execute();
                $var['state'] = 'success';
                $var['message'] = '连接成功';
            }
        } catch (Exception $e) {
            $var['state'] = 'error';
            $error = self::_dbError($e->getMessage(), array('dbHost' => $dbHost, 'dbName' => $dbName));
            if ($error == false) {
                $var['message'] = '无法连接，请检查数据库配置信息是否正确';
            } else {
                $var['message'] = $error;
            }
        }
        exit(CJSON::encode($var));
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
        echo '<script type="text/javascript">$("#installmessage").append("' . $message . $callBack . '<br />");showmessage();</script>';
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
     * 数据库错误信息
     */
    private function _dbError($message) {
        if (preg_match('/failed to open the DB/', $message)) {
            return '连接失败，请检查数据库配置';        
        } elseif (preg_match('/1044/', $message)) {
            return '当前用户没有访问数据库的权限';
        } else {
            return false;
        }
    }
}