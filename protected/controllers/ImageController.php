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
		$this->_catalog = Catalog::model()->findAll('status=:status AND type = :type',array(':status'=>'Y',':type'=>$this->_type_ids['image']));
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
	    $catalog = Catalog::model()->findByPk($catalog_id);    
	    //调取子孙分类和当前分类
	    $catalog_ids = Catalog::get($catalog?$catalog_id:0, $this->_catalog);  
	    $children_ids = Helper::array_key_values($catalog_ids, 'id');     
	    $catalog_id?$all_ids = array_merge($children_ids, (array)$catalog_id):$all_ids = $children_ids;   
	    $db_in_ids = implode(',',$all_ids);   
	    if(!$db_in_ids || ($catalog_id && $catalog->type != $this->_type_ids['image'])){
		throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
	    }
	    //SEO
	    $navs = array();
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('image/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		
	    }else{ 
	    	$this->_seoTitle = Yii::t('common','ImageListTitle').' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = Yii::t('common','ImageListKeywords');
	    	$this->_seoDescription = Yii::t('common','ImageListDescription',array('{site_name}'=>$this->_setting['site_name']));
	    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    //查询条件
	    $post = new Image();
	    $criteria = new CDbCriteria();
	    $condition = "t.status = 'Y'";
	    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
	    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	   
	    $criteria->condition = $condition;
	    $criteria->order = 'view_count DESC, t.id DESC';
	    $criteria->with = array ( 'catalog' );
	    $criteria->select = "title, id, t.attach_thumb, t.copy_from, t.copy_url, t.image_list, t.update_time,t.introduce, t.tags, t.view_count";
	   
	    //分页
	    $count = $post->count( $criteria );    
	    $pages = new CPagination( $count );
	    $pages->pageSize = 10;
	    
	    $criteria->limit = $pages->pageSize;
	    $criteria->offset = $pages->currentPage * $pages->pageSize;
	    
	    $datalist = $post->findAll($criteria);
	   
	    //标签
	    $tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	    
	    //最近的图集
	    $last_images = Image::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.')','order'=>'id DESC','limit'=>10,));
	    
	    //加载css,js	
	    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");	    
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
		
	    $this->render( 'index', array('navs'=>$navs, 'posts'=>$datalist,'pagebar' => $pages, 'tags'=>$tags, 'last_images'=>$last_images));
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
 
