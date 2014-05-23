# your database backup
# version:5.6.16
# time:2014-05-23 21:08:12
# --------------------------------------------------------


DROP TABLE IF EXISTS `yii_ad`;
CREATE TABLE `yii_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `position_id` int(10) unsigned NOT NULL COMMENT '广告位ID',
  `title` varchar(50) NOT NULL COMMENT '广告名称',
  `title_alias` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `image_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `width` varchar(10) NOT NULL DEFAULT '' COMMENT '图片宽',
  `height` varchar(10) NOT NULL DEFAULT '' COMMENT '图片高',
  `intro` text COMMENT '广告描述',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='广告';

INSERT INTO `yii_ad` VALUES('2','1','首页banner1','index_banner','','','1440','500','','0','uploads/images/201404/113511a7cd1.png','1','Y','1379544139');
INSERT INTO `yii_ad` VALUES('3','1','首页banner2','index_banner','','','1440','500','','0','uploads/images/201404/0b92e2274de.png','2','Y','1379544231');

DROP TABLE IF EXISTS `yii_ad_position`;
CREATE TABLE `yii_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';

INSERT INTO `yii_ad_position` VALUES('1','首页banner幻灯片');
INSERT INTO `yii_ad_position` VALUES('2','底部幻灯片');

DROP TABLE IF EXISTS `yii_catalog`;
CREATE TABLE `yii_catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('article','image','soft','video','goods') NOT NULL DEFAULT 'article' COMMENT '栏目类型',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类',
  `catalog_name` varchar(100) NOT NULL COMMENT '名称',
  `content` text COMMENT '详细介绍',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` text COMMENT 'seo描述',
  `attach_file` varchar(100) DEFAULT '' COMMENT '附件',
  `attach_thumb` varchar(100) DEFAULT '' COMMENT '缩略图',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据量',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='全局分类';

INSERT INTO `yii_catalog` VALUES('1','article','0','新闻','新闻<br />','d','d','d','uploads/images/201403/8a4b5e11db6.png','uploads/thumbs/201403/small_8a4b5e11db6.png','0','0','Y','','1379545020','1394509418');
INSERT INTO `yii_catalog` VALUES('2','article','1','公司动态','公司动态栏目介绍','','','','uploads/images/201402/98f97227c00.png','','2','0','Y','','1379545199','1394509418');
INSERT INTO `yii_catalog` VALUES('3','article','1','行业新闻','行业新闻栏目介绍','','','','uploads/images/201403/b49f2b45b50.jpg','uploads/thumbs/201403/small_b49f2b45b50.jpg','1','0','Y','','1379545248','1394509418');
INSERT INTO `yii_catalog` VALUES('4','goods','0','产品','产品栏目介绍','','','','','','0','0','Y','','1379545330','1394517482');
INSERT INTO `yii_catalog` VALUES('5','goods','4','新品上市','新品上市栏目介绍','','','','','','1','0','Y','','1379545388','1394517482');
INSERT INTO `yii_catalog` VALUES('6','goods','4','特价商品','特价商品栏目介绍','','','','','','0','0','N','','1379545435','1394517482');
INSERT INTO `yii_catalog` VALUES('8','image','0','图集','','','','','','','0','0','Y','','0','1399616730');
INSERT INTO `yii_catalog` VALUES('9','image','8','最新热图','最新热图','最新热图','最新热图','最新热图','','','0','0','Y','','0','1399616723');
INSERT INTO `yii_catalog` VALUES('10','soft','0','热门软件','','热门软件','热门软件','热门软件','','','0','0','Y','','1400489000','1400489000');
INSERT INTO `yii_catalog` VALUES('11','soft','10','网站软件','网站软件','网站软件','网站软件','网站软件','','','0','0','Y','','1400489069','1400489069');
INSERT INTO `yii_catalog` VALUES('12','video','0','最新视频','','','','','','','0','0','Y','','1400828336','1400828336');
INSERT INTO `yii_catalog` VALUES('13','video','12','最新电影','','','','','','','0','0','Y','','1400828453','1400828453');

DROP TABLE IF EXISTS `yii_link`;
CREATE TABLE `yii_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO图标',
  `sortorder` smallint(10) DEFAULT '255' COMMENT '排序',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='链接表';

INSERT INTO `yii_link` VALUES('16','ThinkPHP','http://www.thinkphp.cn/','','255','Y');
INSERT INTO `yii_link` VALUES('3','站长之家','http://www.chinaz.com','','2','Y');
INSERT INTO `yii_link` VALUES('4','PHPChina','http://www.phpchina.com','','3','Y');
INSERT INTO `yii_link` VALUES('5','Discuz动力社区','http://www.discuz.net','','4','Y');
INSERT INTO `yii_link` VALUES('6','DNSPod','http://www.dnspod.cn','','255','Y');
INSERT INTO `yii_link` VALUES('7','PHP100中文网','http://www.php100.com/','','255','Y');
INSERT INTO `yii_link` VALUES('8','  WEB技术开发','http://www.itokit.com/','','255','Y');
INSERT INTO `yii_link` VALUES('9','源码爱好者 ','http://www.codefans.net/','','255','Y');
INSERT INTO `yii_link` VALUES('10','PHPCMS','http://bbs.phpcms.cn/','','255','Y');
INSERT INTO `yii_link` VALUES('11',' PHPwind论坛','http://www.phpwind.net/','','255','Y');
INSERT INTO `yii_link` VALUES('12','Drupal中国  ','http://drupalchina.cn/','','255','Y');
INSERT INTO `yii_link` VALUES('13','德问编程','http://www.dewen.org/','','255','Y');
INSERT INTO `yii_link` VALUES('14','stackoverflow','http://stackoverflow.com/','','255','Y');
INSERT INTO `yii_link` VALUES('15','Linux课程学习','http://itercast.com/','','255','Y');
INSERT INTO `yii_link` VALUES('17','CakePHP','http://cakephp.org/','','255','Y');
INSERT INTO `yii_link` VALUES('18','站长之家','http://www.chinaz.com','uploads/images/201404/d7ab0fba105.png','255','Y');

