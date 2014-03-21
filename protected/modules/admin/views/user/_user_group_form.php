<?php if (CHtml::errorSummary($model)):?>

<table  id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title">用户组名称：</td>
  </tr>
  <tr >
    <td >
    	<?php if($model->id == $this->_adminGroupID):?>
    	<?php echo $model->group_name;?>
    	<?php else:?>
    	<?php echo $form->textField($model,'group_name',array('size'=>30,'maxlength'=>128, 'class'=>'validate[required]')); ?>
    	<?php endif;?>
   	</td>
  </tr>
  <tr>
  <td  colspan="2">权限：</td>
  </tr>
  <tr >
  		<?php if($model->id == $this->_adminGroupID):?>
  		<td><?php echo $model->acl;?></td>
  		<?php else:?>
       <td ><?php echo $form->textField($model,'acl',array('size'=>30, 'maxlength'=>50)); ?></td>       
       <?php endif;?>
  </tr>
  <?php if($model->id != $this->_adminGroupID):?>
  <tr class="submit">
    <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
  </tr>
  <?php endif;?>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
