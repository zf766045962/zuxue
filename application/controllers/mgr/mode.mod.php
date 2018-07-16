<?php
include('action.abs.php');
class mode_mod extends action {
	function mode_set(){
		$d = DR('mgr/mode.get');
		if ($d['rst']) {
			TPL::assign('config', $d['rst']);
		}
		$this->_display('members/mod_set');
		}
	function getForm(){
		if(V('r:hidden')==1){
			$allowregister  =V('r:allowregister');//是否允许注册
			$choosemodel    =V('r:choosemodel');//注册选择模型
			$enablemailcheck=V('r:enablemailcheck');//是否开启邮箱验证
			$registerverify =V('r:registerverify');//新会员注册需要管理员审核
			$showapppoint   =V('r:showapppoint');//是否启用应用间积分兑换
			$rmb_point_rate =V('r:rmb_point_rate');//元人民币购买积分数量
			$defualtpoint   =V('r:defualtpoint');//新会员默认点数
			$defualtamount  =V('r:defualtamount');//新会员注册默认赠送资金
			$showregprotocol=V('r:showregprotocol');//是否显示注册协议
			$regprotocol    =V('r:regprotocol');//会员注册协议
			$registerverifymessage=V('r:registerverifymessage');//邮件认证内容
			$forgetpassword =V('r:forgetpassword');//密码找回邮件内容
		$query = array(
				'allowregister'        => $allowregister,
				'choosemodel' 	       => $choosemodel , 
				'enablemailcheck'      => $enablemailcheck , 
				'registerverify' 	   => $registerverify ,
				'showapppoint' 	       => $showapppoint , 
				'rmb_point_rate' 	   => $rmb_point_rate, 
				'defualtpoint' 		   => $defualtpoint, 
				'defualtamount' 	   => $defualtamount , 
				'showregprotocol' 	   => $showregprotocol, 
				'regprotocol'  	       => $regprotocol , 
				'registerverifymessage'=> $registerverifymessage,
				'forgetpassword'  	   => $forgetpassword
			);
		
		
		foreach($query as $key=>$value) {
				$result = DR('mgr/mode.saveData', '', $key, $value);
				if($result['errno']) {
					$this->_error('配置失败',  array('mode_set'));
				}
			}
			/*echo "<script>alert('设置成功');</script>";*/
			$this->_succ('已经成功保存你的配置', array('mode_set'));
			exit;
	}
		
}
}
