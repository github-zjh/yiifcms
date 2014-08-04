<?php
/**
 * 前端视频控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class VideoController extends FrontBase
{
	protected $_catalog;
	protected $_video_type;
	protected $_menu_unique;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type = :type',array(':status'=>'Y',':type'=>$this->_type_ids['video']));
		$this->_video_type = array(
				'comedy'=>'喜剧',
				'active'=>'动作',
				'story' => '剧情',
				'science'=>'科幻',
				'terrified'=>'惊悚',
				'war'=>'战争',
				'sexy'=>'伦理'
		);
		//导航标示
		$this->_menu_unique = 'video';
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
	    if(!$db_in_ids || ($catalog_id && $catalog->type != $this->_type_ids['video'])){
		throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
	    }
	    //SEO
	    $navs = array();
	    if($catalog){
	    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = $catalog->seo_keywords;
	    	$this->_seoDescription = $catalog->seo_description; 
	    	$navs[] = array('url'=>$this->createUrl('video/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   		
	    }else{ 
	    	$this->_seoTitle = Yii::t('common','VideoListTitle').' - '.$this->_setting['site_name'];
	    	$this->_seoKeywords = Yii::t('common','VideoListKeywords');
	    	$this->_seoDescription = Yii::t('common','VideoListDescription',array('{site_name}'=>$this->_setting['site_name']));
	    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle); 
	    }
	    //查询条件
	    $post = new Video();
	    $criteria = new CDbCriteria();
	    $condition = "t.status = 'Y'";
	    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
	    $db_in_ids && $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
	   
	    $criteria->condition = $condition;
	    $criteria->order = 'video_score DESC, view_count DESC, t.id DESC';
	    $criteria->with = array ( 'catalog' );
	    $criteria->select = "title, id, t.cover_image, t.video_score,  t.update_time,t.introduce, t.view_count";
	   
	    //分页
	    $count = $post->count( $criteria );    
	    $pages = new CPagination( $count );
	    $pages->pageSize = 20;
	    
	    $criteria->limit = $pages->pageSize;
	    $criteria->offset = $pages->currentPage * $pages->pageSize;
	    
	    $datalist = $post->findAll($criteria);
	
	    //最近的视频
	    $last_videos = Video::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.')','order'=>'id DESC','limit'=>10,));
	    
	    //加载css,js	
	    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");	    
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
		
	    $this->render( 'index', array('navs'=>$navs, 'videos'=>$datalist,'pagebar' => $pages, 'last_videos'=>$last_videos));
  }
  
  /**
   * 浏览详细内容
   */
  public function actionView( $id ) {
  		$video = Video::model ()->findByPk ( intval ( $id ) );
		if (false == $video || $video->status == 'N')
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) );
			// seo信息
		$this->_seoTitle = empty ( $video->seo_title ) ? $video->title . ' - ' . $this->_setting ['site_name'] : $video->seo_title;
		$this->_seoKeywords = empty ( $video->seo_keywords ) ? $this->_seoKeywords : $post->seo_keywords;
		$this->_seoDescription = empty ( $video->seo_description ) ? $this->_seoDescription : $video->seo_description;
		$catalogArr = Catalog::model ()->findByPk ( $video->catalog_id );
		//更新浏览次数
		$video->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
		
		// 加载css,js
		Yii::app ()->clientScript->registerCssFile ( $this->_stylePath . "/css/view.css" );
		Yii::app ()->clientScript->registerCssFile ( $this->_stylePath . "/css/score.css" );
		Yii::app ()->clientScript->registerScriptFile ( $this->_static_public . "/js/jquery/jquery.js" );
		Yii::app ()->clientScript->registerScriptFile ( $this->_stylePath . "/js/score.js",CClientScript::POS_END );
		
		// 最近的软件
		$last_videos = video::model ()->findAll ( array (
				'condition' => 'catalog_id = ' . $video->catalog_id,
				'order' => 'id DESC',
				'limit' => 10 
		) );
		
		// nav
		$navs = array ();
		$navs [] = array (
				'url' => $this->createUrl ( 'video/view', array (
						'id' => $id 
				) ),
				'name' => $video->title 
		);
		
		$tplVar = array (
				'video' => $video,
				'navs' => $navs,
				'last_videos' => $last_videos 
		);
		$this->render ( 'view', $tplVar );
  }
  
  /**
   * 给影片评分 
   */
  public function actionScore(){
  	$g = $this->_request->getParam('g');  //1获取 0评分
  	$id = $this->_request->getParam('id');
  	$s = $this->_request->getParam('s');  //等级0-5
  	$res = Video::model()->findByPk($id);
  	//t 总人数 s 从低分人数到高分人数分布
  	if($g == 1){  		
  		if($res->voted){
  			exit($res->voted);
  		}else{
  			exit('{"t":0,"s":[0,0,0,0,0]}');
  		}
  	}else{  		
  		if($res->voted){
  			$arr_res = CJSON::decode($res->voted);
  		}else{
  			$arr_res = array('t'=>0, 's'=>array(0,0,0,0,0));
  		} 
  		$arr_res['t'] = $arr_res['t']+1;
  		$arr_res['s'][$s-1] = $arr_res['s'][$s-1]+1;
  		//计算得分
  		$avg = $arr_res['t']>0?round(($arr_res['s'][0]+2*$arr_res['s'][1]+3*$arr_res['s'][2]+4*$arr_res['s'][3]+5*$arr_res['s'][4])/$arr_res['t']*2,1):'0.0';	  		
  		$avg = substr($avg,0,3);  //取前三位
  		$avg = trim($avg,'.');    //去除多余的前后.
  		$data = CJSON::encode($arr_res);
  		$res->voted = $data;
  		$res->video_score = $avg;
  		$res->save();
  	 	exit('1');
  	}
  }
  
  /**
   *
   * 视频下载
   * 
   */
  public function actionDownload($id){
  	$video = Video::model()->findByPk($id);
  	if($video){
  		$file = Upload::model()->findByPk($video->fileid);
  		if($file && file_exists($file->file_name)){
  			//更新下载次数
  			$video->updateCounters(array ('down_count' => 1 ), 'id=:id', array ('id' => $id ));
  		
  			//开始下载
  			Yii::app()->request->sendFile($soft->title.'.'.$file->file_ext, file_get_contents($file->file_name));
  			exit;
  		}else{
  			$this->message('error',Yii::t('common','Source Is Not Found'),$this->createUrl('video/view', array('id'=>$id)));
  		}
  	}else{
  		$this->message('error',Yii::t('common','Source Is Not Found'),$this->createUrl('video/view', array('id'=>$id)));
  	}
  }
  
}
 
