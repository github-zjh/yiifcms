<?php
/**
 * Ueditor编辑器文件处理控制器
 * 
 * @author        Sim <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class UeditorController extends Backend
{		
	
    /**
     * 操作处理
     */
    public function actionIndex ()
    {        
    	$ueditor_widget = $this->_widgetPath."/ueditor";
		
		//编辑器上传配置
		$uploads_path = $this->_baseUrl.'/uploads';
		$uploads_images = $uploads_path.'/images/{yyyy}{mm}';
		$uploads_files = $uploads_path.'/files/{yyyy}{mm}';
		$CONFIG = array (
  				//上传图片配置
				'imageActionName' => 'uploadimage',
  				'imageFieldName' => 'upfile',
  				'imageMaxSize' => 2048000,
  				'imageAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp'),
	    		'imageCompressEnable' => true,
			  	'imageCompressBorder' => 800, /* 图片压缩最长边限制 */
			  	'imageInsertAlign' => 'none',
			  	'imageUrlPrefix' => '',
			  	'imagePathFormat' => $uploads_images.'/{time}{rand:6}',
				'imageDelUrl' => $this->createUrl('uploadify/ajaxDel'), //在线图片管理删除操作请求url
			  	
				//涂鸦图片上传配置
				'scrawlActionName' => 'uploadscrawl',
			  	'scrawlFieldName' => 'upfile',
			 	'scrawlPathFormat' => $uploads_images.'/{time}{rand:6}',
			  	'scrawlMaxSize' => 2048000,
			  	'scrawlUrlPrefix' => '',
			  	'scrawlInsertAlign' => 'none',
			  	
				//截图工具上传
				'snapscreenActionName' => 'uploadimage',
			  	'snapscreenPathFormat' => $uploads_images.'/{time}{rand:6}',
			  	'snapscreenUrlPrefix' => '',
			  	'snapscreenInsertAlign' => 'none',
			  	
			  	//抓取远程图片配置
			  	'catcherLocalDomain' =>array ( '127.0.0.1','localhost','img.baidu.com'),
			  	'catcherActionName' => 'catchimage',
			  	'catcherFieldName' => 'source',
			  	'catcherPathFormat' => $uploads_images.'/{time}{rand:6}',
			  	'catcherUrlPrefix' => '',
			  	'catcherMaxSize' => 2048000, //2M, 单位B
			  	'catcherAllowFiles' =>array ('.png','.jpg','.jpeg','.gif','.bmp'),
			  	
			  	//上传视频配置
			  	'videoActionName' => 'uploadvideo',
			  	'videoFieldName' => 'upfile',
			  	'videoPathFormat' => $uploads_images.'/{time}{rand:6}',
			  	'videoUrlPrefix' => '',
			  	'videoMaxSize' => 102400000,
			  	'videoAllowFiles' =>array ('.flv','.swf','.mkv','.avi','.rm','.rmvb','.mpeg','.mpg','.ogg','.ogv','.mov',
		  							'.wmv','.mp4','.webm','.mp3','.wav','.mid'),
			  	
		  		//上传文件配置
			  	'fileActionName' => 'uploadfile',
			  	'fileFieldName' => 'upfile',
			  	'filePathFormat' => $uploads_files.'/{time}{rand:6}',
			  	'fileUrlPrefix' => '',
			  	'fileMaxSize' => 51200000,  //50M, 单位B
			  	'fileAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp','.flv','.swf','.mkv','.avi','.rm','.rmvb',
		    					'.mpeg', '.mpg','.ogg','.ogv','.mov','.wmv','.mp4','.webm','.mp3','.wav','.mid','.rar',
		        				'.zip','.tar','.gz','.7z','.bz2','.cab','.iso','.doc','.docx','.xls','.xlsx','.ppt','.pptx',
		    					'.pdf','.txt','.md', '.xml'),
		    	
		    	// 列出指定目录下的图片
				'imageManagerActionName' => 'listimage',
				'imageManagerListPath' => $uploads_path.'/images/',
				'imageManagerListSize' => 20,
				'imageManagerUrlPrefix' => '',
				'imageManagerInsertAlign' => 'none',
				'imageManagerAllowFiles' =>array ('.png','.jpg','.jpeg','.gif','.bmp'),
				
				// 列出指定目录下的文件
				'fileManagerActionName' => 'listfile',
				'fileManagerListPath' => $uploads_path.'/files/',
				'fileManagerUrlPrefix' => '',
				'fileManagerListSize' => 20,
				'fileManagerAllowFiles' =>array ('.png','.jpg','.jpeg','.gif','.bmp','.flv','.swf','.mkv','.avi','.rm','.rmvb',
		    					'.mpeg', '.mpg','.ogg','.ogv','.mov','.wmv','.mp4','.webm','.mp3','.wav','.mid','.rar',
		        				'.zip','.tar','.gz','.7z','.bz2','.cab','.iso','.doc','.docx','.xls','.xlsx','.ppt','.pptx',
		    					'.pdf','.txt','.md', '.xml'),
		);
		
		$action = $this->_request->getParam('action');		
		$callback = $this->_request->getParam('callback');
		switch ($action) {
		    case 'config':
		        $result =  json_encode($CONFIG);
		        break;
		
		    /* 上传图片 */
		    case 'uploadimage':
		    /* 上传涂鸦 */
		    case 'uploadscrawl':
		    /* 上传视频 */
		    case 'uploadvideo':
		    /* 上传文件 */
		    case 'uploadfile':
		        $result = include($ueditor_widget."/action_upload.php");
		        break;
		
		    /* 列出图片 */
		    case 'listimage':
		        $result = include($ueditor_widget."/action_list.php");
		        break;
		    /* 列出文件 */
		    case 'listfile':
		        $result = include($ueditor_widget."/action_list.php");
		        break;
		
		    /* 抓取远程文件 */
		    case 'catchimage':
		        $result = include($ueditor_widget."/action_crawler.php");
		        break;
		
		    default:
		        $result = json_encode(array(
		            'state'=> '请求地址出错'
		        ));
		        break;
		}
		
		/* 输出结果 */
		if ($callback) {
		    if (preg_match("/^[\w_]+$/", $callback)) {
		        echo htmlspecialchars($callback) . '(' . $result . ')';
		    } else {
		        echo json_encode(array(
		            'state'=> 'callback参数不合法'
		        ));
		    }
		} else {
		    echo $result;
		}
    }

}