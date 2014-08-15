<?php

class AdminModule extends CWebModule
{
	public $defaultController = 'default';
	public $assetsUrl;  //样式目录
	public function init()
	{		
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'application.extensions.*',
			'admin.models.*',
			'admin.components.*',
		));
		
		//这里是用来区分前后台的session，为用户名session添加了一个admin
		Yii::app()->setComponents(array(
			'user' => array(
				'stateKeyPrefix' => 'admin',
				'loginUrl'=>Yii::app()->createUrl('/admin/default/login'),									
			),
			'errorHandler'=>array(
			// use 'site/error' action to display errors
				'errorAction'=>'/admin/default/error',
			),
		)
		);
		//设定跳转url
		Yii::app()->user->setReturnUrl(Yii::app()->createUrl('admin'));
		
		//发布样式资源
		$this->assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets'));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here			
			return true;
		}
		else
			return false;
	}
	
	
}
