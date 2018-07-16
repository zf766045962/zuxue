<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/application/class/page.class.php";	//引用分页类
class msg{
	//获取分类名称
	function get_classname($url){
		$db 	= APP :: ADP('db');
		$sql 	= 'select classname from '.$db->getTable(T_SYSTEM_NAV).' where classurl = "'.$url.'"';
		//echo $sql;die;
		$rs	 	= $db->query($sql);
		return RST($rs[0]['classname']);
	}
	
	//获取数据(搜索)
	function get_msg($table,$where = ''){

		$db  = APP :: ADP('db');
		$key = V('r:key');
		$val = V('r:val');
		$m	 = V('r:m');
		$pagesize = 20;			//每页记录数
		$page = V('r:page');	//当前页
		if(isset($page)){
			$offset = ($page - 1) * $pagesize;
		}else{
			$offset = 0;
		}
		
		$limit = "$offset,$pagesize";
		//echo $limit;die;
		if($where == '')
			$where = " where 1=1 ";
		else
			$where = " where ".$where;
		
		if(!empty($key) && !empty($val)){
			$where .= " and ".$key." like '%".$val."%'";
		}
		
		/**********************************************************/
		/************************根据情况****************************/
		if(V('r:type',-1) != -1){
			$where .= " and type = ".V('r:type');
		}
		
		if(V('r:port',1) == 0){
			$where .= " and portCode != 1";
		}

		if(V('r:is_root',-1) != -1){
			$where .= " and is_root = ".V('r:is_root');
		}
		/**********************************************************/
		/**********************************************************/
		
		$sql2 = "select count(*) as num from ".$table.$where;
		$total = $db->query($sql2);	//总记录数

		$page = new RewritePage($total[0]["num"],$pagesize,$page,'?m='.$m.'&type='.V('r:type',-1).'&page={page}');

		$data['pagehtml'] = $page -> myde_write();

		$sql = "select * from ".$table.$where;
		$sql .= " order by addtime desc";
		$sql .= " limit ".$limit;

//echo $sql;
		$data["info"] = $db->query($sql);
//var_dump($data["info"]);die;
		return RST($data);

	}
	
	//***************************获取详细记录********************************/
	function get_one($id,$table){
		$db = APP :: ADP('db');
		$sql = "select * from ".$table." where id in (".$id.")";
		$info = $db->query($sql);
		return RST($info);
	}
	
	//***************************添加|修改*******************************/
	function save_msg($data,$table){
		$db = APP :: ADP('db');
		if(isset($data["id"]) && $data["id"] != 0)
		{
			$rs = $db->save($data,$data['id'],$table,'id');
		}
		else
		{
			$data["addtime"] = date('Y-m-d H:i:s');
			$rs = $db->save($data,'',$table,'');
		}
		return RST($rs);
	}
	
	//***************************批量删除********************************/
	function delmsg($id,$table){
		$db = APP :: ADP('db');
		$sql = "delete from ".$table." where id in (".$id.")";
		return $db->execute($sql);
	}

	//***************************批量审核(暂无用)**************************/
	function updmsg($id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$table = $db->getTable(T_USERS);
		$sql = "update ".$table." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}

	//***************************用户密码重置(暂无用)***********************/
	function user_psw($id,$psw){
		$db = APP :: ADP('db');
		$table = $db->getTable(T_USERS);
		$sql = "update ".$table." set userpwd = '".$psw."' where id = '".$id."'";
		return $db->save(array('userpwd'=>md5($psw)),$id,'users','id');
	}

}
?>