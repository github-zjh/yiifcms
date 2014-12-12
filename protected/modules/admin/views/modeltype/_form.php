<?php if (CHtml::errorSummary($model)):?>

<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'type_name');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'type_name',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'type_key');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php if($model->isNewRecord):?>
    	<?php echo $form->textField($model,'type_key',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?>
		<?php else:?>
		<?php echo $model->type_key;?>
		<?php endif;?>
    </td>
  </tr>
  
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'model');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'model',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Yes'), 'N'=>Yii::t('admin','No'))); ?></td>
  </tr>
  
  <tr>
      <td class="tb_title"><?php echo Yii::t('admin','SEO Title');?>：</td>
  </tr>
  <tr >
      <td ><?php echo $form->textField($model,'seo_title',array('size'=>40,'maxlength'=>128)); ?></td>
  </tr>
    
  <tr>
      <td class="tb_title"><?php echo Yii::t('admin','SEO Keywords');?>：</td>
  </tr>
  <tr >
      <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>40,'maxlength'=>128)); ?></td>
  </tr>
  
  <tr>
      <td class="tb_title"><?php echo Yii::t('admin','SEO Description');?>：</td>
  </tr>
  <tr >
      <td ><?php echo $form->textArea($model,'seo_description',array('size'=>40,'maxlength'=>128, 'class'=>'tarea middenWidth')); ?></td>
  </tr>
 
  <tr class="submit">
    <td >
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
