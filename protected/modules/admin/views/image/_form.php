<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jscolor/jscolor.js"></script>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title" ><?php echo Yii::t('admin','Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
      <input name="style[bold]" type="checkbox" id="style[bold]" <?php if($style['bold'] == 'Y'):?> checked="checked"<?php endif;?> value="Y" >
  <?php echo Yii::t('admin','Blod');?>
      <input name="style[underline]" type="checkbox" <?php if($style['underline'] == 'Y'):?> checked="checked"<?php endif;?> id="style[underline]" value="Y" >
  <?php echo Yii::t('admin','Underline');?>
      <input name="style[color]" class="color {required:false}" id="style[color]" value="<?php echo $style['color'];?>" size="5">      
      <?php echo Yii::t('admin','Color');?>
      </td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Title Second');?>：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'title_second',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr> 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>/<?php echo Yii::t('admin','Belong Special');?>：</td>
  </tr>
  <tr >
    <td ><select name="Image[catalog_id]" id="Image_catalog_id">
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php Helper::selected($catalog['id'], $model->catalog_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
      <select name="Image[special_id]">
        <option value="0">==<?php echo Yii::t('admin','Belong Special');?>==</option>
        <?php foreach((array)$this->_special as $speical):?>
        <option value="<?php echo $speical['id']?>" <?php Helper::selected($speical['id'], $model->special_id);?>><?php echo $speical['title']?></option>
        <?php endforeach;?>
      </select></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Come From');?>：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'copy_from',array('size'=>20,'maxlength'=>128)); ?><?php echo Yii::t('admin','Web Address');?><?php echo $form->textField($model,'copy_url',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Redirect Url(If fill in here, do not display content)');?>：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'redirect_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
  </tr>
  <tr >
    <td colspan="2" ><input name="attach" type="file" id="attach" />
      <?php if ($model->attach_file):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->attach_file?>" width="50" align="absmiddle" /></a>
      <?php endif?>
      <?php if ($model->attach_thumb):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->attach_thumb?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->attach_thumb?>" width="50" align="absmiddle" /></a>
      <?php endif?>   
  	</td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content'); ?>      
	  	<?php $this->widget('application.widget.kindeditor.KindEditor',array('id'=>'Image_content'));?>
	  	</td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Introduce');?>：</td>
  </tr>
  <tr >
    <td><?php echo CHtml::activeTextArea($model,'introduce',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Group Image');?>：</td>
  </tr>
  <tr >
    <td><div>
        <p><a href="javascript:uploadifyAction('fileListWarp')" ><img src="<?php echo $this->module->assetsUrl;?>/images/create.gif" align="absmiddle">添加图片</a></p>
        <ul id="fileListWarp">
          <?php foreach((array)$imageList as $key=>$row):?>
          <?php if($row):?>
          <li id="image_<?php echo $row['fileId']?>"><a href="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" target="_blank"><img src="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" width="40" height="40" align="absmiddle"></a>&nbsp;<br>
            <label>描述：</label><input name="imageList[desc][]" type="text" value="<?php echo $row['desc']?>" /><br/>
            <label>网址：</label><input name="imageList[url][]" type="text" value="<?php echo $row['url']?>" /><br/>
            <a href='javascript:uploadifyRemove("<?php echo $row['fileId']?>", "image_")'><?php echo Yii::t('admin','Delete');?></a>
            <input name="imageList[fileId][]" type="hidden" value="<?php echo $row['fileId']?>">
            <input name="imageList[file][]" type="hidden" value="<?php echo $row['file']?>">
            <input name="imageList[thumb][]" type="hidden" value="<?php echo $row['thumb']?>">
          </li>
          <?php endif?>
          <?php endforeach?>
        </ul>
      </div></td>
  </tr>
  
  <tr>
    <td  class="tb_title">Tags(逗号或空格隔开)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'tags',array('size'=>50,'maxlength'=>255)); ?>
      <input type="button" value="自动提取" onclick="keywordGet('Image_title', 'Image_content', 'Image_tags')"/></td>
  </tr>
  <tr>
    <td >
    <?php echo Yii::t('admin','Favorite Count');?>：<?php echo $form->textField($model,'favorite_count',array('size'=>5,'maxlength'=>10)); ?> 
    <?php echo Yii::t('admin','View Count');?>：<?php echo $form->textField($model,'view_count',array('size'=>5,'maxlength'=>10)); ?> 
    <?php echo Yii::t('admin','Sort Order');?> <?php echo $form->textField($model,'sort_desc',array('size'=>5,'maxlength'=>10)); ?>
    </td>
  </tr>
  <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?><?php echo $form->dropDownList($model,'commend',array('Y'=>'已推荐', 'N'=>'未推荐')); ?><?php echo $form->dropDownList($model,'top_line',array('Y'=>'头条', 'N'=>'非头条')); ?><?php echo $form->dropDownList($model,'reply_allow',array('Y'=>'允许回复', 'N'=>'不允许回复')); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Title');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td  class="tb_title"><?php echo Yii::t('admin','SEO Keywords');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','SEO Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo CHtml::activeTextArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>  
  <tr class="submit">
    <td colspan="2" >
      <input name="old_file" type="hidden" value="<?php echo $model->attach_file ?>" />
      <input name="old_thumb" type="hidden" value="<?php echo $model->attach_thumb ?>" />
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
});
</script>
<?php $form=$this->endWidget(); ?>
