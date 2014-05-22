
<div id="contentHeader">
  <h3>附件</h3>
  <div class="searchArea">
    <ul class="action left" >
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('attach'),'htmlOptions'=>array('name'=>'xform'))); ?>
      <?php echo Yii::t('admin','Real Name');?>
      <input id="filename" type="text" name="filename" value="" class="txt" size="15"/>
      <?php echo Yii::t('admin','File Name');?>
      <input id="realname" type="text" name="realname" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#file_name").val('<?php echo Yii::app()->request->getParam('file_name')?>');
	$("#nickname").val('<?php echo Yii::app()->request->getParam('nickname')?>');
});
</script> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="8%">ID</th>
      <th width="20%"><?php echo Yii::t('admin','File Name');?></th>
      <th><?php echo Yii::t('admin','Real Name');?></th>
      <th width="10%"><?php echo Yii::t('admin','Size');?></th>
      <th width="15%"><?php echo Yii::t('admin','Add Time');?></th>
      <th width="8%"><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>"><?php echo $row->id?></td>
      <td >
      	<a href="<?php echo $this->_baseUrl.'/'.$row->file_name?>" target="_blank">
      		<?php if(in_array($row->file_ext, array('jpg','png','bmp','gif'))):?>
      		<img src="<?php echo $this->_baseUrl.'/'.$row->file_name?>" alt="<?php echo $row->real_name?>" width="70"  height="70" title="<?php echo $row->real_name?>"/>
      		<?php else:?>
      		<?php echo $row->real_name?>
      		<?php endif;?>
      	</a>
      </td>
      <td ><p><?php echo $row->real_name?></p>
        
      <!--<td ></td>-->
      
      <td ><span ><?php echo $this->byteFormat($row->file_size)?></span></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('batch',array('command'=>'attachDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="9"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel" >
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option><?php echo Yii::t('admin','Select Operate');?></option>
            <option value="attachDelete"><?php echo Yii::t('admin','Delete');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

