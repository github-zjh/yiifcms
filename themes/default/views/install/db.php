<?php $this->renderPartial('_header')?>
<div class="header">
  <div class="step_area">第二步：配置数据库</div>
</div>
<div class="mainbody">
  <div class="step_sgin"><span class="step step_2"></span></div>
  <h2 class="install_title">填写数据库信息</h2>
  <form name="dbInfo" id="dbInfo" method="post" action="<?php echo $this->createUrl('progress')?>">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="25%" height="30" align="right">数据库服务器：</th>
        <td><input value="localhost" type="text" name="dbHost" id="dbHost" class="class_input validate[required]" />
          <span class="cnote">数据库服务器地址, 一般为 本地:localhost</span></td>
      </tr>
      <tr>
        <th height="30" align="right">数据库服务器端口：</th>
        <td><input name="dbPort" type="text" class="class_input validate[required]" id="dbPort" value="3306" />
          <span class="cnote">默认端口号为3306</span></td>
      </tr>     
      <tr>
        <th height="30" align="right">数据库用户：</th>
        <td><input value="" type="text" name="dbUsername" id="dbUsername" class="class_input validate[required]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">数据库密码：</th>
        <td><input name="dbPassword" type="password" class="class_input validate[required]" id="dbPassword" value=""  onblur="checkDb()" />
          <span id="dbCheck" class="cnote">请填写你的数据库密码</span></td>
      </tr>      
       <tr>
        <th height="30" align="right">数据库名称：</th>
        <td>
	        <input value="yiifcms" type="text" name="dbName" id="dbName" class="class_input validate[required]" /> 
	        <span class="cnote">请输入数据库名，如果不存在将创建</span>
        </td>
      </tr>
      <tr>
        <th height="30" align="right">数据表前缀：</th>
        <td><input value="yiif_" type="text" name="tbPre" id="tbPre" class="class_input" />
          <span class="cnote">同一数据库运行多个程序时，请修改前缀</span></td>
      </tr>
    </table>
    <h2 class="install_title">填写管理员信息</h2>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="25%" height="30" align="right">管理员账号：</th>
        <td><input value="" type="text" name="username" id="username" class="class_input validate[required]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">管理员密码：</th>
        <td><input value="" type="password" name="password" id="password" class="class_input validate[required]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">重复密码：</th>
        <td><input value="" type="password" name="passwordRe" id="passwordRe" class="class_input validate[required,equals[password]]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">管理员邮箱：</th>
        <td><input value="" type="email" name="email" id="email" class="class_input validate[required]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">安装测试数据：</th>
        <td><input value="Y" type="checkbox" name="testData" style="margin-left:5px;" id="testData" />
          是</td>
      </tr>
      <tr>
        <th height="30" align="right">&nbsp;</th>
        <td><p class="red">全新安装会覆盖旧数据 </p></td>
      </tr>
    </table>
    <div class="inst_btn_area">
      <button type="submit" class="button">下一步</button>
      &nbsp;
      <button type="button" onclick="history.go(-1);return false;" class="button">返　回</button>
    </div>
  </form>
</div>
<script type="text/javascript">
$(function(){
	$("#dbInfo").validationEngine();	
});

function checkDb()
{
	var dHost = $("#dbHost").val();
	var dPort = $("#dbPort").val();
	var dName = $("#dbName").val();
	var dUsername = $("#dbUsername").val();
	var dPassword = $("#dbPassword").val();
	$.post("<?php echo $this->createUrl('dbCheck')?>",{dbHost:dHost,dbPort:dPort,dbName:dName,dbUsername:dUsername,dbPassword:dPassword},function(res){
		if(res.state == 'success'){
			$("#dbCheck").html(res.message);
		}else{
			$("#dbCheck").addClass('red');
			$("#dbCheck").html(res.message);
		}
		
	},'json');

}
</script>
<?php $this->renderPartial('_footer')?>
