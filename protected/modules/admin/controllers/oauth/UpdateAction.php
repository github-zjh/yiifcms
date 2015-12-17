<?php
/**
 *  编辑
 * 
 * @author        Sim Zhao <326196998@qq.com>
 * @copyright     Copyright (c) 2015. All rights reserved.
 */

class UpdateAction extends CAction
{	
    private $_ext_oauth = '';
    public function run(){		
        $model=$this->controller->loadModel();
        $this->_ext_oauth =  Yii::getPathOfAlias('ext')."/OAuth";
    	if(isset($_POST['OAuth']))
    	{    		
    		$model->attributes = $_POST['OAuth'];
            switch($model->id){
                case 'qq':      //配置QQ登录
            		$config = $this->configQQ();            		
            		break;
                case 'sinawb':  //配置新浪微博登录
                    $config = $this->configSinaWb();                    
					break;
                case 'weixin':  //配置微信登录
                    $config = $this->configWeiXin();
					break;
                case 'renren':  //配置人人网登录
                    $config = $this->configRenren();					
					break;
            }
            $model->apiconfig = $config;
    		if($model->save()) {
                $this->controller->message('success',Yii::t('admin','Update Success'),$this->controller->createUrl('index'));
            }
    	}
        //获取接口配置信息
        $apiconfig = CJSON::decode($model->apiconfig);        
        $this->controller->render('update',array(
            'model'     =>$model,
            'apiconfig' => $apiconfig
        ));
	}
    
    /**
     * 配置QQ登录
     * 
     * @return string
     */
    protected function configQQ()
    {        
        $config = array(
            'appid'       => intval($_POST['config']['appid']),
            'appkey'      => trim($_POST['config']['appkey']),
            'callback'    => trim($_POST['config']['callback']),
            'scope'       => isset($_POST['scope']) && $_POST['scope'] ? implode(',', $_POST['scope']) : '',
            'errorReport' => true,
            'storageType' => 'file',
        );        
        $apiconfig = CJSON::encode($config);
        //写入配置文件
        $setting = "<?php die('forbidden'); ?>\n".$apiconfig;        
        $setting = str_replace("\/", "/",$setting);
        $incFileName = $this->_ext_oauth.'/qq/comm/inc.php';
        $incFile = fopen($incFileName,"w+") or die("请开启{$incFileName}的读写权限");        
        if(fwrite($incFile, $setting)){            			
            fclose($incFile);            			
        }
        return $apiconfig;
    }
    
     /**
     * 配置新浪微博登录
     * 
     * @return string
     */
    protected function configSinaWb()
    {        
        $config = array(
            'wb_akey'     => intval($_POST['config']['wb_akey']),
            'wb_skey'     => trim($_POST['config']['wb_skey']),
            'callback'    => trim($_POST['config']['callback']),           
        );    
        $apiconfig = CJSON::encode($config);        
        return $apiconfig;
    }
    
    /**
     * 配置微信登录
     * 
     * @return string
     */
    protected function configWeiXin()
    {
        $config = array(
            'app_id'     => trim($_POST['config']['app_id']),
            'app_secret' => trim($_POST['config']['app_secret']),
            'callback'   => trim($_POST['config']['callback']),
        );        
        $apiconfig = CJSON::encode($config);
        return $apiconfig;
    }
    
    /**
     * 配置人人网登录
     * 
     * @return string
     */
    protected function configRenren()
    {
        $config = array(
            'app_key'    => trim($_POST['config']['app_key']),
            'app_secret' => trim($_POST['config']['app_secret']),
            'callback'   => trim($_POST['config']['callback']),
        );
        $apiconfig = CJSON::encode($config);
        return $apiconfig;
    }
    
}