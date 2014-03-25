<div id="contentHeader">
  <h3><?php echo Yii::t('admin','Cache Manage');?></h3>
  
</div>
<form action="" method="post" enctype="multipart/form-data" id="cacheForm" name="cacheForm">
  <table class="content_list">
    <tr class="noborder">
      <td class="vtop rowform"><input name="scope[]" type="checkbox" id="scope[_config]" value="_config" />
        <label for="scope[_config]"> 系统配置</label></td>
    </tr>
    <tr >
      <td ><span class="vtop rowform">
        <input name="scope[]" type="checkbox" id="scope[_link]" value="_link" />
        <label for="scope[_link]"> 友情链接</label>
        </span></td>
    </tr>
    <tr >
      <td ><span class="vtop rowform">
        <input name="scope[]" type="checkbox" id="scope[_ad]" value="_ad" />
        <label for="scope[_ad]"> 广告</label>
        </span></td>
    </tr>
   
    <tr >
      <td ><span class="vtop rowform">
        <label for="scope[_config]"></label>
        <input name="scope[]" type="checkbox" id="scope[_catalog]" value="_catalog" />
        <label for="scope[_catalog]"> 栏目</label>
        </span></td>
    </tr>
    <tr class="submit">
      <td >
      	<input type="button" name="editsubmit" value="更新缓存" class="button" tabindex="3" id="cacheSubmit"/>
        <input type="checkbox" name="chkall" id="chkall" onclick="checkAll(this.form, 'scope')" />
        <label for="chkall">全选</label>
      </td>
    </tr>
  </table>
</form>

<script type="text/javascript">

$(function(){
	$("#cacheSubmit").click(function(){
		$.post("<?php echo $this->createUrl('cacheUpdate')?>", $("#cacheForm").serializeArray(), function(res){
			alert(res.message);
			
			if(res.state == 'success'){
				window.location.reload();
			}
		},'json');
	});	
});

</script> 
