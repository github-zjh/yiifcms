<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Tags Manage');?></h3>
  <div class="searchArea">
    <ul class="action left">
      <li><a href="<?php echo $this->createUrl('tag/reset')?>" class="actionBtn"><span><?php echo Yii::t('admin','Reset Tags');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform'))); ?>
      
      名称
      <input id="tagName" type="text" name="tagName" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="查询" class="button"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#tagName").val('<?php echo Yii::app()->request->getParam('tagName')?>');
	$("#catalog_id").val('<?php echo Yii::app()->request->getParam('catalog_id')?>');
});
</script> 
    </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="8%">ID</th>     
      <th width="20%">Tag</th>
      <th width="10%">数据总数</th>
      <th width="8%">操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>      
      <td ><?php echo $row->tag_name?></td>
      <td ><span ><?php echo $row->data_count?></span></td>
      <td ><a href="<?php echo  $this->createUrl('batch',array('command'=>'tagsDelete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="tagsDelete">删除</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

