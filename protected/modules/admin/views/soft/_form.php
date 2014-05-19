<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/public/js/jscolor/jscolor.js"></script>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title" ><?php echo Yii::t('admin','Title');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
    </td>
  </tr>
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>：</td>
  </tr>
  <tr >
    <td ><select name="Soft[catalog_id]" id="Soft_catalog_id" onchange="changeCatalog(this)">
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php $this->selected($catalog['id'], $model->catalog_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
    </td>
  </tr>  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
  </tr>
  <tr >
    <td colspan="2" >
    	<input name="attach" type="file" id="attach" />
      	<?php if ($model->cover_image):?>
      	<a href="<?php echo $this->_baseUrl.'/'. $model->cover_image?>" target="_blank">
      		<img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->cover_image;?>" width="50" align="absmiddle" />
      	</a>
      	<?php endif;?>     
  	</td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'introduce', array('class'=>'validate[required]')); ?>
      <?php $this->widget('application.widget.kindeditor.KindEditor',array(
	  'target'=>array(
	  	'#Soft_introduce'=>array('uploadJson'=>$this->createUrl('/admin/uploadify/basicexecute', array('from'=>'editor')),		
		'allowFileManager'=>true, 		
	  	'extraFileUploadParams'=>array(array('sessionId'=>Yii::app()->session->sessionID))))));?></td>
  </tr> 
  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Soft Link');?>：</td>
  </tr>
   <tr >
    <td  ><?php echo $form->textField($model,'softlink',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td  class="tb_title"><?php echo Yii::t('admin','SEO Keywords');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo CHtml::activeTextArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>  
  
  <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?></td>
  </tr>
  
  <tr class="submit">
  	<td colspan="2" >
    	<input name="oAttach" type="hidden" value="<?php echo $model->cover_image; ?>" />      	
      	<input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
     </td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
});
</script>
<?php $form=$this->endWidget(); ?>
<script>
function changeCatalog(ths){
	$.post("<?php echo $this->createUrl('ajax/attr2content')?>", {catalog:ths.value}, function(res){
		if(res.state == 'success'){
			$("#attr2cotnent").html(res.text);
			$("#attrArea").show();
		}else{
			$("#attrArea").hide();
			$("#attr2cotnent").html('');
		}
	},'json');
}
</script>