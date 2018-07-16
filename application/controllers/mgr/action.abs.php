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
class action {
		var $userInfo = array();
		var $memu = array(); // 管理后台菜单--系统设置类
		var $memu_content = array(); // 管理后台菜单--内容管理类
		var $menu_click_record = array(); // 用记点击记录
		function _initLanguage(){
			APP::importLang('content');
			APP::importLang('system');
		}

		/**
		 * 初始化菜单
		 */
		function _initMenu() {
			if($_SESSION['XSM_CLIENT_SESSION']['__CLIENT_ADMIN_ROOT'] != 1){
				$rootInfo = DS('mgr/admingroup.getAdmingroupByGid','',$_SESSION['XSM_CLIENT_SESSION']['__CLIENT_ADMIN_ROOT']);
				$rootArr = explode(',',$rootInfo['permissions']);
			}
			define('IN_ADMIN',1);
			$first = DS('mgr/sysNav.getFirst','');//获得一级菜单，按排序值升序
			if(empty($first))  $first=array();
			foreach($first as $key=>$item){
				$this->menu[$item['uunique']]= array(
					'title'=>$item['classname']
					//'classid'=>$item['classid']
				);
			}
			foreach($first as $key=>$item){
			
				//****获取二级菜单********
				$second = DS('mgr/sysNav.getSysarr','',$item['classid']);
				
				if($second){
					
						foreach($second as $key1=>$item1){
							$third = DS('mgr/sysNav.getSysarr','',$item1['classid']);
							if($third){
									$sub=array();
										foreach($third as $key2=>$item2){
											if(isset($rootArr) && !in_array($item2['classid'],$rootArr)){
												continue;
											}
											$sub[]= array(
												'title'=>$item2['classname'],
												//'classid'=>$item2['classid'],
												'url'  =>array($item2['classurl'])
											);	
													
										}
								}else{
									$sub=array();
								}
							$this->menu[$item['uunique']]['sub'][]=array(
								'title'=>$item1['classname'],
								//'classid'=>$item1['classid'],
								'sub'  =>$sub
							);
						
					}
				
				}
				
			}
			
			arsort($this->menu_click_record);
			// 添加常用功能子菜单
			$max = 5;
			$n = 0;
			if (isset($this->menu_click_record) && is_array($this->menu_click_record)) {
				foreach ($this->menu_click_record as $path => $count) {
				//for ($i=0,$count=count($this->menu_click_record); $i<$count; $i++) {
					$index = explode('/', $path);
					/*if (!isset($this->menu[$index[0]]['sub'][$index[1]]['sub'][$index[2]])) {
						continue;
					}
					if(!in_array($this->menu[$index[0]]['sub'][$index[1]]['sub'][$index[2]],$this->menu['home']['sub'][1]['sub'])){
						$this->menu['home']['sub'][1]['sub'][] = $this->menu[$index[0]]['sub'][$index[1]]['sub'][$index[2]];	
					}
					$n++;
					if ($n >= $max) {
						break;
					}*/
					
				}
			}
		}
		
		
		//系统管理类菜单
		function _initMenu_content() {
			if($_SESSION['XSM_CLIENT_SESSION']['__CLIENT_ADMIN_ROOT'] != 1){
				$rootInfo = DS('mgr/admingroup.getAdmingroupByGid','',$_SESSION['XSM_CLIENT_SESSION']['__CLIENT_ADMIN_ROOT']);
				$rootArr = explode(',',$rootInfo['permissions']);
			}
			$first = DS('mgr/sysNav.getFirst','',1);//获得一级菜单，按排序值升序
			$this->menu1=array('sysNav' => array('title' => '系统菜单管理'));
			if(empty($first))  $first=array();
			foreach($first as $key=>$item){
				$this->menu1[$item['uunique']]= array(
					'title'=>$item['classname'],
					'classid'=>$item['classid']
				);
			}
			foreach($first as $key=>$item){	
				//****获取二级菜单********
				$second = DS('mgr/sysNav.getSysarr','',$item['classid']);
				
				if($second){
					
						foreach($second as $key1=>$item1){
							//var_dump($second);
							$third=DS('mgr/sysNav.getSysarr','',$item1['classid']);
							if($third){
									$sub=array();
										foreach($third as $key2=>$item2){
											if(isset($rootArr) && !in_array($item2['classid'],$rootArr)){
												continue;
											}
											$sub[]= array(
												'title'=>$item2['classname'],
												'url'  =>array($item2['classurl'])
											);	
										}
								}else{
									$sub=array();
								}
							$this->menu1[$item['uunique']]['sub'][]=array(
								'title'=>$item1['classname'],
								'sub'  =>$sub
							);
						
					}
				
				}
				
			}
		}

