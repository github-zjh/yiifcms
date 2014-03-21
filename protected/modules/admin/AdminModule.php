<?php

class AdminModule extends CWebModule
{
	public $defaultController = 'default';
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
				'loginUrl'=>Yii::app()->createUrl('/admin/default/login')
			)
		)
		);
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
