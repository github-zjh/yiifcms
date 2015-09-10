<?php
/**
 * 图集批量操作
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
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);
        switch ( $command ) {
            case 'delete':      
                //删除                
                foreach((array)$ids as $id){
                    $softModel = Soft::model()->findByPk($id);
                    if($softModel){ 
                        Uploader::deleteFile(ROOT_PATH.$softModel->soft_icon);
                        Uploader::deleteFile(ROOT_PATH.$softModel->soft_file);                                              
                    }
                }
                Soft::model()->deleteAll($criteria);
                break;       
            case 'show':     
                //显示
                Soft::model()->updateAll(['status' => 'Y'], $criteria);
                break;
            case 'hidden':     
                //隐藏      
                Soft::model()->updateAll(['status' => 'N'], $criteria);
                break;            
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}