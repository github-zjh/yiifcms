<div id="contentHeader">
  <h3><?php echo $adminPage?Yii::t('admin','Admin Manage'):Yii::t('admin','User Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right">
      <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>$this->createUrl('user/index'), 'htmlOptions'=>array('name'=>'xform'))); ?>
      <?php if(!$adminPage):?>
      <select name="groupid" id="groupid">
        <option value="">=组=</option>
        <?php foreach((array)$this->group_list as $group):?>
        <option value="<?php echo $group['id']?>" <?php Helper::selected($group['id'], Yii::app()->request->getParam('groupid'));?>><?php echo $group['group_name']?></option>
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
			  $("#groupid").val('<?php echo Yii::app()->request->getParam('groupid')?>');	
			  $("#username").val('<?php echo Yii::app()->request->getParam('username')?>');	
			  });
	</script> 

	</div>
  </div>
</div>
<form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
<table class="content_list">  
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th width="20%"><?php echo Yii::t('model','username');?> </th> 
      <th width="10%"><?php echo Yii::t('model','usergroup');?> </th>
      <th width="8%"><?php echo Yii::t('model','status');?></th>
	  <th width="8%"><?php echo Yii::t('model','logins');?></th>
	  <th width="6%"><?php echo Yii::t('model','register_ip');?></th>
      <th width="6%"><?php echo Yii::t('model','last_login_ip');?></th>
      <th width="13%"><?php echo Yii::t('model','addtime');?></th>
      <th><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><input type="checkbox" name="id[]" value="<?php echo $row->uid?>" /><?php echo $row->uid?></td>
      <td><?php echo $row->username?><br />      
      <?php echo $row->email?></td>      
      <td><?php $group = UserGroup::model()->findByPk($row->groupid); echo $group->group_name;?> </td>
      <td ><?php if($row->status == 0):?>
        <span class="red"><img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />锁定</span>
        <?php elseif($row->status == 1):?>
        正常
        <?php else:?>
        <span class="red"><img src="<?php echo $this->module->assetsUrl;?>/images/error.png" align="absmiddle" />待审核</span>
        <?php endif;?>
      </td>
      <td ><?php echo $row->logins;?></td>
      <td ><?php echo $row->register_ip;?></td>
      <td ><?php echo $row->last_login_ip;?></td>
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
            <option value="userUnpass">待审核</option>
            <option value="userDelete">删除</option>
          </select>
          <input id="submit_maskall" class="button confirmSubmit" type="submit" value="提交" name="maskall" />
        </div></td>
    </tr>  
</table>
</form>
