<?php
/**
 * 安装程序
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 * 
 */

class InstallController extends Controller
{
    public $tplPath ;    
    public $configPath ;
    public $_data = '';
    public $lockfile = 'install.lock';
    public $titler;   
    public $org_url='http://www.yiifcms.com/';  //官方网址
    public $org_help_url = 'http://www.yiifcms.com/help'; //官方帮助中心网址
    public $layout = false;
    public function init(){        	
    	$this->_static_public = Yii::app()->baseUrl.'/public';   
    	$this->_theme = Yii::app()->theme;   
    	$this->_request = Yii::app()->request;
    	$this->_data = WWWPATH.'/protected/data/';
        $this->tplPath = $this->_data.'temp/';
        $this->configPath = Yii::app()->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR;		
    }

    /**
     * 检测是否已经安装
     */
    private function _checkInstall(){
        if(file_exists($this->_data.$this->lockfile))
           $this->redirect(array('stop'));
    }

    /**
     * 已经安装
     */
    public function actionStop(){
        $this->titler = '安装停止';
        $this->render('stop');
    }
   
    /**
     * 安装程序首页
     */
    public function actionIndex ()
    {        
    	self::_checkInstall();
        $this->titler = '阅读协议';
        $this->render('index', $data);
    }


    /**
     * 环境检测
     */
    public function actionEnv ()
    {
       
       self::_checkInstall();
       $isWritable = array(
            array(
                '私有临时文件(protected/runtime)',
                true,
                Helper::is_writeable(Yii::app()->runtimePath),
                '系统核心',
                '必须可读写',
            ),
       		array(
       			'非模块化的静态文件(public)',
       			false,       			
       			is_readable(WWWPATH.DS.'public'),
       			'公共静态文件',
       			'必须可读'
       		),
            array(
                '附件上传目录(uploads)',
                false,
                Helper::is_writeable(WWWPATH.DS.'uploads'),
                '附件上传',
                '若无附件上传可不用写权限'
            ),
       		array(
       				'数据目录(data)',
       				false,
       				Helper::is_writeable(WWWPATH.DS.'protected'.DS.'data'),
       				'数据库备份',
       				'若不备份数据库可不用写权限'
       		),
            array(
                '配置文件目录(protected/config)',
                false,
                Helper::is_writeable(WWWPATH.DS.'protected'.DS.'config'),
                '安装程序',
                '若手动安装系统写可不用写权限'
            ),
            array(
                '公共资源文件(assets)',
                true,
                Helper::is_writeable(WWWPATH.DS.'assets'),
                '系统核心',
                '必须可读写'
            ),

       );
       
        $requirements=array(
            array(
                'PHP版本',
                 true,
                 version_compare(PHP_VERSION,"5.2.0",">="),
                '系统核心',
                'PHP 5.2.0 或更高版本是必须的.'),    

        	array (
				'$_SERVER 服务器变量',
				true,
				'' === $message = checkServerVar (),
				'系统核心',
				$message 
				),
            array(
                'Reflection 扩展模块',
                true,
                class_exists('Reflection',false),
                '系统核心',
                ''),
            array(
                'PCRE 扩展模块',
                true,
                extension_loaded("pcre"),
                '系统核心',
                ''),
            array(
                'SPL 扩展模块',
                true,
                extension_loaded("SPL"),
                '系统核心',
                ''),
            array(
                'DOM 扩展模块',
                false,
                class_exists("DOMDocument",false),
                'CHtmlPurifier, CWsdlGenerator',
                ''),
            array(
                'PDO 扩展模块',
                true,
                extension_loaded('pdo'),
                '所有和使用PDO数据库连接相关的类',
                ''),
            array(
                'PDO MySQL 扩展模块',
                true,
                extension_loaded('pdo_mysql'),
                'MYSQL数据库',
                '使用MYSQL必须支持'),
            array(
                'Mcrypt 扩展模块',
                false,
                extension_loaded("mcrypt"),
                'CSecurityManager',
                '加密和解密方法'),
            array(
                'SOAP 扩展模块',
                false,
                extension_loaded("soap"),
                'CWebService, CWebServiceAction',
                ''),
            array(
                'GD 扩展模块',
                false,
                '' === $message=checkCaptchaSupport(),
                'CCaptchaAction',
                $message),
            array(
                'Ctype 扩展模块',
                false,
                extension_loaded("ctype"),
                'CDateFormatter, CDateFormatter, CTextHighlighter, CHtmlPurifier',
                ''
            ),
        );
    
        $requireResult = 1; 
        foreach($requirements as $i=>$requirement)
        {
            if($requirement[1] && !$requirement[2])
                $requireResult=0;
            else if($requireResult > 0 && !$requirement[1] && !$requirement[2])
                $requireResult=-1;
            if($requirement[4] === '')
                $requirements[$i][4]='&nbsp;';
        }
        $writeableResult = 1; 
        foreach($isWritable as $k=>$val)
        {
            if($val[1] && !$val[2])
                $writeableResult=0;
            else if($requireResult > 0 && !$val[1] && !$val[2])
                $writeableResult=-1;
            if($val[4] === '')
                $isWritable[$i][4]='&nbsp;';
        }
       $data = array(
            'isWritable'=>$isWritable,
            'writeableResult'=>$writeableResult,
            'requireResult'=>$requireResult,
            'requirements'=>$requirements,
       );
       $this->titler = '检测运行环境';
       $this->render('env', $data);
    }