		function _recordClick() {
			$cache_name = 'menu_click_record';

			$record = CACHE::get($cache_name);
			if (!$record || !is_array($record)) {
				$record = array();
			}

			$menu_path = V('g:router', false);
			// 如果要记录菜单点击
			if ($menu_path) {
				$record[$menu_path] =	isset($record[$menu_path])? $record[$menu_path] +1:1;
			}
			CACHE::set($cache_name, $record);
			$this->menu_click_record = $record;
		}

		function action() {
			//var_dump(V('-:app_open/Member'));

			$ajax = V('g:ajax', false);
		//判断是否开启了会员系统，如果是，则要验证会员是否已经登录。
		if(V('-:appmode/member',0)){
			//判断用户是否登录
			if (!USER::isUserLogin()) {
				if ($ajax) {
					//APP::ajaxRst(false, '-1', '用户未登录');
					//exit('{"state":"403", "msg":"您未登录！"}');
				}
				//设定登陆方式，如果没有设定登陆方式，那么自动设定为只有本站账号才可登陆
				$loginType=V('-:sysConfig/login_way',1);
				if($loginType==1){$jumpAct='account.siteLogin';}
				elseif($loginType==2){$jumpAct='account.siteLogin';}
				elseif($loginType==3){$jumpAct='account.siteLogin';}
				
				exit('<script>window.top.location.href = "' . URL($jumpAct,'cb=login&loginCallBack=' . urlencode(URL('mgr/admin.login', '', 'admin.php')), 'index.php'). '"</script>');
				//APP :: redirect(URL('account.gloCheckLogin', '', 'index.php'), 3);
			}
			
		
			//判断管理员是否登录
			if (!$this->_isLogin() && !($this->_getModule() == 'admin' && in_array($this->_getAction() , array('login', 'authcode','chklogin')) )) {
				if ($ajax) {
					APP::ajaxRst(false, '-2', '管理员未登录');
				}
				exit('<script>window.top.location.href = "' . URL('mgr/admin.login', '', 'admin.php'). '"</script>');
				//APP :: redirect(URL('mgr/admin.login', 'admin.php'), 3);
			}
			TPL :: assign('admin_root', $this->_getUserInfo('__CLIENT_ADMIN_ROOT'));
			TPL :: assign('real_name', $this->_getUserInfo('screen_name'));
			TPL :: assign('admin_id', $this->_getUid());
			
			
			
		}//是否开启了会员系统endif
		else{
			if (!$this->_isLogin() && !($this->_getModule() == 'admin' && in_array($this->_getAction() , array('login', 'authcode','chklogin')) )) {
				APP :: redirect(URL('mgr/admin.login', '','admin.php'), 3);
				exit;
			}
		
		}
		//判断是否开启了权限系统。
		if(V('-:appmode/permit',0)){
		
			// 除登录，验证登陆，主页，拿出和取验证码外，其它页面都要进行功能控制
			if (!($this->_getModule() == 'admin' && in_array($this->_getAction() , array('index','login', 'authcode','chklogin')) )) {
			//取得管理组
				if(!($this->_isAllowAccess(USER::uid()))){
					
					exit('对不起，您没有操作权限！');
				}
			}
		}
			Xpipe::usePipe(false);
			$this->_recordClick();
			$this->_initMenu();
			$this->_initMenu_content();
		
			
		}
		
