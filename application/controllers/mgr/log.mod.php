<?php
/**************************************************
*  Created:  2014-05-17
*
*  供应商管理
*
*  @Xsmart (C)2006-2099Inc.
*  @Author @@ining
*
***************************************************/
include('action.abs.php'); 
class log_mod extends action 
{
	function default_action()
	{
		$where	=	'1=1';
		
		$type	=	V('r:type','1');
		TPL :: assign('type',$type);
		
		
		if($type!=1) {
			$where	.=	' and type="'.$type.'" and isshow=1 ';
		} else {
			$where	.=	' and (type="1" or type="5") and isshow=1 ';
		}
		
		$username	=	V('r:username',0);
		if(!empty($username)) {
			$where	.=	' and username="管理员'.$username.'"';	
		}
		TPL :: assign('username',$username);
		
		$startTime	=	V('r:startTime');
		if(!empty($startTime)) {
			$where	.=	' and addtime>="'.$startTime.'"';	
		}
		TPL :: assign('startTime',$startTime);
		
		$endTime	=	V('r:endTime');
		if(!empty($endTime)) {
			$where	.=	' and addtime<="'.$endTime.'"';	
		}
		TPL :: assign('endTime',$endTime);
		
		$adminList	=	DS('publics._get','','xsmart_admin','id>0');
		TPL :: assign('adminList',$adminList);
		
		$page 				= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		TPL :: assign('page',$page);
		
		
		$pagesize 			= (int)V('g:pagesize', 50);
		$count 				= $this->get_log_num("xsmart_log",$where);
		$pager 				= APP :: N('pager');
		//var_dump($count);echo "<br />";
		$page_param 		= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count[0]["count"], 'linkNumber' => 10, 'type'=> $type);
		$pager 				-> setParam($page_param);
		$pager				->setVarExtends(array('connect'=>$connect,'companyType' => $companyType));
		$limit 				= ($page-1)*$pagesize.','.$pagesize;
		$userlist 			= $this->get_log("xsmart_log",$where,$order,$limit);
		$db	=	APP::ADP('db');
		$last_sql	=	$db->getLastQuery();
		TPL :: assign('last_sql',$last_sql);
		TPL :: assign('order',$order);
		
