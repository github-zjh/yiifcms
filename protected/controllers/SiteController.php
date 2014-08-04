<?php
/**
 * 默认前端控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SiteController extends FrontBase
{	
	protected $_menu_unique;
	
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'index';	
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		//首页banner幻灯片
		$banner = Ad::model()->findAll('position_id=:pid', array(':pid'=>1));
		//SEO
		$this->_seoTitle = $this->_setting['seo_title'];	
		$this->_seoKeywords = $this->_setting['seo_keywords'];
		$this->_seoDescription = $this->_setting['seo_description'];
		
		//加载css,js
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/index.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.easytabs.min.js");
		
		//头部banner
		$index_top_banner = Ad::model()->find('position_id = 4 ORDER BY id DESC');
		//中部banner
		$index_mid_banner = Ad::model()->find('position_id = 3 ORDER BY id DESC');
		//底部banner
		$index_bottom_banner = Ad::model()->find('position_id = 5 ORDER BY id DESC');

		
		//最新资讯
		$news_new = Post::model()->findAll("status=:status ORDER BY id DESC Limit 20", array(':status'=>'Y'));
		//热门资讯
		$news_hot = Post::model()->findAll("status=:status ORDER BY view_count DESC, id DESC Limit 20", array(':status'=>'Y'));
		
		//最新图集
		$image_new = Image::model()->findAll("status=:status AND attach_thumb != '' ORDER BY id DESC Limit 20", array(':status'=>'Y'));
		//热门图集
		$image_hot = Image::model()->findAll("status=:status AND attach_thumb != '' ORDER BY view_count DESC, id DESC Limit 20", array(':status'=>'Y'));
		
		//最新软件
		$soft_new = Soft::model()->findAll("status=:status ORDER BY id DESC Limit 20", array(':status'=>'Y'));
		//热门软件
		$soft_hot = Soft::model()->findAll("status=:status ORDER BY down_count DESC, id DESC Limit 20", array(':status'=>'Y'));
		
		//最新视频
		$video_new = Video::model()->findAll("status=:status AND catalog_id = 13 ORDER BY id DESC Limit 20", array(':status'=>'Y'));
		//热门视频
		$video_hot = Video::model()->findAll("status=:status AND catalog_id = 13 ORDER BY view_count DESC, video_score DESC, id DESC Limit 20", array(':status'=>'Y'));
		
		//友情链接
		$link_logos = Link::model()->findAll("logo !='' AND status_is='Y'", array('order'=>'sortorder ASC, id DESC'));
		$link_texts = Link::model()->findAll("logo ='' AND status_is='Y'", array('order'=>'sortorder ASC, id DESC'));
		$this->render('index',compact(
			array(
					'index_top_banner', 
					'index_mid_banner', 
					'index_bottom_banner', 
					'link_logos', 						
					'link_texts',
					'news_new',
					'news_hot',
					'image_new',
					'image_hot',
					'soft_new',
					'soft_hot',
					'video_new',
					'video_hot',						
			)
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				//加载css,js
				Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/error.css");	
				Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
				$this->_seoTitle = Yii::t('common','Notice Message').' - '.$this->_setting['site_name'];
				$this->render('error', $error);
			}
		}
	}
	
}
