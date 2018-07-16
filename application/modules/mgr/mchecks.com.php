<?php
//
	// +----------------------------------------------------------------------
	// | xSmart 
	// +----------------------------------------------------------------------
	// | Copyright (c) 2011 All rights reserved.
	// +----------------------------------------------------------------------
	// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
	// +----------------------------------------------------------------------
	// | Author:  jiameng1015@126.com
	// +----------------------------------------------------------------------
	//
class mchecks {
	var $db,$table;
	function mchecks() {
		$this->db = APP::ADP('db');
		$this->db->setTable(T_USERS);
		$this->table = $this->db->getTable(T_USERS);
	}
	function getList($query, $rows=20, $offset=0) {
		$where = array();
		$where[] = '( ischeck=0 )';//查询未被审核的用户
		if (!empty($where)) {
			$where = ' WHERE '.implode(' AND ', $where);
		} else {
			$where = '';
		}
		$this->count_sql = 'SELECT COUNT(*) FROM ' . $this->table . $where;
		if(isset($query['order_by'])){
			$order_by=$query['order_by'];
		}else{
			$order_by='id';
		}
		if(isset($query['order_sc']) && $query['order_sc']){
			$order_sc=$query['order_sc'];
		}else{
			$order_sc='DESC';
		}
		$sql = 'SELECT * FROM ' . $this->table.$where . ' ORDER BY `'.$order_by.'` '.$order_sc.' LIMIT '.$offset .','. $rows;
		
		
		return RST($this->db->query($sql));
	}
	function getCount() {
		$rst = $this->db->getOne($this->count_sql);
		return RST($rst);
	}
	function del($id) {
		if (empty($id)) return false;
		$id = (array)$id;
		return $this->db->delete($id,'');
	}
	
	function passed($params,$id){
		$data['ischeck']=1;//将是否审核字段设为1,表示已通过审核
		$data['checkinfos']=$params['checkinfos'];
		$rst = $this->db->save($data, $id);
		return RST($rst);
	}
	function refused($params,$id){
		$data['ischeck']   =2;//将是否审核字段设为2,表示拒绝用户注册
		$data['checkinfos']=$params['checkinfos'];
		$rst = $this->db->save($data, $id);
		return RST($rst);
	}
	function content($id){
		$sql="select * from ".$this->table." where bid='$id'";
		
		return RST($this->db->query($sql));
		}
	
}
