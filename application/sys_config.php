<?php 
/**
 * @file			sys_config.php
 * @CopyRight		(C)2006-2012 NorthInteractive Inc.
 * @Project			Xsmart
 * @Author			@@
 * @Create Date:	2011-10-2

 * @Brief			用户配置文件
 */

///---------------------------------------------------------------------
//自定义表名
define('T_DEFINED'		,	'xsmart_form');
define('T_DEFINED2'		,	'xsmart_media');



//----------------------------------------------------------------------
//缓存时间天
define('DAY'		,	'');
define('T_REDBOOK'		,	'redbook');
//缓存时间时
define('HOUR'		,	'');
//留言信息表
define('T_MSG'		,	'msg');
define('T_FORM'		,	'form');
//图文系统表
define('T_UBBCLASS'		,	'ubbclass');
define('T_UBB' 			,	'ubb');

//新闻系统表
define('T_NEWSCLASS'		,	'newsclass');
define('T_NEWS' 			,	'news');

//案例管理系统
define('T_CASESCLASS'		,	'casesclass');
define('T_CASES' 			,	'cases');

//友情链接表
define('T_LINKCLASS'		,	'linkclass');
define('T_LINK' 			,	'link');

//广告系统表
define('T_ADCLASS'		,	'adclass');
define('T_AD' 			,	'ad');

//注册用户表
define('T_USERS'		,	'users');
define('T_USERSASK'		,	'usersask');
define('T_USERSHARE'		,	'usershare');
define('T_USERSVISITORS'		,	'usersvisitors');
define('T_USERSCOMMENT'		,	'userscomment');

//团队表
define('T_TEAMSHARE'		,	'teamshare');
define('T_TEAMVISITORS'		,	'teamvisitors');
define('T_TEAMCOMMENT'		,	'teamcomment');


define('T_XIANGMU'		,	'xiangmu');


//群组表
define('T_GROUPCLASS'	,	'groupclass');
define('T_GROUP'	,	'group');
define('T_JGROUP'	,	'jgroup');
define('T_GROUPSHARE'	,	'groupshare');
define('T_GROUPCOMMENT'	,	'groupcomment');
define('T_GFAVORITES'	,	'gfavorites');


//超级创想家
define('T_WANTSAY'	,	'wantsay');

/// 数据库名表名 content_unit
define('T_CONTENT_UNIT',	'content_unit');


/// 数据库名表名  user_nav  会员菜单  
define('T_USER_NAV',	'user_nav');



/// 数据库名表名 admin
define('T_ADMIN',			'admin');
/// 数据库名表名 admin_group
define('T_ADMIN_GROUP',		'admin_group');
/// 数据库名表名 users
//define('T_USERS',			'users');
/// 数据库名表名 admin_group
define('T_ADMIN_PERMIT',		'admin_permit');
//@@ liu  app列表
define('T_APP',		'app');
//@@ liu  Module列表
define('T_APP_MODULE',		'app_module');
//@@ liu
define('T_SYSTEM_NAV',		'system_nav');
//@@ liu
define('T_SYSTEM_CLASS',		'system_class');
//@@ liu
define('T_SYSTEM_CLASS_CONTENT',		'system_class_content');
//@@ liu
define('T_INFOCLASS',		'infoclass');
//@@ liu
define('T_INFOCLASS_CONTENT',		'infoclass_content');
//数据库表名 用户组   usergroup
define('T_MEMBERCONTACT',		'membercontact');
//数据库表名 用户配置信息   members_config
define('T_MEMBERS_CONFIG',		'members_config');


