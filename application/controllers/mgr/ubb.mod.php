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
class ubb_mod extends action 
{
	//图文系统初始化板块
	var $ubbnamelist = array(
						0 		=> "工程介绍",
						1 		=> "工程理念",
						2 		=> "公益活动",
						3 		=> "医学研究",
						4 		=> "关于我们",
						5 		=> "底部文章",
						6 		=> "关于我们",
						
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$bid 			= intval(V("g:bid",0));
		$classid 		= intval(V("g:classid",0));
		$ubbname 		= $this->ubbnamelist[$bid-1];
		$classlist 		= DS("mgr/ubb.getclasslist",'',$bid); 
		if($classlist[0]['bid']==5||$classlist[0]['bid']==6){
			$classinfo 		= DS("mgr/ubb.getclassname",'',$classid,$bid);  	
		}else{
			$classinfo 		= DS("mgr/ubb.getclassname",'',$classlist[1]['classid'],$classlist[1]['bid']); // var_dump($classinfo);
		}
		if(empty($classinfo))
		{
			F("alert.alerthref","暂时未添加分类，请添加分类！",URL("mgr/ubb.classlist&bid=".$bid));
		}
		
		$classname 		= $classinfo["classname"];
		$classid 		= $classinfo["classid"];
		$info 			= DS("mgr/ubb.getubbinfo",'',$classid);
		TPL :: assign('classname',$classname);
		TPL :: assign('classid',$classid);
		TPL :: assign('bid',$bid);
		TPL :: assign('ubbname',$ubbname);
		TPL :: assign('classlist',$classlist);
		TPL :: assign('info',$info);
		$this->_display('ubb/index');
	}
	
	
	function saveubb()
	{
		$id 			= V("r:id",'');
		$classid 		= intval(V("r:classid"));
		$bid 			= intval(V("r:bid"));
		$imgurl 		= V("r:imgurl");
		$content 		= F("uEditor.inHtml",'content');
		$data 			= array(
								"bid" 			=> $bid,
								"classid" 		=> $classid,
								"imgurl" 		=> $imgurl,
								"content" 		=> $content,
							);
		if(intval($classid)==0 || intval($bid)==0)
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}
		$data = DR("mgr/ubb.saveubb",'',$data,$id);
		if (!$data['errno']) 
		{
			$this->_succ('操作已成功', array('default_action&bid='.$bid.'&classid='.$classid.''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	
	//分类列表
	function classlist()
	{
		$bid 			= intval(V("g:bid",0));
		$ubbname 		= $this->ubbnamelist[$bid-1];
		$classlist 		= DS("mgr/ubb.getclasslist",'',$bid);
		TPL :: assign('bid',$bid);
		TPL :: assign('ubbname',$ubbname);
		TPL :: assign('classlist',$classlist);
		$this->_display('ubb/classlist');
	}

	//添加分类
	function addclass()
	{
		$id 			= intval(V("g:id",''));
		$bid 			= intval(V("g:bid",0));
		$info 			= array();
		if(intval($id)>0)
		{
			$info = DS("mgr/ubb.getinfo",'',$id);
		}
		$ubbname 		= $this->ubbnamelist[$bid-1];
		$classlist 		= DS("mgr/ubb.getclasslist",'',$bid);
		TPL :: assign('info' 		, $info);
		TPL :: assign('bid' 		, $bid);
		TPL :: assign('ubbname' 	, $ubbname);
		TPL :: assign('classlist' 	, $classlist);
		$this->_display('ubb/addclass');
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
		$data = DR("mgr/ubb.saveclass",'',$data,$id);
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
			$data = DR("mgr/ubb.delclass",'',$id);
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
