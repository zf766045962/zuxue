<?php
/**************************************************
*  Created:  2012-3-16
*
*  格式化图片地址 
*
*  @Xsmart (C)2006-2099Inc.
*  @Author 赵志强 <wwwzhaozhiqiang@126.com>
*
***************************************************/

/**
 * url 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function getUrl($url,$host=W_BASE_URL) 
{
	$url_one 		= substr($url,0,1);
	if($url_one == "/")
	{
		return $host.substr($url,1,strlen($url)-1);
	}
	else
	{
		return $url;
	}
}

/**
 * url 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function getbigicon($url,$host=W_BASE_URL) 
{
	$newurl 		= "";
	$fileName_arr = explode(".",$url);
	if(is_array($fileName_arr))
	{
		$newurl = $fileName_arr[0]."_big.".$fileName_arr[count($fileName_arr)-1];
	}
	else
	{
		return false;
	}
	$url_one 		= substr($newurl,0,1);
	if($url_one == "/")
	{
		return $host.substr($newurl,1,strlen($newurl)-1);
	}
	else
	{
		return $newurl;
	}
}

/**
 * url 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function getsmallicon($url,$host=W_BASE_URL) 
{
	$newurl 		= "";
	$fileName_arr = explode(".",$url);
	if(is_array($fileName_arr))
	{
		$newurl = $fileName_arr[0]."_small.".$fileName_arr[count($fileName_arr)-1];
	}
	else
	{
		return false;
	}
	$url_one 		= substr($newurl,0,1);
	if($url_one == "/")
	{
		return $host.substr($newurl,1,strlen($newurl)-1);
	}
	else
	{
		return $newurl;
	}
}




?>
