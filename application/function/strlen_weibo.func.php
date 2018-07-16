<?php
/**
 * 以新浪微博的字数统计方式统计字数（简单版）
 * 中文算1个，英文算0.5个，全角字符算1个，半角字符算0.5个。
 * @link http://jsliuliang.blog.163.com/blog/static/12333516320097143434850/
 * @version $Id: strlen_weibo.func.php 17910 2011-08-19 12:16:25Z yaoying $
 * @param string $string
 * @return integer
 */
function strlen_weibo($string){
	return (strlen($string) + mb_strlen($string,'UTF-8')) / 4;
}