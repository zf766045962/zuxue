<?php
/**************************************************
*  Created:  2014-10-09
*
*  bbs论坛
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class bbs_mod extends action
{
	// 首页
	function default_action()
	{	
		$this->index();	
	}
	
	// 首页
	function index()
	{
			
		TPL :: display('bbs/index');
	}
	
	// 版块
	function forum ()
	{
		/*
			接收参数: null
			
			1. 获取版块一级分类
			返回值：二维数组
				$arr = array(
					0 => array( 'classid'=>1, name=>'魅族科技' ),
					1 => array( 'classid'=>2, name=>'玩物励志' ),
					2 => array( 'classid'=>3, name=>'魅友地盘' ),
					3 => array( 'classid'=>4, name=>'商家活动' ),
					4 => array( 'classid'=>5, name=>'魅友家' ),
					...
				);
		*/
		TPL :: display('bbs/forum');
	}

	// 魅友家
	function group ()
	{
		
		TPL :: display('bbs/group');
	}
	
	// 主题
	function thread ()
	{
		/*
			接收参数: fid  	int  版块id
					filter  int  0/1/2 默认0全部 1推荐 2热门
					order   string  	排序  参数使用数据库排序字段的名称
					page  	int  分页
					
			主题用户的头像需要联合查询出来.
			1. 获取前10条置顶主题
				返回值：二维数组
			2. 获取普通主题 按照回复时间降序排列
				返回值：二维数组
		*/
		$titletop = DS('publics._get','','bbs_forum','fid='.V('r:fid'));	
		TPL :: assign('titletop',$titletop);
		TPL :: display('bbs/thread');
	}
	
	// 主题详细
	function thread_detail()
	{
		/*
			接收参数: authorid  int  作者id  只看该作者功能
					tid  int  主题id
					page  int  分页
					
			1. 主题相关信息及内容 
				返回值:   一维数组
			2. 查询xsmart_bbs_thread当前用户发表最新的主题前三或五条
				返回值:   二维数组
			
			3. 查询xsmart_bbs_post当前主题的所有回帖 
				返回值:   二维数组
			
		*/
		$titletop = DS('publics._get','','bbs_post','pid='.V('r:tid'));	
		
		TPL :: assign('titletop',$titletop);
		TPL :: display('bbs/thread_detail');
	}
	
	// 发表主题
	function add_thread()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数: 一维数组 $arr = $_POST;
			返回值:  jsonString
				账号异常 		 exit( '{"status":-1,"info":"关注成功！"}' );
				发表成功		 exit( '{"status":1,"info":"关注成功！"}' );
				发表失败		 exit( '{"status":0,"info":"关注成功！"}' );
				无权限		 exit( '{"status":2,"info":"关注成功！"}' );
				...
		*/	
	}

	// 回复主题(ajax)
	function replyThread()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数: fid 	int  	版块id 
					tid 	int		主题id
					message text	回复内容
			返回值:  jsonString
				账号异常 		 exit( '{"status":-1,"info":"关注成功！"}' );
				回复成功		 exit( '{"status":1,"info":"关注成功！"}' );
				回复失败		 exit( '{"status":0,"info":"关注成功！"}' );
				无权限		 exit( '{"status":2,"info":"关注成功！"}' );
				...
		*/	
	}
	
	// 回复帖子(ajax)
	function replyPost()
	{
		if(empty($_POST)){
			exit;
		}
		/*
			接收参数: tid 	int		主题id
					pid		int   	帖子id
					comment text	回复内容
			
			返回值:  jsonString
				账号异常 		 exit( '{"status":-1,"info":"关注成功！"}' );
				回复成功		 exit( '{"status":1,"info":"关注成功！"}' );
				回复失败		 exit( '{"status":0,"info":"关注成功！"}' );
				无权限		 exit( '{"status":2,"info":"关注成功！"}' );
				...
		*/
	} 

	// 支持 | 反对 (ajax)
	function supportOrAgainst()
	{
		/*
			接收参数: do 	int		0/1   0反对1支持
					type string  thread/post 主题或者帖子
			
			返回值:  jsonString
				账号异常 		 exit( '{"status":-1,"info":"关注成功！"}' );
				操作成功		 exit( '{"status":1,"info":"关注成功！"}' );
				操作失败		 exit( '{"status":0,"info":"关注成功！"}' );
				无权限		 exit( '{"status":2,"info":"关注成功！"}' );
				...
		*/
	}
	
	// 用户搜索
	function user_search()
	{
		//if(empty($_POST)){
		//	exit;
		///}
		/*
			接收参数：$arr = $_POST	
			返回值：array 二维数组
		*/
		$data = $_POST;
		$uid = $_SESSION['u_uidss'];
		//var_dump($data);
		if($data['precision'] == 1){
			$re = DS('publics._get','','user_info1',"username='".$data['username']."' and uid='".$data['uid']."'");//var_dump($re);die;
			TPL :: assign('re',$re);
			TPL :: display('bbs/user_search');	
		}else{}
		//TPL :: assign('uid',$uid);
		//TPL :: display('bbs/user_search');
	}
	
	// 帖子搜索
	function forum_search()
	{
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/forum_search');
	}

	//魅友家分区
	function group_friend()
	{	
		//beijing_meiyou
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/group_friend');
	}

	//魅友家分区————成员列表
	function group_friendList()
	{
		//beijing_family
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/group_friendList');
	}
	
	//魅友家分区————发帖
	function group_sendSubmit()
	{	
		//beijing_fatie
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/group_sendSubmit');
	}
	
	//魅友家分区————显示发帖内容
	function group_showSubmit()
	{	
		//beijing_fatie
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/group_showSubmit');
	}
	//魅友家分区2
	function group_friendOther()
	{
		//shanghai_meiyou
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/group_friendOther');
	}
	
	//魅友家分区2--讨论区
	function groupFriend_arguement()
	{	
		//if(empty($_POST)){
		//	exit;
		//}
		/*
			接收参数：$arr = $_POST
				
			返回值：array 二维数组
		*/
		TPL :: display('bbs/groupFriend_arguement');
	}
/************************************************************************************************/

	//添加收听
	function add_follow(){
		$uid = $_SESSION['u_uidss'];//echo $uid;
		$fid = V('g:fid');//echo $fid;
		$ure = DS('publics._get','','users',"id='$uid'");
		$fre = DS('publics._get','','users',"id='$fid'");
		$data['uid']       = $uid;
		$data['followuid'] = $fid;
		$data['username']  = $ure[0]['username'];
		$data['fusername'] = $fre[0]['username'];
		$data['dateline']  = time();
		$sre = DS('publics._save','',$data,'user_follow');
		echo $sre;
	}
}
