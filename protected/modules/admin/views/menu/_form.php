<?php if (CHtml::errorSummary($model)):?>

<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<script type="text/javascript">
$(function(){
  $("#Menu_parent_id").val(<?php echo $parentId ?>);
});
</script>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform', 'enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title">
     <?php echo $form->labelEx($model,'menu_name'); ?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'menu_name',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'menu_link'); ?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'menu_link',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr> 
  
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'unique'); ?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'unique',array('size'=>40,'maxlength'=>20, 'class'=>'validate[required]')); ?></td>
  </tr> 
  
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'parent_id'); ?>：</td>
  </tr>
  <tr >
    <td ><select name="Menu[parent_id]" id="Menu_parent_id">
        <option value="0">==<?php echo Yii::t('admin','Top Category');?>==</option>
        <?php foreach((array)Menu::get(0, $this->_menu) as $menu):?>
        <option value="<?php echo $menu['id']?>" <?php Helper::selected($menu['id'], $model->parent_id);?>><?php echo $menu['str_repeat']?><?php echo $menu['menu_name']?></option>
        <?php endforeach;?>
      </select></td>
  </tr>  
 
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model,'status_is'); ?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status_is',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?></td>   
   
  </tr>
 <tr>
 	<td><?php echo $form->labelEx($model,'sort_order'); ?>:</td> 	
 </tr>
 <tr><td><?php echo $form->textField($model,'sort_order',array('size'=>6,'maxlength'=>128)); ?></td></tr>
 <tr>
 	<td><?php echo $form->labelEx($model,'target'); ?>:</td> 	
 </tr>
 <tr><td><?php echo $form->dropDownList($model,'target',array('Y'=>Yii::t('admin','Yes'), 'N'=>Yii::t('admin','No'))); ?></td></tr>
 
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
