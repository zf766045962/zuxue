<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表管理</title>
<link href="<?= W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?= W_BASE_URL;?>js/admin/mgr.js"></script>
<script src="<?= W_BASE_URL;?>js/select.js"></script>
</head>
<body class="main_body">
<?php
	$class  = APP::N('type');
?>
<script type="text/javascript"> 
 
function focu(v){ 	
	v.style.border='1px #009bd1 solid';v.onmouseout=''; 
} 

function blu(v){
	v.style.border='1px #ccc solid';
	v.onmouseout=function(){
			v.style.border='1px #ccc solid'
	};
} 
function quxiao(){ 
	window.location.href="<?= URL('mgr/goods.brand')?>";
} 
function check(){ 
	$('#brand_form').submit();
}
function enterSumbit(){  
	var event = arguments.callee.caller.arguments[0]||window.event;  
	if(event.keyCode == 13){
		 check();
	}  
}
</script>
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>充值管理<span>&gt;</span>充值历史记录</p></div>
    <div class="main_cont">
        <h3 class="title">
       		充值历史记录
        </h3>
        
        <form id="brand_form" action='<?= URL('mgr/mgr_balance.balance_list')?>' method='post'>
        	<input type="hidden" name="ordertype" id="ordertype" value="<?= V('r:ordertype','1')?>">
            <input type="hidden" name="userid" id="userid" value="<?= V('r:userid')?>">
          <div class="search">
        	<?php /*
        	<p>订单状态</p>
            <select name="order_status" id="order_status" onchange="check()"> 
            	<option value=''>全部</option>
                <option value='0' <?= V('r:order_status')=='0'?'selected="selected"':''?>>未确认</option>
                <option value='1' <?= V('r:order_status')=='1'?'selected="selected"':''?>>已确认</option>
                <option value='2' <?= V('r:order_status')=='2'?'selected="selected"':''?>>已取消</option>
                <option value='3' <?= V('r:order_status')=='3'?'selected="selected"':''?>>无效订单</option>
                <option value="4" <?= V('r:order_status')=='4'?'selected="selected"':''?>>已取消</option>
            </select>
            <p>支付状态</p>
            <select name="pay_status" id="pay_status" onchange="check()"> 
            	<option value=''>全部</option>
                <option value='0' <?= V('r:pay_status')=='0'?'selected="selected"':''?>>未付款</option>
                <option value='2' <?= V('r:pay_status')=='2'?'selected="selected"':''?>>已付款</option>
            </select>
            
            <?php if(V('r:ordertype','1')==2) {?>
            <p>配送状态</p>
            <select name="shipping_status" id="shipping_status" onchange="check()"> 
            	<option value=''>全部</option>
                <option value='0' <?= V('r:shipping_status')=='0'?'selected="selected"':''?>>未发货</option>
                <option value='1' <?= V('r:shipping_status')=='1'?'selected="selected"':''?>>已发货</option>
                <option value='2' <?= V('r:shipping_status')=='2'?'selected="selected"':''?>>已收货</option>
                <option value='3' <?= V('r:shipping_status')=='3'?'selected="selected"':''?>>备货中</option>
            </select>
            <?php }?>
            */ ?>
            <p>订单号</p>
            <input name="order_sn" type="text" value="<?= V('r:order_sn')?>" class="ss_k" onfocus="focu(this)" onblur="blu(this)" style="width:135px;" onkeydown="enterSumbit()"/>
            <p>会员名</p>
            <input name="username" type="text" value="<?= V('r:username')?>" class="ss_k" onfocus="focu(this)" onblur="blu(this)" style="width:120px;" onkeydown="enterSumbit()"/>
            <p>支付状态</p>
            <select name="pay_status" id="pay_status" onchange="check()"> 
            	<option value=''>全部</option>
                <option value='1' <?= V('r:pay_status')=='1'?'selected="selected"':''?>>付款终止</option>
                <option value='2' <?= V('r:pay_status')=='2'?'selected="selected"':''?>>付款成功</option>
            </select>
            
            
            <a class="btn_general" onclick='check()'><span>搜索</span></a>
          </div>
        <input name="m" type="hidden" value="<?=V("r:m")?>" />
        </form>
        
        <table width="100%" class="table" style="font-size:12px;">
            <tr class="bt">
              <td width="20">编号</td>
              <td width="120">订单号</td>
              <td width="120">用户名</td>
              <td width="100">充值金额</td>
              <td width="120">充值时间</td>
              <td width="100">充值状态</td>
            </tr>
            <tr>
            <?php
				if(!empty($balancelist['info'])){
				foreach($balancelist['info'] as $k=>$v){
			?>
            	  <td><?= $v['id']?></td>
                  <td>
                  	<?= $v['oid']?>
                  </td>
                  <!--用户名-->
                  <td>
                  		<?php
                        		//$result		=	DS('publics.get_message','',$v['uid'],'id','users');
								$result=F('get_userinfo.get_userinfo',$v['uid']);
								echo $result['username'];
						?>
                  </td>
                  <!--支付方式-->
                  <td>￥<?= number_format($v['price'],2); ?></td>
                  <td><?= !empty($v['addtime'])?date("Y-m-d H:i",$v['addtime']):''; ?></td>
                  <!--订单状态-->
                  <td>
                  		<?php
                        	if($v['finished']==1 && $v['status']==2) {
						?>
                        支付成功
                        <?php } else {?>
                        支付失败
						<?php }?>
                  </td>
            </tr>
			<?php	
				}
				}else{
					echo '<tr><td colspan="10">暂无相关数据</td></tr>';	
				}
			?>
          </table>
    <div class="dibu" style="height:auto;">
        <div class="db_right">
        	<div class="page">
        		<?= !empty($balancelist['info'])?$balancelist['pagehtml']:''?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>