		/**
		 * 是否允许访问
		 * @param $gid int 管理组id
		 * @param $router string 路由
		 * @return boolean true表示为允许
		 */
		function _isAllowAccess($uid,$router='') {
			
			$route_str_default=$route_str=$router;
			if($router==''){
				//获取当前路由
				$route_str=$this->_getController().'/'.$this->_getModule().'.'.$this->_getAction();
				//获取当前路由的第二种形式
				$route_str_default='';
				if($this->_getAction()=='default_action'){
						$route_str_default=$this->_getController().'/'.$this->_getModule();
				}
			}
			//当前的参数,转为数组
			$param=$this->_getParam();
			$param_cur=array();
			if(isset($param) &&  !empty($param)){
				foreach($param as $param_cur_per){
					$aa=explode('=',$param_cur_per);
					$param_cur[$aa[0]]=$aa[1];
				}
			}
			//var_dump($param_cur);
			//exit;
		
			//return true;
			//取得管理组的权限
			//取得当前路由
			//判断当前路由是否在权限表中
			$gid=USER::get('gid');
			$group= DS('mgr/admingroup.getAdmingroupByGid','',$gid);

			$permissions=$group['permissions'];
			if(!empty($permissions)){$permissions=json_decode($permissions,true);}
			else{ exit('您没有权限');}
			
			//第一遍判断 权限，如果有参数，并且权限为1，那么将权限改为2;
			foreach($permissions as $key=>$p){
				$per=explode('&',$key);
				$p1=$per[0];  //将带参数的路径分离，只留路由
				
				//如果权限路由中有参数，并且权限路由值为1，则设定路由值为2
				if((count($per)>1) && ($p==1)) $permissions[$key]=='2';
			}
			
			//第二遍判断
			//权限路径改成 一维数组
			$result=true;  
			foreach($permissions as $key=>$p){
				$per=explode('&',$key);
				$p1=$per[0];  //将带参数的路径分离，只留路由
				
				//如果权限路由中有参数，并且权限路由值为1，则设定路由值为2
				//如果当前路由 等于 权限中的路由,（并且当前参数不为空？）
				//则开始判断是否有权限
				//	if(($p1==$route_str) ||($p1==$route_str_default) || !empty($param_cur)){
				if(($p1==$route_str) ||($p1==$route_str_default)){
					//如果有权限
					if($p==0)	return false;
					elseif($p==1) return true;
					else{
					
						//开始判断权限表中是否有参数，
						//方式：1，先去掉路由，看权限路径是否为空,如果为空，就是有权限
						//2,如果不为空，用=号分离成数组，每个都判断"="之后的是否为"*",
						//	2.1如果是星号，则该参数的权限 为所有参数均可
						//	2.2 如果是具体值，那么参数必须等于具体值
						array_shift($per);	//step1
						if(!empty($per)){
							foreach($per as $per1){
								$per_param=explode('=',$per1);
								if(isset($per2[0])&& isset($per2[1])){	//权限中设定了参数及值
									//对比当前参数及值，权限参数设定了，并且（，
									if($per2[1]=='*') $result=true; 
									else{
										if(isset($param_cur[$per2[0]])){
											 if($param_cur[$per2[0]]==$per2[1]) $result=true;  //赋值相等
											 else return false;
										}else{	//如果路径中没有设定该参数，默认为通过

											  $result=true; 
											  
										}
									}
								}
							 if($result==true) return true;
							
							}
							
							
						}

						return false;
						
					}
					
				
				}
			}
			return false;
			
		}
/*			
	array_shift($per);	//去掉路由，只留参数
				
				// 1，将路由赋值到权限数组
				$permissions[$p1]=$p;
						//	var_dump($p);
			
				if(!empty($per)){	//如果参数不为空
					foreach($per as $per1){	//遍历参数值是否某一个参数值为“* ” ，如果是星号，则该参数的权限 为所有
						$per2=explode('=',$per1);
						if(isset($per2[1])){
							if( $per2[1]=='*') echo $per2[0].'的参数不限';
							else echo $per2[0].'的参数限制为'.$per2[1];
						}
							

					}
					var_dump($per1);
				//	$permissions[$p1]['p']=$per;
				//	var_dump($p2);
				}
				
				//foreach(explode('&',$key) as $p1){
				//	$permissions[$p1]=$p;
				//}
			//var_dump($per);
				
			}
			var_dump($permissions);
			exit;
			//如果没有给路由赋值，则默认检测本页面的路由权限			
			if($router==''){
				$route_str=$this->_getController().'/'.$this->_getModule().'.'.$this->_getAction();
				if(isset($permissions[$route_str]) && $permissions[$route_str]==1){
					var_dump('ok,有权限'); 
					return true;
					
				}
			
				if($this->_getAction()=='default_action'){
					$route_str=$this->_getController().'/'.$this->_getModule();
					if(isset($permissions[$route_str]) && $permissions[$route_str]==1){
						var_dump('ok,有权限2'); 
						return true;
					}
					$route_str=$this->_getController().'/'.$this->_getModule().'.'.$this->_getAction();
					if(isset($permissions[$route_str]) && $permissions[$route_str]==1){
						var_dump('ok,有权限3'); 
						return true;
					}
				}
				var_dump(APP::getRequestRoute());
				var_dump($this->_getParam());
				var_dump('no,没有权限'); 
				return false;
		
			}else{// 检测给定的 路由地址是否有权限
				if(isset($permissions[$router]) && $permissions[$router]==1){
				
					return true;
				}
				
			}
			return false;
*/		

