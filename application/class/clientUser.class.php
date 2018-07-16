<?php
/**************************************************
*  Created:  2010-06-08
*
*  文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author 
*
***************************************************/

class clientUser {
	
	function clientUser(){
		if (!defined('IS_SESSION_START') || !IS_SESSION_START ){
			session_start();
		}
		if (!isset($_SESSION[WB_CLIENT_SESSION]) || !is_array($_SESSION[WB_CLIENT_SESSION])){
			$_SESSION[WB_CLIENT_SESSION] = array();
		}
	}
	function resetInfo(){
		$_SESSION[WB_CLIENT_SESSION] = array();
	}
	
	
	function setInfo($k,$v=false){
		if( is_array($k) ){
			$_SESSION[WB_CLIENT_SESSION] = array_merge($_SESSION[WB_ADMIN_SESSION],$k);
		}else{
			$_SESSION[WB_CLIENT_SESSION][$k] = $v;
			//var_dump($_SESSION[WB_CLIENT_SESSION][$k]);
		}
	}
	
	function getInfo($key=false){
		$_SESSION[WB_CLIENT_SESSION]=isset($_SESSION[WB_CLIENT_SESSION])?$_SESSION[WB_CLIENT_SESSION]:NULL;
		$sStore = $_SESSION[WB_CLIENT_SESSION];
		return $key  ? ( isset($sStore[$key]) ? $sStore[$key] : NULL ) : $sStore;
	}
	
	function delInfo($k){
		if(!is_array($k)) {$k = array($k);}
		foreach($k as $kv ){
			if (isset($_SESSION[WB_CLIENT_SESSION][$kv])){
				unset($_SESSION[WB_CLIENT_SESSION][$kv]);
			}
		}
		return true;
	}
	//获取user config
	function getConfig($k){
			$data=DS('user/usercom.getUserConfig','',$k);
			if(isset($data) && !empty($data)){return $data['value'];}
			else{return 0;}
			
	}
}
?>