<?php
/**************************************************
*  Created:  	2014-12-04
*  积分方法
*
*  @CCGM (C)2013 - 2014 Nit Inc.
*  @Author 陈壹宁<446135184@qq.com>
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
class integral{
	/**
	* 积分变更
	* 
	* @param int $uid 用户id
	* @param int $integral 用户积分
	* @param int $sourceType 积分类型 
	* @param string $sourceID 相关id 可为空
	* @return boolen
	*/
	function set_integral($uid,$integral,$sourceType,$sourceID = '') 
	{
		$db 	= APP :: ADP("db");
		$sql 	= 'select integralAll from xsmart_integral WHERE uid = '.$uid.' ORDER BY id DESC LIMIT 1';
		$integralAll = $db->getOne($sql);
		$integralAll2 = $integralAll + $integral;
		if($integralAll < 0){
			// 处理积分溢出
			return false;
		}
		$saveArr = array(
			'uid' 			=> $uid,
			'integralAll' 	=> $integralAll2,
			'integral' 		=> $integral,
			'sourceType' 	=> $sourceType,
			'sourceID' 		=> $sourceID,
			'addtime' 		=> time()
		);
		$rs = $db->save($saveArr,'','integral','');
		return RST($rs);
	}
	
	// 获取用户当前的积分
	/*
		$uid 默认取当前登录用户 
	*/
	function get_integral($uid = '')
	{
		$db  = APP :: ADP("db");
		$uid = $uid == '' ? $_SESSION["YLTTX_UID"] : $uid;
		$sql = 'select integralAll from xsmart_integral WHERE uid = '.$uid.' ORDER BY addtime DESC LIMIT 1';
		
		 //var_dump($sql);
		 //exit();
		return RST($db->getOne($sql));
	}
	function get_integral_month($uid = ''){
		//var_dump($uid);die;
		$db  = APP :: ADP("db");
		 $year = date("Y");
		 $month = date("m");
		 $allday = date("t");
		 $strat_time = strtotime($year."-".$month."-1");
		 
		 $sql = 'select sum(integral) from xsmart_integral WHERE addtime>'.$strat_time.' and uid = '.$uid.' and integral>0';
		 
		 //var_dump($sql);exit();
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);


	}
	function get_integral_month_consume($uid = ''){
		 $db  = APP :: ADP("db");
		 $year = date("Y");
		 $month = date("m");
		 $allday = date("t");
		 $strat_time = strtotime($year."-".$month."-1");
		 $sql = 'select sum(integral) from xsmart_integral WHERE addtime>'.$strat_time.' and uid = '.$uid.' and integral<0';
		 //var_dump($sql);exit();
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	function check_exist($uid = ''){
		$db  = APP :: ADP("db");
		$sql = 'select sourceID from xsmart_integral where uid='.$uid;
		$data = $db->query($sql,$fetch_mode = MYSQL_ASSOC);
		return RST($data);
	}
	// 积分类型
	/*
		所有积分的增减类型
	*/
	function integral_type($type)
	{
	
		switch($type)
		{	
			
			case '0':
				return RST("积分初始化");
				break;
			
			case '1':
				return RST("购买有声书");
				break;
			
			case '2':
				return RST("购买听书机");
				break;
			case '3':
				return RST("购买听书U盘");
				break;
			case '4':
				return RST("兑换有声书");
				break;
			case '5':
				return RST("兑换听书机");
				break;
			case '6':
				return RST("兑换听书U盘");
				break;
			case '9':
				return RST("每日签到");
				break;	
			case '7':
				return RST("兑换其他产品");
				break;
				
		}
	}

}