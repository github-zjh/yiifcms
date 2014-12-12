<div id="contentHeader">
  <h3><?php echo Yii::t('admin','SEO Set');?></h3> 
</div>
<form action="" method="post"  enctype="multipart/form-data" >
  <table class="content_list">
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web Title');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[seo_title]" value="<?php echo $setting['seo_title']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web Keywords');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[seo_keywords]" value="<?php echo $setting['seo_keywords']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Web Description');?>：</td>
    </tr>
    <tr >
      <td ><textarea  rows="6" name="Setting[seo_description]" id="seo_description" cols="50" class="tarea middenWidth"><?php echo $setting['seo_description']?></textarea>
        </span></td>
    </tr>
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
    </tr>
  </table>
</form>
