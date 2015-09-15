<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Special Manage');?></h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('create')?>" class="actionBtn"><span><?php echo Yii::t('admin','Add');?></span></a></li>
    </ul>
    <div class="search right">
        <?php $form = $this->beginWidget('CActiveForm',array('id'=>'searchForm','method'=>'get','action'=>array('special'),'htmlOptions'=>array('name'=>'xform'))); ?>
        <?php echo Yii::t('admin','Special Name');?>
        <input id="title" type="text" name="title" value="<?php echo Yii::app()->request->getParam('title')?>" />        
        <input name="searchsubmit" type="submit" value="<?php echo Yii::t('admin','Query');?>" class="button"/>
        <script type="text/javascript">
        $(function(){
            $("#xform").validationEngine();	
        });
        </script>
        <?php $this->endWidget(); ?>     
    </div>
  </div>
</div>
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch')?>" name="cpform" >
    <tr class="tb_header">
        <th width="8%">ID</th>
        <th width="25%"><?php echo Yii::t('admin','Special Name');?></th>
        <th width="12%"><?php echo Yii::t('admin','Add Time');?></th>
        <th ><?php echo Yii::t('admin','Operate');?></th>
    </tr>
    <?php foreach ($datalist as $row):?>
    <tr class="tb_list">
        <td><input type="checkbox" name="id[]" value="<?php echo $row->id?>">
            <?php echo $row->id?></td>
        <td><?php echo $row->title?></td>
        <td><?php echo date('Y-m-d H:i',$row->create_time)?></td>
        <td>
          <a href="<?php echo  $this->createUrl('update',array('id'=>$row->id))?>"><img src="<?php echo $this->module->assetsUrl;?>/images/update.png" align="absmiddle" /></a>&nbsp;&nbsp;
          <a href="<?php echo  $this->createUrl('batch',array('command'=>'specialDelete', 'id'=>$row->id))?>" class="confirmSubmit"><img src="<?php echo $this->module->assetsUrl;?>/images/delete.png" align="absmiddle" /></a>
        </td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="5"><div class="cuspages right">
            <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel" >
            <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
            <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>
            <select name="command">
              <option value=""><?php echo Yii::t('admin','Select Operate');?></option>
              <option value="sortOrder"><?php echo Yii::t('admin','Sort Order');?></option>              
              <option value="show"><?php echo Yii::t('admin','Show');?></option>
              <option value="hidden"><?php echo Yii::t('admin','Hidden');?></option>
              <option value="delete"><?php echo Yii::t('admin','Delete');?></option>
            </select>
            <input id="submit_maskall" class="button confirmSubmit" type="submit" value="<?php echo Yii::t('common','Submit');?>" name="maskall" />
        </div>
        </td>
    </tr>
  </form>
</table>

