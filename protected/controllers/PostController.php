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
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status_is=:status AND type = :type',array(':status'=>'Y',':type'=>'article'));
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
    	$navs = $catalog->catalog_name;   	
    }else{ 
    	$this->_seoTitle = Yii::t('common','PostListTitle').' - '.$this->_setting['site_name'];
    	$this->_seoKeywords = Yii::t('common','PostListKeywords');
    	$this->_seoDescription = Yii::t('common','PostListDescription',array('{site_name}'=>$this->_setting['site_name']));
    	$navs = $this->_seoTitle;
    }
    //查询条件
    $post = new Post();
    $criteria = new CDbCriteria();
    $condition = "t.status_is = 'Y'";
    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
   
    $criteria->condition = $condition;
    $criteria->order = 'view_count DESC, t.id DESC';
    $criteria->with = array ( 'catalog' );
    $criteria->select = "title, id, t.image_list, t.last_update_time,t.intro, t.tags, t.view_count";
   
    //分页
    $count = $post->count( $criteria );    
    $pages = new CPagination( $count );
    $pages->pageSize = 10;
    
    $criteria->limit = $pages->pageSize;
    $criteria->offset = $pages->currentPage * $pages->pageSize;
    
    $datalist = $post->findAll($criteria);
   
    //标签
    $tags = PostTags::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
    
    //最近的文章
    $last_posts = Post::model()->findAll(array('condition'=>'catalog_id IN ('.$db_in_ids.')','order'=>'id DESC','limit'=>10,));
    
    //加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/list.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");	
	
    $this->render( 'index', array('navs'=>$navs, 'posts'=>$datalist,'pagebar' => $pages, 'tags'=>$tags, 'last_posts'=>$last_posts));
  }
  
  /**
   * 浏览详细内容
   */
  public function actionView( $id ) {
    $post = Post::model()->findByPk( intval( $id ) );
    if ( false == $post )
        throw new CHttpException( 404, '内容不存在' );
    //更新浏览次数
    $post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
    //seo信息
    $this->_seoTitle = empty( $post->seo_title ) ? $post->title  .' - '. $this->_setting['site_name'] : $post->seo_title;
    $this->_seoKeywords = empty( $post->seo_keywords ) ? $this->_seoKeywords  : $post->seo_keywords;
    $this->_seoDescription = empty( $post->seo_description ) ? $this->_seoDescription: $post->seo_description;
    $catalogArr = Catalog::model()->findByPk($post->catalog_id);
    
  	//加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/view.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	
    $tplVar = array(
        'post'=>$post,     
        'catalogArr'=>$catalogArr,
        
    );
    $this->render( 'view', $tplVar);
  }

  /**
   * 提交评论
   *
   * @return [type] [description]
   */
  public function actionPostComment() {

    $nickname = trim( $this->_gets->getParam( 'nickname' ) );
    $email = trim( $this->_gets->getParam( 'email' ) );
    $postId = trim( $this->_gets->getParam( 'postId' ) );
    $comment = trim( $this->_gets->getParam( 'comment' ) );
    try {
      if ( empty( $postId ) )
        throw new Exception( '编号丢失' );
      elseif ( empty( $nickname ) || empty( $email ) ||  empty( $comment ) )
        throw new Exception( '昵称、邮箱、内容必须填写' );
      $bagecmsPostCommentModel = new PostComment();

      $bagecmsPostCommentModel ->attributes = array(
          'post_id'=> $postId,
          'nickname'=> $nickname,
          'email'=> $email,
          'content'=> $comment,
      );

      if ( $bagecmsPostCommentModel->save() ) {
        $var['state'] = 'success';
        $var['message'] = '提交成功';
      }else {
        throw new Exception( CHtml::errorSummary( $bagecmsPostCommentModel, null, null, array ( 'firstError' => '' ) ) );
      }
      
    } catch ( Exception $e ) {
      $var['state'] = 'error';
      $var['message'] = '出现错误：'.$e->getMessage();
    }
    exit( CJSON::encode( $var ) );
  }
}