//数据库表名 用户组   usergroup
define('T_USERGROUP',			'usergroup');
/// 数据库名表名 users
define('T_USER_BAN',		'user_ban');
/// 数据库名表名 user_token
define('T_USER_TOKEN',		'user_token');
/// 数据表,今日话题
define('T_TODAY_TOPIC',		'today_topic');
/// 数据表,明人推荐
define('T_CELEBRITY', 		'celebrity');
/// 数据表，所有屏蔽相关的数据
define('T_DISABLE_ITEMS',	'disable_items');
/// 数据表,被屏蔽的热门转发和评论
define('T_DISABLED_HOT_PUBLISH', 'disabled_hot_publish');
/// 数据表,被屏蔽的"人气关注"用户
define('T_DISABLED_USER',	'disabled_user');
/// 数据表,被屏蔽的微博
define('T_DISABLED_WEIBO',	'disabled_weibo');
/// 数据表，被屏蔽的回复
define('T_DISABLED_COMMENT','disabled_comment');
/// 数据表,过滤关键词
define('T_KEYWORD',			'keyword');
/// 数据表,要加V的用户
define('T_USER_VERIFY',		'user_verify');
/// 关注人气榜基数
define('T_FOLLOWERS_COUNT',	'followers_count');
/// 数据表,被屏蔽的人气关注列表项
define('T_DISABLED_FOLLOWERS',	'disabled_followers');
/// 数据表,保存用户后台设置项
define('T_SYS_CONFIG',		'sys_config');
/// 数据表,保存用户自定义配置项
define('T_USER_CONFIG',		'user_config');
/// 代理帐号表
define('T_ACCOUNT_PROXY', 'account_proxy');
/// 组件表
define('T_COMPONENTS',		'components');
/// 组件配置表
define('T_COMPONENT_CLASSTYPE',		'component_classtype');
/// 组件配置表
define('T_COMPONENTS_CFG',		'component_cfg');
/// 用户分组列表
define('T_COMPONENT_USERGROUPS', 'component_usergroups');
/// 用于推荐的用户组成员
define('T_COMPONENT_USERS',		'component_users');
/// 今日话题
define('T_TODAY_TOPICS',		'today_topics');
/// 话题内容列表
define('T_COMPONENT_TOPIC',		'component_topic');
/// 话题分组
define('T_COMPONENT_TOPICLIST',	'component_topiclist');
/// 页面模块使用情况数据表
define('T_PAGE_MANAGER',		'page_manager');
/// 页面
define('T_PAGES',				'pages');
/// 皮肤类别表
define('T_SKIN_GROUPS',	'skin_groups');
/// 模板列表
define('T_SKINS',		'skins');
/// 插件
define('T_PLUGINS',		'plugins');
/// 个人信息推广位下的内容
define('T_PROFILE_AD',	'profile_ad');
/// 分组数据存储表
define('T_ITEM_GROUPS', 'item_groups');

/// 页面导航表
define('T_NAV', 'nav');

/// 页面原型表
define('T_PAGE_PROTOTYPE', 'page_prototype');

/// 名人用户表
define('T_CELEB', 'celeb');

/// 名人用户分类表
define('T_CELEB_CATEGORY', 'celeb_category');

/// 本地微博
define('T_WEIBO_COPY',		'weibo_copy');
//博客
define('T_BLOG',		'blog');

define('T_FEEDBACK',		'feedback');

///话题收藏表
define('T_PAGE_SUBJECT',	'subject');

/// 个性域名保留词
define('KEEP_USERDOMAIN',	'keep_userdomain');
/// 用户关注关系表
define('T_USER_FOLLOW', 'user_follow');
/// 评论本地备份表
define('T_COMMENT_COPY', 'comment_copy');
/// 用户关系本地备份表，当XWB_PARENT_RELATIONSHIP配置为FALSE起作用
define('T_USER_FOLLOW_COPY', 'user_follow_copy');
/// 活动表
define('T_EVENTS',			'events');
define('T_EVENT_JOIN',		'event_join');
define('T_EVENT_COMMENT',	'event_comment');
/// 在线访谈表
define('T_MICRO_INTERVIEW', 'micro_interview');
define('T_INTERVIEW_WB', 'interview_wb');
define('T_INTERVIEW_WB_ATME', 'interview_wb_atme');
/// 通知信息表
define('T_NOTICE', 'notice');
define('T_NOTICE_RECIPIENTS', 'notice_recipients');

///有用户操作表
define('T_USER_ACTION',	'user_action');

/// 在线直播表 
define('T_MICRO_LIVE',		'micro_live');
define('T_MICRO_LIVE_WB',	'micro_live_wb');

/// 待审评论和删除评论表 
define('T_COMMENT_VERIFY',	'comment_verify');
define('T_COMMENT_DELETE',	'comment_delete');

/// 待审核微博和删除微博表
define('T_WEIBO_VERIFY', 'weibo_verify');
define('T_WEIBO_DELETE', 'weibo_delete');

/// 日志表, api表和http表单独分开
define('T_LOG_HTTP', 		'log_http');
define('T_LOG_ERROR', 		'log_error');
define('T_LOG_INFO', 		'log_info');
define('T_LOG_API_ERROR', 	'log_error_api');
define('T_LOG_API_INFO', 	'log_info_api');

/// 聚焦位
define('T_FOCUS_AD',		'focus_ad');


// 分类管理
define('T_ARTICLE_CLASS',		'article_class');
define('T_ARTICLE',		'article');
// 模型
define('T_MODEL',			'model');
define('T_MODEL_FIELD',		'model_field');
// 联动菜单
define('T_LINKAGE',			'linkage');
// 区域
define('T_AREA',			'area');



define('T_TEST'	,	'test');
?>