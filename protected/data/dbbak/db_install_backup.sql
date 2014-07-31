# your database backup
# version:5.5.27-log
# time:2014-07-31 14:55:06
# --------------------------------------------------------


DROP TABLE IF EXISTS `yiif_ad`;
CREATE TABLE `yiif_ad` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='广告';

INSERT INTO `yiif_ad` VALUES('2','1','首页banner1','index_banner','','','1440','500','','0','uploads/images/201404/113511a7cd1.png','1','Y','1379544139');
INSERT INTO `yiif_ad` VALUES('3','1','首页banner2','index_banner','','','1440','500','','0','uploads/images/201404/0b92e2274de.png','2','Y','1379544231');
INSERT INTO `yiif_ad` VALUES('4','3','美丽自然','index_mid_banner','http://www.baidu.com/','','1170','200','','0','uploads/images/201406/200d7c148cd.jpg','0','Y','1404100045');

DROP TABLE IF EXISTS `yiif_ad_position`;
CREATE TABLE `yiif_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';

INSERT INTO `yiif_ad_position` VALUES('1','首页banner幻灯片');
INSERT INTO `yiif_ad_position` VALUES('2','底部幻灯片');
INSERT INTO `yiif_ad_position` VALUES('3','首页中部banner');

DROP TABLE IF EXISTS `yiif_catalog`;
CREATE TABLE `yiif_catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
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
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='全局分类';

INSERT INTO `yiif_catalog` VALUES('1','1','0','新闻','新闻<br />','d','d','d','','','0','0','Y','','1379545020','1403766555');
INSERT INTO `yiif_catalog` VALUES('2','1','1','业界讯息','公司动态栏目介绍','','','','','','2','0','Y','','1379545199','1404109846');
INSERT INTO `yiif_catalog` VALUES('3','1','1','IT资讯','行业新闻栏目介绍','','','','','','1','0','Y','','1379545248','1404109600');
INSERT INTO `yiif_catalog` VALUES('4','5','0','产品','产品栏目介绍','','','','','','0','0','Y','','1379545330','1394517482');
INSERT INTO `yiif_catalog` VALUES('5','5','4','新品上市','新品上市栏目介绍','','','','','','1','0','Y','','1379545388','1394517482');
INSERT INTO `yiif_catalog` VALUES('6','5','4','特价商品','特价商品栏目介绍','','','','','','0','0','N','','1379545435','1394517482');
INSERT INTO `yiif_catalog` VALUES('8','2','0','图集','','','','','','','0','0','Y','','0','1399616730');
INSERT INTO `yiif_catalog` VALUES('9','2','8','最新热图','最新热图','最新热图','最新热图','最新热图','','','0','0','Y','','0','1399616723');
INSERT INTO `yiif_catalog` VALUES('10','3','0','热门软件','','热门软件','热门软件','热门软件','','','0','0','Y','','1400489000','1400489000');
INSERT INTO `yiif_catalog` VALUES('11','3','10','网站软件','网站软件','网站软件','网站软件','网站软件','','','0','0','Y','','1400489069','1400489069');
INSERT INTO `yiif_catalog` VALUES('12','4','0','最新视频','','','','','','','0','0','Y','','1400828336','1400828336');
INSERT INTO `yiif_catalog` VALUES('13','4','12','最新电影','','','','','','','0','0','Y','','1400828453','1400828453');
INSERT INTO `yiif_catalog` VALUES('14','2','8','网络美女','','','','','','','0','0','Y','','1404111907','1404111907');

DROP TABLE IF EXISTS `yiif_comment`;
CREATE TABLE `yiif_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` text NOT NULL COMMENT '评论内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '评论类型',
  `client_ip` varchar(15) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='评论表';

