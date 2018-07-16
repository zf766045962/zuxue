<?php
/* 
// 角色管理
 */ 
include('action.abs.php');
class admingroup_mod extends action{
		var $p=array( 
			'app'=>'mgr',
			'mod'=>'role',
			'method'=>'all'
		);

	function admingroup_mod() { 
		parent :: action();
	}

	function default_action() 
	{
		$page = (int)V('g:page', 1);
		$each = (int)V('g:each', 15);
		$offset = ($page -1) * $each;
		//获取一级分类
		$list=DS('mgr/admingroup.getAdmingroupList');
		//获取用户列表
        foreach($list as $value) 
		{
			$userinfo = DR('mgr/admingroup.getAdminByGid', '', (int)$value['gid']);
			if(!empty($userinfo['rst']))
			{
				$value['userinfo'] = $userinfo['rst'];
				//var_dump($value);
				$rs[$value['gid']] = $value;
			}
        }
		//获取二级分类
		$childlist = array();
		$childuser = array();
        foreach($list as $value) 
		{
			$child = DR('mgr/admingroup.getGroupChildByGid', '', (int)$value['gid']);
			if(!empty($child['rst']))
			{
				$value['childlist'] = $child['rst'];
				$childlist[$value['gid']] = $value;
			}
			if(isset($childlist[$value['gid']]["childlist"]))
			{
				foreach($childlist[$value['gid']]["childlist"] as $value)
				{
					$userinfo = DR('mgr/admingroup.getAdminByGid', '', (int)$value['gid']);
					if(!empty($userinfo['rst']))
					{
						$value['userinfo'] = $userinfo['rst'];
						$childuser[$value['gid']] = $value;
					}
				}
			}
        }
		
		
		$count = count($list);
		$pager = APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count, 'linkNumber' => 10);
		$pager->setParam($page_param);
		
