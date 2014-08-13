<?php
/**
 * 第三方登录管理
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */
class OAuthController extends Backend
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
	 * 首页
	 */
    public function actionIndex ()
    {
        $model = new OAuth();
        $criteria = new CDbCriteria();
        $condition = '1';
        $apiname = trim($this->_request->getParam('apiname'));
        $apiname && $condition .= ' AND apiname LIKE \'%' . $apiname . '%\'';
        $criteria->condition = $condition;        
        $count = $model->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 13;
        $pageParams = $this->buildCondition($_GET, array ('appname' ));
        $pages->params = is_array($pageParams) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll($criteria);
        $this->render('index', array ('datalist' => $result , 'pagebar' => $pages ));
    }

    /**
	 * 更新接口
	 *
	 */
    public function actionUpdate ($id)
    {
        $model = $this->loadModel();             
        $extension_oauth =  Yii::getPathOfAlias('ext')."/OAuth";
        if (isset($_POST['OAuth'])) {            
            $model->attributes = $_POST['OAuth'];
            switch($model->id){
            	case 'qq':
            		$config['appid'] = intval($_POST['config']['appid']);
            		$config['appkey'] = trim($_POST['config']['appkey']);
            		$config['callback'] = trim($_POST['config']['callback']);            		
            		$config['scope'] = $_POST['scope']?implode(',', $_POST['scope']):"";
            		$config['errorReport'] = true;
            		$config['storageType'] = 'file';
            		$model->apiconfig = CJSON::encode($config);
            		//写入配置文件
            		$setting = "<?php die('forbidden'); ?>\n";
            		$setting .= $model->apiconfig;
            		$setting = str_replace("\/", "/",$setting);
            		$incFile = fopen($extension_oauth."/qq/comm/inc.php","w+") or die("请设置{$extension_oauth}/qq/comm/inc.php的权限为777");
            		if(fwrite($incFile, $setting)){            			
            			fclose($incFile);            			
            		}            		
            		break;
				case 'sinawb':
					$config['wb_akey'] = trim($_POST['config']['wb_akey']);
					$config['wb_skey'] = trim($_POST['config']['wb_skey']);
					$config['callback'] = trim($_POST['config']['callback']);
					$model->apiconfig = CJSON::encode($config);
					//写入配置文件
					$setting = "<?php\nheader('Content-Type: text/html; charset=UTF-8'); \n";
					$setting .= "define( \"WB_AKEY\" , '".$config['wb_akey']."' );\n";
					$setting .= "define( \"WB_SKEY\" , '".$config['wb_skey']."' );\n";
					$setting .= "define( \"WB_CALLBACK_URL\" , '".$config['callback']."' );\n";
            		$setting = str_replace("\/", "/",$setting);					
					$incFile = fopen($extension_oauth."/sinawb/config.php","w+") or die("请设置{$extension_oauth}/sinawb/config.php的权限为777");
            		if(fwrite($incFile, $setting)){            			
            			fclose($incFile);            			
            		}
					break;
				case 'weixin':

					break;
				case 'renren':
					$config['app_key'] = trim($_POST['config']['app_key']);
					$config['app_secret'] = trim($_POST['config']['app_secret']);
					$config['callback'] = trim($_POST['config']['callback']);
					$model->apiconfig = CJSON::encode($config);
					//写入配置文件
					$setting = "<?php\nheader('Content-Type: text/html; charset=UTF-8'); \n";
					$setting .= "define( \"APP_KEY\" , '".$config['app_key']."' );\n";
					$setting .= "define( \"APP_SECRET\" , '".$config['app_secret']."' );\n";
					$setting .= "define( \"CALLBACK_URL\" , '".$config['callback']."' );\n";
            		$setting = str_replace("\/", "/",$setting);					
					$incFile = fopen($extension_oauth."/renren/config.php","w+") or die("请设置{$extension_oauth}/renren/config.php的权限为777");
            		if(fwrite($incFile, $setting)){            			
            			fclose($incFile);            			
            		}
					break;
            }                    
        	if($model->save())
        		$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
        }    

        //获取接口配置信息
        $apiconfig = CJSON::decode($model->apiconfig);
        $this->render('update', array ('model' => $model ,'apiconfig'=>$apiconfig));
    
    }
   
    /**
	 * 批量操作
	 *
	 */
    public function actionBatch ()
    {
        if ($this->method() == 'GET') {
            $command = trim($_GET['command']);
            $ids = intval($_GET['id']);
        } else 
            if ($this->method() == 'POST') {
                $command = trim($_POST['command']);
                $ids = $_POST['id'];                
            } else {
                $this->message('errorBack', Yii::t('admin','Only POST Or GET'));
            }
        empty($ids) && $this->message('error', Yii::t('admin','No Select'));
        
        switch ($command) {              
            case 'Enable':
        		foreach((array)$ids as $id){
            		$oauthModel = OAuth::model()->findByPk($id);
            		if($oauthModel){
            			$oauthModel->status = 'Y';
            			$oauthModel->save();
            		}
            	}
                break;
            case 'Disable':
        		foreach((array)$ids as $id){
            		$oauthModel = OAuth::model()->findByPk($id);
            		if($oauthModel){
            			$oauthModel->status = 'N';
            			$oauthModel->save();
            		}
            	}
                break;          
            default:
                throw new CHttpException(404,  Yii::t('admin','Error Operation'));
                break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'),$this->createUrl('index'));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
    	if($this->_model===null)
    	{     		
    		if(isset($_GET['id']))
    			$this->_model=OAuth::model()->findbyPk(trim($_GET['id']));
    		if($this->_model===null)
    			throw new CHttpException(404,'The requested page does not exist.');
    	}
    	return $this->_model;
    }
    

}