INSERT INTO `yiif_comment` VALUES('31','1','31','第三张亮了！<img src=\"/static/public/emoticons/images/13.gif\" alt=\"\" border=\"0\" />','Y','2','127.0.0.1','1402628120');
INSERT INTO `yiif_comment` VALUES('32','16','31','内容排版 不太好吧 <img src=\"/public/emoticons/images/1.gif\" alt=\"\" border=\"0\" /><br />','Y','1','127.0.0.1','1402882240');
INSERT INTO `yiif_comment` VALUES('33','16','31','再试一次','Y','1','127.0.0.1','1402889690');
INSERT INTO `yiif_comment` VALUES('34','4','31','旺旺还不错 <img src=\"/static/public/emoticons/images/65.gif\" alt=\"\" border=\"0\" /><br />','Y','3','127.0.0.1','1403055802');
INSERT INTO `yiif_comment` VALUES('35','23','31','这篇文章很不错','Y','1','127.0.0.1','1403515888');
INSERT INTO `yiif_comment` VALUES('36','23','31','asdf','Y','1','127.0.0.1','1403515940');
INSERT INTO `yiif_comment` VALUES('37','15','31','<pre class=\"prettyprint lang-js\">&lt;script&gt;&lt;/script&gt;</pre>
<pre class=\"prettyprint lang-js\">&lt;script&gt;
alert(\'bb\');
&lt;/script&gt;</pre>','Y','1','101.36.77.42','1404444825');

DROP TABLE IF EXISTS `yiif_goods`;
CREATE TABLE `yiif_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `catalog_id` int(10) unsigned DEFAULT NULL COMMENT '栏目id',
  `price` decimal(10,2) unsigned DEFAULT NULL,
  `default_image` varchar(200) DEFAULT NULL COMMENT '商品图片',
  `default_thumb` varchar(200) DEFAULT NULL COMMENT '商品缩略图',
  `image_list` varchar(255) DEFAULT NULL COMMENT '商品组图',
  `content` text COMMENT '商品内容',
  `views` int(10) unsigned DEFAULT '0' COMMENT '浏览次数',
  `sales` int(10) unsigned DEFAULT '0' COMMENT '销售次数',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '显示状态',
  `recom_id` int(10) DEFAULT '0' COMMENT '推荐位id',
  `sort_order` mediumint(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商品表';

INSERT INTO `yiif_goods` VALUES('1','小米手机','5','799.00','uploads/images/201405/3fdd860df5d.jpg','uploads/thumbs/201405/small_3fdd860df5d.jpg','a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"45\";s:4:\"file\";s:37:\"uploads/images/201405/6bf7dd586e7.jpg\";s:5:\"thumb\";N;s:4:\"desc\";N;s:3:\"url\";N;}}','','0','0','1401076650','1405307616','Y','0','0');

DROP TABLE IF EXISTS `yiif_image`;
CREATE TABLE `yiif_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
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
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_desc` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='内容管理';

INSERT INTO `yiif_image` VALUES('2','1','图览2014巴西世界杯','图览2014巴西世界杯','','','','9','0','世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@百度图片】新浪微博官方账号吧。','a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"77\";s:4:\"file\";s:37:\"uploads/images/201407/2d8af2a52c9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2d8af2a52c9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"78\";s:4:\"file\";s:37:\"uploads/images/201407/830c15efce6.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_830c15efce6.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"79\";s:4:\"file\";s:37:\"uploads/images/201407/8068f3a90b7.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8068f3a90b7.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','<p style=\"text-indent:2em;\">
	<span style=\"font-size:14px;\"></span><span style=\"font-size:14px;\">世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@百度图片】新浪微博官方账号吧。</span> 
</p>','百度图片','http://image.baidu.com/infopage/tpl?id=8&mode=viewer','','巴西,世界杯,美女','31','N','N','uploads/images/201406/1f6228399a3.jpg','uploads/thumbs/201406/small_1f6228399a3.jpg','0','0','N','1404182636','0','Y','0','Y','1404111213');
INSERT INTO `yiif_image` VALUES('3','1','小清新','','','','','14','0','','','','','','小清新','','','','美女','3','N','N','uploads/images/201406/2980725e720.jpg','uploads/thumbs/201406/small_2980725e720.jpg','0','0','N','1404111946','0','Y','0','Y','1404111946');
INSERT INTO `yiif_image` VALUES('4','1','游戏唯美','','','','','14','0','','a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"93\";s:4:\"file\";s:37:\"uploads/images/201407/2c48ccb19e2.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2c48ccb19e2.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','游戏唯美','','','','美女','3','N','N','uploads/images/201406/8b571b7725d.jpg','uploads/thumbs/201406/small_8b571b7725d.jpg','0','0','N','1404304930','0','Y','0','Y','1404112171');
INSERT INTO `yiif_image` VALUES('5','1','游戏唯美','','','','','14','0','','a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"89\";s:4:\"file\";s:37:\"uploads/images/201407/2e13e0a3ed9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2e13e0a3ed9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"90\";s:4:\"file\";s:37:\"uploads/images/201407/2a2d8e16cb0.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2a2d8e16cb0.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"91\";s:4:\"file\";s:37:\"uploads/images/201407/825a8ac9d80.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_825a8ac9d80.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','游戏唯美','','','','美女','8','N','N','uploads/images/201406/d7d79134e6d.jpg','uploads/thumbs/201406/small_d7d79134e6d.jpg','0','0','N','1404184873','0','Y','0','Y','1404114260');
INSERT INTO `yiif_image` VALUES('6','1','明星海景','','','','','14','0','','a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"88\";s:4:\"file\";s:37:\"uploads/images/201407/b0d4552362e.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_b0d4552362e.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','明星海景','','','','美女','2','N','N','uploads/images/201406/fe41fcc37ac.jpg','uploads/thumbs/201406/small_fe41fcc37ac.jpg','0','0','N','1404184847','0','Y','0','Y','1404114318');
INSERT INTO `yiif_image` VALUES('7','1','靓丽女孩','','','','','14','0','','a:2:{i:0;a:5:{s:6:\"fileId\";s:2:\"86\";s:4:\"file\";s:37:\"uploads/images/201407/4efea9bddd1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4efea9bddd1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"87\";s:4:\"file\";s:37:\"uploads/images/201407/9706bae28d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_9706bae28d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','靓丽女孩','','','','美女','4','N','N','uploads/images/201406/15b9aedad1b.jpg','uploads/thumbs/201406/small_15b9aedad1b.jpg','0','0','N','1404184809','0','Y','0','Y','1404114395');
INSERT INTO `yiif_image` VALUES('8','1','漂亮女神','','','','','14','0','','a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"83\";s:4:\"file\";s:37:\"uploads/images/201407/cef6cf4f134.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_cef6cf4f134.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"84\";s:4:\"file\";s:37:\"uploads/images/201407/8a0a9d8cb7b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8a0a9d8cb7b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"85\";s:4:\"file\";s:37:\"uploads/images/201407/4464b4046d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4464b4046d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','漂亮女神','','','','美女','2','N','N','uploads/images/201406/bb6aa6ad2c7.jpg','uploads/thumbs/201406/small_bb6aa6ad2c7.jpg','0','0','N','1404184778','0','Y','0','Y','1404114458');
INSERT INTO `yiif_image` VALUES('9','1','气质美女','','','','','8','0','','a:2:{i:0;a:5:{s:6:\"fileId\";s:2:\"81\";s:4:\"file\";s:37:\"uploads/images/201407/ed5693e7e2d.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_ed5693e7e2d.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"82\";s:4:\"file\";s:37:\"uploads/images/201407/f60eb1cfb67.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_f60eb1cfb67.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','气质美女','','','','美女','8','N','N','uploads/images/201406/ba6b6e35743.jpg','uploads/thumbs/201406/small_ba6b6e35743.jpg','0','0','N','1404184756','0','Y','0','Y','1404114497');
INSERT INTO `yiif_image` VALUES('10','1','淑女形象','','','','','8','0','','a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"80\";s:4:\"file\";s:37:\"uploads/images/201407/4be229705ba.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4be229705ba.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','淑女形象','','','','美女','4','N','N','uploads/images/201406/5348209384d.jpg','uploads/thumbs/201406/small_5348209384d.jpg','0','0','N','1404184732','0','Y','0','Y','1404114535');
INSERT INTO `yiif_image` VALUES('11','1','足球宝贝','','','','','14','0','','a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"92\";s:4:\"file\";s:37:\"uploads/images/201407/e62833cd62c.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_e62833cd62c.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}','','','','世界杯足球宝贝是个大美女','','','','美女,世界杯','4','N','N','uploads/images/201407/20d46ac94c7.jpg','uploads/thumbs/201407/small_20d46ac94c7.jpg','0','0','N','1405306203','0','Y','0','Y','1404287913');

DROP TABLE IF EXISTS `yiif_link`;
CREATE TABLE `yiif_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO图标',
  `sortorder` smallint(10) DEFAULT '255' COMMENT '排序',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='链接表';

INSERT INTO `yiif_link` VALUES('3','站长之家','http://www.chinaz.com','','2','Y');
INSERT INTO `yiif_link` VALUES('4','PHPChina','http://www.phpchina.com','','3','Y');
INSERT INTO `yiif_link` VALUES('5','Discuz动力社区','http://www.discuz.net','','4','Y');
INSERT INTO `yiif_link` VALUES('6','DNSPod','http://www.dnspod.cn','','255','Y');
INSERT INTO `yiif_link` VALUES('7','PHP100中文网','http://www.php100.com/','','255','Y');
INSERT INTO `yiif_link` VALUES('8','  WEB技术开发','http://www.itokit.com/','','255','Y');
INSERT INTO `yiif_link` VALUES('9','源码爱好者 ','http://www.codefans.net/','','255','Y');
INSERT INTO `yiif_link` VALUES('10','PHPCMS','http://bbs.phpcms.cn/','','255','Y');
INSERT INTO `yiif_link` VALUES('11',' PHPwind论坛','http://www.phpwind.net/','','255','Y');
INSERT INTO `yiif_link` VALUES('12','Drupal中国  ','http://drupalchina.cn/','','255','Y');
INSERT INTO `yiif_link` VALUES('13','德问编程','http://www.dewen.org/','','255','Y');
INSERT INTO `yiif_link` VALUES('14','stackoverflow','http://stackoverflow.com/','','255','Y');
INSERT INTO `yiif_link` VALUES('15','Linux课程学习','http://itercast.com/','','255','Y');
INSERT INTO `yiif_link` VALUES('16','ThinkPHP','http://www.thinkphp.cn/','','255','Y');
INSERT INTO `yiif_link` VALUES('17','CakePHP','http://cakephp.org/','','255','Y');
INSERT INTO `yiif_link` VALUES('18','站长之家','http://www.chinaz.com','uploads/images/201404/d7ab0fba105.png','255','Y');
INSERT INTO `yiif_link` VALUES('19','百度一下','http://www.baidu.com','uploads/images/201406/4b467a28eb4.gif','255','Y');
INSERT INTO `yiif_link` VALUES('20','谷歌搜索','http://www.google.com.hk','uploads/images/201406/feb4a98a27f.jpg','255','Y');
INSERT INTO `yiif_link` VALUES('21','天空软件','http://www.skycn.com/','uploads/images/201406/5321e9f13e8.png','255','Y');
INSERT INTO `yiif_link` VALUES('22','迅雷看看','http://www.kankan.com','uploads/images/201406/a34f66be52a.jpg','255','Y');
INSERT INTO `yiif_link` VALUES('23','懒人图库','http://www.lanrentuku.com','uploads/images/201406/94f3cb56750.png','255','Y');

DROP TABLE IF EXISTS `yiif_mail_log`;
CREATE TABLE `yiif_mail_log` (
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='发送邮件日志';

INSERT INTO `yiif_mail_log` VALUES('7','326196998@qq.com','测试邮件标题','测试邮件内容','1405053583','failed','3','1','SMTP 错误：无法连接到 SMTP 主机。');
INSERT INTO `yiif_mail_log` VALUES('8','326196998@qq.com','测试邮件标题','测试邮件内容','1405053614','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('9','326196998@qq.com','测试邮件标题','测试邮件内容','1405057618','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('10','326196998@qq.com','测试邮件标题','测试邮件内容','1405057700','failed','3','1','发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User
</p>
');
INSERT INTO `yiif_mail_log` VALUES('11','326196998@qq.com','测试邮件标题','测试邮件内容','1405057900','failed','3','1','发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User
</p>
');
INSERT INTO `yiif_mail_log` VALUES('12','326196998@qq.com','测试邮件标题','测试邮件内容','1405057974','failed','3','1','发送地址错误：ROOT<p>SMTP server error: Invalid User
</p>
');
INSERT INTO `yiif_mail_log` VALUES('13','326196998@qq.com','测试邮件标题','测试邮件内容','1405058020','failed','3','1','发送地址错误：YiifCMS官方<xb_zjh@126.com><p>SMTP server error: Invalid User
</p>
');
INSERT INTO `yiif_mail_log` VALUES('14','326196998@qq.com','测试邮件标题','测试邮件内容','1405058040','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('15','326196998@qq.com','测试邮件标题','测试邮件内容','1405058061','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('16','326196998@qq.com','测试邮件标题','测试邮件内容','1405058408','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('17','326196998@qq.com','测试邮件标题','测试邮件内容','1405058655','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('18','xb_zjh@126.com','测试邮件标题','测试邮件内容','1405059546','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('19','xb_zjh@126.com','测试邮件标题','测试邮件内容','1405059586','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('20','xb_zjh@126.com','测试邮件标题','测试邮件内容','1405128267','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('21','admin','yii内容管理系统 重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>
	','1405478217','failed','3','1','必须提供至少一个收件人地址。');
INSERT INTO `yiif_mail_log` VALUES('22','xb_zjh@126.com','yii内容管理系统 重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>
	','1405478290','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('23','xb_zjh@126.com','重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>
	','1405480338','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('24','xb_zjh@126.com','重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>
	','1405481428','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('25','xb_zjh@126.com','重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>
	','1405481945','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('26','xb_zjh@126.com','重置密码','
			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>
			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
			==================<br/><br/>请确保是本人操作，如果有其他疑问，
			请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>
	','1405495294','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('27','xb_zjh@126.com','测试邮件标题','测试邮件内容','1405495713','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('28','xb_zjh@126.com','测试邮件标题','测试邮件内容','1405495877','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('29','376685457@qq.com','账号激活','<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>
						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE\">http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，
						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>','1405503421','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('30','376685457@qq.com','账号激活','<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>
						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.\">http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>
						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，
						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>','1405503820','success','3','1','');
INSERT INTO `yiif_mail_log` VALUES('31','k_tatsuguchi@toyo-tos.com','测试邮件标题','测试邮件内容','1405565459','success','3','1','');

DROP TABLE IF EXISTS `yiif_menu`;
CREATE TABLE `yiif_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) DEFAULT NULL COMMENT '导航菜单',
  `menu_link` varchar(50) DEFAULT NULL COMMENT '导航链接',
  `unique` varchar(20) DEFAULT NULL COMMENT '唯一标示',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';

INSERT INTO `yiif_menu` VALUES('1','首页','/','index','Y','0','0','N');
INSERT INTO `yiif_menu` VALUES('2','资讯','?r=post/index','post','Y','0','0','N');
INSERT INTO `yiif_menu` VALUES('3','图集','?r=image/index','image','Y','0','0','N');
INSERT INTO `yiif_menu` VALUES('4','软件','?r=soft/index','soft','N','0','0','N');
INSERT INTO `yiif_menu` VALUES('5','视频','?r=video/index','video','N','0','0','N');
INSERT INTO `yiif_menu` VALUES('6','关于我','?r=page&id=about','about','Y','0','0','N');
INSERT INTO `yiif_menu` VALUES('7','反馈','?r=question/index','question','Y','0','0','N');

DROP TABLE IF EXISTS `yiif_model_type`;
CREATE TABLE `yiif_model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='内容模型表';

INSERT INTO `yiif_model_type` VALUES('1','post','文章','Post','Y');
INSERT INTO `yiif_model_type` VALUES('2','image','图集','Image','Y');
INSERT INTO `yiif_model_type` VALUES('3','soft','软件','Soft','Y');
INSERT INTO `yiif_model_type` VALUES('4','video','视频','Video','Y');
INSERT INTO `yiif_model_type` VALUES('5','goods','商品','Goods','Y');

DROP TABLE IF EXISTS `yiif_oauth`;
CREATE TABLE `yiif_oauth` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `apiname` varchar(50) DEFAULT NULL COMMENT 'api名称',
  `apikey` varchar(100) DEFAULT NULL COMMENT '接口key',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方登录授权表';

INSERT INTO `yiif_oauth` VALUES('qq','QQ','2821796254','Y');
INSERT INTO `yiif_oauth` VALUES('sinawb','新浪微博','2821796254','Y');
INSERT INTO `yiif_oauth` VALUES('weixin','微信','2821796254','Y');
INSERT INTO `yiif_oauth` VALUES('renren','人人网','2821796254','Y');

DROP TABLE IF EXISTS `yiif_oauth_qq`;
CREATE TABLE `yiif_oauth_qq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  `qq_uid` int(10) unsigned DEFAULT NULL COMMENT 'qq用户uid',
  `qq_token` varchar(100) DEFAULT NULL COMMENT 'qq令牌',
  `qq_info` text COMMENT 'qq用户信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='qq绑定表';


DROP TABLE IF EXISTS `yiif_oauth_renren`;
CREATE TABLE `yiif_oauth_renren` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  `renren_uid` int(10) unsigned DEFAULT NULL COMMENT '人人网用户uid',
  `renren_token` varchar(100) DEFAULT NULL COMMENT '人人网令牌',
  `renren_info` text COMMENT '人人网用户信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='人人网绑定表';


DROP TABLE IF EXISTS `yiif_oauth_sinawb`;
CREATE TABLE `yiif_oauth_sinawb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  `sinawb_uid` int(10) unsigned DEFAULT NULL COMMENT '新浪微博用户uid',
  `sinawb_token` varchar(100) DEFAULT NULL COMMENT '新浪微博令牌',
  `sinawb_info` text COMMENT '新浪微博用户信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新浪微博绑定表';


DROP TABLE IF EXISTS `yiif_oauth_weixin`;
CREATE TABLE `yiif_oauth_weixin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  `weixin_uid` int(10) unsigned DEFAULT NULL COMMENT '微信用户uid',
  `weixin_token` varchar(100) DEFAULT NULL COMMENT '微信令牌',
  `weixin_info` text COMMENT '微信用户信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信绑定表';


DROP TABLE IF EXISTS `yiif_page`;
CREATE TABLE `yiif_page` (
  `id` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `intro` text COMMENT '简单描述',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO KEYWORDS',
  `seo_description` text COMMENT 'SEO DESCRIPTION',
  `template` varchar(30) NOT NULL DEFAULT '' COMMENT '模板',
  `link` varchar(100) DEFAULT NULL COMMENT '外部链接',
  `attach_file` varchar(60) NOT NULL DEFAULT '' COMMENT '附件',
  `attach_thumb` varchar(60) NOT NULL DEFAULT '' COMMENT '附件小图',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='单页';

INSERT INTO `yiif_page` VALUES('about','关于我们','','yiicms','','','','','','','','0','11','Y','1322999570','0');
INSERT INTO `yiif_page` VALUES('goods','产品特色','','<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"free\">开源、免费</span></strong> 
</p>
<p style=\"text-indent:2em;\">
	<span style=\"font-size:14px;\">yiifcms是基于yiiframework开发的内容管理系统，它开源、免费，用户可以自由下载、使用、修改、学习交流。</span> 
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<hr />
<p>
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"safe\">安全、高效</span></strong> 
</p>
<p style=\"text-indent:2em;\">
	<span style=\"font-size:14px;\">yiiframework本身是一个很安全的高性能的开源框架，使用它您不用担心安全问题，它会使您的网站运行的很良好。</span> 
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<hr />
<p>
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<strong><span style=\"font-size:16px;font-family:Microsoft YaHei;\" id=\"handy\">简洁、方便</span></strong> 
</p>
<p style=\"text-indent:2em;\">
	<span style=\"font-size:14px;\">yiifcms有简洁、方便的后台管理，用户不需要了解复杂的逻辑关系，就可以很快速的发布内容，优化管理。</span> 
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<hr />
<p>
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"stable\">轻松、稳定</span> 
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<p style=\"text-indent:2em;\">
	<span style=\"font-size:14px;\">yiifcms架构合理、布局优美，是您轻松建站和学习的不二之选。</span> 
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>
<hr />
<p>
	<br />
</p>
<p style=\"text-indent:2em;\">
	<br />
</p>','','产品特色','产品特色','','','','','0','8','Y','1322999588','0');
INSERT INTO `yiif_page` VALUES('register','注册流程','企业文化是企业为解决生存和发展的问题的而树立形成的，被组织成员认为有效而共享，并共同遵循的基本信念和认知。 企业文化集中体现了一个企业经营管理的核心主张，以及由此产生的组织行为。','<div>
	<div>
		迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。
	</div>
	<div>
		企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。
	</div>
	<div>
		价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。
	</div>
	<div>
		英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提供可供仿效的榜样，对企业文化的形成和强化起着极为重要的作用。
	</div>
	<div>
		文化仪式是指企业内的各种表彰、奖励活动、聚会以及文娱活动等，它可以把企业中发生的某些事情戏剧化和形象化，来生动的宣传和体现本企业的价值观，使人们通过这些生动活泼的活动来领会企业文化的内涵，使企业文化“寓教于乐”之中。
	</div>
	<div>
		文化网络是指非正式的信息传递渠道，主要是传播文化信息。它是由某种非正式的组织和人群，以及某一特定场合所组成，它所传递出的信息往往能反映出职工的愿望和心态。
	</div>
	<h3>
		产生
	</h3>
	<div>
		企业领导者把文化的变化人的功能应用于企业，以解决现代企业管理中的问题，就有了企业文化。企业管理理论和企业文化管理理论都追求效益。但前者为追求效益而把人当作客体，后者为追求效益把文化概念自觉应用于企业，把具有丰富创造性的人作为管理理论的中心。这种指导思想反映到企业管理中去，就有了人们称之为企业文化的种种观念。
	</div>
	<h3>
		认识
	</h3>
	<div>
		从企业文化的现实出发，进行深入的调查研究，把握企业文化各种现象之间的本质联系。依据实践经验，从感认认识到理性认识，进行科学的概括、总结。
	</div>
	<h3>
		意义
	</h3>
	<div>
		一．企业文化能激发员工的使命感。不管是什么企业都有它的责任和使命，企业使命感是全体员工工作的目标和方向，是企业不断发展或前进的动力之源。
	</div>
	<div>
		二．企业文化能凝聚员工的归属感。　企业文化的作用就是通过企业价值观的提炼和传播，让一群来自不同地方的人共同追求同一个梦想。
	</div>
	<div>
		三．企业文化能加强员工的责任感。企业要通过大量的资料和文件宣传员工责任感的重要性，管理人员要给全体员工灌输责任意识，危机意识和团队意识，要让大家清楚地认识企业是全体员工共同的企业。
	</div>
	<div>
		四．企业文化能赋予员工的荣誉感。每个人都要在自己的工作岗位，工作领域，多做贡献，多出成绩，多追求荣誉感。
	</div>
	<div>
		五．企业文化能实现员工的成就感。一个企业的繁荣昌盛关系到每一个公司员工的生存，企业繁荣了，员工们就会引以为豪，会更积极努力的进取，荣耀越高，成就感就越大，越明显。
	</div>
</div>
<div>
</div>','','','','','','','','0','6','Y','1331877791','1405493863');
INSERT INTO `yiif_page` VALUES('guide','新手指南','团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。','<div>
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
</div>','','','','','','','','0','8','Y','1379392484','0');

DROP TABLE IF EXISTS `yiif_post`;
CREATE TABLE `yiif_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '用户',
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
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_desc` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `tags_index` (`tags`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='内容管理';


DROP TABLE IF EXISTS `yiif_question`;
CREATE TABLE `yiif_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `qq` varchar(12) DEFAULT NULL COMMENT 'qq',
  `question` text NOT NULL COMMENT '内容',
  `client_ip` varchar(15) DEFAULT NULL COMMENT 'ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';


DROP TABLE IF EXISTS `yiif_recommend`;
CREATE TABLE `yiif_recommend` (
  `id` int(10) unsigned NOT NULL COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐内容表';

INSERT INTO `yiif_recommend` VALUES('1','15','0');
INSERT INTO `yiif_recommend` VALUES('1','16','1');

DROP TABLE IF EXISTS `yiif_recommend_position`;
CREATE TABLE `yiif_recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `recommend_name` varchar(100) DEFAULT NULL COMMENT '推荐位名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

INSERT INTO `yiif_recommend_position` VALUES('1','首页资讯推荐','1');
INSERT INTO `yiif_recommend_position` VALUES('2','首页图集推荐','2');
INSERT INTO `yiif_recommend_position` VALUES('3','首页软件推荐','3');
INSERT INTO `yiif_recommend_position` VALUES('4','图集视频推荐','4');
INSERT INTO `yiif_recommend_position` VALUES('5','首页商品推荐','5');

DROP TABLE IF EXISTS `yiif_reply`;
CREATE TABLE `yiif_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `cid` int(10) unsigned DEFAULT NULL COMMENT '评论id',
  `reply_id` int(10) unsigned DEFAULT NULL COMMENT '上级回复的id',
  `content` text COMMENT '回复内容',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='评论回复表';


DROP TABLE IF EXISTS `yiif_session`;
CREATE TABLE `yiif_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `yiif_session` VALUES('9v9v90f70aphj5jmkebakr9p71','1406793305','admin__returnUrl|s:22:\"/demo_yiifcms/?r=admin\";Yii.CCaptchaAction.7d57f8d3.question.captcha|s:6:\"garfla\";Yii.CCaptchaAction.7d57f8d3.question.captchacount|i:1;Yii.CCaptchaAction.7d57f8d3.user.captcha|s:6:\"bdebpb\";Yii.CCaptchaAction.7d57f8d3.user.captchacount|i:1;Yii.CCaptchaAction.7d57f8d3.admin/default.captcha|s:4:\"4f5c\";Yii.CCaptchaAction.7d57f8d3.admin/default.captchacount|i:5;admin__id|s:1:\"1\";admin__name|s:5:\"admin\";adminstatus|s:1:\"1\";adminnickname|s:5:\"admin\";admingroupid|s:2:\"10\";admingroupname|s:15:\"系统管理员\";adminemail|s:12:\"admin@qq.com\";admin__states|a:5:{s:6:\"status\";b:1;s:8:\"nickname\";b:1;s:7:\"groupid\";b:1;s:9:\"groupname\";b:1;s:5:\"email\";b:1;}');

DROP TABLE IF EXISTS `yiif_setting`;
CREATE TABLE `yiif_setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  PRIMARY KEY (`variable`,`scope`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';

INSERT INTO `yiif_setting` VALUES('base','admin_email','xb_zjh@126.com');
INSERT INTO `yiif_setting` VALUES('base','admin_logger','open');
INSERT INTO `yiif_setting` VALUES('base','admin_telephone','180000000');
INSERT INTO `yiif_setting` VALUES('email','email_fromname','YiifCMS官网');
INSERT INTO `yiif_setting` VALUES('email','email_host','');
INSERT INTO `yiif_setting` VALUES('email','email_password','');
INSERT INTO `yiif_setting` VALUES('email','email_port','25');
INSERT INTO `yiif_setting` VALUES('email','email_timeout','2');
INSERT INTO `yiif_setting` VALUES('email','email_totest','');
INSERT INTO `yiif_setting` VALUES('email','email_username','postmaster@yiifcms.com');
INSERT INTO `yiif_setting` VALUES('base','safe_str','!(*&%$$##');
INSERT INTO `yiif_setting` VALUES('seo','seo_description','yiifcms是个人开发的内容管理系统，方便学习yii，了解MVC架构, 也可以当做交流的平台。');
INSERT INTO `yiif_setting` VALUES('seo','seo_keywords','yii,php,html,web');
INSERT INTO `yiif_setting` VALUES('seo','seo_title','yiifcms打造顶级内容管理系统');
INSERT INTO `yiif_setting` VALUES('base','site_closed_summary','系统维护中，请稍候......');
INSERT INTO `yiif_setting` VALUES('base','site_copyright','Copyright @ 2014-2015');
INSERT INTO `yiif_setting` VALUES('base','site_domain','/');
INSERT INTO `yiif_setting` VALUES('base','site_icp','暂无');
INSERT INTO `yiif_setting` VALUES('base','site_name','yiif内容管理系统');
INSERT INTO `yiif_setting` VALUES('base','site_stats','');
INSERT INTO `yiif_setting` VALUES('base','site_status','open');
INSERT INTO `yiif_setting` VALUES('base','site_status_intro','网站目前正在备案，请稍后访问，谢谢....');
INSERT INTO `yiif_setting` VALUES('template','template','default');
INSERT INTO `yiif_setting` VALUES('template','theme','default');
INSERT INTO `yiif_setting` VALUES('upload','upload_allow_ext','jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf');
INSERT INTO `yiif_setting` VALUES('upload','upload_max_size','51200');
INSERT INTO `yiif_setting` VALUES('upload','upload_water_alpha','50');
INSERT INTO `yiif_setting` VALUES('upload','upload_water_pic','public/watermark.png');
INSERT INTO `yiif_setting` VALUES('upload','upload_water_scope','100x100');
INSERT INTO `yiif_setting` VALUES('upload','upload_water_size','100x100');
INSERT INTO `yiif_setting` VALUES('upload','upload_water_status','open');
INSERT INTO `yiif_setting` VALUES('base','user_mail_verify','open');
INSERT INTO `yiif_setting` VALUES('base','user_status','open');
INSERT INTO `yiif_setting` VALUES('custom','_address','北京市朝阳区');
INSERT INTO `yiif_setting` VALUES('custom','_fax','传真:(+86 10) 5992 0000');
INSERT INTO `yiif_setting` VALUES('custom','_mobile','180000000');
INSERT INTO `yiif_setting` VALUES('custom','_telephone','(+86 10) 5992 8888');

DROP TABLE IF EXISTS `yiif_soft`;
CREATE TABLE `yiif_soft` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '' COMMENT '软件标题',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `soft_icon` varchar(100) DEFAULT NULL COMMENT '软件图标',
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
  `pay` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览次数',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='软件管理表';


DROP TABLE IF EXISTS `yiif_special`;
CREATE TABLE `yiif_special` (
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
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '入库时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='专题';


DROP TABLE IF EXISTS `yiif_tag`;
CREATE TABLE `yiif_tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COMMENT='新闻标签';


DROP TABLE IF EXISTS `yiif_tag_data`;
CREATE TABLE `yiif_tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';


DROP TABLE IF EXISTS `yiif_upload`;
CREATE TABLE `yiif_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户名',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` varchar(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varbinary(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `file_ext` varchar(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_mime` varchar(50) NOT NULL DEFAULT '' COMMENT '文件头信息',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `down_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COMMENT='附件';


DROP TABLE IF EXISTS `yiif_user`;
CREATE TABLE `yiif_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `groupid` int(10) unsigned DEFAULT '0' COMMENT '用户组id',
  `status` tinyint(2) DEFAULT '1' COMMENT '-1待审核 0 -禁用  1-通过',
  `addtime` int(10) DEFAULT NULL COMMENT '注册时间',
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `sign` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `web` varchar(100) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号码',
  `qq` varchar(11) DEFAULT NULL COMMENT 'qq号码',
  `last_login_ip` varchar(15) DEFAULT NULL COMMENT '上次登录ip',
  `logins` int(10) unsigned DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';

INSERT INTO `yiif_user` VALUES('1','admin','$2a$08$psf2NA7b/cmdEKLP2kKU8ekNWa8NHdSXH3AH.r4hQ6kdh3VbY.fYK','admin@qq.com','10','1','1406789593','','','','','','','','0');

DROP TABLE IF EXISTS `yiif_user_group`;
CREATE TABLE `yiif_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) DEFAULT '' COMMENT '用户组名称',
  `acl` varchar(255) DEFAULT '' COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';

INSERT INTO `yiif_user_group` VALUES('1','普通用户','');
INSERT INTO `yiif_user_group` VALUES('2','VIP①用户','');
INSERT INTO `yiif_user_group` VALUES('3','VIP②用户','');
INSERT INTO `yiif_user_group` VALUES('4','VIP④用户','');
INSERT INTO `yiif_user_group` VALUES('5','VIP⑤用户','');
INSERT INTO `yiif_user_group` VALUES('6','VIP⑥用户','');
INSERT INTO `yiif_user_group` VALUES('7','VIP⑦用户','');
INSERT INTO `yiif_user_group` VALUES('8','VIP⑧用户','');
INSERT INTO `yiif_user_group` VALUES('9','网站编辑','default|login,catalog|index,catalog|create,all,link|index,link|create,link|update,link|delete,link|batch');
INSERT INTO `yiif_user_group` VALUES('10','系统管理员','Administrator');

DROP TABLE IF EXISTS `yiif_video`;
CREATE TABLE `yiif_video` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '' COMMENT '视频名称',
  `catalog_id` smallint(5) unsigned DEFAULT '0' COMMENT '分类id ',
  `cover_image` varchar(100) DEFAULT '' COMMENT '封面图片',
  `fileid` varchar(255) DEFAULT NULL COMMENT '文件id',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '视频语言',
  `video_type` varchar(10) NOT NULL DEFAULT '' COMMENT '视频类型',
  `video_score` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '视频评分',
  `video_size` varchar(10) NOT NULL DEFAULT '' COMMENT '视频大小',
  `download` varchar(100) DEFAULT '' COMMENT '下载链接',
  `introduce` text COMMENT '软件简介',
  `pay` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '支付费用',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最近更新时间',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `view_count` smallint(8) unsigned DEFAULT NULL COMMENT '观看次数',
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `voted` varchar(100) DEFAULT NULL COMMENT '投票结果',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='软件管理表';


