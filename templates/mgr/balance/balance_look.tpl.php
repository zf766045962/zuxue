<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/application/class/type.class.php";
	$class	=	new type();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache,no-store, must-revalidate">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="expires" CONTENT="0"> 
<title>订单查看</title>
<link href="<?= W_BASE_URL;?>css/admin/css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?= W_BASE_URL;?>js/qiehuan.js"></script>
<script type="text/javascript" src="<?= W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?= W_BASE_URL;?>js/admin/mgr.js"></script>
</head>
<style type="text/css">
.main_cont{ padding:24px 40px 0 40px;}
.main_cont .title{ height:48px; line-height:48px; border-bottom:1px #dfdfdf solid; background:none;}
.main_cont .title span{ font-size:14px; color:#000; font-weight:normal;}
.main_cont .title span strong{ font-size:16px; font-weight:normal;}
.main_cont .title span b{ font-size:14px; font-weight:bold; padding-right:10px;}
.main_cont .title a{ background:url(<?= W_BASE_URL;?>images/x_ht_btn_03.jpg); width:80px; height:33px; margin:4px 10px 0 0;}
.x_ht_tit{ height:52px; line-height:52px; padding-left:10px; font-size:14px; color:#000000; font-weight:bold;}
.x_ht_table{ color:#000000; font-size:12px;}
.x_ht_table tr,.x_ht_table tr td{ border:0;}
.x_ht_table tr td{ font-size:12px;}
.x_ht_btn{ background:url(<?= W_BASE_URL;?>images/x_ht_btn_07.jpg); width:70px; height:24px; text-align:center; line-height:24px; display:inline-block; color:#0e0e0e; font-size:12px; vertical-align:middle; margin-left:12px;}
.x_ht_x{ border-bottom:1px #ccc solid; height:18px;}
</style>
<style>
	.x_ht_btn {
    background: url("/images/x_ht_btn_07.jpg") repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: #0e0e0e;
    display: inline-block;
    font-size: 12px;
    height: 24px;
    line-height: 24px;
    margin-left: 12px;
    text-align: center;
    vertical-align: middle;
    width: 70px;
}
</style>
<body class="main_body">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>订单管理<span>&gt;</span>查看订单</p></div>
    <div class="main_cont">
        <h3 class="title">
       		<span style="float:left;">
            	<b>会员名称:</b>
                <strong>
                	<?php
						
							$czinfo		=	'';
							if(!empty($orderlook[0]['caozuoren'])) {
								$czinfo	=	explode(',',$orderlook[0]['caozuoren']);
							}
							$payment	=	array(1=>'在线支付',2=>'货到付款');
                			$result		=	DS('publics.get_message','',$v['uid'],'id','users');
							echo $result['username'];
					?>
                </strong>
            	<b>订单</b>
                <strong>No.<?= !empty($orderlook[0]['order_sn'])?$orderlook[0]['order_sn']:'-' ?></strong>　下单时间：<?= !empty($orderlook[0]['add_time'])?date('Y-m-d H:i',$orderlook[0]['add_time']):'-' ?>
            　<b>订单状态</b>
				<?php
                	switch($orderlook[0]['order_status']) {
						case 0 : echo "<font color='red'>未确认</font>";break;
						case 1 : echo "<font color='green'>已确认</font>";break;
						case 2 : echo "<font color='red'>已取消</font>";break;
						case 1 : echo "<font color='red'>无效</font>";break;
						case 1 : echo "<font color='red'>退货</font>";break;
						case 1 : echo "";break;
					}
				?>
            </span>
			<!-- <a href="/index.php?m=mgr/order.order_print&id=<?=V("r:id")?>" style="float:right"></a>-->
            <div class="clear"></div>
        </h3>
        <div class="x_ht_tit">订单操作</div>
        <?php !empty($orderlook[0]["caozuoren"])?$datafahuo = explode(',',$orderlook[0]["caozuoren"]):$datafahuo = '';?>
        <table class="table x_ht_table">
            
            <? 
			  if(!empty($order_remark)){
			  foreach($order_remark as $_key=>$_val){?>
              <tr>
                <td colspan="2"><?= $_val["content"];?></td>
                <td class="d1"><?= $_val["name"];?></td>
                <td><?= date("Y-m-d H:i:s",$_val["addtime"])?></td>
              </tr>
            <? }}?>
            <?php
            		if($orderlook[0]['status'] != 0 && $orderlook[0]['status'] != 104 && $orderlook[0]['status'] != 103){
			?>
            <tr>
              <td class="d1">取消订单：</td>
              <td class="d2">
              
			  	<?=($orderlook[0]['status'] == 0)?"<font color='red'>已取消</font>":"<font color='green'>未取消</font>"?>
                <?php
                		if(!empty($orderlook[0]['remark_content'])){
				?>
                			取消原因:<?= $orderlook[0]['remark_content']?>
                <?php
						}
				?>
				<? if($orderlook[0]['status'] != 105  && $orderlook[0]['status'] != 0){
			    ?>
                	<input type="text" id="remark_content" value="" style="width:200px;">
                    <a class="x_ht_btn" href="#" onclick="delOrder()"><span>取消订单</span></a>
				<? }?>
                <script>
                	function delOrder(){
						var remark_content	=	$('#remark_content').val();
						if(remark_content == ''){
							alert('请填写取消原因');
							$('#remark_content').focus();
							return false;	
						}
						if(confirm('确定要取消订单吗?')){
							window.location.href	=	'<?= URL('mgr/mgr_order.tui&status=0','id='.$orderlook[0]['id'].'');?>'+'&remark_content='+remark_content;	
						}
					}
                </script>
              </td>
              <td class="d1">操作人员：</td>
              <td class="d2">
			  	<?php 
						$quxiao	=	DS('publics.get_message','',$orderlook[0]['id'],'id','order');
						/*$realName	=	DS('publics.get_message','',$quxiao['quxiao'],'realname','admin');
						if(!empty($realName['realname'])){
							echo $realName['realname'];	
						}else{
							echo $quxiao['quxiao'];	
						}*/
						echo $quxiao['quxiao'];
				?>
              </td>	
            </tr>
            <?php
					}
			?>
            
            
            
            <tr>
              <td class="d1">备货状态：</td>
              <td class="d2">
              	<?php
                	if($ordertype==2) {
				?>
			  	<?=($orderlook[0]['shipping_status'] == 3)?"<font color='red'>未备货</font>":"<font color='green'>已备货</font>"?> 
				<? /*if($orderlook[0]['shipping_status'] == 3){?>
                <a class="x_ht_btn" href="javascript:confirmDel('<?= URL('mgr/mgr_order.change&ordertype='.V('r:ordertype','1').'&type=shipping_status&val=0','id='.$orderlook[0]['order_id'].'');?>','确定要备货吗？');"><span>备货</span></a>
				<? }} else {*/ } else {?>
                	-
                <?php }?>
              </td>
              <!--
              <td class="d1">操作人员：</td>
              <td class="d2"><?= $czinfo[1];?></td>
              -->
            </tr>
            <tr>
              <td class="d1">发货状态<?php echo "<div style='display:none'>"; var_dump($orderlook[0]);echo "</div>";?>：</td>
              
              <td class="d2">
              <?php
              	if($ordertype==2) {
			  ?>
			  <?=($orderlook[0]['shipping_status'] == 0)?"<font color='red'>未发货</font>":"<font color='green'>已发货</font>"?> 
			  <? if($orderlook[0]['shipping_status'] == 0  && $orderlook[0]['pay_status']==2){?>
			  		<a class="x_ht_btn" href="javascript:confirmDel('<?= URL('mgr/mgr_order.change&ordertype='.V('r:ordertype','1').'&type=shipping_status&val=1','id='.$orderlook[0]['order_id'].'');?>','确定要发货吗？');">
						<span>发货</span>
                    </a>
			  <? }} else {?>
              	-
			  <?php }?>
			  </td>
              <td class="d1">操作人员：</td>
              <td class="d2"><?= $czinfo[1];?></td>
            </tr>
            <tr>
              <td class="d1">签收状态：</td>
              <td class="d2">
              	<?php
                	if($ordertype==2) {
				?>
			  	<?=($orderlook[0]['shipping_status'] != 2)?"<font color='red'>未签收</font>":"<font color='green'>已签收</font>"?> 
				<? if($orderlook[0]['shipping_status'] != 2 && $orderlook[0]['shipping_status']==1 && $orderlook[0]['pay_status']==2){?>
                	<a class="x_ht_btn" href="javascript:confirmDel('<?= URL('mgr/mgr_order.change&ordertype='.V('r:ordertype','1').'&type=shipping_status&val=2','id='.$orderlook[0]['order_id'].'');?>','确定已签收订单吗？');">
                    	<span>已签收</span>
                    </a>
				<? }} else {?>
                	-
                <?php }?>
              </td>
              <td class="d1">操作人员：</td>
              <td class="d2"><?= $czinfo[2];?></td>
            </tr>
            
            
            <tr>
              <td class="d1">支付状态：</td>
              <td class="d2">
			  	<?=($orderlook[0]['pay_status'] == 0)?"<font color='red'>未结账</font>":"<font color='green'>已结账</font>"?> 
				<? if($orderlook[0]['pay_status'] == 0){?>
                	<a class="x_ht_btn" href="javascript:confirmDel('<?= URL('mgr/mgr_order.change&ordertype='.V('r:ordertype','1').'&type=pay_status&val=2','id='.$orderlook[0]['order_id'].'');?>','确定要财务确认吗？');">
                    	<span>确认结账</span>
                    </a>
				<? }?>
              </td>
              <td class="d1">操作人员：</td>
              <td class="d2"><?= $czinfo[0];?></td>
            </tr>
            
            
            <tr>
              <td class="d1">订单状态：</td>
              <td class="d2" colspan="3">
			  	<?php
                	switch($orderlook[0]['order_status']) {
						case 0 : echo "<font color='red'>未确认</font>";break;
						case 1 : echo "<font color='green'>已确认</font>";break;
						case 2 : echo "<font color='red'>已取消</font>";break;
						case 1 : echo "<font color='red'>无效</font>";break;
						case 1 : echo "<font color='red'>退货</font>";break;
						case 1 : echo "";break;
					}
				?>
              </td>
              <!--<td class="d1">结账日期：</td>
              <td class="d2"><?= $datafahuo[4]?></td>-->
            </tr>

			<?php
			//$stock_time = DS('publics.get_index','','stock_time');
			if(is_numeric($stock_time[0]['value'])){
				$enddate = time() + $stock_time[0]['value']*3600*24;
			}
			?>
			
         </table>
         <div class="x_ht_x"></div>
         
         
         <?php
         	if(!empty($orderlook[0]['address']) && !empty($orderlook[0]['consignee']) && !empty($orderlook[0]['zipcode']) && !empty($orderlook[0]['mobile']) && !empty($orderlook[0]['email'])) {
		 ?>
             <div class="x_ht_tit">收货人信息</div>
             <?php $addInfo	=	DS('mgr/mgr_order._get','','xsmart_delivery_address',"id = '".$orderlook[0]['deliveryAddressId']."'");?>
             <table class="table x_ht_table">
                <tr>
                  <td class="d1">收货人姓名：</td>
                  <td class="d2"><?= !empty($orderlook[0]['consignee'])?$orderlook[0]['consignee']:'未填' ?></td>
                  <!--
                  <td class="d1">收货地区：</td>
                  <td class="d2"><?= $orderlook[0]['province']?>-<?= $addInfo[0]['city']?>-<?= $addInfo[0]['area']?></td>
                  -->
                  <td class="d1">收货地址：</td>
                  <td class="d2"><?= !empty($orderlook[0]['address'])?$orderlook[0]['address']:'未填'?></td>
                </tr>
                <tr>
                  <td class="d1">手机：</td>
                  <td class="d2"><?= !empty($orderlook[0]['mobile'])?$orderlook[0]['mobile']:'未填'?></td>
                  <td class="d1">邮编：</td>
                  <td class="d2"><?= !empty($orderlook[0]['zipcode'])?$orderlook[0]['zipcode']:'未填'?></td>
                </tr>
                
                <tr>
                  <td class="d1">用户备注：</td>
                  <td class="d2"><textarea><?= $orderlook[0]['pay_note']?></textarea></td>
                </tr>
                
                <?php /*?><tr>
                  <td class="d1">发票抬头：</td>
                  <td class="d2">
                    <?php 
                            if(!empty($orderlook[0]['invoice'])){
                                @eval("\$fapiao = ".$orderlook[0]['invoice'].";");
                                //echo $fapiao[1];
                                if(!empty($fapiao[1])){
                                    echo $fapiao[1];	
                                }else{
                                    echo '-';	
                                }
                            }else{
                                echo '-';	
                            }
                    ?>
                    <?= (!empty($orderlook[0]['remark'])?$orderlook[0]['remark']:'未填')?>
                  </td>
                  <td class="d1">发票明细：</td>
                  <td class="d2">
                    <?php
                            if(!empty($orderlook[0]['mingxi'])){
                                switch($orderlook[0]['mingxi']){
                                    case 1: echo '食品';break;
                                    case 2: echo '酒水';break;
                                    case 3: echo '咨询费';break;
                                    default:'未知';
                                }
                            }else{
                                echo '-';
                            }
                    ?>
                    <?php
                    		$mingxiList		=	DS('member.get_user','','xsmart_incov',"id = '".$orderlook[0]['mingxi']."' and  status = 1");
                            if(!empty($mingxiList[0]['incovName'])){
                                echo $mingxiList[0]['incovName'];	
                            }else{
                                echo $mingxiList[0]['incovName'];	
                            }
                    ?>
                  </td>
                </tr><?php */?>
             </table>
             <div class="x_ht_x"></div>
         <?php }?>
         
         
         <div class="x_ht_tit">货物清单</div>
         
   		 <div class="conh1" style="width:100%;">
			<ul class="ww1">
  				<li class="s" onclick="butong_net(this,'butong_net1')"><a href="javascript:;">全部商品</a></li>
     		</ul>
    	<div class="clear"></div>
    	<div id="butong_net1" style="padding:0;">
		  <style type="text/css">
          .x_ht_qd{ line-height:40px; color:#000000; text-align:left; background:#f3f3f3; font-size:12px;}
          .x_ht_qd tr.tit{background:#c9c9c9; line-height:30px;}
          .x_ht_qd tr.tit td{ line-height:30px;}
          .x_ht_qd tr td{ padding-left:24px; font-size:12px;}
          </style>
      	<div class="dis" name="f">
          <table class="table1  x_ht_qd">
              <tr class="tit">
                  <td width="auto">商品名称</td>
                  <td width="170">购买数量</td>
                  <td width="150">单价</td>
                  <td width="114">小计</td>
              </tr>
              
              <?php
			  $lookshop	=	DS('mgr/mgr_order._get','','xsmart_order_goods',"order_id = '".$orderlook[0]['order_id']."'");
			  if(isset($lookshop) && !empty($lookshop)){
				  $totalmoney	=	0;
				 	foreach($lookshop as $k=>$v){
						/*获取商品信息*/
						$goodsInfo	=	DS('publics.get_message','',$v['goods_id'],'id','goods');
			  ?>
                 <tr>
              	  <td><?= $v['goods_name'];?></td>
                  <td style="font-size:14px;"><b><?= $v['goods_number'] ?></b></td>
                  <td>￥<?= $v['goods_price'];?></td>
                  <td>￥<?= number_format($v['goods_price']*$v['goods_number'],2,'.','');?></td>
                  <?php $totalmoney	=	$totalmoney+number_format($v['goods_price']*$v['goods_number'],2,'.','')?>
                 </tr>
			  <?php }}?>
              <?php /*?><tr style="background:#fff;">
                  <td colspan="3" style="color:#ce0404; text-align:right; padding-right:20px;">
                  <span>商品价格：￥<b style="font-size:16px; "><?= number_format($orderlook[0]['total'],2,'.','');?></b></span>
                  </td>
               </tr><?php */?>
               <tr style="background:#fff;">
                 <td colspan="5" style="color:#ce0404; text-align:right; padding-right:20px;">总计：￥<b style="font-size:16px; "><?= number_format($totalmoney,2,'.','');?></b></td>
               </tr>
               <!--<tr style="background:#fff;">
                 <td colspan="5">附言：<?= $orderlook[0]['postscript'] ?></td>
               </tr>-->
          </table>
      	</div>
      
        <div class="undis" name="f">
          <table class="table1  x_ht_qd" id="fatab">
              
          </table>
        </div>
      
        <div class="undis" name="f">
      	 <table class="table1  x_ht_qd" id="cuntab">
        
         </table>
        </div>

        <p style="height:10px; line-height:0; font-size:0;"></p>
         <?php /*?><table class="table1  x_ht_qd">
          <tr class="tit">
              <td>备注人</td>
              <td width="260">提交时间</td>
              <td width="690">备注信息</td>
          </tr>
          <? 
		  		if(!empty($order_remark)){
		  		foreach($order_remark as $_key=>$_val){
					?>
          <tr>
            <td><?=$_val["name"]?></td>
            <td><?=date("Y-m-d H:i:s",$_val["addtime"])?></td>
            <td><?=$_val["content"]?></td>
          </tr>
     	  <? }}?>
        </table><?php */?>
    	</div>
   		</div>
	  </div>
<script>
function yingfa(){
	$.ajax({
		url:"<?= URL('mgr/order.ajax_yingfa');?>",
		data:{'oid':<?= V('r:id');?>},
		type:"POST",
		success: function(e){
			$('#fatab').html(e);
		}
	});
}
$(function(){
	
	if($("#satae").find("span").html()==null){
		$("#satae").hide();
	}
	
	$("#click_order_remark").click(function(e) {
        $form={"remark_content":$("#remark_content").val(),"nid":"<?= V("r:id")?>"};
		$.ajax({
			url:"/admin.php?m=mgr/order.ajax_post_remark",
			data:$form,
			async:false,
			type:"POST",
			success: function(){
				alert('提交完成');
				location=location;
		    }
		
		})
    });
	
})
</script>
</body>
</html>