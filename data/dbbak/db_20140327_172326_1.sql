# your database backup
# version:5.5.27-log
# time:2014-03-27 17:23:26
# --------------------------------------------------------


DROP TABLE IF EXISTS `yii_ad`;
CREATE TABLE `yii_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
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

INSERT INTO `yii_ad` VALUES('2','首页banner','index_banner','','','400','500','','0','uploads/201309/523a2c4baba12.jpg','9','Y','1379544139');
INSERT INTO `yii_ad` VALUES('3','首页banner','index_banner','','','','','','0','uploads/201309/523a2ca7b51ce.jpg','10','Y','1379544231');

DROP TABLE IF EXISTS `yii_catalog`;
CREATE TABLE `yii_catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `page_size` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '每页显示数量',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `menu_is` enum('Y','N') DEFAULT 'N' COMMENT '是否导航显示',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `display_type` enum('page','list') NOT NULL DEFAULT 'list' COMMENT '显示方式',
  `template_list` varchar(100) NOT NULL DEFAULT '' COMMENT '列表模板',
  `template_show` varchar(100) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `acl_browser` varchar(255) NOT NULL DEFAULT '' COMMENT '浏览权限',
  `acl_operate` varchar(255) NOT NULL DEFAULT '' COMMENT '操作权限',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='全局分类';

