<?php
/**
 * 格式化专题的内容（暂不匹配链接）
 * 允许html输出
 * @Author			@@
 * @param string $text
 * @param bool $show_em
 * @return string
 * @version $Id: format_text_zhuanti.func.php 17973 2011-08-24 08:59:14Z yaoying $
 */
function format_text_zhuanti($text, $show_em = true){
	if (empty($text)){return $text;}
		
		$newText = '';
		$mc = preg_split(";(#[^#]+#|[a-z0-9\-_]*[a-z0-9]@(?:[a-z0-9-]+)(?:\.[a-z0-9-]+)+|@[\x{4e00}-\x{9fa5}0-9A-Za-z_\-]+|http://(?:sinaurl|t)\.cn/[a-z0-9]+|<a\s+href=[\"'][^\"']+[\"'][^>]*>.+?</a>);sium",$text,-1,PREG_SPLIT_DELIM_CAPTURE );
		
		foreach ($mc as $i=>$v){
			if ($i%2==1){
				if (substr($v, 0, 1).substr($v, -1, 1)=='##'){
					$newText.=' <a href="'.URL('search.weibo', array('k' => substr($v,1,-1))).'">'.htmlspecialchars($v).'</a> ';
				}elseif(substr($v, 0, 1)=='@'){
					$newText.=' <a href="'.URL('ta', array('name' => substr($v,1))).'">'.htmlspecialchars($v).'</a> ';
				}else{
					$newText.= $v;
				}
			}else{
				$newText.= $v;
			}
		}
		$text = $newText;
	
	//替换表情
	if ($show_em && (!defined('ENTRY_SCRIPT_NAME') || ENTRY_SCRIPT_NAME != 'wap')) {
		static $search_em = null;
		static $replace_em = null;
		if(null === $search_em){
			$emoticons_cn = DS('Xsmart/xwb.getRepFaces', 'g0/86400');
			$emoticons_tw = DS('Xsmart/xwb.getRepFaces', 'g0/86400', 'zh_tw');
			$emoticons['search'] = array_merge($emoticons_cn['search'], $emoticons_tw['search']);
			$emoticons['replace'] = array_merge($emoticons_cn['replace'], $emoticons_tw['replace']);

			$search_em = isset($emoticons['search']) & is_array($emoticons['search']) ? $emoticons['search'] : array() ;
			$replace_em = isset($emoticons['replace']) & is_array($emoticons['replace']) ? $emoticons['replace'] : array() ;
			if (empty($search_em) || empty($replace_em)){
				DD('Xsmart/xwb.getRepFaces');
			}
		}
		
		if (!empty($search_em)) {
			$text = str_replace($search_em, $replace_em, $text);
		}
	}
	
	return nl2br($text);
}
