<?php if (CHtml::errorSummary($model)):?>
<table id="tips">
  <tr>
    <td><div class="erro_div"><span class="error_message"> <?php echo CHtml::errorSummary($model); ?> </span></div></td>
  </tr>
</table>
<?php endif?>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/jscolor/jscolor.js"></script>
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'xform','htmlOptions'=>array('name'=>'xform','enctype'=>'multipart/form-data'))); ?>
<table class="form_table">
  <tr>
    <td class="tb_title" >标题：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>
      <input name="style[bold]" type="checkbox" id="style[bold]" value="Y" >
      加粗
      <input name="style[underline]" type="checkbox" id="style[underline]" value="Y" >
      下划线
      <input name="style[color]" class="color {required:false}" id="style[color]" value="" size="5"></td>
  </tr>
  <tr>
    <td class="tb_title">副标题：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'title_second',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">唯一标识(英文字母或数字组合)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'title_alias',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">所属类别/所属专题：</td>
  </tr>
  <tr >
    <td ><select name="Post[catalog_id]" id="Post_catalog_id" onchange="changeCatalog(this)">
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php $this->selected($catalog['id'], $model->catalog_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
      <select name="Post[special_id]">
        <option value="0">==所属专题==</option>
        <?php foreach((array)$this->_special as $speical):?>
        <option value="<?php echo $speical['id']?>" <?php $this->selected($speical['id'], $model->special_id);?>><?php echo $speical['title']?></option>
        <?php endforeach;?>
      </select></td>
  </tr>
  <tr>
    <td class="tb_title">来源：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'copy_from',array('size'=>20,'maxlength'=>128)); ?>网址<?php echo $form->textField($model,'copy_url',array('size'=>50,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">跳转网址(此处若填写，则不显示内容)：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->textField($model,'redirect_url',array('size'=>60,'maxlength'=>128)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">封面图片：</td>
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
    <td class="tb_title">详细介绍：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content', array('class'=>'validate[required]')); ?>
      <?php $this->widget('application.widget.kindeditor.KindEditor',array(
	  'target'=>array(
	  	'#Post_content'=>array('uploadJson'=>$this->createUrl('/admin/uploadify/basicexecute', array('from'=>'editor')),		
		'allowFileManager'=>true, 		
	  	'extraFileUploadParams'=>array(array('sessionId'=>Yii::app()->session->sessionID))))));?></td>
  </tr>
  <tr>
    <td class="tb_title">摘要：</td>
  </tr>
  <tr >
    <td><?php echo CHtml::activeTextArea($model,'intro',array('rows'=>5, 'cols'=>90)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">组图：</td>
  </tr>
  <tr >
    <td><div>
        <p><a href="javascript:uploadifyAction('fileListWarp')" ><img src="<?php echo $this->_baseUrl?>/static/admin/images/create.gif" align="absmiddle">添加图片</a></p>
        <ul id="fileListWarp">
          <?php foreach((array)$imageList as $key=>$row):?>
          <?php if($row):?>
          <li id="image_<?php echo $row['fileId']?>"><a href="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" target="_blank"><img src="<?php echo $this->_baseUrl?>/<?php echo $row['file']?>" width="40" height="40" align="absmiddle"></a>&nbsp;<br>
            <a href='javascript:uploadifyRemove("<?php echo $row['fileId']?>", "image_")'>删除</a>
            <input name="imageList[fileId][]" type="hidden" value="<?php echo $row['fileId']?>">
            <input name="imageList[file][]" type="hidden" value="<?php echo $row['file']?>">
          </li>
          <?php endif?>
          <?php endforeach?>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td class="tb_title">模板：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'template',array('size'=>30,'maxlength'=>80)); ?>留空则继承栏目中设置的模板</td>
  </tr>
  <tr>
    <td  class="tb_title">Tags(逗号或空格隔开)：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'tags',array('size'=>50,'maxlength'=>255)); ?>
      <input type="button" value="自动提取" onclick="keywordGet('Post_title', 'Post_tags')"/></td>
  </tr>
  <tr>
    <td >收藏次数：<?php echo $form->textField($model,'favorite_count',array('size'=>5,'maxlength'=>10)); ?> 关注人数<?php echo $form->textField($model,'attention_count',array('size'=>5,'maxlength'=>10)); ?>查看次数：<?php echo $form->textField($model,'view_count',array('size'=>5,'maxlength'=>10)); ?> 评论次数 <?php echo $form->textField($model,'reply_count',array('size'=>5,'maxlength'=>10)); ?>排序 <?php echo $form->textField($model,'sort_desc',array('size'=>5,'maxlength'=>10)); ?></td>
  </tr>
  <tr >
    <td class="tb_title">状态：</td>
  </tr>
  <tr >
    <td  ><?php echo $form->dropDownList($model,'status_is',array('Y'=>'显示', 'N'=>'隐藏')); ?><?php echo $form->dropDownList($model,'commend',array('Y'=>'已推荐', 'N'=>'未推荐')); ?><?php echo $form->dropDownList($model,'top_line',array('Y'=>'头条', 'N'=>'非头条')); ?><?php echo $form->dropDownList($model,'reply_allow',array('Y'=>'允许回复', 'N'=>'不允许回复')); ?></td>
  </tr>
  <tr>
    <td class="tb_title">SEO标题：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_title',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td  class="tb_title">SEO关键字：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textField($model,'seo_keywords',array('size'=>50,'maxlength'=>80)); ?></td>
  </tr>
  <tr>
    <td class="tb_title">SEO描述：</td>
  </tr>
  <tr >
    <td ><?php echo CHtml::activeTextArea($model,'seo_description',array('rows'=>5, 'cols'=>80)); ?></td>
  </tr>
  <tbody id="attrArea" <?php if(!$attrModel):?> style="display:none"<?php endif?>>
    <tr>
      <td class="tb_title">自定义属性：</td>
    </tr>
    <tr>
      <td  colspan="2">
      <div id="attr2cotnent">
         
        </div>
        </td>
    </tr>
  </tbody>
  <tr class="submit">
    <td colspan="2" ><input name="oAttach" type="hidden" value="<?php echo $model->attach_file ?>" />
      <input name="oThumb" type="hidden" value="<?php echo $model->attach_thumb ?>" />
      <input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();
});
</script>
<?php $form=$this->endWidget(); ?>
<script>
function changeCatalog(ths){
	$.post("<?php echo $this->createUrl('ajax/attr2content')?>", {catalog:ths.value}, function(res){
		if(res.state == 'success'){
			$("#attr2cotnent").html(res.text);
			$("#attrArea").show();
		}else{
			$("#attrArea").hide();
			$("#attr2cotnent").html('');
		}
	},'json');
}
</script>