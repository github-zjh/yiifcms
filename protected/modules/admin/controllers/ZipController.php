<?php
/**
 * 文件打包下载
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class ZipController extends Backend
{		
    /**
     * 程序文件列表
     */
    public function actionIndex ()
    {   
    	if(Yii::app()->request->isPostRequest){
    		$files = Yii::app()->request->getParam('id');            
    		if($files){
	    		//提交打包
	    		$zip = new ZipArchive();
	    		$name = 'yiifcmsBAK_'.date('YmdHis',time()).'.zip';
	    		$zipname = ROOT_PATH.'/'.$name;                
	    		//创建一个空的zip文件
	    		if($zip->open($zipname, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE)){	    			    			
	    			foreach($files as $file){                        
	    				if(is_dir($file)){
	    					//递归检索文件
	    					$allfiles = Helper::scanfDir($file,true);
	    					foreach($allfiles['files'] as $v){
	    						$zip->addFile(ROOT_PATH.'/'.$v, $v);
	    					} 
	    				}else{
	    					$zip->addFile(ROOT_PATH.'/'.$file, $file);
	    				}	    			
	    			}
                } else {
                    $this->message('error', 'An error occurred creating your ZIP file.');
                }
                $zip->close();
	    		Yii::app()->request->sendFile($name, file_get_contents($zipname),'',false);	    				   
                //下载完成后要进行删除
                @unlink($zipname);
    		}
    	} else {
            $all_files = Helper::scanfDir(ROOT_PATH);
			asort($all_files['dirs']);
			asort($all_files['files']);
	        $files = array_merge($all_files['dirs'], $all_files['files']);
	        $listfiles = array();       
	        
	        foreach($files as $file){        	
	            $tmpfilename = explode('/',$file); 
	            $filename = end($tmpfilename);   
	        	if(is_dir($file)){        		
	        		$allfiles = Helper::scanfDir($file, true);	        		
	        		if($allfiles['files']){  
	        			$filesize = 0;      			
	        			foreach( $allfiles['files'] as $val){
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
            $this->render('index', array ('listfiles' => $listfiles ));
    	}
    }

}
