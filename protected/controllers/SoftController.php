<?php
/**
 * 前端软件控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class SoftController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	
	public function init(){
		parent::init();
		//导航标示
		$this->_menu_unique = 'soft';
		//栏目
		$this->_catalog = Catalog::model()->findAll('status_is=:status AND type = :type',array(':status'=>'Y',':type'=>'soft'));
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
	    $post = new Soft();
	    $criteria = new CDbCriteria();
	    $condition = "t.status = 'Y'";
	    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
	    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	   
	    $criteria->condition = $condition;
	    $criteria->order = 'down_count DESC, t.id DESC';
	    $criteria->with = array ( 'catalog' );
	    $criteria->select = "title, id, t.soft_icon, t.update_time,t.introduce, t.down_count";
	   
	    //分页
	    $count = $post->count( $criteria );    
	    $pages = new CPagination( $count );
	    $pages->pageSize = 10;
	    
	    $criteria->limit = $pages->pageSize;
	    $criteria->offset = $pages->currentPage * $pages->pageSize;
	    
	    $datalist = $post->findAll($criteria);	   
	    
	    //最近的软件
	    $last_softs = Soft::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.')','order'=>'id DESC','limit'=>10,));
	    
	    //加载css,js	
	    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
		
	    $this->render( 'index', array('navs'=>$navs, 'softs'=>$datalist,'pagebar' => $pages,'last_softs'=>$last_softs));
	  }
  
  
  /**
   * 软件详情
   * @param unknown $id
   * @throws CHttpException
   */
  public function actionView( $id ) {
  	
  		$soft = Soft::model ()->findByPk ( intval ( $id ) );
		if (false == $soft)
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) );
			// seo信息
		$this->_seoTitle = empty ( $soft->seo_title ) ? $soft->title . ' - ' . $this->_setting ['site_name'] : $soft->seo_title;
		$this->_seoKeywords = empty ( $soft->seo_keywords ) ? $this->_seoKeywords : $post->seo_keywords;
		$this->_seoDescription = empty ( $soft->seo_description ) ? $this->_seoDescription : $soft->seo_description;
		$catalogArr = Catalog::model ()->findByPk ( $soft->catalog_id );
		
		// 加载css,js
		Yii::app ()->clientScript->registerCssFile ( $this->_stylePath . "/css/view.css" );
		Yii::app ()->clientScript->registerScriptFile ( $this->_static_public . "/js/jquery/jquery.js" );
		
		// 最近的软件
		$last_softs = Soft::model ()->findAll ( array (
				'condition' => 'catalog_id = ' . $soft->catalog_id,
				'order' => 'id DESC',
				'limit' => 10 
		) );
		
		// nav
		$navs = array ();
		$navs [] = array (
				'url' => $this->createUrl ( 'soft/view', array (
						'id' => $id 
				) ),
				'name' => $soft->title 
		);
		
		$tplVar = array (
				'soft' => $soft,
				'navs' => $navs,
				'last_softs' => $last_softs 
		);
		$this->render ( 'view', $tplVar );
	}
	
	/**
	 * 
	 * 软件下载
	 */
	public function actionDownload($id){
		$soft = Soft::model()->findByPk($id);
		if($soft){
			$file = Upload::model()->findByPk($soft->fileid);
			if($file){
				//更新下载次数
				$down_count = $soft->down_count?$soft->down_count:0;
				$soft->down_count = $down_count + 1;
				$soft->save();
				//开始下载
				Yii::app()->request->sendFile($soft->title.'.'.$file->file_ext, file_get_contents($file->file_name));
				exit;
			}else{
				$this->message('error',Yii::t('common','Source Is Not Found'),$this->createUrl('soft/view', array('id'=>$id)));
			}			
		}else{
			$this->message('error',Yii::t('common','Source Is Not Found'),$this->createUrl('soft/view', array('id'=>$id)));
		}
	}
  
}
 
