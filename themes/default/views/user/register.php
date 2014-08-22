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
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:720px),only screen and (max-device-width:720px)" href="<?php echo $this->_stylePath;?>/css/media_register.css"/>
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
			<p class="notice">温馨提示：请牢记您的账号和密码，并且填写<strong>常用邮箱</strong>作为找回密码的唯一凭证。注册成功后，您会收到<strong>激活账号</strong>的邮件，请注意查收。</p>
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
					<?php echo $form->textField($model, 'email', array('class'=>'form-control  validate[required] inputMailList','value'=>'','placeholder'=>'邮箱', 'autocomplete' => 'off'));?>
					<?php echo $form->error($model,'email'); ?>       
				</li>
				<li class="clear">					
					<?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control captcha','placeholder'=>'验证码'));?>
					<div class="captcha_img">
						<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>
					</div>
					<?php echo $form->error($model,'verifyCode'); ?>               
				</li>
				<li class="last clear">
					<a href="<?php echo $this->createUrl('login');?>" class="login_link">已有账号？</a>
					<a href="<?php echo Yii::app()->homeUrl;?>" class="login_link">下次注册</a>
					<input type="submit" id="register_submit" name="submit" value="注册" />
				</li>
			</ul>				
		<?php $this->endWidget();?>
		<script type="text/javascript">	
			$(function(){
				$(".inputMailList").mailAutoComplete();
				//刷新验证码
				$("#yw0").ready(function(){
			        $('#yw0').trigger('click');
			    });
					
			});					
		</script>
		<?php 
			//引用公共底部mini模板	 
			$this->renderPartial('/layouts/footer_mini');
		?>
	</div>	
</body>
</html>
	
