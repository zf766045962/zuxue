<?php
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class bottom_mod extends action
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
		
		$cid = V('r:cid');
		TPL :: assign('cid',$cid);
		$fid = V('r:fid');
		TPL :: assign('fid',$fid);
		if(empty($fid)){	
			$nlist = DS('publics.page_list','',10,'catid = '.$cid,'inputtime desc',V('r'),'news');
			TPL :: assign('nlist',$nlist['info']);
			TPL :: assign('pagehtml',$nlist['pagehtml']);
		}else{
			$classes	=	DS("publics.get_classid","",$fid,1);
			//var_dump($classes);die;
			$nlist = DS('publics.page_list','',10,'catid in ('.$classes.')','inputtime desc',V('r'),'news');
			//var_dump($nlist);die;
			TPL :: assign('nlist',$nlist['info']);
			TPL :: assign('pagehtml',$nlist['pagehtml']);
		}
		TPL :: display('bottom/foot_link');
	}
	
	function foot_linkCon(){
		
		$cid = V('r:cid');
		TPL :: assign('cid',$cid);
		
		$clist = DS('publics._get','','article_class',' parentid = 7 and classid not in (10,13)');
		TPL :: assign('clist',$clist);
		
		$id = V('r:id');
		TPL :: assign('id',$id);
		if($cid){
			$clist = DS('publics._get','','news',' catid = '.$cid);
			$nlist = DS('publics._get','','news',' id = '.$clist[0]['id'].' order by updatetime desc');
			TPL :: assign('nlist',$nlist[0]);
			//var_dump($nlist);die;
		}else{
			$n_list = DS('publics._get','','news',' id = '.$id);
			//var_dump($n_list);die;
			TPL :: assign('n_list',$n_list);
		}
		
		
		TPL :: display('bottom/foot_linkCon');
	}


/************************************************************************************************/

}
