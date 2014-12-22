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
		$index_top_banner = Ad::model()->getAdOne(4);
		//中部banner
		$index_mid_banner = Ad::model()->getAdOne(3);
		//底部banner
		$index_bottom_banner = Ad::model()->getAdOne(5);
		
		//最新资讯
		$news_new = Yii::app()->cache->get('news_new');
		if($news_new == false){			
			$news_new = Post::model()->getList(array('limit'=>20));
			Yii::app()->cache->set('news_new', $news_new);
		}
		//热门资讯		
		$news_hot = Yii::app()->cache->get('news_host');
		if($news_hot == false){
			$news_hot = Post::model()->getList(array('order'=>'t.view_count DESC, t.id DESC', 'limit'=>20));
			Yii::app()->cache->set('news_hot', $news_hot);
		}
		
		//最新图集
		$image_new = Image::model()->getList(array('limit'=>10));
		//热门图集
		$image_hot = Image::model()->getList(array('limit'=>10, 'order'=>'view_count DESC, t.id DESC'));
		
		//最新软件
		$soft_new = Soft::model()->getList(array('limit'=>20));		
		//热门软件		
		$soft_hot = Soft::model()->getList(array('limit'=>10, 'order'=>'down_count DESC, t.id DESC'));
	
		//最新视频		
		//$video_new = Video::model()->findAll("status=:status AND catalog_id = 13 ORDER BY id DESC Limit 20", array(':status'=>'Y'));
		//热门视频
		//$video_hot = Video::model()->findAll("status=:status AND catalog_id = 13 ORDER BY view_count DESC, video_score DESC, id DESC Limit 20", array(':status'=>'Y'));
		
		//友情链接
		$link_logos = Link::model()->findAll("logo !='' AND status_is='Y'", array('order'=>'sortorder ASC, id DESC'));
		$link_texts = Link::model()->findAll("logo ='' or logo is null AND status_is='Y'", array('order'=>'sortorder ASC, id DESC'));
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
	 * 前端错误提示页(40x, 50x等)
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
	
	/**
	 * sitemap列表
	 */
	public function actionSitemap(){
		$this->layout = false;
		//rss创建
		$obj = new Sitemap();
	
		$this->render('sitemap',array('rss'=>$obj->show()));
	}
	
	/**
	 * sitemap索引
	 */
	public function actionSitemapXsl(){
		
		$this->render('sitemapxsl');
	}
	
	/**
	 * 
	 * 获取最新cms版本信息
	 * 
	 */
	public function actionVersion(){
		$cms = $this->_request->getParam('cms');
		$cms = unserialize(base64_decode($cms));
				
		//最新发布版本
		$newCMS = array('version'=>$this->_cmsVersion, 'release'=>$this->_cmsRelease);
		if(strcmp($cms, $newCMS) < 0) {
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '<span style="color:#F00; font-weight:bold">发现新版本，涉及重要更新，务必升级：{$newCMS['version']} {$newCMS['release']} <a href="http://www.yiifcms.com/soft/index/cat_11/" target="_blank">下载</a></span>';
EOT;
			
		}else{
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '{$newCMS['version']} {$newCMS['release']}';
EOT;
		}
		echo $html;
	}
	
}
