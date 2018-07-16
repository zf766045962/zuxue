<?php
class articleclass {
	//***********************文章分类列表(按排序顺序排)*************************
function get_sort($cid='-1',$parentid=0,$n=0) 
{ 
	$db = APP :: ADP('db');
	$table=$db->getTable(T_ARTICLE_CLASS);
	$a="<img src='/img/tree_line3.gif' width='17' height='16' valign='abvmiddle'>";
	
	static $sort_list = array (); 
	if($cid=='-1')
		$sql = "SELECT * FROM ".$table." WHERE `parentid` = '".$parentid."' and statue='0' order by lmorder=0,lmorder";	
	else 
		$sql = "SELECT * FROM ".$table." WHERE `classid` = '".$cid."' and statue='0' order by lmorder=0,lmorder"; 

	$res = mysql_query($sql);
	if ($res) 
	{ 	$n++;
		while ($row = mysql_fetch_array($res)) 
		{ 
			$sql = "SELECT * FROM ".$table." WHERE `parentid` = '".$row['classid']."' and statue='0' order by lmorder=0,lmorder"; 	
			if($db->execute($sql)){
				if($row['parentid']!=0){
					$w=str_repeat ($a,$n-1);
					$e="<img src='/img/tree_line1.gif' width='17' height='16' valign='abvmiddle'>";
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
	//echo $sql;
	return $sort_list; 
}

//+++++++++++++++++++++++++++++++


//*********************回收站列表**************************
function recycle($cid=''){
	$db = APP :: ADP('db');
	$table=$db->getTable(T_ARTICLE_CLASS);
	$sort_list = array ();
	 $s="<img src='/img/tree_line3.gif' width='17' height='16' valign='abvmiddle'>";
	 $t="<img src='/img/tree_line1.gif' width='17' height='16' valign='abvmiddle'>";
	 if($cid=='')
	 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid,parentpath from ".$table." where statue=1 order by abspath asc";
	 else 
	 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid,parentpath from ".$table." where statue=1 and (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
	 
	 $query = mysql_query ( $sql );
	 while ( $row = mysql_fetch_array ( $query ) ) {
		 	
		if(count(explode(',',$row ['abspath']))>3){
		 $space = str_repeat ($s, count ( explode(',',$row ['abspath'])) - 3 );
		}else $space="";
		
		if($row['parentid']==0)
		 	$row['classname']=  $space ."&nbsp;". $row ['classname'];
		else
			$row['classname']=  $space .$t."&nbsp;". $row ['classname'];
			
		//-------------------------
		$row['jiapu']="";
		if($row['parentid']!=0){
		$q="select count(*) from ".$table." where classid='".$row['parentid']."' and statue=0";
		if($db->getOne($q)){//查找家谱
			$ss="select classname from ".$table." where classid in (".$row['parentpath'].") order by classid asc";
			$arr=$db->query($ss);
			foreach($arr as $key=>$val){$row['jiapu'].=$val['classname']."=>";}
			}
		}
		//-------------------------
			
		$sort_list[] = $row; 
	 }
	 return $sort_list;
	}

//*********************文章分类列表(默认排序)***************************
function selectclass(){
	$db = APP :: ADP('db');
	   $table=$db->getTable(T_ARTICLE_CLASS);
		for($i=0;$i<10;$i++)
		{
			$arrshowline[$i]=0;
		}
		$sqlClass="select * from ".$table." order by rootid,orderid";
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
							{$row.= "<img src='/img/tree_line1.gif' width='17' height='16' valign='abvmiddle'>";}
						else
							{$row.=  "<img src='/img/tree_line2.gif' width='17' height='16' valign='abvmiddle'>";}
					}
					else
					{
						if(intval($arrshowline[$i])==1)
							{$row.=  "<img src='/img/tree_line3.gif' width='17' height='16' valign='abvmiddle'>";}
						else
							{$row.=  "<img src='/img/tree_line4.gif' width='17' height='16' valign='abvmiddle'>";}
					}
				}
			 }

			  if(intval($rs_all["child"])>0)
			  	{$row.=  "<img src='/img/tree_folder4.gif' width='15' height='15' valign='abvmiddle'>";}
			  else
			  	{$row.=  "<img src='/img/tree_folder3.gif' width='15' height='15' valign='abvmiddle'>";}

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

/**************************模型列表[sitemodel_list] ***********************************/
	/**
	* 称获取模型列表
    * @param int $cc_uid
    * @return array()
	*/
	function sitemodel_list($offset=0,$rows=10,$query='') {
		$db = APP :: ADP('db');
		
		if(isset($query['order_by'])){
			$order_by=$query['order_by'];
		}else{
			$order_by='modelid';
		}
		if(isset($query['order_sc']) && $query['order_sc']){
			$order_sc=$query['order_sc'];
		}else{
			$order_sc='DESC';
		}
		$sql = 'SELECT modelid,name FROM '.$db->getTable(T_MODEL).' ORDER BY `'.$order_by.'` '.$order_sc.' LIMIT '.$offset.','. $rows;
		//echo $sql;
		$rss = $db->query($sql);
		//var_dump($rss);
		return RST($rss);
	}

//*********************添加分类保存到数据库操作***********************
	function save_class($data,$lmid=''){
		$db = APP :: ADP('db');
		

	    $table=$db->getTable(T_ARTICLE_CLASS);

		$parentid=$data['parentid'];
		$modelid =V('r:modelid'); 
		
		$classname=$data['classname'];
		$readme=$data['readme'];
		$lmorder=$data['lmorder'];//栏目排序
		
		$keyword=$data['keyword'];//关键字
		$description=$data['description'];//描述
		$uunique=$data['uunique'];
		$pictureurl=$data['pictureurl'];
		$classurl=$data['classurl'];
		$elite=$data['elite'];
		$ontop=$data['ontop'];

		if($lmorder=="")
			$lmorder=0;
		if($elite=="")
			$elite=0;
		if($ontop=="")
			$ontop=0;
		$Author=0;

		$founderr=false;

		$maxclassid =$db->getOne("select Max(classid) From ".$table."");

		if(empty($maxclassid))
		{
			$maxclassid=0;
		}
		$classid=$maxclassid+1;

		$maxrootid = $db->getOne("select max(rootid) From ".$table."");

		if(empty($maxrootid))
		{
			$maxrootid=0;
		}
		$rootid=$maxrootid+1;

		if($parentid>0)
		{
			$sql="select * From ".$table." where classid=" . $parentid . "";

			$sqlcount="select count(*) From ".$table." where classid=" . $parentid . "";
			$count=$db->getOne($sqlcount);

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
					$prevorderid = $db->getOne("select Max(orderid) From ".$table." where parentid=" . $parentid);

					$previd = $db->getOne("select classid From ".$table." where parentid=" . $parentid . " and orderid=" . $prevorderid);

					//得到同一父栏目但比本栏目级数大的子栏目的最大orderid，如果比前一个值大，则改用这个值。
					$sql="select Max(orderid) From ".$table." where parentpath like '" . $parentpath . ",%'";
					$sqlcount="select count(*),Max(orderid) From ".$table." where parentpath like '" . $parentpath . ",%'";

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
				$previd= $db->getOne("select classid From ".$table." where rootid=" .$maxrootid . " and depth=0");
			}
			else
			{
				$previd=0;
			}
			$prevorderid=0;
			$parentpath="0";
		}


		$sqlcount="Select count(*) From ".$table." Where parentid=" . intval($parentid) . " AND classname='" . $classname . "'";
		$count = $db->getOne($sqlcount);
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
				//$errmsg=$errmsg . "<br><li>“" . $ParentName . "”中已经存在子栏目“" . $classname . "”！</li>";
			}
		}
		if($uunique){
		$ss="Select count(*) From ".$table." Where parentid=" . intval($parentid) . " AND uunique='" . $uunique . "'";
		$count = $db->getOne($sqlcount);
		if($count!=0){
				echo "<script language=javascript>alert('已存在英文名称：".$uunique."');history.back(-1);</script>";
				exit;
			}
		}

		$sql="insert into ".$table."(classid,classname,classurl,parentid,modelid,parentpath,depth,rootid,child,previd,nextid,orderid,readme,elite,ontop,Author,keyword,description,lmorder,uunique,pictureurl,statue) values('".$classid."','".$classname."','".$classurl."',".intval($parentid).",".intval($modelid).",'".$parentpath."',";
		if(intval($parentid)>0)
		{
			$sql .= $parentdepth+1;
		}
		else
		{
			$sql .=0;
		}
		$sql.=",".intval($rootid).",0,".intval($previd).",0,".intval($prevorderid).",'".$readme."','".$elite."','".$ontop."','".$Author."','".$keyword."','".$description."','".$lmorder."','".$uunique."','".$pictureurl."',0)";
		//echo $sql;exit;
		$re=$db->execute($sql);


		//更新与本栏目同一父栏目的上一个栏目的“nextid”字段值
		if($previd>0)
		{
			$db->execute("Update ".$table." set nextid=" . $classid . " where classid=" . $previd);
		}

		if($parentid>0)
		{
			//更新其父类的子栏目数
			$db->execute("Update ".$table." set child=child+1 where classid=".$parentid);

			//更新该栏目排序以及大于本需要和同在本分类下的栏目排序序号
			$db->execute("Update ".$table." set orderid=orderid+1 where rootid=" . intval($rootid) . " and orderid>" . intval($prevorderid));
			$db->execute("Update ".$table." set orderid=" . (intval($prevorderid)+1) . " where classid=" . $classid);
		}

		if($re){
		echo "<script language=javascript>alert('添加成功！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
		exit;
		}else{
			echo "<script language=javascript>alert('操作失败，请重试！');history.back(-1);</script>";
			exit;
		}

	}
	//***************************分类读取下拉列表框****************************
	function read11($currentid=0,$cid=''){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_ARTICLE_CLASS);
		 $s="&nbsp;|&nbsp;";
	     $t="&nbsp;|-";
		 if($cid=='')
		 	$option="<option value='0'>(无)作为一级栏目</option>";
		
