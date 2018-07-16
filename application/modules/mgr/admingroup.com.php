<?php
/**************************************************
*  Created:  2011-10-18
*
*  用户组 处理函数类
*
*  @Xsmart (C)2006-2099Inc.
*  @Author liu
*
***************************************************/
class admingroup {
	
	//获取admingroup列表
	function getAdmingroupList(){
		$db = APP :: ADP('db');
		$db->setTable(T_USERGROUP);
		$sql='select * from '.$db->getTable(T_ADMIN_GROUP) .' where parent_id=0';
		$rs=$db->query($sql);
		return RST($rs);
	}
	//获取所有admingroup列表
	function getAdminAllgroupList(){
		$db = APP :: ADP('db');
		$db->setTable(T_USERGROUP);
		$sql='select * from '.$db->getTable(T_ADMIN_GROUP) .'';
		$rs=$db->query($sql);
		return RST($rs);
	}
	/*
	 * 插入或更新一条用户登录数据
     * @param array() $data		用户数据数组
	 * @param int $id		cc_uid
     * @return boolean
	 */
	 function set($data){
	 
		$db = APP :: ADP('db');
		$db->setTable(T_ADMIN_GROUP);
		$rs = $db->save($data, $data['gid'], '', 'gid');
		return RST($rs);
	 
	 }
	 //获取用户组内容
	 function getAdmingroupByGid($gid){
		$db = APP :: ADP('db');
	//	$db->setTable(T_USERGROUP);
		$table= $db->getTable(T_ADMIN_GROUP);
		$sql  = "Select * From $table Where gid=$gid";
		//var_dump($sql);
	 	$rs	=$db->getRow($sql);
		return RST($rs);
	 }
	 
	 //获取用户组权限信息
	function getPermissionsByGid($gid)
	{
		$db = APP :: ADP('db');
		$table= $db->getTable(T_ADMIN_GROUP);
		$sql  = "Select permissions From $table Where gid=$gid";
	 	$rs	=$db->getRow($sql);
		return RST($rs);
	}
	 
	 
	function chkDel($gid)
	{
		$db 					= APP :: ADP('db');
		$table 					= $db->getTable(T_ADMIN_GROUP);
		$table_admin 			= $db->getTable(T_ADMIN);
		//$this->_cleanCache();
		$chkdel["flag"] 		= true;
		$chkdel["msg"] 			= "";
		$sql  					= "Select count(gid) as count From $table Where parent_id=$gid";
		$rs						= $db->getRow($sql);
		if(intval($rs["count"]) > 0)
		{
			$chkdel["flag"] 	= false;
			$chkdel["msg"] 		= "此权限组下面有子权限组，要想删除先删除子权限组！";
		}
		if($chkdel["flag"])
		{
			$sql  				= "Select count(id) as count From $table_admin Where group_id in (select gid from $table where parent_id=$gid) or group_id=$gid";
			$rs					= $db->getRow($sql);
			if(intval($rs["count"]) > 0)
			{
				$chkdel["flag"] = false;
				$chkdel["msg"] 	= "此权限组或者子权限组下面有管理员，要想删除先将管理员转移到其他权限组下面！";
			}
		}
		return RST($chkdel);
	}
	//删除用户组
	function del($gid)
	{
		$db 				= APP :: ADP('db');
		$table 				= $db->setTable(T_ADMIN_GROUP);
		//$this->_cleanCache();
		return RST($db -> delete($gid, '', 'gid'));
	}
	//设置权限
	function permission_set($data)
	{
		$db 				= APP :: ADP('db');
		$db 				-> setTable(T_ADMIN_GROUP);
		$rs 				= $db->save($data, $data['gid'], '', 'gid');
		return RST($rs);
	 }

	
	/**
	* 根据gid称获取用户数据
    * @param int $cc_uid
    * @return array()
	*/
	function getAdminByGid($gid) {
		if (!is_numeric($gid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
	
		$db = APP :: ADP('db');
		$gid = $db->escape($gid);

		$where = " on A.group_id=G.gid   WHERE  A.`group_id` = " . $gid; 

		$sql = 'SELECT A.* FROM ' . $db->getTable(T_ADMIN) . ' as A LEFT JOIN '.$db->getTable(T_ADMIN_GROUP). ' as G '.$where . '    ';
		return RST($db->query($sql));
	}
	   
	/**
	* 根据gid获取子分类
    * @param int $cc_uid
    * @return array()
	*/
	function getGroupChildByGid($gid) 
	{
		if(!is_numeric($gid))
		{
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		$db 		= APP :: ADP('db');
		$table 		= $db->getTable(T_ADMIN_GROUP);
		$gid 		= $db->escape($gid);
		$sql 		= 'select * from '.$table.' where parent_id='.$gid;
		return RST($db->query($sql));
	}
	   
	 
	
}
