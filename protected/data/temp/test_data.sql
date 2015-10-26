--comment_start
-- 数据库备份文件
-- 作者:      Sim Zhao <326196998@qq.com>
-- 时间：     2015-10-23 15:57:48
-- Mysql版本：5.6.24
-- PHP版本：  5.6.8
-- 程序版本： yiifcms1.4.2_UTF-8
--comment_end 
-----------------------------------mysql_cut_line---------------------------------

DROP TABLE IF EXISTS `y_ad`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_ad` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='广告表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '2' ,`position_id` = '4' ,`title` = '香港云服务器(尊云)' ,`title_alias` = 'index_top_banner' ,`link_url` = 'http://www.zun.com/zthk.html' ,`image_url` = '' ,`width` = '1170' ,`height` = '100' ,`introduce` = 'asdf' ,`attach_file` = '/upload/ad/201509/e2c87779863.jpg' ,`sort_order` = '1' ,`status` = 'N' ,`create_time` = '1407138989' ,`update_time` = '1443165387' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '3' ,`position_id` = '5' ,`title` = 'Tera(神域之战)' ,`title_alias` = 'index_bottom_banner' ,`link_url` = 'http://tera.kunlun.com/index.html' ,`image_url` = '' ,`width` = '1170' ,`height` = '220' ,`introduce` = '' ,`attach_file` = 'uploads/images/201408/5b470116af1.png' ,`sort_order` = '2' ,`status` = 'N' ,`create_time` = '1407140035' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '4' ,`position_id` = '3' ,`title` = '阿里云0元拥抱云计算' ,`title_alias` = 'index_mid_banner' ,`link_url` = 'http://free.aliyun.com/?tracelog=buy' ,`image_url` = '' ,`width` = '1170' ,`height` = '40' ,`introduce` = '' ,`attach_file` = 'uploads/images/201408/369f04c0386.jpg' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1407137817' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_ad`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_ad` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='广告表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '2' ,`position_id` = '4' ,`title` = '香港云服务器(尊云)' ,`title_alias` = 'index_top_banner' ,`link_url` = 'http://www.zun.com/zthk.html' ,`image_url` = '' ,`width` = '1170' ,`height` = '100' ,`introduce` = 'asdf' ,`attach_file` = '/upload/ad/201509/e2c87779863.jpg' ,`sort_order` = '1' ,`status` = 'N' ,`create_time` = '1407138989' ,`update_time` = '1443165387' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '3' ,`position_id` = '5' ,`title` = 'Tera(神域之战)' ,`title_alias` = 'index_bottom_banner' ,`link_url` = 'http://tera.kunlun.com/index.html' ,`image_url` = '' ,`width` = '1170' ,`height` = '220' ,`introduce` = '' ,`attach_file` = 'uploads/images/201408/5b470116af1.png' ,`sort_order` = '2' ,`status` = 'N' ,`create_time` = '1407140035' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad` SET `id` = '4' ,`position_id` = '3' ,`title` = '阿里云0元拥抱云计算' ,`title_alias` = 'index_mid_banner' ,`link_url` = 'http://free.aliyun.com/?tracelog=buy' ,`image_url` = '' ,`width` = '1170' ,`height` = '40' ,`introduce` = '' ,`attach_file` = 'uploads/images/201408/369f04c0386.jpg' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1407137817' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_ad_position`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'N-隐藏 Y-显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '1' ,`title` = '首页banner幻灯片' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '2' ,`title` = '底部幻灯片' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '3' ,`title` = '首页中部banner' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '4' ,`title` = '首页头部banner' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '5' ,`title` = '首页底部banner' ,`status` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_ad_position`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'N-隐藏 Y-显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='广告位管理表 ';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '1' ,`title` = '首页banner幻灯片' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '2' ,`title` = '底部幻灯片' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '3' ,`title` = '首页中部banner' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '4' ,`title` = '首页头部banner' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_ad_position` SET `id` = '5' ,`title` = '首页底部banner' ,`status` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_attachment`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `real_name` varchar(50) NOT NULL DEFAULT '' COMMENT '原始文件名称',
  `file_name` varchar(100) NOT NULL DEFAULT '' COMMENT '带路径文件名',
  `thumb_name` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `file_ext` varchar(5) NOT NULL DEFAULT 'jpg' COMMENT '扩展名称',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='附件表';

-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_attention`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_attention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='关注表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_attention` SET `id` = '4' ,`cid` = '70' ,`user_id` = '1' ,`title` = '编程珠玑之：对1000W个无序正整数进行排序' ,`url` = 'http://www.yiifcms.com/post/70/' ,`type` = '1' ,`create_time` = '1418198787' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_attention`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_attention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='关注表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_attention` SET `id` = '4' ,`cid` = '70' ,`user_id` = '1' ,`title` = '编程珠玑之：对1000W个无序正整数进行排序' ,`url` = 'http://www.yiifcms.com/post/70/' ,`type` = '1' ,`create_time` = '1418198787' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_catalog`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_catalog` (
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='全局分类';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '1' ,`type` = '1' ,`parent_id` = '0' ,`catalog_name` = '精品阅读' ,`seo_title` = 'asd' ,`seo_keywords` = 'asdf' ,`seo_description` = 'asdf' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1379545020' ,`update_time` = '1442283713' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '2' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '业界讯息' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '2' ,`status` = 'Y' ,`create_time` = '1379545199' ,`update_time` = '1404109846' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '3' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '服务器与运维' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '1' ,`status` = 'Y' ,`create_time` = '1379545248' ,`update_time` = '1407122169' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '4' ,`type` = '5' ,`parent_id` = '0' ,`catalog_name` = '产品' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1379545330' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '5' ,`type` = '5' ,`parent_id` = '4' ,`catalog_name` = '新品上市' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '1' ,`status` = 'N' ,`create_time` = '1379545388' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '6' ,`type` = '5' ,`parent_id` = '4' ,`catalog_name` = '特价商品' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1379545435' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '8' ,`type` = '2' ,`parent_id` = '0' ,`catalog_name` = '图集' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '0' ,`update_time` = '1399616730' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '9' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '最新热图' ,`seo_title` = '最新热图' ,`seo_keywords` = '最新热图' ,`seo_description` = '最新热图' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '0' ,`update_time` = '1399616723' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '10' ,`type` = '3' ,`parent_id` = '0' ,`catalog_name` = '本站下载' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400489000' ,`update_time` = '1407117706' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '11' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = 'CMS版本' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400489069' ,`update_time` = '1407117714' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '12' ,`type` = '4' ,`parent_id` = '0' ,`catalog_name` = '视频专区' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400828336' ,`update_time` = '1407120434' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '13' ,`type` = '4' ,`parent_id` = '12' ,`catalog_name` = 'YII教程' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400828453' ,`update_time` = '1407120377' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '14' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '网络美女' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111907' ,`update_time` = '1404111907' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '15' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '建站工具' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407115842' ,`update_time` = '1407115842' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '16' ,`type` = '4' ,`parent_id` = '12' ,`catalog_name` = '最新电影' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407120456' ,`update_time` = '1407120456' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '17' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'PHP' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122137' ,`update_time` = '1407122137' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '18' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'mysql' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122149' ,`update_time` = '1407122149' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '19' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '手册大全' ,`seo_title` = '' ,`seo_keywords` = 'php手册,mysql手册,jquery手册,yii权威指南' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122452' ,`update_time` = '1407122504' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '20' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'Yii' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407136673' ,`update_time` = '1407136682' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '21' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'web前端' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1408612172' ,`update_time` = '1408612172' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '22' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '权威指南' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1411374612' ,`update_time` = '1411374612' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '23' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '案例' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1416811681' ,`update_time` = '1416811681' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '24' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '编程珠玑' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1417740886' ,`update_time` = '1417740886' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '25' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'asdfddd' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1441880221' ,`update_time` = '1441881028' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_catalog`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_catalog` (
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='全局分类';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '1' ,`type` = '1' ,`parent_id` = '0' ,`catalog_name` = '精品阅读' ,`seo_title` = 'asd' ,`seo_keywords` = 'asdf' ,`seo_description` = 'asdf' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1379545020' ,`update_time` = '1442283713' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '2' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '业界讯息' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '2' ,`status` = 'Y' ,`create_time` = '1379545199' ,`update_time` = '1404109846' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '3' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '服务器与运维' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '1' ,`status` = 'Y' ,`create_time` = '1379545248' ,`update_time` = '1407122169' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '4' ,`type` = '5' ,`parent_id` = '0' ,`catalog_name` = '产品' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1379545330' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '5' ,`type` = '5' ,`parent_id` = '4' ,`catalog_name` = '新品上市' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '1' ,`status` = 'N' ,`create_time` = '1379545388' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '6' ,`type` = '5' ,`parent_id` = '4' ,`catalog_name` = '特价商品' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'N' ,`create_time` = '1379545435' ,`update_time` = '1394517482' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '8' ,`type` = '2' ,`parent_id` = '0' ,`catalog_name` = '图集' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '0' ,`update_time` = '1399616730' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '9' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '最新热图' ,`seo_title` = '最新热图' ,`seo_keywords` = '最新热图' ,`seo_description` = '最新热图' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '0' ,`update_time` = '1399616723' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '10' ,`type` = '3' ,`parent_id` = '0' ,`catalog_name` = '本站下载' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400489000' ,`update_time` = '1407117706' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '11' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = 'CMS版本' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400489069' ,`update_time` = '1407117714' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '12' ,`type` = '4' ,`parent_id` = '0' ,`catalog_name` = '视频专区' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400828336' ,`update_time` = '1407120434' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '13' ,`type` = '4' ,`parent_id` = '12' ,`catalog_name` = 'YII教程' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1400828453' ,`update_time` = '1407120377' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '14' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '网络美女' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111907' ,`update_time` = '1404111907' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '15' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '建站工具' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407115842' ,`update_time` = '1407115842' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '16' ,`type` = '4' ,`parent_id` = '12' ,`catalog_name` = '最新电影' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407120456' ,`update_time` = '1407120456' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '17' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'PHP' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122137' ,`update_time` = '1407122137' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '18' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'mysql' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122149' ,`update_time` = '1407122149' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '19' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '手册大全' ,`seo_title` = '' ,`seo_keywords` = 'php手册,mysql手册,jquery手册,yii权威指南' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407122452' ,`update_time` = '1407122504' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '20' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'Yii' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407136673' ,`update_time` = '1407136682' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '21' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'web前端' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1408612172' ,`update_time` = '1408612172' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '22' ,`type` = '3' ,`parent_id` = '10' ,`catalog_name` = '权威指南' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1411374612' ,`update_time` = '1411374612' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '23' ,`type` = '2' ,`parent_id` = '8' ,`catalog_name` = '案例' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1416811681' ,`update_time` = '1416811681' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '24' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = '编程珠玑' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1417740886' ,`update_time` = '1417740886' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_catalog` SET `id` = '25' ,`type` = '1' ,`parent_id` = '1' ,`catalog_name` = 'asdfddd' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1441880221' ,`update_time` = '1441881028' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_collect`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='收藏表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '14' ,`cid` = '71' ,`user_id` = '2' ,`title` = '编程珠玑之：反转字符串' ,`url` = 'http://www.yiifcms.com/post/71/' ,`type` = '1' ,`create_time` = '1418199248' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '16' ,`cid` = '70' ,`user_id` = '1' ,`title` = '编程珠玑之：对1000W个无序正整数进行排序' ,`url` = 'http://www.yiifcms.com/post/70/' ,`type` = '1' ,`create_time` = '1418284999' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '17' ,`cid` = '38' ,`user_id` = '1' ,`title` = '关于人人网开发平台提供的sdk的问题' ,`url` = 'http://www.yiifcms.com/post/38/' ,`type` = '1' ,`create_time` = '1418805879' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_collect`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT '0' COMMENT '收藏id',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户id',
  `title` varchar(100) DEFAULT '' COMMENT '收藏名称',
  `url` varchar(200) DEFAULT '' COMMENT '收藏地址',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '收藏内容类型(文章/图片/商品/视频)',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='收藏表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '14' ,`cid` = '71' ,`user_id` = '2' ,`title` = '编程珠玑之：反转字符串' ,`url` = 'http://www.yiifcms.com/post/71/' ,`type` = '1' ,`create_time` = '1418199248' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '16' ,`cid` = '70' ,`user_id` = '1' ,`title` = '编程珠玑之：对1000W个无序正整数进行排序' ,`url` = 'http://www.yiifcms.com/post/70/' ,`type` = '1' ,`create_time` = '1418284999' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_collect` SET `id` = '17' ,`cid` = '38' ,`user_id` = '1' ,`title` = '关于人人网开发平台提供的sdk的问题' ,`url` = 'http://www.yiifcms.com/post/38/' ,`type` = '1' ,`create_time` = '1418805879' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_comment`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容id',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `client_ip` varchar(15) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='评论表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_comment` SET `id` = '31' ,`content_id` = '1' ,`type` = '2' ,`user_id` = '31' ,`content` = '第三张亮了！<img src=\"/public/emoticons/images/13.gif\" alt=\"\" border=\"0\" width=\"20\" height=\"20\" title=\"\" align=\"\" />' ,`status` = 'Y' ,`client_ip` = '127.0.0.1' ,`create_time` = '1402628120' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_comment` SET `id` = '32' ,`content_id` = '16' ,`type` = '1' ,`user_id` = '31' ,`content` = '内容排版 不太好吧 <img src=\"/public/emoticons/images/1.gif\" alt=\"\" border=\"0\" /><br />' ,`status` = 'Y' ,`client_ip` = '127.0.0.1' ,`create_time` = '1402882240' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_comment`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容id',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态',
  `client_ip` varchar(15) NOT NULL DEFAULT '127' COMMENT '评论ip',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='评论表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_comment` SET `id` = '31' ,`content_id` = '1' ,`type` = '2' ,`user_id` = '31' ,`content` = '第三张亮了！<img src=\"/public/emoticons/images/13.gif\" alt=\"\" border=\"0\" width=\"20\" height=\"20\" title=\"\" align=\"\" />' ,`status` = 'Y' ,`client_ip` = '127.0.0.1' ,`create_time` = '1402628120' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_comment` SET `id` = '32' ,`content_id` = '16' ,`type` = '1' ,`user_id` = '31' ,`content` = '内容排版 不太好吧 <img src=\"/public/emoticons/images/1.gif\" alt=\"\" border=\"0\" /><br />' ,`status` = 'Y' ,`client_ip` = '127.0.0.1' ,`create_time` = '1402882240' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_friend`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid1` int(10) unsigned DEFAULT '0' COMMENT '其中一个用户id',
  `uid2` int(10) unsigned DEFAULT '0' COMMENT '好友uid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='好友表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_friend` SET `id` = '1' ,`uid1` = '1' ,`uid2` = '2' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_friend`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid1` int(10) unsigned DEFAULT '0' COMMENT '其中一个用户id',
  `uid2` int(10) unsigned DEFAULT '0' COMMENT '好友uid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='好友表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_friend` SET `id` = '1' ,`uid1` = '1' ,`uid2` = '2' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_image`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_image` (
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='内容管理';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '2' ,`user_id` = '1' ,`title` = '图览2014巴西世界杯美女' ,`title_second` = '图览2014巴西世界杯' ,`title_style` = '' ,`catalog_id` = '9' ,`special_id` = '0' ,`introduce` = '世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@百度图片】新浪微博官方账号吧。' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"79\";s:4:\"file\";s:37:\"uploads/images/201407/8068f3a90b7.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8068f3a90b7.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\"><span style=\"font-size:14px;\"></span><span style=\"font-size:14px;\">世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@<a target=\"_blank\" href=\"http://www.baidu.com\">百度</a>图片】新浪微博官方账号吧。</span> </p>' ,`copy_from` = '百度图片' ,`copy_url` = 'http://image.baidu.com/infopage/tpl?id=8&mode=viewer' ,`redirect_url` = '' ,`tags` = '美女,世界杯' ,`view_count` = '245' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/1f6228399a3.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_1f6228399a3.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111213' ,`update_time` = '1410328914' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '3' ,`user_id` = '1' ,`title` = '小清新' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = '' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '小清新' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '109' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/2980725e720.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_2980725e720.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111946' ,`update_time` = '1404111946' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '4' ,`user_id` = '1' ,`title` = '游戏唯美' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"93\";s:4:\"file\";s:37:\"uploads/images/201407/2c48ccb19e2.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2c48ccb19e2.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '游戏唯美' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '144' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/8b571b7725d.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_8b571b7725d.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404112171' ,`update_time` = '1404304930' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '5' ,`user_id` = '1' ,`title` = '游戏唯美' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"89\";s:4:\"file\";s:37:\"uploads/images/201407/2e13e0a3ed9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2e13e0a3ed9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"90\";s:4:\"file\";s:37:\"uploads/images/201407/2a2d8e16cb0.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2a2d8e16cb0.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"91\";s:4:\"file\";s:37:\"uploads/images/201407/825a8ac9d80.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_825a8ac9d80.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '游戏唯美' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '133' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/d7d79134e6d.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_d7d79134e6d.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114260' ,`update_time` = '1404184873' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '6' ,`user_id` = '1' ,`title` = '明星海景' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"88\";s:4:\"file\";s:37:\"uploads/images/201407/b0d4552362e.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_b0d4552362e.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '明星海景' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '143' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/fe41fcc37ac.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_fe41fcc37ac.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114318' ,`update_time` = '1404184847' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '7' ,`user_id` = '1' ,`title` = '靓丽女孩' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:2:{i:0;a:5:{s:6:\"fileId\";s:2:\"86\";s:4:\"file\";s:37:\"uploads/images/201407/4efea9bddd1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4efea9bddd1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"87\";s:4:\"file\";s:37:\"uploads/images/201407/9706bae28d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_9706bae28d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '靓丽女孩' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '125' ,`commend` = 'Y' ,`attach_file` = 'uploads/images/201406/15b9aedad1b.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_15b9aedad1b.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114395' ,`update_time` = '1404184809' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '8' ,`user_id` = '1' ,`title` = '漂亮女神' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"83\";s:4:\"file\";s:37:\"uploads/images/201407/cef6cf4f134.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_cef6cf4f134.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"84\";s:4:\"file\";s:37:\"uploads/images/201407/8a0a9d8cb7b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8a0a9d8cb7b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"85\";s:4:\"file\";s:37:\"uploads/images/201407/4464b4046d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4464b4046d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '漂亮女神' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '142' ,`commend` = 'Y' ,`attach_file` = 'uploads/images/201406/bb6aa6ad2c7.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_bb6aa6ad2c7.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114458' ,`update_time` = '1404184778' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '12' ,`user_id` = '1' ,`title` = '清纯美女生活照 呆萌可爱' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '9' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:3:\"112\";s:4:\"file\";s:37:\"uploads/images/201409/143e6f34f73.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_143e6f34f73.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"113\";s:4:\"file\";s:37:\"uploads/images/201409/ec85bd92b78.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_ec85bd92b78.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"114\";s:4:\"file\";s:37:\"uploads/images/201409/f5037b3b56c.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_f5037b3b56c.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱<br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '83' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/857a7757b2e.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_857a7757b2e.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410327879' ,`update_time` = '1410327910' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '13' ,`user_id` = '1' ,`title` = '清纯美女钟幸户外清新写真图片' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:5:{i:0;a:5:{s:6:\"fileId\";s:3:\"115\";s:4:\"file\";s:37:\"uploads/images/201409/0f24c6f0804.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0f24c6f0804.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"116\";s:4:\"file\";s:37:\"uploads/images/201409/53c85c4f1c7.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_53c85c4f1c7.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"117\";s:4:\"file\";s:37:\"uploads/images/201409/526c6969899.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_526c6969899.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"118\";s:4:\"file\";s:37:\"uploads/images/201409/0f547cc403a.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0f547cc403a.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:4;a:5:{s:6:\"fileId\";s:3:\"119\";s:4:\"file\";s:37:\"uploads/images/201409/d56cc344ed8.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_d56cc344ed8.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">清纯美女钟幸户外清新写真图片</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '87' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/d17c48e31ca.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_d17c48e31ca.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328150' ,`update_time` = '1410328150' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '14' ,`user_id` = '1' ,`title` = '冬季唯美优雅长发美女气质写真' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:4:{i:0;a:5:{s:6:\"fileId\";s:3:\"120\";s:4:\"file\";s:37:\"uploads/images/201409/9f95a348812.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_9f95a348812.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"121\";s:4:\"file\";s:37:\"uploads/images/201409/1c021693d09.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_1c021693d09.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"122\";s:4:\"file\";s:37:\"uploads/images/201409/af2836c25e8.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_af2836c25e8.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"123\";s:4:\"file\";s:37:\"uploads/images/201409/ef4966927ba.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_ef4966927ba.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">冬季唯美优雅长发美女气质写真</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '82' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/03c19769ff9.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_03c19769ff9.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328386' ,`update_time` = '1410328832' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '15' ,`user_id` = '1' ,`title` = '清纯蝴蝶结美女碎花裙可爱写真' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:6:{i:0;a:5:{s:6:\"fileId\";s:3:\"124\";s:4:\"file\";s:37:\"uploads/images/201409/64803d94d7b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_64803d94d7b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"125\";s:4:\"file\";s:37:\"uploads/images/201409/985e4581728.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_985e4581728.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"126\";s:4:\"file\";s:37:\"uploads/images/201409/a8e81226441.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_a8e81226441.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"127\";s:4:\"file\";s:37:\"uploads/images/201409/7b142b809e9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_7b142b809e9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:4;a:5:{s:6:\"fileId\";s:3:\"128\";s:4:\"file\";s:37:\"uploads/images/201409/a92ca246472.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_a92ca246472.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:5;a:5:{s:6:\"fileId\";s:3:\"129\";s:4:\"file\";s:37:\"uploads/images/201409/2c166392fe9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_2c166392fe9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">清纯蝴蝶结美女碎花裙可爱写真</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '86' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/d8dec1b1a3b.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_d8dec1b1a3b.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328623' ,`update_time` = '1410328823' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '16' ,`user_id` = '1' ,`title` = '邻家文艺女' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:4:{i:0;a:5:{s:6:\"fileId\";s:3:\"130\";s:4:\"file\";s:37:\"uploads/images/201409/83dfd26fcfa.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_83dfd26fcfa.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"131\";s:4:\"file\";s:37:\"uploads/images/201409/1cc0be35e09.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_1cc0be35e09.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"132\";s:4:\"file\";s:37:\"uploads/images/201409/74938f6a175.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_74938f6a175.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"133\";s:4:\"file\";s:37:\"uploads/images/201409/0c3e8da157b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0c3e8da157b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">邻家文艺女</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '114' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/5e0654e261f.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_5e0654e261f.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410329353' ,`update_time` = '1410329353' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '17' ,`user_id` = '1' ,`title` = 'LEPUS数据监控系统' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '23' ,`special_id` = '0' ,`introduce` = 'Lepus是一个由Python+PHP开发的数据库企业级监控系统，是作者继MYSQLMTOP开源监控系统(www.mtop.cc)之后，进行了代码重构，重新开发的一套企业系统。目前已支持监控MySQL和Mongodb。该系统目前可以免费监控5台MySQL和不限主机数量的MongoDB。监控系统由Python实现多进程数据采集和告警，PHP实现WEB展示和管理。数据库服务器无需安装任何Agent，只需在监控WEB界面配置相关数据库信息，启动监控进程后，即可对数据库的健康状态和性能状态进行时时监控。并能在数据库偏离设定的正常运行阀值(如连接异常，复制异常，复制延迟) 时发送告警邮件通知到DBA进行处理。并对历史数据归档，通过图表展示出数据库近期状态，以便DBA和开发人员能对遇到的问题进行分析和诊断' ,`image_list` = '/upload/album/201509/a86ff0fe202.jpg' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	Lepus是一个由Python+PHP开发的数据库企业级监控系统，是作者继MYSQLMTOP开源监控系统(<a href=\"http://www.mtop.cc/\">www.mtop.cc</a>)之后，进行了代码重构，重新开发的一套企业系统。目前已支持监控MySQL和Mongodb。该系统目前可以免费监控5台MySQL和不限主机数量的MongoDB。监控系统由Python实现多进程数据采集和告警，PHP实现WEB展示和管理。数据库服务器无需安装任何Agent，只需在监控WEB界面配置相关数据库信息，启动监控进程后，即可对数据库的健康状态和性能状态进行时时监控。并能在数据库偏离设定的正常运行阀值(如连接异常，复制异常，复制延迟) 时发送告警邮件通知到DBA进行处理。并对历史数据归档，通过图表展示出数据库近期状态，以便DBA和开发人员能对遇到的问题进行分析和诊断。\r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	<img src=\"/uploads/attached/image/201411/5b259c83009.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	主要特性列表如下：<br />\r\n无需Agent,远程监视云中数据库<br />\r\n直观的管理和监视数据库<br />\r\n实时MySQL健康监视和告警<br />\r\n实时MySQL复制监视和告警<br />\r\n实时MySQL进程监视和管理<br />\r\n实时MySQL资源监视和分析<br />\r\n实时MySQL缓存等性能监视<br />\r\n实时InnoDB IO性能监控<br />\r\nMySQL表空间增长趋势图表<br />\r\n可视化MySQL慢查询分析<br />\r\nMySQL慢查询自动推送功能<br />\r\nMySQL AWR在线性能分析<br />\r\n实时MongoDB健康监控和报警<br />\r\n实时MongoDB索引性能监控<br />\r\n实时MongoDB内存使用监控<br />\r\n可视化告警系统，邮件发送告警<br />\r\n严格的权限认证系统<br />\r\n丰富的健康性能分析图表<br />\r\n数据库健康报告推送功能<br />\r\n多语言支持，目前已支持英文和简体中文。\r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	官方网站：<a href=\"http://www.lepus.cc/\">http://www.lepus.cc</a> \r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,innodb,索引,服务器' ,`view_count` = '112' ,`commend` = 'N' ,`attach_file` = '/upload/post/201509/d779a74a66f.jpg' ,`attach_thumb` = '/upload/post/201509/small_d779a74a66f.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1416811845' ,`update_time` = '1441717357' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_image`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_image` (
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='内容管理';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '2' ,`user_id` = '1' ,`title` = '图览2014巴西世界杯美女' ,`title_second` = '图览2014巴西世界杯' ,`title_style` = '' ,`catalog_id` = '9' ,`special_id` = '0' ,`introduce` = '世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@百度图片】新浪微博官方账号吧。' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"79\";s:4:\"file\";s:37:\"uploads/images/201407/8068f3a90b7.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8068f3a90b7.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\"><span style=\"font-size:14px;\"></span><span style=\"font-size:14px;\">世界杯来啦，为了帮助大家更轻松更愉悦地观看世界杯，小编制作了《图览世界杯》，大家可及时围观赛况和花边消息，方便彼此切磋，迎来人生比翼齐飞的新高度，更有机会参与【百度图片竞猜世界杯】的活动哦！我们的奖品已经到位，猜对比分，并@百度图片@两位好友，就有机会赢取【高端手表】哦亲~动动手指，为世界杯加油！更多消息请密切关注【@<a target=\"_blank\" href=\"http://www.baidu.com\">百度</a>图片】新浪微博官方账号吧。</span> </p>' ,`copy_from` = '百度图片' ,`copy_url` = 'http://image.baidu.com/infopage/tpl?id=8&mode=viewer' ,`redirect_url` = '' ,`tags` = '美女,世界杯' ,`view_count` = '245' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/1f6228399a3.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_1f6228399a3.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111213' ,`update_time` = '1410328914' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '3' ,`user_id` = '1' ,`title` = '小清新' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = '' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '小清新' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '109' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/2980725e720.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_2980725e720.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404111946' ,`update_time` = '1404111946' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '4' ,`user_id` = '1' ,`title` = '游戏唯美' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"93\";s:4:\"file\";s:37:\"uploads/images/201407/2c48ccb19e2.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2c48ccb19e2.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '游戏唯美' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '144' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/8b571b7725d.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_8b571b7725d.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404112171' ,`update_time` = '1404304930' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '5' ,`user_id` = '1' ,`title` = '游戏唯美' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"89\";s:4:\"file\";s:37:\"uploads/images/201407/2e13e0a3ed9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2e13e0a3ed9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"90\";s:4:\"file\";s:37:\"uploads/images/201407/2a2d8e16cb0.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_2a2d8e16cb0.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"91\";s:4:\"file\";s:37:\"uploads/images/201407/825a8ac9d80.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_825a8ac9d80.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '游戏唯美' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '133' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/d7d79134e6d.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_d7d79134e6d.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114260' ,`update_time` = '1404184873' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '6' ,`user_id` = '1' ,`title` = '明星海景' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:1:{i:0;a:5:{s:6:\"fileId\";s:2:\"88\";s:4:\"file\";s:37:\"uploads/images/201407/b0d4552362e.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_b0d4552362e.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '明星海景' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '143' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201406/fe41fcc37ac.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_fe41fcc37ac.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114318' ,`update_time` = '1404184847' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '7' ,`user_id` = '1' ,`title` = '靓丽女孩' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:2:{i:0;a:5:{s:6:\"fileId\";s:2:\"86\";s:4:\"file\";s:37:\"uploads/images/201407/4efea9bddd1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4efea9bddd1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"87\";s:4:\"file\";s:37:\"uploads/images/201407/9706bae28d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_9706bae28d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '靓丽女孩' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '125' ,`commend` = 'Y' ,`attach_file` = 'uploads/images/201406/15b9aedad1b.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_15b9aedad1b.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114395' ,`update_time` = '1404184809' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '8' ,`user_id` = '1' ,`title` = '漂亮女神' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:2:\"83\";s:4:\"file\";s:37:\"uploads/images/201407/cef6cf4f134.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_cef6cf4f134.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:2:\"84\";s:4:\"file\";s:37:\"uploads/images/201407/8a0a9d8cb7b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_8a0a9d8cb7b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:2:\"85\";s:4:\"file\";s:37:\"uploads/images/201407/4464b4046d1.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201407/small_4464b4046d1.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '漂亮女神' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '142' ,`commend` = 'Y' ,`attach_file` = 'uploads/images/201406/bb6aa6ad2c7.jpg' ,`attach_thumb` = 'uploads/thumbs/201406/small_bb6aa6ad2c7.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1404114458' ,`update_time` = '1404184778' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '12' ,`user_id` = '1' ,`title` = '清纯美女生活照 呆萌可爱' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '9' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:3:{i:0;a:5:{s:6:\"fileId\";s:3:\"112\";s:4:\"file\";s:37:\"uploads/images/201409/143e6f34f73.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_143e6f34f73.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"113\";s:4:\"file\";s:37:\"uploads/images/201409/ec85bd92b78.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_ec85bd92b78.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"114\";s:4:\"file\";s:37:\"uploads/images/201409/f5037b3b56c.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_f5037b3b56c.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱</p><p>清纯美女生活照 呆萌可爱<br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '83' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/857a7757b2e.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_857a7757b2e.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410327879' ,`update_time` = '1410327910' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '13' ,`user_id` = '1' ,`title` = '清纯美女钟幸户外清新写真图片' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:5:{i:0;a:5:{s:6:\"fileId\";s:3:\"115\";s:4:\"file\";s:37:\"uploads/images/201409/0f24c6f0804.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0f24c6f0804.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"116\";s:4:\"file\";s:37:\"uploads/images/201409/53c85c4f1c7.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_53c85c4f1c7.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"117\";s:4:\"file\";s:37:\"uploads/images/201409/526c6969899.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_526c6969899.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"118\";s:4:\"file\";s:37:\"uploads/images/201409/0f547cc403a.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0f547cc403a.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:4;a:5:{s:6:\"fileId\";s:3:\"119\";s:4:\"file\";s:37:\"uploads/images/201409/d56cc344ed8.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_d56cc344ed8.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">清纯美女钟幸户外清新写真图片</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '87' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/d17c48e31ca.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_d17c48e31ca.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328150' ,`update_time` = '1410328150' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '14' ,`user_id` = '1' ,`title` = '冬季唯美优雅长发美女气质写真' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:4:{i:0;a:5:{s:6:\"fileId\";s:3:\"120\";s:4:\"file\";s:37:\"uploads/images/201409/9f95a348812.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_9f95a348812.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"121\";s:4:\"file\";s:37:\"uploads/images/201409/1c021693d09.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_1c021693d09.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"122\";s:4:\"file\";s:37:\"uploads/images/201409/af2836c25e8.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_af2836c25e8.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"123\";s:4:\"file\";s:37:\"uploads/images/201409/ef4966927ba.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_ef4966927ba.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">冬季唯美优雅长发美女气质写真</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '82' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/03c19769ff9.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_03c19769ff9.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328386' ,`update_time` = '1410328832' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '15' ,`user_id` = '1' ,`title` = '清纯蝴蝶结美女碎花裙可爱写真' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:6:{i:0;a:5:{s:6:\"fileId\";s:3:\"124\";s:4:\"file\";s:37:\"uploads/images/201409/64803d94d7b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_64803d94d7b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"125\";s:4:\"file\";s:37:\"uploads/images/201409/985e4581728.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_985e4581728.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"126\";s:4:\"file\";s:37:\"uploads/images/201409/a8e81226441.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_a8e81226441.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"127\";s:4:\"file\";s:37:\"uploads/images/201409/7b142b809e9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_7b142b809e9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:4;a:5:{s:6:\"fileId\";s:3:\"128\";s:4:\"file\";s:37:\"uploads/images/201409/a92ca246472.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_a92ca246472.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:5;a:5:{s:6:\"fileId\";s:3:\"129\";s:4:\"file\";s:37:\"uploads/images/201409/2c166392fe9.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_2c166392fe9.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">清纯蝴蝶结美女碎花裙可爱写真</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '86' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/d8dec1b1a3b.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_d8dec1b1a3b.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410328623' ,`update_time` = '1410328823' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '16' ,`user_id` = '1' ,`title` = '邻家文艺女' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '14' ,`special_id` = '0' ,`introduce` = '' ,`image_list` = 'a:4:{i:0;a:5:{s:6:\"fileId\";s:3:\"130\";s:4:\"file\";s:37:\"uploads/images/201409/83dfd26fcfa.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_83dfd26fcfa.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:1;a:5:{s:6:\"fileId\";s:3:\"131\";s:4:\"file\";s:37:\"uploads/images/201409/1cc0be35e09.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_1cc0be35e09.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:2;a:5:{s:6:\"fileId\";s:3:\"132\";s:4:\"file\";s:37:\"uploads/images/201409/74938f6a175.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_74938f6a175.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}i:3;a:5:{s:6:\"fileId\";s:3:\"133\";s:4:\"file\";s:37:\"uploads/images/201409/0c3e8da157b.jpg\";s:5:\"thumb\";s:43:\"uploads/thumbs/201409/small_0c3e8da157b.jpg\";s:4:\"desc\";s:0:\"\";s:3:\"url\";s:0:\"\";}}' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 class=\"imageset-title title\">邻家文艺女</h2><p><br/></p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '美女' ,`view_count` = '114' ,`commend` = 'N' ,`attach_file` = 'uploads/images/201409/5e0654e261f.jpg' ,`attach_thumb` = 'uploads/thumbs/201409/small_5e0654e261f.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1410329353' ,`update_time` = '1410329353' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_image` SET `id` = '17' ,`user_id` = '1' ,`title` = 'LEPUS数据监控系统' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '23' ,`special_id` = '0' ,`introduce` = 'Lepus是一个由Python+PHP开发的数据库企业级监控系统，是作者继MYSQLMTOP开源监控系统(www.mtop.cc)之后，进行了代码重构，重新开发的一套企业系统。目前已支持监控MySQL和Mongodb。该系统目前可以免费监控5台MySQL和不限主机数量的MongoDB。监控系统由Python实现多进程数据采集和告警，PHP实现WEB展示和管理。数据库服务器无需安装任何Agent，只需在监控WEB界面配置相关数据库信息，启动监控进程后，即可对数据库的健康状态和性能状态进行时时监控。并能在数据库偏离设定的正常运行阀值(如连接异常，复制异常，复制延迟) 时发送告警邮件通知到DBA进行处理。并对历史数据归档，通过图表展示出数据库近期状态，以便DBA和开发人员能对遇到的问题进行分析和诊断' ,`image_list` = '/upload/album/201509/a86ff0fe202.jpg' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	Lepus是一个由Python+PHP开发的数据库企业级监控系统，是作者继MYSQLMTOP开源监控系统(<a href=\"http://www.mtop.cc/\">www.mtop.cc</a>)之后，进行了代码重构，重新开发的一套企业系统。目前已支持监控MySQL和Mongodb。该系统目前可以免费监控5台MySQL和不限主机数量的MongoDB。监控系统由Python实现多进程数据采集和告警，PHP实现WEB展示和管理。数据库服务器无需安装任何Agent，只需在监控WEB界面配置相关数据库信息，启动监控进程后，即可对数据库的健康状态和性能状态进行时时监控。并能在数据库偏离设定的正常运行阀值(如连接异常，复制异常，复制延迟) 时发送告警邮件通知到DBA进行处理。并对历史数据归档，通过图表展示出数据库近期状态，以便DBA和开发人员能对遇到的问题进行分析和诊断。\r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	<img src=\"/uploads/attached/image/201411/5b259c83009.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	主要特性列表如下：<br />\r\n无需Agent,远程监视云中数据库<br />\r\n直观的管理和监视数据库<br />\r\n实时MySQL健康监视和告警<br />\r\n实时MySQL复制监视和告警<br />\r\n实时MySQL进程监视和管理<br />\r\n实时MySQL资源监视和分析<br />\r\n实时MySQL缓存等性能监视<br />\r\n实时InnoDB IO性能监控<br />\r\nMySQL表空间增长趋势图表<br />\r\n可视化MySQL慢查询分析<br />\r\nMySQL慢查询自动推送功能<br />\r\nMySQL AWR在线性能分析<br />\r\n实时MongoDB健康监控和报警<br />\r\n实时MongoDB索引性能监控<br />\r\n实时MongoDB内存使用监控<br />\r\n可视化告警系统，邮件发送告警<br />\r\n严格的权限认证系统<br />\r\n丰富的健康性能分析图表<br />\r\n数据库健康报告推送功能<br />\r\n多语言支持，目前已支持英文和简体中文。\r\n</p>\r\n<p style=\"background-color:#FFFFFF;font-size:14px;vertical-align:top;color:#333333;font-family:SimSun, \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\">\r\n	官方网站：<a href=\"http://www.lepus.cc/\">http://www.lepus.cc</a> \r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,innodb,索引,服务器' ,`view_count` = '112' ,`commend` = 'N' ,`attach_file` = '/upload/post/201509/d779a74a66f.jpg' ,`attach_thumb` = '/upload/post/201509/small_d779a74a66f.jpg' ,`favorite_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1416811845' ,`update_time` = '1441717357' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_link`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接',
  `logo` varchar(100) NOT NULL DEFAULT '' COMMENT 'LOGO图标',
  `sort_order` smallint(10) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='链接表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '3' ,`title` = '站长之家' ,`url` = 'http://www.chinaz.com' ,`logo` = 'upload/link/201510/b97bf01726e.png' ,`sort_order` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '4' ,`title` = 'PHPChina' ,`url` = 'http://www.phpchina.com' ,`logo` = '' ,`sort_order` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '5' ,`title` = 'Discuz动力社区' ,`url` = 'http://www.discuz.net' ,`logo` = '' ,`sort_order` = '4' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '6' ,`title` = 'DNSPod' ,`url` = 'http://www.dnspod.cn' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '7' ,`title` = 'PHP100中文网' ,`url` = 'http://www.php100.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '8' ,`title` = '  WEB技术开发' ,`url` = 'http://www.itokit.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '9' ,`title` = '源码爱好者 ' ,`url` = 'http://www.codefans.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '10' ,`title` = 'PHPCMS' ,`url` = 'http://bbs.phpcms.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '11' ,`title` = ' PHPwind论坛' ,`url` = 'http://www.phpwind.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '12' ,`title` = 'Drupal中国  ' ,`url` = 'http://drupalchina.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '13' ,`title` = '德问编程' ,`url` = 'http://www.dewen.org/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '14' ,`title` = 'stackoverflow' ,`url` = 'http://stackoverflow.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '15' ,`title` = 'Linux课程学习' ,`url` = 'http://itercast.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '16' ,`title` = 'ThinkPHP' ,`url` = 'http://www.thinkphp.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '17' ,`title` = 'CakePHP' ,`url` = 'http://cakephp.org/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '24' ,`title` = 'yiifcms' ,`url` = 'http://www.yiifcms.com' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '25' ,`title` = 'yiifcms社区' ,`url` = 'http://bbs.yiifcms.com' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '26' ,`title` = 'oschina开源中国' ,`url` = 'http://www.oschina.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_link`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接',
  `logo` varchar(100) NOT NULL DEFAULT '' COMMENT 'LOGO图标',
  `sort_order` smallint(10) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '状态Y-显示N-隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='链接表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '3' ,`title` = '站长之家' ,`url` = 'http://www.chinaz.com' ,`logo` = 'upload/link/201510/b97bf01726e.png' ,`sort_order` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '4' ,`title` = 'PHPChina' ,`url` = 'http://www.phpchina.com' ,`logo` = '' ,`sort_order` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '5' ,`title` = 'Discuz动力社区' ,`url` = 'http://www.discuz.net' ,`logo` = '' ,`sort_order` = '4' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '6' ,`title` = 'DNSPod' ,`url` = 'http://www.dnspod.cn' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '7' ,`title` = 'PHP100中文网' ,`url` = 'http://www.php100.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '8' ,`title` = '  WEB技术开发' ,`url` = 'http://www.itokit.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '9' ,`title` = '源码爱好者 ' ,`url` = 'http://www.codefans.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '10' ,`title` = 'PHPCMS' ,`url` = 'http://bbs.phpcms.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '11' ,`title` = ' PHPwind论坛' ,`url` = 'http://www.phpwind.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '12' ,`title` = 'Drupal中国  ' ,`url` = 'http://drupalchina.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '13' ,`title` = '德问编程' ,`url` = 'http://www.dewen.org/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '14' ,`title` = 'stackoverflow' ,`url` = 'http://stackoverflow.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '15' ,`title` = 'Linux课程学习' ,`url` = 'http://itercast.com/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '16' ,`title` = 'ThinkPHP' ,`url` = 'http://www.thinkphp.cn/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '17' ,`title` = 'CakePHP' ,`url` = 'http://cakephp.org/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '24' ,`title` = 'yiifcms' ,`url` = 'http://www.yiifcms.com' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '25' ,`title` = 'yiifcms社区' ,`url` = 'http://bbs.yiifcms.com' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_link` SET `id` = '26' ,`title` = 'oschina开源中国' ,`url` = 'http://www.oschina.net/' ,`logo` = '' ,`sort_order` = '255' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_mail_log`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_mail_log` (
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='邮件日志表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '7' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405053583' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = 'SMTP 错误：无法连接到 SMTP 主机。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '8' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405053614' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '9' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057618' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '10' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057700' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '11' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057900' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '12' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057974' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：ROOT<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '13' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058020' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<xb_zjh@126.com><p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '14' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058040' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '15' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058061' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '16' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058408' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '17' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058655' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '18' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405059546' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '19' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405059586' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '20' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405128267' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '21' ,`accept` = 'admin' ,`subject` = 'yii内容管理系统 重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405478217' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '必须提供至少一个收件人地址。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '22' ,`accept` = 'xb_zjh@126.com' ,`subject` = 'yii内容管理系统 重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405478290' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '23' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405480338' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '24' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405481428' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '25' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405481945' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '26' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>\r\n	' ,`sendtime` = '1405495294' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '27' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405495713' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '28' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405495877' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '29' ,`accept` = '376685457@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE\">http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1405503421' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '30' ,`accept` = '376685457@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.\">http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1405503820' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '31' ,`accept` = 'k_tatsuguchi@toyo-tos.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405565459' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '32' ,`accept` = '894046126@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：shiyang 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://yiifcms.com/user/authEmail/37/?authcode=MTbPAmNSgTcaA\">http://yiifcms.com/user/authEmail/37/?authcode=MTbPAmNSgTcaA</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407477194' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '33' ,`accept` = '326196997@qq.com' ,`subject` = '重设邮箱' ,`message` = '<p>尊敬的用户：没那么简单_qq 您好，您已经申请修改邮箱操作，请输入下面的验证码进行验证：<br/><br/>\r\n						395355<br/><br/>\r\n						==================<br/><br/>如果不是您本人操作，请尽快联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407812188' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '34' ,`accept` = '326196998@qq.com' ,`subject` = '重设邮箱' ,`message` = '<p>尊敬的用户：没那么简单_qq 您好，您已经申请修改邮箱操作，请输入下面的验证码进行验证：<br/><br/>\r\n						603410<br/><br/>\r\n						==================<br/><br/>如果不是您本人操作，请尽快联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407812329' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '35' ,`accept` = 'soueovip@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：333333 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/53/?authcode=OT0stItHdpsdo\">http://www.yiifcms.com/user/authEmail/53/?authcode=OT0stItHdpsdo</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1409802823' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '36' ,`accept` = 'soueovip@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：333333 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/53/?authcode=NzdSzzk%2FAQvuA\">http://www.yiifcms.com/user/authEmail/53/?authcode=NzdSzzk%2FAQvuA</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1409802855' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '37' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单呵呵 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/60/?authcode=Mjf97LOVoA72w\">http://www.yiifcms.com/user/authEmail/60/?authcode=Mjf97LOVoA72w</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410354693' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '38' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/61/?authcode=OTOUybn%2F63INI\">http://www.yiifcms.com/user/authEmail/61/?authcode=OTOUybn%2F63INI</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410354894' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '39' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/62/?authcode=NzydrvEwSKLXM\">http://www.yiifcms.com/user/authEmail/62/?authcode=NzydrvEwSKLXM</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410355431' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '40' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/63/?authcode=OT5dkpUUQKV02\">http://www.yiifcms.com/user/authEmail/63/?authcode=OT5dkpUUQKV02</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410355595' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '41' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/64/?authcode=MzgXwe4RspPhc\">http://www.yiifcms.com/user/authEmail/64/?authcode=MzgXwe4RspPhc</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410356130' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '42' ,`accept` = '1037269762@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：ikensz 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/67/?authcode=NzAlm5Nv.rhko\">http://www.yiifcms.com/user/authEmail/67/?authcode=NzAlm5Nv.rhko</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411391178' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '43' ,`accept` = 'hjun027@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：chj027 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/68/?authcode=NTb9pgRoISmNg\">http://www.yiifcms.com/user/authEmail/68/?authcode=NTb9pgRoISmNg</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411478512' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '44' ,`accept` = '1037269762@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：ikensz 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/67/?authcode=OTiSeM9UTCkiE\">http://www.yiifcms.com/user/authEmail/67/?authcode=OTiSeM9UTCkiE</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411557869' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_mail_log`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_mail_log` (
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='邮件日志表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '7' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405053583' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = 'SMTP 错误：无法连接到 SMTP 主机。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '8' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405053614' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '9' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057618' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '10' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057700' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '11' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057900' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '12' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405057974' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：ROOT<p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '13' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058020' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '发送地址错误：YiifCMS官方<xb_zjh@126.com><p>SMTP server error: Invalid User\r\n</p>\r\n' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '14' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058040' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '15' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058061' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '16' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058408' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '17' ,`accept` = '326196998@qq.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405058655' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '18' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405059546' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '19' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405059586' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '20' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405128267' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '21' ,`accept` = 'admin' ,`subject` = 'yii内容管理系统 重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=ODl0bivszkTuY</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405478217' ,`status` = 'failed' ,`level` = '3' ,`times` = '1' ,`error` = '必须提供至少一个收件人地址。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '22' ,`accept` = 'xb_zjh@126.com' ,`subject` = 'yii内容管理系统 重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NTFyW%2FPRv9k3Q</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405478290' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '23' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=MTwa0QO0xDn6o</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405480338' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '24' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405481428' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '25' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=NzZEF%2Fof9kzBU</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:\"></a>。</p>\r\n	' ,`sendtime` = '1405481945' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '26' ,`accept` = 'xb_zjh@126.com' ,`subject` = '重置密码' ,`message` = '\r\n			<p>尊敬的用户：admin 您好，您已经申请找回密码服务，请点击下面链接进行密码重置：<br/><br/>\r\n			<a href=\"http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.\">http://www.yii.local/?r=user/resetPwd&id=1&authcode=OTD0.f9bMDAL.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n			==================<br/><br/>请确保是本人操作，如果有其他疑问，\r\n			请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>\r\n	' ,`sendtime` = '1405495294' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '27' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405495713' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '28' ,`accept` = 'xb_zjh@126.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405495877' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '29' ,`accept` = '376685457@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE\">http://www.yii.local/?r=user/authEmail&id=2&authcode=MjQoTWN0lj0JE</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1405503421' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '30' ,`accept` = '376685457@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单 您好，欢迎注册YiifCMS官网，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.\">http://www.yii.local/?r=user/authEmail&id=2&authcode=NT3iantGg.og.</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1405503820' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '31' ,`accept` = 'k_tatsuguchi@toyo-tos.com' ,`subject` = '测试邮件标题' ,`message` = '测试邮件内容' ,`sendtime` = '1405565459' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '32' ,`accept` = '894046126@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：shiyang 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://yiifcms.com/user/authEmail/37/?authcode=MTbPAmNSgTcaA\">http://yiifcms.com/user/authEmail/37/?authcode=MTbPAmNSgTcaA</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407477194' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '33' ,`accept` = '326196997@qq.com' ,`subject` = '重设邮箱' ,`message` = '<p>尊敬的用户：没那么简单_qq 您好，您已经申请修改邮箱操作，请输入下面的验证码进行验证：<br/><br/>\r\n						395355<br/><br/>\r\n						==================<br/><br/>如果不是您本人操作，请尽快联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407812188' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '34' ,`accept` = '326196998@qq.com' ,`subject` = '重设邮箱' ,`message` = '<p>尊敬的用户：没那么简单_qq 您好，您已经申请修改邮箱操作，请输入下面的验证码进行验证：<br/><br/>\r\n						603410<br/><br/>\r\n						==================<br/><br/>如果不是您本人操作，请尽快联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1407812329' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '35' ,`accept` = 'soueovip@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：333333 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/53/?authcode=OT0stItHdpsdo\">http://www.yiifcms.com/user/authEmail/53/?authcode=OT0stItHdpsdo</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1409802823' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '36' ,`accept` = 'soueovip@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：333333 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/53/?authcode=NzdSzzk%2FAQvuA\">http://www.yiifcms.com/user/authEmail/53/?authcode=NzdSzzk%2FAQvuA</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1409802855' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '37' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么简单呵呵 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/60/?authcode=Mjf97LOVoA72w\">http://www.yiifcms.com/user/authEmail/60/?authcode=Mjf97LOVoA72w</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410354693' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '38' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/61/?authcode=OTOUybn%2F63INI\">http://www.yiifcms.com/user/authEmail/61/?authcode=OTOUybn%2F63INI</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410354894' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '39' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/62/?authcode=NzydrvEwSKLXM\">http://www.yiifcms.com/user/authEmail/62/?authcode=NzydrvEwSKLXM</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410355431' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '40' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/63/?authcode=OT5dkpUUQKV02\">http://www.yiifcms.com/user/authEmail/63/?authcode=OT5dkpUUQKV02</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410355595' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '41' ,`accept` = '326196998@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：没那么就爱你 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/64/?authcode=MzgXwe4RspPhc\">http://www.yiifcms.com/user/authEmail/64/?authcode=MzgXwe4RspPhc</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1410356130' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '42' ,`accept` = '1037269762@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：ikensz 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/67/?authcode=NzAlm5Nv.rhko\">http://www.yiifcms.com/user/authEmail/67/?authcode=NzAlm5Nv.rhko</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411391178' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '43' ,`accept` = 'hjun027@126.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：chj027 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/68/?authcode=NTb9pgRoISmNg\">http://www.yiifcms.com/user/authEmail/68/?authcode=NTb9pgRoISmNg</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411478512' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_mail_log` SET `id` = '44' ,`accept` = '1037269762@qq.com' ,`subject` = '账号激活' ,`message` = '<p>尊敬的新用户：ikensz 您好，欢迎注册yiifcms打造顶级内容管理系统，为了更好的为您服务，请尽快点击下面链接进行账号激活：<br/><br/>\r\n						<a href=\"http://www.yiifcms.com/user/authEmail/67/?authcode=OTiSeM9UTCkiE\">http://www.yiifcms.com/user/authEmail/67/?authcode=OTiSeM9UTCkiE</a><br/><br/>(如果上面链接不能点击，请复制到浏览器地址栏中进行访问。)<br/><br/>\r\n						==================<br/><br/>再次感谢您的光顾，如果有其他疑问，\r\n						请联系本网站的管理员：<a href=\"mailto:xb_zjh@126.com\">xb_zjh@126.com</a>。</p>' ,`sendtime` = '1411557869' ,`status` = 'success' ,`level` = '3' ,`times` = '1' ,`error` = '' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_menu`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL DEFAULT '' COMMENT '导航菜单',
  `menu_link` varchar(50) NOT NULL DEFAULT '' COMMENT '导航链接',
  `unique` varchar(20) NOT NULL DEFAULT '' COMMENT '唯一标示',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '1' ,`menu_name` = '首页' ,`menu_link` = 'index.php' ,`unique` = 'index' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '1' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '2' ,`menu_name` = '精品阅读' ,`menu_link` = 'post/index' ,`unique` = 'post' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '2' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '3' ,`menu_name` = '精品图集' ,`menu_link` = 'image/index' ,`unique` = 'image' ,`status` = 'N' ,`parent_id` = '0' ,`sort_order` = '0' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '4' ,`menu_name` = '下载' ,`menu_link` = 'soft/index' ,`unique` = 'soft' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '3' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '5' ,`menu_name` = '开发文档' ,`menu_link` = 'http://help.yiifcms.com/' ,`unique` = 'help' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '7' ,`target` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '6' ,`menu_name` = '导读' ,`menu_link` = 'page/guide' ,`unique` = 'guide' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '6' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '7' ,`menu_name` = '反馈' ,`menu_link` = 'question/index' ,`unique` = 'question' ,`status` = 'N' ,`parent_id` = '0' ,`sort_order` = '0' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '8' ,`menu_name` = '讨论区' ,`menu_link` = 'http://bbs.yiifcms.com/' ,`unique` = 'bbs' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '5' ,`target` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '9' ,`menu_name` = '成功案例' ,`menu_link` = 'http://www.yii.localhost/image/index/cat_23/' ,`unique` = 'case' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '4' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_menu`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL DEFAULT '' COMMENT '导航菜单',
  `menu_link` varchar(50) NOT NULL DEFAULT '' COMMENT '导航链接',
  `unique` varchar(20) NOT NULL DEFAULT '' COMMENT '唯一标示',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '是否显示',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='导航菜单表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '1' ,`menu_name` = '首页' ,`menu_link` = 'index.php' ,`unique` = 'index' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '1' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '2' ,`menu_name` = '精品阅读' ,`menu_link` = 'post/index' ,`unique` = 'post' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '2' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '3' ,`menu_name` = '精品图集' ,`menu_link` = 'image/index' ,`unique` = 'image' ,`status` = 'N' ,`parent_id` = '0' ,`sort_order` = '0' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '4' ,`menu_name` = '下载' ,`menu_link` = 'soft/index' ,`unique` = 'soft' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '3' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '5' ,`menu_name` = '开发文档' ,`menu_link` = 'http://help.yiifcms.com/' ,`unique` = 'help' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '7' ,`target` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '6' ,`menu_name` = '导读' ,`menu_link` = 'page/guide' ,`unique` = 'guide' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '6' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '7' ,`menu_name` = '反馈' ,`menu_link` = 'question/index' ,`unique` = 'question' ,`status` = 'N' ,`parent_id` = '0' ,`sort_order` = '0' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '8' ,`menu_name` = '讨论区' ,`menu_link` = 'http://bbs.yiifcms.com/' ,`unique` = 'bbs' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '5' ,`target` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_menu` SET `id` = '9' ,`menu_name` = '成功案例' ,`menu_link` = 'http://www.yii.localhost/image/index/cat_23/' ,`unique` = 'case' ,`status` = 'Y' ,`parent_id` = '0' ,`sort_order` = '4' ,`target` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_model_type`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  `seo_title` varchar(100) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(200) DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='内容模型表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '1' ,`type_key` = 'post' ,`type_name` = '文章' ,`model` = 'Post' ,`status` = 'Y' ,`seo_title` = '专业讲解web相关的文章和知识点' ,`seo_keywords` = 'web, php,mysql, nginx,yii,数据库，运维,服务器' ,`seo_description` = '聚合了优质的IT文章，无论你是前端工程师，还是后端程序员，都可以找到你想了解的知识和资讯，更多内容尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '2' ,`type_key` = 'image' ,`type_name` = '图集' ,`model` = 'Image' ,`status` = 'Y' ,`seo_title` = '最新最全的热门图集、精品爆图、美图' ,`seo_keywords` = '图片，图集，最新，热门，精品，最全，美女，爆料，搞笑' ,`seo_description` = '展示了用户最喜爱的美女图片、爆料图片、搞笑图片，惊爆眼球，更多内容尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '3' ,`type_key` = 'soft' ,`type_name` = '软件' ,`model` = 'Soft' ,`status` = 'Y' ,`seo_title` = '最新发布的yiifcms、热门手册、免费下载、建站工具' ,`seo_keywords` = 'yii，cms，免费，下载，最新，热门，最全，精品，建站，工具，安全，稳定' ,`seo_description` = '提供了web开发人员的建站工具和yiifcms发布版本，供感兴趣的用户下载和使用，详情了解尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '4' ,`type_key` = 'video' ,`type_name` = '视频' ,`model` = 'Video' ,`status` = 'Y' ,`seo_title` = '最新上映的电影、热门视频、热播电视剧、下载视频' ,`seo_keywords` = '视频，电影，微电影，电视剧，MV，MTV，最新，热门，热播，高清，下载' ,`seo_description` = '聚合了用户最喜爱的视频，尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_model_type`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_model_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `type_key` varchar(20) NOT NULL COMMENT '类型标示(英文字母)',
  `type_name` varchar(50) NOT NULL COMMENT '模型名称',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '内容模型',
  `status` enum('Y','N') DEFAULT 'Y',
  `seo_title` varchar(100) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(200) DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='内容模型表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '1' ,`type_key` = 'post' ,`type_name` = '文章' ,`model` = 'Post' ,`status` = 'Y' ,`seo_title` = '专业讲解web相关的文章和知识点' ,`seo_keywords` = 'web, php,mysql, nginx,yii,数据库，运维,服务器' ,`seo_description` = '聚合了优质的IT文章，无论你是前端工程师，还是后端程序员，都可以找到你想了解的知识和资讯，更多内容尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '2' ,`type_key` = 'image' ,`type_name` = '图集' ,`model` = 'Image' ,`status` = 'Y' ,`seo_title` = '最新最全的热门图集、精品爆图、美图' ,`seo_keywords` = '图片，图集，最新，热门，精品，最全，美女，爆料，搞笑' ,`seo_description` = '展示了用户最喜爱的美女图片、爆料图片、搞笑图片，惊爆眼球，更多内容尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '3' ,`type_key` = 'soft' ,`type_name` = '软件' ,`model` = 'Soft' ,`status` = 'Y' ,`seo_title` = '最新发布的yiifcms、热门手册、免费下载、建站工具' ,`seo_keywords` = 'yii，cms，免费，下载，最新，热门，最全，精品，建站，工具，安全，稳定' ,`seo_description` = '提供了web开发人员的建站工具和yiifcms发布版本，供感兴趣的用户下载和使用，详情了解尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_model_type` SET `id` = '4' ,`type_key` = 'video' ,`type_name` = '视频' ,`model` = 'Video' ,`status` = 'Y' ,`seo_title` = '最新上映的电影、热门视频、热播电视剧、下载视频' ,`seo_keywords` = '视频，电影，微电影，电视剧，MV，MTV，最新，热门，热播，高清，下载' ,`seo_description` = '聚合了用户最喜爱的视频，尽在yiifcms。' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `apiname` varchar(50) DEFAULT NULL COMMENT 'api名称',
  `apiconfig` text COMMENT '接口配置',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方登录授权表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'qq' ,`apiname` = 'QQ' ,`apiconfig` = '{\"appid\":101145243,\"appkey\":\"1016c728351ccd6756becae709b295f3\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/qq_callback\",\"scope\":\"get_user_info,add_t,del_t,get_info\",\"errorReport\":true,\"storageType\":\"file\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'renren' ,`apiname` = '人人网' ,`apiconfig` = '{\"app_key\":\"93f2b098f2244b6689e712406e20287f\",\"app_secret\":\"ab7910a1a77d4d60ac1db0a841c256d1\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/renren_callback\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'sinawb' ,`apiname` = '新浪微博' ,`apiconfig` = '{\"wb_akey\":\"818474510\",\"wb_skey\":\"2ae7d6bd43c759081c707ddfa029b409\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/sinawb_callback\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'weixin' ,`apiname` = '微信' ,`apiconfig` = '2821796254' ,`status` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `apiname` varchar(50) DEFAULT NULL COMMENT 'api名称',
  `apiconfig` text COMMENT '接口配置',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方登录授权表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'qq' ,`apiname` = 'QQ' ,`apiconfig` = '{\"appid\":101145243,\"appkey\":\"1016c728351ccd6756becae709b295f3\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/qq_callback\",\"scope\":\"get_user_info,add_t,del_t,get_info\",\"errorReport\":true,\"storageType\":\"file\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'renren' ,`apiname` = '人人网' ,`apiconfig` = '{\"app_key\":\"93f2b098f2244b6689e712406e20287f\",\"app_secret\":\"ab7910a1a77d4d60ac1db0a841c256d1\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/renren_callback\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'sinawb' ,`apiname` = '新浪微博' ,`apiconfig` = '{\"wb_akey\":\"818474510\",\"wb_skey\":\"2ae7d6bd43c759081c707ddfa029b409\",\"callback\":\"http:\\/\\/www.yiifcms.com\\/oAuth\\/sinawb_callback\"}' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth` SET `id` = 'weixin' ,`apiname` = '微信' ,`apiconfig` = '2821796254' ,`status` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_qq`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_qq` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'qq令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='qq绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '2CA62C4C3E44055483E2E5786702DC9A' ,`access_token` = '7EEC1500A4DFA3DE2B8E590F7B8DB8A8' ,`uid` = '48' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '34B58CC3C03CED1FF34061AC1CE10D69' ,`access_token` = '12129C6330EE8C1D0CCE474283D71A18' ,`uid` = '87' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '365F9CDC3C18601CCF2F8409EBBA4C67' ,`access_token` = '0F19F4FEFC38CA26C4ADAABCD07FC965' ,`uid` = '69' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '68F0ED46C9969417DED71BC3EEDFE7F8' ,`access_token` = 'A7856071F36BB6D50EE221CA1A1B118B' ,`uid` = '70' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '692B3F32EF29BE511D95B0DF160BA691' ,`access_token` = '1F855A666A04D16E13F68B08CB1B457F' ,`uid` = '83' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '692F6AC2EA70ED38A7545D92C2F3A028' ,`access_token` = 'DD0BD3285374C8695BD1864F379F65E4' ,`uid` = '58' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '7AC58F47FEAEB7A95FFF139AE88BC458' ,`access_token` = '061BC8558114E6FA2AD6F64C0B6DB9EB' ,`uid` = '141' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '8D5A6D78BF4C352987E21B852B5D1655' ,`access_token` = 'A9AE129EF8BA0722164890B2FBA18190' ,`uid` = '65' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '9A0849B09F1FA059709E00ECB2E5CDC8' ,`access_token` = '0048051362A6ABB615B03EE7197B8525' ,`uid` = '66' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'C80EA7633FAB1FF573359881C41E0DCB' ,`access_token` = '675DA0599C7FADD1C416417B70B3E482' ,`uid` = '43' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'CE2F917362A76103DCCDC5FF7FB21040' ,`access_token` = '777710EA8F01131401930BE4F9D62BE4' ,`uid` = '73' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'D8BD3F07EE239BBF57BA6B88F28624C5' ,`access_token` = 'CF29280EF0D89334526B2AEAEE4CE831' ,`uid` = '52' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'DFD1ABED7E206106BB832ED1CF768F13' ,`access_token` = '2C07CF0C1ED1E56CBE163BADF67E4C6C' ,`uid` = '89' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'E644852A58EF5B1D8EEEF270A81263D9' ,`access_token` = 'EA75F4BF3D13C14888683BD3BCF81742' ,`uid` = '88' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'F1E6C7AB1DE74D692BE6DB500FC13AF9' ,`access_token` = '23C8F9C7709E9842E17E3AA79C661154' ,`uid` = '77' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_qq`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_qq` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'qq令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='qq绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '2CA62C4C3E44055483E2E5786702DC9A' ,`access_token` = '7EEC1500A4DFA3DE2B8E590F7B8DB8A8' ,`uid` = '48' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '34B58CC3C03CED1FF34061AC1CE10D69' ,`access_token` = '12129C6330EE8C1D0CCE474283D71A18' ,`uid` = '87' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '365F9CDC3C18601CCF2F8409EBBA4C67' ,`access_token` = '0F19F4FEFC38CA26C4ADAABCD07FC965' ,`uid` = '69' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '68F0ED46C9969417DED71BC3EEDFE7F8' ,`access_token` = 'A7856071F36BB6D50EE221CA1A1B118B' ,`uid` = '70' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '692B3F32EF29BE511D95B0DF160BA691' ,`access_token` = '1F855A666A04D16E13F68B08CB1B457F' ,`uid` = '83' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '692F6AC2EA70ED38A7545D92C2F3A028' ,`access_token` = 'DD0BD3285374C8695BD1864F379F65E4' ,`uid` = '58' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '7AC58F47FEAEB7A95FFF139AE88BC458' ,`access_token` = '061BC8558114E6FA2AD6F64C0B6DB9EB' ,`uid` = '141' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '8D5A6D78BF4C352987E21B852B5D1655' ,`access_token` = 'A9AE129EF8BA0722164890B2FBA18190' ,`uid` = '65' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = '9A0849B09F1FA059709E00ECB2E5CDC8' ,`access_token` = '0048051362A6ABB615B03EE7197B8525' ,`uid` = '66' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'C80EA7633FAB1FF573359881C41E0DCB' ,`access_token` = '675DA0599C7FADD1C416417B70B3E482' ,`uid` = '43' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'CE2F917362A76103DCCDC5FF7FB21040' ,`access_token` = '777710EA8F01131401930BE4F9D62BE4' ,`uid` = '73' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'D8BD3F07EE239BBF57BA6B88F28624C5' ,`access_token` = 'CF29280EF0D89334526B2AEAEE4CE831' ,`uid` = '52' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'DFD1ABED7E206106BB832ED1CF768F13' ,`access_token` = '2C07CF0C1ED1E56CBE163BADF67E4C6C' ,`uid` = '89' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'E644852A58EF5B1D8EEEF270A81263D9' ,`access_token` = 'EA75F4BF3D13C14888683BD3BCF81742' ,`uid` = '88' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_qq` SET `openid` = 'F1E6C7AB1DE74D692BE6DB500FC13AF9' ,`access_token` = '23C8F9C7709E9842E17E3AA79C661154' ,`uid` = '77' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_renren`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_renren` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人人网绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_renren` SET `openid` = '258306070' ,`access_token` = '270890|2.775oCGfklBkVKtETIN7I8Kum8VUL7vW9.258306070.1408072177426' ,`uid` = '51' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_renren`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_renren` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人人网绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_renren` SET `openid` = '258306070' ,`access_token` = '270890|2.775oCGfklBkVKtETIN7I8Kum8VUL7vW9.258306070.1408072177426' ,`uid` = '51' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_sinawb`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_sinawb` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新浪微博绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '1503697997' ,`access_token` = '2.00VX3ldB0mbO5t8e4d0452c6vTQYUC' ,`uid` = '47' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '1851032304' ,`access_token` = '2.00kDkQBC0mbO5t1e5760b790AbaPmB' ,`uid` = '72' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '2410897424' ,`access_token` = '2.001YsJdC0mbO5t4ece8e70bcK_2QbD' ,`uid` = '85' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '5244883271' ,`access_token` = '2.00TjzwiF0mbO5taaa5424a0d7oX4zB' ,`uid` = '49' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '5252925015' ,`access_token` = '2.00BljUjF0mbO5tad71396d980KjWRr' ,`uid` = '50' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_sinawb`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_sinawb` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新浪微博绑定表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '1503697997' ,`access_token` = '2.00VX3ldB0mbO5t8e4d0452c6vTQYUC' ,`uid` = '47' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '1851032304' ,`access_token` = '2.00kDkQBC0mbO5t1e5760b790AbaPmB' ,`uid` = '72' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '2410897424' ,`access_token` = '2.001YsJdC0mbO5t4ece8e70bcK_2QbD' ,`uid` = '85' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '5244883271' ,`access_token` = '2.00TjzwiF0mbO5taaa5424a0d7oX4zB' ,`uid` = '49' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_oauth_sinawb` SET `openid` = '5252925015' ,`access_token` = '2.00BljUjF0mbO5tad71396d980KjWRr' ,`uid` = '50' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_oauth_weixin`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_oauth_weixin` (
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT 'client_id',
  `access_token` varchar(100) DEFAULT NULL COMMENT '令牌',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '本地用户ID',
  PRIMARY KEY (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信绑定表';

-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_page`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_page` (
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

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'comment' ,`title` = '评论审核' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">对内容的评论或者回复需要审核通过后 才可以看到</span> \r\n</p>\r\n<span style=\"font-size:14px;\"></span>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '6' ,`view_count` = '283' ,`status` = 'Y' ,`create_time` = '1407120050' ,`update_time` = '1407120061' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'disclaimer' ,`title` = '免责声明' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<ol>\r\n	<li>\r\n		<span style=\"font-size:16px;\">本站点的所有内容 均来自个人和互联网 不存在版权纠纷</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">对于特殊的评论仅仅代表个人观点，和本站无关</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">如果对于转载的内容侵犯了您的权益，请告知于我<br />\r\n</span> \r\n	</li>\r\n</ol>\r\n<p>\r\n	<br />\r\n</p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '5' ,`view_count` = '257' ,`status` = 'Y' ,`create_time` = '1407118521' ,`update_time` = '1407118583' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'feature' ,`title` = '特色介绍' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"free\">开源、免费</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms是基于yiiframework开发的内容管理系统，它开源、免费，用户可以自由下载、使用、修改、学习交流。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"safe\">安全、高效</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiiframework本身是一个很安全的高性能的开源框架，使用它您不用担心安全问题，它会使您的网站运行的很良好。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-size:16px;font-family:Microsoft YaHei;\" id=\"handy\">简洁、方便</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms有简洁、方便的后台管理，用户不需要了解复杂的逻辑关系，就可以很快速的发布内容，优化管理。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"stable\">轻松、稳定</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms架构合理、布局优美，是您轻松建站和学习的不二之选。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '2' ,`view_count` = '596' ,`status` = 'Y' ,`create_time` = '1322999588' ,`update_time` = '1407118550' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'guide' ,`title` = '新手指南' ,`introduce` = '' ,`content` = '<br/><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p><span style=\"font-size: 16px;\"> 内容：包括精品阅读，精美图集，常用下载，云标签等 用户可以自由浏览内容 无权限限制&nbsp; 仅仅对内容发表评论的时候 需要</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"用户登录\" target=\"_blank\" href=\"http://www.yiifcms.com/user/login\"><span style=\"font-size: 16px;\">登录</span></a><br/></p></li><li><p><span style=\"font-size: 16px;\">搜索：用户可以在网站顶部搜索关键字（单个关键字、多个关键字用空格隔开） 匹配较优质的最贴近需求的前10条结果展示给用户 另外可以通过标签直接搜索</span></p></li><li><p><span style=\"font-size: 16px;\">登录：用户可以通过本站注册的用户进行登录，也可以通过合作伙伴（腾讯QQ、新浪微博、人人网）进行授权登录，无需填写过多信息，直接可以正常登录</span></p></li><li><p><span style=\"font-size: 16px;\">注册：除了第三方登录会自动注册外，本站也提供新用户注册入口(</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"注册\" target=\"_blank\" href=\"http://www.yiifcms.com/user/register\"><span style=\"font-size: 16px;\">http://www.yiifcms.com/user/register</span></a><span style=\"font-size: 16px;\">) 详情查看：</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"注册流程\" target=\"_self\" href=\"http://www.yiifcms.com/page/register\"><span style=\"font-size: 16px;\">注册流程</span></a></p></li><li><p><span style=\"font-size: 16px;\">留言反馈：如果您对本站有任何疑问或者意见建议 欢迎使用给本站</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"留言反馈\" target=\"_blank\" href=\"http://www.yiifcms.com/question/index\"><span style=\"font-size: 16px;\">留言</span></a><br/></p></li></ol><br/>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '3' ,`view_count` = '974' ,`status` = 'Y' ,`create_time` = '1379392484' ,`update_time` = '1410312587' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'register' ,`title` = '注册流程' ,`introduce` = '' ,`content` = '<p><strong><span style=\"font-size: 16px;\">1. 用户需要填写用户名，密码，真实邮箱(作为激活和找回密码唯一工具)</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><span style=\"font-size:16px;\"><img alt=\"1.jpg\" src=\"/uploads/images/201409/1410311278946354.jpg\" title=\"1410311278946354.jpg\"/></span></p><p><br/></p><p><strong><span style=\"font-size: 16px;\">2.提交之后，有成功提示：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><img alt=\"2.jpg\" src=\"/uploads/images/201409/1410311338996060.jpg\" title=\"1410311338996060.jpg\"/></p><p><br/></p><p><strong><span style=\"font-size: 16px;\">3. 然后登录到注册的邮箱 查看是否收到(yiifcms官网postmaster@yiifcms.com发送的)激活邮件:</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><span style=\"font-size: 16px;\"><img alt=\"3.jpg\" src=\"/uploads/images/201409/1410311446674356.jpg\" title=\"1410311446674356.jpg\"/></span></p><p>&nbsp;<strong><span style=\"font-size: 16px;\">点击“激活链接” ：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><img alt=\"4.jpg\" src=\"/uploads/images/201409/1410311491156850.jpg\" title=\"1410311491156850.jpg\"/></p><p><br/></p><p><br/></p><p><span style=\"font-size: 16px;\"><strong>表示账号已经激活！</strong></span></p><p><strong><br/></strong></p><p><br/></p><p><span style=\"font-size: 16px;\"><strong>4.&nbsp; 如果没收到邮件，可以先登录，在个人中心里面可以再次发送邮件进行激活。</strong></span></p><p><br/><span style=\"font-size: 16px;\"></span></p><p><br/></p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '4' ,`view_count` = '439' ,`status` = 'Y' ,`create_time` = '1331877791' ,`update_time` = '1410311739' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_page`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_page` (
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

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'comment' ,`title` = '评论审核' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">对内容的评论或者回复需要审核通过后 才可以看到</span> \r\n</p>\r\n<span style=\"font-size:14px;\"></span>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '6' ,`view_count` = '283' ,`status` = 'Y' ,`create_time` = '1407120050' ,`update_time` = '1407120061' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'disclaimer' ,`title` = '免责声明' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<ol>\r\n	<li>\r\n		<span style=\"font-size:16px;\">本站点的所有内容 均来自个人和互联网 不存在版权纠纷</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">对于特殊的评论仅仅代表个人观点，和本站无关</span> \r\n	</li>\r\n	<li>\r\n		<span style=\"font-size:16px;\">如果对于转载的内容侵犯了您的权益，请告知于我<br />\r\n</span> \r\n	</li>\r\n</ol>\r\n<p>\r\n	<br />\r\n</p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '5' ,`view_count` = '257' ,`status` = 'Y' ,`create_time` = '1407118521' ,`update_time` = '1407118583' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'feature' ,`title` = '特色介绍' ,`introduce` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"free\">开源、免费</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms是基于yiiframework开发的内容管理系统，它开源、免费，用户可以自由下载、使用、修改、学习交流。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"safe\">安全、高效</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiiframework本身是一个很安全的高性能的开源框架，使用它您不用担心安全问题，它会使您的网站运行的很良好。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<strong><span style=\"font-size:16px;font-family:Microsoft YaHei;\" id=\"handy\">简洁、方便</span></strong> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms有简洁、方便的后台管理，用户不需要了解复杂的逻辑关系，就可以很快速的发布内容，优化管理。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-family:Microsoft YaHei;font-size:16px;\" id=\"stable\">轻松、稳定</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">yiifcms架构合理、布局优美，是您轻松建站和学习的不二之选。</span> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '2' ,`view_count` = '596' ,`status` = 'Y' ,`create_time` = '1322999588' ,`update_time` = '1407118550' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'guide' ,`title` = '新手指南' ,`introduce` = '' ,`content` = '<br/><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p><span style=\"font-size: 16px;\"> 内容：包括精品阅读，精美图集，常用下载，云标签等 用户可以自由浏览内容 无权限限制&nbsp; 仅仅对内容发表评论的时候 需要</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"用户登录\" target=\"_blank\" href=\"http://www.yiifcms.com/user/login\"><span style=\"font-size: 16px;\">登录</span></a><br/></p></li><li><p><span style=\"font-size: 16px;\">搜索：用户可以在网站顶部搜索关键字（单个关键字、多个关键字用空格隔开） 匹配较优质的最贴近需求的前10条结果展示给用户 另外可以通过标签直接搜索</span></p></li><li><p><span style=\"font-size: 16px;\">登录：用户可以通过本站注册的用户进行登录，也可以通过合作伙伴（腾讯QQ、新浪微博、人人网）进行授权登录，无需填写过多信息，直接可以正常登录</span></p></li><li><p><span style=\"font-size: 16px;\">注册：除了第三方登录会自动注册外，本站也提供新用户注册入口(</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"注册\" target=\"_blank\" href=\"http://www.yiifcms.com/user/register\"><span style=\"font-size: 16px;\">http://www.yiifcms.com/user/register</span></a><span style=\"font-size: 16px;\">) 详情查看：</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"注册流程\" target=\"_self\" href=\"http://www.yiifcms.com/page/register\"><span style=\"font-size: 16px;\">注册流程</span></a></p></li><li><p><span style=\"font-size: 16px;\">留言反馈：如果您对本站有任何疑问或者意见建议 欢迎使用给本站</span><a style=\"font-size: 16px; text-decoration: underline;\" title=\"留言反馈\" target=\"_blank\" href=\"http://www.yiifcms.com/question/index\"><span style=\"font-size: 16px;\">留言</span></a><br/></p></li></ol><br/>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '3' ,`view_count` = '974' ,`status` = 'Y' ,`create_time` = '1379392484' ,`update_time` = '1410312587' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_page` SET `id` = 'register' ,`title` = '注册流程' ,`introduce` = '' ,`content` = '<p><strong><span style=\"font-size: 16px;\">1. 用户需要填写用户名，密码，真实邮箱(作为激活和找回密码唯一工具)</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><span style=\"font-size:16px;\"><img alt=\"1.jpg\" src=\"/uploads/images/201409/1410311278946354.jpg\" title=\"1410311278946354.jpg\"/></span></p><p><br/></p><p><strong><span style=\"font-size: 16px;\">2.提交之后，有成功提示：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><img alt=\"2.jpg\" src=\"/uploads/images/201409/1410311338996060.jpg\" title=\"1410311338996060.jpg\"/></p><p><br/></p><p><strong><span style=\"font-size: 16px;\">3. 然后登录到注册的邮箱 查看是否收到(yiifcms官网postmaster@yiifcms.com发送的)激活邮件:</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><span style=\"font-size: 16px;\"><img alt=\"3.jpg\" src=\"/uploads/images/201409/1410311446674356.jpg\" title=\"1410311446674356.jpg\"/></span></p><p>&nbsp;<strong><span style=\"font-size: 16px;\">点击“激活链接” ：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><p><img alt=\"4.jpg\" src=\"/uploads/images/201409/1410311491156850.jpg\" title=\"1410311491156850.jpg\"/></p><p><br/></p><p><br/></p><p><span style=\"font-size: 16px;\"><strong>表示账号已经激活！</strong></span></p><p><strong><br/></strong></p><p><br/></p><p><span style=\"font-size: 16px;\"><strong>4.&nbsp; 如果没收到邮件，可以先登录，在个人中心里面可以再次发送邮件进行激活。</strong></span></p><p><br/><span style=\"font-size: 16px;\"></span></p><p><br/></p>' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`link` = '' ,`sort_order` = '4' ,`view_count` = '439' ,`status` = 'Y' ,`create_time` = '1331877791' ,`update_time` = '1410311739' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_post`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_post` (
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COMMENT='内容管理';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '29' ,`user_id` = '1' ,`title` = 'Yii 框架创建自己的 web 应用' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '20' ,`special_id` = '0' ,`introduce` = 'Yii 是当今国内外最为流行的 PHP 框架。由于它高性能的特性，被公认为是“最有效率的 PHP 框架”。Yii 提供了今日 Web 2.0 应用开发所需要的几乎一切功能。它可以通过一个简单的命令 yiic 来快速创建一个 Web 应用程序的代码框架，开发人员通过在生成的代码框架上编写自己的业务逻辑，来实现 Web 应用的快速开发。本文将通过具体的实例对 Yii 框架进行阐述，使读者在真实的案例中' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 style=\"text-indent:2em;\" id=\"major1\">\r\n	Yii 框架概述</h2><h3 style=\"text-indent:2em;\" id=\"minor1.1\">\r\n	Yii 是什么？</h3><p style=\"text-indent:2em;\">\r\n	Yii 是一个高性能的、基于组件的 PHP 框架，用于 Web 应用程序的快速开发。</p><p style=\"text-indent:2em;\">\r\n	Yii 的名字来源于“Yes It Is”的字母缩写。这句话肯定地回答了众多关于这个框架的疑问：“它是否快速？是否安全？是否强大？是否适合我们的项目？”</p><h3 style=\"text-indent:2em;\" id=\"minor1.2\">\r\n	Yii 适合做什么？</h3><p style=\"text-indent:2em;\">\r\n	Yii 是一个通用的轻量级 Web 编程框架，可以用于开发几乎所有的 Web 应用。具备它成熟的缓存机制，特别适用于开发高流量的应用，例如门户网站，论坛，内容管理系统（CMS），电子商务系统等等。</p><h3 style=\"text-indent:2em;\" id=\"minor1.3\">\r\n	Yii 和其他软件相比有哪些优势？</h3><p style=\"text-indent:2em;\">\r\n	和大多数 PHP 框架类似，Yii 是一个 MVC 框架，通过分离业务逻辑和用户界面，使开发者可以很容易地进行修改而不影响其它部分。</p><p style=\"text-indent:2em;\">\r\n	Yii 在设计时借鉴和集成了很多其他著名 Web 编程框架和应用，最大程度地考虑了 Web 应用开发的各种需要。所以 Yii 无论是在优异的性能上，还是丰富的功能和清晰的文档上，都使得它从众多 PHP 框架中脱颖而出。</p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major2\">\r\n	Yii 的安装及配置</h2><h3 style=\"text-indent:2em;\" id=\"minor2.1\">\r\n	安装前的准备</h3><p style=\"text-indent:2em;\">\r\n	在\r\n安装和使用 Yii 之前，你需要有一个安装好 PHP 和 Web \r\n服务器的环境。目前，有很多集成环境软件可以轻松的实现这部分的安装。比如我们在这里使用的 WampServer。你可以从 WampServer \r\n的官方网站上下载和安装。WampServer 的安装非常简单，双击执行就可以了。安装过程中，它会自动为你安装 Apache， MySQL 和 \r\nPHP，不需要任何额外的配置，一切都完成得既轻松又简单。</p><h3 style=\"text-indent:2em;\" id=\"minor2.2\">\r\n	Yii 的安装</h3><p style=\"text-indent:2em;\">\r\n	Yii 的安装更是简单得让你难以想象，只需要执行下面两个步骤，就可以开始使用了。</p><p style=\"text-indent:2em;\">\r\n	一：从 Yii 的官方网站下载 Yii 框架</p><p style=\"text-indent:2em;\">\r\n	二：把下载的文件解压缩到一个 Web 可以访问的文件夹里</p><p style=\"text-indent:2em;\">\r\n	如果想验证 Yii 是否安装成功，只需要在浏览器中输入下面的 URL 就可以了。</p><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">http://hostname/path/to/yii/requirements/index.php</pre><br/></pre><p style=\"text-indent:2em;\">\r\n	下面是我们从浏览器里看到的页面显示。</p><h5 style=\"text-indent:2em;\" id=\"fig1\">\r\n	图 1. Yii 安装成功的页面显示</h5><p style=\"text-indent:2em;\"><img alt=\"图 1. Yii 安装成功的页面显示\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image001.jpg\" width=\"581\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major3\">\r\n	如何使用 Yii 创建 Web 应用</h2><h3 style=\"text-indent:2em;\" id=\"minor3.1\">\r\n	使用命令行工具 yiic 创建 web 应用</h3><p style=\"text-indent:2em;\">\r\n	Yiic 是一个命令行工具，通过它，你可以通过简单的使用一条命令，来创建一个完整的应用。</p><p style=\"text-indent:2em;\">\r\n	YiiRoot/framework/yiic webapp WebRoot/testdrive</p><p style=\"text-indent:2em;\">\r\n	比如：C:\\wamp\\www\\yii\\framework&gt;yiic.bat webapp c:\\wamp\\www\\abc</p><p style=\"text-indent:2em;\">\r\n	这条命令在 www 目录下面自动为你创建了一个名为 abc 的 Yii 的代码框架。你可以通过下面这个 URL 在本地访问这个刚刚创建的应用。</p><p style=\"text-indent:2em;\">\r\n	http://localhost/abc/index.php</p><p style=\"text-indent:2em;\">\r\n	下图就是我们刚刚创建的 Web 应用</p><h5 style=\"text-indent:2em;\" id=\"fig2\">\r\n	图 2. 使用 yiic 创建的 Web 应用</h5><p style=\"text-indent:2em;\"><img alt=\"图 2. 使用 yiic 创建的 Web 应用\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image002.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major4\">\r\n	实例讲解基于 Yii 的测试数据维护系统的实现</h2><p style=\"text-indent:2em;\">\r\n	我们通过一个简单的测试数据维护系统来向大家演示如何使用 Yii framework 快速开发一个 Web 应用，来满足我们工作上的需要。</p><p style=\"text-indent:2em;\">\r\n	下面我来简要介绍一下这个 web 应用的基本需求：</p><p style=\"text-indent:2em;\">\r\n	这个 Web 应用主要实现对测试数据的维护和存储，包括增删改查等基本的功能。测试数据由两个二维表组成，两个表之间是“头 - 明细”的关系。所有数据存放在关系型数据库中，方便统计查询和日后的扩展。</p><h3 style=\"text-indent:2em;\" id=\"minor4.1\">\r\n	应用程序的设计和准备</h3><p style=\"text-indent:2em;\"><strong>功能需求</strong> </p><p style=\"text-indent:2em;\">\r\n	最基本的功能就是“增删改查”。这里就是分别对测试数据的主表和明细表两个表的进行增删改查的操作。</p><p style=\"text-indent:2em;\">\r\n	要求使用者用各自的用户登录使用，并记录最近修改人和日期。</p><p style=\"text-indent:2em;\"><strong>数据库的选择和设计</strong> </p><p style=\"text-indent:2em;\">\r\n	选用 SQLite 进行数据的存储。</p><p style=\"text-indent:2em;\">\r\n	SQLite 是一种小型的嵌入式数据库，它小巧灵活，资源占用少，处理速度快，非常适合中小型应用的数据存储。由于其各方面的出色表现，得到越来越多的开发人员的青睐。</p><p style=\"text-indent:2em;\"><strong>创建表：</strong> </p><p style=\"text-indent:2em;\">\r\n	根据应用程序的需要，我们将测试数据分别存放在两张表中。一个是主表，存放文件信息（file）；另一个是明细表，存在文件中的内容信息（pii）。两个表之间是“头 - 明细”的关系。</p><h5 style=\"text-indent:2em;\" id=\"listing1\"><span style=\"font-size:14px;\">清单 1. 创建表 pii 和 file 的 SQL 语句</span></h5><pre class=\"displaycode\">&nbsp;CREATE&nbsp;TABLE&nbsp;file&nbsp;(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;INTEGER&nbsp;NOT&nbsp;NULL&nbsp;PRIMARY&nbsp;KEY&nbsp;AUTOINCREMENT,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Package&nbsp;VARCHAR(50)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiFile&nbsp;VARCHAR(255)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;FileInServer&nbsp;VARCHAR(255),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Comment&nbsp;VARCHAR(255)&nbsp;\r\n&nbsp;)&nbsp;\r\n&nbsp;CREATE&nbsp;TABLE&nbsp;&quot;pii&quot;&nbsp;(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;INTEGER&nbsp;NOT&nbsp;NULL&nbsp;PRIMARY&nbsp;KEY&nbsp;AUTOINCREMENT,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiFileId&nbsp;INTEGER&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiStr&nbsp;VARCHAR(1000)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;CaseNo&nbsp;VARCHAR(18)&nbsp;default&nbsp;&#39;-&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Category&nbsp;VARCHAR(50),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Shipment&nbsp;INTEGER,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;UpdatedAt&nbsp;DATETIME,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;ModifiedBy&nbsp;VARCHAR(30),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Comment&nbsp;VARCHAR(255)&nbsp;\r\n&nbsp;)</pre><p style=\"text-indent:2em;\"><strong>数据初始化：</strong> </p><p style=\"text-indent:2em;\">\r\n	使用 SQLite Manager 导入数据。SQLite Manager 是一个 Firefox 的插件，可以方便的管理和维护 SQLite 数据库。</p><p style=\"text-indent:2em;\">\r\n	将\r\n准备好的测试数据整理成 csv, txt 等格式，通过 SQLite Manager \r\n进行导入。数据即可快速准备就绪。所有的数据都存放在嵌入式数据库 SQLite 中。在应用程序框架建立后，我们将准备好的数据库文件复制到目录 \r\nC:\\wamp\\www\\pii\\protected\\data 下。</p><h3 style=\"text-indent:2em;\" id=\"minor4.2\">\r\n	创建应用程序框架</h3><p style=\"text-indent:2em;\">\r\n	在上面我们提到“使用命令行工具 yiic 创建 web 应用”，这里，我们就演示一下如何通过命令行的方式来创建一个应用程序。</p><pre class=\"displaycode\">&nbsp;C:\\wamp\\www\\yii\\framework&gt;yiic.bat&nbsp;webapp&nbsp;c:\\wamp\\www\\pii</pre><p style=\"text-indent:2em;\">\r\n	这条命令在 www 目录下面自动为你创建了一个名为 pii 的 Yii 的代码框架。你可以通过下面这个 URL 在本地访问这个刚刚创建的应用。</p><p style=\"text-indent:2em;\">\r\n	http://localhost/pii/index.php</p><p style=\"text-indent:2em;\">\r\n	这时，我们看到 web 页面上有 4 个缺省的 tab：“Home”，“About”，“Contact”和“Login”。下面我们将在页面上加入一些基本功能的实现。</p><h3 style=\"text-indent:2em;\" id=\"minor4.3\">\r\n	加入基本功能</h3><p style=\"text-indent:2em;\"><strong>实现表的 CRUD 功能</strong> </p><p style=\"text-indent:2em;\">\r\n	首先，我们需要实现对文件信息的增删改查，即对表 file 中的数据进行操作和维护。</p><p style=\"text-indent:2em;\"><strong>1. 连接数据库：</strong> </p><p style=\"text-indent:2em;\">\r\n	将准备好的数据库文件 pii.sqlite 放置在 C:\\wamp\\www\\pii\\protected\\data 目录下。</p><p style=\"text-indent:2em;\">\r\n	在文件 C:\\wamp\\www\\pii\\protected\\config\\main.php 中，定义使用的数据库文件。</p><h5 style=\"text-indent:2em;\" id=\"listing2\"><span style=\"font-size:14px;\">清单 2. 定义数据库文件</span></h5><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">&#39;db&#39;=&gt;array(&nbsp;\r\n&nbsp;&#39;connectionString&#39;&nbsp;=&gt;&nbsp;&#39;sqlite:&#39;.dirname(__FILE__).&#39;/../data/pii.sqlite&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),</pre><br/></pre><p style=\"text-indent:2em;\"><strong>2. 配置 Gii 代码生成器</strong> </p><p style=\"text-indent:2em;\">\r\n	Gii 是一个强大 web 应用代码生成器，可以取代或者简化开发者的工作量，自动生成代码实现标准的功能模块。在使用前，我们需要对文件 C:\\wamp\\www\\pii\\protected\\config\\main.php 做些定义。</p><h5 style=\"text-indent:2em;\" id=\"listing3\"><span style=\"font-size:14px;\">清单 3. 配置 Gii 代码生成器</span></h5><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">&#39;import&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;application.models.*&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;application.components.*&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&#39;modules&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;gii&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;class&#39;=&gt;&#39;system.gii.GiiModule&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;password&#39;=&gt;&#39;password&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),</pre><br/></pre><p style=\"text-indent:2em;\">\r\n	定义之后，我们可以通过 URL http://hostname/pii/index.php?r=gii 来访问 Gii。</p><h5 style=\"text-indent:2em;\" id=\"fig3\"><span style=\"font-size:14px;\">图 3. Gii 代码生成器</span></h5><p style=\"text-indent:2em;\"><img alt=\"图 3. Gii 代码生成器\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image003.jpg\" width=\"503\"/> </p><h3 style=\"text-indent:2em;\" id=\"listing4\">\r\n	3. 使用 Gii 为数据表建模</h3><p style=\"text-indent:2em;\">\r\n	在 Gii 中，我们将使用 Model Generator 为数据库中的表建模。我们选择 Model Generator 之后，可以看到下面的页面。</p><h5 style=\"text-indent:2em;\" id=\"fig4\">\r\n	图 4. 使用 Model Generator 生成模块代码</h5><p style=\"text-indent:2em;\"><img alt=\"图 4. 使用 Model Generator 生成模块代码\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image004.jpg\" width=\"517\"/> </p><p style=\"text-indent:2em;\">\r\n	预览并生成代码，这个生成器会在 protected/models 生成模块文件 File.php。</p><p style=\"text-indent:2em;\"><strong>4. 为表创建 CRUD 代码</strong> </p><p style=\"text-indent:2em;\">\r\n	有了模块文件，我们需要使用 Gii 中的 Crud Generator 为这个模块生成 CRUD 代码。</p><h5 style=\"text-indent:2em;\" id=\"fig5\">\r\n	图 5. 使用 CRUD 生成器生成代码</h5><p style=\"text-indent:2em;\"><img alt=\"图 5. 使用 CRUD 生成器生成代码\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image005.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\">\r\n	这时，通过 http://localhost/pii/index.php?r=file，你就可以看到 File 的维护界面了。</p><h5 style=\"text-indent:2em;\" id=\"fig6\">\r\n	图 6. 生成的 Files 维护界面</h5><p style=\"text-indent:2em;\"><img alt=\"图 6. 生成的 Files 维护界面\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image006.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\">\r\n	使用同样的方法，我们也可以为明细表 pii 创建了相应的 php 文件和维护页面。</p><p style=\"text-indent:2em;\"><strong>5. 将创建的功能加入到 Web 应用中</strong> </p><p style=\"text-indent:2em;\">\r\n	下面，我们要介绍如何把刚刚创建的功能加入到 Web 应用中。首先，我们需要对文件 C:\\wamp\\www\\pii_OK\\protected\\views\\layouts\\main.php 进行一点修改。</p><p style=\"text-indent:2em;\">\r\n	在\r\n这个文件里，我们可以根据自己的需要来定制将要显示的页面。比如，看下面的代码，我们做了两处改动：第一是取消了 Home 和 Contact 两个 \r\ntab 的显示，我们通过加“//”注释了这两行代码。第二是增加了两个 tab：Files 和 \r\nPIIs，新增加的两行代码实现了显示上面步骤里我们创建的两个页面。</p><h5 style=\"text-indent:2em;\" id=\"listing5\"><span style=\"font-size:14px;\">清单 4. 自定义标签页</span></h5><pre class=\"displaycode\">&nbsp;&lt;div&nbsp;id=&quot;mainmenu&quot;&gt;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;$this-&gt;widget(&#39;zii.widgets.CMenu&#39;,array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;items&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;array(&#39;label&#39;=&gt;&#39;Home&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/index&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Files&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/file/admin&#39;)),&nbsp;&nbsp;//&nbsp;new&nbsp;added\r\n	&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;PIIs&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/pii/admin&#39;)),&nbsp;&nbsp;&nbsp;//&nbsp;new&nbsp;added\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;About&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/page&#39;,&nbsp;&#39;view&#39;=&gt;&#39;about&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;array(&#39;label&#39;=&gt;&#39;Contact&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/contact&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Login&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/login&#39;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;visible&#39;=&gt;Yii::app()-&gt;user-&gt;isGuest),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Logout&nbsp;(&#39;.Yii::app()-&gt;user-&gt;name.&#39;)&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;url&#39;=&gt;array(&#39;/site/logout&#39;),&nbsp;&#39;visible&#39;=&gt;!Yii::app()-&gt;user-&gt;isGuest)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;));&nbsp;?&gt;&nbsp;\r\n&nbsp;&lt;/div&gt;&lt;!--&nbsp;mainmenu&nbsp;--&gt;</pre><p style=\"text-indent:2em;\">\r\n	现在来看看效果吧。果然，Home 和 Contact 页面不见了，取代它们的是 Files 和 PIIs 页面。</p><h5 style=\"text-indent:2em;\" id=\"fig7\"><span style=\"font-size:14px;\">图 7. 加入了 Files 和 PIIs 的 Web 应用</span></h5><p style=\"text-indent:2em;\"><img alt=\"图 7. 加入了 Files 和 PIIs 的 Web 应用\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image007.jpg\" width=\"581\"/> </p><p style=\"text-indent:2em;\">\r\n	通过这一步，我们将新创建的两个数据表 DRUD 的应用就添加到我们的网页中了。我们已经可以直接通过这两个页面来维护表里面的数据了。</p><h3 style=\"text-indent:2em;\" id=\"minor4.4\">\r\n	完善功能</h3><p style=\"text-indent:2em;\">\r\n	到\r\n目前为止，一个关于数据表维护的 Web \r\n应用的主要功能就基本实现了。当然，我们经常会根据自己使用上的需要对现有的功能做一些完善。比如，我们需要对最后一个修改数据的人和日期做一个记录，我\r\n们需要隐藏一些字段的显示，调整一些字段的显示顺序，我们可能还需要增加一些用户来使用这个系统。因为大部分的代码框架已经通过 Gii \r\n实现了，我们只需要在此基础上做一些简单的添加和修改，就可以实现我们所需要的功能。现在，我们用记录最后修改人和修改日期为例，看看我们如何通过修改一\r\n些代码来完善想要的功能的。</p><p style=\"text-indent:2em;\">\r\n	比如，我们需要记录对 Pii 数据表最后做修改的用户和日期信息。我们首先要找到维护 Pii 表的那个 PHP 文件。在这个例子中，是文件 C:\\wamp\\www\\pii\\protected\\models\\Pii.php。我们在文件的最后增加下面的代码：</p><h5 style=\"text-indent:2em;\" id=\"listing6\"><span style=\"font-size:14px;\">清单 5. 记录修改日期和用户名</span></h5><p></p><pre class=\"prettyprint lang-php\">&nbsp;public&nbsp;function&nbsp;beforeSave()&nbsp;\r\n&nbsp;&nbsp;&nbsp;{&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;date_default_timezone_set(&quot;Asia/Shanghai&quot;);&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;UpdatedAt=date(&#39;Y-m-d&nbsp;H:i:s&#39;);&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;ModifiedBy=Yii::app()-&gt;user-&gt;name;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;parent::beforeSave();&nbsp;\r\n&nbsp;&nbsp;&nbsp;}</pre><p></p><p style=\"text-indent:2em;\">\r\n	这段代码在保存数据前为 UpdateAt 和 ModifiedBy \r\n字段设置了用户名和修改日期，然后调用了父类的 beforeSave 方法。保存之后，你会发现，在页面上修改 Pii 数据之后，Updated \r\nAt 和 Modified By 字段的值被自动填入了默认的内容。</p><h5 style=\"text-indent:2em;\" id=\"fig8\">\r\n	图 8. 自动填写 Updated At 和 Modified By 字段</h5><p style=\"text-indent:2em;\"><img alt=\"图 8. 自动填写 Updated At 和 Modified By 字段\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image008.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major5\">\r\n	结束语</h2><p style=\"text-indent:2em;\">\r\n	通\r\n过这篇文章，我们了解了 Yii 这个当今最为流行的 PHP 框架，并通过搭建一个测试数据维护系统的具体实例，学习了如何使用 Yii \r\n框架来创建一个 Web 应用。在这个实例中，我们还通过使用 Gii 代码生成器为应用自动创建代码框架，更好地体会到 Yii 在创建 Web \r\n应用上的快捷优势。我们期待这篇文章能起到一个“抛砖引玉”的作用，希望更多的人了解和使用这个框架，并开发出更多更好的应用。</p><p style=\"text-indent:2em;\"><br/></p>' ,`copy_from` = 'developworks' ,`copy_url` = 'http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,apache,yii,cms,文章,IT,服务器' ,`view_count` = '152' ,`commend` = 'Y' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407136800' ,`update_time` = '1408692660' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '30' ,`user_id` = '1' ,`title` = '阅读jQuery源代码带给我们的18个惊喜' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '2' ,`special_id` = '0' ,`introduce` = '相信大家都非常熟悉jQuery类库，绝对最受欢迎的JS框架，如果你也有兴趣阅读v源代码的话，或者你也会有同感。以下便是阅读jQuery源代码后挖掘的18条令人惊奇的信息：1. sizzle的大小Sizzle是用来帮助jQuery实现' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p>\r\n	相信大家都非常熟悉jQuery类库，绝对最受欢迎的JS框架，如果你也有兴趣阅读v源代码的话，或者你也会有同感。\r\n</p>\r\n<p>\r\n	以下便是阅读jQuery源代码后挖掘的18条令人惊奇的信息：\r\n</p>\r\n<h2>\r\n	1. sizzle的大小\r\n</h2>\r\n<p>\r\n	Sizzle是用来帮助jQuery实现DOM查询操作的引擎，可能你不知道它占用了jQuery源代码的22%。\r\n</p>\r\n<p>\r\n	其次最大的特性是$.ajax，占用了jQuery源代码中的8%。\r\n</p>\r\n<h2>\r\n	2. $.grep\r\n</h2>\r\n<p>\r\n	这个方法类似underscore中的_.filter方法，使用两个参数，一个数组变量和一个回调函数，返回通过回调函数为true的元素。\r\n</p>\r\n<h2>\r\n	3. 冒泡提醒\r\n</h2>\r\n<p>\r\n	jQuery特意的阻止了一个事件类型的气泡。这就是load事件，jQuery传递了一个特别的noBubble:true来阻止事件冒泡到window对象（这可能导致错误的匹配了window.load事件）\r\n</p>\r\n<h2>\r\n	4. 缺省的动画速度\r\n</h2>\r\n<p>\r\n	jQuery通过快速的变化元素样式属性来实现动画。每一个变化被叫做一个\"滴答\"。缺省的动画速度是每13毫秒滴答一次，你可以通过重写jQuery.fx.interval来修改缺省的值\r\n</p>\r\n<h2>\r\n	5. $.fn.addClass接受一个方法\r\n</h2>\r\n<p>\r\n	我们通常提供$.fn.addClass一个class定义名称。但是它同样可以支持方法。你只需要方法返回一个空格分隔的字符串class定义即可。这个方法甚至接受元素的索引为参数，这样我们可以构建自己的只能class名。\r\n</p>\r\n<h2>\r\n	6. $.fn.removeClass同样支持\r\n</h2>\r\n<p>\r\n	这个方法也可以支持接受方法为参数，和$.fn.addClass一样。\r\n</p>\r\n<h2>\r\n	7. :empty伪选择器\r\n</h2>\r\n<p>\r\n	这个伪选择器可以匹配所有没有子元素的元素\r\n</p>\r\n<h2>\r\n	8. :lt和:gt伪选择器\r\n</h2>\r\n<p>\r\n	这些伪选择器基于索引来匹配。例如，$(\'div:gt(2)\')将会返回所有的div除了前３个元素（基于０索引）。如果你提供一个负值，那么就从末尾算起。\r\n</p>\r\n<h2>\r\n	9. $(document.ready()使用了promise\r\n</h2>\r\n<p>\r\n	jQuery内部使用了jQuery的deferred来保证DOM完整被加载\r\n</p>\r\n<h2>\r\n	10. $.type\r\n</h2>\r\n<p>\r\n	大家可能都熟悉typeof来判断数据类型，但是你是否知道jQuery提供了.type()方法？这个方法比浏览器本地版本更智能。\r\n</p>\r\n<p>\r\n	例如，typeof(new Number(3))返回了“object”，然而$.type(new Number(3))放回数字。\r\n</p>\r\n<p>\r\n	更确切的说$.type告诉你返回对象的值类型\r\n</p>\r\n<h2>\r\n	11. $.fn.queue\r\n</h2>\r\n<p>\r\n	你可以使用$(\'div\').queue()来检查一个元素的特效队列。这对于你想了解多少个特效还保持在对象元素很有好处。\r\n</p>\r\n<p>\r\n	更有用的在于，你可以直接操作队列来添加自己的特效，如下：<br />\r\n<br />\r\n<img alt=\"\\\" src=\"http://www.php100.com/uploadfile/2014/0804/20140804100813484.jpg\" style=\"width:774px;height:397px;\" />\r\n</p>\r\n<div>\r\n	<div>\r\n		<div>\r\n			<div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<h2>\r\n	12. Click事件针对禁用元素将失效\r\n</h2>\r\n<p>\r\n	jQuery针对禁用的元素自动中断点击事件，这样可以有效优化保证让你不用书写更多代码来检测这种情况\r\n</p>\r\n<h2>\r\n	13. $.fn.on 接受多个对象\r\n</h2>\r\n<p>\r\n	你是否知道$.fn.on方法接受对象来添加多个事件？下面是例子：<br />\r\n<br />\r\n<img alt=\"\\\" src=\"http://www.php100.com/uploadfile/2014/0804/20140804100859826.jpg\" style=\"width:792px;height:277px;\" />\r\n</p>\r\n<div>\r\n	<div>\r\n		<div>\r\n			<div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<h2>\r\n	14. $.camelCase\r\n</h2>\r\n<p>\r\n	这个方法帮助你将破折号风格字符串转化为驼峰拼写方式，如下：\r\n</p>\r\n<p>\r\n	background-color 转化为 backgroundColor\r\n</p>\r\n<h2>\r\n	15. $.active\r\n</h2>\r\n<p>\r\n	调用$.active返回活动的XHR查询数量。这个可以用来强制限制同时处理多少个ajax请求\r\n</p>\r\n<h2>\r\n	16. $.fn.parentsUntil/$.fn.nextUntil/$.fn.prevUntil\r\n</h2>\r\n<p>\r\n	我过去非常熟悉.parents()，.next()和.prev()方法，但是不知道其它版本。\r\n</p>\r\n<p>\r\n	他们匹配所有父层/下一个元素/上一个元素直到遇到了停止条件元素\r\n</p>\r\n<h2>\r\n	17. $.fn.clone参数\r\n</h2>\r\n<p>\r\n	这个方法带的参数可以通过传递参数true来帮助你确认拷贝数据属性和事件\r\n</p>\r\n<h2>\r\n	18. 更多$.fn.clone参数\r\n</h2>\r\n<p>\r\n	除了上面参数，你也可以通过传递另外一个参数true来克隆子元素的数据属性和事件，这叫做深层次克隆。\r\n</p>\r\n<p>\r\n	第二参数缺省使用第一个参数值。如果你第一个参数为true，那么第二个参数也为true的话，就可以省略\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>' ,`copy_from` = 'php100' ,`copy_url` = 'http://www.php100.com' ,`redirect_url` = '' ,`tags` = 'php,js,jquery' ,`view_count` = '114' ,`commend` = 'Y' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407140334' ,`update_time` = '1407140334' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '31' ,`user_id` = '1' ,`title` = '安装eaccelerator加速PHP' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '17' ,`special_id` = '0' ,`introduce` = '一、安装eaccelerator-0.9.5\r\n\r\n 1、首先下载并安装ZendOptimizer-3.3.9\r\n       把ZendOptimizer.so COPY到一个目录，执行以下命令：\r\n      chcon -t texrel_shlib_t /usr/lib/ZendOptimizer.so \r\n      execstack -c /usr/lib/ZendOptimizer' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">一、安装eaccelerator-0.9.5</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 1、首先下载并安装ZendOptimizer-3.3.9</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 把ZendOptimizer.so COPY到一个目录，执行以下命令：</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;chcon -t texrel_shlib_t /usr/lib/ZendOptimizer.so&nbsp;</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;execstack -c /usr/lib/ZendOptimizer.so&nbsp;</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service httpd restart</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service mysqld restart</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp; 基本上可以OK。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 2、再安装eaccelerator-0.9.6加速软件</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> # wget </span><a href=\"http://bart.eaccelerator.net/source/0.9.6/eaccelerator-0.9.6.tar.bz2\"><span style=\"font-size:14px;\">http://bart.eaccelerator.net/source/0.9.6/eaccelerator-0.9.6.tar.bz2</span></a>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\"># tar jxvf eaccelerator-0.9.6.tar.bz2</span><br />\r\n<span style=\"font-size:14px;\"> # cd eaccelerator-0.9.6</span><br />\r\n<span style=\"font-size:14px;\"> #&nbsp; phpize </span><br />\r\n<span style=\"font-size:14px;\"> # ./configure --enable-eaccelerator=shared --with-php-config=/usr/bin/php-config</span><br />\r\n<span style=\"font-size:14px;\"> # make</span><br />\r\n<span style=\"font-size:14px;\"> # make install</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 这时会将eaccelerator安装到php目录中，屏幕会显示eaccelerator.so所在路径，例如：</span><br />\r\n<span style=\"font-size:14px;\"> Installing shared extensions:&nbsp; /usr/lib/php/modules　　记住这个路径。</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">安装完成后需要修改/etc/ld.so.conf</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">#vim /etc/lod.so.conf</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">再最后一行添加 include /usr/lib/php/modules/*.so 后保存退出</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator即可以安装为PHP扩展，也可以安装为zend扩展，以下安装为PHP扩展。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 在最后一行加入以下内容</span>\r\n</p>\r\n<div>\r\n	<div id=\"highlighter_177088\" class=\"syntaxhighlighter php\">\r\n<pre class=\"prettyprint lang-bsh\">[eaccelerator]\r\nextension=\"eaccelerator.so\"\r\neaccelerator.shm_size=\"16\"\r\neaccelerator.cache_dir=\"tmp/eaccelerator\"\r\neaccelerator.enable=\"1\"\r\neaccelerator.Optimizer=\"1\"\r\neaccelerator.check_mttime=\"1\"\r\neaccelerator.debug=\"0\"\r\neaccelerator.filter=\"\"\r\neaccelerator.shm_max=\"0\"\r\neaccelerator.shm_ttl=\"0\"\r\neaccelerator.shm_prune_period=\"0\"\r\neaccelerator.shm_only=\"0\"\r\neaccelerator.compress=\"1\"\r\neaccelerator.compress_level=\"9\"</pre>\r\n<br />\r\n	</div>\r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n<span style=\"font-size:14px;\"> 建立缓存目录：</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;　# mkdir -p /tmp/eaccelerator</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;　# chmod 777 /tmp/eaccelerator</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 重启Apache：</span><br />\r\n<span style=\"font-size:14px;\"> # service httpd restart</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 3、检查ZendOptimizer和eaccelerator是否安装成功</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 创建一个phpinfo.php文件，内容如下：</span><br />\r\n<span style=\"font-size:14px;\"> &lt;?php</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;phpinfo();</span><br />\r\n<span style=\"font-size:14px;\"> ?&gt;</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 将该文件放置到网站目录，在浏览器中访问，如果出现以下内容则安装成功：</span><br />\r\n<span style=\"font-size:14px;\"> This program makes use of the Zend Scripting Language Engine:</span><br />\r\n<span style=\"font-size:14px;\"> Zend Engine v2.2.0, Copyright (c) 1998-2007 Zend Technologies</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with eAccelerator v0.9.5, Copyright (c) 2004-2006 eAccelerator, by eAccelerator</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with Zend Extension Manager v1.0.11, Copyright (c) 2003-2006, by Zend Technologies</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with Zend Optimizer v3.2.2, Copyright (c) 1998-2006, by Zend Technologies </span><br />\r\n<br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 二、eaccelerator配置信息详解(根据官方英文说明翻译)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> extension=\"/data/webserver/php/lib/php/extensions/no-debug-zts-20060613/eaccelerator.so\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：PHP扩展eaccelerator.so的路径。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_size=\"32\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：eaccelerator可使用的共享内存大小(单位为MB)。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 在Linux下，单个进程的最大内存使用量受/proc/sys/kernel/shmmax中设置的数字限制(单位为字节)，例如CentOS 4.4的shmmax默认值为33554432字节(33554432bytes/1024/1024=32MB)。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 临时更改该值：</span><br />\r\n<span style=\"font-size:14px;\"> # echo 字节数 &gt; /proc/sys/kernel/shmmax</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 按照以上方法更改，在每次重启系统时，该值会被自动还原。如果想永久更改，可以修改/etc/sysctl.conf文件，设置：</span><br />\r\n<span style=\"font-size:14px;\"> kernel.shmmax = 字节数</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.cache_dir=\"/data/cache/eaccelerator\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：缓存路径，可以使用命令mkdir -p /data/cache/eaccelerator创建该目录，然后使用命令chmod 0777 /data/cache/eaccelerator设置该目录权限为0777</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.enable=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭eaccelerator。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.optimizer=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭代码优化，开启可以加快代码的执行速度。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.check_mtime=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当打开此项时，eaccelerator会在每次请求时检查php文件的修改时间，看其是否被修改过，这会耗费一点时间，如果php文件被修改\r\n过，eaccelerator会重新编译缓存该php文件。当关闭此项时，如果php文件被修改，则需要手工删除eaccelerator缓存，才能显示\r\n被修改的php文件。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.debug=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭调试记录。当打开时，eaccelerator会将对一个缓存文件的每次请求都写进log。打开此项只对调试eaccelerator是否有BUG时有益处。\"1\"指打开，\"0\"指关闭。默认值为\"0\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.filter=\"\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：决定哪些PHP文件应该被缓存。可以指定一个范围(比如\"*.php *.phtml\")，这样被指定的文件就会被缓存。如果该范围以!开头，被指定的文件就不会被缓存。默认值为\"\"，表示缓存所有的PHP文件。 </span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_max=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：一个用户使用例如eaccelerator_put之类的函数能够往共享内存中加载的最大数据。默认值为\"0\"，表示不限制。(单位为字节)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_ttl=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当没有足够的空闲共享内存去尝试缓冲一个新脚本时，将删除至少在shm_ttl秒之前没有被访问过的文件。默认值为\"0\"，表示不尝试从共享内存中删除任何旧的脚本。(单位为秒)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_prune_period=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当没有足够的空闲共享内存去尝试缓冲一个新脚本时，将删所有旧脚本，前提是这个尝试在超过shm_prune_period秒之前被执行过。默认值为\"0\"，表示不尝试从共享内存中删除任何旧的脚本。(单位为秒)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_only=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭在磁盘上缓存编译过的脚本。这个参数对会话数据和内容缓存没有效果。默认值为\"0\"，表示使用磁盘和共享内存来缓存。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.compress=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭缓存内容压缩。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.compress_level=\"9\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：内存压缩的级别。默认值为\"9\"，表示最大压缩。</span>\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,html,sql,apache' ,`view_count` = '121' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407223078' ,`update_time` = '1407223078' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '32' ,`user_id` = '1' ,`title` = 'Nginx的gzip配置参数说明' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '3' ,`special_id` = '0' ,`introduce` = 'gzip\r\n决定是否开启gzip模块\r\nparam:on|off\r\nexample:gzip on;\r\n	\r\n	\r\n		gzip_buffers \r\n设置gzip申请内存的大小,其作用是按块大小的倍数申请内存空间\r\nparam1:int\r\nparam2:int(k) 后面单位是k\r\nexample: gzip_buffers 4 8k;\r\n	\r\n	\r\n		gzip_comp_level\r\n设置gz' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div id=\"cnblogs_post_body\">\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">决定是否开启gzip模块</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:on|off</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip on;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_buffers&nbsp;</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置gzip申请内存的大小,其作用是按块大小的倍数申请内存空间</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param1:int</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param2:int(k) 后面单位是k</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example: gzip_buffers 4 8k;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_comp_level</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置gzip压缩等级，等级越底压缩速度越快文件压缩比越小，反之速度越慢文件压缩比越大</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:1-9</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_com_level 1;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_min_length</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">当返回内容大于此值时才会使用gzip进行压缩,以K为单位,当值为0时，所有页面都进行压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:int</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_min_length 1000;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_http_version</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">用于识别http协议的版本，早期的浏览器不支持gzip压缩，用户会看到乱码，所以为了支持前期版本加了此选项,目前此项基本可以忽略</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param: 1.0|1.1</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_http_version 1.0</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_proxied</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">Nginx做为反向代理的时候启用，</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:off|expired|no-cache|no-sotre|private|no_last_modified|no_etag|auth|any]</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">expample:gzip_proxied no-cache;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">off – 关闭所有的代理结果数据压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">expired – 启用压缩，如果header中包含”Expires”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no-cache – 启用压缩，如果header中包含”Cache-Control:no-cache”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no-store – 启用压缩，如果header中包含”Cache-Control:no-store”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">private – 启用压缩，如果header中包含”Cache-Control:private”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no_last_modified – 启用压缩，如果header中包含”Last_Modified”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no_etag – 启用压缩，如果header中包含“ETag”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">auth – 启用压缩，如果header中包含“Authorization”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">any – 无条件压缩所有结果数据</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_types</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置需要压缩的MIME类型,非设置值不进行压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:text/html|application/x-javascript|text/css|application/xml</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_types text/html;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">Demo</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip on;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_min_length 1000;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_buffers 4 8k;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_types text/html application/x-javascript text/css application/xml;</span>\r\n	</p>\r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'html,nginx' ,`view_count` = '112' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407313916' ,`update_time` = '1407313916' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '33' ,`user_id` = '1' ,`title` = 'Linux之编辑器Vim篇（配置与高级技巧） ' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '3' ,`special_id` = '0' ,`introduce` = '最常用的就是修改vim默认的注释颜色深蓝色 很受不了，修改 ~/.vimrc      hi Comment ctermfg=blue         一、Vim配置       如果没有安装vim就请使用:sudo apt-get install vim 一个完整的.vimrc配置信息如下所示： set nocompatible set nummber filetype on set histo' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\">最常用的就是修改vim默认的注释颜色深蓝色 很受不了，修改 ~/.vimrc</span></b> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\"> </span></b> \r\n</p>\r\n<pre class=\"prettyprint lang-html\"><b>hi Comment ctermfg=blue </b></pre>\r\n<b> <br />\r\n</b> \r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\">一、Vim配置</span></b> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\"> </span></b> \r\n</p>\r\n<pre class=\"prettyprint lang-html\"><b> 如果没有安装vim就请使用:sudo apt-get install vim\r\n    一个完整的.vimrc配置信息如下所示：\r\n    set nocompatible\r\n    set nummber\r\n    filetype on\r\n    set history=1000\r\n    set background=dark\r\n    syntax on\r\n    set autoindent\r\n    set mouse=a\r\n    set smartindent\r\n    set tabstop=4\r\n    set shiftwidth=400\r\n    set showmatch\r\n    set guioptions-=T\r\n    set vb t_vb=\r\n    set ruler\r\n    set nohls\r\n    set incsearch\r\n    if has(\"vms\")\r\n    set nobackup\r\n    else\r\n    set backup\r\n    endif\r\n    .vimrc文件的配置在终端下使用vim进行编辑时，默认情况下，编辑的界面上是没有显示行号、语法高亮度显示、智能缩进等功能的。为了更好的在vim下进行工作，需要手动设置一个配置文件：.vimrc。\r\n    在启动vim时，当前用户根目录下的.vimrc文件会被自动读取，该文件可以包含一些设置甚至脚本，所以，一般情况下把.vimrc文件创建在当前用户的根目录下比较方便，即创建的命令为：\r\n    $vi ~/.vimrc\r\n    设置完后\r\n    $:x 或者 $wq\r\n    进行保存退出即可。\r\n    下面给出一个例子，其中列出了经常用到的设置，详细的设置信息请参照参考资料：\r\n    “双引号开始的行为注释行，下同\r\n    “去掉讨厌的有关vi一致性模式，避免以前版本的一些bug和局限\r\n    set nocompatible\r\n    “显示行号\r\n    set nummber\r\n    “检测文件的类型\r\n    filetype on\r\n    “记录历史的行数\r\n    set history=1000\r\n    “背景使用黑色\r\n    set background=dark\r\n    “语法高亮度显示\r\n    syntax on\r\n    “下面两行在进行编写代码时，在格式对起上很有用；\r\n    “第一行，vim使用自动对起，也就是把当前行的对起格式应用到下一行；\r\n    “第二行，依据上面的对起格式，智能的选择对起方式，对于类似C语言编\r\n    “写上很有用\r\n    set autoindent\r\n    set smartindent\r\n    “第一行设置tab键为4个空格，第二行设置当行之间交错时使用4个空格\r\n    set tabstop=4\r\n    set shiftwidth=4\r\n    “设置匹配模式，类似当输入一个左括号时会匹配相应的那个右括号\r\n    set showmatch\r\n    “去除vim的GUI版本中的toolbar\r\n    set guioptions-=T\r\n    “当vim进行编辑时，如果命令错误，会发出一个响声，该设置去掉响声\r\n    set vb t_vb=\r\n    “在编辑过程中，在右下角显示光标位置的状态行\r\n    set ruler\r\n    “默认情况下，寻找匹配是高亮度显示的，该设置关闭高亮显示\r\n    set nohls\r\n    “查询时非常方便，如要查找book单词，当输入到/b时，会自动找到第一\r\n    “个b开头的单词，当输入到/bo时，会自动找到第一个bo开头的单词，依\r\n    “次类推，进行查找时，使用此设置会快速找到答案，当你找要匹配的单词\r\n    “时，别忘记回车\r\n    set incsearch\r\n    “修改一个文件后，自动进行备份，备份的文件名为原文件名加“~“后缀\r\n    if has(“vms”)\r\n    set nobackup\r\n    else\r\n    set backup\r\n    endif\r\n    ################################################################################\r\n    如果设置完后，发现功能没有起作用，检查一下系统下是否安装了vim-enhanced包，查询命令为：\r\n    $rpm –q vim-enhanced\r\n    请教］用vi把文件重新打开，如何回到上次光标的位置？\r\n    autocmd BufReadPost *\r\n    \\ if line(\"\'\\\"\") &gt; 0 &amp;&amp; line(\"\'\\\"\") &lt;= line(\"$\") |\r\n    \\ exe \"normal g`\\\"\" |\r\n    \\ endif\r\n    ###################################################################################\r\n    vim中如何查找和替换字符串\r\n    一、 字符串的查找\r\n    1. vim 中用 / 和 ? 来查找字符串，两者的区别是：\r\n    /string 会高亮显示光标后匹配的第一个字符串，回车后光标移到该字符串的第一个字母；\r\n    ?string 会高亮显示光标前匹配的第一个字符串，回车后光标移到该字符串的第一个字母。\r\n    在回车之后，按n键同方向转到下一个匹配的字符串，按N键反方向转到上一个匹配的字符串。\r\n    2. 用命令 :set ic 和 :set noic 来分别设置查找时不区分和区分大小写。\r\n    如果查找特殊字符，如 ^、$、*、/ 和 .，需要在前面加 \\ 来转义。\r\n    二、字符串的替换\r\n    1. vim 中可用 :s 命令来替换字符串，具体如下：\r\n    :s/str1/str2/ 替换当前行第一个 str1 为 str2\r\n    :s/str1/str2/g 替换当前行中所有 str1 为 str2\r\n    :m,ns/str1/str2/ 替换第 n 行开始到最后一行中每一行的第一个 str1 为 str2\r\n    :m,ns/str1/str2/g 替换第 n 行开始到最后一行中所有的 str1 为 str2\r\n    (注：m和n 为数字，若m为 .，表示为当前行开始；若n为$，则表示到最后一行结束)\r\n    如果使用 # 作为分隔符，则中间出现的 / 不会作为分隔符，比如：\r\n    :s#str1/#str2/# 替换当前行第一个 str1/ 为 str2/\r\n    :%s+/oradata/apras/+/user01/apras1+ (使用+ 来 替换 / )： /oradata/apras/替换成/user01/apras1/\r\n    2. 其他\r\n    :%s/str1/str2/（等同于 :g/str1/s//str2/） 替换每一行的第一个 str1 为 str2\r\n    :%s/str1/str2/g（等同于 :g/str1/s//str2/g 和 :1,$ s/str1/str2/g ） 替换文中所有 str1 为 str2\r\n    从替换命令可以看到，g 放在命令末尾，表示对搜索字符串的每次出现进行替换；不加 g，表示只对搜索\r\n    字符串的首次出现进行替换；g 放在命令开头，表示对正文中所有包含搜索字符串的行进行替换操作。\r\n    ###################################################################################\r\n    2.打开一个已存在的文件后，文件中的字符，不能用backspace键删除。但是此时如果输入新的字符，却可以用backspace进行删除。这是怎么回事？\r\n    查看帮助：\r\n    :help bs\r\n    :help backspace\r\n    原来，backspace有几种工作方式，默认是vi兼容的。对新手来说很不习惯。对老vi 不那么熟悉的人也都挺困扰的。可以用\r\n    :set backspace=indent,eol,start\r\n    来解决。\r\n    indent: 如果用了:set indent,:set ai 等自动缩进，想用退格键将字段缩进的删掉，必须设置这个选项。否则不响应。\r\n    eol:如果插入模式下在行开头，想通过退格键合并两行，需要设置eol。\r\n    start：要想删除此次插入前的输入，需设置这个。 </b></pre>\r\n<b> <br />\r\n</b> \r\n<p>\r\n	<br />\r\n</p>\r\n<div>\r\n	<br />\r\n	<div>\r\n		<br />\r\n	</div>\r\n<span><span style=\"font-size:14px;line-height:2;\">二、</span><b><span style=\"font-size:14px;line-height:2;\">Vim高级技巧</span></b></span> \r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<pre class=\"prettyprint lang-html\">    本文一般情况下用&lt;C-字母&gt;（里边的字母一般大小写无所谓,除非特别注明）表示按住ctrl同时按下相关字母，命令前加一个i 表示在插入模式下用这个命令\r\n    1. 选定文字/ 拷贝粘贴\r\n    v 为可视模式,可以选定多行。选定多行之后，可以用yy 或者dd 等等进行拷贝和剪切。\r\n    p 是粘贴\r\n    y 和d 可以直接拷贝或者剪切选定的内容\r\n    yw 是拷贝一个单词,如果要复制整行的最简单办法就是V,y,p 就行了\r\n    v 是可以选定一行任意个字符的,V 是行选定的,一次一整行，然后通过向下或向上移动光标而选定多行。\r\n    对于v 选定的,拷贝后就是这么多,选多少就拷贝多少,而V 选定的,粘贴的话会自动换到下一行\r\n    &lt;C-V&gt;命令模式下,也是块选定,不过是列块选定\r\n    2. 折叠代码\r\n    可以zf 进行折叠, 用zo 打开折叠,也可以方向键向右打开折叠,zc 关闭折叠(只要在被折叠的块中的任一个语句就行)\r\n    3. 缩进代码\r\n    &lt;是左缩进, &gt;是右缩进\r\n    按v 选定后按=就是自动格式化代码,自动缩进,内部的递归的缩进都做到了\r\n    行左移&lt;&lt;，行右移&gt;&gt;，该命令用于调整源码缩进格式简便快速。\r\n    4. 移动光标\r\n    %是从大括号的开始移动到大括号的结束位置\r\n    :后边加行号就是跳到这一行\r\n    &lt;C-O&gt; 光标返回到以前的位置。相当于光标移动的“撤销”\r\n    &lt;C-I&gt; 光标返回到后来的位置。相当于光标移动的“恢复”\r\n    5. 多文件编辑/ 缓冲区命令\r\n    vim 下每一个打开的文件对应一个缓冲区（buffer）。\r\n    多文件编辑会有两种情形，一种是在进入vim 前所用的参数就是多个文件（这种情形称为\r\n    argument list）。另一种情形是进入vim 后另外再开其它的文件（称为buffer list）。不过都\r\n    可以统称为buffer。\r\n    5.1 打开文件\r\n    vi flname1 flname2… flnameN\r\n    将多个文件调入缓冲，是argument list。\r\n    :e filename\r\n    这是在进入vim 后，在不离开vim 的情形下再开其它文件，只要您要编辑的档案是在目\r\n    前目录，Tab 补全键还是可以使用。是buffer list。\r\n    注意：:e 或者:new 或者:split 后边可以跟目录,这样就可以在目录下慢慢找要打开的文件了\r\n    5.2 缓冲区跳转\r\n    :n 编辑下一个文件。\r\n    :2n 编辑下二个文件。\r\n    :N 编辑前一个文件。注意，这种用法只能用于argument list 的情形。\r\n    :rew 回到首文件\r\n    :args 查看当前编辑缓冲文件状态\r\n    :e# 或Ctrl-^ 编辑前一个档案，用于两文件互相编辑时相当好用。这种用法不管是\r\n    argument list 或buffer list 档案间皆可使用。使用Ctrl－^ 命令更便捷，但如终端类型不正\r\n    确该功能将无效。\r\n    用:ls 来显示缓冲区中的文件，编号后边有#的代表是前一个文件，可以通过:e#来进入，有\r\n    %a 的代表是当前文件，什么也没有的可以通过:bn 来进入，这里的n 代表文件编号。\r\n    :b 文件名或编号移至该文件。\r\n    在:ls 中就会出示各文件的编号，这个编号在未离开vim 前是不会变的。这个指令elvis 也\r\n    是可以使用。当然:e#编号也是可以的，这样的用法则是所有vi clone 都通用了。\r\n    在buffers 中，减号- 表示这个buffer 并未载入，不过，不必担心，载入相当快速的。加\r\n    号+ 表示这个buffer 已经修改过了。\r\n    :bn buffer next。这里的n 代表字母n\r\n    :bl buffer last。\r\n    以上两个指令elvis 不适用。\r\n    如果您是使用vim 的GUI，那就在菜单上就会有Buffers 这个选项，可以很容易的知道及\r\n    移动各buffer 间。\r\n    5.3 移除缓冲区\r\n    :bd(elete) buffer 在未离开vim 前是不会移除的，可使用这个指令移除。其实移除它干什\r\n    么呢？vim 是您在叫用时才会载入的，因此这些buffers 并不是像cache 一般要占内存的。\r\n    5.4 重新编辑\r\n    放弃一修改过的文件，重新编辑。\r\n    (1)使用命令:q!强行退出后再vi flname 重新进入。\r\n    (2)使用命令:e!强行重编辑更便捷。这样也是会打开文件，但会放弃目前编辑文件的改变，\r\n    否则如果文件已有变动，vim 预设是不让您随便离开的。:e! 后不接什么的话，代表舍弃一\r\n    切修改，重新载入编辑中文件。\r\n    5.5 其他命令\r\n    :files 或:buffers 或:ls 会列出目前buffer 中的所有文件。\r\n    在elvis 中可使用:b 来叫出buffers。\r\n    :f 或Ctrl-g 显示目前编辑的文件名、是否经过修改及目前光标所在之位置。\r\n    :f 文件名改变编辑中的文件名。(file)\r\n    :r 文件名在光标所在处插入一个文件的内容。(read)\r\n    :35 r 文件名将文件插入至35 行之后。\r\n    gf 这是vim 的特殊打开文件的方法，会打开光标所在处的word 为名的文件，当然，这\r\n    个文件要在当前目录内，否则会创建新文件。\r\n    6. 查找命令\r\n    用/查找单词后,n 可以跳到下一个,N 则是上一个,:nohls 可以取消高亮\r\n    查找时,:set ignorecase”项让VIM 忽略大小写，“:set noignorecase” 来关闭这项功能。\r\n    7. 修改文字\r\n    cw:删除一个单词并进入插入模式,cc:删除一行并进入插入模式。\r\n    r:然后输入的字母将替换当前字母并保持命令模式,R 则是不停的替换(一个挨着一个)。\r\n    0 到行首,$到行尾。\r\n    8. 函数间跳转\r\n    ctrl+]和ctrl+T 分别是查找函数的定义和返回,好像需要ctag 的支持\r\n    &lt;C-W&gt;i 跳转到光标所指标识符的定义行,是打开一个新的小窗口显示,记住要加个i,最好\r\n    是找自己项目下的文件,否则找库函数的话还不如man.\r\n    大写K 看光标所指标识符的man 帮助页\r\n    9. 窗口命令\r\n    &lt;C-W&gt; = ctrl+w\r\n    :split 文件名同时在一个页面显示多个文件的内容,类似多窗口,用&lt;C-W&gt;&lt;C-W&gt;切换当前\r\n    窗口\r\n    &lt;C-W&gt;f 切分显示光标在处的文件名，VIM 会在path 中搜索该文件名，比如常用它打\r\n    开#include 语句中的文件\r\n    &lt;C-W&gt;_ 当同时打开几个文件时，按&lt;C-W&gt;_ 使当前窗口最大化\r\n    用Ctrl-W 命令指定光标移动：\r\n    Ctrl-W + 扩大窗口\r\n    Ctrl-W - 缩小窗口\r\n    Ctrl-W h 移动到窗口左边\r\n    Ctrl-W j 移动到窗口下边\r\n    Ctrl-W k 移动到窗口上边\r\n    Ctrl-W l 移动到窗口右边\r\n    等于是&lt;C-W&gt;按下后,松开键盘,再按下一个命令就可以了.\r\n    如果要关闭分割窗口可以用:close，剩下只有一个窗口的话就不能关了。\r\n    多窗口是split，像用e 打开多个文件是将文件放在缓冲区中。\r\n    10. 自动完成\r\n    i&lt;C-P&gt; 向上搜索，补全一个词\r\n    i&lt;C-N&gt; 向下搜索，补全一个词\r\n    i&lt;C-X&gt;&lt;C-L&gt; 补全一行。\r\n    比如你写过一行for (int i = 0; i &lt; 100; i++) ， 你想再写一模一样的一行， 只要输入\r\n    for&lt;C-X&gt;&lt;C-L&gt;即可。如果补全出来的不是你想要的那一行，你可以按&lt;C-P&gt; 或&lt;C-N&gt; 选\r\n    择上一个或下一个匹配行i&lt;C-X&gt;&lt;C-F&gt; 在文件系统中搜索，补全一个文件名\r\n    如果按&lt;C-P&gt; 或&lt;C-N&gt; 补全一个词，在当前文件中没有找到匹配，VIM 将搜索#include\r\n    语句中的文件，而文件的位置将在path 中搜索。\r\n    i&lt;C-Y&gt; 把上一行对应列的字符抄下来\r\n    i&lt;C-E&gt; 把下一行对应列的字符抄上来,这两个都可以一直按下去,到了行尾自己会停的.\r\n    11. 注释整块内容\r\n    注释块的方法:\r\n    &lt;C-V&gt; 选定要注释掉的行I // Esc\r\n    I 之后输入的东西就是插入到选定的行前边的,直至Esc.\r\n    要去掉注释的办法:&lt;C-V&gt;选定注释符//,然后d\r\n    列块选定后I 是在前边都插入,A 是在后边都插入\r\n    &lt;C-V&gt;是按列块模式的选定,&lt;shift-V&gt;是行选定,v 是普通选定\r\n    12. 其他命令\r\n    u 可以撤销上一步操作, ctrl+r 可以恢复\r\n    i&lt;C-O&gt;命令执行一个普通模式的命令，执行完毕后回到插入模式，不用多次Esc\r\n    i&lt;C-V&gt;后续字符输入特殊的ASCII 字符或键。\r\n    . 在光标当前位置处重复上一次操作\r\n    :!命令行执行一条外部命令\r\n    *******************************************************************************\r\n    ****\r\n    我是vim 粉丝, 用了许久, 有一些自己的感受, 又到处挖到一些别人的技巧. 感觉对vim\r\n    粉丝比较有用, 就把它记在这儿. 希望借此文套出大家自己的巧活, 就正应了抛砖引玉的古\r\n    话了.\r\n    先稍为介绍一下vim. vi 是unix/linux 下极为普遍的一种文本编辑器, 大部分机器上都有.\r\n    vi 有各种变种, 在不同的机器上常用不同的变种软件. 其中vim 比较好用也用得比较广泛.\r\n    vim 是Vi IMproved 的缩写, 表示更好的vi. 我个人觉得它是非常好的编辑器(为了避免\r\n    Emacs 粉丝挑眼, 就不说最好了). 没用过的也建议试试看, 当然vim 对编写文本文件很方\r\n    便好用, 比如编写程序, html 文档等等, 却不能用来编写word 文档.\r\n    关于vim 的安装, 基本使用方法等网络上能搜出许多, 就不在这里罗嗦了, 要是对vim 有\r\n    兴趣, 那就看看这里(中文文档): http://vcd.gro.clinux.org/\r\n    本文就说些其中比较有用, 比较常用的命令, 若能熟练运用这些命令, 那么会发现编辑文件\r\n    很舒服.\r\n    说明:\r\n    以下的例子中xxx 表示在命令模式下输入xxx 并回车\r\n    以下的例子中:xxx 表示在扩展模式下输入xxx 并回车\r\n    小括号中的命令表示相关命令.\r\n    在编辑模式或可视模式下输入的命令会另外注明.\r\n    1. 查找\r\n    /xxx(?xxx) 表示在整篇文档中搜索匹配xxx 的字符串, / 表示向下查找, ? 表示\r\n    向上查找.其中xxx 可以是正规表达式,关于正规式就不多说了.\r\n    一般来说是区分大小写的, 要想不区分大小写, 那得先输入\r\n    :set ignorecase\r\n    查找到以后, 再输入n 查找下一个匹配处, 输入N 反方向查找.\r\n    *(#) 当光标停留在某个单词上时, 输入这条命令表示查找与该单词匹配的\r\n    下(上)一个单词. 同样, 再输入n 查找下一个匹配处, 输入N 反方\r\n    向查找.\r\n    g*(g#) 此命令与上条命令相似, 只不过它不完全匹配光标所在处的单词, 而\r\n    是匹配包含该单词的所有字符串.\r\n    gd 本命令查找与光标所在单词相匹配的单词, 并将光标停留在文档的\r\n    非\r\n    注释段中第一次出现这个单词的地方.\r\n    % 本命令查找与光标所在处相匹配的反括号, 包括() [] {}\r\n    f(F)x 本命令表示在光标所在行进行查找, 查找光标右(左)方第一个x 字符.\r\n    找到后:\r\n    输入; 表示继续往下找\r\n    输入, 表示反方向查找\r\n    2. 快速移动光标\r\n    在vi 中, 移动光标和编辑是两件事, 正因为区分开来, 所以可以很方便的进行光标定\r\n    位和编辑. 因此能更快一点移动光标是很有用的.\r\n    w(e) 移动光标到下一个单词.\r\n    b 移动光标到上一个单词.\r\n    0 移动光标到本行最开头.\r\n    ^ 移动光标到本行最开头的字符处.\r\n    $ 移动光标到本行结尾处.\r\n    H 移动光标到屏幕的首行.\r\n    M 移动光标到屏幕的中间一行.\r\n    L 移动光标到屏幕的尾行.\r\n    gg 移动光标到文档首行.\r\n    G 移动光标到文档尾行.\r\n    c-f (即ctrl 键与f 键一同按下) 本命令即page down.\r\n    c-b (即ctrl 键与b 键一同按下, 后同) 本命令即page up.\r\n    \'\' 此命令相当有用, 它移动光标到上一个标记处, 比如用gd, * 等查\r\n    找到某个单词后, 再输入此命令则回到上次停留的位置.\r\n    \'. 此命令相当好使, 它移动光标到上一次的修改行.\r\n    `. 此命令相当强大, 它移动光标到上一次的修改点.\r\n    3. 拷贝, 删除与粘贴\r\n    在vi 中y 表示拷贝, d 表示删除, p 表示粘贴. 其中拷贝与删除是与光标移动命令\r\n    结合的, 看几个例子就能够明白了.\r\n    yw 表示拷贝从当前光标到光标所在单词结尾的内容.\r\n    dw 表示删除从当前光标到光标所在单词结尾的内容.\r\n    y0 表示拷贝从当前光标到光标所在行首的内容.\r\n    d0 表示删除从当前光标到光标所在行首的内容.\r\n    y$ 表示拷贝从当前光标到光标所在行尾的内容.\r\n    d$ 表示删除从当前光标到光标所在行尾的内容.\r\n    yfa 表示拷贝从当前光标到光标后面的第一个a 字符之间的内容.\r\n    dfa 表示删除从当前光标到光标后面的第一个a 字符之间的内容.\r\n    特殊地:\r\n    yy 表示拷贝光标所在行.\r\n    dd 表示删除光标所在行.\r\n    D 表示删除从当前光标到光标所在行尾的内容.\r\n    关于拷贝, 删除和粘贴的复杂用法与寄存器有关, 可以自行查询.\r\n    4. 数字与命令\r\n    在vi 中数字与命令结合往往表示重复进行此命令, 若在扩展模式的开头出现则表示行\r\n    号定位. 如:\r\n    5fx 表示查找光标后第5 个x 字符.\r\n    5w(e) 移动光标到下五个单词.\r\n    5yy 表示拷贝光标以下5 行.\r\n    5dd 表示删除光标以下5 行.\r\n    y2fa 表示拷贝从当前光标到光标后面的第二个a 字符之间的内容.\r\n    :12,24y 表示拷贝第12 行到第24 行之间的内容.\r\n    :12,y 表示拷贝第12 行到光标所在行之间的内容.\r\n    :,24y 表示拷贝光标所在行到第24 行之间的内容. 删除类似.\r\n    5. 快速输入字符\r\n    在vi 中, 不要求你输入每一个字符, 可以有很多种方法快速输入一些字符.\r\n    使用linux/unix 的同学一定有一个经验, 在命令行下输入命令时敲入头几个字符再按\r\n    TAB 系统就会自动将剩下的字符补齐, 假如有多个匹配则会打印出来. 这就是著名的命令\r\n    补齐(其实windows 中也有文件名补齐功能). vi 中有许多的字符串补齐命令, 非常方便.\r\n    c-p(c-n) 在编辑模式中, 输入几个字符后再输入此命令则vi 开始向上(下)搜\r\n    索开头与其匹配的单词并补齐, 不断输入此命令则循环查找. 此命令\r\n    会在所有在这个vim 程序中打开的文件中进行匹配.\r\n    c-x-l 在编辑模式中, 此命令快速补齐整行内容, 但是仅在本窗口中出现的\r\n    文档中进行匹配.\r\n    c-x-f 在编辑模式中, 这个命令表示补齐文件名. 如输入:\r\n    /usr/local/tom 后再输入此命令则它会自动匹配出:\r\n    /usr/local/tomcat/\r\n    abbr 即缩写. 这是一个宏操作, 可以在编辑模式中用一个缩写代替另一个\r\n    字符串. 比如编写java 文件的常常输入System.out.println, 这很\r\n    是麻烦, 所以应该用缩写来减少敲字. 可以这么做:\r\n    :abbr sprt System.out.println\r\n    以后在输入sprt 后再输入其他非字母符号, 它就会自动扩展为System.\r\n    out.println\r\n    6. 替换\r\n    替换是vi 的强项, 因为可以用正规表达式来匹配字符串.以下提供几个例子.\r\n    :s/aa/bb/g 将光标所在行出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :s/\\&lt;aa\\&gt;/bb/g 将光标所在行出现的所有aa 替换为bb, 仅替换aa 这个单词\r\n    :%s/aa/bb/g 将文档中出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :12,23s/aa/bb/g 将从12 行到23 行中出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :12,23s/^/#/ 将从12 行到23 行的行首加入# 字符\r\n    :%s= *$== 将所有行尾多余的空格删除\r\n    :g/^\\s*$/d 将所有不包含字符(空格也不包含)的空行删除.\r\n    7. 多文件编辑\r\n    在一个vim 程序中打开很多文件进行编辑是挺方便的.\r\n    :sp(:vsp) 文件名vim 将分割出一个横(纵)向窗口, 并在该窗口中打开新文件.\r\n    从vim6.0 开始, 文件名可以是一个目录的名称, 这样, vim 会\r\n    把该目录打开并显示文件列表, 在文件名上按回车则在本窗口打\r\n    开该文件, 若输入O 则在新窗口中打开该文件, 输入? 可以看\r\n    到帮助信息.\r\n    :e 文件名vim 将在原窗口中打开新的文件, 若旧文件编辑过, 会要求保存.\r\n    c-w-w vim 分割了好几个窗口怎么办? 输入此命令可以将光标循环定\r\n    位\r\n    到各个窗口之中.\r\n    :ls 此命令查看本vim 程序已经打开了多少个文件, 在屏幕的最下\r\n    方\r\n    会显示出如下数据:\r\n    1 %a \"usevim.html\" 行162\r\n    2 # \"xxxxxx.html\" 行0\r\n    其中:\r\n    1 表示打开的文件序号, 这个序号很有用处.\r\n    %a 表示文件代号, % 表示当前编辑的文件,\r\n    # 表示上次编辑的文件\r\n    \"usevim.html\" 表示文件名.\r\n    行162 表示光标位置.\r\n    :b 序号(代号) 此命令将指定序号(代号)的文件在本窗口打开, 其中的序号(代号)\r\n    就是用:ls 命令看到的.\r\n    :set diff 此命令用于比较两个文件, 可以用\r\n    :vsp filename\r\n    命令打开另一个文件, 然后在每个文件窗口中输入此命令,就能看\r\n    到效果了.\r\n    8. 宏替换\r\n    vi 不仅可以用abbr 来替换文字, 也可以进行命令的宏定义. 有些命令输起来很费劲,\r\n    因此我把它们定义到&lt;F1&gt;-&lt;F12&gt; 上, 这样就很方便了.这些配置可以预先写到~/.vimrc\r\n    (windows 下为$VIM/_vimrc) 中, 写进去的时候不用写前面的冒号.\r\n    :nmap &lt;F2&gt; :nohls&lt;cr&gt; 取消被搜索字串的高亮\r\n    :nmap &lt;F9&gt; &lt;C-W&gt;w 命令模式下转移光标到不同窗口\r\n    :imap &lt;F9&gt; &lt;ESC&gt;&lt;F9&gt; 输入模式下运行&lt;F9&gt;\r\n    :nmap &lt;F12&gt; :%s= *$==&lt;cr&gt; 删除所有行尾多余的空格.\r\n    :imap &lt;F12&gt; &lt;ESC&gt;&lt;F12&gt; 同上\r\n    :java 中: (注, 这里为什么说java 中, 因为以下定义对其他文件格式不起作用, 下文\r\n    会说到如何实现这一点)\r\n    :nmap &lt;F3&gt; :comp javac&lt;CR&gt;:mak -d . %&lt;CR&gt;\r\n    此命令用javac 编译java 文件, 它会自动将光标定位到出错点. 不过这需要定\r\n    义一个javac.vim 文件在$VIM/compiler 下, 在javac.vim 里面只有两行字:\r\n    setlocal makeprg=javac\r\n    setlocal errorformat=%A%f:%l:\\ %m,%-Z%p^,%-C%.%#\r\n    :nmap &lt;F4&gt; :comp ant&lt;CR&gt;:mak&lt;CR&gt;\r\n    此命令用ant 编译java 文件, 它会自动将光标定位到出错点. 一般来说, 安装\r\n    vim 后已经有了compiler/ant.vim 文件, 因此这个命令可以直接使用. 但是需要\r\n    在当前目录下有build.xml 文件, 当然还必须安装ant 才行.\r\n    :nmap &lt;F5&gt; :cl&lt;CR&gt; 此命令用于查看所有的编译错误.\r\n    :imap &lt;F5&gt; &lt;ESC&gt;&lt;F5&gt;\r\n    :nmap &lt;F6&gt; :cc&lt;CR&gt; 此命令用于查看当前的编译错误.\r\n    :imap &lt;F6&gt; &lt;ESC&gt;&lt;F6&gt;\r\n    :nmap &lt;F7&gt; :cn&lt;CR&gt; 此命令用于跳到下一个出错位置.\r\n    :imap &lt;F7&gt; &lt;ESC&gt;&lt;F7&gt;\r\n    :nmap &lt;F8&gt; :cp&lt;CR&gt; 此命令用于跳到上一个出错位置.\r\n    :imap &lt;F8&gt; &lt;ESC&gt;&lt;F8&gt;\r\n    :nmap &lt;F11&gt; :JavaBrowser&lt;cr&gt;\r\n    此命令用于在窗口左部分割出一个新窗口, 里面的内容是java 的资源树, 包括\r\n    本文件中出现的类, 类的成员变量及成员方法, 就好像JCreator 表现的那样.\r\n    在这个窗口中输入? 会看到帮助. 嘿嘿, 很好用, 不过需要ctags 支持.\r\n    :imap &lt;F11&gt; &lt;ESC&gt;&lt;F11&gt;\r\n    9. TAB\r\n    TAB 就是制表符, 单独拿出来做一节是因为这个东西确实很有用.\r\n    &lt;&lt; 输入此命令则光标所在行向左移动一个tab.\r\n    &gt;&gt; 输入此命令则光标所在行向右移动一个tab.\r\n    5&gt;&gt; 输入此命令则光标后5 行向右移动一个tab.\r\n    :12,24&gt; 此命令将12 行到14 行的数据都向右移动一个tab.\r\n    :12,24&gt;&gt; 此命令将12 行到14 行的数据都向右移动两个tab.\r\n    那么如何定义tab 的大小呢? 有人愿意使用8 个空格位, 有人用4 个, 有的用2 个.\r\n    有的人希望tab 完全用空格代替, 也有的人希望tab 就是tab. 没关系, vim 能\r\n    帮助你.以下的设置一般也都先写入配置文件中, 免得老敲.\r\n    :set shiftwidth=4 设置自动缩进4 个空格, 当然要设自动缩进先.\r\n    :set sts=4 即设置softtabstop 为4. 输入tab 后就跳了4 格.\r\n    :set tabstop=4 实际的tab 即为4 个空格, 而不是缺省的8 个.\r\n    :set expandtab 在输入tab 后, vim 用恰当的空格来填充这个tab.\r\n    10. autocmd\r\n    这个命令十分的强大, 可以用这个命令实现对不同的文件格式应用不同的配置; 可以\r\n    在新建文件时自动添加上版权声明等等. 这些命令一般定义在~/.vimrc 这样的配置文件\r\n    里面. 由于他很强大, 所以我不能给出很具体的说明, 只能举几个例子, 详细的请看帮助.\r\n    :autocmd! 删除所有之前的自动命令.\r\n    autocmd FileType java source ~/.vim/files/java.vim\r\n    autocmd FileType java source ~/.vim/files/jcommenter.vim\r\n    以上两条命令让我在打开java 文件时才应用后面提到的两个配置文件.\r\n    autocmd BufNewFile *.java 0r ~/.vim/files/skeletons/java.skel\r\n    以上这条命令让我在新建java 文件时自动加入java.skel 文件的内容.\r\n    autocmd BufNewFile *.java normal gnp\r\n    以上这条命令让我在新建java 文件时自动运行gnp 命令, 这个命令进行一些特殊化\r\n    处理, 比如将新java 文件中的__date__ 替换成今天的日期什么的.\r\n    11. 常用脚本\r\n    在vim.sf.net 你可以发现很多脚本(script), 这些脚本常常有让你意想不到的作用.\r\n    我常用的有:\r\n    jcommenter.vim 自动加入javadoc 风格的注释.\r\n    JBrowser.vim 类资源浏览. C, C++ 等可以用Tlist\r\n    还有许多有用的, 比如checkstyle.vim 可以检验你的编程风格, jad.vim 可以直接\r\n    反编译.class 文件等等.\r\n    12. 常用配置\r\n    在~/.vimrc 配置文件中你常常需要一些个性化配置. 比如上面写的一些宏定义, 一些\r\n    autocmd 定义等等. 比如:\r\n    set suffixes=.bak,~,.o,.h,.info,.swp,.aux,.bbl,.blg,.dvi,.lof,.log,.lot,.ps,.toc\r\n    这样在vim 中打开文件时, 按tab 键补齐文件名时它会忽略上述文件.\r\n    set nu 显示行号\r\n    set ai 设置自动缩进\r\n    map Y y$ 让Y 和D 一样, 要不然Y 的本意和yy 一样.\r\n    13. 其他\r\n    还有许多有意思的命令, 记录在这里免得忘记.\r\n    . 重复上次编辑命令.\r\n    :g/^/exec \"s/^/\".strpart(line(\".\").\" \", 0, 4) 在行首插入行号\r\n    :runtime! syntax/2html.vim 转换txt 成html, 会按照你的颜色配置来转 </pre>\r\n<p>\r\n	<br />\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'html' ,`view_count` = '108' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407317885' ,`update_time` = '1407318782' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '34' ,`user_id` = '1' ,`title` = 'mysql的数据类型int、bigint、smallint 和 tinyint取值范围' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '18' ,`special_id` = '0' ,`introduce` = '使用整数数据的精确数字数据类型。      bigint      从 -2^63 (-9223372036854775808) 到 2^63-1 (9223372036854775807) 的整型数据（所有数字）。存储大小为 8 个字节。      int      从 -2^31 (-2,147,483,648) 到 2^31 - 1 (2,147,483,647) 的整型数据（所有数字）。存' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		使用整数数据的精确数字数据类型。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>bigint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^63 (-9223372036854775808) 到 2^63-1 (9223372036854775807) 的整型数据（所有数字）。存储大小为<span>&nbsp;</span><span style=\"color:red;\">8</span><span>&nbsp;</span>个字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>int</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^31 (-2,147,483,648) 到 2^31 - 1 (2,147,483,647) 的整型数据（所有数字）。存储大小为<span>&nbsp;</span><span style=\"color:red;\">4</span><span>&nbsp;</span>个字节。int 的 SQL-92 同义字为 integer。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>smallint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^15 (-32,768) 到 2^15 - 1 (32,767) 的整型数据。存储大小为<span>&nbsp;</span><span style=\"color:red;\">2</span><span>&nbsp;</span>个字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>tinyint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 0 到 255 的整型数据。存储大小为<span>&nbsp;</span><span style=\"color:red;\">1</span><span>&nbsp;</span>字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		注释\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		在支持整数值的地方支持 bigint 数据类型。但是，bigint 用于某些特殊的情况，当整数值超过 int 数据类型支持的范围时，就可以采用 bigint。在 SQL Server 中，int 数据类型是主要的整数数据类型。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		在数据类型优先次序表中，bigint 位于 smallmoney 和 int 之间。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		只有当参数表达式是 bigint 数据类型时，函数才返回 bigint。SQL Server 不会自动将其它整数数据类型（tinyint、smallint 和 int）提升为 bigint。\r\n	</div>\r\n</div>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'mysql,web,sql' ,`view_count` = '134' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407480402' ,`update_time` = '1407480402' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '35' ,`user_id` = '1' ,`title` = 'Mysql基本用法' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '18' ,`special_id` = '0' ,`introduce` = '#登录数据库   mysql -hlocalhost -uroot -p;   #修改密码   mysqladmin -uroot -pold password new;           #显示数据库   show databases;   #显示数据表   show tables;   #选择数据库   use examples;   #创建数据库并设置编码utf-8 多语言   creat' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#登录数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mysql -hlocalhost -uroot -p;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改密码\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mysqladmin -uroot -pold<span>&nbsp;</span>password<span>&nbsp;</span>new;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show databases;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示数据表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show tables;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#选择数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		use examples;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建数据库并设置编码utf-8 多语言\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>database<span>&nbsp;</span>`examples`<span>&nbsp;</span>default<span>&nbsp;</span>character<span>&nbsp;</span>set<span>&nbsp;</span>utf8<span>&nbsp;</span>collate<span>&nbsp;</span>utf8_general_ci;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>database<span>&nbsp;</span>examples;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>table<span>&nbsp;</span>test(\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;id<span>&nbsp;</span>int(10) unsigned zerofill<span>&nbsp;</span>not<span>&nbsp;</span>null<span>&nbsp;</span>auto_increment,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;email<span>&nbsp;</span>varchar(40)<span>&nbsp;</span>not<span>&nbsp;</span>null,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;ip<span>&nbsp;</span>varchar(15)<span>&nbsp;</span>not<span>&nbsp;</span>null,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;state<span>&nbsp;</span>int(10)<span>&nbsp;</span>not<span>&nbsp;</span>null<span>&nbsp;</span>default<span>&nbsp;</span>\'-1\',\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;primary<span>&nbsp;</span>key<span>&nbsp;</span>(id)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		)engine=InnoDB;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示表结构\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		describe\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>table<span>&nbsp;</span>test；\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#重命名表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test_old rename test_new;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#添加列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>add<span>&nbsp;</span>cn<span>&nbsp;</span>int(4)<span>&nbsp;</span>not<span>&nbsp;</span>null;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test change id id1<span>&nbsp;</span>varchar(10)<span>&nbsp;</span>not<span>&nbsp;</span>null;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>drop<span>&nbsp;</span>cn;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>(cn,id);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>drop<span>&nbsp;</span>index<span>&nbsp;</span>cn\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#插入数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		insert<span>&nbsp;</span>into<span>&nbsp;</span>test (id,email,ip,state)<span>&nbsp;</span>values(2,\'qq@qq.com\',\'127.0.0.1\',\'0\');\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delete<span>&nbsp;</span>from<span>&nbsp;</span>test<span>&nbsp;</span>where<span>&nbsp;</span>id = 1;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		update<span>&nbsp;</span>test<span>&nbsp;</span>set<span>&nbsp;</span>id=\'1\',email=\'q@qq.com\'<span>&nbsp;</span>where<span>&nbsp;</span>id=1;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#查数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test;&nbsp; #取所有数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test limit 0,2;&nbsp; #取前两条数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test email<span>&nbsp;</span>like<span>&nbsp;</span>\'%qq%\'<span>&nbsp;</span>#查含有qq字符 _表示一个 %表示多个\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test<span>&nbsp;</span>order<span>&nbsp;</span>by<span>&nbsp;</span>id<span>&nbsp;</span>asc;#降序desc\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test id<span>&nbsp;</span>not<span>&nbsp;</span>in(\'2\',\'3\');#id不含2,3或者去掉not表示含有\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test timer<span>&nbsp;</span>between<span>&nbsp;</span>1<span>&nbsp;</span>and<span>&nbsp;</span>10;#数据在1,10之间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#---------------------------表连接知识------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#等值连接又叫内链接<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>只返回两个表中连接字段相等的行\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id; #写法1\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A,B<span>&nbsp;</span>where<span>&nbsp;</span>A.id = B.id; #写法2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>a.id,a.title<span>&nbsp;</span>from<span>&nbsp;</span>A a<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B b<span>&nbsp;</span>on<span>&nbsp;</span>a.id=b.id<span>&nbsp;</span>and<span>&nbsp;</span>a.id=1;#写法3 表的临时名称\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>a.id<span>&nbsp;</span>as<span>&nbsp;</span>ID,a.title<span>&nbsp;</span>as<span>&nbsp;</span>标题<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id=B.id;#添加as字句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#左连接又叫外连接<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>返回左表中所有记录和右表中连接字段相等的记录\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>(B,C,D)<span>&nbsp;</span>on<span>&nbsp;</span>(B.i1=A.i1<span>&nbsp;</span>and<span>&nbsp;</span>C.i2=A.i2<span>&nbsp;</span>and<span>&nbsp;</span>D.i3 = A.i3);#复杂连接\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#右连接又叫外连接<span>&nbsp;</span>right<span>&nbsp;</span>join<span>&nbsp;</span>返回右表中所有记录和左表中连接字段相等的记录\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>right<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#完整外部链接<span>&nbsp;</span>full<span>&nbsp;</span>join<span>&nbsp;</span>返回左右表中所有数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>full<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#交叉连接 没有where字句 返回卡迪尔积\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>cross<span>&nbsp;</span>join<span>&nbsp;</span>B;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		-------------------------表连接结束------------------------------------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		-----------------索引创建------------------------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show<span>&nbsp;</span>index<span>&nbsp;</span>from<span>&nbsp;</span>A #查看索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>primary<span>&nbsp;</span>key(id) #主键索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>unique(name) #唯一索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>name(name) #普通索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>fulltext(name) #全文索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>name(id,name) #多列索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#常用函数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		abs(-1)#绝对值\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		pi()#pi值\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sqrt(2)#平方根\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mod(-5,3)#取余-2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ceil(10.6)#进位+1 结果11 ceil(10.0)结果10\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		floor(10.6)#取整 10\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		round(2.5)#四舍五入到整数 结果3\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		round(2.5,2)#保留两位小数 结果2.50\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		truncate(2.5234,3)#取小数后3位不四舍五入 2.523\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sign(-2);#符号函数 返回-1 0还是0 正数返回1\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		pow(2,3),exp(2);#2的3次幂 或e的2次幂\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		log(2),log10(2);#求对数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		radians(180),degrees(0.618);#角度弧度转换\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sin(0.5),asin(0.5)#正弦和反正弦 类似cos acos tan atan\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		length(\'hi\')#计算字符长度\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		concat(\'1\',1,\'hi\')#合并字符串\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		insert(\'12345\',1,0,\'7890\');#从开头第1个字符开始到0个结束，替换成后边字符串，0表示在最前边插入\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ucase(\'a\'),lcase(\'A\')#转成大写和小写\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		left(\'abcd\',2),right(\'abcd\',2);#返回前两个字符和后两个字符\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ltrim(\'&nbsp; 0&nbsp; \'),rtrim(\' 0 \'),trim(\'&nbsp; 0&nbsp; \')#删除空格\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		replace(\'1234567890\',\'345678\',\'0\');#替换输出12090\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		substring(\'12345\',1,2)#取字符 输出12 1是位置 2是长度\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		instr(\'1234\',\'234\');#取得234位置是2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		reverse(\'1234\');#反序输出4321\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		current()#返回日期\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		curtime()#返回时间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		now()#返回日期时间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		month(now())#当前月份 monthname 英文月份\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		dayname(now())#星期英文 dayofweek()1是星期天 weekday()1是星期二\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		week(now())#本年第多少周\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		dayofyear(now()),dayofmonth(now())#今天是本年第多少天 今天是本月第多少天\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		year(now()),month(now()),day(now()),hour(now()),minute(now()),second(now())#返回年月日 时分秒\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		time_to_sec(now()),sec_to_time(3600*8);#转换时间为秒和还原\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		version()#mysql版本\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		database()#当前连接的数据库 没有为null\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		user()#获取用户名\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		md5(\'a\')#加密字符串\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ascii(\'a\')#ascii值97\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		bin(100),hex(100),oct(100)#返回二进制 十六进制 八进制\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		conv(10001,2,8);#各种进制相互转换\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		rand()#生成0到1之间随机数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sleep(0.02)#暂停秒数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		数据库优化\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.开启缓存，尽量使用php函数而不是mysql\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		. explain<span>&nbsp;</span>select<span>&nbsp;</span>语句可以知道性能\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.一行数据使用 limit 1；\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.为搜索字段重建索引 比如关键字 标签\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.表连接join保证字段类型相同并且有其索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.随机查询使用php $r = mysql_query(\"SELECT count(*) FROM user\");\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$d = mysql_fetch_row($r);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$rand = mt_rand(0,$d[0] - 1);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r = mysql_query(\"SELECT username FROM user LIMIT $rand, 1\");\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.避免使用select<span>&nbsp;</span>* 应该使用具体字段\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.每张表都是用id主键，并且是unsigned<span>&nbsp;</span>int\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.对于取值有限而固定使用enum类型，如性别 国家 名族 部门 状态\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.尽可能使用not<span>&nbsp;</span>null<span>&nbsp;</span>ip存储使用int(4),使用ip 转化函数ip2long()相互long2ip()\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.delete和insert语句会锁表，所以可以采用分拆语句操作\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;while(1){操作语句;usleep(2000);}\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.选择正确的存储引擎；MyISAM适合大量查询 写操作多用InnoDB支持事务\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#存储程序\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delimiter #定义存储程序\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>procedure<span>&nbsp;</span>getversion(out<span>&nbsp;</span>params<span>&nbsp;</span>varchar(20)) #params是传出参数<span>&nbsp;</span>in传进<span>&nbsp;</span>out传出 inout传回\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		begin\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>version()<span>&nbsp;</span>into<span>&nbsp;</span>params; #版本信息赋值params\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		call getversion(@a); #调用存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>@a;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delimiter #定义存储函数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>function<span>&nbsp;</span>display(w<span>&nbsp;</span>varchar(20))<span>&nbsp;</span>returns<span>&nbsp;</span>varchar(20)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		begin\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		return<span>&nbsp;</span>concat(\'hello\',w);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>display(\'world\');\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>procedure<span>&nbsp;</span>if exists spName; #删除一个存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>function<span>&nbsp;</span>spName [];#修改一个存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show<span>&nbsp;</span>create<span>&nbsp;</span>procedure<span>&nbsp;</span>spName;#显示存储过程信息\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		declare<span>&nbsp;</span>varName type<span>&nbsp;</span>default<span>&nbsp;</span>value;#声明局部变量\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#if语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		if 条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		elseif 条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		else<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>if\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#case语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		case<span>&nbsp;</span>条件\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		when<span>&nbsp;</span>条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		when<span>&nbsp;</span>条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		else<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>case\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#loop语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		fn:loop\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>loop fn;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		leave fn #退出循环\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#while语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		fn：while 条件 do\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>while fn\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#mysql使用帮助资料\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? contents; #列出帮助类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? data types;#列出数据类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		？<span>&nbsp;</span>int;#列出具体类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? show;#show语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		?<span>&nbsp;</span>create<span>&nbsp;</span>table;#\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#常见表的比较\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;Myisam&nbsp;&nbsp; BDB&nbsp;&nbsp;&nbsp; Memory&nbsp;&nbsp;&nbsp; InnoDB&nbsp;&nbsp;&nbsp; Archive\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		存储限制&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 64T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		事物安全&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		锁机制&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 表锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 页锁&nbsp;&nbsp;&nbsp; 表锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 行锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 行锁\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		全文索引&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		外键支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		myisam&nbsp; frm存储表定义 MYD存储数据 MYI存储索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		InnoDB 用于事务处理\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		char<span>&nbsp;</span>和<span>&nbsp;</span>varchar保存和索引都不相同\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		浮点数float(10,2) 定点数decimal(10,2)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		长度一定下，浮点数表示更大数据范围，缺点是引起精度丢失，货币等使用定点数存储\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		索引适合于where字句或者连接字句列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		对于唯一值使用唯一索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		添加新用户<span>&nbsp;</span>grant<span>&nbsp;</span>select,insert,update,delete<span>&nbsp;</span>on<span>&nbsp;</span>*.*<span>&nbsp;</span>to<span>&nbsp;</span>Yoby@localhost identified<span>&nbsp;</span>by<span>&nbsp;</span>\'mysql\';\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *.* 数据库名.表名，限制登录某一个数据库 test.*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost是本地主机 网络可以使用<span>&nbsp;</span>\'%\'代替所有主机&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>\'mysql\'是密码 Yoby是用户名&nbsp; 所有权限可以用<span>&nbsp;</span>all代替\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		查看用户权限 show grants<span>&nbsp;</span>for<span>&nbsp;</span>\'root\'@\'localhost\';\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		移除权限&nbsp;<span>&nbsp;</span>revoke<span>&nbsp;</span>all<span>&nbsp;</span>on<span>&nbsp;</span>*.*<span>&nbsp;</span>from<span>&nbsp;</span>root@localhost;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		group<span>&nbsp;</span>by<span>&nbsp;</span>id 分组\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		having<span>&nbsp;</span>限制字句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select1<span>&nbsp;</span>union<span>&nbsp;</span>select2 联合查询有重复去掉保留一行\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select2<span>&nbsp;</span>union<span>&nbsp;</span>all<span>&nbsp;</span>select2 所有行合并到结果集中去\r\n	</div>\r\n</div>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,myisam,innodb,explain,大数据,存储过程,事物' ,`view_count` = '107' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407480442' ,`update_time` = '1441718630' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '78' ,`user_id` = '1' ,`title` = 'asdf' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '1' ,`special_id` = '2' ,`introduce` = '' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '' ,`view_count` = '4' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1441700307' ,`update_time` = '1442299169' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_post`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_post` (
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COMMENT='内容管理';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '29' ,`user_id` = '1' ,`title` = 'Yii 框架创建自己的 web 应用' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '20' ,`special_id` = '0' ,`introduce` = 'Yii 是当今国内外最为流行的 PHP 框架。由于它高性能的特性，被公认为是“最有效率的 PHP 框架”。Yii 提供了今日 Web 2.0 应用开发所需要的几乎一切功能。它可以通过一个简单的命令 yiic 来快速创建一个 Web 应用程序的代码框架，开发人员通过在生成的代码框架上编写自己的业务逻辑，来实现 Web 应用的快速开发。本文将通过具体的实例对 Yii 框架进行阐述，使读者在真实的案例中' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<h2 style=\"text-indent:2em;\" id=\"major1\">\r\n	Yii 框架概述</h2><h3 style=\"text-indent:2em;\" id=\"minor1.1\">\r\n	Yii 是什么？</h3><p style=\"text-indent:2em;\">\r\n	Yii 是一个高性能的、基于组件的 PHP 框架，用于 Web 应用程序的快速开发。</p><p style=\"text-indent:2em;\">\r\n	Yii 的名字来源于“Yes It Is”的字母缩写。这句话肯定地回答了众多关于这个框架的疑问：“它是否快速？是否安全？是否强大？是否适合我们的项目？”</p><h3 style=\"text-indent:2em;\" id=\"minor1.2\">\r\n	Yii 适合做什么？</h3><p style=\"text-indent:2em;\">\r\n	Yii 是一个通用的轻量级 Web 编程框架，可以用于开发几乎所有的 Web 应用。具备它成熟的缓存机制，特别适用于开发高流量的应用，例如门户网站，论坛，内容管理系统（CMS），电子商务系统等等。</p><h3 style=\"text-indent:2em;\" id=\"minor1.3\">\r\n	Yii 和其他软件相比有哪些优势？</h3><p style=\"text-indent:2em;\">\r\n	和大多数 PHP 框架类似，Yii 是一个 MVC 框架，通过分离业务逻辑和用户界面，使开发者可以很容易地进行修改而不影响其它部分。</p><p style=\"text-indent:2em;\">\r\n	Yii 在设计时借鉴和集成了很多其他著名 Web 编程框架和应用，最大程度地考虑了 Web 应用开发的各种需要。所以 Yii 无论是在优异的性能上，还是丰富的功能和清晰的文档上，都使得它从众多 PHP 框架中脱颖而出。</p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major2\">\r\n	Yii 的安装及配置</h2><h3 style=\"text-indent:2em;\" id=\"minor2.1\">\r\n	安装前的准备</h3><p style=\"text-indent:2em;\">\r\n	在\r\n安装和使用 Yii 之前，你需要有一个安装好 PHP 和 Web \r\n服务器的环境。目前，有很多集成环境软件可以轻松的实现这部分的安装。比如我们在这里使用的 WampServer。你可以从 WampServer \r\n的官方网站上下载和安装。WampServer 的安装非常简单，双击执行就可以了。安装过程中，它会自动为你安装 Apache， MySQL 和 \r\nPHP，不需要任何额外的配置，一切都完成得既轻松又简单。</p><h3 style=\"text-indent:2em;\" id=\"minor2.2\">\r\n	Yii 的安装</h3><p style=\"text-indent:2em;\">\r\n	Yii 的安装更是简单得让你难以想象，只需要执行下面两个步骤，就可以开始使用了。</p><p style=\"text-indent:2em;\">\r\n	一：从 Yii 的官方网站下载 Yii 框架</p><p style=\"text-indent:2em;\">\r\n	二：把下载的文件解压缩到一个 Web 可以访问的文件夹里</p><p style=\"text-indent:2em;\">\r\n	如果想验证 Yii 是否安装成功，只需要在浏览器中输入下面的 URL 就可以了。</p><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">http://hostname/path/to/yii/requirements/index.php</pre><br/></pre><p style=\"text-indent:2em;\">\r\n	下面是我们从浏览器里看到的页面显示。</p><h5 style=\"text-indent:2em;\" id=\"fig1\">\r\n	图 1. Yii 安装成功的页面显示</h5><p style=\"text-indent:2em;\"><img alt=\"图 1. Yii 安装成功的页面显示\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image001.jpg\" width=\"581\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major3\">\r\n	如何使用 Yii 创建 Web 应用</h2><h3 style=\"text-indent:2em;\" id=\"minor3.1\">\r\n	使用命令行工具 yiic 创建 web 应用</h3><p style=\"text-indent:2em;\">\r\n	Yiic 是一个命令行工具，通过它，你可以通过简单的使用一条命令，来创建一个完整的应用。</p><p style=\"text-indent:2em;\">\r\n	YiiRoot/framework/yiic webapp WebRoot/testdrive</p><p style=\"text-indent:2em;\">\r\n	比如：C:\\wamp\\www\\yii\\framework&gt;yiic.bat webapp c:\\wamp\\www\\abc</p><p style=\"text-indent:2em;\">\r\n	这条命令在 www 目录下面自动为你创建了一个名为 abc 的 Yii 的代码框架。你可以通过下面这个 URL 在本地访问这个刚刚创建的应用。</p><p style=\"text-indent:2em;\">\r\n	http://localhost/abc/index.php</p><p style=\"text-indent:2em;\">\r\n	下图就是我们刚刚创建的 Web 应用</p><h5 style=\"text-indent:2em;\" id=\"fig2\">\r\n	图 2. 使用 yiic 创建的 Web 应用</h5><p style=\"text-indent:2em;\"><img alt=\"图 2. 使用 yiic 创建的 Web 应用\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image002.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major4\">\r\n	实例讲解基于 Yii 的测试数据维护系统的实现</h2><p style=\"text-indent:2em;\">\r\n	我们通过一个简单的测试数据维护系统来向大家演示如何使用 Yii framework 快速开发一个 Web 应用，来满足我们工作上的需要。</p><p style=\"text-indent:2em;\">\r\n	下面我来简要介绍一下这个 web 应用的基本需求：</p><p style=\"text-indent:2em;\">\r\n	这个 Web 应用主要实现对测试数据的维护和存储，包括增删改查等基本的功能。测试数据由两个二维表组成，两个表之间是“头 - 明细”的关系。所有数据存放在关系型数据库中，方便统计查询和日后的扩展。</p><h3 style=\"text-indent:2em;\" id=\"minor4.1\">\r\n	应用程序的设计和准备</h3><p style=\"text-indent:2em;\"><strong>功能需求</strong> </p><p style=\"text-indent:2em;\">\r\n	最基本的功能就是“增删改查”。这里就是分别对测试数据的主表和明细表两个表的进行增删改查的操作。</p><p style=\"text-indent:2em;\">\r\n	要求使用者用各自的用户登录使用，并记录最近修改人和日期。</p><p style=\"text-indent:2em;\"><strong>数据库的选择和设计</strong> </p><p style=\"text-indent:2em;\">\r\n	选用 SQLite 进行数据的存储。</p><p style=\"text-indent:2em;\">\r\n	SQLite 是一种小型的嵌入式数据库，它小巧灵活，资源占用少，处理速度快，非常适合中小型应用的数据存储。由于其各方面的出色表现，得到越来越多的开发人员的青睐。</p><p style=\"text-indent:2em;\"><strong>创建表：</strong> </p><p style=\"text-indent:2em;\">\r\n	根据应用程序的需要，我们将测试数据分别存放在两张表中。一个是主表，存放文件信息（file）；另一个是明细表，存在文件中的内容信息（pii）。两个表之间是“头 - 明细”的关系。</p><h5 style=\"text-indent:2em;\" id=\"listing1\"><span style=\"font-size:14px;\">清单 1. 创建表 pii 和 file 的 SQL 语句</span></h5><pre class=\"displaycode\">&nbsp;CREATE&nbsp;TABLE&nbsp;file&nbsp;(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;INTEGER&nbsp;NOT&nbsp;NULL&nbsp;PRIMARY&nbsp;KEY&nbsp;AUTOINCREMENT,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Package&nbsp;VARCHAR(50)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiFile&nbsp;VARCHAR(255)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;FileInServer&nbsp;VARCHAR(255),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Comment&nbsp;VARCHAR(255)&nbsp;\r\n&nbsp;)&nbsp;\r\n&nbsp;CREATE&nbsp;TABLE&nbsp;&quot;pii&quot;&nbsp;(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;INTEGER&nbsp;NOT&nbsp;NULL&nbsp;PRIMARY&nbsp;KEY&nbsp;AUTOINCREMENT,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiFileId&nbsp;INTEGER&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;PiiStr&nbsp;VARCHAR(1000)&nbsp;NOT&nbsp;NULL,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;CaseNo&nbsp;VARCHAR(18)&nbsp;default&nbsp;&#39;-&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Category&nbsp;VARCHAR(50),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Shipment&nbsp;INTEGER,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;UpdatedAt&nbsp;DATETIME,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;ModifiedBy&nbsp;VARCHAR(30),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;Comment&nbsp;VARCHAR(255)&nbsp;\r\n&nbsp;)</pre><p style=\"text-indent:2em;\"><strong>数据初始化：</strong> </p><p style=\"text-indent:2em;\">\r\n	使用 SQLite Manager 导入数据。SQLite Manager 是一个 Firefox 的插件，可以方便的管理和维护 SQLite 数据库。</p><p style=\"text-indent:2em;\">\r\n	将\r\n准备好的测试数据整理成 csv, txt 等格式，通过 SQLite Manager \r\n进行导入。数据即可快速准备就绪。所有的数据都存放在嵌入式数据库 SQLite 中。在应用程序框架建立后，我们将准备好的数据库文件复制到目录 \r\nC:\\wamp\\www\\pii\\protected\\data 下。</p><h3 style=\"text-indent:2em;\" id=\"minor4.2\">\r\n	创建应用程序框架</h3><p style=\"text-indent:2em;\">\r\n	在上面我们提到“使用命令行工具 yiic 创建 web 应用”，这里，我们就演示一下如何通过命令行的方式来创建一个应用程序。</p><pre class=\"displaycode\">&nbsp;C:\\wamp\\www\\yii\\framework&gt;yiic.bat&nbsp;webapp&nbsp;c:\\wamp\\www\\pii</pre><p style=\"text-indent:2em;\">\r\n	这条命令在 www 目录下面自动为你创建了一个名为 pii 的 Yii 的代码框架。你可以通过下面这个 URL 在本地访问这个刚刚创建的应用。</p><p style=\"text-indent:2em;\">\r\n	http://localhost/pii/index.php</p><p style=\"text-indent:2em;\">\r\n	这时，我们看到 web 页面上有 4 个缺省的 tab：“Home”，“About”，“Contact”和“Login”。下面我们将在页面上加入一些基本功能的实现。</p><h3 style=\"text-indent:2em;\" id=\"minor4.3\">\r\n	加入基本功能</h3><p style=\"text-indent:2em;\"><strong>实现表的 CRUD 功能</strong> </p><p style=\"text-indent:2em;\">\r\n	首先，我们需要实现对文件信息的增删改查，即对表 file 中的数据进行操作和维护。</p><p style=\"text-indent:2em;\"><strong>1. 连接数据库：</strong> </p><p style=\"text-indent:2em;\">\r\n	将准备好的数据库文件 pii.sqlite 放置在 C:\\wamp\\www\\pii\\protected\\data 目录下。</p><p style=\"text-indent:2em;\">\r\n	在文件 C:\\wamp\\www\\pii\\protected\\config\\main.php 中，定义使用的数据库文件。</p><h5 style=\"text-indent:2em;\" id=\"listing2\"><span style=\"font-size:14px;\">清单 2. 定义数据库文件</span></h5><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">&#39;db&#39;=&gt;array(&nbsp;\r\n&nbsp;&#39;connectionString&#39;&nbsp;=&gt;&nbsp;&#39;sqlite:&#39;.dirname(__FILE__).&#39;/../data/pii.sqlite&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),</pre><br/></pre><p style=\"text-indent:2em;\"><strong>2. 配置 Gii 代码生成器</strong> </p><p style=\"text-indent:2em;\">\r\n	Gii 是一个强大 web 应用代码生成器，可以取代或者简化开发者的工作量，自动生成代码实现标准的功能模块。在使用前，我们需要对文件 C:\\wamp\\www\\pii\\protected\\config\\main.php 做些定义。</p><h5 style=\"text-indent:2em;\" id=\"listing3\"><span style=\"font-size:14px;\">清单 3. 配置 Gii 代码生成器</span></h5><pre class=\"displaycode\"><pre class=\"prettyprint lang-php\">&#39;import&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;application.models.*&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;application.components.*&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&#39;modules&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;gii&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;class&#39;=&gt;&#39;system.gii.GiiModule&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;password&#39;=&gt;&#39;password&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),</pre><br/></pre><p style=\"text-indent:2em;\">\r\n	定义之后，我们可以通过 URL http://hostname/pii/index.php?r=gii 来访问 Gii。</p><h5 style=\"text-indent:2em;\" id=\"fig3\"><span style=\"font-size:14px;\">图 3. Gii 代码生成器</span></h5><p style=\"text-indent:2em;\"><img alt=\"图 3. Gii 代码生成器\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image003.jpg\" width=\"503\"/> </p><h3 style=\"text-indent:2em;\" id=\"listing4\">\r\n	3. 使用 Gii 为数据表建模</h3><p style=\"text-indent:2em;\">\r\n	在 Gii 中，我们将使用 Model Generator 为数据库中的表建模。我们选择 Model Generator 之后，可以看到下面的页面。</p><h5 style=\"text-indent:2em;\" id=\"fig4\">\r\n	图 4. 使用 Model Generator 生成模块代码</h5><p style=\"text-indent:2em;\"><img alt=\"图 4. 使用 Model Generator 生成模块代码\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image004.jpg\" width=\"517\"/> </p><p style=\"text-indent:2em;\">\r\n	预览并生成代码，这个生成器会在 protected/models 生成模块文件 File.php。</p><p style=\"text-indent:2em;\"><strong>4. 为表创建 CRUD 代码</strong> </p><p style=\"text-indent:2em;\">\r\n	有了模块文件，我们需要使用 Gii 中的 Crud Generator 为这个模块生成 CRUD 代码。</p><h5 style=\"text-indent:2em;\" id=\"fig5\">\r\n	图 5. 使用 CRUD 生成器生成代码</h5><p style=\"text-indent:2em;\"><img alt=\"图 5. 使用 CRUD 生成器生成代码\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image005.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\">\r\n	这时，通过 http://localhost/pii/index.php?r=file，你就可以看到 File 的维护界面了。</p><h5 style=\"text-indent:2em;\" id=\"fig6\">\r\n	图 6. 生成的 Files 维护界面</h5><p style=\"text-indent:2em;\"><img alt=\"图 6. 生成的 Files 维护界面\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image006.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\">\r\n	使用同样的方法，我们也可以为明细表 pii 创建了相应的 php 文件和维护页面。</p><p style=\"text-indent:2em;\"><strong>5. 将创建的功能加入到 Web 应用中</strong> </p><p style=\"text-indent:2em;\">\r\n	下面，我们要介绍如何把刚刚创建的功能加入到 Web 应用中。首先，我们需要对文件 C:\\wamp\\www\\pii_OK\\protected\\views\\layouts\\main.php 进行一点修改。</p><p style=\"text-indent:2em;\">\r\n	在\r\n这个文件里，我们可以根据自己的需要来定制将要显示的页面。比如，看下面的代码，我们做了两处改动：第一是取消了 Home 和 Contact 两个 \r\ntab 的显示，我们通过加“//”注释了这两行代码。第二是增加了两个 tab：Files 和 \r\nPIIs，新增加的两行代码实现了显示上面步骤里我们创建的两个页面。</p><h5 style=\"text-indent:2em;\" id=\"listing5\"><span style=\"font-size:14px;\">清单 4. 自定义标签页</span></h5><pre class=\"displaycode\">&nbsp;&lt;div&nbsp;id=&quot;mainmenu&quot;&gt;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;$this-&gt;widget(&#39;zii.widgets.CMenu&#39;,array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&#39;items&#39;=&gt;array(&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;array(&#39;label&#39;=&gt;&#39;Home&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/index&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Files&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/file/admin&#39;)),&nbsp;&nbsp;//&nbsp;new&nbsp;added\r\n	&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;PIIs&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/pii/admin&#39;)),&nbsp;&nbsp;&nbsp;//&nbsp;new&nbsp;added\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;About&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/page&#39;,&nbsp;&#39;view&#39;=&gt;&#39;about&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;array(&#39;label&#39;=&gt;&#39;Contact&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/contact&#39;)),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Login&#39;,&nbsp;&#39;url&#39;=&gt;array(&#39;/site/login&#39;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;visible&#39;=&gt;Yii::app()-&gt;user-&gt;isGuest),&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(&#39;label&#39;=&gt;&#39;Logout&nbsp;(&#39;.Yii::app()-&gt;user-&gt;name.&#39;)&#39;,&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;url&#39;=&gt;array(&#39;/site/logout&#39;),&nbsp;&#39;visible&#39;=&gt;!Yii::app()-&gt;user-&gt;isGuest)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),&nbsp;\r\n&nbsp;&nbsp;&nbsp;));&nbsp;?&gt;&nbsp;\r\n&nbsp;&lt;/div&gt;&lt;!--&nbsp;mainmenu&nbsp;--&gt;</pre><p style=\"text-indent:2em;\">\r\n	现在来看看效果吧。果然，Home 和 Contact 页面不见了，取代它们的是 Files 和 PIIs 页面。</p><h5 style=\"text-indent:2em;\" id=\"fig7\"><span style=\"font-size:14px;\">图 7. 加入了 Files 和 PIIs 的 Web 应用</span></h5><p style=\"text-indent:2em;\"><img alt=\"图 7. 加入了 Files 和 PIIs 的 Web 应用\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image007.jpg\" width=\"581\"/> </p><p style=\"text-indent:2em;\">\r\n	通过这一步，我们将新创建的两个数据表 DRUD 的应用就添加到我们的网页中了。我们已经可以直接通过这两个页面来维护表里面的数据了。</p><h3 style=\"text-indent:2em;\" id=\"minor4.4\">\r\n	完善功能</h3><p style=\"text-indent:2em;\">\r\n	到\r\n目前为止，一个关于数据表维护的 Web \r\n应用的主要功能就基本实现了。当然，我们经常会根据自己使用上的需要对现有的功能做一些完善。比如，我们需要对最后一个修改数据的人和日期做一个记录，我\r\n们需要隐藏一些字段的显示，调整一些字段的显示顺序，我们可能还需要增加一些用户来使用这个系统。因为大部分的代码框架已经通过 Gii \r\n实现了，我们只需要在此基础上做一些简单的添加和修改，就可以实现我们所需要的功能。现在，我们用记录最后修改人和修改日期为例，看看我们如何通过修改一\r\n些代码来完善想要的功能的。</p><p style=\"text-indent:2em;\">\r\n	比如，我们需要记录对 Pii 数据表最后做修改的用户和日期信息。我们首先要找到维护 Pii 表的那个 PHP 文件。在这个例子中，是文件 C:\\wamp\\www\\pii\\protected\\models\\Pii.php。我们在文件的最后增加下面的代码：</p><h5 style=\"text-indent:2em;\" id=\"listing6\"><span style=\"font-size:14px;\">清单 5. 记录修改日期和用户名</span></h5><p></p><pre class=\"prettyprint lang-php\">&nbsp;public&nbsp;function&nbsp;beforeSave()&nbsp;\r\n&nbsp;&nbsp;&nbsp;{&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;date_default_timezone_set(&quot;Asia/Shanghai&quot;);&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;UpdatedAt=date(&#39;Y-m-d&nbsp;H:i:s&#39;);&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;ModifiedBy=Yii::app()-&gt;user-&gt;name;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;parent::beforeSave();&nbsp;\r\n&nbsp;&nbsp;&nbsp;}</pre><p></p><p style=\"text-indent:2em;\">\r\n	这段代码在保存数据前为 UpdateAt 和 ModifiedBy \r\n字段设置了用户名和修改日期，然后调用了父类的 beforeSave 方法。保存之后，你会发现，在页面上修改 Pii 数据之后，Updated \r\nAt 和 Modified By 字段的值被自动填入了默认的内容。</p><h5 style=\"text-indent:2em;\" id=\"fig8\">\r\n	图 8. 自动填写 Updated At 和 Modified By 字段</h5><p style=\"text-indent:2em;\"><img alt=\"图 8. 自动填写 Updated At 和 Modified By 字段\" src=\"http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/images/image008.jpg\" width=\"582\"/> </p><p style=\"text-indent:2em;\" class=\"ibm-ind-link ibm-back-to-top\"><br/></p><h2 style=\"text-indent:2em;\" id=\"major5\">\r\n	结束语</h2><p style=\"text-indent:2em;\">\r\n	通\r\n过这篇文章，我们了解了 Yii 这个当今最为流行的 PHP 框架，并通过搭建一个测试数据维护系统的具体实例，学习了如何使用 Yii \r\n框架来创建一个 Web 应用。在这个实例中，我们还通过使用 Gii 代码生成器为应用自动创建代码框架，更好地体会到 Yii 在创建 Web \r\n应用上的快捷优势。我们期待这篇文章能起到一个“抛砖引玉”的作用，希望更多的人了解和使用这个框架，并开发出更多更好的应用。</p><p style=\"text-indent:2em;\"><br/></p>' ,`copy_from` = 'developworks' ,`copy_url` = 'http://www.ibm.com/developerworks/cn/opensource/os-cn-yii/' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,apache,yii,cms,文章,IT,服务器' ,`view_count` = '152' ,`commend` = 'Y' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407136800' ,`update_time` = '1408692660' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '30' ,`user_id` = '1' ,`title` = '阅读jQuery源代码带给我们的18个惊喜' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '2' ,`special_id` = '0' ,`introduce` = '相信大家都非常熟悉jQuery类库，绝对最受欢迎的JS框架，如果你也有兴趣阅读v源代码的话，或者你也会有同感。以下便是阅读jQuery源代码后挖掘的18条令人惊奇的信息：1. sizzle的大小Sizzle是用来帮助jQuery实现' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p>\r\n	相信大家都非常熟悉jQuery类库，绝对最受欢迎的JS框架，如果你也有兴趣阅读v源代码的话，或者你也会有同感。\r\n</p>\r\n<p>\r\n	以下便是阅读jQuery源代码后挖掘的18条令人惊奇的信息：\r\n</p>\r\n<h2>\r\n	1. sizzle的大小\r\n</h2>\r\n<p>\r\n	Sizzle是用来帮助jQuery实现DOM查询操作的引擎，可能你不知道它占用了jQuery源代码的22%。\r\n</p>\r\n<p>\r\n	其次最大的特性是$.ajax，占用了jQuery源代码中的8%。\r\n</p>\r\n<h2>\r\n	2. $.grep\r\n</h2>\r\n<p>\r\n	这个方法类似underscore中的_.filter方法，使用两个参数，一个数组变量和一个回调函数，返回通过回调函数为true的元素。\r\n</p>\r\n<h2>\r\n	3. 冒泡提醒\r\n</h2>\r\n<p>\r\n	jQuery特意的阻止了一个事件类型的气泡。这就是load事件，jQuery传递了一个特别的noBubble:true来阻止事件冒泡到window对象（这可能导致错误的匹配了window.load事件）\r\n</p>\r\n<h2>\r\n	4. 缺省的动画速度\r\n</h2>\r\n<p>\r\n	jQuery通过快速的变化元素样式属性来实现动画。每一个变化被叫做一个\"滴答\"。缺省的动画速度是每13毫秒滴答一次，你可以通过重写jQuery.fx.interval来修改缺省的值\r\n</p>\r\n<h2>\r\n	5. $.fn.addClass接受一个方法\r\n</h2>\r\n<p>\r\n	我们通常提供$.fn.addClass一个class定义名称。但是它同样可以支持方法。你只需要方法返回一个空格分隔的字符串class定义即可。这个方法甚至接受元素的索引为参数，这样我们可以构建自己的只能class名。\r\n</p>\r\n<h2>\r\n	6. $.fn.removeClass同样支持\r\n</h2>\r\n<p>\r\n	这个方法也可以支持接受方法为参数，和$.fn.addClass一样。\r\n</p>\r\n<h2>\r\n	7. :empty伪选择器\r\n</h2>\r\n<p>\r\n	这个伪选择器可以匹配所有没有子元素的元素\r\n</p>\r\n<h2>\r\n	8. :lt和:gt伪选择器\r\n</h2>\r\n<p>\r\n	这些伪选择器基于索引来匹配。例如，$(\'div:gt(2)\')将会返回所有的div除了前３个元素（基于０索引）。如果你提供一个负值，那么就从末尾算起。\r\n</p>\r\n<h2>\r\n	9. $(document.ready()使用了promise\r\n</h2>\r\n<p>\r\n	jQuery内部使用了jQuery的deferred来保证DOM完整被加载\r\n</p>\r\n<h2>\r\n	10. $.type\r\n</h2>\r\n<p>\r\n	大家可能都熟悉typeof来判断数据类型，但是你是否知道jQuery提供了.type()方法？这个方法比浏览器本地版本更智能。\r\n</p>\r\n<p>\r\n	例如，typeof(new Number(3))返回了“object”，然而$.type(new Number(3))放回数字。\r\n</p>\r\n<p>\r\n	更确切的说$.type告诉你返回对象的值类型\r\n</p>\r\n<h2>\r\n	11. $.fn.queue\r\n</h2>\r\n<p>\r\n	你可以使用$(\'div\').queue()来检查一个元素的特效队列。这对于你想了解多少个特效还保持在对象元素很有好处。\r\n</p>\r\n<p>\r\n	更有用的在于，你可以直接操作队列来添加自己的特效，如下：<br />\r\n<br />\r\n<img alt=\"\\\" src=\"http://www.php100.com/uploadfile/2014/0804/20140804100813484.jpg\" style=\"width:774px;height:397px;\" />\r\n</p>\r\n<div>\r\n	<div>\r\n		<div>\r\n			<div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<h2>\r\n	12. Click事件针对禁用元素将失效\r\n</h2>\r\n<p>\r\n	jQuery针对禁用的元素自动中断点击事件，这样可以有效优化保证让你不用书写更多代码来检测这种情况\r\n</p>\r\n<h2>\r\n	13. $.fn.on 接受多个对象\r\n</h2>\r\n<p>\r\n	你是否知道$.fn.on方法接受对象来添加多个事件？下面是例子：<br />\r\n<br />\r\n<img alt=\"\\\" src=\"http://www.php100.com/uploadfile/2014/0804/20140804100859826.jpg\" style=\"width:792px;height:277px;\" />\r\n</p>\r\n<div>\r\n	<div>\r\n		<div>\r\n			<div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n				<div>\r\n					&nbsp;\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<h2>\r\n	14. $.camelCase\r\n</h2>\r\n<p>\r\n	这个方法帮助你将破折号风格字符串转化为驼峰拼写方式，如下：\r\n</p>\r\n<p>\r\n	background-color 转化为 backgroundColor\r\n</p>\r\n<h2>\r\n	15. $.active\r\n</h2>\r\n<p>\r\n	调用$.active返回活动的XHR查询数量。这个可以用来强制限制同时处理多少个ajax请求\r\n</p>\r\n<h2>\r\n	16. $.fn.parentsUntil/$.fn.nextUntil/$.fn.prevUntil\r\n</h2>\r\n<p>\r\n	我过去非常熟悉.parents()，.next()和.prev()方法，但是不知道其它版本。\r\n</p>\r\n<p>\r\n	他们匹配所有父层/下一个元素/上一个元素直到遇到了停止条件元素\r\n</p>\r\n<h2>\r\n	17. $.fn.clone参数\r\n</h2>\r\n<p>\r\n	这个方法带的参数可以通过传递参数true来帮助你确认拷贝数据属性和事件\r\n</p>\r\n<h2>\r\n	18. 更多$.fn.clone参数\r\n</h2>\r\n<p>\r\n	除了上面参数，你也可以通过传递另外一个参数true来克隆子元素的数据属性和事件，这叫做深层次克隆。\r\n</p>\r\n<p>\r\n	第二参数缺省使用第一个参数值。如果你第一个参数为true，那么第二个参数也为true的话，就可以省略\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>' ,`copy_from` = 'php100' ,`copy_url` = 'http://www.php100.com' ,`redirect_url` = '' ,`tags` = 'php,js,jquery' ,`view_count` = '114' ,`commend` = 'Y' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407140334' ,`update_time` = '1407140334' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '31' ,`user_id` = '1' ,`title` = '安装eaccelerator加速PHP' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '17' ,`special_id` = '0' ,`introduce` = '一、安装eaccelerator-0.9.5\r\n\r\n 1、首先下载并安装ZendOptimizer-3.3.9\r\n       把ZendOptimizer.so COPY到一个目录，执行以下命令：\r\n      chcon -t texrel_shlib_t /usr/lib/ZendOptimizer.so \r\n      execstack -c /usr/lib/ZendOptimizer' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">一、安装eaccelerator-0.9.5</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 1、首先下载并安装ZendOptimizer-3.3.9</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 把ZendOptimizer.so COPY到一个目录，执行以下命令：</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;chcon -t texrel_shlib_t /usr/lib/ZendOptimizer.so&nbsp;</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;execstack -c /usr/lib/ZendOptimizer.so&nbsp;</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service httpd restart</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service mysqld restart</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp; 基本上可以OK。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 2、再安装eaccelerator-0.9.6加速软件</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> # wget </span><a href=\"http://bart.eaccelerator.net/source/0.9.6/eaccelerator-0.9.6.tar.bz2\"><span style=\"font-size:14px;\">http://bart.eaccelerator.net/source/0.9.6/eaccelerator-0.9.6.tar.bz2</span></a>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\"># tar jxvf eaccelerator-0.9.6.tar.bz2</span><br />\r\n<span style=\"font-size:14px;\"> # cd eaccelerator-0.9.6</span><br />\r\n<span style=\"font-size:14px;\"> #&nbsp; phpize </span><br />\r\n<span style=\"font-size:14px;\"> # ./configure --enable-eaccelerator=shared --with-php-config=/usr/bin/php-config</span><br />\r\n<span style=\"font-size:14px;\"> # make</span><br />\r\n<span style=\"font-size:14px;\"> # make install</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 这时会将eaccelerator安装到php目录中，屏幕会显示eaccelerator.so所在路径，例如：</span><br />\r\n<span style=\"font-size:14px;\"> Installing shared extensions:&nbsp; /usr/lib/php/modules　　记住这个路径。</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">安装完成后需要修改/etc/ld.so.conf</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">#vim /etc/lod.so.conf</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"font-size:14px;\">再最后一行添加 include /usr/lib/php/modules/*.so 后保存退出</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator即可以安装为PHP扩展，也可以安装为zend扩展，以下安装为PHP扩展。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 在最后一行加入以下内容</span>\r\n</p>\r\n<div>\r\n	<div id=\"highlighter_177088\" class=\"syntaxhighlighter php\">\r\n<pre class=\"prettyprint lang-bsh\">[eaccelerator]\r\nextension=\"eaccelerator.so\"\r\neaccelerator.shm_size=\"16\"\r\neaccelerator.cache_dir=\"tmp/eaccelerator\"\r\neaccelerator.enable=\"1\"\r\neaccelerator.Optimizer=\"1\"\r\neaccelerator.check_mttime=\"1\"\r\neaccelerator.debug=\"0\"\r\neaccelerator.filter=\"\"\r\neaccelerator.shm_max=\"0\"\r\neaccelerator.shm_ttl=\"0\"\r\neaccelerator.shm_prune_period=\"0\"\r\neaccelerator.shm_only=\"0\"\r\neaccelerator.compress=\"1\"\r\neaccelerator.compress_level=\"9\"</pre>\r\n<br />\r\n	</div>\r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n<span style=\"font-size:14px;\"> 建立缓存目录：</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;　# mkdir -p /tmp/eaccelerator</span><br />\r\n<span style=\"font-size:14px;\">&nbsp;　# chmod 777 /tmp/eaccelerator</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 重启Apache：</span><br />\r\n<span style=\"font-size:14px;\"> # service httpd restart</span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 3、检查ZendOptimizer和eaccelerator是否安装成功</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 创建一个phpinfo.php文件，内容如下：</span><br />\r\n<span style=\"font-size:14px;\"> &lt;?php</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;phpinfo();</span><br />\r\n<span style=\"font-size:14px;\"> ?&gt;</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 将该文件放置到网站目录，在浏览器中访问，如果出现以下内容则安装成功：</span><br />\r\n<span style=\"font-size:14px;\"> This program makes use of the Zend Scripting Language Engine:</span><br />\r\n<span style=\"font-size:14px;\"> Zend Engine v2.2.0, Copyright (c) 1998-2007 Zend Technologies</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with eAccelerator v0.9.5, Copyright (c) 2004-2006 eAccelerator, by eAccelerator</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with Zend Extension Manager v1.0.11, Copyright (c) 2003-2006, by Zend Technologies</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp; &nbsp;with Zend Optimizer v3.2.2, Copyright (c) 1998-2006, by Zend Technologies </span><br />\r\n<br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 二、eaccelerator配置信息详解(根据官方英文说明翻译)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> extension=\"/data/webserver/php/lib/php/extensions/no-debug-zts-20060613/eaccelerator.so\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：PHP扩展eaccelerator.so的路径。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_size=\"32\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：eaccelerator可使用的共享内存大小(单位为MB)。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 在Linux下，单个进程的最大内存使用量受/proc/sys/kernel/shmmax中设置的数字限制(单位为字节)，例如CentOS 4.4的shmmax默认值为33554432字节(33554432bytes/1024/1024=32MB)。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 临时更改该值：</span><br />\r\n<span style=\"font-size:14px;\"> # echo 字节数 &gt; /proc/sys/kernel/shmmax</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 按照以上方法更改，在每次重启系统时，该值会被自动还原。如果想永久更改，可以修改/etc/sysctl.conf文件，设置：</span><br />\r\n<span style=\"font-size:14px;\"> kernel.shmmax = 字节数</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.cache_dir=\"/data/cache/eaccelerator\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：缓存路径，可以使用命令mkdir -p /data/cache/eaccelerator创建该目录，然后使用命令chmod 0777 /data/cache/eaccelerator设置该目录权限为0777</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.enable=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭eaccelerator。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.optimizer=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭代码优化，开启可以加快代码的执行速度。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.check_mtime=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当打开此项时，eaccelerator会在每次请求时检查php文件的修改时间，看其是否被修改过，这会耗费一点时间，如果php文件被修改\r\n过，eaccelerator会重新编译缓存该php文件。当关闭此项时，如果php文件被修改，则需要手工删除eaccelerator缓存，才能显示\r\n被修改的php文件。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.debug=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭调试记录。当打开时，eaccelerator会将对一个缓存文件的每次请求都写进log。打开此项只对调试eaccelerator是否有BUG时有益处。\"1\"指打开，\"0\"指关闭。默认值为\"0\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.filter=\"\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：决定哪些PHP文件应该被缓存。可以指定一个范围(比如\"*.php *.phtml\")，这样被指定的文件就会被缓存。如果该范围以!开头，被指定的文件就不会被缓存。默认值为\"\"，表示缓存所有的PHP文件。 </span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_max=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：一个用户使用例如eaccelerator_put之类的函数能够往共享内存中加载的最大数据。默认值为\"0\"，表示不限制。(单位为字节)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_ttl=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当没有足够的空闲共享内存去尝试缓冲一个新脚本时，将删除至少在shm_ttl秒之前没有被访问过的文件。默认值为\"0\"，表示不尝试从共享内存中删除任何旧的脚本。(单位为秒)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_prune_period=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：当没有足够的空闲共享内存去尝试缓冲一个新脚本时，将删所有旧脚本，前提是这个尝试在超过shm_prune_period秒之前被执行过。默认值为\"0\"，表示不尝试从共享内存中删除任何旧的脚本。(单位为秒)</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.shm_only=\"0\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭在磁盘上缓存编译过的脚本。这个参数对会话数据和内容缓存没有效果。默认值为\"0\"，表示使用磁盘和共享内存来缓存。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.compress=\"1\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：打开或者关闭缓存内容压缩。\"1\"指打开，\"0\"指关闭。默认值为\"1\"。</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> --------------------</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> eaccelerator.compress_level=\"9\"</span><br />\r\n<br />\r\n<span style=\"font-size:14px;\"> 解释：内存压缩的级别。默认值为\"9\"，表示最大压缩。</span>\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,html,sql,apache' ,`view_count` = '121' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407223078' ,`update_time` = '1407223078' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '32' ,`user_id` = '1' ,`title` = 'Nginx的gzip配置参数说明' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '3' ,`special_id` = '0' ,`introduce` = 'gzip\r\n决定是否开启gzip模块\r\nparam:on|off\r\nexample:gzip on;\r\n	\r\n	\r\n		gzip_buffers \r\n设置gzip申请内存的大小,其作用是按块大小的倍数申请内存空间\r\nparam1:int\r\nparam2:int(k) 后面单位是k\r\nexample: gzip_buffers 4 8k;\r\n	\r\n	\r\n		gzip_comp_level\r\n设置gz' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div id=\"cnblogs_post_body\">\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">决定是否开启gzip模块</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:on|off</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip on;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_buffers&nbsp;</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置gzip申请内存的大小,其作用是按块大小的倍数申请内存空间</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param1:int</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param2:int(k) 后面单位是k</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example: gzip_buffers 4 8k;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_comp_level</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置gzip压缩等级，等级越底压缩速度越快文件压缩比越小，反之速度越慢文件压缩比越大</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:1-9</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_com_level 1;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_min_length</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">当返回内容大于此值时才会使用gzip进行压缩,以K为单位,当值为0时，所有页面都进行压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:int</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_min_length 1000;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_http_version</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">用于识别http协议的版本，早期的浏览器不支持gzip压缩，用户会看到乱码，所以为了支持前期版本加了此选项,目前此项基本可以忽略</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param: 1.0|1.1</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_http_version 1.0</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_proxied</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">Nginx做为反向代理的时候启用，</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:off|expired|no-cache|no-sotre|private|no_last_modified|no_etag|auth|any]</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">expample:gzip_proxied no-cache;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">off – 关闭所有的代理结果数据压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">expired – 启用压缩，如果header中包含”Expires”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no-cache – 启用压缩，如果header中包含”Cache-Control:no-cache”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no-store – 启用压缩，如果header中包含”Cache-Control:no-store”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">private – 启用压缩，如果header中包含”Cache-Control:private”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no_last_modified – 启用压缩，如果header中包含”Last_Modified”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">no_etag – 启用压缩，如果header中包含“ETag”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">auth – 启用压缩，如果header中包含“Authorization”头信息</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">any – 无条件压缩所有结果数据</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">gzip_types</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">设置需要压缩的MIME类型,非设置值不进行压缩</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">param:text/html|application/x-javascript|text/css|application/xml</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">example:gzip_types text/html;</span>\r\n	</p>\r\n	<p>\r\n		<strong><span style=\"font-size:14px;line-height:2;\">Demo</span></strong><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip on;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_min_length 1000;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_buffers 4 8k;</span><br />\r\n<span style=\"font-size:14px;line-height:2;\">gzip_types text/html application/x-javascript text/css application/xml;</span>\r\n	</p>\r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'html,nginx' ,`view_count` = '112' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407313916' ,`update_time` = '1407313916' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '33' ,`user_id` = '1' ,`title` = 'Linux之编辑器Vim篇（配置与高级技巧） ' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '3' ,`special_id` = '0' ,`introduce` = '最常用的就是修改vim默认的注释颜色深蓝色 很受不了，修改 ~/.vimrc      hi Comment ctermfg=blue         一、Vim配置       如果没有安装vim就请使用:sudo apt-get install vim 一个完整的.vimrc配置信息如下所示： set nocompatible set nummber filetype on set histo' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\">最常用的就是修改vim默认的注释颜色深蓝色 很受不了，修改 ~/.vimrc</span></b> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\"> </span></b> \r\n</p>\r\n<pre class=\"prettyprint lang-html\"><b>hi Comment ctermfg=blue </b></pre>\r\n<b> <br />\r\n</b> \r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\">一、Vim配置</span></b> \r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:14px;line-height:2;\"> </span></b> \r\n</p>\r\n<pre class=\"prettyprint lang-html\"><b> 如果没有安装vim就请使用:sudo apt-get install vim\r\n    一个完整的.vimrc配置信息如下所示：\r\n    set nocompatible\r\n    set nummber\r\n    filetype on\r\n    set history=1000\r\n    set background=dark\r\n    syntax on\r\n    set autoindent\r\n    set mouse=a\r\n    set smartindent\r\n    set tabstop=4\r\n    set shiftwidth=400\r\n    set showmatch\r\n    set guioptions-=T\r\n    set vb t_vb=\r\n    set ruler\r\n    set nohls\r\n    set incsearch\r\n    if has(\"vms\")\r\n    set nobackup\r\n    else\r\n    set backup\r\n    endif\r\n    .vimrc文件的配置在终端下使用vim进行编辑时，默认情况下，编辑的界面上是没有显示行号、语法高亮度显示、智能缩进等功能的。为了更好的在vim下进行工作，需要手动设置一个配置文件：.vimrc。\r\n    在启动vim时，当前用户根目录下的.vimrc文件会被自动读取，该文件可以包含一些设置甚至脚本，所以，一般情况下把.vimrc文件创建在当前用户的根目录下比较方便，即创建的命令为：\r\n    $vi ~/.vimrc\r\n    设置完后\r\n    $:x 或者 $wq\r\n    进行保存退出即可。\r\n    下面给出一个例子，其中列出了经常用到的设置，详细的设置信息请参照参考资料：\r\n    “双引号开始的行为注释行，下同\r\n    “去掉讨厌的有关vi一致性模式，避免以前版本的一些bug和局限\r\n    set nocompatible\r\n    “显示行号\r\n    set nummber\r\n    “检测文件的类型\r\n    filetype on\r\n    “记录历史的行数\r\n    set history=1000\r\n    “背景使用黑色\r\n    set background=dark\r\n    “语法高亮度显示\r\n    syntax on\r\n    “下面两行在进行编写代码时，在格式对起上很有用；\r\n    “第一行，vim使用自动对起，也就是把当前行的对起格式应用到下一行；\r\n    “第二行，依据上面的对起格式，智能的选择对起方式，对于类似C语言编\r\n    “写上很有用\r\n    set autoindent\r\n    set smartindent\r\n    “第一行设置tab键为4个空格，第二行设置当行之间交错时使用4个空格\r\n    set tabstop=4\r\n    set shiftwidth=4\r\n    “设置匹配模式，类似当输入一个左括号时会匹配相应的那个右括号\r\n    set showmatch\r\n    “去除vim的GUI版本中的toolbar\r\n    set guioptions-=T\r\n    “当vim进行编辑时，如果命令错误，会发出一个响声，该设置去掉响声\r\n    set vb t_vb=\r\n    “在编辑过程中，在右下角显示光标位置的状态行\r\n    set ruler\r\n    “默认情况下，寻找匹配是高亮度显示的，该设置关闭高亮显示\r\n    set nohls\r\n    “查询时非常方便，如要查找book单词，当输入到/b时，会自动找到第一\r\n    “个b开头的单词，当输入到/bo时，会自动找到第一个bo开头的单词，依\r\n    “次类推，进行查找时，使用此设置会快速找到答案，当你找要匹配的单词\r\n    “时，别忘记回车\r\n    set incsearch\r\n    “修改一个文件后，自动进行备份，备份的文件名为原文件名加“~“后缀\r\n    if has(“vms”)\r\n    set nobackup\r\n    else\r\n    set backup\r\n    endif\r\n    ################################################################################\r\n    如果设置完后，发现功能没有起作用，检查一下系统下是否安装了vim-enhanced包，查询命令为：\r\n    $rpm –q vim-enhanced\r\n    请教］用vi把文件重新打开，如何回到上次光标的位置？\r\n    autocmd BufReadPost *\r\n    \\ if line(\"\'\\\"\") &gt; 0 &amp;&amp; line(\"\'\\\"\") &lt;= line(\"$\") |\r\n    \\ exe \"normal g`\\\"\" |\r\n    \\ endif\r\n    ###################################################################################\r\n    vim中如何查找和替换字符串\r\n    一、 字符串的查找\r\n    1. vim 中用 / 和 ? 来查找字符串，两者的区别是：\r\n    /string 会高亮显示光标后匹配的第一个字符串，回车后光标移到该字符串的第一个字母；\r\n    ?string 会高亮显示光标前匹配的第一个字符串，回车后光标移到该字符串的第一个字母。\r\n    在回车之后，按n键同方向转到下一个匹配的字符串，按N键反方向转到上一个匹配的字符串。\r\n    2. 用命令 :set ic 和 :set noic 来分别设置查找时不区分和区分大小写。\r\n    如果查找特殊字符，如 ^、$、*、/ 和 .，需要在前面加 \\ 来转义。\r\n    二、字符串的替换\r\n    1. vim 中可用 :s 命令来替换字符串，具体如下：\r\n    :s/str1/str2/ 替换当前行第一个 str1 为 str2\r\n    :s/str1/str2/g 替换当前行中所有 str1 为 str2\r\n    :m,ns/str1/str2/ 替换第 n 行开始到最后一行中每一行的第一个 str1 为 str2\r\n    :m,ns/str1/str2/g 替换第 n 行开始到最后一行中所有的 str1 为 str2\r\n    (注：m和n 为数字，若m为 .，表示为当前行开始；若n为$，则表示到最后一行结束)\r\n    如果使用 # 作为分隔符，则中间出现的 / 不会作为分隔符，比如：\r\n    :s#str1/#str2/# 替换当前行第一个 str1/ 为 str2/\r\n    :%s+/oradata/apras/+/user01/apras1+ (使用+ 来 替换 / )： /oradata/apras/替换成/user01/apras1/\r\n    2. 其他\r\n    :%s/str1/str2/（等同于 :g/str1/s//str2/） 替换每一行的第一个 str1 为 str2\r\n    :%s/str1/str2/g（等同于 :g/str1/s//str2/g 和 :1,$ s/str1/str2/g ） 替换文中所有 str1 为 str2\r\n    从替换命令可以看到，g 放在命令末尾，表示对搜索字符串的每次出现进行替换；不加 g，表示只对搜索\r\n    字符串的首次出现进行替换；g 放在命令开头，表示对正文中所有包含搜索字符串的行进行替换操作。\r\n    ###################################################################################\r\n    2.打开一个已存在的文件后，文件中的字符，不能用backspace键删除。但是此时如果输入新的字符，却可以用backspace进行删除。这是怎么回事？\r\n    查看帮助：\r\n    :help bs\r\n    :help backspace\r\n    原来，backspace有几种工作方式，默认是vi兼容的。对新手来说很不习惯。对老vi 不那么熟悉的人也都挺困扰的。可以用\r\n    :set backspace=indent,eol,start\r\n    来解决。\r\n    indent: 如果用了:set indent,:set ai 等自动缩进，想用退格键将字段缩进的删掉，必须设置这个选项。否则不响应。\r\n    eol:如果插入模式下在行开头，想通过退格键合并两行，需要设置eol。\r\n    start：要想删除此次插入前的输入，需设置这个。 </b></pre>\r\n<b> <br />\r\n</b> \r\n<p>\r\n	<br />\r\n</p>\r\n<div>\r\n	<br />\r\n	<div>\r\n		<br />\r\n	</div>\r\n<span><span style=\"font-size:14px;line-height:2;\">二、</span><b><span style=\"font-size:14px;line-height:2;\">Vim高级技巧</span></b></span> \r\n</div>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<pre class=\"prettyprint lang-html\">    本文一般情况下用&lt;C-字母&gt;（里边的字母一般大小写无所谓,除非特别注明）表示按住ctrl同时按下相关字母，命令前加一个i 表示在插入模式下用这个命令\r\n    1. 选定文字/ 拷贝粘贴\r\n    v 为可视模式,可以选定多行。选定多行之后，可以用yy 或者dd 等等进行拷贝和剪切。\r\n    p 是粘贴\r\n    y 和d 可以直接拷贝或者剪切选定的内容\r\n    yw 是拷贝一个单词,如果要复制整行的最简单办法就是V,y,p 就行了\r\n    v 是可以选定一行任意个字符的,V 是行选定的,一次一整行，然后通过向下或向上移动光标而选定多行。\r\n    对于v 选定的,拷贝后就是这么多,选多少就拷贝多少,而V 选定的,粘贴的话会自动换到下一行\r\n    &lt;C-V&gt;命令模式下,也是块选定,不过是列块选定\r\n    2. 折叠代码\r\n    可以zf 进行折叠, 用zo 打开折叠,也可以方向键向右打开折叠,zc 关闭折叠(只要在被折叠的块中的任一个语句就行)\r\n    3. 缩进代码\r\n    &lt;是左缩进, &gt;是右缩进\r\n    按v 选定后按=就是自动格式化代码,自动缩进,内部的递归的缩进都做到了\r\n    行左移&lt;&lt;，行右移&gt;&gt;，该命令用于调整源码缩进格式简便快速。\r\n    4. 移动光标\r\n    %是从大括号的开始移动到大括号的结束位置\r\n    :后边加行号就是跳到这一行\r\n    &lt;C-O&gt; 光标返回到以前的位置。相当于光标移动的“撤销”\r\n    &lt;C-I&gt; 光标返回到后来的位置。相当于光标移动的“恢复”\r\n    5. 多文件编辑/ 缓冲区命令\r\n    vim 下每一个打开的文件对应一个缓冲区（buffer）。\r\n    多文件编辑会有两种情形，一种是在进入vim 前所用的参数就是多个文件（这种情形称为\r\n    argument list）。另一种情形是进入vim 后另外再开其它的文件（称为buffer list）。不过都\r\n    可以统称为buffer。\r\n    5.1 打开文件\r\n    vi flname1 flname2… flnameN\r\n    将多个文件调入缓冲，是argument list。\r\n    :e filename\r\n    这是在进入vim 后，在不离开vim 的情形下再开其它文件，只要您要编辑的档案是在目\r\n    前目录，Tab 补全键还是可以使用。是buffer list。\r\n    注意：:e 或者:new 或者:split 后边可以跟目录,这样就可以在目录下慢慢找要打开的文件了\r\n    5.2 缓冲区跳转\r\n    :n 编辑下一个文件。\r\n    :2n 编辑下二个文件。\r\n    :N 编辑前一个文件。注意，这种用法只能用于argument list 的情形。\r\n    :rew 回到首文件\r\n    :args 查看当前编辑缓冲文件状态\r\n    :e# 或Ctrl-^ 编辑前一个档案，用于两文件互相编辑时相当好用。这种用法不管是\r\n    argument list 或buffer list 档案间皆可使用。使用Ctrl－^ 命令更便捷，但如终端类型不正\r\n    确该功能将无效。\r\n    用:ls 来显示缓冲区中的文件，编号后边有#的代表是前一个文件，可以通过:e#来进入，有\r\n    %a 的代表是当前文件，什么也没有的可以通过:bn 来进入，这里的n 代表文件编号。\r\n    :b 文件名或编号移至该文件。\r\n    在:ls 中就会出示各文件的编号，这个编号在未离开vim 前是不会变的。这个指令elvis 也\r\n    是可以使用。当然:e#编号也是可以的，这样的用法则是所有vi clone 都通用了。\r\n    在buffers 中，减号- 表示这个buffer 并未载入，不过，不必担心，载入相当快速的。加\r\n    号+ 表示这个buffer 已经修改过了。\r\n    :bn buffer next。这里的n 代表字母n\r\n    :bl buffer last。\r\n    以上两个指令elvis 不适用。\r\n    如果您是使用vim 的GUI，那就在菜单上就会有Buffers 这个选项，可以很容易的知道及\r\n    移动各buffer 间。\r\n    5.3 移除缓冲区\r\n    :bd(elete) buffer 在未离开vim 前是不会移除的，可使用这个指令移除。其实移除它干什\r\n    么呢？vim 是您在叫用时才会载入的，因此这些buffers 并不是像cache 一般要占内存的。\r\n    5.4 重新编辑\r\n    放弃一修改过的文件，重新编辑。\r\n    (1)使用命令:q!强行退出后再vi flname 重新进入。\r\n    (2)使用命令:e!强行重编辑更便捷。这样也是会打开文件，但会放弃目前编辑文件的改变，\r\n    否则如果文件已有变动，vim 预设是不让您随便离开的。:e! 后不接什么的话，代表舍弃一\r\n    切修改，重新载入编辑中文件。\r\n    5.5 其他命令\r\n    :files 或:buffers 或:ls 会列出目前buffer 中的所有文件。\r\n    在elvis 中可使用:b 来叫出buffers。\r\n    :f 或Ctrl-g 显示目前编辑的文件名、是否经过修改及目前光标所在之位置。\r\n    :f 文件名改变编辑中的文件名。(file)\r\n    :r 文件名在光标所在处插入一个文件的内容。(read)\r\n    :35 r 文件名将文件插入至35 行之后。\r\n    gf 这是vim 的特殊打开文件的方法，会打开光标所在处的word 为名的文件，当然，这\r\n    个文件要在当前目录内，否则会创建新文件。\r\n    6. 查找命令\r\n    用/查找单词后,n 可以跳到下一个,N 则是上一个,:nohls 可以取消高亮\r\n    查找时,:set ignorecase”项让VIM 忽略大小写，“:set noignorecase” 来关闭这项功能。\r\n    7. 修改文字\r\n    cw:删除一个单词并进入插入模式,cc:删除一行并进入插入模式。\r\n    r:然后输入的字母将替换当前字母并保持命令模式,R 则是不停的替换(一个挨着一个)。\r\n    0 到行首,$到行尾。\r\n    8. 函数间跳转\r\n    ctrl+]和ctrl+T 分别是查找函数的定义和返回,好像需要ctag 的支持\r\n    &lt;C-W&gt;i 跳转到光标所指标识符的定义行,是打开一个新的小窗口显示,记住要加个i,最好\r\n    是找自己项目下的文件,否则找库函数的话还不如man.\r\n    大写K 看光标所指标识符的man 帮助页\r\n    9. 窗口命令\r\n    &lt;C-W&gt; = ctrl+w\r\n    :split 文件名同时在一个页面显示多个文件的内容,类似多窗口,用&lt;C-W&gt;&lt;C-W&gt;切换当前\r\n    窗口\r\n    &lt;C-W&gt;f 切分显示光标在处的文件名，VIM 会在path 中搜索该文件名，比如常用它打\r\n    开#include 语句中的文件\r\n    &lt;C-W&gt;_ 当同时打开几个文件时，按&lt;C-W&gt;_ 使当前窗口最大化\r\n    用Ctrl-W 命令指定光标移动：\r\n    Ctrl-W + 扩大窗口\r\n    Ctrl-W - 缩小窗口\r\n    Ctrl-W h 移动到窗口左边\r\n    Ctrl-W j 移动到窗口下边\r\n    Ctrl-W k 移动到窗口上边\r\n    Ctrl-W l 移动到窗口右边\r\n    等于是&lt;C-W&gt;按下后,松开键盘,再按下一个命令就可以了.\r\n    如果要关闭分割窗口可以用:close，剩下只有一个窗口的话就不能关了。\r\n    多窗口是split，像用e 打开多个文件是将文件放在缓冲区中。\r\n    10. 自动完成\r\n    i&lt;C-P&gt; 向上搜索，补全一个词\r\n    i&lt;C-N&gt; 向下搜索，补全一个词\r\n    i&lt;C-X&gt;&lt;C-L&gt; 补全一行。\r\n    比如你写过一行for (int i = 0; i &lt; 100; i++) ， 你想再写一模一样的一行， 只要输入\r\n    for&lt;C-X&gt;&lt;C-L&gt;即可。如果补全出来的不是你想要的那一行，你可以按&lt;C-P&gt; 或&lt;C-N&gt; 选\r\n    择上一个或下一个匹配行i&lt;C-X&gt;&lt;C-F&gt; 在文件系统中搜索，补全一个文件名\r\n    如果按&lt;C-P&gt; 或&lt;C-N&gt; 补全一个词，在当前文件中没有找到匹配，VIM 将搜索#include\r\n    语句中的文件，而文件的位置将在path 中搜索。\r\n    i&lt;C-Y&gt; 把上一行对应列的字符抄下来\r\n    i&lt;C-E&gt; 把下一行对应列的字符抄上来,这两个都可以一直按下去,到了行尾自己会停的.\r\n    11. 注释整块内容\r\n    注释块的方法:\r\n    &lt;C-V&gt; 选定要注释掉的行I // Esc\r\n    I 之后输入的东西就是插入到选定的行前边的,直至Esc.\r\n    要去掉注释的办法:&lt;C-V&gt;选定注释符//,然后d\r\n    列块选定后I 是在前边都插入,A 是在后边都插入\r\n    &lt;C-V&gt;是按列块模式的选定,&lt;shift-V&gt;是行选定,v 是普通选定\r\n    12. 其他命令\r\n    u 可以撤销上一步操作, ctrl+r 可以恢复\r\n    i&lt;C-O&gt;命令执行一个普通模式的命令，执行完毕后回到插入模式，不用多次Esc\r\n    i&lt;C-V&gt;后续字符输入特殊的ASCII 字符或键。\r\n    . 在光标当前位置处重复上一次操作\r\n    :!命令行执行一条外部命令\r\n    *******************************************************************************\r\n    ****\r\n    我是vim 粉丝, 用了许久, 有一些自己的感受, 又到处挖到一些别人的技巧. 感觉对vim\r\n    粉丝比较有用, 就把它记在这儿. 希望借此文套出大家自己的巧活, 就正应了抛砖引玉的古\r\n    话了.\r\n    先稍为介绍一下vim. vi 是unix/linux 下极为普遍的一种文本编辑器, 大部分机器上都有.\r\n    vi 有各种变种, 在不同的机器上常用不同的变种软件. 其中vim 比较好用也用得比较广泛.\r\n    vim 是Vi IMproved 的缩写, 表示更好的vi. 我个人觉得它是非常好的编辑器(为了避免\r\n    Emacs 粉丝挑眼, 就不说最好了). 没用过的也建议试试看, 当然vim 对编写文本文件很方\r\n    便好用, 比如编写程序, html 文档等等, 却不能用来编写word 文档.\r\n    关于vim 的安装, 基本使用方法等网络上能搜出许多, 就不在这里罗嗦了, 要是对vim 有\r\n    兴趣, 那就看看这里(中文文档): http://vcd.gro.clinux.org/\r\n    本文就说些其中比较有用, 比较常用的命令, 若能熟练运用这些命令, 那么会发现编辑文件\r\n    很舒服.\r\n    说明:\r\n    以下的例子中xxx 表示在命令模式下输入xxx 并回车\r\n    以下的例子中:xxx 表示在扩展模式下输入xxx 并回车\r\n    小括号中的命令表示相关命令.\r\n    在编辑模式或可视模式下输入的命令会另外注明.\r\n    1. 查找\r\n    /xxx(?xxx) 表示在整篇文档中搜索匹配xxx 的字符串, / 表示向下查找, ? 表示\r\n    向上查找.其中xxx 可以是正规表达式,关于正规式就不多说了.\r\n    一般来说是区分大小写的, 要想不区分大小写, 那得先输入\r\n    :set ignorecase\r\n    查找到以后, 再输入n 查找下一个匹配处, 输入N 反方向查找.\r\n    *(#) 当光标停留在某个单词上时, 输入这条命令表示查找与该单词匹配的\r\n    下(上)一个单词. 同样, 再输入n 查找下一个匹配处, 输入N 反方\r\n    向查找.\r\n    g*(g#) 此命令与上条命令相似, 只不过它不完全匹配光标所在处的单词, 而\r\n    是匹配包含该单词的所有字符串.\r\n    gd 本命令查找与光标所在单词相匹配的单词, 并将光标停留在文档的\r\n    非\r\n    注释段中第一次出现这个单词的地方.\r\n    % 本命令查找与光标所在处相匹配的反括号, 包括() [] {}\r\n    f(F)x 本命令表示在光标所在行进行查找, 查找光标右(左)方第一个x 字符.\r\n    找到后:\r\n    输入; 表示继续往下找\r\n    输入, 表示反方向查找\r\n    2. 快速移动光标\r\n    在vi 中, 移动光标和编辑是两件事, 正因为区分开来, 所以可以很方便的进行光标定\r\n    位和编辑. 因此能更快一点移动光标是很有用的.\r\n    w(e) 移动光标到下一个单词.\r\n    b 移动光标到上一个单词.\r\n    0 移动光标到本行最开头.\r\n    ^ 移动光标到本行最开头的字符处.\r\n    $ 移动光标到本行结尾处.\r\n    H 移动光标到屏幕的首行.\r\n    M 移动光标到屏幕的中间一行.\r\n    L 移动光标到屏幕的尾行.\r\n    gg 移动光标到文档首行.\r\n    G 移动光标到文档尾行.\r\n    c-f (即ctrl 键与f 键一同按下) 本命令即page down.\r\n    c-b (即ctrl 键与b 键一同按下, 后同) 本命令即page up.\r\n    \'\' 此命令相当有用, 它移动光标到上一个标记处, 比如用gd, * 等查\r\n    找到某个单词后, 再输入此命令则回到上次停留的位置.\r\n    \'. 此命令相当好使, 它移动光标到上一次的修改行.\r\n    `. 此命令相当强大, 它移动光标到上一次的修改点.\r\n    3. 拷贝, 删除与粘贴\r\n    在vi 中y 表示拷贝, d 表示删除, p 表示粘贴. 其中拷贝与删除是与光标移动命令\r\n    结合的, 看几个例子就能够明白了.\r\n    yw 表示拷贝从当前光标到光标所在单词结尾的内容.\r\n    dw 表示删除从当前光标到光标所在单词结尾的内容.\r\n    y0 表示拷贝从当前光标到光标所在行首的内容.\r\n    d0 表示删除从当前光标到光标所在行首的内容.\r\n    y$ 表示拷贝从当前光标到光标所在行尾的内容.\r\n    d$ 表示删除从当前光标到光标所在行尾的内容.\r\n    yfa 表示拷贝从当前光标到光标后面的第一个a 字符之间的内容.\r\n    dfa 表示删除从当前光标到光标后面的第一个a 字符之间的内容.\r\n    特殊地:\r\n    yy 表示拷贝光标所在行.\r\n    dd 表示删除光标所在行.\r\n    D 表示删除从当前光标到光标所在行尾的内容.\r\n    关于拷贝, 删除和粘贴的复杂用法与寄存器有关, 可以自行查询.\r\n    4. 数字与命令\r\n    在vi 中数字与命令结合往往表示重复进行此命令, 若在扩展模式的开头出现则表示行\r\n    号定位. 如:\r\n    5fx 表示查找光标后第5 个x 字符.\r\n    5w(e) 移动光标到下五个单词.\r\n    5yy 表示拷贝光标以下5 行.\r\n    5dd 表示删除光标以下5 行.\r\n    y2fa 表示拷贝从当前光标到光标后面的第二个a 字符之间的内容.\r\n    :12,24y 表示拷贝第12 行到第24 行之间的内容.\r\n    :12,y 表示拷贝第12 行到光标所在行之间的内容.\r\n    :,24y 表示拷贝光标所在行到第24 行之间的内容. 删除类似.\r\n    5. 快速输入字符\r\n    在vi 中, 不要求你输入每一个字符, 可以有很多种方法快速输入一些字符.\r\n    使用linux/unix 的同学一定有一个经验, 在命令行下输入命令时敲入头几个字符再按\r\n    TAB 系统就会自动将剩下的字符补齐, 假如有多个匹配则会打印出来. 这就是著名的命令\r\n    补齐(其实windows 中也有文件名补齐功能). vi 中有许多的字符串补齐命令, 非常方便.\r\n    c-p(c-n) 在编辑模式中, 输入几个字符后再输入此命令则vi 开始向上(下)搜\r\n    索开头与其匹配的单词并补齐, 不断输入此命令则循环查找. 此命令\r\n    会在所有在这个vim 程序中打开的文件中进行匹配.\r\n    c-x-l 在编辑模式中, 此命令快速补齐整行内容, 但是仅在本窗口中出现的\r\n    文档中进行匹配.\r\n    c-x-f 在编辑模式中, 这个命令表示补齐文件名. 如输入:\r\n    /usr/local/tom 后再输入此命令则它会自动匹配出:\r\n    /usr/local/tomcat/\r\n    abbr 即缩写. 这是一个宏操作, 可以在编辑模式中用一个缩写代替另一个\r\n    字符串. 比如编写java 文件的常常输入System.out.println, 这很\r\n    是麻烦, 所以应该用缩写来减少敲字. 可以这么做:\r\n    :abbr sprt System.out.println\r\n    以后在输入sprt 后再输入其他非字母符号, 它就会自动扩展为System.\r\n    out.println\r\n    6. 替换\r\n    替换是vi 的强项, 因为可以用正规表达式来匹配字符串.以下提供几个例子.\r\n    :s/aa/bb/g 将光标所在行出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :s/\\&lt;aa\\&gt;/bb/g 将光标所在行出现的所有aa 替换为bb, 仅替换aa 这个单词\r\n    :%s/aa/bb/g 将文档中出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :12,23s/aa/bb/g 将从12 行到23 行中出现的所有包含aa 的字符串中的aa 替换为bb\r\n    :12,23s/^/#/ 将从12 行到23 行的行首加入# 字符\r\n    :%s= *$== 将所有行尾多余的空格删除\r\n    :g/^\\s*$/d 将所有不包含字符(空格也不包含)的空行删除.\r\n    7. 多文件编辑\r\n    在一个vim 程序中打开很多文件进行编辑是挺方便的.\r\n    :sp(:vsp) 文件名vim 将分割出一个横(纵)向窗口, 并在该窗口中打开新文件.\r\n    从vim6.0 开始, 文件名可以是一个目录的名称, 这样, vim 会\r\n    把该目录打开并显示文件列表, 在文件名上按回车则在本窗口打\r\n    开该文件, 若输入O 则在新窗口中打开该文件, 输入? 可以看\r\n    到帮助信息.\r\n    :e 文件名vim 将在原窗口中打开新的文件, 若旧文件编辑过, 会要求保存.\r\n    c-w-w vim 分割了好几个窗口怎么办? 输入此命令可以将光标循环定\r\n    位\r\n    到各个窗口之中.\r\n    :ls 此命令查看本vim 程序已经打开了多少个文件, 在屏幕的最下\r\n    方\r\n    会显示出如下数据:\r\n    1 %a \"usevim.html\" 行162\r\n    2 # \"xxxxxx.html\" 行0\r\n    其中:\r\n    1 表示打开的文件序号, 这个序号很有用处.\r\n    %a 表示文件代号, % 表示当前编辑的文件,\r\n    # 表示上次编辑的文件\r\n    \"usevim.html\" 表示文件名.\r\n    行162 表示光标位置.\r\n    :b 序号(代号) 此命令将指定序号(代号)的文件在本窗口打开, 其中的序号(代号)\r\n    就是用:ls 命令看到的.\r\n    :set diff 此命令用于比较两个文件, 可以用\r\n    :vsp filename\r\n    命令打开另一个文件, 然后在每个文件窗口中输入此命令,就能看\r\n    到效果了.\r\n    8. 宏替换\r\n    vi 不仅可以用abbr 来替换文字, 也可以进行命令的宏定义. 有些命令输起来很费劲,\r\n    因此我把它们定义到&lt;F1&gt;-&lt;F12&gt; 上, 这样就很方便了.这些配置可以预先写到~/.vimrc\r\n    (windows 下为$VIM/_vimrc) 中, 写进去的时候不用写前面的冒号.\r\n    :nmap &lt;F2&gt; :nohls&lt;cr&gt; 取消被搜索字串的高亮\r\n    :nmap &lt;F9&gt; &lt;C-W&gt;w 命令模式下转移光标到不同窗口\r\n    :imap &lt;F9&gt; &lt;ESC&gt;&lt;F9&gt; 输入模式下运行&lt;F9&gt;\r\n    :nmap &lt;F12&gt; :%s= *$==&lt;cr&gt; 删除所有行尾多余的空格.\r\n    :imap &lt;F12&gt; &lt;ESC&gt;&lt;F12&gt; 同上\r\n    :java 中: (注, 这里为什么说java 中, 因为以下定义对其他文件格式不起作用, 下文\r\n    会说到如何实现这一点)\r\n    :nmap &lt;F3&gt; :comp javac&lt;CR&gt;:mak -d . %&lt;CR&gt;\r\n    此命令用javac 编译java 文件, 它会自动将光标定位到出错点. 不过这需要定\r\n    义一个javac.vim 文件在$VIM/compiler 下, 在javac.vim 里面只有两行字:\r\n    setlocal makeprg=javac\r\n    setlocal errorformat=%A%f:%l:\\ %m,%-Z%p^,%-C%.%#\r\n    :nmap &lt;F4&gt; :comp ant&lt;CR&gt;:mak&lt;CR&gt;\r\n    此命令用ant 编译java 文件, 它会自动将光标定位到出错点. 一般来说, 安装\r\n    vim 后已经有了compiler/ant.vim 文件, 因此这个命令可以直接使用. 但是需要\r\n    在当前目录下有build.xml 文件, 当然还必须安装ant 才行.\r\n    :nmap &lt;F5&gt; :cl&lt;CR&gt; 此命令用于查看所有的编译错误.\r\n    :imap &lt;F5&gt; &lt;ESC&gt;&lt;F5&gt;\r\n    :nmap &lt;F6&gt; :cc&lt;CR&gt; 此命令用于查看当前的编译错误.\r\n    :imap &lt;F6&gt; &lt;ESC&gt;&lt;F6&gt;\r\n    :nmap &lt;F7&gt; :cn&lt;CR&gt; 此命令用于跳到下一个出错位置.\r\n    :imap &lt;F7&gt; &lt;ESC&gt;&lt;F7&gt;\r\n    :nmap &lt;F8&gt; :cp&lt;CR&gt; 此命令用于跳到上一个出错位置.\r\n    :imap &lt;F8&gt; &lt;ESC&gt;&lt;F8&gt;\r\n    :nmap &lt;F11&gt; :JavaBrowser&lt;cr&gt;\r\n    此命令用于在窗口左部分割出一个新窗口, 里面的内容是java 的资源树, 包括\r\n    本文件中出现的类, 类的成员变量及成员方法, 就好像JCreator 表现的那样.\r\n    在这个窗口中输入? 会看到帮助. 嘿嘿, 很好用, 不过需要ctags 支持.\r\n    :imap &lt;F11&gt; &lt;ESC&gt;&lt;F11&gt;\r\n    9. TAB\r\n    TAB 就是制表符, 单独拿出来做一节是因为这个东西确实很有用.\r\n    &lt;&lt; 输入此命令则光标所在行向左移动一个tab.\r\n    &gt;&gt; 输入此命令则光标所在行向右移动一个tab.\r\n    5&gt;&gt; 输入此命令则光标后5 行向右移动一个tab.\r\n    :12,24&gt; 此命令将12 行到14 行的数据都向右移动一个tab.\r\n    :12,24&gt;&gt; 此命令将12 行到14 行的数据都向右移动两个tab.\r\n    那么如何定义tab 的大小呢? 有人愿意使用8 个空格位, 有人用4 个, 有的用2 个.\r\n    有的人希望tab 完全用空格代替, 也有的人希望tab 就是tab. 没关系, vim 能\r\n    帮助你.以下的设置一般也都先写入配置文件中, 免得老敲.\r\n    :set shiftwidth=4 设置自动缩进4 个空格, 当然要设自动缩进先.\r\n    :set sts=4 即设置softtabstop 为4. 输入tab 后就跳了4 格.\r\n    :set tabstop=4 实际的tab 即为4 个空格, 而不是缺省的8 个.\r\n    :set expandtab 在输入tab 后, vim 用恰当的空格来填充这个tab.\r\n    10. autocmd\r\n    这个命令十分的强大, 可以用这个命令实现对不同的文件格式应用不同的配置; 可以\r\n    在新建文件时自动添加上版权声明等等. 这些命令一般定义在~/.vimrc 这样的配置文件\r\n    里面. 由于他很强大, 所以我不能给出很具体的说明, 只能举几个例子, 详细的请看帮助.\r\n    :autocmd! 删除所有之前的自动命令.\r\n    autocmd FileType java source ~/.vim/files/java.vim\r\n    autocmd FileType java source ~/.vim/files/jcommenter.vim\r\n    以上两条命令让我在打开java 文件时才应用后面提到的两个配置文件.\r\n    autocmd BufNewFile *.java 0r ~/.vim/files/skeletons/java.skel\r\n    以上这条命令让我在新建java 文件时自动加入java.skel 文件的内容.\r\n    autocmd BufNewFile *.java normal gnp\r\n    以上这条命令让我在新建java 文件时自动运行gnp 命令, 这个命令进行一些特殊化\r\n    处理, 比如将新java 文件中的__date__ 替换成今天的日期什么的.\r\n    11. 常用脚本\r\n    在vim.sf.net 你可以发现很多脚本(script), 这些脚本常常有让你意想不到的作用.\r\n    我常用的有:\r\n    jcommenter.vim 自动加入javadoc 风格的注释.\r\n    JBrowser.vim 类资源浏览. C, C++ 等可以用Tlist\r\n    还有许多有用的, 比如checkstyle.vim 可以检验你的编程风格, jad.vim 可以直接\r\n    反编译.class 文件等等.\r\n    12. 常用配置\r\n    在~/.vimrc 配置文件中你常常需要一些个性化配置. 比如上面写的一些宏定义, 一些\r\n    autocmd 定义等等. 比如:\r\n    set suffixes=.bak,~,.o,.h,.info,.swp,.aux,.bbl,.blg,.dvi,.lof,.log,.lot,.ps,.toc\r\n    这样在vim 中打开文件时, 按tab 键补齐文件名时它会忽略上述文件.\r\n    set nu 显示行号\r\n    set ai 设置自动缩进\r\n    map Y y$ 让Y 和D 一样, 要不然Y 的本意和yy 一样.\r\n    13. 其他\r\n    还有许多有意思的命令, 记录在这里免得忘记.\r\n    . 重复上次编辑命令.\r\n    :g/^/exec \"s/^/\".strpart(line(\".\").\" \", 0, 4) 在行首插入行号\r\n    :runtime! syntax/2html.vim 转换txt 成html, 会按照你的颜色配置来转 </pre>\r\n<p>\r\n	<br />\r\n</p>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'html' ,`view_count` = '108' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407317885' ,`update_time` = '1407318782' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '34' ,`user_id` = '1' ,`title` = 'mysql的数据类型int、bigint、smallint 和 tinyint取值范围' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '18' ,`special_id` = '0' ,`introduce` = '使用整数数据的精确数字数据类型。      bigint      从 -2^63 (-9223372036854775808) 到 2^63-1 (9223372036854775807) 的整型数据（所有数字）。存储大小为 8 个字节。      int      从 -2^31 (-2,147,483,648) 到 2^31 - 1 (2,147,483,647) 的整型数据（所有数字）。存' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		使用整数数据的精确数字数据类型。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>bigint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^63 (-9223372036854775808) 到 2^63-1 (9223372036854775807) 的整型数据（所有数字）。存储大小为<span>&nbsp;</span><span style=\"color:red;\">8</span><span>&nbsp;</span>个字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>int</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^31 (-2,147,483,648) 到 2^31 - 1 (2,147,483,647) 的整型数据（所有数字）。存储大小为<span>&nbsp;</span><span style=\"color:red;\">4</span><span>&nbsp;</span>个字节。int 的 SQL-92 同义字为 integer。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>smallint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 -2^15 (-32,768) 到 2^15 - 1 (32,767) 的整型数据。存储大小为<span>&nbsp;</span><span style=\"color:red;\">2</span><span>&nbsp;</span>个字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<strong>tinyint</strong>\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		从 0 到 255 的整型数据。存储大小为<span>&nbsp;</span><span style=\"color:red;\">1</span><span>&nbsp;</span>字节。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		注释\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		在支持整数值的地方支持 bigint 数据类型。但是，bigint 用于某些特殊的情况，当整数值超过 int 数据类型支持的范围时，就可以采用 bigint。在 SQL Server 中，int 数据类型是主要的整数数据类型。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		在数据类型优先次序表中，bigint 位于 smallmoney 和 int 之间。\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		<br />\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		只有当参数表达式是 bigint 数据类型时，函数才返回 bigint。SQL Server 不会自动将其它整数数据类型（tinyint、smallint 和 int）提升为 bigint。\r\n	</div>\r\n</div>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'mysql,web,sql' ,`view_count` = '134' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407480402' ,`update_time` = '1407480402' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '35' ,`user_id` = '1' ,`title` = 'Mysql基本用法' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '18' ,`special_id` = '0' ,`introduce` = '#登录数据库   mysql -hlocalhost -uroot -p;   #修改密码   mysqladmin -uroot -pold password new;           #显示数据库   show databases;   #显示数据表   show tables;   #选择数据库   use examples;   #创建数据库并设置编码utf-8 多语言   creat' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '<div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#登录数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mysql -hlocalhost -uroot -p;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改密码\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mysqladmin -uroot -pold<span>&nbsp;</span>password<span>&nbsp;</span>new;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show databases;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示数据表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show tables;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#选择数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		use examples;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建数据库并设置编码utf-8 多语言\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>database<span>&nbsp;</span>`examples`<span>&nbsp;</span>default<span>&nbsp;</span>character<span>&nbsp;</span>set<span>&nbsp;</span>utf8<span>&nbsp;</span>collate<span>&nbsp;</span>utf8_general_ci;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除数据库\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>database<span>&nbsp;</span>examples;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>table<span>&nbsp;</span>test(\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;id<span>&nbsp;</span>int(10) unsigned zerofill<span>&nbsp;</span>not<span>&nbsp;</span>null<span>&nbsp;</span>auto_increment,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;email<span>&nbsp;</span>varchar(40)<span>&nbsp;</span>not<span>&nbsp;</span>null,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;ip<span>&nbsp;</span>varchar(15)<span>&nbsp;</span>not<span>&nbsp;</span>null,\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;state<span>&nbsp;</span>int(10)<span>&nbsp;</span>not<span>&nbsp;</span>null<span>&nbsp;</span>default<span>&nbsp;</span>\'-1\',\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;primary<span>&nbsp;</span>key<span>&nbsp;</span>(id)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		)engine=InnoDB;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#显示表结构\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		describe\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>table<span>&nbsp;</span>test；\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#重命名表\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test_old rename test_new;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#添加列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>add<span>&nbsp;</span>cn<span>&nbsp;</span>int(4)<span>&nbsp;</span>not<span>&nbsp;</span>null;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test change id id1<span>&nbsp;</span>varchar(10)<span>&nbsp;</span>not<span>&nbsp;</span>null;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>drop<span>&nbsp;</span>cn;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#创建索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>(cn,id);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>test<span>&nbsp;</span>drop<span>&nbsp;</span>index<span>&nbsp;</span>cn\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#插入数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		insert<span>&nbsp;</span>into<span>&nbsp;</span>test (id,email,ip,state)<span>&nbsp;</span>values(2,\'qq@qq.com\',\'127.0.0.1\',\'0\');\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#删除数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delete<span>&nbsp;</span>from<span>&nbsp;</span>test<span>&nbsp;</span>where<span>&nbsp;</span>id = 1;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#修改数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		update<span>&nbsp;</span>test<span>&nbsp;</span>set<span>&nbsp;</span>id=\'1\',email=\'q@qq.com\'<span>&nbsp;</span>where<span>&nbsp;</span>id=1;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#查数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test;&nbsp; #取所有数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test limit 0,2;&nbsp; #取前两条数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test email<span>&nbsp;</span>like<span>&nbsp;</span>\'%qq%\'<span>&nbsp;</span>#查含有qq字符 _表示一个 %表示多个\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test<span>&nbsp;</span>order<span>&nbsp;</span>by<span>&nbsp;</span>id<span>&nbsp;</span>asc;#降序desc\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test id<span>&nbsp;</span>not<span>&nbsp;</span>in(\'2\',\'3\');#id不含2,3或者去掉not表示含有\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>test timer<span>&nbsp;</span>between<span>&nbsp;</span>1<span>&nbsp;</span>and<span>&nbsp;</span>10;#数据在1,10之间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#---------------------------表连接知识------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#等值连接又叫内链接<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>只返回两个表中连接字段相等的行\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id; #写法1\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A,B<span>&nbsp;</span>where<span>&nbsp;</span>A.id = B.id; #写法2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>a.id,a.title<span>&nbsp;</span>from<span>&nbsp;</span>A a<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B b<span>&nbsp;</span>on<span>&nbsp;</span>a.id=b.id<span>&nbsp;</span>and<span>&nbsp;</span>a.id=1;#写法3 表的临时名称\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>a.id<span>&nbsp;</span>as<span>&nbsp;</span>ID,a.title<span>&nbsp;</span>as<span>&nbsp;</span>标题<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>inner<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id=B.id;#添加as字句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#左连接又叫外连接<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>返回左表中所有记录和右表中连接字段相等的记录\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>left<span>&nbsp;</span>join<span>&nbsp;</span>(B,C,D)<span>&nbsp;</span>on<span>&nbsp;</span>(B.i1=A.i1<span>&nbsp;</span>and<span>&nbsp;</span>C.i2=A.i2<span>&nbsp;</span>and<span>&nbsp;</span>D.i3 = A.i3);#复杂连接\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#右连接又叫外连接<span>&nbsp;</span>right<span>&nbsp;</span>join<span>&nbsp;</span>返回右表中所有记录和左表中连接字段相等的记录\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>right<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#完整外部链接<span>&nbsp;</span>full<span>&nbsp;</span>join<span>&nbsp;</span>返回左右表中所有数据\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>full<span>&nbsp;</span>join<span>&nbsp;</span>B<span>&nbsp;</span>on<span>&nbsp;</span>A.id = B.id;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#交叉连接 没有where字句 返回卡迪尔积\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>*<span>&nbsp;</span>from<span>&nbsp;</span>A<span>&nbsp;</span>cross<span>&nbsp;</span>join<span>&nbsp;</span>B;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		-------------------------表连接结束------------------------------------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		-----------------索引创建------------------------------------------------\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show<span>&nbsp;</span>index<span>&nbsp;</span>from<span>&nbsp;</span>A #查看索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>primary<span>&nbsp;</span>key(id) #主键索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>unique(name) #唯一索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>name(name) #普通索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>fulltext(name) #全文索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>table<span>&nbsp;</span>A<span>&nbsp;</span>add<span>&nbsp;</span>index<span>&nbsp;</span>name(id,name) #多列索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#常用函数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		abs(-1)#绝对值\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		pi()#pi值\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sqrt(2)#平方根\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		mod(-5,3)#取余-2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ceil(10.6)#进位+1 结果11 ceil(10.0)结果10\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		floor(10.6)#取整 10\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		round(2.5)#四舍五入到整数 结果3\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		round(2.5,2)#保留两位小数 结果2.50\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		truncate(2.5234,3)#取小数后3位不四舍五入 2.523\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sign(-2);#符号函数 返回-1 0还是0 正数返回1\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		pow(2,3),exp(2);#2的3次幂 或e的2次幂\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		log(2),log10(2);#求对数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		radians(180),degrees(0.618);#角度弧度转换\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sin(0.5),asin(0.5)#正弦和反正弦 类似cos acos tan atan\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		length(\'hi\')#计算字符长度\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		concat(\'1\',1,\'hi\')#合并字符串\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		insert(\'12345\',1,0,\'7890\');#从开头第1个字符开始到0个结束，替换成后边字符串，0表示在最前边插入\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ucase(\'a\'),lcase(\'A\')#转成大写和小写\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		left(\'abcd\',2),right(\'abcd\',2);#返回前两个字符和后两个字符\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ltrim(\'&nbsp; 0&nbsp; \'),rtrim(\' 0 \'),trim(\'&nbsp; 0&nbsp; \')#删除空格\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		replace(\'1234567890\',\'345678\',\'0\');#替换输出12090\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		substring(\'12345\',1,2)#取字符 输出12 1是位置 2是长度\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		instr(\'1234\',\'234\');#取得234位置是2\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		reverse(\'1234\');#反序输出4321\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		current()#返回日期\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		curtime()#返回时间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		now()#返回日期时间\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		month(now())#当前月份 monthname 英文月份\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		dayname(now())#星期英文 dayofweek()1是星期天 weekday()1是星期二\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		week(now())#本年第多少周\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		dayofyear(now()),dayofmonth(now())#今天是本年第多少天 今天是本月第多少天\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		year(now()),month(now()),day(now()),hour(now()),minute(now()),second(now())#返回年月日 时分秒\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		time_to_sec(now()),sec_to_time(3600*8);#转换时间为秒和还原\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		version()#mysql版本\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		database()#当前连接的数据库 没有为null\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		user()#获取用户名\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		md5(\'a\')#加密字符串\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		ascii(\'a\')#ascii值97\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		bin(100),hex(100),oct(100)#返回二进制 十六进制 八进制\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		conv(10001,2,8);#各种进制相互转换\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		rand()#生成0到1之间随机数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		sleep(0.02)#暂停秒数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		数据库优化\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.开启缓存，尽量使用php函数而不是mysql\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		. explain<span>&nbsp;</span>select<span>&nbsp;</span>语句可以知道性能\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.一行数据使用 limit 1；\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.为搜索字段重建索引 比如关键字 标签\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.表连接join保证字段类型相同并且有其索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.随机查询使用php $r = mysql_query(\"SELECT count(*) FROM user\");\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$d = mysql_fetch_row($r);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$rand = mt_rand(0,$d[0] - 1);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r = mysql_query(\"SELECT username FROM user LIMIT $rand, 1\");\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.避免使用select<span>&nbsp;</span>* 应该使用具体字段\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.每张表都是用id主键，并且是unsigned<span>&nbsp;</span>int\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.对于取值有限而固定使用enum类型，如性别 国家 名族 部门 状态\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.尽可能使用not<span>&nbsp;</span>null<span>&nbsp;</span>ip存储使用int(4),使用ip 转化函数ip2long()相互long2ip()\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.delete和insert语句会锁表，所以可以采用分拆语句操作\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;&nbsp;&nbsp;&nbsp;while(1){操作语句;usleep(2000);}\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		.选择正确的存储引擎；MyISAM适合大量查询 写操作多用InnoDB支持事务\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#存储程序\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delimiter #定义存储程序\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>procedure<span>&nbsp;</span>getversion(out<span>&nbsp;</span>params<span>&nbsp;</span>varchar(20)) #params是传出参数<span>&nbsp;</span>in传进<span>&nbsp;</span>out传出 inout传回\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		begin\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>version()<span>&nbsp;</span>into<span>&nbsp;</span>params; #版本信息赋值params\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		call getversion(@a); #调用存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>@a;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		delimiter #定义存储函数\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		create<span>&nbsp;</span>function<span>&nbsp;</span>display(w<span>&nbsp;</span>varchar(20))<span>&nbsp;</span>returns<span>&nbsp;</span>varchar(20)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		begin\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		return<span>&nbsp;</span>concat(\'hello\',w);\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select<span>&nbsp;</span>display(\'world\');\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		drop<span>&nbsp;</span>procedure<span>&nbsp;</span>if exists spName; #删除一个存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		alter<span>&nbsp;</span>function<span>&nbsp;</span>spName [];#修改一个存储过程\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		show<span>&nbsp;</span>create<span>&nbsp;</span>procedure<span>&nbsp;</span>spName;#显示存储过程信息\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		declare<span>&nbsp;</span>varName type<span>&nbsp;</span>default<span>&nbsp;</span>value;#声明局部变量\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#if语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		if 条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		elseif 条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		else<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>if\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#case语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		case<span>&nbsp;</span>条件\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		when<span>&nbsp;</span>条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		when<span>&nbsp;</span>条件<span>&nbsp;</span>then<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		else<span>&nbsp;</span>语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>case\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#loop语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		fn:loop\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>loop fn;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		leave fn #退出循环\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#while语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		fn：while 条件 do\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		end<span>&nbsp;</span>while fn\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#mysql使用帮助资料\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? contents; #列出帮助类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? data types;#列出数据类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		？<span>&nbsp;</span>int;#列出具体类型\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		? show;#show语句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		?<span>&nbsp;</span>create<span>&nbsp;</span>table;#\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#常见表的比较\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;Myisam&nbsp;&nbsp; BDB&nbsp;&nbsp;&nbsp; Memory&nbsp;&nbsp;&nbsp; InnoDB&nbsp;&nbsp;&nbsp; Archive\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		存储限制&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 64T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>no\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		事物安全&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		锁机制&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 表锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 页锁&nbsp;&nbsp;&nbsp; 表锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 行锁&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 行锁\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		全文索引&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		外键支持&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		myisam&nbsp; frm存储表定义 MYD存储数据 MYI存储索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		InnoDB 用于事务处理\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		char<span>&nbsp;</span>和<span>&nbsp;</span>varchar保存和索引都不相同\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		浮点数float(10,2) 定点数decimal(10,2)\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		长度一定下，浮点数表示更大数据范围，缺点是引起精度丢失，货币等使用定点数存储\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		索引适合于where字句或者连接字句列\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		对于唯一值使用唯一索引\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		&nbsp;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		添加新用户<span>&nbsp;</span>grant<span>&nbsp;</span>select,insert,update,delete<span>&nbsp;</span>on<span>&nbsp;</span>*.*<span>&nbsp;</span>to<span>&nbsp;</span>Yoby@localhost identified<span>&nbsp;</span>by<span>&nbsp;</span>\'mysql\';\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *.* 数据库名.表名，限制登录某一个数据库 test.*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost是本地主机 网络可以使用<span>&nbsp;</span>\'%\'代替所有主机&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span>\'mysql\'是密码 Yoby是用户名&nbsp; 所有权限可以用<span>&nbsp;</span>all代替\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		查看用户权限 show grants<span>&nbsp;</span>for<span>&nbsp;</span>\'root\'@\'localhost\';\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		移除权限&nbsp;<span>&nbsp;</span>revoke<span>&nbsp;</span>all<span>&nbsp;</span>on<span>&nbsp;</span>*.*<span>&nbsp;</span>from<span>&nbsp;</span>root@localhost;\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		group<span>&nbsp;</span>by<span>&nbsp;</span>id 分组\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		having<span>&nbsp;</span>限制字句\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select1<span>&nbsp;</span>union<span>&nbsp;</span>select2 联合查询有重复去掉保留一行\r\n	</div>\r\n	<div style=\"color:#000000;font-family:Tahoma;font-style:normal;font-weight:normal;text-align:-webkit-auto;font-size:medium;\">\r\n		select2<span>&nbsp;</span>union<span>&nbsp;</span>all<span>&nbsp;</span>select2 所有行合并到结果集中去\r\n	</div>\r\n</div>' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = 'php,mysql,web,sql,myisam,innodb,explain,大数据,存储过程,事物' ,`view_count` = '107' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1407480442' ,`update_time` = '1441718630' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_post` SET `id` = '78' ,`user_id` = '1' ,`title` = 'asdf' ,`title_second` = '' ,`title_style` = '' ,`catalog_id` = '1' ,`special_id` = '2' ,`introduce` = '' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ,`content` = '' ,`copy_from` = '' ,`copy_url` = '' ,`redirect_url` = '' ,`tags` = '' ,`view_count` = '4' ,`commend` = 'N' ,`favorite_count` = '0' ,`attention_count` = '0' ,`top_line` = 'N' ,`reply_count` = '0' ,`reply_allow` = 'Y' ,`sort_order` = '0' ,`status` = 'Y' ,`create_time` = '1441700307' ,`update_time` = '1442299169' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_question`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_question` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_question` SET `id` = '2' ,`user_id` = '66' ,`realname` = '喜之狼_qq' ,`email` = '373106292@qq.com' ,`telephone` = '' ,`qq` = '123212' ,`question` = '上传组件在谷歌下报错，视频上传报错无法选择文件' ,`client_ip` = '124.73.101.106' ,`create_time` = '1411488269' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_question`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_question` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='留言反馈表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_question` SET `id` = '2' ,`user_id` = '66' ,`realname` = '喜之狼_qq' ,`email` = '373106292@qq.com' ,`telephone` = '' ,`qq` = '123212' ,`question` = '上传组件在谷歌下报错，视频上传报错无法选择文件' ,`client_ip` = '124.73.101.106' ,`create_time` = '1411488269' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_recommend`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型 ',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '内容标题',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序(默认从小到大排序)',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='推荐内容表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '3' ,`position_id` = '1' ,`content_id` = '30' ,`type` = '1' ,`title` = '阅读jQuery源代码带给我们的18个惊喜' ,`sort_order` = '0' ,`create_time` = '1444719938' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '4' ,`position_id` = '1' ,`content_id` = '29' ,`type` = '1' ,`title` = 'Yii 框架创建自己的 web 应用' ,`sort_order` = '0' ,`create_time` = '1444719938' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '6' ,`position_id` = '2' ,`content_id` = '7' ,`type` = '2' ,`title` = '靓丽女孩' ,`sort_order` = '0' ,`create_time` = '1444721620' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '7' ,`position_id` = '2' ,`content_id` = '8' ,`type` = '2' ,`title` = '漂亮女神' ,`sort_order` = '0' ,`create_time` = '1444721620' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_recommend`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位id',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐内容id',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '内容类型 ',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '内容标题',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序(默认从小到大排序)',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='推荐内容表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '3' ,`position_id` = '1' ,`content_id` = '30' ,`type` = '1' ,`title` = '阅读jQuery源代码带给我们的18个惊喜' ,`sort_order` = '0' ,`create_time` = '1444719938' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '4' ,`position_id` = '1' ,`content_id` = '29' ,`type` = '1' ,`title` = 'Yii 框架创建自己的 web 应用' ,`sort_order` = '0' ,`create_time` = '1444719938' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '6' ,`position_id` = '2' ,`content_id` = '7' ,`type` = '2' ,`title` = '靓丽女孩' ,`sort_order` = '0' ,`create_time` = '1444721620' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend` SET `id` = '7' ,`position_id` = '2' ,`content_id` = '8' ,`type` = '2' ,`title` = '漂亮女神' ,`sort_order` = '0' ,`create_time` = '1444721620' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_recommend_position`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend_position` SET `id` = '1' ,`title` = '首页资讯推荐' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend_position` SET `id` = '2' ,`title` = '首页图集推荐' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_recommend_position`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_recommend_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend_position` SET `id` = '1' ,`title` = '首页资讯推荐' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_recommend_position` SET `id` = '2' ,`title` = '首页图集推荐' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_reply`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论id',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级回复的id',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '回复内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='评论回复表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '2' ,`user_id` = '1' ,`cid` = '33' ,`reply_id` = '0' ,`content` = '正好五个字' ,`status` = 'Y' ,`create_time` = '1402993685' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '3' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '太没营养了吧 <img src=\"/public/emoticons/images/13.gif\" alt=\"\" border=\"0\" width=\"20\" height=\"20\" title=\"\" align=\"\" /><br />' ,`status` = 'Y' ,`create_time` = '1402997219' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '4' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '<pre class=\"prettyprint lang-php\">  phpinfo();</pre>' ,`status` = 'Y' ,`create_time` = '1402998048' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '5' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '<pre class=\"prettyprint lang-html\">&lt;link type=\"text/css\" rel=\"stylesheet\" href=\"./kindeditor/plugins/code/prettify.css\"/&gt;</pre>' ,`status` = 'Y' ,`create_time` = '1402998870' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '6' ,`user_id` = '1' ,`cid` = '33' ,`reply_id` = '5' ,`content` = '<pre class=\"prettyprint lang-php\">echo \"&lt;pre&gt;\";\r\n\r\necho \"谁说代码不能换行！！\";\r\n\r\n</pre>' ,`status` = 'Y' ,`create_time` = '1403184353' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '7' ,`user_id` = '1' ,`cid` = '41' ,`reply_id` = '0' ,`content` = '嗯 谢谢 支持！&nbsp; 如果您有任何疑问 欢迎在<a target=\"_blank\" href=\"http://bbs.yiifcms.com/\">讨论区</a> 留贴发言！<br />' ,`status` = 'Y' ,`create_time` = '1411434782' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '8' ,`user_id` = '1' ,`cid` = '42' ,`reply_id` = '0' ,`content` = '嗯 之前发现过了 已在1.4版本中修复&nbsp; 可以下载1.4使用 <img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/0.gif\" alt=\"\" border=\"0\" />&nbsp; 如果还有其他疑问 可以详细说明错误的代码 和 错误信息 以便解决问题~~<br />' ,`status` = 'Y' ,`create_time` = '1411520062' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '9' ,`user_id` = '1' ,`cid` = '44' ,`reply_id` = '0' ,`content` = '好像是1.1.4 &nbsp;记不清了 &nbsp;<img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />' ,`status` = 'Y' ,`create_time` = '1414142268' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '10' ,`user_id` = '1' ,`cid` = '45' ,`reply_id` = '0' ,`content` = '嗯 &nbsp;好的 &nbsp;下个版本 会加上 &nbsp;谢谢！<img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/81.gif\" border=\"0\" alt=\"\" />' ,`status` = 'Y' ,`create_time` = '1415513166' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_reply`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论id',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级回复的id',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '回复内容',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '显示状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='评论回复表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '2' ,`user_id` = '1' ,`cid` = '33' ,`reply_id` = '0' ,`content` = '正好五个字' ,`status` = 'Y' ,`create_time` = '1402993685' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '3' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '太没营养了吧 <img src=\"/public/emoticons/images/13.gif\" alt=\"\" border=\"0\" width=\"20\" height=\"20\" title=\"\" align=\"\" /><br />' ,`status` = 'Y' ,`create_time` = '1402997219' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '4' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '<pre class=\"prettyprint lang-php\">  phpinfo();</pre>' ,`status` = 'Y' ,`create_time` = '1402998048' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '5' ,`user_id` = '31' ,`cid` = '33' ,`reply_id` = '2' ,`content` = '<pre class=\"prettyprint lang-html\">&lt;link type=\"text/css\" rel=\"stylesheet\" href=\"./kindeditor/plugins/code/prettify.css\"/&gt;</pre>' ,`status` = 'Y' ,`create_time` = '1402998870' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '6' ,`user_id` = '1' ,`cid` = '33' ,`reply_id` = '5' ,`content` = '<pre class=\"prettyprint lang-php\">echo \"&lt;pre&gt;\";\r\n\r\necho \"谁说代码不能换行！！\";\r\n\r\n</pre>' ,`status` = 'Y' ,`create_time` = '1403184353' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '7' ,`user_id` = '1' ,`cid` = '41' ,`reply_id` = '0' ,`content` = '嗯 谢谢 支持！&nbsp; 如果您有任何疑问 欢迎在<a target=\"_blank\" href=\"http://bbs.yiifcms.com/\">讨论区</a> 留贴发言！<br />' ,`status` = 'Y' ,`create_time` = '1411434782' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '8' ,`user_id` = '1' ,`cid` = '42' ,`reply_id` = '0' ,`content` = '嗯 之前发现过了 已在1.4版本中修复&nbsp; 可以下载1.4使用 <img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/0.gif\" alt=\"\" border=\"0\" />&nbsp; 如果还有其他疑问 可以详细说明错误的代码 和 错误信息 以便解决问题~~<br />' ,`status` = 'Y' ,`create_time` = '1411520062' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '9' ,`user_id` = '1' ,`cid` = '44' ,`reply_id` = '0' ,`content` = '好像是1.1.4 &nbsp;记不清了 &nbsp;<img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />' ,`status` = 'Y' ,`create_time` = '1414142268' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_reply` SET `id` = '10' ,`user_id` = '1' ,`cid` = '45' ,`reply_id` = '0' ,`content` = '嗯 &nbsp;好的 &nbsp;下个版本 会加上 &nbsp;谢谢！<img src=\"http://www.yiifcms.com/assets/f012efd8/plugins/emoticons/images/81.gif\" border=\"0\" alt=\"\" />' ,`status` = 'Y' ,`create_time` = '1415513166' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_setting`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  PRIMARY KEY (`variable`,`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统配置';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_email' ,`value` = 'xb_zjh@126.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_logger' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_telephone' ,`value` = '180000000' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'cache_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'cache_type' ,`value` = 'filecache' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'access' ,`variable` = 'deny_access_ip' ,`value` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'deny_access_ip' ,`value` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'access' ,`variable` = 'deny_register_ip' ,`value` = '193.201.224.*\r\n42.121.43.*' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'deny_register_ip' ,`value` = '193.201.224.*\r\n42.121.43.*' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_active' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_active' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_fromname' ,`value` = 'yiifcms官网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_fromname' ,`value` = 'yiifcms官网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_host' ,`value` = 'smtp.mxhichina.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_host' ,`value` = 'smtp.mxhichina.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_password' ,`value` = 'mima2007' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_password' ,`value` = 'mima2007' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_port' ,`value` = '25' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_port' ,`value` = '25' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_timeout' ,`value` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_timeout' ,`value` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_totest' ,`value` = 'xb_zjh@126.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_totest' ,`value` = '326196998@qq.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_username' ,`value` = 'postmaster@yiifcms.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_username' ,`value` = 'postmaster@yiifcms.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'encrypt' ,`value` = 'crypt' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'safe_str' ,`value` = '!(*&%$$&%%' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_description' ,`value` = 'yiifcms是基于yii框架开发的内容管理系统(CMS)，功能强大，运行高效，稳定安全，是学习php和建站的良好选择。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_keywords' ,`value` = 'yii,cms,php,mysql,nginx,web,开源,下载,手册,系统' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_title' ,`value` = 'yiifcms打造顶级内容管理系统11' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_filecache' ,`value` = 'a:2:{s:5:\"class\";s:10:\"CFileCache\";s:14:\"directoryLevel\";s:1:\"2\";}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_memcache' ,`value` = 'a:3:{s:5:\"class\";s:9:\"CMemCache\";s:4:\"host\";s:9:\"127.0.0.1\";s:4:\"port\";s:5:\"11211\";}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_rediscache' ,`value` = 'a:4:{s:5:\"class\";s:21:\"ext.redis.CRedisCache\";s:4:\"host\";s:9:\"localhost\";s:4:\"port\";s:4:\"6379\";s:8:\"database\";i:0;}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_closed_summary' ,`value` = '系统维护中，请稍候......' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_copyright' ,`value` = 'Copyright @ 2014-2015' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_domain' ,`value` = '/' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_icp' ,`value` = '京ICP备14037201号-1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_name' ,`value` = 'yiifcms打造顶级内容管理系统11' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_stats' ,`value` = '<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id=\'cnzz_stat_icon_1252995560\'%3E%3C/span%3E%3Cscript src=\'\" + cnzz_protocol + \"s95.cnzz.com/stat.php%3Fid%3D1252995560%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E\"));</script>' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_status_intro' ,`value` = '网站目前正在维护，请稍后访问，谢谢....' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'template' ,`variable` = 'template' ,`value` = 'default' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'template' ,`variable` = 'theme' ,`value` = 'default' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_allow_ext' ,`value` = 'jpg,gif,bmp,jpeg,png,doc,zip,rar,gz,7z,txt,sql,pdf,chm' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_max_size' ,`value` = '51200' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_alpha' ,`value` = '50' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_pic' ,`value` = 'public/watermark.png' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_scope' ,`value` = '100x100' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_size' ,`value` = '100x100' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'user_mail_verify' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'user_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_address' ,`value` = '北京市朝阳区1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_fax' ,`value` = '传真:XXXXXX' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_mobile' ,`value` = '180000000' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_telephone' ,`value` = 'XXXXXXXXXXX' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_setting`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_setting` (
  `scope` varchar(30) NOT NULL DEFAULT '' COMMENT '范围',
  `variable` varchar(50) NOT NULL COMMENT '变量',
  `value` text COMMENT '值',
  PRIMARY KEY (`variable`,`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统配置';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_email' ,`value` = 'xb_zjh@126.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_logger' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'admin_telephone' ,`value` = '180000000' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'cache_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'cache_type' ,`value` = 'filecache' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'access' ,`variable` = 'deny_access_ip' ,`value` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'deny_access_ip' ,`value` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'access' ,`variable` = 'deny_register_ip' ,`value` = '193.201.224.*\r\n42.121.43.*' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'deny_register_ip' ,`value` = '193.201.224.*\r\n42.121.43.*' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_active' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_active' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_fromname' ,`value` = 'yiifcms官网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_fromname' ,`value` = 'yiifcms官网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_host' ,`value` = 'smtp.mxhichina.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_host' ,`value` = 'smtp.mxhichina.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_password' ,`value` = 'mima2007' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_password' ,`value` = 'mima2007' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_port' ,`value` = '25' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_port' ,`value` = '25' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_timeout' ,`value` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_timeout' ,`value` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_totest' ,`value` = 'xb_zjh@126.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_totest' ,`value` = '326196998@qq.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'email_username' ,`value` = 'postmaster@yiifcms.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'email' ,`variable` = 'email_username' ,`value` = 'postmaster@yiifcms.com' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'encrypt' ,`value` = 'crypt' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'safe_str' ,`value` = '!(*&%$$&%%' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_description' ,`value` = 'yiifcms是基于yii框架开发的内容管理系统(CMS)，功能强大，运行高效，稳定安全，是学习php和建站的良好选择。' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_keywords' ,`value` = 'yii,cms,php,mysql,nginx,web,开源,下载,手册,系统' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'seo' ,`variable` = 'seo_title' ,`value` = 'yiifcms打造顶级内容管理系统11' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_filecache' ,`value` = 'a:2:{s:5:\"class\";s:10:\"CFileCache\";s:14:\"directoryLevel\";s:1:\"2\";}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_memcache' ,`value` = 'a:3:{s:5:\"class\";s:9:\"CMemCache\";s:4:\"host\";s:9:\"127.0.0.1\";s:4:\"port\";s:5:\"11211\";}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'cache' ,`variable` = 'setting_rediscache' ,`value` = 'a:4:{s:5:\"class\";s:21:\"ext.redis.CRedisCache\";s:4:\"host\";s:9:\"localhost\";s:4:\"port\";s:4:\"6379\";s:8:\"database\";i:0;}' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_closed_summary' ,`value` = '系统维护中，请稍候......' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_copyright' ,`value` = 'Copyright @ 2014-2015' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_domain' ,`value` = '/' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_icp' ,`value` = '京ICP备14037201号-1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_name' ,`value` = 'yiifcms打造顶级内容管理系统11' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_stats' ,`value` = '<script type=\"text/javascript\">var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id=\'cnzz_stat_icon_1252995560\'%3E%3C/span%3E%3Cscript src=\'\" + cnzz_protocol + \"s95.cnzz.com/stat.php%3Fid%3D1252995560%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E\"));</script>' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'site_status_intro' ,`value` = '网站目前正在维护，请稍后访问，谢谢....' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'template' ,`variable` = 'template' ,`value` = 'default' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'template' ,`variable` = 'theme' ,`value` = 'default' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_allow_ext' ,`value` = 'jpg,gif,bmp,jpeg,png,doc,zip,rar,gz,7z,txt,sql,pdf,chm' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_max_size' ,`value` = '51200' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_alpha' ,`value` = '50' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_pic' ,`value` = 'public/watermark.png' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_scope' ,`value` = '100x100' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_size' ,`value` = '100x100' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'upload' ,`variable` = 'upload_water_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'user_mail_verify' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'base' ,`variable` = 'user_status' ,`value` = 'open' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_address' ,`value` = '北京市朝阳区1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_fax' ,`value` = '传真:XXXXXX' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_mobile' ,`value` = '180000000' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_setting` SET `scope` = 'custom' ,`variable` = '_telephone' ,`value` = 'XXXXXXXXXXX' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_soft`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_soft` (
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
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='软件管理表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '5' ,`title` = 'YiifCMS1.2版本安装包' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201407/252fd6459ae.jpg' ,`cover_image` = '' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = 'http://yun.baidu.com/s/1hq67qyK' ,`introduce` = '' ,`content` = '' ,`update_time` = '1407132883' ,`create_time` = '1404715423' ,`view_count` = '48' ,`down_count` = '0' ,`status` = 'N' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'yii,cms' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '6' ,`title` = 'PHP手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/73dfcb3485a.png' ,`cover_image` = 'uploads/images/201408/03997c899d4.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '' ,`content` = '' ,`update_time` = '1408695774' ,`create_time` = '1407122953' ,`view_count` = '214' ,`down_count` = '143' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '7' ,`title` = 'Yii手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/60b1ea65393.jpg' ,`cover_image` = 'uploads/images/201408/967aa8df981.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408697106' ,`create_time` = '1407132737' ,`view_count` = '246' ,`down_count` = '279' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,w3c,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '8' ,`title` = 'smarty完全中文手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/39932dbe29c.png' ,`cover_image` = 'uploads/images/201408/6d084c027a9.png' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695706' ,`create_time` = '1407134329' ,`view_count` = '159' ,`down_count` = '79' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '9' ,`title` = 'php正则表达式手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/ed56bd2b151.png' ,`cover_image` = 'uploads/images/201408/3a66d1eb329.png' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p style=\"text-indent:2em;\"><a target=\"_blank\" href=\"https://www.apachefriends.org/zh_cn/index.html\"><span style=\"font-size:16px;\"><br/></span></a></p><p>相关下载：</p><p><a href=\"http://www.yiifcms.com/so' ,`content` = '' ,`update_time` = '1408695696' ,`create_time` = '1407134780' ,`view_count` = '221' ,`down_count` = '102' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,html,jquery,apache,yii,cms,IT' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '10' ,`title` = 'w3cscholl手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/d03c775d1aa.png' ,`cover_image` = 'uploads/images/201408/ed526c07fda.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695825' ,`create_time` = '1407135406' ,`view_count` = '187' ,`down_count` = '146' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,w3c,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '11' ,`title` = 'jquery1.8.3手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/f3726027223.png' ,`cover_image` = 'uploads/images/201408/4ccb775793b.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695787' ,`create_time` = '1407135653' ,`view_count` = '177' ,`down_count` = '61' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '13' ,`title` = 'YiifCMS1.3版本安装包' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201408/db2fbab86b3.jpg' ,`cover_image` = 'uploads/images/201408/254bbdc7fe7.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = 'http://pan.baidu.com/share/link?shareid=2489134354&uk=2769120659' ,`introduce` = '<p>目前已发布<a title=\"yiifcms 1.4.0 正式版(UTF-8)\" target=\"_self\" href=\"http://www.yiifcms.com/soft/14/\">1.4.0 正式版</a>&nbsp; 修复了1.3中的一些错误 和不完善的功能 请优先下载1.4.0 谢谢支持！<br/></p><p><br/></p><p>相关下载：</p><p><a href=\"' ,`content` = '' ,`update_time` = '1411520181' ,`create_time` = '1407395582' ,`view_count` = '337' ,`down_count` = '477' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,yiifcms,w3c,安装包,下载,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '14' ,`title` = 'yiifcms 1.4.0 正式版(UTF-8)' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201409/a771445ae0b.jpg' ,`cover_image` = 'uploads/images/201409/55ae2ff6811.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p><strong><span style=\"font-size: 16px;\">经过&nbsp;近一个月的改进和完善 最新版本的yiifcms安装包和大家见面了&nbsp;本次更新如下：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><ol class=\"custom_' ,`content` = '' ,`update_time` = '1410327030' ,`create_time` = '1410270534' ,`view_count` = '10690' ,`down_count` = '2022' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'yii,cms,yiifcms,ueditor,IT,安装包,接口,人人网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '15' ,`title` = 'Redis入门指南' ,`catalog_id` = '22' ,`soft_icon` = 'uploads/images/201409/fa51a03c85e.jpg' ,`cover_image` = 'uploads/images/201409/6e40555c313.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<h2 style=\"text-align: left;\">第一章 Redis入门</h2><p>Redis始于一个意大利创业公司Merzia，创始人Salvatore Sanfilippo以及另外一名主要代码贡献者Pieter Noordhuis目前在VMware，全职开发Redis。<a href=\"https://github.com/antirez/redis\" target=\"_blan' ,`content` = '' ,`update_time` = '1411375501' ,`create_time` = '1411374518' ,`view_count` = '131' ,`down_count` = '135' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,mysql,html,js,sql,linux,redis,memcache,服务器,指南' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '16' ,`title` = 'Shell脚本学习指南PDF' ,`catalog_id` = '22' ,`soft_icon` = '/upload/soft/201509/龙猫.jpg' ,`cover_image` = '/upload/soft/201509/caef76094b36acaf250acaf57ed98d1000e99cd4.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>\r\n	<span style=\"font-size:16px;\">前言</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">第1章 背景知识</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">1.1 UNIX简史</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-' ,`content` = '' ,`update_time` = '1441777222' ,`create_time` = '1411375335' ,`view_count` = '133' ,`down_count` = '90' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'web,手册,指南' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '17' ,`title` = 'asdf' ,`catalog_id` = '10' ,`soft_icon` = '' ,`cover_image` = '' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = 'asdf' ,`content` = '' ,`update_time` = '1441778229' ,`create_time` = '1441778229' ,`view_count` = '0' ,`down_count` = '0' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_soft`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_soft` (
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
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='软件管理表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '5' ,`title` = 'YiifCMS1.2版本安装包' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201407/252fd6459ae.jpg' ,`cover_image` = '' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = 'http://yun.baidu.com/s/1hq67qyK' ,`introduce` = '' ,`content` = '' ,`update_time` = '1407132883' ,`create_time` = '1404715423' ,`view_count` = '48' ,`down_count` = '0' ,`status` = 'N' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'yii,cms' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '6' ,`title` = 'PHP手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/73dfcb3485a.png' ,`cover_image` = 'uploads/images/201408/03997c899d4.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '' ,`content` = '' ,`update_time` = '1408695774' ,`create_time` = '1407122953' ,`view_count` = '214' ,`down_count` = '143' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '7' ,`title` = 'Yii手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/60b1ea65393.jpg' ,`cover_image` = 'uploads/images/201408/967aa8df981.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408697106' ,`create_time` = '1407132737' ,`view_count` = '246' ,`down_count` = '279' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,w3c,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '8' ,`title` = 'smarty完全中文手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/39932dbe29c.png' ,`cover_image` = 'uploads/images/201408/6d084c027a9.png' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695706' ,`create_time` = '1407134329' ,`view_count` = '159' ,`down_count` = '79' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '9' ,`title` = 'php正则表达式手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/ed56bd2b151.png' ,`cover_image` = 'uploads/images/201408/3a66d1eb329.png' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p style=\"text-indent:2em;\"><a target=\"_blank\" href=\"https://www.apachefriends.org/zh_cn/index.html\"><span style=\"font-size:16px;\"><br/></span></a></p><p>相关下载：</p><p><a href=\"http://www.yiifcms.com/so' ,`content` = '' ,`update_time` = '1408695696' ,`create_time` = '1407134780' ,`view_count` = '221' ,`down_count` = '102' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,html,jquery,apache,yii,cms,IT' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '10' ,`title` = 'w3cscholl手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/d03c775d1aa.png' ,`cover_image` = 'uploads/images/201408/ed526c07fda.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695825' ,`create_time` = '1407135406' ,`view_count` = '187' ,`down_count` = '146' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,w3c,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '11' ,`title` = 'jquery1.8.3手册' ,`catalog_id` = '19' ,`soft_icon` = 'uploads/images/201408/f3726027223.png' ,`cover_image` = 'uploads/images/201408/4ccb775793b.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>相关下载：</p><p><a href=\"http://www.yiifcms.com/soft/13/\" title=\"YiifCMS1.3版本安装包\" target=\"_blank\">YiifCMS1.3版本安装包</a><br/></p><p><a href=\"http://www.yiifcms.com/soft/11/\" title=\"jquery1.8.3手册\" target=\"' ,`content` = '' ,`update_time` = '1408695787' ,`create_time` = '1407135653' ,`view_count` = '177' ,`down_count` = '61' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,IT,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '13' ,`title` = 'YiifCMS1.3版本安装包' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201408/db2fbab86b3.jpg' ,`cover_image` = 'uploads/images/201408/254bbdc7fe7.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = 'http://pan.baidu.com/share/link?shareid=2489134354&uk=2769120659' ,`introduce` = '<p>目前已发布<a title=\"yiifcms 1.4.0 正式版(UTF-8)\" target=\"_self\" href=\"http://www.yiifcms.com/soft/14/\">1.4.0 正式版</a>&nbsp; 修复了1.3中的一些错误 和不完善的功能 请优先下载1.4.0 谢谢支持！<br/></p><p><br/></p><p>相关下载：</p><p><a href=\"' ,`content` = '' ,`update_time` = '1411520181' ,`create_time` = '1407395582' ,`view_count` = '337' ,`down_count` = '477' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,jquery,yii,cms,yiifcms,w3c,安装包,下载,手册' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '14' ,`title` = 'yiifcms 1.4.0 正式版(UTF-8)' ,`catalog_id` = '11' ,`soft_icon` = 'uploads/images/201409/a771445ae0b.jpg' ,`cover_image` = 'uploads/images/201409/55ae2ff6811.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p><strong><span style=\"font-size: 16px;\">经过&nbsp;近一个月的改进和完善 最新版本的yiifcms安装包和大家见面了&nbsp;本次更新如下：</span></strong></p><p><strong><span style=\"font-size: 16px;\"><br/></span></strong></p><ol class=\"custom_' ,`content` = '' ,`update_time` = '1410327030' ,`create_time` = '1410270534' ,`view_count` = '10690' ,`down_count` = '2022' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'yii,cms,yiifcms,ueditor,IT,安装包,接口,人人网' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '15' ,`title` = 'Redis入门指南' ,`catalog_id` = '22' ,`soft_icon` = 'uploads/images/201409/fa51a03c85e.jpg' ,`cover_image` = 'uploads/images/201409/6e40555c313.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = 'Linux,Win2003,WinXP,Win7,Win8' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<h2 style=\"text-align: left;\">第一章 Redis入门</h2><p>Redis始于一个意大利创业公司Merzia，创始人Salvatore Sanfilippo以及另外一名主要代码贡献者Pieter Noordhuis目前在VMware，全职开发Redis。<a href=\"https://github.com/antirez/redis\" target=\"_blan' ,`content` = '' ,`update_time` = '1411375501' ,`create_time` = '1411374518' ,`view_count` = '131' ,`down_count` = '135' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'php,mysql,html,js,sql,linux,redis,memcache,服务器,指南' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '16' ,`title` = 'Shell脚本学习指南PDF' ,`catalog_id` = '22' ,`soft_icon` = '/upload/soft/201509/龙猫.jpg' ,`cover_image` = '/upload/soft/201509/caef76094b36acaf250acaf57ed98d1000e99cd4.jpg' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = '<p>\r\n	<span style=\"font-size:16px;\">前言</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">第1章 背景知识</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:16px;\">1.1 UNIX简史</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-' ,`content` = '' ,`update_time` = '1441777222' ,`create_time` = '1411375335' ,`view_count` = '133' ,`down_count` = '90' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = 'web,手册,指南' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_soft` SET `id` = '17' ,`title` = 'asdf' ,`catalog_id` = '10' ,`soft_icon` = '' ,`cover_image` = '' ,`soft_file` = '' ,`language` = 'zh_cn' ,`softtype` = 'domestic' ,`os` = '' ,`softrank` = '5' ,`softsize` = '' ,`softlink` = '' ,`introduce` = 'asdf' ,`content` = '' ,`update_time` = '1441778229' ,`create_time` = '1441778229' ,`view_count` = '0' ,`down_count` = '0' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_special`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_special` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='专题';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_special` SET `id` = '1' ,`title` = '专题二' ,`introduce` = '美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有谷歌(微博)和多家汽车厂商的无人驾驶汽车市场的争夺之中' ,`img_cover` = 'uploads/thumbs/201403/small_8e9e89a2e6a.png' ,`img_banner` = 'uploads/images/201403/8e9e89a2e6a.png' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`status` = 'Y' ,`sort_order` = '0' ,`create_time` = '1379547110' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_special` SET `id` = '2' ,`title` = '专题一' ,`introduce` = '是的发送到' ,`img_cover` = '/upload/special/201509/37714fd37ff.png' ,`img_banner` = '/upload/special/201509/59d311bb8a7.jpg' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`status` = 'Y' ,`sort_order` = '0' ,`create_time` = '1379547152' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_special`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_special` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='专题';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_special` SET `id` = '1' ,`title` = '专题二' ,`introduce` = '美国特斯拉电动汽车公司（Tesla Motors）首席执行官艾伦•马斯克（Elon Musk）周二表示，该公司力争在未来三年里推出能够“自动驾驶”的汽车，从而正式加入到拥有谷歌(微博)和多家汽车厂商的无人驾驶汽车市场的争夺之中' ,`img_cover` = 'uploads/thumbs/201403/small_8e9e89a2e6a.png' ,`img_banner` = 'uploads/images/201403/8e9e89a2e6a.png' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`status` = 'Y' ,`sort_order` = '0' ,`create_time` = '1379547110' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_special` SET `id` = '2' ,`title` = '专题一' ,`introduce` = '是的发送到' ,`img_cover` = '/upload/special/201509/37714fd37ff.png' ,`img_banner` = '/upload/special/201509/59d311bb8a7.jpg' ,`seo_title` = '' ,`seo_keywords` = '' ,`seo_description` = '' ,`status` = 'Y' ,`sort_order` = '0' ,`create_time` = '1379547152' ,`update_time` = '0' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_tag`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`),
  KEY `data_count` (`data_count`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COMMENT='新闻标签';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '77' ,`tag_name` = 'web' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '78' ,`tag_name` = 'yii' ,`data_count` = '9' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '79' ,`tag_name` = 'php' ,`data_count` = '13' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '80' ,`tag_name` = 'js' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '81' ,`tag_name` = 'jquery' ,`data_count` = '7' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '82' ,`tag_name` = 'mysql' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '83' ,`tag_name` = 'html' ,`data_count` = '5' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '84' ,`tag_name` = 'sql' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '85' ,`tag_name` = 'apache' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '86' ,`tag_name` = 'nginx' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '87' ,`tag_name` = '文章' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '88' ,`tag_name` = 'cms' ,`data_count` = '9' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '91' ,`tag_name` = '接口' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '92' ,`tag_name` = '人人网' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '93' ,`tag_name` = 'ueditor' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '95' ,`tag_name` = 'IT' ,`data_count` = '7' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '96' ,`tag_name` = 'linux' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '97' ,`tag_name` = '服务器' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '98' ,`tag_name` = '手册' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '99' ,`tag_name` = 'w3c' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '100' ,`tag_name` = 'yiifcms' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '101' ,`tag_name` = '安装包' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '103' ,`tag_name` = '下载' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '104' ,`tag_name` = 'redis' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '105' ,`tag_name` = 'memcache' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '106' ,`tag_name` = '指南' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '107' ,`tag_name` = 'myisam' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '108' ,`tag_name` = 'innodb' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '110' ,`tag_name` = '存储过程' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '111' ,`tag_name` = '事物' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '113' ,`tag_name` = '索引' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '114' ,`tag_name` = 'explain' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '117' ,`tag_name` = '大数据' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_tag`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL COMMENT 'tag名称',
  `data_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据总数',
  PRIMARY KEY (`id`),
  KEY `data_count` (`data_count`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COMMENT='新闻标签';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '77' ,`tag_name` = 'web' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '78' ,`tag_name` = 'yii' ,`data_count` = '9' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '79' ,`tag_name` = 'php' ,`data_count` = '13' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '80' ,`tag_name` = 'js' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '81' ,`tag_name` = 'jquery' ,`data_count` = '7' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '82' ,`tag_name` = 'mysql' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '83' ,`tag_name` = 'html' ,`data_count` = '5' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '84' ,`tag_name` = 'sql' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '85' ,`tag_name` = 'apache' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '86' ,`tag_name` = 'nginx' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '87' ,`tag_name` = '文章' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '88' ,`tag_name` = 'cms' ,`data_count` = '9' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '91' ,`tag_name` = '接口' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '92' ,`tag_name` = '人人网' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '93' ,`tag_name` = 'ueditor' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '95' ,`tag_name` = 'IT' ,`data_count` = '7' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '96' ,`tag_name` = 'linux' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '97' ,`tag_name` = '服务器' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '98' ,`tag_name` = '手册' ,`data_count` = '6' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '99' ,`tag_name` = 'w3c' ,`data_count` = '3' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '100' ,`tag_name` = 'yiifcms' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '101' ,`tag_name` = '安装包' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '103' ,`tag_name` = '下载' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '104' ,`tag_name` = 'redis' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '105' ,`tag_name` = 'memcache' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '106' ,`tag_name` = '指南' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '107' ,`tag_name` = 'myisam' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '108' ,`tag_name` = 'innodb' ,`data_count` = '2' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '110' ,`tag_name` = '存储过程' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '111' ,`tag_name` = '事物' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '113' ,`tag_name` = '索引' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '114' ,`tag_name` = 'explain' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag` SET `id` = '117' ,`tag_name` = '大数据' ,`data_count` = '1' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_tag_data`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '68' ,`content_id` = '2' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '16' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '6' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '46' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '51' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '67' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '70' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '71' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '72' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '57' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '48' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '50' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '58' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '60' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '63' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_tag_data`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '68' ,`content_id` = '2' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '16' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '6' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '46' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '51' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '67' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '70' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '71' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '72' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '57' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '48' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '50' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '58' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '60' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '63' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '64' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '65' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '66' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '69' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '32' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '33' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '52' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '72' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '48' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '50' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '58' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '60' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '63' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '64' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '65' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '66' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '69' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '43' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '32' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '61' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '62' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '67' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '89' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '89' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '90' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '91' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '91' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '94' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_tag_data`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_tag_data` (
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '栏目类型',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '是否显示',
  PRIMARY KEY (`tag_id`,`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容标签关联表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '68' ,`content_id` = '2' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '16' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '77' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '78' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '6' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '39' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '46' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '51' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '67' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '70' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '71' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '79' ,`content_id` = '72' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '57' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '80' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '30' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '81' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '48' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '50' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '58' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '60' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '63' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '64' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '65' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '66' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '82' ,`content_id` = '69' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '32' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '33' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '52' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '83' ,`content_id` = '72' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '15' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '17' ,`type` = '2' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '34' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '35' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '48' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '50' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '58' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '60' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '63' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '64' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '65' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '66' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '84' ,`content_id` = '69' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '31' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '43' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '47' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '85' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '32' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '56' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '61' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '86' ,`content_id` = '62' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '87' ,`content_id` = '67' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '36' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '40' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '44' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '53' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '54' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '88' ,`content_id` = '59' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '89' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '89' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '90' ,`content_id` = '37' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '91' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '91' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '38' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '92' ,`content_id` = '45' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '93' ,`content_id` = '42' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '94' ,`content_id` = '41' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '7' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '8' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '9' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '10' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '11' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '12' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '13' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '14' ,`type` = '3' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_tag_data` SET `tag_id` = '95' ,`content_id` = '29' ,`type` = '1' ,`status` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_user`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '1' ,`username` = 'zjh_admin' ,`password` = '$2a$08$prWSKt8Hkfd.NNXMbdyYxuWEWkRdUiykiSKPnJ6TjWEA8A7dBlROy' ,`email` = 'xb_zjh@126.com' ,`groupid` = '10' ,`status` = '1' ,`addtime` = '1404712097' ,`avatar` = '' ,`nickname` = '惜暮(Sim)' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '127.0.0.1' ,`logins` = '33' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '2' ,`username` = '没那么简单' ,`password` = '$2a$08$7XNWXLQfsDE3JNDDb2x/V.JLjeOtfCJIRmt.akQ5aBMf4jwAvFhR.' ,`email` = '376685457@qq.com' ,`groupid` = '9' ,`status` = '1' ,`addtime` = '1379091600' ,`avatar` = 'uploads/avatar/201407/small_2_cc2e86cc790.jpg' ,`nickname` = '' ,`sign` = '' ,`web` = 'http://www.yiifcms.com' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '42.121.43.140' ,`logins` = '8' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '37' ,`username` = 'shiyang' ,`password` = '$2a$08$3kBOQjtnf8HQ0clqG986qeB.OzdT/84sMk6DbgY8a.kllKsfCxS6G' ,`email` = '894046126@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407477193' ,`avatar` = '' ,`nickname` = 'shiyang' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '171.108.188.44' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '47' ,`username` = 'Ps冷眸_涵_sinawb' ,`password` = '$2a$08$vW5x/dtt17iAGNg0WIBue.MDEQZPeQ6CQrWSqZR0irHc382HKXoYG' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407834268' ,`avatar` = 'http://tp2.sinaimg.cn/1503697997/180/1288014406/1' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '118.186.156.246' ,`logins` = '24' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '48' ,`username` = '总攻_qq' ,`password` = '$2a$08$.zu6XdeD4ugOtxjByW8eWupG0LC0G29Fw6VMKbnxWr1DjW/.v.PXG' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407903794' ,`avatar` = 'http://qzapp.qlogo.cn/qzapp/101145243/2CA62C4C3E44055483E2E5786702DC9A/100' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '182.131.19.96' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '49' ,`username` = '咚咚锵锵的蝎子_sinawb' ,`password` = '$2a$08$J5NcHu/4qbJhuwFT4D9wFeyXn.2zDQWbWf0if9dxaJVv2Bhhr9cFO' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407919844' ,`avatar` = 'http://tp4.sinaimg.cn/5244883271/180/0/1' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.202.209.114' ,`logins` = '15' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '50' ,`username` = '夏至未至lover要开心_sinawb' ,`password` = '$2a$08$BtbYaALP4XE4DYl2K8k.dedfPduHorL3lG0wTHdSOxKEHPhKj9dKa' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407934979' ,`avatar` = '' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.202.209.114' ,`logins` = '3' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '51' ,`username` = '赵金涵_renren' ,`password` = '$2a$08$BnxiM2MbrOoJjvICyjodi.F0Pbyr4/1RrNrSQzJANT2nxa6THhR96' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1408075304' ,`avatar` = 'http://hd201.xiaonei.com/photos/hd201/20081102/15/10/head_2eUN_4977f198169.jpg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '118.186.156.246' ,`logins` = '14' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '52' ,`username` = 'Gavin_qq' ,`password` = '$2a$08$NijA8Kyvl/nc..ruhiIRm.7dPDIqidlPFCeCEmKda4avAGh3Y/Z4O' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1409563389' ,`avatar` = 'http://qzapp.qlogo.cn/qzapp/101145243/D8BD3F07EE239BBF57BA6B88F28624C5/100' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '140.206.82.242' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '53' ,`username` = '333333' ,`password` = '$2a$08$bn/7UL0jlUD135YurE3BMuytmeHw5.XXAWS71Zw8uczqnKVtR/HlW' ,`email` = 'soueovip@126.com' ,`groupid` = '1' ,`status` = '0' ,`addtime` = '1409802818' ,`avatar` = '' ,`nickname` = '333333' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '182.18.56.74' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '58' ,`username` = '哎哟猪呀★_qq' ,`password` = '$2a$08$cx6ZckTf5AePwFr87wyJWuCCRAOD56jncZA7MxbgjD24MaxdxOMaK' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410325939' ,`avatar` = 'uploads/avatar/20140910/small_58_c6e255b94e1.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '49.4.177.106' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '59' ,`username` = 'joezone' ,`password` = '$2a$08$43ayuaPXAkNYz8O6A/lLteQlvRsEWjEcLOyPxtXhj12mY6iZgpYx6' ,`email` = '19434202@qq.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1410340296' ,`avatar` = '' ,`nickname` = 'joezone' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '64' ,`username` = '没那么就爱你' ,`password` = '$2a$08$iK5sCK/2T.SAgqrT.TiG1e9oLJPKT.RBNC3F4Pz2knYGDu7ARuyEe' ,`email` = '326196998@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410356130' ,`avatar` = '' ,`nickname` = '没那么就爱你' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '65' ,`username` = '杨长青_qq' ,`password` = '$2a$08$c16otKfcc.OjqqX3aKIgEO2XWRxkixDGnuHHBQ9cxrAKlFSGuv7Hi' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410916577' ,`avatar` = 'uploads/avatar/201409/small_65_2a325249494.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '222.48.22.43' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '66' ,`username` = '喜之狼_qq' ,`password` = '$2a$08$RtjwipYrvgSuHKvBhN.rEOPSiUDqkaPJgiGDJrB0z/xO/.G6hXV52' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1411172114' ,`avatar` = 'uploads/avatar/201409/small_66_ea4ff4dff47.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '114.97.117.208' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '67' ,`username` = 'ikensz' ,`password` = '$2a$08$1UD4B83hv9ufbl4TdH3eAuJhUChaHD.C5IfGbMYUXNvehH0B1JHty' ,`email` = '1037269762@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1411391177' ,`avatar` = '' ,`nickname` = 'ikensz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.125.66.71' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '68' ,`username` = 'chj027' ,`password` = '$2a$08$.Eh.tYVVkJw580HyC7qvS.N1Fg.W.XJwRq.C6bSeVEWmyRNXTiV7G' ,`email` = 'hjun027@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1411478512' ,`avatar` = '' ,`nickname` = 'chj027' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '36.47.3.100' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '69' ,`username` = '没那么简单_qq' ,`password` = '$2a$08$qDYB6baio5flVbn/nn9Q1OxILKnMMW5xALpkHLhY8ToaoJx/hfKjm' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412755729' ,`avatar` = 'uploads/avatar/201410/small_69_7f0b77e4b4a.png' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '106.120.178.234' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '70' ,`username` = '十月八日_qq' ,`password` = '$2a$08$GAV7cFSS3k.6MQicyDZg5u7y1Iy/vxLQnAXnSKNki/4bZoXCESnrO' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412782171' ,`avatar` = 'uploads/avatar/201410/small_70_ca7dd9d9476.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '123.129.99.207' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '71' ,`username` = 'admin,' ,`password` = '$2a$08$n4vxPZmwkrWGQIWjd1V62OhhiCi.jB.hC0YpWSPmWy8aevkwOj6/e' ,`email` = '345397843@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412830460' ,`avatar` = '' ,`nickname` = 'admin,' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '115.235.3.195' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '72' ,`username` = '改变的路上_sinawb' ,`password` = '$2a$08$zbCGGsHEfZDCwW2uJch7lOw7xk3KKtAtUvFdwPlILkAOS1.xlfOvS' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412842813' ,`avatar` = 'uploads/avatar/201410/small_72_2b387ebb7b2.gif' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.160.66.130' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '73' ,`username` = ' 懷戀濄呿_qq' ,`password` = '$2a$08$5rb74rkjrbI9Qig36E152.AaSAJghAffe6pYHvAoo4ymyuly1k5iy' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412855328' ,`avatar` = 'uploads/avatar/201410/small_73_92d42ac91f3.png' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.3.233.115' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '74' ,`username` = 'dyeing' ,`password` = '$2a$08$DUxhPzMV6iLvVdEnK7woUuHrrGIt3dfQncpLK0NH//Hqtd.B5iUTO' ,`email` = '2448290642@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412906444' ,`avatar` = '' ,`nickname` = 'dyeing' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '119.130.112.58' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '75' ,`username` = 'hqs198' ,`password` = '$2a$08$.8/YpvPdxO2KxEijBwnDhe53Jet1PY9sz2yNQI69X9u2LmhpC2HCK' ,`email` = 'hqs198@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1413360466' ,`avatar` = '' ,`nickname` = 'hqs198' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.125.229.184' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '76' ,`username` = 'jkoxepmmb' ,`password` = '$2a$08$XkBX3mzrguBUTY8lJzwimeOgT/YWjeXLUqPHRfRgzZ1Z7/kgk82DW' ,`email` = 'isabelle@sklepsante.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1413371925' ,`avatar` = '' ,`nickname` = 'jkoxepmmb' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '91.207.7.178' ,`logins` = '12' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '77' ,`username` = '茹憶_qq' ,`password` = '$2a$08$id8h1PUVFz8TiAMwqhxi8eOJqJXEnlsugdArahNevAFJWqqPTXR8m' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1413516456' ,`avatar` = 'uploads/avatar/201410/small_77_e9568b833bf.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '203.110.175.179' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '78' ,`username` = 'lijing' ,`password` = '$2a$08$ihTmGVETBC4K2FPji7UgkeSgCsm0rQQC1AQ3Xqb3m00iztNtuICGa' ,`email` = 'lvke0918@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1413526280' ,`avatar` = '' ,`nickname` = 'lijing' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '219.142.111.90' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '79' ,`username` = 'realljt' ,`password` = '$2a$08$xtllL7cwPJrFTlzj3O5YbOuHIG4a1SahU7/JhGHhduI0wnNPJgbOG' ,`email` = '40645846@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1414654427' ,`avatar` = '' ,`nickname` = 'realljt' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '121.33.237.154' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '80' ,`username` = 'beidaole' ,`password` = '$2a$08$sU6Ii03XJM1UpTu0YnJoV.33p7cJrMkYqSYz7bPv9lozPpFKsvlU2' ,`email` = 'beidaole@126.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1414680743' ,`avatar` = '' ,`nickname` = 'beidaole' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.25.234.136' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '81' ,`username` = 'ibesideu' ,`password` = '$2a$08$oEo5Q3K.BCHUve6V4N1/Hu.GVfbHEkdnZctYE5XvI60U04jumFVj6' ,`email` = 'xiaks@live.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1415198680' ,`avatar` = '' ,`nickname` = 'ibesideu' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '211.161.249.170' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '82' ,`username` = 'agot1251' ,`password` = '$2a$08$OBz5HNwcFD3SsGOt839MyejqICO64RITxjpUIWNtewMzk8ox.Xbra' ,`email` = 'cagnot@163.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1415278997' ,`avatar` = '' ,`nickname` = 'agot1251' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.177.136.31' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '83' ,`username` = 'L_qq' ,`password` = '$2a$08$7QmScA6VMPRwbcU7pL2dR.jztvQSF8eC.pekykbO.K5diTvaDr4fC' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1415324976' ,`avatar` = 'uploads/avatar/201411/small_83_31290ec1103.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.250.3.57' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '84' ,`username` = 'zidjdznfp' ,`password` = '$2a$08$ZTMeiNTHgf9wdp94LTxLaOZBzz/05GLqMweFeHkrhDSRvuIXi8urW' ,`email` = 'kristina@thehosh.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1415424102' ,`avatar` = '' ,`nickname` = 'zidjdznfp' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '42.121.43.143' ,`logins` = '134' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '85' ,`username` = 'Quenteenfix_sinawb' ,`password` = '$2a$08$1bV8QsW9Dr18Bd4LeGDF7OlSR.NZCf3R.S9QgYYytQIlYA0AG2882' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416036953' ,`avatar` = 'uploads/avatar/201411/small_85_147a40599a1.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '114.92.126.217' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '86' ,`username` = 'wanyuan' ,`password` = '$2a$08$wnTFb6omvX/Bfu.ITkRZm.77AnYiTcWZPSqC5C3ZTirK0sI2T5N6W' ,`email` = '1929662320@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416118964' ,`avatar` = '' ,`nickname` = 'wanyuan' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '111.173.23.153' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '87' ,`username` = '老边_qq' ,`password` = '$2a$08$9kFo67NL09OOW7wKx/pc0ORK01cHh7jklnwz6OlgDmgxuYv9dck6y' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416185508' ,`avatar` = 'uploads/avatar/201411/small_87_829520940af.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '218.61.232.28' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '88' ,`username` = '笨小孩_qq' ,`password` = '$2a$08$vNz2mYSQOz5OHyW2g5QN3.bdOpHi37aQI89lhbQR5MRXUv5Gg/frS' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416216063' ,`avatar` = 'uploads/avatar/201411/small_88_8a70bd55a44.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '221.179.161.83' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '89' ,`username` = '`¤onlEy^囿_qq' ,`password` = '$2a$08$v8Ay7oV7n6jNrllut9j3T.0ZeG768m4UQYBE5aJ/mYZnTopgEFDZ.' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416216361' ,`avatar` = 'uploads/avatar/201411/small_89_4795a3cd1c5.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.193.174.218' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '90' ,`username` = 'PetaXsi' ,`password` = '$2a$08$W1B.vafjBX66o4YXaNLxfOdc0CboMBLftGYWgypMQNP0OOLDpzPhe' ,`email` = 'stnoubwfou@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1416229826' ,`avatar` = '' ,`nickname` = 'PetaXsi' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '69.30.230.34' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '110' ,`username` = 'ad12345' ,`password` = '$2a$08$1EANZpWwNVrMs8i3YYtj9OlXALqDFIaqu99.NPkdERvEdwFCDgE1e' ,`email` = '387908659@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1418372197' ,`avatar` = '' ,`nickname` = 'ad12345' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '111' ,`username` = 'ad54321' ,`password` = '$2a$08$H5BZCQbToUHE95I1xV7QMecQ80AqHrWsKqU8TPZGIBNFuRg2RTKLa' ,`email` = 'hui387908659@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418372399' ,`avatar` = '' ,`nickname` = 'ad54321' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '141' ,`username` = '如何让我遇见你_qq' ,`password` = '$2a$08$TyoZCDWHYxc06w7gx.ucvucvNG/TRYzLO.eo.PQ7gO/7M.Sv3/cUe' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1418629154' ,`avatar` = 'uploads/avatar/201412/small_141_cc66b09a5ba.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '221.13.140.5' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '147' ,`username` = 'tdvebhyskz' ,`password` = '$2a$08$062rTLfaanR/HReH118KPuMfqnCTaS/.3Zso2X.bN/XxG6h.GMl9e' ,`email` = 'stretchihumy+KscKL@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418735332' ,`avatar` = '' ,`nickname` = 'tdvebhyskz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.142' ,`last_login_ip` = '42.121.43.142' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '148' ,`username` = 'epktcqigqz' ,`password` = '$2a$08$W7rlONIe6kEGAqugGBbGTOZUb/o0.zF1vQIAXZZ4QTX4gIGmLYqZi' ,`email` = 'stretchihumy+3H5oI@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418737440' ,`avatar` = '' ,`nickname` = 'epktcqigqz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.140' ,`last_login_ip` = '42.121.43.140' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '149' ,`username` = 'jgklyhzhsf' ,`password` = '$2a$08$9AivfuK1vz9nWDqsVNk3KeRnBfHvaTO/Mwd6caf8pFBmrJl0m0A92' ,`email` = 'pivotalwgkle+7ns9a@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418741936' ,`avatar` = '' ,`nickname` = 'jgklyhzhsf' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.142' ,`last_login_ip` = '42.121.43.142' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '150' ,`username` = 'lkbsejlolo' ,`password` = '$2a$08$RWpIYz6gRGIMmdAHKpEkMeaArzbzXiC7jOfkHHxYhEpUaw1ELcPoW' ,`email` = 'pivotalwgkle+Oh1u9@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418744569' ,`avatar` = '' ,`nickname` = 'lkbsejlolo' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.136' ,`last_login_ip` = '42.121.43.136' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '151' ,`username` = 'jzecvrzihh' ,`password` = '$2a$08$IionD9BA/8w3.gjelbegGO239ggvE26Yvcwa562O5xbLuvmFr/tdm' ,`email` = 'composedmwoa+jDD89@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745010' ,`avatar` = '' ,`nickname` = 'jzecvrzihh' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.137' ,`last_login_ip` = '42.121.43.137' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '152' ,`username` = 'babswxfprm' ,`password` = '$2a$08$vHvCeWqRY/FOA8HOBoVIpejMBLah8XA0Wo/F4R8OuHLsu013hlJ4K' ,`email` = 'accompanyukbix+885rg@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745441' ,`avatar` = '' ,`nickname` = 'babswxfprm' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.138' ,`last_login_ip` = '42.121.43.138' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '153' ,`username` = 'djtbgdfbft' ,`password` = '$2a$08$xV0sJ8rjiL9E5aRcs/tEcurq1RCI96ZyJladubHxBMgUCrCNU1i5.' ,`email` = 'pivotalwgkle+oan2y@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745543' ,`avatar` = '' ,`nickname` = 'djtbgdfbft' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.138' ,`last_login_ip` = '42.121.43.138' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '154' ,`username` = 'egxlvzssow' ,`password` = '$2a$08$VEsNibbtnYka4gogFU2ymOs1BUlvXJb5DAFIFdmA6BxfOTdDthbpC' ,`email` = 'composedmwoa+y59I5@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745867' ,`avatar` = '' ,`nickname` = 'egxlvzssow' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.140' ,`last_login_ip` = '42.121.43.140' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '159' ,`username` = 'asdf' ,`password` = '$2a$08$KgR5Juo2J4Oxl9LUDhk7R.hJvLmw.RDG1FCcvrbvGCh320uINvp5y' ,`email` = 'asdf' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1442304565' ,`avatar` = '' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '0.0.0.0' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_user`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1 COMMENT='用户表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '1' ,`username` = 'zjh_admin' ,`password` = '$2a$08$prWSKt8Hkfd.NNXMbdyYxuWEWkRdUiykiSKPnJ6TjWEA8A7dBlROy' ,`email` = 'xb_zjh@126.com' ,`groupid` = '10' ,`status` = '1' ,`addtime` = '1404712097' ,`avatar` = '' ,`nickname` = '惜暮(Sim)' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '127.0.0.1' ,`logins` = '33' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '2' ,`username` = '没那么简单' ,`password` = '$2a$08$7XNWXLQfsDE3JNDDb2x/V.JLjeOtfCJIRmt.akQ5aBMf4jwAvFhR.' ,`email` = '376685457@qq.com' ,`groupid` = '9' ,`status` = '1' ,`addtime` = '1379091600' ,`avatar` = 'uploads/avatar/201407/small_2_cc2e86cc790.jpg' ,`nickname` = '' ,`sign` = '' ,`web` = 'http://www.yiifcms.com' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '42.121.43.140' ,`logins` = '8' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '37' ,`username` = 'shiyang' ,`password` = '$2a$08$3kBOQjtnf8HQ0clqG986qeB.OzdT/84sMk6DbgY8a.kllKsfCxS6G' ,`email` = '894046126@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407477193' ,`avatar` = '' ,`nickname` = 'shiyang' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '171.108.188.44' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '47' ,`username` = 'Ps冷眸_涵_sinawb' ,`password` = '$2a$08$vW5x/dtt17iAGNg0WIBue.MDEQZPeQ6CQrWSqZR0irHc382HKXoYG' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407834268' ,`avatar` = 'http://tp2.sinaimg.cn/1503697997/180/1288014406/1' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '118.186.156.246' ,`logins` = '24' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '48' ,`username` = '总攻_qq' ,`password` = '$2a$08$.zu6XdeD4ugOtxjByW8eWupG0LC0G29Fw6VMKbnxWr1DjW/.v.PXG' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407903794' ,`avatar` = 'http://qzapp.qlogo.cn/qzapp/101145243/2CA62C4C3E44055483E2E5786702DC9A/100' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '182.131.19.96' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '49' ,`username` = '咚咚锵锵的蝎子_sinawb' ,`password` = '$2a$08$J5NcHu/4qbJhuwFT4D9wFeyXn.2zDQWbWf0if9dxaJVv2Bhhr9cFO' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407919844' ,`avatar` = 'http://tp4.sinaimg.cn/5244883271/180/0/1' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.202.209.114' ,`logins` = '15' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '50' ,`username` = '夏至未至lover要开心_sinawb' ,`password` = '$2a$08$BtbYaALP4XE4DYl2K8k.dedfPduHorL3lG0wTHdSOxKEHPhKj9dKa' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1407934979' ,`avatar` = '' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.202.209.114' ,`logins` = '3' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '51' ,`username` = '赵金涵_renren' ,`password` = '$2a$08$BnxiM2MbrOoJjvICyjodi.F0Pbyr4/1RrNrSQzJANT2nxa6THhR96' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1408075304' ,`avatar` = 'http://hd201.xiaonei.com/photos/hd201/20081102/15/10/head_2eUN_4977f198169.jpg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '118.186.156.246' ,`logins` = '14' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '52' ,`username` = 'Gavin_qq' ,`password` = '$2a$08$NijA8Kyvl/nc..ruhiIRm.7dPDIqidlPFCeCEmKda4avAGh3Y/Z4O' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1409563389' ,`avatar` = 'http://qzapp.qlogo.cn/qzapp/101145243/D8BD3F07EE239BBF57BA6B88F28624C5/100' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '140.206.82.242' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '53' ,`username` = '333333' ,`password` = '$2a$08$bn/7UL0jlUD135YurE3BMuytmeHw5.XXAWS71Zw8uczqnKVtR/HlW' ,`email` = 'soueovip@126.com' ,`groupid` = '1' ,`status` = '0' ,`addtime` = '1409802818' ,`avatar` = '' ,`nickname` = '333333' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '182.18.56.74' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '58' ,`username` = '哎哟猪呀★_qq' ,`password` = '$2a$08$cx6ZckTf5AePwFr87wyJWuCCRAOD56jncZA7MxbgjD24MaxdxOMaK' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410325939' ,`avatar` = 'uploads/avatar/20140910/small_58_c6e255b94e1.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '49.4.177.106' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '59' ,`username` = 'joezone' ,`password` = '$2a$08$43ayuaPXAkNYz8O6A/lLteQlvRsEWjEcLOyPxtXhj12mY6iZgpYx6' ,`email` = '19434202@qq.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1410340296' ,`avatar` = '' ,`nickname` = 'joezone' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '64' ,`username` = '没那么就爱你' ,`password` = '$2a$08$iK5sCK/2T.SAgqrT.TiG1e9oLJPKT.RBNC3F4Pz2knYGDu7ARuyEe' ,`email` = '326196998@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410356130' ,`avatar` = '' ,`nickname` = '没那么就爱你' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '65' ,`username` = '杨长青_qq' ,`password` = '$2a$08$c16otKfcc.OjqqX3aKIgEO2XWRxkixDGnuHHBQ9cxrAKlFSGuv7Hi' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1410916577' ,`avatar` = 'uploads/avatar/201409/small_65_2a325249494.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '222.48.22.43' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '66' ,`username` = '喜之狼_qq' ,`password` = '$2a$08$RtjwipYrvgSuHKvBhN.rEOPSiUDqkaPJgiGDJrB0z/xO/.G6hXV52' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1411172114' ,`avatar` = 'uploads/avatar/201409/small_66_ea4ff4dff47.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '114.97.117.208' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '67' ,`username` = 'ikensz' ,`password` = '$2a$08$1UD4B83hv9ufbl4TdH3eAuJhUChaHD.C5IfGbMYUXNvehH0B1JHty' ,`email` = '1037269762@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1411391177' ,`avatar` = '' ,`nickname` = 'ikensz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.125.66.71' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '68' ,`username` = 'chj027' ,`password` = '$2a$08$.Eh.tYVVkJw580HyC7qvS.N1Fg.W.XJwRq.C6bSeVEWmyRNXTiV7G' ,`email` = 'hjun027@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1411478512' ,`avatar` = '' ,`nickname` = 'chj027' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '36.47.3.100' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '69' ,`username` = '没那么简单_qq' ,`password` = '$2a$08$qDYB6baio5flVbn/nn9Q1OxILKnMMW5xALpkHLhY8ToaoJx/hfKjm' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412755729' ,`avatar` = 'uploads/avatar/201410/small_69_7f0b77e4b4a.png' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '106.120.178.234' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '70' ,`username` = '十月八日_qq' ,`password` = '$2a$08$GAV7cFSS3k.6MQicyDZg5u7y1Iy/vxLQnAXnSKNki/4bZoXCESnrO' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412782171' ,`avatar` = 'uploads/avatar/201410/small_70_ca7dd9d9476.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '123.129.99.207' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '71' ,`username` = 'admin,' ,`password` = '$2a$08$n4vxPZmwkrWGQIWjd1V62OhhiCi.jB.hC0YpWSPmWy8aevkwOj6/e' ,`email` = '345397843@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412830460' ,`avatar` = '' ,`nickname` = 'admin,' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '115.235.3.195' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '72' ,`username` = '改变的路上_sinawb' ,`password` = '$2a$08$zbCGGsHEfZDCwW2uJch7lOw7xk3KKtAtUvFdwPlILkAOS1.xlfOvS' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412842813' ,`avatar` = 'uploads/avatar/201410/small_72_2b387ebb7b2.gif' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.160.66.130' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '73' ,`username` = ' 懷戀濄呿_qq' ,`password` = '$2a$08$5rb74rkjrbI9Qig36E152.AaSAJghAffe6pYHvAoo4ymyuly1k5iy' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412855328' ,`avatar` = 'uploads/avatar/201410/small_73_92d42ac91f3.png' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.3.233.115' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '74' ,`username` = 'dyeing' ,`password` = '$2a$08$DUxhPzMV6iLvVdEnK7woUuHrrGIt3dfQncpLK0NH//Hqtd.B5iUTO' ,`email` = '2448290642@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1412906444' ,`avatar` = '' ,`nickname` = 'dyeing' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '119.130.112.58' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '75' ,`username` = 'hqs198' ,`password` = '$2a$08$.8/YpvPdxO2KxEijBwnDhe53Jet1PY9sz2yNQI69X9u2LmhpC2HCK' ,`email` = 'hqs198@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1413360466' ,`avatar` = '' ,`nickname` = 'hqs198' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.125.229.184' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '76' ,`username` = 'jkoxepmmb' ,`password` = '$2a$08$XkBX3mzrguBUTY8lJzwimeOgT/YWjeXLUqPHRfRgzZ1Z7/kgk82DW' ,`email` = 'isabelle@sklepsante.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1413371925' ,`avatar` = '' ,`nickname` = 'jkoxepmmb' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '91.207.7.178' ,`logins` = '12' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '77' ,`username` = '茹憶_qq' ,`password` = '$2a$08$id8h1PUVFz8TiAMwqhxi8eOJqJXEnlsugdArahNevAFJWqqPTXR8m' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1413516456' ,`avatar` = 'uploads/avatar/201410/small_77_e9568b833bf.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '203.110.175.179' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '78' ,`username` = 'lijing' ,`password` = '$2a$08$ihTmGVETBC4K2FPji7UgkeSgCsm0rQQC1AQ3Xqb3m00iztNtuICGa' ,`email` = 'lvke0918@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1413526280' ,`avatar` = '' ,`nickname` = 'lijing' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '219.142.111.90' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '79' ,`username` = 'realljt' ,`password` = '$2a$08$xtllL7cwPJrFTlzj3O5YbOuHIG4a1SahU7/JhGHhduI0wnNPJgbOG' ,`email` = '40645846@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1414654427' ,`avatar` = '' ,`nickname` = 'realljt' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '121.33.237.154' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '80' ,`username` = 'beidaole' ,`password` = '$2a$08$sU6Ii03XJM1UpTu0YnJoV.33p7cJrMkYqSYz7bPv9lozPpFKsvlU2' ,`email` = 'beidaole@126.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1414680743' ,`avatar` = '' ,`nickname` = 'beidaole' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.25.234.136' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '81' ,`username` = 'ibesideu' ,`password` = '$2a$08$oEo5Q3K.BCHUve6V4N1/Hu.GVfbHEkdnZctYE5XvI60U04jumFVj6' ,`email` = 'xiaks@live.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1415198680' ,`avatar` = '' ,`nickname` = 'ibesideu' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '211.161.249.170' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '82' ,`username` = 'agot1251' ,`password` = '$2a$08$OBz5HNwcFD3SsGOt839MyejqICO64RITxjpUIWNtewMzk8ox.Xbra' ,`email` = 'cagnot@163.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1415278997' ,`avatar` = '' ,`nickname` = 'agot1251' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '163.177.136.31' ,`logins` = '2' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '83' ,`username` = 'L_qq' ,`password` = '$2a$08$7QmScA6VMPRwbcU7pL2dR.jztvQSF8eC.pekykbO.K5diTvaDr4fC' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1415324976' ,`avatar` = 'uploads/avatar/201411/small_83_31290ec1103.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '183.250.3.57' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '84' ,`username` = 'zidjdznfp' ,`password` = '$2a$08$ZTMeiNTHgf9wdp94LTxLaOZBzz/05GLqMweFeHkrhDSRvuIXi8urW' ,`email` = 'kristina@thehosh.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1415424102' ,`avatar` = '' ,`nickname` = 'zidjdznfp' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '42.121.43.143' ,`logins` = '134' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '85' ,`username` = 'Quenteenfix_sinawb' ,`password` = '$2a$08$1bV8QsW9Dr18Bd4LeGDF7OlSR.NZCf3R.S9QgYYytQIlYA0AG2882' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416036953' ,`avatar` = 'uploads/avatar/201411/small_85_147a40599a1.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '114.92.126.217' ,`logins` = '2' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '86' ,`username` = 'wanyuan' ,`password` = '$2a$08$wnTFb6omvX/Bfu.ITkRZm.77AnYiTcWZPSqC5C3ZTirK0sI2T5N6W' ,`email` = '1929662320@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416118964' ,`avatar` = '' ,`nickname` = 'wanyuan' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '111.173.23.153' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '87' ,`username` = '老边_qq' ,`password` = '$2a$08$9kFo67NL09OOW7wKx/pc0ORK01cHh7jklnwz6OlgDmgxuYv9dck6y' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416185508' ,`avatar` = 'uploads/avatar/201411/small_87_829520940af.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '218.61.232.28' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '88' ,`username` = '笨小孩_qq' ,`password` = '$2a$08$vNz2mYSQOz5OHyW2g5QN3.bdOpHi37aQI89lhbQR5MRXUv5Gg/frS' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416216063' ,`avatar` = 'uploads/avatar/201411/small_88_8a70bd55a44.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '221.179.161.83' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '89' ,`username` = '`¤onlEy^囿_qq' ,`password` = '$2a$08$v8Ay7oV7n6jNrllut9j3T.0ZeG768m4UQYBE5aJ/mYZnTopgEFDZ.' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1416216361' ,`avatar` = 'uploads/avatar/201411/small_89_4795a3cd1c5.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '124.193.174.218' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '90' ,`username` = 'PetaXsi' ,`password` = '$2a$08$W1B.vafjBX66o4YXaNLxfOdc0CboMBLftGYWgypMQNP0OOLDpzPhe' ,`email` = 'stnoubwfou@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1416229826' ,`avatar` = '' ,`nickname` = 'PetaXsi' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '69.30.230.34' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '110' ,`username` = 'ad12345' ,`password` = '$2a$08$1EANZpWwNVrMs8i3YYtj9OlXALqDFIaqu99.NPkdERvEdwFCDgE1e' ,`email` = '387908659@qq.com' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1418372197' ,`avatar` = '' ,`nickname` = 'ad12345' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '111' ,`username` = 'ad54321' ,`password` = '$2a$08$H5BZCQbToUHE95I1xV7QMecQ80AqHrWsKqU8TPZGIBNFuRg2RTKLa' ,`email` = 'hui387908659@126.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418372399' ,`avatar` = '' ,`nickname` = 'ad54321' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '141' ,`username` = '如何让我遇见你_qq' ,`password` = '$2a$08$TyoZCDWHYxc06w7gx.ucvucvNG/TRYzLO.eo.PQ7gO/7M.Sv3/cUe' ,`email` = '' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1418629154' ,`avatar` = 'uploads/avatar/201412/small_141_cc66b09a5ba.jpeg' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '221.13.140.5' ,`logins` = '1' ,`username_editable` = 'Y' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '147' ,`username` = 'tdvebhyskz' ,`password` = '$2a$08$062rTLfaanR/HReH118KPuMfqnCTaS/.3Zso2X.bN/XxG6h.GMl9e' ,`email` = 'stretchihumy+KscKL@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418735332' ,`avatar` = '' ,`nickname` = 'tdvebhyskz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.142' ,`last_login_ip` = '42.121.43.142' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '148' ,`username` = 'epktcqigqz' ,`password` = '$2a$08$W7rlONIe6kEGAqugGBbGTOZUb/o0.zF1vQIAXZZ4QTX4gIGmLYqZi' ,`email` = 'stretchihumy+3H5oI@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418737440' ,`avatar` = '' ,`nickname` = 'epktcqigqz' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.140' ,`last_login_ip` = '42.121.43.140' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '149' ,`username` = 'jgklyhzhsf' ,`password` = '$2a$08$9AivfuK1vz9nWDqsVNk3KeRnBfHvaTO/Mwd6caf8pFBmrJl0m0A92' ,`email` = 'pivotalwgkle+7ns9a@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418741936' ,`avatar` = '' ,`nickname` = 'jgklyhzhsf' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.142' ,`last_login_ip` = '42.121.43.142' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '150' ,`username` = 'lkbsejlolo' ,`password` = '$2a$08$RWpIYz6gRGIMmdAHKpEkMeaArzbzXiC7jOfkHHxYhEpUaw1ELcPoW' ,`email` = 'pivotalwgkle+Oh1u9@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418744569' ,`avatar` = '' ,`nickname` = 'lkbsejlolo' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.136' ,`last_login_ip` = '42.121.43.136' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '151' ,`username` = 'jzecvrzihh' ,`password` = '$2a$08$IionD9BA/8w3.gjelbegGO239ggvE26Yvcwa562O5xbLuvmFr/tdm' ,`email` = 'composedmwoa+jDD89@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745010' ,`avatar` = '' ,`nickname` = 'jzecvrzihh' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.137' ,`last_login_ip` = '42.121.43.137' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '152' ,`username` = 'babswxfprm' ,`password` = '$2a$08$vHvCeWqRY/FOA8HOBoVIpejMBLah8XA0Wo/F4R8OuHLsu013hlJ4K' ,`email` = 'accompanyukbix+885rg@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745441' ,`avatar` = '' ,`nickname` = 'babswxfprm' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.138' ,`last_login_ip` = '42.121.43.138' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '153' ,`username` = 'djtbgdfbft' ,`password` = '$2a$08$xV0sJ8rjiL9E5aRcs/tEcurq1RCI96ZyJladubHxBMgUCrCNU1i5.' ,`email` = 'pivotalwgkle+oan2y@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745543' ,`avatar` = '' ,`nickname` = 'djtbgdfbft' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.138' ,`last_login_ip` = '42.121.43.138' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '154' ,`username` = 'egxlvzssow' ,`password` = '$2a$08$VEsNibbtnYka4gogFU2ymOs1BUlvXJb5DAFIFdmA6BxfOTdDthbpC' ,`email` = 'composedmwoa+y59I5@gmail.com' ,`groupid` = '1' ,`status` = '-1' ,`addtime` = '1418745867' ,`avatar` = '' ,`nickname` = 'egxlvzssow' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '42.121.43.140' ,`last_login_ip` = '42.121.43.140' ,`logins` = '1' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user` SET `uid` = '159' ,`username` = 'asdf' ,`password` = '$2a$08$KgR5Juo2J4Oxl9LUDhk7R.hJvLmw.RDG1FCcvrbvGCh320uINvp5y' ,`email` = 'asdf' ,`groupid` = '1' ,`status` = '1' ,`addtime` = '1442304565' ,`avatar` = '' ,`nickname` = '' ,`sign` = '' ,`web` = '' ,`mobile` = '' ,`qq` = '' ,`register_ip` = '0.0.0.0' ,`last_login_ip` = '0.0.0.0' ,`logins` = '0' ,`username_editable` = 'N' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_user_group`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL DEFAULT '' COMMENT '用户组名称',
  `acl` text NOT NULL COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '1' ,`group_name` = '普通用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '2' ,`group_name` = 'VIP①用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '3' ,`group_name` = 'VIP②用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '4' ,`group_name` = 'VIP④用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '5' ,`group_name` = 'VIP⑤用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '6' ,`group_name` = 'VIP⑥用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '7' ,`group_name` = 'VIP⑦用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '8' ,`group_name` = 'VIP⑧用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '9' ,`group_name` = '网站编辑' ,`acl` = 'default|login,catalog|index,menu|index,special|index,post|index,image|index,soft|index,video|index,goods|index,page|index,comment|index,reply|index,tag|index,recommendPosition|index,user|index,question|index,link|index,adPosition|index,ad|index,attach|index,modeltype|index,database|index,cache|index,maillog|index,oAuth|index' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '10' ,`group_name` = '系统管理员' ,`acl` = 'Administrator' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_user_group`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL DEFAULT '' COMMENT '用户组名称',
  `acl` text NOT NULL COMMENT '权限控制',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户组';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '1' ,`group_name` = '普通用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '2' ,`group_name` = 'VIP①用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '3' ,`group_name` = 'VIP②用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '4' ,`group_name` = 'VIP④用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '5' ,`group_name` = 'VIP⑤用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '6' ,`group_name` = 'VIP⑥用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '7' ,`group_name` = 'VIP⑦用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '8' ,`group_name` = 'VIP⑧用户' ,`acl` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '9' ,`group_name` = '网站编辑' ,`acl` = 'default|login,catalog|index,menu|index,special|index,post|index,image|index,soft|index,video|index,goods|index,page|index,comment|index,reply|index,tag|index,recommendPosition|index,user|index,question|index,link|index,adPosition|index,ad|index,attach|index,modeltype|index,database|index,cache|index,maillog|index,oAuth|index' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_user_group` SET `id` = '10' ,`group_name` = '系统管理员' ,`acl` = 'Administrator' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_video`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_video` (
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
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='视频管理表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '2' ,`title` = '钢铁侠' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/bf941705b16.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120502' ,`create_time` = '1403148128' ,`view_count` = '4' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '3' ,`title` = '明日边缘' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/4cc06a97d5a.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120495' ,`create_time` = '1403148264' ,`view_count` = '1' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '4' ,`title` = '窃听风云3' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/a02a34ce432.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '9.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120487' ,`create_time` = '1403148306' ,`view_count` = '16' ,`down_count` = '0' ,`voted` = '{\"t\":2,\"s\":[0,0,0,1,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '5' ,`title` = '终结者4' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/0bb513c708b.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '10.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120480' ,`create_time` = '1403148363' ,`view_count` = '15' ,`down_count` = '0' ,`voted` = '{\"t\":1,\"s\":[0,0,0,0,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '6' ,`title` = '孤胆保镖' ,`catalog_id` = '16' ,`cover_image` = '/upload/video/201509/龙猫.jpg' ,`video_file` = '/upload/video/201509/珍藏许久的高清无码 淫荡极品.avi' ,`language` = 'chinese' ,`video_type` = 'active' ,`video_score` = '8.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '<p>\r\n	电影\r\n</p>' ,`update_time` = '1441789663' ,`create_time` = '1403148418' ,`view_count` = '29' ,`down_count` = '1' ,`voted` = '{\"t\":2,\"s\":[0,0,1,0,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '电影' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '7' ,`title` = 'asdfasdf' ,`catalog_id` = '12' ,`cover_image` = '/upload/video/201509/龙猫.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1441794907' ,`create_time` = '1441790743' ,`view_count` = '0' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------


DROP TABLE IF EXISTS `y_video`;
-----------------------------------mysql_cut_line---------------------------------
CREATE TABLE `y_video` (
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
  `seo_title` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seo_description` varchar(200) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `seo_keywords` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='视频管理表';

-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '2' ,`title` = '钢铁侠' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/bf941705b16.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120502' ,`create_time` = '1403148128' ,`view_count` = '4' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '3' ,`title` = '明日边缘' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/4cc06a97d5a.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120495' ,`create_time` = '1403148264' ,`view_count` = '1' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '4' ,`title` = '窃听风云3' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/a02a34ce432.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '9.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120487' ,`create_time` = '1403148306' ,`view_count` = '16' ,`down_count` = '0' ,`voted` = '{\"t\":2,\"s\":[0,0,0,1,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '5' ,`title` = '终结者4' ,`catalog_id` = '16' ,`cover_image` = 'uploads/images/201406/0bb513c708b.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '10.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1407120480' ,`create_time` = '1403148363' ,`view_count` = '15' ,`down_count` = '0' ,`voted` = '{\"t\":1,\"s\":[0,0,0,0,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '6' ,`title` = '孤胆保镖' ,`catalog_id` = '16' ,`cover_image` = '/upload/video/201509/龙猫.jpg' ,`video_file` = '/upload/video/201509/珍藏许久的高清无码 淫荡极品.avi' ,`language` = 'chinese' ,`video_type` = 'active' ,`video_score` = '8.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '<p>\r\n	电影\r\n</p>' ,`update_time` = '1441789663' ,`create_time` = '1403148418' ,`view_count` = '29' ,`down_count` = '1' ,`voted` = '{\"t\":2,\"s\":[0,0,1,0,1]}' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '电影' ;
-----------------------------------mysql_cut_line---------------------------------
INSERT INTO `y_video` SET `id` = '7' ,`title` = 'asdfasdf' ,`catalog_id` = '12' ,`cover_image` = '/upload/video/201509/龙猫.jpg' ,`video_file` = '' ,`language` = 'chinese' ,`video_type` = 'comedy' ,`video_score` = '0.0' ,`video_size` = '' ,`download` = '' ,`introduce` = '' ,`update_time` = '1441794907' ,`create_time` = '1441790743' ,`view_count` = '0' ,`down_count` = '0' ,`voted` = '' ,`status` = 'Y' ,`seo_title` = '' ,`seo_description` = '' ,`seo_keywords` = '' ;
-----------------------------------mysql_cut_line---------------------------------
