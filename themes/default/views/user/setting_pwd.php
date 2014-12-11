<div class="user clear">
	<?php
		//引用公共提示信息
	   $this->renderPartial('/layouts/alert');
	?>
	<div class="user_left">
		<!-- 用户菜单导航开始 -->
		<?php $this->renderPartial('user_left');?>
		<!-- 用户菜单导航结束 -->
	</div>
	
	<div class="user_right">	
		<div class="user_edit">			
			<h3><?php echo Yii::t('common','Setting Pwd');?></h3>
			<?php 
				$form=$this->beginWidget('CActiveForm',
				array('id'=>'edit_form',
					'htmlOptions'=>array('name'=>'edit_form'),			
					)); 
			?>
				<table class="base_table">			
					<?php if(!$password_empty):?><tr><th><?php echo $form->label($model,'initpassword');?>：</th><td><?php echo $form->passwordField($model,'initpassword');?></td></tr><?php endif;?>
					<tr><th><?php echo $form->label($model,'newpassword');?>：</th><td><?php echo $form->passwordField($model,'newpassword');?></td></tr>	
					<tr><th><?php echo $form->label($model,'confirmpassword');?>：</th><td><?php echo $form->passwordField($model,'confirmpassword');?></td></tr>							
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
	</div>
</div>
