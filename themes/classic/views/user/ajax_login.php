<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->_seoTitle);?></title>
	<base href="<?php echo $this->_request->hostinfo;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />		
</head>
<body>			
	<div id="wrapper">
		<div class="form clear">
		<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form')); ?>	
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
							<a href="<?php echo $this->createUrl('forgetpw')?>" target="_top" class="forgetpw">忘记密码</a>
						</li>
					</ul>					
				</div>							
		    <?php $this->endWidget(); ?>			
		</div><!-- form -->				
	</div>	
</body>
</html>
	
