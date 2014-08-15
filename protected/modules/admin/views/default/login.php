<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />	
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl;?>/css/login-style.css" />
	<title><?php echo $this->pageTitle;?></title>
	<script type="text/javascript">
		$(function(){
			//刷新验证码
			$("#yw0").ready(function(){
		        $('#yw0').trigger('click');
		    });
		});		
	</script>
</head>

<body>
<div id="login" >
	<h1><?php echo Yii::t('admin','Web Manage Backend');?></h1>
  <div class="wrapper">
    <div class="alert error">
    <?php if (CHtml::errorSummary($model)):?>
    	<?php //echo CHtml::errorSummary($model); ?>	
	<?php endif?>
    </div>    
    <div class="form">
     <?php 
      $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',		
		'enableAjaxValidation' => true,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
      <dl>
        <dt><?php echo Yii::t('common','UserName');?></dt>
        <dd><?php echo $form->textField($model,'username', array('class'=>'input-password validate[required]')); ?> <?php echo $form->error($model,'username'); ?></dd>
        <dt><?php echo Yii::t('common','PassWord');?></dt>
        <dd><?php echo $form->passwordField($model,'password', array('class'=>'input-password')); ?> <?php echo $form->error($model,'password'); ?></dd>
        <dt><?php echo Yii::t('common','VerifyCode');?></dt>
        <dd> 
        	<?php echo $form->textField($model,'verifyCode', array('class'=>'input-password verify-code')); ?>  
        	<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => true, 'clickableImage' => true, 'buttonType' => 'link', 'buttonLabel' => '换一张', 'imageOptions' => array ('alt' => '点击换图', 'align'=>'absmiddle'  ) ) );?>        
        	<?php echo $form->error($model,'verifyCode'); ?>         	
        </dd> 
        <dd>
          <input type="submit" name="login" class="input-login" value=""/>
          <input type="reset" name="login" class="input-reset" value=""/>
        </dd>
      </dl>
      <?php $form = $this->endWidget(); ?>
      </div>
    <br class="clear-fix"/>
    <div class="copyright">Copyright&copy; <?php echo date('Y'); ?>  <?php echo Yii::powered(); ?>. All Thrusts Reserved.</div>
  </div>
</div>
</body>
</html>
