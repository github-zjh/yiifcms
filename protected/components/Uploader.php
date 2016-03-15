<?php
/**
 * 文件上传组件
 *
 * @author    Sim Zhao <326196998@qq.com>
 * @copyright 2015 All rights reserved.
 * 
 */
define('TEMP_PATH', UPLOAD_PATH . DS . 'temp');

class Uploader{    
    
    public  $watermark_pic = 'public/watermark.png';       //默认水印图片完整路径
    public  $real_name = '';                               //上传的原始文件名
    public  $file_id   = '';                               //文件ID
    public  $file_ext  = '';                               //文件扩展名   
    public  $file_path = '';                               //存到数据中的路径
    public  $save_path = '';                               //生成的文件路径(带文件名的完整路径)
    public  $file_name = '';                               //生成的文件名
    public  $model = '';                                   //上传文件模型
    public  $total_size  = 0;                              //总文件大小
    public  $thumb_prefix = 'small_';                      //缩略图前缀
    public  $thumb_save_path = '';                         //生成缩略图文件路径(带文件名的完整路径)
    public  $thumb_path = '';                              //存到数据中的缩略图路径
    public  $thumb_name = '';                              //生成缩略图文件名
    
    private $_chunk_dir  = '';                             //断点片段文件保存目录
    private $_chunk_size = 1024;                           //断点续传片段大小(1M)
    private $_chunk_num  = 1;                              //当前片段编号
	private $_error = '';                                  //错误信息
    

