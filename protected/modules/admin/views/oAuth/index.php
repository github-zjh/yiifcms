<div id="contentHeader">
  <h3><?php echo Yii::t('admin','OAuth Manage');?></h3>  
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
      <th width="10%">ID</th>
      <th  width="15%"><?php echo Yii::t('admin','Title Name');?></th>      
      <th  width="10%"><?php echo Yii::t('admin','Status');?></th>
      <th><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->id?>"><?php echo $row->id?></td>
      <td ><?php echo $row->apiname;?></td>      
      <td><?php if($row->status == 'Y'){echo Yii::t('admin','Enable');}else{echo "<span class='red'>".Yii::t('admin','Disable')."</span>";}?></td>
      <td >
      	<a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
	  </td>
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="4"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel" >
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
          <select name="command">
            <option><?php echo Yii::t('admin','Select Operate');?></option>           
            <option value="Enable"><?php echo Yii::t('admin','Enable');?></option>
            <option value="Disable"><?php echo Yii::t('admin','Disable');?></option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div></td>
    </tr>
  </form>
</table>

