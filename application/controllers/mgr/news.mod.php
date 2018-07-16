<?php
/**************************************************
*  Created:  2012-3-12
*
*  图文管理系统文件说明
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@赵志强
*
***************************************************/
include('action.abs.php'); 
class news_mod extends action 
{
	//图文系统初始化板块
	
	var $newsnamelist = array(
						0 => "骨骼养护",
						1 => "相关新闻",
						2 => "管理三",
						3 => "管理四",
						4 => "管理五",
						5 => "管理六",
						7 => "管理七",
						8 => "管理八",
						11 => "管理九",
						12 => "管理十",
						13 => "管理十一",
						14 => "管理十二"
						
					);
	function admin_mod() {
		
		parent :: action();
	}

	function default_action()
	{
		error_reporting(0);
		$this->newslist();
	}
	
	function newslist()
	{
		$bid 			= intval(V("r:bid"));
		$classid 		= intval(V("r:classid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		//var_dump($classid);
		$newsname 		= $this->newsnamelist[$bid-1];
		$classlist 		= DS("mgr/news.getclasslist",'',$bid);
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		$pagesize 		= (int)V('g:pagesize', 15);
        $count 			= DS("mgr/news.getnewslist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"count");
		$pager 			= APP :: N('pager');
		$page_param 	= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count["count"], 'linkNumber' => 10);
		$pager 			-> setParam($page_param);
		$newslist 		= DS("mgr/news.getnewslist",'',$bid,$classid,$recommend,$audit,$top,$key,($page-1)*$pagesize,$pagesize,"list");
		$pager			->setVarExtends(array('classid' => $classid,'recommend'=>$recommend,'audit'=>$audit,'top'=>$top,'key'=>urlencode($key)));
		
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('newslist',$newslist);
		TPL :: assign('bid',$bid);
		TPL :: assign('newsname',$newsname);
		TPL :: assign('classlist',$classlist);
		$this->_display('news/index');
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
		$data = DR("mgr/news.update",'',$data,$id,$flagtype,$flagvalue);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('newslist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}

	function delnews()
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
		$data = DR("mgr/news.delnews",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('newslist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//添加信息
	function add()
	{
		error_reporting(0);
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/news.getnewsinfo",'',$id);
		}
		$newsname 		= $this->newsnamelist[$bid-1];
		$classlist 		= DS("mgr/news.getclasslist",'',$bid);
		$newsname 		= $this->newsnamelist[$bid-1];
		TPL :: assign('newsname' 	, $newsname);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('newsname' 	, $newsname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('news/add');
	}
	
	function savenews()
	{
		$data 				= V("r:data");
		$imgurl 			= V("r:imgurl");
		$imgurl1 			= V("r:imgurl1");
		$imgurl2 			= V("r:imgurl2");
		$imgurl3 			= V("r:imgurl3");
		$imgurl4 			= V("r:imgurl4");
		$imgurl5 			= V("r:imgurl5");
		

		
	
		$content 			= F("uEditor.inHtml",'content');
		$content2 			= F("uEditor.inHtml",'content2');
		$content3 			= F("uEditor.inHtml",'content3');
		$content4 			= F("uEditor.inHtml",'content4');
		$data["imgurl"] 	= $imgurl;
		$data["imgurl1"] 	= $imgurl1;
		$data["imgurl2"] 	= $imgurl2;
		$data["imgurl3"] 	= $imgurl3;
		$data["imgurl4"] 	= $imgurl4;
		$data["imgurl5"] 	= $imgurl5;
		

		
		
		$data["content"] 	= $content;
		$data["content2"] 	= $content2;
		$data["content3"] 	= $content3;
		$data["content4"] 	= $content4;

	
	
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
		$result = DR("mgr/news.savenews",'',$data,$data["id"]);
		if (!$result['errno']) 
		{
			$this->_succ('操作已成功', array('default_action&bid='.$data["bid"].'&classid='.$data["classid"].''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	
	//分类列表
	function classlist()
	{
		error_reporting(0);
		$bid 			= intval(V("g:bid",0));
		$newsname 		= $this->newsnamelist[$bid-1];
		$classlist 		= DS("mgr/news.getclasslist",'',$bid);
		TPL :: assign('bid',$bid);
		TPL :: assign('newsname',$newsname);
		TPL :: assign('classlist',$classlist);
		$this->_display('news/classlist');
	}

	//添加分类
	function addclass()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/news.getinfo",'',$id);
		}
		$newsname 		= $this->newsnamelist[$bid-1];
		$classlist 		= DS("mgr/news.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('newsname' 	, $newsname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('news/addclass');
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
						"images" 		=> V("r:images"),
						"lmorder" 		=> intval(V("r:lmorder")),
						"classurl" 		=> V("r:classurl"),
						"readme" 		=> V("r:readme"),
						"keyword" 		=> V("r:keyword"),
						"description" 	=> V("r:description"),
						
					);
		if(!isset($data["classurl"])||empty($data["classurl"]))
		{
			$data["classurl"] 	= 0;
		}
		$data = DR("mgr/news.saveclass",'',$data,$id);
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
			$data = DR("mgr/news.delclass",'',$id);
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
