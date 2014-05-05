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
	<div class="reg_head"><h1><?php echo CHtml::encode($this->_seoTitle);?></h1></div>
	<div class="reg_body">
		<h2>注册新用户</h2>
		<?php $form=$this->beginWidget('CActiveForm', 
			array(
				'id'=>'register-form',
				'enableAjaxValidation' => true,
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); 
		?>		
			<ul class="form_box">
				<li class="clear">
					<label for="RegisterForm_username" class="label_icon_user"><i class="fa fa_user"></i></label>
					<?php echo $form->textField($model, 'username', array('class'=>'form-control  validate[required]','value'=>'','placeholder'=>'用户名'));?>					
					<?php echo $form->error($model,'username'); ?>       
				</li>
				<li class="clear">
					<label for="RegisterForm_password" class="label_icon_user"><i class="fa fa_pw"></i></label>
					<?php echo $form->passwordField($model, 'password', array('class'=>'form-control  validate[required]','value'=>'','placeholder'=>'密码'));?>					
					<?php echo $form->error($model,'password'); ?>       
				</li>
				<li class="clear">
					<label for="RegisterForm_email" class="label_icon_user"><i class="fa fa_email"></i></label>
					<?php echo $form->textField($model, 'email', array('class'=>'form-control  validate[required]','value'=>'','placeholder'=>'邮箱'));?>
					<?php echo $form->error($model,'email'); ?>       
				</li>
				<li class="clear">					
					<?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control captcha','value'=>'','placeholder'=>'验证码'));?>
					<div class="captcha_img">
						<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>
					</div>
					<?php echo $form->error($model,'verifyCode'); ?>               
				</li>
				<li class="last clear">
					<a href="<?php echo $this->createUrl('site/login');?>" class="login_link">已有账号？</a>
					<input type="submit" id="register_submit" name="submit" value="注册" />
				</li>
			</ul>				
		<?php $this->endWidget();?>
		
		<div class="copyright">
			<p>Copyright © 2014 - 2015, All Rights Reserved</p>
			<p>Powered By Yii FrameWork  当前时区: GMT +8   RSS Feed</p>
		</div>
	</div>	
</body>
</html>
	
