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
		$this->_catalog = Catalog::model()->findAll('status_is=:status',array('status'=>'Y'));
	}
  /**
   * 首页
   */
  public function actionIndex() {  	
    $catalog = trim( $this->_request->getParam( 'catalog' ) );
    $keyword = trim( $this->_request->getParam( 'keyword' ) );
    $tpl = 'list_post';
    $this->_seoTitle = '文章列表 - '.$this->_setting['site_name'];
    $this->render( $tpl);
  }

  /**
   * 获取栏目内容数据
   *
   * @param array   $params
   * @return array  数组
   */
  protected function _catalogList( $params = array() ) {

    $postModel = new Post();
    $postCriteria = new CDbCriteria();
    $condition = '1';
    if ( $params['catalog'] ) {
      $condition .= ' AND t.catalog_id=:catalogId';
      $criteriaParams[':catalogId'] = intval($params['catalog']);
    }
    if ( $params['keyword'] ) {
      $condition .= ' AND t.title=:title';
      $criteriaParams[':title'] = CHtml::encode(strip_tags($params['keyword']));
    }
    $postCriteria->condition = $condition;
    $postCriteria->params = $criteriaParams;
    $postCriteria->order = 't.id DESC';
    $postCriteria->with = 'catalog';
    $count = $postModel->count( $postCriteria );
    $postPages = new CPagination( $count );
    $postPages->pageSize = $params['pageSize'] > 0 ? $params['pageSize'] : 10 ;
    $pageParams = $this->buildCondition( $_GET, array ( 'catalog', 'keyword'  ) );
    $postPages->params = is_array( $pageParams ) ? $pageParams : array ();
    $postCriteria->limit = $postPages->pageSize;
    $postCriteria->offset = $postPages->currentPage * $postPages->pageSize;
    $bagecmsDataList = $postModel->findAll( $postCriteria );
    $catalogArr =  $this->_catalog;
    if($catalogArr){
      $this->_seoTitle = empty($catalogArr['catalog_name'])? $this->_seoTitle : $catalogArr['catalog_name'];
      $bagecmsCatalogData = $catalogArr;
      $this->_seoKeywords = empty($catalogArr['seo_keywords'])? $this->_seoKeywords : $catalogArr['seo_keywords'];
      $this->_seoDescription = empty($catalogArr['seo_description'])? $this->_seoDescription : $catalogArr['seo_description'];
    }
    return array( 'bagecmsDataList'=>$bagecmsDataList, 'bagecmsPagebar'=>$postPages, 'bagecmsCatalogData'=>$bagecmsCatalogData );
  }

  /**
   * 栏目数据读取
   *
   * @param array
   * @return [type]
   */
  protected function _catalogItem( $params = array() ) {
    $catalogModel = Catalog::model()->findByPk( intval($params['catalog']) );
    if ( $catalogModel ){
      $this->_seoTitle = empty($catalogModel->seo_title)? $catalogModel->catalog_name : $catalogModel->seo_title;
      $this->_seoKeywords = $catalogModel->seo_keywords;
      $this->_seoDescription = $catalogModel->seo_description;
      return array( 'bagecmsCatalogShow'=>$catalogModel);
    }else{
      throw new CHttpException( 404, '内容不存在' );
    }
  }

  /**
   * 浏览详细内容
   */
  public function actionShow( $id ) {
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

    if($post->template){
      $tpl = $post->template;
    }elseif($catalogArr['template_show']){
       $tpl = $catalogArr['template_show'];
    }else{
        $tpl = 'show_post';
    }
    //自定义数据
    //$attrVal = AttrVal::model()->findAll(array('condition'=>'post_id=:postId','with'=>'attr', 'params'=>array('postId'=>$post->id)));

    $tplVar = array(
        'post'=>$post,
        'attrVal'=>$attrVal,
        'catalogArr'=>$catalogArr,
        
    );
    $this->render( $tpl, $tplVar);
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
