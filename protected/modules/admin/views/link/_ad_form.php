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
    <td class="tb_title">广告名称：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">广告标识</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title_alias',array('size'=>30,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">链接地址：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'link_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
 <tr>
    <td class="tb_title">图片地址(非本站资源请填写完整路径，带http://)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">图片：</td>
  </tr>
  <tr >
    <td ><input name="attach" type="file" id="attach" />
      <?php if ($model->attach_file):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" target="_blank"><img src="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" width="50" align="absmiddle"/></a>
      <?php endif?></td>
  </tr>
   <tr>
    <td class="tb_title">尺寸(像素px)：</td>
  </tr>
  <tr >
    <td >宽:<?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>128)); ?>高:<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">广告说明：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'intro',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">开始时间/结束时间：</td>
  </tr>
  <tr >
    <td height="24" ><?php echo $form->textField($model,'start_time',array('size'=>20,'maxlength'=>128, 'class'=>'Wdate', 'onClick'=>'WdatePicker({dateFmt:"yyyy-MM-dd"})')); ?>-<?php echo $form->textField($model,'expired_time',array('size'=>20,'maxlength'=>128, 'class'=>'Wdate', 'onClick'=>'WdatePicker({dateFmt:"yyyy-MM-dd"})')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">排序：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'sort_order',array('size'=>5,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">显示状态：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status_is',array('Y'=>'是', 'N'=>'否')); ?></td>
  </tr>
  <tr class="submit">
    <td ><input name="oAttach" type="hidden" value="<?php echo $model->attach_file ?>" />
      <input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
