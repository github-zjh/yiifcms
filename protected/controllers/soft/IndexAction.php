<?php
/**
 *  软件列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){        
        $catalog_id = trim( Yii::app()->request->getParam( 'catalog_id' ) );
        $order = trim( Yii::app()->request->getParam( 'order' ) );    
        if(!$order){
            $order = 'id';
        }
        switch($order){
            case 'id':
                $order_by = 't.id DESC';
                break;
            case 'view_count':
                $order_by = 'view_count DESC';
                break;
            default:
                $order = 'id';
                $order_by = 't.id DESC';
                break;
        }
        //获取子孙分类(包括本身)
        $data = Catalog::model()->getChildren($catalog_id);
        $catalog = $data['catalog'];
        $db_in_ids = $data['db_in_ids'];

        //SEO
        $navs = array();
        if($catalog){
            $this->controller->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->controller->_setting['site_name'];
            $this->controller->_seoKeywords = $catalog->seo_keywords;
            $this->controller->_seoDescription = $catalog->seo_description; 
            $navs[] = array('url'=>$this->controller->createUrl('soft/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   	
        }else{ 
            $seo = ModelType::getSEO('soft');    	
            $this->controller->_seoTitle = $seo['seo_title'].' - '.$this->controller->_setting['site_name'];
            $this->controller->_seoKeywords = $seo['seo_keywords'];
            $this->controller->_seoDescription = $seo['seo_description'];
            $navs[] = array('url'=>Yii::app()->request->getUrl(),'name'=>$this->controller->_seoTitle);  
        }

        //获取所有符合条件的文章  
        $condition = '';   
        $pages = array();
        $catalog && $condition .= ' AND catalog_id IN ('.$db_in_ids.')';    
        $datalist = Soft::model()->getList(array('condition'=>$condition, 'limit'=>15, 'order'=>$order_by, 'page'=>true), $pages);   

        //该栏目下最新的文章
        $last_softs = Soft::model()->getList(array('condition'=>$condition, 'limit'=>10));
        $this->controller->render( 'index', array('navs'=>$navs, 'catalog'=>$catalog, 'softs'=>$datalist, 'pagebar' => $pages,  'last_softs'=>$last_softs,'order'=>$order));    
	}
}