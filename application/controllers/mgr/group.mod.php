<?php
/**************************************************
*  Created:  2012-3-12
*
*  群组系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class group_mod extends action 
{
	//群组系统初始化板块
	var $groupnamelist = array(
						0 => "群组",
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->grouplist();
	}
	
	function grouplist()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		//var_dump($classid);
		$groupname 		= $this->groupnamelist[$bid-1];
		$classlist 		= DS("mgr/group.getclasslist",'',$bid);
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		$pagesize 		= (int)V('g:pagesize', 15);
        $count 			= DS("mgr/group.getgrouplist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 			-> setParam($page_param);
		$grouplist 		= DS("mgr/group.getgrouplist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"list");
		$pager			->setVarExtends(array('classid' => $classid,'recommend'=>$recommend,'audit'=>$audit,'top'=>$top,'key'=>urlencode($key)));
		
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('grouplist',$grouplist);
		TPL :: assign('bid',$bid);
		TPL :: assign('groupname',$groupname);
		TPL :: assign('classlist',$classlist);
		$this->_display('group/index');
	}
	
	//更新新闻属性
	function update()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$page 			= V("r:page");
		if($page==0)
		{
			$page =1;
		}
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		$id 			= V("r:id");
		$flagtype 		= V("r:flagtype");
		$flagvalue 		= intval(V("r:flagvalue"));
		$data = DR("mgr/group.update",'',$data,$id,$flagtype,$flagvalue);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('grouplist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function delgroup()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$page 			= V("r:page");
		if($page==0)
		{
			$page =1;
		}
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		$id 			= V("r:id");
		$flagtype 		= V("r:flagtype");
		$flagvalue 		= intval(V("r:flagvalue"));
		$data = DR("mgr/group.delgroup",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('grouplist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//添加信息
	function add()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/group.getgroupinfo",'',$id);
		}
		$groupname 		= $this->groupnamelist[$bid-1];
		$classlist 		= DS("mgr/group.getclasslist",'',$bid);
		$groupname 		= $this->groupnamelist[$bid-1];
		TPL :: assign('groupname' 	, $groupname);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('groupname' 	, $groupname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('group/add');
	}
	
	function savegroup()
	{
		$data 				= V("r:data");
		$imgurl 			= V("r:imgurl");
		$content 			= F("uEditor.inHtml",'content');
		$data["imgurl"] 	= $imgurl;
		$data["content"] 	= $content;
		if(!isset($data["recommend"])||empty($data["recommend"]))
		{
			$data["recommend"] 	= 0;
		}
		if(!isset($data["audit"])||empty($data["audit"]))
		{
			$data["audit"] 		= 0;
		}
		if(!isset($data["top"])||empty($data["top"]))
		{
			$data["top"] 		= 0;
		}
		foreach($data as $rs=>$value)
		{
			if($rs!=="content")
			{
				$data[$rs] = F("filter.str",$data[$rs],"string");
			}
		}
		if(intval($data["classid"])==0 || intval($data["bid"])==0)
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
		$result = DR("mgr/group.savegroup",'',$data,$data["id"]);
		if (!$result['errno']) 
		{
			$this->_succ('操作已成功', array('default_action&bid='.$data["bid"].'&classid='.$data["classid"].''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	
	//分类列表
	function classlist()
	{
		$bid 			= intval(V("g:bid",0));
		$groupname 		= $this->groupnamelist[$bid-1];
		$classlist 		= DS("mgr/group.getclasslist",'',$bid);
		TPL :: assign('bid',$bid);
		TPL :: assign('groupname',$groupname);
		TPL :: assign('classlist',$classlist);
		$this->_display('group/classlist');
	}

	//添加分类
	function addclass()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/group.getinfo",'',$id);
		}
		$groupname 		= $this->groupnamelist[$bid-1];
		$classlist 		= DS("mgr/group.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('groupname' 	, $groupname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('group/addclass');
	}
	
	//保存分类信息
	function saveclass()
	{
		$id 		= V("r:id",'');
		$bid 		= V("r:bid");
		$data = array(
						"bid" 			=> $bid,
						"parentid" 		=> V("r:parentid"),
						"classname" 	=> V("r:classname"),
						"uunique" 		=> V("r:uunique"),
						"lmorder" 		=> intval(V("r:lmorder")),
						"classurl" 		=> V("r:classurl"),
						"readme" 		=> V("r:readme"),
						"keyword" 		=> V("r:keyword"),
						"description" 	=> V("r:description")
					);
		$data = DR("mgr/group.saveclass",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('classlist&bid='.$bid));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}


	//删除分类信息
	function delclass()
	{
		$id 		= V("g:id");
		$bid 		= V("g:bid");
		if(intval($id))
		{
			$data = DR("mgr/group.delclass",'',$id);
			if ($data['rst']) 
			{
				$this->_succ('操作已成功', array('classlist&bid='.$bid));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
		else
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
	}
	
}
