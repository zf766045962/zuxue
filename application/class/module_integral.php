<?php
header("content-type:text/html;charset=utf-8");
require_once('../vi_db_lib/cdbex.class.php');
require_once('../vi_db_lib/conf/dbconf.php');
require_once('../vi_db_lib/fdbtarget.php');
//积分类
//liuyongwei 9.29

class integral_class{
	function __construct()
	{
	
		global $dbServs;
		$this->dbServs = $dbServs;			
		//打开数据库
		dbtarget('w',$dbServs);
		$dbo = new dbex;
		$this->dbo=$dbo;
		$this->t_intergral='ec_integral';
		$this->t_users="ec_user_base_info";
	}
	
	//根据英文名 获取积分值
	function get_integral_by_name($intergral_name){
			$sql="select integral_value from ".$this->t_intergral." where integral_english='".$intergral_name."'";
			$rs=$this->dbo->getRs($sql);
			if(empty($rs)){
			//echo '没有找到积分规则';
				return 0;
			}
			else{
				return $rs[0]['integral_value'];
			}
	}
	
	//  根据积分规则和用户id，用户积分增加
	//	暂未做刷新设置
	//	积分成功后，暂未做ajax的提示 tips
	//	测试：increase_integral('889537e0-c185-11e0-b562-bc305bac52ad','three_integral');
		
		function increase_integral($user_uuid='',$intergral_name){
		//判断session中有无user_uuid赋值
			$sess_user_uuid=isset($_SESSION["isns_user_uuid"])?$_SESSION["isns_user_uuid"]:0;
		//如果参数为空，那么uuid默认为本人
			$user_uuid=($user_uuid=='')?$sess_user_uuid:$user_uuid;
			
			
			$integral=intval($this->get_integral_by_name($intergral_name));
			$sql="update ".$this->t_users." set integral = integral + $integral where user_uuid='$user_uuid'";
			
			if($this->dbo->exeUpdate($sql)){
				// '更新积分成功<br>';
				//将新的积分值赋值给session
				$integral=isset($_SESSION["User_integral"])?(intval($_SESSION["User_integral"])+$integral):$this->get_integral($user_uuid);	
			}
		else{
			echo '没有执行';
		}
	}
	

	//根据user uuid获取用户积分
	function get_integral($user_uuid=''){

		
		//判断session中有无user_uuid赋值
			$sess_user_uuid=isset($_SESSION["isns_user_uuid"])?$_SESSION["isns_user_uuid"]:0;
		//如果参数为空，那么uuid默认为本人
		$user_uuid=($user_uuid=='')?$sess_user_uuid:$user_uuid;
		//第一次读取，一般没有设置session，要先进行积分session设置，
		//第二次读取，直接读取session即可
		$integral=isset($_SESSION["User_integral"])?intval($_SESSION["User_integral"]):0;	
		//如果session里没有设置积分
		if(!isset($_SESSION["User_integral"])){

			$sql="select  integral  from ".$this->t_users." where user_uuid='$user_uuid'";
			$rs=$this->dbo->getRs($sql);
			if(empty($rs)){
				$_SESSION["User_integral"]= 0;
				$integral=0;
			}
			else{ 
				$_SESSION["User_integral"]= $rs[0]['integral'];
				$integral=$rs[0]['integral'];
			}
		}
		
		return $integral;
	}
	
	//测试用显示函数
	function test(){	

		$_SESSION["isns_user_uuid"]='889537e0-c185-11e0-b562-bc305bac52ad';
		
		//dbtarget('w',$this->dbServs);
		//$dbo = new dbex;
		//$sql="select  integral  from ec_user_base_info where user_uuid='889537e0-c185-11e0-b562-bc305bac52ad'";
		//$rs=$dbo->getRs($sql);
	//	echo $rs[0]['integral'];
	}	
	
	//积分log，一般采用调用外部log类
	function log_integral()
	{
		return true;
	}
	
}


	$myinfo=new integral_class;
	myinfo->test();
	$myinfo->increase_integral('','three_integral');
	echo $myinfo->get_integral('');
	
?>