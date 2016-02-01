<?php

/**
 *  文章详情
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class ViewAction extends CAction {

    public function run() {
        $id = Yii::app()->request->getParam('id');
        $post = Post::model()->with('content')->findByPk(intval($id));
        if (false == $post || $post->status == 'N') {
            throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));        
        }
        //更新浏览次数
        $post->updateCounters(array('view_count' => 1), 'id=:id', array('id' => $id));
        //seo信息
        $this->controller->_seoTitle = empty($post->content->seo_title) ? $post->title . ' - ' . $this->controller->_setting['site_name'] : $post->content->seo_title;
        $this->controller->_seoKeywords = empty($post->content->seo_keywords) ? $post->tags : $post->content->seo_keywords;
        $this->controller->_seoDescription = empty($post->content->seo_description) ? $this->controller->_seoDescription : $post->content->seo_description;
        
        //最近的文章
        $last_posts = Post::model()->findAll(array('condition' => 'catalog_id = ' . $post->catalog_id, 'order' => 'id DESC', 'limit' => 20,));

        //nav
        $navs = array();
        $navs[] = array('url' => $this->controller->createUrl('post/view', array('id' => $id)), 'name' => $post->title);
        $tplVar = array(
            'post' => $post,
            'navs' => $navs,
            'last_posts' => $last_posts
        );
        $this->controller->render('view', $tplVar);
    }
}
