<?php  

//----------------------------------------------------------------------
class IO {
	//------------------------------------------------------------------
	function IO (){}
	//------------------------------------------------------------------
	/**
	 * IO::getInstance();
	 * 获取当前IO适配器实例
	 * @return IO 实例
	 */
	function getInstance(){
		return APP::ADP('io',false);
	}
	//------------------------------------------------------------------
	public static function &instance(){
		static $c;
		if(empty($c)) {
			$c = APP::ADP('io');
		}
		return $c;
	}
	//------------------------------------------------------------------
	/**
	 * IO::ls($path,$r=false,$info=false);
	 * 获取某个目录的文件列表
	 * @param $path		要处理的目录
	 * @param $r		是否递归子目录
	 * @param $info		是否获取每个文件的文件信息
	 * @return 文件信息列表
	 */
	function ls($path,$r=false,$info=false){
		$c = & IO::instance();
		return $c->ls($path,$r,$info);
	}
	//------------------------------------------------------------------
	/**
	 * IO::write($file,$contents,$append=false);
	 * 写入一个文件
	 * @param $file			目标文件路径，如果目录结构不存在则自动创建
	 * @param $contents		文件内容
	 * @param $append		是否将内容追加到文件末尾，默认为 false 重写文件
	 * @return 写入字节数 失败返回 false
	 */
	public static function write($file,$contents,$append=false) {
		$c = & IO::instance();
		return $c->write($file,$contents,$append);
	}
	/**
	 * IO::read($file);
	 * @param $file		目标文件路径
	 * @return 如果文件存在，返回内容 反之返回 false
	 */
	function read($file) {
		$c = & IO::instance();
		return $c->read($file);
	}
	/**
	 * IO::mkdir($path);
	 * 生成目录结构，创建目录
	 * @param $path		目录结构
	 * @return 成功返回 true 失败返回 false
	 */
	function mkdir($path) {
		$c = & IO::instance();
		return $c->mkdir($path);
	}
	/**
	 * IO::rm($path);
	 * 删除一个路径，如果是目录则删除它的子目录以及文件
	 * @param $path	要删除的目标路径
	 * @return 删除成功 返回 true 反之 返回 false
	 */
	function rm($path) {
		$c = & IO::instance();
		return $c->rm($path);
	}
	/**
	 * IO::info($path,$key=false);
	 * 获取一个文件、目录的信息
	 * @param $path		目标路径
	 * @param $key		如果 $key 为空 返回所有文件信息  反之返回 文件信息中的  $key 项
	 * @return 文件信息
	 */
	function info($path,$key=false) {
		$c = & IO::instance();
		return $c->info($path);
	}
}
	//------------------------------------------------------------------
