<?php
/**
 * 文件打包下载
 * @author        Sim <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class ZipController extends Backend
{		
    /**
     * 程序文件列表
     */
    public function actionIndex ()
    {   
    	if(isset($_POST['id'])){
    		$files = $_POST['id'];    		
    		if($files){
	    		//提交打包
	    		$zip = new ZipArchive();
	    		$name = 'yiifcmsBAK_'.date('YmdHis',time()).'.zip';
	    		$zipname = WWWPATH.'/'.$name;
	    		//创建一个空的zip文件
	    		if($zip->open($zipname,ZipArchive::OVERWRITE)){	    			    			
	    			foreach((array) $files as $file){	
	    				if(is_dir($file)){
	    					//递归检索文件
	    					$allfiles = Helper::scanfDir($file,true);
	    					foreach((array)$allfiles['files'] as $v){
	    						$zip->addFile(WWWPATH.'/'.$v, $v);
	    					} 
	    				}else{
	    					$zip->addFile(WWWPATH.'/'.$file, $file);
	    				}	    			
	    			}
	    			$zip->close();
	    			//开始下载
	    			Yii::app()->request->sendFile($name, file_get_contents($zipname),'',false);	    				   
	    			//下载完成后要进行删除
	    			@unlink($zipname);	    			
	    		}else{
	    			throw new CHttpException('404','Failed');
	    		}
    		}
    	}else{    		
	        $files = Helper::scanfDir(ROOT_PATH);
			asort($files['dirs']);
			asort($files['files']);
	        $files = array_merge($files['dirs'], $files['files']);
	        $listfiles = array();       
	        
	        foreach($files as $file){        	
	            $tmpfilename = explode('/',$file); 
	            $filename = end($tmpfilename);   
	        	if(is_dir($file)){        		
	        		$allfiles = Helper::scanfDir($file, true);	        		
	        		if($allfiles['files']){  
	        			$filesize = 0;      			
	        			foreach((array) $allfiles['files'] as $val){
	        				$filesize += filesize($val);
	        			}        			
	        		}        	
	        		$listfiles[$filename]['type'] = 'dir';	        		
	        	}
	        	else{
	        		$filesize = filesize($file);  
	        		$listfiles[$filename]['type'] = 'file';
	        	}        	
	        	$listfiles[$filename]['id'] = $filename;
	        	$listfiles[$filename]['size'] = Helper::byteFormat($filesize);
	        	$listfiles[$filename]['update_time'] = filemtime($filename);
	        	        	
	        }     
    	}               
        $this->render('index', array ('listfiles' => $listfiles ));
    }

}
