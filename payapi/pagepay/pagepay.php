<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>支付</title>
</head>
<?php
require_once dirname(dirname(__FILE__)).'/config.php';
require_once dirname(__FILE__).'/service/AlipayTradeService.php';
require_once dirname(__FILE__).'/buildermodel/AlipayTradePagePayContentBuilder.php';

//商户订单号，商户网站订单系统中唯一订单号，必填
$out_trade_no = trim($_GET['WIDout_trade_no']);


$link = mysql_connect("localhost", "zhufeng04", "123456");
mysql_query('set names utf8');
mysql_select_db('zuxue', $link) or die ('选择失败');
$sql = "select * from  xsmart_balance where oid = ".$out_trade_no;
$con = mysql_query($sql, $link);

$conarr = mysql_fetch_array($con);

//付款金额，必填
$total_amount = $conarr['price'];

//订单名称，必填
$subject = '充值'.$total_amount;


//商品描述，可空
$body = '充值'.$total_amount;

//构造参数
$payRequestBuilder = new AlipayTradePagePayContentBuilder();
$payRequestBuilder->setBody($body);
$payRequestBuilder->setSubject($subject);
$payRequestBuilder->setTotalAmount($total_amount);
$payRequestBuilder->setOutTradeNo($out_trade_no);

$aop = new AlipayTradeService($config);

/**
 * pagePay 电脑网站支付请求
 * @param $builder 业务参数，使用buildmodel中的对象生成。
 * @param $return_url 同步跳转地址，公网可以访问
 * @param $notify_url 异步通知地址，公网可以访问
 * @return $response 支付宝返回的信息
 */
$response = $aop->pagePay($payRequestBuilder, $config['return_url'], $config['notify_url']);

//输出表单
echo $response;
?>
</body>
</html>