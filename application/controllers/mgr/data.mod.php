<?php
/**************************************************
*  Created:  2015-05-29
*
*  数据统计分析
*
*  @Xsmart (C)2013-2099Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php'); 
class data_mod extends action 
{
	function users() {
		$member = DS('publics.get_total','','users','type = 2');
		TPL :: assign('member',$member);
		$member1 = DS('publics.get_total','','users','type = 1');
		TPL :: assign('member1',$member1);
		
		$boy = DS('publics.get_total','','users','sex = 1');
		TPL :: assign('boy',$boy);
		$girl = DS('publics.get_total','','users','sex = 0');
		TPL :: assign('girl',$girl);
		$nok = DS('publics.get_total','','users','sex = 2');
		TPL :: assign('nok',$nok);
		
		$this->_display('data/users');
	}
}
