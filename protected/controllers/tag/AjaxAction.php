<?php

/**
 *  ajax操作[收藏、关注]
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class AjaxAction extends CAction {

    public function run() {
       
        $tags = preg_replace('/(\s)+/', ',', trim(Yii::app()->request->getParam('tag')));
        $arr_tag = explode(',', $tags);
        foreach ((array) $arr_tag as $tag) {
            $t = Tag::model()->find('tag_name = :tn', array(':tn' => $tag));
            $t && $tag_ids[] = $t->id;
        }

        $ajax = Yii::app()->request->getParam('ajax');
        $data = array();
        $searchData = array();
        if ($tag_ids && $ajax == 1) {
            $td = new TagData();
            $condition = "status = 'Y'";
            $criteria = new CDbCriteria();
            $criteria->condition = $condition;
            $criteria->addInCondition('tag_id', $tag_ids);
            //分页
            $count = $td->count($criteria);
            $pages = new CPagination($count);
            $pages->pageSize = 10;

            $criteria->limit = $pages->pageSize;
            $criteria->offset = $pages->currentPage * $pages->pageSize;

            $tddata = $td->findAll($criteria);

            foreach ((array) $tddata as $value) {
                $modelType = ModelType::model()->findByPk($value->type);
                $model = $modelType->model;
                $value['type'] = $modelType->type_key;
                $value['data'] = $model::model()->findByPk($value->content_id, '', array('select' => 'id,title'));
                $data[] = $value;
            }
            foreach ($data as $key => $new) {
                $searchData[$key]['url'] = $this->controller->createUrl("{$new->type}/view", array('id' => $new->data->id));
                $searchData[$key]['title'] = $new->data->title;
            }
        }
        exit(CJSON::encode($searchData));
    }

}
