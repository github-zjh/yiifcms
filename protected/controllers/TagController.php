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
    $data = array();
    if($tag_id){
    	$td = new TagData();
    	$condition = "tag_id = {$tag_id->id} AND status = 'Y'";    	
    	$criteria = new CDbCriteria();    	    	
    	$criteria->condition = $condition;
    	//分页
    	$count = $td->count( $criteria );
    	$pages = new CPagination( $count );
    	$pages->pageSize = 15;    	  	
    	
    	$criteria->limit = $pages->pageSize;
    	$criteria->offset = $pages->currentPage * $pages->pageSize;
    	
    	$tddata = $td->findAll($criteria);
    	
    	foreach((array)$tddata as  $value){    		
    		$modelType = ModelType::model()->findByPk($value->type);
    		$model = $modelType->model;    		
    		$value['type'] = $modelType->type_key;
    		$value['data'] = $model::model()->findByPk($value->content_id);
    		$data[] = $value;
    	}    	
    }        
   
    //SEO
    $this->_seoTitle = $tag.' - '.$this->_setting['site_name'];  
    $navs[] = array('url'=>$this->_request->getUrl(),'name'=>$tag);
   
    //加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
	
    $this->render( 'index', array('navs'=>$navs, 'datas'=>$data,'pagebar' => $pages, 'tags'=>$tags));
  }  
 
}
