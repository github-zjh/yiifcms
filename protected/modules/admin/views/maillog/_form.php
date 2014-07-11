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
    <td class="tb_title"><?php echo Yii::t('admin', 'Comment User');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->hiddenField($model,'user_id',array('size'=>30,'maxlength'=>128)); ?>
    	<?php $user = User::model()->findByPk($model->user_id);?>
    	<?php echo $user->username;?>
    </td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin', 'IP Address');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $model->client_ip ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin', 'Content');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textArea($model,'content',array('rows'=>7,'cols'=>70)); ?>
    	<?php $this->widget('application.widget.kindeditor.KindEditor',array(
				  'target'=>array(
				  	'#Comment_content'=>array(
						 'themeType'=>'simple',
				  		 'width'=>'500',	
						 'height'=>'200',	
			  			 'items'=>array(
			  					'fontname', 'fontsize','|','undo', 'redo','|','code', 'forecolor', 'hilitecolor', 'bold', 'italic',
			  					'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
			  					'justifyright', 'insertorderedlist','insertunorderedlist', '|',
			  					'emoticons', 'image', 'link'),
						)				  		
					)						
				)
				);?>			
    </td>
  </tr> 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin', 'Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin', 'Show'), 'N'=>Yii::t('admin', 'Hidden'))); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin', 'Submit Time');?>：</td>
  </tr>
  <tr >
    <td ><?php echo date('Y-m-d H:i:s', $model->create_time) ?></td>
  </tr>
  <tr class="submit">
    <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<?php $form=$this->endWidget(); ?>
