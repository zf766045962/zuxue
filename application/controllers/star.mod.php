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
class star_mod extends action
{
	/*************************************************明星模板*******************************************/
		 
	function default_action()
	{
		$this->index();
		
	}
	
	function index(){
		
		$star		=	DS("publics.page_list","",24,"id > 0"," inputtime desc",V("r"),"star_student");
		//var_dump($star);die;
		TPL :: assign("star",$star['info']);
		TPL :: assign("pagehtml",$star['pagehtml']);
				
		$link_list 	= 	DS('publics._get','','linkage',' parentid = 0 and keyid = 1');
		
		TPL :: assign('link_list',$link_list);    
		
		TPL :: display("star");
		
	}
	
	function videos(){
		$stuId	=	V('r:stuId');
		$star	=	DS("publics._get","","star_student","id=".$stuId);
		
		TPL :: assign('star',$star[0]);
		TPL :: display('videos');
	}
	
}
