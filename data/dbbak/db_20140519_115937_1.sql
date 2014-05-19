# your database backup
# version:5.5.27-log
# time:2014-05-19 11:59:37
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
  `catalog_name_second` varchar(100) DEFAULT '' COMMENT '副名称',
  `catalog_name_alias` varchar(100) NOT NULL DEFAULT '' COMMENT '别名',
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='全局分类';

INSERT INTO `yii_catalog` VALUES('1','article','0','新闻','新闻2','news','新闻<br />','d','d','d','uploads/images/201403/8a4b5e11db6.png','uploads/thumbs/201403/small_8a4b5e11db6.png','0','0','Y','','1379545020','1394509418');
INSERT INTO `yii_catalog` VALUES('2','article','1','公司动态','公司动态','company-news','公司动态栏目介绍','','','','uploads/images/201402/98f97227c00.png','','2','0','Y','','1379545199','1394509418');
INSERT INTO `yii_catalog` VALUES('3','article','1','行业新闻','行业新闻','industry-news','行业新闻栏目介绍','','','','uploads/images/201403/b49f2b45b50.jpg','uploads/thumbs/201403/small_b49f2b45b50.jpg','1','0','Y','','1379545248','1394509418');
INSERT INTO `yii_catalog` VALUES('4','goods','0','产品','产品','goods','产品栏目介绍','','','','','','0','0','Y','','1379545330','1394517482');
INSERT INTO `yii_catalog` VALUES('5','goods','4','新品上市','新品上市','new-arrival','新品上市栏目介绍','','','','','','1','0','Y','','1379545388','1394517482');
INSERT INTO `yii_catalog` VALUES('6','goods','4','特价商品','特价商品','sales-goods','特价商品栏目介绍','','','','','','0','0','N','','1379545435','1394517482');
INSERT INTO `yii_catalog` VALUES('8','image','0','图集','images','','','','','','','','0','0','Y','','0','1399616730');
INSERT INTO `yii_catalog` VALUES('9','image','8','最新热图','host_images','','最新热图','最新热图','最新热图','最新热图','','','0','0','Y','','0','1399616723');

