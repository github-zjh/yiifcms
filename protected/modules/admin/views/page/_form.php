<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif ?>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'xform', 'htmlOptions' => array('name' => 'xform', 'enctype' => 'multipart/form-data'))); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'id'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $model->isNewRecord ? $form->textField($model, 'id', array('size' => 20, 'maxlength' => 128, 'class' => 'validate[required]')) : $model->id; ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 128, 'class' => 'validate[required]')); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'link'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'link', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'content'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php echo $form->textArea($model, 'content'); ?>
            <?php $this->widget('application.widget.kindeditor.KindEditor', array('id' => 'Page_content')); ?>      	
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'introduce'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeTextArea($model, 'introduce', array('rows' => 5, 'cols' => 90)); ?></td>
    </tr> 
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_title'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_title', array('size' => 50, 'maxlength' => 255)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_keywords'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_keywords', array('size' => 50, 'maxlength' => 255)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_description'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeTextArea($model, 'seo_description', array('rows' => 5, 'cols' => 80)); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'status'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Show'), 'N' => Yii::t('admin', 'Hidden'))); ?>
            <?php echo Yii::t('admin', 'Sort Order'); ?> <?php echo $form->textField($model, 'sort_order', array('size' => 5, 'maxlength' => 10)); ?>

        </td>
    </tr>
    <tr class="submit">
        <td>      
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();
