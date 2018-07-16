<?php
class adpublish{
	
//***************************添加文章的分类读取下拉列表框(不包含删除状态的分类)****************************
	function read11($currentid=0,$cid=''){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD_CLASS);
		 $s="&nbsp;|&nbsp;";
	     $t="&nbsp;|-";
		 //$option="<option value=0>请选择……</option>";
		 $option="";
		 if($cid)
		 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where statue=0 and (parentpath like '0,".$cid.",%' or classid=".$cid." or parentpath='0,".$cid."') order by abspath asc";
		 else  $sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where statue=0 order by abspath asc";

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
		
	//*********************保存文章信息到数据库**********************
	function save(){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD);
		 $lmid=V('r:lmid');
		 
		 $sort=V('r:sort','0');
		 $start_time=V('r:start_time');
		 $end_time=V('r:end_time');
		 $data = array();
		$types=V('r:types');
		if($types==1){
			$textsize=V('r:textsize').V('r:textsize1');
			$keys = array('classid','title','types','texts','clickurl1','targetwindow1');
			foreach ($keys as $key) {
					$_temp = strval(V('r:'. $key));
				
				     $data[$key] =$db->escape($_temp);
			}
			$data['textsize']=$db->escape($textsize);
			$data['clickurl']=$data['clickurl1'];
			unset($data['clickurl1']);
			$data['targetwindow']=$data['targetwindow1'];
			unset($data['targetwindow1']);
			
		}else if($types==2){
			$keys = array('classid','title','types','pictureurl','picwidth','picheight','description','clickurl2','targetwindow2');
			foreach ($keys as $key) {
					$_temp = strval(V('r:'. $key));
				
					 $data[$key] =$db->escape($_temp);
			}
			$data['clickurl']=$data['clickurl2'];
			unset($data['clickurl2']);
			$data['targetwindow']=$data['targetwindow2'];
			unset($data['targetwindow2']);
		
		}else if($types==3){
			$keys = array('classid','title','types','flashurl','clickurl3','targetwindow3');
			foreach ($keys as $key) {
					$_temp = strval(V('r:'. $key));
				
				     $data[$key] =$db->escape($_temp);
			}
			$data['clickurl']=$data['clickurl3'];
			unset($data['clickurl3']);
			$data['targetwindow']=$data['targetwindow3'];
			unset($data['targetwindow3']);
		}else if($types==4){
			$keys = array('classid','title','types','code','mediaurl');
			foreach ($keys as $key) {
					$_temp = strval(V('r:'. $key));
				
				     $data[$key] =$db->escape($_temp);
			}
		}
		
			if($start_time=='') 
				$data['start_time']=date('Y-m-d');
			else 
				$data['start_time']=$start_time;
				
			if($end_time!='') $data['end_time']=$end_time;
			
			$data['sort']=$sort;
			$data['posttime']=date('Y-m-d H:i:s');
			
		    $aa=$db->save($data,'','ad');
	
