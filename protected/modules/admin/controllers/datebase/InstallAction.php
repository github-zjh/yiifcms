<?php
/**
 *  安装测试数据
 * 
 * @author  GoldHan.zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2016. All rights reserved.
 */

class InstallAction extends CAction
{	
	public function run(){
        if(Yii::app()->request->isPostRequest){
    		$testDataFile = ROOT_PATH.'/protected/data/temp/install_data.sql';
            $this->startInstall($testDataFile);    		
    	}else{
    		$this->controller->render('install');
    	}        
	}
    
    /**
     * 开始执行sql文件
     * 
     * @param string $file
     */
    protected  function startInstall($file = '')
    {        
        ini_set('max_execution_time', '3600');
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
            //打开缓冲区
            ob_start();
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
                    //Yii::app()->db->createCommand($sql)->execute();
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
}