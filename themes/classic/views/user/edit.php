	<div class="user user_edit">
		<h2><?php echo Yii::t('common','Base Profile');?></h2>
		<?php 
			$form=$this->beginWidget('CActiveForm',
			array('id'=>'edit_form','htmlOptions'=>array('name'=>'edit_form','enctype'=>'multipart/form-data'))); 
		?>
			<table class="base_table">
				<tr><th><?php echo $form->label($model,'username');?>：</th><td><?php echo Yii::app()->user->name;?></td></tr>
				<tr><th><?php echo $form->label($model,'email');?>：</th><td><?php echo Yii::app()->user->email;?></td></tr>
				<tr><th><?php echo $form->label($model,'nickname');?>：</th><td><?php echo $form->textField($model,'nickname');?></td></tr>
				<tr><th><?php echo $form->label($model,'sign');?>：</th><td><?php echo $form->textArea($model,'sign');?></td></tr>
				<tr><th><?php echo $form->label($model,'web');?>：</th><td><?php echo $form->textField($model,'web');?></td></tr>
				<tr><th><?php echo $form->label($model,'qq');?>：</th><td><?php echo $form->textField($model,'qq');?></td></tr>
				<tr><th><?php echo $form->label($model,'mobile');?>：</th><td><?php echo $form->textField($model,'mobile');?></td></tr>
				<tr><td></td><td><input type="submit" class="submit" value="<?php echo Yii::t('common','Save');?>" /></td></tr>
			</table>
		<?php $this->endWidget();?>
	</div>