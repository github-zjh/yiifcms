<?php
/**
 *  缓存设置管理
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class CacheAction extends CAction
{	
	public function run(){		
        if(isset($_POST['data']) && $_POST['data']){
            $post = $this->filterData($_POST['data']);
            //缓存状态
			$cache_status = $post['cache_status'];
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
			//保存缓存状态
			$data_cache_status = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'cache_status'));
			$data_cache_status->value = $cache_status;
			$data_cache_status->save();
            
			//保存缓存类型
			$data_cache_type = Setting::model()->find('scope =:scope AND variable =:variable', array(':scope'=>'cache', ':variable'=>'cache_type'));
			$data_cache_type->value = $cache_type;
			$data_cache_type->save();		

			//若缓存可用  则写入新的配置文件
			if($cache){
				$cache = array('cache'=>$cache);
                
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
							$this->controller->message('error',Yii::t('admin','Cache Error Msg', array('{cache}'=>$cache_type, '{msg}'=>$error)));
						}						
						if($test && $post['cache_status'] == 'open'){							
							$cache = var_export($cache, true);
							file_put_contents($config_file,"<?php\r\n\r\nreturn {$cache};\r\n\r\n?>");
						}
					}
				}catch (Exception $e){
					$error = Helper::safeEncoding($e->getMessage());
					$this->controller->message('error',Yii::t('admin','Cache Error Msg', array('{cache}'=>$cache_type, '{msg}'=>$error)));
				}
			}	
						
			$this->controller->message('success', Yii::t('admin','Update Success'));
		}else{		
            
			$cache_enable = false;
			$data = Setting::loadData('scope=:scope',array('scope'=>'cache'));                       
			$data['setting_filecache'] && $data['filecache'] = unserialize($data['setting_filecache']);	
			$data['setting_memcache'] && $data['memcache'] = unserialize($data['setting_memcache']);
			$data['setting_rediscache'] && $data['rediscache'] = unserialize($data['setting_rediscache']);
            $this->filterData($data); 
			
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
		$this->controller->render('cache', array ('data' => $data ));
	}
    
    //过滤参数
    public function filterData(&$data = array()) 
    {
        $this->initData($data['cache_status']);
        $this->initData($data['cache_type']);
        $this->initData($data['setting_filecache']);
        $this->initData($data['setting_memcache']);
        $this->initData($data['setting_rediscache']);
        
        
        $this->initData($data['filecache']);
        $this->initData($data['filecache']['depth']);
        
        $this->initData($data['memcache']);
        $this->initData($data['memcache']['host']); 
        $this->initData($data['memcache']['port']);
        
        $this->initData($data['redis']);
        $this->initData($data['redis']['host']); 
        $this->initData($data['redis']['port']);
        $this->initData($data['redis']['database']);
        return $data;
    }
    
    //初始化值
    public function initData(&$data = '')
    {        
        $data = isset($data) ? $data : '';
        return true;
    }
}