<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"><?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif ?>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'xform', 'htmlOptions' => array('name' => 'xform', 'enctype' => 'multipart/form-data'))); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'title', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>
    <tr class="submit">
        <td><input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" /></td>
    </tr>
</table>
<?php $this->endWidget();
