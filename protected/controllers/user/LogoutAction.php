<?php
/**
 * 退出
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved. 
 */


class LogoutAction extends CAction
{	
	public function run(){
        Yii::app()->user->logout(false);
		$this->controller->redirect(Yii::app()->homeUrl);	
	}

}
