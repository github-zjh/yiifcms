<?php
/**
 * 批量操作
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
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
                RecommendPosition::model()->deleteAll($criteria);
                //同时删除推荐的内容
                $criteria_r = new CDbCriteria();
                $criteria_r->addInCondition('position_id', $ids);
                Recommend::model()->deleteAll($criteria_r);
                break;           
            default:
                $this->controller->message('error', Yii::t('admin','Error Operation'));                 
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}