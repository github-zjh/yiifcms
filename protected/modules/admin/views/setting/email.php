<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Email Set');?></h3> 
</div>
<form action="" method="post"  enctype="multipart/form-data" >
  <table class="content_list">
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email Active Status');?>：</td>
    </tr>
    <tr >
      <td >
      	<select name="Setting[email_active]">
      		<option value="open" <?php if($setting['email_active'] == 'open'):?> selected="selected"<?php endif;?>><?php echo Yii::t('admin','Open');?></option>
      		<option value="close" <?php if($setting['email_active'] == 'close'):?> selected="selected"<?php endif;?>><?php echo Yii::t('admin','Close');?></option>
      	</select>      	
      </td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email Host');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_host]" value="<?php echo $setting['email_host']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email Port');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" name="Setting[email_port]" size="10" value="<?php echo $setting['email_port']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email FromName');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_fromname]" value="<?php echo $setting['email_fromname']?>" /></td>
    </tr>
     <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email UserName');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" class="txt" name="Setting[email_username]" value="<?php echo $setting['email_username']?>" /></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email Password');?>：</td>
    </tr>
    <tr >
      <td ><input type="password" class="txt" name="Setting[email_password]" value="<?php echo $setting['email_password']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email TimeOut');?>：</td>
    </tr>
    <tr >
      <td ><input type="text" size="10" name="Setting[email_timeout]" value="<?php echo $setting['email_timeout']?>"/></td>
    </tr>
    <tr>
      <td class="tb_title"><?php echo Yii::t('admin','Email ToTest');?>：</td>
    </tr>
    <tr >
      <td >
      	<input type="text" class="txt" name="Setting[email_totest]" id="toEmail" value="<?php echo $setting['email_totest']?>"/>
      	&nbsp;&nbsp;<a href="javascript:;" class="actionLink" id="testSendEmail"><span><?php echo Yii::t('admin','Test Email');?></span></a>(<?php echo Yii::t('admin','Test Email Desc');?>)
      	<p style="color:red" id="test_status"></p>
      </td>
    </tr>
   
    <tr class="submit">
      <td ><input type="submit" name="editsubmit" value="<?php echo Yii::t('common','Submit');?>" class="button" tabindex="3" /></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
	$(function(){
		$("#testSendEmail").click(function(){
			var toemail = $("#toEmail").val();
			var msg = '';
			 $.post("<?php echo $this->createUrl('testEmail');?>",{'ajax':1,'toemail':toemail},function(data){
				if(data.state=='success'){
					msg = '<?php echo Yii::t('admin','Send Success');?>';
				}else{
					msg = '<?php echo Yii::t('admin','Send Failed');?>';
				}
				$("#test_status").html(msg);
			 },'json');	
		});
	});
</script>
