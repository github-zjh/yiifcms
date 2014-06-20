<div id="contentHeader">
  <h3><?php echo Yii::t('admin','RecommendPosition Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('Create')?>" class="actionBtn"><span><?php echo Yii::t('admin','Add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform'))); ?>
      <?php echo Yii::t('admin','RecommendPosition Type');?>
      <select id="recommend_type" type="text" name="recommend_type">
      	  <?php foreach((array)$this->_recom_type as $tv):?>
      	  <option value="<?php echo $tv->id;?>"><?php echo $tv->type_name;?></option>
      	  <?php endforeach;?>
      </select>      
      <?php echo Yii::t('admin','RecommendPosition Name');?>
      <input id="recommend_name" type="text" name="recommend_name" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#recommend_type").val('<?php echo Yii::app()->request->getParam('recommend_type')?>');
	$("#recommend_name").val('<?php echo Yii::app()->request->getParam('recommend_name')?>');
});
</script> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th width="20%"><?php echo Yii::t('admin','RecommendPosition Name');?></th> 
      <th width="20%"><?php echo Yii::t('admin','RecommendPosition Type');?></th>   
      <th><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>      
      <td ><?php echo $row->recommend_name;?></td>   
      <td ><?php echo Yii::t('admin','Type '.ucfirst($row->type));?></td>
      <td >
	      <a href="<?php echo  $this->createUrl('Update',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
	      <a href="<?php echo  $this->createUrl('batch',array('command'=>'Delete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
	      <a href="<?php echo $this->createUrl('view',array('id'=>$row->id));?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/view.png" align="absmiddle" /></a>
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
            <option value="Delete"><?php echo Yii::t('admin','Delete');?></option>            
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