INSERT INTO `yii_catalog` VALUES('1','0','新闻','新闻2','news','新闻<br />','d','d','d','uploads/images/201403/8a4b5e11db6.png','uploads/thumbs/201403/small_8a4b5e11db6.png','0','0','0','Y','N','','list','list_post','show_post','','','1379545020','1394509418');
INSERT INTO `yii_catalog` VALUES('2','1','公司动态','公司动态','company-news','公司动态栏目介绍','','','','uploads/images/201402/98f97227c00.png','','2','0','0','Y','N','','list','list_text','show_post','','','1379545199','1394509418');
INSERT INTO `yii_catalog` VALUES('3','1','行业新闻','行业新闻','industry-news','行业新闻栏目介绍','','','','uploads/images/201403/b49f2b45b50.jpg','uploads/thumbs/201403/small_b49f2b45b50.jpg','1','0','0','Y','N','','list','list_text','show_post','','','1379545248','1394509418');
INSERT INTO `yii_catalog` VALUES('4','0','产品','产品','goods','产品栏目介绍','','','','','','0','0','0','Y','N','','list','list_goods','show_goods','','','1379545330','1394517482');
INSERT INTO `yii_catalog` VALUES('5','4','新品上市','新品上市','new-arrival','新品上市栏目介绍','','','','','','1','0','0','Y','N','','list','list_goods','show_goods','','','1379545388','1394517482');
INSERT INTO `yii_catalog` VALUES('6','4','特价商品','特价商品','sales-goods','特价商品栏目介绍','','','','','','0','0','0','Y','N','','list','list_goods','show_goods','','','1379545435','1394517482');

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
INSERT INTO `yii_link` VALUES('18','爱编码动力社区','http://bbs.icode100.com','uploads/images/201403/571ec248856.png','255','Y');

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
INSERT INTO `yii_page` VALUES('4','管理团队1','','team','','','团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。','<div>
	<div>
		团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不符合多元化的现实状况的。
	</div>
	<div>
		一个优秀的企业管理者，应该怎样管理员工?道理也很简单，那就是要给员工创造一个充分利用自己的个性将工作干得最好的条件。不一定什么都要团队化，太死板了。虽然现在的企业也都提倡创新，但如果管理者过分强调团队精神，则员工的创新精神必然受到压抑。压抑个性就是压抑创新，没有个性哪来的创新?说得极端一点，企业管理者要谨防团队建设法西斯化。团队是需要的，企业管理者在团队建设的同时要遵循一个原则，不能压抑员工的个性。在团队内部，企业管理者要给员工充分的自由，少说几句少数服从多数，要知道，聪明的人在世界上还就占少数。
	</div>
	<div>
		企业管理者应该解放思想，要有多元化的思维。不同的企业，团队的性质也不一样。要量体裁衣建设符合企业内在要求的团队，要灵活变化，别搞一刀切。如果该企业是劳动密集型企业，那你可以建设一支高度纪律性组织性的团队。如果该企业是知识密集型企业，那就要以自由主义来管理员工了，建立一支人尽其才的团队是最重要的，严格说算不上是团队，也没必要强调团队，更注重的应该是员工的个人创造力，千万别让团队束缚住员工的头脑，当然应该有的纪律和合作也是不可少的。如果企业既有创造型员工也有操作型员工，那可将团队建设重点放到操作型员工身上。需要注意的一点是，越聪明的人越倾向个人主义，这个情况，企业管理者要注意有的放矢。
	</div>
</div>
<div>
</div>','','','','','','','0','0','Y','1379392484');

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
  `template` varchar(60) NOT NULL DEFAULT '' COMMENT '模板',
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
  `acl` varchar(100) NOT NULL DEFAULT 'Y' COMMENT '权限检测',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '新闻状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='内容管理';

INSERT INTO `yii_post` VALUES('1','1','','','价值1960元JJ林俊杰「时线Time Line」世界巡回演唱会北京站VIP门票2张，百度团购免费送啦！9月28日首都体育馆','','','','','','','5','0','','','','','','【中奖号码计算方法】：开奖日前一天的“全国福利彩票新3D开奖号码”+“全国体育彩票排列5开奖号码”+“百度收盘股价小数点后两位” = 10位数（即3组数字合并，10位均按顺序排列，此10位数若首位为0则去掉）。<br />
★ 以此10位数整除以活动截止日（xxx年x月xx日 23:59:59）的所有抽奖人数（每个抽奖号即为一个抽奖人数），得到的余数+1即为本次活动的获奖号码<br />
① 若获奖号码不足7位，则再加上本次所有抽奖人数，直至加到不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />
② 获奖号码满足7位，但中奖号码为空，则再减去本次抽奖人数之和，直至减不为空的抽奖号码为止，此号码为本次活动的中奖号码。<br />
③ 如彩票开奖方开奖时间滞后,或股票交易所休市则本活动开奖日也将进行相应的顺延；<br />
④如果当天需要开多个奖，则用此号码分别+011 +021 +031……得出当天其他获奖号码。如果开奖最后一天抽奖号码加值后超过了总参加人数，则将抽奖号码减去总参加人数得到新的抽奖号码。<br />
<p>
	若您的“抽奖号”与最终获奖号码完全一致，就可以获得本次活动的大奖啦！
</p>
<p>
	<img src=\"/cms/uploads/201309/523a32fdf1f07.jpg\" alt=\"\" /> 
</p>
★ 例如：<br />
如2013年7月10日<br />
新3D号码：4,8,7<br />
排列5号码：8，2，9，0，5<br />
百度股票收盘价：93.43 小数点后2位：4,3<br />
将这3组数依序合并后得到4878290543<br />
如果截止至7月15日23:59:59活动结束时的抽奖人数为28999<br />
以4878290543整除以28999，商为168222，余数：20765&nbsp;<br />
得到余数加1， 20765+1=20766。<br />
不足7位数，则20766+28999+……+28999=1006732<br />
：【兑奖流程】：1、我们的客服人员会与中奖者电话联系，并核实百度账号和手机号码等，确认获奖信息和使用规则。<br />
2、中奖用户在体验特权前1天内，请电话联系团团。（4000-998-998）<br />
3、若因信息错误或无效等造成的开奖后15个工作日内无法联系到中奖者，视为中奖者自动放弃该奖品，中奖号码+1顺延下一位。','','','','','11','Y','Y','uploads/201309/523a32e18f2c4.jpg','uploads/201309/thumb_523a32e18f2c4.jpg','0','0','N','1379545939','0','Y','0','','Y','1379545825');
INSERT INTO `yii_post` VALUES('14','1','','','App Annie获1500万美元投资 将持续扩展国际业务','','','','','','','2','1','','','','','','<p>
	（朱旭冬）9月18日晚间消息，移动智能市场数据平台App Annie 今日宣布完成一轮总金额为1500万美元的融资，由红杉资本的美国基金领投，现有投资者IDG资本、Greycroft 、e.Ventures 和 Infinity Venture 参与跟投。
</p>
<p>
	红杉资本硅谷办事处合伙人 Tim Lee 与 uSamp 首席执行官 Alan Gould 将加入App Annie董事会。
</p>
<p>
	App Annie 表示，此轮融得的资金将用于加速 App Annie 的产品开发、增长其销售额并壮大其设在旧金山的营销总部，并扩大其遍布亚洲和欧洲的办事处。
</p>
<p>
	随着今年全球智能手机出货量将超过1 亿部的预期，应用软件和数字内容经济大幅增长。App Annie 在过去12个月内用户数扩大两倍，每月营收增长三倍。App Annie 首席执行官Bertrand Schmitt 表示，增长的用户群证明公司重塑企业分析和提取适合商业用途的有用洞察信息的方式是成功的。
</p>
<p>
	红杉资本硅谷办事处合伙人 Tim Lee 认为， App Annie 在新数字经济分析领域处于极为有利的地位。“App Annie 的产品对从事移动通信行业的每位从业者来说都是必备的。在红杉资本，我们多年来一直使用他们的产品帮助我们找到有突破力的创业公司。 App Annie 在新数字经济分析领域处于极为有利的地位，并将成为黄金标准。”他说。
</p>
<p>
	Bertrand Schmitt 则表示， “对我们来说，红杉资本不仅仅是投资者，同时也是合作伙伴和顾问，它将帮助我们加速我们扩大平台的计划，这样所有企业都可了解全球应用软件和数字内容生态系统。”
</p>
<p>
	App Annie 的商业智能平台由 Analytics、Store Stats 和 Intelligence 组成。现今，收益排名前 100 位的 iOS 应用发行商中超过 90% 在使用App Annie 的产品，这其中包含 Google、微软和腾讯。
</p>','','','','App,Annie,美元投资,国际业务','1','N','Y','uploads/201309/523a549bd42fe.jpg','uploads/201309/thumb_523a549bd42fe.jpg','0','0','N','0','0','Y','0','','Y','1379554460');
INSERT INTO `yii_post` VALUES('15','1','','','Groupon收购本地体验初创公司SideTour','','','a:1:{s:5:\"color\";s:0:\"\";}','','','','2','1','','','','','','<p>
	据国外媒体报道，团购巨人Groupon今日宣布，公司已经收购了本地体验初创公司SideTour。后者是一个帮助人们发现、预订和参加本地活动的市场平台，Groupon没有透露这项收购交易的具体条款。
</p>
<p>
	SideTour精选了一些独具特色且有人主持的聚会类活动，让客户们能够与相应领域的资深专家面对面地交流，从而更加了解自己所在的城市和他们关心的事。
</p>
<p>
	GrouponLive业务总经理格雷格鲁丁（Greg Rudin）称：“SideTour精心策划的各种本地体验将进一步拓展Groupon的愿景，也就是将Groupon打造成消费者可以随时随地访问的平台。如果Groupon能够提供这些极具个性化的活动、旅游和值得铭记的聚会，我们就能够为我们的客户提供更多有趣的方法，帮助他们探索和发现最好的本地体验。”
</p>
<p>
	那些活动大多为私人聚会，人数平均在12人左右，涵盖的行业包括视频、饮料、建筑、历史、艺术等等。SideTour目前提供的公开和私人聚会多达500多种，使用这个平台的聚会主持超过了400人。那些主持者包括厨师、艺术家、奥运金牌获得者、星探和品酒师等等。
</p>
<p>
	SideTour的首席执行官韦平戈亚尔（Vipin Goyal）称：“我们很高兴有机会把我们独创的聚会服务提供给这么多热衷于本地体验的人。Groupon可以帮助我们发现更多的本地专家并为他们提供一个与更多客户沟通的平台。”
</p>
<p>
	SideTour将继续独立经营一段时间，Groupon将通过其电子邮件、网页和移动渠道向它的4300万活跃用户推广SideTour的聚会服务。
</p>
<p>
	SideTour创立于2011年，目前在芝加哥、纽约、费城和华盛顿特区设有办事机构。它计划在未来几个月里开辟更多的市场。
</p>','','','','','1','N','Y','uploads/201309/523a54c220262.jpg','uploads/201309/thumb_523a54c220262.jpg','0','0','N','0','0','Y','0','','Y','1379554498');
INSERT INTO `yii_post` VALUES('16','1','','','美国下令FCC修改规定 禁止运营商锁定所售手机','','','a:1:{s:5:\"color\";s:0:\"\";}','','','','2','1','','','','','','<p>
	在手机解锁上，美国消费者和运营商展开持久战，美国政府和白宫逐渐站在消费者一边。
</p>
<p>
	近日美国电信和信息管理局（NTIA）正式向联邦通信委员会（FCC）发函，要求修改规定，未来移动运营商销售给用户的手机、平板等，均不能锁定于网络。
</p>
<p>
	所谓“锁定”，指的是运营商通过技术手段，限制某一部手机和平板，只能使用自家的移动网络进行通信。
</p>
<p>
	上述机构对FCC表示，消费者应该获得更多自由，选择不同的移动通信服务商，自由使用自己合法购买的移动设备，对相关规定进行修改之后，可以增强移动通信市场的竞争，增加消费者满意度。
</p>
<p>
	目前还不清楚FCC是否会痛快答应修改规定的要求。众所周知的是，美国电信行业，也雇请了游说团体，捍卫对手机锁定的做法。
</p>
<p>
	据报道，1990年代以前，美国电信运营商销售的手机，均未锁定于自家网络。此后，为了降低用户流失率，运营商开始锁定手机。不过，对于熟悉IT知识的民间高手来说，根据网络资源对手机进行解锁，难度并不大。
</p>
<p>
	1998年，美国通过《千年数字版权法》，法律本意是要抑制盗版，但最后却禁止了用户对手机解锁。从2006年以来，支持消费者的美国议员们，也屡屡要求修改法律，允许用户自由解锁。
</p>
<p>
	在移动运营商看来，他们对用户购买手机的价格进行了大额补贴，目的是通过用户在一年或两年的合同期限内，用花费流量费的消费，弥补运营商购机补贴。如果让用户自由解锁，将损害运营商的利益。
</p>
<p>
	以苹果手机为例，运营商捆绑两年合约的补贴价格为199美元，但是其裸机零售价超过600美元，这400多美元其实由运营商买单。
</p>
<p>
	上述机构NTIA还指出，只要是消费者承诺继续使用某种服务，或是针对提前结束合约支付了违约罚金等，美国的运营商就应该免费帮助用户进行解锁。
</p>','','','','美国,,禁止运营商,锁定手机','4','Y','Y','uploads/201309/523a54f7d9591.jpg','uploads/201309/thumb_523a54f7d9591.jpg','1','2','Y','0','4','N','5','','N','1379554552');
INSERT INTO `yii_post` VALUES('17','1','','','Facebook高管离职投奔阿里巴巴','','','','','','','3','1','','','','','','<p>
	Facebook马上就要失去两个关键员工：视频广告产品经理贾斯汀·谢弗（Justin Shaffer）和企业沟通团队经理阿什利·詹迪(Ashley Zandy)。
</p>
<p>
	Facebook已经证实了这两位高管即将离职的消息。作为一个仍在快速成长的高科技公司，Facebook近年来员工人数显著增加，这两位关键人物的突然离职令人意外。
</p>
<p>
	据知情人士透露，谢弗没有正式宣布他的下一个去向，但已经明确表示将离开Facebook。今年，谢弗和产品营销总监吉姆·斯夸尔斯（Jim Squires）领导下的Facebook视频广告业务出现下滑，原因是一些广告主感到受挫。
</p>
<p>
	据到Facebook 透露，谢弗在Faceboo将于下周三后正式离职。谢弗拒绝发表评论。
</p>
<p>
	谢弗是Facebook的知名经理，曾经参与领导过该公司的多个项目——包括“Group”和签到工具“Places”——的开发。谢弗于2010年加盟Facebook，当时，他的初创公司Hot Potato被Facebook收购。在创办Hot Potato之前，他还曾在MLB(美国职棒大联盟)的数字部门MLB Advanced Media工作了数年时间，参与创建了MLB.com网。
</p>
<p>
	知情人士还透露，谢弗正在考虑创办一个创投基金。
</p>
<p>
	另一位即将离职的高管詹迪在Facebook工作超过两年，离职后将加盟阿里巴巴集团，出任该公司的国际企业事务副总监。詹迪将在硅谷办公，负责领导阿里巴巴公司在中国大陆以外地区的所有企业和财务沟通事物。在加入Facebook之前，詹迪曾在博然思维集团(Brunswick Group)工作5年多时间。
</p>
<p>
	今年以来，Facebook依然在努力扩张，尤其是在移动业务领域。马克·扎克伯格（Mark Zuckerberg）多次表示，Facebook在2013年将继续在基础设施和团队扩张方面大举投资。
</p>
<p>
	今年6月底，Facebook拥有5,299名员工，相比去年年底增长了15％ 。最近加盟Facebook的重要员工包括其第一任首席营销官格雷·布里吉斯(Gary Briggs)，格雷来自谷歌(微博)，在加入Facebook之前担任摩托罗拉移动公司的营销部门高级副总裁。
</p>
<p>
	另一方面，Facebook最近也有几位重要人物离职。今年5月，Facebook首席法律顾问尤罗特(Ted Ullyot)离开。最近，Facebook的顶级广告经理戈库尔·拉贾兰（Gokul Rajaram）宣布离开，加入了数字支付公司Square。
</p>','','','','阿里巴巴,Facebook,yii','2','N','Y','uploads/images/201403/0674c571ac3.gif','uploads/thumbs/201403/small_0674c571ac3.gif','0','0','N','0','0','Y','0','','Y','1379554636');
INSERT INTO `yii_post` VALUES('12','1','','','微软公布Windows 8.1售价 基本版售价119.99美元','','','a:1:{s:9:\"underline\";s:1:\"Y\";}','','','','2','2','','','','','','<p>
	微软周二正式公布了Windows 8.1操作系统的售价。在Windows 8用户将能够免费升级至Windows 8.1的同时，如果用户运行的是Windows XP、Vista或是Windows 7操作系统，想要升级至Windows 8.1基本版的价格为119.99美元，升级至Windows 8.1 Pro版的价格为199.99美元。
</p>
<p>
	Windows 8.1的升级费用与此前用户升级至Windows 8操作系统的升级费用相同，不过这一次微软并未向去年用户升级至Windows 8操作系统时那样，提供任何的促销价格。
</p>
<p>
	微软当前还计划对Windows 8.1的销售方式进行更改。此前，用户必须在线购买Windows 8操作系统的升级版本，或是前往零售店购买，微软从未提供完整版。用户将可以通过零售店购买Windows 8.1，或是通过下载选项购买微软所谓的“完整版软件”（full version software）。
</p>
<p>
	此举旨在为希望在虚拟环境下运行Windows 8.1操作系统的用户做出回应。如果用户购买一套Windows 8.1，它将是完全版，而不是升级版本。
</p>
<p>
	对Windows XP或是Windows Vista操作系统用户而言，如果想要从现有操作系统升级至Windows 8.1，此次将会有略微的调整。微软此前支持从Windows XP或是Windows Vista操作系统升级至Windows 8的基础升级路径，但是针对Windows 8.1则采用了完全不同的方式。
</p>
<p>
	如果Windows XP或是Windows Vista操作系统用户想要直接升级至Windows 8.1，用户需要完全重新安装。微软就此表示，这是因为“Windows 8.1并不是为运行Windows XP或是Windows Vista操作系统的操作系统设计的。”Windows XP或是Windows Vista操作系统用户需要从零售店购买DVD光盘，而不能选在在线升级。
</p>
<p>
	对Windows 7用户而言，在升级完成之后，他们必须重新安装台式应用程序，如Office等。微软的这种做法可能会令一些商业和企业用户感到极度不满。
</p>
<p>
	随着搭载Windows 8.1操作系统的设备将从10月18日开始蜂拥进入市场，微软同时还提供了从基本版Windows 8.1升级至Windows 8.1 Pro版和Windows Media Center版的方式。
</p>
<p>
	购买搭载基本版Windows 8.1操作系统的用户，升级至Windows 8.1 Pro需花费99.99美元；Windows 8.1 Pro用户可花费9.99美元升级至Windows Media Center。Windows 8.1将于10月17日在微软零售店开始销售，搭载Windows 8.1操作系统的设备和零售DVD将于10月18日开始销售。
</p>','','','','微软,Windows8.1,基本版售价','1','Y','Y','uploads/201309/523a540d7a921.jpg','uploads/201309/thumb_523a540d7a921.jpg','0','0','N','0','0','Y','0','','Y','1379554317');
INSERT INTO `yii_post` VALUES('13','1','','','三星智能手表遭冷落 已着手研发二代产品','','','a:2:{s:4:\"bold\";s:1:\"Y\";s:5:\"color\";s:6:\"FFBE4F\";}','','','','2','1','','','','','','<p>
	在本月早些时候的新品发布会上，三星如外界所料般率先出手，发布了旗下首款可穿戴计算设备Galaxy Gear智能手表。
</p>
<p>
	Galaxy Gear采用金属拉丝表面，拥有六种采用橡胶材质的不同颜色表带。在具体配置方面，Galaxy Gear拥有一块1.63英寸Super AMOLED屏幕，分辨率为320x320，搭载了800MHz单核处理器，190万像素摄像头，512MB内存，4GB存储空间，315mAh不可拆卸电池，内置扬声器、蓝牙4.0、加速度计、陀螺仪和两个麦克风。
</p>
<p>
	但是，日前据韩国媒体《数码时代》(Digital Times)的报道称，这一产品有可能成为史上最为短命的可穿戴式计算设备，因为三星目前已经开始研发其下一代产品。
</p>
<p>
	事实上，自从Galaxy Gear于9月4日在柏林首次与外界接触以来，消费者对于这款产品的反映一直十分平静。不少批评者则抱怨称，Galaxy Gear 25个小时的电池续航时间太短，而能够同其配合使用的智能设备也实在太过有限。
</p>
<p>
	目前，仅有三星Galaxy Note 3智能手机和Galaxy Note 10.1平板电脑能够同其进行连接。但三星方面表示，未来将有更多设备支持Galaxy Gear。
</p>
<p>
	对于三星此次发布Galaxy Gear，外界的普遍看法是该公司为了赶在苹果发布传言已久的“iWatch智能手表”之前而匆匆发布了一款自己的可穿戴式计算设备以抢占市场先机。而且，在苹果在日本地区申请了“iWatch商标”，并在全新iPhone 5s中配置了一个专门管理设备上各类传感器和动作的“M7”协处理芯片后，外界对于iWatch的期待更是有增无减。
</p>
<p>
	与此同时，知名市场调研机构IHS移动和通讯总监伊恩-弗格(Ian Fogg)曾评价道：
</p>
<p>
	“三星的Galaxy Gear只是一个披着消费者电子产品外衣的原型机，正因为如此，该产品将很难在市场中取得成功。从目前来看，该设备拥有许多不足的地方，比如售价过高、电池续航能力不佳、必须配合智能手机使用的局限性等等。总的来说就是，这一产品恐怕很难取得成功，而三星则需要凭借一款设计更加精良的设备来再次向这一市场发起攻势。”
</p>
<p>
	与此同时，其他一些测试者则表示，Galaxy Gear的操作存在着延迟的情况，系统菜单设计令人困惑，而其299美元的售价也有些过高。
</p>
<p>
	据位于三星总部所在地的韩国门户网站Daum报道，第一款Galaxy Gear仅仅属于三星的一款“试水产品”而已，该公司希望通过这一产品收集市场反馈，然后在以此作为依据开发出第二代Galaxy Gear。Daum预计，三星有可能会在明年1月的国际消费电子展(Consumer Electronics Show)，或者在明年3月的移动世界大会(Mobile World Congress)上发布新一代Galaxy Gear 2智能手表。而且，第二代Galaxy Gear很有可以会基于内置的GPS定位芯片而推出一些基于地理位置的服务。
</p>
<p>
	三星方面拒绝对此发表置评。
</p>','','','','三星,智能手表,二代产品','1','N','Y','uploads/201309/523a545da4d37.jpg','uploads/201309/thumb_523a545da4d37.jpg','0','0','N','0','0','Y','0','','Y','1379554397');

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

INSERT INTO `yii_question` VALUES('1','0','0','','zjh','326196998@qq.com','','yiiCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，yiicms可用于企业建站、个人博客、资讯门户、图片站等各类型站点。','','N','如果您需要购买商业程序、项目外包订制、交流合作的，欢迎使用以下方式和我们联系
','Y','1379546643');

DROP TABLE IF EXISTS `yii_session`;
CREATE TABLE `yii_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session表';

INSERT INTO `yii_session` VALUES('alc16h1o74o2sbtdq69pp4qfi4','1395915805','Yii.CCaptchaAction.c506e434.admin/default.captcha|s:4:\"ryko\";Yii.CCaptchaAction.c506e434.admin/default.captchacount|i:3;admin__returnUrl|s:10:\"/admin.htm\";admin__id|s:1:\"1\";admin__name|s:9:\"zjh_admin\";admin__states|a:0:{}');

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
INSERT INTO `yii_setting` VALUES('upload','upload_water_file','static/watermark.png','');
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
INSERT INTO `yii_setting` VALUES('template','theme','default','');
INSERT INTO `yii_setting` VALUES('template','template','default','');

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

INSERT INTO `yii_special` VALUES('1','专题二','special2','美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有谷歌(微博)和多家汽车厂商的无人驾驶汽车市场的争夺之中','<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有<a class=\"a-tips-Article-QQ\" href=\"http://stockhtm.finance.qq.com/astock/ggcx/GOOG.OQ.htm\" target=\"_blank\">谷歌</a>(<a href=\"http://t.qq.com/googlechina#pref=qqcom.keyword\" target=\"_blank\">微博</a>)和多家汽车厂商的无人驾驶汽车市场的争夺之中。
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	马斯克在接受英国《金融时报》的采访时表示，特斯拉自动驾驶汽车将会让司机把90%的驾驶权转交给汽车的电脑系统，而全自动无人驾驶汽车则需要更长的研发时间。
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	马斯克指出，特斯拉的自动驾驶汽车将由该公司采用自有技术进行内部研发，并不会外包给其他公司。这一点也得到了该公司一位新闻发言人的证实。
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	特斯拉官网近日发布了一个招聘“高级驾驶员辅助系统控制工程师”的启示，负责帮助“特斯拉成为自动驾驶汽车市场的领导者”。
</p>','uploads/thumbs/201403/small_8e9e89a2e6a.png','uploads/images/201403/8e9e89a2e6a.png','','','','','Y','0','4','1379547110');
INSERT INTO `yii_special` VALUES('2','专题一','special1','','<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	随着移动科技的不断发展，人们生活的方方面面都感受到了新科技所带来的巨大影响，餐饮领域自然也不例外。无论是在餐馆的餐桌上放置平板电脑、还是推出可互动的点菜、买单应用都是餐饮企业为进一步促进消费者来店消费所想出的妙招。其中，美国知名餐厅运营商Brinker International.Inc旗下Chili\'s Grill &amp; Bar最近做出的动作便是移动化大潮来袭下的一个最好示范。
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	<img src=\"/cms/uploads/201309/523a380d1d4c0.jpg\" alt=\"\" /> 
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	目前，该公司已经在旗下部分餐厅中测试由Ziosk研发的桌面服务系统，该系统可以使消费者在无需服务员出现的情况完成点菜、买单等操作，甚至还可以利用该系统玩游戏。对此，Chili\'s Grill &amp; Bar品牌战略高级副总裁表示，“由于消费者更倾向于在配备了这类桌面系统的餐厅花费更多金钱，因此这一科技可以帮助公司有效提高销售额。”
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	事实上，由于桌面服务系统会时不时的显示一些甜品的图片，Chili\'s Grill &amp; Bar餐厅的甜品销量已经迎来了大约20%的提升。因此我们不难想象，如果Chili\'s Grill &amp; Bar未来将这一图片展示的范围扩大到酒精类饮品和其他拥有更大利润率的菜品时能够取得怎样的效果。
</p>
<p style=\"font-size:16px;color:#333333;font-family:微软雅黑, Tahoma, Verdana, 宋体;background-color:#FFFFFF;text-indent:2em;\">
	与此同时，桌面服务设备中自带的那些看似不起眼的小游戏也有望为餐厅带来额外收入。比如，Chili\'s Grill &amp; Bar会向每位需要使用游戏服务的消费者收取0.99美元的费用，其中Chili\'s Grill &amp; Bar将可以拿到50%的分成，而另一半则由Ziosk收取。考虑到Chili\'s Grill &amp; Bar目前仅仅是从Ziosk处以租赁的形式拿到这些设备的这一事实，这样的分成比例还算比较公平。
</p>','uploads/thumbs/201403/small_9e6fac7a8c2.png','uploads/images/201403/9e6fac7a8c2.png','','','','','Y','0','24','1379547152');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='附件';

INSERT INTO `yii_upload` VALUES('20','1','5.png','uploads/images/201403/3b68894af12.png','','png','application/octet-stream','1724','0','','1394775273');
INSERT INTO `yii_upload` VALUES('8','1','4.png','uploads/images/201403/016f52d2335.png','','png','application/octet-stream','624','0','','1394179375');
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';

INSERT INTO `yii_user` VALUES('1','zjh_admin','$2a$13$iKKy4BbxaNt4rIEUnzxCjuVgnd/XCFxLwA.rtRPzwNK9yUpDL.rM6','xb_zjh@126.com','10','1','');
INSERT INTO `yii_user` VALUES('2','没那么简单','$2a$13$Sw5bN0oq.OK/6sxrhKt8wOfyGAKIQ71.G69bg9ZgVKPVxzSL5lSPq','326196998@qq.com','1','0','');
INSERT INTO `yii_user` VALUES('7','微博评论','$2a$13$TEpIe58TLJIUmLuoE7pYD.KK74cRlLXSaNoXf0bnxbcLFFmmW1E5u','xweibo_user85589@sina.com','1','0','');

DROP TABLE IF EXISTS `yii_user_group`;
CREATE TABLE `yii_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) DEFAULT '' COMMENT '用户组名称',
  `acl` varchar(255) DEFAULT '' COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';

INSERT INTO `yii_user_group` VALUES('1','普通用户','administrator');
INSERT INTO `yii_user_group` VALUES('2','VIP①用户','');
INSERT INTO `yii_user_group` VALUES('3','VIP②用户','');
INSERT INTO `yii_user_group` VALUES('4','VIP④用户','administrator');
INSERT INTO `yii_user_group` VALUES('5','VIP⑤用户','administrator');
INSERT INTO `yii_user_group` VALUES('6','VIP⑥用户','administrator');
INSERT INTO `yii_user_group` VALUES('7','VIP⑦用户','administrator');
INSERT INTO `yii_user_group` VALUES('8','VIP⑧用户','administrator');
INSERT INTO `yii_user_group` VALUES('9','VIP⑨用户','administrator');
INSERT INTO `yii_user_group` VALUES('10','系统管理员','administrator');

