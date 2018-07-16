<?php 
include('action.abs.php'); 
class role_mod extends action 
{
	/*角色列表*/
	function index()    
	{
		$where	=	'';
		if(V('r:title')){
			$where .= " and `title` like '%".V('r:title')."%'";
		}
		
		$order  =	' inputtime desc ';
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('mgr/role.getTotal','','role',$where);
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		// 数据
		$info = DS('mgr/role.getData','','role',$where,$order,$limit);
		TPL :: assign('info',$info);
		
		$this->_display('role/index');
	}
	
	/*保存角色信息*/
	function saveMemberInfo(){
		$id	=	V('r:id');
		$data	=	V('p');
		$data['inputtime'] = strtotime(V('r:inputtime'));
		$data['updatetime'] = strtotime(V('r:updatetime'));
		
		if(empty($id)){
			$re		=		DS('mgr/role._save','',$data,'role');
		}else{
			
			$re		=		DS('mgr/role._update','',$data,'role','id',$id);
		}
		
		if($re){
			exit('{"info":"保存成功","status":"ok"}');
		}else{
			exit('{"info":"保存失败","status":"no"}');
		}
	}
	
	function add(){
		
		$info	=	DS('mgr/role._get','','role',"id='".V('r:id')."'");
		TPL :: assign('info',$info[0]);
		
		$this->_display('role/add_role');
	}
	
	//删除
	public function delete(){
		$id 		= V('r:id');
		$rs 		= DS('mgr/role.delete','','role','id in ('.$id.')');
		if($rs){
			echo "<script>alert('删除成功！');location='".URL('mgr/role.index')."';</script>";
		}
	}
	
	//课程列表
	public function rcourse(){
		$rid = V('r:id');
		$info = DS('mgr/role.get_course','','course');
		TPL :: assign('info',$info);
		
		$this->_display('role/role_course');
	}
	
	// 保存课程价格
	function role_course(){
		
		if(V('r:info')){
			$role = explode(',',V('r:info'));
			$i = 0;
			foreach($role as $key => $val){
				if($val){
					$role_info = explode('-',$val);
					//var_dump($role_info);
						//var_dump($_val);
						$res = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_course(rid,cid,cprice,ctype) VALUES ('".$role_info[1]."','".$role_info[0]."','".$role_info[2]."','".$role_info[3]."')");
						
				}
				
				$i++;
			}
			
		}
	}	
	
	public function rchapter(){
		$sid = V('r:sid');
		if($sid){
			$where = " and systemid = ".$sid;
		}
		$info = DS('mgr/role.get_chapter','','chapter',$where);
		TPL :: assign('info',$info);
		
		$this->_display('role/role_chapter');
	}
	
	// 保存章节价格
	function role_chapter(){
		
		if(V('r:info')){
			$role = explode(',',V('r:info'));
			$i = 0;
			foreach($role as $key => $val){
				if($val){
					$role_info = explode('-',$val);
					//var_dump($role_info);
						//var_dump($_val);
						$res = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_chapter(rid,pid,pprice) VALUES ('".$role_info[1]."','".$role_info[0]."','".$role_info[2]."')");
						
				}
				
				$i++;
			}
			
		}
	}	
	
	public function rsystem(){
		$rid = V('r:id');
		$info = DS('mgr/role.get_course','','system');
		TPL :: assign('info',$info);
		
		$this->_display('role/role_system');
	}
	
	// 保存课程体系价格
	function role_system(){
		
		if(V('r:info')){
			$role = explode(',',V('r:info'));
			$i = 0;
			foreach($role as $key => $val){
				if($val){
					$role_info = explode('-',$val);
					//var_dump($role_info);
						//var_dump($_val);
						$res = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_system(rid,sid,sprice) VALUES ('".$role_info[1]."','".$role_info[0]."','".$role_info[2]."')");
						
				}
				
				$i++;
			}
			
		}
	}	
	
