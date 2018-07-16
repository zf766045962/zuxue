<?php

/**************************************************
*  Created:  	2013-03-06
*  LastUpdate:  2014-07-24
*  方法
*
*  @CCGM (C)2013 - 2014 Nit Inc.
*  @Author 陈壹宁<446135184@qq.com>
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class member2{
	
	var $childid;
	
	function get_present_category($catid){
		$db 	 = APP :: ADP('db');
		static 	 $arr=array();
		$sql 	 = "select linkageid,name,parentid from ".$db->getTable(T_LINKAGE)." where keyid = 23 and  linkageid=".$catid;
		$data 	 = $db->getRow($sql);
		$arr[]	 = $data;
		 
		if($data['parentid']!=0){
			$sql2 	= "select linkageid,name,parentid from ".$db->getTable(T_LINKAGE)." where keyid = 23 and linkageid=".$data['parentid'];
			$data2  = $db->getRow($sql2);
			$arr[]	 = $data2;		
			if($data2['parentid']!=0){
				DS('mgr/member2.get_present_category','',$data2['parentid']);
			}
		}		
		return RST($arr);
	}
	
	function get_specifies_category($catid=0){
		$db 	 = APP :: ADP('db');
		static 	 $array=array();
			
		$sql 	 = "SELECT linkageid,name,parentid,keyid FROM ".$db->getTable(T_LINKAGE)." WHERE keyid = 23 and parentid in(".$catid.")";	
		//echo $sql;
		$array   = $db->query($sql);
		if(isset($array)){
			return RST($array);
		}
		
	}
	
	//清空表
	function truncate($table){
		$db = APP :: ADP('db');
		$re = $db->truncate($table);
		return RST($re);
	}
	//保存(支持任何)
	function _save($data,$table){
		$db = APP :: ADP('db');
		$re = $db->save($data,'',$table,'');
		return RST($re);
	}
	//更新(支持任何)
	function _update($data,$table,$field,$val){
		$db = APP :: ADP('db');
		$re = $db->save($data,$val,$table,$field);
		//echo $db->getLastQuery();
		return RST($re);
	}
	//替换(支持任何)
	function _replace($data,$table){
		$db = APP :: ADP('db');
		$re = $db->replace($data,$table);
		return RST($re);
	}
	//获取(支持任何)
	function _get($table,$where=''){
		$db = APP :: ADP('db');
		if($where == ''){
			$where = ' 1=1 ';
		}
		$sql='select * from '.$db->getTable($table).' where '.$where;
		//echo $sql;
		$re = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($re);
	}
	//删除(支持任何)
	function _del($table,$where){
		$db = APP :: ADP('db');
		$sql='delete from '.$db->getTable($table).' where '.$where;
		$re = $db->execute($sql);
		return RST($re);
	}
	//获取总记录数(支持任何)
	function get_total($table,$where = ''){
		$db = APP :: ADP('db');
		$sql = "select count(*) as num from ".$db->getTable($table);
		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);		
		return RST($num);
	}
	//获取信息(支持任何)
	function get_info($table,$where='',$order='',$limit='',$item='*'){
		$db = APP :: ADP('db');
		$table = $db->getTable($table);
		$sql = 'select '.$item.' from '.$table;
		if($where != ''){
			$sql .= ' where '.$where;
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
		//echo $sql;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	//分页 + 获取数据(支持任何)
	/*
		***  $pagesize 每页显示数据条数 (默认每页显示1条)
 		***  $where 获取总记录条数时需要的sql条件 (默认为空,全表数量)
		***  $order 获取数据时需要排序的字段 (默认asc,更改直接加desc)
		***  $getData 分页带的参数数组 可以是 V('p') V('g') V('r')
		***  return 返回分页html + 数据的数组 (格式 : array('info'=>array(...),'pagehtml'=>''); )
	*/
	function page_list($pagesize=1,$where='',$order,$getData,$table){
		extract($getData);
		$pagesize 	= empty($pagesize) ? 1 : $pagesize;
		$total 		= DS('mgr/member2.get_total','',$table,$where);
		if(isset($page)){
			$offset = ($page-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		$result['info'] = DS('mgr/member2.get_info','',$table,$where,$order,$limit);
		unset($getData["page"]);
		$param 	= http_build_query($getData);
		$url 	= "?".$param."&page={page}";
		//$page 	= new RewritePage($total,$pagesize,$page,$url);
		$page = APP :: N('RewritePage',$total,$pagesize,V('g:page'),$url);
		$result['pagehtml'] = $page -> myde_write();
		return RST($result);
	}
	
	//瀑布流获取数据
	function pinterest_list($pagesize=1,$where='',$order,$page=1,$table){
		$pagesize 	= empty($pagesize) ? 1 : $pagesize;
		$total 		= DS('mgr/member2.get_total','',$table,$where);
		if(isset($page)){
			$offset = ($page-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit 	= "$offset,$pagesize";
		$result = array();
		if($total >= $offset){
			$result = DS('mgr/member2.get_info','',$table,$where,$order,$limit);
		}
		return RST($result);
	}
	
	//广告位
	function get_ad($val ,$key = 'id', $order = ''){
		$db = APP :: ADP('db');
		if($order == ''){
			$order = 'top desc,recommend desc,lmorder asc';
		}
		$sql = "select * from ".$db->getTable(T_AD)." where audit = 1 and ".$key." in (".$val.") order by ".$order;
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	//友情链接
	function links($cid){
		$db = APP :: ADP('db');
		$sql = "select * from ".$db->getTable(T_LINK)." where classid = ".$cid." order by lmorder asc,times";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}

	//发送邮件
	function send_email($server,$email,$psw,$data){
		$mailer = APP::N('mailer');
		$mailer->_new($server,$email,$psw);
		$re = $mailer->send($email,$data["username"],$data["subject"],$data["content"]);
		return RST($re);
	}

	//获取classid  (返回值为 1,2,3 格式字符串)
	function get_classid($parentid,$flag = 1){
		
		$db = APP :: ADP('db');
		$sql = "select classid from ".$db->getTable(T_ARTICLE_CLASS)." where parentid in (".$parentid.")";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		foreach($data as $k=>$v){
			if($flag)
				$re .= $v["classid"].',';
			else
				$re[] = $v["classid"];
		}
		if($flag)
			$re = substr($re,0,-1);
		return RST($re);
	}

	//获取列表
	function get_list($parentid = 0){

		$db = APP :: ADP('db');
		
		$sql = "select * from ".$db->getTable(T_ARTICLE_CLASS)." where parentid = ".$parentid." order by lmorder;";
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}

	//获取一条信息
	function get_message($id = 0,$field = 'id',$table = 'news'){
		$db = APP :: ADP('db');
		if($id != 0){
			$data = $db->get($id,$table,$field);
		}
		return RST($data);
	}
	

	//获取信息 (通用 , 常用)
	function get_messages($f_val = '',$field = 'id',$order = '',$limit = ''){

		$db = APP :: ADP('db');
		$field = empty($field)?'id':$field;
		$sql = "select * from ".$db->getTable(T_NEWS);
		if($f_val != ''){
			$sql .= " where ".$field." in (".$f_val.")";
		}
		if($order != ''){
			$sql .= ' order by '.$order;
		}
		if(is_numeric($limit) || $limit != ''){
			$sql .= ' limit '.$limit;
		}
//echo $sql;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);

		return RST($data);
	}

	//分页 + 获取数据 (旧版)
	/*
		***  $pagesize 每页显示数据条数 (默认每页显示1条)
 		***  $where 获取总记录条数时需要的sql条件 (默认为空,全表数量)
		***  $field 获取数据时的条件字段 (默认为ID)
		***  $f_val 获取数据时条件字段值
		***  $order 获取数据时需要排序的字段 (默认asc,更改直接加desc)
		***  $getData  记录数据  (参数固定为 $_GET 或者 V('g'))
		***  return 返回分页html + 数据的数组 (格式 : array('info'=>array(...),'pagehtml'=>''); )
	*/
	function page_list_html($pagesize = 1,$where = '',$f_val = '',$field = 'id',$order,$getData){
		
		$field = empty($field)?'id':$field;
		$pagesize = empty($pagesize)?1:$pagesize;
		//echo $where;
		$total = DS('member2.total','',$where);
		//echo $total;

		if(isset($_GET['page'])){

			$offset = (V('g:page')-1) * $pagesize;

		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		//echo $limit;
		
		$result['info'] = DS('member2.get_messages','',$f_val,$field,$order,$limit);

		$m = $getData["m"]; 
		unset($getData["m"]); 
		$param = ''; 
		foreach($getData as $k=>$v){
			$param .= '&'.$k.'='.$v;
		} 
		$url = "?m=".$m.$param."&page={page}";
		//echo $url;die;
		
		$page = APP :: N('RewritePage',$total,$pagesize,V('g:page'),$url);

		$result['pagehtml'] = $page -> myde_write();

		return RST($result);
	}

	//获取总记录数
	function total($where = ''){

		$db = APP :: ADP('db');
		
		$sql = "select count(*) as num from ".$db->getTable(T_NEWS);

		if($where != ''){
			$sql .= " where ".$where;
		}
		$num = $db->getOne($sql);

		return RST($num);
	}

	//根据条件 unset 数组中数据
	function unset_arr($arr,$key = "id",$val,$flag = 0){

		if($key == "")
			$key = "id";

		foreach($arr as $k=>$v){

			if($v[$key] == $val){
				
				if($flag){
					unset($arr[$k]);
				}else{
					return RST($arr[$k]);
				}
		
			}
		}
		return RST($arr);
	}

	//匹配出img标签 src属性值
	function img_src($str){
		$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$str,$match);
		return RST($match[1]);
	}

	//取出 a href 路径
	function file_src($str){
		$pattern = '/href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/';
		preg_match_all($pattern,$str,$match);
		return RST($match[1]);
	}

	//搜索产品
	function search_index($id,$value){

		$db = APP :: ADP('db');
		
		$sql = "select * from ".$db->getTable(T_NEWS)." where catid = '".$id."'";

		if($value != ''){
			$sql .= " and (title like '%".$value."%' or keywords like '%".$value."%') ";
		}

		$sql .= "order by updatetime desc";
//echo $sql;
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);

		if(empty($data)){
			$data = "<p style='font-size:14px; text-align:center; margin-top:50px;'><b>暂无相关信息!</b><p>";
		}
		return RST($data);
	
	}
	
	//内容搜索
	function search($value = '',$id,$order = ''){

		$db = APP :: ADP('db');

		$catid = DS('member2.last_childid','',$id);

		if($value != ''){
			$sql = "select * from ".$db->getTable(T_NEWS)." where ";

			$where = "catid in (".$catid.") and (keywords like '%".$value."%' or title like '%".$value."%' or content like '%".$value."%')";

			$sql .= $where;
		}
		if($order != '')
			$sql .= " order by ontop desc,isreview desc,".$order;
		else
			$sql .= " order by ontop desc,isreview desc;";
//echo $sql;
		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);

		if(empty($data)){
			$data = "<div style='line-height:24px; font-size:12px; color:#666; font-family:'微软雅黑';'><b style='color:#333; font-size:14px;'>你搜索的'<span style='color:#e55d07;'>".$value."</span>'没有与此相关内容.</b><br />建议:<br />请确保所有文字都拼写正确.<br />尝试使用新的关键字.<br/>尝试使用更常用的关键字.</div>";
		}else{
			$data["num"] = DS('member2.total','',$where);

			foreach($data as $key=>$val){
				if(is_array($val)){
					$info = DS('member2.get_message','',$val["catid"],'classid','article_class');
					$url = DS('member2.get_field_val','','classurl',$info["parentpath"].','.$info["classid"]);
					foreach($url as $u)
						$data[$key]["url"][] = $u;
				}
			}

		}
		return RST($data);
	}

	//附件图片路径
	function img_src2($str){

		$pattern="/<[a|A].*?href=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";

		preg_match_all($pattern,$str,$match);

		return RST($match[1]);
	}

	//取网站信息
	function get_index($val){
		$db = APP :: ADP('db');

		$sql = "select value from ".$db->getTable(T_SYS_CONFIG)." where `key` = '".$val."'";

		$data = $db->query($sql, $fetch_mode = MYSQL_ASSOC);

		return RST($data);
	}

	//文件大小格式化
	function format_bytes($url) {

		$url = WEBSITE_URL.$url;
		$size = filesize($url);
		$units = array(' B', ' KB', ' MB', ' GB', ' TB');
		for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
		$re = round($size, 2).$units[$i];
		return RST($re);
	}
	
	//去除img  或者  html标签
	function del_img($val,$flag = 0){
		$str = preg_replace("/<[img|IMG].+?\/>/", "", $val);
		if($flag)
			$str = strip_tags($str);
		$str = preg_replace("/<p><\/p>/", "", $str);
		return RST($str);
	}

	//去除a  或者  html标签
	function del_a($val,$flag = 0){
		$str = preg_replace("/<[a|A] href[^>]*>.*a>/", "", $val);
		if($flag)
			$re = strip_tags($str);
		return RST($str);
	}

	//获取最终子类id
	function last_childid($id,$flag=1){
		if($flag)
			$this->childid = '';

		$info = DS('member2.get_messages2','',$id,'parentid','','');
		foreach($info as $val){
			
			if($val["child"] != 0)
				DS('member2.last_childid','',$val["classid"],0);
			
			if($val["child"] == 0)
				$this->childid .= $val["classid"].",";

		}
		$str = substr($this->childid,0,-1);
		return RST($str);
	}

	//读取xls文件 ,返回数组
	function read_xls($file){

		$data = APP :: N('Spreadsheet_Excel_Reader');

		$data->setOutputEncoding('utf-8');

		$data->read(WEBSITE_URL.$file);

		error_reporting(E_ALL ^ E_NOTICE);

		$data = $data->sheets[0]["cells"];

		return RST($data);
	}
	
	//获取IP地址
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
		return RST($ip);
	}

//F('u8_title_substr',str_replace('&nbsp;',' ',strip_tags($news_v["content"])),160);   内容截取

/***************************************************************************/


	/**
	* 将字符串转换为数组
	*
	* @param    string  $data   字符串
	* @return   array   返回数组格式，如果，data为空，则返回空数组
	*/ 
	function str2arr($data) {
		if($data == '') return array();
		@eval("\$array = $data;");  
		return $array;  
	}
	/**
	* 将数组转换为字符串
	*
	* @param    array   $data       数组
	* @param    bool    $isformdata 如果为0，则不使用new_stripslashes处理，可选参数，默认为1
	* @return   string  返回字符串，如果，data为空，则返回空
	*/ 
	function arr2str($data, $isformdata = 1) { 
		if($data == '') return '';  
		if($isformdata) $data = new_stripslashes($data);  
		return addslashes(var_export($data, TRUE));  
	}

	//复制文件及目录到指定路径
	function xCopy($source, $destination, $child){
		if(!is_dir($source)){
			echo("Error:the $source is not a direction!");
			return RST(0);
		}   
		if(!is_dir($destination)){
			mkdir($destination,0777);
		}
		$handle = dir($source);
		while($entry = $handle->read()) {
			if(($entry!=".")&&($entry!="..")){
				if(is_dir($source."/".$entry)){
					if($child)
						$this->xCopy($source."/".$entry,$destination."/".$entry,$child);
				}else{
					copy($source."/".$entry,$destination."/".$entry);
				}
			}
		}
		return RST(1);
	}











}









