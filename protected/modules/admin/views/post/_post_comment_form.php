<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title">评论人：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'user_id',array('size'=>30,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">IP地址：</td>
  </tr>
  <tr >
    <td ><?php echo $model->client_ip ?></td>
  </tr>
  <tr>
    <td class="tb_title">内容：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content',array('rows'=>7,'cols'=>70)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">回复内容：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'answer_content',array('rows'=>7,'cols'=>70)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">状态：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status_is',array('Y'=>'显示', 'N'=>'隐藏')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">提交时间：</td>
  </tr>
  <tr >
    <td ><?php echo date('Y-m-d H:i:s', $model->create_time) ?></td>
  </tr>
  <tr class="submit">
    <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
  </tr>
</table>
<?php $form=$this->endWidget(); ?>
