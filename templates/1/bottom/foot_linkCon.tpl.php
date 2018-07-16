<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title>
<?php 
	//$site_name = DS('publics.get_index','','site_name');
	if(empty($id)){
		$ad_list=	DS("publics2._get","","article_class","classid=".$cid);	
		echo $ad_list[0]['classname']  ."_学啊网";
	}else{
		$title	=	DS("publics2._get","","news","id=".$id);
		echo $title[0]['title']  ."_学啊网";	
	}
	?>
</title>    
	<?php 
    	if(empty($id)){
	?>
<meta name="keywords" content="<?php echo $ad_list[0]['keyword']?>">  
<meta name="description" content="<?php echo $ad_list[0]['description']?>_学啊网">
	<?php
		}else{
	?>
    <meta name="keywords" content="<?php echo $title[0]['keywords']?>">  
	<meta name="description" content="<?php echo $title[0]['description']?>_学啊网">
    <?php }?>  
<link rel="stylesheet" type="text/css" href="css/head.css" /> 
<link rel="stylesheet" type="text/css" href="css/foot.css" /> 
<link href="css/jquery.alerts.css" rel="stylesheet" />
<!-- 滚动图片 -->
<!--  <script type="text/javascript" src="js/jQuery.v1.8.3-min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/zzsc.js"></script>		
<!-- 纵向导航 -->
<script type="text/javascript">
$(document).ready(function(){
    $(".sort-list>ul>li").hover(function(){
        $(this).addClass("hover");
    },function(){
        $(this).removeClass("hover");
    });
});
</script>

<script type="text/javascript"> 
	var InterValObj; //timer变量，控制时间 
	var count = 60; //间隔函数，1秒执行 
	var curCount;//当前剩余秒数 
	function sendMessage() { 
		var usr		= $("#usr").val();
		var pwd 	= $("#pwd").val(); 
		var pwd1 	= $("#pwd1").val();
		var nk_name = $("#nk_name").val();
		var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
		curCount = count; 
		if(usr!='' && pwd!='' && pwd1 != '' && nk_name != '' && telReg && pwd == pwd1){
		　　//设置button效果，开始计时 
			　　 //向后台发送处理数据 
			$.ajax({
				url:'<?= URL('login.send_code')?>',
				type:'POST',
				data:{
					username	:	usr,
				},
				success:function(r){  
					e = eval('(' + r + ')'); 
					if(e.status == '1'){
						//jAlert(e.info,'温馨提示'); 
						$("#btnSendCode").attr("disabled", "true"); 
						$("#btnSendCode").val(curCount + "秒后重新发送"); 
						InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次    
						//$("#register1").css('display','');	  
					}else{
						jAlert(e.info,'温馨提示');
					}	
				}
			});
		}else if(usr == ''){
			jAlert('请填写手机号','温馨提示');	
		}else if(pwd == ''){
			jAlert('请填写密码','温馨提示');
		}else if(pwd != pwd1){
			jAlert('密码不一致','温馨提示');
		}else if(nk_name == ''){
			jAlert('请填写昵称','温馨提示');
		}else if(!telReg){
			jAlert('请填写合理手机号','温馨提示');	
		} 
	} 
			//timer处理函数 
	function SetRemainTime() { 
		if (curCount == 0) { 
			window.clearInterval(InterValObj);//停止计时器 
			$("#btnSendCode").removeAttr("disabled");//启用按钮 
			$("#btnSendCode").val("重新发送"); 
		} else { 
			curCount--; 
			$("#btnSendCode").val(curCount + "秒后重新发送"); 
		}
	}
</script>	
<!-- 选项卡 -->
<script>
    function setTab(name,cursel,n){
		for(i=1;i<=n;i++){
			var menu=document.getElementById(name+i);
			var con=document.getElementById("con_"+name+"_"+i);
			menu.className=i==cursel ? "hover" : "";
			//con.style.display=i==cursel ? "block" : "none";
			if(con.style.display=i==cursel){
				$(con).fadeIn();
			}else{
				con.style.display = "none";
			}
		}
    }
