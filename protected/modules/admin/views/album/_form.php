<?php if (CHtml::errorSummary($model)): ?>
    <table id="tips">
        <tr>
            <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
        </tr>
    </table>
<?php endif ?>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jquery/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public ?>/js/jscolor/jscolor.js"></script>
<?php $form = $this->beginWidget('CActiveForm'); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 128, 'class' => 'validate[required]')); ?>
            <input name="style[bold]" type="checkbox" id="style[bold]" <?php if (isset($style['bold']) && $style['bold'] == 'Y'): ?> checked="checked"<?php endif; ?> value="Y" >
            <?php echo Yii::t('admin', 'Blod'); ?>
            <input name="style[underline]" type="checkbox" <?php if (isset($style['underline']) && $style['underline'] == 'Y'): ?> checked="checked"<?php endif; ?> id="style[underline]" value="Y" >
            <?php echo Yii::t('admin', 'Underline'); ?>
            <input name="style[color]" class="color {required:false}" id="style[color]" value="<?php echo isset($style['color']) ? $style['color'] : ''; ?>" size="5">      
            <?php echo Yii::t('admin', 'Color'); ?>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title_second'); ?>：</td>
    </tr>
    <tr>
        <td  ><?php echo $form->textField($model, 'title_second', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr> 
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'catalog_id'); ?>/<?php echo $form->label($model, 'special_id'); ?>：</td>
    </tr>
    <tr>
        <td>
            <?php if(!$model->isNewRecord && isset($parents) && $parents) :?>
            <div><?php echo $parents;?></div>
            <?php endif;?>
            <select class="cat_select">
                <option value="0">==<?php echo Yii::t('admin', 'Top Category'); ?>==</option>
                <?php foreach ($this->_catalog as $catalog): ?>
                    <option value="<?php echo $catalog['id'] ?>"><?php echo $catalog['catalog_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo $form->hiddenfield($model, 'catalog_id');?>
            <span class="loading" style="display:none;">loading...</span>            
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'special_id'); ?>：</td>
    </tr>
    <tr>
        <td>
            <select name="Album[special_id]">
                <option value="0">==<?php echo $form->label($model, 'special_id'); ?>==</option>
                <?php foreach ((array) $this->_special as $speical): ?>
                    <option value="<?php echo $speical['id'] ?>" <?php Helper::selected($speical['id'], $model->special_id); ?>><?php echo $speical['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'copy_from'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'copy_from', array('size' => 20, 'maxlength' => 128)); ?><?php echo $form->label($model, 'copy_url'); ?><?php echo $form->textField($model, 'copy_url', array('size' => 50, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'redirect_url'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model, 'redirect_url', array('size' => 60, 'maxlength' => 128)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'attach_file'); ?>：</td>
    </tr>
    <tr>
        <td colspan="2" >
            <input name="attach_file" type="hidden" id="attach_file" value="<?php echo $model->attach_file; ?>"/>
            <input name="attach_thumb" type="hidden" id="attach_thumb" value="<?php echo $model->attach_thumb; ?>"/>
            <input name="simple_file" id="fileupload" onclick="fileUpload()" type="file">
            <div id="img_preview" style="padding:10px;">
                <?php if ($model->attach_file): ?>
                    <span>大图：</span>
                    <a href="<?php echo Helper::getFullUrl($model->attach_file); ?>" target="_blank">
                        <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->attach_file); ?>" align="absmiddle" />
                    </a>
                <?php endif ?>
                <?php if ($model->attach_thumb): ?>
                    <span>小图：</span>
                    <a href="<?php echo Helper::getFullUrl($model->attach_thumb); ?>"  target="_blank">
                        <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->attach_thumb); ?>" align="absmiddle" />
                    </a>
                <?php endif ?>
            </div>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'content'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textArea($model->content, 'content'); ?>      
            <?php $this->widget('application.widget.kindeditor.KindEditor', array('id' => 'AlbumContent_content')); ?>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'introduce'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeTextArea($model->content, 'introduce', array('rows' => 5, 'cols' => 90)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'album_list'); ?>：</td>
    </tr>
    <tr>
        <td>
            <div>
                <?php $this->widget('application.widget.resumable.Resumable', array('options' => array('upload_url' => $this->createUrl('album/uploadResumable'), 'upload_file_name' => 'imagelist[]'))); ?>  				        
            </div>
            <!-- 显示已上传的文件-->            
            <ul class="resumable-files clear">
                <?php if (isset($imageList) && $imageList): ?>
                    <?php foreach ($imageList as $img): ?>
                        <li>
                            <img src="<?php echo Helper::getFullUrl($img); ?>" width="100px" height="100px">
                            <input type="hidden" value="<?php echo $img; ?>" name="imagelist[]">
                            <div class="clear">
                                <a href="<?php echo Helper::getFullUrl($img); ?>" class="left" target="_blank">[查看]</a>
                                <a href="javascript:;" class="right" onclick="deleteFile(this)">[删除]</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </td>
    </tr>

    <tr>
        <td  class="tb_title"><?php echo $form->label($model, 'tags'); ?>(逗号或空格隔开)：</td>
    </tr>
    <tr>
        <td>
            <?php echo $form->textField($model, 'tags', array('size' => 50, 'maxlength' => 255)); ?>
            <input type="button" value="自动提取" onclick="keywordGet('Album_title', 'AlbumContent_content', 'Album_tags')"/>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo Yii::t('admin', 'Favorite Count'); ?>：<?php echo $form->textField($model, 'favorite_count', array('size' => 5, 'maxlength' => 10)); ?> 
            <?php echo Yii::t('admin', 'View Count'); ?>：<?php echo $form->textField($model, 'view_count', array('size' => 5, 'maxlength' => 10)); ?> 
            <?php echo Yii::t('admin', 'Sort Order'); ?> <?php echo $form->textField($model, 'sort_order', array('size' => 5, 'maxlength' => 10)); ?>
        </td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'status'); ?>：</td>
    </tr>
    <tr>
        <td  ><?php echo $form->dropDownList($model, 'status', array('Y' => Yii::t('admin', 'Show'), 'N' => Yii::t('admin', 'Hidden'))); ?><?php echo $form->dropDownList($model, 'commend', array('Y' => '已推荐', 'N' => '未推荐')); ?><?php echo $form->dropDownList($model, 'top_line', array('Y' => '头条', 'N' => '非头条')); ?><?php echo $form->dropDownList($model, 'reply_allow', array('Y' => '允许回复', 'N' => '不允许回复')); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'seo_title'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model->content, 'seo_title', array('size' => 50, 'maxlength' => 80)); ?></td>
    </tr>
    <tr>
        <td  class="tb_title"><?php echo $form->label($model->content, 'seo_keywords'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model->content, 'seo_keywords', array('size' => 50, 'maxlength' => 80)); ?></td>
    </tr>
    <tr>
        <td class="tb_title"><?php echo $form->label($model->content, 'seo_description'); ?>：</td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeTextArea($model->content, 'seo_description', array('rows' => 5, 'cols' => 80)); ?></td>
    </tr>  
    <tr class="submit">
        <td colspan="2" >            
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common', 'Submit'); ?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<script type="text/javascript">
    //ajax上传图片
    function fileUpload() {
        $('#fileupload').fileupload({
            url: "<?php echo $this->createUrl('album/uploadSimple'); ?>",
            dataType: 'json',
            done: function (e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {
                    var atta_file = '', atta_thumb = '';
                    if (data.data.file_path) {
                        $('#attach_file').val(data.data.file_path);
                        atta_file = '<span>大图：</span><a href="' + data.data.file_path_full + '" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.file_path_full + '"  align="absmiddle" /></a>';
                    }
                    if (data.data.thumb_path) {
                        $('#attach_thumb').val(data.data.thumb_path);
                        atta_thumb = '<span>小图：</span><a href="' + data.data.thumb_path_full + '" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="' + data.data.thumb_path_full + '"  align="absmiddle" /></a>';
                    }
                    $('#img_preview').html(atta_file + atta_thumb);
                } else {
                    alert(data.message);
                }
                return false;
            }
        });
    }   
</script>
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
            $('#Album_catalog_id').val(val);            
        });
    });
</script>
