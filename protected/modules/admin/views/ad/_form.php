<?php if (CHtml::errorSummary($model)): ?>

    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif ?>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.fileupload.js"></script>
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'xform', 'htmlOptions' => array('name' => 'xform', 'enctype' => 'multipart/form-data'))); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'position_id'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->dropDownList($model, 'position_id', $this->_adposition); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->textField($model, 'title', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title_alias'); ?></td>
    </tr>
    <tr >
        <td ><?php echo $form->textField($model, 'title_alias', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'link_url'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->textField($model, 'link_url', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'image_url'); ?>(<?php echo Yii::t('admin', 'Please fill in the full path to the outsite resources'); ?>)：</td>
    </tr>
    <tr >
        <td ><?php echo $form->textField($model, 'image_url', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo Yii::t('admin', 'Image'); ?>：</td>
    </tr>
    <tr >
        <td >
            <input name="attach_file" type="hidden" id="attach_file" value="<?php echo $model->attach_file; ?>"/>            
            <input name="simple_file" id="fileupload" onclick="fileUpload()" type="file">
            <div id="img_preview" style="padding:10px;">
                <?php if ($model->attach_file): ?>                    
                    <a href="<?php echo $model->attach_file ?>" target="_blank">
                        <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo $model->attach_file ?>" align="absmiddle" />
                    </a>
                <?php endif ?>                
            </div>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'width'); ?>-<?php echo $form->label($model, 'height'); ?>(px)：</td>
    </tr>
    <tr >
        <td>
            <?php echo $form->label($model, 'width'); ?>:<?php echo $form->textField($model, 'width', array('size' => 10, 'maxlength' => 128)); ?>px
            <?php echo $form->label($model, 'height'); ?>:<?php echo $form->textField($model, 'height', array('size' => 10, 'maxlength' => 128)); ?>px
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'introduce'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->textArea($model, 'introduce', array('rows' => 5, 'cols' => 80)); ?></td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'sort_order'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->textField($model, 'sort_order', array('size' => 5, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'status'); ?>：</td>
    </tr>
    <tr >
        <td ><?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Yes'), 'N' => Yii::t('admin', 'No'))); ?></td>
    </tr>
    <tr class="submit">
        <td>
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" />
        </td>
    </tr>
</table>
<script type="text/javascript">    
     //ajax上传图片
    function fileUpload() {
        $('#fileupload').fileupload({
            url: "<?php echo $this->createUrl('ad/uploadSimple'); ?>",
            dataType: 'json',
            done: function (e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {
                    var atta_file = '';
                    if (data.data.file_path) {
                        $('#attach_file').val(data.data.file_path);
                        atta_file = '<a href="' + data.data.file_path + '" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.file_path + '"  align="absmiddle" /></a>';
                    }                    
                    $('#img_preview').html(atta_file);
                } else {
                    alert(data.message);
                }
                return false;
            }
        });
    }
</script>
<?php $this->endWidget();
