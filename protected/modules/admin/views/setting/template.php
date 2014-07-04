<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Template Set');?></h3>
  <span class="red">注意：输入内容(统计代码除外)时，不允许带有(&amp;,&gt;,&lt;)，否则在严格的环境下会提交不上。</span>
</div>
<?php $form = $this->beginWidget('CActiveForm', array('id'=>'xform','htmlOptions'=>array('name'=>'xform','method'=>'post')));?>

  <table class="content_list">
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Themes');?>：</td>
    </tr>
    <tr >
	     <td >
		     <select name="Setting[theme]">
		        <option value="0">==<?php echo Yii::t('admin','Select Themes');?>==</option>
		        <?php foreach($themes as $key=>$theme):?>
		        <option value="<?php echo $theme;?>" <?php $this->selected($setting['theme'], $theme);?>><?php echo Yii::t('admin',ucfirst($theme)).'('.$theme.')';?></option>
		        <?php endforeach;?>
		      </select>
	      </td>      
    </tr>    
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
    </tr>
  </table>
<?php $form = $this->endWidget();?>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script> 
