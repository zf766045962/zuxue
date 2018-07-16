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
class courAdvance_mod extends action
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
		TPL :: assign('catid',V('r:cid','3'));
		TPL :: assign('slist',$sys_list);
		TPL :: display('advance/index');
	}
	
	function advanceCon(){
		
		$sid = V('r:sid');
		$catid 	= V('r:catid','3');  
		//体系内容页
		$sys_list = DS('publics._get','','system',' id = '.$sid);
		TPL :: assign('slist',$sys_list[0]);
		
		//热门课程排行榜
		$hot_list = DS('publics._get','','system',' catid=2 and  FIND_IN_SET("1",exception) order by listorder asc,inputtime desc limit 4');
		TPL :: assign('hot_list',$hot_list);
		
		//章节列表
		$cha_list = DS('publics._get','','chapter',' systemid = '.$sid.' order by updatetime desc limit 1');
		//var_dump($cha_list);die;
		TPL :: assign('cha_list',$cha_list);
		TPL :: assign('sid',$sid); 
		TPL :: assign('catid',$catid);
		TPL :: display('advance/advanceCon');
	}
	

	function checkBuy(){
		
		$type	=	V('r:type'); 
		$uid	=	V('r:uid');
		$systemid	=	V('r:systemid');
		
		if($type == 1){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and systemid = ".$systemid);
		}else if($type == 2){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and pid = ".$systemid);	
		}else if($type == 3){
			$isbuy	= DS("publics2._get","","integral","sourceType=1 and userID = ".$uid ." and coid = ".$systemid);		
		}
		 
		 if(empty($isbuy)){	
			$rinfo	=	DS("publics2._get","","users","id=".$uid);
			
			$rid	= 	$rinfo[0]['roleid'];
			
			if(empty($rid)){
				exit('{"status":4,"info":"无角色信息"}');
			}else{
				if($type == '1'){	
					$coinfo	=	DS("publics2._get","","role_system","rid=".$rid." and sid=".$systemid);
					if(empty($coinfo)){
						exit('{"status":4,"info":"角色限制"}');	
					}else{
						//exit('{"status":1,"info":"可以购买"}');	
						exit('{"status":1,"info":"价格：'.$coinfo[0]['sprice'].'学币"}');       
					} 
				}
				//购买章节    
				if($type == '2'){	
					$coinfo	=	DS("publics2._get","","role_chapter","rid=".$rid." and pid=".$systemid);
					if(empty($coinfo)){
						exit('{"status":4,"info":"角色限制"}');	
					}else{
						exit('{"status":2,"info":"价格：'.$coinfo[0]['pprice'].'学币"}'); 
					}
				}
				//购买课程
				if($type == '3'){	
					$coinfo	=	DS("publics2._get","","role_course","rid=".$rid." and cid=".$systemid);
					if(empty($coinfo)){
						exit('{"status":4,"info":"角色限制"}');	
					}else{
						exit('{"status":3,"info":"价格：'.$coinfo[0]['cprice'].'学币"}'); 
					}
				}
			}
		 }else{
				exit('{"status":6,"info":"您已经购买过了"}'); 	 
		}
	}
	
	
	
	
	function buy(){
		 
		$type	=	V('r:type'); 
		$uid	=	V('r:uid');
		$systemid	=	V('r:systemid');
		 	
		$rinfo	=	DS("publics2._get","","users","id=".$uid);
		$rid	= 	$rinfo[0]['roleid'];
		
		//购买体系
		if($type == '1'){	
			$coinfo	=	DS("publics2._get","","role_system","rid=".$rid." and sid=".$systemid);
			//if(empty$coinfo)
			$price 	=	$coinfo[0]['sprice'];
			$data['type'] = 1;
			$data['systemid'] = $systemid;
		}
		//购买章节
		if($type == '2'){	
			$coinfo	=	DS("publics2._get","","role_chapter","rid=".$rid." and pid=".$systemid);
			$price 	=	$coinfo[0]['pprice'];
			$data['type'] = 2;
			$data['pid'] = $systemid;
		}
		//购买课程
		if($type == '3'){	
			$coinfo	=	DS("publics2._get","","role_course","rid=".$rid." and cid=".$systemid);
			$price 	=	$coinfo[0]['cprice'];
			$data['type'] = 3;
			$data['coid'] = $systemid;
		}
		$data['userId']		= 	$uid;
		$data['oid']		=	time();
		$data['addtime']	=	time();
		$data['integral']	=	$price;
		$data['sourceType']	=	1;
		$integral = DS("publics2._get","","integral","userID=".$uid." order by addtime desc");
		$data['integralAll']=	$integral[0]['integralAll'] - $price;
		
		if($rinfo[0]['frozen_money'] >= $price){
			$re = DS("publics2._save","",$data,"integral");
			if($re){
				$data1['frozen_money'] = $rinfo[0]['frozen_money'] - $price;
				$up  = DS("publics2._update","",$data1,"users","id",$uid);
				if($up){
					exit('{"status":1,"info":"购买成功"}');	
				}	
			}else{
				exit('{"status":2,"info":"网络繁忙"}');	
			}
		}else{
			exit('{"status":3,"info":"学币不足，请尽快充值"}');		
		}
	}
	
/************************************************************************************************/

}
