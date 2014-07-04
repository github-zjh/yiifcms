<div id="contentHeader">
  <h3><?php echo $adminPage?Yii::t('admin','Admin Manage'):Yii::t('admin','User Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','htmlOptions'=>array('name'=>'xform'))); ?>
      <?php if(!$adminPage):?>
      <select name="groupid" id="groupid">
        <option value="">=组=</option>
        <?php foreach((array)$this->group_list as $group):?>
        <option value="<?php echo $group['id']?>" <?php $this->selected($group['id'], $this->_request->getParam('groupid'));?>><?php echo $group['group_name']?></option>
        <?php endforeach;?>
      </select>
      <?php endif;?>
      用户名
      <input id="username" type="text" name="username" value="" class="txt" size="15"/>      
      <input name="searchsubmit" type="submit" class="button" value="<?php echo Yii::t('admin','Search');?>"/>
      <input type="reset" class="button"  onclick="location.href='<?php echo $this->createUrl('index');?>'" <?php echo Yii::t('admin','Reset');?>"/>
      <script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script>
      <?php $form=$this->endWidget(); ?>
      <script type="text/javascript">
$(document).ready(function(){
	$("#groupid").val('<?php echo $this->_request->getParam('groupid')?>');	
	$("#username").val('<?php echo $this->_request->getParam('username')?>');	
});
</script> </div>
  </div>
</div>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table class="content_list">  
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th width="20%">用户名 </th> 
      <th width="20%">用户组 </th>
      <th width="8%">状态</th>
      <th width="13%">注册时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->uid?>" /><?php echo $row->uid?></td>
      <td><?php echo $row->username?><br />      
      <?php echo $row->email?></td>      
      <td><?php $group = UserGroup::model()->findByPk($row->groupid); echo $group->group_name;?> </td>
      <td ><?php if($row->status == 0):?>
        <span class="red"><img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />锁定</span>
        <?php else:?>
        正常
        <?php endif;?>
      </td>
      <td ><?php echo date('Y-m-d H:i',$row->addtime)?></td>
      <td >
      <a href="<?php echo  $this->createUrl('update',array('id'=>$row->uid))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      <a href="<?php echo  $this->createUrl('batch',array('command'=>'userDelete', 'id'=>$row->uid))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="7"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall">全选</label>
          <select name="command">
            <option>选择操作</option>
            <option value="userLock">锁定</option>
            <option value="userunLock">解锁</option>
            <option value="userDelete">删除</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>  
</table>
</form>
