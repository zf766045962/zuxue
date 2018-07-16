<?php
/**************************************************
*  Created:  2013-12-16
*
*  EDM 控制器
*
*  @Xsmart (C)2013-2099Inc.
*  @Author @@陈壹宁
*
***************************************************/
include('action.abs.php');
include_once $_SERVER["DOCUMENT_ROOT"]."/application/class/page.class.php";	//引用分页类
class email_mod extends action {
		
/*************
*  tpl显示   *
*************/

	//概况
	function info(){
		TPL :: assign('classlist',$classlist);
		$this->_display('email/info');
	}
	
	//全局设置
	function basic(){
		$db 	= APP :: ADP('db');
		$info 	= $db->get(1,'email_basic','id');
		TPL :: assign('info',$info);
		$this->_display('email/basic');
	}
	
	//smtp列表
	function smtp(){ 
		$db 	= APP :: ADP('db');
		$info 	= $db->query('select * from xsmart_email_smtp');
		TPL :: assign('info',$info);
		$this->_display('email/smtp');
	}
	
	//添加smtp
	function addsmtp(){
		$id = V("g:id",0);
		if($id > 0){
			$db 	= APP :: ADP('db');
			$info	= $db->get($id,'email_smtp','id');
			TPL :: assign('info',$info);
		}
		$this->_display('email/addsmtp');
	}
	
	//邮箱导入
	function import(){
		$class = DS('mgr/email.getclass','');
		TPL :: assign('class',$class);
		$this->_display('email/import');
	}
	
	//邮箱列表
	function E_list(){
		$where = '1=1';
		if(V('g:email','') != ''){
			$where .= " and address like '%".V('g:email')."%'";
		}
		if(V('g:cid',0) != 0){
			$where .= ' and cid = '.V('g:cid');
		}
		
		$pagesize = 100;
		if(isset($_GET['page'])){
			$offset = (V('g:page')-1) * $pagesize;
		}else{
			$offset = 0;
		}
		$limit = "$offset,$pagesize";
		
		$total = DS('mgr/email.total','',$where);
		$result['info'] = DS('mgr/email.get_address','',$where,$limit);

		$m = V('g:m');
		unset($_GET['m']);
		unset($_GET['page']);
		$param = '';
		if(!empty($_GET)){
			foreach($_GET as $k=>$v){
				$param .= '&'.$k.'='.$v;
			}
		}
		$url = "?m=".$m.$param."&page={page}";
		
		$page = new RewritePage($total,$pagesize,V('g:page'),$url);
		$result['pagehtml'] = $page -> myde_write();
		TPL :: assign('result',$result);
		
		$class = DS('mgr/email.getclass','');
		TPL :: assign('class',$class);
		
		$this->_display('email/E_list');
	}
	
	//添加邮箱
	function addemail(){
		$id = V("g:id",0);
		if($id > 0){
			$db 	= APP :: ADP('db');
			$info	= $db->get($id,'email_address','id');
			TPL :: assign('info',$info);
		}
		$class = DS('mgr/email.getclass','');
		TPL :: assign('class',$class);
		$this->_display('email/addemail');
	}
	
	//邮箱分类
	function E_class(){
		$db 	= APP :: ADP('db');
		$info 	= $db->query('select * from xsmart_email_class');
		TPL :: assign('info',$info);
		$this->_display('email/E_class');
	}
	
	//添加邮箱分类
	function addclass(){
		$classid = V("g:classid",0);
		if($classid > 0){
			$db 	= APP :: ADP('db');
			$info	= $db->get($classid,'email_class','classid');
			TPL :: assign('info',$info);
		}
		$this->_display('email/addclass');
	}
	
	//邮箱模板
	function tpl(){
		$db 	= APP :: ADP('db');
		$info 	= $db->query('select * from xsmart_email_tpl');
		TPL :: assign('info',$info);
		$tpl 	= $db->get(1,'email_basic','id');
		TPL :: assign('tplid',$tpl['tplid']);
		$this->_display('email/tpl');
	}
		
	//添加模板
	function addtpl(){
		$id = V("g:id",0);
		$db 	= APP :: ADP('db');
		if($id > 0){
			$info	= $db->get($id,'email_tpl','id');
			TPL :: assign('info',$info);
		}else{
			$num 	= $db->query('select count(*) as num from xsmart_email_tpl');
			TPL :: assign('num',$num[0]['num']+1);
		}
		$this->_display('email/addtpl');
	}
	
	//发送邮件
	function send(){
		$class = DS('mgr/email.getclass','');
		TPL :: assign('class',$class);
		$this->_display('email/send');
	}
	
/*************
*  操作方法   *
*************/

