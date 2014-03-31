<?php
/**
 * 
 * 后端控制类  所有控制器需要验证
 * @author zhaojinhan <326196998@qq.com>
 * @copyright Copyright (c) 2014-2015 Personal. All rights reserved.
 * @link http://yiicms.icode100.com
 * @version v1.0.0
 * 
 */
class Backend extends BackendBase
{
	
	public function init(){		
		parent::init();
		parent::auth();
	}
	/**
	 * 权限控制
	 * 
	 * @param key Controller Name
	 * @pamra value Action Name
	 * 
	 * @return array
	 */
	public function acl(){
		$acl = array(
			'default' => 'login',       //后台登录
			'setting' => array('seo','upload','template','custom'), //网站设置
				
		);
		return $acl;
	}
	
	/**
	 * 校验权限
	 * 
	 * @param string $acl
	 * @return boolean
	 */
	public function checkAcl($acl=''){
		$bool = false;
		$groupid = Yii::app()->user->groupid;
		if($groupid && $acl){
			$group = UserGroup::model()->findByPk($groupid);			
			if($group->acl){
				if($groupid == $this->_adminGroupID && $group->acl == 'Administrator'){
					$bool = true;
				}else {
					$acl = str_replace('/', '|', $acl);				
					if(strstr($group->acl, $acl)){
						$bool = true;
					}
				}			
			}
		}
		return $bool;		
	}
}