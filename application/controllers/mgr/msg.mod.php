<?php
include('action.abs.php');

class msg_mod extends action{
	//*******************列表(详细无修改无添加)*********************/
	function index(){
		//获取管理名称
		$cname = DS('mgr/msg.get_classname','',V('r:m'));
		TPL :: assign('navName',$cname);
		//获取留言信息
		$where		= '';
		$msg_info   = DS('mgr/msg.get_msg','',T_DEFINED,$where);
		$page_html  = $msg_info["pagehtml"];
		unset($msg_info["pagehtml"]);
//var_dump($msg_info["info"]);
		TPL :: assign('msg_info',$msg_info["info"]);
		TPL :: assign('type',V('r:type',-1));
		TPL :: assign('page_html',$page_html);

		$this->_display('msg/index');
		
	}
	//*******************列表(无详细可修改可添加)*********************/
	function msg_list(){
		//获取管理名称
		$cname = DS('mgr/msg.get_classname','',V('r:m'));
		TPL :: assign('navName',$cname);
		//获取留言信息
		$where		= '';
		$msg_info   = DS('mgr/msg.get_msg','',T_DEFINED2,$where);
		$page_html  = $msg_info["pagehtml"];
		unset($msg_info["pagehtml"]);
		TPL :: assign('msg_info',$msg_info["info"]);
		TPL :: assign('is_root',V('r:is_root',-1));
		TPL :: assign('page_html',$page_html);
		$this->_display('msg/msg_list');
	}
	
	//*************************详细********************************/
	function detail()
	{
		//获取管理名称
		$cname = DS('mgr/msg.get_classname','','mgr/msg.index');
		TPL :: assign('navName',$cname);
		
		$info   = DS('mgr/msg.get_one','',V('r:id'),T_DEFINED);
		TPL :: assign('info',$info[0]);

		$this->_display('msg/detail');
	}
	
	//***********************添加或修改信息**********************/
	function add(){
		if(V('r:id',0) != 0){
			$info   = DS('mgr/msg.get_one','',V('r:id'),T_DEFINED2);
			TPL :: assign('info',$info[0]);
		}
		$this->_display('msg/add');
	}
	function subm(){
		if(V('r:id') == 0){
			unset($_POST["id"]);
		}
		$table = str_replace('xsmart_','',T_DEFINED2);
		$rs   = DS('mgr/msg.save_msg','',$_POST,$table);
		if($rs){
			$this->_succ('操作已成功', array('msg_list'));
		}else{
			$this->_error('操作失败', array('msg_list'));
		}
	}
	//************************修改状态***************************/
	function upd()
	{
		$id 			= V("r:id");
		$flagtype 		= V("r:flagtype");
		$flagvalue 		= intval(V("r:flagvalue"));
		$data = DR("mgr/arcticlepublish.update2",'',$id,$flagtype,$flagvalue);
		if (!$data['errno'])
		{
			$this->_succ('操作已成功', array('index'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//*************************删除***************************/
	function del()
	{
		$id = V("r:id");
		$data = DR("mgr/msg.delmsg",'',$id,T_DEFINED);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('index'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	function del2()
	{
		$id = V("r:id");
		$data = DR("mgr/msg.delmsg",'',$id,T_DEFINED2);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('msg_list'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
}
?>