    /**
     * 数据库信息设置
     */
    public function actionDb ()
    {    
       self::_checkInstall();
       $this->titler = '填写数据库信息';
       $this->render('db', $data);
    }

    /**
     * 追加安装日志
     */
    private function _appendLog($message, $callBack = false){    	
        if($callBack) {
            $callBack = " <a href='".$this->createUrl('db')."' class='red'>返回检查</a>";
        }
        ob_flush();
        flush();
        echo '<script type="text/javascript">$("#progress").append("'.$message.$callBack.'<br />");showmessage();</script>';        
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
    public function actionProgress()
    {
        self::_checkInstall();
        $dbHost = $this->_request->getParam('dbHost');
        $dbPort = $this->_request->getParam('dbPort');        
        $dbName = $this->_request->getParam('dbName');
        $dbUsername = $this->_request->getParam('dbUsername');
        $dbPassword = $this->_request->getParam('dbPassword');
        $tbPre = $this->_request->getParam('tbPre');
        $username = $this->_request->getParam('username');
        $password = $this->_request->getParam('password');
        $email = $this->_request->getParam('email');
        $testData = $this->_request->getParam('testData');
        $this->titler = '安装数据表';
        $this->render('progress', $data);
        try {
            $dbObj = new CDbConnection('mysql:host='.$dbHost.';port='.$dbPort.';',$dbUsername,$dbPassword);                  
            self::_appendLog('数据库信息检测通过');
            $configTpl = file_get_contents($this->tplPath.'/config.main.php');
            $configIni = str_replace(array('~dbHost~','~dbPort~', '~dbName~', '~dbUsername~', '~dbPassword~', '~dbPre~'), array($dbHost, $dbPort, $dbName, $dbUsername, $dbPassword, $tbPre), $configTpl);
            //写入数据库配置信息
            file_put_contents($this->configPath.'main.php', $configIni);
            self::_appendLog('配置文件写入成功');
			
			//创建数据库.
			$result = $dbObj->createCommand("SHOW DATABASES")->queryAll();			
			foreach ((array)$result as $v) {
				if ($v['Database'] == $dbName) {
					$dbnameExist = true;
					break;
				}
			}
			if(!$dbnameExist){
				//如果不存在数据库，则重新创建
				$dbObj->createCommand("CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET UTF8")->execute();
			}
			self::_appendLog("数据库{$dbName}创建完成");
			
            //创建数据表
            $tableSql = file_get_contents($this->tplPath.'install_db.sql');   
            $dbObj->createCommand("USE `{$dbName}`")->execute();         
            $dbObj->createCommand("SET NAMES 'utf8',character_set_client=binary,sql_mode=''")->execute();
            
            //替换表前缀
			$realSqls = str_replace('#@__', $tbPre, $tableSql);	
					
			//分割sql
			preg_match_all('/DROP TABLE IF EXISTS.*?CREATE TABLE `([a-zA-Z_-]*?)`.*?;/ius', $realSqls,  $matches);			
			foreach((array)$matches[0] as $sk => $sql){				
				$dbObj->createCommand($sql)->execute();
				self::_appendLog('创建数据表: '.$matches[1][$sk].' 完成!');
			} 				
			
			//安装必要数据
			$dataSql = str_replace('#@__', $tbPre, file_get_contents($this->tplPath.'install_data.sql'));
			$dbObj->createCommand($dataSql)->execute();
			self::_appendLog('安装必要数据完成!');
			
            //写入管理员信息
            $password = md5($password);
            $register_ip = $this->_request->userHostAddress;
            $admin_sql = "INSERT INTO `".$tbPre."user`(`uid`, `username`, `password`,`groupid`,`register_ip`,`email`,`addtime`) VALUES('1','".$username."','".$password."', '10', '".$register_ip."', '".$email."', ".time().")";
            $dbObj->createCommand($admin_sql)->execute();

            //安装测试数据
            if($testData == 'Y'){
                $testData = file_get_contents($this->tplPath.'test_data.sql');                
				$command = $dbObj->createCommand(str_replace('#@__', $tbPre, $testData))->execute();                
                self::_appendLog('测试数据导入完成');
            }               
            //写入锁定文件
            @touch($this->_data.$this->lockfile);
            
            echo '<script>setTimeout(function(){window.location="'.$this->createUrl('complete').'"}, 2000);</script>';
        } catch (Exception $e) {
            $error = self::_dbError($e->getMessage(), array('dbHost'=>$dbHost, 'dbName'=>$dbName));
            if($error == false)
                self::_appendLog($e->getMessage(), true);
            else
                self::_appendLog($error, true);
        }
    }
    
    /**
     * 安装完成
     */
    public function actionComplete ()
    {	    	      	 	
        $this->titler = '安装完成';
        $this->render('complete');
    }

    /**
     * 数据库错误信息
     */
    private function _dbError($message, $params = array()){
        if(preg_match('/failed to open the DB/', $message))
            return '连接失败，请检查数据库配置';
        elseif(preg_match('/1044/', $message))
            return '当前用户没有访问数据库的权限';
        else
            return false;
    }

     /**
     * 数据库信息检测
     */
    public function actionDbCheck(){
    	self::_checkInstall();
    	
        $dbHost = $this->_request->getParam('dbHost');
        $dbPort = $this->_request->getParam('dbPort');
        $dbName = $this->_request->getParam('dbName');
        $dbUsername = $this->_request->getParam('dbUsername');
        $dbPassword = $this->_request->getParam('dbPassword');
        try {
            if(empty($dbHost) || empty($dbPort) || empty($dbName) || empty($dbUsername) || empty($dbPassword))
                throw new Exception('数据库信息必须填写完整');
            $dbObj = new CDbConnection('mysql:host='.$dbHost.';port='.$dbPort.';',$dbUsername,$dbPassword);
            $dbObj->active = true;
            $dbObj->createCommand("USE {$dbName}")->execute();
            $var['state'] = 'success';
            $var['message'] = '连接成功';
        } catch (Exception $e) {
            $var['state'] = 'error';
            $error = self::_dbError($e->getMessage(), array('dbHost'=>$dbHost, 'dbName'=>$dbName));
            if($error == false)
                $var['message'] = '无法连接，请检查数据库配置信息是否正确';
            else
                $var['message'] = $error ;
        }
        exit(CJSON::encode($var));
    }
    
}

/**
 * 检测服务器变量
 */
function checkServerVar()
{
    $vars=array('HTTP_HOST','SERVER_NAME','SERVER_PORT','SCRIPT_NAME','SCRIPT_FILENAME','PHP_SELF','HTTP_ACCEPT','HTTP_USER_AGENT');
    $missing=array();
    foreach($vars as $var)
    {
        if(!isset($_SERVER[$var]))
            $missing[]=$var;
    }
    if(!empty($missing))
        return '$_SERVER缺少'.implode(',',$missing);
   /* if(realpath($_SERVER["SCRIPT_FILENAME"]) !== realpath(__FILE__))
        return '$_SERVER["SCRIPT_FILENAME"]必须与入口文件路径一致。';*/

    if(!isset($_SERVER["REQUEST_URI"]) && isset($_SERVER["QUERY_STRING"]))
        return '$_SERVER["REQUEST_URI"]或$_SERVER["QUERY_STRING"]必须存在。';
    if(!isset($_SERVER["PATH_INFO"]) && strpos($_SERVER["PHP_SELF"],$_SERVER["SCRIPT_NAME"]) !== 0)
        return '无法确定URL path info。请检查$_SERVER["PATH_INFO"]（或$_SERVER["PHP_SELF"]和$_SERVER["SCRIPT_NAME"]）的值是否正确。';
    return '';
}

/**
 * 检测图片处理类
 */
function checkCaptchaSupport()
{
    if(extension_loaded('imagick'))
    {
        $imagick=new Imagick();
        $imagickFormats=$imagick->queryFormats('PNG');
    }
    if(extension_loaded('gd'))
        $gdInfo=gd_info();
    if(isset($imagickFormats) && in_array('PNG',$imagickFormats))
        return '';
    elseif(isset($gdInfo))
    {
        if($gdInfo['FreeType Support'])
            return '';
        return 'GD 库已安装,<br />FreeType 未安装';
    }
    return 'GD or ImageMagick 均未安装';
}