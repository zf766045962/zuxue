<?php
/**************************************************
*  Created:  2014-07-01
*
*  管理系统文件说明
*
*  @Xsmart (C)2014-2015Inc.
*  @Author @陈壹宁
*
***************************************************/
include('action.abs.php'); 
class eat_mod extends action 
{
	var $linknamelist = array(
		0 => "吃",
		1 => "菜系"
	);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->linklist();
	}
	
	function linklist()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		$linkname 		= $this->linknamelist[$bid-1];
		$classlist 		= DS("mgr/eat.getclasslist",'',$bid);
		// 菜系
		$classlist2 	= DS("mgr/eat.getclasslist",'',2);
		$page 			= (int)V('g:page', 1);
		if($page == 0){
			$page = 1;
		}
		$pagesize 		= (int)V('g:pagesize', 15);
        $count 			= DS("mgr/eat.getlinklist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 			-> setParam($page_param);
		$linklist 		= DS("mgr/eat.getlinklist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"list");
		$pager			->setVarExtends(array('classid' => $classid,'recommend'=>$recommend,'audit'=>$audit,'top'=>$top,'key'=>urlencode($key)));
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('linklist',$linklist);
		TPL :: assign('bid',$bid);
		TPL :: assign('linkname',$linkname);
		TPL :: assign('classlist',$classlist);
		TPL :: assign('classlist2',$classlist2);
		$this->_display('eat/index');
	}
	
	//更新属性
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
		$data = DR("mgr/eat.update",'',$data,$id,$flagtype,$flagvalue);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('linklist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function dellink()
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
		$data = DR("mgr/eat.dellink",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('linklist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//添加信息
	function add()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id) > 0)
		{
			$info 		= DS("mgr/eat.getlinkinfo",'',$id);
			$info_pic 	= DS("mgr/eat.getpicinfo",'',$id);
		}
		$linkname 		= $this->linknamelist[$bid-1];
		$classlist 		= DS("mgr/eat.getclasslist",'',$bid);
		// 选择菜系
		$classlist2 	= DS("mgr/eat.getclasslist",'',2);
		// 获取货币
		$currency 		= DS("mgr/currency.getclasslist",'',1);
		TPL :: assign('info' 		, $info);
		TPL :: assign('info_pic' 	, $info_pic);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('linkname' 	, $linkname);
		TPL :: assign('classlist' 	, $classlist);
		TPL :: assign('classlist2' 	, $classlist2);
		TPL :: assign('currency' 	, $currency);
		$this->_display('eat/add');
	}
	
	function savelink()
	{
		$data 				= V("r:data");
		$data['showPic'] 	= V("r:showPic");
		$data['times']		= date('Y-m-d H:i:s',time());

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
		/*foreach($data as $rs=>$value) //html转义
		{
			$data[$rs] = F("filter.str",$data[$rs],"string");
		}*/
		if(intval($data["classid"]) == 0 || intval($data["bid"]) == 0){
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
		//var_dump($data);die;
		$result = DR("mgr/eat.savelink",'',$data,$data["id"]);
		
		if (!$result['errno'])
		{
			$this->_succ('操作已成功', array('default_action&bid='.$data["bid"].'&classid='.$data["classid"].''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//保存相册信息
	function savepic(){
		extract($_POST);
		foreach($id as $key=>$val){
			$data = array(
				'pid'		=> $pid,
				'imgurl'	=> $imgurl[$key],
				'readme'	=> $readme[$key],
				'type'		=> $type[$key],
				'order'		=> $order[$key],
				'times'		=> date('Y-m-d H:i:s')
			);
			DS("mgr/eat.savepic",'',$data,$val);
		}
		extract($_GET);
		$this->_succ('操作已成功', array('add&t=pic&bid='.$bid.'&classid='.$classid.'&id='.$pid));
	}
	//分类列表
	function classlist()
	{
		$bid 			= intval(V("g:bid",0));
		$linkname 		= $this->linknamelist[$bid-1];
		$classlist 		= DS("mgr/eat.getclasslist",'',$bid);
		TPL :: assign('bid',$bid);
		TPL :: assign('linkname',$linkname);
		TPL :: assign('classlist',$classlist);
		$this->_display('eat/classlist');
	}

	//添加分类
	function addclass()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/eat.getinfo",'',$id);
		}
		$linkname 		= $this->linknamelist[$bid-1];
		$classlist 		= DS("mgr/eat.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('linkname' 	, $linkname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('eat/addclass');
	}
	
	//保存分类信息
	function saveclass()
	{
		$id = V('p:id','');
		unset($_POST['id']);
		$data = DR("mgr/eat.saveclass",'',$_POST,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('classlist&bid='.V('p:bid','')));
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
			$data = DR("mgr/eat.delclass",'',$id);
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
