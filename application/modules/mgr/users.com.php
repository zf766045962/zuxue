<?php
/**************************************************
*  Created:  2012-3-12
*
*  文件说明
*  author 赵志强
*
***************************************************/
class users
{
	//获取会员列表
	function getuserlist($limits,$pagesize)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_USERS)."  order by times desc limit ".$limits.",".$pagesize."";
		$data = $db->query($sql);
		return RST($data);
	}
	
	//获取会员总数
	function getUsersNum()
	{
		$db = APP :: ADP('db');
		$sql = "select count(id) as count from ".$db->getTable(T_USERS)."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	function getUsersInfo($id){
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_USERS)." where id=".$id;
		
		$rs = $db->getRow($sql);
		return RST($rs);
	}
	function saveusers($id,$data){
		$db = APP :: ADP('db');
		if(empty($id)){
			foreach($data as $key=>$val){
				if(!empty($val)){
					@$flagtype.=$key.',';
					if(!is_numeric($val)){
					@$flagvalue.="'$val'".',';
					}else{						
					@$flagvalue.=$val.',';
					}
				}
			}
			$flagtype=rtrim($flagtype,',');
			$flagvalue=rtrim($flagvalue,',');
			$sql="INSERT INTO ".$db->getTable(T_USERS)."(".$flagtype.") VALUES(".$flagvalue.")";
			$result=$db->execute($sql);
			
		}else{		
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
			$sql="UPDATE ".$db->getTable(T_USERS)." SET ".$where." WHERE id=".$id."";
			
			$result=$db->execute($sql);
		}
		return RST($result);
	}
	//更新相关属性
	function update($id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$sql = "update ".$db->getTable(T_USERS)." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		
		$rs = $db->execute($sql);
		return RST($rs);
	}
	
	//删除分类信息
	function del($id)
	{
		$db = APP :: ADP('db');
		$db->setTable(T_USERS);
		return RST($db -> delete($id, '', 'id'));
	}

}
?>
