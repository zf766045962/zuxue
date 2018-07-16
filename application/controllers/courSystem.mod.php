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
class courSystem_mod extends action
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
		
		if(V('r:couClass')){
			$isparent	=	DS("publics._get","","linkage","linkageid=".V('r:couClass'));
			if(!empty($isparent) && $isparent[0]['parentid']!=0){
				$where .= ' and couClass = '.V('r:couClass');
			}else{
				$son = DS("publics._get","","linkage","parentid=".V('r:couClass'));
				if(!empty($son)){
					$arr = array();
					foreach($son as $sk => $sv){
						$arr[] .= $sv['linkageid'];  	
					}	
				}
				//var_dump($arr);	die;
				$coureclass	=	implode(',',$arr);
				//var_dump($coureclass);die;
				$where .= ' and couClass in ('.$coureclass.')';
			}
		}
		
		$order = ' updatetime ';
		
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 9);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('course.getTotal','','system',$where);
		//var_dump($total);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		$keyid 		= (int)V('g:couClass', 1);
		$univer			= DS("publics2._get","","linkage","linkageid=".$keyid);	 
		TPL :: assign('univer',$univer);
		$sys_list = DS('course.getData','','system',$where,$order,$limit);
		TPL :: assign('slist',$sys_list);
		TPL :: assign('catid',V('r:cid','2'));
		TPL :: display('course/index');
	}
	
	function courseCon(){
		
		$sid 	= V('r:sid');
		$catid 	= V('r:catid','2');
		
		//体系内容页
		$sys_list = DS('publics._get','','system',' id = '.$sid);
		TPL :: assign('slist',$sys_list[0]);
		
		
		
		//热门课程体系排行榜
		$hot_list = DS('publics._get','','system',' catid=2 and  FIND_IN_SET("1",exception) order by inputtime desc limit 4');
		TPL :: assign('hot_list',$hot_list);
		
		//章节列表
		$cha_list = DS('publics._get','','chapter',' systemid = '.$sid);
		TPL :: assign('sid',$sid);
		TPL :: assign('catid',$catid);
		TPL :: assign('cha_list',$cha_list);
		           
		TPL :: display('course/courseCon');
	}
	
	
	function curriculumEver(){
		$id 		= V('r:id');
		$classid 	= V('r:classid'); 
		$sid 		= V('r:sid');
		$pid 		= V('r:pid');
		$catid 		= V('r:catid','2');
	if(empty($_SESSION['xr_id'])){     
		$cou_info	= DS("publics2._get","","course","id=".$id);//var_dump($cou_info);die;
		if($cou_info[0]['is_open']){
			TPL :: assign('cid',$id);  
			TPL :: assign('classid',$classid);
			TPL :: assign('sid',$sid);
			TPL :: assign('pid',$pid);
			TPL :: assign('catid',$catid);
				
			if(!empty($pid)){
				$cha_info = DS("publics2._get","","chapter","id=".$pid);
				TPL :: assign('cha_info',$cha_info[0]);
			}
		
			$sql = "SELECT xc.*,xu.realname,xu.username,xu.logo,xu.email,xu.introduce,xu.sex FROM xsmart_course as xc LEFT JOIN xsmart_users as xu on xc.teach_id = xu.id where xc.id = ".$id;
		
			$chap_list = DS('publics.sql','',$sql); 
			TPL :: assign('plist',$chap_list[0]);
			
			$buy_course = DS("publics2._get","","integral","sourceType=1 and coid=".$id." and type=3 order by addtime desc");
			
			TPL :: assign('buy_course',$buy_course);
			
			$where 	= '';
			if($id){
				$where .= ' and xq.coid = '.$id; 
			}
			
			// 分页
			$page 		= (int)V('g:page', 1);
			$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 5);
			$offset 	= ($page -1) * $pageSize;
			$limit		= $offset.','.$pageSize;
			$sql1 = "SELECT count(*) as num FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where;
			$count = DS('publics.sql','',$sql1);
			$total 		= $count[0]['num'];
			//var_dump($total);
			$pager 		= APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
			$pager->setParam($page_param);
			TPL :: assign('pager', $pager->makePage());
			
			$sql = "SELECT xq.*,xu.logo,xu.realname,xu.username FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where.' order by inputtime desc limit '.$limit;
			//echo $sql;
			
			$alist = DS('publics.sql','',$sql);
			TPL :: assign('alist',$alist);
			
			TPL :: display('course/curriculumEver');
		}else{
			header("Location: index.php");
		}
	}else{
		$cou_info	= DS("publics2._get","","course","id=".$id);//var_dump($cou_info);die;
		if($cou_info[0]['is_open']){
			TPL :: assign('cid',$id);  
			TPL :: assign('classid',$classid);
			TPL :: assign('sid',$sid);
			TPL :: assign('pid',$pid);
			TPL :: assign('catid',$catid);
				
			if(!empty($pid)){
				$cha_info = DS("publics2._get","","chapter","id=".$pid);
				TPL :: assign('cha_info',$cha_info[0]);
			}
		
			$sql = "SELECT xc.*,xu.realname,xu.username,xu.logo,xu.email,xu.introduce,xu.sex FROM xsmart_course as xc LEFT JOIN xsmart_users as xu on xc.teach_id = xu.id where xc.id = ".$id;
		
			$chap_list = DS('publics.sql','',$sql); 
			TPL :: assign('plist',$chap_list[0]);
			
			$buy_course = DS("publics2._get","","integral","sourceType=1 and coid=".$id." and type=3 order by addtime desc");
			
			TPL :: assign('buy_course',$buy_course);
			
			$where 	= '';
			if($id){
				$where .= ' and xq.coid = '.$id; 
			}
			
			// 分页
			$page 		= (int)V('g:page', 1);
			$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 5);
			$offset 	= ($page -1) * $pageSize;
			$limit		= $offset.','.$pageSize;
			$sql1 = "SELECT count(*) as num FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where;
			$count = DS('publics.sql','',$sql1);
			$total 		= $count[0]['num'];
			//var_dump($total);
			$pager 		= APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
			$pager->setParam($page_param);
			TPL :: assign('pager', $pager->makePage());
			
			$sql = "SELECT xq.*,xu.logo,xu.realname,xu.username FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where.' order by inputtime desc limit '.$limit;
			//echo $sql;
			
			$alist = DS('publics.sql','',$sql);
			TPL :: assign('alist',$alist);
			
			TPL :: display('course/curriculumEver');
		}else{
			$sys = DS("publics2._get","","integral","sourceType=1 and userID = ".$_SESSION['xr_id'] ." and type=1 and systemid = ".$sid);
			$pys = DS("publics2._get","","integral","sourceType=1 and userID = ".$_SESSION['xr_id'] ." and type=2 and pid = ".$pid);	
			$cys = DS("publics2._get","","integral","sourceType=1 and userID = ".$_SESSION['xr_id'] ." and type=3 and coid =".$id);
			if(!empty($sys) || !empty($pys) || !empty($cys)){
				if(!empty($pid)){
					$cha_info = DS("publics2._get","","chapter","id=".$pid);
					TPL :: assign('cha_info',$cha_info[0]);
				}
	
				$sql = "SELECT xc.*,xu.realname,xu.username,xu.logo,xu.email,xu.introduce,xu.sex FROM xsmart_course as xc LEFT JOIN xsmart_users as xu on xc.teach_id = xu.id where xc.id = ".$id;
			
				$chap_list = DS('publics.sql','',$sql); 
				TPL :: assign('plist',$chap_list[0]);
				
				$buy_course = DS("publics2._get","","integral","sourceType=1 and coid=".$id." and type=3 order by addtime desc");
				
				TPL :: assign('buy_course',$buy_course);
				
				$where 	= '';
				if($id){
					$where .= ' and xq.coid = '.$id; 
				}
		
				// 分页
				$page 		= (int)V('g:page', 1);
				$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 5);
				$offset 	= ($page -1) * $pageSize;
				$limit		= $offset.','.$pageSize;
				$sql1 = "SELECT count(*) as num FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where;
				$count = DS('publics.sql','',$sql1);
				$total 		= $count[0]['num'];
				//var_dump($total);
				$pager 		= APP :: N('pager');
				$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
				$pager->setParam($page_param);
				TPL :: assign('pager', $pager->makePage());
		
		
				$sql = "SELECT xq.*,xu.logo,xu.realname,xu.username FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE 1=1".$where.' order by inputtime desc limit '.$limit;
				//echo $sql;
				$alist = DS('publics.sql','',$sql);
				TPL :: assign('cid',$id);  
				TPL :: assign('classid',$classid);
				TPL :: assign('sid',$sid);
				TPL :: assign('pid',$pid);
				TPL :: assign('catid',$catid);
				TPL :: assign('alist',$alist);
				TPL :: display('course/curriculumEver');
			}else{
				header("Location: index.php");	
			}		
		}
			
	}
}
	
	function ask_course(){  
		
		$data = ""; 
		$data['askquiz'] 	= htmlspecialchars(V('r:askquiz'));
		$data['uid']		= $_SESSION['xr_id'];
		$data['uname']		= $_SESSION['xr_name'];
		$uinfo	=	DS("publics2._get","","users","id=".$_SESSION['xr_id']);
		$data['realname']	= $uinfo[0]['realname'];
		$data['classid']	= V('r:classid');
		$data['sid']		= V('r:sid');
		$data['pid']		= V('r:pid');
		$data['coid']		= V('r:id');
		$data['inputtime']	= time();
		
		$sql = "SELECT xq.*,xu.head_img,xu.realname,xu.username FROM xsmart_question as xq LEFT JOIN xsmart_users as xu on xq.uid = xu.id WHERE xq.coid = ".V('r:id');
		
		$chap_list = DS('publics.sql','',$sql);
		
		if(!empty($chap_list)){
			$array=array(
				"askquiz"		=> $chap_list[0]['askquiz'],
				"head_img"		=> $chap_list[0]['head_img'],
				"realname"		=> $chap_list[0]['realname'],
				"username"		=> $chap_list[0]['username'],
				"inputtime"		=> $chap_list[0]['inputtime']
			);
		}
		
		$list = DS('publics._save','',$data,'question');
		$html =	'';
		if($list){
			echo "1";
		}
	}
	
	
	function checkBuy(){
		
		$type	=	V('r:type'); 
		$uid	=	V('r:uid');
		$systemid	=	V('r:systemid');
		$pid	=	V('r:pid');
		$coid	=	V('r:coid');
		$catid	=	V('r:catid');
		
		if($type == 1){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and systemid = ".$systemid." and type=1");
		}else if($type == 2){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and pid = ".$pid." and type=2");	
		}else if($type == 3){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and coid = ".$coid." and type=3");		
		}
		 
		 if(empty($isbuy)){	
			$rinfo	=	DS("publics2._get","","users","id=".$uid);
			
			$rid	= 	$rinfo[0]['roleid'];
			
				if($type == '1'){	
					$coinfo	=	DS("publics2._get","","role_system","rid=".$rid." and sid=".$systemid);
					if(empty($coinfo)){
						exit('{"status":4,"info":"目前还无法购买该体系"}');	
					}else{
						$sys	=	DS("publics2._get","","system","id=".$systemid);
						$html = "<img src='".$sys[0]['thumb']."' style='float:left;height:70px;width:90px;'><p>".F("publics.substrByWidth",$sys[0]['introduce'],165)."</p><div class='clearfloat'></div>";
						exit('{"status":1,"info":"价格：'.$coinfo[0]['sprice'].'学币","intro":"'.$html.'"}');       
					} 
				}
				//购买章节    
				if($type == '2'){	
					$coinfo	=	DS("publics2._get","","role_chapter","rid=".$rid." and pid=".$pid);
					if(empty($coinfo)){
						exit('{"status":4,"info":"目前还无法购买该章节"}');	
					}else{
						$cha	=	DS("publics2._get","","chapter","id=".$pid);
						$html = "<img src='".$cha[0]['thumb']."' style='float:left;height:70px;width:90px;'><p>".F("publics.substrByWidth",$cha[0]['introduce'],165)."</p><div class='clearfloat'></div>";
						exit('{"status":2,"info":"价格：'.$coinfo[0]['pprice'].'学币","intro":"'.$html.'"}'); 
					}
				}
				//购买课程
				if($type == '3'){	
					$coinfo	=	DS("publics2._get","","role_course","rid=".$rid." and cid=".$coid);
					if(empty($coinfo)){ 
						exit('{"status":4,"info":"目前还无法购买该课程"}');	
					}else{
						$cou	=	DS("publics2._get","","course","id=".$coid);
						$html = "<img src='".$cou[0]['thumb']."' style='float:left;height:70px;width:90px;'><p>".F("publics.substrByWidth",$cou[0]['introduce'],165)."</p><div class='clearfloat'></div>";
						exit('{"status":3,"info":"价格：'.$coinfo[0]['cprice'].'学币","intro":"'.$html.'"}'); 
					}
				}
		 }else{
				exit('{"status":6,"info":"您已经购买了"}'); 	 
		}
	}
	
	
	
	
	function buy(){
		 
		$type	=	V('r:type'); 
		$uid	=	V('r:uid');
		$systemid	=	V('r:systemid');
		$pid	=	V('r:pid');
		$coid	=	V('r:coid');
		$catid	=	V('r:catid');
		 	
		$rinfo	=	DS("publics2._get","","users","id=".$uid);
		$rid	= 	$rinfo[0]['roleid'];
		
		//购买体系
		if($type == '1'){	
			$coinfo	=	DS("publics2._get","","role_system","rid=".$rid." and sid=".$systemid);
			//if(empty$coinfo)
			$price 	=	$coinfo[0]['sprice'];
		}
		//购买章节
		if($type == '2'){	
			$coinfo	=	DS("publics2._get","","role_chapter","rid=".$rid." and pid=".$pid);
			$price 	=	$coinfo[0]['pprice'];
		}
		//购买课程
		if($type == '3'){	
			$coinfo	=	DS("publics2._get","","role_course","rid=".$rid." and cid=".$coid);
			$price 	=	$coinfo[0]['cprice'];
		}
		$data['type']		= 	$type;
		$data['userId']		= 	$uid;
		$data['systemid']		= 	$systemid;
		$data['pid']		= 	$pid;
		$data['coid']		= 	$coid;
		$data['catid']		= 	$catid;
		$data['oid']		=	time();
		$data['addtime']	=	time();
		$data['integral']	=	$price;
		$data['sourceType']	=	1;
		$integral = DS("publics2._get","","users","id=".$uid);
		//$data['integralAll']=	$integral[0]['frozen_money'] - $price;
		
		if($rinfo[0]['frozen_money'] >= $price){
			$re = DS("publics2._save","",$data,"integral");
			if($re){
				$data1['frozen_money']	= $rinfo[0]['frozen_money'] - $price;
				$data1['uptime']		= time();
				$up  = DS("publics2._update","",$data1,"users","id",$uid);
				if($up){
					exit('{"status":1,"info":"购买成功"}');	
				}else{
					exit('{"status":2,"info":"网络繁忙"}');		
				}	
			}else{
				exit('{"status":2,"info":"网络繁忙"}');	
			}
		}else{
			exit('{"status":3,"info":"学币不足，请尽快充值"}');		
		}
	}
	
	//保存 —— 随堂笔记
	function save_notes(){
		
		if($_SESSION['xr_id'] != '' && V('r:content') != ''){
			$data['classid']	=	V('r:classid'); 
			$data['uid']		=	V('r:uid');
			$data['sid']		=	V('r:sid');
			$data['pid']		=	V('r:pid');
			$data['coid']		=	V('r:cid');
			$data['catid']		=	V('r:catid');
			$data['title']		=	htmlspecialchars(V('r:title'));
			$data['content']	=	htmlspecialchars(V('r:content'));
			$data['inputtime']	=	time();
			$data['updatetime']	=	time();
			
			$re = DS("publics2._save","",$data,"notes");
			if($re){
				exit('{"status":1,"info":"已写入"}');		
			}else{
				exit('{"status":2,"info":"网络繁忙"}');	
			}
		}else{
			exit;	
		}
	}
	
	//课程搜索检索
	function find(){
		$c 	= V('r:inter');	
		$re = DS("publics2._get","","course","title like '%".$c."%' order by updatetime desc");			//var_dump($re);die; 	
		if($re){
			exit('{"status":1,"info":"找到相关课程"}');	
		}else{
			exit('{"status":2,"info":"暂无相关课程"}');		
		}
	}
	
	
	//搜索结果列表
	function course(){
		$c = V('r:c');
		$course = DS("publics2._get","","course","title like '%".$c."%' order by updatetime desc");
		
		TPL :: assign("c",$c);
		TPL :: assign("course",$course);
		TPL :: display("course/course");	
	}
	
	//做笔记页面
	function make_notes(){
			
	}
	
	//视频踩赞
	function comment_video(){
		$data['uid']		=	V('r:uid');
		$data['type']		=	V('r:type'); 
		$data['coid']		=	V('r:coid');
		$data['inputtime']	=	time();	
		$iscomment	=	DS("publics2._get","","video_comment","coid=".$data['coid']." and uid = ".$data['uid']);
		
		//是否评论
		if(empty($iscomment)){
			$re	=	DS("publics2._save","",$data,"video_comment");
			if(!empty($re)){
				$num	=	DS("publics2._get","","course","id=".$data['coid']);
				$data1['updatetime']	=	time();
				if($data['type'] == 1){
					$data1['good']	= $num[0]['good'] + 1;
					$re1	=	DS("publics2._update","",$data1,"course","id",$data['coid']);
					if($re1){
						exit('{"status":1,"info":"点赞成功","good":'.$data1['good'].',"bad":'.$num[0]['bad'].'}');		
					}else{
						exit('{"status":2,"info":"网络繁忙"}');
					}
				}else{
					$data1['bad']	= $num[0]['bad'] + 1;
					$re1	=	DS("publics2._update","",$data1,"course","id",$data['coid']);	
					if($re1){
						exit('{"status":1,"info":"点踩成功","good":'.$num[0]['good'].',"bad":'.$data1['bad'].'}');		
					}else{
						exit('{"status":2,"info":"网络繁忙"}');
					}
				}		
			}else{
				exit('{"status":3,"info":"网络繁忙"}');
			}	
		}else{
			exit('{"status":4,"info":"不能重复此操作"}');
		}
	}
	
	function isbuy(){

		$uid	=	V('r:uid');
		$coid	=	V('r:coid');
		
		$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and coid = ".$coid." and type=3");		
		 
		 if(empty($isbuy)){	
			exit('{"status":2,"info":"无权访问"}');	
		 }else{
			exit('{"status":1,"info":"您已经购买了"}'); 	 
		}
	}
/************************************************************************************************/

}
