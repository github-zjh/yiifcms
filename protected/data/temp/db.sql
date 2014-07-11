-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: yii
-- ------------------------------------------------------
-- Server version	5.5.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `#@__ad`
--

DROP TABLE IF EXISTS `#@__ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__ad` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__ad_position`
--

DROP TABLE IF EXISTS `#@__ad_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__catalog`
--

DROP TABLE IF EXISTS `#@__catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__catalog` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- 转存表中的数据 `#@__catalog`
--

INSERT INTO `#@__catalog` (`id`, `type`, `parent_id`, `catalog_name`, `content`, `seo_title`, `seo_keywords`, `seo_description`, `attach_file`, `attach_thumb`, `sort_order`, `data_count`, `status`, `redirect_url`, `create_time`, `update_time`) VALUES
(1, 1, 0, '新闻', '新闻<br />', 'd', 'd', 'd', '', '', 0, 0, 'Y', '', 1379545020, 1403766555),
(2, 1, 1, '业界讯息', '公司动态栏目介绍', '', '', '', '', '', 2, 0, 'Y', '', 1379545199, 1404109846),
(3, 1, 1, 'IT资讯', '行业新闻栏目介绍', '', '', '', '', '', 1, 0, 'Y', '', 1379545248, 1404109600),
(4, 5, 0, '产品', '产品栏目介绍', '', '', '', '', '', 0, 0, 'Y', '', 1379545330, 1394517482),
(5, 5, 4, '新品上市', '新品上市栏目介绍', '', '', '', '', '', 1, 0, 'Y', '', 1379545388, 1394517482),
(6, 5, 4, '特价商品', '特价商品栏目介绍', '', '', '', '', '', 0, 0, 'N', '', 1379545435, 1394517482),
(8, 2, 0, '图集', '', '', '', '', '', '', 0, 0, 'Y', '', 0, 1399616730),
(9, 2, 8, '最新热图', '最新热图', '最新热图', '最新热图', '最新热图', '', '', 0, 0, 'Y', '', 0, 1399616723),
(10, 3, 0, '热门软件', '', '热门软件', '热门软件', '热门软件', '', '', 0, 0, 'Y', '', 1400489000, 1400489000),
(11, 3, 10, '网站软件', '网站软件', '网站软件', '网站软件', '网站软件', '', '', 0, 0, 'Y', '', 1400489069, 1400489069),
(12, 4, 0, '最新视频', '', '', '', '', '', '', 0, 0, 'Y', '', 1400828336, 1400828336),
(13, 4, 12, '最新电影', '', '', '', '', '', '', 0, 0, 'Y', '', 1400828453, 1400828453),
(14, 2, 8, '网络美女', '', '', '', '', '', '', 0, 0, 'Y', '', 1404111907, 1404111907);
--
-- Table structure for table `#@__comment`
--

DROP TABLE IF EXISTS `#@__comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__comment` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__goods`
--

DROP TABLE IF EXISTS `#@__goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__goods` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__image`
--

DROP TABLE IF EXISTS `#@__image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__image` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__link`
--

DROP TABLE IF EXISTS `#@__link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `logo` varchar(255) DEFAULT NULL COMMENT 'LOGO图标',
  `sortorder` smallint(10) DEFAULT '255' COMMENT '排序',
  `status_is` enum('Y','N') DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='链接表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__mail_log`
--