DROP TABLE IF EXISTS `yii_link`;
CREATE TABLE `yii_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO图标',
  `sortorder` int(11) DEFAULT '255' COMMENT '排序',
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
INSERT INTO `yii_mail_log` VALUES('2','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('3','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('4','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('5','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('6','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('7','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('8','376685457@qq.com','yiicms','测试邮件','','waiting','3','0','');
INSERT INTO `yii_mail_log` VALUES('9','376685457@qq.com','yiicms','测试邮件','1400230572','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('10','376685457@qq.com','yiicms','测试邮件','1400230784','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('11','376685457@qq.com','yiicms','测试邮件','1400230820','failed','3','1','SMTP Error: Could not connect to SMTP host.');
INSERT INTO `yii_mail_log` VALUES('12','376685457@qq.com','yiicms','测试邮件<p><a href=\"baidu.com\">百度一下</a></p>','1400230886','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('13','376685457@qq.com','yiicms','测试邮件<p><a href=\"baidu.com\">百度一下</a></p>','1400231187','success','3','1','');
INSERT INTO `yii_mail_log` VALUES('14','326196998@qq.com','我的yii网站 账号激活','<p>尊敬的新用户：test001 您好，欢迎注册我的yii网站，为了更好的为您服务，请点击下面链接进行账号激活：<br/>
						<a href=\"http://www.yii.local/site/authEmail/33.htm?authcode=MTUdoTWoxKcHc\">http://www.yii.local/site/authEmail/33.htm?authcode=MTUdoTWoxKcHc</a><br/>如果上面链接不能点击，请复制到浏览器地址栏中进行访问。<br/>
						再次感谢您的光顾，如果有其他疑问，
						请联系本网站的管理员<a href=\"mailto\">xb_zjh@126.com</a>。</p>','1400462628','success','3','1','');

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
  `title_alias` char(50) NOT NULL DEFAULT '' COMMENT '别名 ',
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='内容管理';

INSERT INTO `yii_post` VALUES('1','1','','','价值1960元JJ林俊杰「时线Time Line」世界巡回演唱会北京站VIP门票2张，百度团购免费送啦！9月28日首都体育馆','','','','','','5','0','','','','','','【中奖号码计算方法】：开奖日前一天的“全国福利彩票新3D开奖号码”+“全国体育彩票排列5开奖号码”+“百度收盘股价小数点后两位” = 10位数（即3组数字合并，10位均按顺序排列，此10位数若首位为0则去掉）。<br />★ 以此10位数整除以活动截止日（xxx年x月xx日 23:59:59）的所有抽奖人数（每个抽奖号即为一个抽奖人数），得到的余数+1即为本次活动的获奖号码<br />① 若获奖号码不足7位，则再加上本次所有抽奖人数，直至加到不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />② 获奖号码满足7位，但中奖号码为空，则再减去本次抽奖人数之和，直至减不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />③ 如彩票开奖方开奖时间滞后,或股票交易所休市则本活动开奖日也将进行相应的顺延；<br />④如果当天需要开多个奖，则用此号码分别+011 +021 +031……得出当天其他获奖号码。如果开奖最后一天抽奖号码加值后超过了总参加人数，则将抽奖号码减去总参加人数得到新的抽奖号码。<br /><p>	若您的“抽奖号”与最终获奖号码完全一致，就可以获得本次活动的大奖啦！</p><p>	<img src=\"/cms/uploads/201309/523a32fdf1f07.jpg\" alt=\"\" /> </p>★ 例如：<br />如2013年7月10日<br />新3D号码：4,8,7<br />排列5号码：8，2，9，0，5<br />百度股票收盘价：93.43 小数点后2位：4,3<br />将这3组数依序合并后得到4878290543<br />如果截止至7月15日23:59:59活动结束时的抽奖人数为28999<br />以4878290543整除以28999，商为168222，余数：20765&nbsp;<br />得到余数加1， 20765+1=20766。<br />不足7位数，则20766+28999+……+28999=1006732<br />：【兑奖流程】：1、我们的客服人员会与中奖者电话联系，并核实百度账号和手机号码等，确认获奖信息和使用规则。<br />2、中奖用户在体验特权前1天内，请电话联系团团。（4000-998-998）<br />3、若因信息错误或无效等造成的开奖后15个工作日内无法联系到中奖者，视为中奖者自动放弃该奖品，中奖号码+1顺延下一位。','','','','','14','Y','Y','uploads/201309/523a32e18f2c4.jpg','uploads/201309/thumb_523a32e18f2c4.jpg','0','0','N','1379545939','0','Y','0','Y','1379545825');
INSERT INTO `yii_post` VALUES('14','1','','','App Annie获1500万美元投资 将持续扩展国际业务','','','','','','2','1','','','','','','<p>	（朱旭冬）9月18日晚间消息，移动智能市场数据平台App Annie 今日宣布完成一轮总金额为1500万美元的融资，由红杉资本的美国基金领投，现有投资者IDG资本、Greycroft 、e.Ventures 和 Infinity Venture 参与跟投。</p><p>	红杉资本硅谷办事处合伙人 Tim Lee 与 uSamp 首席执行官 Alan Gould 将加入App Annie董事会。</p><p>	App Annie 表示，此轮融得的资金将用于加速 App Annie 的产品开发、增长其销售额并壮大其设在旧金山的营销总部，并扩大其遍布亚洲和欧洲的办事处。</p><p>	随着今年全球智能手机出货量将超过1 亿部的预期，应用软件和数字内容经济大幅增长。App Annie 在过去12个月内用户数扩大两倍，每月营收增长三倍。App Annie 首席执行官Bertrand Schmitt 表示，增长的用户群证明公司重塑企业分析和提取适合商业用途的有用洞察信息的方式是成功的。</p><p>	红杉资本硅谷办事处合伙人 Tim Lee 认为， App Annie 在新数字经济分析领域处于极为有利的地位。“App Annie 的产品对从事移动通信行业的每位从业者来说都是必备的。在红杉资本，我们多年来一直使用他们的产品帮助我们找到有突破力的创业公司。 App Annie 在新数字经济分析领域处于极为有利的地位，并将成为黄金标准。”他说。</p><p>	Bertrand Schmitt 则表示， “对我们来说，红杉资本不仅仅是投资者，同时也是合作伙伴和顾问，它将帮助我们加速我们扩大平台的计划，这样所有企业都可了解全球应用软件和数字内容生态系统。”</p><p>	App Annie 的商业智能平台由 Analytics、Store Stats 和 Intelligence 组成。现今，收益排名前 100 位的 iOS 应用发行商中超过 90% 在使用App Annie 的产品，这其中包含 Google、微软和腾讯。</p>','','','','App,Annie,美元投资,国际业务','1','N','Y','uploads/201309/523a549bd42fe.jpg','uploads/201309/thumb_523a549bd42fe.jpg','0','0','N','0','0','Y','0','Y','1379554460');
INSERT INTO `yii_post` VALUES('15','1','','','Groupon收购本地体验初创公司SideTour','','','a:1:{s:5:\"color\";s:0:\"\";}','','','2','1','','','','','','<p>	据国外媒体报道，团购巨人Groupon今日宣布，公司已经收购了本地体验初创公司SideTour。后者是一个帮助人们发现、预订和参加本地活动的市场平台，Groupon没有透露这项收购交易的具体条款。</p><p>	SideTour精选了一些独具特色且有人主持的聚会类活动，让客户们能够与相应领域的资深专家面对面地交流，从而更加了解自己所在的城市和他们关心的事。</p><p>	GrouponLive业务总经理格雷格鲁丁（Greg Rudin）称：“SideTour精心策划的各种本地体验将进一步拓展Groupon的愿景，也就是将Groupon打造成消费者可以随时随地访问的平台。如果Groupon能够提供这些极具个性化的活动、旅游和值得铭记的聚会，我们就能够为我们的客户提供更多有趣的方法，帮助他们探索和发现最好的本地体验。”</p><p>	那些活动大多为私人聚会，人数平均在12人左右，涵盖的行业包括视频、饮料、建筑、历史、艺术等等。SideTour目前提供的公开和私人聚会多达500多种，使用这个平台的聚会主持超过了400人。那些主持者包括厨师、艺术家、奥运金牌获得者、星探和品酒师等等。</p><p>	SideTour的首席执行官韦平戈亚尔（Vipin Goyal）称：“我们很高兴有机会把我们独创的聚会服务提供给这么多热衷于本地体验的人。Groupon可以帮助我们发现更多的本地专家并为他们提供一个与更多客户沟通的平台。”</p><p>	SideTour将继续独立经营一段时间，Groupon将通过其电子邮件、网页和移动渠道向它的4300万活跃用户推广SideTour的聚会服务。</p><p>	SideTour创立于2011年，目前在芝加哥、纽约、费城和华盛顿特区设有办事机构。它计划在未来几个月里开辟更多的市场。</p>','','','','','3','Y','Y','uploads/201309/523a54c220262.jpg','uploads/201309/thumb_523a54c220262.jpg','0','0','N','0','0','Y','0','Y','1379554498');
INSERT INTO `yii_post` VALUES('16','1','','','美国下令FCC修改规定 禁止运营商锁定所售手机','','','a:3:{s:4:\"bold\";s:1:\"Y\";s:9:\"underline\";s:1:\"Y\";s:5:\"color\";s:6:\"FF2969\";}','','','2','1','','a:2:{i:0;a:4:{s:6:\"fileId\";s:2:\"36\";s:4:\"file\";s:37:\"uploads/images/201405/21e1adee63a.png\";s:4:\"desc\";s:2:\"04\";s:3:\"url\";s:5:\"04url\";}i:1;a:4:{s:6:\"fileId\";s:2:\"37\";s:4:\"file\";s:37:\"uploads/images/201405/f23850e09dc.png\";s:4:\"desc\";s:2:\"05\";s:3:\"url\";s:5:\"05url\";}}','','','','<p>	在手机解锁上，美国消费者和运营商展开持久战，美国政府和白宫逐渐站在消费者一边。</p><p>	近日美国电信和信息管理局（NTIA）正式向联邦通信委员会（FCC）发函，要求修改规定，未来移动运营商销售给用户的手机、平板等，均不能锁定于网络。</p><p>	所谓“锁定”，指的是运营商通过技术手段，限制某一部手机和平板，只能使用自家的移动网络进行通信。</p><p>	上述机构对FCC表示，消费者应该获得更多自由，选择不同的移动通信服务商，自由使用自己合法购买的移动设备，对相关规定进行修改之后，可以增强移动通信市场的竞争，增加消费者满意度。</p><p>	目前还不清楚FCC是否会痛快答应修改规定的要求。众所周知的是，美国电信行业，也雇请了游说团体，捍卫对手机锁定的做法。</p><p>	据报道，1990年代以前，美国电信运营商销售的手机，均未锁定于自家网络。此后，为了降低用户流失率，运营商开始锁定手机。不过，对于熟悉IT知识的民间高手来说，根据网络资源对手机进行解锁，难度并不大。</p><p>	1998年，美国通过《千年数字版权法》，法律本意是要抑制盗版，但最后却禁止了用户对手机解锁。从2006年以来，支持消费者的美国议员们，也屡屡要求修改法律，允许用户自由解锁。</p><p>	在移动运营商看来，他们对用户购买手机的价格进行了大额补贴，目的是通过用户在一年或两年的合同期限内，用花费流量费的消费，弥补运营商购机补贴。如果让用户自由解锁，将损害运营商的利益。</p><p>	以苹果手机为例，运营商捆绑两年合约的补贴价格为199美元，但是其裸机零售价超过600美元，这400多美元其实由运营商买单。</p><p>	上述机构NTIA还指出，只要是消费者承诺继续使用某种服务，或是针对提前结束合约支付了违约罚金等，美国的运营商就应该免费帮助用户进行解锁。</p>','','','','美国,,禁止运营商,锁定手机','27','Y','Y','uploads/201309/523a54f7d9591.jpg','uploads/201309/thumb_523a54f7d9591.jpg','1','2','Y','0','4','N','5','N','1379554552');
INSERT INTO `yii_post` VALUES('19','1','','','45','','','','','','1','0','','a:3:{i:0;a:4:{s:6:\"fileId\";s:2:\"39\";s:4:\"file\";s:37:\"uploads/images/201405/18fc17a1283.png\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:4:{s:6:\"fileId\";s:2:\"40\";s:4:\"file\";s:37:\"uploads/images/201405/d5972d17ce2.png\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:4:{s:6:\"fileId\";s:2:\"42\";s:4:\"file\";s:37:\"uploads/images/201405/cf5655f0b6a.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','','','','','','1','N','N','','','0','0','N','0','0','Y','0','Y','0');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` char(30) NOT NULL COMMENT 'tag名称',
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

INSERT INTO `yii_recommend_position` VALUES('1','首页文章推荐','article');

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

INSERT INTO `yii_session` VALUES('oopbrfeulp42d6ganj5fctq8r6','1400475575','Yii.CCaptchaAction.33c9b0a4.user.captcha|s:6:\"prh4ak\";Yii.CCaptchaAction.33c9b0a4.user.captchacount|i:1;admin__returnUrl|s:10:\"/admin.htm\";Yii.CCaptchaAction.33c9b0a4.admin/default.captcha|s:4:\"pk2a\";Yii.CCaptchaAction.33c9b0a4.admin/default.captchacount|i:4;admin__id|s:1:\"1\";admin__name|s:9:\"zjh_admin\";adminstatus|s:1:\"1\";admingroupid|s:2:\"10\";admingroupname|s:15:\"系统管理员\";adminemail|s:14:\"xb_zjh@126.com\";admin__states|a:4:{s:6:\"status\";b:1;s:7:\"groupid\";b:1;s:9:\"groupname\";b:1;s:5:\"email\";b:1;}');
INSERT INTO `yii_session` VALUES('3tqf3p160pvo2e5jkc516i13j5','1400475442','Yii.CCaptchaAction.33c9b0a4.user.captcha|s:6:\"nllb6n\";Yii.CCaptchaAction.33c9b0a4.user.captchacount|i:3;');

