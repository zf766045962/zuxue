<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value']?></title>    
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">  
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
</head>
<body>
<div class="container">
<?php TPL :: display("header1")?>
<div class="content">
    <?php TPL :: display("member/member_left");?>
    <div class="lib_Contentbox lib_tabborder">
        <div id="con_one_3" class="hover">         
            <div class="safe_top">
                <p style="font-weight:bold;">绑定后，可以使用手机找回密码！</p>
            </div>
            <div class="safe_btm_two">
                <div class="safe_con">
                <form action="<?= URL('member.savePhone')?>" method="post" id="savephone" name="savephone">
                    <p class="safe_two"><span>手机号：</span><input type="text" name="phone" id="phone" /></p>
                    <p class="safe_two"><span>验证码：</span><input type="text" name="yz_text" id="yz_text" class="yz_text"/><input type="button"  id="mybtn" class="yzm" value="获取验证码" onclick="sendPhone()"></p>
                    <?php
                    	$info = DS('publics._get','','users',' id='.$_SESSION['xr_id']);
					?>
                    <input type="hidden" name="utype" id="utype" value="<?= $info[0]['type']?>" />
                   <p class="safe_two" id ="safe_two" style="display:none"><span>&nbsp;</span><input type="button" class="two_btn" value="提交" onclick="checkcode()" /></p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfloat"></div>
</div>
<script>
	function checkcode(){
		if($("#yz_text").val() == ''){
			jAlert("请输入验证码",'温馨提示');
			$("#yz_text").focus();
			//return false;	
		}else{
			var code	=	$("#yz_text").val();
			var email	=	$("#email").val(); 
				$.ajax({
				url:'<?= URL('member.phonecode')?>',
				type:'POST',
				data:{
					code	:	code,
					email	:	email,	
				},
				success:function(r){
					e = eval('(' + r + ')');
					if(e.status == '1'){
						//alert(1);
						jAlert(e.info,'温馨提示');
						if($("#utype").val()	== '1'){
							location.href = 'index.php?m=member.xmember&tid=3';
						}else{
							location.href = 'index.php?m=member.xmember&tid=8';	
						}
					}else{
						jAlert(e.info,'温馨提示');
					}	
				}
			});
		}
	}
	
	function sendPhone(){
		if($("#phone").val() == ''){
			jAlert("请输入手机号",'温馨提示');
			$("#phone").focus();
			//return false;	
		}else{
			var phone	=	$("#phone").val();
			$.ajax({
				url:'<?= URL('member.sendPhone')?>',
				type:'POST',
				data:{
					phone	: phone,
				},
				success:function(i){
					e = eval('(' + i + ')');
					if(e.status == '1'){ 
						$("#safe_two").css('display','');	
					}else{
						jAlert(e.info,'温馨提示');	
					}	
				}
			});
		}
	} 
</script>
<!--footer-->
<?php TPL :: display("footer1")?>
<!--footer--end-->
</div>
</body>
</html>