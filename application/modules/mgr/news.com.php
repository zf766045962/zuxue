<?php
/**************************************************
*  Created:  2012-3-12
*
*  文件说明
*  author 赵志强
*
***************************************************/
class news
{
	//获取分类列表
	function getclasslist($bid) 
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_NEWSCLASS)." where bid=".$bid." order by lmorder asc";
		$data = $db->query($sql);
		return RST($data);
	}
	
	function getnewslist($bid,$classid,$recommend,$audit,$top,$key,$limits,$pagesize,$flag="list")
	{
		$db 		= APP :: ADP('db');
		$sql 		= "select id,bid,classid,title,times,recommend,audit,top,imgurl,imgurl1 from ".$db->getTable(T_NEWS)." where id>0 ";
		$sql_count 	= "select count(id) as count from ".$db->getTable(T_NEWS)." where id>0 ";
		$sqlstr 	= "";
		if(!empty($bid))
		{
			$sqlstr .= " and bid=".$bid." ";
		}
		if(!empty($classid))
		{
			$sqlstr .= " and classid=".$classid." ";
		}
		if(!empty($recommend))
		{
			$sqlstr .= " and recommend=".$recommend." ";
		}
		if(!empty($audit))
		{
			$sqlstr .= " and audit=".$audit." ";
		}
		if(!empty($top))
		{
			$sqlstr .= " and top=".$top." ";
		}
		if(!empty($key))
		{
			$sqlstr .= " and title like '%".$key."%' ";
		}
		$sql_count .= $sqlstr;
		$sql .= $sqlstr." order by times desc limit ".$limits.",".$pagesize."";
		if($flag == "list")
		{
			$data = $db->query($sql);
		}
		else
		{
			$data = $db->getRow($sql_count);
		}
		return RST($data);
	}
	
	//获取新闻信息
	function getnewsinfo($id)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_NEWS)." where id=".$id."";
		$rs = $db->getRow($sql);
		return RST($rs);
	}
	
	//更新相关属性
	function update($data,$id,$flagtype,$flagvalue)
	{
		$db = APP :: ADP('db');
		$sql = "update ".$db->getTable(T_NEWS)." set ".$flagtype."=".$flagvalue." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	//删除信息
	function delnews($data,$id)
	{
		$db = APP :: ADP('db');
		$sql = "delete from ".$db->getTable(T_NEWS)." where id in (".$id.")";
		$rs = $db->query($sql);
		return RST($rs);
	}
	
	//保存信息
	function savenews($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_NEWS);
		
		$rs = $db->save($data, $id,'',"id");
		return RST($rs);
	}
	
	
	//获取默认分类
	function getclassname($classid,$bid)
	{
		$db = APP :: ADP('db');
		$sql = "select classname,classid from ".$db->getTable(T_NEWSCLASS)." ";
		if(intval($classid)>0)
		{
			$sql .= "where classid=".$classid."";
		}
		else
		{
			$sql .= "where bid=".$bid." limit 0,1";
		}
		return RST($db->getRow($sql));
	}
	//图片
	function img($classid) 
	{
		$db = APP :: ADP('db');
		$sql = "select * from `xsmart_system_nav` where classid=".$classid."";
		
		$data = $db->query($sql);
		
		return RST($data);
	}
	function imgup(){
		
				$db = APP ::ADP("db");
				$classid=V("r:classid");
				$lmit = V('r:lmid');
				
				$http = V('r:http');
				$pic = V('r:urlPic');
				$sql="update `xsmart_system_nav` set pictureurl='".$pic."' where classid='".$classid."'";
				
				$rs=$db->execute($sql);
			
			if ($rs) 
			{
				echo "<script>alert('成功！');'javascript:history.go(-1);';</script>";
			}
			echo  "<script>javascript:history.go(-1);</script>";
		
		

				return $rs;

		}
	function delimg(){
		
				$db = APP ::ADP("db");
				$classid=V("r:classid");
				$lmit = V('r:lmid');
				
				
				
				$sql="update `xsmart_system_nav` set pictureurl='' where classid='".$classid."'";
				
				$rs=$db->execute($sql);
			
			if ($rs) 
			{
				echo "<script>alert('成功！');'javascript:history.go(-1);';</script>";
			}
			echo  "<script>javascript:history.go(-1);</script>";
		
		

				return $rs;

		}
	//友情链接
	function getyouqing() 
	{
		$db = APP :: ADP('db');
		$sql = "select * from `xsmart_link` where id>0";
		
		$data = $db->query($sql);
		
		return RST($data);
	}
	function edityouqing($id) 
	{
		$db = APP :: ADP('db');
		
		$sql = "select * from `xsmart_link` where id='".$id."'";
		
		$data = $db->query($sql);
		
		return RST($data);
	}
	function updateyouqing(){
		
				$db = APP ::ADP("db");
				$id=V("r:id");
				$lmit = V('r:lmid');
				$title = V('r:title');
				$http = V('r:http');
				$pic = V('r:urlPic');
				$sql="update xsmart_link set title='".$title."',urlPic='".$pic."',http='".$http."' where id='".$id."'";
				
				$rs=$db->execute($sql);
			
			if ($rs) 
			{
				echo "<script>alert('成功！');'javascript:history.go(-1);';</script>";
			}
			echo  "<script>javascript:history.go(-1);</script>";
		
		

				return $rs;

		}
	function saveyouqing($data){
			
				$db = APP :: ADP('db');
				$lmit = V('r:lmid');
				$title = V('r:title');
				$http = V('r:http');
				$pic = V('r:urlPic');
				$sql="insert into xsmart_link (`title`,`urlPic`,`http`) values('$title','$pic','$http')";
				
				$rs=$db->execute($sql);
				
			if ($rs) 
			{
				echo "<script>alert('成功！');'javascript:history.go(-1);';</script>";
			}
			echo  "<script>javascript:history.go(-1);</script>";
		
		

			
				return RST($rs);
		}
		
	function delyouqing($id)
	{
		$db = APP :: ADP('db');
		@$sql = "delete from `xsmart_link` where id=".$id."";
		$rs = $db->query($sql);
		return RST($rs);
	}

	
	//获取分类信息
	function getinfo($id)
	{
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_NEWSCLASS)." where classid=".$id."";
		$data = $db->getRow($sql);
		return RST($data);
	}
	//保存分类信息
	function saveclass($data,$id = '')
	{
		$db = APP :: ADP('db');
		$db->setTable(T_NEWSCLASS);
		$rs = $db->save($data, $id,'',"classid");
		return RST($rs);
	}
	
	//删除分类信息
	function delclass($id)
	{
		$db = APP :: ADP('db');
		$db->setTable(T_NEWSCLASS);
		return RST($db -> delete($id, '', 'classid'));
	}

}
?>
