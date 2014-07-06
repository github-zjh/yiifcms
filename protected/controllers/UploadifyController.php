<?php
/**
 * 多文件上传控制器
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved.
 *  
 */

class UploadifyController extends FrontBase
{	   

    /**
     * 上传图片
     */
    public function actionIndex() {     
        if (Yii::app()->request->isPostRequest) {
            $adminiUserId = Yii::app()->user->id;  
            $file = new Uploader;
            $thumb = false;
            if($this->_request->getParam('from') == 'editor'){
            	//从外部编辑器上传的图片
            	$outside = 'Y';
            	$file->_image_path = 'uploads/attached/'.$this->_request->getParam('dir').'/';
            }else{
            	$this->_request->getParam('thumb') && $thumb = true;
            	$dir = $this->_request->getParam('dir');
            	$dir && $file->_image_path = 'uploads/'.$dir.'/';
            	$thumb && $dir && $file->_thumb_path = 'uploads/'.$dir.'/';
            	switch($dir){
            		case 'avatar':
            			$file->_thumb_height=100;
            			$file->_thumb_width=100;
            			break;
            	}
            	
            }          
            
            if(is_array($_FILES['imgFile']) && !empty($_FILES['imgFile'])){
            	foreach($_FILES['imgFile'] as $value){
            		if(is_array($value)){
            			$files = $_FILES['imgFile'];
            		}else{
            			$files = array($_FILES['imgFile']);
            		}
            		break;
            	}
            }else{
            	exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Please select a file.') ) ) );
            }  
            foreach($files as $simplefile){
            	$file->uploadFile($simplefile,$thumb);
            	if($file->_error){            		
            		exit( CJSON::encode( array ( 'status' => 'error' , 'message' => Yii::t('admin',$file->_error) ) ) );
            	}else{
            		$model = new Upload();
            		$model->user_id = intval( $adminiUserId );
            		$model->file_name = $file->_file_name;
            		$model->thumb_name = $file->_thumb_name;
            		$model->real_name = $file->_real_name;
            		$model->file_ext = $file->_file_ext;
            		$model->file_mime = $file->_mime_type;
            		$model->file_size = $file->_file_size;
            		$model->create_time = time();            		
            		if ( $model->save() ) {
            			if($outside == 'Y'){
            				exit(CJSON::encode(array ('error' => 0 , 'url' => Yii::app()->baseUrl . '/' . $file->_file_name )));
            			}else{            				
            				exit( CJSON::encode( array ( 'state' => 'success' , 'fileId'=>$model->id, 'realFile'=>$model->real_name, 'message' => Yii::t('admin','Upload Success') , 'file' =>  $model->file_name, 'thumb' =>  $model->thumb_name ) ) );
            			}
            		} else {
            			$file->deleteFile($file->_file_name);
            			$file->deleteFile($file->_thumb_name);
            			if($outside == 'Y'){
            				exit(CJSON::encode(array ('error' => 1 , 'message' => Yii::t('admin','Save failed, Upload error') )));
            			}else{
            				exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Save failed, Upload error') ) ) );
            			}
            		}
            		
            	}
            }            	
            
        }
    }      

