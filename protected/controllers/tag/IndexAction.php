<?php

/**
 *  Tag列表
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class IndexAction extends CAction {

    public function run() {        
        $tags = preg_replace('/(\s)+/', ',', trim(Yii::app()->request->getParam('tag')));
        $tag_ids = array();
        if($tags) {
            $arr_tag = explode(',', $tags);
            foreach ($arr_tag as $tag) {
                $t = Tag::model()->find('tag_name = :tn', array(':tn' => $tag));
                $t && $tag_ids[] = $t->id;
            }
        } else {
            $alltags = Tag::model()->findAll(array('order' => 'data_count'));
            foreach ((array) $alltags as $tv) {
                $tag_ids[] = $tv->id;
            }
        }     
        
        $datas = array();
        $td = new TagData();        
        $criteria = new CDbCriteria();        
        $criteria->addColumnCondition(array('status' => 'Y'));        
        $criteria->addInCondition('tag_id', $tag_ids);
        $criteria->group = 'content_id, type';
        
        //分页
        $count = $td->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 10;

        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;

        $tddata = $td->findAll($criteria);
        if($tddata) {
            foreach ($tddata as $value) {
                $modelType = ModelType::model()->findByPk($value->type);
                $model = $modelType->model;
                $value['type'] = $modelType->type_key;
                $value['data'] = $model::model()->findByPk($value->content_id);
                if($value['data']) {
                    $datas[] = $value;
                }            
            }
        }

        //SEO
        $this->controller->_seoTitle = $tags ? $tags . ' - ' . $this->controller->_setting['site_name'] : '所有标签 - ' . $this->controller->_setting['site_name'];
        $navs[] = array('url' => Yii::app()->request->getUrl(), 'name' => $tags ? $tags : '所有标签');
        
        $this->controller->render('index', array('navs' => $navs, 'datas' => $datas, 'pagebar' => $pages, 'tags' => $tags));
    }

}
