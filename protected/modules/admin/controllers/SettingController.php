<?php
/**
 * 网站设置控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SettingController extends Backend
{	
    //所有动作
    public function actions()
    {
        $extra_actions = array();
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //站点设置
            'seo'      => 'Seo',          //SEO设置
            'template' => 'Template',     //模板设置
            'cache'    => 'Cache',        //缓存设置 
            'access'   => 'Access',       //访问控制设置
            'email'    => 'Email',        //邮件设置
            'testEmail'=> 'TestEmail',    //测试发送邮件
            'custom'   => 'Custom',       //自定义设置
        ), 'application.modules.admin.controllers.setting');
        return array_merge($actions, $extra_actions);
    } 
	
	/**
	 * 更新数据
	 *
	 */
	public function updateData ($data, $scope = 'base')
	{		
		if (Yii::app()->request->isPostRequest) {			
			foreach ((array) $data as $key => $row) {
				$row = Helper::mixaddslashes($row);
				Yii::app()->db->createCommand("REPLACE INTO {{setting}}(`scope`, `variable`, `value`) VALUES('$scope','$key', '$row') ")->execute();
			}			
			$this->message('success', '更新完成', $this->createUrl($this->action->id));
		}
	
	}	

}