</script>
<!-- 点击左右滑动 -->
<script type="text/javascript" src="js/jq.Slide.js"></script>
<script type="text/javascript">
    $(function(){
        $("#temp4").Slide({
            effect : "scroolLoop",
            autoPlay:true,
            speed : "normal",
            timer : 3000,
            steps : 1
        });
    });
</script>
<!-- 图片显示div -->
<script type="text/javascript" src="js/tc.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {			
		t = $('.top').offset().top; //固定块距离窗口顶部位置				
		$(window).scroll(function(e){
			s = $(document).scrollTop();	//滚动条距离顶部高度
			if( s > t){
				$('.top').css('position','fixed');
				$('.top').css('top',0+'px');
				$
			}else{
				$('.top').css('position','');
			}
		})
	});
	$(document).ready(function () {
		$(document).keyup(function (evnet) {
			if (evnet.keyCode == '13') {
				if($('#message12').css('display') == 'block'){
					$('#registerr').click();	
				}else if($('#alert').css('display') == 'block'){
					$('#log').click();	
				}else if($('#message12').css('display') == 'none' && $('#alert').css('display') == 'none'){
						
							$('#sosuo').click();
						
				}
			}
		});
		
	});
	
</script>
<link rel="stylesheet" type="text/css" href="css/foot_link.css" />
 <!--百度异步统计代码-->
 <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4449a883d67a851a47b40dd00c604602";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="container">
<?php TPL :: display("header1")?>
<div class="content">
	<div class="lib_Menubox lib_tabborder">
		<ul>
			<?
				if($clist){
					foreach($clist as $ckey => $cval){
						if($cval['classid'] != '26' && $cval['classid'] != '27'){
			?>
				<li class="li_title"><a href="<?= !empty($cval['classurl'])?$cval['classurl']:'javascript:;'?>" style=" background: #e7e7e7 none repeat scroll 0 0;color: #4d4d4d;font-size: 15px;font-weight: bold;padding: 0;text-align: center;"><?= $cval['classname']?></a></li>
				<?
					$list = DS('publics._get','','article_class',' parentid = '.$cval['classid']);
					if($list){
						foreach($list as $key => $val){
				?>
					<a href="<?= $val['classurl']?>"><li id="one1" <?= V('r:catid')==$val['classid']?'class="hover"':'' ?> <?= V('r:cid')==$val['classid']?'class="hover"':'' ?>><?= $val['classname']?></li></a>
				<?
						}
					}
				?>
			<?
						}
					}
				}
			?>
		</ul>
	</div>
	<div class="lib_Contentbox lib_tabborder">
		<div id="con_one_2">
			<div class="content_right">
            <?php 
				if($id){
			?>
            
            <h2 style="text-align:center"><?= $n_list[0]['title']?></h2>
            <?	
				}
			?>
			<?	
				if($cid){
					$con = str_replace('\"','', $nlist['content']);
					echo $con;
				}else{
					$con = str_replace('\"','',$n_list[0]['content']);
					
			?>
				<p><?= $con?></p>
            <?php 
			   if($id){
				$onNews		=	DS("publics._get","","news","id >".$id." and catid=".$n_list[0]['catid']." order by inputtime asc limit 0, 1");
				$downNews	=	DS("publics._get","","news","id <".$id." and catid=".$n_list[0]['catid']." order by inputtime desc limit 0, 1");
				}
			?>
                <p>上一篇：<?php if(empty($onNews)){?>无<?php }else{?><a href="<?= URL('bottom.foot_linkCon','catid='.$onNews[0]['catid'].'&id='.$onNews[0]['id']);?>" style="color:black"><?= $onNews[0]['title']?></a><?php }?></p><p>下一篇：<?php if(empty($downNews)){?>无<?php }else{?><a href="<?= URL('bottom.foot_linkCon','catid='.$downNews[0]['catid'].'&id='.$downNews[0]['id']);?>" style="color:black"><?= $downNews[0]['title']?></a><?php }?></p>	
			<?
				}
			?>
			   
			</div>
		</div>
	</div>
	<div class="clearfloat"></div>
</div>
<!--footer-->
<?php TPL :: display("footer1")?>
<!--footer--end-->
</div>
</body>
</html>