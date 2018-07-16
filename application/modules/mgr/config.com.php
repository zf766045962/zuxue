<?php

class config
{
    //获取配置
    function get_config($currentid = 0, $cid = '')
    {
        $db=APP::ADP("db");
        return $db->query("select * from config");
    }
    //配置修改
    function config_edit($array)
    {
        $db=APP::ADP("db");
        //print_r($array);
        foreach ($array as $key => $val)
        {
            $sql = "update config set c_value='" . $val . "' where c_key='" . $key . "'";
            $db->query($sql);
        }
    }

}

?>