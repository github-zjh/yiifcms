<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>

<!-- ajax上传必需js开始 -->
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery.fileupload.js"></script>
<!-- ajax上传必需js结束 -->

<?php $form = $this->beginWidget('CActiveForm'); ?>
<table class="form_table">
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'title');?>：</td>
    </tr>
    <tr>
        <td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?></td>
    </tr>  
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'img_cover');?>：</td>
    </tr>
    <tr>
        <td>
            <input name="img_cover" id="special_cover" type="hidden" value="<?php echo $model->img_cover;?>"/>
            <input name="simple_file" id="fileupload_cover" onclick="fileUpload()" type="file" />
            <div id="cover_preview">
            <?php if ($model->img_cover):?>
                <a href="<?php echo Helper::getFullUrl($model->img_cover);?>" target="_blank">
                    <img style="max-width: 300px; max-height: 300px;  padding:5px; border:1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->img_cover);?>" align="absmiddle" />
                </a>
            <?php endif;?>     
        </td>
    </tr>
    <tr>
        <td  class="tb_title"><?php echo $form->label($model, 'img_banner');?>：</td>
    </tr>
    <!-- 专题banner -->
    <tr>
      <td>
            <input name="img_banner" id="special_banner" type="hidden" value="<?php echo $model->img_banner;?>"/>
            <input name="simple_file" id="fileupload_banner" onclick="fileUpload()" type="file" />
            <div id="banner_preview">
            <?php if ($model->img_banner):?>
            <a href="<?php echo Helper::getFullUrl($model->img_banner);?>" target="_blank">
                <img style="max-width: 900px; max-height: 300px; padding:5px; border:1px solid #cccccc;" src="<?php echo Helper::getFullUrl($model->img_banner);?>" align="absmiddle" />
            </a>
            <?php endif;?>     
      </td>
    </tr>

    <!-- 专题简介 -->
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'introduce');?>：</td>
    </tr>
    <tr>
        <td ><?php echo $form->textArea($model,'introduce', array('rows' => 10, 'cols' => 100)); ?></td>
    </tr>

    <!-- 专题状态\排序 -->
    <tr>
        <td class=" rowform">
        <?php echo Yii::t('admin','Status');?>：<?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?>
        <?php echo Yii::t('admin','Sort Order');?>：<?php echo $form->textField($model,'sort_order',array('size'=>8,'maxlength'=>8)); ?>
        </td>
    </tr>

    <!-- 专题seo标题 -->
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_title');?>：</td>
    </tr>
    <tr>
        <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>255)); ?></td>
    </tr>

    <!-- 专题seo关键字 -->  
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_keywords');?>：</td>
    </tr>
    <tr>
        <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>255)); ?></td>
    </tr>

    <!-- 专题seo描述 -->  
    <tr>
        <td class="tb_title"><?php echo $form->label($model, 'seo_description');?>：</td>
    </tr>
    <tr>
        <td ><?php echo $form->textArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
    </tr>
    
    <!-- 提交 -->
    <tr class="submit">
        <td>          
            <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
        </td>
    </tr>
</table>
<script type="text/javascript">
    //ajax上传图片
    function fileUpload() {        
        $('#fileupload_cover').fileupload({
            url: "<?php echo $this->createUrl('special/uploadCover');?>",
            dataType: 'json',
            done: function(e, JsonData) {                
                var data = JsonData.result;
                if (200 === data.code) {                    
                    var atta_file = '';
                    if(data.data.file_path) {
                        $('#special_cover').val(data.data.file_path);
                        atta_file = '<a href="'+data.data.file_path_full+'" target="_blank"><img  style="max-width:300px; max-height:300px; padding: 5px; border: 1px solid #cccccc;"  src="'+data.data.file_path_full+'"  align="absmiddle" /></a>';
                    }                    
                    $('#cover_preview').html(atta_file);                    
                }else{
                    alert(data.message);
                }
                return false;
            }
        });
        $('#fileupload_banner').fileupload({
            url: "<?php echo $this->createUrl('special/uploadBanner');?>",
            dataType: 'json',
            done: function(e, JsonData) {                
                var data = JsonData.result;
                if (200 === data.code) {                    
                    var atta_file = '';
                    if(data.data.file_path) {
                        $('#special_banner').val(data.data.file_path);
                        atta_file = '<a href="'+data.data.file_path_full+'" target="_blank"><img  style="max-width:900px; max-height:300px; padding: 5px; border: 1px solid #cccccc;"  src="'+data.data.file_path_full+'"  align="absmiddle" /></a>';
                    }                    
                    $('#banner_preview').html(atta_file);                    
                }else{
                    alert(data.message);
                }
                return false;
            }
        });
    }    
</script>
<?php $this->endWidget();
