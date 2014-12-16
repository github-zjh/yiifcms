<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Web Set');?></h3>  
</div>
<form action="" method="post" enctype="multipart/form-data" name="xform" id="xform">
  <table class="content_list">
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web Name');?>：</td>
    </tr>
    <tr >
      <td >
      	<input type="text" class="txt validate[required]" name="Setting[site_name]" value="<?php echo $setting['site_name']?>" />
       </td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web URL');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt validate[required]" name="Setting[site_domain]" value="<?php echo $setting['site_domain']?>" />
        <span info="Setting[site_domain]"></span></span></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web Status');?>：</td>
    </tr>
    <tr >
      <td ><select name="Setting[site_status]">
          <option value="open" <?php echo Helper::selected($setting['site_status'], 'open')?>><?php echo Yii::t('admin','Open');?></option>
          <option value="close" <?php echo Helper::selected($setting['site_status'], 'close')?>><?php echo Yii::t('admin','Close');?></option>
        </select></td>
    </tr>
    <tr >
      <td ><textarea name="Setting[site_status_intro]" class="tarea" ><?php echo $setting['site_status_intro']?></textarea></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Admin Email');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[admin_email]" value="<?php echo $setting['admin_email']?>" datatype="Email" msg="请填写管理Email"/>
</td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web ICP Number');?>：</td>
    </tr>
    <tr >
      <td >
      <input type="text" class="txt" name="Setting[site_icp]" value="<?php echo $setting['site_icp']?>" />       
        <?php echo Yii::t('admin','Please Input ICP Number');?>
        </td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','CopyRight');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt w400" name="Setting[site_copyright]" value="<?php echo $setting['site_copyright']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Statistical Code');?>：</td>
    </tr>
    <tr >
      <td >
      	<textarea  rows="6" name="Setting[site_stats]" id="site_stats" cols="50" class="tarea "><?php echo $setting['site_stats']?></textarea>
        <?php echo Yii::t('admin','Please Input Statistical Code');?>
        </td>
    </tr>
    
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','User Encrypt Method');?>：</td>
    </tr>
    <tr >
      <td ><select name="Setting[encrypt]">
          <option value="md5" <?php echo Helper::selected($setting['encrypt'], 'md5')?>>MD5(<?php echo Yii::t('admin','Default');?>)</option>
          <option value="crypt" <?php echo Helper::selected($setting['encrypt'], 'crypt')?>>CRYPT(<?php echo Yii::t('admin','Recommend');?>)</option>
        </select>
        <span class="red"><?php if($crypt):?><?php echo Yii::t('admin','Support The Crypt Encryption');?> <?php else:?><?php echo Yii::t('admin','Don`t Support The Crypt Encryption');?><?php endif;?></span>
        </td>
    </tr>
    
     <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Safe String');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[safe_str]" value="<?php echo $setting['safe_str']?>" /></td>
    </tr>  
    <tr class="submit">
      <td >
      	<input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit')?>" class="button" tabindex="3" />
      </td>
    </tr>
   
  </table>
</form>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();		
});
</script> 
