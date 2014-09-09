/**
 * 安装必要数据
 */


--
-- Dumping data for table `#@__menu`
--

LOCK TABLES `#@__menu` WRITE;

REPLACE INTO `#@__menu` VALUES (1,'首页','index.php','index','Y',0,0,'N'),(2,'精品阅读','post/index','post','Y',0,0,'N'),(3,'精品图集','image/index','image','Y',0,0,'N'),(4,'下载','soft/index','soft','Y',0,0,'N'),(5,'教程TV','video/index','video','N',0,0,'N'),(6,'导读','page/guide','guide','Y',0,0,'N'),(7,'反馈','question/index','question','N',0,0,'N'),(8,'讨论区','http://bbs.yiifcms.com/','bbs','Y',0,0,'Y');

UNLOCK TABLES;

--
-- Dumping data for table `#@__model_type`
--

LOCK TABLES `#@__model_type` WRITE;

REPLACE INTO `#@__model_type` VALUES (1,'post','文章','Post','Y'),(2,'image','图集','Image','Y'),(3,'soft','软件','Soft','Y'),(4,'video','视频','Video','Y'),(5,'goods','商品','Goods','Y');

UNLOCK TABLES;

--
-- Dumping data for table `#@__oauth`
--

LOCK TABLES `#@__oauth` WRITE;

REPLACE INTO `#@__oauth` VALUES ('qq','QQ','{\"appid\":,\"appkey\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/qq_callback\",\"scope\":\"get_user_info,add_t,del_t,get_info\",\"errorReport\":true,\"storageType\":\"file\"}','Y'),('sinawb','新浪微博','{\"wb_akey\":\"\",\"wb_skey\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/sinawb_callback\"}','Y'),('weixin','微信','2821796254','N'),('renren','人人网','{\"app_key\":\"\",\"app_secret\":\"\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/renren_callback\"}','Y');

UNLOCK TABLES;


--
-- Dumping data for table `#@__page`
--

LOCK TABLES `#@__page` WRITE;

REPLACE INTO `#@__page` VALUES ('about','关于我','','<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:16px;\">yiifcms是个人开发的内容管理系统 不存在版权纠纷</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:16px;\">如果您想要联系我，请</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:16px;\">致邮：xb_zjh@126.com</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:16px;\">QQ：326196998</span> \r\n</p>','','','','','','','',1,119,'Y',1322999570,1407118540),('feature','特色介绍','','<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"free\">开源、免费</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms是基于yiiframework开发的内容管理系统，它开源、免费，用户可以自由下载、使用、修改、学习交流。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"safe\">安全、高效</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiiframework本身是一个很安全的高性能的开源框架，使用它您不用担心安全问题，它会使您的网站运行的很良好。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-size:16px;font-family:Microsoft YaHei;\" id=\"handy\">简洁、方便</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms有简洁、方便的后台管理，用户不需要了解复杂的逻辑关系，就可以很快速的发布内容，优化管理。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"stable\">轻松、稳定</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms架构合理、布局优美，是您轻松建站和学习的不二之选。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>','','','','','','','',2,110,'Y',1322999588,1407118550),('register','注册流程','','<p><span style=\"font-size:16px;\">用户需要填写用户名，密码，邮箱 然后进行账号激活 即可完成全部注册</span><br/></p>','','','','','','','',4,92,'Y',1331877791,1408696938),('disclaimer','免责声明','','<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<ol>\r\n	<li>\r\n		<span style=\"font-size:16px;\">本站点的所有内容 均来自个人和互联网 不存在版权纠纷</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">对于特殊的评论仅仅代表个人观点，和本站无关</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">如果对于转载的内容侵犯了您的权益，请告知于我<br />\r\n</span> \r\n	</li>\r\n</ol>\r\n<p>\r\n	<br />\r\n</p>','','','','','','','',5,52,'Y',1407118521,1407118583),('comment','评论审核','','<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">对内容的评论或者回复需要审核通过后 才可以看到</span> \r\n</p>\r\n<span style=\"font-size:14px;\"></span>','','','','','','','',6,54,'Y',1407120050,1407120061),('guide','新手指南','','<div>\r\n	<p>\r\n		<span style=\"font-size:16px;\">用户可以无需登录 即可浏览内容 下载CMS版本</span> \r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">如果您想对内容进行评论，请先<a target=\"_blank\" href=\"user/register/\">注册</a>并<a target=\"_blank\" href=\"user/login/\">登录</a></span> \r\n	</p>\r\n	<p>\r\n		<span style=\"font-size:16px;\">注册请查阅<a target=\"_blank\" href=\"page/register\">注册流程</a></span> \r\n	</p>\r\n</div>\r\n<div>\r\n</div>','','','','','','','',3,201,'Y',1379392484,1407243690);

