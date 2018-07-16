<div class="top">
    <div class="top_con">   
    	<?php $logo = DS('publics._get','','ad','bid=1 and classid=5 order by lmorder asc limit 0,1');?>  
        <div class="logo"><a href="/"><img src="<?= !empty($logo[0]['imgurl'])?$logo[0]['imgurl']:'/images/xuea_img_06.png'?>" style="width:140px"/></a></div>
        <div class="nav">
            <ul>
<?php 
	$article_list = DS('publics._get','','article_class',' parentid = 0 order by lmorder asc limit 7');
		if($article_list){    
			foreach($article_list as $key => $val){
				if($val['classname'] == '测评'){
?> 
				<li><a href="javascript:;" onclick="test1()">测评</a></li>
		<?php		
				}else{
				?>
				<li><a href="<?php echo W_BASE_URL;?>/<?= $val['classurl']?>"><?= $val['classname']?></a></li>
<?php			}
			}
		}
?>
            </ul>       
            <div class="clearfloat"></div>
        </div>
        <input type="hidden" name="xr_uid" id="xr_uid" value="<?= $_SESSION['xr_id']?>">
        <div class="search">
            <input type="text" placeholder="搜索您感兴趣的课程" class="search_text" onFocus="if(this.value=='搜索您感兴趣的课程'){this.value='';this.style.color='#333'}" onBlur="if(this.value==''){this.value='搜索您感兴趣的课程';this.style.color='#666'}" name="searchQuery" id="ya" value="<?= V('g:c','搜索您感兴趣的课程');?>" /> 
            <a href="javascript:;" id="sosuo" onclick="sousuo()"><img src="images/search.png" class="search_btn"/></a>
        </div>
        <script type="text/javascript">
	function test1(){
		var uid = $("#xr_uid").val();
			
		if(uid=='' || uid == 0){
		   // jAlert('请先登录','温馨提示');
			 $("#maskLayer").attr("style","display:block");
        		$("#alert").slideDown();
		}else{
			$.ajax({
                url:'<?= URL('member.istest')?>',
                type:'POST',
                data:{
                    uid	:	uid,
                },
                success:function(r){  
                    e = eval('(' + r + ')'); 
                    if(e.status == '1'){    
                        window.location.href="<?= URL('member.xmember','&tid=5')?>";	  
                    }else{
                        jAlert(e.info,'温馨提示');
                    }	
                }
            }); 		
		}	
	} 
    function sousuo(){
        var val = formatStr($('#ya').val());
        if(val == '搜索您感兴趣的课程' || val.replace(/^\s*/g, "") == ''){
            jAlert('请输入您感兴趣的课程','温馨提示');
        }else{
            $.ajax({
                url:'<?= URL('courSystem.find')?>',
                type:'POST',
                data:{
                    inter	:	val,
                },
                success:function(r){  
                    e = eval('(' + r + ')'); 
                    if(e.status == '1'){    
                        window.location.href="<?= URL('courSystem.course','&c=')?>"+val;	  
                    }else{
                        jAlert(e.info,'温馨提示');
                    }	
                }
            }); 	
        }
    }
    function formatStr(str) {
        str = str.replace(/<\/?[^>]*>/g,'');
        str = str.replace(/(&lt;)|(&gt;)/gi,'');
        str = str.replace(/(\')|(\")/g,'');
        return str;
    }
</script>
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
<?php
	$_SESSION['u_uidss'] = $_SESSION['xr_id'];
?>
        <div class="dengluhou" >
            <p class="name" style="float:left" id="a" onMouseOver="tabb()"><a href="<?= URL('member.xmember')?>" title="<?= $info[0]['realname']?>"><?php if(empty($info[0]['logo'])){?><img src="images/course_conimg_27.png"><?php }else{?><img src="<?= $info[0]['logo']?>"><?php }?><span title="<?= $info[0]['realname']?>"><?= F("publics.substrByWidth",$info[0]['realname'],6);?></span></a><?php if($info[0]['type'] ==2){?><a href="<?= URL('member.xmember','&tid=6');?>"><span style="margin-left:10px;"><img src="images/student_img_06.png" style="height:15px;width:15px;position:relative;top:3px;border-radius:0;" /><?= $info[0]['frozen_money']?></span></a><?php }?></p>
            <div class="list" id="b" style="display:none;">
                <?php if(empty($info[0]['logo'])){?><img src="images/course_conimg_27.png"><?php }else{?><img src="<?= $info[0]['logo']?>"><?php }?> 
                <p style="margin-top:15px;">正使用手机账号登录</p>
                <p><a href="<?= URL('member.xmember')?>">个人主页</a></p>
                <?php if($info[0]['type']==1){?>
                <p><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">提问我的</a></p>
                <p><a href="<?= URL('member.xmember','&tid=3');?>" style="color:black">安全中心</a></p>
                <p><a href="<?= URL('member.xmember','&tid=4');?>" style="color:black">个人资料</a></p>
                <?php }else{?>
                <p><a href="<?= URL('member.xmember','&tid=1');?>" style="color:black">我的课程</a></p>
                <p><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">我的问答</a></p>
                <p><a href="<?= URL('member.xmember','&tid=7');?>" style="color:black">个人资料</a></p>
                <?php }?>
                <p style="border:0;"><a href="javascript:;" onClick="logOut()">退出</a></p>
            </div>
        </div>
<script>
	function logOut(){
		$.ajax({
			url:'<?= URL('login.loginOut')?>',
			type:'POST',
			success:function(r){
				e = eval('(' + r + ')');
				if(e.status == '1'){
					//alert(1);
					location.reload(true); 
				}else{
					jAlert("请稍后重试",'温馨提示');
				}	
			}
		});		
	}
</script>
<?php
	}
?>
        <div class="clearfloat"></div>
    </div>
</div>
<div class="tanchu">
<script>
$(function(){
	$("#zhucee").click(function(){
		//$("#message12").css("display","block");
		$("#maskLayer").css("display","block");
		$("#message12").slideDown();
	});
});
</script>
    <form>
    <div class="zhuce" id="message12" style="display:none">
        <div class="tit"><i class="close"><img id="close6" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
        <div class="zhuce_left">
            <p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
            <input type="text" name="usr" id="usr" class="phone" value="" placeholder="请输入手机号"/>
            <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
            <input type="password" name="pwd" id="pwd" class="pwd" placeholder="请输入密码"/>
            <p>确认密码<span class="xian">|</span><span class="english">Confirm password</span><span class="xing">*</span></p>
            <input type="password" name="pwd1" id="pwd1" class="cfm_pwd" placeholder="请确认密码"/>
            <p>昵称<span class="xian">|</span><span class="english">nickname</span><span class="xing">*</span></p>
            <input type="text" name="nk_name" id="nk_name" class="nk_name" placeholder="请输入昵称"/>
            <p>验证码<span class="xian">|</span><span class="english">identifying code</span><span class="xing">*</span></p>
            <input class="input-txt w180" id="verify_code" name="verify_code" type="text" autocomplete="off" placeholder="请输入验证码">
            <div class="account3" style="margin: 0.5cm 0cm 0cm 0cm">
                <img id="checkCodeImg" src="/code/vdimgck.php" />
                <a href="javascript:refreshCc();">看不清楚，换一张</a>
            </div>
            <!--<p>手机验证码<span class="xian">|</span><span class="english">telephone identifying code</span><span class="xing">*</span></p>
            <span class="yanzhengma"><input type="text" name="pcode" id="pcode" class="yanzheng" placeholder="请输入验证码" style="width:120px"/><!--<a onClick="sendPhone()" class="yzm"><input id="btnSendCode" type="button" value="发送验证码" onClick="sendMessage()" class="yzm" style="border:0;width:120px" /></span>-->
            <input type="hidden" name="slink" id="slink" value="" >
            <p id="register1"><input type="button" name="" id="registerr" onClick="checkRegister()" value="注册" class="zc_btn" /></p>
            <p style="display:none"><input type="reset" name="button" id="res" value="重置" /></p>
        </div>
        <div class="zhuce_right"> 
            <span class="dl_ttl">已经拥有学啊网账号？</span>
            <input type="button" value="登录" name="" id="dl_btnnn" class="dl_btn" />
            <span class="dl_ttl">用以下方式直接登录</span>
            <a href=""><img src="images/zc_img_14.png" /></a>
            <a href="<?= URL('qqConnect.login');?>" target="_blank"><img src="images/zc_img_19.png" /></a>
            <a href="<?= URL('wxOauth.login');?>" target="_blank"><img src="images/zc_img_24.png" /></a>
        </div>
    </div>
    </form>
    <!--登陆-->
    <div class="denglu" id="alert">
        <div class="tit"><i class="close"><img id="close" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
        <div class="zhuce_left">
            <p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
            <input type="text" name="username" id="username" class="phone" value="<?= $_COOKIE['xr_name']?>"  placeholder="请输入手机号"/>
            <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
            <input type="password" name="password" id="password" class="pwd" placeholder="请输入密码"/>
            <p><input type="checkbox" name="remandEmail" class="rmb_me" value="1" id="remandEmail" checked/><span class="jizhu_me">记住我</span><a href="#" class="wjmm" id="dl_rr">忘记密码</a></p>
            <p><input type="button" name="" id="log"  onclick="return checkLogin()" value="登录" class="zc_btn" /><span class="no_zh">还没有账号？</span><a href="javascript:void(0);" class="now_zc" id="zcc">马上注册</a></p>
        </div>
        <div class="zhuce_right">
            <span class="dl_ttl">用以下方式直接登录</span>
            <a href=""><img src="images/zc_img_14.png" /></a>
            <a href="<?= URL('qqConnect.login');?>" target="_blank"><img src="images/zc_img_19.png" /></a>
            <a href="<?= URL('wxOauth.login');?>" target="_blank"><img src="images/zc_img_24.png" /></a>
        </div>
    </div>
     <div class="zhmm_one" id="passw1">
        <div class="tit"><h3 class="tit_tit">找回密码</h3><i class="close"><img id="close1" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
        <div class="zhmm_left">
            <p>请输入注册手机号</p>
            <input type="text" name="" id="res_phone" class="phone" placeholder="请输入手机号"/>
            <p>请输入验证码</p>
            <p><input type="text" name="" id="res_yzm" class="in_yzm" placeholder="请输入验证码"/><img src="/code/vdimgck.php" id="code_img" onClick="refreshCc()" class="yz_img" /><a href="javascript:void(0);" onClick="refreshCc()" class="no_look">看不清，换一张</a></p>
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
            <!--<p><span>10</span>秒后自动跳转到登录页面</p>-->
            <p><input type="reset" name="" id="lijidenglu" value="立即登录" class="now_dl" /></p>
        </div>
    </div>
<script>
$(function(){
    $("#closea").click(function(){
		if($('#fz_con').css('display') != 'block'){
			$("#fenxiang_con").fadeOut();
			$("#maskLayer").css("display","none");
		}
    });
});
</script>
<div id="maskLayer"> </div>
<script type="text/javascript">  
    function denglu(){
        //$("#alert").attr("style","display:block");
        $("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
    }
    function zhuce(){
        //$("#message12").attr("style","display:block");
        $("#maskLayer").attr("style","display:block");
        $("#message12").slideDown();
    }
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
              //myAlert.style.display = "block";
              maskLayer.style.display = "block";
              $(myAlert).slideDown();
         }
        mClose.onclick = function() {
            //myAlert.style.display = "none";
            $(myAlert).slideUp();
            maskLayer.style.display = "none";
            document.body.style.overflow = "visible";
        }
        mClose1.onclick = function() {
            //passw1.style.display = "none";
            $(passw1).slideUp();
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
            //message12.style.display = "none";
            $(message12).slideUp();
            maskLayer.style.display = "none";
            document.body.style.overflow = "visible";
        }
        zcc.onclick = function(){
              myAlert.style.display = "none";
              //message12.style.display = "block";
              $(message12).fadeIn();
              maskLayer.style.display = "block";
         }
         dl_rr.onclick = function(){  
              myAlert.style.display = "none";
              //passw1.style.display = "block";
              $(passw1).fadeIn();
              maskLayer.style.display = "block";
         }
         dl_btnnn.onclick = function(){  
            message12.style.display = "none";
            //myAlert.style.display = "block";
            $(myAlert).fadeIn();
            maskLayer.style.display = "block";
         }
         findpas.onclick = function(){
            var resphone    = $("#res_phone").val();
            var resyzm 	    = $("#res_yzm").val();
			var p_reg		= /^1[3|4|5|8][0-9]\d{8,9}$/;
            if(resphone == ''){
                alert('手机号不能为空');
                return false;
            }
			if(!p_reg.test(resphone)){
					alert('请输入有效的手机号码');
					return false;
			}
            if(resyzm.length < 3){
                alert('请正确填写验证码');
                return false;
            }
            var subInfoa = $.ajax({
                    url: "<?=URL('login.ajac_register_code')?>",
                    data:{'resphone' : resphone, 'resyzm' : resyzm,},
                    type:'POST',
                    async: false
                }).responseText;
			  
              var result = eval("("+subInfoa+")");
			  
              if(result.status==3){
                    alert('您填写的手机号不存在');
                    return false;
              }
              if(result.status==444){ 
                    alert('请输入正确的验证码');
                    return false;
              }
              
              $("#phone_user").val(result.strPhone); 
              $("#phone_ke").val(result.sesskey); 
             
              passw1.style.display = "none";
              passw2.style.display = "block";
              maskLayer.style.display = "block"; 
         }
         findpas1.onclick = function(){
              /*var phone_user   = $("#phone_user").val();*/
              var phone_key    = $("#phone_key").val();
             /* var sess         = $("#ressi").val();*/
			 if(phone_key == ''){
				alert("请输入短信验证码");	 
			}
				 $.ajax({
					url:'<?= URL('login.check_msgCode')?>',
					type:'POST',
					data:{
						phone_key	: phone_key,
					},
					success:function(r){
						e = eval('(' + r + ')');
						if(e.status == 1){
							 passw2.style.display = "none";
                            passw3.style.display = "block";
                            maskLayer.style.display = "block";
						}else{
							alert(e.msg);	
						}
					}
				});
              /*if( phone_user != ''){
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
              maskLayer.style.display = "block";*/
             
          }
         findpas2.onclick = function(){
              var one_pass = $("#one_pass").val();
              var two_pass = $("#two_pass").val();
              
              if(one_pass.length < 15 && two_pass.length < 15){
                    if(one_pass == two_pass){
                        var subInfob = $.ajax({
                            url: "<?=URL('login.forgetpass')?>",
                            data:{'one_pass':one_pass,},
                            type:'post',
                            async: false
                        }).responseText;
                        var result = eval("("+subInfob+")");
                        if(result.status==1){
                                alert('成功重置密码');
                              	passw3.style.display = "none";
                            	passw4.style.display = "block";
                            	maskLayer.style.display = "block";
                        }else{
							alert(result.msg);	
						}
                            
                    }else{
                        alert('您输入的两次密码不相同!');
                    }
              }else{
                    alert('您输入密码的长度超过了15个字符!');
              }
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
function checkRegister(){
var usr		= $("#usr").val();
var pwd 	= $("#pwd").val(); 
var pwd1 	= $("#pwd1").val();
var nk_name = $("#nk_name").val();
var verify_code	= $("#verify_code").val();
var slink	= $("#slink").val();   
var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
if(usr == ''){
jAlert('请输入手机号','温馨提示');
$("#usr").focus();
return false;	
}
if(telReg == ''){
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


if(verify_code == ''){
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
    verify_code		:	verify_code,
},
success:function(r){  
    e = eval('(' + r + ')'); 
    if(e.status == '1'){
           
        //location.reload(true);
         document.getElementById('res').click();
       $("#message12").css("display","none");
       $("#alert").css("display","block");
         $("#maskLayer").css("display","block");   
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
        location.reload(true);   
    }else{
        jAlert(e.info,'温馨提示');
    }	
}
}); 	
}
</script>
<script type="text/javascript">
function refreshCc(){
var ccImg = document.getElementById("checkCodeImg");
if (ccImg) { 
    ccImg.src= ccImg.src + '?' +Math.random(); 
}	
}
</script>

</div>