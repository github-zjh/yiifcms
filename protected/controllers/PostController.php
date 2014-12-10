<?php
/**
 * 内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class PostController extends FrontBase
{
	protected $_catalog;
	protected $_menu_unique;
	protected $_tags;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status AND type = :type',array(':status'=>'Y',':type'=>$this->_type_ids['post']));
		
		//导航标示
		$this->_menu_unique = 'post';

		//标签
		$this->_tags = Tag::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}
	
  /**
   * 首页
   */
  public function actionIndex() {  
    $catalog_id = trim( $this->_request->getParam( 'catalog_id' ) );
    $order = trim( $this->_request->getParam( 'order' ) );
    $keyword = trim( $this->_request->getParam( 'keyword' ) );
    $catalog = Catalog::model()->findByPk($catalog_id);   
	if(!$order){
		$order = 'id';
	}
	switch($order){
		case 'id':
			$order_by = 't.id DESC';
			break;
		case 'view_count':
			$order_by = 'view_count DESC';
			break;
		default:
			$order = 'id';
			$order_by = 't.id DESC';
			break;
	}
	
    //调取子孙分类和当前分类
    $catalog_ids = Catalog::get($catalog?$catalog_id:0, $this->_catalog);  
    $children_ids = Helper::array_key_values($catalog_ids, 'id');     
    $catalog_id?$all_ids = array_merge($children_ids, (array)$catalog_id):$all_ids = $children_ids;   
    $db_in_ids = implode(',',$all_ids);   
    if(!$db_in_ids || ($catalog_id && $catalog->type != $this->_type_ids['post'])){
	    throw new CHttpException(404,Yii::t('common','The requested page does not exist.'));
    }
    //SEO
    $navs = array();
    if($catalog){
    	$this->_seoTitle = $catalog->seo_title?$catalog->seo_title:$catalog->catalog_name.' - '.$this->_setting['site_name'];
    	$this->_seoKeywords = $catalog->seo_keywords;
    	$this->_seoDescription = $catalog->seo_description; 
    	$navs[] = array('url'=>$this->createUrl('post/index', array('catalog_id'=>$catalog->id)),'name'=>$catalog->catalog_name);   	
    }else{ 
    	$this->_seoTitle = Yii::t('common','PostListTitle').' - '.$this->_setting['site_name'];
    	$this->_seoKeywords = Yii::t('common','PostListKeywords');
    	$this->_seoDescription = Yii::t('common','PostListDescription',array('{site_name}'=>$this->_setting['site_name']));
    	$navs[] = array('url'=>$this->_request->getUrl(),'name'=>$this->_seoTitle);  
    }
    //查询条件
    $post = new Post();
    $criteria = new CDbCriteria();
    $condition = "t.status = 'Y'";
    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
   
    $criteria->condition = $condition;
    $criteria->order = $order_by;
    $criteria->with = array ( 'catalog' );
    $criteria->select = "title, t.id,t.title_style, t.attach_thumb, t.image_list, t.copy_from, t.copy_url, t.update_time,t.introduce, t.tags, t.view_count";
   
    //分页
    $count = $post->count( $criteria );    
    $pages = new CPagination( $count );
    $pages->pageSize = 15;
    
    $criteria->limit = $pages->pageSize;
    $criteria->offset = $pages->currentPage * $pages->pageSize;
    
    $datalist = $post->findAll($criteria);   
    
    //最近的文章
    $last_posts = Post::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.') AND status="Y"','order'=>'t.id DESC','limit'=>10,));
    
    //加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
	
    $this->render( 'index', array('navs'=>$navs, 'posts'=>$datalist,'pagebar' => $pages, 'tags'=>$tags, 'last_posts'=>$last_posts,'order'=>$order));
  }
  
  /**
   * 浏览详细内容
   */
  public function actionView( $id ) {  	
    $post = Post::model()->findByPk( intval( $id ) );
    if ( false == $post  || $post->status == 'N')
        throw new CHttpException( 404, Yii::t('common','The requested page does not exist.') );
    //更新浏览次数
    $post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
    //seo信息
    $this->_seoTitle = empty( $post->seo_title ) ? $post->title  .' - '. $this->_setting['site_name'] : $post->seo_title;
    $this->_seoKeywords = empty( $post->seo_keywords ) ? $post->tags  : $post->seo_keywords;
    $this->_seoDescription = empty( $post->seo_description ) ? $this->_seoDescription: $post->seo_description;
       
  	//加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/view.css");    		
	Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
	
	//加载SyntaxHighlighter(有需要可以自行开启)
	//Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/SyntaxHighlighter/shCoreDefault.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/SyntaxHighlighter/shCore.js",CClientScript::POS_END);
	
	
	//最近的文章
	$last_posts = Post::model()->findAll(array('condition'=>'catalog_id = '.$post->catalog_id,'order'=>'id DESC','limit'=>10,));
    
	//nav
	$navs = array();
	$navs[] = array('url'=>$this->createUrl('post/view',array('id'=>$id)), 'name'=>$post->title);
    $tplVar = array(
        'post'=>$post,     
        'navs'=>$navs,
    	'last_posts'=>$last_posts
    );
    $this->render( 'view', $tplVar);
  }
  
  /**
   * ajax操作 (收藏、关注)
   * 
   */
  public function actionAjax(){  	
  	$uid = Yii::app()->user->id;
  	$ret = array();
  	if(!$uid){
  		$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You Need Login'));
  	}else{
  		$act = $this->_request->getParam('act');
  		$postid = $this->_request->getParam('id');
  		$post = Post::model()->findByPk($postid);
  		$type_id = $this->_type_ids['post'];
  		if(!$post){
  			$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Collect Failed'));
  		}else{
		  	$attention_mod = new Attention();
		  	$collect_mod = new Collect();		  	
	  		switch($act){
	  			case 'attention':
	  				//判断是否已经关注了
	  				$exist_attention = $attention_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid'=>$uid, ':cid'=>$postid, ':type_id'=>$type_id));
	  				if($exist_attention){
	  					$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You Have Attented it'));
	  				}else{
		  				//关注
		  				$attention_mod->cid = $postid;
		  				$attention_mod->title = $post->title;
		  				$attention_mod->user_id = $uid;
		  				$attention_mod->url = $this->_request->hostinfo.$this->createUrl('post/view', array('id'=>$postid));
		  				$attention_mod->type = $type_id;
		  				$attention_mod->create_time = time();
		  				if($attention_mod->save()){
		  					$post->updateCounters(array ('attention_count' => 1 ), 'id=:id', array ('id' => $postid ));
		  					$ret = array('state'=>'success', 'message'=>Yii::t('common', 'Attent Success'), 'count'=>$post->attention_count+1);
		  				}else{
		  					$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Attent Failed'));
		  				}
	  				}
	  				break;
  				case 'collect':
  					//判断是否已经收藏
  					$exist_collect = $collect_mod->find('user_id=:uid AND cid=:cid AND type=:type_id', array(':uid'=>$uid, ':cid'=>$postid, ':type_id'=>$type_id));
  					if($exist_collect){
  						$ret = array('state'=>'error', 'message'=>Yii::t('common', 'You Have Collected it'));
  					}else{
	  					//收藏
	  					$collect_mod->cid = $postid;
	  					$collect_mod->title = $post->title;
	  					$collect_mod->user_id = $uid;
	  					$collect_mod->url = $this->_request->hostinfo.$this->createUrl('post/view', array('id'=>$postid));
	  					$collect_mod->type = $type_id;
	  					$collect_mod->create_time = time();
	  					if($collect_mod->save()){
	  						$post->updateCounters(array ('favorite_count' => 1 ), 'id=:id', array ('id' => $postid ));
	  						$ret = array('state'=>'success', 'message'=>Yii::t('common', 'Collect Success'), 'count'=>$post->favorite_count+1);
	  					}else{
	  						$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Collect Failed'));
	  					}
  					}
  					break;
	  			default:
	  				$ret = array('state'=>'error', 'message'=>Yii::t('common', 'Operation Failed'));
	  				break;
	  		}
		  			  	
  		}
  	}
  	exit(CJSON::encode($ret));
  }
  
}
