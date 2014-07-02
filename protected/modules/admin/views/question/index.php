<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Question Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','htmlOptions'=>array('name'=>'xform'))); ?>
     
      <?php echo Yii::t('admin','RealName');?>:
      <input id="realname" type="text" name="realname" value="" class="txt" size="15"/>
      <?php echo Yii::t('admin','Content');?>:
      <input id="question" type="text" name="question" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" class="button" value="<?php echo Yii::t('admin','Query');?>"/>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#question").val('<?php echo $this->_request->getParam('question')?>');
	$("#realname").val('<?php echo $this->_request->getParam('realname')?>');
});
</script> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="8%">ID</th>
      <th><?php echo Yii::t('admin','Content');?></th>
      <th width="15%"><?php echo Yii::t('admin','Submit Time');?></th>
      <th width="8%"><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo nl2br(htmlspecialchars($row->question))?></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td >
      <a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      <a href="<?php echo  $this->createUrl('batch',array('command'=>'delete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="5"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel" >
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option value=""><?php echo Yii::t('admin','Select Operate');?></option>
            <option value="delete"><?php echo Yii::t('admin','Delete');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

