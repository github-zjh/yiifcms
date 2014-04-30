<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Ad Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('adCreate')?>" class="actionBtn"><span><?php echo Yii::t('admin','Add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform'))); ?>
      <select name="positionID" id="positionID">            
        <?php foreach((array)$this->_adposition as $key=> $position):?>
        <option value="<?php echo $key;?>"><?php echo $position;?></option>
        <?php endforeach;?>
      </select>
      <?php echo Yii::t('admin','Title');?>
      <input id="title" type="text" name="title" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
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
      <th width="20%"><?php echo Yii::t('admin','Title');?></th>      
      <th width="30%"><?php echo Yii::t('admin','Title Second');?></th> 
      <th width="10%"><?php echo Yii::t('admin','Add Time');?></th>
      <th><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->title?>
        <?php if($row->status_is == 'N'):?>
        <img src="<?php echo $this->_baseUrl?>/static/admin/images/error.png" align="absmiddle" />[<?php echo Yii::t('admin','Hidden');?>]
        <?php endif;?></p>
      </td>   
      <td><?php echo $row->title_alias?></td>   
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td >
      	<a href="<?php echo  $this->createUrl('adUpdate',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $this->createUrl('batch',array('command'=>'adDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $row->link_url;?>" target="_blank"><img src="<?php echo $this->_baseUrl?>/static/admin/images/view.png" align="absmiddle" /></a>
      </td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="6"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option><?php echo Yii::t('admin','Select Operate');?></option>
            <option value="adDelete"><?php echo Yii::t('admin','Delete');?></option>
            <option value="adVerify"><?php echo Yii::t('admin','Show');?></option>
            <option value="adUnVerify"><?php echo Yii::t('admin','Hidden');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

