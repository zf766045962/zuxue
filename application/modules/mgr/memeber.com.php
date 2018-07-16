<?php
//
	// +----------------------------------------------------------------------
	// | xSmart 
	// +----------------------------------------------------------------------
	// | Copyright (c) 2011 All rights reserved.
	// +----------------------------------------------------------------------
	// | Licensed ( http://www.vi163.com )
	// +----------------------------------------------------------------------
	// | Author:  jiameng1015@126.com
	// +----------------------------------------------------------------------
	//
class memeber {
	var $db,$table;
	function memeber() {
		$this->db = APP::ADP('db');
		$this->db->setTable(T_USERS);
		$this->table = $this->db->getTable(T_USERS);
	}
	function getList($query, $rows=20, $offset=0) {
		$where = array();
		if(isset($query['username']) && $query['username']){
			$username = $this->db->escape($query['username']);
			$where[] = '(username LIKE "%'.$username.'%")';
		}
		if(isset($query['email']) && $query['email']){
			$email = $this->db->escape($query['email']);
			$where[] = '(email ="'.$email.'")';
		}
		if(isset($query['start_time']) && $query['start_time']){
			$start_time = strtotime($this->db->escape($query['start_time']));
			$where[] = '(registerTime >="'.$start_time.'")';
		}
		if(isset($query['end_time']) && $query['end_time']){
			$end_time = strtotime($this->db->escape($query['end_time']));
			$where[] = '(registerTime <=' .$end_time .')';
		}
		if(isset($query['status']) && $query['status']){
			$status = $this->db->escape($query['status']);
			$where[] = '(islock=' .$status .')';
		}
		$where[] = '( ischeck=1 )';//查询已被审核通过的用户
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
	function locked($id){
		$data['islock']=1;//将是否锁事实上字段设为1,表示已锁定
		$rst = $this->db->save($data, $id);
		return RST($rst);
	}
	function unlocked($id){
		$data['islock']=0;//将是否锁事实上字段设为0,表示解除锁定
		$rst = $this->db->save($data, $id);
		return RST($rst);
	}
	function edit_memeber($id){
		$rst=$this->db->get($id,'');
		return RST($rst);
		}
	function saveEdit($params,$id){
		$keys = array(
				'password',
				'nickname',
				'email',
				'avatar',
				'islock'		
			);
		$data = array();
		foreach ($keys as $v) {
			if (isset($params[$v])) {
				$data[$v] = $this->db->escape($params[$v]);
			}
		}
		
		$rst = $this->db->save($data,$id);
		return RST($rst);
		
		}
	
}
