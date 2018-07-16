<?php
header("Content-Type: text/html;charset=utf-8");
class course {
	// 获取数据
	function getData($table,$where='',$order='',$limit=''){
		$db = APP :: ADP('db');
		$table1 = $db->getTable($table);
		$sql = 'SELECT * FROM '.$table1;
		if($where != ''){
			$sql .= ' where 1=1 '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		}
		if($limit != ''){
			$sql .= ' limit '.$limit;
		}
		//echo $sql;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	// 获取记录数
	function getTotal($table,$where=''){
		$db = APP :: ADP('db');
		
		$sql='SELECT count(*)as num FROM `'.$db->getTable($table).'` where 1=1 '.$where;
		//echo $sql;
		$re = $db->getRow($sql);
		return RST($re['num']);
	}
	
}
?>