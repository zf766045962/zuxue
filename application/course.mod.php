<?php
/**************************************************
*  Created:  2013-03-06
*
*  默认首页
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class course_mod extends action
{
	//新闻列表
	function default_action()
	{
		$catid		=	V("r:catid",24);
		TPL :: assign("catid",$catid);
			
		$classInfo	=	DS("publics.get_message","",$catid,"classid","article_class");	
		TPL :: assign("classInfo",$classInfo);
		
		//新闻资讯
		$news		=	DS("publics.get_message","",$catid,"classid","article_class");		//var_dump($news);die;	
		TPL :: assign("news",$news);
		
		$courseList	=	DS("publics.page_list","",84,"id > 0","listorder desc,inputtime desc",V("r"),"course");
		//var_dump($newsList);die;
		TPL :: assign("courseList",$courseList['info']);
		TPL :: assign("pagehtml",$courseList['pagehtml']);
		
		
		TPL :: display('course');
	}
	
	function course_detail(){
		
		$nid			=	V("r:nid");
		
		$catid		=	V("r:catid",24);
		TPL :: assign("catid",$catid);
			
		$classInfo	=	DS("publics.get_message","",$catid,"classid","article_class");	
		TPL :: assign("classInfo",$classInfo);
		
		//新闻资讯
		$news		=	DS("publics.get_message","",$catid,"classid","article_class");		//var_dump($news);die;	
		TPL :: assign("news",$news);
		
		$news_content	=	DS("publics.get_message","",$nid,"id","course");					//var_dump($news_content);die;
		TPL :: assign("news_content",$news_content);
		
		TPL :: display("course_detail");	
	}
/************************************************************************************************/
}
