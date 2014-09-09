<?php $this->renderPartial('_header')?>
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/jquery/jquery-1.7.1.min.js"></script>
<div class="header"></div>
<div class="mainbody">
  <div class="complete">
    <div class="complete_txt">
      <p class="title">恭喜您安装成功!</p>
      <strong>现在您可以：</strong> <a href="<?php echo Yii::app()->homeUrl?>" class="action" target="_blank">访问网站首页</a><span>或</span><a href="<?php echo $this->createUrl(
            '/admin')?>"  class="action" target="_blank">登陆后台</a>
      <div class="complete_note"> 

      <p >如需重新安装，请先删除 data/install.lock 文件</p>
      <p class="red">为了安全起见，请删除文件 protected/controllers/InstallController.php </p>
        <p class="help"> <strong>获取更多帮助</strong> <br />
          帮助中心：<a href="<?php echo $this->org_url;?>" target="_blank"><?php echo $this->org_url;?></a><br />
          QQ群&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：235981026</p>

      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('_footer')?>