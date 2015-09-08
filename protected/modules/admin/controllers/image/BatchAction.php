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

        switch ( $command ) {
            case 'delete':      
                //删除图集     
                foreach((array)$ids as $id){
                    $imageModel = Image::model()->findByPk($id);
                    if($imageModel){                        
                        Uploader::deleteFile(ROOT_PATH.$imageModel->attach_file);
                        Uploader::deleteFile(ROOT_PATH.$imageModel->attach_thumb);
                        $imageModel->delete();
                        //删除关联的标签
                        TagData::model()->deleteAll('content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['post']));
                    }
                }
                break;       
            case 'show':     
                //图集显示      
                foreach((array)$ids as $id){
                    $imageModel = Image::model()->findByPk($id);        		
                    if($imageModel){
                        $imageModel->status = 'Y';
                        $imageModel->save();
                        //更新关联的标签
                        $tagData = TagData::model()->updateAll(array('status'=>'Y'),'content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['post']));
                    }
                }
                break;
            case 'hidden':     
                //图集隐藏      
                foreach((array)$ids as $id){
                    $imageModel = Image::model()->findByPk($id);        		
                    if($imageModel){
                        $imageModel->status = 'N';
                        $imageModel->save();
                        //更新关联的标签
                        $tagData = TagData::model()->updateAll(array('status'=>'N'),'content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['post']));
                    }
                }
                break;
            case 'commend':     
                //图集推荐
                foreach((array)$ids as $id){        		
                    $recom_id = intval($_POST['recom_id']);
                    if($recom_id){
                        $imageModel = Image::model()->findByPk($id);
                        if($imageModel){
                            $imageModel->commend = 'Y';
                            $imageModel->save();
                            $recom_post = new RecommendImage();
                            $recom_post->id = $recom_id;
                            $recom_post->post_id = $id;
                            $recom_post->save();
                        }
                    }else{
                        $this->controller->message('error', Yii::t('admin','RecommendPosition is Required'));
                    }
                }                 
                break;

            case 'stick':     
                //图集置顶      
                foreach((array)$ids as $id){
                    $imageModel = Image::model()->findByPk($id);        		
                    if($imageModel){
                        $imageModel->top_line = 'Y';
                        $imageModel->save();
                    }
                }
                break;
            case 'cancelStick':     
                //图集取消置顶      
                foreach((array)$ids as $id){
                    $imageModel = Image::model()->findByPk($id);        		
                    if($imageModel){
                        $imageModel->top_line = 'N';
                        $imageModel->save();
                    }
                }
                break;
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}