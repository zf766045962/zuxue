<?php
//
	// +----------------------------------------------------------------------
	// | xSmart 
	// +----------------------------------------------------------------------
	// | Copyright (c) 2011 All rights reserved.
	// +----------------------------------------------------------------------
	// | Licensed ( http://www.vi163.com )
	// +----------------------------------------------------------------------
	// | Author:  jiameng1015@126.com
	// +----------------------------------------------------------------------
	//
include('action.abs.php');
class memeber_mod extends action {
	function memeber_list() {
	   if(V('r:hidden')==1){
		    $username   = trim(V('r:username'));
			$email      = trim(V('r:email'));
		    $start_time	= V('r:start_time');//开始时间
			$end_time	= V('r:end_time');//结束时间
			$status	    = V('r:status');//状态
			$query      = array(
				'username'  => $username,
				'email'     => $email,
				'start_time'=> $start_time , 
				'end_time'  => $end_time,
				'status'    => $status 
			);
		}else{
			$query = array();	
		}	
		$page = (int)V('r:page', 1);
		$rows = (int)V('r:perpage', 10);
		$perpage	= (int)V('r:perpage', 10);//每页显示数量
		if ($page < 1) {
			$page = 1;
		}
		$offset = ($page-1) * $perpage;
		TPL::assign('offset', $offset);
		$data = DS('mgr/memeber.getList', '', $query, $perpage, $offset);
		$pager = APP :: N('pager');
		$count = DS('mgr/memeber.getCount', '');
		$page_param = array('currentPage'=> $page, 'pageSize' => $rows, 'recordCount' => $count, 'linkNumber' => 10);
		$pager->setParam($page_param);
		$pager->setVarExtends($query);
		//$pager->setVarExtends($uid);
		TPL :: assign('pager', $pager->makePage());
		TPL::assign('members_lists', $data);
		
		$this->_display('members/memeber_list');
	}
	function del() {
		$id = V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		$result=DR('mgr/memeber.del', '' , $id);
		if($result){//如果成功删除
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
	}
	function locked(){
		$id     = V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		
		$result=DS('mgr/memeber.locked','',$id);
		
		
		if($result){//如果成功锁定
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		}	
	function unlocked(){
		$id     = V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		$result=DS('mgr/memeber.unlocked','',$id);
		if($result){//如果成功锁定
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		}
	
	function edit_memeber(){
		$id =V('r:id');
		$result=DS('mgr/memeber.edit_memeber','',$id);
		TPL::assign('result', $result);
		$this->_display('members/edit_memeber');
		
		}
	function saveEdit(){
		$id       =V('r:id');
		$password =md5(V('r:password'));
		$nickname =trim(V('r:nickname'));
		$email    =trim(V('r:email'));
		$islock   =V('r:islock');
		$avatar   =V('r:avatar');
		$data     =array(
			'password'=>$password,
			'nickname'=>$nickname,
			'email'   =>$email,
			'avatar'  =>$avatar,
			'islock'  =>$islock
		);
		
		$re=DS('mgr/memeber.saveEdit','',$data,$id);
		if($re){
			$gourl='0';
			$msgstr='修改成功';
		}else{
			$gourl='-2';
			$msgstr='操作失败';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
			exit();
		}
	
	
	
}