		//var_dump($pager->makePage());
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('userlist',$userlist);
		$this->_display('log/index');
		
	}
	
	function get_log_num($table,$where) {
		$db	=	APP::ADP('db');
		
		$sql	=	"select count(*) as count from ".$table." where ".$where;
		$result	=	$db->query($sql);
		//echo $sql;echo "<br />";
		return $result;	
	}
	
	function get_log($table,$where,$order,$limit) {
		$db	=	APP::ADP("db");
		
		$sql	=	"select * from ".$table." ";
		if($where != ''){
			$sql .= ' where '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		} else {
			$sql .=	' order by addtime desc';	
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		//echo $sql;echo "<br />";
		
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
			
		return $data;
	}
	/*
	function report() {
		//用户统计
		$allMember	=	DS('publics._get','','xsmart_users','id>0');
		TPL :: assign('allMember',count($allMember));
		
		$allTodayMember	=	DS('publics._get','','xsmart_users','id>0 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('allTodayMember',count($allTodayMember));
		
		$models		=	DS('publics._get','','xsmart_api_models','code>0');
		TPL :: assign('models',$models);
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				
				$thisMember[$re['code']]	=	DS('publics._get','','xsmart_users','companyType like "%'.$re['code'].'%"');
				$thisTodayMember[$re['code']]	=	DS('publics._get','','xsmart_users','companyType like "%'.$re['code'].'%" and addtime like "'.date('Y-m-d').'%"');
				//TPL :: assign('thisMember['.$re['code'].']',count($thisMember[$re['code']]));
				//echo count($thisMember[$re['code']]);
				//echo "<br />";
				//TPL :: assign('thisTodayMember['.$re['code'].']',count($thisTodayMember[$re['code']]));
			} 
		}
		TPL :: assign('thisMember',$thisMember);
		TPL :: assign('thisTodayMember',$thisTodayMember);
		
		
		//招标统计
		$proInfo	=	DS('publics._get','','xsmart_api_procurement','type=2');
		TPL :: assign('proInfo',count($proInfo));
		
		$proTodayInfo	=	DS('publics._get','','xsmart_api_procurement','type=2 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('proTodayInfo',count($proTodayInfo));
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				$thisPro[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=2 and module="'.$re['code'].'"');
				$thisTodayPro[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=2 and addtime like "'.date('Y-m-d').'%" and  module="'.$re['code'].'"');
			} 
		}
		TPL :: assign('thisPro',$thisPro);
		TPL :: assign('thisTodayPro',$thisTodayPro);
		
		
		//采购统计
		$applyInfo	=	DS('publics._get','','xsmart_api_procurement','type=1');
		TPL :: assign('applyInfo',count($applyInfo));
		
		$applyTodayInfo	=	DS('publics._get','','xsmart_api_procurement','type=1 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('applyTodayInfo',count($applyTodayInfo));
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				$thisApply[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=1 and module="'.$re['code'].'"');
				$thisTodayApply[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=1 and addtime like "'.date('Y-m-d').'%" and  module="'.$re['code'].'"');
				
			} 
		}
		TPL :: assign('thisApply',$thisApply);
		TPL :: assign('thisTodayApply',$thisTodayApply);
		
		
		//公告
		$publicNotice	=	DS('publics._get','','xsmart_news','catid=6 and isreview=1');
		TPL :: assign('publicNotice',count($publicNotice));
		
		$privateNotice	=	DS('publics._get','','xsmart_news','catid=6 and isreview=0');
		TPL :: assign('privateNotice',count($privateNotice));
		
		$this->_display('log/report');	
	}*/
	
	function delLog() {
		$id	=	V('r:id');
		
		$data['isshow']	=	0;
		
		$db	=	APP::ADP('db');
		$sql	=	'update xsmart_log set isshow="0" where id="'.$id.'"';
		$result	=	$db->query($sql);
		//echo $sql;die;
		if($result>=0) {
			F('log.report','删除第'.$id.'条日志记录，操作结果：成功','1',' delete from xsmart_log where id="'.$id.'"');
		} else {
			F('log.report','删除第'.$id.'条日志记录，操作结果：失败','1',' delete from xsmart_log where id="'.$id.'"');
		}
		if($result>=0) {
			echo 1;
		} else {
			echo 2;	
		}	
	}
	
	
	
	//接口文件
	function apilog()
	{
		$where	=	'1=1';
		
		$username	=	V('r:username',0);
		if(!empty($username)) {
			$where	.=	' and username="管理员'.$username.'"';	
		}
		TPL :: assign('username',$username);
		
		$startTime	=	V('r:startTime');
		if(!empty($startTime)) {
			$where	.=	' and addtime>="'.$startTime.'"';	
		}
		TPL :: assign('startTime',$startTime);
		
		$endTime	=	V('r:endTime');
		if(!empty($endTime)) {
			$where	.=	' and addtime<="'.$endTime.'"';	
		}
		TPL :: assign('endTime',$endTime);
		
		$adminList	=	DS('publics._get','','xsmart_admin','id>0');
		TPL :: assign('adminList',$adminList);
		
		$page 				= (int)V('g:page', 1);
		if($page==0)
		{
			$page =1;
		}
		TPL :: assign('page',$page);
		
		
		$pagesize 			= (int)V('g:pagesize', 50);
		$count 				= $this->get_log_num("xsmart_apilog",$where);
		$pager 				= APP :: N('pager');
		//var_dump($count);echo "<br />";
		$page_param 		= array('currentPage'=> $page, 'pageSize' => $pagesize, 'recordCount' => $count[0]["count"], 'linkNumber' => 10);
		$pager 				-> setParam($page_param);
		$pager				->setVarExtends(array('connect'=>$connect,'companyType' => $companyType));
		$limit 				= ($page-1)*$pagesize.','.$pagesize;
		$userlist 			= $this->get_log("xsmart_apilog",$where,$order,$limit);
		$db	=	APP::ADP('db');
		$last_sql	=	$db->getLastQuery();
		TPL :: assign('last_sql',$last_sql);
		TPL :: assign('order',$order);
		
		//var_dump($pager->makePage());
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('userlist',$userlist);
		$this->_display('log/apilog');
		
	}
	
	function get_apilog_num($table,$where) {
		$db	=	APP::ADP('db');
		
		$sql	=	"select count(*) as count from ".$table." where ".$where;
		$result	=	$db->query($sql);
		//echo $sql;echo "<br />";
		return $result;	
	}
	
	function get_apilog($table,$where,$order,$limit) {
		$db	=	APP::ADP("db");
		
		$sql	=	"select * from ".$table." ";
		if($where != ''){
			$sql .= ' where '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		} else {
			$sql .=	' order by addtime desc';	
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		//echo $sql;echo "<br />";
		
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
			
		return $data;
	}
	
	//导出日志
	function export() {
		$type		=	V('r:type','1');
		$startTime	=	V('r:startTime');
		$endTime	=	V('r:endTime');
		$username	=	V('r:username');
		
		$typename	=	"后台操作日志";
		switch($type) {
			case 1 : $typename	=	"后台操作日志";break;
			case 2 : $typename	=	"后台安全日志";break;
			case 3 : $typename	=	"前台操作日志";break;
			case 4 : $typename	=	"前台安全日志";break;
			case 5 : $typename	=	"接口日志";break;
			default: $typename	=	"后台操作日志";
		}
		$time	=	' 1=1 ';
		if(!empty($startTime)) {
			$time	.=	' and addtime >= "'.$startTime.'"';
		}
		if(!empty($endTime)) {
			$time	.=	' and addtime <= "'.$endTime.'"';
		}
		
		$usernameWhere	=	'';	
		
		//echo $time;echo "<br />";
		
		$data	=	DS('publics._get','','xsmart_log','type="'.$type.'" and isshow=1 '.$usernameWhere.' and ('.$time.') order by id desc');
		
		//$db	=	APP::ADP('db');
		//echo $db->getLastQuery();die;
		
		$file_name	=	date('Y-m-d H:i:s').$typename;
		if($type==1 || $type==3) {
			$table_data = '
				<table border="1">
					<th>操作人员</th>
					<th>操作信息</th>
					<th>执行语句</th>
					<th>操作时间</th>
			';
		} else {
			$table_data = '
				<table border="1">
					<th>操作信息</th>
					<th>执行语句</th>
					<th>操作时间</th>
			';
		}
		header('Content-Type: text/xls');
		header("Content-type:application/vnd.ms-excel;charset=utf-8");
		$str = mb_convert_encoding($file_name,'gbk','utf-8');
		header('Content-Disposition: attachment;filename="' .$str . '.xls"');
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Expires:0');
		header('Pragma:public');
		
		if(!empty($data)) {
			foreach($data as $k=>$re) {
				$table_data.=	'<tr>';
				if($type==1 || $type==3) {
					$table_data.=	'	<td>'.$re['username'].'</td>';	//公司名称
				}
				$insead	=	'';	
				if($type==1) {
					$insead	=	str_replace('管理员','管理员',$re["username"]);
				} else if($type==3) {
					$insead	=	str_replace('用户','用户',$re["username"]);
				}
				
				$table_data.=	'	<td>'.$insead.'在'.$re["addtime"].' '.$re["info"].'</td>';	//用户名称
				$table_data.=	'	<td>'.$re['sql'].'</td>';	//联系人名称
				$table_data.=	'	<td>'.$re['addtime'].'</td>';	//联系人名称
				$table_data.=	'</tr>';	
			}
		}
		$table_data	.=	'</table>';
		F('log.report','导出'.count($data).'条'.$typename.'日志记录，操作结果成功','1','');
		echo $table_data;
		exit;	
		
	}
	
	function ajaxDel() {
		$type		=	V('r:type','1');
		$startTime	=	V('r:startTime');
		$endTime	=	V('r:endTime');
		
		
		$time	=	' 1=1 ';
		if(!empty($startTime)) {
			$time	.=	' and addtime >= "'.$startTime.'"';
		}
		if(!empty($endTime)) {
			$time	.=	' and addtime <= "'.$endTime.'"';
		}
		
		$db	=	APP::ADP('db');
		$sql	=	"update xsmart_log set isshow=0 where type='".$type."' and ".$time;
		$data	=	$db->query($sql);
		if($data>=0) {
			echo 1;exit;
		} else {
			echo 2;exit;	
		}
	}
	
	function report() {
		//用户统计
		$allMember	=	DS('publics._get','','xsmart_users','id>0');
		TPL :: assign('allMember',count($allMember));
		
		$allTodayMember	=	DS('publics._get','','xsmart_users','id>0 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('allTodayMember',count($allTodayMember));
		
		$models		=	DS('publics._get','','xsmart_api_models','code>0');
		TPL :: assign('models',$models);
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				
				$thisMember[$re['code']]	=	DS('publics._get','','xsmart_users','companyType like "%'.$re['code'].'%"');
				$thisTodayMember[$re['code']]	=	DS('publics._get','','xsmart_users','companyType like "%'.$re['code'].'%" and addtime like "'.date('Y-m-d').'%"');
				//TPL :: assign('thisMember['.$re['code'].']',count($thisMember[$re['code']]));
				//echo count($thisMember[$re['code']]);
				//echo "<br />";
				//TPL :: assign('thisTodayMember['.$re['code'].']',count($thisTodayMember[$re['code']]));
			} 
		}
		TPL :: assign('thisMember',$thisMember);
		TPL :: assign('thisTodayMember',$thisTodayMember);
		
		
		//招标统计
		$proInfo	=	DS('publics._get','','xsmart_api_procurement','type=2');
		TPL :: assign('proInfo',count($proInfo));
		
		$proTodayInfo	=	DS('publics._get','','xsmart_api_procurement','type=2 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('proTodayInfo',count($proTodayInfo));
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				$thisPro[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=2 and module="'.$re['code'].'"');
				$thisTodayPro[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=2 and addtime like "'.date('Y-m-d').'%" and  module="'.$re['code'].'"');
			} 
		}
		TPL :: assign('thisPro',$thisPro);
		TPL :: assign('thisTodayPro',$thisTodayPro);
		
		
		//采购统计
		$applyInfo	=	DS('publics._get','','xsmart_api_procurement','type=1');
		TPL :: assign('applyInfo',count($applyInfo));
		
		$applyTodayInfo	=	DS('publics._get','','xsmart_api_procurement','type=1 and addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('applyTodayInfo',count($applyTodayInfo));
		
		if(!empty($models)) {
			foreach($models as $k=>$re) {
				$thisApply[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=1 and module="'.$re['code'].'"');
				$thisTodayApply[$re['code']]	=	DS('publics._get','','xsmart_api_procurement','type=1 and addtime like "'.date('Y-m-d').'%" and  module="'.$re['code'].'"');
				
			} 
		}
		TPL :: assign('thisApply',$thisApply);
		TPL :: assign('thisTodayApply',$thisTodayApply);
		
		
		//公告
		$publicNotice	=	DS('publics._get','','xsmart_news','catid=6 and isreview=1');
		TPL :: assign('publicNotice',count($publicNotice));
		
		$privateNotice	=	DS('publics._get','','xsmart_news','catid=6 and isreview=0');
		TPL :: assign('privateNotice',count($privateNotice));
		
		$this->_display('log/report');	
	}
	
	function report2() {
		//用户统计
		$allMember	=	DS('publics.get_total','','xsmart_users');
		TPL :: assign('allMember',$allMember);
		$allTodayMember	=	DS('publics.get_total','','xsmart_users','addtime like "'.date('Y-m-d').'%"');
		TPL :: assign('allTodayMember',$allTodayMember);
		
		$models		=	DS('publics._get','','xsmart_api_models','code>0');
		TPL :: assign('models',$models);
		
		$this->_display('log/report2');
	}
	
	
	
	/*修改失效时间*/
	function changeDate() {
		$info	=	DS('publics._get','','xsmart_sys_config',' `key`="dis_date" ');
		
		TPL :: assign('info',$info[0]['value']);
		
		$this->_display('log/set_date');
	}
	
	//保存失效时间
	function saveDate() {
		$val	=	V('r:dis_time');
		
		$db	=	APP::ADP('db');
		
		$sql	=	" update xsmart_sys_config set `value`='".$val."' where `key`='dis_date'";
		
		$data	=	$db->execute($sql);
		
		if($data) {
			$this->_succ('操作已成功', array('changeDate'));
		} else {
			$this->_error('操作失败', array('changeDate'));
		}
	}
	
	
}
