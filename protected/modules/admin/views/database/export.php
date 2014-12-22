<div id="contentHeader">
  <h3>数据库备份</h3>
  <div class="searchArea">
    <ul class="action left" >
      <li><a href="<?php echo $this->createUrl('database/export')?>" class="current"><span>数据库备份</span></a></li>
      <li><a href="<?php echo $this->createUrl('database/import')?>"><span>数据库还原</span></a></li>
      <li><a href="<?php echo $this->createUrl('index')?>"><span>常规管理</span></a></li>
      <li><a href="<?php echo $this->createUrl('query')?>"><span>执行SQL</span></a></li>
    </ul>
    <div class="search right"> </div>
  </div>
</div>
<form action="<?php echo $this->createUrl('database/doExport')?>" method="post">
  <table class="content_list">
    <tr>
      <td class="tb_title">分卷大小：</td>
    </tr>
    <tr >
      <td ><input type="hidden" name="tabletype" value="db" id="db">
        大小
        <input name="sizelimit" type="text" id="sizelimit" value="2048" />
        kb<br /></td>
    </tr>    
    <tr>
      <td class="tb_title">强制字符集：</td>
    </tr>
    <tr >
      <td ><input type="radio" name="sqlcharset" value="utf8" checked="">
        默认&nbsp;
        <input type="radio" name="sqlcharset" value="latin1">
        LATIN1 &nbsp;
        <input type="radio" name="sqlcharset" value="utf8">
        UTF-8 </td>
    </tr>
    <tr class="submit">
      <td ><input type="submit" name="dosubmit" value="开始备份" class="button" tabindex="3" id="dosubmit" /></td>
    </tr>
  </table>
</form>
