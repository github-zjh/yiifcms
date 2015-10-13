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
        $sortOrder = Yii::app()->request->getParam('sortOrder');
        $command = Yii::app()->request->getParam('command');
        empty( $ids ) && $this->controller->message( 'error', Yii::t('admin','No Select') );
        if(!is_array($ids)) {
            $ids = array($ids);
        }
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);        
        switch ( $command ) {
            case 'sortOrder':                
                //推荐内容排序               
                foreach($ids as $id) {
                    Recommend::model()->updateByPk($id, array('sort_order' => $sortOrder[$id]));
                }
                break;            
            case 'unCommend':
                //取消推荐内容                
                Recommend::model()->deleteAll($criteria);                
                break;              
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}