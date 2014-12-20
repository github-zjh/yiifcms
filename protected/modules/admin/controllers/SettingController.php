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
	 * 站点设置
	 */
	public function actionIndex()
	{
		//检查crypt加密是否支持
		$crypt = true;
		if(!function_exists('crypt') || !defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
			$crypt = false;
		}
		self::_updateData($_POST['Setting']);
		$this->render('index', array ('setting' => Setting::loadData(),'crypt'=>$crypt ));
	}
	
	
	/**
	 * seo设置
	 *
	 */
	public function actionSeo ()
	{
		self::_updateData($_POST['Setting'], 'seo');
		$this->render('seo', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'seo'))));
	}
	
	/**
	 * 模板设置
	 */
	public function actionTemplate(){
		self::_updateData($_POST['Setting'], 'template');
		//主题列表		
		$themes_path = dirname(Yii::app()->theme->basePath);		
		if(is_dir($themes_path) && $handle = opendir($themes_path)){
			while(false !== ($file = readdir ( $handle ))){
				if($file != "." && $file != ".."&&!strpos($file,".")){
					//只读取文件夹目录
					$themes[] = $file;
				}
			}
		}		
		$this->render('template', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'template')) ,'themes'=>$themes));
	}
	

	/**
	 * 上传设置
	 */
	public function actionUpload(){
		self::_updateData($_POST['Setting'], 'upload');
		$this->render('upload', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'upload')) ));
	}
	
	
	/**
	 * 缓存设置
	 */
	public function actionCache(){
		if(isset($_POST) && $_POST['data']){
			$post = $_POST['data'];					
			
			//缓存类型
			$cache_type = $post['cache_type'];			
			
			//FileCache
			$data_filecache = array();
			$data_filecache['class'] = 'CFileCache';
			$data_filecache['directoryLevel'] = $post['filecache']['depth'];
			//Memcache
			$data_memcache = array();
			$data_memcache['class'] = 'CMemCache';
			$data_memcache['host'] = $post['memcache']['host'];
			$data_memcache['port'] = $post['memcache']['port'];
			//Redis
			$data_rediscache = array();
			$data_rediscache['class'] = 'ext.redis.CRedisCache';
			$data_rediscache['host'] = $post['rediscache']['host'];
			$data_rediscache['port'] = $post['rediscache']['port'];
			$data_rediscache['database'] = intval($post['rediscache']['database']);
			
			//配置文件路径
			$config_file = Yii::app()->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'cache.php';			
			
			//保存缓存配置
			switch($cache_type){
				case 'filecache':
					$data_cache = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'setting_filecache'));
					$data_cache->value = serialize($data_filecache);
					$data_cache->save();	
					if($data_filecache['class'] && $data_filecache['directoryLevel']) {
						//生成yii缓存配置
						$cache = array(
								'class'=>  $data_filecache['class'],
								'directoryLevel'=> $data_filecache['directoryLevel']
						);
					}							
					break;
				case 'memcache':
					$data_cache = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'setting_memcache'));
					$data_cache->value = serialize($data_memcache);
					$data_cache->save();
					if($data_memcache['class'] && $data_memcache['host'] && $data_memcache['port']) {
						//生成yii缓存配置
						$cache = array(
								'class'=> $data_memcache['class'],
								'servers'=> array(
										array(
												'host' =>$data_memcache['host'],
												'port' =>$data_memcache['port']
										)
								)
						);
					}					
					break;
				case 'rediscache':
					$data_cache = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'setting_rediscache'));
					$data_cache->value = serialize($data_rediscache);
					$data_cache->save();	
					if($data_rediscache['class'] && $data_rediscache['host'] && $data_rediscache['port']) {
						//生成yii缓存配置
						$cache = array(
								'class'=> $data_rediscache['class'],
								'servers'=> array(
										array(
												'host' =>$data_rediscache['host'],
												'port' => $data_rediscache['port'],
												'database' => $data_rediscache['database']?$data_rediscache['database']:0
										)
								)
						);
					}				
					break;					
					
			}
			
			//保存缓存类型
			$data_cache_type = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'cache_type'));
			$data_cache_type->value = $cache_type;
			$data_cache_type->save();		

			//若缓存可用  则写入新的配置文件
			if($cache){
				$cache = array('cache'=>$cache);				
				$old_cache_config = file_get_contents($config_file);

				//先清空配置文件
				file_put_contents($config_file, "<?php return array();?>");
				
				//测试缓存
				Yii::app()->setComponents($cache);
				try {
				    $yii_cache = Yii::app()->cache;	
					if($yii_cache) {
						try {
							$test = Yii::app()->cache->set('test','123456');
							Yii::app()->cache->delete('test');
						} catch (Exception $e){
							$error = Helper::safeEncoding($e->getMessage());
							$this->message('error',Yii::t('admin','Cache Error Msg', array('{cache}'=>$cache_type, '{msg}'=>$error)));
						}						
						if($test && $post['cache_status'] == 'open'){							
							$cache = var_export($cache, true);
							file_put_contents($config_file,"<?php\r\n\r\nreturn {$cache};\r\n\r\n?>");
						}
					}
				}catch (Exception $e){
					$error = Helper::safeEncoding($e->getMessage());
					$this->message('error',Yii::t('admin','Cache Error Msg', array('{cache}'=>$cache_type, '{msg}'=>$error)));
				}
			}	
						
			$this->message('success', Yii::t('admin','Update Success'));
		}else{		
			$cache_enable = false;
			$data = Setting::loadData('scope=:scope',array('scope'=>'cache'));
			$data['setting_filecache'] && $data['filecache'] = unserialize($data['setting_filecache']);	
			$data['setting_memcache'] && $data['memcache'] = unserialize($data['setting_memcache']);
			$data['setting_rediscache'] && $data['rediscache'] = unserialize($data['setting_rediscache']);
			
			//测试缓存
			try {
				$yii_cache = Yii::app()->cache;
				if($yii_cache) {
					try {				
						$test = Yii::app()->cache->set('test','123456');									
						Yii::app()->cache->delete('test');				
					}catch (Exception $e){
						
					}		
					if($test){	
						$cache_enable = true;
					}
				}
			}catch (Exception $e){
			}						
			
			if($cache_enable){
				$data['cache_enable'] = Yii::t('admin','Cache Enable');
			}else{
				$data['cache_enable'] = Yii::t('admin','Cache Disable');
			}			
		}
		$this->render('cache', array ('data' => $data ));
	}
	
	/**
	 * 访问控制设置
	 *
	 */
	public function actionAccess ()
	{
		self::_updateData($_POST['Setting'], 'access');
		$this->render('access', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'access'))));
	}
	
	/**
	 * 自定义字段
	 */
	public function actionCustom ()
	{
		self::_updateData($_POST['Setting'], 'custom');
		$this->render('custom', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'custom'))));
	}
	
	/**
	 * 邮件设置
	 */
	public function actionEmail(){
		self::_updateData($_POST['Setting'], 'email');
		$this->render('email', array ('setting' => Setting::loadData('scope=:scope',array('scope'=>'email')) ));
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

}
