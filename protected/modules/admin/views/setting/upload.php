<div id="contentHeader">
  <h3>上传设置</h3>  
</div>
<form action="" method="post"  name="xform" id="xform">
  <table class="content_list">
    <tr>
      <td class="tb_title">允许上传大小：</td>
    </tr>
    <tr >
      <td ><input name="Setting[upload_max_size]" type="text" class=" validate[required]" value="<?php echo $setting['upload_max_size']?>" size="10" />
        KB (不能超过环境设置的<?php echo ini_get('upload_max_filesize');?>)</td>
    </tr>
    <tr>
      <td class="tb_title">允许附件类型：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt validate[required]" name="Setting[upload_allow_ext]" value="<?php echo $setting['upload_allow_ext']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title">水印开关：</td>
    </tr>
    <tr >
      <td ><select name="Setting[upload_water_status]">
          <option value="open" <?php echo Helper::selected($setting['upload_water_status'], 'open')?>>开启</option>
          <option value="close" <?php echo Helper::selected($setting['upload_water_status'], 'close')?>>关闭</option>
        </select></td>
    </tr>
    <tr>
      <td class="tb_title">水印文件：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[upload_water_pic]" value="<?php echo $setting['upload_water_pic']?>"/>
        <br />
        默认位置：public/watermark.png</td>
    </tr>    
    <tr>
      <td class="tb_title">水印透明度：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt w100" name="Setting[upload_water_alpha]" value="<?php echo $setting['upload_water_alpha']?>" datatype="Require" msg="必须填写"/>
        <br />
        1－100的整数,越大透明度越低</td>
    </tr>
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
    </tr>
  </table>
</form>

<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();	
});
</script> 
