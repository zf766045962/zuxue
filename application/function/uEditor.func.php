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

/**
 * inHtml 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function inHtml($content) 
{
	$content = V("r:".$content."");
	$content = htmlspecialchars(stripslashes($content));
	return $content;
}
/**
 * inHtml 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function inHtmlstr($content) 
{
	$content = htmlspecialchars(stripslashes($content));
	return $content;
}
/**
 * outHtml 
 *
 * @param string $content 要处理的内容
 *
 * @return string 
 */
function outHtml($content) 
{
	if(empty($content))
	{
		return "";
	}
	$content = htmlspecialchars_decode($content);
	return $content;
}
?>
