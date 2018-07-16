<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发送信息 - 一路听天下   </title>

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_spacecp.css" />





<link rel="stylesheet" href="css/style.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>

<script>
window.onload=function(){
	TOP('list');
	TOP('list2');
	TOP('list3');
	TOP('list4');
};
</script>
<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	a{text-decoration:none;}
.foot{
	font-size:12px;
	}
#cnzz_stat_icon_1253224175{
	padding:14px 0 0;
	}		
</style>
</head>

<body id="nv_home" class="pg_spacecp" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>

<!--头部导航--><div id="hd">
	<?php
	TPL :: display('head');
	TPL :: display('headnav');
	?>
	<div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
<?php TPL :: display('bbs/hd');?></div>
               
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
    
    <!--右部导航开始-->
			<? TPL :: display("bbs/nav");?>
        <!--右部导航结束-->
        
		<div class="mn cont_wp float_l"><div class="bm space breadnav_msg"><a href="<?= URL('bbsUser.my_msgs',"&uid=$uid")?>">个人消息</a><span> > </span> <span>发送消息</span></div>
		<div class="mn">
			<div class="bm bw0">
				<h1 class="mt"><img class="vm" src="images/pm.gif" alt="send pm" />发送消息></h1>
				<div id="__pmform_0">
					<!--<form id="pmform_0" name="pmform_0" method="post">--><!--action="<?php //URL('bbsUser.send_msg_finish',"&uid=$uid")?>-->
						<div class="c form_postmsg">
							<script src="js/bbsjs/home_friendselector.js" type="text/javascript"></script>
							<script type="text/javascript">
                                var fs;
                                var clearlist = 0;
                            </script>
							<table cellspacing="0" cellpadding="0" class="tfm pmform mtm">
								<tr><th><label for="username">收件人</label></th>
                                	<td>
									<input type="text" name="username" id="username22" class="input_style3" value=""  tabindex="1" style="background:none repeat scroll 0 0 #f9f9f9">&nbsp;&nbsp;<span id="inner" style="color:red"></span>
									
									
									</td>	
                                </tr>
								<tr><th><label for="sendmessage">内容</label></th>
                                	<td><div class="area textarea_w_640"><textarea rows="8" cols="40" name="message" id="sendmessage" ></textarea></div><span id="inner1" style="color:red"></span></td>
                                </tr>
								<tr><th>&nbsp;</th>
                                	<td class="btnbar_postmsg"><button name="pmsubmit_btn" id="pmsubmit_btn1" value="true" class="normalbtn bluebtn" onclick = "return sendMsg()" ><strong>发送</strong></button></td></tr>
</table>
						</div>
					<!--</form>-->
				</div>
			</div>
		</div>
	</div>	
	</div>	
	</div>	

<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script>
	 
	function sendMsg(){
		var frm = document.getElementById('pmform_0');
		var usr = document.getElementById('username22');
	
		var message = document.getElementById('sendmessage');
		if(usr.value.length == 0){
			//alert('请输入收件人');
			document.getElementById('inner').innerHTML = "请输入收件人";
			usr.focus();	
			return false;
		}
		if(message.value == ''){
			document.getElementById('inner1').innerHTML = "请输入信息内容";
			message.focus();
			//alert('请输入信息内容');
			return false;	
		}
		if(usr.value.length != 0 && message.value != ''){
			
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					//document.getElementById("yzm").innerHTML=xmlhttp.responseText;
					if(xmlhttp.responseText == "发送成功"){
						window.location.href="<?= URL('bbsUser.my_msgs',"&uid=$uid");?>"
					}else{
						alert(xmlhttp.responseText);	
					}
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.send_msg_finish',"&uid=$uid&username=")?>"+encodeURIComponent(usr.value)+'&message='+encodeURIComponent(message.value),true);
			xmlhttp.send();
		} 
		
	}
	var oDiv=document.getElementById('username22');
		oDiv.onblur=function(){
			var usr = document.getElementById('username22');
			if(usr.value.length != ""){
				document.getElementById('inner').style.display='none';
			}
		}
	var bIn = document.getElementById('sendmessage');
	    bIn.onblur=function(){
			var message = document.getElementById('sendmessage');
			if(message.value.length != ""){
				document.getElementById('inner1').style.display='none';
			}	
		}
		
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.js"></script>
<script type="text/javascript">
// head-select
$(function(){
	$.head_select("#head_select","#inputselect");
});

//关注
atten();
recommend();
boutique('main_boutique');
//putaway();
ranking('ranOne');
ranking('ranTwo');
ranking('ranThree');


//团购
jQuery(".group-tab").slide({trigger:"click",effect:"left"});

// banner
jQuery(".slide_Box").slide({mainCell:".bd ul",autoPlay:true,trigger:"click"});

//重磅推荐jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//精品推荐jQuery(".main-boutique").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});
jQuery(".main-boutique").slide({trigger:"click"});

//新书上架
jQuery(".main-putaway").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//合作伙伴
jQuery(".slideBox").slide({ mainCell:"ul",vis:6,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

//友情链接
jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});

//总排行
jQuery(".ranking-box").slide({autoPlay:false,trigger:"click"});

//听书产品 jQuery(".main-product").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
jQuery(".main-product").slide({trigger:"click"});

//广告
jQuery(".main-ad").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
</script>
</body>
</html>