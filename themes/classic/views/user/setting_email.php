	<div class="user user_edit">
		<ul class="tab_menu clear">		
			<li class="active"><a href="<?php echo $this->createUrl('user/settingEmail');?>"><?php echo Yii::t('common','Setting Email');?></a></li>
			<li><a href="<?php echo $this->createUrl('user/settingPwd');?>"><?php echo Yii::t('common','Setting Pwd');?></a></li>
			<li><a href="<?php echo $this->createUrl('user/setting');?>"><?php echo Yii::t('common','Base Profile');?></a></li>
			<h2><?php echo Yii::t('common','User Setting');?></h2>
		</ul>
		<h3><?php echo Yii::t('common','Setting Email');?></h3>
		<?php 
			$form=$this->beginWidget('CActiveForm',
			array('id'=>'edit_form','htmlOptions'=>array('name'=>'edit_form', 'enctype'=>'multipart/form-data'))); 
		?>
			<table class="base_table">
				<tr><th><label><?php echo Yii::t('common','Init Password');?>：</label：</th><td><input type="password" name="initPassword" value=""/></td></tr>
				<tr><th><label><?php echo Yii::t('common','New Password');?>：</label</th><td><input type="password" name="newPassword" value=""/></td></tr>	
				<tr><th><label><?php echo Yii::t('common','Confirm Password');?>：</label</th><td><input type="password" name="confirmPassword" value=""/></td></tr>							
				<tr>
					<td></td>
					<td>
						<?php if (CHtml::errorSummary($model)):?>
						<div class="error_message"> <?php echo CHtml::errorSummary($model); ?> </div>
						<?php endif?>
					</td>
				</tr>				
			</table>
			<div class="clear"></div>
			<input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" />
		<?php $this->endWidget();?>
	</div>