<?php
/**************************************************
*  Created:  2012-3-16
*
*  获取ubb值 
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
function getUbb($bid,$classid) 
{
	$db = APP::ADP("db");
	$sql = "";
	if(intval($bid)==0&&intval($classid)==0)
	{
		return false;
	}
	else if(empty($classid))
	{
		$sql = "select * from ".$db->getTable(T_UBB)." where classid = (select classid from ".$db->getTable(T_UBBCLASS)." where bid=".$bid." order by lmorder asc limit 1)";
	}
	else if(intval($classid)==0)
	{
		$sql = "select * from ".$db->getTable(T_UBB)." where classid in (select classid from ".$db->getTable(T_UBBCLASS)." where classname='".$classid."' and bid=".$bid." order by lmorder asc)";
	}
	else if(intval($classid)>0)
	{
		$sql = "select * from ".$db->getTable(T_UBB)." where classid = ".$classid."";
	}
	else
	{
		return false;
	}
	if(!empty($sql))
	{
		$data = $db->getRow($sql);
		if(!empty($data))
		{
			$data["content"]=F("uEditor.outHtml",$data["content"]);
			return $data["content"];
		}
		else
		{
			return "";
		}
	}
	else
	{
		return false;	
	}
}
function getUbbArr($bid,$classid="") 
{
	$db = APP::ADP("db");
	$sql = "";
	if(intval($bid)==0&&intval($classid)==0)
	{
		return false;
	}
	else if(empty($classid))
	{
		$sql = "select * from ".$db->getTable(T_UBB)." u left join ".$db->getTable(T_UBBCLASS)." c on u.classid=c.classid where c.bid=".$bid." order by c.lmorder asc limit 1";
	}
	else if(intval($classid)==0)
	{
		$sql = "select * from ".$db->getTable(T_UBB)." u left join ".$db->getTable(T_UBBCLASS)." c on u.classid=c.classid where c.classname='".$classid."' and c.bid=".$bid." order by c.lmorder asc";
	}
	else if(intval($classid)>0)
	{
		$sql = "select * from ".$db->getTable(T_UBB)." u left join ".$db->getTable(T_UBBCLASS)." c on u.classid=c.classid where c.classid = ".$classid."";
	}
	else
	{
		return false;
	}
	if(!empty($sql))
	{
		$data = $db->getRow($sql);
		return $data;
	}
	else
	{
		return false;	
	}
}











?>
