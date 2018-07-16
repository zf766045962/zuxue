<?php
/**************************************************
*  Created:  2015-04-22
*
*  默认首页
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class courJob_mod extends action
{
	//首页
	function index()
	{
		$c_list = DS('publics._get','','article_class',' classid = '.V('r:cid'));
		TPL :: assign('clist',$c_list[0]);
		
		$where = '';
		if(V('r:cid')){
			$where .= ' and catid = '.V('r:cid');
		}
		$order = ' updatetime ';
		
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('course.getTotal','','system',$where);
		//var_dump($total);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		$sys_list = DS('course.getData','','system',$where,$order,$limit);
		TPL :: assign('catid',V('r:cid','4'));
		TPL :: assign('slist',$sys_list);
		TPL :: display('job/index');
	}
	
	function jobCon(){
		
		$sid = V('r:sid');
		$catid 	= V('r:catid','4');
		//体系内容页 
		$sys_list = DS('publics._get','','system',' id = '.$sid);
		TPL :: assign('slist',$sys_list[0]);
		
		//热门课程排行榜
		$hot_list = DS('publics._get','','system',' catid=2 and  FIND_IN_SET("1",exception) order by inputtime desc limit 4');
		TPL :: assign('hot_list',$hot_list);
		
		//章节列表
		$cha_list = DS('publics._get','','chapter',' systemid = '.$sid);
		TPL :: assign('cha_list',$cha_list);
		TPL :: assign('sid',$sid);
		TPL :: assign('catid',$catid);
		TPL :: display('job/jobCon');
	}
	

/************************************************************************************************/

}
