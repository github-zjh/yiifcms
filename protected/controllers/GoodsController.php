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
		$this->_catalog = Catalog::model()->findAll('status=:status AND type = :type',array(':status'=>'Y',':type'=>$this->_type_ids['goods']));
	}
	  /**
	   * 首页
	   */
	  public function actionIndex() {  	
	    $catalog_id = trim( $this->_request->getParam( 'catalog_id' ) );
	    $keyword = trim( $this->_request->getParam( 'keyword' ) );
	    $catalog = Catalog::model()->findByPk($catalog_id);    
	    //调取子孙分类和当前分类
	    $catalog_ids = Catalog::get($catalog?$catalog_id:0, $this->_catalog);  
	    $children_ids = Helper::array_key_values($catalog_ids, 'id');     
	    $catalog_id?$all_ids = array_merge($children_ids, (array)$catalog_id):$all_ids = $children_ids;   
	    $db_in_ids = implode(',',$all_ids);   
	    if(!$db_in_ids || ($catalog_id && $catalog->type != $this->_type_ids['goods'])){
		throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
	    }
	    //SEO
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('soft/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		  	
	    }else{ 
	    	$this->_seoTitle = Yii::t('common','SoftListTitle').' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = Yii::t('common','SoftListKeywords');
	    	$this->_seoDescription = Yii::t('common','SoftListDescription',array('{site_name}'=>$this->_setting['site_name']));
	    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    //查询条件
	    $post = new Goods();
	    $criteria = new CDbCriteria();
	    $condition = "t.status = 'Y'";
	    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
	    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	   
	    $criteria->condition = $condition;
	    $criteria->order = 'down_count DESC, t.id DESC';
	    $criteria->with = array ( 'catalog' );
	    $criteria->select = "title, id, t.soft_icon, t.update_time,t.introduce, t.view_count, t.down_count";
	   
	    //分页
	    $count = $post->count( $criteria );    
	    $pages = new CPagination( $count );
	    $pages->pageSize = 10;
	    
	    $criteria->limit = $pages->pageSize;
	    $criteria->offset = $pages->currentPage * $pages->pageSize;
	    
	    $datalist = $post->findAll($criteria);	   
	    
	    //最新的商品
	    $last_goods = Goods::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.')','order'=>'id DESC','limit'=>10,));
	    
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
 
