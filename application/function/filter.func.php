<?php
/**************************************************
*  Created:  2010-06-13
*
*  微博过滤
*
*  @Xsmart (C)2006-2099Inc.
*  @Author zhenquan <zhenquan@staff.sina.com.cn>
*
***************************************************/

require_once  APP::functionFile('get_filter_cache');
/*************************************************
*  Created:  2012-3-28
*
*  过滤字符创
*
*  @Xsmart (C)2006-2099Inc.
*  @Author zhenquan <zhenquan@staff.sina.com.cn>
*************************************************/
function str($str,$type)
{
	if (!in_array($type, array('string')))
	{
		return false;
	}
	switch ($type)
	{
		case 'string':
				return htmlspecialchars($str);
				break;
		default:
			return true;
	}
	return true;
}



function noHtml($content)
{	
	$content = strip_tags($content);
	$content=preg_replace("/\s+/", " ", $content); //过滤多余回车 
	$content=preg_replace("/<[ ]+/si","<",$content); //过滤<__("<"号后面带空格) 
	$content=preg_replace("/<\!--.*?-->/si","",$content); //注释 
	$content=preg_replace("/<(\!.*?)>/si","",$content); //过滤DOCTYPE 
	$content=preg_replace("/<(\/?html.*?)>/si","",$content); //过滤html标签 
	$content=preg_replace("/<(\/?head.*?)>/si","",$content); //过滤head标签 
	$content=preg_replace("/<(\/?meta.*?)>/si","",$content); //过滤meta标签 
	$content=preg_replace("/<(\/?body.*?)>/si","",$content); //过滤body标签 
	$content=preg_replace("/<(\/?link.*?)>/si","",$content); //过滤link标签 
	$content=preg_replace("/<(\/?form.*?)>/si","",$content); //过滤form标签 
	$content=preg_replace("/cookie/si","COOKIE",$content); //过滤COOKIE标签 
	$content=preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si","",$content); //过滤applet标签 
	$content=preg_replace("/<(\/?applet.*?)>/si","",$content); //过滤applet标签 
	$content=preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si","",$content); //过滤style标签 
	$content=preg_replace("/<(\/?style.*?)>/si","",$content); //过滤style标签 
	$content=preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si","",$content); //过滤title标签 
	$content=preg_replace("/<(\/?title.*?)>/si","",$content); //过滤title标签 
	$content=preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si","",$content); //过滤object标签 
	$content=preg_replace("/<(\/?objec.*?)>/si","",$content); //过滤object标签 
	$content=preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si","",$content); //过滤noframes标签 
	$content=preg_replace("/<(\/?noframes.*?)>/si","",$content); //过滤noframes标签 
	$content=preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si","",$content); //过滤frame标签 
	$content=preg_replace("/<(\/?i?frame.*?)>/si","",$content); //过滤frame标签 
	$content=preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si","",$content); //过滤script标签 
	$content=preg_replace("/<(\/?script.*?)>/si","",$content); //过滤script标签 
	$content=preg_replace("/javascript/si","Javascript",$content); //过滤script标签 
	$content=preg_replace("/vbscript/si","Vbscript",$content); //过滤script标签 
	$content=str_replace("&nbsp;","",$content); //过滤&nbsp;标签 
	$content=str_replace(" ","",$content); //过滤 标签 
	$content=str_replace("/r","",$content); //过滤 标签 
	$content=str_replace("/t","",$content); //过滤 标签 
	
	return $content;
}
	
function cutStr($msg,$cut_size,$suffix="...",$charset="UTF-8") 
{
	if(empty($msg))
	{
		return "";
	}
	//$msg = noHtml($msg);
	//验证截取个数,如果是0将不截取
	if($cut_size<=0) return $msg;
	$i		= 1;
	$han	= 0;
	$eng 	= 0 ;
	$str 	= "";
	while ($i <= strlen($msg)) 
	{
	 //判断是否是ASCII扩展字符
		if(ord($msg[($i-1)])>127)
	 	{
			$han++;
		 	if($charset=="UTF-8")
		 	{
				$str .= $msg[($i-1)].$msg[($i)].$msg[($i+1)];
			 	//如果是UTF-8跳过3个ASCII
			 	$i=$i+3;
		 	}
		 	else
		 	{
				$str .= $msg[($i-1)].$msg[($i)];
				$i = $i+2;
		 	}
	  	}
	  	else
	  	{
			$eng ++;
			$str .= $msg[($i-1)];
			$i++;
		}
		//如果汉字和英文总和等于要截取的字符个数那么跳出循环
		if(($han+$eng)==$cut_size){break;}
	}
	 //如果汉字和英文总和等于要截取的字符个数那么不显示后缀
	$suffix = ($han+$eng)<$cut_size?"":$suffix;
	return $str.$suffix;
}


/**
 * 测试内容是否可以通过
 *
 * @return string
 */
function filter($str, $type) {
	if ( !in_array($type, array('content', 'weibo', 'nick', 'verify','comment'))) {
		return false;
	}
	if (empty($str)) {
		return true;
	}
	if ($type == 'verify') {
		$type = 'user_verify';
	}
	$cache = get_filter_cache($type);
	if (empty($cache)) {
		return true;
	}
	switch ($type) {
		case 'nick':
		case 'content':
				
				do {
					if (strpos($str, (string)key($cache)) > -1) {
						return key($cache);
					}
				} while(next($cache));
				break;
		case 'comment':
		case 'weibo':
				if (isset($cache[$str])) {
					return false;
				}
				break;
		
		case 'user_verify':
				if (isset($cache[$str])) {
					return true;
				} else {
					return false;
				}
				break;
	}
	return true;

}





