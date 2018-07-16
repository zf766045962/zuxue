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
		/*$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");*/
		$key 			= V("r:key");
		/*$adname 		= $this->adnamelist[$bid-1];
		$classlist 		= DS("mgr/ad.getclasslist",'',$bid);*/
		
		$where = " id > 0";
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		$question	=	DS("publics2.page_list","",30,$where,"inputtime desc",V('r'),"question");
		
		var_dump($question);die;
		TPL :: assign("question",$question['info']);
		TPL :: assign("pagehtml",$question['pagehtml']);
		$this->_display('ad/index');
	}
	
	
	function replyList()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		$adname 		= $this->adnamelist[$bid-1];
		$classlist 		= DS("mgr/ad.getclasslist",'',$bid);
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		$pagesize 		= (int)V('g:pagesize', 15);
        $count 			= DS("mgr/ad.getadlist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'adNumber' => 10);
		$pager 			-> setParam($page_param);
		$adlist 		= DS("mgr/ad.getadlist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"list");
		$pager			->setVarExtends(array('classid' => $classid,'recommend'=>$recommend,'audit'=>$audit,'top'=>$top,'key'=>urlencode($key)));
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('adlist',$adlist);
		TPL :: assign('bid',$bid);
		TPL :: assign('adname',$adname);
		TPL :: assign('classlist',$classlist);
		$this->_display('ad/index');
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
		$data = DR("mgr/ad.update",'',$data,$id,$flagtype,$flagvalue);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('adlist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function delad()
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
		$data = DR("mgr/ad.delad",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('adlist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
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
			$info = DS("mgr/ad.getadinfo",'',$id);
		}
		$adname 		= $this->adnamelist[$bid-1];
		$classlist 		= DS("mgr/ad.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('adname' 	, $adname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('ad/add');
	}
	
	function savead()
	{
		$data 				= V("r:data");
		$imgurl 			= V("r:imgurl");
		$data["imgurl"] 	= $imgurl;
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
			$data[$rs] = F("filter.str",$data[$rs],"string");
		}
		if(intval($data["classid"])==0 || intval($data["bid"])==0)
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
		$result = DR("mgr/ad.savead",'',$data,$data["id"]);
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
		$adname 		= $this->adnamelist[$bid-1];
		$classlist 		= DS("mgr/ad.getclasslist",'',$bid);
		TPL :: assign('bid',$bid);
		TPL :: assign('adname',$adname);
		TPL :: assign('classlist',$classlist);
		$this->_display('ad/classlist');
	}

	//添加分类
	function addclass()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/ad.getinfo",'',$id);
		}
		$adname 		= $this->adnamelist[$bid-1];
		$classlist 		= DS("mgr/ad.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('adname' 	, $adname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('ad/addclass');
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
		$data = DR("mgr/ad.saveclass",'',$data,$id);
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
			$data = DR("mgr/ad.delclass",'',$id);
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
