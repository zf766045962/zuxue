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
class permitCom {

	//获取应用列表 
	function appList(){
		$db = APP :: ADP('db');
		$sql='select * from '.$db->getTable(T_APP);
		$rs=$db->query($sql);
		return RST($rs);
	}
	/*
	 * 插入或更新一条APP数据
     * @param array() $data		用户数据数组
	 * @param int $id		
     * @return boolean
	 */
	 function setApp($data,$id=''){
	 
		$db = APP :: ADP('db');
		$db->setTable(T_APP);

	
		$rs = $db->save($data, $id);
		return RST($rs);
	 
	 }
	//获取应用 
	function getAppByName($appName){
		$db = APP :: ADP('db');
		$appName = $db->escape($appName);
		$sql='select * from '.$db->getTable(T_APP).' where app_name="'.$appName.'"';

		//$rs = $db->save($data, $id, '', 'cc_uid');
		$rs=$db->getrow($sql);
		//var_dump($rs);
		//exit;
		return RST($rs);
	}
	//获取应用的模块 
	function getModuleByAppname($appName){
		$db = APP :: ADP('db');
		$appName = $db->escape($appName);
		$sql='select * from '.$db->getTable(T_APP_MODULE).' where app_name="'.$appName.'"';
		$rs=$db->query($sql);
		return RST($rs);
	}
	//获取模块 
	function getModuleByName($appName,$moduleName){
		$db = APP :: ADP('db');
		$appName = $db->escape($appName);
		$moduleName = $db->escape($moduleName);
		if($moduleName){
			$sql='select * from '.$db->getTable(T_APP_MODULE).' where app_name="'.$appName.'" and module_Name="'.$moduleName.'"';
			$rs=$db->getrow($sql);
			return RST($rs);
		}
		else return RST(false);
	}
	/*
	 * 插入或更新一条module数据
     * @param array() $data		用户数据数组
	 * @param int $id		
     * @return boolean
	 */
	 function setModule($data){
	 
		$db = APP :: ADP('db');
		$db->setTable(T_APP_MODULE);
		$rs = $db->save($data, $data['id']);
		return RST($rs);
	 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 //获取用户组内容
	 function getUsergroupByGid($gid){
		$db = APP :: ADP('db');
	//	$db->setTable(T_USERGROUP);
		$table= $db->getTable(T_USERGROUP);
		$sql  = "Select gid,g_name,g_desc From $table Where gid=$gid";
		//var_dump($sql);
	 	$rs	=$db->query($sql);
		return RST($rs);
	 }
	//删除用户组
	function del($gid){
		$db = APP :: ADP('db');
		$db->setTable(T_USERGROUP);
		$this->_cleanCache();
		return RST($db->delete($gid, '', 'gid'));
	}
	//设置权限
	function permission_set($data){
	 
		$db = APP :: ADP('db');
		$db->setTable(T_USERGROUP);
		$rs = $db->save($data, $data['gid'], '', 'gid');
		return RST($rs);
	 
	 }

		   
	 
//---------------------------------------------------------------------------	
	/*
	 * 插入或更新一条用户登录数据
     * @param array() $data		用户数据数组
	 * @param int $id		cc_uid
     * @return boolean
	 */
	 
	 
	function insertUser($data, $id = '') {
		if(!is_array($data)) {
			return RST(false, $errno=1210000, $err='Parameter can not be empty');
		}
		
		$this->_cleanCache();
		$db = APP :: ADP('db');
		$db->setTable(T_USERS);
		$rs = $db->save($data, $id, '', 'cc_uid');
		
		return RST($rs);
	}

	/**
	 * 返回统计所有微博数
	 * @return int
	 */
	function counts($type = '') {
		$db = APP :: ADP('db');
		$sql = 'SELECT COUNT(*)AS count FROM ' . $db->getTable(T_USERS);
		if ($type === 'today')  {
			$sql .= ' WHERE  FROM_UNIXTIME(`first_login`,"%Y%m%d")="'. date('Ymd') . '"';
		}
		$count = $db->getOne($sql);
		return RST($count);
	}

	/*
	* 根据用户名称获取用户数据
    * @param string $nickname
    * @param int $offset
    * @param int $each
    * @return array()
	*/
	function getByName($nickname, $offset = 0, $each = 0) {
		if (!is_numeric($offset) || !is_numeric($each)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');
		$keyword = (string)$db->escape($nickname);

		$where = $limit = "";
		if($keyword !== '') {
			$where = ' WHERE `nickname` LIKE "%' . $keyword . '%" ';
		}

		if($each) {
			$limit =  ' LIMIT ' . $offset . ',' . $each;
		}

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USERS. $where . ' ORDER BY `first_login` DESC ' . $limit;
	//	var_dump($sql);
		return RST($db->query($sql));
	}
	
	
   /**
	* 根据用户名称获取用户CCID
    * @param string $nickname
    * @return bigint
	*/
	function getSinaUidByName($nickname) 
	{
		if( $nickname=$db->escape($nickname) ) 
		{
			$db 	= APP::ADP('db');
			$table 	= $db->getTable(T_USERS);
			$sql	= "Select cc_uid From $table Where nickname='$nickname'";
			return $db->getOne($sql);
		}

		return FALSE;
	}
	

	/**
	* 根据cc_uid称获取用户数据
    * @param int $cc_uid
    * @return array()
	*/
	function getByUid($cc_uid) {
		if (!is_numeric($cc_uid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
	
		$db = APP :: ADP('db');
		$cc_uid = $db->escape($cc_uid);

		$where = " WHERE `uid` = '" . $cc_uid . "'"; 

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USERS. $where . ' ORDER BY `cc_uid` DESC ';
		return RST($db->getRow($sql));
	}

	/**
	* 根据一组cc_uid称获取用户昵称
    * @param array $cc_uid
    * @return RST_Array
	*/
	function getNicknameByUids($cc_uids) {
		$db = APP :: ADP('db');
		$find = array();
		foreach($cc_uids as $uid){
			if(is_numeric($uid)){
				$find[] = "'". $db->escape($uid). "'";
			}
		}
		
		if(empty($find)){
			return array();
		}
		
		$where = " WHERE `cc_uid` IN (" . implode(',', $find) . ")"; 
		$sql = 'SELECT `cc_uid`, `nickname` FROM ' . $db->getPrefix() . T_USERS. $where . ' ORDER BY `cc_uid` DESC ';
		$res = $db->query($sql);
		if(!is_array($res)){
			return RST(array());
		}else{
			return RST($res);
		}
	}
	
	/**
	* 根据附属站 uid称获取用户数据
    * @param int $cc_uid
    * @return array()
	*/
	function getBySiteUid($site_uid) {
		if (!is_numeric($site_uid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
	
		$db = APP :: ADP('db');
		$site_uid = $db->escape($site_uid);

		$where = " WHERE `uid` = '" . $site_uid . "'";

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USERS. $where . ' ORDER BY `cc_uid` DESC ';
		return RST($db->getRow($sql));
	}
	
 	/**
	* 获取所有的用户加V用户
    * @param int $offset
    * @param int $each
    * @return boolean
	*/
	function getAllVerify($offset = 0, $each = 0) {
		if (!is_numeric($offset) || !is_numeric($each)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
                                
		$db = APP :: ADP('db');

		$limit = "";
		if($each) {
			$limit =  ' LIMIT ' . $offset . ',' . $each;
		}
		
		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USER_VERIFY. ' ORDER BY `add_time` DESC ' . $limit;
		return RST($db->query($sql));
	}
	
	/**
	 * 得到一key/value对应的认证用户列表,其中key为cc_uid,value为用户昵称
	 * @return array
	 */
	function getVerify() {
		$db = APP::ADP('db');
		$sql = 'SELECT * FROM ' . $db->getTable(T_USER_VERIFY);
		$rst = $db->query($sql);
		if ($rst === false) {
			return RST(false);
		}
		$data = array();
		for ($i=0,$count=count($rst); $i<$count; $i++) {
			$data[(string)$rst[$i]['cc_uid']] = array('nick' => $rst[$i]['nick'], 'reason' => $rst[$i]['reason']);
		}
		return RST($data);
	}

	/**
	* 根据用户id获取被禁封用户
    * @param int $cc_uid
    * @return array
	*/
	function getUseBanById($cc_uid) {
		if(empty($cc_uid)) {
			return RST(false, $errno=1210000, $err='Parameter can not be empty');
		}

		if (!is_numeric($cc_uid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USER_BAN . ' WHERE `cc_uid` = "' . $cc_uid . '"  ORDER BY `cc_uid` DESC';
		return RST($db->getRow($sql));
	}

	/**
	* 根据用户昵称获取被禁封用户
    * @param string $name
    * @return array
	*/
	function getUseBanByName($name, $offset = 0, $each = 0) {
		$where = '';
		$db = APP :: ADP('db');
		$name = $db->escape($name);
		if($name) {
			$where = ' WHERE `nick` like "%' . $name . '%"';
		}

		$limit = "";
		if($each) {
			$limit =  ' LIMIT ' . $offset . ',' . $each;
		}

		$db = APP :: ADP('db');

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USER_BAN . $where . ' ORDER BY `ban_time` DESC ' . $limit;
		return RST($db->query($sql));
	}

	/**
	* 根据用户id获取用户是否加V
    * @param int $cc_uid
    * @return boolean
	*/
	function getVerifyById($cc_uid) {
		if (!is_numeric($cc_uid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');
		$keyword = $db->escape($cc_uid);

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USER_VERIFY. ' WHERE `cc_uid` = "' . $keyword . '" ORDER BY `cc_uid` DESC ';
		if($db->getOne($sql)) {
			return RST(true);
		}else{
            return RST(false);
		}
	}

    /*
     * 存储用户加v
     * @param int $id
     * @param array $data
     * @return boolean
     */
	function saveVerify($data, $id = '', $id_name = 'id') {
		$db = APP :: ADP('db');
		$this->_cleanCache();
		$db->save($data, $id, T_USER_VERIFY, $id_name);
		return RST(true);
	}

    /*
     * 删除用户加v
     * @param int $id
     * @return boolean
     */
	function delVerify($id) {
		$db = APP :: ADP('db');
		$db->setTable(T_USER_VERIFY);
		$this->_cleanCache();
		return RST($db->delete($id, '', 'cc_uid'));
	}

	/**
	* 根据cc_uid获取用户是否为封禁用户
    * @param int $cc_uid
    * @return boolean
	*/
	function getBanByUid($cc_uid) {
		if(empty($cc_uid)) {
			return RST(false, $errno=1210000, $err='Parameter can not be empty');
		}

		if (!is_numeric($cc_uid)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}

		$db = APP :: ADP('db');
		$keyword = $db->escape($cc_uid);

		$sql = 'SELECT * FROM ' . $db->getPrefix() . T_USER_BAN. ' WHERE `cc_uid` = ' . $keyword . ' ORDER BY `cc_uid` DESC ';
		if($db->getOne($sql)) {
             return RST(true);
		}else{
             return RST(false);
		}
	}

    /*
     * 存储禁封用户
     * @param int $id
     * @param array $data
     * @return boolean
     */
	function saveBan($data, $id = '') {
		$db = APP :: ADP('db');
		$db->setTable(T_USER_BAN);
		$this->_cleanCache();
        return RST($db->save($data, $id));
	}


    /*
     * 删除禁封用户
     * @param int $id
     * @return boolean
     */
	function delBan($id) {
		$db = APP :: ADP('db');
		$db->setTable(T_USER_BAN);
		$this->_cleanCache();
		return RST($db->delete($id, '', 'cc_uid'));
	}

	/*
	 * 清除缓存
	 */
	function _cleanCache() {
		DD('mgr/userCom.getByUid');
		DD('mgr/userCom.getByName');
		DD('mgr/userCom.getBySiteUid');
		DD('mgr/userCom.getAllVerify');
		DD('mgr/userCom.getVerify');
		DD('mgr/userCom.getUseBanById');
		DD('mgr/userCom.getUseBanByName');
		DD('mgr/userCom.getVerifyById');
		DD('mgr/userCom.getBanByUid');
	}
	
	
  /**
    * 设置用户的短domain
    * 
    * @param mixed $uid
    * @param mixed $domain
    */
    function setUserDomain($uid, $domain) 
    {
    	if ($uid && $domain)
    	{
	        $db  	= APP::ADP('db');
	        $table 	= $db->getTable(T_USERS);
	        $domain = $db->escape($domain);
	        $sql 	= "Update $table Set domain_name='$domain' Where cc_uid='$uid'";
	        
	        if ($db->execute($sql) !== false)
	        {
	        	USER::set('domain_name', $domain);
	        	return TRUE;
	        }
    	}
    	return FALSE;
    }
    
    
    /**
    * 根据用户短域名，从数据查询用户　
    * 
    * @param mixed $domain
    */
    function getUidByDomain($domain) 
    {
    	if ($domain)
    	{
	        $db  	= APP::ADP('db');
	        $table 	= $db->getTable(T_USERS);
	        $domain = $db->escape($domain);
	        return $db->getOne("Select cc_uid From $table Where domain_name='$domain'");
    	}
    	return FALSE;
    }
    
    
    /**
    * 根据用户短域名，从数据查询用户　
    * 
    * @param mixed $domain
    */
    function isDomainExist($domain) 
    {
    	$result = FALSE;
    	
    	if ($domain)
    	{
	        $db  	= APP::ADP('db');
	        $table 	= $db->getTable(T_USERS);
	        $domain = $db->escape($domain);
	        
	        // 检查是否已有用户设置相同域名
	        $result = $db->getRow("Select * From $table Where domain_name='$domain'");
	        
	        // 检查是否域名保留字
	        if ( empty($result) )
	        {
	        	$kdTable = $db->getTable(KEEP_USERDOMAIN);
	        	$result  = $db->getRow("Select * From $kdTable Where keep_domain='$domain'");
	        }
    	}
    	return empty($result) ? FALSE : TRUE;
    }
	/**
	  *  对某个用户进行操作 
	  */
	function setUserAction($cc_uid,$action_type){
		if(isset($cc_uid)&&in_array($action_type,array(1,2,3,4))){
			$db  	= APP::ADP('db');
			$table 	= $db->getTable(T_USER_ACTION);
			$rst=$db->query(sprintf("select id from %s where cc_uid='%s'",$table,$cc_uid));
			if(empty($rst)){
				$id='';
			}
			else{
				$id=$rst[0]['id'];
			}
			$rst=$db->save(array('cc_uid'=>$cc_uid,'action_type'=>$action_type),$id,T_USER_ACTION);
			if($rst){
				return TRUE;
			}
		}
		else{
			return NULL;
		}
	}
	
	/**
	  *  获取是所有禁止用户列表 
	  */
	function getUserActionList(){
			$db  	= APP::ADP('db');
			$table 	= $db->getTable(T_USER_ACTION);
			$rst=$db->query(sprintf("select cc_uid,action_type from %s",$table));
			return RST($rst);
	}
	
	/**
	  *  获取某用户的看控制列表
	  *  
	  */
	function getUserAction($cc_uid){
			$db  	= APP::ADP('db');
			$table 	= $db->getTable(T_USER_ACTION);
			$rst=$db->query(sprintf("select action_type from %s where cc_uid=%s",$table,$cc_uid));
			if(empty($rst)){
				$rst=array();
				$rst[0]=array();
				$rst[0]['action_type']=4;
			}
			return RST($rst);
	}
	
	
	/**
	 * 获取新浪关系的 本地关注排行版
	 * @param $showNum
	 */
	function getSinaFollowerTop($showNum)
	{
		$db  	= APP::ADP('db');
		$table	= $db->getTable(T_USERS);
		$sql	= "Select cc_uid From $table Order By followers_count Desc Limit $showNum";
		$temp	= $db->query($sql);
		$list	= array();
		
		if (is_array($temp))
		{
			foreach($temp as $val)
			{
				array_push($list, $val['cc_uid']);
			}	
		}
		return $list;
	}
	
}
