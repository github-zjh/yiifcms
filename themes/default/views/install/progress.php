<?php $this->renderPartial('_header')?>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/jquery/jquery-1.7.1.min.js"></script>

<div class="header">
  <div class="step_area">第三步：安装数据表，写入配置</div>
</div>
<div class="mainbody">
  <div class="step_sgin"><span class="step step_3"></span></div>
  <h2 class="install_title">正在安装...</h2>
  <table >
    <tr>
      <td><div id="progress" class="progress"></div></td>
    </tr>
  </table>
</div>
<?php $this->renderPartial('_footer')?>
