<?php
/* 
//

 */
include('action.abs.php');
class usergroup_mod extends action
{
	function usergroup_mod() {
		parent :: action();
	}
//class usergroup_mod{
	function default_action() {
		//TPL :: display('mgr/' . $tpl, '', 0, false);
		//TPL::display('test/test1');
		
	
		Xpipe::usePipe(false);
		//$list =  DS('mgr/userRecommendCom.getById');
		//TPL::assign('list', $list);
				
		//$itemGroup = APP::N('itemGroups');

		//$groups = $itemGroup->getItems(USER_CATEGORY_RECOMMEND_ID);

		//TPL::assign('groups', $groups);
		$usergroup=DS('mgr/usergroup.getUsergroup');
		TPL::assign('usergroup', $usergroup);
	
		TPL::display('mgr/usergroup','',0,false);
	}
	//增加管理员组（角色）
	function add(){
		
	
	}
	
	function editusergroup(){
	
		$action = V('p:action', '');
		$g_name = htmlspecialchars(V('p:g_name', ''));
		$g_desc = htmlspecialchars(V('p:g_desc', ''));
		$gid = V('p:id');
		
			$data = array(
							'gid'	=>$gid,
							'g_name' => $g_name,
							'g_desc' => $g_desc
					);
		
		$result = DR('mgr/usergroup.set', '',$data);
		$this->_succ('已经成功保存你的配置', array('default_action'));
	
	}
	function getUsergroupByGid(){
		
		$gid = (int)V('g:id', 0);
		$action = V('g:action', '');
		
		//获取页首设置
		$usergroup = DR('mgr/usergroup.getUsergroupByGid','',$gid);
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
			
		$result = DR('mgr/usergroup.del', '', $gid);
		
		if($result['errno']) {
			$this->_error('删除失败',  array('default_action'));
		}

		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;

	}
	
	//用户组权限添加
	function permission_set(){
	//todo..
		$gid = (int)V('g:gid', 0);
		if(!$gid) {
			$this->_error('不存在用户组！',  array('default_action'));
		}
			
		$result = DR('mgr/usergroup.permission_set', '', $gid);
		
		if($result['errno']) {
			$this->_error('删除失败',  array('default_action'));
		}

		$this->_succ('已经成功保存你的配置', array('default_action'));
		exit;
	}
	
	//用户组权限判断
	function permission($app,$page,$function){
	$permission=array(
		'all'=>array(
			'app'=>'all',
			'page'=>'all',
			'function'=>'all',
			'allow'=>'1',
		),
		'ask'=>array(
			'list'=>array(
						'func1'=>1,	
						'func2'=>1,	
						'func3'=>0,	
					),
			'add'=>array(
						'func1'=>1,	
						'func2'=>1,	
						'func3'=>0,	
					),
			'del'=>array(
						'*'=>'1',	
					),
			'verify'=>array(
						'*'=>'0',	
					),
		),
		'blog'=>array(
			'*'=>array(
						'*'=>'1'
			),
		),
	);
	$permission_json=json_encode($permission);
	
	$permission = json_to_array(json_decode($permission_json));
	
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
		if(is_object($w)) $arr[$k]=json_to_array($w); //判断类型是不是object
		else $arr[$k]=$w;
	}
return $arr;
}
	
	
}
