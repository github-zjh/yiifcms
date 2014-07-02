<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Reply Manage');?></h3>
  <div class="searchArea">    
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','htmlOptions'=>array('name'=>'xform'))); ?>
      <select id="status" name="status">     
       		<option value=""><?php echo Yii::t('common','All');?></option> 	  
       		<option value="Y"><?php echo Yii::t('admin','Pass Checking');?></option>
       		<option value="N"><?php echo Yii::t('admin','Wait Checking');?></option>
      </select>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
<?php $form=$this->endWidget(); ?>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});

$(document).ready(function(){	
	$("#status").val('<?php echo $this->_request->getParam('status')?>');
});
</script> 
    </div>
  </div>
</div>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table class="content_list">
    <tr class="tb_header">
      <th width="8%">ID</th>    
      <th width="30%"><?php echo Yii::t('admin','Reply Content');?></th>
      <th width="10%"><?php echo Yii::t('admin','Status');?></th>  
      <th width="15%"><?php echo Yii::t('admin','Reply Time');?></th>   
      <th width="8%"><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>   
    <tr class="tb_list" >
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>          
      <td> <div style="max-height:110px; overflow:auto;"><?php echo $row->content ?></div></td>
      <td ><?php echo $row->status=='Y'?"<span style='color:green'>".Yii::t('admin','Pass Checking')."</span>":"<span style='color:red'>".Yii::t('admin','Wait Checking')."</span>"; ?></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td >
      <a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      <a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a></td>
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
            <option value="delete"><?php echo Yii::t('admin','Delete');?></option>
            <option value="verify"><?php echo Yii::t('admin','Verify Pass');?></option>
            <option value="unVerify"><?php echo Yii::t('admin','Cancel Verify');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
</table>
</form>

