<?php
/**
 *  安装测试数据
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class InstallAction extends CAction
{	
	public function run(){
        if(Yii::app()->request->isPostRequest){
    		$testdataPath = ROOT_PATH.'/protected/data/temp/test_data.sql';
    		$testData = file_get_contents($testdataPath);
    		$tbPre = Yii::app()->db->tablePrefix;
    		Yii::app()->db->createCommand(str_replace('#@__', $tbPre, $testData))->execute();
    		$this->controller->message('success', "安装测试数据完成!", $this->createUrl('index'));
    	}else{
    		$this->controller->render('install');
    	}        
	}
}