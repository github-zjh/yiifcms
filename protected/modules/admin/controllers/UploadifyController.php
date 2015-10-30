<?php
/**
 * 上传控制器 目前仅做删除附件处理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @link          http://www.yiifcms.com/
 * @copyright     Copyright (c) 2015 . All rights reserved.
 *  
 */

class UploadifyController extends Backend
{	
    /**
     * 直接删除路径文件
     * 
     */
    public function actionDelete(){
    	$filepath = Yii::app()->request->getParam('filepath');
        if(strstr($filepath, 'upload')) {
            $filepath = Helper::convertChineseName(ROOT_PATH.'/'.$filepath);
        } else {
            $var['message'] = '删除失败，此目录下的文件禁止删除';
        }
    	try {
    		if($filepath && file_exists($filepath)){
    			unlink($filepath);
    			$var['state'] = 'success';
    			$var['message'] = '删除完成';    			
    		} else{
    			$var['state'] = 'error';
    			$var['message'] = '删除失败，未找到'.$filepath;
    		}
    		
    	} catch (Exception $e){    			
    		$var['state'] = 'error';
    		$var['message'] = '删除失败：'.$e->getMessage();
    	}        
    	exit(CJSON::encode($var));
    }
}
