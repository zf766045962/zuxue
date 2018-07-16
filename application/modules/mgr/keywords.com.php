<?php
class keywords{
	
	//*****************关键字列表*****************
	function read(){
		 $db = APP :: ADP('db');
		 $db->setTable(T_KEYWORDS);
		 $table=$db->getTable(T_KEYWORDS);
			
		  $serch1=V('r:serch1');
	     $detail=V('r:detail');
		 $serch2=V('r:serch2');
		 
		 $field1="";
			 if($serch1=='0'){
				$field1=""; 
			 }else if($serch1=='keywords' && $detail!=""){
				 $field1="keywords like '%".$detail."%'"; 
			 }else if($serch1=='iid' && $detail!=""){
				 $field1="id='".$detail."'";
			 }
			 
			 $field2="";
			 switch($serch2){
				case '0':
					$field2="";
					break;
				case 'isshow0':
					$field2="isshow=0";
					break;
				case 'isshow1':
					$field2="isshow=1";
					break;
				case 'levels0':
					$field2="levels=0";
					break;
				case 'levels1':
					$field2="levels=1";
					break;
			}	 
		 
		 $sql="select * from ".$table." where 1";
		 $sqlcount="select count(*) from ".$table." where 1";
		 
		 if($field1!=""){
				$sql.=" and ".$field1;
				$sqlcount.=" and ".$field1;
			 }
			 if($field2!=""){
				$sql.=" and ".$field2;	
				$sqlcount.=" and ".$field2;	
			 }
		 
		
		 $sql.=" order by list=0,list";
		 $page = (int)V('r:page', 1);//当前页数
			$perpage=18;//每页显示数
			$offset = ($page-1) * $perpage;
			
			$sql.=" limit ".$offset.",".$perpage;
			
			$aa=$db->query($sql);
			$count = $db->getOne($sqlcount);
			
			$pager = APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $perpage, 'recordCount' => $count, 'linkNumber' => 10);
			$pager->setParam($page_param);
			
			$aa['page']=$pager->makePage();
        return $aa;	
	}
	
	//**************添加关键字到数据库操作***********
	function save(){
		 $db = APP :: ADP('db');
		 $db->setTable(T_KEYWORDS);
		 
		 $keys = array('keywords','list','serchnum','levels','url','isshow');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}
		if($data['list']=='') $data['list']=0;
		if($data['serchnum']=='') $data['serchnum']=0;
		if($data['levels']=='') $data['levels']=0;
		if($data['isshow']=='') $data['isshow']=0;
		
		$aa=$db->save($data);
		 
		 if($aa){
			 echo "<script>alert('保存成功！');location='".URL('mgr/keywords.keywordslist')."';</script>";
			 exit;
		  }else{
			 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/keywords.add')."';</script>";
			 exit;  
		}
		
	}
	
	//***************修改关键字读取数据库*******************
	function modify(){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_KEYWORDS);
		$id=V('r:id');
		$sql="select * from ".$table." where id=".$id;
		return $db->getRow($sql);
	}
	//*************修改关键字保存到数据库***************
	function modify_save(){
		$db = APP :: ADP('db');
		 $db->setTable(T_KEYWORDS);
		 $id=V('r:id');
		 
		 $keys = array('keywords','list','serchnum','levels','url','isshow');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}
		if($data['list']=='') $data['list']=0;
		if($data['serchnum']=='') $data['serchnum']=0;
		if($data['levels']=='') $data['levels']=0;
		if($data['isshow']=='') $data['isshow']=0;
		
		$aa=$db->save($data,$id,'','id');
		 
		 if($aa){
			 echo "<script>alert('保存成功！');location='".URL('mgr/keywords.keywordslist')."';</script>";
			 exit;
		  }else{
			 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/keywords.keywordslist')."';</script>";
			 exit;  
		}
	}
	
	//************************删除**************************
		function del($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_KEYWORDS);
			$sql="delete from ".$table." where id in (".$id.")";
			return $db->execute($sql);
			
		}
	
		//************************解除显示***************************
	function jiexian($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_KEYWORDS);
	   
	   $sql="update ".$table." set isshow=0 where id=".$id."";
	   return $db->execute($sql);
	}
		
	//**************************显示************************* 
	function xianshi($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_KEYWORDS);
	   
	   $sql="update ".$table." set isshow=1 where id=".$id."";
	   return $db->execute($sql);
	}
	//**************************解除推荐************************* 
	function xietui($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_KEYWORDS);
	   
	   $sql="update ".$table." set levels=0 where id=".$id."";
	   return $db->execute($sql);
	}
	//**************************设为推荐*************************
	function tuijian($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_KEYWORDS);
	   
	   $sql="update ".$table." set levels=1 where id=".$id."";
	   return $db->execute($sql);
	}
		
}
?>
