<?php
/**************************************************
*  Created:  2010-10-27
*
*  文件说明
*
*
***************************************************/
class adminCom {


  /*
   * 获取管理员数量
   * @return int
   */
	function getAdminNum() 
	{
		$db = APP :: ADP('db');
		$select_count = 'SELECT COUNT(*) FROM ' . $db->getPrefix() . T_ADMIN . '';
		return RST($db->getOne($select_count));
	}

	/*
     * 根据cc_uid获取管理员数据
     * @param int $cc_uid
     * @param int $offset
     * @param int $each
     * @return array()
     */
	function getAdminByUid($uid = '', $offset = 0, $each = 1) {
		if (!is_numeric($offset) || !is_numeric($each)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');

		$uid = $db->escape($uid);
		$where = ' WHERE `id` = ' . $uid;
		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_ADMIN . ' LEFT JOIN ' . $db->getTable(T_ADMIN_GROUP) . ' ON group_id=gid' . $where . ' ORDER BY `id` LIMIT ' . $offset . ',' . $each;
		return RST($db->query($sql));
	}
	//连表group查询
	function getAdminList2() {
		$db = APP :: ADP('db');
		$sql = 'SELECT A.*,G.group_name FROM ' . $db->getPrefix() . T_ADMIN . ' AS A LEFT JOIN ' . $db->getTable(T_ADMIN_GROUP) . ' AS G ON A.group_id=G.gid'  ;
		return RST($db->query($sql));
	}
	
	/*
     * 根据cc_uid获取管理员数据
     * @param int $cc_uid
     * @param int $offset
     * @param int $each
     * @return array()
     */
	function getAdminByCCUid($uid = '', $offset = 0, $each = 1) {
		if (!is_numeric($offset) || !is_numeric($each)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');

		$uid = $db->escape($uid);
		$where = ' WHERE `cc_uid` = ' . $uid;
		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_ADMIN   . $where ;

		return RST($db->query($sql));
	}
    /*
     * 获取管理员信息
     * @return array()
     */
	function getAdminList($offset = 0, $each = 15) 
	{
		if (!is_numeric($offset) || !is_numeric($each)) 
		{
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		$db = APP :: ADP('db');
		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_ADMIN .   ' ORDER BY `id` LIMIT ' . $offset . ',' . $each;
		return RST($db->query($sql));
	
	}
	
	//检查是否存在此用户
	function adminAddChk($username)
	{
		$db = APP :: ADP('db');
		$sql = "SELECT count(id) as count FROM " . $db->getPrefix() . T_ADMIN .   " where username='".$username."'";
		return RST($db->query($sql));
	}
	
	//获取所有权限组信息
	function getGroupList()
	{
		$db = APP :: ADP('db');
		$sql = 'SELECT gid,parent_id,group_name FROM ' . $db->getPrefix() . T_ADMIN_GROUP  ;
		return RST($db->query($sql));
	}

    /*
     * 管理员删除
     * @param int $id
	 * @param $is_cc_uid boolean 参数$id是否使用cc_uid
     * @return boolean
     */
	function delAdmin($id, $is_cc_uid = false) {
		if (!is_numeric($id)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		$this->_cleanCache();
		$db = APP :: ADP('db');
		$db->setTable(T_ADMIN);
		return RST($db->delete($id, '', $is_cc_uid?'cc_uid':'id'));

	}

    /*
     * 根据id获取管理员信息
     * @param int $id
     * @return array()
     */
	function getAdminById($id) {
		if (!is_numeric($id)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');
	
		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_ADMIN . ' WHERE id="' . $id . '"';
		return RST($db->getRow($sql));
	
	}
    /*
     * 根据id获取管理员信息
     * @param int $id
     * @return array()
     */
	function getAdminByName($username) {

		$db = APP :: ADP('db');
		$username=$db->escape($username);
		$sql = 'SELECT * FROM ' . $db->getTable(T_ADMIN). ' WHERE username="' . $username . '"';
		return RST($db->getRow($sql));
	
	}
	
	
	    /*
     * 修改,插入管理员数据
     * @param array $data
     * @param int $id
     * @return boolean
     */
	function saveAdminById($data, $id = '') {
		if(!is_array($data)) 
		{
             return RST(false, $errno=1210000, $err='Parameter can not be empty');
        }
		$this->_cleanCache();
		$db = APP :: ADP('db');
		$db->setTable(T_ADMIN);
        return RST($db->save($data, $id));
	}

	/**
	 * 得到组信息
	 *@param $group_id int
	 *@return array
	 */
	function getGroupInfo($group_id) {
		$db = APP :: ADP('db');
		$rs = $db->get($group_id, T_ADMIN_GROUP, 'gid');
		return RST($rs);
	}

	/*
	 * 清除缓存
	 */
	function _cleanCache() {
		DD('mgr/adminCom.getAdminNum');
		DD('mgr/adminCom.getAdminByUid');
		DD('mgr/adminCom.getAdminById');
	}
	
	//获取role列表
	function getRoleList(){
		$db = APP :: ADP('db');
		$db->setTable(T_USERGROUP);
		$sql='select * from '.$db->getTable(T_USERGROUP);
		//$rs = $db->save($data, $id, '', 'cc_uid');
		$rs=$db->query($sql);
		//var_dump($rs);
		//exit;
		return RST($rs);
	}
	//获取统计列表
	function getCount($table,$where=''){
		$db = APP :: ADP('db');
		if($where!='')	$where=' where '.$where;
		$sql='select count(*) from '.$db->getTable($table).$where;
		return RST($db->getOne($sql));
	}
	
}
