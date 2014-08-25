<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Zip Manage');?></h3> 
</div>
<?php $form = $this->beginWidget('CActiveForm',array('id'=>'zip_form','htmlOptions'=>array('name'=>'zip_form'))); ?>
<table class="content_list">  
    <tr class="tb_header">      
      <th><?php echo Yii::t('admin', 'Title Name');?></th>  
      <th><?php echo Yii::t('admin', 'File Size');?></th>   
      <th><?php echo Yii::t('admin','Update Time');?></th>      
    </tr>
    <?php foreach ((array)$listfiles as $key=>$row):?>
    <tr class="tb_list">
      <td >
      	<input type="checkbox" name="id[]" value="<?php echo $row['id'];?>">
      	<?php if($row['type'] == 'dir'):?>
      	<img src="<?php echo $this->module->assetsUrl;?>/images/folder.gif" align="absmiddle" />
      	<?php else:?>
      	<img src="<?php echo $this->module->assetsUrl;?>/images/file.gif" align="absmiddle" />
      	<?php endif;?>
      	<?php echo $row['id'];?>
      </td>           
      <td ><?php echo $row['size'];?></td>       
      <td ><?php echo date('Y-m-d H:i',$row['update_time'])?></td>      
    </tr>
    <?php endforeach;?>
    <tr class="submit">
      <td colspan="9"><div class="cuspages right">
          <?php $this->widget('CLinkPager',array('pages'=>$pagebar));?>
        </div>
        <div class="fixsel">
          <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'id')" />
          <label for="chkall"><?php echo Yii::t('admin','Check All');?></label>         
          <input id="submit_maskall" class="button" type="submit" value="<?php echo Yii::t('admin','Zip Download');?>" name="maskall" />
        </div></td>
    </tr>
  
</table>
<?php $form=$this->endWidget();?>

