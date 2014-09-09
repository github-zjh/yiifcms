<?php $this->renderPartial('_header')?>
<script type="text/javascript" src="<?php echo $this->_static_public?>/js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
function showmessage() {	
	document.getElementById('progress').scrollTop = 100000000;	
}

</script>
<div class="header">
  <div class="step_area">第三步：安装数据表，写入配置</div>
</div>
<div class="mainbody">
  <div class="step_sgin"><span class="step step_3"></span></div>
  <h2 class="install_title">正在安装...</h2>
  <table width="100%" style=" border-collapse:collapse; border:1px solid #666666;">
    <tr>
      <td><div id="progress" class="progress"></div></td>
    </tr>
  </table>
</div>
<?php $this->renderPartial('_footer')?>
