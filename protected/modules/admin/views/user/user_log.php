<?php $this->renderPartial('/_include/header');?>

<div id="contentHeader">
  <h3>用户日志</h3>
  <div class="searchArea">
    <ul class="action left" >
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('userLog'),'htmlOptions'=>array('name'=>'xform'))); ?>
      用户
      <input id="username" type="text" name="username" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" class="btn" value="搜索"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#username").val('<?php echo $this->_gets->getParam('username')?>');
});
</script></div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th  width="8%">ID</th>
      <th width="12%">用户</th>
      <th width="8%">操作类型</th>
      <th >URL</th>
      <th width="15%">记录时间</th>
      <th width="8%">操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->user->username?></td>
      <td ><?php echo $row->type_id?></td>
      <td><input type="text" value="<?php echo trim($row->action) ;?>" size="80%" /></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('batch',array('command'=>'userLogDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll( this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="userLogDelete">删除</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>
<?php $this->renderPartial('/_include/footer');?>
