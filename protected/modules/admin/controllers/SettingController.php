<?php
/**
 * 网站设置控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SettingController extends Backend
{
	
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),'','',true);
			return false;
		}
		return true;
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
		$themes_path = dirname($this->_theme->basePath);		
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
	 * 访问控制设置
	 *
	 */
	public function actionAccess ()
	{
		self::_updateData($_POST['Setting'], 'access');
		$this->render('access', array ('setting' => self::loadData('scope=:scope',array('scope'=>'access'))));
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
	 * 邮件设置
	 */
	public function actionEmail(){
		self::_updateData($_POST['Setting'], 'email');
		$this->render('email', array ('setting' => self::loadData('scope=:scope',array('scope'=>'email')) ));
	}
	
	/**
	 * 测试发送邮件
	 */
	public function actionTestEmail(){
		if($this->_request->isPostRequest && $_POST['ajax'] == 1){
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
	
	/**
	 * 更新数据
	 *
	 */
	private function _updateData ($data, $scope = 'base')
	{		
		if ($this->method() == 'POST') {
			if($scope == 'upload'){
				$size = ini_get('upload_max_filesize');
				$len = strlen($size);
				$byte = $size[$len-1];
				$num = substr($size, 0, $len-1);
				switch(strtoupper($byte)){
					case 'M':
						$fsize = $num*1024*1024;
						break;
					case 'K':
						$fsize = $num*1024;
						break;
					default:
						$fsize = $num;
						break;
				}
				$setting_upload_max_size = $data['upload_max_size']*1024;
				$setting_upload_alpha = $data['upload_water_alpha'];
				//校验输入的大小
				if($setting_upload_max_size > $fsize){
					$this->message('error',Yii::t('admin','More Than Env Limit', array('{size}'=>$size)));
				}
				//校验透明度
				if(!is_numeric($setting_upload_alpha) || $setting_upload_alpha <0 || $setting_upload_alpha>100){
					$this->message('error',Yii::t('admin','WaterMark Alpha Should Between 1 AND 100'));
				}
				//格式化附件类型
				$data['upload_allow_ext'] = trim(str_replace(array('，',' '), array(',',''), $data['upload_allow_ext']),', ');
				$explode_ext = explode(',',$data['upload_allow_ext']);
				$new_explode = array();
				foreach((array)$explode_ext as $ext){
					$tmp_ext = trim($ext,', ');
					if($tmp_ext){
						$new_explode[] = $tmp_ext;
					}
				}
				$str_exts = array_unique($new_explode);
				$data['upload_allow_ext'] = implode(',', $str_exts);
				
			}
			foreach ((array) $data as $key => $row) {
				$row = $this->addslashes($row);
				$connection = Yii::app()->db->createCommand("REPLACE INTO {{setting}}(`scope`, `variable`, `value`) VALUES('$scope','$key', '$row') ")->execute();
			}			
			$this->message('success', '更新完成', $this->createUrl($this->action->id));
		}
	
	}
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//检查crypt加密是否支持
		$crypt = true;
		if(!function_exists('crypt') || !defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
			$crypt = false;
		}
		self::_updateData($_POST['Setting']);
        $this->render('index', array ('setting' => self::loadData(),'crypt'=>$crypt ));
	}
	
}
