<?php
class mgr{ 
	
	function getPermByUid($aid){
				$permission=array(
				'all'=>array(
					'app'=>'all',
					'page'=>'all',
					'function'=>'all',
					'allow'=>'1',
				),
				'ask'=>array(
					'list'=>array(
								'func1'=>1,	
								'func2'=>1,	
								'func3'=>0,	
							),
					'add'=>array(
								'func1'=>1,	
								'func2'=>1,	
								'func3'=>0,	
							),
					'del'=>array(
								'*'=>'1',	
							),
					'verify'=>array(
								'*'=>'0',	
							),
				),
				'blog'=>array(
					'*'=>array(
								'*'=>'1'
					),
				),
				'mgr'=>array(
					'role'=>array(
						'*'=>1,
					)
				
				)
			);
			
			$permission_json=json_encode($permission);
			$permission = (array)json_decode($permission_json);
			return RST($permission) ;
			
	
	}
	
	
	
	
	
	
	
	
	//********************信息分类中的系统分类*******************************
	function getclass(){
		$db = APP :: ADP('db');
		$sql="select classname,classurl from icc_class where sys_statue=1 and parentid=0";
		$row=$db->query($sql);

		if($row){
			$aa=array('title' => '系统分类');
		}
		
		foreach($row as $key=>$val) {
			$aa['sub'][$key]=array('title'=>$val['classname'],							   
								   'url'=>array($val['classurl']));
		}
	
		return $aa;		
	
	}
	//********************信息分类中的常用分类*******************************
   function getclass1(){
		$db = APP :: ADP('db');
		$sql="select classname,classurl from icc_class where sys_statue=0 and parentid=0";
		$row=$db->query($sql);

		if($row){
			$aa=array('title' => '常用分类');
		}
		
		foreach($row as $key=>$val) {
			$aa['sub'][$key]=array('title'=>$val['classname'],							   
								   'url'=>array($val['classurl']));
		}
	
		return $aa;		
	}
	
	
}
?>