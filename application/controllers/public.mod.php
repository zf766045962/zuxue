
<?php
/**************************************************
*  Created:  2011-10-03
*
*  默认首页
*
*  @Xsmart (C)2006-2099 Nit Inc.
*  @Author liu
*
***************************************************/
class public_mod
{	

	function title()
	{
		//切换图
		$logo_list=DS('publics.get_ad_list','',1,1,1); 
		TPL::assign('logo_list',$logo_list);
		$ad_list=DS('publics.get_ad_list','',1,2,3); 
		TPL::assign('ad_list',$ad_list);
		
		TPL :: display('public/title');
	}

	function footer()
	{
		$article_classlist	= DS('publics.get_ubbclass_list','',6,0); 
		TPL::assign('article_classlist',$article_classlist);
		
		TPL :: display('public/footer');
	}
	function left()
	{
		TPL :: display('public/left');
	}
	
	function default_action(){
		echo '1';	
	}

}
