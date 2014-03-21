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
    <td class="tb_title">页面标题：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">页面副标题：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title_second',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">别名名称(只能为英文或数字组合)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title_alias',array('size'=>30,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">封面图片：</td>
  </tr>
  <tr >
    <td colspan="2" ><input name="attach" type="file" id="attach" />
      <?php if ($model->attach_file):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" target="_blank"><img src="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" width="50" align="absmiddle" /></a>
      <?php endif?></td>
  </tr>
  <tr>
    <td class="tb_title">详细介绍：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content'); ?>
      <?php $this->widget('application.widget.kindeditor.KindEditor',array('target'=>array(
'#Page_content'=>array('uploadJson'=> $this->createUrl('upload')))));?></td>
  </tr>
  <tr>
    <td class="tb_title">摘要：</td>
  </tr>
  <tr >
    <td ><?php echo CHtml::activeTextArea($model,'intro',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">模板：</td>
  </tr>
  <tr >
    <td class=" rowform"><?php echo $form->textField($model,'template',array('size'=>30,'maxlength'=>128)); ?>默认为空</td>
  </tr>
  <tr>
    <td class="tb_title">SEO标题：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>255)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">SEO关键字：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>255)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">SEO描述：</td>
  </tr>
  <tr >
    <td ><?php echo CHtml::activeTextArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>
  <tr class="submit">
    <td ><input name="oAttach" type="hidden" value="<?php echo $model->attach_file ?>" />
      <input name="oThumb" type="hidden" value="<?php echo $model->attach_thumb ?>" />
      <input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
