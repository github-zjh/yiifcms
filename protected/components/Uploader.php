<?php
/**
 * 文件上传
 *
 * @author    Sim Zhao <326196998@qq.com>
 * @copyright 2015 All rights reserved.
 * 
 */
defined('TEMP_PATH', UPLOAD_PATH . DS . 'temp');

class Uploader{
    
    public $_watermark_pic = 'public/watermark.png';     		//默认水印图片完整路径    
	public $_error = '';
	
    public $config = array(
        //文章
        'post' => array(            
            'save_path'           => 'post',                //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型 *代表所有
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M
            'make_thumb'          => true,                  //是否生成缩略图
            'make_watermark'      => false,                 //是否添加水印
            'rand_name'           => true,                  //是否随机生成文件名
            'thumb_width'         => 300,                   //缩略图宽度
            'thumb_height'        => 300                    //缩略图高度
        ),
        //图集
        'album' => array(            
            'save_path'           => 'album',               //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M
            'make_thumb'          => true,                  //是否生成缩略图
            'thumb_width'         => 300,                   //缩略图宽度
            'thumb_height'        => 300                    //缩略图高度
        ),
        //软件
        'soft' => array(            
            'save_path'           => 'album',               //保存路径
            'allow_ext'           => '*',                   //允许类型  *代表所有
            'max_upload_filesize' => 1258291200,            //允许最大上传大小1.2G            
        ),
        //商品
        'goods' => array(            
            'save_path'           => 'goods',               //保存路径
            'allow_ext'           => 'jpg,jpeg,png',        //允许类型  *代表所有
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        //视频
        'video' => array(            
            'save_path'           => 'goods',               //保存路径
            'allow_ext'           => 'jpg,jpeg,png',        //允许类型  *代表所有
            'max_upload_filesize' => 1258291200,            //允许最大上传大小1.2G            
        ),
    );	
	
	/**
	 * 上传文件
	 * @param string $file          上传的文件
	 * @param string $save_path     保存的路径
	 * @param string $type
	 * @param boolean $thumb
	 * @param boolean $watermark
	 * @return boolean
	 */
	public function uploadFile($file = '', $thumb = false, $watermark = false){		
		if($this->checkUpload($file)){						
			//验证通过
			$real_thumb = false;
			$real_watermark = false;	
			if($this->_is_image){
				//如果是图片
				$save_path = $this->_image_path?$this->_image_path:'uploads';
				$real_thumb = $thumb;
				$real_watermark = $watermark;
			}else{	
				$save_path = $this->_file_path?$this->_file_path:'uploads';
			}	
			
			$save_path .= date('Ym',time()).'/';			
			$filename = $this->_rand_name?substr(md5(uniqid('file')), 0,11).'.'.$this->_file_ext:$this->_real_name; 				
			if(!is_dir($save_path)){
				mkdir($save_path, 0777, true);
			}
			$this->_file_name = $save_path .= $filename;				
			if($real_thumb){
				//生成缩略图
				$this->makeThumb($this->_tmp_name, $filename);						
			}
			if($real_watermark){
				//添加水印
				$this->waterMark($this->_tmp_name, $save_path);
			}else{						
				if(Helper::getOS()=='Linux'){					
					$mv = move_uploaded_file($this->_tmp_name, $save_path);
				}else{
					//解决windows下中文文件名乱码的问题					
					$save_path = Helper::safeEncoding($save_path,'GB2312');
					if(!$save_path){
						//转换失败
						$this->_error = 'File Names Contains doesnt recognize Chinese';
						return false;
					}					
					$mv = move_uploaded_file($this->_tmp_name, $save_path);
				}
				if(!$mv){					
					$this->_error = 'Upload Failed, Can not MoveUp Tmp File.';
					return false;
				}				
			}
			
			return true;
		}else{
			return false;
		}		
	}
	
	/**
	 * 生成缩略图
	 * @param string $filename
	 * @param string $width
	 * @param string $height
	 * @param string $quality
	 * @param string $savepath
	 * @return boolean
	 */
	function makeThumb($tmpname='' , $filename=''){
		if(file_exists($tmpname)){
			//缩略图尺寸
			$width = $this->_thumb_width;
			$height = $this->_thumb_height;
			//上传图片的尺寸
			$imageinfo = $this->getImageInfo($tmpname);
			$imagesize = $imageinfo['size'];
			$imagewidth = $imageinfo['width'];
			$imageheight = $imageinfo['height'];
			$mime = $imageinfo['mime'];
			//宽高比例
			$ratio = $imagewidth/$imageheight;
	
			//新建一个背景图片
			$bgimg = imagecreatetruecolor($width, $height);
			$white = imagecolorallocate($bgimg, 255, 255, 255);
			//填充背景色为白色
			imagefill($bgimg,0,0,$white);			
			if($mime == 'image/gif' ){
				$im = @imagecreatefromgif($tmpname); /* Attempt to open */
				$outfun = 'imagegif';
			} elseif($mime == 'image/png' ){
				$im = @imagecreatefrompng($tmpname); /* Attempt to open */
				$outfun = 'imagepng';
			} else{
				$im = @imagecreatefromjpeg($tmpname); /* Attempt to open */
				$outfun = 'imagejpeg';
			}
	
			if($ratio > 1){
				//宽度较大
				if($imagewidth > $width){
					//缩放图片到背景图片上
					$new_width = $width;
					$new_height = ($width*$imageheight)/$imagewidth;
					$bg_y = ceil(abs(($height-$new_height)/2));
					imagecopyresampled($bgimg, $im, 0, $bg_y, 0, 0, $new_width, $new_height, $imagewidth, $imageheight);
				} else{
					//复制图片到背景图片上
					$copy = true;
				}
			} else{
				//高度较大
				if($imageheight > $height){
					//缩放图片
					$new_height = $height;
					$new_width = ($height*$imagewidth)/$imageheight;
					$bg_x = ceil(($width-$new_width)/2);
					imagecopyresampled($bgimg, $im, $bg_x, 0, 0, 0, $new_width, $new_height, $imagewidth, $imageheight);
				} else{
					//复制图片到背景图片上
					$copy = true;
				}
			}
			if($copy){
				//复制图片到背景图片上
				$bg_x = ceil(($width-$imagewidth)/2);
				$bg_y = ceil(($height-$imageheight)/2);
				imagecopy($bgimg, $im, $bg_x, $bg_y, 0, 0, $imagewidth, $imageheight);
			}		
			
			//保存路径			
			$savepath = $this->_thumb_path?$this->_thumb_path:'uploads';	
			$savepath .= date('Ym',time()).'/';
			if(!is_dir($savepath)){
				mkdir($savepath, 0777, true);
			}
			//生成缩略图文件名
			$filename || $filename = substr(md5(uniqid('file')), 0,11).'.'.$this->_file_ext;			
			$this->_thumb_name = $savepath.$this->_thumb_prefix.$filename;
			$outfun($bgimg, $this->_thumb_name);			
			imagedestroy($bgimg);			
			return true;
		} else{
			$this->_error = 'Make thumb is failed.';
			return false;
		}
	}	
	
	/**
	 * 添加水印
	 * @param string $tmpname    源文件
	 * @param string $savename   保存路径及文件名
	 * @param number $alpha      水印的透明度
	 * @return boolean
	 */
	public function waterMark($tmpname = '', $savename = '', $alpha = ''){
		if(file_exists($tmpname)){
			if(file_exists($this->_watermark_pic) && $this->_watermark_status == 'open'){
				$imageinfo = $this->getImageInfo($tmpname);
				$waterinfo = $this->getImageInfo($this->_watermark_pic);
				if(($imageinfo['width'] < $waterinfo['width']) || ($imageinfo['height'] < $waterinfo['height'])){
					//图片过小，不添加水印
					move_uploaded_file($tmpname, $savename);
				}else{
					$imgFun = 'imagecreatefrom'.$imageinfo['type'];
					$waterFun = 'imagecreatefrom'.$waterinfo['type'];
					$sImg = $imgFun($tmpname);
					$wImg = $waterFun($this->_watermark_pic);					
					//默认水印为右下角右对齐
					$posY = $imageinfo["height"] - $waterinfo["height"];
					$posX = $imageinfo["width"] - $waterinfo["width"];
					//不缩放水印图片
					$alpha = intval($alpha)>0?intval($alpha):$this->_watermark_alpha;
					imagecopymerge($sImg, $wImg, $posX, $posY, 0, 0, $waterinfo["width"], $waterinfo["height"], $alpha);
					$saveFun = 'image'.$imageinfo['type'];
					$saveFun($sImg, $savename);
					imagedestroy($sImg);					
				}
			}else{
				//$this->_error = 'Watermark image is not found';
				//return false;
			}
			//return true;
		}else{
			//$this->_error = 'Add watermark failed';
			//return false;
		}
		return true;
	}
	
	/**
	 * 删除文件
	 * @param string $filename
	 */
	public static function deleteFile($filename = ''){
		if(Helper::getOS()=='Windows'){
			//解决windows下中文文件名乱码的问题
			$filename = iconv("UTF-8", "GB2312", $filename);			
		}		
		if($filename && file_exists($filename) && !is_dir($filename)){			
			unlink($filename);			
		}
	}
	/**
	 * 校验上传文件是否符合要求(包括文件类型、大小)
	 * @param string $file
	 * @param string $name
	 * @param string $type
	 * @return boolean
	 */
	public function checkUpload($file = ''){	
		if($file && $file['error'] == UPLOAD_ERR_OK){			
			$this->_tmp_name = $file['tmp_name'];
			$this->_real_name = $file['name'];
			$this->_file_ext = $this->getExt($file['name']);
			$this->_mime_type = $file['type'];
			$this->_file_size = $file['size'];				
			if(in_array($this->_file_ext, array('bmp', 'png','jpg','jgeg','gif'))){
				$this->_is_image = true;
			}
			
			if(!in_array($this->_file_ext, explode(',',$this->_allow_exts))){
				//校验文件类型
				$this->_error = 'File type is error, Please upload a legal file.';
				return false;
			}elseif($file['size'] > $this->_max_upload_filesize){
				//文件大小超出限制				
				$this->_error = 'File size is too large.';
				return false;
			}else{				
				if(!is_uploaded_file($this->_tmp_name)){
					//非法上传
					$this->_error = 'File source is Invalid.';
					return false;
				}				
			}
			
		}else{
			//尚未选择文件
			$this->_error = 'Please select a file.';
			return false;
		}
		return true;
	}
	
	/**
	 * 取得上传文件的后缀
	 * @access private
	 * @param string $realname 文件名
	 * @return boolean
	 */
	private function getExt($realname) {		
		$pathinfo = pathinfo($realname);
		return strtolower($pathinfo['extension']);
	}
	
	/**
	 * 取得图像信息
	 * @static
	 * @access public
	 * @param string $img 图像文件名
	 * @return mixed
	 */	
	public static function getImageInfo($img) {
		$imageInfo = getimagesize($img);
		if ($imageInfo !== false) {
			$imageType = strtolower(substr(image_type_to_extension($imageInfo[2]), 1));
			$imageSize = filesize($img);
			$info = array(
					"width" => $imageInfo[0],
					"height" => $imageInfo[1],
					"type" => $imageType,
					"size" => $imageSize,
					"mime" => $imageInfo['mime']
			);
			return $info;
		} else {
			return false;
		}
	}
    
	/**
     *
     * 合并片段文件到目标文件 
     * 
     * @param string $temp_dir  片段文件 存放目录
     * @param string $fileName  保存的文件名
     * @param string $chunkSize 每片段文件大小(单位:字节)
     * @param string $totalSize 总共文件大小(单位字节)
     */
    public function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {
        
        //检查片段文件数
        $total_files = 0;
        foreach (scandir($temp_dir) as $file) {
            if (stripos($file, $fileName) !== false) {
                $total_files++;
            }
        }

        //检查片段文件是否上传完整
        //最后一个上传的片段文件大小应介于1-2个片段大小
        //最终生成一个完整的文件
        if ($total_files * $chunkSize >= ($totalSize - $chunkSize + 1)) {            
            if (($fp = fopen(TEMP_PATH . $fileName, 'w')) !== false) {
                for ($i = 1; $i <= $total_files; $i++) {
                    fwrite($fp, file_get_contents($temp_dir . $fileName . '.part' . $i));                    
                    $this->_log('write chunks' . $i);
                }
                fclose($fp);
            } else {
                $this->_log('cannot create the destination file');
                return false;
            }
            //删除临时存放目录
            Helper::rrmdir($temp_dir);           
        }
    }
    
    /**
     * 检查片段文件是否已上传
     * 
     */
    public function checkExistChunks()
    {
        $id           = Yii::app()->request->getParam('resumableIdentifier');
        $file_name    = Yii::app()->request->getParam('resumableFilename');
        $chunk_number = Yii::app()->request->getParam('resumableChunkNumber');
        $temp_dir = TEMP_PATH . $id;
        $chunk_file = $temp_dir .DS. $file_name.'.part'.$chunk_number;       
        if (file_exists($chunk_file)) {
            header("HTTP/1.0 200 Ok");
        } else {
            header("HTTP/1.0 404 Not Found");
        }        
    }
    
    /**
     * 记录普通日志信息
     * 
     * @param string $msg
     */
    private function _log($msg = '')
    {
        Yii::log($msg,'info', 'upload');
    }		
}
