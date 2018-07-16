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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>购买管理<span>&gt;</span>购买历史记录</p></div>
    <div class="main_cont"> 
        <h3 class="title">购买历史记录</h3>
       <!-- <form id="brand_form" action='<?= URL('mgr/buy_history.buy_list')?>' method='post'>
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
        </form>-->
        <div class="table-list">
        <table width="100%" class="table" style="font-size:12px;">
            <tr class="bt">
              <td width="20">编号</td>
              <td width="120">订单号</td>
              <td width="120">会员名</td>
			  <td width="100">购买类型</td>
              <td width="120">购买名称</td>
              <td width="100">消耗学币</td>
              <td width="120">时间</td>
            </tr>
            <tr>
            <?php
				if(!empty($buylist['info'])){
				foreach($buylist['info'] as $k=>$v){
			?>
            	  <td><?= $v['id']?></td>
                  <td><?= $v['oid']?></td>
                  <!--用户名-->
                  <td><?php	$result=F('user.user',$v['userID']);echo $result;?></td>
                  <td><?php if($v['type']==1){ echo '体系';}else if($v['type']==2){ echo '章节';}else if($v['type']==3){echo '课程';}?></td>
                  <td><?php if($v['type']==1){$sysInfo = DS("publics._get","","system","id=".$v['systemid']);echo $sysInfo[0]['stitle'];}else if($v['type']==2){ $chaInfo = DS("publics._get","","chapter","id=".$v['pid']);echo $chaInfo[0]['ctitle'];} else if($v['type']==3){$couInfo = DS("publics._get","","course","id=".$v['coid']);echo $couInfo[0]['title'];}?></td>
				  <td><?= number_format($v['integral'],2)?></td>
                  <td><?= !empty($v['addtime'])?date("Y-m-d H:i",$v['addtime']):''; ?></td>
                  <!--订单状态-->
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
        		<?= !empty($buylist['info'])?$buylist['pagehtml']:''?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>