		/**
		 * 得到用户权限
		 * @param $uid int 管理员id
		 * @return array
		 */
		function _getPermissions($uid) {
			static $permissions = array();
			if (isset($permissions[$uid])) {
				return $permissions[$uid];
			}
			//@todo 缓存权限信息
			//@todo 得到用户所属组
			$rs = DS('mgr/adminCom.getAdminByUid','' ,$uid);
			//var_dump($rs);
			if (empty($rs)) {
				return false;
			}
			$group_id = $rs[0]['group_id'];
			
			//@todo 得到用户所属组权限
			$rs = DS('mgr/adminCom.getGroupInfo','' ,$group_id);
			if ($rs && isset($rs['permissions']) && !empty($rs['permissions'])) {
				return $permissions[$uid] = explode(',', $rs['permissions']);
			}
			return false;
		}

		/**
		 * 得到当前用户可以访问的菜单
		 * @param $uid int
		 * @return Array
		 */
		function _getUserMenu($uid,$menu='') {
			$user_menu = array();
			if($menu=='') $menu=$this->menu;
			

			foreach($menu as $key =>$main) {
				$m_menu = array();
				if(isset($main['sub'])){
					foreach ($main['sub'] as $m) {
						$s_menu = array();
						foreach ($m['sub'] as $s) {
							$router = $s['url'][0];
							if(V('-:appmode/permit',0)){//如果开启权限系统
								if ($this->_isAllowAccess($uid, $router)) {
									$s_menu[] = $s;
								}
							}else{	$s_menu[] = $s;
							}
						}
						if (!empty($s_menu)) {
							$m_menu[] = array(
									'title' => $m['title'],
									'sub' => $s_menu
									);
						}
					}
				}
				if (!empty($m_menu)) {
					$user_menu[$key] = array(
							'title' => $main['title'],
							'sub' => $m_menu
							);
				}
			}
			
			return $user_menu;
		}

		/**
		 * 用户是否已登录
		 */
		function _isLogin() {
			return USER::isAdminLogin();
		}

		/**
		 * 得到当前登录用户ID
		 * @return int
		 */
		function _getUid() {
			return USER::aid();
		}

		/**
		 * 得到登录用户信息
		 */
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
		 * 得到action名称
		 * @return string
		 */
		function _getAction() {
				$router_str = APP::getRuningRoute(true);
				return $router_str['function'];
		}
		/**
		 * 得到请求的变量名称
		 * @return string
		 */
		function _getParam($router_str='') {
			if($router_str=='') $router_str= APP::getRuningRoute();
			
			if(!empty($_SERVER['QUERY_STRING'])){
				$router_all=explode('&',$_SERVER['QUERY_STRING']);
				$router=explode('=',$router_all[0]);
				
				//如果当前的类型是 admin.php?m=mgr/admin.abc&id=1,那么当前的值返回为 id=1
				if($router[0]=='m')	array_shift($router_all);
				return $router_all;
			}else{
				return false;
			}
			
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
			APP :: tips(array('msg'=> $msg, 'tpl' => 'mgr/success', 'timeout'=>3, 'location' => $url, 'baseskin'=>false));

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
			$adminNotShowNav = V('-:adminNotShowNav');
			TPL::assign('adminNotShowNav', $adminNotShowNav[PAGE_TYPE_CURRENT]);
			TPL :: display('mgr/' . $tpl, '', 0, false);
		}