		TPL::assign('pager', $pager->makePage());
		TPL::assign('list', $list);
		TPL::assign('rs', $rs);
		TPL::assign('childInfo', $childlist);
		TPL::assign('childUser', $childuser);
		TPL::display('mgr/admin/admingroup_list','',0,false);
	}
	
	
	//为角色增加管理员
	function roleAddAdmin(){
		TPL::display('mgr/admin/role_add_admin','',0,false);
	}
	
	//搜索管理员	
	function searchAdmin(){
		$nickname = V('p:keyword', '');
		$page = (int)V('g:page', 1);
		$each = (int)V('g:each', 5);
		$offset = ($page -1) * $each;
		
        if(empty($nickname)) {
				exit('{"state":"401", "msg":"关键字为空"}');
        }

		$rss = $rst = '';
		$rss = DR('mgr/userCom.getByName', '', $nickname, $offset, $each);
        if(empty($rss['rst'])) {
				exit('{"state":"402", "msg":"没搜到相关用户"}');
        }
		 $rst=$rss['rst'];
         $count = count($rst);

		 $pager = APP :: N('pager');
		 $page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count, 'linkNumber' => 10);
		 $pager->setParam($page_param);

	}
	
	//增加管理员组（角色）

	function admingroupAdd()
	{
		$pgid = V('g:pgid');
		if(intval($pgid) == 0 || empty($pgid))
		{
			$pgid = "";
		}
		$rs=DS('mgr/admingroup.getAdminAllgroupList');	//获取所有管理组列表
		TPL::assign('list',$rs);
//		TPL::assign('childlist',$childlist);
		TPL::assign('pgid',$pgid);
		TPL::display('mgr/admin/admingroup_add','',0,false);
	}
	
	function admingroupEdit()
	{
	
		$gid = V('g:gid');
		$pgid = "";
		$rs=DS('mgr/admingroup.getAdminAllgroupList');	//获取所有管理组列表
		$data=DS('mgr/admingroup.getAdmingroupByGid','',$gid);
		TPL::assign('pgid',$pgid);
		TPL::assign('list',$rs);
		TPL::assign('data',$data);
		TPL::display('mgr/admin/admingroup_add','',0,false);
	}
	
	
	//保存权限
	function savePermit(){
		$gid = (int)V('r:gid', 0);
		if(!$gid) {
			$this->_error('不存在管理组！',  array('default_action'));
		}
			
		$apps=V('r:all');
		//var_dump($apps);

		foreach($apps as $app){
			$data[$app]=array();
			$items=V('r:'.$app.'_item');
			$all_items=V('r:'.$app.'_all_item');
			foreach($all_items as $item){
				$data[$app][$item]='0';
			}
			if(isset($items)){
				foreach($items as $item){
					$data[$app][$item]='1';
				}
			}
		}
		$json=$this->JSON($data);
		$permissions=array('permissions'=>$json,'gid'=>$gid);
			
		$result = DR('mgr/admingroup.permission_set', '', $permissions);
		
		if($result['errno']) {
			$this->_error('模块英文名重复，需要在本应用下唯一',  array('default_action'));
		}

		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;

	}
	
	//保存权限
		/*  
		权限-》路由模式  不是所有路由都被记录
		          缺少的路由是 提交之后的页面路由，或者在页面中的调用的
				  1，怎么加上去  
				  		添加路径的时候  添上相应的路由？  难度出现在程序员这里.
						多个权限，用什么隔开？ $$
				  2，修改路径的时候
				  		权限部分也要修改吗
							
				  3，赋值权限的时候，选择了这个checkbox的时候，也是keyword中的值，但是
						保存到数据库  json数组时，
						foreach 的时候
		*/

	function savePermitByRoute(){

		//c	是所有分类
		//c1  class1  是所有大类
		//c2  class2  是二级分类
		//c3  class3  是所有最终分类
		//$menu=DR('mgr/sysNav.get_route_all');
		$rs = DS('mgr/sysNav.getRouteByRootid');
		/*$all_route = array();
		foreach($rs as $route){
			$route = explode('$$',$route['keyword']);//取出所有的权限路由。
			foreach($route as $p){
				if(!empty($p)){
					$all_route[$p] = '0';  //重复的覆盖了
				}
			}

		
		}
		$c = V('r:all');
		$data = array();
		foreach($c as $c1){
			if(!empty($c1)){
				$data[$c1] = array();
				$c3_selected = V('r:'.$c1.'_all_item_selected');
				if(isset($c3_selected))
				{
					foreach($c3_selected as $c4)
					{
						if(!empty($c4))
						{
							$p_keyword = explode('$$',$c4);
							foreach($p_keyword as $p)
							{
								$all_route[$p]='1';
							}
							//$data[$c1][$c4]='1';
						}		
					}
				}
			}
		}
		
		$json = json_encode($all_route);*/
		
		$gid = (int)V('r:gid', 0);
		if(!$gid) {
			$this->_error('不存在管理组！',  array('default_action'));
		}
		
		$permissions = array('permissions'=>V('p:permissions'),'gid'=>$gid);
		//var_dump($permissions);	die;
		$result = DR('mgr/admingroup.permission_set', '', $permissions);
		
		if($result['errno']) {
			$this->_error('保存时出错',  array('default_action'));
		}
		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;
	}
	
	//保存组
	function saveAdmingroup(){
	
		$gid 					= V('r:gid', '');
		$pgid 					= V('r:pgid', '0');
		$group_name 			= htmlspecialchars(V('r:group_name'));
		$desc 					= htmlspecialchars(V('r:desc', ''));
		$permissionsId 			= V('r:permissionsId');
		$oldpermissionsId 		= V('r:oldpermissionsId');
		$permissions 			='';
		if($gid)
		{
			//修改模式
			if ($permissionsId != $oldpermissionsId)
			{
				if(!empty($permissionsId) && intval($permissionsId)!=0)
				{
					$rs 								= DS('mgr/admingroup.getPermissionsByGid','',$permissionsId);
					$permissions 						= $rs["permissions"];
					$data = array(
									'gid' 				=>$gid,
									'group_name' 		=> $group_name,
									'desc' 				=> $desc,
									'permissions' 		=> $permissions,
							);
				}
				else
				{
					$data = array(
									'gid' 				=>$gid,
									'group_name' 		=> $group_name,
									'desc' 				=> $desc,
							);
				}
			}
			else
			{
				$data = array(
								'gid' 					=>$gid,
								'group_name' 			=> $group_name,
								'desc' 					=> $desc,
						);
			}
		}
		elseif($pgid)
		{
			//添加子分类
			$permissions = "";
			if($permissionsId)
			{
				$rs 			= DS('mgr/admingroup.getPermissionsByGid','',$gid);
				$permissions 	= $rs["permissions"];
				
			}
			$data = array(
							'gid'						=> $gid,
							'parent_id' 				=> intval($pgid),
							'group_name' 				=> $group_name,
							'permissions' 				=> $permissions,
							'desc' 						=> $desc,
							'group_count' 				=> 0,
							'add_time' 					=> APP_LOCAL_TIMESTAMP,
							'type_id' 					=> 0,
					);
		}
		else
		{
			//新增模式
			$permissions = "";
			if($permissionsId)
			{
				$rs 			= DS('mgr/admingroup.getPermissionsByGid','',$gid);
				$permissions 	= $rs["permissions"];
				
			}
			$data = array(
							'gid'						=> $gid,
							'parent_id' 				=> intval($pgid),
							'group_name' 				=> $group_name,
							'permissions' 				=> $permissions,
							'desc' 						=> $desc,
							'group_count' 				=> 0,
							'add_time' 					=> APP_LOCAL_TIMESTAMP,
							'type_id' 					=> 0,
					);
		}
		$result = DR('mgr/admingroup.set', '',$data);
		if($result)
		{
			APP::ajaxRst(true);
		}//exit(true);
		else
		{
			APP::ajaxRst(false, 40003, '保存错误');
		}
	//	$this->_succ('已经成功保存你的配置', array('default_action'));
	}

	function del()
	{
		$gid 			= (int)V('g:gid', 0);
		$chkdel 		= DS("mgr/admingroup.chkDel",'', $gid);
		if (!$chkdel["flag"])
		{
			$this 		-> _error($chkdel["msg"] ,  array('default_action'));
		}
		if(!$gid) 
		{
			$this 		-> _error('不能删除该项！' ,  array('default_action'));
		}
		$result 		= DR('mgr/admingroup.del' , '' , $gid);
		if($result['errno']) 
		{
			$this 		-> _error('删除失败',  array('default_action'));
		}
		$this 			-> _succ('已经成功保存你的配置', array('default_action'));

	}
	
	//权限模式2
	function setPermitByRoute() {
		$gid=V('r:gid',0);
		$rs=DS('mgr/permitCom.appList');
		$group= DS('mgr/admingroup.getAdmingroupByGid','',$gid);
		$permissions = explode(',',$group['permissions']);
		//if(!empty($permissions)){$permissions=$this->json_to_array($permissions);}
		//if(!empty($permissions)){$permissions=json_decode($permissions,true);}
		//exit;
		$p1=array();
		$n=0;
		if(isset($permissions) && !empty($permissions))
		{
			foreach($permissions as $key=>$p)
			{
				$n++;
				$p1[$key]=$p;
			}
		}
		$menu=DR('mgr/sysNav.get_route_all');//按排序顺序排序//参数一：分类id，默认全部
		TPL::assign('gid',$gid);
		TPL::assign('appList',$rs);
		TPL::assign('menu', $menu);
		TPL::assign('permissions',$permissions);
		
		
		$this->_display('admin/permit_set_route');
	}

	function setPermit()
	{
	
		$gid=V('r:gid',0);
		$rs=DS('mgr/permitCom.appList');
		$group= DS('mgr/admingroup.getAdmingroupByGid','',$gid);
		$permissions=$group['permissions'];
		//if(!empty($permissions)){$permissions=$this->json_to_array($permissions);}
		if(!empty($permissions)){$permissions=json_decode($permissions,true);}
	//	var_dump($permissions);
		TPL::assign('gid',$gid);
		TPL::assign('appList',$rs);
		//TPL::assign('permissions',$permissions);
		TPL::assign('permissions',$permissions);
		TPL::display('mgr/admin/permit_set','',0,false);
	}
	
		
	
	//用户组权限添加
	function permission_set(){
	//todo..
		$gid = (int)V('g:gid', 0);
		if(!$gid) {
			$this->_error('不存在用户组！',  array('default_action'));
		}
			
		$result = DR('mgr/role.permission_set', '', $gid);
		
		if($result['errno']) {
			$this->_error('删除失败',  array('default_action'));
		}

		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;
	}
	

	function JSON($array) {
		//arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
	}
	
	function json_to_array($json_array){
		$arr=array();
		if(isset($json_array)) return false;
		foreach($json_array as $k=>$w){
			if(is_object($w)) $arr[$k]=json_to_array($w); //判断类型是不是object
			else $arr[$k]=$w;
		}
		return $arr;
	}


















	//------------暂时不用的函数
	
	
	
	
		function test_check($menu){
			$str="mgr/feedback','id=3";
		//	var_dump($menu);
			 foreach(array_keys($menu) as $class1){
			 	if(isset($menu[$class1][$str]) && $menu[$class1][$str]==1){
					return true;
				}
			 }
			 return false;
			
	}
	function test(){
		$db = APP :: ADP('db');
		$rs = $db->getrow('select * from '.$db->getTable(T_ADMIN_GROUP).' where gid=68');
		$permissions=$rs['permissions'];
		$permissions=json_decode($permissions,true);
		var_dump($permissions); 
		
	}

	
	
}