	//ajax 修改属性
	function updAttr(){
		extract($_POST);
		$val 	= substr($type,-1,1);
		$field 	= substr($type,0,-1);
		$rs 	= $field.'='.$val;
		$db 	= APP :: ADP('db');
		$sql	= "update $table set ".$rs." where id=$id";
		echo $db->execute($sql);
	}
	//ajax 选择模板
	function ajaxCheckedTpl(){
		$db 	= APP :: ADP('db');
		$rs 	= $db->save($_POST,1,'email_basic','id');
		echo $rs;
	}
	
	function save_basic(){
		$db 	= APP :: ADP('db');
		$rs 	= $db->save(V('p'),1,'email_basic','id');
		if ($rs) {
			$this->_succ('操作已成功', array('basic'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function save_smtp(){
		extract($_POST);
		$db 	= APP :: ADP('db');
		if(isset($id) && $id != 0){
			$rs = $db->save($_POST,$id,'email_smtp','id');
		}else{
			unset($_POST['id']);
			$rs = $db->save($_POST,'','email_smtp','');
		}
		if ($rs) {
			$this->_succ('操作已成功', array('smtp'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function save_class(){
		extract($_POST);
		$db 	= APP :: ADP('db');
		if(isset($classid) && $classid != 0){
			$rs = $db->save($_POST,$classid,'email_class','classid');
		}else{
			unset($_POST['classid']);
			$rs = $db->save($_POST,'','email_class','');
		}
		if ($rs) {
			$this->_succ('操作已成功', array('E_class'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
		
	}
	
	function save_tpl(){
		extract($_POST);
		$db 	= APP :: ADP('db');
		if(isset($id) && $id != 0){
			$rs = $db->save($_POST,$id,'email_tpl','id');
		}else{
			unset($_POST['id']);
			$rs = $db->save($_POST,'','email_tpl','');
		}
		if ($rs) {
			$this->_succ('操作已成功', array('tpl'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
		
	}
	
	function save_email(){
		extract($_POST);
		$db 	= APP :: ADP('db');
		if(isset($id) && $id != 0){
			$rs = $db->save($_POST,$id,'email_address','id');
		}else{
			unset($_POST['id']);
			$_POST['addtime'] = date('Y-m-d H:i:s');
 			$rs = $db->save($_POST,'','email_address','');
		}
		if ($rs) {
			$this->_succ('操作已成功', array('E_list'));
		}
		$this->_error('操作失败', 'javascript:history.go(-1);');
	}
	
	function delsmtp(){
		$id = V("g:id");
		if(intval($id)){
			$db = APP :: ADP('db');
			$rs = $db->delete($id,'email_smtp','id');
			if ($rs){
				$this->_succ('操作已成功',array('smtp'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}
	
	function delclass(){
		$classid = V("g:classid");
		if(intval($classid)){
			$db = APP :: ADP('db');
			if(V("g:clear",0) == 0){
				$rs = $db->delete($classid,'email_class','classid');
			}
			$rs2 =  $db->delete($classid,'email_address','cid');
			if ($rs || $rs2){
				$this->_succ('操作已成功',array('E_class'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}
	
	function deltpl(){
		$id = V("g:id");
		if(intval($id)){
			$db = APP :: ADP('db');
			$rs = $db->delete($id,'email_tpl','id');
			if ($rs){
				$this->_succ('操作已成功',array('tpl'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}
	
	function delemail(){
		$id = V("g:id",'');
		if($id != ''){
			$db = APP :: ADP('db');
			$rs = $db->execute("delete from xsmart_email_address where id in (".$id.")");
			if ($rs){
				$this->_succ('操作已成功',array('E_list'));
			}
			$this->_error('操作失败', 'javascript:history.go(-1);');
		}
	}
	
	//导入邮箱地址
	function save_import(){
		extract($_POST);
		$str = @file_get_contents('http://'.$_SERVER["HTTP_HOST"].$url);//WEBSITE_URL
		if(preg_match('/200/',$http_response_header[0])){
			$arr = explode('<br />',nl2br($str));
			foreach($arr as $key=>$val){
				if(trim($val) != ''){
					$data .= "(".$cid.",'".trim($val)."',1,'".date('Y-m-d H:i:s')."'),";
				}
			}
			$sql = 'INSERT INTO xsmart_email_address (`cid`,`address`,`is_ok`,`addtime`) VALUES'.$data;
			$db = APP :: ADP('db');
			if($db->execute(substr($sql,0,-1))){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo 2;
		}
	}
	
	//邮件发送
	function mailing(){
		$this->_display('email/mailing');
	}
	
	function a(){
		$this->_display('email/a');
	}
	
	
	
}
