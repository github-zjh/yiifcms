<?php
/**
 * 前端商品控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class GoodsController extends FrontBase
{
	protected $_catalog;
	
	public function init(){
		parent::init();
		//栏目
		$this->_catalog = Catalog::model()->findAll('status=:status',array('status'=>'Y'));
	}
  /**
   * 首页
   */
  public function actionIndex() {  	
    $catalog = trim( $this->_request->getParam( 'catalog' ) );
    $keyword = trim( $this->_request->getParam( 'keyword' ) );    
    $this->_seoTitle = '商品列表 - '.$this->_setting['site_name'];
    $this->render('index');
  }
  
  /**
   * 浏览详细内容
   */
  public function actionView( $id ) {
  	$post = Goods::model()->findByPk( intval( $id ) );
  	if ( false == $post || $post->status == 'N')
  		throw new CHttpException( 404, '内容不存在' );
  	//更新浏览次数
  	$post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
  	//seo信息
  	$this->_seoTitle = empty( $post->seo_title ) ? $post->title  .' - '. $this->_setting['site_name'] : $post->seo_title;
  	$this->_seoKeywords = empty( $post->seo_keywords ) ? $this->_seoKeywords  : $post->seo_keywords;
  	$this->_seoDescription = empty( $post->seo_description ) ? $this->_seoDescription: $post->seo_description;
  	$catalogArr = Catalog::model()->findByPk($post->catalog_id);
  
  	//自定义数据
  	//$attrVal = AttrVal::model()->findAll(array('condition'=>'post_id=:postId','with'=>'attr', 'params'=>array('postId'=>$post->id)));
  
  	$tplVar = array(
  			'post'=>$post,
  			'catalogArr'=>$catalogArr,
  
  	);
  	$this->render( 'view', $tplVar);
  }
  
}
 
