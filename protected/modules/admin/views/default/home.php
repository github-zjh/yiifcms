<table class="content_list">
  <thead>
    <tr >
      <td colspan="2" class="tbTitle">系统信息</td>
    </tr>
  </thead> 
  <tr>
    <td >产品支持</td>
    <td ><a href="<?php echo Yii::app()->request->hostInfo;?>" target="_blank"><?php echo Yii::app()->request->hostInfo;?></a></td>
  </tr>
  <tr>
    <td >操作系统软件</td>
    <td ><?php echo $server['serverOs']?> - <?php echo $server['serverSoft']?></td>
  </tr>
  <tr>
    <td >数据库及大小</td>
    <td ><?php echo $server['mysqlVersion']?> (<?php echo $server['dbsize']?>)</td>
  </tr>
  <tr>
    <td >上传许可</td>
    <td ><?php echo $server['fileupload']?></td>
  </tr>
  <tr>
    <td >PHP环境</td>
    <td >PHP版本:<?php echo $server['phpVersion']?> allow_url_fopen:<?php echo $server['allow_url_fopen']?></td>
  </tr>
</table>

<table class="content_list">
  <thead>
    <tr >
      <td colspan="2" class="tbTitle">技术支持</td>
    </tr>
  </thead> 
  <tr>
    <td >技术人员</td>
    <td >zhao jinhan (Beijing of China)</td>
  </tr>
  <tr>
    <td >邮箱</td>
    <td><a href="mailto:xb_zjh@126.com">xb_zjh@126.com</a></td>
  </tr>
  <tr>
    <td >QQ</td>
    <td><a href="tencent://message/?uin=326196988">326196988</a></td>
  </tr>
  
  <tr>
    <td >核心框架</td>
    <td><?php echo Yii::powered(); ?></td>
  </tr>
  
</table>

