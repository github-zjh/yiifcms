<?php $this->renderPartial('_header')?>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/validationEngine/jquery.validationEngine.min.js"></script>

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
        <td><input value="127.0.0.1" type="text" name="dbHost" id="dbHost" class="class_input validate[required]" />
          <span class="cnote">数据库服务器地址, 一般为 本地:127.0.0.1</span></td>
      </tr>
      <tr>
        <th height="30" align="right">数据库名称：</th>
        <td><input value="bagecms" type="text" name="dbName" id="dbName" class="class_input validate[required]" /> <span class="cnote">请先创建数据库</span></td>
      </tr>
      <tr>
        <th height="30" align="right">数据库用户：</th>
        <td><input value="" type="text" name="dbUsername" id="dbUsername" class="class_input validate[required]" /></td>
      </tr>
      <tr>
        <th height="30" align="right">数据库密码：</th>
        <td><input name="dbPassword" type="password" class="class_input validate[required]" id="dbPassword" onblur="checkDb()" value="" />
          <span id="dbCheck" class="cnote"></span></td>
      </tr>
      <tr>
        <th height="30" align="right">数据表前缀：</th>
        <td><input value="bage_" type="text" name="tbPre" id="tbPre" class="class_input" />
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
	var dName = $("#dbName").val();
	var dUsername = $("#dbUsername").val();
	var dPassword = $("#dbPassword").val();
	$.post("<?php echo $this->createUrl('dbCheck')?>",{dbHost:dHost,dbName:dName,dbUsername:dUsername,dbPassword:dPassword},function(res){
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
