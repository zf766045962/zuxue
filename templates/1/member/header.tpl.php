<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
        <title>学啊教育</title>        
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
		<script type="text/javascript">
			$(document).ready(function(){
				$("#zhuce").click(function(){
					popWin("zhuce_all");
				});
				$("#denglu").click(function(){
					popWin("denglu_all");
				});
			});
		</script>
    </head>
    <body>
    	<div class="container">
        	<!--logo,nav-->
       		<div class="top">
            	<div class="top_con">
                	<div class="logo">
                    	<img src="images/xuea_img_06.png"/>
                    </div>
                	<div class="nav">
                    	<ul>
							<?
								$article_list = DS('publics._get','','article_class',' parentid = 0 limit 6');
								if($article_list){
									foreach($article_list as $key => $val){
							?>
								<li><a href="<?= $val['classurl'].'&cid='.$val['classid']?>"><?= $val['classname']?></a></li>
							<?
									}
								}
							?>
                        </ul>
                        <div class="clearfloat"></div>
                    </div>
                    <div class="search">
                    	<input type="text" placeholder="搜索您感兴趣的课程" class="search_text"/>
                        <a href=""><img src="images/search.png" class="search_btn"/></a>
                        <input type="button" value="注册" id="zhuce" class="zc_btn zc"/>
                        <input type="button" value="登录" id="denglu" class="zc_btn dl"/>
                    </div>
                    <div class="clearfloat"></div>
                </div>
            </div>
            <!--弹出框内容-->
            <div class="tanchu">
            	<!--注册-->
            	<div class="zhuce" id="zhuce_all">
                    <div class="tit"><i class="close"><img id="guan" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
                	<div class="zhuce_left">
                    	<p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
                        <input type="text" name="" id="" class="phone"/>
                        <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
                        <input type="password" name="" id="" class="pwd"/>
                        <p>确认密码<span class="xian">|</span><span class="english">Confirm password</span><span class="xing">*</span></p>
                        <input type="password" name="" id="" class="cfm_pwd"/>
                        <p>昵称<span class="xian">|</span><span class="english">nickname</span><span class="xing">*</span></p>
                        <input type="text" name="" id="" class="nk_name"/>
                        <p>手机验证码<span class="xian">|</span><span class="english">telephone identifying code</span><span class="xing">*</span></p>
                        <span class="yanzhengma"><input type="text" name="" id="" class="yanzheng"/><a href="" class="yzm">发送验证码</a></span>
                        <p><input type="button" name="" id="" value="注册" class="zc_btn" /></p>
                    </div>
                    <div class="zhuce_right">
                    	<span class="dl_ttl">已经拥有学啊教育账号？</span>
                        <input type="button" value="登录" name="" id="" class="dl_btn" />
                        <span class="dl_ttl">用以下方式直接登录</span>
                        <a href=""><img src="images/zc_img_14.png" /></a>
                        <a href=""><img src="images/zc_img_19.png" /></a>
                        <a href=""><img src="images/zc_img_24.png" /></a>
                    </div>
                </div>
                
                <!--登陆-->
            	<div class="denglu" id="denglu_all">
                	<div class="tit"><i class="close"><img id="guan" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
                	<div class="zhuce_left">
                    	<p>手机号<span class="xian">|</span><span class="english">telephone</span><span class="xing">*</span></p>
                        <input type="text" name="username" id="username" class="phone"/>
                        <p>密码<span class="xian">|</span><span class="english">password</span><span class="xing">*</span></p>
                        <input type="password" name="password" id="password" class="pwd"/>
                        <p><input type="checkbox" name="remandEmail" class="rmb_me" value="1" checked/><span class="jizhu_me">记住我</span><a href="" class="wjmm">忘记密码</a></p>
                        <p><input type="button" name="" id=""  onclick="return checkLogin()" value="登录" class="zc_btn" /><span class="no_zh">还没有账号？</span><a href="" class="now_zc">马上注册</a></p>
<script>
	function checkLogin(){
		var usr		= $("#username").val();
		var pwd 	= $("#password").val();   
		
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
			},
			success:function(r){
				e = eval('(' + r + ')');
				if(e.status == '1'){
					//jAlert(e.info,'温馨提示');    
					location.href = 'index.php?m=member.xmember&tid='+$("tid").val();	 
				}else{
					jAlert(e.info,'温馨提示');
				}	
			}
		}); 	
	}
</script>
                    </div>
                    <div class="zhuce_right">
                        <span class="dl_ttl">用以下方式直接登录</span>
                        <a href=""><img src="images/zc_img_14.png" /></a>
                        <a href=""><img src="images/zc_img_19.png" /></a>
                        <a href=""><img src="images/zc_img_24.png" /></a>
                    </div>
                </div>
                
                <div class="zhmm_one" id="zhmm_one">
                	<div class="tit"><h3 class="tit_tit">找回密码</h3><i class="close"><img id="guan" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
                    <div class="zhmm_left">
                    	<p>请输入注册手机号</p>
                        <input type="text" name="" id="" class="phone"/>
                        <p>请输入验证码</p>
                        <p><input type="text" name="" id="" class="in_yzm"/><img src="images/one_img_07.png" class="yz_img" /><a href="" class="no_look">看不清，换一张</a></p>
                        <p style="text-align:center;"><input type="button" name="" id="" value="提&nbsp;交" class="tj_btn" /></p>
                    </div>
                </div>
                <div class="zhmm_one" id="zhmm_two">
                	<div class="tit"><h3 class="tit_tit">手机验证</h3><i class="close"><img id="guan" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
                    <div class="zhmm_left">
                    	<p>手机短信验证码已发送，请查收！</p>
                        <input type="text" name="" id="" placeholder="请输入短信验证码"/>
                        <p style="text-align:center;"><input type="button" name="" id="" value="下一步" class="tj_btn" style="margin-top:20px;"/></p>
                    </div>
                </div>
                <div class="zhmm_one" id="zhmm_three">
                	<div class="tit"><h3 class="tit_tit" style="float:none;text-align:center;">验证成功，请输入新密码</h3></div>
                    <div class="zhuce_left zhmm_left">
                    	<p>请输入密码</p>
                        <input type="password" name="" id="" class="pwd"/>
                        <p>请输入确认密码</p>
                        <input type="password" name="" id="" class="pwd"/>
                        <p style="text-align:center;"><input type="button" name="" id="" value="提&nbsp;交" class="tj_btn" /></p>
                    </div>
                </div>
                <div class="zhmm_one" id="zhmm_four">
                	<div class="success_title">
                    	<img src="images/four_03.png" class="four_img"/>
                        <h3 class="four_tit">密码重置成功，请您重新登录。</h3>
                    </div>
                    <div class="success_left">
                    	<p><span>10</span>秒后自动跳转到登录页面</p>
                    	<p><input type="button" name="" id="" value="立即登录" class="now_dl" /></p>
                    </div>
                </div>
            </div>  
            <!--head-->