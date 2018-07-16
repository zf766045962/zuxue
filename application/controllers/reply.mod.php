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
class reply_mod extends action
{
	/*************************************************问答模板*******************************************/
		 
	function default_action()
	{
		$this->index();
		
	}
	
	/***************************************************************************************************/
	function index()
	{
		$page		=	V("r:page","1");	
		$cid		=	V("r:cid","6");
		$coid		=	V("r:coid");
		
		$qtype		=	V("r:qtype");
		$pro_name	=	V('r:pro_name');
		
		$where		=	"uid != ''";
		
		if($qtype == '2'){
			$where .= " and isdeal = '1'";	
		}
		
		if($qtype == '3'){
			$where .= " and isdeal = '0'";	
		}
		
		if(!empty($pro_name)){
			$where .= " and askquiz like '%".$pro_name."%'";		
		}
		
		if(!empty($coid)){
			$where .= " and coid = " .$coid;	
		}
		$question	= DS("publics2.page_list","","5",$where," inputtime desc",V('r'),"question");	
		
		TPL :: assign("cid",$cid); 
		TPL :: assign("qtype",$qtype);
		TPL :: assign('pro_name',$pro_name);
		
		TPL :: assign('question',$question['info']);
		TPL :: assign('page',$page);    
		TPL :: assign('qpagehtml',$question['pagehtml']); 
		
		TPL :: display("reply/index");		
	}
	
	
	function question_reply(){
		$qid	=	V('r:qid');																			//var_dump($qid);die;
		
		//调取回复表数据
		$reply		=	DS("publics2._get","","question_reply","qid=".$qid." and istrue = '' " ); 		//var_dump($reply);die;
		
		//调取问题数据
		$question	=	DS("publics2._get","","question","id=".$qid);
		
		//相关问题
		$ques_relative	=	DS("publics2._get","","question","coid=".$question[0]['coid']." order by inputtime desc limit 0,5");
		
		//雷锋活动排行榜
		$leifeng	=	DS("publics2.groupBy","","question_reply","");									//var_dump($leifeng);die;
		
		//var_dump($ques_relative);die;
		TPL :: assign('qid',$qid);
		TPL :: assign('reply',$reply);
		TPL :: assign('question',$question[0]);
		TPL :: assign('leifeng',$leifeng);							
		TPL :: assign('ques_relative',$ques_relative);			
		TPL :: display("reply/question_reply");
	}
	
	
	function save_reply(){
		$html 		= 	'';	
		if($_SESSION['xr_id'] != '' && V('r:content') !=''){
			$data['quid']		=	V('r:quid');																	//var_dump($qid);
			$data['requid']		=	V('r:requid');																	//var_dump($requid);
			$userinfo =  DS("publics2._get","","users","id=".$data['requid']);
			$data['userType']	=	$userinfo[0]['type'];
			$data['username']	=	$userinfo[0]['username'];
			$data['realname']	=	$userinfo[0]['realname'];
			$data['qid']		= 	V('r:qid');
			$data['content']	= 	 preg_replace( "@<script(.*?)</script>@is", "", V('r:content')); 
			$data['inputtime']  =	time();
			$re	= DS("publics2._save","",$data,"question_reply");												//$re = 0;
			if($re){
				$rInfo = DS("publics2._get","","users","id=".$data['requid']);
				
				$html .= '<div class="pl_bottom"><div class="pl_left">';
				if(empty($rInfo[0]['logo'])){
					$html .= '<img src="images/wenda_img_03.png" class="tx_img" />';
				}else{
					$html .= '<img src="'.$rInfo[0]['logo'].'" class="tx_img" />';
				}
				
				$html .= '<span class="jb_name">'.date("Y-m-d",$data['inputtime']).'</span><span class="jb_name">'.date("H:i",$data['inputtime']).'</span><span class="jb_name"><img src="images/wenda_img_06.png" />'. $rInfo[0]["realname"] .'</span><div class="clearfloat"></div><p class="pl_con">'.$data['content'].'</p></div><div class="clearfloat"></div></div>';
			}else{
				$html .=  "<script>jAlert('网络繁忙，请稍后重试','温馨提示');</script>";	
			}
			
			echo $html;
		}else{
			exit;	
		}
	}
	
	function saveReply(){
		if($_SESSION['xr_id'] != '' && V('r:content') !=''){
			$data['quid']		=	V('r:quid');																	//var_dump($qid);
			$data['requid']		=	V('r:requid');																	//var_dump($requid);
			$userinfo =  DS("publics2._get","","users","id=".$data['requid']);
			$data['userType']	=	$userinfo[0]['type'];
			$data['username']	=	$userinfo[0]['username'];
			$data['realname']	=	$userinfo[0]['realname'];
			$data['qid']		= 	V('r:qid');
			$data['content']	= 	 preg_replace( "@<script(.*?)</script>@is", "", V('r:content')); 
			$data['inputtime']  =	time();
			$re	= DS("publics2._save","",$data,"question_reply");												//$re = 0;
			if($re){
				exit('{"status":1,"info":"保存成功！"}');	
			}else{
				exit('{"status":2,"info":"网络繁忙"}');	
			}
		}else{
			exit;	
		}
	}
	
	
	function setdeal(){
		
		$qid =	V("r:qid");
		$rid =  V("r:rid");
		$data['istrue'] = 1;
		
		$re = DS("publics2._update","",$data,"question_reply","id",$rid);
		if($re){
			$data1['isdeal'] = 1;
			$re1 = DS("publics2._update","",$data1,"question","id",$qid);
			if($re1){
				exit('{"status":1,"info":"成功采纳！"}');		
			}else{
				exit('{"status":2,"info":"网络繁忙1！"}');		
			}	
		}else{
			exit('{"status":3,"info":"网络繁忙2！"}');		
		}
			
	}
	
	
	function make_question(){
		
		$uid	=	V('r:uid');
		$askquiz=	V('r:pro_name');
		$uinfo	=	DS("publics2._get","","users","id=".$uid);
		if($_SESSION['xr_id'] != '' && $askquiz !=''){
			$data['uid']		=	$uid;
			$data['askquiz']	=	htmlspecialchars($askquiz);
			$data['uname']		=	$uinfo[0]['username'];
			$data['realname']	=	$uinfo[0]['realname'];
			$data['inputtime']	=	time();
			$re		=	DS("publics2._save","",$data,"question");
			if($re){
				exit('{"status":1,"info":"保存成功！"}');			
			}else{
				exit('{"status":2,"info":"网络繁忙！"}');			
			}
		}else{
			exit;	
		}
	}
	
}
