<?php
/**************************************************
*  Created:  2013-03-06
*
*  默认首页
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class default_mod extends action
{
	//首页
	function default_action()
	{
		TPL :: display('index');
	}

/************************************************************************************************/

}
