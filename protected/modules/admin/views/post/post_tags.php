<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>Tags</h3>
  <div class="searchArea">
    <ul class="action left" >
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('newsTags'),'htmlOptions'=>array('name'=>'xform'))); ?>
      <select name="catalog_id" id="catalog_id">
        <option value="">=全部内容=</option>
        <?php foreach((array)Catalog::get(12, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>"><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?>
        <?php if ($catalog['catalog_name_alias']):?>
        <?php endif;?>
        </option>
        <?php endforeach;?>
      </select>
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
	$("#catalog_id").val('<?php echo $this->_gets->getParam('catalog_id')?>');
});
</script> 
    </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="8%">ID</th>
      <th width="20%">分类</th>
      <th width="20%">Tag</th>
      <th >数据总数</th>
      <th width="15%">录入时间</th>
      <th width="8%">操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->catalog->catalog_name?></td>
      <td ><?php echo $row->tag_name?></td>
      <td ><span ><?php echo $row->data_count?></span></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('batch',array('command'=>'tagsDelete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
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
<?php $this->renderPartial('/_include/footer');?>
