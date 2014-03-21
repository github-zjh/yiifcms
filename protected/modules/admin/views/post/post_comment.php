<div id="contentHeader">
  <h3>评论管理</h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span>录入内容</span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','htmlOptions'=>array('name'=>'xform'))); ?>
      内容标题
      <input id="postTitle" type="text" name="postTitle" value="" class="txt" size="15"/>
      评论内容
      <input id="content" type="text" name="content" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="查询" class="button"/>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#postTitle").val('<?php echo $this->_request->getParam('postTitle')?>');
	$("#content").val('<?php echo $this->_request->getParam('content')?>');
});
</script> 
    </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="8%">ID</th>
      <th width="10%">评论者</th>
      <th width="20%">标题</th>
      <th >评论内容</th>
      <th width="15%">评论时间</th>
      <th width="8%">操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list" <?php if($row->status_is=='N'):?>style=" background:#F0F7FC"<?php endif?>>
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->nickname ?></td>
      <td ><?php echo $row->post->title ?></td>
      <td ><?php echo nl2br(htmlspecialchars($row->content)) ?></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('commentUpdate',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;<a href="<?php echo  $this->createUrl('batch',array('command'=>'commentDelete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll( this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="commentDelete">删除</option>
            <option value="commentVerify">审核通过</option>
            <option value="commentUnVerify">取消审核</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

