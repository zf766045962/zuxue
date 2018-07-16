<?php
/**************************************************
*  Created:  2012-3-12
*
*  文件说明
*  author 赵志强
*
***************************************************/
class group
{
	//获取分类列表
	function getclasslist($bid) 
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_GROUPCLASS)." where bid=".$bid." order by lmorder asc";
		$data = $db->query($sql);
		return RST($data);
	}
	
	function getgrouplist($bid,$classid,$recommend,$audit,$top,$key,$limits,$pagesize,$flag="list")
	{
		$db 		= APP :: ADP('db');
		$sql 		= "select id,bid,classid,title,times,recommend,audit,top,imgurl from ".$db->getTable(T_GROUP)." where id>0 ";
		$sql_count 	= "select count(id) as count from ".$db->getTable(T_GROUP)." where id>0 ";
		$sqlstr 	= "";
		if(!empty($bid))
		{
			$sqlstr .= " and bid=".$bid." ";
		}
		if(!empty($classid))
		{
			$sqlstr .= " and classid=".$classid." ";
		}
		if(!empty($recommend))
		{
			$sqlstr .= " and recommend=".$recommend." ";
		}
		if(!empty($audit))
		{
			$sqlstr .= " and audit=".$audit." ";
		}
		if(!empty($top))
		{
			$sqlstr .= " and top=".$top." ";
		}
		if(!empty($key))
		{
			$sqlstr .= " and title like '%".$key."%' ";
		}
		$sql_count .= $sqlstr;
		$sql .= $sqlstr." order by times desc limit ".$limits.",".$pagesize."";
		if($flag == "list")
		{
			$data = $db->query($sql);
		}
		else
		{
			$data = $db->getRow($sql_count);
		}
		return RST($data);
	}
	
	//获取新闻信息
	function getgroupinfo($id)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_GROUP)." where id=".$id."";
		$rs = $db->getRow($sql);
		return RST($rs);
	}
	
	//更新相关属性
	function update($data,$id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$sql = "update ".$db->getTable(T_GROUP)." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	//删除信息
	function delgroup($data,$id)
	{
		$db = APP :: ADP('db');
		$sql = "delete from ".$db->getTable(T_GROUP)." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	
	//保存信息
	function savegroup($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_GROUP);
		$rs = $db->save($data, $id,'',"id");
		return RST($rs);
	}
	
	
	//获取默认分类
	function getclassname($classid,$bid)
	{
		$db = APP :: ADP('db');
		$sql = "select classname,classid from ".$db->getTable(T_GROUPCLASS)." ";
		if(intval($classid)>0)
		{
			$sql .= "where classid=".$classid."";
		}
		else
		{
			$sql .= "where bid=".$bid." limit 0,1";
		}
		return RST($db->getRow($sql));
	}
	
	
	//获取分类信息
	function getinfo($id)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_GROUPCLASS)." where classid=".$id."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	//保存分类信息
	function saveclass($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_GROUPCLASS);
		$rs = $db->save($data, $id,'',"classid");
		return RST($rs);
	}
	
	//删除分类信息
	function delclass($id)
	{
		$db = APP :: ADP('db');
		$db->setTable(T_GROUPCLASS);
		return RST($db -> delete($id, '', 'classid'));
	}

}
?>
