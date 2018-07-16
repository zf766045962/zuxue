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
class courlist_mod extends action 
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
		$this->courlist();
	}
	
	function courlist()
	{
		$bid 			= intval(V("r:bid"));
		$schoolid 		= intval(V("r:schoolid"));
		$recommend 		= V("r:recommend");
		$audit 			= V("r:audit");
		$top 			= V("r:top");
		$key 			= V("r:key");
		
		$page 			= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		
		$where = "id>0";
		
		if(!empty($schoolid)){
			$where .= " and schoolid = ".$schoolid;	
		}
		
		if(!empty($recommend)){
			$where .= " and recommend = ".$recommend;	
		}
		
		if(!empty($audit)){
			$where .= " and audit = ".$audit;	
		}
		
		if(!empty($top)){
			$where .= " and top = ".$top;	
		}
		
		if(!empty($recommend)){
			$where .= " and title like %' ".$key."'%";	
		}
		
		$info	=	DS('publics2.page_list','',15,$where,'top desc,recommend desc,listorder desc,inputtime desc',V('r'),'courschool');
		//var_dump($info);die;
		
		//所有院校
		$school	= DS("publics2._get","","news","catid=17 and audit = 1");									//var_dump($school);die;
		
		//所有专业
		$couclass	= DS("publics2._get","","couclass","classid > 0 order by lmorder desc");				//var_dump($couclass);die;              
		
		TPL :: assign('info',$info['info']);
		TPL :: assign('pagehtml',$info['pagehtml']);
		TPL :: assign('school',$school);
		TPL :: assign('couclass',$couclass);
		
		//$this->_display('ad/index');
		$this->_display('course/index');
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
		$id 			= V("r:id");
	
		$data = DR("publics2._del",'','courschool','id='.$id);
		if ($data) 
		{
			$this->_succ('操作已成功', array('courlist&bid='.$bid.'&classid='.$classid.'&recommend='.$recommend.'&audit='.$audit.'&top='.$top.'&page='.$page.'&key='.urlencode($key).''));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	//添加信息
	function add()
	{
		$id 			= intval(V("g:id",''));
		
		if(intval($id)>0)
		{
			$info = DS("publics2._get",'','courschool','id='.$id);
		}
		
		//所有院校
		$school	= DS("publics2._get","","news","catid=17 and audit = 1");									//var_dump($school);die;
		
		//所有专业
		$couclass	= DS("publics2._get","","couclass","classid > 0 order by lmorder desc");				//var_dump($couclass);die;
		
		TPL :: assign('info' 		, $info[0]);
		TPL :: assign('school' 	, $school);
		TPL :: assign('couclass' 	, $couclass);
		$this->_display('course/add');
	}
	
	function savead()
	{
		$data 				= V("r:data");
		$thumb 				= V("r:imgurl");
		$data["thumb"] 		= $thumb;
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
		/*if(intval($data["classid"])==0 || intval($data["bid"])==0)
		{
			$this->_error('非法进入！', 'javascript:history.go(-1);');
		}*/
		if(!isset($data["inputtime"])||empty($data["inputtime"])){
			$data['inputtime']	=	time();
			$data['updatetime']	=	time();
		}else{
			$data['inputtime']	=	strtotime($data['inputtime']);
			$data['updatetime']	=	$data['inputtime'];
		}
		if($data['id']){
			$result = DR("publics2._update",'',$data,'courschool','id',$data["id"]);
		}else{
			$result = DR("publics2._save",'',$data,'courschool');	
		}
		
		if ($result) 
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
