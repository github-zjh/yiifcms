<?php
/**
 * 数据库管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */


class DatabaseController extends Backend
{

    private $_db;
    private $_bakupPath;
    private $_spaceSql = '#---------------//space-------------//space------------//space--------------#';  //分割sql语句定界符
    public function init ()
    {
        parent::init();
        parent::auth();
        $this->_db = Yii::app()->db;
        $this->_bakupPath = $this->_webRoot.'/protected/data/dbbak/'; 
    }
    
    /**
     * !CodeTemplates.overridecomment.nonjd!
     * @see CController::beforeAction()
     */
    public function beforeAction($action){
    	$controller = Yii::app()->getController()->id;
    	$action = $action->id;
    	if(!$this->checkAcl($controller.'/'.$action)){
    		$this->message('error',Yii::t('common','Access Deny'),'','',true);
    		return false;
    	}
    	return true;
    }

    /**
     * 首页
     */
    public function actionIndex ()
    {        
        $dataList = $this->_db->createCommand("SHOW TABLE STATUS")->queryAll();
        foreach ($dataList as $row) {
            $dataSize += $row['Data_length'];
        }
        $this->render('index', array ('dataSize' => $dataSize , 'dataList' => $dataList ));
    
    }

    /**
     * 执行查询
     */
    public function actionQuery ()
    {        
       $this->render('query', array ());    
    }

    /**
     * 执行相关命令
     */
    public function actionDoQuery ()
    {       
        if ($this->method() == 'POST') {
        	$command=$this->_request->getParam('command');        	    
            $table=$this->_request->getParam('table');
            empty($table) && exit('表必须选择');
            $tb = implode(',', $table);            
            switch ($command) {
                case 'optimzeTable':
                    self::_execute("OPTIMIZE TABLE {$tb}");
                    break;
                case 'checkTable':
                    self::_execute("CHECK TABLE {$tb}");
                    break;
                case 'analyzeTable':
                    self::_execute("ANALYZE TABLE {$tb}");
                    break;
                case 'repairTable':
                    self::_execute("REPAIR TABLE {$tb}");
                    break;
                case 'showTable':
                    $table = explode(',', $tb);
                    foreach ((array) $table as $tb) 
                        self::_execute("SHOW COLUMNS FROM {$tb}");
                    break;
                default:
                    
                    break;
            }            
        }
    }
    
    /**
     * 安装测试数据
     */
    public function actionInstalltestdata(){
    	if($this->_request->isPostRequest){
    		$testdataPath = WWWPATH.'/protected/data/temp/test_data.sql';
    		$testData = file_get_contents($testdataPath);
    		$tbPre = Yii::app()->db->tablePrefix;
    		$command = Yii::app()->db->createCommand(str_replace('#@__', $tbPre, $testData))->execute();
    		$this->message('success', "安装测试数据完成!", $this->createUrl('index'));
    	}else{
    		$this->render('install_test');
    	}
    }

    /**
     * 执行sql
     */
    public function actionExecute ()
    {
        if ($this->method() == 'POST') {            
            $sql = $this->_request->getParam('command');
            self::_execute($sql);           
        }
    }

    /**
     * 导出
     */
    public function actionExport ()
    {
        
        $this->render('export');
    }

    /**
     * 导出数据
     */
    public function actionDoExport ()
    {        
        $dosubmit = $this->_request->getParam('dosubmit');
        if ($dosubmit) {
            $tables = $this->_db->schema->tableNames;
            $sqlcharset = $_POST['sqlcharset'] ? $_POST['sqlcharset'] : $_GET['sqlcharset'];
            $sizelimit = $_POST['sizelimit'] ? $_POST['sizelimit'] : $_GET['sizelimit'];
            $fileid = $_POST['fileid'] ? $_POST['fileid'] : trim($_GET['fileid']);
            $random = $_POST['random'] ? $_POST['random'] : trim($_GET['random']);
            $tableid = $_POST['tableid'] ? $_POST['tableid'] : trim($_GET['tableid']);
            $startfrom = $_POST['startfrom'] ? $_POST['startfrom'] : trim($_GET['startfrom']);
            $tabletype = $_POST['tabletype'] ? $_POST['tabletype'] : trim($_GET['tabletype']);
            self::exportDatabase($tables, $sqlcharset, $sizelimit, $fileid, $random, $tableid, $startfrom, $tabletype);
        }
    }

