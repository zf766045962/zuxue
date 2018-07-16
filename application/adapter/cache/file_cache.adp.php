<?php
/**************************************************
*  Created:  2010-06-08
*
*  文件缓存
*
*  @Xsmart (C)2006-2099Inc.
*  @Author xionghui <xionghui1@staff.sina.com.cn>
*
***************************************************/

class file_cache {
	var $baseDir	= "";
	var $pathLevel	= 3;
	var $nameLen	= 2;
	var $varName 	= '__cache_data';
	var $logType 	= 'cache';

	function file_cache() {
		
	}

	function adp_init($config=array()) {
		extract($config, EXTR_SKIP);
		if (isset($baseDir)){
			$this->baseDir		= $baseDir;
		}
		if (isset($pathLevel)){
			$this->pathLevel	= $pathLevel * 1 ==0 ? 3 : $pathLevel * 1;
		}
		if (isset($nameLen)){
			$this->nameLen		= $nameLen * 1 ==0 ? 2 : $nameLen * 1;
		}
		if (isset($varName)){
			$this->varName		= $varName;
		}

	}


	function get($key, $clearStaticKey=false)
	{
		$log_func_start_time = microtime(TRUE);
		
		static $data;
		// 提供给 SET 进行通知，清除静态缓存数据
		if ($clearStaticKey){
			unset($data[$key]);
			return false;
		}
		
		
		$p = $this->_getSavePath($key);
		
		//echo "\nGET P :\n",print_r($p,1),"\n\n";
		
		if (isset($data[$key]) && file_exists($p['p'])){
			$this->_log($log_func_start_time, $key, $data[$key]);
			return $data[$key];
		}

		if ( !file_exists($p['p']) ) {
			$this->_log($log_func_start_time, $key, 'false');
			return false;
		}

		include($p['p']);
		$varName = $this->varName;
		if (!isset($$varName)){$this->_log($log_func_start_time, $key, 'false'); return false;}
		$d = $$varName;
		//var_dump($d);
		$d = $d[$key];
		if ( empty($d['ttl']) || $d['timeout'] > APP_LOCAL_TIMESTAMP ){
			$data[$key]=$d['data'];
			$this->_log($log_func_start_time, $key, $data[$key]);
			return $data[$key];
		}
		
		$this->_log($log_func_start_time, $key, 'false');
		return false;
	}
	
	
	function _log($time, $key, $result)
	{
		LogMgr::warningLog($time, $this->logType, "[get]Key=$key", LOG_LEVEL_WARNING);
		LOGSTR($this->logType, "[get]Input:Key=$key&Output=", LOG_LEVEL_INFO, $result, $time);
	}

	
	function set($key, $value, $ttl = 0) 
	{
		$log_func_start_time = microtime(TRUE);
		
		$vData		= array($key => array('data' => $value, 'timeout'=> ( APP_LOCAL_TIMESTAMP + $ttl), 'ttl' => $ttl));
		$vDataStr	= $this->_var_export($vData);
		$formatData = "<?php\n" .
					  "//This is a cache file, Don't modify me!\n" .
					  "//Created: " . date("M j, Y, G:i") . "\n" .
					  "//Identify: " . md5($vDataStr . $ttl . $key . AUTH_KEY) . "\n\n".
					  IS_IN_APPLICATION_CODE . "\n\n".
					  "\$".$this->varName . " = " . $vDataStr . ";\n" .
					  "?>";
		$p = $this->_getSavePath($key);
		
		//echo "\nSET P :\n",print_r($p,1),"\n\n";//APP::trace('CACHE SET');
		
		//清除GET中的静态缓存数据
		$this->get($key, true);
		$rsult = IO::write($p['p'],$formatData);
		
		LogMgr::warningLog($log_func_start_time, $this->logType, "[delete]Key=$key&Output=$rsult", LOG_LEVEL_WARNING);
		LOGSTR($this->logType, "[delete]Input:Key=$key&Output=$rsult", LOG_LEVEL_INFO, array(), $log_func_start_time);
		
		return $rsult;
	}

	
	function delete($key) 
	{
		$log_func_start_time = microtime(TRUE);
		$p 		= $this->_getSavePath($key);
		$rsult 	= true;
		
		if (file_exists($p['p'])){
			$rsult = IO::rm($p['p']);
		}
		
		LogMgr::warningLog($log_func_start_time, $this->logType, "[delete]Key=$key&Output=$rsult", LOG_LEVEL_WARNING);
		LOGSTR($this->logType, "[delete]Input:Key=$key&Output=$rsult", LOG_LEVEL_INFO, array(), $log_func_start_time);
		return $rsult;
	}

	
	function _getPriviteKey($key){
		return md5($key);
	}

	function _getSavePath($key) {
		$sKey = $this->_getPriviteKey($key);
		$sArr = explode("\n",wordwrap(str_repeat($sKey,10), $this->nameLen, "\n", 1));
		$pArr = array_slice($sArr, 0,$this->pathLevel);
		$d = $this->baseDir.'/'.implode('/',$pArr);
		$f = $sKey.".cache.php";
		return array('f'=>$f , 'd'=>$d , 'p'=>$d.'/'.$f);
	}

	function _var_export($array, $level = 0) {
		if(!is_array($array)) {
			return "'".$array."'";
		}
		if(is_array($array) && function_exists('var_export')) {
			return var_export($array, true);
		}

		$space = '';
		for($i = 0; $i <= $level; $i++) {
			$space .= "\t";
		}
		$evaluate = "Array\n$space(\n";
		$comma = $space;
		if(is_array($array)) {
			foreach($array as $key => $val) {
				$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
				$val = !is_array($val) && (!preg_match("/^\-?[1-9]\d*$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;
				if(is_array($val)) {
					$evaluate .= "$comma$key => ".$this->_var_export($val, $level + 1);
				} else {
					$evaluate .= "$comma$key => $val";
				}
				$comma = ",\n$space";
			}
		}
		$evaluate .= "\n$space)";
		return $evaluate;
	}
}
?>