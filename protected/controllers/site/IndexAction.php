<?php
/**
 *  首页
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class IndexAction extends CAction
{	
	public function run(){        
        
		//SEO
		$this->controller->_seoTitle = $this->controller->_setting['seo_title'];	
		$this->controller->_seoKeywords = $this->controller->_setting['seo_keywords'];
		$this->controller->_seoDescription = $this->controller->_setting['seo_description'];
				
		//头部banner
		$index_top_banner = Ad::model()->getAdOne(4);
		//中部banner
		$index_mid_banner = Ad::model()->getAdOne(3);
		//底部banner
		$index_bottom_banner = Ad::model()->getAdOne(5);
		
		//最新资讯        
        $news_new = Post::model()->getList(array('limit'=>20));        
		//热门资讯
        $news_hot = Post::model()->getList(array('order'=>'t.view_count DESC, t.id DESC', 'limit'=>20));
		
		//最新图集
		$image_new = Album::model()->getList(array('limit'=>10));
		//热门图集
		$image_hot = Album::model()->getList(array('limit'=>10, 'order'=>'view_count DESC, t.id DESC'));
		
		//最新软件
		$soft_new = Soft::model()->getList(array('limit'=>20));		
		//热门软件		
		$soft_hot = Soft::model()->getList(array('limit'=>20, 'order'=>'down_count DESC, t.id DESC'));
	
		//最新视频        		
		$video_new = Video::model()->findAll("status=:status ORDER BY id DESC Limit 18", array(':status'=>'Y'));
		//热门视频        
		$video_hot = Video::model()->findAll("status=:status ORDER BY view_count DESC, video_score DESC, id DESC Limit 18", array(':status'=>'Y'));
		
		//友情链接
		$link_logos = Link::model()->findAll("logo !='' AND status='Y'", array('order'=>'sortorder ASC, id DESC'));
		$link_texts = Link::model()->findAll("logo ='' AND status='Y'", array('order'=>'sortorder ASC, id DESC'));
        
		$this->controller->render('index',
			array(
					'index_top_banner'    => $index_top_banner, 
					'index_mid_banner'    => $index_mid_banner, 
					'index_bottom_banner' => $index_bottom_banner, 
					'link_logos'          => $link_logos, 						
					'link_texts'          => $link_texts,
					'news_new'            => $news_new,
					'news_hot'            => $news_hot,
					'image_new'           => $image_new,
					'image_hot'           => $image_hot,
					'soft_new'            => $soft_new,
					'soft_hot'            => $soft_hot,
					'video_new'           => $video_new,
					'video_hot'           => $video_hot,						
			)
		);        
	}
}