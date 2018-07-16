<?php
/**************************************************
*  Created:  2012-3-16
*
*  获取ad值 
*
*  @Xsmart (C)2006-2099Inc.
*  @Author 赵志强 <wwwzhaozhiqiang@126.com>
*
***************************************************/

/**
 * getUbb 
 *
 * @param string $bid 所属栏目
 *
 * @param string $classid 所属classid或者classname
 *
 * @return string 
 */
function getAd($bid,$classid,$num='') 
{
	$db = APP::ADP("db");
	$sql = "";
	$limit = "";
	if(intval($num)>0)
	{
		$limit = " limit ".$num." ";
	}
	if(intval($bid)==0)
	{
		return false;
	}
	else if(empty($classid))
	{
		$sql = "select * from ".$db->getTable(T_AD)." where classid = (select classid from ".$db->getTable(T_ADCLASS)." where bid=".$bid." order by lmorder asc limit 1)  and audit=1 order by top desc, recommend desc, lmorder asc ".$limit."";
	}
	else if(intval($classid)==0)
	{
		$sql = "select * from ".$db->getTable(T_AD)." where classid = (select classid from ".$db->getTable(T_ADCLASS)." where classname='".$classid."' and bid=".$bid." order by lmorder asc limit 1)  and audit=1 order by top desc, recommend desc, lmorder asc ".$limit."";
	}
	else if(intval($classid)>0)
	{
		$sql = "select * from ".$db->getTable(T_AD)." where classid = ".$classid." ".$limit." and audit=1 order by top desc, recommend desc, lmorder asc";
	}
	else
	{
		return false;
	}
	if(!empty($sql))
	{
		if($num == 1)
		{
			$data = $db->getRow($sql);
		}
		else
		{
			$data = $db->query($sql);
		}
		return $data;
	}
	else
	{
		return false;	
	}
}
?>
