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
  public function actionIndex($tag) {     
  	
  	$tags = preg_replace('/(\s)+/', ',', trim($tag));
  	$arr_tag = explode(',',$tags);    
  	foreach((array)$arr_tag as $tag){	
  		$t = Tag::model()->find('tag_name = :tn', array(':tn'=>$tag));
  		$t && $tag_ids[] = $t->id;
  	}

	if(!$tag_ids){		
		if(!$tag){
		    $alltags = Tag::model()->findAll(array('order'=>'data_count'));
		    foreach((array)$alltags as $tv){
				$tag_ids[] = $tv->id;	
		    }	
		}else{
			throw new CHttpException(404,  Yii::t('common','The requested page does not exist.'));
		}
	}  	
  	
	$data = array();
	$td = new TagData();
	$condition = "status = 'Y'";    	
	$criteria = new CDbCriteria();    	    	
	$criteria->condition = $condition;
	$criteria->addInCondition('tag_id', $tag_ids);
	//分页
	$count = $td->count( $criteria );
	$pages = new CPagination( $count );
	$pages->pageSize = 10;    	  	

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

	//SEO
	$this->_seoTitle = $tags?$tags.' - '.$this->_setting['site_name']:'所有标签 - '.$this->_setting['site_name'];
	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$tags?$tags:'所有标签');

	//加载css,js
	Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");

	$this->render( 'index', array('navs'=>$navs, 'datas'=>$data,'pagebar' => $pages, 'tags'=>$tags));
  }  
 
  /**
   *
   *  所有标签
   *
   */
  public function actionAll(){
	  $criteria = new CDbCriteria();
	  $criteria->select = 'tag_name, data_count';
	  $criteria->order = 'data_count DESC';
	  $tags = Tag::model()->findAll($criteria);
	  
	  //SEO
	  $this->_seoTitle = Yii::t('common','All Tags').' - '.$this->_setting['site_name'];
	  $navs[] = array('url'=>$this->_request->getUrl(),'name'=>Yii::t('common','All Tags'));

	  //加载css,js
	  Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/tag.css");
	  Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");

	  $this->render( 'all', array('navs'=>$navs,'tags'=>$tags));

  }
 
  /**
   * ajax搜索
   */
  public function actionAjax() {
  	$tags = trim( $this->_request->getParam( 'tag' ) );
  	$tags = preg_replace('/(\s)+/', ',', trim($tags));
  	$arr_tag = explode(',',$tags);    
  	foreach((array)$arr_tag as $tag){	
  		$t = Tag::model()->find('tag_name = :tn', array(':tn'=>$tag));
  		$t && $tag_ids[] = $t->id;
  	}
  	
  	$ajax = $this->_request->getParam( 'ajax' );
  	$data = array();
  	$searchData = array();
  	if($tag_ids && $ajax == 1){
  		$td = new TagData();  		
  		$condition = "status = 'Y'";
  		$criteria = new CDbCriteria();
  		$criteria->condition = $condition;
  		$criteria->addInCondition('tag_id', $tag_ids);
  		//分页
  		$count = $td->count( $criteria );
  		$pages = new CPagination( $count );
  		$pages->pageSize = 10;
  		 
  		$criteria->limit = $pages->pageSize;
  		$criteria->offset = $pages->currentPage * $pages->pageSize;
  		 
  		$tddata = $td->findAll($criteria);
  		 
  		foreach((array)$tddata as  $value){
	  		$modelType = ModelType::model()->findByPk($value->type);
	  		$model = $modelType->model;
	  		$value['type'] = $modelType->type_key;
	  		$value['data'] = $model::model()->findByPk($value->content_id, '', array('select'=>'id,title'));
	  		$data[] = $value;
  		}  		
  		foreach($data as $key=>$new){
  			$searchData[$key]['url'] = $this->createUrl("{$new->type}/view", array('id'=>$new->data->id));			
  			$searchData[$key]['title'] = $new->data->title;
  		}
  	}
  	exit(CJSON::encode($searchData));  		
  }  
 
}
