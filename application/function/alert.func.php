<?php
/**************************************************
*  Created:  2012-3-16
*
*  JS提示框 
*
*  @Xsmart (C)2006-2099Inc.
*  @Author 赵志强 <wwwzhaozhiqiang@126.com>
*
***************************************************/
header("Content-type: text/html; charset=utf-8"); 

function alerts($msg) 
{
	exit("<script>alert('".$msg."');</script>");
}

function alertgo($msg,$go=-1) 
{
	exit("<script>alert('".$msg."');history.go(".$go.");</script>");
}
function alertreload($msg,$go=-1) 
{
	exit("<script>alert('".$msg."');top.location=top.location;</script>");
}

function alerthref($msg,$link) 
{
	exit("<script>alert('".$msg."');window.location='".$link."';</script>");
}

function alerttophref($msg,$link) 
{
	exit("<script>alert('".$msg."');window.top.location='".$link."';</script>");
}

function href($link) 
{
	exit("<script>window.location='".$link."';</script>");
}
function close($msg) 
{
	exit("<script>alert('".$msg."');top.openner='';top.close();</script>");
}

?>
