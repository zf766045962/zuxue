<?php
include('action.abs.php');
class articleclass_mod extends action{

	//********************文章分类列表***********************
	function classlist(){
		//$rss=DR('mgr/articleclass.selectclass');//默认排序
		
		$lmid=V('r:lmid');
		if($lmid)
			$rss=DR('mgr/articleclass.get_sort','',$lmid);//按排序顺序排序//参数一：分类id，默认全部
		else
			$rss=DR('mgr/articleclass.get_sort');

		TPL :: assign('lmid',$lmid);	
		TPL :: assign('rss',$rss);
		$this->_display('article/classlist');
	}

	//***********************删除文章分类***********************
	function del(){
		$id = V('r:id');
		DR('mgr/articleclass.delclass','',$id);
	}
	
	//*******************将文章分类设为删除状态************************
	function tmpdel(){
		$id = V('r:id');
		DR('mgr/articleclass.tmpdelclass','',$id);
	}
	//************************回收站列表******************************
	function recycle(){
		$lmid=V('r:lmid');
		if($lmid)
			$rss=DR('mgr/articleclass.recycle','',$lmid);//按排序顺序排序//参数一：分类id，默认
		else
			$rss=DR('mgr/articleclass.recycle');

		TPL :: assign('lmid',$lmid);
		TPL :: assign('rss',$rss);
		$this->_display('article/recyclelist');
		}

   //************************回收站还原****************************
   function restore(){
	   $id=V('r:id');
		DR('mgr/articleclass.restore','',$id);
	   }

    //***********************修改文章分类信息****************************
    function modifyclass(){
		$lmid=V('r:lmid');
    	$id=V('r:id');
		$rss=DR('mgr/articleclass.modifyselect','',$id);
		TPL :: assign('flag','1');
		TPL :: assign('lmid',$lmid);
		TPL :: assign('rss',$rss);
		TPL :: assign('classid',$id);
		
		//模型列表 $datas = DS('mgr/sitemodelCom.modelList');
		$sitemodel_list=DR('mgr/articleclass.sitemodel_list'); 
		TPL :: assign('sitemodel_list',$sitemodel_list['rst']);
		
		$this->_display('article/addclass');
    }

    //***********************修改文章分类到数据库*****************************
    function modify_class(){

    	$keys = array('classid','classname','lmorder','readme','keyword','description','uunique','pictureurl','elite','ontop','classurl');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}

		DR('mgr/articleclass.modify_class','',$data);
    }

	//***********************添加文章分类****************************
	function addclass(){
		$id=V('r:id');
		$lmid=V('r:lmid');		
		
		if($id){
			$info=DR('mgr/articleclass.read11','',$id,$lmid);//添加文章分类的下拉列表框
		}else{
			$info=DR('mgr/articleclass.read11','',0,$lmid);//添加文章分类的下拉列表框
		}
		TPL :: assign('lmid',$lmid);
        TPL :: assign('info',$info);
		
		//模型列表 $datas = DS('mgr/sitemodelCom.modelList');
		$sitemodel_list=DR('mgr/articleclass.sitemodel_list'); 
		TPL :: assign('sitemodel_list',$sitemodel_list['rst']);
		
		$this->_display('article/addclass');
	}

	//********************保存文章分类到数据库*********************
	function save_class(){
		$keys = array('parentid','modelid','classname','lmorder','readme','keyword','description','uunique','pictureurl','elite','ontop','classurl');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}

		$lmid=V('r:lmid');
		DR('mgr/articleclass.save_class','',$data,$lmid);

	}

	//******************移动分类***********************
	function moveclass(){
		$lmid=V('r:lmid');
		$id=V('r:id');
		$rss=DR('mgr/articleclass.modifyselect','',$id);
		if($lmid)
			$info=DR('mgr/articleclass.read11','',$id,$lmid);//文章分类的下拉列表框
		else
			$info=DR('mgr/articleclass.read11','',$id);//文章分类的下拉列表框
		TPL :: assign('lmid',$lmid);

		TPL :: assign('rss',$rss);
		TPL :: assign('info',$info);
		TPL :: assign('classid',$id);
		$this->_display('article/moveclass');
	}

	//*********************移动分类保存到数据库**************************
	function move_save_class(){
		$classid=V('r:classid');
		$parentid=V('r:parentid');
		DR('mgr/articleclass.move_save_class','',$classid,$parentid);
		//echo "保存";

	}
	
	//**********************************************
	function upload(){
		include('application/class/upload.class.php');
		$obj=new upload();
		$aa=$obj->do_upload('upfile');
		//$obj->make_thumb($obj->get_path().$aa,$obj->get_path().$aa);//生成缩略图
		$path=$obj->get_path().$aa;
		$arr=explode('../',$path);
		$path=$arr[1];
		
	    echo "<script language=\"javascript\">parent.form1.pictureurl.value='".$path."';</script>";
		$this->_display('article/upload');
	}
		
	function iframe(){
		$this->_display('article/upload');
	}
		
	//**************************解除推荐*************************
	function xietui(){
		$id=V('r:id');
		$a = DR('mgr/articleclass.xietui','',$id);
		
		if($a){
			$this->_succ('成功解除推荐', array('classlist'));
		}else{
			$this->_error('操作失败，请重试！', array('classlist'));
		}	
	}
	//**************************设为推荐*************************
	function tuijian(){
		$id=V('r:id');
		$a= DR('mgr/articleclass.tuijian','',$id);
		
		if($a){ 
			$this->_succ('成功设为推荐', array('classlist'));
		}else{
			$this->_error('操作失败，请重试！', array('classlist'));
		}
	}
	//**************************解除置顶 *************************
	function xieding(){
		$id=V('r:id');
		$a = DR('mgr/articleclass.xieding','',$id);
		if($a){ 
			$this->_succ('成功解除置顶', array('classlist'));
		}else{
			$this->_error('操作失败，请重试！', array('classlist'));
		}
	}
	//**************************设为置顶*************************
	function zhiding(){
		$id=V('r:id');
		$a = DR('mgr/articleclass.zhiding','',$id);
		if($a){ 
			$this->_succ('成功设为置顶', array('classlist'));
		}else{
			$this->_error('操作失败，请重试！', array('classlist'));
		}
	}
	
}
?>