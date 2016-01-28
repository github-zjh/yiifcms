<?php
/**
 * 数据库还原
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class ImportAction extends CAction
{	
	public function run(){       
        $command = trim(Yii::app()->request->getParam('command'));
        $sqlfile = Yii::app()->request->getParam('sqlfile');
        if( $command ) {
            if(!$sqlfile) {
                $this->controller->message( 'error', Yii::t('admin','No Select') );               
            }
            switch($command) {
                case 'import':    //恢复
                    if(is_array($sqlfile)) {
                        foreach($sqlfile as $v) {
                            $file = $this->controller->backup. '/' .$v;
                            $this->startImport($file);                            
                        }
                    } else {
                        $file = $this->controller->backup. '/' .$sqlfile;
                        $this->startImport($file);
                    }
                    break;
                case 'download':  //下载
                    $this->startDownload($sqlfile);
                    break;
                case 'delete':    //删除
                    $this->startDelete($sqlfile);
                    break;
            }
        } else {            
            $sqlfiles = glob(rtrim($this->controller->backup,'\/') . '/*.sql');            
            $infos = array ();
            if (is_array($sqlfiles)) {
                asort($sqlfiles);
                $prepre = '';                
                foreach ($sqlfiles as $sqlfile) {
                    $info = array();                    
                    $filesize = Helper::byteFormat(filesize($sqlfile));
                    $maketime = date('Y-m-d H:i:s', filemtime($sqlfile));
                    if (preg_match("/^(db_[\d]{14})_([\d]+)\.sql$/i", basename($sqlfile), $matches)) {
                        $info['filename'] = basename($sqlfile);
                        $info['filesize'] = $filesize;
                        $info['maketime'] = $maketime;
                        $info['pre'] = $matches[1];
                        $info['number'] = $matches[2];                        
                        $prepre = $info['pre'];
                        $infos[] = $info;
                    }
                }
            }
            $this->controller->render('import', array('infos' => $infos));
        }        
	}
    
    /**
     * 
     * @param string $file
     */
    protected  function startImport($file = '')
    {        
        set_time_limit(3600);
        $file_content = file_get_contents($file);
        $content = preg_replace('/\-\-comment_start(.*?)\-\-comment_end/is', '', $file_content);
        //分隔sql
        $sqls = explode($this->controller->cutline, $content);
        echo "<style>"
                . "body{ "
                . "font-family:Monaco, DejaVu Sans Mono, Bitstream Vera Sans Mono, Consolas, Courier New, monospace; "
                . "font-size:14px; "
                . "line-height:1.8em; "
                . "background-color:#000000; "
                . "padding:20px;"
                . "color:#FFFFFF;}"
                . "</style>";
        echo "<br/>--------导入数据[start]--------<br/>";
        if($sqls) {
            $i = 1;
            $count = count($sqls);            
            //每行执行sql数
            $pre_row_progress = 100;
            $finish = false;
            //执行成功一次 输出符号
            $char = '=';            
            foreach($sqls as $sql) {
                if(!trim($sql)) {                    
                    if($i == $count) {
                        $finish = true;
                        break;
                    }
                    $i++;
                    echo $char;
                    continue;
                }
                try {                    
                    Yii::app()->db->createCommand($sql)->execute();
                    if( $i%$pre_row_progress == 0 && $i < $count) {
                        $percent = (round($i/$count, 2)*100).'%';
                        echo '<br/>已完成<font color="green">['. $percent.']</font><br/>';
                    } else {
                        echo $char;                        
                    }                     
                } catch(Exception $e) {
                    echo "<br/>执行第{$i}条失败.&nbsp;&nbsp;<label style='color:red;'>".$e->getMessage()."</label>";
                    break;
                }
                if($i == $count) {
                    $finish = true;
                    break;
                }   
                $i ++;
                ob_flush();
                flush();                
                usleep(10000); 
            }
            if($finish) {                
                echo '<br/>已完成<font color="green">[100%]</font>';
            }
        }
        echo "<br/>--------导入完成[success]--------";
        exit;
    }
    
    /**
     * 下载备份文件
     * 
     * @param string $file
     */
    protected function startDownload($file = '')
    { 
        if(is_array($file)) {
            foreach($file as $v) {
                $sqlfile = $this->controller->backup. '/' .$v;
                Yii::app()->request->sendFile(Yii::app()->request->getParam('sqlfile'), file_get_contents($sqlfile));                
            }
        }else {
            $sqlfile = $this->controller->backup. '/' .$file;
            Yii::app()->request->sendFile(Yii::app()->request->getParam('sqlfile'), file_get_contents($sqlfile));           
        }             
    }
    
    /**
     * 删除备份文件
     * 
     * @param string $file
     */
    protected function startDelete($file = '')
    {
        if(is_array($file)) {
            foreach($file as $v) {
                $sqlfile = $this->controller->backup. '/' .$v;
                @unlink($sqlfile);
            }
        }else {
            $sqlfile = $this->controller->backup. '/' .$file;
            @unlink($sqlfile);
        }        
        $this->controller->message('success', Yii::t('admin','Delete File Success'));
    }    
}