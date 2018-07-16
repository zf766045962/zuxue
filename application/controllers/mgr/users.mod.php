<?php
/**************************************************
*  Created:  2012-3-12
*
*  会员系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class users_mod extends action 
{
	var $auditarr = array(
						0 => "审核会员",
						1 => "会员管理",
						2 => "禁用会员管理"
					);
	var $audittime = array(
						0 => "申请时间",
						1 => "审核时间",
						2 => "审核时间"
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->userlist();
	}
	
	function userlist()
	{
		$page 				= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		$pagesize 			= (int)V('g:pagesize', 15);
        $count 				= DS('mgr/users.getUsersNum','');
		$pager 				= APP :: N('pager');
		$page_param 		= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 				-> setParam($page_param);
		$userlist 			= DS("mgr/users.getuserlist",'',($page-1)*$pagesize,$pagesize);
		//var_dump($pager->makePage());
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('userlist',$userlist);
		$this->_display('users/index');
	}
	function add(){
		$id				= V('r:id');
		$info			= DS('mgr/users.getUsersInfo','',$id); 
		TPL :: assign('info',$info);
		$this->_display('users/add');
	}
	function saveusers(){
		$id				= V('r:id');	
		$data			= V('r:data');	
		$year			= V('r:year');	//echo $year.'<br>';
		$month			= V('r:month');	//echo $month.'<br>';
		$day			= V('r:day');	//echo $day.'<br>';	
		if(!empty($year)){
			$data['year']	= $year;
		}
		if(!empty($month)){
			$data['month']	= $month;
		}
		if(!empty($day)){
			$data['day']	= $day;
		}
		
		$res	= DS('mgr/users.saveusers','',$id,$data);
		if ($res) 
		{
				$this->_succ('操作已成功', array('userlist'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//状态更新
	function update()
	{	
		$id				= V('r:id');
		$flagtype		= V('r:flagtype');
		$flagvalue		= V('r:flagvalue');
		$audit			= V('r:audit');
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		if(intval($id))
		{
			$res	= DS('mgr/users.update','',$id,$flagtype,$flagvalue);
			if ($res) 
			{
				$this->_succ('操作已成功', array('userlist&page='.$page));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
		else
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
	}

	//删除会员信息
	function del()
	{
		$id 		= V("g:id");
		if(intval($id))
		{
			$data = DR("mgr/users.del",'',$id);
			if ($data['rst']) 
			{
				$this->_succ('操作已成功', array('userlist&page='.$page));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
		else
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
	}
	
}
