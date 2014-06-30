<?php
/**
 * Tag控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class TagController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	protected $_tags;
	
	public function init(){
		parent::init();
		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}
	
  /**
   * 标签首页
   */
  public function actionIndex() {     
    $tag = trim( $this->_request->getParam( 'tag' ) );   
    $tag_id = Tag::model()->find('tag_name=:tn', array(':tn'=>$tag));
    
    if($tag_id){
    	$td = new TagData();
    	$condition = "tag_id = {$tag_id->id}";
    	$criteria = new CDbCriteria();    	
    	$criteria->condition = $condition;
    	//分页
    	$count = $td->count( $criteria );
    	$pages = new CPagination( $count );
    	$pages->pageSize = 15;
    	
    	$data = $td->findAll($criteria);
    	$this->vdump($data);
    }
    
    //文章
  	$post = new Post();    
    $criteria = new CDbCriteria();
    $condition = "t.status = 'Y'";
    $tag && $condition .= " AND FIND_IN_SET('{$tag}', tags)";   
    $criteria->with = array('catalog');
    $criteria->condition = $condition;
    $criteria->order = 'view_count DESC, t.id DESC';   
    $criteria->select = "title, title_style, attach_thumb, image_list, copy_from, copy_url, update_time,intro,tags, view_count";
   
    //图集
    $image = new Image();
    $criteria_image = new CDbCriteria();  
    $criteria_image->with = array('catalog');
    $criteria_image->condition = $condition;
    $criteria_image->order = 'view_count DESC, t.id DESC';
    $criteria_image->select = "title, title_style, attach_thumb, image_list, copy_from, copy_url, update_time,intro,tags, view_count";
  
    //文章分页
    $count = $post->count( $criteria );    
    $pages = new CPagination( $count );
    $pages->pageSize = 15;
    
    $criteria->limit = $pages->pageSize;
    $criteria->offset = $pages->currentPage * $pages->pageSize;    
    $posts = $post->findAll($criteria);  

    //SEo
    $this->_seoTitle = $tag.' - '.$this->_setting['site_name'];  
    $navs[] = array('url'=>$this->_request->getUrl(),'name'=>$tag);
   
    //加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
	
    $this->render( 'index', array('navs'=>$navs, 'posts'=>$posts,'pagebar' => $pages, 'tags'=>$tags, 'last_posts'=>$last_posts));
  }  
 
}
