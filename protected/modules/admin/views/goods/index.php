<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Goods Manage');?></h3>
  <div class="searchArea">
    <ul class="action left">
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('index'),'htmlOptions'=>array('name'=>'xform', 'class'=>'right '))); ?>
      <select name="catalogId" id="catalogId">
        <option value="">=<?php echo Yii::t('admin','All Content');?>=</option>
        <?php foreach((array)Catalog::get(0, $this->_catalog) as $catalog):?>
        <option value="<?php echo $catalog['id']?>"><?php echo $catalog['str_repeat']?><?php echo $catalog['catalog_name']?></option>
        <?php endforeach;?>
      </select>
  <?php echo Yii::t('admin','Title');?>
      <input id="title" type="text" name="title" value="" class="txt" size="15"/>
  <?php echo Yii::t('admin','Alias');?>
      <input id="titleAlias" type="text" name="titleAlias" value="" class="txt" size="15"/>
      <input name="searchsubmit" type="submit"  value="<?php echo Yii::t('admin','Query');?>" class="button "/>
      <input name="searchsubmit" type="reset"  value="<?php echo Yii::t('admin','Reset');?>" class="button "/>     
      <?php $form=$this->endWidget(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#title").val('<?php echo Yii::app()->request->getParam('title')?>');
	$("#titleAlias").val('<?php echo Yii::app()->request->getParam('titleAlias')?>');
	$("#catalogId").val('<?php echo Yii::app()->request->getParam('catalogId')?>');
});
</script>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table border="0" cellpadding="0" cellspacing="0" class="content_list"> 
    <thead>
      <tr class="tb_header">
        <th width="10%">ID</th>
        <th><?php echo Yii::t('admin','Title');?></th>
        <th width="12%"><?php echo Yii::t('admin','Categorys');?></th>
        <th width="8%"><?php echo Yii::t('admin','Status');?></th>
        <th width="8%"><?php echo Yii::t('admin','Recommend');?></th>
        <th width="8%"><?php echo Yii::t('admin','Views');?></th>
        <th width="15%"><?php echo Yii::t('admin','Add Time');?></th>
        <th><?php echo Yii::t('admin','Operate');?></th>
      </tr>
    </thead>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list" <?php if($row->status_is=='N'):?>style=" background:#F0F7FC"<?php endif?>>
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
        <?php echo $row->id?></td>
      <td ><a href="<?php echo $row->getUrl() ?>" title="<?php echo $row->title; ?>" target="_blank" style="<?php echo $this->formatStyle($row->title_style);?>"><?php echo Helper::truncate_utf8_string($row->title, 20);?></a><br />
        <span class="alias"><?php echo $row->title_alias?></span></td>
      <td ><?php echo $row->catalog->catalog_name?></td>
      <td><?php if($row->status_is == 'Y'){echo Yii::t('admin','Show');}else{echo "<span class='red'>".Yii::t('admin','Hidden')."</span>";}?></td>
      <td><?php if($row->commend == 'Y'){echo Yii::t('admin','Yes');}else{echo Yii::t('admin','No');}?></td>
      <td><span ><?php echo $row->view_count?></span></td>
      <td ><?php echo date('Y-m-d H:i',$row->create_time)?></td>
      <td >
      	<a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $this->createUrl('batch',array('command'=>'delete','id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<a href="<?php echo  $this->createUrl('/goods/view',array('id'=>$row['id']))?>" target="_blank"><img src="<?php echo $this->_baseUrl?>/static/admin/images/view.png" align="absmiddle" /></a>
      </td>
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
            <option value="delete"><?php echo Yii::t('admin','Delete');?></option>
            <option value="show"><?php echo Yii::t('admin','Show');?></option>
            <option value="hidden"><?php echo Yii::t('admin','Hidden');?></option>
            <option value="commend" id="recom"><?php echo Yii::t('admin','Recommend');?></option>            
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
    <tr id="recom_list" style="display:none;">
    	<td>选择推荐位：</td>
    	<td colspan="5">
    		<?php if($recom_list):?>
    		<ul>
    			<?php $j=0;?>
    			<?php foreach($recom_list as $recom):?>
    			<li>
    				<input type="radio" name="recom_id" <?php if($j==0):?> checked="checked"<?php endif;?> value="<?php echo $recom->attributes['id'];?>"/><?php echo $recom->attributes['recommend_name'];?>
    			</li>    	
    			<?php $j++;?>		
    			<?php endforeach;?>
    		</ul>
    		<?php endif;?>
    	</td>
    </tr>
  </form>
</table>

<!-- //javascript开始 -->
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
	//显示推荐位列表
	$("select[name='command']").change(function(){
		var value = $(this).val();
		if(value == 'commend'){
			$("#recom_list").show();
		}else{
			$("#recom_list").hide();
		}
	});
});
</script>
<!-- //javascript结束 -->
