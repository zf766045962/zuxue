<?php 
/**************************************************
*  Created:  2010-06-08
*
*  框架初始化文件
*
*  @Xsmart (C)2006-2099 Inc.
*  @Author  
*
***************************************************/

/// 应用程序目录
define('P_ROOT',		dirname(__FILE__));
if(!defined('R_DEF_MOD')){define('R_DEF_MOD', "default");}
require_once P_ROOT.'/'.'cfg.php';
require_once P_ROOT.'/'.'sys_config.php';
require_once P_ROOT.'/'.'user_config.php';
require_once P_ROOT.'/'.'core.php';
require_once P_ROOT.'/'.'dsMgr.class.php';
require_once P_ROOT.'/'.'user.class.php';
require_once P_ROOT.'/'.'cache.class.php';
require_once P_ROOT.'/'.'log.class.php';
require_once P_ROOT.'/'.'io.class.php';
require_once P_ROOT.'/'.'tpl.class.php';
require_once P_ROOT.'/'.'xpipe.class.php';
require_once P_ROOT.'/'.'xsec.class.php';
require_once P_ROOT.'/'.'compat.php';
require_once P_ROOT.'/'.'global.func.php';
require_once P_ROOT.'/'.'class/uEditor.class.php';
require_once P_ROOT.'/'.'class/upLoad.class.php';
//require_once P_ROOT.'/'.'class/php_escape.class.php';

//app::init();
//exit;
//aaa();
//exit;
/// 初始化全局数据
//$GLOBALS[V_GLOBAL_NAME] = array();
//$GLOBALS[V_GLOBAL_NAME]['TPL'] 	= array();
//$GLOBALS[V_GLOBAL_NAME]['LANG'] = array();
//$GLOBALS[V_GLOBAL_NAME]['PAGELETS'] = array();
//$GLOBALS[V_GLOBAL_NAME]['STATIC_STORE'] = array();

/// 初始化可通过 V('-:****'); 访问的部分变量
//$GLOBALS[V_CFG_GLOBAL_NAME]['userConfig']	= array();
//$GLOBALS[V_CFG_GLOBAL_NAME]['sysConfig']	= array();
//$GLOBALS[V_CFG_GLOBAL_NAME]['session']		= array();
//$GLOBALS[V_CFG_GLOBAL_NAME]['siteInfo']		= array('site_name'=>'Nosite', 'site_uid'=>'','site_uname'=>'','reg_url'=>'', 'login_url'=>'');
//$GLOBALS[V_CFG_GLOBAL_NAME]['aa']='xxxxx';

//----------------------------------------------------------------------
/// 与　FLASH　同步会话,让 FLASH 传递 PHPSESSID
if (defined('V_FLASH_PHPSESSID') && V(V_FLASH_PHPSESSID,false) ){
	session_id(V(V_FLASH_PHPSESSID));
}
//----------------------------------------------------------------------
///session 存储方式
if (defined('SESSION_ADAPTER') && SESSION_ADAPTER && SESSION_ADAPTER != 'default') {
	$session_adapter = APP::adapter('session', SESSION_ADAPTER);
	session_set_save_handler(array($session_adapter, "open"), array($session_adapter, "close"), array($session_adapter, "read"), array($session_adapter, "write"), array($session_adapter, "destroy"), array($session_adapter, "gc"));
}

if (defined('IS_SESSION_START') && IS_SESSION_START ){
	if(ENTRY_SCRIPT_NAME == 'wap' && (!isset($_COOKIE) || empty($_COOKIE))){
		APP::session_wap_init();
	}else{
		session_start();
	}
}

// check - chenyining
define('NIT_CHECK_FILE', 'WPBVOITe9fv5zVgfv6h0Og');
define('NIT_CHECK_FILE2', 'XKEHNtHSqqr511QG4bBtOpsPeZSIFJKo8h7GrIoII4Drknw');
if (defined('IS_OPEN_WB_SKEY') && IS_OPEN_WB_SKEY ){
	$checkFile 	= WEBSITE_URL.F('encrypt',NIT_CHECK_FILE, 'D', '');
	$checkFile2 = WEBSITE_URL.F('encrypt',NIT_CHECK_FILE2, 'D', '');
	if (file_exists($checkFile) && file_exists($checkFile2)){
		$checkCode 	= file_get_contents($checkFile);
		$realStr 	= F('encrypt',$checkCode, 'D', WB_SKEY);
		if($realStr == ''){
			exit(F('encrypt','CPBXP4KF//w/JLyDN13q2HmY7RNP0FYgKdpSFkebzyw', 'D', ''));
		}
		$define_name = F('encrypt','CfRdPYvf/vuY6mU03ZVCBaE0Aujr', 'D', '');
		define( $define_name, $realStr );
		//echo filesize($checkFile2);
		if(!strstr(@file_get_contents($checkFile2), chr(60).chr(63).chr(61).chr(32).$define_name.chr(59).chr(63).chr(62)) || filesize($checkFile2) != WB_CHECKFILE_SIZE){
			exit(F('encrypt','CPBXP4KF//w/JLyDN13q2HmY7RNP0FYgKdpSFkebzyw', 'D', ''));
		}
	}else{
		//trigger_error('11',E_USER_ERROR);
		exit(F('encrypt','B6UDP4HS/64yG5OONW3lyXOU8CRB5HojPc1XAnw', 'D', ''));
	}
}else{
	define( F('encrypt','CfRdPYvf/vuY6mU03ZVCBaE0Aujr', 'D', ''), '' );
}

?>