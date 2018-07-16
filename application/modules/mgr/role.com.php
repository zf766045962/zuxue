<?php
header("Content-Type: text/html;charset=utf-8");
class role {
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
		//echo $sql;die;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	// 获取记录数
	function getTotal($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = '1=1';
		}
		$sql='SELECT count(*) as num FROM `'.$db->getTable($table).'` as a LEFT JOIN '.$db->getTable($table.'_data').' as b ON a.id = b.id where '.$where;
		$re = $db->getRow($sql);
		return RST($re['num']);
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
		//echo $db->getLastQuery();
		return RST($re);
	}
	
	//获取(支持任何)
	function _get($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';
		}
		$sql='select * from '.$db->getTable($table).' where '.$where;
		//echo $sql;
		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($re);
	}
	
	// 删除
	function delete($table,$where){
		$db = APP :: ADP('db');
		$sql1 = 'delete from '.$db->getTable($table).' where '.$where;
		echo $sql1;die;
		$re = $db->execute($sql1);
		return RST($re);
	}
	
	function get_course($table){
		$db = APP :: ADP('db');
		
		$sql = 'SELECT * FROM '.$db->getTable($table);
		//echo $sql;die;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	function get_chapter($table,$where){
		$db = APP :: ADP('db');
		$sql = 'SELECT ch.*,sys.stitle FROM '.$db->getTable($table).' as ch inner join xsmart_system as sys on ch.systemid = sys.id where catid = 2'.$where;
		//echo $sql;die;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	
	function sql($sql){
		$db = APP :: ADP('db');
		$re = $db->execute($sql);
		//echo $db->getLastQuery();
		return RST($re);
	}
	
	function sql1($sql){
		$db = APP :: ADP('db');
		
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	// 获取数据
	function getLog($oid,$name,$id,$order='',$limit=''){
		$db = APP :: ADP('db');
		if($oid){
			$where .= " and a.oid like '%".$oid."%'";
		}
		if($name){
			$where .= " and b.realname like '%".$name."%'";
		}
		$sql='SELECT a.*,b.username,b.realname FROM `xsmart_integral` as a LEFT JOIN `xsmart_users`as b ON a.userID = b.id where 1=1 and b.id = '.$id.$where;
		
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
	function getcount($oid,$name,$id){
		$db = APP :: ADP('db');
		$where = "";
		
		if($oid){
			$where .= " and a.oid like '%".$oid."%'";
		}
		if($name){
			$where .= " and b.realname like '%".$name."%'";
		}
		
		$sql='SELECT count(*) as num FROM `xsmart_integral` as a LEFT JOIN `xsmart_users`as b ON a.userID = b.id where 1=1 and b.id = '.$id.$where;
		//echo $sql;
		$re = $db->getRow($sql);
		return RST($re['num']);
	}
}
?>