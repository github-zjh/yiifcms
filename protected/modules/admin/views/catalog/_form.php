<?php if (CHtml::errorSummary($model)):?>

<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>

<?php $form = $this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform', 'enctype'=>'multipart/form-data'))); ?>
<table class="form_table">

 <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Catalog Type');?>：</td>
  </tr>
  <tr >
    <td class="tb_title">
    	<select name="Catalog[type]" id="Catalog_type">        
        <?php foreach((array)$this->_model_type as $type):?>
        <option value="<?php echo $type['id']?>" <?php Helper::selected($type['id'], $model->type);?>><?php echo $type->type_name;?></option>
        <?php endforeach;?>
      </select>
    </td>
  </tr>

  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Title Name');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'catalog_name',array('size'=>40,'maxlength'=>128, 'class'=>'validate[required]')); ?></td>
  </tr>  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>：</td>
  </tr>
  <tr >
    <td ><select name="Catalog[parent_id]" id="Catalog_parent_id">
        <option value="0">==<?php echo Yii::t('admin','Top Category');?>==</option>
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php Helper::selected($catalog['id'], $model->parent_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select></td>
  </tr>  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Catalog Description');?>：</td>
  </tr>
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Keywords');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'seo_description',array('rows'=>5,'cols'=>80)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('common','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?><?php echo Yii::t('admin','Sort Order');?>:<?php echo $form->textField($model,'sort_order',array('size'=>6,'maxlength'=>128)); ?></td>
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
