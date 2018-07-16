<?php
/**************************************************
*  Created:  2010-06-08
*
*  管理后台入口
*
*  @Xsmart (C)2006-2099Inc.
*  @Author liu
*
***************************************************/
header("Content-type:text/html; charset=utf-8");
ob_start();
//---------------------------------------------------------
/// 入口名称 
define('ENTRY_SCRIPT_NAME','admin');
/// 当前入口的默认模块路由
define('R_DEF_MOD', "mgr/admin.index");
/// 强制的路由模式　确保　用户能在后台修改回来
define('R_FORCE_MODE', 0);
/// 网站绝对路径
define('WEBSITE_URL', dirname(__FILE__));
/// 初始化框架
require_once 'application/init.php';

  
/// 预处理模块 , 必须在 APP::init 方法之前 定义
/// APP::addPreDoAction('clientUser.autoLogin','c');
/// 初始化应用程序

if(APP::F('is_robot')){
	APP::deny();
}

APP::init();
/// 处理当前HTTP请求
APP::request();

//---------------------------------------------------------
?>