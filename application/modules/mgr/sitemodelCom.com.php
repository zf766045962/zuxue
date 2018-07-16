<?php
/**************************************************
*  Created:  2015-01-13
*
*  文件说明
*
*  @Xsmart (C)2015-2099Inc.
*  @Author Chen
*
***************************************************/
class sitemodelCom {
	var $db;
	var $table = '';
	var $table_field = '';
	var $keyName;
	function sitemodelCom() {
		$this->db 			= APP :: ADP('db');
		$this->db->setTable(T_MODEL);
		$this->table 		= $this->db->getTable(T_MODEL);
		$this->table_field 	= $this->db->getTable(T_MODEL);
		$this->keyName		= $this->db->get_primary($this->table);
	}
	/*
	 * 插入或更新一条模型数据
     * @param array() $data		用户数据数组
	 * @param int $id		cc_uid
     * @return boolean
	 */
	function save($data, $id = '',$keyName='') {
		if($keyName=='')  $keyName = $this->keyName;
		if(!is_array($data)) {
			return RST(false, $errno=1210000, $err='Parameter can not be empty');
		}
		$rs = $this->db->save($data, $id, '',$keyName );
		return RST($rs);
	}
	
	/**
	 * 返回统计模型数量
	 * @return int
	 */
	function modelCounts() {
		$sql = 'SELECT COUNT(*) AS count FROM ' . $this->table;
		$count = $this->db->getOne($sql);
		return RST($count);
	}
	
	/**
	* 称获取模型列表
    * @param int $cc_uid
    * @return array()
	*/
	function modelList($offset = 0,$rows = 10,$query = '') {
		if(isset($query['order_by'])){
			$order_by = $query['order_by'];
		}else{
			$order_by = 'modelid';
		}
		if(isset($query['order_sc']) && $query['order_sc']){
			$order_sc = $query['order_sc'];
		}else{
			$order_sc = 'DESC';
		}
		$sql = 'SELECT * FROM '.$this->table.' ORDER BY `'.$order_by.'` '.$order_sc.' LIMIT '.$offset.','. $rows;
		//echo $sql;
		return RST($this->db->query($sql));
	}
	function getModelById($KeyID) {
		$sql = 'SELECT * FROM ' . $this->table .  '  where `'.$this->keyName.'`="'.$KeyID.'"'	;
		return RST($this->db->getRow($sql));
	}
	
	/*function delete($keyID,$keyName=''){
		if($keyName=='')  $keyName = $this->keyName;
		if (!is_numeric($keyID)) {
			return RST(false, $errno=1210002, $err='Parameter must be a number');
		}
		return RST($this->db->delete($keyID, '',$keyName ));
	}*/
	
	/* 删除模型 删除相关数据表及数据
	*	@chenyining 20150113
	*	return boolen
	*/
	function delete($modelid) {
		$data 	= self :: get_one($modelid);
		$rs1 	= $this->db->delete($modelid, "model", $id_name = 'modelid');
		$rs2 	= $this->db->delete($modelid, "model_field", $id_name = 'modelid');
		$rs3 	= $this->db->execute('DROP TABLE IF EXISTS `xsmart_'.$data["rst"]["tablename"].'`;');
		$rs4 	= $this->db->execute('DROP TABLE IF EXISTS `xsmart_'.$data["rst"]["tablename"].'_data`;');
		$rs 	= $rs1 ? true : false;
		return RST($rs1);
	}
	
	function get_one($id){
		$sql = 'SELECT * FROM ' . $this->table .  '  where `modelid`="'.$id.'"'	;
		return RST($this->db->getRow($sql));
	}
	
	// 删除表
	public function drop_table($tablename) {
		$tablename 	= $this->db->getPrefix().$tablename;
		$tablearr 	= $this->db->list_tables();
		if(in_array($tablename, $tablearr)) {
			return $this->db->execute("DROP TABLE $tablename");
		} else {
			return false;
		}
	}
	
	// 判断表名是否存在
	public function table_exists($tablename){
		return RST($this->db->table_exists($tablename));		
	}
	
	// 执行语句
	public function querysql($sql){
		return RST($this->db->execute($sql));
	}
}
