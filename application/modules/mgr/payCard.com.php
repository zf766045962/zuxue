<?php
/**************************************************
*  Created:  2014-03-03
*
*  卡密 数据处理
*  author 陈壹宁
*
***************************************************/
class payCard
{
	//记录数
	function total($where=''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from xsmart_paycard";
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);
		return RST($num);
	}
	
	//获取卡密列表
	function get_payCard($where='',$limit=''){
		$db = APP :: ADP('db');
		$sql = "select * from xsmart_paycard";
		if($where != ''){
			$sql .= " where ".$where;
		}
		$sql .= " order by id desc";
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		//echo $sql;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
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
	//获取(支持任何)
	function _get($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';
		}
		$sql='select * from '.$table.' where '.$where;
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
		$num = $db->getOne($sql);		
		return RST($num);
	}
	//获取信息(支持任何)
	function get_info($table,$where='',$order='',$limit='',$item='*'){
		$db = APP :: ADP('db');
		//$table = $db->getTable($table);
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
		//echo $sql;die;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}


}
?>
