<?php
include('action.abs.php');

class adpublish_mod extends action{

	//********************广告发布***********************
	function add(){
		$lmid=V('r:lmid');
		if($lmid)
			$info=DR('mgr/adpublish.read11','',0,$lmid);//第一个参数是当前选中项，第二个参数是分类id,不传默认所有
		else
			$info=DR('mgr/adpublish.read11');
			
		TPL :: assign('lmid',$lmid);
		TPL :: assign('info',$info);
		$this->_display('ad/articleadd');
	}

	//*************************保存广告信息到数据库***********************
	function save(){
		DR('mgr/adpublish.save');
	}
	//*******************广告列表*******************
	
	function articlelist(){
		$lmid=V('r:lmid');
		$statue=V('r:statue');
		$currentid=V('r:classfy');
		if($statue=='') $statue=0;
		if($currentid=='') $currentid=0;
		if($lmid){
		 	$info=DR('mgr/adpublish.read11','',$currentid,$lmid);		
			$rss=DR('mgr/adpublish.articlelist','',$lmid);//参数是分类id,不传默认所有	
		}else{
			$info=DR('mgr/adpublish.read11','',$currentid);	
			$rss=DR('mgr/adpublish.articlelist');//参数是分类id,不传默认所有
		}
		
		$keys = array('serch1','detail','serch2','classfy');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}
		
		$page=$rss['page'];
		unset($rss['page']);
		TPL :: assign('data',$data);
		TPL :: assign('lmid',$lmid);
		TPL :: assign('rss',$rss);
		TPL :: assign('page',$page);
		TPL :: assign('info',$info);
		if($statue=='0'){
				$this->_display('ad/articlelist');	
			}else{
				$this->_display('ad/recycle_articlelist');
			}
		}
	//******************批量审核******************
	function reviewall(){
		$id=V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		
		$result=DR('mgr/adpublish.reviewall','',$id);
		if($result){//如果成功
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		}
	//*************************批量将广告设为删除状态*****************************
	function delall(){
		$id=V('r:id');
		$strlens=strlen($id);//获取字符串总长度
		if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
			$id=substr($id,0,$strlens-1);
		}
		
		$result=DR('mgr/adpublish.delall','',$id);
		if($result){//如果成功
			$gourl='0';
			$msgstr='操作成功!';
		}else{
			$gourl='-2';
			$msgstr='操作失败!';
		}
		echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
		exit();
		
		}
		
	//************************已审*************************** 
	function yishen(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.yishen','',$id);
		if($a){
		   $this->articlelist();
		}else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
	//************************未审***************************
	function weishen(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.weishen','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
		
	//**************************解除推荐************************* 
	function xietui(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.xietui','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
	//**************************设为推荐*************************
	function tuijian(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.tuijian','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
	//**************************解除置顶 *************************
	function xieding(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.xieding','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
	//**************************设为置顶*************************
	function zhiding(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.zhiding','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
	
	//*******************将广告设为删除状态************************
	function tmpdel(){
		$id=V('r:id');
		$a=DR('mgr/adpublish.tmpdel','',$id);
		if($a)
		   $this->articlelist();
		else{
			echo "<script>alert('操作失败，请重试');</script>";
			$this->articlelist();
		}
	}
		
	//******************修改广告读取列表********************
	function modify(){
		$lmid=V('r:lmid');
		$id=V('r:id');
		$cid=V('r:cid');
		$rss=DR('mgr/adpublish.modify','',$id);
		
		if($lmid)
			$info=DR('mgr/adpublish.read11','',$cid,$lmid);
		else
			$info=DR('mgr/adpublish.read11','',$cid);//第一个参数是当前选中项，第二个参数是分类id,不传默认所有
		TPL :: assign('lmid',$lmid);
		TPL :: assign('info',$info);
		TPL :: assign('rss',$rss);
		TPL :: assign('flag','1');
		$this->_display('ad/articleadd');
	}
	
	//*********************修改广告保存数据库****************************
	function modify_save(){
		DR('mgr/adpublish.modify_save');
		}
		
		//************************回收站列表**********************
		function recycle(){
			$lmid=V('r:lmid');
			if($lmid){
			$info=DR('mgr/adpublish.read11','',0,$lmid);	//分类读取下拉列表框	
			$rss=DR('mgr/adpublish.recycle_articlelist','',$lmid);//参数是分类id,不传默认所
			}else{
				$info=DR('mgr/adpublish.read11');	//分类读取下拉列表框	
				$rss=DR('mgr/adpublish.recycle_articlelist');//参数是分类id,不传默认所
			}
			$page=$rss['page'];
			unset($rss['page']);
			TPL :: assign('lmid',$lmid);
			TPL :: assign('info',$info);
			TPL :: assign('rss',$rss);
			TPL :: assign('page',$page);
			$this->_display('ad/recycle_articlelist');
		}
		
		//**********************回收站还原*********************
		function restore(){
			$id=V('r:id');
			$a=DR('mgr/adpublish.restore','',$id);
			if($a)
		   		$this->articlelist();
			else{
				echo "<script>alert('操作失败，请重试');</script>";
				$this->articlelist();
			}
		}
		
		//************************回收站彻底删除**************************
		function del(){
			$id=V('r:id');
			$a=DR('mgr/adpublish.del','',$id);
			if($a)
		  		 $this->articlelist();
			else{
				echo "<script>alert('操作失败，请重试');</script>";
				$this->articlelist();
			}
		}
		
		//************************批量还原****************************
		function restoreAll(){
			$id=V('r:id');
			$strlens=strlen($id);//获取字符串总长度
			if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
				$id=substr($id,0,$strlens-1);
			}
			
			$result=DR('mgr/adpublish.restoreAll','',$id);
			if($result){//如果成功
				$gourl='0';
				$msgstr='操作成功!';
			}else{
				$gourl='-2';
				$msgstr='操作失败!';
			}
			echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
			exit();
		}
		
		//*************************批量彻底删除***************************
		function remove(){
			$id=V('r:id');
			$strlens=strlen($id);//获取字符串总长度
			if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
				$id=substr($id,0,$strlens-1);
			}

			$result=DR('mgr/adpublish.remove','',$id);
			if($result){//如果成功
				$gourl='0';
				$msgstr='操作成功!';
			}else{
				$gourl='-2';
				$msgstr='操作失败!';
			}
			echo json_encode(array('gourl'=>$gourl, 'msgstr'=>$msgstr));
			exit();
		}
		
		//*************************广告列表页搜索*******************************
		
		function serch(){
			$this->articlelist();
		}
}
?>