UNLOCK TABLES;


--
-- Dumping data for table `#@__setting`
--

LOCK TABLES `#@__setting` WRITE;

REPLACE INTO `#@__setting` VALUES ('base','admin_email','xb_zjh@126.com'),('base','admin_logger','open'),('base','admin_telephone','180000000'),('email','email_fromname','YiifCMS官网'),('email','email_host','smtp.mxhichina.com'),('email','email_password',''),('email','email_port','25'),('email','email_timeout','2'),('email','email_totest',''),('email','email_username',''),('base','safe_str','!(*&%$$&##'),('seo','seo_description','yiifcms是基于yii框架开发的内容管理系统，功能强大，运行高效，稳定安全，是学习php和建站的良好选择。'),('seo','seo_keywords','yii,cms,framework,php,mysql,html,nginx,web,js,下载,手册,版本,系统'),('seo','seo_title','yiifcms打造顶级内容管理系统'),('base','site_closed_summary','系统维护中，请稍候......'),('base','site_copyright','Copyright @ 2014-2015'),('base','site_domain','/'),('base','site_icp','京ICP备14037201号-1'),('base','site_name','yiifcms打造顶级内容管理系统'),('base','site_stats','<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id=\'cnzz_stat_icon_1252995560\'%3E%3C/span%3E%3Cscript src=\'\" + cnzz_protocol + \"s95.cnzz.com/stat.php%3Fid%3D1252995560%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E\"));</script>'),('base','site_status','open'),('base','site_status_intro','网站目前正在维护，请稍后访问，谢谢....'),('template','template','default'),('template','theme','default'),('upload','upload_allow_ext','jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf,chm'),('upload','upload_max_size','51200'),('upload','upload_water_alpha','50'),('upload','upload_water_pic','public/watermark.png'),('upload','upload_water_scope','100x100'),('upload','upload_water_size','100x100'),('upload','upload_water_status','open'),('base','user_mail_verify','open'),('base','user_status','open'),('custom','_address','北京市朝阳区'),('custom','_fax','传真:XXXXXX'),('custom','_mobile','180000000'),('custom','_telephone','XXXXXXXXXXX');

UNLOCK TABLES;



--
-- Dumping data for table `#@__user_group`
--

LOCK TABLES `#@__user_group` WRITE;

REPLACE INTO `#@__user_group` VALUES (1,'普通用户',''),(2,'VIP①用户',''),(3,'VIP②用户',''),(4,'VIP④用户',''),(5,'VIP⑤用户',''),(6,'VIP⑥用户',''),(7,'VIP⑦用户',''),(8,'VIP⑧用户',''),(9,'网站编辑','default|login,catalog|index,menu|index,special|index,post|index,image|index,soft|index,video|index,goods|index,page|index,comment|index,reply|index,tag|index,recommendPosition|index,user|index,question|index,link|index,adPosition|index,ad|index,attach|index,modeltype|index,database|index,cache|index,maillog|index,oAuth|index'),(10,'系统管理员','Administrator');

UNLOCK TABLES;

