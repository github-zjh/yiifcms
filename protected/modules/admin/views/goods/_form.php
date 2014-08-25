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
    <td class="tb_title" ><?php echo Yii::t('admin','Goods Name');?>：</td>
  </tr>
  <tr >
    <td >
    	<?php echo $form->textField($model,'goods_name',array('size'=>60,'maxlength'=>128, 'class'=>'validate[required]')); ?>     
      </td>
  </tr> 
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Belong Category');?>：</td>
  </tr>
  <tr >
    <td ><select name="Goods[catalog_id]" id="Goods_catalog_id" onchange="changeCatalog(this)">
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>" <?php Helper::selected($catalog['id'], $model->catalog_id);?>><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
     </td>
  </tr>
 
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Cover Image');?>：</td>
  </tr>
  <tr >
    <td colspan="2" ><input name="attach" type="file" id="attach" />
      <?php if ($model->default_image):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->default_image;?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->default_image;?>" width="50" align="absmiddle" /></a>
      <?php endif?>
      <?php if ($model->default_thumb):?>
      <a href="<?php echo $this->_baseUrl.'/'. $model->default_thumb;?>" target="_blank"><img style="padding:5px; border:1px solid #cccccc;" src="<?php echo $this->_baseUrl.'/'. $model->default_thumb;?>" width="50" align="absmiddle" /></a>
      <?php endif?>   
  	</td>
  </tr>
  
  <tr>
    <td class="tb_title" ><?php echo Yii::t('model','GoodsPrice');?>：</td>
  </tr>
  <tr >
    <td >
    	￥<?php echo $form->textField($model,'price',array('size'=>5,'maxlength'=>10, 'class'=>'validate[required]')); ?>     
      </td>
  </tr> 
  
  <tr>
    <td class="tb_title"><?php echo Yii::t('admin','Description');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->textArea($model,'content'); ?>
     <?php 
	  		$this->widget('application.widget.ueditor.Ueditor',
				array('htmlOptions'=>
	  				array(
	  						'id'=>'Goods_content',//页面中输入框（或其他初始化容器）的ID
	  						'name'=>'ue',//指定ueditor实例的名称,个页面有多个ueditor实例时使用
							'config'=> array(
								'initialFrameHeight'=>'400',
								'initialFrameWidth'=>'80%',			
							),
	  				)
				)
	  		);
	  		?>
     </td>
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
            <a href='javascript:uploadifyRemove("<?php echo $row['fileId']?>", "image_")'><?php echo Yii::t('admin','Delete');?></a>
            <input name="imageList[fileId][]" type="hidden" value="<?php echo $row['fileId']?>">
            <input name="imageList[file][]" type="hidden" value="<?php echo $row['file']?>">
          </li>
          <?php endif?>
          <?php endforeach?>
        </ul>
      </div></td>
  </tr> 
  
  <tr>
    <td >   
    <?php echo Yii::t('model','ViewCount');?>：<?php echo $form->textField($model,'views',array('size'=>5,'maxlength'=>10)); ?>   
    <?php echo Yii::t('model','GoodsSales');?>：<?php echo $form->textField($model,'sales',array('size'=>5,'maxlength'=>10)); ?>   
    <?php echo Yii::t('model','sort_order');?> <?php echo $form->textField($model,'sort_order',array('size'=>5,'maxlength'=>10)); ?>
    </td>
  </tr>
  <tr >
    <td class="tb_title"><?php echo Yii::t('admin','Status');?>：</td>
  </tr>
  <tr >
    <td ><?php echo $form->dropDownList($model,'status',array('Y'=>Yii::t('admin','Show'), 'N'=>Yii::t('admin','Hidden'))); ?></td>
  </tr>
 
  <tr class="submit">
    <td colspan="2" ><input name="oAttach" type="hidden" value="<?php echo $model->default_image ?>" />
      <input name="oThumb" type="hidden" value="<?php echo $model->default_thumb ?>" />
      <input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
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