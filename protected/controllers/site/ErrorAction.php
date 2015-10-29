<?php
/**
 *  前端错误显示业
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class ErrorAction extends CAction
{	
	public function run(){
		if(($error=Yii::app()->errorHandler->error))
		{
			if(Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
            } else{
				//加载css,js
				Yii::app()->clientScript->registerCssFile($this->controller->_stylePath . "/css/error.css");	
				Yii::app()->clientScript->registerScriptFile($this->controller->_static_public . "/js/jquery/jquery.js");
				$this->controller->_seoTitle = Yii::t('common','Notice Message').' - '.$this->controller->_setting['site_name'];
				$this->controller->render('error', $error);
			}
		}      
	}
}