DROP TABLE IF EXISTS `yii_mail_log`;
CREATE TABLE `yii_mail_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accept` varchar(50) DEFAULT NULL COMMENT '收件人邮箱',
  `subject` varchar(100) DEFAULT NULL COMMENT '邮件标题',
  `message` text COMMENT '邮件内容',
  `sendtime` int(10) unsigned DEFAULT NULL COMMENT '发送时间',
  `status` enum('waiting','success','failed') DEFAULT 'waiting' COMMENT '当前邮件状态(待发送、发送成功、发送失败)',
  `level` enum('1','2','3') DEFAULT '3' COMMENT '邮件优先级(越小越优先)',
  `times` tinyint(2) unsigned DEFAULT '0' COMMENT '发送次数',
  `error` varchar(100) DEFAULT NULL COMMENT '错误信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='发送邮件日志';

INSERT INTO `yii_mail_log` VALUES('1','yiicms','测试邮件','','1400230262','success','3','3','You must provide at least one recipient email address.');
INSERT INTO `yii_mail_log` VALUES('2','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('3','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('4','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('5','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('6','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('7','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('8','376685457@qq.com','yiicms','测试邮件','0','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('9','376685457@qq.com','yiicms','测试邮件','1400230572','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('10','376685457@qq.com','yiicms','测试邮件','1400230784','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('11','376685457@qq.com','yiicms','测试邮件','1400230820','failed','3','1','SMTP Error: Could not connect to SMTP host.');
INSERT INTO `yii_mail_log` VALUES('12','376685457@qq.com','yiicms','测试邮件<p><a href=\"baidu.com\">百度一下</a></p>','1400230886','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('13','376685457@qq.com','yiicms','测试邮件<p><a href=\"baidu.com\">百度一下</a></p>','1400231187','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('14','326196998@qq.com','我的yii网站 账号激活','<p>尊敬的新用户：test001 您好，欢迎注册我的yii网站，为了更好的为您服务，请点击下面链接进行账号激活：<br/>						<a href=\"http://www.yii.local/site/authEmail/33.htm?authcode=MTUdoTWoxKcHc\">http://www.yii.local/site/authEmail/33.htm?authcode=MTUdoTWoxKcHc</a><br/>如果上面链接不能点击，请复制到浏览器地址栏中进行访问。<br/>						再次感谢您的光顾，如果有其他疑问，						请联系本网站的管理员<a href=\"mailto\">xb_zjh@126.com</a>。</p>','1400462628','success','3','1','');

DROP TABLE IF EXISTS `yii_menu`;
CREATE TABLE `yii_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) DEFAULT NULL COMMENT '导航菜单',
  `menu_link` varchar(50) DEFAULT NULL COMMENT '导航链接',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';

INSERT INTO `yii_menu` VALUES('1','首页','/','Y','0','0','Y');
INSERT INTO `yii_menu` VALUES('2','首页一','/','Y','1','0','N');
INSERT INTO `yii_menu` VALUES('3','新闻动态','/post/index','Y','0','0','N');
INSERT INTO `yii_menu` VALUES('4','首页二','/','Y','1','0','N');

DROP TABLE IF EXISTS `yii_page`;
CREATE TABLE `yii_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `title_second` varchar(100) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_alias` char(40) NOT NULL COMMENT '标签',
  `html_path` varchar(100) NOT NULL DEFAULT '' COMMENT 'html路径',
  `html_file` varchar(100) NOT NULL DEFAULT '' COMMENT 'html文件',
  `intro` text COMMENT '简单描述',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO KEYWORDS',
  `seo_description` text COMMENT 'SEO DESCRIPTION',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `attach_file` varchar(60) NOT NULL DEFAULT '' COMMENT '附件',
  `attach_thumb` varchar(60) NOT NULL DEFAULT '' COMMENT '附件小图',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='单页';

INSERT INTO `yii_page` VALUES('1','关于我们','','about','','','BageCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，BageCms可用于企业建站、个人博客、资讯门户、图片站等各类型站点','<p>	BageCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，BageCms可用于企业建站、个人博客、资讯门户、图片站等各类型站点。<br /><br />特点：<br /><br />1.开源免费<br />无论是个人还是企业展示型网站均可用本系统来完成<br /><br />2.数据调用方便快捷<br />自主研发的数据调用模块，能快速调用各类型数据，方便建站<br /><br />3.应用范围广<br />这套系统不是企业网站管理系统，也不是博客程序，更不是专业的图片管理系统，但它却具备大部分企业站、博客站、图片站的功能<br /><br />4.安全高性能<br />基于高性能的PHP5的web应用程序开发框架YII构建具有稳定、安全、高效、跨平台等特点<br /><br />5.URL自定义<br />系统支持自定义伪静态显示方式，良好的支持搜索引擎SEO。个性化设置每个栏目、内容的标题标签、描述标签、关键词标签<br /><br />6.自定义数据模型<br />系统可自定义数据模型满足各种表示形式和字段需求<br /><br />7.完善的后台权限控制<br />特有的管理员权限管理机制，可以灵活设置管理员的栏目管理权限、网站信息的添加、修改、删除权限等<br /><br /><br />系统运行环境：<br />数据库： mysql5+<br />PHP版本：php5.2.+<br />服务器：linux,unix,freebsd等<br /><br />官方网址：http://www.bagecms.com<br />下载地址：http://www.bagecms.com/download/bagecms<br /><br />演示地址：http://demo.bagecms.com<br />后台地址：http://demo.bagecms.com/admini<br />用户：bagecms<br />密码：bagecms</p><p>	<br /></p>','','','','','uploads/201309/logo.jpg','uploads/201309/logo.jpg','0','0','','1322999570');
INSERT INTO `yii_page` VALUES('2','联系我们','','contact','','','','<p>	QQ:5565907</p><p>	QQ群：139869141</p><p>	BageCMS官方网站：<a href=\"http://www.bagecms.com\" target=\"_blank\">http://www.bagecms.com</a></p><p>	八哥软件官方网站：<a href=\"http://www.bagesoft.cn\" target=\"_blank\">http://www.bagesoft.cn</a></p>','','','','','','','0','0','','1322999588');
INSERT INTO `yii_page` VALUES('3','企业文化','','cultural','','','企业文化是企业为解决生存和发展的问题的而树立形成的，被组织成员认为有效而共享，并共同遵循的基本信念和认知。 企业文化集中体现了一个企业经营管理的核心主张，以及由此产生的组织行为。','<div>	<div>		迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。	</div>	<div>		企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。	</div>	<div>		价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。	</div>	<div>		英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提供可供仿效的榜样，对企业文化的形成和强化起着极为重要的作用。	</div>	<div>		文化仪式是指企业内的各种表彰、奖励活动、聚会以及文娱活动等，它可以把企业中发生的某些事情戏剧化和形象化，来生动的宣传和体现本企业的价值观，使人们通过这些生动活泼的活动来领会企业文化的内涵，使企业文化“寓教于乐”之中。	</div>	<div>		文化网络是指非正式的信息传递渠道，主要是传播文化信息。它是由某种非正式的组织和人群，以及某一特定场合所组成，它所传递出的信息往往能反映出职工的愿望和心态。	</div>	<h3>		产生	</h3>	<div>		企业领导者把文化的变化人的功能应用于企业，以解决现代企业管理中的问题，就有了企业文化。企业管理理论和企业文化管理理论都追求效益。但前者为追求效益而把人当作客体，后者为追求效益把文化概念自觉应用于企业，把具有丰富创造性的人作为管理理论的中心。这种指导思想反映到企业管理中去，就有了人们称之为企业文化的种种观念。	</div>	<h3>		认识	</h3>	<div>		从企业文化的现实出发，进行深入的调查研究，把握企业文化各种现象之间的本质联系。依据实践经验，从感认认识到理性认识，进行科学的概括、总结。	</div>	<h3>		意义	</h3>	<div>		一．企业文化能激发员工的使命感。不管是什么企业都有它的责任和使命，企业使命感是全体员工工作的目标和方向，是企业不断发展或前进的动力之源。	</div>	<div>		二．企业文化能凝聚员工的归属感。　企业文化的作用就是通过企业价值观的提炼和传播，让一群来自不同地方的人共同追求同一个梦想。	</div>	<div>		三．企业文化能加强员工的责任感。企业要通过大量的资料和文件宣传员工责任感的重要性，管理人员要给全体员工灌输责任意识，危机意识和团队意识，要让大家清楚地认识企业是全体员工共同的企业。	</div>	<div>		四．企业文化能赋予员工的荣誉感。每个人都要在自己的工作岗位，工作领域，多做贡献，多出成绩，多追求荣誉感。	</div>	<div>		五．企业文化能实现员工的成就感。一个企业的繁荣昌盛关系到每一个公司员工的生存，企业繁荣了，员工们就会引以为豪，会更积极努力的进取，荣耀越高，成就感就越大，越明显。	</div></div><div></div>','','','','','','','0','0','','1331877791');
INSERT INTO `yii_page` VALUES('4','管理团队1','','team','','','团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。','<div>	<div>		团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不符合多元化的现实状况的。	</div>	<div>		一个优秀的企业管理者，应该怎样管理员工?道理也很简单，那就是要给员工创造一个充分利用自己的个性将工作干得最好的条件。不一定什么都要团队化，太死板了。虽然现在的企业也都提倡创新，但如果管理者过分强调团队精神，则员工的创新精神必然受到压抑。压抑个性就是压抑创新，没有个性哪来的创新?说得极端一点，企业管理者要谨防团队建设法西斯化。团队是需要的，企业管理者在团队建设的同时要遵循一个原则，不能压抑员工的个性。在团队内部，企业管理者要给员工充分的自由，少说几句少数服从多数，要知道，聪明的人在世界上还就占少数。	</div>	<div>		企业管理者应该解放思想，要有多元化的思维。不同的企业，团队的性质也不一样。要量体裁衣建设符合企业内在要求的团队，要灵活变化，别搞一刀切。如果该企业是劳动密集型企业，那你可以建设一支高度纪律性组织性的团队。如果该企业是知识密集型企业，那就要以自由主义来管理员工了，建立一支人尽其才的团队是最重要的，严格说算不上是团队，也没必要强调团队，更注重的应该是员工的个人创造力，千万别让团队束缚住员工的头脑，当然应该有的纪律和合作也是不可少的。如果企业既有创造型员工也有操作型员工，那可将团队建设重点放到操作型员工身上。需要注意的一点是，越聪明的人越倾向个人主义，这个情况，企业管理者要注意有的放矢。	</div></div><div></div>','','','','','','','0','0','Y','1379392484');

DROP TABLE IF EXISTS `yii_post`;
CREATE TABLE `yii_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `author` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `html_path` varchar(100) NOT NULL DEFAULT '' COMMENT 'html路径',
  `html_file` varchar(100) NOT NULL DEFAULT '' COMMENT 'html文件名',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',
  `intro` text COMMENT '摘要',
  `image_list` text COMMENT '组图',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `content` mediumtext NOT NULL COMMENT '内容',
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `attach_status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '是否上传附件',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `attention_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注次数',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '头条',
  `last_update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_desc` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '新闻状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='内容管理';

INSERT INTO `yii_post` VALUES('1','1','','','价值1960元JJ林俊杰「时线Time Line」世界巡回演唱会北京站VIP门票2张，百度团购免费送啦！9月28日首都体育馆','','','','','5','0','','','','','','【中奖号码计算方法】：开奖日前一天的“全国福利彩票新3D开奖号码”+“全国体育彩票排列5开奖号码”+“百度收盘股价小数点后两位” = 10位数（即3组数字合并，10位均按顺序排列，此10位数若首位为0则去掉）。<br />★ 以此10位数整除以活动截止日（xxx年x月xx日 23:59:59）的所有抽奖人数（每个抽奖号即为一个抽奖人数），得到的余数+1即为本次活动的获奖号码<br />① 若获奖号码不足7位，则再加上本次所有抽奖人数，直至加到不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />② 获奖号码满足7位，但中奖号码为空，则再减去本次抽奖人数之和，直至减不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />③ 如彩票开奖方开奖时间滞后,或股票交易所休市则本活动开奖日也将进行相应的顺延；<br />④如果当天需要开多个奖，则用此号码分别+011 +021 +031……得出当天其他获奖号码。如果开奖最后一天抽奖号码加值后超过了总参加人数，则将抽奖号码减去总参加人数得到新的抽奖号码。<br /><p>	若您的“抽奖号”与最终获奖号码完全一致，就可以获得本次活动的大奖啦！</p><p>	<img src=\"/cms/uploads/201309/523a32fdf1f07.jpg\" alt=\"\" /> </p>★ 例如：<br />如2013年7月10日<br />新3D号码：4,8,7<br />排列5号码：8，2，9，0，5<br />百度股票收盘价：93.43 小数点后2位：4,3<br />将这3组数依序合并后得到4878290543<br />如果截止至7月15日23:59:59活动结束时的抽奖人数为28999<br />以4878290543整除以28999，商为168222，余数：20765&nbsp;<br />得到余数加1， 20765+1=20766。<br />不足7位数，则20766+28999+……+28999=1006732<br />：【兑奖流程】：1、我们的客服人员会与中奖者电话联系，并核实百度账号和手机号码等，确认获奖信息和使用规则。<br />2、中奖用户在体验特权前1天内，请电话联系团团。（4000-998-998）<br />3、若因信息错误或无效等造成的开奖后15个工作日内无法联系到中奖者，视为中奖者自动放弃该奖品，中奖号码+1顺延下一位。','','','','','14','Y','Y','uploads/201309/523a32e18f2c4.jpg','uploads/201309/thumb_523a32e18f2c4.jpg','0','0','N','1379545939','0','Y','0','Y','1379545825');
INSERT INTO `yii_post` VALUES('14','1','','','App Annie获1500万美元投资 将持续扩展国际业务','','','','','2','1','','','','','','<p>	（朱旭冬）9月18日晚间消息，移动智能市场数据平台App Annie 今日宣布完成一轮总金额为1500万美元的融资，由红杉资本的美国基金领投，现有投资者IDG资本、Greycroft 、e.Ventures 和 Infinity Venture 参与跟投。</p><p>	红杉资本硅谷办事处合伙人 Tim Lee 与 uSamp 首席执行官 Alan Gould 将加入App Annie董事会。</p><p>	App Annie 表示，此轮融得的资金将用于加速 App Annie 的产品开发、增长其销售额并壮大其设在旧金山的营销总部，并扩大其遍布亚洲和欧洲的办事处。</p><p>	随着今年全球智能手机出货量将超过1 亿部的预期，应用软件和数字内容经济大幅增长。App Annie 在过去12个月内用户数扩大两倍，每月营收增长三倍。App Annie 首席执行官Bertrand Schmitt 表示，增长的用户群证明公司重塑企业分析和提取适合商业用途的有用洞察信息的方式是成功的。</p><p>	红杉资本硅谷办事处合伙人 Tim Lee 认为， App Annie 在新数字经济分析领域处于极为有利的地位。“App Annie 的产品对从事移动通信行业的每位从业者来说都是必备的。在红杉资本，我们多年来一直使用他们的产品帮助我们找到有突破力的创业公司。 App Annie 在新数字经济分析领域处于极为有利的地位，并将成为黄金标准。”他说。</p><p>	Bertrand Schmitt 则表示， “对我们来说，红杉资本不仅仅是投资者，同时也是合作伙伴和顾问，它将帮助我们加速我们扩大平台的计划，这样所有企业都可了解全球应用软件和数字内容生态系统。”</p><p>	App Annie 的商业智能平台由 Analytics、Store Stats 和 Intelligence 组成。现今，收益排名前 100 位的 iOS 应用发行商中超过 90% 在使用App Annie 的产品，这其中包含 Google、微软和腾讯。</p>','','','','App,Annie,美元投资,国际业务','1','N','Y','uploads/201309/523a549bd42fe.jpg','uploads/201309/thumb_523a549bd42fe.jpg','0','0','N','0','0','Y','0','Y','1379554460');
INSERT INTO `yii_post` VALUES('15','1','','','Groupon收购本地体验初创公司SideTour','','a:1:{s:5:\"color\";s:0:\"\";}','','','2','1','','','','','','<p>	据国外媒体报道，团购巨人Groupon今日宣布，公司已经收购了本地体验初创公司SideTour。后者是一个帮助人们发现、预订和参加本地活动的市场平台，Groupon没有透露这项收购交易的具体条款。</p><p>	SideTour精选了一些独具特色且有人主持的聚会类活动，让客户们能够与相应领域的资深专家面对面地交流，从而更加了解自己所在的城市和他们关心的事。</p><p>	GrouponLive业务总经理格雷格鲁丁（Greg Rudin）称：“SideTour精心策划的各种本地体验将进一步拓展Groupon的愿景，也就是将Groupon打造成消费者可以随时随地访问的平台。如果Groupon能够提供这些极具个性化的活动、旅游和值得铭记的聚会，我们就能够为我们的客户提供更多有趣的方法，帮助他们探索和发现最好的本地体验。”</p><p>	那些活动大多为私人聚会，人数平均在12人左右，涵盖的行业包括视频、饮料、建筑、历史、艺术等等。SideTour目前提供的公开和私人聚会多达500多种，使用这个平台的聚会主持超过了400人。那些主持者包括厨师、艺术家、奥运金牌获得者、星探和品酒师等等。</p><p>	SideTour的首席执行官韦平戈亚尔（Vipin Goyal）称：“我们很高兴有机会把我们独创的聚会服务提供给这么多热衷于本地体验的人。Groupon可以帮助我们发现更多的本地专家并为他们提供一个与更多客户沟通的平台。”</p><p>	SideTour将继续独立经营一段时间，Groupon将通过其电子邮件、网页和移动渠道向它的4300万活跃用户推广SideTour的聚会服务。</p><p>	SideTour创立于2011年，目前在芝加哥、纽约、费城和华盛顿特区设有办事机构。它计划在未来几个月里开辟更多的市场。</p>','','','','','3','Y','Y','uploads/201309/523a54c220262.jpg','uploads/201309/thumb_523a54c220262.jpg','0','0','N','0','0','Y','0','Y','1379554498');
INSERT INTO `yii_post` VALUES('16','1','','','美国下令FCC修改规定 禁止运营商锁定所售手机','','a:3:{s:4:\"bold\";s:1:\"Y\";s:9:\"underline\";s:1:\"Y\";s:5:\"color\";s:6:\"FF2969\";}','','','2','1','','a:2:{i:0;a:4:{s:6:\"fileId\";s:2:\"36\";s:4:\"file\";s:37:\"uploads/images/201405/21e1adee63a.png\";s:4:\"desc\";s:2:\"04\";s:3:\"url\";s:5:\"04url\";}i:1;a:4:{s:6:\"fileId\";s:2:\"37\";s:4:\"file\";s:37:\"uploads/images/201405/f23850e09dc.png\";s:4:\"desc\";s:2:\"05\";s:3:\"url\";s:5:\"05url\";}}','','','','<p>	在手机解锁上，美国消费者和运营商展开持久战，美国政府和白宫逐渐站在消费者一边。</p><p>	近日美国电信和信息管理局（NTIA）正式向联邦通信委员会（FCC）发函，要求修改规定，未来移动运营商销售给用户的手机、平板等，均不能锁定于网络。</p><p>	所谓“锁定”，指的是运营商通过技术手段，限制某一部手机和平板，只能使用自家的移动网络进行通信。</p><p>	上述机构对FCC表示，消费者应该获得更多自由，选择不同的移动通信服务商，自由使用自己合法购买的移动设备，对相关规定进行修改之后，可以增强移动通信市场的竞争，增加消费者满意度。</p><p>	目前还不清楚FCC是否会痛快答应修改规定的要求。众所周知的是，美国电信行业，也雇请了游说团体，捍卫对手机锁定的做法。</p><p>	据报道，1990年代以前，美国电信运营商销售的手机，均未锁定于自家网络。此后，为了降低用户流失率，运营商开始锁定手机。不过，对于熟悉IT知识的民间高手来说，根据网络资源对手机进行解锁，难度并不大。</p><p>	1998年，美国通过《千年数字版权法》，法律本意是要抑制盗版，但最后却禁止了用户对手机解锁。从2006年以来，支持消费者的美国议员们，也屡屡要求修改法律，允许用户自由解锁。</p><p>	在移动运营商看来，他们对用户购买手机的价格进行了大额补贴，目的是通过用户在一年或两年的合同期限内，用花费流量费的消费，弥补运营商购机补贴。如果让用户自由解锁，将损害运营商的利益。</p><p>	以苹果手机为例，运营商捆绑两年合约的补贴价格为199美元，但是其裸机零售价超过600美元，这400多美元其实由运营商买单。</p><p>	上述机构NTIA还指出，只要是消费者承诺继续使用某种服务，或是针对提前结束合约支付了违约罚金等，美国的运营商就应该免费帮助用户进行解锁。</p>','','','','美国,,禁止运营商,锁定手机','29','Y','Y','uploads/201309/523a54f7d9591.jpg','uploads/201309/thumb_523a54f7d9591.jpg','1','2','Y','0','4','N','5','N','1379554552');

DROP TABLE IF EXISTS `yii_post_comment`;
CREATE TABLE `yii_post_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '标题id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `nickname` varchar(60) NOT NULL DEFAULT 'guest' COMMENT '用户名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `content` text NOT NULL COMMENT '评论内容',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `status_answer` enum('Y','N') NOT NULL DEFAULT 'N',
  `answer_content` text COMMENT '回复内容',
  `client_ip` char(5) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新闻评论';


DROP TABLE IF EXISTS `yii_post_tags`;
CREATE TABLE `yii_post_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='新闻标签';

INSERT INTO `yii_post_tags` VALUES('1','贵族养生','1','1379546108');
INSERT INTO `yii_post_tags` VALUES('2','休闲放松','1','1379546108');
INSERT INTO `yii_post_tags` VALUES('3','麦乐迪','1','1379546248');
INSERT INTO `yii_post_tags` VALUES('4','KTV','1','1379546248');
INSERT INTO `yii_post_tags` VALUES('5','iOS7','1','1379546869');
INSERT INTO `yii_post_tags` VALUES('6','普通用户','1','1379546869');
INSERT INTO `yii_post_tags` VALUES('7','全新图标设计','1','1379546869');
INSERT INTO `yii_post_tags` VALUES('8','甲骨文','1','1379547034');
INSERT INTO `yii_post_tags` VALUES('9','净利润','1','1379547034');
INSERT INTO `yii_post_tags` VALUES('10','谷歌','1','1379554258');
INSERT INTO `yii_post_tags` VALUES('11','追踪工具','1','1379554258');
INSERT INTO `yii_post_tags` VALUES('12','AdID','1','1379554258');
INSERT INTO `yii_post_tags` VALUES('13','洗牌','1','1379554258');
INSERT INTO `yii_post_tags` VALUES('14','微软','1','1379554317');
INSERT INTO `yii_post_tags` VALUES('15','Windows8.1','1','1379554317');
INSERT INTO `yii_post_tags` VALUES('16','基本版售价','1','1379554317');
INSERT INTO `yii_post_tags` VALUES('17','三星','1','1379554397');
INSERT INTO `yii_post_tags` VALUES('18','智能手表','1','1379554397');
INSERT INTO `yii_post_tags` VALUES('19','二代产品','1','1379554397');
INSERT INTO `yii_post_tags` VALUES('20','App','1','1379554460');
INSERT INTO `yii_post_tags` VALUES('21','Annie','1','1379554460');
INSERT INTO `yii_post_tags` VALUES('22','美元投资','1','1379554460');
INSERT INTO `yii_post_tags` VALUES('23','国际业务','1','1379554460');
INSERT INTO `yii_post_tags` VALUES('24','美国','1','1379554552');
INSERT INTO `yii_post_tags` VALUES('25','禁止运营商','1','1379554552');
INSERT INTO `yii_post_tags` VALUES('26','锁定手机','1','1379554552');
INSERT INTO `yii_post_tags` VALUES('27','Facebook','5','1379554636');
INSERT INTO `yii_post_tags` VALUES('28','高管','1','1379554636');
INSERT INTO `yii_post_tags` VALUES('29','离职','1','1379554636');
INSERT INTO `yii_post_tags` VALUES('30','投奔','1','1379554636');
INSERT INTO `yii_post_tags` VALUES('31','阿里巴巴','5','1379554636');
INSERT INTO `yii_post_tags` VALUES('32','诺基亚','1','1379554696');
INSERT INTO `yii_post_tags` VALUES('33','宣布','1','1379554696');
INSERT INTO `yii_post_tags` VALUES('34','Lumia1520','1','1379554696');
INSERT INTO `yii_post_tags` VALUES('35','yii','4','1395211247');
INSERT INTO `yii_post_tags` VALUES('36','新品','1','1395212757');

DROP TABLE IF EXISTS `yii_question`;
CREATE TABLE `yii_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户',
  `scope` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `question` text NOT NULL COMMENT '内容',
  `contact_other` varchar(100) NOT NULL DEFAULT '' COMMENT '其它联系方式',
  `answer_status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '回复状态',
  `answer_content` text COMMENT '回复内容',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='客服';

INSERT INTO `yii_question` VALUES('1','0','0','','zjh','326196998@qq.com','','yiiCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，yiicms可用于企业建站、个人博客、资讯门户、图片站等各类型站点。','','N','如果您需要购买商业程序、项目外包订制、交流合作的，欢迎使用以下方式和我们联系','Y','1379546643');

DROP TABLE IF EXISTS `yii_recommend_position`;
CREATE TABLE `yii_recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `recommend_name` varchar(100) DEFAULT NULL COMMENT '推荐位名称',
  `type` enum('article','image','soft','video','goods') NOT NULL DEFAULT 'article' COMMENT '栏目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

INSERT INTO `yii_recommend_position` VALUES('1','首页文章推荐','article');
INSERT INTO `yii_recommend_position` VALUES('3','图集推荐','image');
INSERT INTO `yii_recommend_position` VALUES('4','图集推荐二','image');

DROP TABLE IF EXISTS `yii_recommend_post`;
CREATE TABLE `yii_recommend_post` (
  `id` int(10) unsigned NOT NULL COMMENT '推荐位id',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `sort_order` int(10) unsigned DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐内容表';

INSERT INTO `yii_recommend_post` VALUES('1','15','255');
INSERT INTO `yii_recommend_post` VALUES('1','16','255');

DROP TABLE IF EXISTS `yii_session`;
CREATE TABLE `yii_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session表';

INSERT INTO `yii_session` VALUES('ecoqo3eqdib2ck4dljlkuebjs1','1400852562','admin__returnUrl|s:10:\"/admin.htm\";');
INSERT INTO `yii_session` VALUES('slqvt2h9bqo39sos0f6k7qmqg0','1400852562','admin__returnUrl|s:10:\"/admin.htm\";Yii.CCaptchaAction.af6bc074.admin/default.captcha|s:4:\"dd9h\";Yii.CCaptchaAction.af6bc074.admin/default.captchacount|i:1;');
INSERT INTO `yii_session` VALUES('sinfqm97ot4266dab5snm3p957','1400853254','admin__returnUrl|s:10:\"/admin.htm\";');
INSERT INTO `yii_session` VALUES('eihu9h3p7o0bhhrli4q40r78k6','1400854090','admin__returnUrl|s:10:\"/admin.htm\";Yii.CCaptchaAction.af6bc074.admin/default.captcha|s:4:\"l37d\";Yii.CCaptchaAction.af6bc074.admin/default.captchacount|i:3;admin__id|s:1:\"1\";admin__name|s:9:\"zjh_admin\";adminstatus|s:1:\"1\";admingroupid|s:2:\"10\";admingroupname|s:15:\"系统管理员\";adminemail|s:14:\"xb_zjh@126.com\";admin__states|a:4:{s:6:\"status\";b:1;s:7:\"groupid\";b:1;s:9:\"groupname\";b:1;s:5:\"email\";b:1;}');

DROP TABLE IF EXISTS `yii_setting`;
CREATE TABLE `yii_setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';

INSERT INTO `yii_setting` VALUES('base','site_name','我的yii网站','');
INSERT INTO `yii_setting` VALUES('base','site_domain','http://www.yii.local','');
INSERT INTO `yii_setting` VALUES('base','admin_email','xb_zjh@126.com','');
INSERT INTO `yii_setting` VALUES('base','site_icp','京','');
INSERT INTO `yii_setting` VALUES('base','site_closed_summary','系统维护中，请稍候......','');
INSERT INTO `yii_setting` VALUES('base','site_stats','第三方统计代码','');
INSERT INTO `yii_setting` VALUES('seo','seo_title','我的yii网站','');
INSERT INTO `yii_setting` VALUES('seo','seo_description','我的yii网站','');
INSERT INTO `yii_setting` VALUES('seo','seo_keywords','yii,php,html,web','');
INSERT INTO `yii_setting` VALUES('base','admin_telephone','18606712910','');
INSERT INTO `yii_setting` VALUES('base','site_status','open','');
INSERT INTO `yii_setting` VALUES('base','site_status_intro','网站正在维护，对您带来的不便我们深表歉意，请稍后再来访问...','');
INSERT INTO `yii_setting` VALUES('base','admin_logger','open','');
INSERT INTO `yii_setting` VALUES('base','user_status','open','');
INSERT INTO `yii_setting` VALUES('base','user_mail_verify','open','');
INSERT INTO `yii_setting` VALUES('base','site_copyright','Copyright @ 2014-2015','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_size','100x100','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_file','static/public/watermark.png','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_status','open','');
INSERT INTO `yii_setting` VALUES('upload','upload_allow_ext','jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf','');
INSERT INTO `yii_setting` VALUES('upload','upload_max_size','20000','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_scope','100x100','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_position','5','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_padding','5','');
INSERT INTO `yii_setting` VALUES('upload','upload_water_trans','30','');
INSERT INTO `yii_setting` VALUES('custom','_address','北京市朝阳区','');
INSERT INTO `yii_setting` VALUES('custom','_telephone','(+86 10) 5992 8888','');
INSERT INTO `yii_setting` VALUES('custom','_fax','传真:(+86 10) 5992 0000','');
INSERT INTO `yii_setting` VALUES('custom','_mobile','18600000000','');
INSERT INTO `yii_setting` VALUES('template','theme','classic','');
INSERT INTO `yii_setting` VALUES('template','template','default','');

DROP TABLE IF EXISTS `yii_soft`;
CREATE TABLE `yii_soft` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '' COMMENT '软件标题',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `cover_image` varchar(100) DEFAULT '' COMMENT '封面图片',
  `fileid` varchar(255) DEFAULT NULL COMMENT '文件id',
  `filetype` varchar(10) NOT NULL DEFAULT '' COMMENT '文件类型',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '软件语言',
  `softtype` varchar(10) NOT NULL DEFAULT '' COMMENT '软件类型',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '操作系统',
  `softrank` enum('5','4','3','2','1') NOT NULL DEFAULT '5' COMMENT '软件等级',
  `softsize` varchar(10) NOT NULL DEFAULT '' COMMENT '软件大小',
  `softlink` varchar(100) DEFAULT '' COMMENT '软件外部下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='软件管理表';

INSERT INTO `yii_soft` VALUES('3',' 腾讯QQ2013 SP6 官方正式版','11','','','','zh_cn','domestic','Win2003,WinXP,Win8','5','','','<span>QQ产品团队经过数月的奋战，全新感觉的QQ2013 Beta1版本终于打造完成，QQ2013拥有全新登录界面，登录速度更快捷；安全模块的升级让你的QQ更安全，群视频秀让群聊更有氛围。本站提供qq2013最新版官方下载,腾讯qq2013官方下载正式版。</span>','0','1400750629','1400549982','0','Y','','','');
INSERT INTO `yii_soft` VALUES('4','阿里旺旺 2014卖家版 V7.20.36T 正式版','11','uploads/images/201405/6a30a96a755.jpg','','','zh_cn','domestic','Win2003,WinXP,Win8','5','','','<p>	<br /></p><p>	【阿里旺旺 2014卖家版概括介绍】</p><p>	免费网商沟通软件。</p><p>	<br /></p><br />【阿里旺旺 2014卖家版基本介绍】<br /><p>	阿里旺旺，是阿里巴巴为商人度身定做的免费网上商务沟通软件。它能帮您轻松找客户，发布、管理商业信息；及时把握商机，随时洽谈做生意！</p><p>	<br /></p>&nbsp;&nbsp;&nbsp;<br />【阿里旺旺 2014卖家版软件特点】<br />1. 随时联系客户 <br />每一条信息都标记着您的在线状态 , 让商人随时联系您<br />2. 海量商机搜索 <br />不登录网站，快速搜索阿里巴巴大市场 600 万商机！ <br />3. 巧发','0','1400752129','1400550081','0','Y','','','');

DROP TABLE IF EXISTS `yii_special`;
CREATE TABLE `yii_special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `title_alias` varchar(255) NOT NULL DEFAULT '' COMMENT '标题别名',
  `intro` text COMMENT '描述',
  `content` text COMMENT '详细介绍',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo描述',
  `template` varchar(50) NOT NULL DEFAULT '' COMMENT '模板',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '入库时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='专题';

INSERT INTO `yii_special` VALUES('1','专题二','special2','美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有谷歌(微博)和多家汽车厂商的无人驾驶汽车市场的争夺之中','<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有<a class=\"a-tips-Article-QQ\" href=\"http://stockhtm.finance.qq.com/astock/ggcx/GOOG.OQ.htm\" target=\"_blank\">谷歌</a>(<a href=\"http://t.qq.com/googlechina#pref=qqcom.keyword\" target=\"_blank\">微博</a>)和多家汽车厂商的无人驾驶汽车市场的争夺之中。</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	马斯克在接受英国《金融时报》的采访时表示，特斯拉自动驾驶汽车将会让司机把90%的驾驶权转交给汽车的电脑系统，而全自动无人驾驶汽车则需要更长的研发时间。</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	马斯克指出，特斯拉的自动驾驶汽车将由该公司采用自有技术进行内部研发，并不会外包给其他公司。这一点也得到了该公司一位新闻发言人的证实。</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	特斯拉官网近日发布了一个招聘“高级驾驶员辅助系统控制工程师”的启示，负责帮助“特斯拉成为自动驾驶汽车市场的领导者”。</p>','uploads/thumbs/201403/small_8e9e89a2e6a.png','uploads/images/201403/8e9e89a2e6a.png','','','','','Y','0','4','1379547110');
INSERT INTO `yii_special` VALUES('2','专题一','special1','','<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	随着移动科技的不断发展，人们生活的方方面面都感受到了新科技所带来的巨大影响，餐饮领域自然也不例外。无论是在餐馆的餐桌上放置平板电脑、还是推出可互动的点菜、买单应用都是餐饮企业为进一步促进消费者来店消费所想出的妙招。其中，美国知名餐厅运营商Brinker International.Inc旗下Chili\'s Grill &amp; Bar最近做出的动作便是移动化大潮来袭下的一个最好示范。</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	<img src=\"/cms/uploads/201309/523a380d1d4c0.jpg\" alt=\"\" /> </p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	目前，该公司已经在旗下部分餐厅中测试由Ziosk研发的桌面服务系统，该系统可以使消费者在无需服务员出现的情况完成点菜、买单等操作，甚至还可以利用该系统玩游戏。对此，Chili\'s Grill &amp; Bar品牌战略高级副总裁表示，“由于消费者更倾向于在配备了这类桌面系统的餐厅花费更多金钱，因此这一科技可以帮助公司有效提高销售额。”</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	事实上，由于桌面服务系统会时不时的显示一些甜品的图片，Chili\'s Grill &amp; Bar餐厅的甜品销量已经迎来了大约20%的提升。因此我们不难想象，如果Chili\'s Grill &amp; Bar未来将这一图片展示的范围扩大到酒精类饮品和其他拥有更大利润率的菜品时能够取得怎样的效果。</p><p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">	与此同时，桌面服务设备中自带的那些看似不起眼的小游戏也有望为餐厅带来额外收入。比如，Chili\'s Grill &amp; Bar会向每位需要使用游戏服务的消费者收取0.99美元的费用，其中Chili\'s Grill &amp; Bar将可以拿到50%的分成，而另一半则由Ziosk收取。考虑到Chili\'s Grill &amp; Bar目前仅仅是从Ziosk处以租赁的形式拿到这些设备的这一事实，这样的分成比例还算比较公平。</p>','uploads/thumbs/201403/small_9e6fac7a8c2.png','uploads/images/201403/9e6fac7a8c2.png','','','','','Y','0','24','1379547152');

DROP TABLE IF EXISTS `yii_upload`;
CREATE TABLE `yii_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户名',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` varchar(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varbinary(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `file_ext` varchar(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `access` varchar(255) NOT NULL DEFAULT '' COMMENT '权限控制',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='附件';

INSERT INTO `yii_upload` VALUES('20','1','5.png','uploads/images/201403/3b68894af12.png','','png','application/octet-stream','1724','0','','1394775273');
INSERT INTO `yii_upload` VALUES('19','1','4.png','uploads/images/201403/7b1f180d893.png','','png','application/octet-stream','624','0','','1394766396');
INSERT INTO `yii_upload` VALUES('18','1','3.png','uploads/images/201403/618ffae8688.png','','png','image/png','1158','0','','1394765930');
INSERT INTO `yii_upload` VALUES('11','1','4.png','uploads/images/201403/3191fae4146.png','','png','application/octet-stream','624','0','','1394518529');
INSERT INTO `yii_upload` VALUES('12','1','3.png','uploads/images/201403/99416091f65.png','','png','application/octet-stream','1158','0','','1394518529');
INSERT INTO `yii_upload` VALUES('15','1','gallery_848120_420_420.jpg','uploads/images/201403/0630a657021.jpg','','jpg','application/octet-stream','27151','0','','1394520368');
INSERT INTO `yii_upload` VALUES('21','1','4.png','uploads/images/201403/3db31e78ed6.png','','png','application/octet-stream','624','0','','1394776929');
INSERT INTO `yii_upload` VALUES('22','1','5.png','uploads/images/201403/8d263a71832.png','','png','application/octet-stream','1724','0','','1394777029');
INSERT INTO `yii_upload` VALUES('23','1','dui.png','uploads/images/201403/d31cf787453.png','','png','image/png','307','0','','1394777079');
INSERT INTO `yii_upload` VALUES('24','1','5.png','uploads/images/201403/aa13e88c5b4.png','','png','application/octet-stream','1724','0','','1394781140');
INSERT INTO `yii_upload` VALUES('25','1','2013052136594429.GIF','uploads/images/201403/502591bcd60.gif','','gif','application/octet-stream','136474','0','','1394781772');
INSERT INTO `yii_upload` VALUES('26','1','1270881934.jpg','uploads/images/201403/45dc43ecaae.jpg','','jpg','application/octet-stream','88396','0','','1394781772');
INSERT INTO `yii_upload` VALUES('27','1','6.png','uploads/attached/image/201403/85f1fd7ad55.png','','png','image/png','1665','0','','1394781813');
INSERT INTO `yii_upload` VALUES('28','1','email_hui.gif','uploads/attached/image/201403/e54c3f369b1.gif','','gif','application/octet-stream','1694','0','','1394781834');
INSERT INTO `yii_upload` VALUES('35','1','4.png','uploads/images/201405/e591eae944b.png','','png','application/octet-stream','624','0','','1400139041');
INSERT INTO `yii_upload` VALUES('36','1','4.png','uploads/images/201405/21e1adee63a.png','','png','application/octet-stream','624','0','','1400139407');
INSERT INTO `yii_upload` VALUES('37','1','5.png','uploads/images/201405/f23850e09dc.png','','png','application/octet-stream','1724','0','','1400139621');
INSERT INTO `yii_upload` VALUES('41','1','4.png','uploads/images/201405/157922e4cf3.png','','png','application/octet-stream','624','0','','1400141603');
INSERT INTO `yii_upload` VALUES('43','1','3.png','uploads/images/201405/c5fa21d533b.png','','png','application/octet-stream','1158','0','','1400205224');
INSERT INTO `yii_upload` VALUES('44','1','5.png','uploads/images/201405/12d4aa28af4.png','','png','application/octet-stream','1724','0','','1400205363');

DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE `yii_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `groupid` int(10) unsigned DEFAULT '0' COMMENT '用户组id',
  `status` tinyint(2) DEFAULT '1' COMMENT '-1待审核 0 -禁用  1-通过',
  `addtime` int(10) DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';

INSERT INTO `yii_user` VALUES('1','zjh_admin','$2a$08$O9zKWgiL8YBa5Lzss2G5PO08tAj1HmI6R.2J3hLXPC9lPcLPPx5GS','xb_zjh@126.com','10','1','1379001600');
INSERT INTO `yii_user` VALUES('2','没那么简单','$2a$13$5HFLakgTxQyyfzcZFQElWOk5W.OHhPnfwKXLAYwokPNVsZSyW4Tqy','376685457@qq.com','9','1','1379091600');
INSERT INTO `yii_user` VALUES('7','微博评论','$2a$13$TEpIe58TLJIUmLuoE7pYD.KK74cRlLXSaNoXf0bnxbcLFFmmW1E5u','xweibo_user85589@sina.com','1','1','1379101600');
INSERT INTO `yii_user` VALUES('31','testUser','$2a$08$QuvI8Ory.KMdKvmaCV/g9O8AoVTQMMvDrS.wvkOnEWBIBJwm3kLsq','123456','1','1','1399346040');
INSERT INTO `yii_user` VALUES('32','test123','$2a$08$IrFpdJZKlMTUoiLS/D79kOiFfy9MInvsRQuoNc5hiCSL9qSISQxIm','test123@qq.com','1','1','1399346280');
INSERT INTO `yii_user` VALUES('33','test001','$2a$08$mmxLn6zpboN/Q2BnDfk4MesW4qbcIRD0ONmiuJ/gwv1X1kuinCTge','326196998@qq.com','1','1','1400462626');

DROP TABLE IF EXISTS `yii_user_group`;
CREATE TABLE `yii_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) DEFAULT '' COMMENT '用户组名称',
  `acl` varchar(255) DEFAULT '' COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';

INSERT INTO `yii_user_group` VALUES('1','普通用户','');
INSERT INTO `yii_user_group` VALUES('2','VIP①用户','');
INSERT INTO `yii_user_group` VALUES('3','VIP②用户','');
INSERT INTO `yii_user_group` VALUES('4','VIP④用户','');
INSERT INTO `yii_user_group` VALUES('5','VIP⑤用户','');
INSERT INTO `yii_user_group` VALUES('6','VIP⑥用户','');
INSERT INTO `yii_user_group` VALUES('7','VIP⑦用户','');
INSERT INTO `yii_user_group` VALUES('8','VIP⑧用户','');
INSERT INTO `yii_user_group` VALUES('9','网站编辑','default|login,catalog|index,catalog|create,all,link|index,link|create,link|update,link|delete,link|batch');
INSERT INTO `yii_user_group` VALUES('10','系统管理员','Administrator');

DROP TABLE IF EXISTS `yii_video`;
CREATE TABLE `yii_video` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '' COMMENT '视频名称',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `cover_image` varchar(100) DEFAULT '' COMMENT '封面图片',
  `fileid` varchar(255) DEFAULT NULL COMMENT '文件id',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '视频语言',
  `video_type` varchar(10) NOT NULL DEFAULT '' COMMENT '视频类型',
  `video_score` mediumint(2) unsigned NOT NULL DEFAULT '0' COMMENT '视频评分',
  `video_size` varchar(10) NOT NULL DEFAULT '' COMMENT '视频大小',
  `download` varchar(100) DEFAULT '' COMMENT '下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='视频管理表';

INSERT INTO `yii_video` VALUES('1','美国队长','12','','','englise','science','0','','','美国队长','0','1400850481','1400834656','0','Y','','','');

