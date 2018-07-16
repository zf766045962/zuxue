<?php
/**************************************************
*  Created:  2015-03-18
*
*  模型表单 - Public
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chenyining
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class modelForm {
	// 获取数据信息
	function getDataById($table,$id){
		$db = APP :: ADP('db');
		$sql='select * from '.$db->getTable($table).' where id = '.$id;
		$re = $db->getRow($sql);
		return RST($re);
	}
	
	// 获取记录数
	function getTotal($table,$where=''){
		$db = APP :: ADP('db');
		$table1 = $db->getTable($table);
		$table2 = $db->getTable($table.'_data');
		$sql = 'SELECT count(*) as num FROM `'.$table1.'` as a LEFT JOIN '.$table2.' as b ON a.id = b.id ';
		if($where != ''){
			$sql .= ' where 1=1 '.$where;
		}
		$re = $db->getRow($sql);
		return RST($re['num']);
	}
	
	// 获取数据
	function getData($table,$where='',$order='',$limit='',$key=''){
		$db = APP :: ADP('db');
		$table1 = $db->getTable($table);
		$table2 = $db->getTable($table.'_data');
		$sql = 'SELECT * FROM '.$table1.' as a LEFT JOIN '.$table2.' as b ON a.id = b.id';
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
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC,$key);
		return RST($data);
	}
	
	// 删除
	function delete($table,$where){
		$db = APP :: ADP('db');
		$sql1 = 'delete from '.$db->getTable($table).' where '.$where;
		$sql2 = 'delete from '.$db->getTable($table.'_data').' where '.$where;
		$re = $db->execute($sql1);
		$re	= $db->execute($sql2);
		return RST($re);
	}
	
	// 获取所有子节点classid
	function getClassidStr($classid){
		$db = APP :: ADP('db');
		$db->execute('SET group_concat_max_len = 10000;');
		$sql = "SELECT Group_concat(classid SEPARATOR ',') as ids FROM ".$db->getTable('article_class')." where classid = $classid or parentpath LIKE '%,{$classid}' or parentpath LIKE '%,{$classid},%'";
		$re = $db->getRow($sql);
		return RST($re);
	}
	
	//保存(支持任何)
	function _save($data,$table){
		$db = APP :: ADP('db');
		$re = $db->save($data,'',$table,'');
		//echo $db->getLastQuery();die;
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
		$sql='select * from '.$db->getTable($table).' where '.$where;
		//echo $sql;
		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($re);
	}
	//删除(支持任何)
	function _del($table,$where){
		$db = APP :: ADP('db');
		$sql='delete from '.$db->getTable($table).' where '.$where;
		$re = $db->execute($sql);
		return RST($re);
	}
	//获取总记录数(支持任何)
	function get_total($table,$where = ''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from ".$db->getTable($table);
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);		
		return RST($num);
	}
	//获取信息(支持任何)
	function get_info($table,$where='',$order='',$limit='',$item='*',$key=''){
		$db = APP :: ADP('db');
		$table = $db->getTable($table);
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
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC,$key);
		return RST($data);
	}
}