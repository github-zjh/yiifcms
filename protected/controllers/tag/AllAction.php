<?php

/**
 *  所有Tag列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class AllAction extends CAction {

    public function run() {
        $criteria = new CDbCriteria();
        $criteria->select = 'tag_name, data_count';
        $criteria->order = 'data_count DESC';
        $tags = Tag::model()->findAll($criteria);

        //SEO
        $this->controller->_seoTitle = Yii::t('common', 'All Tags') . ' - ' . $this->controller->_setting['site_name'];
        $navs[] = array('url' => Yii::app()->request->getUrl(), 'name' => Yii::t('common', 'All Tags'));

        $this->controller->render('all', array('navs' => $navs, 'tags' => $tags));
    }

}
