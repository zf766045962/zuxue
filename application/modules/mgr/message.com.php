<?php
/**************************************************
*  Created:  2012-3-12
*
*  文件说明
*  author 赵志强
*
***************************************************/
class message
{
		
	function getnewslist($classid,$name,$start_date,$stop_date,$limits,$pagesize,$flag="list")
	{
		
		$start_date		=strtotime($start_date);
		$stop_date		=strtotime($stop_date);
			
		$db 		= APP :: ADP('db');
		@$sql 		= "select * from ".$db->getTable(MESSAGE)." where id>0 ";
		@$sql_count 	= "select count(id) as count from ".$db->getTable(MESSAGE)." where id>0 ";
		$sqlstr 	= "";
		
		if(!empty($classid))
		{
			$sqlstr .= " and classid=".$classid." ";
		}
		if(!empty($name))
		{
			$sqlstr .= " and name like '%".$name."%' ";
		}
		if(!empty($start_date)&&!empty($stop_date))
		{
			$sqlstr .= " and addtime > ".$start_date." and addtime < ".$stop_date." ";
		}

		$sql_count .= $sqlstr;
		$sql .= $sqlstr." order by addtime desc limit ".$limits.",".$pagesize."";
		//echo $sql;
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
	function getnewsinfo($id)
	{
		$db = APP :: ADP('db');
		@$sql = "select * from ".$db->getTable(MESSAGE)." where id=".$id."";
		$rs = $db->getRow($sql);
		return $rs;
	}
	
	//更新相关属性
	function update($data,$id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$sql = "update ".$db->getTable(T_NEWS)." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	//删除信息
	function delnews($id)
	{
		$db = APP :: ADP('db');
		@$sql = "delete from ".$db->getTable(MESSAGE)." where id in (".$id.")";
		echo $sql;
		$rs = $db->execute($sql);
		return $rs;
	}
	function savemessage($id,$data){
		$db = APP :: ADP('db');
		
		foreach($data as $key=>$val){
			if(!empty($val)){										
			if(!is_numeric($val)){
				@$where.=$key."='".$val."',";
			}else{
				@$where.=$key."=".$val.",";
			}
			}else if($val==null){
			@$where.=$key."='".$val."',";
			}
		}
			
		$where=rtrim($where,',');
		@$sql="UPDATE ".$db->getTable(MESSAGE)." SET ".$where." WHERE id=".$id."";
		//echo $sql;
		$rs=$db->execute($sql);
		return RST($rs);
	}
	

}
?>
