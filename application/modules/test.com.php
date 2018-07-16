<?php
class test{
	

//获取留言信息
	function getMes($offset)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_TEST)." limit $offset,3";//."  where bid=".$bid." and classid=".$classid."";
		//echo $sql;die;
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}

	//总记录数
	function total(){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from ".$db->getTable(T_TEST);
		$data = $db->getOne($sql);
		return RST($data);
	}

//添加留言信息
	function addMes($data){

		$db = APP :: ADP('db');
		$data['addtime'] = date('Y-m-d H:i:s',time());
		#var_dump($data);die;
		//$sql = "insert into ".$db->getTable(T_TEST)." (contents,addtime,uid) values ()";
		//echo $sql;die;
		$res = $db->save($data,'','test','');
		return RST($res);
	}

//删除留言信息
	function delMes($id)
	{
		$db = APP :: ADP('db');
		//$sql = "select * from ".$db->getTable(T_TEST)."  where bid=".$bid." and classid=".$classid."";
		//echo $sql;
		//echo $id;die;
		$res = $db->delete($id,'test','id');
		return RST($res);
	}

//修改留言信息

	function updMes($data)
	{
		$db = APP :: ADP('db');
		$res = $db->save($data,$data["id"],'test');
		//var_dump($res);die;
		return RST($res);
	}

}