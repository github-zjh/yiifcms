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
    <td class="tb_title"><?php echo Yii::t('admin','Group Name');?>：</td>
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
  <td  colspan="2"><?php echo Yii::t('admin','Acl');?>：</td>
  </tr>
  <tr >
  	 <td width="90%">
  	 <?php if($model->id != $this->_adminGroupID):?>
	  	 <table>
		  	 <script type="text/javascript">
			  	function selectAll(id, checked){	  
				  	$('#'+id+' td').each(function(){
						$(this).children('input').attr('checked',checked);
					});				
				}
		  	 </script>
	  	 	<?php foreach((array) $acls as $ak => $acl):?>
	  	 	<tr id="<?php echo $ak.'_id';?>">	  	 		
	  	 		<td style="width:8%; border:1px solid #CCCCCC;"><input type="checkbox" name="acls[]" value="all"  onclick="selectAll('<?php echo $ak.'_id';?>', this.checked)"/><strong style="color:#000000;"><?php echo Yii::t('acl',$ak);?></strong></td>
	  	 		<?php foreach((array)$acl as $value):?>
	  	 		<td style="width:8%; border:1px solid #CCCCCC;"><input type="checkbox" name="acls[]" value="<?php echo $ak.'|'.$value?>" <?php Helper::selected($ak.'|'.$value, $has_acls,'checked');?>/><?php echo Yii::t('acl',$ak.'|'.$value);?></td>	  	 		
	  	 		<?php endforeach;?>	  	 		
	  	 	</tr>
	  	 	<?php endforeach;?>	  	 	
	  	 </table>  
	 <?php else:?>
	 <?php echo ' ( 最高权限 ) '.$model->acl;?>
	 <?php endif;?>		
  	 </td>
  </tr>
  <?php if($model->id != $this->_adminGroupID):?>
  <tr class="submit">
    <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
  <?php endif;?>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();		
});
</script>
<?php $form=$this->endWidget(); ?>
