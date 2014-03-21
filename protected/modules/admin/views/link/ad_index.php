<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>广告</h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('adCreate')?>" class="actionBtn"><span>录入</span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('ad'),'htmlOptions'=>array('name'=>'xform'))); ?>
      名称
      <input id="title" type="text" name="title" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="查询" class="button"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#title").val('<?php echo Yii::app()->request->getParam('ad_name')?>');
});
</script> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th>名称</th>
      <th width="15%">起始时间</th>
      <th width="15%">录入时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->title?>
        <?php if($row->status_is == 'N'):?>
        <img src="<?php echo $this->_baseUrl?>/static/admin/images/error.png" align="absmiddle" />
        <?php endif;?></p>
      <?php echo $row->title_alias?></td>
      <td ><?php echo date('Y-m-d H:i',$row->start_time)?></p><?php echo date('Y-m-d H:i',$row->expired_time)?></td>
      
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('adUpdate',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo  $this->createUrl('batch',array('command'=>'adDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="adDelete">删除</option>
            <option value="adVerify">显示</option>
            <option value="adUnVerify">隐藏</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>
<?php $this->renderPartial('/_include/footer');?>
