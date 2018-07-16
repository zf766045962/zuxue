<?php
include('action.abs.php');

class infoclass_mod extends action{

//********************信息基本分类列表***********************
	function info(){

		//$rss=DR('mgr/infoclass.selectclass');
		$rss=DR('mgr/infoclass.get_sort');
		TPL :: assign('rss',$rss);
		$this->_display('infoclass/infoclass');
	}

//************************删除分类*****************************
	function del(){
		$id=V('r:id');
		DR('mgr/infoclass.delclass','',$id);
	}

	//************************修改分类**************************
	function modifyclass(){

		$id=V('r:id');
		$rss=DR('mgr/infoclass.modifyselect','',$id);
		TPL :: assign('rss',$rss);
		TPL :: assign('classid',$id);
		$this->_display('infoclass/addclass');

	}

	//********************修改分类信息保存到数据库************************
	function modify_class(){
		$keys=array('classid','classname','uunique','lmorder','readme','sys_statue');
		$data = array();
		foreach ($keys as $key) 
		{
			$_temp = strval(V('r:'. $key));
			$data[$key] = $_temp;
		}
		DR('mgr/infoclass.modify_class','',$data);
	}


//************************添加信息分类****************************
	function addclass(){
		$id=V('r:id');
		if($id)
			  $info=DR('mgr/infoclass.read','',$id);//添加信息分类的下拉列表框
		else
       		 $info=DR('mgr/infoclass.read');//添加信息分类的下拉列表框

        TPL :: assign('info',$info);
		$this->_display('infoclass/addclass');
	}

	//************************添加信息分类保存到数据库*******************************
	function save_class(){
		$keys=array('parentid','classname','uunique','lmorder','readme','sys_statue');
		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;

		}
		DR('mgr/infoclass.save_class','',$data);

	}


	//***************************信息列表11******************************
	function classfylist(){

		$lmid=V('r:id');
		if(empty($lmid)){
			$uunique=V('r:type');
		$rs=DR('mgr/infoclass.getInofclassByName','',$uunique);
		if($rs)		$lmid=$rs['classId'];
		}

		$list=DR('mgr/infoclass.classfylist','',$lmid);

		$lmname=$list['lmname'];
		unset($list['lmname']);

		TPL :: assign('lmid',$lmid);
		TPL :: assign('lmname',$lmname);
		TPL :: assign('list',$list);
		$this->_display('infoclass/classfylist');
	}




	//***********************************详细信息列表*****************************************
	function classfylist1(){

		$lmid=V('r:lmid');
		$classid=V('r:classid');

		$pager = APP :: N('pager');
		$count=DS('mgr/infoclass.classfylist1_count','',$lmid,$classid);
		$page = (int)V('r:page', 1);
		$perpage = (int)V('r:perpage', 10);
		$page_param = array('currentPage'=> $page, 'pageSize' => $perpage, 'recordCount' => $count, 'linkNumber' => 10);
		$pager->setParam($page_param);


		$offset = ($page -1) * $perpage;
		
		$list=DS('mgr/infoclass.classfylist1','',$lmid,$classid,$offset,$perpage);
		
		
		TPL :: assign('lmid',$lmid);
		TPL :: assign('pager', $pager->makePage());
		TPL :: assign('list',$list);
		$this->_display('infoclass/classfylist1');
	}
	
	//***********************修改信息*******************************
	function modifyclassfylist(){
		$lmid=V('r:lmid');
		$classid=V('r:classid');
		$contentid=V('r:contentid');
		
		$info=DR('mgr/infoclass.read11','',$classid,$lmid);
		$list=DR('mgr/infoclass.getone','',$contentid);//取将要修改的信息的内容
		
		TPL :: assign('lmid',$lmid);
		TPL :: assign('info',$info);
		TPL :: assign('list',$list);
		TPL :: assign('classid',$classid);
		TPL :: assign('contentid',$contentid);
		$this->_display('infoclass/addclassfylist');
		}

	//************************添加信息***********************
	function addclassfylist(){
		$pid=V('r:pid');

		//$info=DR('mgr/infoclass.read11','',0,$lmid);
		TPL :: assign('pid',$pid);
		//TPL :: assign('info',$info);
		$this->_display('infoclass/addclassfylist');
	}

	//***********************添加信息到数据库操作******************************
	function save_content(){
		$lmid=V('r:lmid');
		$classid=V('r:parentid');
		$title=V('r:title');

		DR('mgr/infoclass.save_content','',$lmid,$classid,$title);

	}
	//***********************添加信息到数据库操作******************************
	function contentSave(){
	
		$classid=V('r:classid');
		$contentid=V('r:contentid');
		$title=V('r:title');
		
		$rs=DS('mgr/infoclass.getInofclassByClassid','',$classid);
		if($rs['child']>0){
				$msg='您选择的分类不应含有子分类';
				APP::ajaxRst(false, 40003, $msg);
				exit;
		}
		
		$data=array(
			'contentid'=>$contentid,
			'classid'=>$classid,
			'title'=>$title,
		);
		
		$rss=DR('mgr/infoclass.saveContent','',$data);
		if($rss){
				APP::ajaxRst(true);
				exit;
		}

	}
	//***********************修改信息保存到数据库************************************
	function modify_content(){
		DR('mgr/infoclass.modify_content');
	}
	//**********************删除信息****************************
	function del_content(){
		DR('mgr/infoclass.del_content');
	}
	//******************批量彻底删除********************
	function delall(){
		$id=V('r:id');
			$strlens=strlen($id);//获取字符串总长度
			if(substr($id,$strlens-1,1)==','){//去除js里面传过来的字符串最后的逗号
				$id=substr($id,0,$strlens-1);
			}
		$result=DR('mgr/infoclass.delall','',$id);
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
	//********************获取信息的下拉列表框信息************************
	function getinfo(){
		$info=DR('mgr/infoclass.getinfo','','10');
		print_r($info);
	}
	
}

?>