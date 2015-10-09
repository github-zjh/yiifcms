<?php
/**
 * Model字段语言包
 * 
 * @author Sim Zhao <326196998@qq.com>
 * @link http://www.yiifcms.com/
 * @copyright (c) 2014-2015. All rights reserved.
 */
return array(
		//User[用户]
		'uid'            => '用户ID',
		'username'       => '用户名',
		'password'       => '密码',
		'email'          => '邮箱',
		'groupid'        => '用户组id',
		'status'         => '用户状态',
		'addtime'        => '注册时间',
		'qq'             => 'QQ号码',
		'sign'           => '个性签名',
		'nickname'       => '昵称',
		'web'            => '个人网址',
		'mobile'         => '手机号码',
		'register_ip'    => '注册ip',
		'last_login_ip'  => '上次登录ip',
		'logins'         => '登录次数',
		'usergroup'      => '用户组',
        
        //UserGroup[用户组]
        'UserGroupId'    => '用户组编号',
        'UserGroupName'  => '用户组名称',
        'UserGroupAcl'   => '用户组权限',
    
		//Catalog[栏目]
		'catalog_id'           => '栏目ID',
		'parent_id'	           => '上级栏目',
		'catalog_name'         => '栏目名称',
		'catalog_name_second'  => '栏目别名',
		'catalog_name_alias'   => '栏目唯一标示',
		'content'              => '栏目介绍',
		'seo_title'            => 'SEO 标题',
		'seo_keywords'         => 'SEO 关键字',
		'seo_description'      => 'SEO 描述',
		'attach_file'          => '封面图片',
		'attach_thumb'         => '封面图片缩略图',
		'sort_order'           => '排序 ',
		'data_count'           => '数据量',		
		'status_is'            => '是否显示',		
		'redirect_url'         => '跳转地址',
		'type'                 => '栏目类型',
		'template_list'        => '列表模板',
		'template_show'        => '内容模板',
		'create_time'          => '添加时间',
		'update_time'          => '更新时间',		
			
		//Menu[导航]
		'menu_id'              => '导航ID',
		'menu_name'            => '导航名称',
		'menu_link'            => '导航链接',
		'menu_unique'          => '唯一标示',
		'status_is'            => '是否显示',
		'parent_id'            => '上级导航',
		'menu_sort_order'      => '排序',
		'new_open'             => '新窗口打开',
		
		//Ad[广告]
		'AdId'                 => '广告ID',
        'AdPosition'           => '广告位',
        'AdTitle'              => '广告名称',
        'AdTitleAlias'         => '广告标示',
        'AdLinkUrl'            => '跳转地址',
        'AdImageUrl'           => '图片地址',
        'AdWidth'              => '图片宽度',
        'AdHeight'             => '图片高度',
        'AdIntroduce'          => '广告描述',
        'AdAttachFile'         => '图片路径',
        'AdSortOrder'          => '广告排序',
        'AdStatus'             => '显示状态',
        'AdCreateTime'         => '创建时间',
        'AdUpdateTime'         => '更新时间',
    
		//AdPositon[广告位]
		'AdPositionId'         => '广告位ID',
		'AdPositionTitle'      => '广告位名称',
        'AdPositionStatus'     => '广告位状态',
 		
		//RecommendPositon[推荐位]
		'recommend_id'         => '推荐位ID',
		'recommend_name'       => '推荐位名称',
		'recommend_type'       => '推荐位类型',
		
		//ModelType[内容模型]
		'MTid'                 => '内容模型ID',
		'MTtype_key'           => '内容模型标示',
		'MTtype_name'          => '内容模型名称',
		'MTmodel'              => '内容模型',
		
		//Comment[评论]
		'CommentId'            => '评论ID',
		'CommentTitle'         => '评论主题',
		'CommentUrl'           => '评论内容地址',
		'CommentTopic_id'      => '评论主题ID',
		'CommentUser_id'       => '评论用户ID',
		'CommentContent'       => '评论内容',
		'CommentStatus'        => '评论状态',
		'CommentType'          => '评论类型',
		'CommentClient_ip'     => '评论ip',
		'CommentCreate_time'   => '评论时间',
		'verifyCode'           => '验证码',
		
		//Reply[回复]
		'ReplyId'              => '回复ID',
		'ReplyTitle'           => '回复主题',
		'ReplyUrl'             => '回复内容地址',
		'ReplyTopicid'         => '回复主题ID',
		'ReplyUserid'          => '回复用户ID',
		'ReplyContent'         => '回复内容',
		'ReplyStatus'          => '回复状态',
		'ReplyType'            => '回复类型',	
 		'ReplyCreateTime'      => '回复时间',
		
		//Soft[软件]
		'SoftId'               => '软件ID',
		'SoftCatalogId'        => '软件分类ID',
		'SoftTitle'            => '软件名称',
		'SoftCoverImage'       => '软件封面图片',
		'SoftFiledId'          => '软件包ID',
		'SoftFileType'         => '软件包文件类型',
		'SoftSize'             => '软件大小',
		'SoftLink'             => '软件外部下载链接',
		'SoftIntroduce'        => '软件简介',
		'SoftPay'              => '软件收费',
		'SoftUpdateTime'       => '软件更新时间',
		'SoftCreateTime'       => '软件添加时间',
		'SoftIcon'             => '软件图标',
		'SoftRank'             => '软件等级',
		'SoftLanguage'         => '软件语言',
		'SoftType'             => '软件类型',
		'SoftOS'               => '软件系统',
		'ViewCount'            => '浏览次数',
		'DownCount'            => '下载次数',
		'SoftStatus'           => '软件状态',
		'SoftSeoTitle'         => '软件seo标题',
		'SoftSeoDescription'   => '软件seo描述',
		'SoftSeoKeywords'      => '软件seo关键字',
		
		//video[视频]
		'VideoScore'           => '视频评分',
		'VideoType'            => '视频类型',
		'VideoLanguage'        => '视频字幕',	
		'DownCount'            => '下载次数',
		
		//Question[留言]
		'QuestionId'           => '留言ID',
		'QuestionRealname'     => '姓名',
		'QuestionEmail'        => '邮箱',
		'QuestionTelephone'    => '手机号码',
		'QuestionQuestion'     => '留言内容',
		'QuestionQq'           => 'qq',	
		'QuestionClient_ip'    => '客户端ip',
		'QuestionCreate_time'  => '留言时间',	
		
		//Attention[关注]
		'AttentionId'          => '关注ID',
		'AttentionCid'         => '关注内容ID',
		'AttentionUserid'      => '关注人ID',
		'AttentionTitle'       => '关注内容标题',
		'AttentionUrl'         => '关注链接',
		'AttentionType'        => '关注类型',
		'AttentionAddTime'     => '关注时间',
		
		//Collect[收藏]
		'CollectId'            => '收藏ID',
		'CollectCid'           => '收藏内容ID',
		'CollectUserid'        => '收藏人ID',
		'CollectTitle'         => '收藏内容标题',
		'CollectUrl'           => '收藏链接',
		'CollectType'          => '收藏类型',
		'CollectAddTime'       => '收藏时间',
		
		//Friend[好友]
		'Friend Name'          => '好友名称',
		
		//Special[专题]
        'SpecialId'            => '专题编号',
        'SpecialTitle'         => '专题名称',
        'SpecialIntroduce'     => '专题摘要',
        'SpecialImgCover'      => '专题封面',
        'SpecialImgBanner'     => '专题横幅',
        'SpecialStatus'        => '专题状态',
        'SpecialSeoTitle'      => '专题seo标题',
        'SpecialSeoKeywords'   => '专题seo关键字',
        'SpecialSeoDescription'=> '专题seo描述',
        'SpecialSortOrder'     => '专题排序',
        'SpecialTimeCreate'    => '专题添加时间',
        'SpecialTimeUpdate'    => '专题更新时间',
		
		//MailLog[邮件日志]
		'MailId'               => '邮件ID',
		'MailAccept'           => '收件人',
		'MailSubject'          => '邮件主题',
		'MailMessage'          => '邮件内容',
		'MailSendtime'         => '发送时间',
		'MailStatus'           => '发送状态',
		'MailLevel'            => '邮件优先级',
		'MailTimes'            => '发送次数',
		'MailError'            => '发送失败原因',
		
        //第三方应用
		'ApiName'              => '接口名称',
		'ApiConfig'            => '接口配置',
		
);