<?php
/**************************************************
*  Created:  2011-10-10 09:12
*  Update:   2011-11-27  14:06
*
*  后台系统菜单管理    模型
*
*  @Xsmart (C)2006-2099Inc.
*  @Author jiameng<jiameng1015@126.com>
*
***************************************************/
class sysNav {
	var $db,$table;
	function sysNav() {
		$this->db = APP::ADP('db');//** T_ARTICLE_CLASS
		$this->db->setTable(T_SYSTEM_NAV);//**T_SYSTEM_NAV
		$this->table = $this->db->getTable(T_SYSTEM_NAV);
	}
//**********************添加分类下拉列表框读取*****************************
	function getClass($currentid=0,$cid=''){
		$db 	= APP :: ADP('db');
		$table  = $db->getTable(T_SYSTEM_NAV);
		$s 		= "&nbsp;|&nbsp;";
		$t 		= "&nbsp;|-";
		$option = "<option value=0>请选择……</option>";
		if($cid){
			$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where  (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
		}else{
			$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table."  order by abspath asc";
		}
		$query = mysql_query ($sql);
		while ( $row = mysql_fetch_array($query) ) {
			if(count(explode(',',$row ['abspath']))>3){
				$space = str_repeat ($s, count ( explode(',',$row ['abspath'])) - 3 );
			}else{
				$space = "";
			}
			if($row['parentid'] == 0)
				$row['classname'] = "&nbsp;". $row ['classname'];
			else
				$row['classname'] =  $space .$t."&nbsp;". $row ['classname'];
		
			if($row ['classid'] == $currentid)
				$option .= '<option value="' . $row ['classid'] . '" selected>' . $space . $row ['classname'] . '</option>';
			else 
				$option .= '<option value="' . $row ['classid'] . '">' . $space . $row ['classname'] . '</option>';
		}
		return $option;
	}
	
		//取得当前class
		function getClassByClassId($classid=0){
		 	$sql = "select * from ".$this->table." where classid=" .$classid ;
			$rs=$this->db->getRow($sql);
			return RST($rs);
		}
		//修改当前class
		
		function changeClassByClassId($classid=0,$updateData){
		 	$sql = "update ".$this->table." set ".$updateData."  where classid=" .$classid ;
			//var_dump($sql);
			$rs=$this->db->execute($sql);
			return RST($rs);
			//return ture;
		}
		
		
		//修改当前分类及子分类的 路径
		
		function changeParentpath($classid=0,$parentpath){
			$update_sql = "update ".$this->table." set parentpath='".$parentpath."'  where classid =  ".$classid ;
			$update=$this->db->execute($update_sql);
			$sql='select classid,classname,child,parentpath from '.$this->table . '  where parentid =  '.$classid ;
			$rs=$this->db->query($sql);
			if(isset($rs) && !empty($rs)){
				foreach($rs as $child){
					 $this->changeParentpath($child['classid'],$parentpath.','.$classid);
				}
			}
			return true; 
		}
//*********************添加分类保存到数据库操作***********************
	function saveEditform($params,$classid){
		
		
		
		$keys = array(
				'parentid',
				'classname',
				'classurl',
				'readme',
				'keyword',
				'description',
				'lmorder',
				'uunique',		
				'systype',		
				'statue'		
			);
		$data = array();
		foreach ($keys as $v) {
			if (isset($params[$v])) {
				$data[$v] = $this->db->escape($params[$v]);
			}
		}
		$rst = $this->db->save($data, $classid ,'system_nav','classid');
		return RST($rst);
		
		
		
		
		}











	function saveForm($data,$lmid=''){
		
		$parentid=$data['parentid'];
		$classname=$data['classname'];
		$readme=$data['readme'];
		$lmorder=intval($data['lmorder']);//栏目排序
		
		$keyword=$data['keyword'];//关键字
		$description=$data['description'];//描述
		$uunique=$data['uunique'];
		$classurl=$data['classurl'];
		$systype=$data['systype'];
		
		

		if(!isset($lmorder) || $lmorder=="")
			$lmorder=0;
		if(!isset($elite) || $elite=="")
			$elite=0;
		if(!isset($ontop) || $ontop=="")
			$ontop=0;
		$Author=0;

		$founderr=false;

		$maxclassid =$this->db->getOne("select Max(classid) From ".$this->table."");

		if(empty($maxclassid))
		{
			$maxclassid=0;
		}
		$classid=$maxclassid+1;

		$maxrootid = $this->db->getOne("select max(rootid) From ".$this->table."");

		if(empty($maxrootid))
		{
			$maxrootid=0;
		}
		$rootid=$maxrootid+1;

		if($parentid>0)
		{
			$sql="select * From ".$this->table." where classid=" . $parentid . "";

			$sqlcount="select count(*) From ".$this->table." where classid=" . $parentid . "";
			$count=$this->db->getOne($sqlcount);

			if($count == 0)
			{
				$founderr=true;
				echo "<script language=javascript>alert('所属栏目已经被删除！');history.back(-1);</script>";
				//$errmsg=$errmsg . "<br><li>所属栏目已经被删除！</li>";
				exit;
			}

			if($founderr)
			{
				exit;
			}
			else
			{   $rs=$this->db->getRow($sql);

				$rootid=intval($rs["rootid"]);
				$ParentName=$rs["classname"];
				$parentdepth=intval($rs["depth"]);
				$parentpath=$rs["parentpath"];
				$child=intval($rs["child"]);
				$parentpath=$parentpath . "," . intval($parentid) ;    //得到此栏目的父级栏目路径
				$prevorderid=intval($rs["orderid"]);
				if($child>0)
				{
					//得到与本栏目同级的最后一个栏目的orderid
					$prevorderid = $this->db->getOne("select Max(orderid) From ".$this->table." where parentid=" . $parentid);

					$previd = $this->db->getOne("select classid From ".$this->table." where parentid=" . $parentid . " and orderid=" . $prevorderid);

					//得到同一父栏目但比本栏目级数大的子栏目的最大orderid，如果比前一个值大，则改用这个值。
					$sql="select Max(orderid) From ".$this->table." where parentpath like '" . $parentpath . ",%'";
					$sqlcount="select count(*),Max(orderid) From ".$this->table." where parentpath like '" . $parentpath . ",%'";

					$rsprevorderid=$this->db->getRow($sql);

					$count = $this->db->getOne($sqlcount);;
					if($count!=0)
					{
						if(!empty($rsprevorderid[0]))
						{
							if(intval($rsprevorderid[0])>intval($prevorderid))
							{
								$prevorderid=intval($rsprevorderid[0]);
							}
						}
					}
				}
				else
				{
					$previd=0;
				}

			}
		}
		else
		{

			if($maxrootid>0)
			{
				$previd= $this->db->getOne("select classid From ".$this->table." where rootid=" .$maxrootid . " and depth=0");
			}
			else
			{
				$previd=0;
			}
			$prevorderid=0;
			$parentpath="0";
		}


		$sqlcount="Select count(*) From ".$this->table." Where parentid=" . intval($parentid) . " AND classname='" . $classname . "'";
		$count = $this->db->getOne($sqlcount);
		if($count!=0)
		{
			$founderr=true;
			if($parentid==0)
			{
				echo "<script language=javascript>alert('已经存在一级栏目：".$classname."');history.back(-1);</script>";
				exit;
				//$errmsg=$errmsg . "<br><li>已经存在一级栏目：" . $classname . "</li>";
			}
			else
			{
				echo "<script language=javascript>alert('".$ParentName."中已经存在子栏目：".$classname."');history.back(-1);</script>";
				exit;
				//$errmsg=$errmsg . "<br><li>"" . $ParentName . ""中已经存在子栏目"" . $classname . ""！</li>";
			}
		}
		if($uunique){
		$ss="Select count(*) From ".$this->table." Where parentid=" . intval($parentid) . " AND uunique='" . $uunique . "'";
		$count = $this->db->getOne($sqlcount);
		if($count!=0){
				echo "<script language=javascript>alert('已存在英文名称：".$uunique."');history.back(-1);</script>";
				exit;
			}
		}

		$sql="insert into ".$this->table."(classid,classname,classurl,parentid,parentpath,depth,rootid,child,previd,nextid,orderid,readme,elite,ontop,Author,keyword,description,lmorder,uunique,pictureurl,statue,systype) values('".$classid."','".$classname."','".$classurl."',".intval($parentid).",'".$parentpath."',";
		if(intval($parentid)>0)
		{
			$sql .= $parentdepth+1;
		}
		else
		{
			$sql .=0;
		}
		if(!isset($pictureurl))
		{
			$pictureurl = "";
		}
		$sql.=",".intval($rootid).",0,".intval($previd).",0,".intval($prevorderid).",'".$readme."','".$elite."','".$ontop."','".$Author."','".$keyword."','".$description."','".$lmorder."','".$uunique."','".$pictureurl."',0,".$systype.")";
		//echo $sql;exit;
		$re=$this->db->execute($sql);


		//更新与本栏目同一父栏目的上一个栏目的"nextid"字段值
		if($previd>0)
		{
			$this->db->execute("Update ".$this->table." set nextid=" . $classid . " where classid=" . $previd);
		}

		if($parentid>0)
		{
			//更新其父类的子栏目数
			$this->db->execute("Update ".$this->table." set child=child+1 where classid=".$parentid);

			//更新该栏目排序以及大于本需要和同在本分类下的栏目排序序号
			$this->db->execute("Update ".$this->table." set orderid=orderid+1 where rootid=" . intval($rootid) . " and orderid>" . intval($prevorderid));
			$this->db->execute("Update ".$this->table." set orderid=" . (intval($prevorderid)+1) . " where classid=" . $classid);
		}

		if($re){
		echo "<script language=javascript>alert('添加成功！');location.href='".W_BASE_URL."admin.php?m=mgr/sysNav.addSysnav';</script>";
		exit;
		}else{
			echo "<script language=javascript>alert('操作失败，请重试！');history.back(-1);</script>";
			exit;
		}

	}	
	
	
	
	
	function getRouteByRootid(){
		$sql='select classid,classurl,uunique from '.$this->table .' order by rootid';
		$rs= $this->db->query($sql);
		return RST($rs);
	
	
	}
	
	
	
		
	function getAll($cid='1'){
		$s="&nbsp;|&nbsp;";
	     $t="&nbsp;|-";
		 if($cid=='')
		 	$option="<option value='0'>(无)作为一级栏目</option>";
		
		 if($cid)
		 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$$this->table." where statue=0 and (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
		 else  $sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$this->table." where statue=0 order by abspath asc";
//echo $sql;exit;
		 $query = mysql_query ($sql);
		 while ( $row = mysql_fetch_array($query) ) {
				 if(count(explode(',',$row ['abspath']))>3){
				 $space = str_repeat ($s, count ( explode(',',$row ['abspath'])) - 3 );
				}else $space="";
				
				if($row['parentid']==0)
					$row['classname']="&nbsp;". $row ['classname'];
				else
					$row['classname']=  $space .$t."&nbsp;". $row ['classname'];
			 
			
			 if($row ['classid']==$currentid)
			 	 $option .= '<option value="' . $row ['classid'] . '" selected>' . $space . $row ['classname'] . '</option>';
			else 
			    $option .= '<option value="' . $row ['classid'] . '">' . $space . $row ['classname'] . '</option>';
		 }
		 echo $option;
		 
		 return $option;
		
		
		}
	
	///***********获得系统菜单************
	function getSysarr($parentid){
		
		$sql = "SELECT classname,classid,classurl FROM ".$this->table." WHERE `parentid` = '".$parentid."' and statue<>'3' order by lmorder=0,lmorder";
		
		return RST($this->db->query($sql));
}
	
	
//***********************系统分类列表(按排序顺序排)*************************
function get_sort($cid='-1',$parentid=0,$n=0) 
{ 
	$a="<img src=".W_BASE_URL."img/tree_line3.gif width='17' height='16' valign='abvmiddle'>";
	
	static $sort_list = array (); 
	if($cid=='-1')
		$sql = "SELECT * FROM ".$this->table." WHERE `parentid` = '".$parentid."' order by lmorder=0,lmorder";	
	else 
		$sql = "SELECT * FROM ".$this->table." WHERE `classid` = '".$cid."' order by lmorder=0,lmorder"; 

	$res = mysql_query($sql);
	if ($res) 
	{ 	$n++;
		while ($row = mysql_fetch_array($res)) 
		{ 
			$sql = "SELECT * FROM ".$this->table." WHERE `parentid` = '".$row['classid']."' order by lmorder=0,lmorder"; 	
			if($this->db->execute($sql)){
				if($row['parentid']!=0){
					$w=str_repeat ($a,$n-1);
					$e="<img src=".W_BASE_URL."img/tree_line1.gif width='17' height='16' valign='abvmiddle'>";
					$row['classname'] = $w.$e."&nbsp;".$row['classname']; 
				}
				$sort_list[] = $row; 
				$this->get_sort('-1',$row['classid'],$n); 
			}else{
				$row['classname'] = str_repeat ($a,$n)."&nbsp;".$row['classname']; 
				$sort_list[] = $row; 
			}
		}
		
	} 
	return $sort_list; 
}


//***********************系统分类列表(按排序顺序排)*************************
function get_route($parentid=0) 
{ 
	$route=array();
	$where =' where statue!=2 parentid =  '.$parentid;
	$sql='select classid,classname,child,uunique,classurl from '.$this->table . $where.' order by orderid desc';
	$rs=$this->db->query($sql);
	$n=0;
	foreach($rs as $parent){
		$n++;
		$route[$parent['classid']]=array(
			'uunique'=>$parent['uunique'],
			'classname'=>$parent['classname'],
			'classurl'=>$parent['classurl'],
		);
			if($parent['child']>0){
				$route[$parent['classid']]['child']= $this->get_route($parent['classid']);
			}
	}
	return $route; 
}
//***********************系统分类列表(按排序顺序排)*************************
function get_route_all($parentid=0) 
{ 
	$route=array();
	$where =' where statue<>2 and parentid =  '.$parentid;
	$sql='select classid,classname,child,uunique,classurl,keyword from '.$this->table . $where.' order by orderid desc';
	$rs=$this->db->query($sql);
	$n=0;
	$data=array();
	foreach($rs as $parent){
		$data[$parent['uunique']]['classname']=$parent['classname'];
		if($parent['child']>0){
			$c2=$this->get_route_all_1($parent['classid']);
			foreach($c2 as $c3){
				if($c3['child']>0){
					$c3_all=$this->get_route_all_1($c3['classid']);
						$data[$parent['uunique']][$c3['classid']]['classname']=$c3['classname'];
						foreach($c3_all as $c4){
							$str_p=explode('$$',$c4['classurl']);
							$p=isset($p[1])?$p[1]:1;
						 	$data[$parent['uunique']][$c3['classid']][$c4['classid']]=array(
								'classid'=>$c4['classid'],
								'classname'=>$c4['classname'],
								//'keyword'=>$c4['keyword'],
								'classurl'=>$str_p[0],
								'p'=>$p
							);
						}
				}
			}		
		}
	}
	return $data; 
}
function get_route_all_1($parentid=0) 
{ 
	$where =' where parentid =  '.$parentid;
	$sql='select classid,classname,child,uunique,classurl,keyword from '.$this->table . $where.' order by orderid desc';
	$rs=$this->db->query($sql);
	return $rs; 
}
	


	function _sub_above_class($table, $classid) {
		$cid = '';
		$query = mysql_query ( "select classid from " . $table . " where parentid='" . $classid . "'" ) or die ( "select parentid from " . $table . " where classid='" . $classid . "' order by classid desc" . "错误" . mysql_error () );

		while ( $row = mysql_fetch_array ( $query ) ) {
			$cid .= "," . $row ["classid"];
			$cid .= $this->_sub_above_class ( $table, $row ["classid"] );
		}
		return $cid;
	}

	function above_classid($table, $classid) {
		return $classid . $this->_sub_above_class ( $table, $classid );
	}

	//**********************将系统分类设为删除状态*************************
	function delclass($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_SYSTEM_NAV);
			$sql="delete from ".$table."  where classid in (".$id.")";
			$q=$db->execute($sql);
			return RST($q);
			
		}
	//***********获得一级菜单*************
	function getFirst($systype=0){
		$sql = 'SELECT classname,uunique,classid FROM '.$this->table.' where parentid=0 and statue<>"3" and systype="'.$systype.'" ORDER BY lmorder asc';
		//var_dump($this->db->query($sql));
		return RST($this->db->query($sql));
	}
//************根据classid获取对应信息************************
	function modifysysClass($classid){
		$sql="select * from ".$this->table." where classid='$classid' limit 1";
		return RST($this->db->query($sql));
	}
	
	//********************信息分类中的系统分类*******************************
	function getSysClass(){
		$db = APP :: ADP('db');
		$sql="select classname,classurl from ".$db->getTable(T_SYSTEM_CLASS)." where elite=1 and parentid=0";
		$row=$db->query($sql);

		if($row){
			$SysClass=array('title' => '系统分类');
			foreach($row as $key=>$val) {
				$SysClass['sub'][$key]=array(
					'title'=>$val['classname'],							   
					'url'=>array($val['classurl'])
				);
			}
		return $SysClass;		
		}
		else return false;
		
	
	}
	//********************信息分类中的常用分类*******************************
   function getCommonClass(){
		$db = APP :: ADP('db');
		$sql="select classname,classurl from ".$db->getTable(T_SYSTEM_CLASS)." where elite=0 and parentid=0";
		$row=$db->query($sql);

		if($row){
			$CommonClass=array('title' => '常用分类');
		}
		
		foreach($row as $key=>$val) {
			$CommonClass['sub'][$key]=array('title'=>$val['classname'],							   
								   'url'=>array($val['classurl']));
		}
	
		return $CommonClass;		
	}

	
}
