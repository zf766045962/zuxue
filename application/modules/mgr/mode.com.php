<?php
//
	// +----------------------------------------------------------------------
	// | xSmart 
	// +----------------------------------------------------------------------
	// | Copyright (c) 2011 All rights reserved.
	// +----------------------------------------------------------------------
	// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
	// +----------------------------------------------------------------------
	// | Author:  jiameng1015@126.com
	// +----------------------------------------------------------------------
	//
class mode {
	///初始值 
	var $options = array(   
							'allowregister' 		=> '1',			//是否允许注册
							'choosemodel'	 		=> '0',			//注册选择模型
							'enablemailcheck'		=> '1',			//是否开启邮箱验证
							'registerverify'		=> '1',			// 新会员注册需要管理员审核
							'showapppoint'			=> '1',			//是否启用应用间积分兑换
							'rmb_point_rate' 		=> '1',			//元人民币购买积分数量			
							'defualtpoint' 			=> '0',			//新会员默认点数
							'defualtamount' 		=> '0',			//新会员注册默认赠送资金
							'showregprotocol' 		=> '1',			//是否显示注册协议
							'regprotocol' 			=> '',			//会员注册协议
							'registerverifymessage' => '',			//邮件认证内容
							'forgetpassword' 		=> ''			//密码找回邮件内容
						);	
	
	function saveData(){
        $args = func_get_args();
		
		// 修改为可接受数组参数
		if (!is_array($args[0])) {
			$params = array($args[0] => isset($args[1])? $args[1] : '');
		} else {
			$params = $args[0];
		}
		$data = array();
		$db   = APP::ADP('db');
		foreach ($params as $key=>$value) {
			if (!isset($this->options[$key])) {
				return RST(false, '2110001', 'Set the option does not exist');
			}
			$data[] = '("' . $db->escape($key) . '","' . $db->escape($value) .'")';
		}
		$sql = 'REPLACE ' .  $db->getTable(T_MEMBERS_CONFIG) . '(`key`,`value`) VALUES' . implode(',', $data);
		
		$rst = $db->execute($sql);
		/*///删除缓存
		if ($rst) {
			DD('common/sysConfig.get');
		}*/
        return RST($rst);

	}
	function get($key = null)
	{
		$db = APP :: ADP('db');
		$row = $db->query('SELECT * FROM ' . $db->getTable(T_MEMBERS_CONFIG));
		$rs = $this->options;
        foreach($row as $value) {
             $rs[$value['key']] = $value['value'];
        }
                
		if ($key) {
			$kvalue = isset($rs[$key]) ? $rs[$key] : false;
			return RST($kvalue);	
		}
		return RST($rs);
	}

	
	
	
}
