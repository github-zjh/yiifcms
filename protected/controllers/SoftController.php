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
			$this->_catalog = Catalog::model()->getCatalog($this->_type_ids['soft']);
	}
	  /**
	   * 首页
	   */
	  public function actionIndex() {  	
	    $catalog_id = trim( $this->_request->getParam( 'catalog_id' ) );
	    $keyword = trim( $this->_request->getParam( 'keyword' ) );
	   
	    //SEO
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('soft/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		  	
	    }else{ 
	    	$seo = ModelType::getSEO('soft');
	    	$this->_seoTitle = $seo['seo_title'].' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $seo['seo_keywords'];
	    	$this->_seoDescription = $seo['seo_description'];	
	    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    //获取子孙分类(包括本身)
	    $data = Catalog::model()->getChildren($catalog_id);
	    $catalog = $data['catalog'];
	    $db_in_ids = $data['db_in_ids'];
	    
	    //获取所有符合条件的文章
	    $condition = '';
	    $catalog && $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	    $datalist = Soft::model()->getList(array('condition'=>$condition, 'limit'=>15, 'order'=>$order_by, 'page'=>true), $pages);
	     
	    //该栏目下最新的软件
	    $last_softs = Soft::model()->getList(array('condition'=>$condition, 'limit'=>10));
	    
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
		if (false == $soft || $soft->status == 'N')
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) );
			// seo信息
		$this->_seoTitle = empty ( $soft->seo_title ) ? $soft->title . ' - ' . $this->_setting ['site_name'] : $soft->seo_title;
		$this->_seoKeywords = empty ( $soft->seo_keywords ) ? $this->_seoKeywords : $post->seo_keywords;
		$this->_seoDescription = empty ( $soft->seo_description ) ? $this->_seoDescription : $soft->seo_description;
		$catalogArr = Catalog::model ()->findByPk ( $soft->catalog_id );
		
		//更新浏览次数
		$soft->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
		
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
		
		//限制下载频率
		$cookie = Yii::app()->request->getCookies();		
		$cookie_key = 'DL'.$id.'TIMES';
		$down_cookie = $cookie[$cookie_key]->value;
		if($down_cookie){
			throw new CHttpException(404, Yii::t('common','Access frequency too fast'));
		}
		$soft = Soft::model()->findByPk($id);		
		if($soft){
			$file = Upload::model()->findByPk($soft->fileid);
			if($file && file_exists($file->file_name)){
				//更新下载次数
				$soft->updateCounters(array ('down_count' => 1 ), 'id=:id', array ('id' => $id ));
				
				//存储下载cookie次数
				unset($cookie[$cookie_key]);
				$down = 1;
				$cookie = new CHttpCookie($cookie_key,$down);
				$cookie->expire = time()+20;   //20秒之后可以再次下载				
				Yii::app()->request->cookies[$cookie_key]=$cookie;
				
				//开始下载
				Yii::app()->request->sendFile($soft->title.'.'.$file->file_ext, file_get_contents($file->file_name), $file->file_mime);
				exit;
			}else{
				throw new CHttpException(404, Yii::t('common','Source Is Not Found'));	
			}			
		}else{
			throw new CHttpException(404, Yii::t('common','Source Is Not Found'));	
		}
	}
  
}
 