    /**
     * 数据备份
     * @param  $tables
     * @param  $sqlcharset
     * @param  $sizelimit
     * @param  $fileid
     * @param  $random
     * @param  $tableid
     * @param  $startfrom
     * @param  $tabletype
     */
    private function exportDatabase ($tables, $sqlcharset, $sizelimit, $fileid, $random, $tableid, $startfrom, $tabletype)
    {
        $dumpcharset = $sqlcharset ? $sqlcharset : 'UTF8';
        
        $fileid = ($fileid != '') ? $fileid : 1;
        if ($fileid == 1 && $tables)
            $random = mt_rand(1000, 9999);
        
        if ($this->_db->serverVersion > '4.1') {
            if ($sqlcharset) {
                $this->_db->createCommand("SET NAMES '" . $sqlcharset . "';\n\n")->execute();
            }
            $this->_db->createCommand("SET SQL_MODE=''")->execute();            
        }
        
        $tabledump = '';
        
        $tableid = ($tableid != '') ? $tableid - 1 : 0;
        $startfrom = ($startfrom != '') ? intval($startfrom) : 0;
        
        for ($i = $tableid; $i < count($tables) && strlen($tabledump) + 500 < $sizelimit * 1000; $i ++) {
            global $startrow;
            $offset = 100;
            if (! $startfrom) {
                
                $tabledump .= "DROP TABLE IF EXISTS `$tables[$i]`;\n";
                $createtable = $this->_db->createCommand("SHOW CREATE TABLE `$tables[$i]` ")->queryAll(false);
                $tabledump .= $createtable[0][1] . ";\n\n";
                
                if ($this->_db->serverVersion < '4.1') {
                    $tabledump = preg_replace("/TYPE\=([a-zA-Z0-9]+)/", "ENGINE=\\1 DEFAULT CHARSET=" . $dumpcharset, $tabledump);
                }
                if ($this->_db->serverVersion > '4.1' && $sqlcharset) {
                    $tabledump = preg_replace("/(DEFAULT)*\s*CHARSET=[a-zA-Z0-9]+/", "DEFAULT CHARSET=" . $sqlcharset, $tabledump);
                }
                /* if($tables[$i]==DB_PRE.'session') {
                    $tabledump = str_replace("CREATE TABLE `".DB_PRE."session`", "CREATE TABLE IF NOT EXISTS `".DB_PRE."session`", $tabledump);
                } */
            }
            
            $numrows = $offset;
            while (strlen($tabledump) < $sizelimit * 1000 && $numrows == $offset) {
                $sql = "SELECT * FROM `$tables[$i]` LIMIT $startfrom, $offset";
                
                $exe = $this->_db->createCommand($sql);
                
                $q = $exe->queryAll();
                $numrows = count($q);
                $keys = array_keys((array) $q[0]);
                $numfields = count($keys);
                //$fields_name = $this->db->get_fields($tables[$i]);
                //$rows = $this->db->query($sql);
                $r = array ();
                $rows = $exe->query();
                //while (($row = $rows->read()) !== false) {
                foreach ((array) $q as $row) {
                    $r[] = $row;
                    $comma = "";
                    $tabledump .= "INSERT INTO `$tables[$i]` VALUES(";
                    //for ($j = 0; $j < $numfields; $j ++) {
                    foreach ($keys as $k) {
                        $tabledump .= $comma . "'" . addslashes($row[$k]) . "'";
                        $comma = ",";
                    }
                    $tabledump .= ");\n";
                }
                $startfrom += $offset;
            }
            $tabledump .= "\n";
            $startrow = $startfrom;
            $startfrom = 0;
        }
        
        if (trim($tabledump)) {
            $tabledump = "# your database backup\n# version:".$this->_db->serverVersion."\n# time:" . date('Y-m-d H:i:s') . "\n# --------------------------------------------------------\n\n\n" . $tabledump;
            $tableid = $i;
            $filename = $tabletype . '_' . date('Ymd') . '_'.date('His'). '_' . $fileid . '.sql';
            $altid = $fileid;
            $fileid ++;
            
            if(!is_dir($this->_bakupPath)){
            	mkdir($this->_bakupPath,0777,true);
            }
            $bakfile = $this->_bakupPath . $filename;
            
            file_put_contents($bakfile, $tabledump);
            
            $this->message('success', "备份文件 $filename 写入成功!", $this->createUrl('doExport', array ('sizelimit' => $sizelimit , 'tableid' => $tableid , 'fileid' => $fileid , 'random' => $random , 'startfrom' => $startrow , 'dosubmit' => 1 ,  'sqlcharset' => $sqlcharset , 'tabletype' => $tabletype )), 1);
        
        } else {
            @file_put_contents($this->_bakupPath . 'index.html', '');
            $this->redirect($this->createUrl('export'));
        }
    }

