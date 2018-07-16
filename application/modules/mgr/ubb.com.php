<?php
/**************************************************
*  Created:  2012-3-12
*
*  文件说明
*  author 赵志强
*
***************************************************/
class ubb
{
	//获取分类列表
	function getclasslist($bid) 
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_UBBCLASS)." where bid=".$bid." order by lmorder asc";
		$data = $db->query($sql);
		return RST($data);
	}
	
	function getubbinfo($classid)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_UBB)." where classid=".$classid."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	
	//保存分类信息
	function saveubb($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_UBB);
		$rs = $db->save($data, $id,'',"id");
		return RST($rs);
	}
	
	function getclassname($classid,$bid)
	{
		$db = APP :: ADP('db');
		$sql = "select classname,classid from ".$db->getTable(T_UBBCLASS)." ";
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
		$sql = "select * from ".$db->getTable(T_UBBCLASS)." where classid=".$id."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	//保存分类信息
	function saveclass($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_UBBCLASS);
		$rs = $db->save($data, $id,'',"classid");
		return RST($rs);
	}
	
	//删除分类信息
	function delclass($id)
	{
		$db = APP :: ADP('db');
		$db->setTable(T_UBBCLASS);
		return RST($db -> delete($id, '', 'classid'));
	}
	//获取友情连接信息
	function getlinklist(){
		$db = APP :: ADP('db');
		$db->setTable(T_LINK);
		$sql = "select * from ".$db->getTable(T_LINK)."";
		$rs=$db->query($sql);
		return RST($rs);	
	
	}
	//删除友情连接信息
	function dellink($data){
		//var_dump($data);
		$db = APP :: ADP('db');
		$db->setTable(T_LINK);
		$id=$data['id'];
		
		//echo $id;delete($id, $table = '', $id_name = 'id')
		$sql = "delete from ".$db->getTable(T_LINK)." where id=$id";
		//echo $sql;
		$rs=$db->execute($sql);
		//var_dump($rs);
		return $rs;
	}
	//保存友情连接信息
	function savelink($data)
	{
		//var_dump($data);
		$db = APP :: ADP('db');
		$db->setTable(T_LINK);
		$rs = $db->save($data,'','',"id");
		return RST($rs);
	}
	//获取友情链接信息
	function getlinkinfo($data){
		$id=$data['id'];
		$db = APP :: ADP('db');
		$db->setTable(T_LINK);
		$sql = "select * from ".$db->getTable(T_LINK)." where id=$id";
		$rs=$db->query($sql);
		//var_dump($rs);
		return RST($rs);
		
	}
	//编辑友情链接
	function update($data){
		$db = APP :: ADP('db');
		$info=array(
			'title'=>$data['title'],
			'http'=>$data['http'],
			'id'=>$data['id']
		);
		$db->setTable(T_LINK);
		
		$rs = $db->save($info,$info['id'],'',"id");
	
		//var_dump($rs);
		return RST($rs);
	}
}
?>
