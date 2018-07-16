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
		$rid = V('r:id');
		$info = DS('mgr/role.get_chapter','','chapter');
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
	
	
}
?>