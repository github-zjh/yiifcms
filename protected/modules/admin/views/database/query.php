<div id="contentHeader">
  <h3>数据库管理</h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('query')?>"  class="current"><span>执行SQL</span></a></li>
      <li><a href="<?php echo $this->createUrl('index')?>"><span>常规管理</span></a></li>
      <li><a href="<?php echo $this->createUrl('database/export')?>"><span>数据库备份</span></a></li>
      <li><a href="<?php echo $this->createUrl('database/import')?>"><span>数据库还原</span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<form action="<?php echo $this->createUrl('execute')?>" method="post" id="queryForm">
  <table class="content_list">
    <tr>
      <td class="tb_title">输入SQL：</td>
    </tr>
    <tr >
      <td ><textarea name="command" cols="100" rows="8" id="command"  ></textarea></td>
    </tr>
    <tr >
      <td >每行一条SQL语句</td>
    </tr>
    <tr class="submit">
      <td ><input name="execute" type="submit" id="execute" value="提交" class="button" /></td>
    </tr>
  </table>
</form>
<div id="_tips"></div>
<script type='text/javascript'>
<!--
$('#queryForm').ajaxForm({
    beforeSubmit: function() {
		if($("#command").val() == ''){
			alert("SQL不能为空");
			return false;
		}
    },
    success: function(html) {
    	if(html.length > 0){
			$("#_tips").html(html);
    	}
    }
});
//-->
</script> 
