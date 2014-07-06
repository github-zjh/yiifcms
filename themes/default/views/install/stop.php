<?php $this->renderPartial('_header')?>
<div class="header"></div>
<div class="mainbody">
  <div class="complete">
    <div class="complete_txt">

    <p class="title red">安装停止!</p>

    <strong>现在您可以：</strong>
      <a href="<?php echo Yii::app()->homeUrl?>">访问网站首页</a><span>或</span><a href="<?php echo $this->createUrl(
						'/admini')?>">登陆后台</a>
      <div class="complete_note ">
    <p class="red">  如重新安装，请删除 data/install.lock 文件</p>
       
<p class="help">
        <strong>获取更多帮助</strong>
<br />
帮助中心：<a href="http://www.bagecms.com/help" target="_blank"> http://www.bagecms.com/help</a><br />QQ群&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：139869141
</p>
        </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('_footer')?>