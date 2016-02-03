<?php
/**
 *  专题页
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){      
        $this->controller->layout = false;
        $id = intval(Yii::app()->request->getParam('id'));
        $special = Special::model()->findByPk($id);
        if(!$special) {
            throw new Exception(Yii::t('common','The requested page does not exist.'));
        }        
        $this->controller->_seoTitle = $special->seo_title ? $special->seo_title : $special->title . ' - '. $this->controller->_setting['site_name'];
        $this->controller->_seoKeywords = $special->seo_keywords;
        $this->controller->_seoDescription = $special->seo_description;        
        
        //专题资讯
        $special_news = Post::model()->findAll(array('select' => 'id, title', 'condition' => 'special_id ='.$id. ' AND status ="'.Post::STATUS_SHOW.'"', 'limit' => 30));
        
        //专题图集
        $special_images = Album::model()->findAll(array('select' => 'id, title', 'condition' => 'special_id ='.$id. ' AND status ="'.Album::STATUS_SHOW.'"', 'limit' => 30));
        
        $this->controller->render( 'index', array(            
                'special'        => $special,
                'special_news'   => $special_news,
                'special_images' => $special_images
            )
        );    
	}
}