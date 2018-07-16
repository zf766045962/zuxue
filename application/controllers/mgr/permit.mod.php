<?php
/* 
//

 */
include('action.abs.php');
class permit_mod extends action{
		var $p=array(
			'app'=>'mgr',
			'mod'=>'role',
			'method'=>'all'
		);

	function permit_mod() { 
		parent :: action(); 
		
	}
	function default_action()
	{
		$rs=DS('mgr/permitCom.appList');
		
		TPL::assign('appList',$rs);
		TPL::display('mgr/admin/app_list','',0,false);
	}


	//增加管理员组（角色）
	function appAdd(){
		$keys = array(
				'app_name','id'
				);
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));
			if(!empty($_temp) || $_temp == '0'){
				$data[$key] = $_temp;
			}
		}
		if(isset($data['app_name'])){
			$rs=DS('mgr/permitCom.getAppByName','',$data['app_name']);
			TPL::assign('data',$rs);
		}
		TPL::display('mgr/admin/app_add','',0,false);
	}
	function appSave(){
		//$app=V("r:edittype");
		//
		$keys = array(
				'app_name','app_title','orderid','desc','id'
				);
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));
			if(!empty($_temp) || $_temp == '0'){
				$data[$key] = $_temp;
			}
		}
		if(V('r:id')=='' ||(V('r:app_name1')&&(V('r:app_name')!==V('r:app_name1')))){
			if(DS('mgr/permitCom.getAppByName','',$data['app_name'])){		
				$msg='英文名重复';
				//exit(true);
				APP::ajaxRst(false, 40003, $msg);
			}
		}
		$rs=DS('mgr/permitCom.setApp','',$data,V('r:id'));
		if($rs) APP::ajaxRst(true);//exit(true);
		
		//{echo '32323' ;exit(true);}				
		
		//APP::ajaxRst(true, 0, $msg);

		
		
		
				//	exit;
		//	exit('FALSE');
		//	exit(true);
		//TPL::display('mgr/admin/app_list','',0,false);
	}
	
	function app_edit(){
		$app=V("r:edittype");
		TPL::assign('app', $app);
		TPL::display('mgr/admin/app_edit','',0,false);
	}
	
	//模块列表
	
	function moduleAdd(){
		$keys = array(
				'app_name','id','app_title','module_name'
				);
		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));
			if(!empty($_temp) || $_temp == '0'){
				$data[$key] = $_temp;
			}
		}
		//var_dump($app);
		//$module=DS('mgr/permitCom.getModuleByAppname','',$app['app_name']);
		TPL::assign('data', $data);
		if(isset($data['module_name'])&&!empty($data['module_name'])){
			$module=DS('mgr/permitCom.getModuleByName','',$data['app_name'],$data['module_name']);
			TPL::assign('module', $module);
		}
		TPL::display('mgr/admin/app_module_set','',0,false);
	}
	//保存或者设置模块
	function moduleSave(){
		
		$data=array(
			'module_title'=>V("r:module_title")	,
			'module_name'=>V("r:module_name")		,
			'app_name'=>V("r:app_name")		,
			'desc'=>V("r:desc")		,
			'id'=>V("r:id")		,
		);
		
		if(V('r:id')=='' ||(V('r:module_name1')&&(V('r:module_name')!==V('r:module_name1')))){
			if(DS('mgr/permitCom.getModuleByName','',$data['app_name'],$data['module_name'])){		
				$msg='模块英文名重复，需要在本应用下唯一';
				//exit(true);
				APP::ajaxRst(false, 40003, $msg);
			}
		}
		
		$rs=DS('mgr/permitCom.setModule','',$data);
		if($rs)	APP::ajaxRst(true);
	}


	function test(){
		$data=array();
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
		var_dump($json);
		
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



///=================







	function app_model_list()
	{
		TPL::display('mgr/admin/app_model_list','',0,false);
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
	
	
	
}
