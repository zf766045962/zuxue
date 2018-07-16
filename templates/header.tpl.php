<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title>跳跳牛电商学院</title>        
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
        $(this).addClass("hover")
    },function(){
        $(this).removeClass("hover")
    });
   
});
</script>
<!-- 选项卡 -->
<script>
    function setTab(name,cursel,n){
     for(i=1;i<=n;i++){
      var menu=document.getElementById(name+i);
      var con=document.getElementById("con_"+name+"_"+i);
      menu.className=i==cursel?"hover":"";
      con.style.display=i==cursel?"block":"none";
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
<!-- 弹出框 -->
<!--<script type="text/javascript">
    $(document).ready(function(){
        $("#zhuce").click(function(){
            popWin("zhuce_all");
        });
        $("#denglu").click(function(){
            popWin("denglu_all");
        });
    });
</script>-->
</head>
<body>
<div class="container">
    <!--logo,nav-->
    <div class="top">
        <div class="top_con">
            <div class="logo">
                <img src="/images/xuea_img_06.png" width="140"/>
            </div>
            <div class="nav">
                <ul><?php
                        $article_list = DS('publics._get','','article_class',' parentid = 0 limit 6');
                        if($article_list){
                            foreach($article_list as $key => $val){?>
                        <li><a href="<?= $val['classurl'].'&cid='.$val['classid']?>"><?= $val['classname']?></a></li>
                    <?php	}}?>
                </ul>
                <div class="clearfloat"></div>
            </div>
            <div class="search">
                <input type="text" placeholder="搜索您感兴趣的课程" class="search_text"/>
                <a href=""><img src="images/search.png" class="search_btn"/></a>
            </div>
            <?php				
                if(empty($_SESSION['xr_id'])){
            ?>
            <div class="dengluqian">
            	<input type="button" value="注册" id="zhucee" class="zc_btn zc"/>
            	<input type="button" value="登录" id="zc" class="zc_btn dl"/>
            </div>
            <?php
                }else{
                $info = DS('publics._get','','users',' id='.$_SESSION['xr_id']);
            ?> 

             <script type="text/javascript">
                $(function(){
                    $(".dengluhou").hover(function(){$("#b").slideToggle()});
                });       
            </script>
            <div class="dengluhou" >
                <p class="name" id="a" onMouseOver="tabb()"><?php if(empty($info[0]['logo'])){?><img src="images/course_conimg_27.png"><?php }else{?><img src="<?= $info[0]['logo']?>"><?php }?><span title="<?= $info[0]['realname']?>">Hi!<?= $info[0]['realname']?></span></p>
                <div class="list" id="b" style="display:none;">
                	<img src="images/course_conimg_27.png" style="float:left;height:75px;width:75px;margin:20px 10px;" />
                    <p style="margin-top:15px;">正使用手机账号登录</p>
                    <p><a href="<?= URL('member.xmember')?>">个人主页</a></p>
                    <p style="border:0;"><a href="<?= URL('login.loginOut')?>">退出</a></p>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="clearfloat"></div>
        </div>
    </div>
    <!--弹出框内容-->         
    <div class="tanchu">
        <script>
        $(function(){
            $("#zhucee").click(function(){
                $("#message12").css("display","block");
                $("#maskLayer").css("display","block");
                })
            })
        </script>
        <!--注册-->
        <form>
        <div class="zhuce" id="message12" style="display:none">
            <div class="tit"><i class="close"><img id="close6" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
            <div class="zhuce_left">
                <p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
                <input type="text" name="usr" id="usr" class="phone" value=""/>
                <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
                <input type="password" name="pwd" id="pwd" class="pwd"/>
                <p>确认密码<span class="xian">|</span><span class="english">Confirm password</span><span class="xing">*</span></p>
                <input type="password" name="pwd1" id="pwd1" class="cfm_pwd"/>
                <p>昵称<span class="xian">|</span><span class="english">nickname</span><span class="xing">*</span></p>
                <input type="text" name="nk_name" id="nk_name" class="nk_name"/>
                <!--<p>手机验证码<span class="xian">|</span><span class="english">telephone identifying code</span><span class="xing">*</span></p>
                <span class="yanzhengma"><input type="text" name="pcode" id="pcode" class="yanzheng" /><a onclick="sendPhone()" class="yzm">发送验证码</a></span>-->
                <input type="hidden" name="slink" id="slink" value="" >
                <p id="register1"><input type="button" name="" id="" onclick="checkRegister()" value="注册" class="zc_btn" /></p>
            </div>
            <div class="zhuce_right"> 
                <span class="dl_ttl">已经拥跳跳牛电商学院账号？</span>
                <input type="button" value="登录" name="" id="dl_btnnn" class="dl_btn" />
                <span class="dl_ttl">用以下方式直接登录</span>
                <a href=""><img src="images/zc_img_14.png" /></a>
                <a href=""><img src="images/zc_img_19.png" /></a>
                <a href=""><img src="images/zc_img_24.png" /></a>
            </div>
        </div>
        
        <!--登陆-->
        <div class="denglu" id="alert">
            <div class="tit"><i class="close"><img id="close" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
            <div class="zhuce_left">
                <p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
                <input type="text" name="username" id="username" class="phone" value="<?= $_COOKIE['xr_name']?>" />
                <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
                <input type="password" name="password" id="password" class="pwd"/>
                <p><input type="checkbox" name="remandEmail" class="rmb_me" value="1" id="remandEmail" checked/><span class="jizhu_me">记住我</span><a href="#" class="wjmm" id="dl_rr">忘记密码</a></p>
                <p><input type="button" name="" id=""  onclick="return checkLogin()" value="登录" class="zc_btn" /><span class="no_zh">还没有账号？</span><a href="javascript:void(0);" class="now_zc" id="zcc">马上注册</a></p>
            </div>
            <div class="zhuce_right">
                <span class="dl_ttl">用以下方式直接登录</span>
                <a href=""><img src="images/zc_img_14.png" /></a>
                <a href=""><img src="images/zc_img_19.png" /></a>
                <a href=""><img src="images/zc_img_24.png" /></a>
            </div>
        </div>
         <div class="zhmm_one" id="passw1">
            <div class="tit"><h3 class="tit_tit">找回密码</h3><i class="close"><img id="close1" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
            <div class="zhmm_left">
                <p>请输入注册手机号</p>
                <input type="text" name="" id="res_phone" class="phone"/>
                <p>请输入验证码</p>
                <p><input type="text" name="" id="res_yzm" class="in_yzm"/><img src="/code/vdimgck.php" id="code_img" onclick="refreshCc()" class="yz_img" /><a href="javascript:void(0);" onclick="refreshCc()" class="no_look">看不清，换一张</a></p>
                <p style="text-align:center;"><input type="button" name="" id="findpas" value="提&nbsp;交" class="tj_btn" /></p>
            </div>
            
        </div>
        <div class="zhmm_one" id="passw2">
            <div class="tit"><h3 class="tit_tit">手机验证</h3><i class="close"><img id="close2" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
            <div class="zhmm_left">
                <p>手机短信验证码已发送，请查收！</p>
                <input type="hidden" id="phone_user" name="" value="">
                <input type="text" name="" id="phone_key" value="" placeholder="请输入短信验证码"/>
                <input type="hidden" id="phone_ke" name="" value="">
                <p style="text-align:center;"><input type="button" name="" id="findpas1" value="下一步" class="tj_btn" style="margin-top:20px;"/></p>
            </div>
        </div>
        <div class="zhmm_one" id="passw3">
            <div class="tit"><h3 class="tit_tit" style="float:none;text-align:center;">验证成功，请输入新密码<img id="close3" style="float:right;" src="images/one_img_03.png"></h3></div>
            <div class="zhuce_left zhmm_left">
                <p>请输入密码</p>
                <input type="password" name="" id="one_pass" class="pwd"/>
                <p>请输入确认密码</p>
                <input type="password" name="" id="two_pass" class="pwd"/>
                <p style="text-align:center;"><input type="button" name="" id="findpas2" value="提&nbsp;交" class="tj_btn" /></p>
            </div>
        </div>
        <div class="zhmm_one" id="passw4">
            <div class="tit"><i class="close"><img id="close4" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
            <div class="success_title">
                <img src="images/four_03.png" class="four_img"/>
                <h3 class="four_tit">密码重置成功，请您重新登录。</h3>
            </div>
            <div class="success_left">
                <p><span>10</span>秒后自动跳转到登录页面</p>
                <p><input type="reset" name="" id="lijidenglu" value="立即登录" class="now_dl" /></p>
            </div>
        </div>
        <div id="maskLayer"> </div>
</form>
<script type="text/javascript">  
           var myAlert = document.getElementById("alert");  
            var passw4 = document.getElementById("passw4");
             var passw1 = document.getElementById("passw1");
              var passw2 = document.getElementById("passw2");
               var passw3 = document.getElementById("passw3");
               var dl_rr = document.getElementById("dl_rr");
			   var dl_btn = document.getElementById("dl_btnnn");
           var reg = document.getElementById("zc"); 
           var zcc = document.getElementById("zcc"); 
           var message = document.getElementById("message");
		   var message12 = document.getElementById("message12");
            var message11 = document.getElementById("message11");
           var maskLayer = document.getElementById("maskLayer");
           var mClose = document.getElementById("close"); 
           var mClose1 = document.getElementById("close1");
           var mClose2 = document.getElementById("close2");
           var mClose3 = document.getElementById("close3");
           var mClose4 = document.getElementById("close4"); 
           var mClose6 = document.getElementById("close6"); 
           var findpas = document.getElementById("findpas"); 
           var findpas1 = document.getElementById("findpas1");
           var findpas2 = document.getElementById("findpas2");
             reg.onclick = function(){  
                  myAlert.style.display = "block";
                  maskLayer.style.display = "block";
             }
            mClose.onclick = function() {
                myAlert.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            mClose1.onclick = function() {
                passw1.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            mClose2.onclick = function() {
                passw2.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            mClose3.onclick = function() {
                passw3.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            mClose4.onclick = function() {
                passw4.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            mClose6.onclick = function() {
                message12.style.display = "none";
                maskLayer.style.display = "none";
                document.body.style.overflow = "visible";
            }
            zcc.onclick = function(){  
                  myAlert.style.display = "none";
				  message12.style.display = "block";
                  maskLayer.style.display = "block";
                  //message.style.display = "block";
				  
                  //message11.style.display = "block";
             }
             dl_rr.onclick = function(){  
                  myAlert.style.display = "none";
                  passw1.style.display = "block";
                  maskLayer.style.display = "block";
                 
             }
			 dl_btnnn.onclick = function(){  
                  
                  message12.style.display = "none";
				  myAlert.style.display = "block";
                  maskLayer.style.display = "block";
                 
             }
             findpas.onclick = function(){
				var resphone    = $("#res_phone").val();
				var resyzm 	    = $("#res_yzm").val();
				if(resphone == ''){
					alert('手机号不能为空');
					return false;
				}
				if(resyzm.length < 3){
					alert('请正确填写验证码');
					return false;
				}
				var subInfoa = $.ajax({
						url: "<?=URL('login.ajac_register_code')?>",
						data:{'resphone' : resphone, 'resyzm' : resyzm,},
						type:'post',
						async: false
					}).responseText;
				  var result = eval("("+subInfoa+")");
				  if(result.status==3){
						alert('您填写的手机号不存在');
						return false;
				  }
				  if(result.status==1){
				  		alert('请输入正确的验证码');
				  		return false;
				  }
				   alert(result.sesskey);
				  $("#phone_user").val(result.strPhone); 
				  $("#phone_ke").val(result.sesskey); 
				 
                  passw1.style.display = "none";
                  passw2.style.display = "block";
                  maskLayer.style.display = "block";
                 
             }
             findpas1.onclick = function(){
				  var phone_user   = $("#phone_user").val();
			  	  var phone_key    = $("#phone_key").val();
				  var sess         = $("#ressi").val();
				 
				 // alert("<?=$_SESSION['phone_key'];?>")
				  if( phone_user != ''){
				  		if( phone_key == sess){
                  				passw2.style.display = "none";
                  				passw3.style.display = "block";
                  				maskLayer.style.display = "block";
                  		}else{
								alert('验证码不正确,请重新输入');
				  				return false;
				  			}
				  }else{
				  		alert('您的账号和验证码不匹配');
						return false;
				  }   
                  passw2.style.display = "none";
                  passw3.style.display = "block";
                  maskLayer.style.display = "block";
                 
              }
             findpas2.onclick = function(){
				  var phone_user = $("#phone_user").val();
				  if(phone_user == ""){
				  		return false;
				  }
			  	  var one_pass = $("#one_pass").val();
				  var two_pass = $("#two_pass").val();
				  
				  if(one_pass.length < 15 || two_pass.length < 15){
					  	if(one_pass == two_pass){
							var subInfob = $.ajax({
								url: "<?=URL('login.forgetpass')?>",
								data:'two_pass='+two_pass+'&phone_user='+phone_user,
								type:'post',
								async: false
							}).responseText;
							var result = eval("("+subInfob+")");
							if(result.status==1){
									alert('更改密码失败,请重新尝试!');
									return false;
							}
								passw3.style.display = "none";
								passw4.style.display = "block";
								maskLayer.style.display = "block";
						}else{
							alert('您输入的两次密码不相同!');
						}
				  }else{
				  		alert('您输入密码的长度超过了15个字符!');
				  }
				  $("#phone_user").val(''); 				    
                  passw3.style.display = "none";
                  passw4.style.display = "block";
                  maskLayer.style.display = "block";
             }
             zhucee.onclick = function(){ 
			 	   
                  message12.style.display = "block";
                  maskLayer.style.display = "block";
             }
            
        </script>
        <script type="text/javascript">
		
		var lijidenglu = document.getElementById("lijidenglu");
		var myAlert = document.getElementById("alert"); 
        var maskLayer = document.getElementById("maskLayer");
		var passw3 = document.getElementById("passw3");
		lijidenglu.onclick = function() {
		   		  passw4.style.display = "none";
		 		  myAlert.style.display = "block";
                  maskLayer.style.display = "block";
		}
		</script>
<script>
function sendPhone(){
var usr		= $("#usr").val();
var pwd 	= $("#pwd").val(); 
var pwd1 	= $("#pwd1").val();
var nk_name = $("#nk_name").val();
var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
if(usr!='' && pwd!='' && pwd1 != '' && nk_name != '' && telReg){
    //$("#slink").val('1');
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
            $("#register1").css('display','');	  
        }else{
            jAlert(e.info,'温馨提示');
        }	
    }
}); 	
    
}else{
    jAlert('检查填写信息','温馨提示');	
}

}

function checkRegister(){
var usr		= $("#usr").val();
var pwd 	= $("#pwd").val(); 
var pwd1 	= $("#pwd1").val();
var nk_name = $("#nk_name").val();
var pcode	= $("#pcode").val();
var slink	= $("#slink").val();   
var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
if(usr == ''){
    jAlert('请输入手机号','温馨提示');
    $("#usr").focus();
    return false;	
}
if(telReg){
	jAlert('手机号不合法','温馨提示');
    $("#usr").focus();
    return false;		
}

if(pwd == ''){
    jAlert('请输入密码','温馨提示');
    $("#password").focus();
    return false;	
}

if(pwd1 == ''){
    jAlert('请输入确认密码','温馨提示');
    $("#password").focus();
    return false;	
}

if(pwd != pwd1){
    jAlert('密码不一致','温馨提示');
    return false;	
}

if(nk_name == ''){
    jAlert('请输入昵称','温馨提示');
    return false;	
}


if(pcode == ''){
    jAlert('请输入验证码','温馨提示');
    return false;	
}
 $.ajax({
    url:'<?= URL('login.ajax_register')?>',
    type:'POST',
    data:{
        username	:	usr,
        password	:	pwd,
        nk_name		:	nk_name,
        pcode		:	pcode,
    },
    success:function(r){  
        e = eval('(' + r + ')'); 
        if(e.status == '1'){
            jAlert("注册成功，前去登陆",'温馨提示');    
            //location.reload(true);   
        }else{
            jAlert(e.info,'温馨提示');
        }	
    }
}); 	
}

function checkLogin(){
var usr		= $("#username").val();
var pwd 	= $("#password").val();
var remandEmail 	= $("#remandEmail").val();  
if(usr == ''){
    jAlert('请输入用户名','温馨提示');
    $("#username").focus();
    return false;	
}

if(pwd == ''){
    jAlert('请输入用户密码','温馨提示');
    $("#password").focus();
    return false;	
}

 $.ajax({
    url:'<?= URL('login.ajax_login')?>',
    type:'POST',
    data:{
        username	:	usr,
        password	:	pwd,
        remandEmail :	remandEmail,	
    },
    success:function(r){  
        e = eval('(' + r + ')'); 
        if(e.status == '1'){
            //jAlert(e.info,'温馨提示');    
            location.reload(true);   
        }else{
            jAlert(e.info,'温馨提示');
        }	
    }
}); 	
}
</script>
<!--注册验证码--> 
<script type="text/javascript">
function refreshCc(){
	var ccImg = document.getElementById("code_img"); 
	if (ccImg) { 
		ccImg.src= ccImg.src + '?' +Math.random(); 
	}	
}
</script>
<!--<script type="text/javascript">
    $("#registerButton").click(function(){
		var resphone    = $("#res_phone").val();
		var resyzm 	    = $("#res_yzm").val();
		if(resphone == ''){
			alert('手机号不能为空')
			return false;
		}
		if(resyzm.length < 3){
			alert('请正确填写验证码')
			return false;
		}
		var subInfo = $.ajax({
				url: "index.php?m=login.ajac_register_code",
				data:'resphone='+resphone+'&resyzm='+resyzm,
				type:'post',
				async: false
			}).responseText;
		var result = eval("("+subInfo+")");
		if(result.status==3){;
			alert('您填写的手机号不存在')
			$("#sendStatus").val('');
			return false;
		}
		if(result.status==1){
			displayBlock('请输入正确的验证码');
			$("#sendStatus").val('');
			return false;
		}
		
	})
		
		//setTimeout(function(){
		//	window.location.href="index.php?m=member.login";
		//},2000);
		//});*/


</script>-->      
    </div>  
    <!--head-->