    /**
     * 上传头像
     */
    public function actionAvatar() {
    	if (Yii::app()->request->isPostRequest) {    		
    		$file = new Uploader;    		
    		$dir = 'avatar';
			$file->_image_path = 'uploads/' . $dir . '/';	
			$file->_thumb_path = 'uploads/' . $dir . '/';
    		if(is_array($_FILES['avatar']) && !empty($_FILES['avatar'])){    			
    			$file->uploadFile($_FILES['avatar'],true);
    			if($file->_error){    				
    				$file->deleteFile($file->_thumb_name);
    				exit( CJSON::encode( array ( 'status' => 'error' , 'message' => Yii::t('admin',$file->_error) ) ) );
    			}else{    			
    				$uid = Yii::app()->user->id;
    				$file->deleteFile($file->_file_name);        			
    				list($basepath_1, $basepath_2, $basepath_3, $basename) = explode('/',$file->_file_name);     				
    				$basepath = $basepath_1.'/'.$basepath_2.'/'.$basepath_3;
    				$old_file_name = $basepath.'/'.$uid.'_old_'.$basename;    				
    				@rename($file->_thumb_name, $old_file_name); //删除大图保留缩略图,并重命名
    				exit( CJSON::encode( array ( 'state' => 'success' , 'message' => Yii::t('admin','Upload Success') , 'file' => $old_file_name)));
    			}    			
    		}else{
    			exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Please select a file.') ) ) );
    		}    		
    
    	}
    }
    /**
     * 提交剪切
     * 
     */
    public function actionSubmitCut(){
    	if (Yii::app()->request->isPostRequest) {
    		//接收缩略图
	    	$filename = $_POST['file'];  
	    	//MIME TYPE  	
	    	$image_info = Uploader::getImageInfo($filename);
	    	$pathinfo = pathinfo($filename);
	    	//带扩展名的文件名称
	    	$basename = $pathinfo['basename'];
	    	 	
	    	if(file_exists($filename)){
		    	//上传成功后剪切
		    	$mime = strtolower($image_info['mime']);		    	
		    	if($mime == 'image/gif' ){
		    		$im = @imagecreatefromgif($filename); /* Attempt to open */
		    		$outfun = 'imagegif';
		    	} elseif($mime == 'image/png' ){
		    		$im = @imagecreatefrompng($filename); /* Attempt to open */
		    		$outfun = 'imagepng';
		    	} else{
		    		$im = @imagecreatefromjpeg($filename); /* Attempt to open */
		    		$outfun = 'imagejpeg';
		    	}
		    	$bgimg = ImageCreateTrueColor( 100, 100 );
		    	$white = imagecolorallocate($bgimg, 255, 255, 255);
		    	//填充背景色为白色
		    	imagefill($bgimg,0,0,$white);		    	
		    	imagecopyresampled($bgimg,$im,0,0,$_POST['x'],$_POST['y'],100,100,$_POST['w'],$_POST['h']);	 
		    	$uid = Yii::app()->user->id;
		    	$avatar_path = 'uploads/avatar/'.date('Ym');
		    	if(!is_dir($avatar_path)){
		    		mkdir($avatar_path, 0777, true);
		    	}
		    	$avatar_path .= '/small_'.$basename;		    	
		    	//输出图片
		    	$outfun($bgimg, $avatar_path);
		    	imagedestroy($bgimg);
		    	exit( CJSON::encode( array ( 'state' => 'success' , 'message' => Yii::t('admin','Upload Success') , 'avatar' => $avatar_path)));
	    	}else{
	    		exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Please select a file.'))));
	    	}
    	}else{
    		exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Please select a file.'))));
    	}
    }
    
    /**
     * 上传文件(单个不能超过50M)
     */
    public function actionFile() {     	
    	if ( $this->method() == 'POST' ) {
    		$adminiUserId = Yii::app()->user->id;
    		$file = new Uploader;    
    		$file->_allow_exts = 'pdf,doc,docx,xls,ppt,exe,zip,tar,gz,msi,7z';  //普通文件类型限制
    		$file->_allow_exts .= ',mp3,mp4,wma';   //音频文件
    		$file->_allow_exts .= ',swf,mv,avi,mp4,flv,rmvb,mov,asf,wmv,3GP,ra,rm';   //视频文件
    		$file->_rand_name = false;                   //用原来的名称
    		
    		if(is_array($_FILES['file']) && !empty($_FILES['file'])){
    			foreach($_FILES['file'] as $value){    				
    				if(is_array($value)){
    					$files = $_FILES['file'];
    				}else{
    					$files = array($_FILES['file']);
    				}
    				break;
    			}
    		}else{
    			exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin','Please select a file.') ) ) );
    		}    
    		foreach($files as $simplefile){    			
    			$file->uploadFile($simplefile);    		    			
    			if($file->_error){
    				exit( CJSON::encode( array ( 'state' => 'error' , 'message' => Yii::t('admin',$file->_error) ) ) );
    			}else{
    				$model = new Upload();
    				$model->user_id = intval( $adminiUserId );
    				$model->file_name = $file->_file_name;
    				$model->thumb_name = $file->_thumb_name;
    				$model->real_name = $file->_real_name;
    				$model->file_ext = $file->_file_ext;
    				$model->file_mime = $file->_mime_type;
    				$model->file_size = $file->_file_size;
    				$model->create_time = time();    			
    				if ( $model->save() ) {    
    					exit(CJSON::encode(array ( 'state' => 'success' , 'realname' => $file->_real_name,'fileId'=> $model->id)));
    				} else {    				
    					$file->deleteFile($file->_file_name);    				
    					exit(CJSON::encode(array ( 'state' => 'error' , 'message' => Yii::t('admin','Save failed, Upload error') )));
    				}
    
    			}
    		}
    
    	}
    }    

    
}
