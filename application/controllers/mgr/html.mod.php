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
include('include/html.class.php'); 
class html_mod extends action 
{
	//友情链接系统初始化板块
	var $linknamelist = array(
						0 => "生成静态"
					);
	function admin_mod() {
		parent :: action();
	}

	function default_action()
	{
		$this->index();
	}
	
	function index()
	{
		$this->_display('html/index');
	}
	
	//首页
	function update_index(){	   
	    $html=new html();
		$db 	= APP :: ADP('db');
		$http_host	= 'http://'.ltrim($_SERVER['HTTP_HOST'],'http://');
		$url	= V('r:url','all');
		switch($url){
			case 'index':
				$str = file_get_contents($http_host.'/index.php?m=index');
				$res=$html->MakeHtmlFile('index.html',$str);
				if($res){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'about':
				$str = file_get_contents($http_host.'/index.php?m=about');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				
				$ubb_list=DS('publics.get_ubbclass_list','',3,0); 
				foreach($ubb_list as $k=>$v){
					$str_view	= file_get_contents($http_host.'/about/view/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.htm');
					$res_view	= $html->MakeHtmlFile('html/about/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.html',$str_view);
					
				}
				if($res&&$res_view){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'service':
				$str = file_get_contents($http_host.'/index.php?m=service');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				
				$service_list=DS('publics.get_ubbclass_list','',2,0);
				foreach($service_list as $k=>$v){
					$str_view	= file_get_contents($http_host.'/service/view/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.htm');
					$res_view	= $html->MakeHtmlFile('html/service/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.html',$str_view);
					
				}
				if($res&&$res_view){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'order':
				$str = file_get_contents($http_host.'/index.php?m=order');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				if($res){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'contact':
				$str = file_get_contents($http_host.'/index.php?m=contact');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				if($res){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'link':
				$str = file_get_contents($http_host.'/index.php?m=link');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				if($res){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;
			case 'map':
				$str = file_get_contents($http_host.'/index.php?m=map');
				$res=$html->MakeHtmlFile('html/'.$url.'.html',$str);
				if($res){
					echo '生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '生成失败';
				}
				exit;				
			case 'all':
				$str 	= file_get_contents($http_host.'/index.php?m=index');
				$res	= $html->MakeHtmlFile('index.html',$str);
				
				$str2 	= file_get_contents($http_host.'/index.php?m=about');
				$res2	= $html->MakeHtmlFile('html/about.html',$str2);
				
				$str3	= file_get_contents($http_host.'/index.php?m=service');
				$res3	= $html->MakeHtmlFile('html/service.html',$str3);
				
				$str4 	= file_get_contents($http_host.'/index.php?m=order');
				$res4	= $html->MakeHtmlFile('html/order.html',$str4);
				
				$str5	= file_get_contents($http_host.'/index.php?m=contact');
				$res5	= $html->MakeHtmlFile('html/contact.html',$str5);
				
				$str6 	= file_get_contents($http_host.'/index.php?m=link');
				$res6	= $html->MakeHtmlFile('html/link.html',$str6);
				
				$str7 	= file_get_contents($http_host.'/index.php?m=map');
				$res7	= $html->MakeHtmlFile('html/map.html',$str7);
				
				$ubb_list=DS('publics.get_ubbclass_list','',3,0); 
				foreach($ubb_list as $k=>$v){
					$str_view	= file_get_contents($http_host.'/about/view/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.htm');
					$res_view	= $html->MakeHtmlFile('html/about/1-0-0-0-0-'.$v['classid'].'-'.$v['bid'].'.html',$str_view);
					
				}
				$service_list=DS('publics.get_ubbclass_list','',2,0);
				foreach($service_list as $k2=>$v2){
					$str_view2	= file_get_contents($http_host.'/service/view/1-0-0-0-0-'.$v2['classid'].'-'.$v2['bid'].'.htm');
					$res_view2	= $html->MakeHtmlFile('html/service/1-0-0-0-0-'.$v2['classid'].'-'.$v2['bid'].'.html',$str_view2);
					
				}
				if($res&&$res2&&$res3&&$res4&&$res5&&$res6&&$res7&&$res_view&&$res_view2){
					echo '一键生成成功';
					echo '<meta http-equiv="refresh" content="2;url='.$_SERVER['HTTP_REFERER'].'">';
				}else{
					echo '一键生成失败';
				}

				exit;	
		}
		
		
	}
	
}