		 if($cid)
		 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where statue=0 and (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
		 else  $sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where statue=0 order by abspath asc";
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
		 return $option;
		}

	//**********************添加分类下拉列表框读取*****************************
	function read($currentid=0,$table='',$ShowType=0){
		$db = APP :: ADP('db');
		 $table=$db->getTable(T_ARTICLE_CLASS);
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
	//**********************将文章分类设为删除状态*************************
	function tmpdelclass($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_ARTICLE_CLASS);
			$a=$this->above_classid($table, $id);
			$sql="update ".$table." set statue=1 where classid in (".$a.")";
			$q=$db->execute($sql);
			if($q){
			   echo "<script>alert('成功放入回收站');history.back(-1);</script>";
			   exit;
		   }else{
			   echo "<script>alert('操作失败，请重试！');history.back(-1);</script>";
			   exit;
			}
		}
		
	//**********************回收站还原*********************
	function restore($id){
		$db = APP :: ADP('db');
		    $table=$db->getTable(T_ARTICLE_CLASS);
			
			$ss="select parentid from ".$table." where classid='".$id."'";
			$parentid=$db->getOne($ss);
			if($parentid!=0){
				$ss="select statue from ".$table." where classid=".$parentid."";
				$statue=$db->getOne($ss);
				if($statue==1){
					echo "<script>alert('不能直接还原子栏目，请从根目录还原');history.back(-1);</script>";
			   		exit;
					}
			}
			
			
			$a=$this->above_classid($table, $id);
			$sql="update ".$table." set statue=0 where classid in (".$a.")";
			$q=$db->execute($sql);
			if($q){
			   echo "<script>alert('还原成功！');history.back(-1);</script>";
			   exit;
		   }else{
			   echo "<script>alert('操作失败，请重试！');history.back(-1);</script>";
			   exit;
			}
		}