	function role_all(){
		$info_c = DS('mgr/role.get_course','','course');
		$info_p = DS('mgr/role.get_chapter','','chapter');
		$info_s = DS('mgr/role.get_course','','system');
		
		TPL :: assign('info_c',$info_c);
		TPL :: assign('info_p',$info_p);
		TPL :: assign('info_s',$info_s);	
		
		$this->_display('role/role_all');
	}
	
	//价格设定
	function role_all_con(){
		
		if(V('r:info')){
			$role = explode('|',V('r:info'));
			$i = 0;
			$j = 0;
			$k = 0;
			$role_c = explode(',',$role[0]);
			$role_p = explode(',',$role[1]);
			$role_s = explode(',',$role[2]);
			
			foreach($role_c as $keyc => $valc){
				if($valc){
					$role_info_c = explode('-',$valc);
					$res1 = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_course(rid,cid,cprice,ctype) VALUES ('".$role_info_c[1]."','".$role_info_c[0]."','".$role_info_c[2]."','".$role_info_c[3]."')");
				}
				$i++;
			}
			
			foreach($role_p as $keyp => $valp){
				if($valp){
					$role_info_p = explode('-',$valp);
						$res2 = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_chapter(rid,pid,pprice) VALUES ('".$role_info_p[1]."','".$role_info_p[0]."','".$role_info_p[2]."')");
				}
				$j++;
			}
			
			foreach($role_s as $keys => $vals){
				if($vals){
					$role_info_s = explode('-',$vals);
						$res3 = DS('mgr/role.sql','',"REPLACE INTO xsmart_role_system(rid,sid,sprice) VALUES ('".$role_info_s[1]."','".$role_info_s[0]."','".$role_info_s[2]."')");
				}
				
				$k++;
			}
			
		}
	}
	
	function consume_log(){
		
		$order  =	' addtime desc ';
		// 分页
		$page 		= (int)V('g:page', 1);
		$pageSize 	= (int)V('g:pageSize', $setting['pageSize'] ? $setting['pageSize'] : 10);
		$offset 	= ($page -1) * $pageSize;
		$limit		= $offset.','.$pageSize;
		$total 		= DS('mgr/role.getcount','',V('r:oid'),V('r:title'),V('r:id'));
		$pager 		= APP :: N('pager');
		$page_param = array('currentPage'=> $page, 'pageSize' => $pageSize, 'recordCount' => $total, 'linkNumber' => 5);
		$pager->setParam($page_param);
		TPL :: assign('pager', $pager->makePage());
		
		// 数据
		$info = DS('mgr/role.getLog','',V('r:oid'),V('r:title'),V('r:id'),$order,$limit);
		TPL :: assign('info',$info);
		
		$this->_display('role/consume_log');
	}
	
	function make_money(){
		$frozen_money 	=	V('r:frozen_money');
		$orid1 	=	V('r:orid1');
		$member	=	DS("publics2._get","","users","orid=".$orid1);
		if($member){
			foreach($member as $mk => $mv){
				$data['pay_source']		=	1;
				$data['uid']			=	$mv['id'];
				$data['oid']			=	time().rand(1000,9999);
				$data['paytype']		=	2;
				$data['money']			=	$frozen_money;
				$data['addtime']		=	time();
				$data['status']			=	2;
				$data['finished']		=	1;
				$data['admin_id']		=	USER :: uid();
				$re	=	DS("publics2._save","",$data,"balance");
				if($re){
					$minfo	=	DS("publics2._get","","users","id=".$mv['id']);
					$data1['frozen_money']	= 	$minfo[0]['frozen_money'] + $frozen_money;
					$re1 	=	DS("publics2._update","",$data1,"users","id",$mv['id']);
				}
			}
			exit('{"status":1,"info":"充值完毕！"}');	
				
		}else{
			exit('{"status":3,"info":"该机构无学员！"}');		
		}
		
	}
}
?>