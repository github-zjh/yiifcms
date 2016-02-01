<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>

<?php $form = $this->beginWidget('CActiveForm'); ?>
<table class="form_table">
    <tr>
        <td><?php echo $form->label($model, 'title');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model,'title',array('size'=>60)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'url');?>：</td>
    </tr>
    <tr>
        <td><?php echo $model->url; ?></td>
    </tr>
    <!-- 如果内容已采集 -->
    <?php if($model->content):?>
    <tr>
        <td><?php echo $form->label($model->content, 'content');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model->content, 'content'); ?>      
            <?php $this->widget('application.widget.kindeditor.KindEditor', array('id' => 'SpiderPostContent_content')); ?>
        </td>
    </tr>
    <?php endif;?>
    
    <tr>
        <td><?php echo $form->label($model, 'status');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'status', $this->status); ?></td>
    </tr>
   
    <!-- 提交 -->
    <tr class="submit">
        <td>          
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();
