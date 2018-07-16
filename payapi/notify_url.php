<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：2.0
 * 修改日期：2017-05-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */

require_once 'config.php';
require_once 'pagepay/service/AlipayTradeService.php';

$arr=$_POST;
$alipaySevice = new AlipayTradeService($config); 
$alipaySevice->writeLog(var_export($_POST,true));
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result){//验证成功
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //请在这里加上商户的业务逻辑程序代


    //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

    //商户订单号

    $out_trade_no = $_POST['out_trade_no'];

    //支付宝交易号

    $trade_no = $_POST['trade_no'];

    //交易状态
    $trade_status = $_POST['trade_status'];


    if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS'){


        $link = mysql_connect("localhost", "zhufeng04", "123456");
        mysql_query('set names utf8');
        mysql_select_db('zuxue', $link) or die ('选择失败');
        $sql = "select * from  xsmart_balance where oid = ".$out_trade_no;
        //$sql = "update xsmart_order set ispay = 1,pay_order_number = ".$trade_no." where nid = ".$out_trade_no;
        $con = mysql_query($sql, $link);

        $conarr = mysql_fetch_array($con);
        $oid = $conarr['oid'];
        $uid = $conarr['uid'];
        $price = $conarr['price'];

        $sql1 = "select * from  xsmart_users where id = ".$uid;
        $con1 = mysql_query($sql1, $link);
        $conarr1 = mysql_fetch_array($con1);
        $old = $conarr1['frozen_money'];


        $sql5 = "select * from  xsmart_sys_config where `key` = 'site_learn'";
        $con5 = mysql_query($sql5, $link);
        $conarr5 = mysql_fetch_array($con5);
        $cheng = $conarr5['value'];

        $newmoney = $old + ($price * $cheng);
        $sql2 = "update xsmart_users set frozen_money = '".$newmoney."' where id = ".$uid;
        $con2 = mysql_query($sql2, $link);
        $sql3 = "update xsmart_balance set status = 2,finished = 1,pay_order_number = ".$trade_no." where oid = ".$oid;
        $con3 = mysql_query($sql3, $link);

        $sql4 = "update xsmart_integral set status = 1 where oid = ".$oid;
        $con4 = mysql_query($sql4, $link);
        //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        echo "success";    //请不要修改或删除
    }else{
        //验证失败
        echo "fail";

    }
}
