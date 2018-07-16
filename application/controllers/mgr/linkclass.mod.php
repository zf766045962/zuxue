<?php
include('action.abs.php');

class linkclass_mod extends action{

	//********************友情连接分类列表***********************
	function classlist(){
		//$rss=DR('mgr/linkclass.selectclass');//默认排序
		
		$lmid=V('r:lmid');
		if($lmid)
			$rss=DR('mgr/linkclass.get_sort','',$lmid);//按排序顺序排序//参数一：分类id，默认全部
		else
			$rss=DR('mgr/linkclass.get_sort');

		TPL :: assign('lmid',$lmid);	
		TPL :: assign('rss',$rss);
		$this->_display('link/classlist');
	}

	//***********************删除友情连接分类***********************
	function del(){
		$id=V('r:id');
		DR('mgr/linkclass.delclass','',$id);
	}
	
	//*******************将友情连接分类设为删除状态************************
	function tmpdel(){
		$id=V('r:id');
		DR('mgr/linkclass.tmpdelclass','',$id);
		}
	//************************回收站列表******************************
	function recycle(){
		$lmid=V('r:lmid');
		if($lmid)
			$rss=DR('mgr/linkclass.recycle','',$lmid);//按排序顺序排序//参数一：分类id，默认
		else
			$rss=DR('mgr/linkclass.recycle');

		TPL :: assign('lmid',$lmid);
		TPL :: assign('rss',$rss);
		$this->_display('link/recyclelist');
		}

   //************************回收站还原****************************
   function restore(){
	   $id=V('r:id');
		DR('mgr/linkclass.restore','',$id);
	   }

    //***********************修改友情连接分类信息****************************
    function modifyclass(){
		$lmid=V('r:lmid');
    	$id=V('r:id');
		$rss=DR('mgr/linkclass.modifyselect','',$id);
		TPL :: assign('flag','1');
		TPL :: assign('lmid',$lmid);
		TPL :: assign('rss',$rss);
		TPL :: assign('classid',$id);
		$this->_display('link/addclass');
    }

    //***********************修改友情连接分类到数据库*****************************
    function modify_class(){

    	$keys = array('classid','classname','lmorder','readme','keyword','description','uunique','pictureurl','elite','ontop','classurl');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}

		DR('mgr/linkclass.modify_class','',$data);
    }

	//***********************添加友情连接分类****************************
	function addclass(){
		$id=V('r:id');
		$lmid=V('r:lmid');		
		
		if($id){
			$info=DR('mgr/linkclass.read11','',$id,$lmid);//添加友情连接分类的下拉列表框
		}else{
			$info=DR('mgr/linkclass.read11','',0,$lmid);//添加友情连接分类的下拉列表框
		}
		TPL :: assign('lmid',$lmid);
        TPL :: assign('info',$info);
		$this->_display('link/addclass');
	}

	//********************保存友情连接分类到数据库*********************
	function save_class(){
		$keys = array('parentid','classname','lmorder','readme','keyword','description','uunique','pictureurl','elite','ontop','classurl');

		$data = array();
		foreach ($keys as $key) {
			$_temp = strval(V('r:'. $key));

			$data[$key] = $_temp;
		}

		$lmid=V('r:lmid');
		DR('mgr/linkclass.save_class','',$data,$lmid);

	}

	//******************移动分类***********************
	function moveclass(){
		$lmid=V('r:lmid');
		$id=V('r:id');
		$rss=DR('mgr/linkclass.modifyselect','',$id);
		if($lmid)
			$info=DR('mgr/linkclass.read11','',$id,$lmid);//友情连接分类的下拉列表框
		else
			$info=DR('mgr/linkclass.read11','',$id);//友情连接分类的下拉列表框
		TPL :: assign('lmid',$lmid);

		TPL :: assign('rss',$rss);
		TPL :: assign('info',$info);
		TPL :: assign('classid',$id);
		$this->_display('link/moveclass');
	}

	//*********************移动分类保存到数据库**************************
	function move_save_class(){
		$classid=V('r:classid');
		$parentid=V('r:parentid');
		DR('mgr/linkclass.move_save_class','',$classid,$parentid);
		//echo "保存";

	}
	
	//**********************************************
	function upload(){
		include('application/class/upload.class.php');
		$obj=new upload();
		$aa=$obj->do_upload('upfile');
		//$obj->make_thumb($obj->get_path().$aa,$obj->get_path().$aa);//保存成缩略图
		$path=$obj->get_path().$aa;
		$arr=explode('../',$path);
		$path=$arr[1];
		
	    echo "<script language=\"javascript\">parent.form1.pictureurl.value='".$path."';</script>";
		$this->_display('link/upload');
		}
		
	function iframe(){
		$this->_display('link/upload');
		}
		
	//**************************解除推荐************************* 
	function xietui(){
		$id=V('r:id');
		DR('mgr/linkclass.xietui','',$id);
	}
	//**************************设为推荐*************************
	function tuijian(){
		$id=V('r:id');
		DR('mgr/linkclass.tuijian','',$id);
	}
	//**************************解除置顶 *************************
	function xieding(){
		$id=V('r:id');
		DR('mgr/linkclass.xieding','',$id);
	}
	//**************************设为置顶*************************
	function zhiding(){
		$id=V('r:id');
		DR('mgr/linkclass.zhiding','',$id);
	}
	
}
?>