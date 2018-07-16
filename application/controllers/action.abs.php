<?php
/**************************************************
*  Created:  2014-03-21
*
*  前台Action基类
*
*  @Xsmart (C)2014-2099Inc.
*  @Author chenyining <chenyining@vi163.com>
*
***************************************************/
class action {
	public $url;
	function __construct(){
		if(V('r:cache') != 'no'){
			$get = V('g');
			if(empty($get)){
				$this->url = WEBSITE_URL.'/html/index.html';
			}else{
				$arr = explode('.',$get['m']);
				if(count($arr) == 1){
					$arr[1] = 'index';
				}
				$this->url = WEBSITE_URL.'/html/'.$arr[0].'/'.$arr[1];
				unset($get['m']);
				foreach($get as $key=>$val){
					$this->url .= '_'. $key . $val;
				}
				$this->url .= '.html';
			}
			if (!is_dir(WEBSITE_URL.'/html/'.$arr[0].'/')){
				mkdir(WEBSITE_URL.'/html/'.$arr[0].'/');
			}
			if(file_exists($this->url)){
				//echo "YES!";
				include_once $this->url;
				$now = time();
				$filetime = filemtime($this->url);
				$date = HTML_TIME;
				if($filetime + $date < $now){
					unlink($this->url);
				}
				exit;
			}else{
				//echo "NO!";
				ob_start();
			}
		}
	}
	//生成HTML
	function makeHTML(){
		if(preg_match('/^[.-_0-9a-z]+$/i',$this->url)){
			$re = ob_get_contents();
			ob_clean();
			$re = $this->compresshtml($re);
			file_put_contents($this->url,$re);			
			include_once $this->url;
			exit;
		}
	}
	/**
	* 压缩html文件里的html代码，同时也可以压缩css、js代码
	* @param $str  欲要压缩的字符串
	* @return 返回压缩后的字符串代码
	*/
	function compresshtml($aa)
	{
		$aa = preg_replace("/(^http:)*\/\/[\S^;]*;/","",$aa);
		$aa = preg_replace("/\<\!\-\-[\s\S]*?\-\-\>/","",$aa);
		$aa = preg_replace("/\>[\s]+\</","><",$aa);
		$aa = preg_replace("/;[\s]+/",";",$aa);
		$aa = preg_replace("/[\s]+\}/","}",$aa);
		$aa = preg_replace("/}[\s]+/","}",$aa);
		$aa = preg_replace("/\{[\s]+/","{",$aa);
		$aa = preg_replace("/([\s]){2,}/","$1",$aa);
		$aa = preg_replace("/[\s]+\=[\s]+/","=",$aa);
		return $aa;
	}
	
	/** 
	* 压缩html : 清除换行符,清除制表符,去掉注释标记 
	* @param $string 
	* @return压缩后的$string
	* */
	function compress_html($string){ 
	   $string = str_replace("\r\n",'',$string);	//清除换行符
	   $string = str_replace("\n",'',$string);		//清除换行符
	   $string = str_replace("\t",'',$string);		//清除制表符
	   $pattern= array(
		   "/> *([^ ]*) *</",	//去掉注释标记
		   "/[\s]+/",
		   "/<!--[^!]*-->/",
		   "/\" /",
		   "/ \"/",
		   "'/\*[^*]*\*/'"
	   );
	   $replace= array (
		   ">\\1<",
		   " ",
		   "",
		   "\"",
		   "\"",
		   ""
	   );
	   return preg_replace($pattern, $replace, $string);
	}
}
