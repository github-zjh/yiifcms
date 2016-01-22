<?php
/**
 *  软件列表
 * 
 * @author        GoldHan.zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2016. All rights reserved.
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
       
        //SEO
        $navs = array();
        $search_cats = '所有';
        if($catalog_id){
            $condition = ' AND catalog_id = '.$catalog_id;
            $catalog = Catalog::model()->findByPk($catalog_id);
            if($catalog) {
                $this->controller->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->controller->_setting['site_name'];
                $this->controller->_seoKeywords = $catalog->seo_keywords;
                $this->controller->_seoDescription = $catalog->seo_description; 
                $navs[] = array('url'=>$this->controller->createUrl('soft/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   	
                //已搜索的分类
                $cat_parents = Catalog::getParantsCatalog($catalog_id);                
                $search_cats = $cat_parents ? implode('>', $cat_parents) .'>'. $catalog->catalog_name : $catalog->catalog_name;
            }
        }
        if(!$navs){
            $condition = '';
            $catalog = array();
            $seo = ModelType::getSEO('soft');    	
            $this->controller->_seoTitle = $seo['seo_title'].' - '.$this->controller->_setting['site_name'];
            $this->controller->_seoKeywords = $seo['seo_keywords'];
            $this->controller->_seoDescription = $seo['seo_description'];
            $navs[] = array('url'=>Yii::app()->request->getUrl(),'name'=>$this->controller->_seoTitle);  
        }

        //获取所有符合条件的软件        
        $pages = array();       
        $datalist = Soft::model()->getList(array('condition'=>$condition, 'limit'=>15, 'order'=>$order_by, 'page'=>true), $pages);   

        //该栏目下最新的软件 
        $last_softs = Soft::model()->getList(array('condition'=>$condition, 'limit'=>20));
        $this->controller->render( 'index', array('navs'=>$navs, 'catalog'=>$catalog, 'softs'=>$datalist, 'pagebar' => $pages,  'last_softs'=>$last_softs,'order'=>$order, 'search_cats' => $search_cats));    
	}
}