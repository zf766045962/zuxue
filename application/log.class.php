<?php 


/// LOG　控制类
class LogMgr
{
	function LogMgr(){
	}
	
	public static function &instance()
	{
		static $c;
		if(empty($c)) {
			$c = APP::ADP('log');
		}
		return $c;
	}
	//------------------------------------------------------------------
	
	public static function log($type, $str, $level='error', $extra_params=array(), $star_time=false)
	{
		// Used time
		if ($star_time)
		{
			$usedTime 	= microtime(TRUE)-$star_time;
			$str		= "[Used=$usedTime]\t".$str;
		}
		
		$c = & LogMgr::instance();
		return $c->log($type, $str, $level, $extra_params);
	}
	
	
	public static function run()
	{
		$c = & LogMgr::instance();
		return $c->run();
	}
	
	
	/**
	 * 警告日志
	 * @param $startTime
	 * @param $type
	 * @param $msg
	 * @param $level
	 * @param $extra
	 */
	public static function warningLog($startTime, $type, $msg, $level, $extra=array())
	{
		$timeList = array(	'db'	=> LOG_DB_WARNING_TIME, 
							'io'	=> LOG_IO_WARNING_TIME, 
							'cache'	=> LOG_MC_WARNING_TIME, 
							'api'	=> LOG_API_WARNING_TIME
					);
		
		$used	 = microtime(TRUE)-$startTime;
		$defTime = isset($timeList[$type]) ? $timeList[$type] : false;
		$longExe = $startTime && $defTime && $used>$defTime;
		if ($longExe) {
			LOGSTR($type, " [Used=$used]\t".$msg, LOG_LEVEL_WARNING, $extra);
		}
	}
}