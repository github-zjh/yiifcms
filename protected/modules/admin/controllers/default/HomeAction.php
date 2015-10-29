<?php

/**
 *  后台首页
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class HomeAction extends CAction {

    public function run() {

        $data['serverSoft'] = $_SERVER['SERVER_SOFTWARE'];
        $data['serverOs'] = PHP_OS;
        $data['phpVersion'] = PHP_VERSION;
        $data['fileupload'] = ini_get('file_uploads') ? ini_get('upload_max_filesize') : Yii::t('admin', 'Forbidden to upload');
        $data['maxExcuteTime'] = ini_get('max_execution_time') . Yii::t('admin', 'Seconds');
        $data['maxExcuteMemory'] = ini_get('memory_limit');
        $data['allow_url_fopen'] = ini_get('allow_url_fopen') ? Yii::t('admin', 'Open') : Yii::t('admin', 'Close');
        $dbsize = 0;
        $connection = Yii::app()->db;
        //$sql = 'SHOW TABLE STATUS LIKE \'' . $connection->tablePrefix . '%\'';
        $sql = 'SHOW TABLE STATUS';
        $command = $connection->createCommand($sql)->queryAll();
        foreach ($command as $table) {
            $dbsize += $table['Data_length'] + $table['Index_length'];
        }
        $mysqlVersion = $connection->createCommand("SELECT version() AS version")->queryAll();
        $data['mysqlVersion'] = $mysqlVersion[0]['version'];
        $data['dbsize'] = Helper::byteFormat($dbsize);
        $this->controller->render('home', array('server' => $data));
    }
}
