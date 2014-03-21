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
	
}