<?php

/**
 *  后台错误输出
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */
class ErrorAction extends CAction {

    public function run() {

        if (($error = Yii::app()->errorHandler->error)) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->controller->render('error', $error);
            }
        }
    }

}
