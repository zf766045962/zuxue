<?php 
//----------------------------------------------------------------------

/**
 * 简单安全控制类
 * @Author			@@
 *
 */
class XSec{ 
	
	/**
	 * 生成一个Verify hash，用于外部校验
	 * @param string $add
	 * @param bool $useSinaUid
	 * @return string
	 */
	function makeVerifyHash($add='', $useSinaUid = true){
		if($useSinaUid){
			$add .= ('#'. USER::uid());
		}
		$useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		
		//trigger_error("{$add}#{$useragent}#". WB_AKEY. '#'. WB_SKEY. '#'. WB_VERSION, E_USER_WARNING);
		return substr(md5("{$add}#{$useragent}#". WB_AKEY. '#'. WB_SKEY. '#'. WB_VERSION), 8, 10);
		
	}
	
	/**
	 * 检查请求来源是否正确
	 * @return int 成功返回0，否则返回负数
	 */
	function checkReferer(){
		if(!isset($_SERVER['HTTP_REFERER'])){
			return -1;    //NO REFERER
		}
		$referer = @parse_url($_SERVER['HTTP_REFERER']);
		if(!isset($referer['host'])){
			return -2;    //REFERER PARSE FAILURE
		}
		$host = W_BASE_HOST;
		if(false !== strpos($host, ':')){
			$host = preg_replace('/:[0-9]+/', '', $host);
		}
		if($referer['host'] != $host){
			return -3;    //REFERER CHECK FAILURE
		}
		return 0;
	}
	
	/**
	 * 对submit进行检查
	 * @param string $reqmethod 可选值：POST、GET
	 * @param array $param 组合检查数组。可选参数有：
	 * array(
	 *     'check_verifyhash' => true,    //是否对verifyhash进行校验
	 *     'add' => '',    //verifyhash add
	 *     'useSinaUid' => true,    //verifyhash useSinaUid
	 *     'check_referer' => true,    //是否对请求来源进行检查
	 * );
	 * @return int 成功返回0，否则返回负数：
	 * -1:请求方法不对；-2:请求来源不对；-3:verifyhash校验失败
	 */
	function checkSubmit($reqmethod = 'POST', $param = array()){
		static $default_param = array(
			'check_verifyhash' => true,
			'add' => '',
			'useSinaUid' => true,
			'check_referer' => true,
		);
		$param = array_merge($default_param, (array)$param);
		
		if($_SERVER['REQUEST_METHOD'] != $reqmethod){
			return -1;
		}
		
		if(true == $param['check_referer'] && 0 != XSec::checkReferer()){
			return -2;
		}
		
		if('POST' == $reqmethod){
			$input = 'p:verifyhash';
		}else{
			$input = 'g:verifyhash';
		}
		if(true == $param['check_verifyhash'] && V($input, null) != XSec::makeVerifyHash($param['add'], $param['useSinaUid'])){
			return -3;
		}
		
		return 0;
		
	}
	
}
