<?php
/**************************************************
*  Created:  2012-3-12
*
*  留言管理系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class message_mod extends action 
{
	//留言管理系统初始化板块
	var $ubbnamelist = array(
						0 => "留言管理",
						
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->newslist();
	}
	function newslist(){
		
		
		//搜索的条件
		
		$name			= V('r:name');			//姓名
		$start_date		= V('r:start_date');	//开始时间
		$stop_date		= V('r:stop_date');		//结束时间
		$bid 			= intval(V("r:bid"));	
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		$pagesize 		= (int)V('g:pagesize', 10);
        $count 			= DS("mgr/message.getnewslist",'','',$name,$start_date,$stop_date,($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 			-> setParam($page_param);
		$newslist 		= DS("mgr/message.getnewslist",'','',$name,$start_date,$stop_date,($page-1)*$pagesize,$pagesize,"list");
		
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('newslist',$newslist);
		
		$this->_display('message/index');
	}
	//查看留言
	function edit()
	{
		$id 		= V("g:id");
		$bid 		= V("g:bid");
		if(intval($id))
		{
			$data = DR("mgr/message.getnewsinfo",'',$id);
			TPL :: assign('info', $data);
			$this->_display('message/edit');
		}
		else
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
	}
	function savemessage(){
		$data 	= V('r:data');
		$id		= V('r:id');
		$rs=DS('mgr/message.savemessage','',$id,$data);
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		if ($rs) 
		{
			$this->_succ('操作已成功', array('newslist&page='.$page));
		}
			$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	//删除留言
	function delmessage()
	{
		$id 		= V("g:id");
		$bid 		= V("g:bid");
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		if(intval($id))
		{
			$data = DR("mgr/message.delnews",'',$id);
			if ($data) 
			{
				$this->_succ('操作已成功', array('newslist&bid='.$bid.'&page='.$page));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
		else
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
	}
	
}
