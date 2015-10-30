<?php

/**
 *  单页详情
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class IndexAction extends CAction {

    public function run() {
        $id = Yii::app()->request->getParam('id');
        $page = Page::model()->find('id=:id AND status=:status', array(':id' => $id, ':status' => 'Y'));
        if (!$page) {
            throw new CHttpException(404, Yii::t('common', 'The requested page does not exist.'));
        }

        //SEO
        $this->controller->_seoTitle = $page->seo_title ? $page->seo_title : $page->title . ' - ' . $this->controller->_setting['site_name'];
        $this->controller->_seoKeywords = $page->seo_keywords;
        $this->controller->_seoDescription = $page->seo_description;

        //更新浏览次数
        $page->updateCounters(array('view_count' => 1), 'id=:id', array('id' => $id));

        //所有单页
        $pagelists = Page::model()->findAll('status=:status ORDER BY sort_order, id', array(':status' => 'Y'));
        $this->controller->_menu_unique = $id;

        //导航
        $navs[] = array('url' => Yii::app()->request->getUrl(), 'name' => $page->title);
        $this->controller->render('index', array('page' => $page, 'navs' => $navs, 'pagelists' => $pagelists));
    }

}
