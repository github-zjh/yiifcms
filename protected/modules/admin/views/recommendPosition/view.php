<div id="contentHeader">
  <h3><span class="red">[<?php echo $recom_position->recommend_name;?>]</span><?php echo Yii::t('admin','Recommend Manage');?></h3>
  <div class="searchArea">
    <ul class="action left">
      <li><a href="<?php echo $this->createUrl('index')?>" class="actionBtn"><span><?php echo Yii::t('admin','RecommendPosition Manage');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('view'),'htmlOptions'=>array('name'=>'xform', 'class'=>'right '))); ?>
     
  <?php echo Yii::t('admin','Title');?>
      <input id="title" type="text" name="title" value="" class="txt" size="15"/>  
      <input id="id" type="hidden" name="id" value="<?php echo $this->_request->getParam('id');?>" />
      <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin','Query');?>" class="button "/>
      <input name="searchsubmit" type="reset"  value="<?php echo Yii::t('admin','Reset');?>" class="button "/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#title").val('<?php echo Yii::app()->request->getParam('title')?>');
	$("#titleAlias").val('<?php echo Yii::app()->request->getParam('titleAlias')?>');	
});
</script>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table border="0" cellpadding="0" cellspacing="0" class="content_list">
    <thead>
      <tr class="tb_header">
        <th width="10%">ID</th>
        <th width="8%"> <?php echo Yii::t('admin', 'Sort Order');?></th>
        <th><?php echo Yii::t('admin','Title');?></th>
        <th width="16%"><?php echo Yii::t('admin','Categorys');?></th>
        <th width="9%"><?php echo Yii::t('admin','Status');?></th>
        <th width="9%"><?php echo Yii::t('admin','Views');?></th>
        <th width="15%"><?php echo Yii::t('admin','Add Time');?></th>
        <th width="8%"><?php echo Yii::t('admin','Operate');?></th>
      </tr>
    </thead>
    <?php foreach ($datalist as $dk=>$row):?>    
    <tr class="tb_list" <?php if($row->$table->status=='N'):?>style=" background:#F0F7FC" <?php endif;?>>
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->content_id;?>">
        <?php echo $row->content_id;?></td>
      <td ><input name="sortOrder[<?php echo $row->content_id?>]" type="text" id="sortOrder[]" value="<?php echo $row->sort_order;?>" size="5" /></td>
      <td >
      	<a href="<?php echo $this->createUrl('/'.$table.'/view',array('id'=>$row->content_id)); ?>" target="_blank" ><?php echo $row->$table->title;?></a><br />
      </td>
      <td ><?php echo $row->$table->catalog->catalog_name?></td>
      <td><?php if($row->$table->status == 'Y'){echo Yii::t('admin','Show');}else{echo "<span class='red'>".Yii::t('admin','Hidden')."</span>";}?></td>
      <td><span ><?php echo $row->$table->view_count?></span></td>
      <td ><?php echo date('Y-m-d H:i',$row->$table->create_time)?></td>
      <td ><a href="<?php echo  $this->createUrl('/'.$table.'/view',array('id'=>$row->content_id))?>" target="_blank"><?php echo Yii::t('admin','View Content');?></a>&nbsp;&nbsp;</td>
    </tr>
    <?php endforeach;?>
    <tr class="operate">
      <td colspan="6">
        <div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onClick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option><?php echo Yii::t('admin','Select Operate');?></option>         
            <option value="sortOrder"><?php echo Yii::t('admin','Sort Order');?></option>   
            <option value="unCommend"><?php echo Yii::t('admin','Cancel Recommend');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

