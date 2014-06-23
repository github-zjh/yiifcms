<?php
/**
 * 单页内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class PageController extends FrontBase
{	
	
 /**
  *  详情
  */
  public function actionIndex($title_alias='') {   	
  	  $page = Page::model()->find('title_alias=:title_alias AND status=:status' , array(':title_alias'=>$title_alias, ':status'=>'Y'));
      if(!$page){      	
      	throw new CHttpException(404, Yii::t('common','The requested page does not exist.'));
      }
      
      //加载css,js
      Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/page.css");
      Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
      //SEO
      $this->_seoTitle = $page->seo_title?$page->seo_title:$page->title.' - '.$this->_setting['site_name'];
      $this->_seoKeywords = $page->seo_keywords;
      $this->_seoDescription = $page->seo_description;
      
      //所有单页
      $pagelists = Page::model()->findAll('status=:status ORDER BY sort_order ASC, id DESC' , array(':status'=>'Y'));
      
      //导航
      $navs[] = array('url'=>$this->_request->getUrl(),'name'=>$page->title);
      $this->render('index', array('page'=>$page, 'navs'=>$navs, 'pagelists'=>$pagelists));
  }
  
}
