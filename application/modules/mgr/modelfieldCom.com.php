<?php
/**************************************************
*  Created:  2015-01-20
*
*  文件说明
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chen
*
***************************************************/
class modelfieldCom {
	var $db;
	var $table;
	var $table_model;
	var $keyName;
	function modelfieldCom() {
		$this->db 			= APP :: ADP('db');
		$this->db->setTable(T_MODEL_FIELD);
		$this->table 		= $this->db->getTable(T_MODEL_FIELD);
		$this->table_model 	= $this->db->getTable(T_MODEL);
		$this->keyName 		= $this->db->get_primary($this->table);
	}

	/*
	 * 插入或更新一条模型数据
     * @param array() $data	数据数组
	 * @param int $id
     * @return boolean
	 */
	function save($data, $id = '',$keyName = '') {
		if($keyName=='')  $keyName = $this->keyName;
		if(!is_array($data)) {
			return RST(false, $errno=1210000, $err='Parameter can not be empty');
		}
		$rs = $this->db->save($data, $id, '',$keyName );
		return RST($rs);
	}
	// 模型的所有字段
	function getFieldByModelId($keyID) 
	{
		$sql = 'SELECT * FROM ' . $this->table .' where `modelid`='.$keyID;
		return RST($this->db->query($sql));
	}
	
	// 字段信息
	function getItemByKeyID($keyID) 
	{
		$sql = 'SELECT * FROM ' . $this->table .' where `'.$this->keyName.'`="'.$keyID.'"'	;
		return RST($this->db->getRow($sql));
	}
	
	function delMulti($keyIDs,$keyName='') 
	{
		if($keyName=='')  $keyName = $this->keyName;
		$sql = 'delete * FROM ' . $this->table.' where `'. $keyName.'` in('.keyIDs.')';
		return RST($this->db->query($sql));
	}
	
	// 获取模型列表
	function getList($where='',	$order='',	$offset=0, $each=0, $key='')
	{
		$sql = 'SELECT F.*,M.tablename  FROM ' . $this->table_model .  ' AS M left join '.$this->table.' AS F on F.modelid = M.modelId ';
		if($where!='')  $sql.=	' where M.'.$where;
		if($order!='')  $sql.=	' ORDER BY '. $order;
		if($each > 0)	$sql.=	' LIMIT ' . $offset . ',' . $each;
		return RST($this->db->query($sql,$fetch_mode = MYSQL_ASSOC,$key));
	}
	
	function getOne($query)
	{
		if(isset($query['fieldid']) && $query['fieldid']){
			$fieldid = $this->db->escape($query['fieldid']);
			$where[] = '(fieldid=' .$fieldid .')';
		}
		if (!empty($where)) {
			$where = ' WHERE '.implode(' AND ', $where);
		} else {
			$where = '';
		}
		$sql = "select * from ".$this->db->getTable(T_MODEL_FIELD).$where;
		//echo $sql;
		return RST($this->db->getRow($sql));
	}
	
    /*
     * 删除字段数据
     * @param int $id
     * @return boolean
     */
	function delOne($keyID,$keyName) {
		if($keyName == '')  $keyName = $this->keyName;
	
		if (!is_numeric($keyID)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		return RST($this->db->delete($keyID, '',$keyName ));
	}
	
	// 删除表字段
	function drop_field($tablename,$field) {
		$table_name = $this->db->getPrefix().$tablename;
		$fields 	= $this->db->get_fields($table_name);
		if(in_array($field, array_keys($fields))) {
			return RST($this->db->execute("ALTER TABLE `$table_name` DROP `$field`;"));
		} else {
			return false;
		}
	}

	function getTableByModelid($query){
		if(isset($query['modelid']) && $query['modelid']){
			$modelid = $this->db->escape($query['modelid']);
			$where[] = '(modelid=' .$modelid .')';
		}
		if (!empty($where)) {
			$where = ' WHERE '.implode(' AND ', $where);
		} else {
			$where = '';
		}
		$sql = "select * from ".$this->table_model.$where;
		return RST($this->db->getRow($sql));
	}

	function get_fields($modelid)
	{
		$model_table = $this->db->getOne("select tablename from $this->table_model where modelid='".$modelid."'");
		$this->table_name = $this->db->getPrefix().$model_table;
		return  $this->db->get_fields($this->table_name);
	}
	
	// 返回统计模型数量
	function Counts($where = '') 
	{
		if($where != '') $where = ' where '.$where;
		$sql 	= 'SELECT COUNT(*) AS count FROM ' . $this->table.$where;
		$count 	= $this->db->getOne($sql);
		return RST($count);
	}
}