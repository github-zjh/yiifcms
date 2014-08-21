<?php
/**
 * KindEditor图片管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 * 
 */
class KindEditorController extends Backend
{		
	
    /**
	 * KindEditor管理
	 *
	 */
    public function actionIndex ()
    {  
    	Yii::import('application.widget.kindeditor.file_manager_json',true);     	
    }
   
}