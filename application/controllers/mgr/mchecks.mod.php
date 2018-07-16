<?php
include('action.abs.php');
//include('common/mail.func.php');//邮件发送函数
class mchecks_mod extends action {
	function member_checks() {
		$query = array();	
		$page = (int)V('r:page', 1);
		$rows = (int)V('r:perpage', 20);
		$perpage	= (int)V('r:perpage', 20);//每页显示数量
		if ($page < 1) {
			$page = 1;
		}
		$offset = ($page-1) * $perpage;
		TPL::assign('offset', $offset);
		$data = DS('mgr/mchecks.getList', '', $query, $perpage, $offset);
		$pager = APP :: N('pager');
		$count = DS('mgr/mchecks.getCount', '');
		$page_param = array('currentPage'=> $page, 'pageSize' => $rows, 'recordCount' => $count, 'linkNumber' => 10);
		$pager->setParam($page_param);
		//$pager->setVarExtends($uid);
		TPL :: assign('pager', $pager->makePage());
		TPL::assign('members_arrs', $data);
		$this->_display('members/check');
	}
	
	function del() {
		$id = V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		$result=DR('mgr/mchecks.del', '' , $id);
		if($result){//如果成功删除
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
	}

	function passed(){
		$id     = V('r:id');
		$message=V('r:message');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		$data=array(
			'id'        =>$id,
			'checkinfos'=>$message
		);
		$result=DS('mgr/mchecks.passed','',$data,$id);
		if($result){//如果成功删除
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		}	
	function refused(){
		$id        = V('r:id');
		$message= V('r:message');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		$data=array(
			'id'        =>$id,
			'checkinfos'=>$message
		);
		$result=DS('mgr/mchecks.refused','',$data,$id);
		if($result){//如果成功删除
			//sendmail($toemail, $subject, $message, $from='',$cfg = array(), $sitename='');//发送邮件
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		}	
}
