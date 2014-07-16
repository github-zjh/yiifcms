<div id="contentHeader">
  <h3>站点设置</h3>  
</div>
<form action="" method="post" enctype="multipart/form-data" name="xform" id="xform">
  <table class="content_list">
    <tr>
      <td class="tb_title">网站名称：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt validate[required]" name="Setting[site_name]" value="<?php echo $setting['site_name']?>" />
        <span info="Setting[site_name]"></span>将显示在浏览器窗口标题等位置</span></td>
    </tr>
    <tr>
      <td class="tb_title"> 网站 URL：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt validate[required]" name="Setting[site_domain]" value="<?php echo $setting['site_domain']?>" />
        <span info="Setting[site_domain]"></span></span></td>
    </tr>
    <tr>
      <td class="tb_title">站点开关/关闭说明：</td>
    </tr>
    <tr >
      <td ><select name="Setting[site_status]">
          <option value="open" <?php echo $this->selected($setting['site_status'], 'open')?>>开启</option>
          <option value="close" <?php echo $this->selected($setting['site_status'], 'close')?>>关闭</option>
        </select></td>
    </tr>
    <tr >
      <td ><textarea name="Setting[site_status_intro]" class="tarea" ><?php echo $setting['site_status_intro']?></textarea></td>
    </tr>
    <tr>
      <td class="tb_title">管理员邮箱：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[admin_email]" value="<?php echo $setting['admin_email']?>" datatype="Email" msg="请填写管理Email"/>
</td>
    </tr>
    <tr>
      <td class="tb_title">网站备案号：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[site_icp]" value="<?php echo $setting['site_icp']?>" />
        请填写 ICP 备案号</td>
    </tr>
    <tr>
      <td class="tb_title">版权信息：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt w400" name="Setting[site_copyright]" value="<?php echo $setting['site_copyright']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title">网站第三方统计代码：</td>
    </tr>
    <tr >
      <td ><textarea  rows="6" name="Setting[site_stats]" id="site_stats" cols="50" class="tarea "><?php echo $setting['site_stats']?></textarea>
        请填写第三方统计的 js 代码</td>
    </tr>
     <tr>
      <td class="tb_title">网站安全字符串(用于分割要加密的信息)：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[safe_str]" value="<?php echo $setting['safe_str']?>" /></td>
    </tr>
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" />&nbsp;&nbsp;<a href="<?php echo $this->createUrl('custom')?>" class="actionLink"><span>自定义配置</span></a></td>
    </tr>
   
  </table>
</form>
<script type="text/javascript">
$(function(){
	$("#xform").validationEngine();		
});
</script> 
