<?php
/**
 * 图集批量操作
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
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
                    $model = Album::model()->with('content')->findByPk($id);
                    if($model){                        
                        Uploader::deleteFile($model->attach_file);
                        Uploader::deleteFile($model->attach_thumb);
                        $album_list = $model->content ? $model->content->album_list : array();
                        foreach((array)$album_list as $v) {
                            Uploader::deleteFile($v);
                        }                        
                        $model->delete();
                        $model->content->delete();
                    }                                        
                    //删除关联的标签
                    TagData::model()->deleteAll('content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['album']));
                }                
                break;       
            case 'show':     
                //显示      
                Album::model()->updateAll(array('status' => 'Y'), $criteria);
                break;
            case 'hidden':     
                //隐藏
                Album::model()->updateAll(array('status' => 'N'), $criteria);
                break;
            case 'commend':     
                //图集推荐
                $content_id = implode(',', $ids);
                $type_key = 'album';
                $this->controller->redirect($this->controller->createUrl('recommend/create', array('content_id' => $content_id, 'type_key' => $type_key)));                 
                break;

            case 'stick':     
                //图集置顶
                Album::model()->updateAll(['top_line' => 'Y'], $criteria);
                break;
            case 'cancelStick':     
                //图集取消置顶
                Album::model()->updateAll(['top_line' => 'N'], $criteria);
                break;
            default:
                $this->controller->message('error', Yii::t('admin','Error Operation'));                 
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}