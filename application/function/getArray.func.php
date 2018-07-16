<?php
/**************************************************
*  Created:  2012-3-16
*
*  格式化ueditor值输出以及输入 
*
*  @Xsmart (C)2006-2099Inc.
*  @Author 赵志强 <wwwzhaozhiqiang@126.com>
*
***************************************************/
//根据数组key值获取value;
function getIndustry()
{
	include(P_ARRAY.'/industry.php');
	return $site_industry;
}
function getWorkingstatus()
{
	include(P_ARRAY.'/workingstatus.php');
	return $site_workingstatus;
}
function getAudit()
{
	include(P_ARRAY.'/audit.php');
	return $site_audit;
}
function getdeGree()
{
	include(P_ARRAY.'/degree.php');
	return $site_degree;
}
function getAsk()
{
	include(P_ARRAY.'/ask.php');
	return $site_ask;
}
function getCitylist()
{
	include(P_ARRAY.'/citylist.php');
	return $site_citylist;
}
?>