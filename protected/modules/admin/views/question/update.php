
<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Question Manage');?></h3>
  
</div>
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
    <td ><div class="custom_title"><?php echo Yii::t('admin','UserName');?>：</div>
    <?php echo $form->hiddenField($model,'user_id');?>
      <?php $user = User::model()->findByPk($model->user_id); echo $user->username?$user->username:'网友';?></td>
  </tr>
  <tr>
    <td ><div class="custom_title"><?php echo Yii::t('admin','IP');?>：</div>
      <?php echo $model->client_ip?$model->client_ip:'未知'; ?></td>
  </tr>
  <tr>
    <td ><div class="custom_title"><?php echo Yii::t('admin','RealName');?>：</div>
      <?php echo $form->textField($model,'realname',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td ><div class="custom_title"><?php echo Yii::t('admin','Email');?>：</div>
      <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td ><div class="custom_title"><?php echo Yii::t('admin','Tel');?>：</div>
      <?php echo $form->textField($model,'telephone',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td ><div class="custom_title"><?php echo Yii::t('admin','QQ');?>：</div>
      <?php echo $form->textField($model,'qq',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td><div class="custom_title"><?php echo Yii::t('admin','Question Content');?>：</div>
      <?php echo $form->textArea($model,'question',array('rows'=>10, 'cols'=>70)); ?></td>
  </tr>  
  <tr class="submit">
    <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
<?php $form=$this->endWidget(); ?>

