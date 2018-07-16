<?php 
//----------------------------------------------------------------------
/**
* 类BigPipe的管道输出控制类
*/ 
class Xpipe {
	function Xpipe(){
	}
	/**
	* 新建一个 pagelet
	* 
	* @param mixed $r	pagelet 的路由
	* @param mixed $p	传递给 pagelet 的参数
	* @param mixed $o	执行顺序,如果为 false则符合先进先出的规则，返之，数据大的先执行
	* @param mixed $isPerch 是否输出占位标签,非占位pagelet可用
	*/
	function pagelet($r, $p=array(), $o=false,$isPerch=true){
		static $ost= 1000000,$custom_st = 1000001,$ki=10000;
		$ki++;
		$k =  $o==false ? $ost-- : $custom_st+$o;		
		//echo $k,"-",$ost,"\n";
		$GLOBALS[V_GLOBAL_NAME]['PAGELETS'][$k] = array($r, $p, $ki,$isPerch);
		if ($isPerch){

			Xpipe::_perchLable($ki,$r);
		}
	}
	
	/**
	* 占位标签,用于确定模块要显示的位置
	*/
	function _perchLable($k,$r){
		echo sprintf("<div class='hidden' id='%s' xRoute='%s' ></div>",Xpipe::_idKey($k),$r);
	}
	///　生成一个占位标签的　ID
	function _idKey($k){
		return 'XpipeModule_'.$k;
	}
	
	/**
	* 当前是否正在运行PIPE
	* 
	* @param mixed $run
	*/
	function isRunning($run=false){
		static $isRun = false;
		if ($run) $isRun = $run;
		return $isRun ;
	}
	
	//当前请求是否使用 PIPE ，默认使用
	function usePipe($state=true){
		static $isUse = true;
		if (func_num_args()){
			$isUse = $state;
		}
		return $isUse;
	}
	
	/**
	* 一次管道输出，某个子模块运算完成,通知前端处理相关逻辑
	* 
	* @param mixed	$rst
	* @param string JS端统一调用的管道方法
	* @return		无返回，输出一段 script　到缓冲并输出
	*/
	function output($rst, $jsFunc='load'){
		$s = sprintf("\n<script>%s.%s(%s);</script>", V_JS_XPIPE_OBJ, $jsFunc, json_encode($rst));
		//将布局缓冲输出到客户端
		if (APP::xcacheOpt()){
			APP::xcache($s);
		}
		
		echo $s;
		unset($s);
		@flush();
	}
	
	/**
	* 执行管道队列中的相关子模块
	*/
	function run(){
		if (!Xpipe::usePipe()){
			return false;
		}
		
		//将布局缓冲输出到客户端
		if (APP::xcacheOpt()){
			APP::xcache(ob_get_flush());
		}else{
			@ob_end_flush();
		}
		
		Xpipe::_start();
		
		$pls = Xpipe::_getAndCleanPagelets();
		if (!$pls || !is_array($pls)){
			Xpipe::_end();
			return false;
		}
		//print_r($pls);exit;
		
		
		while(count($pls)>0){
			$pl		= array_shift($pls);
			$rst	= Xpipe::runOnePagelet($pl);
			//输出SCRIPT到缓冲
			Xpipe::output($rst);
			
			//检查是否存在子管道，并插入到当前队列的最开始,避免使用递归
			$child_pls = Xpipe::_getAndCleanPagelets();
			if ($child_pls && is_array($child_pls)) {
				//print_r($pls);print_r($child_pls);exit;
				$pls = array_merge($child_pls, $pls);
				
			}
		}
		Xpipe::_end();
	}
	
	/**
	* 执行一个管道模块
	* @param mixed $pl
	*/
	function runOnePagelet($pl){
		//sleep(2);
		ob_start();
		list($r, $p, $k,$isPerch) = $pl;
		$plObj	= APP::_cls($r,'pls',true);
		$rArr	= APP::_parseRoute($r);
		//print_r($rArr);
		$data = $plObj->$rArr[3]($p);
		$pl_content = ob_get_clean();

		return array(
				'html'=>$pl_content,
				'pagelet'=>$r,
				'perch'=>$isPerch,
				'id'=>Xpipe::_idKey($k),
				'data'=>$data
				);
	}
	
	
	//管道开始
	function _start(){
		Xpipe::isRunning(true);
		//初始化的全局配置量
		$iniCfg = array(
			'basePath'	=> W_BASE_URL,'routeMode'=>R_MODE,'routeVname'=>R_GET_VAR_NAME,'akey'=>WB_AKEY,
			'shortLink'	=> V('-:sysConfig/site_short_link', ''),
			'loginCfg'	=> V('-:sysConfig/login_way', 1),
			'webName'	=> V("-:sysConfig/site_name"),
			'uid'		=> USER::uid(),
			'siteUid'	=> USER::get('site_uid'),
			'siteUname'	=> USER::get('site_uname'),
			'siteName'	=> USER::get('site_name'),
			'siteReg'	=> V('-:siteInfo/reg_url'),
			'sinaReg'	=> URL('account.goSinaReg'),
			'page'		=> APP::getRequestRoute(),
			'remind'	=> /*V('-:userConfig/user_newfeed')*//*intval(PAGE_TYPE_CURRENT) === 1 ? 0 : 1*/0,
			'maxid'		=> CACHE::get(USER::uid() . '_maxid'),
			'hasDirectMessages' => HAS_DIRECT_MESSAGES,
			'verifyhash' => XSec::makeVerifyHash('jsapi'),
		);
		Xpipe::output($iniCfg, 'start');
	}
	
	//管道结束
	function _end(){
		Xpipe::output(true, 'end');
		Xpipe::isRunning(false);
	}
	
	/**
	* 记取当前　pagelet　队列，并清空
	* @return	如果没有 pagelet　队列　则返回 false　，　如有则返回 pagelets数据
	*/
	function _getAndCleanPagelets(){
		$ret = $GLOBALS[V_GLOBAL_NAME]['PAGELETS'];
		$GLOBALS[V_GLOBAL_NAME]['PAGELETS'] = array();
		if (!empty($ret) && is_array($ret)) {
			krsort($ret);
			return $ret;	
		}else{
			return false;
		}
		return empty($ret) ? false : $ret;		
	}
	
	//调试，查看变量
	function debug($var){
		echo '<pre style="color:green; border: 1px solid green;padding: 5px;">Xpipe变量跟踪：'."\n";
		var_dump($var);
		echo '</pre>';
	}
}
