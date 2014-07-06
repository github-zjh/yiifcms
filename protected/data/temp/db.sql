
--
-- Table structure for table `#@__ad`
--

DROP TABLE IF EXISTS `#@__ad`;
CREATE TABLE IF NOT EXISTS `#@__ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(50) NOT NULL COMMENT '广告名称',
  `title_alias` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `image_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `width` varchar(10) NOT NULL DEFAULT '' COMMENT '图片宽',
  `height` varchar(10) NOT NULL DEFAULT '' COMMENT '图片高',
  `intro` text COMMENT '广告描述',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `expired_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告' ;

--
-- Dumping data for table `#@__ad`
--

INSERT INTO `#@__ad` (`id`, `title`, `title_alias`, `link_url`, `image_url`, `width`, `height`, `intro`, `click_count`, `start_time`, `expired_time`, `attach_file`, `sort_order`, `status_is`, `create_time`) VALUES
(1, '首页banner', 'index_banner', 'http://www.bagecms.com', '', '', '', '', 0, 1379520000, 1546272000, 'uploads/201309/523a2c04a37a1.jpg', 8, 'Y', 1379544068),
(2, '首页banner', 'index_banner', '', '', '', '', '', 0, 1379520000, 1546272000, 'uploads/201309/523a2c4baba12.jpg', 9, 'Y', 1379544139),
(3, '首页banner', 'index_banner', '', '', '', '', '', 0, 1379520000, 1379606400, 'uploads/201309/523a2ca7b51ce.jpg', 10, 'Y', 1379544231);

-- --------------------------------------------------------

--
-- Table structure for table `#@__admin`
--

DROP TABLE IF EXISTS `#@__admin`;
CREATE TABLE IF NOT EXISTS `#@__admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL COMMENT '用户',
  `password` char(32) NOT NULL COMMENT '密码',
  `realname` varchar(100) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '用户组',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` varchar(15) NOT NULL DEFAULT '0' COMMENT 'QQ',
  `notebook` text COMMENT '备忘',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `last_login_ip` char(15) NOT NULL DEFAULT '127' COMMENT '最后登录ip',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '用户状态',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员';

-- --------------------------------------------------------

--
-- Table structure for table `#@__admin_group`
--

DROP TABLE IF EXISTS `#@__admin_group`;
CREATE TABLE IF NOT EXISTS `#@__admin_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL COMMENT '组名称',
  `acl` text NOT NULL COMMENT '权限',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员组' ;

--
-- Dumping data for table `#@__admin_group`
--

