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
    <td class="tb_title"><?php echo Yii::t('admin','Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('common','Url');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required,custom[url]]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('common','Image');?>：
      <?php if($model->logo):?>
      <input name="remove" type="checkbox" value="Y" id="remove" />
      <?php echo Yii::t('admin','Change To Text Link');?>
      <?php endif?></td>
  </tr>
  <tr >
    <td ><input name="logo" type="file" id="attach" />
      <?php if ($model->logo):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->logo?>" target="_blank"><img src="<?php echo $this->_baseUrl.'/'. $model->logo?>" width="50" align="absmiddle" /></a>
      <?php endif?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Sort Order');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'sortorder',array('size'=>5,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Show Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status_is',array('Y'=>Yii::t('admin','Yes'), 'N'=>Yii::t('admin','No'))); ?></td>
  </tr>
  <tr class="submit">
    <td ><input name="oAttach" type="hidden" value="<?php echo $model->logo ?>" />
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
