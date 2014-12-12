<?php
/**
 * 前端图集控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class ImageController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	protected $_tags;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->getCatalog($this->_type_ids['image']);
		//导航标示
		$this->_menu_unique = 'image';
		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}	
	
	  /**
	   * 首页
	   */
	  public function actionIndex() {  	
	    $catalog_id = trim( $this->_request->getParam( 'catalog_id' ) );
	    $keyword = trim( $this->_request->getParam( 'keyword' ) );
	  
	    //获取子孙分类(包括本身)
	    $data = Catalog::model()->getChildren($catalog_id);
	    $catalog = $data['catalog'];
	    $db_in_ids = $data['db_in_ids'];
	    
	    //SEO
	    $navs = array();
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('image/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		
	    }else{ 
	    	$seo = ModelType::getSEO('image');
	    	$this->_seoTitle = $seo['seo_title'].' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $seo['seo_keywords'];
	    	$this->_seoDescription = $seo['seo_description'];	    
	    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    
	    //获取所有符合条件的图集  
	    $condition = '';   
	    $catalog && $condition .= ' AND catalog_id IN ('.$db_in_ids.')';    
	    $datalist = Image::model()->getList(array('condition'=>$condition, 'limit'=>15, 'order'=>$order_by, 'page'=>true), $pages);   
   	   
	    //标签
	    $tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	    
	    //最近的图集
	    $last_images = Image::model()->getList(array('condition'=>$condition, 'limit'=>10));	   
	    
	    //加载css,js	
	    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");	    
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
		
	    $this->render( 'index', array('navs'=>$navs, 'datalist'=>$datalist,'pagebar' => $pages, 'tags'=>$tags, 'last_images'=>$last_images));
	  }
  
  /**
   * 浏览详细内容
   */
  public function actionView( $id ) {  	
  	$post = Image::model()->findByPk( intval( $id ) );
    if ( false == $post || $post->status == 'N')
        throw new CHttpException( 404, Yii::t('common','The requested page does not exist.') );
    //更新浏览次数
    $post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
    //seo信息
    $this->_seoTitle = empty( $post->seo_title ) ? $post->title  .' - '. $this->_setting['site_name'] : $post->seo_title;
    $this->_seoKeywords = empty( $post->seo_keywords ) ? $post->tags  : $post->seo_keywords;
    $this->_seoDescription = empty( $post->seo_description ) ? $this->_seoDescription: $post->seo_description;
    $catalogArr = Catalog::model()->findByPk($post->catalog_id);
    
  	//加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/view.css");   
    Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
    Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/discuz/zoom.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/discuz/common.js");	
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/discuz/zoom.js");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);

	//最近的图集
	$last_images = Image::model()->findAll(array('condition'=>'catalog_id = '.$post->catalog_id,'order'=>'id DESC','limit'=>10,));
	
	//nav
	$navs = array();
	$navs[] = array('url'=>$this->createUrl('image/view',array('id'=>$id)), 'name'=>$post->title);
    $tplVar = array(
        'post'=>$post,     
        'navs'=>$navs,
    	'last_images'=>$last_images
    );
  	$this->render( 'view', $tplVar);
  }
  
}
 
