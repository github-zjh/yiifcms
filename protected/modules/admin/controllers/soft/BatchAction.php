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
                foreach((array)$ids as $id){
                    $softModel = Soft::model()->with('content')->findByPk($id);                    
                    if($softModel){ 
                        Uploader::deleteFile($softModel->soft_icon);
                        Uploader::deleteFile($softModel->content->soft_file);
                        $softModel->delete();
                        $softModel->content->delete();
                    }          
                    //删除关联的标签
                    TagData::model()->deleteAll('content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['soft']));
                }                
                break;       
            case 'show':     
                //显示
                Soft::model()->updateAll(array('status' => 'Y'), $criteria);
                break;
            case 'hidden':     
                //隐藏      
                Soft::model()->updateAll(array('status' => 'N'), $criteria);
                break;            
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}