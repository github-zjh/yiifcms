<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Comment Manage');?></h3>
  <div class="searchArea">    
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','htmlOptions'=>array('name'=>'xform'))); ?>
  <?php echo Yii::t('admin','Comment Title');?>
      <input id="postTitle" type="text" name="postTitle" value="" class="txt" size="15"/>
  <?php echo Yii::t('admin','Comment Content');?>
      <input id="content" type="text" name="content" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
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
      <th width="10%"><?php echo Yii::t('admin','Comment User');?></th>
      <th width="20%"><?php echo Yii::t('admin','Comment Title');?></th>
      <th ><?php echo Yii::t('admin','Comment Content');?></th>
      <th width="10%"><?php echo Yii::t('admin','Comment Status');?></th>
      <th width="15%"><?php echo Yii::t('admin','Comment Time');?></th>
      <th width="8%"><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list" <?php if($row->status_is=='N'):?>style=" background:#F0F7FC"<?php endif?>>
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->nickname ?></td>
      <td ><?php echo $row->post->title ?></td>
      <td ><?php echo nl2br(htmlspecialchars($row->content)) ?></td>
      <td ><?php echo $row->status_is=='Y'?"<span style='color:green'>".Yii::t('admin','Pass Checking')."</span>":"<span style='color:red'>".Yii::t('admin','Wait Checking')."</span>"; ?></td>
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
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option><?php echo Yii::t('admin','Select Operate');?></option>
            <option value="commentDelete"><?php echo Yii::t('admin','Delete');?></option>
            <option value="commentVerify"><?php echo Yii::t('admin','Verify Pass');?></option>
            <option value="commentUnVerify"><?php echo Yii::t('admin','Cancel Verify');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