	//*******************删除文章分类*******************
	function delclass($id){
		$db = APP :: ADP('db');
		$table = $db->getTable(T_ARTICLE_CLASS);
		$t_content = $db->getTable(T_ARTICLE);
		$classid = $id;
		if(empty($classid))
		{
			echo "参数不足";
			exit;
		}
		else
		{
			$classid=intval($classid);
		}
		$sql="select classid,rootid,depth,parentid,child,previd,nextid,pictureurl From ".$table." where classid=".$classid;
		
		$rs=$db->getRow($sql);

		if(!$rs)
		{
			echo "<script language=javascript>alert('栏目不存在，或者已经被删除！'); history.back(-1);</script>";
			exit;
		}
		else
		{
			if($rs["child"]>0)
			{
				echo "<script language=javascript>alert('该栏目含有子栏目，请删除其子栏目后再进行删除本栏目的操作！'); history.back(-1);</script>";
				exit;
			}
		}

		$previd = $rs["previd"];
		$nextid = $rs["nextid"];
		if($rs["depth"]>0)
		{
			$db->execute("Update ".$table." set child=child-1 where classid = ".$rs["parentid"]);
		}

		$del_sql = "delete from ".$table." where classid = ".$classid;

		if($db->getRow("select * from ".$db->getTable(T_NEWS)." where catid = ".$classid)){

			$db->execute("delete from ".$db->getTable(T_NEWS)." where catid = ".$classid);

		}

		$ru = $db->execute($del_sql);
		
		
		$pictureurl=$rs['pictureurl'];
		//删除本栏目的所有内容
	    $db->execute("delete from ".$t_content." where classid = " . $classid);

		//修改上一栏目的nextid和下一栏目的previd
		if($previd>0)
		{
			$db->execute("Update ".$table." set nextid=" . $nextid . " where classid=" . $previd);
		}
		if($nextid>0)
		{
			$db->execute("Update ".$table." set previd=" . $previd . " where classid=" . $nextid);
		}

		if($ru){
			if($pictureurl){
				if (file_exists($pictureurl)) {
				@unlink($pictureurl);
				}
			}
			echo "<script language=javascript>alert('删除成功！'); location.href='admin.php?m=mgr/articleclass.recycle';</script>";
			exit;
		}
		else   echo  "<script language=javascript>alert('操作失败，请重试！');history.back(-1);</script>";


	}

