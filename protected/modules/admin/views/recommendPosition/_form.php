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
    <td class="tb_title"><?php echo $form->labelEx($model, 'recommend_name');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'recommend_name',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo $form->labelEx($model, 'type');?>：</td>
  </tr>
  <tr >
    <td >
    	<select name="RecommendPosition[type]" id="RecommendPosition_type">        
	        <?php foreach((array)$this->_recom_type as $type):?>
	        <option value="<?php echo $type['id']?>" <?php Helper::selected($type['id'], $model->type);?>><?php echo $type->type_name;?></option>
	        <?php endforeach;?>
      	</select>
    </td>
  </tr>
  
  <tr class="submit">
    <td><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>
