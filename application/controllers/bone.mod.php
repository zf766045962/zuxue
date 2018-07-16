<?php
header("Content-Type: text/html;charset=utf-8"); 
include('action.abs.php');
class bone_mod extends action
{
	//分享
	function share(){
		$uid		= 	V('r:uid');
		$url		=	V('r:url');
		$new_url	=	"分享地址：<span>".$url.'/index.php?m=study&tuid='.$uid.'</span>'; 	
		exit('{"status":1,"info":"复制地址","url":"'.$new_url.'"}');		
	}
	
	function share1(){
		$isshare = DS("publics2._get","","integral","sourceType=3 and userID=".V('r:uid')." and systemid = ".V('r:systemid'));
		if(empty($isshare)){
			$data['uid']		= V('r:uid');
			$data['price'] 		= V('r:price');
			$data['money'] 		= V('r:price');
			$data['oid'] 		= time();
			$data['addtime']	= time(); 
			
			//更新用户表积分 	
			$info 	= DS("publics2._get","","users","id=".V('r:uid'));
			$data1['uptime'] 		= time();
			$data1['frozen_money']	= 3 + $info[0]['frozen_money'];
			$up  	= DS("publics2._update","",$data1,"users","id",$data['uid']);
			
			//更新或保存integral表
			$integral = DS("publics2._get","","integral","userID=".V('r:uid')." order by addtime desc");
			if($integral){
				$data2['userID']		= V('r:uid');
				$data2['integral'] 		= 3;
				//$data2['integralAll'] 	= 3 + $integral[0]['integralAll'];
				$data2['oid'] 			= $data['oid'];
				$data2['systemid'] 		= V('r:systemid');
				$data2['catid'] 		= V('r:catid');
				$data2['sourceType']	= 3;
				$data2['addtime']		= time();
				$re2 = DS("publics2._save","",$data2,"integral");
				if($re2){
					exit('{"status":1,"info":"分享成功！"}');		
				}else{
					exit('{"status":2,"info":"网络繁忙！"}');		
				}	
			}else{
				$data2['userID']		= V('r:uid');
				$data2['integral'] 		= 3;
				//$data2['integralAll'] 	= 3;
				$data2['oid'] 			= $data['oid'];
				$data2['sourceType']	= 3;
				$data2['catid'] 		= V('r:catid');
				$data2['systemid'] 		= V('r:systemid');
				$data2['addtime']		= time();
				$re2 = DS("publics2._save","",$data2,"integral");
				if($re2){
					exit('{"status":1,"info":"分享成功！"}');		
				}else{
					exit('{"status":2,"info":"网络繁忙！"}');		
				}
			}
		}else{
			exit('{"status":3,"info":"您已经分享过了！"}');		
		}
	}
	
	
	//收藏
	function collect_sys(){
		$isshare = DS("publics2._get","","collect","userID=".V('r:uid')." and systemid = ".V('r:systemid')." and sourceType=1");
		if(empty($isshare)){
			$data['uid']		= V('r:uid');
			$data['price'] 		= V('r:price');
			$data['money'] 		= V('r:price');
			$data['oid'] 		= time();
			$data['addtime']	= time();
			
				$data2['userID']		= V('r:uid');
				$data2['sourceType']	= 1;
				$data2['systemid'] 		= V('r:systemid');
				$data2['catid'] 		= V('r:catid');
				$data2['addtime']		= time();
				$re2 = DS("publics2._save","",$data2,"collect");
				if($re2){
					exit('{"status":1,"info":"收藏成功！"}');		
				}else{
					exit('{"status":2,"info":"网络繁忙！"}');		
				}
		}else{
			exit('{"status":3,"info":"您已经收藏过了！"}');		
		}
	}
	


/************************************************************************************************/

}
