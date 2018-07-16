<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表管理</title>
<link href="<?= W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?= W_BASE_URL;?>js/admin/mgr.js"></script>
<script src="<?= W_BASE_URL;?>js/select.js"></script>
</head>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
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
			 <span style="float:right; margin-right:14px;"><a onclick="dialog('<?= URL('mgr/mgr_balance.sys_balance');?>','管理员充值',800,600)" class="btn_genera2" id="btn_sub"><span>管理员充值</span></a></span>
        </h3>
        <form id="brand_form" action='<?= URL('mgr/mgr_balance.balance_list')?>' method='post'>
        	<input type="hidden" name="ordertype" id="ordertype" value="<?= V('r:ordertype','1')?>">
            <input type="hidden" name="userid" id="userid" value="<?= V('r:userid')?>">
          <div class="search">
            <p>订单号</p>
            <input name="order_sn" type="text" value="<?= V('r:order_sn')?>" class="ss_k" onfocus="focu(this)" onblur="blu(this)" style="width:135px;" onkeydown="enterSumbit()"/>
            <p>会员名</p>
            <input name="username" type="text" value="<?= V('r:username')?>" class="ss_k" onfocus="focu(this)" onblur="blu(this)" style="width:120px;" onkeydown="enterSumbit()"/>
            <p>支付状态</p>
            <select name="pay_status" id="pay_status" onchange="check()"> 
            	<option value=''>全部</option>
                <option value='1' <?= V('r:pay_status')=='1'?'selected="selected"':''?>>未支付</option>
                <option value='2' <?= V('r:pay_status')=='2'?'selected="selected"':''?>>已支付</option>
            </select>
            
            
            <a class="btn_general" onclick='check()'><span>搜索</span></a>
          </div>
        <input name="m" type="hidden" value="<?=V("r:m")?>" />
        </form>
        <div class="table-list">
        <table width="100%" class="table" style="font-size:12px;">
            <tr class="bt">
              <td width="20">编号</td>
              <td width="120">订单号</td>
			  <td width="120">充值来源</td>
              <td width="120">会员名</td>
              <td width="100">支付金额</td>
			  <td width="100">充值学币</td>
              <td width="120">时间</td>
			  <td width="100">支付状态</td>
            </tr>
            <tr>
            <?php
				if(!empty($balancelist['info'])){
				foreach($balancelist['info'] as $k=>$v){
			?>
            	  <td><?= $v['id']?></td>
                  <td><?= $v['oid']?></td>
				  <td><? if($v['pay_source']){ echo F('pay.pay_source',$v['pay_source']);}?></td>
                  <!--用户名-->
                  <td>
                  		<?php
								$result=F('user.user',$v['uid']);
								echo $result;
						?>
                  </td>
                  <!--支付方式-->
                  <td>￥<?= number_format($v['price'],2); ?></td>
				  <td><?= $v['money']?></td>
                  <td><?= !empty($v['addtime'])?date("Y-m-d H:i",$v['addtime']):''; ?></td>
                  <!--订单状态-->
                  <td>
                  		<?php
                        	if($v['status']==2 && $v['finished'] ==1) {
						?>
                        已支付
                        <?php } else {?>
                        未支付
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
		  </div>
    <div class="dibu" style="height:auto;">
        <div class="db_right">
        	<div class="page">
        		<?= !empty($balancelist['info'])?$balancelist['pagehtml']:''?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
function dialog(url,title,width,height){
	$.dialog({
		title:title,
		id: 'dialsg',
		width: width,
		height: height,
		fixed: true,
		lock: true,
		background: '#000',
		opacity: 0.5,
		content: 'url:'+url
	});
}
</script>
</body>
</html>