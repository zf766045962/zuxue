<?php
class infoclass{
	var $db,$table,$tableclass;
function infoclass(){
		$this->db = APP::ADP('db');
		$this->db->setTable(T_INFOCLASS);
		$this->table = $this->db->getTable(T_INFOCLASS);
		$this->tablecontent = $this->db->getTable(T_INFOCLASS_CONTENT);

	}

		//***********************文章分类列表(按排序顺序排)*************************
function get_sort($cid='-1',$parentid=0,$n=0) 
{ 
	$a="<img src='".W_BASE_URL."img/tree_line3.gif' width='17' height='16' valign='abvmiddle'>";
	
	static $sort_list = array (); 
	if($cid=='-1')
		$sql = "SELECT * FROM ".$this->table." WHERE `parentid` = '".$parentid."'  order by rootid desc,depth asc ,sys_statue desc, lmorder=0,lmorder";	
	else 
		$sql = "SELECT * FROM ".$this->table." WHERE `classid` = '".$cid."'  order by rootid desc,depth asc , sys_statue desc, lmorder=0,lmorder"; 

	$res = mysql_query($sql);
	if ($res) 
	{ 	$n++;
		while ($row = mysql_fetch_array($res)) 
		{ 
			$sql = "SELECT * FROM ".$this->table." WHERE `parentid` = '".$row['classid']."' order by sys_statue desc, lmorder=0,lmorder"; 	
			if($this->db->execute($sql)){
				if($row['parentid']!=0){
					$w=str_repeat ($a,$n-1);
					$e="<img src='".W_BASE_URL."img/tree_line1.gif' width='17' height='16' valign='abvmiddle'>";
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
	//***************信息分类列表(无排序顺序，暂不用)****************
	function selectclass(){
		$db = APP :: ADP('db');
		for($i=0;$i<10;$i++)
		{
			$arrshowline[$i]=0;
		}
		$sqlClass="select * from ".$this->table." order by sys_statue desc, rootid,orderid";
		$result = $db->query($sqlClass);

		foreach ($result AS $rs_all)
		{

			$row="";

		 	$idepth=intval($rs_all["depth"]);
			if(intval($rs_all["nextid"])>0)
				{$arrshowline[$idepth]=1;}
			else
				{$arrshowline[$idepth]=0;}

			if($idepth>0)
			{
				for($i=1;$i<=$idepth;$i++)
				{
					if(intval($i)==intval($idepth))
					{
						if(intval($rs_all["nextid"])>0)
							{$row.= "<img src='".W_BASE_URL."img/tree_line1.gif' width='17' height='16' valign='abvmiddle'>";}
						else
							{$row.=  "<img src='".W_BASE_URL."img/tree_line2.gif' width='17' height='16' valign='abvmiddle'>";}
					}
					else
					{
						if(intval($arrshowline[$i])==1)
							{$row.=  "<img src='".W_BASE_URL."img/tree_line3.gif' width='17' height='16' valign='abvmiddle'>";}
						else
							{$row.=  "<img src='".W_BASE_URL."img/tree_line4.gif' width='17' height='16' valign='abvmiddle'>";}
					}
				}
			 }

			  if(intval($rs_all["child"])>0)
			  	{$row.=  "<img src='".W_BASE_URL."img/tree_folder4.gif' width='15' height='15' valign='abvmiddle'>";}
			  else
			  	{$row.=  "<img src='".W_BASE_URL."img/tree_folder3.gif' width='15' height='15' valign='abvmiddle'>";}

			  if(intval($rs_all["depth"])==0){$row.=  "<b>";}

			  //$row.= "<a href='m_news_class.php?action=modify&classid=" . $rs_all["classid"] . "' title='" . $rs_all["readme"] . "'>" . $rs_all["classname"] . "</a>";
			  $row.= $rs_all["classname"];
			  if(intval($rs_all["child"])>0){$row.=  "（" . $rs_all["child"] . "）";}

              $rs_all['classname']=$row;

			  $row1[] = $rs_all;



		}

         if($row1)
		   return $row1;

	}

	//*******************删除分类*******************
	function delclass($id){
		$db = APP :: ADP('db');
		$classid=$id;

		$ss="select sys_statue from ".$this->table." where classid='".$classid."'";
		$sys_statue=$db->getOne($ss);
		if($sys_statue==1){
			echo "<script language=javascript>alert('该分类属于系统栏目，不能删除系统栏目！');location='".URL('mgr/infoclass.info')."';</script>";
			exit;
		}


		if(empty($classid))
		{
			echo "参数不足";
			exit;
		}
		else
		{
			$classid=intval($classid);
		}
		$sql="select classid,rootid,depth,parentid,child,previd,nextid From ".$this->table." where classid=".$classid;
		$rs=$db->getRow($sql);

		if(!$rs)
		{
			echo "栏目不存在，或者已经被删除";
			exit;
		}
		else
		{
			if($rs["child"]>0)
			{
				echo "该栏目含有子栏目，请删除其子栏目后再进行删除本栏目的操作!";
				exit;
			}
		}

		$previd=$rs["previd"];
		$nextid=$rs["nextid"];
		if($rs["depth"]>0)
		{
			$db->execute("Update ".$this->table." set child=child-1 where classid=" . $rs["parentid"]);
		}
		$ru=$db->execute("delete From ".$this->table." where classid = " . $classid);

		//删除本栏目的所有内容
	    $db->execute("delete from ".$this->tablecontent." where classid=" . $classid);

		//修改上一栏目的nextid和下一栏目的previd
		if($previd>0)
		{
			$db->execute("Update ".$this->table." set nextid=" . $nextid . " where classid=" . $previd);
		}
		if($nextid>0)
		{
			$db->execute("Update ".$this->table." set previd=" . $previd . " where classid=" . $nextid);
		}

		if($ru) echo "<script language=javascript>alert('删除成功！'); history.back();</script>";
		//echo URL('mgr/infoclass.info');
		else   echo  "<script language=javascript>alert('操作失败，请重试！');history.back();</script>";


	}

	//********************修改分类查询**********************
	function modifyselect($id){
		$db = APP :: ADP('db');
		$sqlClass="select * from ".$this->table." where classid=".$id;
		$row = $db->getRow($sqlClass);

		$aa="";
		if(intval($row["parentid"])<=0){
			$aa.= "无（作为一级栏目）";	
		}
		else
		{
			$sqlParentClass="Select * From ".$this->table." where classid in (" . $row["parentpath"] . ") order by depth";
			$rr=$db->query($sqlParentClass);

			foreach($rr as $key=>$rsParentClass)
			{
				for($i=1;$i<=intval($rsParentClass["depth"]);$i++)
				{
					$aa.= "&nbsp;&nbsp;&nbsp;";
				}
				if(intval($rsParentClass["depth"])>0){
					$aa.=  "└";
				};
				$aa.=  "&nbsp;" . $rsParentClass["classname"] . "<br>";
			}

		}

		$row['p']=$aa;
		return $row;
	}
	//*****************添加分类下拉列表框读取**********************
	function read($currentid=0,$table='',$ShowType=0){
		$db = APP :: ADP('db');
		$db->setTable(T_INFOCLASS);
		if($table=='')
			$table=$db->getTable(T_INFOCLASS);
		if($ShowType==0)
		{
		   $strtemp = "<option value='0'";
			if($currentid==0)
			{
			 	$strtemp .= " selected";
			}
			$strtemp .= ">无（作为一级栏目）</option>";
		}

		for ($i=0;$i<20;$i++)
		{
			$arrShowLine[$i]=false;
		}
		$sqlClass="Select * From ".$table." order by rootid,orderid";
		$sqlcount="Select count(*) From ".$table." order by rootid,orderid";

		$result=$db->query($sqlClass);
		$count=$db->getone($sqlcount);
		if($count==0)
		{
			$strtemp .= "<option value=''>请先添加栏目</option>";
		}
		else
		{
			foreach($result as $key=>$row)
			{
				$tmpdepth=intval($row['depth']);
				if(intval($row['nextid'])>0)
				{
					$arrShowLine[$tmpdepth]=true;
				}
				else
				{
					$arrShowLine[$tmpdepth]=false;
				}
				/*if($ShowType==0)
				{
					if(intval($row['child'])>0)
					{
						$strtemp .= "<option value='0'";
					}
					else
					{
						$strtemp .= "<option value='" . intval($row['classid']) . "'";
					}
				}*/
				//else
				//{
					$strtemp .= "<option value='" . intval($row['classid']) . "'";
				//}
				if($currentid>0 && (intval($row['classid'])==$currentid))
				{
					$strtemp .= " selected";
				}
				$strtemp .= ">";

				if($tmpdepth>0)
				{
					for($i=1;$i<=$tmpdepth;$i++)
					{
						$strtemp .= "&nbsp;&nbsp;";
						if($i==$tmpdepth)
						{
							if(intval($row['nextid'])>0)
							{
								$strtemp .= "├&nbsp;";
							}
							else
							{
								$strtemp .= "└&nbsp;";
							}
						}
						else
						{
							if($arrShowLine[$i]==true)
							{
								$strtemp .= "│";
							}
							else
							{
								$strtemp .= "&nbsp;";
							}
						}
					}
				}
				$strtemp .= $row['classname'];
				$strtemp .= "</option>";

			}
		}

		return $strtemp;

	}


	//********************保存添加分类到数据库*******************
	function save_class($data){
		$db = APP :: ADP('db');


		$parentid=$data['parentid'];
		$classname=$data['classname'];
		$readme=$data['readme'];
		$lmorder=$data['lmorder'];
		$sys_statue=$data['sys_statue'];
		$uunique=$data['uunique'];

		if($parentid!=0)
			$uunique="";

		if($lmorder=="")
			$lmorder=0;
		if($sys_statue=="")
			$sys_statue=0;


		$ontop=0;
		$classurl="";
		$founderr=false;

		$maxclassid =$db->getOne("select Max(classid) From ".$this->table."");

		if(empty($maxclassid))
		{
			$maxclassid=0;
		}
		$classid=$maxclassid+1;

		$maxrootid = $db->getOne("select max(rootid) From ".$this->table."");

		if(empty($maxrootid))
		{
			$maxrootid=0;
		}
		$rootid=$maxrootid+1;

		if($parentid>0)
		{
			$sql="select * From ".$this->table." where classid=" . $parentid . "";

			$sqlcount="select count(*) From ".$this->table." where classid=" . $parentid . "";
			$count=$db->getOne($sqlcount);

			if($count == 0)
			{
				$founderr=true;
				echo "<script language=javascript>alert('所属栏目已经被删除！');history.back();</script>";
				//$errmsg=$errmsg . "<br><li>所属栏目已经被删除！</li>";
				exit;
			}

			if($founderr)
			{
				exit;
			}
			else
			{   $rs=$db->getRow($sql);

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
					$prevorderid = $db->getOne("select Max(orderid) From ".$this->table." where parentid=" . $parentid);

					$previd = $db->getOne("select classid From ".$this->table." where parentid=" . $parentid . " and orderid=" . $prevorderid);

					//得到同一父栏目但比本栏目级数大的子栏目的最大orderid，如果比前一个值大，则改用这个值。
					$sql="select Max(orderid) From ".$this->table." where parentpath like '" . $parentpath . ",%'";
					$sqlcount="select count(*),Max(orderid) From ".$this->table." where parentpath like '" . $parentpath . ",%'";

					$rsprevorderid=$db->getRow($sql);

					$count = $db->getOne($sqlcount);;
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
				$previd= $db->getOne("select classid From ".$this->table." where rootid=" .$maxrootid . " and depth=0");
			}
			else
			{
				$previd=0;
			}
			$prevorderid=0;
			$parentpath="0";
		}


		$sqlcount="Select count(*) From ".$this->table." Where parentid=" . intval($parentid) . " AND classname='" . $classname . "'";
		$count = $db->getOne($sqlcount);
		if($count!=0)
		{
			$founderr=true;
			if($parentid==0)
			{
				echo "<script language=javascript>alert('已经存在一级栏目：".$classname."');history.back();</script>";
				exit;
				//$errmsg=$errmsg . "<br><li>已经存在一级栏目：" . $classname . "</li>";
			}
			else
			{
				echo "<script language=javascript>alert('".$ParentName."中已经存在子栏目：".$classname."');history.back();</script>";
				exit;
				//$errmsg=$errmsg . "<br><li>“" . $ParentName . "”中已经存在子栏目“" . $classname . "”！</li>";
			}
		}
		if($uunique!="" && $parentid==0){
		$sqlcount="Select count(*) From ".$this->table." Where parentid=0 AND uunique='" . $uunique . "'";
		$count = $db->getOne($sqlcount);
		if($count!=0)
		{
			$founderr=true;
			echo "<script language=javascript>alert('".$uunique.":英文唯一名称已存在！');history.back();</script>";

		}
		}

		$sql="insert into ".$this->table."(classid,classname,classurl,parentid,parentpath,depth,rootid,child,previd,nextid,orderid,readme,sys_statue,ontop,lmorder,uunique,click) values('".$classid."','".$classname."','".$classurl."',".intval($parentid).",'".$parentpath."',";
		if(intval($parentid)>0)
		{
			$sql .= $parentdepth+1;
		}
		else
		{
			$sql .=0;
		}
		$sql.=",".intval($rootid).",0,".intval($previd).",0,".intval($prevorderid).",'".$readme."',".$sys_statue.",".$ontop.",'".$lmorder."','".$uunique."',0)";
		//echo $sql;exit;
		$aa=$db->execute($sql);

		//更新sys_statue字段
		if($parentpath==='0'){

		}else{
			$ii=explode(',',$parentpath);
			$iid=$ii[1];
			$sql="select sys_statue from ".$this->table." where classid=".$iid;
			$ee=$db->getOne($sql);
			$sql="update ".$this->table." set sys_statue='".$ee."' where classid='".$classid."'";
			$db->execute($sql);
		}


		//更新url字段
		if($parentid==0){
			$i=$classid;
			$url="mgr/infoclass.classfylist&id=".$i;
			$ss="update ".$this->table." set classurl='".$url."' where classid='".$i."'";
			$db->execute($ss);
		}

		//更新与本栏目同一父栏目的上一个栏目的“nextid”字段值
		if($previd>0)
		{
			$db->execute("Update ".$this->table." set nextid=" . $classid . " where classid=" . $previd);
		}

		if($parentid>0)
		{
			//更新其父类的子栏目数
			$db->execute("Update ".$this->table." set child=child+1 where classid=".$parentid);

			//更新该栏目排序以及大于本需要和同在本分类下的栏目排序序号
			$db->execute("Update ".$this->table." set orderid=orderid+1 where rootid=" . intval($rootid) . " and orderid>" . intval($prevorderid));
			$db->execute("Update ".$this->table." set orderid=" . (intval($prevorderid)+1) . " where classid=" . $classid);
		}
		if($aa){
		echo "<script language=javascript>alert('添加成功！');location='".URL('mgr/infoclass.info')."';</script>";
		exit;}else{
			echo "<script language=javascript>alert('添加失败，请重试！');history.back();</script>";
			exit;
		}

	}

	//*****************保存修改分类到数据库***************************
	function modify_class($data){
		$db = APP :: ADP('db');
		$classid=$data['classid'];
		$classname=$data['classname'];
		$readme=$data['readme'];
		$lmorder=$data['lmorder'];
		$sys_statue=$data['sys_statue'];
		$uunique=$data['uunique'];
		if($sys_statue=="")
			$sys_statue=0;

		if($uunique!=""){
			$sqlcount="Select count(*) From ".$this->table." Where parentid=0 AND uunique='" . $uunique . "' and classid!='".$classid."'";
			$count = $db->getOne($sqlcount);
			if($count!=0)
			{
				$founderr=true;
				echo "<script language=javascript>alert('".$uunique.":英文唯一名称已存在！');history.back();</script>";

			}else{
				$sql="update ".$this->table." set uunique='".$uunique."' where classid='".$classid."'";
				$re1=mysql_query($sql);
			}
		}

		$sql="Select parentid From ".$this->table." Where classid='".$classid."'";
		$parentid = $db->getOne($sql);

		if($sys_statue==1 || $parentid==0){
			$rs=$this->above_classid('".$this->table."',$classid);
			//echo $rs;exit;
			$ss="update ".$this->table." set sys_statue='".$sys_statue."' where classid in (".$rs.")";
			mysql_query($ss);
		}


		$sql="update ".$this->table." set classname='".$classname."',readme='".$readme."',lmorder='".$lmorder."' where classid='".$classid."'";
		$re=mysql_query($sql);

		echo "<script language=javascript>alert('修改成功！');location='".URL('mgr/infoclass.info')."';</script>";
		exit;

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

	//************************信息内容列表查询11****************************
	function classfylist($lmid){
		//include_once('page.php');
		$db = APP :: ADP('db');

		$sqlcount="select count(*) from ".$this->table." where parentid='".$lmid."'";
		$sql="select classid,classname,child from ".$this->table." where parentid='".$lmid."' order by lmorder=0,lmorder,classid asc";
				
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

       $aa['lmname']=$db->getOne("select classname from ".$this->table." where classid=".$lmid."");

        return $aa;
	}
	//************************信息内容列表查询@@liu****************************
	function getClassInfo($parentId){
		//include_once('page.php');
		$db = APP :: ADP('db');

		$sql="select classid,classname,child,depth from ".$this->table." where parentid='".$parentId."' order by orderid";
        $rs=$db->query($sql);

        return $rs;
	}
	
	//************************根据唯一英文名获取classid @@liu ****************************
	function getInofclassByName($uunique){
		//include_once('page.php');
		$db = APP :: ADP('db');
		$sql='select classId from '.$this->table.' where uunique="'.$uunique.'"';
        $rs=$db->getrow($sql);

        return $rs;
	}
	
	
	//************************根据classid获取classid @@liu ****************************
	function getInofclassByClassid($classid){
		//include_once('page.php');
		$db = APP :: ADP('db');
		$sql='select * from '.$this->table.' where classId='.$classid;
        $rs=$db->getrow($sql);
        return RST($rs);
	}
	
	//*********************** 详细信息内容列表查询**************************
	function classfylist1_count($lmid,$classid){
		$db = APP :: ADP('db');

		$sqlcount = "select count(*) from ".$this->tablecontent." a inner join ".$this->table." c on a.classid=c.classid where a.classid in (".$this->above_classid("".$this->table."",$classid).") order by a.contentid desc";
		$rs=$db->getOne($sqlcount);
		return RST($rs);

	}

	function classfylist1($lmid,$classid, $offset = 0, $limit = 1){
		$db = APP :: ADP('db');
		$sql="select a.*,c.classname from ".$this->tablecontent." a inner join ".$this->table." c on a.classid=c.classid where a.classid in (".$this->above_classid("".$this->table."",$classid).") order by a.classid desc, a.contentid asc";
		if ($limit) {
			$sql .= ' LIMIT ' . $offset . ',' . $limit;
		}
		return RST($db->query($sql));

	}


	//*********************** 详细信息内容列表查询**************************
	function classfylist1____________($lmid,$classid){
		$db = APP :: ADP('db');

		$sqlcount = "select count(*) from ".$this->tablecontent." a inner join ".$this->table." c on a.classid=c.classid where a.classid in (".$this->above_classid("".$this->table."",$classid).") order by a.contentid desc";
		$sql="select a.*,c.classname from ".$this->tablecontent." a inner join ".$this->table." c on a.classid=c.classid where a.classid in (".$this->above_classid("".$this->table."",$classid).") order by a.classid desc, a.contentid asc";

			$page = (int)V('r:page', 1);//当前页数
			$perpage=18;//每页显示数
			$offset = ($page-1) * $perpage;
			
			$sql.=" limit ".$offset.",".$perpage;
			
			$aa=$db->query($sql);
			$count = $db->getOne($sqlcount);
			
			$pager = APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $perpage, 'recordCount' => $count, 'linkNumber' => 10);
			$pager->setParam($page_param);
			//$pager->setFormat('[current]/[total] [prev]上一页[/prev] [prevnav]前10页[/prevnav] [nav] [nextnav]后10页[/nextnav] [next]下一页[/next] 总记录数 [recordCount]');
			
		
			$aa['page']=$pager->makePage();

		$aa['lmname']=$db->getOne("select classname from ".$this->table." where classid=".$lmid."");
        return $aa;
	}

	//**************************添加信息到数据库操作*****************************
	function save_content($lmid,$classid,$title){
		$db = APP :: ADP('db');
		$rr=$db->getOne("select count(*) from ".$this->table." where parentid=0 and classid=".$classid."");
		if($rr){
			echo "<script language=javascript>alert('所属栏目不能为根目录，请选择其子栏目');history.back(-1);</script>";
			exit;
		}
		
		$sql="INSERT INTO `".$this->tablecontent."` (`classid`,`title`) VALUES('$classid', '$title')";

        $result=mysql_query($sql);

        if ($result){
        	echo "<script language=javascript>location='".URL('mgr/infoclass.classfylist&id='.$lmid)."';</script>";
			exit;

        }
		else{
			echo "<script language=javascript>alert('操作失败，请重试！');location='".URL('mgr/infoclass.classfylist&id='.$lmid)."';</script>";
			exit;
		}
	}
	//**************************添加信息到数据库 @@liu*****************************
	function saveContent($data){
		$db = APP :: ADP('db');
		$db->setTable(T_INFOCLASS_CONTENT);
		$rs=$db->save($data,$data['contentid'],'','contentid');
		return RST($rs);
		

	}

	//***************************添加信息的分类读取下拉列表框****************************
	function read11($currentid=0,$cid=''){
		 $db = APP :: ADP('db');
		 $db->setTable(T_INFOCLASS);
		 $table=$db->getTable(T_INFOCLASS);
		 
		 $s="&nbsp;|&nbsp;";
	     $t="&nbsp;|-";
		 $option="";
		 if($cid)
		 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
		 else  $sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." order by abspath asc";

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
		 $info['info']=$option;
		 
		 $info['lmname']=$db->getOne("select classname from ".$this->table." where classid=".$cid."");
		 
		 return $info;
		}
		
		//*************************取将要修改的信息的内容**************************
		function getone($contentid){
			 $db = APP :: ADP('db');
			 $sql="select * from ".$this->tablecontent." where contentid='".$contentid."'";
			 return $db->getRow($sql);	 
		}
		
		//*************************获取某分类下的内容**************************
		function getContentList($classid){
			 $db = APP :: ADP('db');
			 $sql="select * from ".$this->tablecontent." where classid='".$classid."'";
			 $rs= $db->query($sql);	 
			 return RST($rs);
		}
		//*************************修改信息保存到数据库************************
		function modify_content(){
			 $db = APP :: ADP('db');
			$lmid=V('r:lmid');
			$classid=V('r:parentid');
			$title=V('r:title');
			$contentid=V('r:contentid');
			
			$rr=$db->getOne("select count(*) from ".$this->table." where parentid=0 and classid=".$classid."");
			if($rr){
				echo "<script language=javascript>alert('所属栏目不能为根目录，请选择其子栏目');history.back(-1);</script>";
				exit;
			}
			
			$sql="update ".$this->tablecontent." set classid='".$classid."',title='".$title."' where contentid=".$contentid;
			$aa=$db->execute($sql);
			if ($aa){
				echo "<script language=javascript>location='".URL('mgr/infoclass.classfylist1&lmid='.$lmid.'&classid='.$classid)."';</script>";
				exit;
			}
			else{
				echo "<script language=javascript>alert('操作失败，请重试！');location='".URL('mgr/infoclass.classfylist1&lmid='.$lmid.'&classid='.V('r:iid'))."';</script>";
				exit;
			}
		}
		//**********************删除信息****************************
		function del_content(){
			 $id=V('r:id');
			 $sql="delete from ".$this->tablecontent." where contentid=".$id;
			 $aa=$this->db->execute($sql);
			if ($aa){
				echo "<script language=javascript>history.back(-1);</script>";
				exit;
			}
			else{
				echo "<script language=javascript>alert('操作失败，请重试！');history.back(-1);</script>";
				exit;
			}
		}
		//******************批量彻底删除********************
		function delall($id){
			  $sql="delete from ".$this->tablecontent." where contentid in (".$id.")";
			  return $this->db->execute($sql);
		}
	//********************获取信息的下拉列表框信息************************
	function getinfo($id=''){
		if($id=='')
			$id=V('r:id');
		$data="";
		$sql="select * from ".$this->tablecontent." where classid=".$id;//echo $sql;exit;
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
			$data.="<option value='".$row['contentid']."'>".$row['title']."<option>";
		}
		return $data;
	}

}
?>