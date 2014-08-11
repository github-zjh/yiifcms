<?php
/**
 * 第三方授权控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class OAuthController extends FrontBase
{	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionQq()
	{			
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		$qc->qq_login();
	}
	public function actionQq_callback()
	{
		require_once(Yii::getPathOfAlias('ext')."/OAuth/qq/qqConnectAPI.php");
		$qc = new QC();
		$access_token = $qc->qq_callback();
		$openid = $qc->get_openid();
		$qc = new QC($access_token, $openid);
		$user_info = $qc->get_user_info();
		//查看是否已绑定
		$qq_bind = OAuthQQ::model()->findByPk($openid);
		if(!$qq_bind){
			//注册本地账号
			$user_model = new User('bind_register');
			$user_model->username = $user_info['nickname'].'_qq'; //分配用户名
			$user_model->addtime = time();
			$user_model->avatar = $user_info['figureurl_2'];     //调用空间头像(100*100)	
			$user_model->status = 1;
			$user_model->groupid = 1;
			$user_model->logins = 0;
			$user_model->last_login_ip = $this->getClientIP();
			$user_model->username_editable = 'Y';  //允许修改用户名

			$model = new OAuthQQ();
			$model->openid = $openid;
			$model->access_token = $access_token;
			$model->uid = 0; 		
			if($user_model->save()){
				$model->uid = $uid = $user_model->uid;
				//保存绑定qq用户
				$model->save();
			}else{
				throw new CHttpException(500,Yii::t('common','Login Failed'));
			}
		}else{
			$uid = $qq_bind->uid;
			$user = User::model()->findByPk($uid);
			$username = $user->username;
		}
		//登录
		$duration=3600*24*30; // 30 days	
		$identity = new OAuthUserIdentity($username,'');
		$identity->authenticate();
		if($identity->errorCode === OAuthUserIdentity::ERROR_NONE){
			Yii::app()->user->login($identity, $duration);

			//更新登录次数和登录ip
			$user_update = User::model()->findByPk($uid);
			$user_update->last_login_ip = $this->getClientIP();
			$user_update->logins = $user_update->logins + 1;
			if($user_update->save()){
				$this->redirect(Yii::app()->homeUrl);
			}else{
				throw new CHttpException(500,Yii::t('common','Login Failed'));
			}
		}else{
			
			throw new CHttpException(500,Yii::t('common','Login Failed'));
		}
		
	}

	
	
}
