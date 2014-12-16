<?php
/**
 * 留言反馈控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class QuestionController extends FrontBase
{	
	protected $_menu_unique;
	
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'question';	
	}
	
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'MyCaptchaAction',
						'backColor'=>0xCCCCCC,  //背景色
						'foreColor'=> 0x3C5880,	//前景色
						'fontFile' => $this->_fonts.'/fonts/BRITANIC.TTF', //自定义字体
						'padding'=>0,
						'width' => 90,
						'height'=>30,
						'minLength'=>6,
						'maxLength'=>6,
						'testLimit'=>0,   //不限制输错次数
						'offset' => 2,    //字符间距
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		$model=new Question('create');
		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			$model->client_ip = $this->_request->userHostAddress;
			$model->create_time = time();
			if($model->save()){
				$this->message('success',Yii::t('common','Question Submit Success'), $this->_request->getUrl());
			}
		}
		
		//SEO
		$this->_seoTitle = Yii::t('common','Question Title'). ' - '.$this->_setting['site_name'];
		$this->_seoKeywords = Yii::t('common','Question Keywords');
		$this->_seoDescription = Yii::t('common','Question Description');
		
		//导航
		$navs[] = array('url'=>$this->_request->getUrl(),'name'=>Yii::t('common','Question Title'));
		
		//加载样式表
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/question.css");
		Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
		
		$this->render('index',array('model'=>$model,'navs'=>$navs));
	}
	
}
