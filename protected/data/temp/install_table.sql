/*
Navicat MySQL Data Transfer
安装必要数据
Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : yiifcms

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-12-22 
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `#@__ad`
-- ----------------------------
DROP TABLE IF EXISTS `#@__ad`;
CREATE TABLE `#@__ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `position_id` int(10) unsigned NOT NULL COMMENT '广告位ID',
  `title` varchar(80) NOT NULL COMMENT '广告名称',
  `title_alias` varchar(40) NOT NULL DEFAULT '' COMMENT '标识',
  `link_url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
  `image_url` varchar(100) NOT NULL DEFAULT '' COMMENT '图片地址',
  `width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '图片宽',
  `height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '图片高',
  `introduce` text NOT NULL COMMENT '广告描述',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件路径',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='广告表';


-- ----------------------------
-- Table structure for `#@__ad_position`
-- ----------------------------
DROP TABLE IF EXISTS `#@__ad_position`;
CREATE TABLE `#@__ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'N-隐藏 Y-显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';

-- ----------------------------
-- Table structure for `#@__attention`
-- ----------------------------
DROP TABLE IF EXISTS `#@__attention`;
CREATE TABLE `#@__attention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='关注表';

-- ----------------------------
-- Table structure for `#@__catalog`
-- ----------------------------
DROP TABLE IF EXISTS `#@__catalog`;
CREATE TABLE `#@__catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '栏目类型',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类',
  `catalog_name` varchar(100) NOT NULL COMMENT '名称',
  `layer` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '层级',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` text NOT NULL COMMENT 'seo描述',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='全局分类';

-- ----------------------------
-- Table structure for `#@__collect`
-- ----------------------------
DROP TABLE IF EXISTS `#@__collect`;
CREATE TABLE `#@__collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='收藏表';


-- ----------------------------
-- Table structure for `#@__comment`
-- ----------------------------
DROP TABLE IF EXISTS `#@__comment`;
CREATE TABLE `#@__comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容id',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `client_ip` varchar(15) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='评论表';


-- ----------------------------
-- Table structure for `#@__friend`
-- ----------------------------
DROP TABLE IF EXISTS `#@__friend`;
CREATE TABLE `#@__friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `friend_user_id` int(10) unsigned DEFAULT '0' COMMENT '好友uid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='好友表';

-- ----------------------------
-- Table structure for `#@__album`
-- ----------------------------
DROP TABLE IF EXISTS `#@__album`;
CREATE TABLE `#@__album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图片',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '封面缩略图',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '头条',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='图集表';

-- ----------------------------
-- Table structure for `#@__album_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__album_content`;
CREATE TABLE `#@__album_content` (
  `album_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图集id',
  `album_list` text NOT NULL COMMENT '组图',
  `introduce` text NOT NULL COMMENT '摘要',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `seo_description` text NOT NULL COMMENT 'SEO描述',
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图集内容表';

-- ----------------------------
-- Table structure for `#@__link`
-- ----------------------------
DROP TABLE IF EXISTS `#@__link`;
CREATE TABLE `#@__link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接',
  `logo` varchar(100) NOT NULL DEFAULT '' COMMENT 'LOGO图标',
  `sort_order` smallint(10) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='链接表';


-- ----------------------------
-- Table structure for `#@__mail_log`
-- ----------------------------
DROP TABLE IF EXISTS `#@__mail_log`;
CREATE TABLE `#@__mail_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accept` varchar(50) NOT NULL DEFAULT '' COMMENT '收件人邮箱',
  `subject` varchar(100) NOT NULL DEFAULT '' COMMENT '邮件标题',
  `message` text NOT NULL COMMENT '邮件内容',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  `status` enum('waiting','success','failed') NOT NULL DEFAULT 'waiting' COMMENT '当前邮件状态(待发送、发送成功、发送失败)',
  `level` enum('1','2','3') NOT NULL DEFAULT '3' COMMENT '邮件优先级(越小越优先)',
  `times` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '发送次数',
  `error` varchar(100) NOT NULL DEFAULT '' COMMENT '错误信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='邮件日志表';

-- ----------------------------
-- Table structure for `#@__menu`
-- ----------------------------
DROP TABLE IF EXISTS `#@__menu`;
CREATE TABLE `#@__menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL DEFAULT '' COMMENT '导航菜单',
  `menu_link` varchar(50) NOT NULL DEFAULT '' COMMENT '导航链接',
  `unique` varchar(20) NOT NULL DEFAULT '' COMMENT '唯一标示',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';


-- ----------------------------
-- Table structure for `#@__model_type`
-- ----------------------------
DROP TABLE IF EXISTS `#@__model_type`;
CREATE TABLE `#@__model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  `seo_title` varchar(100) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(200) DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='内容模型表';


-- ----------------------------
-- Table structure for `#@__oauth`
-- ----------------------------
DROP TABLE IF EXISTS `#@__oauth`;
CREATE TABLE `#@__oauth` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `apiname` varchar(50) DEFAULT NULL COMMENT 'api名称',
  `apiconfig` text COMMENT '接口配置',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方登录授权表';


-- ----------------------------
-- Table structure for `#@__oauth_qq`
-- ----------------------------
DROP TABLE IF EXISTS `#@__oauth_qq`;
CREATE TABLE `#@__oauth_qq` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'qq令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='qq绑定表';


-- ----------------------------
-- Table structure for `#@__oauth_renren`
-- ----------------------------
DROP TABLE IF EXISTS `#@__oauth_renren`;
CREATE TABLE `#@__oauth_renren` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人人网绑定表';


-- ----------------------------
-- Table structure for `#@__oauth_sinawb`
-- ----------------------------
DROP TABLE IF EXISTS `#@__oauth_sinawb`;
CREATE TABLE `#@__oauth_sinawb` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新浪微博绑定表';


-- ----------------------------
-- Table structure for `#@__oauth_weixin`
-- ----------------------------
DROP TABLE IF EXISTS `#@__oauth_weixin`;
CREATE TABLE `#@__oauth_weixin` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信绑定表';

-- ----------------------------
-- Table structure for `#@__page`
-- ----------------------------
DROP TABLE IF EXISTS `#@__page`;
CREATE TABLE `#@__page` (
  `id` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '简单描述',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO KEYWORDS',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO DESCRIPTION',
  `link` varchar(100) NOT NULL DEFAULT '' COMMENT '外部链接',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单页';


-- ----------------------------
-- Table structure for `#@__post`
-- ----------------------------
DROP TABLE IF EXISTS `#@__post`;
CREATE TABLE `#@__post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',  
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `attention_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注次数',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '置顶',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `tags_index` (`tags`) USING BTREE,
  KEY `view_count` (`view_count`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Table structure for `#@__post_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__post_content`;
CREATE TABLE `#@__post_content` (
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `introduce` varchar(200) NOT NULL COMMENT '摘要',
  `content` mediumtext NOT NULL COMMENT '内容',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章内容表';

-- ----------------------------
-- Table structure for `#@__question`
-- ----------------------------
DROP TABLE IF EXISTS `#@__question`;
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';


-- ----------------------------
-- Table structure for `#@__recommend`
-- ----------------------------
DROP TABLE IF EXISTS `#@__recommend`;
CREATE TABLE `#@__recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型 ',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '内容标题',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序(默认从小到大排序)',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='推荐内容表';


-- ----------------------------
-- Table structure for `#@__recommend_position`
-- ----------------------------
DROP TABLE IF EXISTS `#@__recommend_position`;
CREATE TABLE `#@__recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='推荐位表';



-- ----------------------------
-- Table structure for `#@__reply`
-- ----------------------------
DROP TABLE IF EXISTS `#@__reply`;
CREATE TABLE `#@__reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论id',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级回复的id',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '回复内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='评论回复表';


-- ----------------------------
-- Table structure for `#@__setting`
-- ----------------------------
DROP TABLE IF EXISTS `#@__setting`;
CREATE TABLE `#@__setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  PRIMARY KEY (`variable`,`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统配置';


-- ----------------------------
-- Table structure for `#@__soft`
-- ----------------------------
DROP TABLE IF EXISTS `#@__soft`;
CREATE TABLE `#@__soft` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '软件标题',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类id ',
  `soft_icon` varchar(100) NOT NULL DEFAULT '' COMMENT '软件图标',
  `cover_image` varchar(100) NOT NULL DEFAULT '' COMMENT '封面图片',  
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '软件语言',
  `softtype` varchar(10) NOT NULL DEFAULT '' COMMENT '软件类型',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '操作系统',
  `softrank` enum('5','4','3','2','1') NOT NULL DEFAULT '5' COMMENT '软件等级',
  `softsize` varchar(10) NOT NULL DEFAULT '' COMMENT '软件大小',
  `softlink` varchar(100) NOT NULL DEFAULT '' COMMENT '软件外部下载链接',  
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `create_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `down_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `tags` varchar(100) NOT NULL DEFAULT '' COMMENT '标签',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='软件管理表';

-- ----------------------------
-- Table structure for `#@__soft_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__soft_content`;
CREATE TABLE `#@__soft_content` (
  `soft_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '软件id',
  `soft_file` varchar(100) NOT NULL DEFAULT '' COMMENT '文件路径',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '摘要',
  `content` text NOT NULL COMMENT '内容',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  PRIMARY KEY (`soft_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='软件内容表';

-- ----------------------------
-- Table structure for `#@__special`
-- ----------------------------
DROP TABLE IF EXISTS `#@__special`;
CREATE TABLE `#@__special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '专题简介',
  `img_cover` varchar(100) NOT NULL DEFAULT '' COMMENT '专题封面',
  `img_banner` varchar(100) NOT NULL DEFAULT '' COMMENT '专题banner',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'seo描述',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '入库时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='专题';


-- ----------------------------
-- Table structure for `#@__tag`
-- ----------------------------
DROP TABLE IF EXISTS `#@__tag`;
CREATE TABLE `#@__tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`),
  KEY `data_count` (`data_count`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='新闻标签';


-- ----------------------------
-- Table structure for `#@__tag_data`
-- ----------------------------
DROP TABLE IF EXISTS `#@__tag_data`;
CREATE TABLE `#@__tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';


-- ----------------------------
-- Table structure for `#@__user`
-- ----------------------------
DROP TABLE IF EXISTS `#@__user`;
CREATE TABLE `#@__user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `groupid` int(10) unsigned DEFAULT '1' COMMENT '用户组id',
  `status` tinyint(2) DEFAULT '1' COMMENT '-1待审核 0 -禁用  1-通过',
  `addtime` int(10) DEFAULT NULL COMMENT '注册时间',
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `sign` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `web` varchar(100) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号码',
  `qq` varchar(11) DEFAULT NULL COMMENT 'qq号码',
  `register_ip` varchar(15) DEFAULT '0.0.0.0' COMMENT '注册ip',
  `last_login_ip` varchar(15) DEFAULT '0.0.0.0' COMMENT '上次登录ip',
  `logins` int(10) unsigned DEFAULT '0' COMMENT '登录次数',
  `username_editable` enum('Y','N') DEFAULT 'N' COMMENT '用户名是否可编辑',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';


-- ----------------------------
-- Table structure for `#@__user_group`
-- ----------------------------
DROP TABLE IF EXISTS `#@__user_group`;
CREATE TABLE `#@__user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL DEFAULT '' COMMENT '用户组名称',
  `acl` text NOT NULL COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户组';


-- ----------------------------
-- Table structure for `#@__video`
-- ----------------------------
DROP TABLE IF EXISTS `#@__video`;
CREATE TABLE `#@__video` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '视频名称',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类id ',
  `cover_image` varchar(100) NOT NULL DEFAULT '' COMMENT '封面图片',  
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '视频语言',
  `video_type` varchar(10) NOT NULL DEFAULT '' COMMENT '视频类型',
  `video_score` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '视频评分',
  `video_size` varchar(10) NOT NULL DEFAULT '' COMMENT '视频大小',
  `download` varchar(100) NOT NULL DEFAULT '' COMMENT '下载链接', 
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `view_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '观看次数',
  `down_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `voted` varchar(100) NOT NULL DEFAULT '' COMMENT '投票结果',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `tags` varchar(100) NOT NULL DEFAULT '' COMMENT '标签',  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='视频管理表';

-- ----------------------------
-- Table structure for `#@__video_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__video_content`;
CREATE TABLE `#@__video_content` (
  `video_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '视频id',
  `video_file` varchar(255) NOT NULL DEFAULT '' COMMENT '视频文件路径',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '视频简介',
  `content` text NOT NULL COMMENT '内容',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频内容表';


-- ----------------------------
-- 菜单
-- ----------------------------
INSERT INTO `#@__menu` VALUES ('1', '首页', 'index.php', 'index', 'Y', '0', '1', 'N');
INSERT INTO `#@__menu` VALUES ('2', '精品阅读', '/?r=post/index', 'post', 'Y', '0', '2', 'N');
INSERT INTO `#@__menu` VALUES ('3', '视频', '/?r=video/index', 'video', 'Y', '0', '5', 'N');
INSERT INTO `#@__menu` VALUES ('4', '下载', '/?r=soft/index', 'soft', 'Y', '0', '3', 'N');
INSERT INTO `#@__menu` VALUES ('5', '图集', '/?r=album/index', 'album', 'Y', '0', '4', 'N');
INSERT INTO `#@__menu` VALUES ('6', '导读', '/?r=page/index&id=guide', 'guide', 'Y', '0', '6', 'N');
INSERT INTO `#@__menu` VALUES ('7', '反馈', '/?r=question/index', 'question', 'Y', '0', '7', 'N');


-- ----------------------------
-- 内容模型
-- ----------------------------
INSERT INTO `#@__model_type` VALUES ('1', 'post', '文章', 'Post', 'Y', '专业讲解web相关的文章和知识点', 'web, php,mysql, nginx,yii,数据库，运维,服务器', '聚合了优质的IT文章，无论你是前端工程师，还是后端程序员，都可以找到你想了解的知识和资讯，更多内容尽在yiifcms。');
INSERT INTO `#@__model_type` VALUES ('2', 'album', '图集', 'Album', 'Y', '最新最全的热门图集、精品爆图、美图', '图片，图集，最新，热门，精品，最全，美女，爆料，搞笑', '展示了用户最喜爱的美女图片、爆料图片、搞笑图片，惊爆眼球，更多内容尽在yiifcms。');
INSERT INTO `#@__model_type` VALUES ('3', 'soft', '软件', 'Soft', 'Y', '最新发布的yiifcms、热门手册、免费下载、建站工具', 'yii，cms，免费，下载，最新，热门，最全，精品，建站，工具，安全，稳定', '提供了web开发人员的建站工具和yiifcms发布版本，供感兴趣的用户下载和使用，详情了解尽在yiifcms。');
INSERT INTO `#@__model_type` VALUES ('4', 'video', '视频', 'Video', 'Y', '最新上映的电影、热门视频、热播电视剧、下载视频', '视频，电影，微电影，电视剧，MV，MTV，最新，热门，热播，高清，下载', '聚合了用户最喜爱的视频，尽在yiifcms。');

-- ----------------------------
-- 授权登录
-- ----------------------------
INSERT INTO `#@__oauth` VALUES ('qq', 'QQ', '{\"appid\":101145243,\"appkey\":\"1016c728351ccd6756becae709b295f3\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/qq_callback\",\"scope\":\"get_user_info,add_t,del_t,get_info\",\"errorReport\":true,\"storageType\":\"file\"}', 'Y');
INSERT INTO `#@__oauth` VALUES ('renren', '人人网', '{\"app_key\":\"93f2b098f2244b6689e712406e20287f\",\"app_secret\":\"ab7910a1a77d4d60ac1db0a841c256d1\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/renren_callback\"}', 'Y');
INSERT INTO `#@__oauth` VALUES ('sinawb', '新浪微博', '{\"wb_akey\":\"818474510\",\"wb_skey\":\"2ae7d6bd43c759081c707ddfa029b409\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/sinawb_callback\"}', 'Y');
INSERT INTO `#@__oauth` VALUES ('weixin', '微信', '{\"app_id\":\"wx473d4dd4a7080847\",\"app_secret\":\"2e16bd090d16842a4b3e72616fda5086\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/weixin_callback\"}', 'Y');

-- ----------------------------
-- 网站配置
-- ----------------------------
INSERT INTO `#@__setting` VALUES ('base', 'admin_email', '');
INSERT INTO `#@__setting` VALUES ('base', 'admin_logger', 'open');
INSERT INTO `#@__setting` VALUES ('base', 'site_stats', '');
INSERT INTO `#@__setting` VALUES ('base', 'admin_telephone', '180000000');
INSERT INTO `#@__setting` VALUES ('cache', 'cache_status', 'open');
INSERT INTO `#@__setting` VALUES ('cache', 'cache_type', 'filecache');
INSERT INTO `#@__setting` VALUES ('access', 'deny_access_ip', '');
INSERT INTO `#@__setting` VALUES ('base', 'deny_access_ip', '');
INSERT INTO `#@__setting` VALUES ('access', 'deny_register_ip', '193.201.224.*\r\n42.121.43.*');
INSERT INTO `#@__setting` VALUES ('base', 'deny_register_ip', '193.201.224.*\r\n42.121.43.*');
INSERT INTO `#@__setting` VALUES ('email', 'email_active', 'open');
INSERT INTO `#@__setting` VALUES ('email', 'email_fromname', 'yiifcms官网');
INSERT INTO `#@__setting` VALUES ('email', 'email_host', 'smtp.mxhichina.com');
INSERT INTO `#@__setting` VALUES ('email', 'email_password', '');
INSERT INTO `#@__setting` VALUES ('email', 'email_port', '25');
INSERT INTO `#@__setting` VALUES ('email', 'email_timeout', '2');
INSERT INTO `#@__setting` VALUES ('email', 'email_totest', '326196998@qq.com');
INSERT INTO `#@__setting` VALUES ('email', 'email_username', 'postmaster@yiifcms.com');
INSERT INTO `#@__setting` VALUES ('base', 'encrypt', 'md5');
INSERT INTO `#@__setting` VALUES ('base', 'safe_str', '!(*&%$$&%%');
INSERT INTO `#@__setting` VALUES ('seo', 'seo_description', 'yiifcms是基于yii框架开发的内容管理系统(CMS)，功能强大，运行高效，稳定安全，是学习php和建站的良好选择。');
INSERT INTO `#@__setting` VALUES ('seo', 'seo_keywords', 'yii,cms,php,mysql,nginx,web,开源,下载,手册,系统');
INSERT INTO `#@__setting` VALUES ('seo', 'seo_title', 'yiifcms打造顶级内容管理系统');
INSERT INTO `#@__setting` VALUES ('cache', 'setting_filecache', 'a:2:{s:5:\"class\";s:10:\"CFileCache\";s:14:\"directoryLevel\";s:1:\"2\";}');
INSERT INTO `#@__setting` VALUES ('cache', 'setting_memcache', 'a:3:{s:5:\"class\";s:9:\"CMemCache\";s:4:\"host\";s:9:\"127.0.0.1\";s:4:\"port\";s:5:\"11211\";}');
INSERT INTO `#@__setting` VALUES ('cache', 'setting_rediscache', 'a:4:{s:5:\"class\";s:21:\"ext.redis.CRedisCache\";s:4:\"host\";s:9:\"localhost\";s:4:\"port\";s:4:\"6379\";s:8:\"database\";i:0;}');
INSERT INTO `#@__setting` VALUES ('base', 'site_closed_summary', '系统维护中，请稍候......');
INSERT INTO `#@__setting` VALUES ('base', 'site_copyright', 'Copyright @ 2014-2015');
INSERT INTO `#@__setting` VALUES ('base', 'site_domain', '/');
INSERT INTO `#@__setting` VALUES ('base', 'site_icp', '京ICP备14037201号-1');
INSERT INTO `#@__setting` VALUES ('base', 'site_name', 'yiifcms打造顶级内容管理系统');
INSERT INTO `#@__setting` VALUES ('base', 'site_status', 'open');
INSERT INTO `#@__setting` VALUES ('base', 'site_status_intro', '网站目前正在维护，请稍后访问，谢谢....');
INSERT INTO `#@__setting` VALUES ('template', 'theme', 'default');
INSERT INTO `#@__setting` VALUES ('base', 'user_mail_verify', 'open');
INSERT INTO `#@__setting` VALUES ('base', 'user_status', 'open');
INSERT INTO `#@__setting` VALUES ('custom', '_address', '北京市朝阳区1');
INSERT INTO `#@__setting` VALUES ('custom', '_fax', '传真:XXXXXX');
INSERT INTO `#@__setting` VALUES ('custom', '_mobile', '180000000');
INSERT INTO `#@__setting` VALUES ('custom', '_telephone', 'XXXXXXXXXXX');

-- ----------------------------
-- 用户组
-- ----------------------------
INSERT INTO `#@__user_group` VALUES ('1', '普通用户', '');
INSERT INTO `#@__user_group` VALUES ('2', 'VIP①用户', '');
INSERT INTO `#@__user_group` VALUES ('3', 'VIP②用户', '');
INSERT INTO `#@__user_group` VALUES ('4', 'VIP④用户', '');
INSERT INTO `#@__user_group` VALUES ('5', 'VIP⑤用户', '');
INSERT INTO `#@__user_group` VALUES ('6', 'VIP⑥用户', '');
INSERT INTO `#@__user_group` VALUES ('7', 'VIP⑦用户', '');
INSERT INTO `#@__user_group` VALUES ('8', 'VIP⑧用户', '');
INSERT INTO `#@__user_group` VALUES ('9', '网站编辑', 'default|login,catalog|index,menu|index,special|index,post|index,album|index,soft|index,video|index,goods|index,page|index,comment|index,reply|index,tag|index,recommendPosition|index,user|index,question|index,link|index,adPosition|index,ad|index,attach|index,modeltype|index,database|index,cache|index,maillog|index,oAuth|index');
INSERT INTO `#@__user_group` VALUES ('10', '系统管理员', 'Administrator');

-- ----------------------------
-- Table structure for `#@__spider_setting`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_setting`;
CREATE TABLE `#@__spider_setting` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '站点id',
  `site` varchar(50) NOT NULL DEFAULT '' COMMENT '站点名称',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '站点列表页地址',
  `list_charset` enum('UTF-8','GB2312','GBK') NOT NULL DEFAULT 'UTF-8' COMMENT '列表页编码',
  `content_charset` enum('UTF-8','GB2312','GBK') NOT NULL DEFAULT 'UTF-8' COMMENT '内容页编码',
  `item_rule_li` varchar(50) NOT NULL DEFAULT '' COMMENT '列表项Li选择规则',
  `item_rule_a` varchar(50) NOT NULL DEFAULT '' COMMENT '列表项A标签选择规则',
  `content_rule` varchar(50) NOT NULL DEFAULT '' COMMENT '详细页内容选择规则',
  `page_rule` varchar(100) NOT NULL DEFAULT '' COMMENT '分页正则',
  `cur_page` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '当前已采集页数',
  `total_page` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '需要采集总页数',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '采集内容类型 与内容模型保持一致',
  `filter_rule` text NOT NULL COMMENT '内容过滤规则',
  `soft_icon_rule` varchar(50) NOT NULL DEFAULT '' COMMENT '软件图标标签规则',
  `video_cover_rule` varchar(50) NOT NULL DEFAULT '' COMMENT '视频封面图片标签规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='采集站点配置表';

-- ----------------------------
-- 采集站点设置默认项
-- ----------------------------
INSERT INTO `#@__spider_setting` VALUES ('1', '网易互联网科技阅读', 'http://tech.163.com/internet/', 'GBK', 'GB2312', '#news-flow-content li', '.titleBar h3 a', '#endText', 'http://tech.163.com/special/0009rt/tech_hlw_0[PAGE_NUM].html', '0', '2', '1', '/(<iframe(.*?)>(.*?)<\\/iframe>)/is\r\n/(<div class=\"ep-source cDGray\">(.*?)<\\/div>)/is\r\n', '', '');
INSERT INTO `#@__spider_setting` VALUES ('2', 'csdn互联网新闻', 'http://blog.csdn.net/web/newest.html', 'UTF-8', 'UTF-8', 'div.main_center .blog_list', 'h1 a', '#article_content', 'http://blog.csdn.net/web/newest.html?&page=[PAGE_NUM]', '0', '2', '1', '', '', '');
INSERT INTO `#@__spider_setting` VALUES ('3', '开源中国-php', 'http://www.oschina.net/code/list?lang=php&catalog=&show=time', 'UTF-8', 'UTF-8', 'div.code_list ul li', 'h3.code_title a', 'div.Body', 'http://www.oschina.net/code/list?lang=php&catalog=&show=time&sort=&p=[PAGE_NUM]', '0', '2', '1', '', '', '');
INSERT INTO `#@__spider_setting` VALUES ('4', '唯美图片-意境', 'http://www.wmpic.me/tupian/yijing/', 'UTF-8', 'UTF-8', '#mainbox .item_list .item_box', 'div.inner_item_box h2 a', '#content .content-c', 'http://www.wmpic.me/tupian/yijing/page/[PAGE_NUM]', '0', '3', '2', '', '', '');
INSERT INTO `#@__spider_setting` VALUES ('5', '非凡软件-应用软件', 'http://www.crsky.com/list/r_2_1.html', 'GB2312', 'GB2312', 'div.entry', 'h3 a', '#rom_des', 'http://www.crsky.com/list/r_2_[PAGE_NUM].html', '0', '1', '3', '', '.left p a img', '');
INSERT INTO `#@__spider_setting` VALUES ('6', '爱奇艺 - 电影', 'http://list.iqiyi.com/www/1/----------------iqiyi--.html', 'UTF-8', 'UTF-8', '.wrapper-piclist ul li', 'p.site-piclist_info_title a', '#datainfo-desc-text', 'http://list.iqiyi.com/www/1/-------------11-[PAGE_NUM]-1-iqiyi--.html', '0', '1', '4', '', '', '.site-piclist_pic a img');

-- ----------------------------
-- Table structure for `#@__spider_post_list`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_post_list`;
CREATE TABLE `#@__spider_post_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页地址',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 - 内容未采集  1-内容已采集 2-数据已导入',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集文章列表数据表';

-- ----------------------------
-- Table structure for `#@__spider_post_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_post_content`;
CREATE TABLE `#@__spider_post_content` (
  `list_id` int(10) unsigned NOT NULL COMMENT '列表id',
  `content` text NOT NULL COMMENT '详细内容',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集文章内容数据表';

-- ----------------------------
-- Table structure for `#@__spider_image_list`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_image_list`;
CREATE TABLE `#@__spider_image_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页地址',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 - 内容未采集  1-内容已采集 2-数据已导入',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集图集列表数据表';

-- ----------------------------
-- Table structure for `#@__spider_image_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_image_content`;
CREATE TABLE `#@__spider_image_content` (
  `list_id` int(10) unsigned NOT NULL COMMENT '列表id',
  `cover_img` varchar(100) NOT NULL DEFAULT '' COMMENT '封面图片',
  `cover_img_thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '封面图片缩略图',
  `image_list` text NOT NULL COMMENT '图集列表',
  `content` text NOT NULL COMMENT '详细内容',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集图集内容数据表';

-- ----------------------------
-- Table structure for `#@__spider_soft_list`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_soft_list`;
CREATE TABLE `#@__spider_soft_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页地址',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 - 内容未采集  1-内容已采集 2-数据已导入',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='采集软件列表数据表';

-- ----------------------------
-- Table structure for `#@__spider_soft_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_soft_content`;
CREATE TABLE `#@__spider_soft_content` (
  `list_id` int(10) unsigned NOT NULL COMMENT '列表id',
  `soft_img` varchar(100) NOT NULL DEFAULT '' COMMENT '软件图片',
  `soft_icon` varchar(100) NOT NULL DEFAULT '' COMMENT '软件图标',
  `content` text NOT NULL COMMENT '详细内容',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集软件内容数据表';


-- ----------------------------
-- Table structure for `#@__spider_video_list`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_video_list`;
CREATE TABLE `#@__spider_video_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页地址',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 - 内容未采集  1-内容已采集 2-数据已导入',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='采集视频列表数据表';

-- ----------------------------
-- Table structure for `#@__spider_video_content`
-- ----------------------------
DROP TABLE IF EXISTS `#@__spider_video_content`;
CREATE TABLE `#@__spider_video_content` (
  `list_id` int(10) unsigned NOT NULL COMMENT '列表id',
  `cover_img` varchar(100) NOT NULL DEFAULT '' COMMENT '视频封面',
  `content` text NOT NULL COMMENT '详细内容',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集视频内容数据表';
