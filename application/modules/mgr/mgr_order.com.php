<?php


include_once "./application/class/page.class.php";	//引用分页类
/**************************************************

*  Created:  	2013-03-06

*  LastUpdate:  2014-05-16

*  方法

*

*  @CCGM (C)2013 - 2014 Nit Inc.

*  @Author 陈壹宁<446135184@qq.com>

*

***************************************************/

header("Content-Type: text/html;charset=utf-8");

class mgr_order{

	var $childid;

	//保存(支持任何)

	function _save($data,$table){

		$db = APP :: ADP('db');

		$re = $db->save($data,'',$table,'');

		return RST($re);

	}

	//更新(支持任何)

	function _update($data,$table,$field,$val){

		$db = APP :: ADP('db');

		$re = $db->save($data,$val,$table,$field);

		return RST($re);

	}

	//替换(支持任何)

	function _replace($data,$table){

		$db = APP :: ADP('db');

		$re = $db->replace($data,$table);

		return RST($re);

	}

	//获取(支持任何)

	function _get($table,$where=''){

		$db = APP :: ADP('db');

		if($where == ''){

			$where = ' 1=1 ';

		}

		$sql='select * from '.$table.' where '.$where;

		//echo $sql;

		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);

		return RST($re);

	}

	//删除(支持任何)

	function _del($table,$where){

		$db = APP :: ADP('db');

		$sql='delete from '.$table.' where '.$where;

		$re = $db->execute($sql);

		return RST($re);

	}

	//获取总记录数(支持任何)

	function get_total($table,$where = ''){

		$db = APP :: ADP('db');

		$sql = "select count(*) as num from ".$table;

		if($where != ''){

			$sql .= " where ".$where;

		}
//echo $sql;
		$num = $db->getOne($sql);		

		return RST($num);

	}

	//获取信息(支持任何)

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

		//echo $sql;

		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);

		return RST($data);

	}

	//分页 + 获取数据(支持任何)

	/*

		***  $pagesize 每页显示数据条数 (默认每页显示1条)

 		***  $where 获取总记录条数时需要的sql条件 (默认为空,全表数量)

		***  $order 获取数据时需要排序的字段 (默认asc,更改直接加desc)

		***  $getData 分页带的参数数组 可以是 V('p') V('g') V('r')

		***  return 返回分页html + 数据的数组 (格式 : array('info'=>array(...),'pagehtml'=>''); )

	*/

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

		unset($getData["page"]);

		$param 	= http_build_query($getData);

		$url 	= "?".$param."&page={page}";

		$page 	= new RewritePage($total,$pagesize,$page,$url);

		$result['pagehtml'] = $page -> myde_write();

		return RST($result);

	}

	

	//瀑布流获取数据

	function pinterest_list($pagesize=1,$where='',$order,$page=1,$table){

		$pagesize 	= empty($pagesize) ? 1 : $pagesize;

		$total 		= DS('publics.get_total','',$table,$where);

		if(isset($page)){

			$offset = ($page-1) * $pagesize;

		}else{

			$offset = 0;

		}

		$limit 	= "$offset,$pagesize";

		$result = array();

		if($total >= $offset){

			$result = DS('publics.get_info','',$table,$where,$order,$limit);

		}

		return RST($result);

	}


	//获取一条信息

	function get_message($id = 0,$field = 'id',$table = 'news'){
		$db = APP :: ADP('db');
		if($id != 0){
			$data = $db->get($id,$table,$field);
		}
		return RST($data);
	}
	
	/*更改订单状态*/
	function tui($status,$id){
		$db   = APP :: ADP('db');
		$remark_content		=		V('r:remark_content');//取消订单原因
		//$realName			=	DS('mgr/mgr_water_order.get_user','','xsmart_admin',"username = '".USER::get('screen_name')."'");
		$name				=	USER::get('screen_name');
		if($status != 0){
			if($status != 104){
				$sql  = "update xsmart_order set status='".$status."',caozuoren=concat(IFNULL(caozuoren,''),'".$name."　".date("Y-m-d H:i:s").",') where id=".$id;
			}else{
				$sql  = "update xsmart_order set status='".$status."',caozuoren=concat(IFNULL(caozuoren,''),'".$name."　".date("Y-m-d H:i:s").",'),isPay = 1 where id=".$id;	
			}
		}else{
			$sql 		= "update xsmart_order set status='".$status."',quxiao='".$name."' '".date("Y-m-d H:i:s")."',remark_content = '".$remark_content."' where id = '".$id."'";
		}
		//echo $sql;die;
		$data 	 	= $db->query($sql);
		return RST($data);	
	}
	
	
	
	
	
	
	
	
	
	//获取总记录数(支持任何)

	function get_ordertotal($table,$where = ''){
		$db = APP :: ADP('db');
		$sql = "select count(DISTINCT(a.order_id)) as num from xsmart_order as a left join xsmart_order_goods as b on a.order_id=b.order_id left join xsmart_goods as c on b.goods_id=c.id ";
		if($where != ''){
			$sql .= " where ".$where;
		}
		
		echo '<div id="totaltest" style="display:none">';
		echo $sql;
		echo '</div>';
		
		$num = $db->getOne($sql);
		return RST($num);
	}
	function get_orderinfo($table,$where='',$order='',$limit='',$item='*'){
		$db = APP :: ADP('db');
		$sql = 'select DISTINCT(a.order_id),a.user_id,a.add_time,a.pay_name,a.order_sn,a.goods_amount from xsmart_order as a left join xsmart_order_goods as b on a.order_id=b.order_id left join xsmart_goods as c on b.goods_id=c.id ';
		if($where != ''){
			$sql .= ' where '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	function page_orderlist($pagesize=1,$where='',$order,$getData,$table){
		extract($getData);
		$pagesize 	= empty($pagesize) ? 1 : $pagesize;
		$total 		= DS('mgr/mgr_order.get_ordertotal','',$table,$where);
		if(isset($page)){
			$offset = ($page-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		$result['info'] = DS('mgr/mgr_order.get_orderinfo','',$table,$where,$order,$limit);
		unset($getData["page"]);
		$param 	= http_build_query($getData);
		
		echo '<div style="display:none" id="ceshine">';
		echo $param.'|||'.$total;
		echo '</div>';
		
		$url 	= "?".$param."&page={page}";
		$page 	= new RewritePage($total,$pagesize,$page,$url);
		$result['pagehtml'] = $page -> myde_write();
		return RST($result);
	}
	
	function test_sql() {
		$db	=	APP::ADP('db');
		
		$sql	=	" select DISTINCT(pay_name) from xsmart_order";
		
		$data	=	$db->query($sql);
		
		return $data;
	}
}