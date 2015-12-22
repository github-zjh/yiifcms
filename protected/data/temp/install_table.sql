/*
Navicat MySQL Data Transfer

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
-- Table structure for `#@__image`
-- ----------------------------
DROP TABLE IF EXISTS `#@__image`;
CREATE TABLE `#@__image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title_second` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `catalog_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `special_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '专题编号',
  `introduce` text COMMENT '摘要',
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
  `attach_file` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图片',
  `attach_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '封面缩略图',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '头条',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='内容管理';


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
  `introduce` varchar(200) NOT NULL COMMENT '摘要',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  `content` mediumtext NOT NULL COMMENT '内容',
  `copy_from` varchar(100) NOT NULL DEFAULT '' COMMENT '来源',
  `copy_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源url',
  `redirect_url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT 'tags',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `commend` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '推荐',
  `favorite_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `attention_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注次数',
  `top_line` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '置顶',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复次数',
  `reply_allow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '允许评论',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  KEY `tags_index` (`tags`) USING BTREE,
  KEY `view_count` (`view_count`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='内容管理';


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
  `soft_file` varchar(100) NOT NULL DEFAULT '' COMMENT '文件路径',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '软件语言',
  `softtype` varchar(10) NOT NULL DEFAULT '' COMMENT '软件类型',
  `os` varchar(100) NOT NULL DEFAULT '' COMMENT '操作系统',
  `softrank` enum('5','4','3','2','1') NOT NULL DEFAULT '5' COMMENT '软件等级',
  `softsize` varchar(10) NOT NULL DEFAULT '' COMMENT '软件大小',
  `softlink` varchar(100) NOT NULL DEFAULT '' COMMENT '软件外部下载链接',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '摘要',
  `content` text NOT NULL COMMENT '内容',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `create_time` int(10) unsigned NOT NULL COMMENT '发布时间',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `down_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `tags` varchar(100) NOT NULL DEFAULT '' COMMENT '标签',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='软件管理表';


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
  `video_file` varchar(255) NOT NULL DEFAULT '' COMMENT '视频文件路径',
  `language` varchar(10) NOT NULL DEFAULT '' COMMENT '视频语言',
  `video_type` varchar(10) NOT NULL DEFAULT '' COMMENT '视频类型',
  `video_score` decimal(3,1) unsigned NOT NULL DEFAULT '0.0' COMMENT '视频评分',
  `video_size` varchar(10) NOT NULL DEFAULT '' COMMENT '视频大小',
  `download` varchar(100) NOT NULL DEFAULT '' COMMENT '下载链接',
  `introduce` varchar(200) NOT NULL DEFAULT '' COMMENT '视频简介',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `view_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '观看次数',
  `down_count` smallint(8) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `voted` varchar(100) NOT NULL DEFAULT '' COMMENT '投票结果',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `tags` varchar(100) NOT NULL DEFAULT '' COMMENT '标签',
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='视频管理表';