		 if($aa){
			 echo "<script>alert('保存成功！');location='".URL('mgr/adpublish.articlelist&statue=0&lmid='.$lmid)."';</script>";
			 exit;
		  }else{
			 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/adpublish.add&lmid='.$lmid)."';</script>";
			 exit;  
		}
		
		}
		
		//**********************修改文章保存数据库********************
		function modify_save(){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$lmid=V('r:lmid');
			$aid=V('r:aid');
			
			 $sort=V('r:sort','0');
			 $start_time=V('r:start_time');
			 $end_time=V('r:end_time');
			 $data = array();
			$types=V('r:types'); 
			if($types==1){
				$textsize=V('r:textsize').V('r:textsize1');
				$keys = array('classid','title','types','texts','clickurl1','targetwindow1');
				foreach ($keys as $key) {
						$_temp = strval(V('r:'. $key));
					
						 $data[$key] =$db->escape($_temp);
				}
				$data['textsize']=$db->escape($textsize);
				$data['clickurl']=$data['clickurl1'];
				unset($data['clickurl1']);
				$data['targetwindow']=$data['targetwindow1'];
				unset($data['targetwindow1']);
				
			}else if($types==2){
				$keys = array('classid','title','types','pictureurl','picwidth','picheight','description','clickurl2','targetwindow2');
				foreach ($keys as $key) {
						$_temp = strval(V('r:'. $key));
					
						 $data[$key] =$db->escape($_temp);
				}
				$data['clickurl']=$data['clickurl2'];
				unset($data['clickurl2']);
				$data['targetwindow']=$data['targetwindow2'];
				unset($data['targetwindow2']);
			
			}else if($types==3){
				$keys = array('classid','title','types','flashurl','clickurl3','targetwindow3');
				foreach ($keys as $key) {
						$_temp = strval(V('r:'. $key));
					
						 $data[$key] =$db->escape($_temp);
				}
				$data['clickurl']=$data['clickurl3'];
				unset($data['clickurl3']);
				$data['targetwindow']=$data['targetwindow3'];
				unset($data['targetwindow3']);
			}else if($types==4){
				$keys = array('classid','title','types','code','mediaurl');
				foreach ($keys as $key) {
						$_temp = strval(V('r:'. $key));
					
						 $data[$key] =$db->escape($_temp);
				}
			}
			
				if($start_time=='') 
					$data['start_time']=date('Y-m-d');
				else 
					$data['start_time']=$start_time;
					
				if($end_time!='') $data['end_time']=$end_time;
		 
		 		$data['sort']=$sort;
		 		$aa=$db->save($data,$aid,'ad','aid');
		 
			 if($aa){
				 echo "<script>alert('修改成功！');location='".URL('mgr/adpublish.articlelist&statue=0&lmid='.$lmid)."';</script>";
				 exit;
			  }else{
				 echo "<script>alert('操作失败，请重试！');location='".URL('mgr/adpublish.articlelist&statue=0&lmid='.$lmid)."';</script>";
				 exit;  
			}
	}
		
		//------------------------
		function getIP() { 
		if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) 
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
		else if (@$_SERVER["HTTP_CLIENT_IP"]) 
		$ip = $_SERVER["HTTP_CLIENT_IP"]; 
		else if (@$_SERVER["REMOTE_ADDR"]) 
		$ip = $_SERVER["REMOTE_ADDR"]; 
		else if (@getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if (@getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
		else if (@getenv("REMOTE_ADDR")) 
		$ip = getenv("REMOTE_ADDR"); 
		else 
		$ip = "Unknown"; 
		return $ip; 
		}
		
		//*************************修改文章读取列表************************
		function modify($id){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD);
		 $tableclass=$db->getTable(T_AD_CLASS);
		 $sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.aid=".$id;
		 $rss=$db->getRow($sql);
		 return $rss;
			
		}

		//**********************文章列表(搜索，列表，回收站全用这一个)***************************
		function articlelist($lmid=''){
		 include_once('page.php');
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD);
		 $tableclass=$db->getTable(T_AD_CLASS);
		 
			 $lmid=V('r:lmid');
			 $statue=V('r:statue');
			 if($statue=='') $statue=0;
			 
			 $serch1=V('r:serch1');
			 $detail=V('r:detail');
			 $serch2=V('r:serch2');
			 $classfy=V('r:classfy');
			 
			 $field1="";
			 if($serch1=='0'){
				$field1=""; 
			 }else if($serch1=='title' && $detail!=""){
				 $field1="title like '%".$detail."%'"; 
			 }else if($serch1=='aid' && $detail!=""){
				 $field1="aid='".$detail."'";
			 }
			 
			 $field2="";
			 if($serch2!=0)
			 	$field2="types=".$serch2;
			
			 
			$field3="";
			if($classfy=='0' || $classfy=='')
				$field3="";
			else{//echo 'aaaaaa';exit;
			  $a=$this->above_classid($tableclass, $classfy);
			  $field3="classid in (".$a.")";
			}
			 
			 $sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='".$statue."' ";
			 $sqlcount="select count(*) from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='".$statue."' ";
			 
			 if($field1!=""){
				$sql.=" and a.".$field1;
				$sqlcount.=" and a.".$field1;
			 }
			 if($field2!=""){
				$sql.=" and a.".$field2;	
				$sqlcount.=" and a.".$field2;	
			 }
			 if($field3!=""){
				$sql.=" and a.".$field3;	
				$sqlcount.=" and a.".$field3;	
			 }

			 if($lmid){
				$classid=$this->above_classid($tableclass, $lmid); 
				$sql.=" and a.classid in (".$classid.")";
				$sqlcount.=" and a.classid in (".$classid.")";
			 }
			 
			
			 $sql.=" order by sort=0,sort, posttime desc";
			 //$sqlcount.=" order by posttime desc";
			 
			 $page = (int)V('r:page', 1);//当前页数
			$perpage=20;//每页显示数
			$offset = ($page-1) * $perpage;
			
			$sql.=" limit ".$offset.",".$perpage;
			
			$aa=$db->query($sql);
			$count = $db->getOne($sqlcount);
			
			$pager = APP :: N('pager');
			$page_param = array('currentPage'=> $page, 'pageSize' => $perpage, 'recordCount' => $count, 'linkNumber' => 10);
			$pager->setParam($page_param);
			
			$key=$keys = array('lmid','serch1','detail','serch2','classfy');
			$data = array();
			foreach ($keys as $key) {
				$_temp = strval(V('r:'. $key));
				$data[$key] = $_temp;
			}
			$data['statue']=$statue;
			$pager->setVarExtends($data);
		
			$aa['page']=$pager->makePage();
        
        return $aa;	
		}
		
		//********************批量审核********************
		function reviewall($id){
			$db = APP :: ADP('db');
		   $table=$db->getTable(T_AD);
			$sql="update ".$table." set isreview=1,reviewtime=now() where aid in (".$id.")";
		   return $db->execute($sql);
			}
			
		//***********************批量将文章设为删除状态**********************
		function delall($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="update ".$table." set statue=1 where aid in (".$id.")";
			return $db->execute($sql);
		}
		
		//************************已审*************************** 
	function yishen($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
		$sql="update ".$table." set isreview=0,reviewtime='' where aid=".$id."";
	    return $db->execute($sql);
	   

    }
	//************************未审***************************
	function weishen($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
		$sql="update ".$table." set isreview=1,reviewtime=now() where aid=".$id."";
	    return $db->execute($sql);
	   
	}
		
			//**************************解除推荐************************* 
	function xietui($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
	   
	   $sql="update ".$table." set levels=0 where aid=".$id."";
	   return $db->execute($sql);
	  
	}
	//**************************设为推荐*************************
	function tuijian($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
	  
	   $sql="update ".$table." set levels=1 where aid=".$id."";
	   return $db->execute($sql);
	  
	}
	//**************************解除置顶 *************************
	function xieding($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
	   
	   $sql="update ".$table." set ontop=0 where aid=".$id."";
	   return $db->execute($sql);
	  
	}
	//**************************设为置顶*************************
	function zhiding($id){
		$db = APP :: ADP('db');
	   $table=$db->getTable(T_AD);
	   
	   $sql="update ".$table." set ontop=1 where aid=".$id."";
	   return $db->execute($sql);
	   
	}
	
	//**********************将文章设为删除状态*************************
	function tmpdel($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="update ".$table." set statue=1 where aid in (".$id.")";
			return $db->execute($sql);
			
		}
		
		
