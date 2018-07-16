<?php
header("Content-Type: text/html;charset=utf-8"); 
include('action.abs.php');
class university_mod extends action
{
	//分享
	function school(){
		$unid	=	V('r:unid');
		$catid	=	V('r:catid','1');
		$cid	=	V('r:cid','28');
		
		if(empty($_SESSION['xr_id'])){
			header('Location:index.php');	
		}
		
		
		if(!empty($_SESSION['xr_id'])){
			$uinfo	=	DS("publics2._get","","users","id=".$_SESSION['xr_id']);	//var_dump($uinfo);die;
			if(!empty($uinfo[0]['orid']) && $uinfo[0]['orid'] != $unid){
				header('Location:index.php');		
			}else{
		
		
		//院校信息
		$info	= 	DS("publics2._get","","ad","bid = 22 and orid1=".$unid." and audit = 1 order by top desc, recommend desc, lmorder desc limit 1");											//var_dump($info);die;
		
		//学啊精品课程
		$exce1 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("1",exception) order by listorder asc, updatetime desc limit 8');
		$exce2 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("2",exception) order by listorder asc, updatetime desc limit 8');
		$exce3 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("3",exception) order by listorder asc, updatetime desc limit 8');
		$exce4 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("4",exception) order by listorder asc, updatetime desc limit 8');
		$exce5 = DS('publics._get','','system','catid=2 and  FIND_IN_SET("5",exception) order by listorder asc, updatetime desc limit 8');//var_dump($exce1);die;
		
		TPL :: assign('exce1',$exce1);                
		TPL :: assign('exce2',$exce2);
		TPL :: assign('exce3',$exce3); 
		TPL :: assign('exce4',$exce4);       
		TPL :: assign('exce5',$exce5);
		//banner  
		$banner	= DS("publics2._get","","ad","bid = 21 and orid1=".$unid." and audit = 1 order by top desc, recommend desc, lmorder desc limit 0,3");
		//var_dump($banner);die;
		
		
		//院系分类  
		//$class	= DS("publics2._get","","article_class","parentid=26 order by lmorder asc limit 0,5");
		
		//友情链接
		$link	= DS("publics2._get","","link","classid = 2 and audit = 1 order by top desc, recommend desc, lmorder desc limit 0,9");
		
		//院校新闻
		$news	= DS("publics2._get","","ad","bid = 23 and orid1=".$unid." and audit = 1 order by top desc, recommend desc, lmorder asc limit 0,4");
		
		
		//mooc课程
		$course1	= DS("publics2._get","","ad","bid = 24 and orid1=".$unid." and orid2 = 28 order by lmorder asc limit 0,8");
		$course2	= DS("publics2._get","","ad","bid = 24 and orid1=".$unid." and orid2 = 29 order by lmorder asc limit 0,8");
		$course3	= DS("publics2._get","","ad","bid = 24 and orid1=".$unid." and orid2 = 30 order by lmorder asc limit 0,8");
		$course4	= DS("publics2._get","","ad","bid = 24 and orid1=".$unid." and orid2 = 31 order by lmorder asc limit 0,8");
		
		
		TPL :: assign("course1",$course1);
		TPL :: assign("course2",$course2);  
		TPL :: assign("course3",$course3);  
		TPL :: assign("course4",$course4);  
		  
		TPL :: assign("uinfo",$uinfo);
		TPL :: assign("info",$info[0]);							      																
		TPL :: assign("exce1",$exce1);     
		TPL :: assign("banner",$banner);   
		TPL :: assign("link",$link);
		TPL :: assign("news",$news);
		TPL :: assign("unid",$unid);
		TPL :: assign("catid",$catid);
		TPL :: assign("cid",$cid);  
		TPL :: assign("class",$class);  
		TPL :: assign("course1",$course1);
		
		TPL :: display("school"); 
		}
		}
	}
	
	function video(){
		$videoId	=	V('r:videoId');
		$videoInfo	=	DS("publics2._get","","ad","id=".$videoId);
		TPL :: assign("videoInfo",$videoInfo);
		TPL :: display("video");
	}
	
	function checkinter(){
		$uid	=	V('r:uid');
		$schid	=	V('r:schid');
		$uinfo	=	DS("publics2._get","","users","id=".$uid);
		if($uinfo[0]['orid'] == $schid && !empty($uinfo[0]['orid'])){
			exit('{"status":1,"info":"授权"}');	
		}else{
			exit('{"status":2,"info":"未授权"}');	
		}	
	}
	
	function news(){
		$newsId	=	V('r:newsId');
		$newsInfo	=	DS("publics2._get","","ad","id=".$newsId);
		TPL :: assign("newsInfo",$newsInfo[0]);
		TPL :: display("news");
	}
}