	//********************修改文章分类查询**********************
	function modifyselect($id){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);
		$sqlClass="select * from ".$table." where classid=".$id;
		$row = $db->getRow($sqlClass);

		$aa="";
		if(intval($row["parentid"])<=0)
		{$aa.= "无（作为一级栏目）";	}
		else
		{
			$sqlParentClass="Select * From ".$table." where classid in (" . $row["parentpath"] . ") order by depth";
			$rr=$db->query($sqlParentClass);

			foreach($rr as $key=>$rsParentClass)
			{
				for($i=1;$i<=intval($rsParentClass["depth"]);$i++)
				{
					$aa.= "&nbsp;&nbsp;&nbsp;";
				}
				if(intval($rsParentClass["depth"])>0){$aa.=  "└";};
				$aa.=  "&nbsp;" . $rsParentClass["classname"] . "<br>";
			}

		}

		$row['p']=$aa;
		return $row;
	}

//*****************保存修改分类到数据库***************************
	function modify_class($data){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);
		$lmid=V('r:lmid');
		$modelid=V('r:modelid');

		$classid=$data['classid'];		
		$classname=$data['classname'];
		$readme=$data['readme'];
		$lmorder=$data['lmorder'];//栏目排序
		
		$keyword=$data['keyword'];//关键字
		$description=$data['description'];//描述
		$uunique=$data['uunique'];
		$pictureurl=$data['pictureurl'];
		$classurl=$data['classurl'];
		$elite=$data['elite'];
		$ontop=$data['ontop'];

		if($lmorder=="")
			$lmorder=0;
		if($elite=="")
			$elite=0;
		if($ontop=="")
			$ontop=0;
			
		$aa="Select parentid From ".$table." Where classid=" .$classid. "";
		$parentid=$db->getOne($aa);
			
		if($uunique){
			$ss="Select count(*) From ".$table." Where parentid=" . intval($parentid) . " AND uunique='" . $uunique . "'";
			$count = $db->getOne($sqlcount);
			if($count != 0){
				echo "<script language=javascript>alert('已存在英文名称：".$uunique."');history.back(-1);</script>";exit;
			}
		}

		$sql="update ".$table." set classname='".$classname."',readme='".$readme."',lmorder='".$lmorder."',elite='".$elite."',ontop='".$ontop."',keyword='".$keyword."',description='".$description."',uunique='".$uunique."',pictureurl='".$pictureurl."',classurl='".$classurl."',modelid=".$modelid." where classid='".$classid."'";
		//echo $sql;
		$re = mysql_query($sql);

		if($re){
			echo "<script language=javascript>alert('修改成功！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";exit;
		}else{
			echo "<script language=javascript>alert('操作失败，请重试！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";exit;
		}

	}

	//**********************移动分类保存到数据库***************************
	function move_save_class($classid,$rparentid){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);
		$lmid=V('r:lmid');

	if(empty($classid))
	{
		$founderr=true;
		echo "<script language=javascript>alert('参数不足，请重试！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
		exit;
	}

	$sql="select * From ".$table." where classid=" . $classid;
	$sqlcount="select count(*) From ".$table." where classid=" . $classid;
	//$result = mysql_query($sql);
	$count = $db->getOne($sqlcount);
	if($count == 0)
	{
		$founderr=true;
		echo "<script language=javascript>alert('找不到指定栏目！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
		exit;
	}

	$rs_all = $db->getRow($sql);
	//$rparentid=$parentid;

	if($rs_all["parentid"]!=$rparentid)
	{
		//更改了所属栏目，则要做一系列检查
		if($rparentid==$rs_all["classid"])
		{
			$founderr=true;
			echo "<script language=javascript>alert('所属栏目不能为自己！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
			exit;
		}
		//判断所指定的栏目是否为外部栏目或本栏目的下属栏目
		if(intval($rs_all["parentid"])==0)
		{
			if($rparentid>0)
			{
				$ii="select rootid From ".$table." where classid=".$rparentid;
				$trs=$db->getRow($ii);
				if(!$trs)
				{
					$founderr=true;
					echo "<script language=javascript>alert('不能指定外部栏目为所属栏目！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
					exit;
				}
				else
				{
					if(intval($rs_all["rootid"])==intval($trs['rootid']))
					{
						$founderr=true;
						echo "<script language=javascript>alert('不能指定该栏目的下属栏目作为所属栏目！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
						exit;
					}
				}
			}
		}
		else
		{
			$oo="select classid From ".$table." where parentpath like '".$rs_all["parentpath"]."," . $rs_all["classid"] . "%' and classid=".$rparentid;
			$trs=$db->getRow($oo);
			if($trs)
			{
				$founderr=true;
				echo "<script language=javascript>alert('不能指定该栏目的下属栏目作为所属栏目！');location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";
				exit;
			}
		}
	}

	if(intval($rs_all["parentid"])==0)
	{
		$parentid=intval($rs_all["classid"]);
		$iparentid=0;
	}
	else
	{
		$parentid=intval($rs_all["parentid"]);
		$iparentid=intval($rs_all["parentid"]);
	}
	$depth=intval($rs_all["depth"]);
	$child=intval($rs_all["child"]);
	$rootid=intval($rs_all["rootid"]);
	$parentpath=$rs_all["parentpath"];
	$previd=intval($rs_all["previd"]);
	$nextid=intval($rs_all["nextid"]);


  //假如更改了所属栏目
  //需要更新其原来所属栏目信息，包括深度、父级ID、栏目数、排序、继承版主等数据
  //需要更新当前所属栏目信息
  //继承版主数据需要另写函数进行更新--取消，在前台可用classid in parentpath来获得

  $ii="select max(rootid) From ".$table."";
  $maxrootid=$db->getOne($ii);
  if(empty($maxrootid))
  {
  	$maxrootid=0;
  }

  if(intval($parentid)!=$rparentid && !($iparentid==0 && $rparentid==0))
  {
  	//假如更改了所属栏目
	//更新原来同一父栏目的上一个栏目的nextid和下一个栏目的previd
	if($previd>0)
	{
		mysql_query("Update ".$table." set nextid=" . $nextid . " where classid=" . $previd);
	}
	if($nextid>0)
	{
		mysql_query("Update ".$table." set previd=" . $previd . " where classid=" . $nextid);
	}

	if($iparentid>0 && $rparentid==0)
	{
		//如果原来不是一级分类改成一级分类
		//得到上一个一级分类栏目
		$sql="select classid,nextid From ".$table." where rootid=" . $maxrootid . " and depth=0";
		$result2 = mysql_query($sql);
		$rs = mysql_fetch_array($result2);
		$previd=$rs['classid'];      //得到新的previd
		//更新上一个一级分类栏目的nextid的值

		mysql_query("Update ".$table." Set nextid=".$classid." where classid=".intval($rs['classid']));
		mysql_free_result($result2);

		$maxrootid=$maxrootid+1;
		//更新当前栏目数据
		mysql_query("Update ".$table." set depth=0,orderid=0,rootid=".$maxrootid.",parentid=0,parentpath='0',previd=" . $previd . ",nextid=0 where classid=".$classid);
		//如果有下属栏目，则更新其下属栏目数据。下属栏目的排序不需考虑，只需更新下属栏目深度和一级排序ID(rootid)数据
		if(intval($child)>0)
		{
			$i=0;
			$parentpath=$parentpath . ",";
			$result2 = mysql_query("select * From ".$table." where parentpath like '%".$parentpath . $classid."%'");
			while($rs = mysql_fetch_array($result2))
			{
				$i=$i+1;
				$mparentpath=str_ireplace($parentpath,"",$rs["parentpath"]);
				mysql_query("Update ".$table." set depth=depth-".$depth.",rootid=".$maxrootid.",parentpath='".$mparentpath."' where classid=".$rs["classid"]);
			}
			mysql_free_result($result2);
		}

		//更新其原来所属栏目的栏目数，排序相当于剪枝而不需考虑
		mysql_query("Update ".$table." set child=child-1 where classid=".$iparentid);
	}
	elseif($iparentid>0 && $rparentid>0)
	{
		//如果是将一个分栏目移动到其他分栏目下
		//得到当前栏目的下属子栏目数
		$parentpath=$parentpath . ",";
		$result2=mysql_query("select count(*) From ".$table." where parentpath like '%".$parentpath . $classid."%'");
		$rs = mysql_fetch_array($result2);
		$classcount=$rs[0];
		if(empty($classcount))
		{
			$classcount=1;
		}
		mysql_free_result($result2);

		//获得目标栏目的相关信息
		$result2 = mysql_query("select * From ".$table." where classid=".$rparentid);
		$trs=mysql_fetch_array($result2);
		if(intval($trs["child"])>0)
		{
			//得到与本栏目同级的最后一个栏目的orderid
			$result3 = mysql_query("select Max(orderid) From ".$table." where parentid=" . $trs["classid"]);
			$rsprevorderid=mysql_fetch_array($result3);
			$prevorderid=$rsprevorderid[0];
			mysql_free_result($result3);
			//得到与本栏目同级的最后一个栏目的classid
			$sql="select classid,nextid From ".$table." where parentid=" . $trs["classid"] . " and orderid=" . $prevorderid;
			$result3 = mysql_query($sql);
			$rs = mysql_fetch_array($result3);
			$previd=$rs['classid'];    ///得到新的previd
			//$rs[1]=$classid;    //更新上一个栏目的nextid的值
			mysql_query("Update ".$table." Set nextid=".intval($classid)." where classid=".intval($rs["classid"]));
			mysql_free_result($result3);

			//得到同一父栏目但比本栏目级数大的子栏目的最大orderid，如果比前一个值大，则改用这个值。
			$result3 = mysql_query("select Max(orderid) From ".$table." where parentpath like '" . $trs["parentpath"] . "," . $trs["classid"] . ",%'");
			$rsprevorderid=mysql_fetch_array($result3);
			if($rsprevorderid)
			{
				if(!empty($rsprevorderid[0]))
				{
					if($rsprevorderid[0]>$prevorderid)
					{
						$prevorderid=$rsprevorderid[0];
					}
				}
			}
			mysql_free_result($result3);
		}
		else
		{
			$previd=0;
			$prevorderid=$trs["orderid"];
		}

		///在获得移动过来的栏目数后更新排序在指定栏目之后的栏目排序数据
		mysql_query("Update ".$table." set orderid=orderid+" . intval($classcount) . "+1 where rootid=" . intval($trs["rootid"]) . " and orderid>" . intval($prevorderid));

		///更新当前栏目数据
		mysql_query("Update ".$table." set depth=".intval($trs["depth"])."+1,orderid=".intval($prevorderid)."+1,rootid=".intval($trs["rootid"]).",parentid=".intval($rparentid).",parentpath='" . $trs["parentpath"] . "," . intval($trs["classid"]) . "',previd=" . intval($previd) . ",nextid=0 where classid=".intval($classid));

		//如果有子栏目则更新子栏目数据，深度为原来的相对深度加上当前所属栏目的深度
		$result3 = mysql_query("select * From ".$table." where parentpath like '%".$parentpath.intval($classid)."%' order by orderid");
		$i=1;
		while($rs=mysql_fetch_array($result3))
		{
			$i=$i+1;
			$iparentpath=$trs["parentpath"] . "," . intval($trs["classid"]) . "," . str_ireplace($parentpath,"",$rs["parentpath"]);
			mysql_query("Update ".$table." set depth=depth-".intval($depth)."+".intval($trs["depth"])."+1,orderid=".intval($prevorderid)."+".$i.",rootid=".intval($trs["rootid"]).",parentpath='".$iparentpath."' where classid=".intval($rs["classid"]));
		}
		mysql_free_result($result3);
		/*rs.close
		set rs=nothing
		trs.close
		set trs=nothing*/

		//更新所指向的上级栏目的子栏目数
		mysql_query("Update ".$table." set child=child+1 where classid=".intval($rparentid));

		//更新其原父类的子栏目数
		mysql_query("Update ".$table." set child=child-1 where classid=".intval($iparentid));
	}
	else
	{    //如果原来是一级栏目改成其他栏目的下属栏目
		//得到移动的栏目总数
		$result3 = mysql_query("select count(*) From ".$table." where rootid=".intval($rootid));
		$rs=mysql_fetch_array($result3);
		$classcount=$rs[0];
		mysql_free_result($result3);
		//rs.close
		//set rs=nothing

		//获得目标栏目的相关信息
		$result3 = mysql_query("select * From ".$table." where classid=".intval($rparentid));
		$trs = mysql_fetch_array($result3);
		if(intval($trs["child"])>0)
		{
			//得到与本栏目同级的最后一个栏目的orderid
			$result4=mysql_query("select Max(orderid) From ".$table." where parentid=" .intval( $trs["classid"]));
			$rsprevorderid = mysql_fetch_array($result4);
			$prevorderid=$rsprevorderid[0];
			mysql_free_result($result4);

			$sql="select classid,nextid From ".$table." where parentid=" . intval($trs["classid"]) . " and orderid=" . intval($prevorderid);
			$result4 = mysql_query($sql);
			$rs=mysql_fetch_array($result4);
			$previd=$rs['classid'];
			mysql_query("Update ".$table." set nextid=".$classid." where classid=" . intval($rs["classid"]));
			mysql_free_result($result4);

			//得到同一父栏目但比本栏目级数大的子栏目的最大orderid，如果比前一个值大，则改用这个值。
			$result4=mysql_query("select Max(orderid) From ".$table." where parentpath like '" . $trs["parentpath"] . "," . intval($trs["classid"]) . ",%'");
			$rsprevorderid = mysql_fetch_array($result4);
			if($rsprevorderid)
			{
				if(!empty($rsprevorderid[0]))
				{
					if(intval($rsprevorderid[0])>intval($prevorderid))
					{
						$prevorderid=$rsprevorderid[0];
					}
				}
			}
		}
		else
		{
			$previd=0;
			$prevorderid=intval($trs["orderid"]);
		}

		//在获得移动过来的栏目数后更新排序在指定栏目之后的栏目排序数据
		mysql_query("Update ".$table." set orderid=orderid+" . intval($classcount) ."+1 where rootid=" . intval($trs["rootid"]) . " and orderid>" . intval($prevorderid));

		mysql_query("Update ".$table." set previd=" . intval($previd) . ",nextid=0 where classid=" . intval($classid));
		$result4 = mysql_query("select * From ".$table." where rootid=".intval($rootid)." order by orderid");
		$i=0;
		while($rs=mysql_fetch_array($result4))
		{
			$i=$i+1;
			if(intval($rs["parentid"])==0)
			{
				$parentpath=$trs["parentpath"] . "," . intval($trs["classid"]);
				mysql_query("Update ".$table." set depth=depth+".intval($trs["depth"])."+1,orderid=".intval($prevorderid)."+".$i.",rootid=".intval($trs["rootid"]).",parentpath='".$parentpath."',parentid=".intval($rparentid)." where classid=".intval($rs["classid"]));
			}
			else
			{
				$parentpath=$trs["parentpath"] . "," . intval($trs["classid"]) . "," . str_ireplace("0,","",$rs["parentpath"]);
				mysql_query("Update ".$table." set depth=depth+".intval($trs["depth"])."+1,orderid=".intval($prevorderid)."+".$i.",rootid=".intval($trs["rootid"]).",parentpath='".$parentpath."' where classid=".intval($rs["classid"]));
			}
		}
		mysql_free_result($result4);
		//trs.close
		//更新所指向的上级栏目栏目数
		mysql_query("Update ".$table." set child=child+1 where classid=".intval($rparentid));
	}
  }
  mysql_query("update ".$table." set parentpath=concat('0,',parentpath)  WHERE parentpath not like '0%'");
  echo "<script>location='".URL('mgr/articleclass.classlist&lmid='.$lmid)."';</script>";

	}
	
	//**************************解除推荐************************* 
	function xietui($id){
		$db = APP :: ADP('db');
		$table = $db->getTable(T_ARTICLE_CLASS);
		
		$sql = "update ".$table." set elite=0 where classid=".$id."";
		$a = $db->execute($sql);
		
		return $a;
	}
	//**************************设为推荐*************************
	function tuijian($id){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);
		
		$sql="update ".$table." set elite=1 where classid=".$id."";
		$a=$db->execute($sql);
		return $a;
	}
	//**************************解除置顶 *************************
	function xieding($id){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);	
		
		$sql="update ".$table." set ontop=0 where classid=".$id."";
		$a=$db->execute($sql);
		return $a;
	}
	//**************************设为置顶*************************
	function zhiding($id){
		$db = APP :: ADP('db');
		$table=$db->getTable(T_ARTICLE_CLASS);
		
		$sql="update ".$table." set ontop=1 where classid=".$id."";
		$a=$db->execute($sql);
		return $a;	
	}

}
?>