DROP TABLE IF EXISTS `yii_setting`;
CREATE TABLE `yii_setting` (
  `scope` char(20) NOT NULL DEFAULT '' COMMENT '范围',
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
  `filetype` varchar(10) NOT NULL DEFAULT '' COMMENT '文件类型',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '软件语言',
  `softtype` varchar(10) NOT NULL DEFAULT '' COMMENT '软件类型',
  `os` varchar(30) NOT NULL DEFAULT '' COMMENT '操作系统',
  `softrank` enum('5','4','3','2','1') NOT NULL DEFAULT '5' COMMENT '软件等级',
  `softsize` varchar(10) NOT NULL DEFAULT '' COMMENT '软件大小',
  `softlink` varchar(100) DEFAULT '' COMMENT '软件外部下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '支付费用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='软件管理表';

INSERT INTO `yii_soft` VALUES('1','.zip','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','5','1830 KB','','<p>一、使用环境<br />
<br />
1、<strong>使用许可协议：</strong><a href=\"http://www.dedecms.com/html/zuixindongtai/20070112/65.html\"><u><strong>http://www.dedecms.com/html/zuixindongtai/20070112/65.html</strong></u></a></p>
<p>2、<strong>购买DedeCms商业授权或技术支持：</strong><a href=\"http://bbs.dedecms.com/read.php?tid=8791\" target=\"_blank\"><u><strong>http://bbs.dedecms.com/read.php?tid=8791</strong></u></a></p>
<p>3、PHP4.x 5.x版本，支持GD，非安全模式（在安全模式中使用可能会有很多难于预料的错误）<br />
4、MySQL 3.2x、4.0x、4.1、5.x 版本<br />
5、服务器平台，所有支持运行PHP的服务器平台</p>
<p>二、安装步骤</p>
<p>把本目录下的所有文件，上传到你要安装的位置，然后运行网址</p>
<p>http://你的域名/安装目录/setup/index.php</p>
<p>按要求填写好 MySQL和管理员的信息，完成安装后即可使用。</p>
<p>四、主要功能说明：</p>
<p>一、频道模型管理<br />
1、支持开关频道模型；<br />
2、支持完全个性开发的频道模型；<br />
3、支持通过向导自动生成的频道模型；<br />
4、支持所有频道集中式搜索（全站搜索）；<br />
5、支持限定外部用户组对某频道的信息发布功能；<br />
6、支持自定义模型信息投稿。<br />
二、栏目管理<br />
1、支持用拼音生成栏目目录；<br />
2、支持任意栏目使用不同的频道模型；<br />
3、支持终极栏目下设子栏目；<br />
4、支持使用独立页面作为一个栏目；<br />
5、支持域名绑定；<br />
6、支持自定义列表模板、内容模板、封面模板、单独页面模板；<br />
7、支持使用拼音定义文档命名；<br />
8、支持设定栏目浏览权限；<br />
9、栏目载入首次采用Ajax技术；<br />
10、栏目维护同时支持右键菜单和传统式管理。<br />
三、专题管理<br />
1、支持每个专题使用单独模板；<br />
2、支持专题使用多节点；<br />
3、支持专题模板中单独选择节点。<br />
四、档案管理<br />
1、支持自动获取文档内容的关键字；<br />
×2、支持用多随机模板来实现防采集；<br />
3、支持批量管理；<br />
4、支持设定文档浏览权限；<br />
5、支持文档是否生成静态；<br />
6、支持会员投稿；<br />
7、分页文档支持使用小标题；<br />
8、支持上下篇链接；<br />
9、分页文档支持自动和手动分页;<br />
10、软件模型支持站点镜像功能；<br />
11、自动获取内容摘要功能；<br />
五、模板引擎<br />
1、使用xml名字空间风格的引擎，扩展更灵活；<br />
2、允许在最标记终模板中使用PHP语法进行扩展；<br />
3、允许使用自定义标记；<br />
4、允许function功能扩展；<br />
5、允许标记来运行特定的PHP语句；<br />
6、允许开启模板缓存功能。<br />
六、附助功能<br />
1、支持单独页面编译；<br />
2、会员通行证功能；<br />
3、支持会员有单独的个人文集展示页面；<br />
4、支持会员点数和级别功能；<br />
5、图片水印支持；<br />
6、后台参数更改支持；<br />
7、数据分卷备份还原支持；<br />
8、支持对搜索的关键字进行分词处理；<br />
9、支持按顺序的版块内容（autllist）；<br />
10、支持获得用户搜索的相关关键字。<br />
七、内容插件<br />
1、插件权限管理<br />
2、文件管理器 <br />
3、站内新闻发布 <br />
4、友情链接模块 <br />
5、留言簿模块 <br />
6、投票模块 <br />
7、论坛扩展 <br />
8、SQL命令工具 <br />
9、广告管理<br />
八、采集功能<br />
1、支持多模型采集；<br />
2、支持自定程序处理采集的内容；<br />
3、支持过滤相同标题；<br />
4、支持过滤已下载内容；<br />
5、采集采用一键式运行，简化了原来的先采种子后采内容的方式；<br />
6、数据导入支持分段，并允许导入后即时生成HTML。<br />
&nbsp;</p>','0');
INSERT INTO `yii_soft` VALUES('2','.rar','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','5','2 MB','','<p><strong><span class=\"tpc_title\"><font color=\"#ff0000\" size=\"3\">最新版瑞星杀毒软件会误认本站合法文件sys_data_done.php（数据备份还原程序）为病毒，本地测试前请先关闭瑞星，并且在问题解决前服务器上不要安装瑞星杀毒软件，以免导致你的网站的数据备份还原功能失效。</font></span></strong></p>
<p><strong><span class=\"tpc_title\">Dedecms V4.0 版更新内容或新增功能说明<br />
</span><br />
使用许可协议：<a href=\"http://bbs.dedecms.com/read.php?tid=14893\" target=\"_blank\">http://bbs.dedecms.com/read.php?tid=14893</a><br />
<br />
</strong><span id=\"a_ajax_14797\" class=\"tpc_content\"><font size=\"2\">1、修复了3.1版已知的所有Bug；<br />
<br />
2、重点新增功能：<br />
(1)自由列表；<br />
(2)反向通行证；<br />
(3)后台界面更改，以适应项目大型化的应用的便利性；<br />
<br />
3、增加插件或辅助功能：<br />
(1)重复文档检测；<br />
(2)批量提取文章缩略图；<br />
(3)数据库内容替换；<br />
(4)随机模板防采集；<br />
<br />
4、更完善的树形菜单式的文档管理与发布方式，与栏目相关的地方大多用AJAX载入，更实用化；<br />
<br />
5、增加会员点卡与会员时间限制功能，并提供部份网上支付接口；<br />
<br />
6、列出所有栏目时，没指定栏目时，栏目选择框不使用一次性载入全部，而是改用弹窗选择，用Ajax目录树浏览，解决栏目数量非常多时载入慢的问题。<br />
<br />
7、系统配置参数分组，更人性化；<br />
<br />
8、增加会员数据导入与转换功能，允许Dedecms会员系统使用不同的密码形式。<br />
<br />
9、采集增加设置引用网址的功能，允许程序从指定网址读取Cookie，并使用Keep-Alive模式连接去获取图片，彻底克服居于http 1.1协议的防盗链图片防盗链问题。<br />
<br />
10、采集向导增加了即时测试列表和内容，并且界面更人性化。<br />
<br />
11、增强各种操作的简便性，完善了很多地方细节功能。<br />
<br />
12、新版的后台突破了以往一统式菜单的局限性，为Dedecms以后的发展提供了更大的空间。<br />
<br />
13、严格检查了并限制了会员上传附件程序的可能存在的安全问题，提高了安全性。</font></span><br />
&nbsp;</p>','0');
INSERT INTO `yii_soft` VALUES('3','.zip','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','4','3 MB','','<p><a style=\"color: red; font-size: 16px\" href=\"/download\">DedeCms2007 服务体系与价格>></a></p>
<p>DedeCms2007介绍</p>
<p>&nbsp;&nbsp;&nbsp; DedeCms由2004年到现在，已经经历了五个版本，从DedeCms V2 开始，DedeCms开发了自己的模板引擎，使用XML名字空间风格的模板，对美工制作的直观性提供了极大的便利，从V2.1开始，DedeCms人气急却上升，成为国内最流行的CMS软件，在DedeCms V3版本中，开始引入了模型的概念，从而摆脱里传统网站内容管理对模块太分散，管理不集中的缺点，但随着时间的发展，发现纯粹用模型化并不能满足用户的需求，从而DedeCms 2007（DedeCms V5）应声而出，Dedecms 2007具有如下特性：</p>
<p>一、核心模板采用XML名字空间风格，模板全部使用文件形式保存，对用户设计模板、网站升级转移均提供很大的便利，健壮的模板标签为站长DIY自己的网站提供了强有力的支持；</p>
<p>二、标签缓存机制，Dedecms 2007允许对类同的标签进行缓存，在生成HTML的时候，有利于提高系统反应速度，降低系统消耗的资源；</p>
<p>三、模型与模块的概念并存，在模型不能满足用户所有需求的情况下，DedeCms推出一些互动的模块对系统进行补充，尽量满足用户的需求；</p>
<p>四、众多的应用支持，为用户提供了各类网站建设的一体化解决方案，在本版本中，增加了分类、书库、黄页、圈子、问答等模块，补充一些用户的特殊要求；</p>
<p>五、面向未来的过渡，DedeCms 2007是织梦组建团队以后发布的第一个版本，在织梦团队未来的构想中，它以后将会具有更大的灵活性和稳定的性能。</p>
<p><br />
功能列表:</p>
<p>一、固定的功能</p>
<p>1、频道模型管理，支持用户自定义模型，设置模型是否可投稿的开关等；</p>
<p>2、栏目管理，支持无限级分类，允许对任何栏目设置不同的频道模型；</p>
<p>3、权限管理，可控制不同的管理员组不同的权限，并精确到二级栏目；</p>
<p>4、内置模型：默认内置健壮的文章、软件、图集、分类等模型；</p>
<p>5、辅助插件：提供站内新闻、投票、友情链接等个性化的小插件满足站长建站的需求；</p>
<p>6、采集模型：内置强大的采集功能；</p>
<p>7、专题：支持多节点的专题，为站长快速整理某一新闻提供了便利；</p>
<p>V5正式版功能更新说明</p>
<p>1、模型复制，你可以对系统内置的任意模型（专题除外）进行复制产生一个新的模型，在新模型你可以自由增加字段，以达到在原来模型的基础上的扩展；</p>
<p>2、分表存储，DedeCms V5允许你在定义或模型复制时指定不同的主表和附加表，从而实现彻底的分表存储；</p>
<p>3、自定义字段过程的简化，在自定义字段时即时可以指定该字段是否在列表中列出，是否在前台投稿和采集中使用，使自定义模型更加人性化；</p>
<p>4、系统固化模型允许自由增加字段，对于很多用户而言，不一定能理解自定义模型的概念，但新版中不仅仅支持新模型使用自定义，系统内置的文章模型等也可以按需要增加个性化的字段，并自动在发布表单中出现；</p>
<p>5、更优秀的Tag算法，新的Tag算法不再依整文档本身的关键字，而是通过完全的单独Tag表进行索引，实现真正意义的Tag功能和Tag快速索引；</p>
<p>6、优化递归查询算法，通过生成缓存，把前台常用的栏目递归索引改为不居于数据库查访的算法，以提高效率；</p>
<p>7、优化站内搜索程序，由于本版实行了完全的分表存储，因此对全站索引进行了分离的数据存储，并通过第一次搜索生成缓存，限制搜索时间间隔等提升搜索效率，除了支持全站搜索外，也支持对任意模型通过自定义搜索表单进行任意搜索，在保证高效性的同时也提高了搜索的灵活性；</p>
<p>8、模块的自由安装、卸载，系统对新增的模块如：书库、问答、圈子及未来可能新增的模块进行一键打包，一键安装处理，你可以随时按需安装或删除这些不需要的模块，模块以 .Dev(Dede标准的xml格式) 包形式存放在程序管理目录；</p>
<p>9、图集支持使用ZIP，在后台发表图集时，只需选择指定的ZIP包，系统会自动对其进行解压并生成一个图集，使上传图片的过程得到极为有效的简化。</p>
<p>10、一键更新功能，自动检测更新当天你发布的文档，并同时更新相关栏目；</p>
<p>11、更强大的采集，新版的采集程序允许你直接按模型生成，所以理论上能实现任何频道的采集；</p>','0');
INSERT INTO `yii_soft` VALUES('4','.zip','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','4','3.8 MB','','<p>DedeCms V5.1 主要改动如下：</p>
<p>1、修正 5.01版发现的所有已知问题；</p>
<p>2、增加百度地图功能、互动模块JS调用等插件；</p>
<p>3、为了使部份商业用户获得更好的体验，V5.1对商业版单独作了如下改进或新增功能：</p>
<p>(1) 重新修改了会员中心的界面，使其更大气，更符合WEB2.0的审美要求；</p>
<p>(2) 单独开发了与计划任务设置相结合的客户端，方面用户设置一些定时执行的任务；</p>
<p>(3) 修正了二级域名对互动栏目内容调用可能链接不正确的问题，并完善二级域名的一些设置细节；</p>
<p>(4) 单用户商城功能（计划）；<br />
&nbsp;</p>
<p><a style=\"color: red; font-size: 16px\" href=\"http://www.dedecms.com/download\">DedeCms2007 服务体系与价格>></a></p>
<p>DedeCms2007介绍</p>
<p>&nbsp;&nbsp;&nbsp; DedeCms由2004年到现在，已经经历了五个版本，从DedeCms V2 开始，DedeCms开发了自己的模板引擎，使用XML名字空间风格的模板，对美工制作的直观性提供了极大的便利，从V2.1开始，DedeCms人气急却上升，成为国内最流行的CMS软件，在DedeCms V3版本中，开始引入了模型的概念，从而摆脱里传统网站内容管理对模块太分散，管理不集中的缺点，但随着时间的发展，发现纯粹用模型化并不能满足用户的需求，从而DedeCms 2007（DedeCms V5）应声而出，Dedecms 2007具有如下特性：</p>
<p>一、核心模板采用XML名字空间风格，模板全部使用文件形式保存，对用户设计模板、网站升级转移均提供很大的便利，健壮的模板标签为站长DIY自己的网站提供了强有力的支持；</p>
<p>二、标签缓存机制，Dedecms 2007允许对类同的标签进行缓存，在生成HTML的时候，有利于提高系统反应速度，降低系统消耗的资源；</p>
<p>三、模型与模块的概念并存，在模型不能满足用户所有需求的情况下，DedeCms推出一些互动的模块对系统进行补充，尽量满足用户的需求；</p>
<p>四、众多的应用支持，为用户提供了各类网站建设的一体化解决方案，在本版本中，增加了分类、书库、黄页、圈子、问答等模块，补充一些用户的特殊要求；</p>
<p>五、面向未来的过渡，DedeCms 2007是织梦组建团队以后发布的第一个版本，在织梦团队未来的构想中，它以后将会具有更大的灵活性和稳定的性能。</p>
<p><br />
功能列表:</p>
<p>一、固定的功能</p>
<p>1、频道模型管理，支持用户自定义模型，设置模型是否可投稿的开关等；</p>
<p>2、栏目管理，支持无限级分类，允许对任何栏目设置不同的频道模型；</p>
<p>3、权限管理，可控制不同的管理员组不同的权限，并精确到二级栏目；</p>
<p>4、内置模型：默认内置健壮的文章、软件、图集、分类等模型；</p>
<p>5、辅助插件：提供站内新闻、投票、友情链接等个性化的小插件满足站长建站的需求；</p>
<p>6、采集模型：内置强大的采集功能；</p>
<p>7、专题：支持多节点的专题，为站长快速整理某一新闻提供了便利；</p>
<p>V5正式版功能更新说明</p>
<p>1、模型复制，你可以对系统内置的任意模型（专题除外）进行复制产生一个新的模型，在新模型你可以自由增加字段，以达到在原来模型的基础上的扩展；</p>
<p>2、分表存储，DedeCms V5允许你在定义或模型复制时指定不同的主表和附加表，从而实现彻底的分表存储；</p>
<p>3、自定义字段过程的简化，在自定义字段时即时可以指定该字段是否在列表中列出，是否在前台投稿和采集中使用，使自定义模型更加人性化；</p>
<p>4、系统固化模型允许自由增加字段，对于很多用户而言，不一定能理解自定义模型的概念，但新版中不仅仅支持新模型使用自定义，系统内置的文章模型等也可以按需要增加个性化的字段，并自动在发布表单中出现；</p>
<p>5、更优秀的Tag算法，新的Tag算法不再依整文档本身的关键字，而是通过完全的单独Tag表进行索引，实现真正意义的Tag功能和Tag快速索引；</p>
<p>6、优化递归查询算法，通过生成缓存，把前台常用的栏目递归索引改为不居于数据库查访的算法，以提高效率；</p>
<p>7、优化站内搜索程序，由于本版实行了完全的分表存储，因此对全站索引进行了分离的数据存储，并通过第一次搜索生成缓存，限制搜索时间间隔等提升搜索效率，除了支持全站搜索外，也支持对任意模型通过自定义搜索表单进行任意搜索，在保证高效性的同时也提高了搜索的灵活性；</p>
<p>8、模块的自由安装、卸载，系统对新增的模块如：书库、问答、圈子及未来可能新增的模块进行一键打包，一键安装处理，你可以随时按需安装或删除这些不需要的模块，模块以 .Dev(Dede标准的xml格式) 包形式存放在程序管理目录；</p>
<p>9、图集支持使用ZIP，在后台发表图集时，只需选择指定的ZIP包，系统会自动对其进行解压并生成一个图集，使上传图片的过程得到极为有效的简化。</p>
<p>10、一键更新功能，自动检测更新当天你发布的文档，并同时更新相关栏目；</p>
<p>11、更强大的采集，新版的采集程序允许你直接按模型生成，所以理论上能实现任何频道的采集；</p>','0');
INSERT INTO `yii_soft` VALUES('5','.rar','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','4','3.5 MB','','<p>DedeCms V5.1 免费版 SP1 pw整合版</p>
<p><font color=\"#ff0000\">(如果直接包括论坛的整合版本必须安装在网站根目录！)</font></p>
<!--p>本版发布包含直接捆绑phpwind6.3.2的安装包，发布地址：</p>
<p><a href=\"http://pw.dedecms.com\">http://pw.dedecms.com</a></p-->
<p>修正问题：<br />
<br />
1、修正上一版本已知的错误；<br />
<br />
2、更新模板标记缓存技术；<br />
<br />
3、对局部数据结构进行优化，提升HTML生成性能；<br />
<br />
4、安装时提供直接整合PW论坛的选项，让你整合的操作更加轻松；<br />
<br />
5、加强了部份代码的安全性。<br />
<br />
最近发现的一些具体问题的更新：<br />
<br />
1、 修正 tag.php 引用的网址可能不正确的问题<br />
<br />
2、 下载远程图片不全<br />
<br />
3、 mysql类的默认参数会让部份脑残体字符出错<br />
<br />
4、 上传全局配置检测不严格可能存在安全漏洞<br />
<br />
5、 数据备份和SQL命令行位置的修复表、优化表功能无效，因为表名用了 \'\' 引用，而不是 ``<br />
<br />
6、 全局统计程序的修正的问题<br />
<br />
7、 feedback.php 存在能使用HTML的问题<br />
<br />
8、 cn_substr截取函数在前台存在安全风险<br />
<br />
9、 首页模板不是最新修改过的幻灯<br />
<br />
10、更新专题和JS的地方UTF8里面会乱码 2个文件里面发送header头有问题<br />
<br />
11、前台提交友情链接无法正常返回上级菜单修改plus/flink.php 中的ShowMsg函数中的参数<br />
<br />
12、评论程序截取字符串的bug</p>
<p><strong><font color=\"#ff0000\">DedeCms免费版及PHPWind仅应用于非商业用途，如果你要应用于商业用途，请购买商业授权并使用商业版本。</font></strong></p>','0');
INSERT INTO `yii_soft` VALUES('6','.gz','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','3','2.6 MB','','<p><font size=\"3\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"color: rgb(255,0,0); font-weight: bold\">安装包最后更新时间：</span></font><span style=\"color: rgb(255,0,0); font-weight: bold\">2009-01-14 &nbsp; 主程序更新为：5.3.1 版本</span><br />
<font size=\"3\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DedeCMS V5.3是织梦组建团队后推出的又一力作，本次发布的新版本，延续了以往的简单、易用、高效，并且在这一版本中进一步加强了模块的概念，是站长建站首选利器，通过不同的模型组合，可组建出地方门户、行业门户、政府及企事业站点等各种应用。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本次发布的新版对内核进行了重大升级，规范了核心文件并重写了会员相关程序。同时，这次对模板引擎做了很大的调整，在保留原有模板特性的同时，这次新版本中更侧重了规范、易用、可扩展，使模板制作变得更方便。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在增强用户体验的同时，我们更侧重程序的功能健壮及易用，此次新版本中织梦加入了更多新功能，例如：模块安装及打包、文件指纹校验、WAP站点访问、商品及支付接口等，同时对模型、栏目及文档处理各个方面都做了升级。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历时4年不断发展，DedeCMS日益走向成熟，我们的产品，得到了数以万计站长的肯定，这次全新V5.3的发布，犹如雪中送炭，给百万站长在这寒冬带来一丝温暖。<br />
<br />
</font><font size=\"3\"><strong>程序发布专题页：</strong><br />
<a href=\"../../../v53/\" target=\"_blank\">http://www.dedecms.com/v53/</a><br />
<br />
<strong>服务器套件：</strong><br />
<a href=\"http://bbs.dedecms.com/86501.html\" target=\"_blank\">DedeAMPZ-PHP环境整合套件(下载)</a><br />
<br />
<strong>安装手册：</strong><br />
<a href=\"http://bbs.dedecms.com/107102.html\" target=\"_blank\">DedeCMS安装手册</a><br />
<br />
<strong>使用帮助：</strong><br />
<a href=\"http://help.dedecms.com/\" target=\"_blank\">DedeCMS V5.3教程中心</a><br />
<br />
<a href=\"http://service.dedecms.com/\" target=\"_blank\">织梦客户服务中心</a><br />
<br />
<strong>相关文档：</strong><br />
新版本、新内核、新功能 Dede V5.3抢先看<br />
<a href=\"http://bbs.dedecms.com/104187.html\" target=\"_blank\">http://bbs.dedecms.com/104187.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：模块-让您拥有更加健壮的系统<br />
<a href=\"http://bbs.dedecms.com/107109.html\" target=\"_blank\">http://bbs.dedecms.com/107109.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：自定义模型-让网站变得更丰富<br />
<a href=\"http://bbs.dedecms.com/107140.html\" target=\"_blank\">http://bbs.dedecms.com/107140.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：织梦模板-原来做模板如此灵活简单<br />
<a href=\"http://bbs.dedecms.com/107325.html\" target=\"_blank\">http://bbs.dedecms.com/107325.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：会员中心-网站和会员都动起来<br />
<a href=\"http://bbs.dedecms.com/107285.html\" target=\"_blank\">http://bbs.dedecms.com/107285.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：自由列表-让你想怎么调用就怎么调用<br />
<a href=\"http://bbs.dedecms.com/107346.html\" target=\"_blank\">http://bbs.dedecms.com/107346.html</a><br />
<br />
DedeCMS V5.3正式版功能盘点之：文件指纹校验-升级无忧<br />
<a href=\"http://bbs.dedecms.com/107408.html\" target=\"_blank\">http://bbs.dedecms.com/107408.html</a><br />
<br />
DedeCms V5.3 主要新增及升级功能列表<br />
<a href=\"http://bbs.dedecms.com/103512.html\" target=\"_blank\">http://bbs.dedecms.com/103512.html</a><br />
<br />
[v53使用]DedeCMS补丁后台自动更新，清晰一目了然<br />
<a href=\"http://bbs.dedecms.com/106994.html\" target=\"_blank\">http://bbs.dedecms.com/106994.html</a> <br />
<br />
[v53使用]栏目当单页面使用，企业站元素贴心服务<br />
<a href=\"http://bbs.dedecms.com/107045.html\" target=\"_blank\">http://bbs.dedecms.com/107045.html</a> <br />
<br />
</font></p>
<p><font size=\"3\"><strong><font color=\"#0000ff\">DEDECMS v5.3&nbsp;与 HDWIKI V4.0.4 官方整合专版</font></strong><br />
</font><font size=\"3\"><a href=\"http://www.dedecms.com/hdwiki/\">http://www.dedecms.com/hdwiki/</a></font></p>
<p><br />
<br />
<br />
<strong>产品特性：</strong><br />
<strong>良好的用户口碑，丰富的开源经验</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS是国内知名内容管理系统，经过长达4年之久的广泛应用和复杂化环境的检测，织梦系统在安全性、稳定性、易用性方面具有较高的声誉，倍受广大站长推崇。 <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS 采用PHP+MySQL技术开发，程序源代码完全开放，在尊重版权的前提下能极大的满足站长对于网站程序进行二次开发。DedeCMS是国内第一家开源的 内容管理系统，自诞生以来，始终坚持开源、免费原则。众所周知，开源程序在代码规范性、程序安全性有着较高的要求，DedeCMS拥有4年的开源经验，其 灵活的产品架构、极强的可扩展性和可伸缩性能最大化满足站长目前及今后的应用需求。 <br />
<br />
<strong>灵活的模块组合，让网站更丰富</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;往 往一个网站通过单一的内容发布系统是远远不能满足用户的需求的，尤其在Web2.0提倡互动、分享的大趋势下，用户非常希望在传统的内容信息网站中加入 问答、圈子等一些互动型的功能。但如果基于原来系统进行开发，整个系统易用性会受到影响，如果使用别的系统，整个网站就不能一体化管理，在这种问题 下，DedeCMS推出了模块的功能，程序用户可以像在Winodws里面安装软件一样，下载相应的模块进行安装，网站就会增加这些特殊的功能。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这样一来，更加方便软件用户对自己的网站进行扩展，达到自己满意的效果。<br />
<br />
<br />
<strong>简单易用的模板引擎，网站界面想换就换</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS的模板引擎简单、易用，采用了XML标记风格，只要懂HTML就可以修改制作模板。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;很 多的用户都为每次网站改版费尽苦心，因为按照老式的网站制作流程，改版需要修改的不单单是一个界面，还要涉及到程序修改。最后成了一次改版，几乎等于网站 重构。DedeCMS就解决了这一烦恼，只需要熟悉一些DedeCMS的模板标记，只要懂HTML，就能随意对模板文件进行修改，而且每次升级只 需要更新模板文件即可，做到了程序和页面很大程度上的分离。 <br />
<br />
<strong>便捷自定义模型</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS为用户提供了方便快捷的用户自定义模型，您可以使用这个功能根据自身需求来创建各式各样的站点，如果您了解部分二次开发知识，即能想到就能做到。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;往 往很多站点，希望能够创建如在线视频播放、在线音乐试听，或者是商品信息发布等类型的内容站点，尽管这些模型系统中没有，但您现在可以使用 DedeCMS来自主创建，您只需要先想好自己内容的字段，如：专辑名称、演唱、发行日期等，然后思考这些字段是用哪种字段类型，如：文本、时间、文件上 传，接下来只需要在后台的模型管理中按照说明添加即可，想到就能做到。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这种模型的功能有一个很大的好处就是您可以自己去扩展网站后续的功能，不要再去花费财力物力去开发，免去了很多烦恼。 <br />
<br />
<strong>高效的动态静态页面部署</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS为用户提供了强大的动态静态部署的功能，用户可以在后台栏目中进行统一的设置，也可以对单独某一篇内容进行静态部署。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这种静态部署最大的优势在于：1.减少数据库负担、降低人力维护成本；2.利于搜索引擎对网站的友好程度，提高搜索引擎对网站收录量；3.很大程度上提高了用户访问的效率。<br />
&nbsp;&nbsp;&nbsp;&nbsp;这样一来，一些地区门户、行业网站、甚至政府部门信息类网站都免去了因为大量数据访问速率下降的后顾之忧。 <br />
<br />
<strong>灵活的商业运营模式</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS中提供了较为完善的会员产品体系、会员等级体系、虚拟货币管理体系，并且提供了较完整的支付接口方式，可以设置会员浏览不同内容进行金币消费，这样对行业门户、企事业单位制定开展各种基于网站平台的商业运营方案。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会员可以通过购买点卡进行充值，同时也可以购买包月、包年的服务来阅读某一部分的内容，如果某些内容只能给特定会员浏览，会员必须达到某个等级才能够扣点阅读，网站可以通过销售点券、会员等级服务进行盈利。 <br />
<br />
<strong>流畅专业界面设计，良好的用户体验</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS 的界面设计遵循国际最新W3C网页设计标准，在开发时期，我们经过IE6、IE7、火狐、Opera等主流浏览器上进行测试，都能够保证您 网站浏览的流畅、完整，DedeCMS页面设计遵循标准情况下尽量的减少了各个浏览器中存在的差异，系统不会因为不同的浏览器受到限制。我们优秀的页面设 计师能够让网站提高用户体验，及网站亲和力。<br />
<br />
<strong>指纹验证，升级无忧</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在全新的织梦系统中，新增加了文件指 纹校验功能，通过他你可以对比系统原始文件，以确保当前文件是否被修改，同时也可以同官方的原始指纹进行对比，来获取差异文件，这样更方便用户升级自己的 系统。同时，配合我们的病毒扫描程序，让您的网站的安全性得到进一步提升。当然，官方贴心的系统消息，不仅让您了解到当前版本系统最后更新日期，以便确认 是否有更新补丁，并且能及时了解DedeCMS最新信息，让您用的更加放心。<br />
<br />
<strong>低维护成本</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开发一个网站大家都知道需要动用大量的人力物力，不单单开发时需要耗费，后期维护升级也需要。因为必要的硬件投入必不可少，这时候只有有效控制开发、维护成本，才能够让用户的总成本降低。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这 样一来DedeCMS引入了独创模板引擎技术、自定义标签功能，实现网站程序和界面分离的平台搭建效果，改变了传统的“功能开发→页面设计→整合”制作 方式，达到降低人力成本的目的，当然我们内置的可视化编辑器可以让您的信息录入如同操作word软件一样方便快捷，上手也非常容易。<br />
&nbsp;&nbsp;&nbsp; DedeCMS这种网站建设流程，让软件用户在不改变网站高效、轻便等特性的情况下还减少了总成本。<br />
<br />
<strong>国际语言支持</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS从V5.3开始，以UTF-8国际编码为基准进行开发，让您的网站可以扩展任意一种语言。 <br />
<br />
<strong>会员互动，让您的网站火起来</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一个网站最重要的就是用户，DedeCMS提供了强大的用户中心，通过会员中心可以让用户进行内容分享、交友、短信、个人空间等一系列的操作，甚至通过模块扩展还可以让会员进行群组交流、问答等互动。<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站需要有粘性，才可以留住用户，通过一个强大的会员中心可以留住您的网站用户，也可以寻找到盈利模式。<br />
<br />
<br />
<br />
<strong>产品适合应用于以下领域：</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;企业网站：无论大型还是中小型企业，利用网络传递信息在一定程度上提高了办事的效率，提高企业的竞争力；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;政府机关：通过建立政府门户，有利于各种信息和资源的整合，为政府和社会公众之间加强联系和沟通，从而使政府可以更快、更便捷、更有效开展工作；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;教育机构：通过网络信息的引入，使得教育机构之间及教育机构内部和教育者之间进行信息传递，全面提升教育类网站的层面；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;媒体机构：互联网这种新媒体已经强而有力的冲击了传统媒体，在这个演变过程中，各类媒体机构应对自己核心有一个重新认识和重新发展的过程，建立一个数字技术平台以适应数字化时代的需求；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;行业网站：针对不同行业，强化内部的信息划分，体现行业的特色，网站含有行业的动态信息、产品、市场、技术、人才等信息，树立行业信息权威形象，为行业内产品供应链管理，提供实际的商业机会；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;个人站长：兴趣为主导，建立各种题材新颖，内容丰富的网站，通过共同兴趣的信息交流，可以让您形成自己具有特色的用户圈，产生个人需求，并为其服务；<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收费网站：内容收费类型的网站，用户可以在线提供产品销售，或者内容收费，简单清晰的盈利模式，确保您以最小的投资，取得最大的回报；<br />
<br />
<br />
<strong>新增及升级功能列表：</strong><br />
&nbsp;&nbsp;&nbsp; 1.&nbsp;&nbsp;增加批量创建栏目功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;栏目管理处增加“内容”项目，代替原来在栏目管理中使用单独页<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;&nbsp;增加内容模型导出、导入功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp;&nbsp;内容模型增加“联动类型字段”的支持<br />
&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp;&nbsp;取消内容模型原来的自定义主表功能，增加单表内容模型<br />
&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp;&nbsp;增加内容回收站功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp;&nbsp;增加“商品”模型，并提供相关支付接口<br />
&nbsp;&nbsp;&nbsp;&nbsp;8.&nbsp;&nbsp;增加自定义表单功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;9.&nbsp;&nbsp;升级“模块管理”功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;10. 升级评论系统<br />
&nbsp;&nbsp;&nbsp;&nbsp;11. 升级采集系统，主要亮点：<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a、向导式创建规则<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b、支持同一规则中指定多个不同的导出栏目<br />
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c、支持监控采集模式，简单重复采集历史内容是否有更新的过程<br />
&nbsp;&nbsp;&nbsp;&nbsp;12. 升级会员中心，在保证安全性的同时使里面的各项操作更简单易用<br />
&nbsp;&nbsp;&nbsp;&nbsp;13. 开放默认的文章系统 WAP 浏览模式<br />
&nbsp;&nbsp;&nbsp;&nbsp;14. 升级模板管理功能，除了可以方便的在线创建勾子碎片标签外，对主要的模板都进行了注解说明<br />
&nbsp;&nbsp;&nbsp;&nbsp;15. 升级了广告管理、友情链接等插件<br />
&nbsp;&nbsp;&nbsp;&nbsp;16. 增加在线切缩略图功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;17. 增加了“挑错管理”功能，允许用户对错误信息进行反馈<br />
&nbsp;&nbsp;&nbsp;&nbsp;18. 优化列表统计引擎和缓存引擎，使系统在保证灵活性的同时也有更好的性能<br />
&nbsp;&nbsp;&nbsp;&nbsp;19. 增加初始文件效验功能<br />
&nbsp;&nbsp;&nbsp;&nbsp;20. 增加在线直接升级功能，更方便用户获得自己需要的升级包<br />
&nbsp;&nbsp;&nbsp;&nbsp;21. 支持栏目列表使用伪静态<br />
&nbsp;&nbsp;&nbsp;&nbsp;22. 支持游客投稿、模型投稿增加各种个性化设置<br />
<br />
<strong>升级说明：</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;由于5.3版的改动涉及内核升级，因此有部份功能或模板不一定完全兼容，但我们仍建议用户尽量升级到这个版本，以确保系统的安全和可发展性。<br />
&nbsp;&nbsp;&nbsp;&nbsp;DedeCMS 支持整合主流的BBS、商城、博客等系统，具体相关接口请到官方论坛查询。<br />
&nbsp;</p>','0');
INSERT INTO `yii_soft` VALUES('7','.gz','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','5','4.2 MB','','<p><strong>DedeCMS V5.5增强或修正功能列表<br />
<br />
</strong>一、已经修正的BUG：<br />
1、添加后台系统管理员账号，无法删除会员列表的账号；<br />
2、这篇文档需要注册会员才能访问，你目前是：注册会员(提示文字不正确)；<br />
3、高级搜索选择发布时间，搜索出错；<br />
4、会员中心发布完内容后点击“继续发布文章”，HTML文本框没有了（表单的action不对）；<br />
5、后台发布文章，如果勾选“跳转”，输入网址后，如果再编辑这个内容，发现没有读取以前保存的；<br />
6、选择裁剪图片的提示和步骤没说明清楚，导致操作混乱；<br />
7、修正文档批量移动将内容移动至回收站可能丢失文档的Bug；<br />
8、自定义表单上传附件无效；<br />
9、如果头衔超过10个的话，好像id为1的头衔和id为10的就重复了！；<br />
10、include/taglib/ask.lib.php文件的第22行 if($tid>0) $tid = \" (tid=$tid Or $tid2=\'$tid\')的有误；<br />
11、会员注册是邮箱有下划线的话总是通不过验证；<br />
12、系统后台禁用某些模型的投稿功能，前台会员中心还是可以显示投稿相关的选项；（在升级会员中心时处理）<br />
13、DEDE 搜索功能不准确（词库没有的词或被拆开的中文字不会做搜索导致的）;<br />
14、投票系统的VOTE.PHP程序中没有对投票时未选择选项做程序处理！<br />
15、未审核的文章出现的会员空间，导致非法信息的出现。(此功能并非BUG，原本功能就如此设计，不过会考虑增加一个参数由管理员决定是否允许)<br />
16、默认水印背景黑色让透明的gif很难看！<br />
17、新建专题，简略标题填写后，编辑专题时又是空的；<br />
18、注册会员，没有同意协议，也可以注册；<br />
<br />
二、升级功能<br />
<br />
(一)、人性化功能：<br />
1、 允许许用户选择栏目链接为不带默认页的类型，即是 typedir/ 模式；<br />
2、 使文章分页时支持标题带页码符，并且每页摘要不同；<br />
3、 升级搜索程序，如果关键字中含有栏目名称，则搜索这个栏目的内容，如果有多关键字组合时，允许搜索单个字符；<br />
<br />
(二)、会员相关：<br />
1、升级会员系统，修正用户禁言、审核等存在的问题；<br />
2、升级会员系统，对后台设置了关闭图集选项之后不再显示图集菜单；<br />
3、允许会员空间中“所有文档”可以由用户设定具体频道；<br />
4、会员自定义分类支持按模型划分；<br />
5、会员头像、企业形象照增加删除功能；<br />
6、对会员中心的细节进行适当调整；<br />
7、修正会员中心消费信息管理混乱问题；<br />
8、增加积分兑换金币功能；<br />
9、更改后台会员管理功能，使其更人性化；<br />
10、修正会员等级设置（5.3的概念过于混乱，恢复为5.1模式）；<br />
11、允许自由设置用户笔名是否可以同名；<br />
<br />
(三)、后台操作：<br />
1、 升级管理员权限系统，允许指定管理员管理多个栏目；<br />
2、修正删除与移动栏目没更新缓存的错误；<br />
3、修正删除或更新关键字后没返回原页面的错误；<br />
4、优化用户搜索关键字管理功能；<br />
5、发布文章时可以在预设的模板中随机获得一个模板（5.1的随机模板功能增强版）；<br />
6、增加可选的实时生成html功能；<br />
7、文档自定义属性允许自定义排序；<br />
8、优化文章模块图片附件上传功能；<br />
9、增加网站编辑绩效统计功能（管理员发布员发了多少文章，今天发了多少文章，昨天发了多少文章，一个月发了多少文章）；<br />
10、增加全站评论开关选项；<br />
11、发布文章时可以或上传图片时允许单独选择图片是否使用水印；<br />
12、优化来源、作者、颜色选择框及相关管理；<br />
13、专题升级为可以不与栏目关连；<br />
14、管理员审核后保留责任编辑；<br />
15、修正专题节点问题；<br />
16、增加用AJAX载入的栏目辅助选择器，解决栏目过多时，用下拉框操作不便的问题；<br />
17、增加快速属性编辑功能，用AJAX载入窗体编辑文章的基本信息；<br />
18、增加批量删除、增加某属性的功能（AJAX窗体）；<br />
19、增加栏目合并功能；<br />
□20、升级关键字管理功能，保留并升级关键字提取功能，使用新的站内关键字链接管理功能；<br />
<br />
(四)、模块插件<br />
1、升级留言本系统，增加支持回复、支持限定仅允许会员发表等选项；<br />
2、可以指定自由列表最大显示页数，以防止显示网站所有内容；<br />
3、wap功能完善与加强；<br />
<br />
(五)、其它功能<br />
1、重新设置主要数据表的索引，使之针对大多数网站都处于最佳性能。<br />
2、增加计划任务功能（每个任务单独对应该一个程序，可以通过客户端软件或用户浏览动态页面时触发）；<br />
3、field支持用array获取任意字段的值；(支持标记：文章列表模板的 {dede:field name=\'array\' /}、arclist、arclistsg、loop、sql 标签)<br />
4、编辑器升级至 FCK2.6(支持：谷歌浏览器)；<br />
5、在数据库类直接控制MySQL超时时间；<br />
6、发布文章时可以或上传图片时允许单独选择图片是否使用水印；7、给分页的文章设置不同的标题和摘要（标题加1、2等数字）；<br />
7、允许使用直接跳转网址（需修改数据结构，为了升级时更稳定，改为不显示任何内容直接跳转形式，但并不是直接使用这个网址）；<br />
8、更改前台默认模板为淡蓝风格；<br />
9、js广告静态化（可以用缓存方式替代）；<br />
12、增加前台导航菜单默认调用二级子类的功能；<br />
<br />
7月20日后更改或增强的功能<br />
<br />
1、图集、软件模型人性化调整；<br />
&nbsp;&nbsp;(1) 图集整合swfupload上传；<br />
&nbsp;&nbsp;(2) 图集、文档相关附件关连更完善，删除文档同时删除附件功能更完善；<br />
&nbsp;&nbsp;(3) 软件频道调整软件权限问题，默认不使用通用模型的权限，而是使用单独权限，因此，不管是否需要权限的软件，都会生成静态，而在下载时扣金币或要求会员等级；<br />
&nbsp;&nbsp;(4) 软件镜像地址，除了保留原功能外，增加了仅把镜像作为可选地址前缀功能，方便有些要的用户自由填写软件地址信息；<br />
2、文档允许选择多个副栏目；<br />
3、增加AJAX评论功能；<br />
4、增加邮件验证注册功能；(需要设置中把“会员设置--会员使用权限开通状态”选项改为 -10)；<br />
5、增加栏目树调用标签(在前台调用所有栏目)；<br />
6、升级缩略图上传和裁剪功能，使之更人性化；<br />
7、升级个人空间（更换模板、细节调整）；<br />
8、调整后台主页和登录界面；<br />
9、修正的BUG：<br />
&nbsp;&nbsp;(1) 修正会员中心阅读消息，好友列表显示错误；<br />
&nbsp;&nbsp;(2) 修正导航菜单在下载频道存在错误；<br />
&nbsp;&nbsp;(3) 修正责任编辑调用不显示问题；<br />
&nbsp;&nbsp;(4) 修正自由列表的死链接；<br />
&nbsp;&nbsp;(5) 修正前台投稿存在的一些问题；<br />
&nbsp;&nbsp;(6) 修正文章推荐不能使用数字域名邮箱问题；<br />
&nbsp;&nbsp;(7) 处理TAG标签默认不按时间排序问题；<br />
&nbsp;&nbsp;(8) 去除FCK编辑器上传图片产生的多余代码，让用户自己选择是否加相应的东西。</p>','0');
INSERT INTO `yii_soft` VALUES('8','.exe','简体中文','国产软件','Win2003,WinXP,Win2000,Win9X','5','3 MB','','<p><span style=\"text-align: left; widows: 2; text-transform: none; text-indent: 0px; border-collapse: separate; font: 14px Arial; white-space: normal; orphans: 2; letter-spacing: normal; color: rgb(0,0,0); word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0\" class=\"Apple-style-span\">DedeAMPZ 是直接整合PHP + Apache + MySql 的服务器环境管理软件，操作十分傻瓜化，适合初中级水平的站长使用。<br />
<br />
主要具有如下特点：<br />
1、支持php4、php5、MySql4、MySql5、Apache2.2、Zend Optimizer-3.3.0；(完整版)<br />
2、安装使用十分简单，并支持在php4与php5中切换；<br />
3、经过专业的处理后，使你配置apache+php的站点更简单；<br />
4、本软件内置DedeCms在线安装程序，让你安装调试DedeCms更加简单；<br />
<br />
管理客户端界面：<br />
<br />
<img style=\"border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px; border-left-width: 0px\" onclick=\"if(this.width>=700) window.open(\'http://bbs.dedecms.com/attachment/2_1_52cd0181fdd479c.gif\');\" border=\"0\" alt=\"\" src=\"http://bbs.dedecms.com/attachment/2_1_52cd0181fdd479c.gif\" onload=\"if(this.width>\'700\')this.width=\'700\';\" /><span class=\"Apple-converted-space\">&nbsp;</span><br />
<br />
下载地址：<br />
完整专业版：（你有一定基础或在本地调试用，请使用这个版本）<br />
<a style=\"color: rgb(47,95,161); text-decoration: none\" href=\"http://www.dedecms.com/upimg/soft/dedesoft/DedeAMPZForDebug.zip\" target=\"_blank\">http://www.dedecms.com/upimg/soft/dedesoft/DedeAMPZForDebug.zip</a><br />
<br />
服务器上安装版（如果你在服务器是正式使用，请用这个版本[仅支持MySql5\\PHP5\\Apache2.2]）：<br />
<a style=\"color: rgb(47,95,161); text-decoration: none\" href=\"http://www.dedecms.com/upimg/soft/dedesoft/DedeAMPZForServer.zip\" target=\"_blank\">http://www.dedecms.com/upimg/soft/dedesoft/DedeAMPZForServer.zip</a></span></p>','0');

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
  `file_name` char(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varbinary(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `file_ext` char(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `access` varchar(255) NOT NULL DEFAULT '' COMMENT '权限控制',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='附件';

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
INSERT INTO `yii_upload` VALUES('39','1','3.png','uploads/images/201405/18fc17a1283.png','','png','application/octet-stream','1158','0','','1400141355');
INSERT INTO `yii_upload` VALUES('40','1','5.png','uploads/images/201405/d5972d17ce2.png','','png','application/octet-stream','1724','0','','1400141462');
INSERT INTO `yii_upload` VALUES('41','1','4.png','uploads/images/201405/157922e4cf3.png','','png','application/octet-stream','624','0','','1400141603');
INSERT INTO `yii_upload` VALUES('42','1','gall.jpg','uploads/images/201405/cf5655f0b6a.jpg','','jpg','application/octet-stream','15879','0','','1400142372');
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
  `addtime` int(11) DEFAULT NULL COMMENT '注册时间',
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

