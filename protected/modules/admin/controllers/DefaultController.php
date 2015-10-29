<?php
/**
 * 默认后端控制器类
 *
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class DefaultController extends BackendBase
{		
	public $setting_base = array();
	public function init(){		
		parent::init();
		$config = Setting::model()->findAll('scope=:scope',array(':scope'=>'base'));
		foreach ($config as $row) {
			$this->setting_base[$row['variable']] = $row['value'];
		}		
	}
    
    //所有动作
    public function actions()
    {
        $extra_actions = array(
            'captcha'=>array(
                'class'=>'MyCaptchaAction',
                'backColor'=>0xf4f4f4,  //背景色		
                'foreColor'=> 0x3C5880,	//前景色			
                'fontFile' => $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
                'padding'=>0,
                'width' => 90,
                'height'=>30,
                'minLength'=>4,
                'maxLength'=>4,
                'testLimit'=>0,   //不限制输错次数
                'offset' => 2,    //字符间距		
            ),
        );
        $actions = $this->actionMapping(array(
            'index'    => 'Index',        //后台菜单
            'home'     => 'Home',         //后台首页
            'login'    => 'Login',        //后台登录
            'logout'   => 'Logout',       //后台退出
            'error'    => 'Error',        //错误显示页
            'keyword'  => 'Keyword',      //获取关键词            
         
        ), 'application.modules.admin.controllers.default');
        return array_merge($actions, $extra_actions);
    }
    
    /**
	 * 动作权限控制
     * 
     * @see CController::beforeAction()
	 */
	public function beforeAction($action){		       
		$action_id  = strtolower($action->id);
        if(in_array($action_id, array('index', 'home', 'keyword'))) {
            parent::auth();
        }		
		return true;
	}
	
}