    public $config = array(
        //文章
        'post' => array(            
            'save_path'           => 'post',                //保存路径
            'allow_ext'           => 'jpg,gif,png,bmp,jpeg',    //允许类型 *代表所有
            'max_upload_filesize' => 2097152000,               //允许最大上传大小2M
            'make_thumb'          => true,                  //是否生成缩略图
            'make_watermark'      => false,                 //是否添加水印
            'rand_name'           => true,                  //是否随机生成文件名
            'thumb_width'         => 150,                   //缩略图宽度
            'thumb_height'        => 150                    //缩略图高度
        ),
        //图集
        'album' => array(            
            'save_path'           => 'album',               //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M
            'make_thumb'          => true,                  //是否生成缩略图
            'rand_name'           => true,                  //是否随机生成文件名
            'thumb_width'         => 300,                   //缩略图宽度
            'thumb_height'        => 300                    //缩略图高度
        ),
        //软件封面
        'softimg' => array(            
            'save_path'           => 'soft',                //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小500M  
        ),
        //软件
        'soft' => array(            
            'save_path'           => 'soft',                //保存路径
            'allow_ext'           => '*',                   //允许类型  *代表所有
            'rand_name'           => false,                 //是否随机生成文件名
            'max_upload_filesize' => 512000000,             //允许最大上传大小500M            
        ),        
        //视频封面
        'videoimg' => array(            
            'save_path'           => 'video',               //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        
        //视频
        'video' => array(            
            'save_path'           => 'video',                   //保存路径
            'allow_ext'           => 'mp4,avi,rmvb,flv,mkv',    //允许类型  *代表所有
            'rand_name'           => false,                     //是否随机生成文件名
            'max_upload_filesize' => 1258291200,                //允许最大上传大小1.2G            
        ),
        
        //KindEditor
        'kindeditor' => array(            
            'save_path'           => 'kindeditor',          //保存路径
            'allow_ext'           => '*',                   //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M           
        ),
        
        //专题封面
        'specialcover' => array(            
            'save_path'           => 'special',             //保存路径
            'allow_ext'           => 'jpg,jpeg,png',        //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        //专题横幅
        'specialbanner' => array(            
            'save_path'           => 'special',             //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        
        //广告图片
        'ad' => array(            
            'save_path'           => 'ad',                  //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        //友情链接logo
        'link' => array(            
            'save_path'           => 'link',                //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M            
        ),
        //头像
        'avatar' => array(            
            'save_path'           => 'avatar',              //保存路径
            'allow_ext'           => 'jpg,jpeg,png,gif',    //允许类型  *代表所有
            'rand_name'           => true,                  //是否随机生成文件名
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M
            'make_thumb'          => true,                  //是否生成缩略图
            'thumb_width'         => 300,                   //缩略图宽度
            'thumb_height'        => 300                    //缩略图高度
        ),
        //采集的图片
        'spider' => array(
            'save_path'          => 'spider',
            'allow_ext'          => 'jpg,jpeg,png,gif',
            'rand_name'          => true,
            'make_thumb'         => true,
            'thumb_width'        => 300,
            'thumb_height'       => 300,
            'max_upload_filesize' => 2097152,               //允许最大上传大小2M
        ),
    );  
    
    /**
     * 初始化普通上传参数
     * 
     * @param type $model
     * @return \Uploader
     */
    public function initSimple($model = '')
    {
        //文件模型名
        $this->model = $model;        
        return $this;
    }
    
    /**
     * 普通上传开始
     * 
     * @param string $name 文件流名称
     * @return boolean
     */
    public function uploadSimple($name = '')
    {
        if(isset($this->config[$this->model])) {
            
            //获取一个上传实例
            $ins = CUploadedFile::getInstanceByName($name);
            if(!$ins) {
                $this->setError('please select a file');
                return false;
            }
            if($ins->getHasError()) {
                $this->setError('Upload Failed, Please Check Service Config.');
                return false;
            }
            //上传文件基本信息
            $this->file_ext     = Helper::getExtensionName($ins->name);
            $this->total_size   = $ins->size;
            $this->real_name    = $ins->name;
            
            //验证文件合法性
            $check = $this->_checkValid();
            if($check) {
                //保存文件
                $this->_getSavePath();                
                if($ins->saveAs($this->save_path)){
                    //生成缩略图
                    $this->makeThumb();
                    return true;
                } else {
                    $this->setError('Upload Failed, Can not MoveUp Tmp File.');            
                    return false;
                }                 
            }
        } else {
            $this->setError('invalid upload model');            
            return false;
        }
    }
       
    /**
     * 初始化断点续传参数
     * 
     * @return \Uploader
     */
    public function initResumable($model = '')
    {
        //文件模型名
        $this->model = $model;
        //文件ID
        $this->file_id      = Yii::app()->request->getParam('resumableIdentifier');
        //原始文件名
        $this->real_name    = Yii::app()->request->getParam('resumableFilename');
        //文件总大小
        $this->total_size   = Yii::app()->request->getParam('resumableTotalSize');
        //文件扩展名
        $this->file_ext     = Helper::getExtensionName($this->real_name);        
        //当前片段编号
        $this->_chunk_num   =  Yii::app()->request->getParam('resumableChunkNumber');
        //每个片段大小
        $this->_chunk_size  =  Yii::app()->request->getParam('resumableChunkSize');
        return $this;
    }
    
    /**
     * 断点上传文件
     * 
     * @param string $name 文件流名称    
     * @return boolean
     */
    public function uploadResumable($name = '')
    {
        if(isset($this->config[$this->model])) {
            
            //获取一个上传实例
            $ins = CUploadedFile::getInstanceByName($name);
            if(!$ins) {
                $this->setError('please select a file');
                return false;
            }
            if($ins->getHasError()) {
                $this->setError('Upload Failed, Please Check Service Config.');
                return false;
            }
            //验证文件合法性
            $check = $this->_checkValid();
            if($check) {
                //断点片段文件保存目录
                $this->_chunk_dir   = $this->_getChunkDir($this->file_id);
                //保存片段文件
                $conver_filename = $this->_convertChineseName($this->real_name);
                $ins->saveAs($this->_chunk_dir . DS . $conver_filename. '.part'.$this->_chunk_num);                
                //完整的保存路径
                $this->_getSavePath();                
                //校验片段文件 并把片段文件合并成一个文件
                $this->createFileFromChunks($this->save_path);
                return true;
            }
            return false;
        } else {
            $this->setError('invalid upload model');            
            return false;
        }
    }
    
    /**
     * 获取保存路径 并创建相应的目录
     * 
     * @param bool $thumb  true表示 带缩略图路径
     */
    private function _getSavePath()
    {   
        //保存文件的物理路径
        $save_dir = UPLOAD_PATH . DS .$this->config[$this->model]['save_path'] . DS . date('Ym',time());        
        if(!is_dir($save_dir)){
            mkdir($save_dir, 0777, true);
        }        
        //是否生成随机名
        if(isset($this->config[$this->model]['rand_name']) && $this->config[$this->model]['rand_name'])
        {
            $this->file_name = substr(md5(uniqid('file')), 0,11). '.'.$this->file_ext;            
        } else {            
            $this->file_name = $this->real_name;            
        }        
        //包含文件名的完整物理路径
        $tmp_save_path = $save_dir . DS . $this->file_name;
        $this->save_path = $this->_convertChineseName($tmp_save_path);
        //存储到数据库的文件路径 并转化编码
        $this->file_path = ltrim(Helper::safeEncoding(str_replace(array('\\', '\\\\'), '/', str_replace(ROOT_PATH, '', $tmp_save_path))), '\/');        
        
        //缩略图路径
        if(isset($this->config[$this->model]['make_thumb']) && $this->config[$this->model]['make_thumb']) {
            $this->thumb_name  = $this->thumb_prefix. $this->file_name;
            $tmp_thumb_save_path = $save_dir. DS . $this->thumb_name;
            $this->thumb_save_path =  $this->_convertChineseName($tmp_thumb_save_path);        
            $this->thumb_path = ltrim(Helper::safeEncoding(str_replace(array('\\', '\\\\'), '/', str_replace(ROOT_PATH, '', $tmp_thumb_save_path))), '\/');        
        }
        return true;
    }
    
    /**
	 * 取得图像信息
	 * @static
	 * @access public
	 * @param string $img 图像文件名
	 * @return mixed
	 */	
	public static function getImageInfo($img) {
		$imageInfo = @getimagesize($img);
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
	 * 生成缩略图
	 * @return boolean
	 */
	public function makeThumb(){
        if($this->thumb_save_path) {
            //缩略图尺寸
			$width = isset($this->config[$this->model]['thumb_width']) ? $this->config[$this->model]['thumb_width'] : 0;
			$height = isset($this->config[$this->model]['thumb_height']) ? $this->config[$this->model]['thumb_height'] : 0;
			
            //上传图片的尺寸
			$imageinfo = $this->getImageInfo($this->save_path);
            if(!$imageinfo) {
                throw new Exception('文件路径不存在:'.$this->save_path);
            }
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
				$im = imagecreatefromgif($this->save_path); /* Attempt to open */
				$outfun = 'imagegif';
			} elseif($mime == 'image/png' ){
				$im = imagecreatefrompng($this->save_path); /* Attempt to open */
				$outfun = 'imagepng';
			} else{
				$im = imagecreatefromjpeg($this->save_path); /* Attempt to open */
				$outfun = 'imagejpeg';
			}
            $copy = false;
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
			//保存缩略图
			$outfun($bgimg, $this->thumb_save_path);			
			imagedestroy($bgimg);			
			return true;
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
				$this->_error = 'Watermark image is not found';
				return false;
			}
			//return true;
		}else{
			$this->_error = 'Add watermark failed';
			return false;
		}
		return true;
	}
    
    /**
     * 裁剪图片
     * 
     * @param string $image   //原图
     * @param array $params = [
     *      'cut_w' => 100,    //剪切的宽度
     *      'cut_h' => 100,    //剪切的高度
     *      'pos_x' => 0,      //剪切的x坐标
     *      'pos_y' => 0,      //剪切的y坐标
     *      
     * ]
     * @return $cut_image    //剪切后的图片路径
     */
    public function imageCut($image = '', $params = array())
    {                
        $filename = ROOT_PATH . '/'. $image;         	
        $image_info = self::getImageInfo($filename);
        //带扩展名的文件名称
        $basename = pathinfo($filename, PATHINFO_BASENAME);
        $save_dirname = pathinfo($filename, PATHINFO_DIRNAME);
        $ret_dirname = pathinfo($image, PATHINFO_DIRNAME);
        $cut_image_name = 'cut_'.$basename;
        $cut_image_save_path = $save_dirname . '/' . $cut_image_name;
        $cut_image = $ret_dirname . '/' . $cut_image_name;
        if(file_exists($filename)){
            //上传成功后剪切
            $mime = strtolower($image_info['mime']);		    	
            if($mime == 'image/gif' ){
                $im = imagecreatefromgif($filename); /* Attempt to open */
                $outfun = 'imagegif';
            } elseif($mime == 'image/png' ){
                $im = imagecreatefrompng($filename); /* Attempt to open */
                $outfun = 'imagepng';
            } else{
                $im = imagecreatefromjpeg($filename); /* Attempt to open */
                $outfun = 'imagejpeg';
            }
            $bgimg = ImageCreateTrueColor( $params['cut_w'], $params['cut_h'] );
            $white = imagecolorallocate($bgimg, 255, 255, 255);
            //填充背景色为白色
            imagefill($bgimg,0,0,$white);		    	
            imagecopy($bgimg, $im, 0, 0, $params['pos_x'], $params['pos_y'], $params['cut_w'], $params['cut_h']);                        		    	
            //输出图片
            $outfun($bgimg, $cut_image_save_path);
            imagedestroy($bgimg);            
        }
        return $cut_image;
    }
	
	/**
	 * 删除文件
	 * @param string $filename
	 */
	public static function deleteFile($filename = ''){
        $filename = ROOT_PATH . '/' . ltrim($filename, '\/');
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
     * 
	 * @param string $model
	 * @return boolean
	 */
	private function _checkValid(){        
        //文件类型不合法
        $allow_ext =  $this->config[$this->model]['allow_ext'];
        if($allow_ext != '*') {
            $allow_ext = explode(',', $allow_ext);        
            if(!in_array($this->file_ext, $allow_ext)){
                $this->setError('file type is error, please upload a legal file');
                return false;
            }
        }
        //文件大小超出限制
        if($this->total_size > $this->config[$this->model]['max_upload_filesize']) {
            $this->setError('file size is too large');
            return false;
        }		
		return true;
	}	
    
    /**
     * 设置上传错误信息
     * 
     * @param string $msg
     */
    public function setError($msg = '')
    {
        $this->_error = Yii::t('upload' , $msg);
        return true;
    }
    
    /**
     * 获取上传错误信息
     * 
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }
    
	/**
     *
     * 合并片段文件到目标文件 
     * 
     * @param string $file_path  保存的完整文件路径
     * 
     */
    public function createFileFromChunks($file_path = '') 
    {        
        //检查片段文件数
        $total_files = 0;       
        foreach (scandir($this->_chunk_dir) as $file) {
            $file = Helper::safeEncoding($file, 'UTF-8');                      
            if (stripos($file, $this->real_name) !== false) {
                $total_files++;
            }
        }
       
        //检查片段文件是否上传完整
        //最后一个上传的片段文件大小应介于1-2个片段大小
        //最终生成一个完整的文件
        if ($total_files * $this->_chunk_size >= ($this->total_size - $this->_chunk_size + 1)) {            
            if (($fp = fopen($file_path, 'w')) !== false) {
                for ($i = 1; $i <= $total_files; $i++) {
                    $convert_name = $this->_convertChineseName($this->real_name);
                    fwrite($fp, file_get_contents($this->_chunk_dir . DS . $convert_name .'.part' . $i));
                }                
                fclose($fp);                
            } else {                
                $msg = 'cannot create the destination file';
                $this->setError($msg);                
                return false;
            }
            //删除临时存放目录            
            Helper::rrmdir($this->_chunk_dir);
        }        
    }
    
    /**
     * 检查片段文件是否已上传
     * 
     */
    public function checkExistChunks()
    {
        $file_id      = Yii::app()->request->getParam('resumableIdentifier');
        $file_name    = Yii::app()->request->getParam('resumableFilename');
        $chunk_number = Yii::app()->request->getParam('resumableChunkNumber');        
        $temp_dir     = $this->_getChunkDir($file_id, false);
        $convert_name = $this->_convertChineseName($file_name);
        $chunk_file   =  str_replace(array('\\', '\\\\'), '/', $temp_dir .DS. $convert_name.'.part'.$chunk_number);        
        if (file_exists($chunk_file)) {            
            header("HTTP/1.0 200 Ok");
        } else {
            header("HTTP/1.0 404 Not Found");
        }        
    }
    
    /**
     * 转换中文文件名
     * 
     * @param type $name
     * @return type
     */
    private function _convertChineseName($name = '') 
    {
        return Helper::getOS() == 'Windows' ? Helper::safeEncoding($name, 'GB2312') : $name;
    }
    
    /**
     * 获取片段保存目录
     * 
     * @param $makedir
     * @return string
     */
    private function _getChunkDir($file_id = '', $makedir = true)
    {        
        $temp_dir = TEMP_PATH . DS . $file_id;
        if(!is_dir($temp_dir) && $makedir){
            mkdir($temp_dir, 0777, true);
        }
        return $temp_dir;        
    }
    
    /**
     * 供外部获取保存路径
     * 
     */
    public function getSavePathFromRemote()
    {
        $this->_getSavePath();
    }
}
