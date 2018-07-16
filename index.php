<?php
/**************************************************
*  Created:  2011-10-08
*
*  入口文件
*
*  @Xsmart (C)2006-2099Inc.
*  @Author liu
*
***************************************************/
//---------------------------------------------------------
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
header("Content-Type: text/html;charset=utf-8");
ob_start();
/// 入口名称
define('ENTRY_SCRIPT_NAME','index');
/// 当前入口的默认模块路由
define('R_DEF_MOD', "study");
/// 强制的路由模式　如果你尝试使用　rewrite　功能　失败，可以通过此选项快速恢复网站正常
define('R_FORCE_MODE', 0);
/// 网站绝对路径
define('WEBSITE_URL', dirname(__FILE__));
/// 初始化框架
require_once 'application/init.php';

/*if(APP::F('is_robot')){
	APP::deny();
}*/

// 启用Xpipe
//$GLOBALS[V_GLOBAL_NAME]['NEED_XPIPE'] = TRUE;
// 启用多模板机制
//$GLOBALS[V_GLOBAL_NAME]['MIX_TPL'] = TRUE;
APP::init();
//---------------------------------------------------------
/// 处理当前HTTP请求
APP::request();

//---------------------------------------------------------