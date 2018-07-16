<?php
/* 
// 角色管理

 */ 
include('action.abs.php');
class org extends action{
		var $p=array( 
			'app'=>'mgr',
			'mod'=>'role',
			'method'=>'all'
		);

	function org_mod() { 
		parent :: action(); 
		
	}
//class usergroup_mod{ 
	function default_action() {
		$page = (int)V('g:page', 1);
		$each = (int)V('g:each', 15);
		$offset = ($page -1) * $each;
		$list=DS('mgr/admingroup.getAdmingroupList');
        foreach($list as $value) {
              $userinfo = DR('mgr/admingroup.getAdminByGid', '', (int)$value['gid']);
              if(!empty($userinfo['rst'])){
				  $value['userinfo'] = $userinfo['rst'];
				  //var_dump($value);
				  $rs[$value['gid']] = $value;
			  }
        }
		
				// print_r($rs);
		 $count = count($list);
		 $pager = APP :: N('pager');
		 $page_param = array('currentPage'=> $page, 'pageSize' => $each, 'recordCount' => $count, 'linkNumber' => 10);
		 $pager->setParam($page_param);
		
		 TPL :: assign('pager', $pager->makePage());
		TPL::assign('list', $list);
		TPL::assign('rs', $rs);
	
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

	function admingroupAdd(){
		$rs=DS('mgr/admingroup.getAdmingroupList');	//获取所有管理组列表
		TPL::assign('list',$rs);
		TPL::display('mgr/admin/admingroup_add','',0,false);
	}
	
	
	//保存权限
	
	function savePermit(){
		$gid = (int)V('r:gid', 0);
		if(!$gid) {
			$this->_error('不存在管理组！',  array('default_action'));
		}
			
		$apps=V('r:all');
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
			//$this->_error('删除失败',  array('default_action'));
				$msg='模块英文名重复，需要在本应用下唯一';
				//exit(true);
				APP::ajaxRst(false, 40003, $msg);
		}

		//$this->_succ('已经成功保存你的配置', array('default_action'));
		APP::ajaxRst(true);
		exit;

	}
	
	function test(){
		$db = APP :: ADP('db');
		$rs = $db->getrow('select * from '.$db->getTable(T_ADMIN_GROUP).' where gid=68');
		$permissions=$rs['permissions'];
		$permissions=json_decode($permissions,true);
		var_dump($permissions); 
		
	}
	//保存组
	function saveAdmingroup(){
	
		$gid = V('r:gid', '');
		$group_name = htmlspecialchars(V('r:group_name'));
		$desc = htmlspecialchars(V('r:desc', ''));
		$permissionsId = V('r:permissionsId');
		
		if($gid){
		
			
			$data = array(
							'gid'	=>$gid,
							'group_name' => $group_name,
							'desc' => $desc,
					);
		}
		else{
			if($permissionsId){
				$permissions=DS('mgr/admingroup.getUsergroupByGid','',$gid);
			}
			$data = array(
							'gid'	=>$gid,
							'group_name' => $group_name,
							'permissions' => $permissions,
							'desc' => $desc,
							'group_count' => 0,
							'add_time' => APP_LOCAL_TIMESTAMP,
							'type_id' => 0,
					);
		
		}
		
		
		$result = DR('mgr/admingroup.set', '',$data);
		
		if($result) APP::ajaxRst(true);//exit(true);
		else 	APP::ajaxRst(false, 40003, '保存错误');

	//	$this->_succ('已经成功保存你的配置', array('default_action'));
	
	}
	function getUsergroupByGid(){
		
		$gid = (int)V('g:id', 0);
		$action = V('g:action', '');
		
		//获取页首设置
		$usergroup = DR('mgr/role.getUsergroupByGid','',$gid);
		$data = $usergroup['rst'];
		
		if($gid) {
			APP::ajaxRst($data[0]);
			exit;
		}

	}
	
	function del(){
		$gid = (int)V('g:gid', 0);
		if(!$gid) {
			$this->_error('不能删除该项！',  array('getLink'));
		}
			
		$result = DR('mgr/role.del', '', $gid);
		
		if($result['errno']) {
			$this->_error('删除失败',  array('default_action'));
		}

		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;

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

	
	
	
}
