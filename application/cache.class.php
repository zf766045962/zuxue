<?php 
//----------------------------------------------------------------------
/// cache
class CACHE {
	//------------------------------------------------------------------
	function CACHE (){}
	//------------------------------------------------------------------
	/**
	 * CACHE::getInstance();
	 * 获取当前缓存适配器的实例
	 * @return unknown_type
	 */
	function &getInstance(){
		return APP::ADP('cache',false);
	}
	//------------------------------------------------------------------
	public static function &instance(){
		static $c;
		if(empty($c)) {
			$cache = APP::ADP('cache');
			$c =& $cache;
		}
		return $c;
	}
	//------------------------------------------------------------------
	/**
	 * CACHE::get($key);
	 * 获取缓存
	 * @param $key		缓存存储的 KEY
	 * @return 如果缓存存在并未过期则返回缓存值 ，否则返回   false
	 */
	public static function get($key) {
		//echo "\nGET:".$key."\n";
		$c = & CACHE::instance();
		return $c->get($key);
	}
	//------------------------------------------------------------------
	/**
	 * CACHE::set($key, $value, $ttl = 0) ;
	 * 保存一个缓存
	 * @param $key		缓存  key
	 * @param $value	缓存值
	 * @param $ttl		有效时间 ，单位：秒
	 * @return 失败返回  false
	 */
   public static function set($key, $value, $ttl = 0) {
		//echo "\nSET:".$key."\n";
		$c = & CACHE::instance();
		return $c->set($key, $value, $ttl);
	}
	//------------------------------------------------------------------
	/**
	 * CACHE::delete($key);
	 * 删除一个缓存
	 * @param $key	缓存  KEY
	 * @return 失败返回 false
	 */
	function delete($key) {
		$c = & CACHE::instance();
		return $c->delete($key);
	}
	//------------------------------------------------------------------
	/**
	 * CACHE::gSet($gName, $key, $value, $ttl = 0);
	 * 建立一个缓存组
	 * @param $gName	缓存组名称
	 * @param $id		缓存组中的ID
	 * @param $ttl		有效时间 ，单位：秒
	 * @return 失败返回 false
	 */
	
	function gSet($gName, $id, $value, $ttl = 0){
		//echo "CACHE GSET [$gName, $id, $ttl] \n";
		$gKey = GROUP_CACHE_KEY_PRE.' '.trim($gName);
		$vKey = $gKey.' '.trim($id);
		$gVer = CACHE::get($gKey);
		if (!$gVer){
			$gVer =APP_LOCAL_TIMESTAMP.'_'.rand(1000000,9999999);
			//echo "SET GKEY: $gKey = $gVer \n";
			CACHE::set($gKey , $gVer, 0);
		}
		$gData = array('v'=>$value, 'ver'=>$gVer);
		return CACHE::set($vKey, $gData, $ttl);
	}
	/**
	 * CACHE::gGet($gName, $id);
	 * 获取某个缓存组中的缓存
	 * @param $gName	缓存组名称
	 * @param $id		缓存组中的ID
	 * @return 失败返回 false
	 */
	public static function gGet($gName, $id){
		//echo "CACHE GGET [$gName, $id] \n";
		$gKey = GROUP_CACHE_KEY_PRE.' '.trim($gName);
		$vKey = $gKey.' '.trim($id);
		$gVer = CACHE::get($gKey);
		//echo "GET GKEY: #$gKey# = #$gVer# \n";
		if($gVer){
			$gData = CACHE::get($vKey);
			if (is_array($gData) && $gData['ver']==$gVer){
				return 	$gData['v'];
			}else{
				//echo "CACHE : [$gName, $id] expired\n";
			}
		}
		CACHE::delete($vKey);
		return false;
	}
	/**
	 * CACHE::gDelete($gName);
	 * 删除某个缓存组
	 * @param $gName	缓存组名称
	 * @return 失败返回 false
	 */
	function gDelete($gName){
		$gKey = GROUP_CACHE_KEY_PRE.' '.trim($gName);
		return CACHE::delete($gKey);
	}

	/**
	 * 目前只有SAE下可以使用
	 *
	 */
	function flush() {
		if (XWB_SERVER_ENV_TYPE!=='sae'){
			return false;
		}
		$c = & CACHE::instance();
		return $c->flush();
	}
}
