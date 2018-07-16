<?php
/**************************************************
*  Created:  2013-12-17
*
*  EDM 数据处理
*  author 陈壹宁
*
***************************************************/
class email
{
	//获取分类
	function getclass()
	{
		$db = APP :: ADP('db');
		$sql = "select * from  xsmart_email_class order by sort asc";
		$data = $db->query($sql);
		return RST($data);
	}
	
	//邮箱地址记录数
	function total($where=''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from xsmart_email_address";
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);
		return RST($num);
	}
	
	//获取邮箱地址
	function get_address($where='',$limit=''){
		$db = APP :: ADP('db');
		$sql = "select * from xsmart_email_address";
		if($where != ''){
			$sql .= " where ".$where;
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	


}
?>
