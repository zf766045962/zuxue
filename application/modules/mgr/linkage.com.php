<?php
/**************************************************
*  Created:  2015-02-13
*
*  文件说明 联动菜单/分类
*  Author chenyining
*
***************************************************/
class linkage
{
	//清空表
	function truncate($table){
		$db = APP :: ADP('db');
		$re = $db->truncate($table);
		return RST($re);
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
	//替换(支持任何)
	function _replace($data,$table){
		$db = APP :: ADP('db');
		$re = $db->replace($data,$table);
		return RST($re);
	}
	//删除(支持任何)
	function _del($table,$where){
		$db = APP :: ADP('db');
		$sql='delete from '.$db->getTable($table).' where '.$where;
		$re = $db->execute($sql);
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