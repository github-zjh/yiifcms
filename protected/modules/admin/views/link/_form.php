<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif; ?>

<!-- ajax上传必须js开始 -->
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.fileupload.js"></script>
<!-- ajax上传必须js结束 -->

<?php $form = $this->beginWidget('CActiveForm'); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'title', array('size' => 40, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'url'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'logo'); ?>：</td>
    </tr>
    <tr>
        <td>
            <input name="logo" type="hidden" id="logo" value="<?php echo $model->logo; ?>"/>            
            <input name="simple_file" id="fileupload" onclick="fileUpload()" type="file" />
            <div id="img_logo" style="padding:10px;">
                <?php if ($model->logo): ?>
                    <span>LOGO：</span>
                    <a href="<?php echo Helper::getFullUrl($model->logo); ?>" target="_blank">
                        <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->logo); ?>" align="absmiddle" />
                    </a>
                <?php endif; ?>                
            </div>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'sort_order'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'sort_order', array('size' => 5, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'status'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Yes'), 'N' => Yii::t('admin', 'No'))); ?></td>
    </tr>
    <tr class="submit">
        <td>            
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<?php $this->endWidget();?>

<script type="text/javascript">
    //ajax上传图片
    function fileUpload() {
        $('#fileupload').fileupload({
            url: "<?php echo $this->createUrl('link/uploadSimple'); ?>",
            dataType: 'json',
            done: function (e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {
                    var logo = '';
                    if (data.data.file_path) {
                        $('#logo').val(data.data.file_path);
                        atta_file = '<span>LOGO：</span><a href="' + data.data.file_path_full + '" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.file_path_full + '"  align="absmiddle" /></a>';
                    }                    
                    $('#img_logo').html(atta_file);
                } else {
                    alert(data.message);
                }
                return false;
            }
        });
    }   
</script>
