<?php
/**
 * @file			http_get_contents.php
 * @CopyRight		(C)2006-2012 framework Inc.
 * @Project			Xsmart
 * @Author			@@
 * @Create Date:	2011-10-2

 * @Brief			通过URL获取内容的函数 文件
 */


/**
* 通过URL获取内容
* 
* @param mixed $url
* @return 从URL中获取的内容
*/
function http_get_contents($url){
	$http = APP::ADP('http');
	$http->setUrl($url);
	return $http->request();
}

