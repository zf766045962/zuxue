<?php
/**************************************************
*  Created:  2010-10-18
*
*  后台Action基类
*
*  @Xsmart (C)2006-2099Inc.
*  @Author zhenquan <zhenquan@staff.sina.com.cn>
*
***************************************************/
class wap {
		var $userInfo = array();
		var $memu = array(); // 管理后台菜单--系统设置类
		var $memu_content = array(); // 管理后台菜单--内容管理类
		var $menu_click_record = array(); // 用记点击记录

		/**
		 * 初始化菜单
		 */

		function wap() {
			Xpipe::usePipe(false);
			
			
		}
		function wapStart($title='') {
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?".">"; ?><?php echo '<?xml version="1.0" encoding="utf-8"?>' ;
			echo '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">' ;
			echo '<wml>';
			echo '<card'.' title="'.$title.'">';
			
			
		}
		
		function wapEnd() {
			echo '</card>';
			echo '</wml>';
			
		}
		

		function _getUserInfo($key = '') {
			return USER::get($key);
		}

		/**
		 * 得到控制器名称
		 * @return string
		 */
		function _getController() {

				$router_str = APP::getRuningRoute(true);
				return trim($router_str['path'], '/\\');
		}

		/**
		 * 得到模块名称
		 * @return string
		 */
		function _getModule() {
				$router_str = APP::getRuningRoute(true);
				return $router_str['class'];
		}

		/**
		 * 复到action名称
		 * @return string
		 */
		function _getAction() {
				$router_str = APP::getRuningRoute(true);
				return $router_str['function'];
		}

		/**
		 * 跳转
		 */
		function _redirect($action, $module = false, $controller = false) {
			if (!$action) {
				return;
			}
			$module = $module ? $module : $this->_getModule();
			$controller = $controller ? $controller : $this->_getController();
			$path = $controller . '/' . $module . '.' . $action;
			header('Location:' . APP::mkModuleUrl($path, '', 'admin.php'));
			exit;
		}

		/**
		 * 当前请求方法
		 */
		function _requestMethod() {
			return $_SERVER['REQUEST_METHOD'];
		}

		/**
		 * 操作成功后跳转
		 * @param $msg String 要显示的消息
		 * @param $url String|Array 显示消息3秒后跳转的地址
		 * 如果该参数为数据则为路由方式,其中下标为0表示action,1表示module,2表示controller；
		 * 如果该参数被特别设置为'GET_REFERER'（全大写），则表示使用g:callback获取，没有时才使用$_SERVER['HTTP_REFERER']
		 * @param $data mixed json数据，如果设置该值，则以json方式输出
		 */
		function _succ($msg, $url = null, $data=null) {
			
			
			if ($data !== null) {
				APP::ajaxRst($data);
			}
			if (is_array($url)) {
				if (empty($url[0])) {
					APP :: tips(array('msg'=> $msg, 'tpl' => 'error', 'baseskin'=>false));
				}
				$module = isset($url[1]) ? $url[1]: $this->_getModule();;
				TPL :: assign($this->userInfo);

				$controller = isset($url[2]) ? $url[2] : $this->_getController();
				$url = URL( $controller . '/' . $module . '.' . $url[0]);
			}elseif('GET_REFERER' == $url){
				$url = $this->_getReferer();
			}
			
			
			
			
			if (empty($url)) {
				APP :: tips(array('msg'=> $msg, 'tpl' => 'error','baseskin'=>false));
			}
			
			// 成功后直接调整，不出现成功提示页面, 2011-05-20
			//APP :: tips(array('msg'=> $msg, 'tpl' => 'mgr/success', 'timeout'=>3, 'location' => $url, 'baseskin'=>false));
			
			APP::redirect($url, 3);
		}

		/**
		 * 操作成功后跳转
		 * @param $msg String 要显示的消息
		 * @param $url String|Array 显示消息3秒后跳转的地址,如果该参数为数据则为路由方式,其中下标为0表示action,1表示module,2表示controller,
		 * @param $errno int 如果设置该参数，则返回json结果
		 */
		function _error($msg, $url = null, $errno=null) {
			if ($errno !== null) {
				APP::ajaxRst(false, $errno, $msg);
			}
			if (is_array($url)) {
				if (empty($url[0])) {
					APP :: tips(array('msg'=> $msg, 'tpl' => 'error', 'baseskin'=>false));
				}
				$module = isset($url[1]) ? $url[1]: $this->_getModule();
				$controller = isset($url[2]) ? $url[2] : $this->_getController();
				$url = URL( $controller . '/' . $module . '.' . $url[0]);
			}elseif('GET_REFERER' == $url){
				$url = $this->_getReferer();
			}

			$param = array(
						'msg'=> $msg,
						'tpl' => 'mgr/error',
						'baseskin'=>false
					);

			if ($url) {
				$param += array(
					'timeout'=>3,
					'location' => $url
				);
			}
			APP :: tips($param);
		}

		/**
		 * 当前请求是否为POST方法
		 */
		function _isPost() {
			if (strtolower($this->_requestMethod()) == 'post') {
				return true;
			}
			return false;
		}

		/**
		 * 当前请求是否为GET方法
		 *
		 */
		function _isGet() {
			if (strtolower($this->_requestMethod()) == 'get') {
				return true;
			}
			return false;
		}

		function _display($tpl) {
			TPL :: display('wap/' . $tpl, '', 0, false);
		}

		/**
		 * 更改图片格式为wbmp
		 *
		 * @param array $config array('field_name' => string, 'upload_path' => string, 'allowed_types' => string, 'thumb' => bool)
		 * 输出json
		 */
		function picToWbmp($config){
			//todo..
		}

		/**
		 * 批量获取用户浏览器信息
		 */
			//////////xue:判断浏览器支持的wap类型//////////
		function _getUserBrowser()
		{
			//todo..
			$accpetStr = $_REQUEST['HTTP_ACCEPT'];
			
			if (stristr($accpetStr, 'xhtml')){
				define('WAPTYPE','wap2');
			}else {
				define('WAPTYPE','wap1');
				header("Content-Type: text/vnd.wap.wml");
			}
		}
		
		/**
		 * 先从g:callback获取referer，无则从$_SERVER['HTTP_REFERER']获取
		 * 主要针对IE7及以下在IFRAME获取$_SERVER['HTTP_REFERER']错误的的问题
		 * @todo 来源检查
		 * @param bool $failure_def 如果为空，是否返回mgr/admin.index？默认为是
		 * @return string
		 */
		function _getReferer($failure_def = true){
			$ref = strval(V('g:callback'));
			
			if(empty($ref)){
				$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			}
			
			if(empty($ref) && true == $failure_def){
				$ref = W_BASE_HTTP. URL('mgr/admin.index', null, 'admin.php');
			}
			
			return $ref;
		}
		
}
