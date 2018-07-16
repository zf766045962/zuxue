<?php
		include  "action.abs.php";
		include  "include/page.class.php";
		#include  "";
class test_mod extends action{

	function default_action(){

		$total = DS('test.total');

		$pagesize  = 3;						//每页显示3条记录

		if(!empty($_GET['page'])){

			$offset = (V('g:page')-1) * $pagesize;		//页面开始记录数

		}else{

			$offset = 0;

		}

		@$info = DS('test.getMes','',$offset);

		$page = new RewritePage($total,3,V('g:page'),'?m=test&page={page}');
		//$page = new RewritePage(1000,5,$_GET['page'],'list-{page}.html');//用于静态或者伪静态


		$html = upLoad::showUpload('img','file_url',1,isset($info["imgurl"])?$info["imgurl"]:'');
		var_dump($html);die;
		


		TPL::assign('pagehtml',$page -> myde_write());

		TPL::assign('info',$info);

		TPL::display('test');

	}
//提交留言
	function subm(){

		#var_dump(V('p'));die;
		
		$res = DS('test.addMes','',V('p'));
		//var_dump($res);die;
		if($res){

			echo F("alert.alertgo","您的留言提交成功，尝试返回上一页！","-1");

		}else{

			echo F("alert.alertgo","您的留言提交失败，尝试返回上一页！","-1");
		}

	}
//删除留言
	function del(){
		$res = DS('test.delMes','',V('g:id'));
		if($res){
			echo F("alert.alerthref","您的留言删除成功!","http://localhost:8001/index.php?m=test");
		}else{
			echo F("alert.alerts","您的留言删除失败!","-1");
		}
	}

//修改留言
	function upd(){

		echo DS('test.updMes','',V('p'))?"修改成功!":"修改失败!";
		
	}
	
}

?>