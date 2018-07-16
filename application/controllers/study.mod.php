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
class study_mod extends action
{
	//首页
	function default_action()
	{
		$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
		$tuid	=	V("r:tuid");
		if(!empty($tuid) && $tuid != 0){
			$_SESSION['xr_tuid'] = $tuid;	
			
			$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];//echo $user_IP;
			$isshare = DS("publics2._get","","integral","userID = ".$tuid." and sourceType = 5 and shareurl = '".$user_IP."' and sharetime ='".date("Ymd",time())."'");
			if(!$isshare){
				$share = DS("publics2._get","","integral","userID = ".$tuid." and sourceType = 5 and shareurl != '".$user_IP."' and sharetime ='".date("Ymd",time())."'");
				if(count($share)<20){
					$data['userID']		=	$tuid;
					$data['oid']		=	time().rand(1000,9999);
					$data['integral']	=	1;
					$data['sourceType']	=	5;
					$data['addtime']	=	time();
					$data['sharetime']	=	date("Ymd",time());
					$data['shareurl']	=	$user_IP;
					$re = DS("publics2._save","",$data,"integral");
					if($re){
						
						$tuinfo = DS("publics2._get","","users","id=".$tuid);
						
						$data2['frozen_money'] 	= $tuinfo[0]['frozen_money'] + 1;
						$data2['uptime'] 		= time();
						$re1	=	DS('publics._update','',$data2,'users','id',$tuid);	
					}	
				}
			}
		}
		$link_list = DS('publics._get','','linkage',' parentid = 0 and keyid = 1');
		
		$exce1 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("1",exception) order by listorder asc, updatetime desc limit 8');
		$exce2 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("2",exception) order by listorder asc, updatetime desc limit 8');
		$exce3 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("3",exception) order by listorder asc, updatetime desc limit 8');
		$exce4 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("4",exception) order by listorder asc, updatetime desc limit 8');
		$exce5 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("5",exception) order by listorder asc, updatetime desc limit 8');
		//classid
		$cid	=	V('r:cid','1');					//var_dump($cid);
		
		//banner
		$banner = DS("publics2._get","","ad","classid = 1 and (id =45 or id=46 or id=47) and audit =1 order by top desc, recommend desc, times desc limit 0,3");		//var_dump($banner);    
		
		//明星学员
		$star = DS("publics2._get","","star_student","id > 0 order by inputtime desc limit 0,6");		//var_dump($star);
		
		//活动名称
		$cial_activity1 = DS('publics._get','','article_class',' classid = 14');
		//官方活动
		$cial_activity = DS('publics._get','','news',' catid = 14 and audit = 1 order by ontop desc,recommend desc,updatetime desc limit 5');
		
		//新闻资讯
		$news_activity1 = DS('publics._get','','article_class',' classid = 15');
		
		//新闻资讯
		$news_activity = DS('publics._get','','news',' catid = 15 and audit = 1 order by ontop desc,recommend desc,updatetime desc limit 5');
		
		//合作院校
		$coop	= DS('publics2._get','','linkage','keyid=23  order by listorder asc');					//var_dump($coop);die;
		
		TPL :: assign('cid',$cid);  
		TPL :: assign('banner',$banner);  
		TPL :: assign('link_list',$link_list);     
		TPL :: assign('exce1',$exce1);                
		TPL :: assign('exce2',$exce2);
		TPL :: assign('exce3',$exce3); 
		TPL :: assign('exce4',$exce4);       
		TPL :: assign('exce5',$exce5);
		TPL :: assign('star',$star);
		TPL :: assign('cial_activity1',$cial_activity1);
		TPL :: assign('cial_activity',$cial_activity);
		TPL :: assign('news_activity1',$news_activity1);
		TPL :: assign('news_activity',$news_activity);
		TPL :: assign('coop',$coop);
		
		TPL :: display('index');
	}
	
	
	function index1()
	{
		$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
		$tuid	=	V("r:tuid");
		if(!empty($tuid) && $tuid != 0){
			$_SESSION['xr_tuid'] = $tuid;	
			
			$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];//echo $user_IP;
			$isshare = DS("publics2._get","","integral","userID = ".$tuid." and sourceType = 5 and shareurl = '".$user_IP."' and sharetime ='".date("Ymd",time())."'");
			if(!$isshare){
				$share = DS("publics2._get","","integral","userID = ".$tuid." and sourceType = 5 and shareurl != '".$user_IP."' and sharetime ='".date("Ymd",time())."'");
				if(count($share)<20){
					$data['userID']		=	$tuid;
					$data['oid']		=	time().rand(1000,9999);
					$data['integral']	=	1;
					$data['sourceType']	=	5;
					$data['addtime']	=	time();
					$data['sharetime']	=	date("Ymd",time());
					$data['shareurl']	=	$user_IP;
					$re = DS("publics2._save","",$data,"integral");
					if($re){
						
						$tuinfo = DS("publics2._get","","users","id=".$tuid);
						
						$data2['frozen_money'] 	= $tuinfo[0]['frozen_money'] + 1;
						$data2['uptime'] 		= time();
						$re1	=	DS('publics._update','',$data2,'users','id',$tuid);	
					}	
				}
			}
		}
		$link_list = DS('publics._get','','linkage',' parentid = 0 and keyid = 1');
		
		$exce1 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("1",exception) order by listorder asc, updatetime desc limit 8');
		$exce2 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("2",exception) order by listorder asc, updatetime desc limit 8');
		$exce3 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("3",exception) order by listorder asc, updatetime desc limit 8');
		$exce4 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("4",exception) order by listorder asc, updatetime desc limit 8');
		$exce5 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("5",exception) order by listorder asc, updatetime desc limit 8');
		//classid
		$cid	=	V('r:cid','1');					//var_dump($cid);
		
		//banner
		$banner = DS("publics2._get","","ad","classid = 1 and (id =45 or id=46 or id=47) and audit =1 order by top desc, recommend desc, times desc limit 0,3");		//var_dump($banner);    
		
		//明星学员
		$star = DS("publics2._get","","users","type=2 and isstart=1 order by addtime desc limit 0,6");		//var_dump($star);
		
		//活动名称
		$cial_activity1 = DS('publics._get','','article_class',' classid = 14');
		//官方活动
		$cial_activity = DS('publics._get','','news',' catid = 14 and audit = 1 order by ontop desc,recommend desc,updatetime desc limit 5');
		
		//新闻资讯
		$news_activity1 = DS('publics._get','','article_class',' classid = 15');
		
		//新闻资讯
		$news_activity = DS('publics._get','','news',' catid = 15 and audit = 1 order by ontop desc,recommend desc,updatetime desc limit 5');
		
		//合作院校
		$coop	= DS('publics2._get','','linkage','keyid=23  order by listorder asc');					//var_dump($coop);die;
		
		TPL :: assign('cid',$cid);  
		TPL :: assign('banner',$banner);  
		TPL :: assign('link_list',$link_list);     
		TPL :: assign('exce1',$exce1);                
		TPL :: assign('exce2',$exce2);
		TPL :: assign('exce3',$exce3); 
		TPL :: assign('exce4',$exce4);       
		TPL :: assign('exce5',$exce5);
		TPL :: assign('star',$star);
		TPL :: assign('cial_activity1',$cial_activity1);
		TPL :: assign('cial_activity',$cial_activity);
		TPL :: assign('news_activity1',$news_activity1);
		TPL :: assign('news_activity',$news_activity);
		TPL :: assign('coop',$coop);
		
		TPL :: display('index1');
	}
	
/************************************************************************************************/

}
