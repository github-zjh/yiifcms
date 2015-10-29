<?php

/**
 *  后台关键词提取
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class KeywordAction extends CAction {

    public function run() {

        Yii::createComponent('application.extensions.autokeyword.AutoKeyword');
        $title = trim(Yii::app()->request->getParam('title'));
        $content = trim(Yii::app()->request->getParam('content'));
        //$return  = XAutoKeyword::discuz($string);		
        $return = AutoKeyword::simple($title, $content, 5);
        if ($return == 'empty') {
            $data['state'] = 'error';
            $data['message'] = Yii::t('admin', 'Failed Get');
        } else {
            $data['state'] = 'success';
            $data['message'] = Yii::t('success', 'Success Get');
            $data['datas'] = $return;
        }
        exit(CJSON::encode($data));
    }

}
