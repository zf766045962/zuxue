<?php 
//----------------------------------------------------------------------
/**
 * 请在模板文件第一行加入： if(!defined("IN_APPLICATION")) { exit("Access Denied"); }
 */
class TPL {
	//------------------------------------------------------------------
	function TPL(){}
	//------------------------------------------------------------------
	/**
	 * TPL::reset();
	 * 重置模板变量列表
	 * @return 无返回值
	 */
	function reset(){
		$GLOBALS[V_GLOBAL_NAME]['TPL'] = array();
	}
	//------------------------------------------------------------------
	/**
	 * TPL::assign($k,$v=null);
	 * 给模板变量赋值，类似SMARTY
	 * 使用实例：
	 * TPL::assign('var_name1','var'); 在模板中可以使用  $var_name1 变量
	 * TPL::assign(array('var_name2'=>'var')); 在模板中可以使用  $var_name2 变量
	 * @param $k	当  $k 为字串时 在模板中 可使用以 $k 命名的变量 其值 为 $v
	 * 				当  $k 为关联数组时 在模板中可以使用 $k 的所有索引为变量名的变量
	 * @param $v	当  $k 为字符串时 其值 即为 模板中 以  $k 为名的变量的值
	 * @return 无返回值
	 */

	public static function assign($k,$v=null){
		if ( !isset($GLOBALS[V_GLOBAL_NAME]['TPL']) || !is_array($GLOBALS[V_GLOBAL_NAME]['TPL']) ) {
			$GLOBALS[V_GLOBAL_NAME]['TPL'] = array();
		}
		if (!is_array($k)){
			$GLOBALS[V_GLOBAL_NAME]['TPL'][$k] = $v;
		}else{
			TPL::assignExtract($k);
		}
	}
	//------------------------------------------------------------------
	/**
	 * TPL::assignExtract($data);
	 * 给模板变量赋值
	 * @param $data	关联数组
	 * @return 无返回值
	 */
    public static function assignExtract($data){
		if ( !isset($GLOBALS[V_GLOBAL_NAME]['TPL']) || !is_array($GLOBALS[V_GLOBAL_NAME]['TPL']) ) {
			$GLOBALS[V_GLOBAL_NAME]['TPL'] = array();
		}

		foreach($data as $k=>$v){
			$GLOBALS[V_GLOBAL_NAME]['TPL'][$k] = $v;
		}
	}
	//------------------------------------------------------------------
	/**
	 * TPL::display($_tpl, $_langs=array(), $_ttl=0, $_baseSkin=true);
	 * 显示一个模板
	 * @param $_tpl		模板路由
	 * @param $_langs	语言包，可以是半角逗号隔开的列表，也可以是数组
	 * @param $_ttl		缓存时间 单位秒 （ 未实现 ）
	 * @param $_baseSkin	模板基准目录选项，默认为 true ，将使用系统配置的皮肤目录
	 * @param $_isPipe		是否使用PIPE
	 * @return 无返回值
	 */
    public static function display($_tpl, $_langs=array(), $_ttl=0, $_baseSkin=true, $_isPipe=true){

		if ( !empty($_langs) ){
			if ( !is_array($_langs) ){
				$_langs = explode(",", $_langs);
			}
			foreach ($_langs as $t){
				if(!empty($t)){
					APP::importLang($t);
				}
			}
		}
		
        if (is_array($GLOBALS[V_GLOBAL_NAME]['TPL'])) {
			extract($GLOBALS[V_GLOBAL_NAME]['TPL'], EXTR_SKIP);
		}
		include APP::tplFile( $_tpl, $_baseSkin );
		// 只有需要xpipe的时候才运行
		if ($_isPipe && isset($GLOBALS[V_GLOBAL_NAME]['NEED_XPIPE'])) {
			Xpipe::run();
		}
	}
	
	//------------------------------------------------------------------
	/**
	 * TPL::inc($_tpl, $_langs=array(), $_ttl=0, $_baseSkin=true);
	 * 显示一个inc里面的一个模板
	 * @param $_tpl		模板路由
	 * @param $_langs	语言包，可以是半角逗号隔开的列表，也可以是数组
	 * @param $_ttl		缓存时间 单位秒 （ 未实现 ）
	 * @param $_baseSkin	模板基准目录选项，默认为 true ，将使用系统配置的皮肤目录
	 * @param $_isPipe		是否使用PIPE
	 * @return 无返回值
	 */
    public static function inc($_tpl, $_langs=array(), $_ttl=0, $_baseSkin=false, $_isPipe=true){
		if ( !empty($_langs) ){
			if ( !is_array($_langs) ){
				$_langs = explode(",", $_langs);
			}
			foreach ($_langs as $t){
				if(!empty($t)){
					APP::importLang($t);
				}
			}
		}
		
        if (is_array($GLOBALS[V_GLOBAL_NAME]['TPL'])) {
			extract($GLOBALS[V_GLOBAL_NAME]['TPL'], EXTR_SKIP);
		}
		include APP::tplFile( $_tpl, $_baseSkin );
		
		// 只有需要xpipe的时候才运行
		if ($_isPipe && isset($GLOBALS[V_GLOBAL_NAME]['NEED_XPIPE'])) {
			Xpipe::run();
		}
	}
	
	//------------------------------------------------------------------
	/**
	 * TPL::fetch($tpl,$langs=array(),$ttl=0, $tplDir="");
	 * 获取一个模板解释完后的内容
	 * @param $tpl		模板路由
	 * @param $langs	语言包，可以是半角逗号隔开的列表，也可以是数组
	 * @param $ttl		缓存时间 单位秒 （ 未实现 ）
	 * @param $baseSkin	模板基准目录选项，默认为 true ，将使用系统配置的皮肤目录
	 * @return 模板解释完后的内容，字符串
	 */
    public static function fetch($tpl, $langs=array(), $ttl=0, $baseSkin=true){
		ob_start();
		TPL::display($tpl,$langs,$ttl, $baseSkin, false);
		$data = ob_get_clean();
		return $data;
	}
	//------------------------------------------------------------------
	/**
	 * 输出或者获取一个 HTML 插件
	 * @param $___arg_tpl		模板路由
	 * @param $args		插件变量，是一个关联数组，在插件模板中，数组的下标即是变量名
	 * @param $___arg_baseSkin	模板基准目录选项，默认为 true ，将使用系统配置的皮肤目录
	 * @param $___arg_output	是否直接输出插件HTML代码，当其为FALSE时，返回插件内容	
	 * @return  相应的 HTML  插件代码
	 */
	function plugin($___arg_tpl, $args=array(), $___arg_baseSkin=true, $___arg_output=true){
		if (is_array($args)){
			extract($args, EXTR_SKIP);
		}
		if ($___arg_output){
			include APP::tplFile($___arg_tpl, $___arg_baseSkin);
		}else{
			ob_start();
			include APP::tplFile($___arg_tpl, $___arg_baseSkin);
			$data = ob_get_clean();
			return $data;
		}
	}
	
	
	
	function module($___arg_tpl, $args=array(), $___arg_output=true){
		// 防止被 $args 覆盖
		$___arg_baseSkin = 'modules';
		if (is_array($args)){
			extract($args, EXTR_SKIP);
		}
		if ($___arg_output){
			include APP::tplFile($___arg_tpl, $___arg_baseSkin);
		}else{
			ob_start();
			include APP::tplFile($___arg_tpl, $___arg_baseSkin);
			$data = ob_get_clean();
			return $data;
		}
	}
}