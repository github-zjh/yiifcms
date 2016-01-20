<table class="content_list">
  <thead>
    <tr>
      <td colspan="2" class="tbTitle">系统信息</td>
    </tr>
  </thead> 
  <tr>
    <td>官方网址</td>
    <td><a href="http://www.yiifcms.com" target="_blank">http://www.yiifcms.com</a></td>
  </tr>
  <tr>
    <td>操作系统软件</td>
    <td><?php echo $server['serverOs']?> - <?php echo $server['serverSoft']?></td>
  </tr>
  <tr>
    <td>数据库及大小</td>
    <td><?php echo $server['mysqlVersion']?> (<?php echo $server['dbsize']?>)</td>
  </tr>
  <tr>
    <td>上传许可</td>
    <td><?php echo $server['fileupload']?></td>
  </tr>
  <tr>
    <td>PHP环境</td>
    <td>PHP版本:<?php echo $server['phpVersion']?></td>
  </tr>
  <tr>
  	<td>当前版本</td>
    <td><?php echo $this->_cmsVersion;?> <?php echo $this->_cmsRelease;?></td>
  </tr>
  <!--检测系统最新版本及安全补丁-->
  <tr>
  	<td>最新版本</td>
    <td id="newCMS"></td> 
    <script language="javascript" src="http://www.yiifcms.com/site/version?cms=<?php echo base64_encode(serialize(array('version'=>$this->_cmsVersion, 'release'=>$this->_cmsRelease)));?>" charset="UTF-8"></script>   
  </tr>
</table>

<table class="content_list">
  <thead>
    <tr>
      <td colspan="2" class="tbTitle">技术支持</td>
    </tr>
  </thead> 
  <tr>
    <td>开发人员</td>
    <td>GoldHan.zhao (Beijing of China)</td>
  </tr>
  <tr>
    <td>邮箱</td>
    <td><a href="mailto:xb_zjh@126.com">xb_zjh@126.com</a></td>
  </tr>
  <tr>
    <td>QQ</td>
    <td><a href="tencent://message/?uin=326196998">326196998</a></td>
  </tr>
  
  <tr>
    <td>核心框架</td>
    <td><?php echo Yii::powered(); ?>  Version:<?php echo Yii::getVersion(); ?></td>
  </tr>
  
</table>

