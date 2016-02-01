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
        <td><?php echo $form->label($model, 'site');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model,'site',array('size'=>30)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'url');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'type');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'type', $this->_type_names); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'list_charset');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'list_charset', $this->charset); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'content_charset');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'content_charset', $this->charset); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label($model, 'item_rule_li');?><strong class='red'>(遵循css选择器规则)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'item_rule_li', array('size'=>30)); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label($model, 'item_rule_a');?><strong class='red'>(遵循css选择器规则)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'item_rule_a', array('size'=>30)); ?></td>
    </tr>    
    
    <tr>
        <td><?php echo $form->label($model, 'soft_icon_rule');?><strong class='red'>(遵循css选择器规则)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'soft_icon_rule', array('size'=>30)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'video_cover_rule');?><strong class='red'>(遵循css选择器规则)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'video_cover_rule', array('size'=>30)); ?></td>
    </tr> 
    
    <tr>
        <td><?php echo $form->label($model, 'page_rule');?><strong class='red'>(页码必须用[PAGE_NUM]替换)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'page_rule', array('size'=>60)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'content_rule');?><strong class='red'>(遵循css选择器规则)</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'content_rule', array('size'=>30)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'filter_rule');?><strong class='red'>(每一行一个正则表达式,形如"/(&lt;iframe(.*?)&gt;(.*?)&lt;\/iframe&gt;)/is")</strong>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model, 'filter_rule', array('rows'=>10, 'cols' => 100)); ?></td>
    </tr>    
    
    <tr>
        <td><?php echo $form->label($model, 'cur_page');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'cur_page', array('size'=>5)); ?></td>
    </tr>
    
    <tr>
        <td><?php echo $form->label($model, 'total_page');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'total_page',array('size'=>5)); ?></td>
    </tr>
    
    <!-- 提交 -->
    <tr class="submit">
        <td>          
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();
