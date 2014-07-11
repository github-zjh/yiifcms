<div id="contentHeader">
  <h3>邮件配置</h3> 
</div>
<form action="" method="post"  enctype="multipart/form-data" >
  <table class="content_list">
    <tr>
      <td class="tb_title">邮箱服务器：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_host]" value="<?php echo $setting['email_host']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title">邮箱端口号：</td>
    </tr>
    <tr >
      <td ><input type="text" name="Setting[email_port]" size="10" value="<?php echo $setting['email_port']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title">邮件发送人姓名：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_fromname]" value="<?php echo $setting['email_fromname']?>" /></td>
    </tr>
     <tr>
      <td class="tb_title">邮箱用户名：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_username]" value="<?php echo $setting['email_username']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title">邮箱密码：</td>
    </tr>
    <tr >
      <td ><input type="password" class="txt" name="Setting[email_password]" value="<?php echo $setting['email_password']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title">邮件发送超时时间(单位：秒)：</td>
    </tr>
    <tr >
      <td ><input type="text" size="10" name="Setting[email_timeout]" value="<?php echo $setting['email_timeout']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title">测试收件人邮箱：</td>
    </tr>
    <tr >
      <td >
      	<input type="text" class="txt" name="Setting[email_totest]" id="toEmail" value="<?php echo $setting['email_totest']?>"/>
      	&nbsp;&nbsp;<a href="javascript:;" class="actionLink" id="testSendEmail"><span>测试邮件</span></a>(提交后再进行测试)
      </td>
    </tr>
   
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" /></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
	$(function(){
		$("#testSendEmail").click(function(){
			var toemail = $("#toEmail").val();
			 $.post("<?php echo $this->createUrl('testEmail');?>",{'ajax':1,'toemail':toemail},function(data){
				if(data.state=='success'){
					alert('发送成功！');
				}else{
					alert('发送失败，请检查相关配置');
				}
			 },'json');	
		});
	});
</script>
