<?php
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class bone_mod extends action
{
	//首页
	function footer()
	{
		TPL :: display('index');
	}

	//底部列表
	function foot_link()
	{
		$clist = DS('publics._get','','article_class',' parentid = 7 and classid not in (10,13)');
		TPL :: assign('clist',$clist);
		
		TPL :: display('bottom/foot_link');
	}
	
	function foot_linkCon(){
		
		$cid = V('r:cid');
		TPL :: assign('cid',$cid);
		
		$clist = DS('publics._get','','article_class',' parentid = 7 and classid not in (10,13)');
		TPL :: assign('clist',$clist);
		
		$id = V('r:id');
		//var_dump($cid);
		if($cid){
			$clist = DS('publics._get','','news',' catid = '.$cid);
			$nlist = DS('publics._get','','news',' id = '.$clist[0]['id'].' order by updatetime desc');
			TPL :: assign('nlist',$nlist[0]);
		}else{
			$n_list = DS('publics._get','','news',' id = '.$id);

			TPL :: assign('n_list',$n_list);
		}
		
		TPL :: display('bottom/foot_linkCon');
	}


/************************************************************************************************/

}
