<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Group Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li class="current"><a href="<?php echo $this->createUrl('groupCreate')?>" class="actionBtn"><span><?php echo Yii::t('admin','add');?></span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="" name="cpform" >
    <tr class="tb_header">
      <th width="5%">ID</th>
      <th width="10%"><?php echo Yii::t('admin','User Group');?> </th>      
      <th ><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
      <td ><?php echo $row->id?></td>
      <td ><?php echo $row->group_name?></td>     
      <td ><a href="<?php echo  $this->createUrl('groupUpdate',array('id'=>$row->id))?>"><img src="<?php echo $this->_baseUrl?>/static/admin/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
      	<?php if($row->id != $this->_adminGroupID):?>
      	<a href="<?php echo  $this->createUrl('batch',array('command'=>'groupDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->_baseUrl?>/static/admin/images/delete.png" align="absmiddle" /></a>
        <?php endif;?>
      </td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="9"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div></td>
    </tr>
  </form>
</table>

