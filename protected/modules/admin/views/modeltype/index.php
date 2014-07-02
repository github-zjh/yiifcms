<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Modeltype Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('adCreate')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform'))); ?>
      <?php echo Yii::t('admin','Title');?>
      <input id="type_name" type="text" name="type_name" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#type_name").val('<?php echo Yii::app()->request->getParam('type_name')?>');
});
</script> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th width="10%"><?php echo Yii::t('admin','Title Name');?></th>    
      <th width="10%"><?php echo Yii::t('model','MTtype_key');?></th> 
      <th width="20%"><?php echo Yii::t('model','MTmodel');?></th>  
      <th width="10%"><?php echo Yii::t('admin','Status');?></th>       
      <th><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><?php echo $row->type_name?>
        <?php if($row->status == 'N'):?>
        <img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />[<?php echo Yii::t('admin','Hidden');?>]
        <?php endif;?></p>
      </td>   
      <td><?php echo $row->type_key?></td>  
      <td ><?php echo $row->model?> 
      <td><?php if($row->status == 'Y'){echo Yii::t('admin','Show');}else{echo "<span class='red'>".Yii::t('admin','Hidden')."</span>";}?></td>    
      <td >
      	<a href="<?php echo  $this->createUrl('Update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;      
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
            <option value="show"><?php echo Yii::t('admin','Show');?></option>
            <option value="hidden"><?php echo Yii::t('admin','Hidden');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

