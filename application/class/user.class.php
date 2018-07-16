<?php 
class USER {
	
	function &instance(){
		static $u;
		if(empty($u)) {
			$u = APP::N('clientUser');
		}
		return $u;
	}
	/// 设置或者获取一个会话变量，当参数只有一个时，为获取;有两个时，为设置;第一个参数为KEY
	function v($k){
		$arg = func_get_args();
		if (count($arg)==2){
			return USER::set($k,$arg[1]);
		}else{
			return USER::get($k);
		}
	}
	
	/// 获取一个会话变量
	function get($key=false){
		$u = & USER::instance();
		return $u->getInfo($key);
	}
	
	/// 设置会话变量
	function set($k,$v=false){
		$u = & USER::instance();
		return $u->setInfo($k, $v);
	}
	
	/// 判断当前用户是否登录管理员，管理员ID为空，则未登录，
	function isAdminLogin(){
		$uid = USER::get('__CLIENT_ADMIN_ID');
		return !empty($uid);
	}
	
	/// 设置或者获取当前访问的 aid/管理员ID，不转参数时获取，传参数时为读取
	function aid(){
		$arg = func_get_args();
		if (!empty($arg)){
			USER::set('__CLIENT_ADMIN_ID',	$arg[0]);
		}else{
			return USER::get('__CLIENT_ADMIN_ID');
		}
	}
	
	/// 获取一组 TOKEN
	function getOAuthKey($is_confirm = false){
		$k  = $is_confirm ? WB_OAUTH_KEYS2 : WB_OAUTH_KEYS1 ;
		return USER::get($k);

	}
	
	/// 设置一组 TOCKEN
	function setOAuthKey($keys, $is_confirm = false){
		$k  = $is_confirm ? WB_OAUTH_KEYS2 : WB_OAUTH_KEYS1 ;
		return USER::set($k, $keys);
	}
	
	/// 当前访问者是否已登录,uid为空则未登录
	function isUserLogin(){
		$uid = USER::get('__CLIENT_USER_ID');
		return !empty($uid);
	}
	/// 设置，或者获取 uid/用户ID; 不转参数时获取，传参数时为读取
	function uid(){
		$arg = func_get_args();
		if (!empty($arg)){
			USER::set('__CLIENT_USER_ID',	$arg[0]);
		}else{
			return USER::get('__CLIENT_USER_ID');
		}
	}
	/// 重置会话存储
	function resetInfo(){
		$u = & USER::instance();
		$u->resetInfo();
	}
	
	/// 获取一个用户漫游设置
	function cfg($k=NULL){
		static $uCfg = array();
		
		if (empty($uCfg)){
			$uCfg = DS('common/userConfig.get','u0/0');
		}
		//var_dump($uCfg);
		return $k ? (isset($uCfg[$k]) ?$uCfg[$k] :  NULL) : $uCfg;
	}
	
	/// 获取一个系统配置
	function sys($k=NULL){
		static $sCfg = array();
		if (empty($sCfg)){
			$sCfg = DS('common/sysConfig.get','0');
		}
		return $k ? (isset($sCfg[$k]) ? $sCfg[$k] : NULL) : $sCfg;
	}
}

