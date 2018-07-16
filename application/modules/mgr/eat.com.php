<?php
/**************************************************
*  Created:  2014-07-03
*
*  文件说明
*  author 陈壹宁
*
***************************************************/
class eat
{
	//获取分类列表
	function getclasslist($bid) 
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_EATCLASS)." where bid=".$bid." order by lmorder asc";
		$data = $db->query($sql);
		return RST($data);
	}
	
	function getlinklist($bid,$classid,$recommend,$audit,$top,$key,$limits,$pagesize,$flag="list")
	{
		$db 		= APP :: ADP('db');
		$sql 		= "select id,bid,classid,title,times,recommend,audit,top,lmorder from ".$db->getTable(T_EAT)." where id>0 ";
		$sql_count 	= "select count(id) as count from ".$db->getTable(T_EAT)." where id>0 ";
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
		$sql .= $sqlstr." order by top desc,recommend desc,lmorder asc,times desc limit ".$limits.",".$pagesize."";
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
	function getlinkinfo($id)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_EAT)." where id=".$id."";
		$rs = $db->getRow($sql);
		return RST($rs);
	}
	
	// 获取图片信息
	function getpicinfo($id){
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_EAT_PIC)." where pid=".$id."";
		$rs = $db->query($sql);
		return RST($rs);
	}
	
	//更新相关属性
	function update($data,$id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$sql = "update ".$db->getTable(T_EAT)." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	//删除信息
	function dellink($data,$id)
	{
		$db = APP :: ADP('db');
		$sql = "delete from ".$db->getTable(T_EAT)." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	
	//保存信息
	function savelink($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_EAT);
		$rs = $db->save($data, $id,'',"id");
		return RST($rs);
	}
	
	//保存图片信息
	function savepic($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_EAT_PIC);
		$rs = $db->save($data, $id,'',"id");
		return RST($rs);
	}
	
	//获取默认分类
	function getclassname($classid,$bid)
	{
		$db = APP :: ADP('db');
		$sql = "select classname,classid from ".$db->getTable(T_EATCLASS)." ";
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
		$sql = "select * from ".$db->getTable(T_EATCLASS)." where classid=".$id."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	//保存分类信息
	function saveclass($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_EATCLASS);
		$rs = $db->save($data, $id,'',"classid");
		return RST($rs);
	}
	
	//删除分类信息
	function delclass($id)
	{
		$db = APP :: ADP('db');
		$db->setTable(T_EATCLASS);
		return RST($db -> delete($id, '', 'classid'));
	}

}
?>
