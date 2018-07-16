<?php
/**************************************************
*  Created:  2012-3-12
*
*  友情链接管理系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class questionReply_mod extends action 
{
	//友情链接系统初始化板块
	var $adnamelist = array(
						0 => "广告管理",
						1 => "友情链接",
						2 => "广告管理"
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->adlist();
	}
	
	function questionList()
	{

		$user 			= V("r:user");
		$ques 			= V("r:ques");
		
		$where			= "id > 0";
		
		if(!empty($user)){
			$where	.=	" and uname=".$user;	
		}
		
		if(!empty($ques)){
			$where	.=	" and askquiz like '%".$ques."%'";	
		}
		
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		$question	=	DS("publics2.page_list","",30,$where,"inputtime desc",V('r'),"question");
		
		TPL :: assign("question",$question['info']);
		TPL :: assign("pagehtml",$question['pagehtml']); 
		$this->_display('que_rep/questionList');
	}
	 
	
	function replyList()
	{
		$key 			= V("r:key");
		
		$where			= "id > 0";
		
		
		if(!empty($key)){
			$where	.=	" and content like '%".$key."%'";	
		}
		
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		$reply	=	DS("publics2.page_list","",30,$where,"inputtime desc",V('r'),"question_reply");
		
		TPL :: assign("reply",$reply['info']);
		TPL :: assign("pagehtml",$reply['pagehtml']); 
		$this->_display('que_rep/replyList');
	}
	
	
	
	function delad()
	{
		$page 			= V("r:page");
		if($page==0)
		{
			$page =1;
		}
		$user 			= V("r:user");
		$ques 			= V("r:ques");
		$realname 		= V("r:realname");
		$id 			= V("r:id");
		$flagtype 		= V("r:flagtype");
		$flagvalue 		= intval(V("r:flagvalue"));
		$data = DR("mgr/ad.delad1",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('questionList&page='.$page.'&user='.urlencode($user).'&ques='.urlencode($ques)));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//删除回复信息
	function delad1()
	{
		$page 			= V("r:page");
		if($page==0)
		{
			$page =1;
		}
		$key 			= V("r:key");
		$id 			= V("r:id");
		$flagtype 		= V("r:flagtype");
		$flagvalue 		= intval(V("r:flagvalue"));
		$data = DR("mgr/ad.delad2",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('replyList&page='.$page.'&key='.urlencode($key)));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	
}
