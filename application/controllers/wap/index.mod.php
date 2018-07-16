<?php
/**
 * @file			index.mod.php
 * @CopyRight		(C)2006-2012 framework Inc.
 * @Project			Xsmart
 * @Author			@@
 * @Create Date:	2011-10-2

 * @Brief			个人设置控制器-Xsmart
 */
include('wap.abs.php');
class index_mod extends wap {

	var $uInfo	= false;
	var $cfg	= array();
	var $avatarTemp = '';
	var $avatarPath = '';

	function index_mod(){
		parent :: wap(); 
	
	}

	/// 默认 ACTION
	function default_action(){
		$this->wapStart('首页');
		$this->_display('index');
		
		$this->wapEnd();

	}
	
	function newsList(){

	}
	
}
?>