		/**
		 * 上传图片
		 *
		 * @param array $config array('field_name' => string, 'upload_path' => string, 'allowed_types' => string, 'thumb' => bool)
		 * 输出json
		 */
		function _upload_pic($config){
			extract($config);
			$field_name = empty($field_name) ? 'pic' : $field_name;
			$allowed_types = empty($allowed_types) ? 'jpg,jpeg,gif,png' : $allowed_types;

			$callback = V('g:callback','');
			$redirect = 'window.location="'.W_BASE_URL.'js/blank.html?rand='.rand(1,PHP_INT_MAX) . '"';
			if(isset($_FILES[$field_name])){
				$f_upload = APP::ADP('upload');
				$fileName = $f_upload->getName();
				if($f_upload->upload($field_name,	$fileName ,P_URL_UPLOAD.'/'.$upload_path.'/', $allowed_types,1)){
					$fileInfo = $f_upload->getUploadFileInfo();
					if ($fileInfo['errcode']) {
						die("<script language=\"javascript\">$callback(".APP::ajaxRst(false, '30'.$fileInfo['errcode'], $fileInfo['errmsg'], true).");$redirect</script>");
					}
					//缩小图片
					if ($thumb) {
						$image = APP::ADP('image');
						if (strtolower(IMAGE_ADAPTER)==='sae'){
							$image->loadFile($fileInfo['webpath']);
							$imageInfo = $image->getImgInfo();
							if($imageInfo['width']>120 || $imageInfo['height']>120){
								$image->resize(120,120);
								$image->save($fileName);
							}
						}else{
							$image->loadFile($fileInfo['savepath']);
							$imageInfo = $image->getImgInfo();
							if($imageInfo['width']>120 || $imageInfo['height']>120){
								$image->resize(120,120);
								$image->save($fileInfo['savepath']);
							}
						}
					}

				}else{
					$errno = '3040050';
					if ($f_upload->getErrorCode()){
						$errno = '30'.$f_upload->getErrorCode();
					}
					die("<script language=\"javascript\">$callback(".APP::ajaxRst(false,$errno, $f_upload->getErrorMsg(), true).");$redirect</script>");
				}

			} else {
				die("<script language=\"javascript\">$callback(".APP::ajaxRst(false, '1010000', 'Parameter can not be empty', true).");$redirect</script>");
			}

			$json = array();
			$result['pic'] = $fileInfo['webpath'];
			if (strtolower(IMAGE_ADAPTER)==='sae') {
				$result['filepath'] = $fileInfo['webpath'];
			} else {
				$result['filepath'] = F('fix_url', $fileInfo['savepath']);
			}

			die("<script language=\"javascript\">$callback(".APP::ajaxRst($result, 0, '', true).");$redirect</script>");
		}

		/**
		 * 批量获取用户信息
		 */
		function _getUserBatchShow()
		{
			$names 		= V('p:names');
			$nameList 	= explode(',', $names);
			$countId 		= count($nameList);
			$result		= array();
			
			if ($countId > 0) 
			{
				//批量获取, 目前最多支持20个人,超过20个人, 分组调用批量接口
				if ($countId > 20) 
				{
					$pageCnt = ceil($count/20);
			
					for ($p=1; $p <=$pageCnt; $p++) 
					{
						$offset = ($p-1) * 20;
						$nameList = array_slice($nameList, $offset, 20);
						$rspTmp = DR('Xsmart/xwb.getUsersBatchShow', FALSE, array(), $nameList);
						if (!empty($rspTmp['errno'])) {
							continue;
						}
						$result = array_merge($result, $rspTmp['rst']);
					}
				} 
				else {
					$rspTmp = DS('Xsmart/xwb.getUserShow', FALSE, '', '', $nameList);
					$result = $rspTmp;
				}
			} 

			APP::ajaxRst($result);
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
		
	//=============permission======================
		//验证是否有权限
		
		function _chkPermit($gid){
			//$usergroup = DR('mgr/role.getUsergroupByGid','',$gid);
			$aciton=$this->_getAction();
			$module=$this->_getModule();
			$controller=$this->_getController();
			
			echo ('<br>action:'.$aciton);
			echo ('<br>module:'.$module);
			echo ('<br>controller:'.$controller);
			
		}
	
	
	
	
		function _permission($app='',$page='',$function=''){
//			$usergroup = DR('mgr/role.getUsergroupByGid','',$gid);
			
			$permission=DS('mgr/mgr.getPermByUid','',USER::aid());
			$permission = $this->json_to_array($permission);
			if(isset($permission[$app][$page][$function])){
			//	var_dump($permission[$app][$page][$function]);
				return $permission[$app][$page][$function];
			}
			elseif(isset($permission[$app][$page]['*'])){
				//var_dump('判断页面权限');
				return $permission[$app][$page]['*'];
			}
			elseif(isset($permission[$app]['*'])){
				//var_dump('判断应用权限');
				return $permission[$app]['*']['*'];
			}
		}
		
		function JSON($array) {
			arrayRecursive($array, 'urlencode', true);
			$json = json_encode($array);
			return urldecode($json);
		}
		
		function json_to_array($json_array){
			$arr=array();
			foreach($json_array as $k=>$w){
				if(is_object($w)) $arr[$k]=$this->json_to_array($w); //判断类型是不是object
				else $arr[$k]=$w;
			}
			return $arr;
		}
		
		
		
		
		
		function chkPermission($p=array()){
		
			if(!($this->_permission($p['app'],$p['mod'],$p['method']))){
					
					$this->_error('您没有权限操作这个模块', array('index'));
			}
		}
			
		
}
