<?php

include ('action.abs.php');

class config_mod extends action
{

    function type()
    {
        //$this->getArrs();
        $type = V('r:type', 'sms_account');
        TPL::assign('type', $type);
		
		$class = V('r:class', 'select');
        TPL::assign('class', $class);

        $array = DR("mgr/config.get_config");//获取配置

        foreach ($array as $key => $val)
        {

            TPL::assign($val["c_key"], $val["c_value"]);
        }
		$sms_balance = DR("mgr/sms.get_balance");//获取余额
		TPL::assign('sms_balance', $sms_balance);
		
		$sms_each_fee = DR("mgr/sms.get_each_fee");//获取单价
		TPL::assign('sms_each_fee', $sms_each_fee);


        $this->_display('config/config_list');
    }
    function config_edit()
    {
        $array = V('r:info');
		if(is_array($array)){
        DR('mgr/config.config_edit', '', $array);
		}
        $this->type();
    }


    function update_config($field)
    {
        //if(!isset($_REQUEST[$field]))
        //{
        $sql = "update config set c_value='" . $_REQUEST[$field] . "' where c_key='" . $field . "'";
        //exit ($sql);
        mysql_query($sql);
        //}
        $this->type();
    }


}
