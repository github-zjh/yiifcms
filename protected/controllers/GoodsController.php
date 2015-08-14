<?php
/**
 * 前端商品控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class GoodsController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'goods';
		//栏目		
		$this->_catalog = Catalog::model()->getCatalog($this->_type_ids['goods']);
	}
	  /**
	   * 首页
	   */
	  public function actionIndex() {  	
	    $catalog_id = trim( Yii::app()->request->getParam( 'catalog_id' ) );
	    $keyword = trim( Yii::app()->request->getParam( 'keyword' ) );	   

	    //获取子孙分类(包括本身)
	    $data = Catalog::model()->getChildren($catalog_id);
	    $catalog = $data['catalog'];
	    $db_in_ids = $data['db_in_ids'];	  
	    
	    //SEO
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('soft/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		  	
	    }else{ 
	    	$seo = ModelType::getSEO('goods');
	    	$this->_seoTitle = $seo['seo_title'].' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $seo['seo_keywords'];
	    	$this->_seoDescription = $seo['seo_description'];	    	
	    	$navs[] = array('url'=>Yii::app()->request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    
	    //获取所有符合条件的商品
	    $condition = '';
	    $catalog && $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	    $datalist = Goods::model()->getList(array('condition'=>$condition, 'limit'=>15, 'order'=>$order_by, 'page'=>true), $pages);
	    
	    //最新的商品
	    $last_goods = Goods::model()->getList(array('condition'=>$condition, 'limit'=>10));
	    
	    //加载css,js	
	    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
		
	    $this->render( 'index', array('navs'=>$navs, 'goods'=>$datalist,'pagebar' => $pages,'last_goods'=>$last_goods));
	  }
  
  
  /**
   * 商品详情
   * @param unknown $id
   * @throws CHttpException
   */
  public function actionView( $id ) {
  	
  		$good = Goods::model ()->findByPk ( intval ( $id ) );
		if (false == $good || $good->status == 'N')
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) );
			// seo信息
		$this->_seoTitle = empty ( $good->seo_title ) ? $good->goods_name . ' - ' . $this->_setting ['site_name'] : $good->seo_title;
		$this->_seoKeywords = empty ( $good->seo_keywords ) ? $this->_seoKeywords : $good->seo_keywords;
		$this->_seoDescription = empty ( $good->seo_description ) ? $this->_seoDescription : $good->seo_description;
		$catalogArr = Catalog::model ()->findByPk ( $good->catalog_id );
		
		//更新浏览次数
		$good->updateCounters(array ('views' => 1 ), 'id=:id', array ('id' => $id ));
		
		// 加载css,js
		Yii::app ()->clientScript->registerCssFile ( $this->_stylePath . "/css/view.css" );
		Yii::app ()->clientScript->registerScriptFile ( $this->_static_public . "/js/jquery/jquery.js" );
		
		// 最近的商品
		$last_goods = Goods::model ()->findAll ( array (
				'condition' => 'catalog_id = ' . $good->catalog_id,
				'order' => 'id DESC',
				'limit' => 10 
		) );
		
		// nav
		$navs = array ();
		$navs [] = array (
				'url' => $this->createUrl ( 'goods/view', array (
						'id' => $id 
				) ),
				'name' => $good->goods_name 
		);
		
		$tplVar = array (
				'good' => $good,
				'navs' => $navs,
				'last_goods' => $last_goods 
		);
		$this->render ( 'view', $tplVar );
	}
	
}
 
