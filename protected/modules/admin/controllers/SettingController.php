<?php

class SettingController extends Backend
{
	
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','seo','upload','custom'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * 取配置数据
	 *
	 */
	public function loadData ($conditions='scope=:scope', $params=array('scope'=>'base'))
	{
		if($conditions){
			$model = Setting::model()->findAll($conditions,$params);
		}else{
			$model = Setting::model()->findAll();
		}
		foreach ($model as $key => $row) {
			$setting[$row['variable']] = $row['value'];
		}
		return $setting;
	
	}
	
	
	/**
	 * seo设置
	 *
	 */
	public function actionSeo ()
	{
		self::_updateData($_POST['Setting'], 'seo');
		$this->render('seo', array ('setting' => self::loadData('scope=:scope',array('scope'=>'seo'))));
	}
	
	/**
	 * 附件设置
	 */
	public function actionUpload(){
		self::_updateData($_POST['Setting'], 'upload');
		$this->render('upload', array ('setting' => self::loadData('scope=:scope',array('scope'=>'upload')) ));
	}
	
	/**
	 * 模板设置
	 */
	public function actionTemplate(){
		self::_updateData($_POST['Setting'], 'template');
		//主题列表
		$themes_path = dirname($this->_basePath).DIRECTORY_SEPARATOR.dirname($this->_theme->baseUrl);
		if(is_dir($themes_path) && $handle = opendir($themes_path)){
			while(false !== ($file = readdir ( $handle ))){
				if($file != "." && $file != ".."&&!strpos($file,".")){
					//只读取文件夹目录
					$themes[] = $file;
				}
			}
		}		
		$this->render('template', array ('setting' => self::loadData('scope=:scope',array('scope'=>'template')) ,'themes'=>$themes));
	}
	
	/**
	 * 自定义字段
	 */
	public function actionCustom ()
	{
		self::_updateData($_POST['Setting'], 'custom');
		$this->render('custom', array ('setting' => self::loadData('scope=:scope',array('scope'=>'custom'))));
	}
	
	/**
	 * 更新数据
	 *
	 */
	private function _updateData ($data, $scope = 'base')
	{
		if ($this->method() == 'POST') {
			foreach ((array) $data as $key => $row) {
				$row = $this->addslashes($row);
				$connection = Yii::app()->db->createCommand("REPLACE INTO {{setting}}(`scope`, `variable`, `value`) VALUES('$scope','$key', '$row') ")->execute();
			}			
			$this->message('success', '更新完成', $this->createUrl($this->action->id));
		}
	
	}
	

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Setting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->variable));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model= new Setting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->variable));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		self::_updateData($_POST['Setting']);
        $this->render('index', array ('setting' => self::loadData() ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Setting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Setting']))
			$model->attributes=$_GET['Setting'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
