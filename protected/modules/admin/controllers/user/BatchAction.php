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
        //自己不能删除、禁用自己
        $uid = Yii::app()->user->id;
        if(($key = array_search($uid, $ids)) !== false ) {            
            unset($ids[$key]);
            $this->controller->message('error', Yii::t('admin','You Can Not Delete Yourself'));
        }
        $criteria = new CDbCriteria();
        $criteria->addInCondition('uid', $ids);
        switch ( $command ) {
            case 'delete':      
                //删除                
                User::model()->deleteAll($criteria);                
                break;
            case 'lock':
                //禁用
                User::model()->updateAll(array('status' => User::STATUS_DISABLE), $criteria);
                break; 
            case 'unlock':     
                //显示
                User::model()->updateAll(array('status' => User::STATUS_NORMAL), $criteria);
                break;
            case 'unpass':     
                //待审核      
                User::model()->updateAll(array('status' => User::STATUS_AUDIT), $criteria);
                break;            
            default:
                $this->controller->message('error', Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}