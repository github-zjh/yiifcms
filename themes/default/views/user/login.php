<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->_seoTitle);?></title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />		
	<!-- 手持设备样式 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:720px),only screen and (max-device-width:720px)" href="<?php echo $this->_stylePath;?>/css/media_login.css"/>
</head>
<body>			
	<div id="wrapper">
		<div class="form clear">
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form')); ?>			
				<div class="mod_head clear">
					<a class="register_btn fr" href="<?php echo $this->createUrl('register');?>">注册新用户</a>					
					<span class="login_span fl"><i class="fa fa_tuser"></i>登录</span>
				</div>
				<div class="mod_body">					
					<input type="hidden" value="<?php echo $ret_url;?>" name="ret_url" />
					<ul>
						<li class="clear">
							<label for="FloginForm_username" class="label_icon_user"><i class="fa fa_user"></i></label>
							<input type="text" name="FloginForm[username]" placeholder="邮箱/用户名" class="form-control" id="FloginForm_username">
						</li>
						<li class="clear">
							<label for="FloginForm_password" class="label_icon_pw"><i class="fa fa_pw"></i></label>
							<input type="password" name="FloginForm[password]" placeholder="密码" class="form-control" id="FloginForm_password">
						</li>
						<!-- 错误信息显示 -->
						<?php if (CHtml::errorSummary($model)):?>
						<li class="error_message">
						<?php foreach($model->geterrors() as $error):?>
						<em><i class="fa fa_error"></i><?php echo $error[0];?></em>
						<?php break;?>
						<?php endforeach;?>	
						</li>						
						<?php endif?>
							
						<li class="last">
							<input type="submit" id="login_submit" name="submit" value="登录" />
							<input type="checkbox" name="FloginForm[rememberMe]" value="1" id="FloginForm[rememberMe]" class="login-radio">
							<label for="login-radio">记住我</label>
							<a href="<?php echo $this->createUrl('forgetpwd')?>" class="forgetpw">忘记密码？</a>
						</li>
					</ul>					
				</div>
				<div class="mod_footer">
					<a class="fr" href="<?php echo Yii::app()->homeUrl;?>">返回首页&nbsp;&nbsp;>></a>					
				</div>				
		    <?php $this->endWidget(); ?>
		    
		    <div class="login_auth">
		    	<p class="title">合作伙伴</p>
		    	<div class="auth_box">
		    		<ul class="login_list clear">
		    		<?php foreach((array)$oauth as $oa):?>
		    		<?php if($oa->id == 'qq'):?>
			    		<li>
			    			<a href="<?php echo $this->createUrl('oAuth/qq')?>">
			    				<img src="<?php echo $this->_stylePath?>/images/qq_login.png" width="60" height="60" />
			    				<span>QQ账号登录</span>
			    			</a>		    			
			    		</li>
			    	<?php elseif($oa->id == 'sinawb'):?>
			    		<li>
			    			<a href="<?php echo $this->createUrl('oAuth/sinawb');?>">
			    				<img src="<?php echo $this->_stylePath?>/images/sina_weibo_login.png" width="60"  height="60"/>
			    				<span>新浪微博登录</span>
			    			</a>		    			
			    		</li>
			    	<?php elseif($oa->id == 'weixin'):?>
			    		<li>
			    			<a href="<?php echo $this->createUrl('oAuth/weixin');?>">
			    				<img src="<?php echo $this->_stylePath?>/images/weixin_login.png" width="60" height="60" />
			    				<span>微信平台登录</span>
			    			</a>		    			
			    		</li>
			    	<?php elseif($oa->id == 'renren'):?>
			    		<li class="last">
			    			<a href="<?php echo $this->createUrl('oAuth/renren');?>">
			    				<img src="<?php echo $this->_stylePath?>/images/renren_login.png" width="60"  height="60"/>
			    				<span>人人网登录</span>
			    			</a>		    			
			    		</li>
			    	<?php endif;?>
			    	<?php endforeach;?>
			    	</ul>	
		    		<p class="auth_desc">用合作伙伴登录，更快捷！</p>	
		    	</div>		    	    	
		    </div>
			<div class="login_bg"></div>
		</div><!-- form -->		
		
		<div class="wrapper_bg"></div>
		
		<?php 
			//引用公共底部mini模板	 
			$this->renderPartial('/layouts/footer_mini');
		?>
	</div>	
</body>
</html>
	
