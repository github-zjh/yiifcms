<?php
/**
 * 批量操作
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class BatchAction extends CAction
{	
	public function run(){		
        $ids = Yii::app()->request->getParam('id');
        $command = Yii::app()->request->getParam('command');
        empty( $ids ) && $this->controller->message( 'error', Yii::t('admin','No Select') );
        if(!is_array($ids)) {
            $ids = array($ids);
        }
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);
        switch ( $command ) {
            case 'delete':      
                //删除
                AdPosition::model()->deleteAll($criteria);                
                break;
            case 'show':      
                //显示
                AdPosition::model()->updateAll(array('status' => AdPosition::STATUS_SHOW), $criteria);
                break;
            case 'hide':      
                //隐藏
                AdPosition::model()->updateAll(array('status' => AdPosition::STATUS_HIDE), $criteria);
                break;
            default:
                $this->controller->message('error', Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}