INSERT INTO `#@__admin_group` (`id`, `group_name`, `acl`, `status_is`, `create_time`) VALUES
(1, '超级管理', 'administrator', '', 0),
(2, '禁用', 'administrator', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `#@__admin_logger`
--

DROP TABLE IF EXISTS `#@__admin_logger`;
CREATE TABLE IF NOT EXISTS `#@__admin_logger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `catalog` enum('login','create','update','delete','other','browse') NOT NULL DEFAULT 'other' COMMENT '类型',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'url',
  `intro` text COMMENT '操作',
  `ip` char(15) NOT NULL DEFAULT '127.0.0.1' COMMENT '操作ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员日志' ;

-- --------------------------------------------------------

--
-- Table structure for table `#@__attr`
--

DROP TABLE IF EXISTS `#@__attr`;
CREATE TABLE IF NOT EXISTS `#@__attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scope` enum('config','post','page') NOT NULL DEFAULT 'post' COMMENT '使用范围',
  `attr_name` varchar(50) NOT NULL COMMENT '字段名称',
  `attr_name_alias` char(50) NOT NULL DEFAULT '' COMMENT '字段别名',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属栏目',
  `tips` varchar(255) NOT NULL DEFAULT '' COMMENT '说明',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `attr_type` enum('select','input','file','checkbox','textarea','radio') NOT NULL DEFAULT 'input' COMMENT '字段类型',
  `data_default` text COMMENT '字段默认数据',
  `max_lenght` int(11) NOT NULL DEFAULT '0' COMMENT '长度',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='扩展字段管理' ;

--
-- Dumping data for table `#@__attr`
--


INSERT INTO `#@__attr` (`scope`, `attr_name`, `attr_name_alias`, `catalog_id`, `tips`, `sort_order`, `attr_type`, `data_default`, `max_lenght`, `create_time`) VALUES
('config', '手机', 'mobile', 0, '', 0, 'input', '', 0, 1379553842),
('config', '传真', 'fax', 0, '', 0, 'input', '', 0, 1379553920),
('config', '电话', 'telephone', 0, '', 0, 'input', '', 0, 1379553920),
('config', '400电话', 'telephone_400', 0, '', 0, 'input', '', 0, 1379553920),
('config', '地址', 'address', 0, '', 0, 'input', '', 0, 1379553920);

-- --------------------------------------------------------

--
-- Table structure for table `#@__attr_val`
--

DROP TABLE IF EXISTS `#@__attr_val`;
CREATE TABLE IF NOT EXISTS `#@__attr_val` (
  `val_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容编号',
  `attr_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '属性编号',
  `attr_name` varchar(60) NOT NULL DEFAULT '' COMMENT '属性名称',
  `attr_val` text COMMENT '属性内容',
  PRIMARY KEY (`val_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='属性内容'  ;

-- --------------------------------------------------------

--
-- Table structure for table `#@__catalog`
--

DROP TABLE IF EXISTS `#@__catalog`;
CREATE TABLE IF NOT EXISTS `#@__catalog` (
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
  `template_page` varchar(100) NOT NULL DEFAULT '' COMMENT '单页模板',
  `template_show` varchar(100) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `acl_browser` varchar(255) NOT NULL DEFAULT '' COMMENT '浏览权限',
  `acl_operate` varchar(255) NOT NULL DEFAULT '' COMMENT '操作权限',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='全局分类';

--
-- Dumping data for table `#@__catalog`
--

INSERT INTO `#@__catalog` (`id`, `parent_id`, `catalog_name`, `catalog_name_second`, `catalog_name_alias`, `content`, `seo_title`, `seo_keywords`, `seo_description`, `attach_file`, `attach_thumb`, `sort_order`, `data_count`, `page_size`, `status_is`, `menu_is`, `redirect_url`, `display_type`, `template_list`, `template_page`, `template_show`, `acl_browser`, `acl_operate`, `create_time`) VALUES
(1, 0, '新闻', '新闻', 'news', '新闻栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_text', 'list_page', 'show_post', '', '', 1379545020),
(2, 1, '公司动态', '公司动态', 'company-news', '公司动态栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_text', 'list_page', 'show_post', '', '', 1379545199),
(3, 1, '行业新闻', '行业新闻', 'industry-news', '行业新闻栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_text', 'list_page', 'show_post', '', '', 1379545248),
(4, 0, '产品', '产品', 'goods', '产品栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_goods', 'list_page', 'show_goods', '', '', 1379545330),
(5, 4, '新品上市', '新品上市', 'new-arrival', '新品上市栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_goods', 'list_page', 'show_goods', '', '', 1379545388),
(6, 4, '特价商品', '特价商品', 'sales-goods', '特价商品栏目介绍', '', '', '', '', '', 0, 0, 0, 'Y', 'N', '', 'list', 'list_goods', 'list_page', 'show_goods', '', '', 1379545435);

-- --------------------------------------------------------

--
-- Table structure for table `#@__config`
--

DROP TABLE IF EXISTS `#@__config`;
CREATE TABLE IF NOT EXISTS `#@__config` (
  `scope` char(20) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';

--
-- Dumping data for table `#@__config`
--

INSERT INTO `#@__config` (`scope`, `variable`, `value`, `description`) VALUES
('base', 'site_name', '八哥网站内容管理系统', ''),
('base', 'site_domain', 'http://www.bagecms.com', ''),
('base', 'admin_email', 'abc@qq.com', ''),
('base', 'site_icp', '', ''),
('base', 'site_closed_summary', '系统维护中，请稍候......', ''),
('base', 'site_stats', '', ''),
('base', 'seo_title', '网站标题-网站标题', ''),
('base', 'seo_description', '网站描述-seo_description', ''),
('base', 'seo_keywords', '网站关键字-seo_keywords', ''),
('base', 'admin_telephone', '18606712910', ''),
('base', 'site_status', 'open', ''),
('base', 'site_status_intro', '网站升级中..........', ''),
('base', 'admin_logger', 'open', ''),
('base', 'user_status', 'open', ''),
('base', 'user_mail_verify', 'open', ''),
('base', 'site_copyright', 'COPYRIGHT © 2012 - 2014 BageCMS. ALL RIGHTS RESERVED.八哥内容管理系统 版权所有', ''),
('base', 'upload_water_size', '100x100', ''),
('base', 'upload_water_file', 'static/watermark.png', ''),
('base', 'upload_water_status', 'close', ''),
('base', 'upload_allow_ext', 'jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf', ''),
('base', 'upload_max_size', '200', ''),
('base', 'upload_water_scope', '100x100', ''),
('base', 'upload_water_position', '5', ''),
('base', 'upload_water_padding', '5', ''),
('base', 'upload_water_trans', '30', ''),
('custom', '_address', '浙江省杭州市西湖区请填写详细地址', ''),
('custom', '_fasdf', 'fasfcccccccccccc', ''),
('custom', '_telephone', '(+86 10) 5992 8888', ''),
('custom', '_telephone_400', '400 888 888', ''),
('custom', '_fax', '传真:(+86 10) 5992 0000', ''),
('custom', '_mobile', '18600000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `#@__link`
--

DROP TABLE IF EXISTS `#@__link`;
CREATE TABLE IF NOT EXISTS `#@__link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL COMMENT '名称',
  `site_url` varchar(255) NOT NULL COMMENT '链接地址',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `link_type` enum('image','txt') NOT NULL DEFAULT 'txt' COMMENT '链接类型',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '链接图片',
  `status_is` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接'  ;


-- --------------------------------------------------------

--
-- Table structure for table `#@__page`
--

DROP TABLE IF EXISTS `#@__page`;
CREATE TABLE IF NOT EXISTS `#@__page` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页' ;

--
-- Dumping data for table `#@__page`
--

INSERT INTO `#@__page` (`id`, `title`, `title_second`, `title_alias`, `html_path`, `html_file`, `intro`, `content`, `seo_title`, `seo_keywords`, `seo_description`, `template`, `attach_file`, `attach_thumb`, `sort_order`, `view_count`, `status_is`, `create_time`) VALUES
(1, '关于我们', '', 'about', '', '', 'BageCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，BageCms可用于企业建站、个人博客、资讯门户、图片站等各类型站点', '<p>\r\n	BageCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，BageCms可用于企业建站、个人博客、资讯门户、图片站等各类型站点。<br />\r\n<br />\r\n特点：<br />\r\n<br />\r\n1.开源免费<br />\r\n无论是个人还是企业展示型网站均可用本系统来完成<br />\r\n<br />\r\n2.数据调用方便快捷<br />\r\n自主研发的数据调用模块，能快速调用各类型数据，方便建站<br />\r\n<br />\r\n3.应用范围广<br />\r\n这套系统不是企业网站管理系统，也不是博客程序，更不是专业的图片管理系统，但它却具备大部分企业站、博客站、图片站的功能<br />\r\n<br />\r\n4.安全高性能<br />\r\n基于高性能的PHP5的web应用程序开发框架YII构建具有稳定、安全、高效、跨平台等特点<br />\r\n<br />\r\n5.URL自定义<br />\r\n系统支持自定义伪静态显示方式，良好的支持搜索引擎SEO。个性化设置每个栏目、内容的标题标签、描述标签、关键词标签<br />\r\n<br />\r\n6.自定义数据模型<br />\r\n系统可自定义数据模型满足各种表示形式和字段需求<br />\r\n<br />\r\n7.完善的后台权限控制<br />\r\n特有的管理员权限管理机制，可以灵活设置管理员的栏目管理权限、网站信息的添加、修改、删除权限等<br />\r\n<br />\r\n<br />\r\n系统运行环境：<br />\r\n数据库： mysql5+<br />\r\nPHP版本：php5.2.+<br />\r\n服务器：linux,unix,freebsd等<br />\r\n<br />\r\n官方网址：http://www.bagecms.com<br />\r\n下载地址：http://www.bagecms.com/download/bagecms<br />\r\n<br />\r\n演示地址：http://demo.bagecms.com<br />\r\n后台地址：http://demo.bagecms.com/admini<br />\r\n用户：bagecms<br />\r\n密码：bagecms\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', '', '', '', 'uploads/201309/logo.jpg', 'uploads/201309/logo.jpg', 0, 0, '', 1322999570),
(2, '联系我们', '', 'contact', '', '', '', '<p>\r\n	QQ:5565907\r\n</p>\r\n<p>\r\n	QQ群：139869141\r\n</p>\r\n<p>\r\n	BageCMS官方网站：<a href="http://www.bagecms.com" target="_blank">http://www.bagecms.com</a>\r\n</p>\r\n<p>\r\n	八哥软件官方网站：<a href="http://www.bagesoft.cn" target="_blank">http://www.bagesoft.cn</a>\r\n</p>', '', '', '', '', '', '', 0, 0, '', 1322999588),
(3, '企业文化', '', 'cultural', '', '', '企业文化是企业为解决生存和发展的问题的而树立形成的，被组织成员认为有效而共享，并共同遵循的基本信念和认知。 企业文化集中体现了一个企业经营管理的核心主张，以及由此产生的组织行为。', '<div>\r\n	<div>\r\n		迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。\r\n	</div>\r\n	<div>\r\n		企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。\r\n	</div>\r\n	<div>\r\n		价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。\r\n	</div>\r\n	<div>\r\n		英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提供可供仿效的榜样，对企业文化的形成和强化起着极为重要的作用。\r\n	</div>\r\n	<div>\r\n		文化仪式是指企业内的各种表彰、奖励活动、聚会以及文娱活动等，它可以把企业中发生的某些事情戏剧化和形象化，来生动的宣传和体现本企业的价值观，使人们通过这些生动活泼的活动来领会企业文化的内涵，使企业文化“寓教于乐”之中。\r\n	</div>\r\n	<div>\r\n		文化网络是指非正式的信息传递渠道，主要是传播文化信息。它是由某种非正式的组织和人群，以及某一特定场合所组成，它所传递出的信息往往能反映出职工的愿望和心态。\r\n	</div>\r\n	<h3>\r\n		产生\r\n	</h3>\r\n	<div>\r\n		企业领导者把文化的变化人的功能应用于企业，以解决现代企业管理中的问题，就有了企业文化。企业管理理论和企业文化管理理论都追求效益。但前者为追求效益而把人当作客体，后者为追求效益把文化概念自觉应用于企业，把具有丰富创造性的人作为管理理论的中心。这种指导思想反映到企业管理中去，就有了人们称之为企业文化的种种观念。\r\n	</div>\r\n	<h3>\r\n		认识\r\n	</h3>\r\n	<div>\r\n		从企业文化的现实出发，进行深入的调查研究，把握企业文化各种现象之间的本质联系。依据实践经验，从感认认识到理性认识，进行科学的概括、总结。\r\n	</div>\r\n	<h3>\r\n		意义\r\n	</h3>\r\n	<div>\r\n		一．企业文化能激发员工的使命感。不管是什么企业都有它的责任和使命，企业使命感是全体员工工作的目标和方向，是企业不断发展或前进的动力之源。\r\n	</div>\r\n	<div>\r\n		二．企业文化能凝聚员工的归属感。　企业文化的作用就是通过企业价值观的提炼和传播，让一群来自不同地方的人共同追求同一个梦想。\r\n	</div>\r\n	<div>\r\n		三．企业文化能加强员工的责任感。企业要通过大量的资料和文件宣传员工责任感的重要性，管理人员要给全体员工灌输责任意识，危机意识和团队意识，要让大家清楚地认识企业是全体员工共同的企业。\r\n	</div>\r\n	<div>\r\n		四．企业文化能赋予员工的荣誉感。每个人都要在自己的工作岗位，工作领域，多做贡献，多出成绩，多追求荣誉感。\r\n	</div>\r\n	<div>\r\n		五．企业文化能实现员工的成就感。一个企业的繁荣昌盛关系到每一个公司员工的生存，企业繁荣了，员工们就会引以为豪，会更积极努力的进取，荣耀越高，成就感就越大，越明显。\r\n	</div>\r\n</div>\r\n<div>\r\n</div>', '', '', '', '', '', '', 0, 0, '', 1331877791),
(4, '管理团队', '', 'team', '', '', '团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。', '<div>\r\n	<div>\r\n		团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不符合多元化的现实状况的。\r\n	</div>\r\n	<div>\r\n		一个优秀的企业管理者，应该怎样管理员工?道理也很简单，那就是要给员工创造一个充分利用自己的个性将工作干得最好的条件。不一定什么都要团队化，太死板了。虽然现在的企业也都提倡创新，但如果管理者过分强调团队精神，则员工的创新精神必然受到压抑。压抑个性就是压抑创新，没有个性哪来的创新?说得极端一点，企业管理者要谨防团队建设法西斯化。团队是需要的，企业管理者在团队建设的同时要遵循一个原则，不能压抑员工的个性。在团队内部，企业管理者要给员工充分的自由，少说几句少数服从多数，要知道，聪明的人在世界上还就占少数。\r\n	</div>\r\n	<div>\r\n		企业管理者应该解放思想，要有多元化的思维。不同的企业，团队的性质也不一样。要量体裁衣建设符合企业内在要求的团队，要灵活变化，别搞一刀切。如果该企业是劳动密集型企业，那你可以建设一支高度纪律性组织性的团队。如果该企业是知识密集型企业，那就要以自由主义来管理员工了，建立一支人尽其才的团队是最重要的，严格说算不上是团队，也没必要强调团队，更注重的应该是员工的个人创造力，千万别让团队束缚住员工的头脑，当然应该有的纪律和合作也是不可少的。如果企业既有创造型员工也有操作型员工，那可将团队建设重点放到操作型员工身上。需要注意的一点是，越聪明的人越倾向个人主义，这个情况，企业管理者要注意有的放矢。\r\n	</div>\r\n</div>\r\n<div>\r\n</div>', '', '', '', '', '', '', 0, 0, 'Y', 1379392484);

-- --------------------------------------------------------

--
-- Table structure for table `#@__post`
--

DROP TABLE IF EXISTS `#@__post`;
CREATE TABLE IF NOT EXISTS `#@__post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
  `nickname` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `author` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_alias` char(50) NOT NULL DEFAULT '' COMMENT '别名 ',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式序列化',
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容管理' ;


-- --------------------------------------------------------

--
-- Table structure for table `#@__post_2tags`
--

DROP TABLE IF EXISTS `#@__post_2tags`;
CREATE TABLE IF NOT EXISTS `#@__post_2tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '标题ID',
  `tag_name` char(30) NOT NULL COMMENT '标签名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容关联标签'  ;

-- --------------------------------------------------------

--
-- Table structure for table `#@__post_album`
--

DROP TABLE IF EXISTS `#@__post_album`;
CREATE TABLE IF NOT EXISTS `#@__post_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户名',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容编号',
  `catalog` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `folder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` char(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `save_path` varchar(100) NOT NULL DEFAULT '' COMMENT '保存路径',
  `save_name` varchar(100) NOT NULL DEFAULT '' COMMENT '保存文件名不带路径',
  `hash` char(32) NOT NULL DEFAULT '' COMMENT 'hash',
  `file_ext` char(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `access` varchar(255) NOT NULL DEFAULT '' COMMENT '权限控制',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`),
  KEY `album` (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片相册';

-- --------------------------------------------------------

--
-- Table structure for table `#@__post_comment`
--

DROP TABLE IF EXISTS `#@__post_comment`;
CREATE TABLE IF NOT EXISTS `#@__post_comment` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新闻评论'  ;

-- --------------------------------------------------------

--
-- Table structure for table `#@__post_tags`
--

DROP TABLE IF EXISTS `#@__post_tags`;
CREATE TABLE IF NOT EXISTS `#@__post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `tag_name` char(30) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻标签' ;

-- --------------------------------------------------------

--
-- Table structure for table `#@__question`
--

DROP TABLE IF EXISTS `#@__question`;
CREATE TABLE IF NOT EXISTS `#@__question` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='客服' ;

--
-- Dumping data for table `#@__question`
--

INSERT INTO `#@__question` (`id`, `user_id`, `scope`, `username`, `realname`, `email`, `telephone`, `question`, `contact_other`, `answer_status`, `answer_content`, `status_is`, `create_time`) VALUES
(1, 0, 0, '', '八哥软件', '5565907@qq.com', '', 'BageCms是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，BageCms可用于企业建站、个人博客、资讯门户、图片站等各类型站点。', '', 'N', '如果您需要购买商业程序、项目外包订制、交流合作的，欢迎使用以下方式和我们联系\r\nhttp://www.bagecms.com\r\nhttp://www.bagesoft.cn', 'Y', 1379546643);

-- --------------------------------------------------------

--
-- Table structure for table `#@__special`
--

DROP TABLE IF EXISTS `#@__special`;
CREATE TABLE IF NOT EXISTS `#@__special` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='专题' ;


--
-- Table structure for table `#@__upload`
--

DROP TABLE IF EXISTS `#@__upload`;
CREATE TABLE IF NOT EXISTS `#@__upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户名',
  `scope` enum('content','image') NOT NULL DEFAULT 'content' COMMENT '范围',
  `folder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` char(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varbinary(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `save_path` varchar(100) NOT NULL DEFAULT '' COMMENT '保存路径',
  `save_name` varchar(100) NOT NULL DEFAULT '' COMMENT '保存文件名不带路径',
  `hash` char(32) NOT NULL DEFAULT '' COMMENT 'hash',
  `file_ext` char(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `access` varchar(255) NOT NULL DEFAULT '' COMMENT '权限控制',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='附件' ;
