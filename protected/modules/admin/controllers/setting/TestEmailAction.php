<?php
/**
 *  测试发送邮件
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class TestEmailAction extends CAction
{	
	public function run(){		
        if(Yii::app()->request->isPostRequest && $_POST['ajax'] == 1){
			$toemail = $_POST['toemail'];
			if(Helper::sendMail('',$toemail,Yii::t('admin','Test Email Subject'),Yii::t('admin','Test Email Content'))){
				exit(CJSON::encode(array('state'=>'success')));
			}else{
				exit(CJSON::encode(array('state'=>'failed')));
			}
		}else{
			exit(CJSON::encode(array('state'=>'failed')));
		}
	}
}