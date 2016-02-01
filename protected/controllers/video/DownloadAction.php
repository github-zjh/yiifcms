<?php

/**
 *  视频下载
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class DownloadAction extends CAction {

    public function run() {
        //限制下载频率
		$cookie = Yii::app()->request->getCookies();
        $id = Yii::app()->request->getParam('id');
		$cookie_key = 'DL'.$id.'TIMES';		
		if(isset($cookie[$cookie_key]) && $cookie[$cookie_key]->value){
			throw new CHttpException(404, Yii::t('common','Access frequency too fast'));
		}
		$video = Video::model()->with('content')->findByPk($id);		
		if($video){
			$file = Helper::convertChineseName(ROOT_PATH.'/'.$video->content->video_file);            
			if($video->content->video_file && file_exists($file)){
                $filename = pathinfo($file, PATHINFO_BASENAME);
				//更新下载次数
				$video->updateCounters(array ('down_count' => 1 ), 'id=:id', array ('id' => $id ));
				
				//存储下载cookie次数
				unset($cookie[$cookie_key]);
				$down = 1;
				$cookie = new CHttpCookie($cookie_key,$down);
				$cookie->expire = time()+20;   //20秒之后可以再次下载				
				Yii::app()->request->cookies[$cookie_key]=$cookie;
				
				//开始下载                
				Yii::app()->request->sendFile($filename, file_get_contents($file));
				exit;
			}else{
				throw new CHttpException(404, Yii::t('common','Source Is Not Found'));	
			}			
		}else{
			throw new CHttpException(404, Yii::t('common','Source Is Not Found'));	
		}
    }

}
