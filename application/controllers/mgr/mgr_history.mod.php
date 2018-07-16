<?php 
include('action.abs.php'); 
class buy_history_mod extends action 
{
	
	function default_action() {
		$this->balance_list();
	}
	
	/////////////////////////  充值订单管理 ////////////////////////////
	/*订单列表*/
	function buy_list()
	{
		$data	=	V('p');
		$where  =   '1=1 and uid!=0 ';
		
		$order_sn	=	V('r:order_sn');
		TPL :: assign('order_sn',$order_sn);
		
		$username	=	V('r:username');
		TPL :: assign('username',$username);
		
		$pay_status	=	V('r:pay_status');
		TPL :: assign('pay_status',$pay_status);
		
		//订单号查询
		if($order_sn!=''){
			$where	.=	" and oid like '%".$order_sn."%'";	
		}
		$userid	=	V('r:userid');
		if($userid!='') {
			$where	.=	" and uid='".$userid."'";
		}
		
		if($username!='') {
			$userlist	=	$this->get_info('xsmart_users',' realname like "%'.$username.'%"','','','id');
			//var_dump($userlist);
			if(!empty($userlist)) {
				$user_str	=	'';
				foreach($userlist['rst'] as $k=>$re) {
					$user_str	.=	$re['id'].',';
				}
			}
			//echo $user_str;
			$where	.=	" and uid in (".rtrim($user_str,',').")";
		}
		if($pay_status!='') {
			$where	.=	" and status=".$pay_status." ";
		}
		
		//生成订单号
		$nid	 	= 		date('Ymdhis',time()).$uid;
		$chashu	    = 		20 - strlen($nid);
		$rand		= 		mt_rand(str_repeat('1',$chashu),str_repeat('9',$chashu));
		$nid	   .= 		$rand;
		
		$balancelist	=	$this->page_list(20,$where,'id desc',V('r'),'xsmart_balance');
		
		//var_dump($balancelist);
		
		TPL :: assign('balancelist',$balancelist);
		/*
		$pay_type	=	$this->test_sql();
		TPL :: assign('pay_type',$pay_type);
		*/
		$this->_display('buy/buy_list');
	}
	
	
	function get_total($table,$where = ''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from ".$table;
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);
		return RST($num);

	}
	
	function get_info($table,$where='',$order='',$limit='',$item='*'){
		$db = APP :: ADP('db');
		$sql = 'select '.$item.' from '.$table;
		if($where != ''){
			$sql .= ' where '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		
		//echo $sql;echo "<br />";
		
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);

	}

	function page_list($pagesize=1,$where='',$order,$getData,$table){
		extract($getData);
		$pagesize 	= empty($pagesize) ? 1 : $pagesize;
		$total 		= DS('mgr/mgr_order.get_total','',$table,$where);
		if(isset($page)){
			$offset = ($page-1) * $pagesize;
		}else{
			$offset = 0;
		}                  
		$limit = "$offset,$pagesize";
		$result['info'] = DS('mgr/mgr_order.get_info','',$table,$where,$order,$limit);
		//unset($getData["page"]);
		$param 	= http_build_query($getData);
		$url 	= "?".$param."&page={page}";
		$page 	= new RewritePage($total,$pagesize,$page,$url);
		$result['pagehtml'] = $page -> myde_write();
		return $result;
	}
	
	//管理员充值页面
	function sys_balance(){
		
		$goods_category	= DS('mgr/member2.get_specifies_category','',0);
		TPL	:: assign('goods_category',		$goods_category);
		
		$this->_display('balance/sys_balance');
	}
	
	
}
?>