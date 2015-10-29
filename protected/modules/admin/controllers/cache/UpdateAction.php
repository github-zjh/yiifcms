<?php

/**
 *  缓存更新
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class UpdateAction extends CAction {

    public function run() {
        $cache = Yii::app()->request->getPost('cache');
        foreach ((array) $cache as $value) {
            if ($value == 'style') {
                //更新样式缓存
                $assets = ROOT_PATH . '/assets';
                if (is_dir($assets)) {
                    $dirs = Helper::scanfDir($assets, true);

                    //先删除文件
                    foreach ((array) $dirs['files'] as $file) {
                        $pathinfo = pathinfo($file);
                        if ($pathinfo['basename'] != 'README.md') {
                            @unlink($file);
                        }
                    }

                    // 再删除目录 
                    rsort($dirs['dirs']);  //降序
                    foreach ((array) $dirs['dirs'] as $dir) {
                        @rmdir($dir);
                    }
                }
            }
            if ($value == 'content') {

                $file_caches = Yii::app()->runtimePath . '/cache';
                if (is_dir($file_caches)) {
                    $dirs = Helper::scanfDir($file_caches, true);
                    if (isset($dirs['files']) && $dirs['files']) {
                        //先删除文件
                        foreach ($dirs['files'] as $file) {
                            @unlink($file);
                        }
                    }
                    if (isset($dirs['dirs']) && $dirs) {
                        // 再删除目录
                        rsort($dirs['dirs']);  //降序
                        foreach ($dirs['dirs'] as $dir) {
                            @rmdir($dir);
                        }
                    }
                }

                //更新内容缓存
                try {
                    Yii::app()->cache && Yii::app()->cache->flush();
                } catch (CHttpException $e) {
                    throw new CHttpException(500, Yii::t('admin', 'Cache Error Msg', array('{msg}' => $e->getMessage())));
                }
            }
        }
        $this->controller->message('success', Yii::t('admin', 'Update Cache Success'), $this->controller->createUrl('index'));
    }

}
