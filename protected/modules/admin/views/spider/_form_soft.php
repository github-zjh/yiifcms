<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>

<!-- ajax上传必需js开始 -->
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.fileupload.js"></script>
<!-- ajax上传必需js结束 -->

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
    
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'soft_icon'); ?>(120*120)：</td>
    </tr>
    <tr>
        <td colspan="2" >
            <?php echo $form->hiddenField($model->content, 'soft_icon');?>            
            <input name="simple_file" id="fileupload_icon" onclick="fileUpload()" type="file" />
            <div id="icon_preview">
                <?php if ($model->content->soft_icon): ?>
                <a href="<?php echo Helper::getFullUrl($model->content->soft_icon); ?>" target="_blank">
                    <img style="padding:5px; border:1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->content->soft_icon); ?>" width="50" align="absmiddle" />
                </a>
                <?php endif; ?>    
            </div>
        </td>
    </tr>

    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'soft_img'); ?>：</td>
    </tr>
    <tr>
        <td colspan="2" >
            <?php echo $form->hiddenField($model->content, 'soft_img');?>            
            <input name="simple_file" id="fileupload_cover" onclick="fileUpload()" type="file" />
            <div id="cover_preview">
                <?php if ($model->content->soft_img): ?>        
                <a href="<?php echo Helper::getFullUrl($model->content->soft_img); ?>" target="_blank">
                    <img style="max-width:300px; max-height:300px; padding:5px; border:1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->content->soft_img); ?>" align="absmiddle" />
                </a>
                <?php endif; ?>
            </div>
        </td>
    </tr>
    
    <!-- 如果内容已采集 -->
    <?php if($model->content):?>
    <tr>
        <td><?php echo $form->label($model->content, 'content');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model->content, 'content'); ?>      
            <?php $this->widget('application.widget.kindeditor.KindEditor', array('id' => 'SpiderSoftContent_content')); ?>
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
<?php $this->endWidget();?>
<script type="text/javascript">
     //ajax上传图片
    function fileUpload() {
        $('#fileupload_icon').fileupload({
            url: "<?php echo $this->createUrl('spider/uploadSimple'); ?>",
            dataType: 'json',
            done: function (e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {
                    var atta_file = '';
                    if (data.data.file_path) {
                        $('#SpiderSoftContent_soft_icon').val(data.data.file_path);
                        atta_file = '<a href="' + data.data.file_path_full + '" target="_blank"><img  style="max-width:300px; max-height:300px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.file_path_full + '"  align="absmiddle" /></a>';
                    }
                    $('#icon_preview').html(atta_file);
                } else {
                    alert(data.message);
                }
                return false;
            }
        });
        $('#fileupload_cover').fileupload({
            url: "<?php echo $this->createUrl('spider/uploadSimple'); ?>",
            dataType: 'json',
            done: function (e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {
                    var atta_file = '';
                    if (data.data.file_path) {
                        $('#SpiderSoftContent_soft_img').val(data.data.file_path);
                        atta_file = '<a href="' + data.data.file_path_full + '" target="_blank"><img  style="max-width:300px; max-height:300px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.file_path_full + '"  align="absmiddle" /></a>';
                    }
                    $('#cover_preview').html(atta_file);
                } else {
                    alert(data.message);
                }
                return false;
            }
        });
    }
</script>
