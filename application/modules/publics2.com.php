<?php
/**************************************************
*  Created:  	2013-03-06
*  LastUpdate:  2015-01-30
*  方法
*
*  @CCGM (C)2013 - 2014 Nit Inc.
*  @Author 陈壹宁<chenyining@vi163.com>
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class publics2{
	
	var $childid;
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
		//echo '<br>'.$db->getLastQuery().'<br>';
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
	
		//获取(支持任何)
	function sum($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';
		}
		$sql='select sum(integral) as "all" from '.$db->getTable($table).' where '.$where;
		//echo $sql;
		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($re);
	}
	
	//雷锋榜
	function groupBy($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';	
		} 
		$sql='select * from '.$db->getTable($table).' where '.$where . ' group by requid 
order by count(requid) desc limit 0,4';
		//echo $sql;       
		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($re);
	}
	
	//购买的课程
	function groupBy1($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';	
		} 
		$sql='select * from '.$db->getTable($table).' where '.$where . ' group by systemid';  
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
	function get_info($table,$where='',$order='',$limit='',$item='*'){
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
		$total 		= DS('publics.get_total','',$table,$where);
		if(isset($page)){
			$offset = ($page-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		$result['info'] = DS('publics.get_info','',$table,$where,$order,$limit);
		unset($getData["page"]);
		$param 	= http_build_query($getData);
		$url 	= "?".$param."&page={page}";
		$page 	= APP :: N('RewritePage',$total,$pagesize,$page,$url);
		$result['pagehtml'] = $page -> myde_write();
		return RST($result);
	}
	
	//瀑布流获取数据(支持任何)
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
	
	//广告位
	function get_ad($val ,$key = 'id', $order = ''){
		$db = APP :: ADP('db');
		if($order == ''){
			$order = 'top desc,recommend desc,lmorder asc';
		}
		$sql = "select * from ".$db->getTable(T_AD)." where audit = 1 and ".$key." in (".$val.") order by ".$order;
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	//友情链接
	function links($cid){
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_LINK)." where classid = ".$cid." order by lmorder asc,times";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}

	//取网站信息
	function get_index($val){
		$db = APP :: ADP('db');
		$sql = "select value from ".$db->getTable(T_SYS_CONFIG)." where `key` = '".$val."'";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	
	//传入父类classid获取子类classid
	/* 
		***  $parentid 
 		***  $flag 0/1
		***  return array/string
	*/
	function get_classid($parentid,$flag = 1){
		
		$db = APP :: ADP('db');
		$sql = "select classid from ".$db->getTable(T_ARTICLE_CLASS)." where parentid in (".$parentid.")";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		foreach($data as $k=>$v){
			if($flag)
				$re .= $v["classid"].',';
			else
				$re[] = $v["classid"];
		}
		if($flag)
			$re = substr($re,0,-1);
		return RST($re);
	}
	
	//获取最终子类id
	function last_childid($id,$flag=1){
		if($flag)
			$this->childid = '';

		$info = DS('publics.get_messages2','',$id,'parentid','','');
		foreach($info as $val){
			
			if($val["child"] != 0)
				DS('publics.last_childid','',$val["classid"],0);
			
			if($val["child"] == 0)
				$this->childid .= $val["classid"].",";

		}
		$str = substr($this->childid,0,-1);
		return RST($str);
	}

	//获取列表
	function get_list($parentid = 0){

		$db = APP :: ADP('db');
		
		$sql = "select * from ".$db->getTable(T_ARTICLE_CLASS)." where parentid = ".$parentid." order by lmorder;";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}

	//获取一条信息
	function get_message($id = 0,$field = 'id',$table = 'news'){
		$db = APP :: ADP('db');
		if($id != 0){
			$data = $db->get($id,$table,$field);
		}
		return RST($data);
	}

	//获取信息 (旧版 仅支持news表)
	function get_messages($f_val = '',$field = 'id',$order = '',$limit = ''){

		$db = APP :: ADP('db');
		$field = empty($field)?'id':$field;
		$sql = "select * from ".$db->getTable(T_NEWS);
		if($f_val != ''){
			$sql .= " where ".$field." in (".$f_val.")";
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

	//分页 + 获取数据 (旧版 仅支持news表)
	/*
		***  $pagesize 每页显示数据条数 (默认每页显示1条)
 		***  $where 获取总记录条数时需要的sql条件 (默认为空,全表数量)
		***  $field 获取数据时的条件字段 (默认为ID)
		***  $f_val 获取数据时条件字段值
		***  $order 获取数据时需要排序的字段 (默认asc,更改直接加desc)
		***  $getData  记录数据  (参数固定为 $_GET 或者 V('g'))
		***  return 返回分页html + 数据的数组 (格式 : array('info'=>array(...),'pagehtml'=>''); )
	*/
	function page_list_html($pagesize = 1,$where = '',$f_val = '',$field = 'id',$order,$getData){
		
		$field 		= empty($field) ? 'id' : $field;
		$pagesize 	= empty($pagesize) ? 1 : $pagesize;
		$total 		= DS('publics.total','',$where);

		if(V('g:page',0) > 0){
			$offset = (V('g:page')-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		
		$result['info'] = DS('publics.get_messages','',$f_val,$field,$order,$limit);

		unset($getData["page"]);
		$param 	= http_build_query($getData);
		$url 	= "?".$param."&page={page}";
		
		$page = APP :: N('RewritePage',$total,$pagesize,V('g:page'),$url);

		$result['pagehtml'] = $page -> myde_write();

		return RST($result);
	}

	//获取总记录数 (旧版 仅支持news表)
	function total($where = ''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from ".$db->getTable(T_NEWS);
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);
		return RST($num);
	}

	//搜索 (旧版 仅支持news表)
	function search($id,$value){
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_NEWS)." where catid = '".$id."'";
		if($value != ''){
			$sql .= " and (title like '%".$value."%' or keywords like '%".$value."%') ";
		}
		$sql .= "order by updatetime desc";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		if(empty($data)){
			$data = "<p style='font-size:14px; text-align:center; margin-top:50px;'><b>暂无相关信息!</b><p>";
		}
		return RST($data);
	
	}



}