/*	//*****************************回收站列表******************************
	function recycle_articlelist($cid=''){
		 include_once('page.php');
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD);
		 $tableclass=$db->getTable(T_AD_CLASS);
		 
		 if($cid!=''){
			 	$classid=$this->above_classid($tableclass, $cid);
				$sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' and a.classid in (".$classid.") order by posttime desc";
		        $sqlcount="select count(*) from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' and a.classid in (".$classid.") order by posttime desc";
		 }else{
			 $sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' order by posttime desc";
		     $sqlcount="select count(*) from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' order by posttime desc";
		 }
		 
		 //$sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' order by posttime desc";
		 //$sqlcount="select count(*) from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='1' order by posttime desc";
		 
		 $count_row = $db->getOne($sqlcount);
         $list_info = array('total' => $count_row,'perpage' => 15);
         $page=new page($list_info);
         $row['page'] = $page->show(2);

		$num = list_page(15);
        $sql.=" limit $num,15";

        $aa=$db->query($sql);
        $aa['page']=$row['page'];	
        return $aa;	
		
		}*/
		
		//**********************回收站还原*********************
		function restore($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="update ".$table." set statue=0 where aid in (".$id.")";
			return $db->execute($sql);
			
		}
		
		//************************回收站彻底删除**************************
		function del($id){
				$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="delete from ".$table." where aid in (".$id.")";
			return $db->execute($sql);
			
		}
		
		//************************批量还原****************************
		function restoreAll($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="update ".$table." set statue=0 where aid in (".$id.")";
			return $db->execute($sql);
		}
		
		//*************************批量彻底删除***************************
		function remove($id){
			$db = APP :: ADP('db');
		    $table=$db->getTable(T_AD);
			$sql="delete from ".$table." where aid in (".$id.")";
			return $db->execute($sql);
	    }
		
		
	/*	//*************************文章列表页搜索*******************************
		function serch(){
			include_once('page.php');
			 $db = APP :: ADP('db');
			 $table=$db->getTable(T_AD);
			 $tableclass=$db->getTable(T_AD_CLASS);
	
			 $lmid=V('r:lmid');
			 $statue=V('r:statue');
			 
			 $serch1=V('r:serch1');
			 $detail=V('r:detail');
			 $serch2=V('r:serch2');
			 $classfy=V('r:classfy');
			 
			 $field1="";
			 if($serch1=='0'){
				$field1=""; 
			 }else if($serch1=='title' && $detail!=""){
				 $field1="title like '%".$detail."%'"; 
			 }else if($serch1=='aid' && $detail!=""){
				 $field1="aid='".$detail."'";
			 }
			 
			 $field2="";
			 switch($serch2){
				case '0':
					$field2="";
					break;
				case 'isreview0':
					$field2="isreview=0";
					break;
				case 'isreview1':
					$field2="isreview=1";
					break;
				case 'levels0':
					$field2="levels=0";
					break;
				case 'levels1':
					$field2="levels=1";
					break;
				case 'ontop0':
					$field2="ontop=0";
					break;
				case 'ontop1':
					$field2="ontop=1";
					break;			
			}
			
			$field3="";
			if($classfy=='0')
				$field3="";
			else{
			  $a=$this->above_classid($tableclass, $classfy);
			  $field3="classid in (".$a.")";
			}
			 
			 

			 
			 $sql="select a.*,c.classname from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='".$statue."' ";
			 $sqlcount="select count(*) from ".$table." a inner join ".$tableclass." c on a.classid=c.classid where a.statue='".$statue."' ";
			 
			 if($field1!=""){
				$sql.="and a.".$field1;
				$sqlcount.="and a.".$field1;
			 }
			 if($field2!=""){
				$sql.="and a.".$field2;	
				$sqlcount.="and a.".$field2;	
			 }
			 if($field3!=""){
				$sql.="and a.".$field3;	
				$sqlcount.="and a.".$field3;	
			 }
			 
			 if($lmid){
				$classid=$this->above_classid($tableclass, $lmid); 
				$sql.="and a.classid in (".$classid.")";
				$sqlcount.="and a.classid in (".$classid.")";
			 }
			 
			 $sql.=" order by posttime desc";
			 $sqlcount.=" order by posttime desc";
			 
			 $count_row = $db->getOne($sqlcount);
			 $list_info = array('total' => $count_row,'perpage' => 15);
			 $page=new page($list_info);
			 $row['page'] = $page->show(2);
	
			$num = list_page(15);
			$sql.=" limit $num,15";
	
			$aa=$db->query($sql);
			$aa['page']=$row['page'];
			return $aa;	
			
		}*/
		//---------------------------------------------------
		function _sub_above_class($table, $classid) {
			$cid = '';
			$query = mysql_query ( "select classid from " . $table . " where parentid='" . $classid . "' and statue=0" ) or die ( "select parentid from " . $table . " where classid='" . $classid . "' and statue=0 order by classid desc" . "错误" . mysql_error () );
	
			while ( $row = mysql_fetch_array ( $query ) ) {
				$cid .= "," . $row ["classid"];
				$cid .= $this->_sub_above_class ( $table, $row ["classid"] );
			}
			return $cid;
		}
	
		function above_classid($table, $classid) {
			return $classid . $this->_sub_above_class ( $table, $classid );
		}
		//-------------------------------------------------
		//***************************分类下拉列表框（包含删除状态的分类）****************************
	function read22($currentid=0,$cid=''){
		 $db = APP :: ADP('db');
		 $table=$db->getTable(T_AD_CLASS);
		 $s="&nbsp;|&nbsp;";
	     $t="&nbsp;|-";
		 $option="<option value=0>请选择……</option>";
		 if($cid)
		 	$sql = "select classid,concat(parentpath ,',',classid) as abspath,classname,parentid from ".$table." where  parentpath like '0,".$cid.",%' or classid in (".$cid.") or parentpath='0,".$cid."' order by abspath asc";
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
		 return $option;
		}
}
?>