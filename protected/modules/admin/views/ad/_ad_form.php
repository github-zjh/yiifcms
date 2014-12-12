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
    <td class="tb_title"><?php echo Yii::t('admin','AdPosition');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'position_id', $this->_adposition); ?></td>
  </tr>
  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Ad Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Title Second');?></td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title_alias',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Link Url');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'link_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
 <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Image Url');?>(<?php echo Yii::t('admin','Please fill in the full path to the outsite resources');?>)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Image');?>：</td>
  </tr>
  <tr >
    <td ><input name="attach" type="file" id="attach" />
      <?php if ($model->attach_file):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" target="_blank">
      	<img src="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" width="50%" align="absmiddle"/>
      </a>
      <?php endif?></td>
  </tr>
   <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Size');?>(px)：</td>
  </tr>
  <tr >
    <td ><?php echo Yii::t('admin','Width');?>:<?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>128)); ?>px
    <?php echo Yii::t('admin','Height');?>:<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>128)); ?>px</td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Ad Intro');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'introduce',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>
  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Sort Order');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'sort_order',array('size'=>5,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Yes'), 'N'=>Yii::t('admin','No'))); ?></td>
  </tr>
  <tr class="submit">
    <td ><input name="oAttach" type="hidden" value="<?php echo $model->attach_file ?>" />
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
