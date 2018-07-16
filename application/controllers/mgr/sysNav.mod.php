<?php
include('action.abs.php');
class sysNav_mod extends action {
	//添加系统菜单
	function addSysnav() {
		
		$class = DR('mgr/sysNav.getClass','',V('r:id'));
		//$class = DR('mgr/sysNav.getClass');//调出全部分类		
		TPL :: assign('class',$class);
		$this->_display('sysnav/addsysnav');
	}
	
	function saveForm(){
		$keys = array(
			'parentid',
			'classname',
			'lmorder',
			'readme',
			'keyword',
			'description',
			'uunique',
			'classurl',
			'statue',
			'systype'
		);

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}
		if(!isset($lmid))
		{
			$lmid = "";
		}
		$result=DR('mgr/sysNav.saveForm','',$data,$lmid);
	}
	//********************分类列表******************
	function sysClasslist(){
		$lmid=V('r:lmid','');
		if($lmid)
			$rss=DR('mgr/sysNav.get_sort','',$lmid);//按排序顺序排序//参数一：分类id，默认全部
		else
			$rss=DR('mgr/sysNav.get_sort');
		TPL :: assign('lmid',$lmid);	
		TPL :: assign('rss',$rss);
		$this->_display('sysnav/classlist');
	}
	//*******************将系统分类设为删除状态***********
	function tmpdel(){
		$id=V('r:id');
		$rs=DS('mgr/sysNav.getClassByClassId','',$id);
		if(isset($rs)&&!empty($rs)){
			if($rs['child']>0){
			   echo "<script>alert('无法删除，因为该分类下还有子分类');history.back(-1);</script>";
			   exit;
			}
			$q=DS('mgr/sysNav.delclass','',$id);
			
			//var_dump($q);
			if($q){
				DS('mgr/sysNav.changeClassByClassId','',$rs['parentid'],'child=child-1');
			   echo "<script>alert('已经删除');history.back(-1);</script>";
			   exit;
		   }else{
			   echo "<script>alert('操作失败，请重试！');history.back(-1);</script>";
			   exit;
			}

		}
	}
	//***********获取一级菜单****************************
	function getFirst(){
		$first=DS('mgr/sysNav.getFirst','');
	}
	//*************修改分类信息*****************
	function modifysysClass(){
		$id=intval(V('r:id'));
		//$class=DR('mgr/sysNav.getClass','',$id);
		
		$arrs=DS('mgr/sysNav.modifysysClass','',$id);
		$class=DR('mgr/sysNav.getClass','',$arrs[0]['parentid']);
		TPL :: assign('class',$class);
		
		TPL :: assign('arrs',$arrs[0]);
		
		$this->_display('sysnav/modifyInfo');
		
	}
	function saveEditform(){
		$parentid_cur  = V('r:parentid_cur');
		$parentid  = V('r:parentid');
		$classname  = V('r:classname');
		$readme     = V('r:readme');
		$keyword     = V('r:keyword');
		$description= V('r:description');
		$lmorder    = V('r:lmorder');
		$uunique    = V('r:uunique');
		$classid=V('r:classid');
		$classurl=V('r:classurl');
		$statue=V('r:statue');
		$systype=V('r:systype');
		
		$data=array(
			'parentid'  =>$parentid,
			'classname'  =>$classname,
			'readme'     =>$readme,
			'keyword'    =>$keyword,
			'description'=>$description,
			'lmorder'    =>$lmorder,
			'uunique'    =>$uunique,
			'classurl'    =>$classurl,
			'statue'    =>$statue,
			'systype'    =>$systype
		);
		
		if($parentid_cur!=$parentid){
			$parentpath='0';
			$rootid=0;
			$depth=0;
			if($parentid!=0){
				$rs=DS('mgr/sysNav.getClassByClassId','',$parentid);
				$rootid=($rs['rootid']==0)?$parentid:$rs['rootid'];  //如果上级id的rootid是0，就采用上级id
				$depth=($rs['depth'])+1;  //如果上级id的rootid是0，就采用上级id
				$parentpath=$rs['parentpath'].','.$parentid;
			}
			$data['rootid']	= $rootid;
			$data['depth']	= $rootid;
			
				//原parentid 的 child 减少1个
				DS('mgr/sysNav.changeClassByClassId','',$parentid_cur,'child=child-1');
				//新的parentid 的 child 增加1个
				DS('mgr/sysNav.changeClassByClassId','',$parentid,'child=child+1');
				//当前分类的子分类的parentpath也要改
				DS('mgr/sysNav.changeParentpath','',$classid,$parentpath);
				//改变上一个 下一个 id
				
		}
		$result=DS('mgr/sysNav.saveEditform','',$data,$classid);
		
		$this->sysClasslist();
		}

}
