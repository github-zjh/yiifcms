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
                    //删除关联的标签
                    TagData::model()->deleteAll('content_id =:id AND type =:type', array(':id'=>$id, ':type'=>$this->controller->_type_ids['post']));
                }
                Image::model()->deleteAllByAttributes($criteria);
                break;       
            case 'show':     
                //显示      
                Image::model()->updateAll(['status' => 'Y'], $criteria);               
                break;
            case 'hidden':     
                //隐藏
                Image::model()->updateAll(['status' => 'N'], $criteria);
                break;
            case 'commend':     
                //图集推荐
                foreach((array)$ids as $id){        		
                    $recom_id = intval($_POST['recom_id']);
                    if($recom_id){
                        Image::model()->updateAll(['commend' => 'Y'], $criteria);                        
                    }else{
                        $this->controller->message('error', Yii::t('admin','RecommendPosition is Required'));
                    }
                }                 
                break;

            case 'stick':     
                //图集置顶
                Image::model()->updateAll(['top_line' => 'Y'], $criteria);
                break;
            case 'cancelStick':     
                //图集取消置顶
                Image::model()->updateAll(['top_line' => 'N'], $criteria);
                break;
            default:
                throw new CHttpException(404, Yii::t('admin','Error Operation'));                
        }
        $this->controller->message('success', Yii::t('admin','Batch Operate Success'));    	
	}
}