<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif ?>
<?php $form = $this->beginWidget('CActiveForm'); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'type_name'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'type_name', array('size' => 40, 'maxlength' => 128, 'class' => 'validate[required]')); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'type_key'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php if ($model->isNewRecord): ?>
                <?php echo $form->textField($model, 'type_key', array('size' => 40, 'maxlength' => 128, 'class' => 'validate[required]')); ?>
            <?php else: ?>
                <?php echo $model->type_key; ?>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'model'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'model', array('size' => 40, 'maxlength' => 128, 'class' => 'validate[required]')); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo Yii::t('admin', 'Status'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Yes'), 'N' => Yii::t('admin', 'No'))); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_title');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_title', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_keywords');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_keywords', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_description');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model, 'seo_description', array('size' => 40, 'maxlength' => 128, 'class' => 'tarea middenWidth')); ?></td>
    </tr>
    <tr class="submit">
        <td>
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();