    /**
     * 导入数据
     */
    public function actionImport ()
    {        
        if ($this->_request->getParam('dosubmit')) {
            $pre = trim($this->_request->getParam('pre'));
            $fileid = $this->_request->getParam('fileid');
            self::_import($pre, $fileid);
        } else {
            
            $sqlfiles = glob($this->_bakupPath . '*.sql');
            if (is_array($sqlfiles)) {
                asort($sqlfiles);
                $prepre = '';
                $info = $infos = $other = $others = array ();
                foreach ($sqlfiles as $id => $sqlfile) {
                    if (preg_match("/(db_[0-9]{8}_[0-9a-z]{6}_)([0-9]+)\.sql/i", basename($sqlfile), $num)) {
                        $info['filename'] = basename($sqlfile);
                        $info['filesize'] = round(filesize($sqlfile) / (1024 * 1024), 2);
                        $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
                        $info['pre'] = $num[1];
                        $info['number'] = $num[2];
                        if (! $id)
                            $prebgcolor = '#CFEFFF';
                        if ($info['pre'] == $prepre) {
                            $info['bgcolor'] = $prebgcolor;
                        } else {
                            $info['bgcolor'] = $prebgcolor == '#F2F9FD' ? '' : '#F2F9FD';
                        }
                        $prebgcolor = $info['bgcolor'];
                        $prepre = $info['pre'];
                        $infos[] = $info;
                    } else {
                        $other['filename'] = basename($sqlfile);
                        $other['filesize'] = round(filesize($sqlfile) / (1024 * 1024), 2);
                        $other['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
                        $others[] = $other;
                    }
                }
            }
            $show_validator = true;
            
            $this->render('import', array ('infos' => $infos , 'otherData' => $others ));
        }
    }

    /**
     * 数据恢复
     * @param  $filename
     * @param  $fileid
     */
    private function _import ($filename, $fileid)
    {
        if ($filename && CFileHelper::getExtension($filename) == 'sql') {
            $filepath = $this->_bakupPath . $filename;
            if (! file_exists($filepath))
                $this->message('error', '文件不存在');
            $sql = file_get_contents($filepath);
            self::_sqlExecute($sql);
            //showmessage("$filename " . L('data_have_load_to_database'));
            $this->message('success', $filename . '中的数据成功导入');
        } else {
            $fileid = $fileid ? $fileid : 1;
            $pre = $filename;
            $filename = $filename . $fileid . '.sql';
            $filepath = $this->_bakupPath . $filename;
            if (file_exists($filepath)) {
                $sql = file_get_contents($filepath);
                $this->_sqlExecute($sql);
                $fileid ++;
                //showmessage(L('bakup_data_file') . " $filename " . L('load_success'), "?m=admin&c=database&a=import&pdoname=" . $this->pdo_name . "&pre=" . $pre . "&fileid=" . $fileid . "&dosubmit=1");
                $this->message('success', '数据文件' . $filename . ' 导入成功', $this->createUrl('import', array ('pre' => $pre , 'fileid' => $fileid , 'dosubmit' => '1' )), 1);
            } else {
                $this->message('success', '数据成功导入', $this->createUrl('import'), 3);
            }
        }
    }

    /**
     * 执行SQL
     * @param  $sql
     */
    private function _sqlExecute ($sql)
    {
    	$this->_db->createCommand($sql)->execute();       
        return true;
    }

    /**
     * 执行sql
     */
    private function _execute ($command = '')
    {
        $exeSql = empty($command) ? trim($this->_request->getParam('command')) : $command;        
        $formatExeSql = array($exeSql);
        foreach ($formatExeSql as $sql) {
            if (empty($sql))
                continue;
             try {
                 $resultData = self::_executeCommand($sql);
                if (false !== $resultData['result']) {
                    if ($resultData['type'] == 'query') {
                        if (empty($resultData['result']))
                            echo '执行完成';
                        $fields = array_keys($resultData['result'][0]);
                        echo $this->render('query_result', array ('fields' => $fields , 'dataList' => $resultData['result'] , 'command' => $command ), true);
                    } else {
                        echo "<div style='color:red;padding:10px 0'>执行完成: {$sql}</div>";
                    }
                } else {
                    echo "执行失败";
                }
             } catch (Exception $e) {
                echo "<div style='color:red;padding:10px 0'>执行失败: {$sql}</div>";
            }   
        }
    }

    /**
     * 查询分析器
     * @param  $sql
     */
    private function _executeCommand ($sql = '')
    {
        if (MAGIC_QUOTES_GPC) {
            $sql = stripslashes($sql);
        }
        if (empty($sql))
            exit('SQL不能为空');
        
        $queryType = 'INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|LOAD DATA|SELECT .* INTO|COPY|ALTER|GRANT|TRUNCATE|REVOKE|LOCK|UNLOCK';
        if (preg_match('/^\s*"?(' . $queryType . ')\s+/i', $sql)) {
            $data['result'] = $this->_db->createCommand($sql)->execute();
            $data['type'] = 'execute';
        } else {
            $data['result'] = $this->_db->createCommand($sql)->queryAll();
            $data['type'] = 'query';
        }
        
        return $data;
    }

    /**
     * 批处理
     */
    public function actionOperate ()
    {
        $command = trim($this->_request->getParam('command'));
        
        switch ($command) {
            case 'deleteFile':                
                $filenames = $this->_request->getParam('sqlfile');
                
                if ($filenames) {
                    if (is_array($filenames)) {
                        foreach ($filenames as $filename) {
                            if (CFileHelper::getExtension($filename) == 'sql') {
                                @unlink($this->_bakupPath . $filename);
                            }
                        }
                        
                        $this->message('success', '删除完成', $this->createUrl('import'));
                    } else {
                        if (CFileHelper::getExtension($filenames) == 'sql') {
                            @unlink($this->_bakupPath . $filename);
                            $this->message('success', '删除完成', $this->createUrl('import'));
                        }
                    }
                } else {
                    $this->message('error', '请选择要删除的文件', $this->createUrl('import'));
                }
                
                break;
            case 'downloadFile':                
                $sqlfile = $this->_bakupPath . $this->_request->getParam('sqlfile');
                Yii::app()->request->sendFile($this->_request->getParam('sqlfile'), file_get_contents($sqlfile));
                break;
            default:
                throw new CHttpException(404, '未找到操作' );
                break;
        }
    
    }

}

?>