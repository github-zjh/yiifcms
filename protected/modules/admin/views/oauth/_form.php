<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<style type="text/css">
	.appdata p { line-height:38px;}
	.appdata p label { width:80px; display:inline-block;}
</style>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','ID');?>：</td>
  </tr>
  <tr>
    <td><?php if($model->isNewRecord):?>
    	<?php echo $form->textField($model,'id', array('class'=>'validate[required]'));?>
    	<?php else:?>
    	<?php echo $model->id;?>
    	<?php endif;?>
    </td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Title Name');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'apiname',array('size'=>20,'maxlength'=>50, 'class'=>'validate[required]')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','ApiData');?>(appkey/apikey/微信公共账号)：	 
    </td>
  </tr>
  <tr >
    <td class="appdata">    	
    	<?php echo $form->textField($model, 'apikey', array('size'=>50,'maxlength'=>100));?>    	
    </td>    
  </tr>  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Show Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Yes'), 'N'=>Yii::t('admin','No'))); ?></td>
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
