<?php
class keywordsFilter{
	var $db,$table;
	function keywordsFilter(){
		 $this->db = APP :: ADP('db');
		 $this->db->setTable(T_KEYWORDS_FILTER);
		 $this->table=$this->db->getTable(T_KEYWORDS_FILTER);
	}
	
	//******************关键字过滤列表****************
	function getlist(){
		$sql="select * from ".$this->table." where 1";
		$sqlcount="select count(*) from ".$this->table." where 1";
		 
		 $serch1=V('r:serch1');
	     $detail=V('r:detail');
		 
		  $field1="";
			 if($serch1=='0'){
				$field1=""; 
			 }else if($serch1=='original' && $detail!=""){
				 $field1="original like '%".$detail."%'"; 
			 }else if($serch1=='iid' && $detail!=""){
				 $field1="id='".$detail."'";
			 }
		 if($field1!=""){
				$sql.=" and ".$field1;
				$sqlcount.=" and ".$field1;
		 }
		 
		 $page = (int)V('r:page', 1);//当前页数
			$perpage=20;//每页显示数
			$offset = ($page-1) * $perpage;
			
			$sql.=" limit ".$offset.",".$perpage;
			
			$aa=$this->db->query($sql);
			$count = $this->db->getOne($sqlcount);
			
			$pager = APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $perpage, 'recordCount' => $count, 'linkNumber' => 10);
			$pager->setParam($page_param);
			
			$aa['page']=$pager->makePage();
        return $aa;	
	}
	
	//*****************添加保存到数据库****************
	function save(){
		$data['original']=V('r:original');
		$data['replace']=V('r:replace');
		$aa=$this->db->save($data);
		 
		 if($aa){
			 echo "<script>alert('保存成功！');location='".URL('mgr/keywordsFilter.filterlist')."';</script>";
			 exit;
		  }else{
			 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/keywordsFilter.add')."';</script>";
			 exit;  
		}
	}
	//**********************删除***********************
	function del($id){
		$sql="delete from ".$this->table." where id in (".$id.")";
		return $this->db->execute($sql);
	}
	//**************修改关键字过滤读取数据库****************
	function modify(){
		$id=V('r:id');
		$sql="select * from ".$this->table." where id=".$id;
		return $this->db->getRow($sql);
	}
	//*******************修改保存到数据库************************
	function modify_save(){
		$id=V('r:id');
		$data['original']=V('r:original');
		$data['replace']=V('r:replace');
		$aa=$this->db->save($data,$id,'','id');
		if($aa){
			 echo "<script>alert('保存成功！');location='".URL('mgr/keywordsFilter.filterlist')."';</script>";
			 exit;
		  }else{
			 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/keywordsFilter.filterlist')."';</script>";
			 exit;  
		}
	}
}
?>
