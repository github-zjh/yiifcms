<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
	<tr>
		<td>
			<div class="erro_div">
				<span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span>
			</div>
		</td>
	</tr>
</table>
<?php endif?>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jscolor/jscolor.js"></script>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Title');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
      <input name="style[bold]" type="checkbox" id="style[bold]"
				<?php if($style && $style['bold'] == 'Y'):?> checked="checked" <?php endif;?>
				value="Y">
  <?php echo Yii::t('admin','Blod');?>
      <input name="style[underline]" type="checkbox"
				<?php if($style && $style['underline'] == 'Y'):?> checked="checked"
				<?php endif;?> id="style[underline]" value="Y">
  <?php echo Yii::t('admin','Underline');?>
      <input name="style[color]" class="color {required:false}"
				id="style[color]" value="<?php echo isset($style['color'])?$style['color']:'';?>" size="5">      
      <?php echo Yii::t('admin','Color');?>
      </td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Title Second');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'title_second',array('size'=>60,'maxlength'=>128)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>/<?php echo Yii::t('admin','Belong Special');?>：</td>
	</tr>
	<tr>
		<td>
            <select name="Post[catalog_id]" id="Post_catalog_id">
                <?php foreach ((array) Catalog::get(0, $this->_catalog) as $catalog): ?>
                    <option value="<?php echo $catalog['id'] ?>"
                        <?php Helper::selected($catalog['id'], $model->catalog_id); ?>><?php echo $catalog['str_repeat'] ?><?php echo $catalog['catalog_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="Post[special_id]">
                <option value="0">==<?php echo Yii::t('admin', 'Belong Special'); ?>==</option>
                <?php foreach ((array) $this->_special as $speical): ?>
                    <option value="<?php echo $speical['id'] ?>"
                        <?php Helper::selected($speical['id'], $model->special_id); ?>><?php echo $speical['title'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
		</td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Come From');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'copy_from',array('size'=>20,'maxlength'=>128)); ?><?php echo Yii::t('admin','Web Address');?><?php echo $form->textField($model,'copy_url',array('size'=>50,'maxlength'=>128)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Redirect Url(If fill in here, do not display content)');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'redirect_url',array('size'=>60,'maxlength'=>128)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
	</tr>
	<tr>
		<td colspan="2">
			<input name="attach_file" type="hidden" id="attach_file" value="<?php echo $model->attach_file;?>"/>
            <input name="attach_thumb" type="hidden" id="attach_thumb" value="<?php echo $model->attach_thumb;?>"/>
            <input name="simple_file" id="fileupload" onclick="fileUpload()" type="file">
            <div id="img_preview" style="padding:10px;">
                <?php if ($model->attach_file):?>
                <span>大图：</span>
                <a href="<?php echo $model->attach_file?>" target="_blank">
                    <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo $model->attach_file?>" align="absmiddle" />
                </a>
                <?php endif?>
                <?php if ($model->attach_thumb):?>
                <span>小图：</span>
                <a href="<?php echo $model->attach_thumb?>"  target="_blank">
                    <img style="max-width:600px; padding: 5px; border: 1px solid #cccccc;" src="<?php echo $model->attach_thumb?>" align="absmiddle" />
                </a>
                <?php endif?>
            </div>
        </td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
	</tr>
	<tr>
		<td>
            <?php echo $form->textArea($model,'content'); ?>
            <?php $this->widget('application.widget.kindeditor.KindEditor',array( 'id'=>'Post_content'));?>
	  	</td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Introduce');?>：</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextArea($model,'introduce',array('rows'=>5, 'cols'=>90)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Group Image');?>：</td>
	</tr>
	<tr>
		<td>
			<div>
				<?php $this->widget('application.widget.resumable.Resumable', array('options'=>array('upload_url'=>$this->createUrl('post/uploadResumable'))));?>  				        
			</div>
            <!-- 显示已上传的文件-->            
            <ul class="resumable-files clear">
                <?php if($imageList):?>
                <?php foreach($imageList as $img):?>
                <li>
                    <img src="<?php echo $img;?>" width="100px" height="100px">
                    <input type="hidden" value="<?php echo $img;?>" name="imagelist[]">
                    <div class="clear">
                        <a href="<?php echo $img;?>" class="left" target="_blank">[查看]</a>
                        <a href="javascript:;" class="right" onclick="deleteFile(this)">[删除]</a>
                    </div>
                </li>
                <?php endforeach;?>
                <?php endif;?>
            </ul>
		</td>
	</tr>

	<tr>
		<td class="tb_title">Tags(逗号或空格隔开)：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'tags',array('size'=>50,'maxlength'=>255)); ?>
      		<input type="button" value="自动提取"	onclick="keywordGet('Post_title', 'Post_content', 'Post_tags')" />
		</td>
	</tr>
	<tr>
		<td>
            <?php echo Yii::t('admin','Favorite Count');?>：<?php echo $form->textField($model,'favorite_count',array('size'=>5,'maxlength'=>10)); ?> 
            <?php echo Yii::t('admin','View Count');?>：<?php echo $form->textField($model,'view_count',array('size'=>5,'maxlength'=>10)); ?> 
            <?php echo Yii::t('admin','Sort Order');?> <?php echo $form->textField($model,'sort_desc',array('size'=>5,'maxlength'=>10)); ?>
        </td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
	</tr>
	<tr>
		<td>
			<?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?>
			<?php echo $form->dropDownList($model,'top_line',array('Y'=>Yii::t('common','Stick'), 'N'=>Yii::t('common','Cancel Stick'))); ?>
			<?php echo $form->dropDownList($model,'reply_allow',array('Y'=>Yii::t('common','Allow Comment'), 'N'=>Yii::t('common','Deny Comment'))); ?>
		</td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','SEO Title');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>80)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','SEO Keywords');?>：</td>
	</tr>
	<tr>
		<td><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>80)); ?></td>
	</tr>
	<tr>
		<td class="tb_title"><?php echo Yii::t('admin','SEO Description');?>：</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
	</tr>
	<tr class="submit">
		<td colspan="2">			
			<input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" />
		</td>
	</tr>
</table>
<script type="text/javascript">
     //ajax上传图片
    function fileUpload() {        
        $('#fileupload').fileupload({
            url: "<?php echo $this->createUrl('post/uploadSimple');?>",
            dataType: 'json',
            done: function(e, JsonData) {
                var data = JsonData.result;
                if (200 === data.code) {                    
                    var atta_file = '', atta_thumb = '';
                    if(data.data.file_path) {
                        $('#attach_file').val(data.data.file_path);
                        atta_file = '<span>大图：</span><a href="'+data.data.file_path+'" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="'+data.data.file_path+'"  align="absmiddle" /></a><br/>';
                    }
                    if(data.data.thumb_path) {
                        $('#attach_thumb').val(data.data.thumb_path);
                        atta_thumb = '<span>小图：</span><a href="'+data.data.thumb_path+'" target="_blank"><img  style="max-width:600px; padding: 5px; border: 1px solid #cccccc;"  src="'+data.data.thumb_path+'"  align="absmiddle" /></a>';
                    }
                    $('#img_preview').html(atta_file+atta_thumb);                    
                }else{
                    alert(data.message);
                }
                return false;
            }
        });
    }
$(function(){
	$("#xform").validationEngine();	   
});
</script>
<?php $this->endWidget();