DROP TABLE IF EXISTS `#@__mail_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__mail_log` (
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='发送邮件日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__menu`
--

DROP TABLE IF EXISTS `#@__menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__menu` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- 转存表中的数据 `#@__menu`
--

INSERT INTO `#@__menu` (`id`, `menu_name`, `menu_link`, `unique`, `status_is`, `parent_id`, `sort_order`, `target`) VALUES
(1, '首页', '/', 'index', 'Y', 0, 0, 'N'),
(2, '资讯', '/?r=post/index', 'post', 'Y', 0, 0, 'N'),
(3, '图集', '/?r=image/index', 'image', 'Y', 0, 0, 'N'),
(4, '软件', '/?r=soft/index', 'soft', 'Y', 0, 0, 'N'),
(5, '视频', '/?r=video/index', 'video', 'Y', 0, 0, 'N'),
(6, '关于我们', '/?r=page/about', 'about', 'Y', 0, 0, 'N'),
(7, '留言反馈', '/?r=question/index', 'question', 'Y', 0, 0, 'N');

--
-- Table structure for table `#@__model_type`
--

DROP TABLE IF EXISTS `#@__model_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='内容模型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- 转存表中的数据 `#@__model_type`
--

INSERT INTO `#@__model_type` (`id`, `type_key`, `type_name`, `model`, `status`) VALUES
(1, 'post', '文章', 'Post', 'Y'),
(2, 'image', '图集', 'Image', 'Y'),
(3, 'soft', '软件', 'Soft', 'Y'),
(4, 'video', '视频', 'Video', 'Y'),
(5, 'goods', '商品', 'Goods', 'Y');
--
-- Table structure for table `#@__page`
--

DROP TABLE IF EXISTS `#@__page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__page` (
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
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='单页';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__post`
--

DROP TABLE IF EXISTS `#@__post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__post` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__question`
--

DROP TABLE IF EXISTS `#@__question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__question` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__recommend`
--

DROP TABLE IF EXISTS `#@__recommend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__recommend` (
  `id` int(10) unsigned NOT NULL COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `sort_order` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__recommend_position`
--

DROP TABLE IF EXISTS `#@__recommend_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `recommend_name` varchar(100) DEFAULT NULL COMMENT '推荐位名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='推荐位表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__reply`
--

DROP TABLE IF EXISTS `#@__reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `cid` int(10) unsigned DEFAULT NULL COMMENT '评论id',
  `reply_id` int(10) unsigned DEFAULT NULL COMMENT '上级回复的id',
  `content` text COMMENT '回复内容',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='评论回复表';
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `#@__setting`
--

DROP TABLE IF EXISTS `#@__setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- 转存表中的数据 `#@__setting`
--

INSERT INTO `#@__setting` (`scope`, `variable`, `value`, `description`) VALUES
('base', 'site_name', 'yii内容管理系统', ''),
('base', 'site_domain', '/', ''),
('base', 'admin_email', '', ''),
('base', 'site_icp', '暂无', ''),
('base', 'site_closed_summary', '系统维护中，请稍候......', ''),
('base', 'site_stats', '', ''),
('seo', 'seo_title', 'yiifcmsV1.0打造顶级内容管理系统', ''),
('seo', 'seo_description', 'yiifcmsV1.0是个人开发的内容管理系统，方便学习yii，了解MVC架构, 也可以当做交流的平台。', ''),
('seo', 'seo_keywords', 'yii,php,html,web', ''),
('base', 'admin_telephone', '180000000', ''),
('base', 'site_status', 'open', ''),
('base', 'site_status_intro', '网站正在维护，对您带来的不便我们深表歉意，请稍后再来访问...', ''),
('base', 'admin_logger', 'open', ''),
('base', 'user_status', 'open', ''),
('base', 'user_mail_verify', 'open', ''),
('base', 'site_copyright', 'Copyright @ 2014-2015', ''),
('upload', 'upload_water_size', '100x100', ''),
('upload', 'upload_water_pic', 'public/watermark.png', ''),
('upload', 'upload_water_status', 'open', ''),
('upload', 'upload_allow_ext', 'jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf', ''),
('upload', 'upload_max_size', '51200', ''),
('upload', 'upload_water_scope', '100x100', ''),
('upload', 'upload_water_alpha', '50', ''),
('custom', '_address', '北京市朝阳区', ''),
('custom', '_telephone', '(+86 10) 5992 8888', ''),
('custom', '_fax', '传真:(+86 10) 5992 0000', ''),
('custom', '_mobile', '180000000', ''),
('template', 'theme', 'default', ''),
('template', 'template', 'default', '');


--
-- Table structure for table `#@__soft`
--

DROP TABLE IF EXISTS `#@__soft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__soft` (
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
  `down_count` smallint(8) unsigned DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` text COMMENT 'SEO描述',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='软件管理表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__special`
--

DROP TABLE IF EXISTS `#@__special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__special` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__tag`
--

DROP TABLE IF EXISTS `#@__tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='新闻标签';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__tag_data`
--

DROP TABLE IF EXISTS `#@__tag_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__upload`
--

DROP TABLE IF EXISTS `#@__upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__upload` (
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
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COMMENT='附件';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__user`
--

DROP TABLE IF EXISTS `#@__user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__user` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `#@__user_group`
--

DROP TABLE IF EXISTS `#@__user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) DEFAULT '' COMMENT '用户组名称',
  `acl` varchar(255) DEFAULT '' COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- 转存表中的数据 `#@__user_group`
--

INSERT INTO `#@__user_group` (`id`, `group_name`, `acl`) VALUES
(1, '普通用户', ''),
(2, 'VIP①用户', ''),
(3, 'VIP②用户', ''),
(4, 'VIP④用户', ''),
(5, 'VIP⑤用户', ''),
(6, 'VIP⑥用户', ''),
(7, 'VIP⑦用户', ''),
(8, 'VIP⑧用户', ''),
(9, '网站编辑', 'default|login,catalog|index,catalog|create,all,link|index,link|create,link|update,link|delete,link|batch'),
(10, '系统管理员', 'Administrator');

--
-- Table structure for table `#@__video`
--

DROP TABLE IF EXISTS `#@__video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `#@__video` (
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
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-07 11:30:26
