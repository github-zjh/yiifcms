<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif;?>

<?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('name' => 'xform', 'enctype' => 'multipart/form-data'))); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'type'); ?>：</td>
    </tr>
    <tr>
        <td class="tb_title">
            <select name="Catalog[type]" id="Catalog_type">        
                <?php foreach ((array) $this->_model_type as $type): ?>
                    <option value="<?php echo $type['id'] ?>" <?php Helper::selected($type['id'], $model->type); ?>><?php echo $type->type_name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'catalog_name'); ?>：</td>
    </tr>
    <tr>
        <td ><?php echo $form->textField($model, 'catalog_name', array('size' => 40, 'maxlength' => 128, 'class' => 'validate[required]')); ?></td>
    </tr>  
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'parent_id'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php if(!$model->isNewRecord && isset($parents) && $parents) :?>
            <div><?php echo $parents;?></div>
            <?php endif;?>
            <select class="cat_select" data-layer="1">
                <option value="0">==<?php echo Yii::t('admin', 'Top Category'); ?>==</option>
                <?php foreach ($this->_catalog as $catalog): ?>
                    <option value="<?php echo $catalog['id'] ?>" <?php Helper::selected($catalog['id'], $model->parent_id); ?>><?php echo $catalog['str_repeat'] ?><?php echo $catalog['catalog_name'] ?></option>
                <?php endforeach; ?>
            </select>            
            <?php echo $form->hiddenField($model, 'parent_id');?>
            <span class="loading" style="display:none;">loading...</span>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_title'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_title', array('size' => 50, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_keywords'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'seo_keywords', array('size' => 50, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_description'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model, 'seo_description', array('rows' => 5, 'cols' => 80)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'status'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Show'), 'N' => Yii::t('admin', 'Hidden'))); ?><?php echo Yii::t('admin', 'Sort Order'); ?>:<?php echo $form->textField($model, 'sort_order', array('size' => 6, 'maxlength' => 128)); ?></td>
    </tr>
    <tr class="submit">
        <td>     
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();?>
<script type="text/javascript">
    $(function(){
        $('.form_table').delegate('.cat_select','change',function(){
            var id = $(this).val();
            var url =  "<?php echo $this->createUrl('catalog/children');?>";
            var sel = $(this);
            var val = $(this).val();
            $(this).nextAll('.cat_select').remove();
            if(id <= 0) {
                return false;
            }
            $('.loading').show();
            $.getJSON(url, {'id':id}, function(data){                
                if(data && data.length > 0) {
                    var html = '<select class="cat_select">'
                        + '<option value="0">==<?php echo Yii::t('admin', 'Select Category'); ?>==</option>';                
                        $.each(data, function(i, item){                    
                            html += '<option value="'+item.id+'">'+item.name+'</option>';
                        });
                    $(sel).after(html);                    
                }
                $('.loading').hide();
            });
            $('#Catalog_parent_id').val(val);            
        });
    });
</script>
