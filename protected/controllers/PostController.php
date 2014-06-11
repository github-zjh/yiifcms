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
		$this->_catalog = Catalog::model()->findAll('status_is=:status AND type = :type',array(':status'=>'Y',':type'=>'article'));
		//导航标示
		$this->_menu_unique = 'post';

		//标签
		$this->_tags = PostTags::model()->findAll(array('order'=>'data_count DESC','limit'=>20));
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'MyCaptchaAction',
						'backColor'=>0xCCCCCC,  //背景色
						'foreColor'=> 0x3C5880,	//前景色
						//'fontFile' => $this->_webRoot.'/static/public/fonts/maturasc.ttf', //自定义字体
						'padding'=>0,
						'width' => 90,
						'height'=>30,
						'minLength'=>4,
						'maxLength'=>6,
						'testLimit'=>0,   //不限制输错次数
						'offset' => 2,    //字符间距
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
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
    $condition = "t.status_is = 'Y'";
    $keyword && $condition .= ' AND title LIKE \'%' . $keyword . '%\'';
    $condition .= ' AND catalog_id IN ('.$db_in_ids.')';
   
    $criteria->condition = $condition;
    $criteria->order = 'view_count DESC, t.id DESC';
    $criteria->with = array ( 'catalog' );
    $criteria->select = "title, id,t.title_style, t.attach_thumb, t.image_list, t.copy_from, t.copy_url, t.last_update_time,t.intro, t.tags, t.view_count";
   
    //分页
    $count = $post->count( $criteria );    
    $pages = new CPagination( $count );
    $pages->pageSize = 10;
    
    $criteria->limit = $pages->pageSize;
    $criteria->offset = $pages->currentPage * $pages->pageSize;
    
    $datalist = $post->findAll($criteria);   
    
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
        throw new CHttpException( 404, Yii::t('common','The requested page does not exist.') );
    //更新浏览次数
    $post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
    //seo信息
    $this->_seoTitle = empty( $post->seo_title ) ? $post->title  .' - '. $this->_setting['site_name'] : $post->seo_title;
    $this->_seoKeywords = empty( $post->seo_keywords ) ? $this->_seoKeywords  : $post->seo_keywords;
    $this->_seoDescription = empty( $post->seo_description ) ? $this->_seoDescription: $post->seo_description;
    $catalogArr = Catalog::model()->findByPk($post->catalog_id);
    
  	//加载css,js	
    Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/view.css");
    Yii::app()->clientScript->registerCssFile($this->_static_public . "/js/kindeditor/code/prettify.css");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
	Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/kindeditor/code/prettify.js",CClientScript::POS_END);
	
	//评论内容
	$comments = PostComment::model()->findAll("post_id=:post_id AND status_is=:status order by id DESC" , array(":post_id"=>$id, ":status"=>'Y'));
	
	//nav
	$navs = array();
	$navs[] = array('url'=>$this->createUrl('post/view',array('id'=>$id)), 'name'=>$post->title);
    $tplVar = array(
        'post'=>$post,     
        'navs'=>$navs,
        'comments'=>$comments
    );
    $this->render( 'view', $tplVar);
  }

  /**
   * 提交评论
   *
   * @return [type] [description]
   */
  public function actionPostComment() {
    $nickname = trim( $this->_request->getParam( 'nickname' ) );
    $post_id = trim( $this->_request->getParam( 'post_id' ) );
    $user_id = trim( $this->_request->getParam( 'user_id' ) );
    $comment = trim( $this->_request->getParam( 'content' ) );
    $code = trim( $this->_request->getParam( 'code' ) );
   
    try {        
      $post_comment = new PostComment();
      
      $post_comment ->attributes = array(
      		'post_id'=> $post_id,
      		'user_id'=> $user_id,
      		'nickname'=> $nickname,
      		'content'=> $comment,
      		'create_time' => time(),
      		'verifyCode' =>$code,
      		'status_is' =>'N',  //提交后需要审核
      );      
      
      if ( empty( $post_id ) ){
      	exit( CJSON::encode( array('state'=>'error','message'=>Yii::t('common','No Select Content')) ) );
      }      
      elseif ( empty( $comment )){
        exit( CJSON::encode( array('state'=>'error','message'=>Yii::t('common','No Comment')) ));
      }elseif(!$code  || !$post_comment->validate('verifyCode')){
      	exit( CJSON::encode( array('state'=>'error','message'=>Yii::t('common','VefifyCode Error')) ) );
      }

      if ( $post_comment->save() ) {
        $var['state'] = 'success';
        $var['message'] = Yii::t('common','Submit Success, Waiting Pass');
      }else {
        throw new Exception( CHtml::errorSummary( $post_comment, null, null, array ( 'firstError' => '' ) ) );
      }
      
    } catch ( Exception $e ) {
      $var['state'] = 'error';
      $var['message'] = Yii::t('common','Catch Error').'：'.$e->getMessage();
    }
    exit( CJSON::encode( $var ) );
  }
}
