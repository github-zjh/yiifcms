<?php
/**
 *  查询
 * 
 * @author  Sim Zhao <326196998@qq.com>
 * @link    http://www.yiifcms.com/
 * @copyright   Copyright (c) 2014-2015. All rights reserved.
 */

class QueryAction extends CAction
{	
	public function run(){
        if(Yii::app()->request->isPostRequest) {
            $command = trim(Yii::app()->request->getParam('command'));
            $this->controller->execute($command);
        } else {
            $this->controller->render('query');        
        }
	}
}