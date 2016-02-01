<?php
/**
 * Ajax操作
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class AjaxAction extends CAction
{	
	public function run(){		
        $id  = Yii::app()->request->getParam('id');
        $act = Yii::app()->request->getParam('act');
        switch ( $act ) {
            case 'getSite':      
                //获取站点信息
                $data = SpiderSetting::model()->findByPk($id);                
                break;                      
            default:
                $data = array();                
        }
        App::response(App::CODE_SUCCESS, '获取成功', $data);
	}
}