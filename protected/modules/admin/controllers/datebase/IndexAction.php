<?php
/**
 * 数据库表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){        
        $dataList = Yii::app()->db->createCommand("SHOW TABLE STATUS")->queryAll();
        $dataSize = 0;
        foreach ($dataList as $row) {
            $dataSize += $row['Data_length'];
        }
        $this->controller->render('index', array ('dataSize' => $dataSize , 'dataList' => $dataList ));
	}
}