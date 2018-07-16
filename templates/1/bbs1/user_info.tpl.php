<? $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id') ?>
<? $nam=DS('publics._get','','users', "id= $id");?>
<? $all1=DS('publics.get_total','','bbs_post', "authorid =$id  "); ?>
<? $con=DS('publics._get','','bbs_postcomment', "pid =$id  and comment != '' and tid != 0 order by dateline desc"); ?>
<? $all2=DS('publics.get_total','','user_follow', "uid = '".V('r:id')."'"); ?>
<? $all3=DS('publics.get_total','','user_follow', "followuid = '".V('r:id')."'"); ?>
<? $all4=DS('publics.get_total','','bbs_postcomment', "authorid = $id  and comment != ''"); ?>
<? $sa = DS('publics._get','','user_follow',"uid = '".$_SESSION['u_uidss']."' and followuid = '".V('r:id')."'");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	//var_dump($info);
	$user= DS('publics._get','','users',"id='".V('r:id')."'");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $user[0]['username']?>的个人资料  魅族社区 </title>

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_space.css" />

<script src="js/bbsjs/common.js" type="text/javascript"></script>
<script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/bbsjs/home.js" type="text/javascript"></script>
<script src="js/bbsjs/public.js" type="text/javascript"></script>
<script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>  
<link rel="stylesheet" href="/css/style.css" /> 
<script>
	var oDiv=document.getElementById('fwin_dialog_close');
	oDiv.click=function(){
		document.getElementById('append_parent1').style.display='none'
	};
	
	function showWindow1(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("alert_error").innerHTML = '取消收听成功';
					document.getElementById("pns1").innerHTML = '3 秒后窗口关闭';
					document.getElementById('append_parent').style.display=""
					setTimeout(function(){
						location.href = ""
					},3000)
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.showwind1'),'&id='.V('r:id')?>",true);
			xmlhttp.send();		
		}else{	
			document.getElementById('append_parent').style.display=""	
		}
	}
			
	function showWindow(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
								
						document.getElementById("alert_error").innerHTML = '收听成功';
						document.getElementById("pns1").innerHTML = '2 秒后窗口关闭';
						document.getElementById('append_parent').style.display=""
						setTimeout(function(){
							location.href = ""
						},2000)
					
					
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.showwind'),'&id='.V('r:id')?>",true);
			xmlhttp.send();			
		}else{
			document.getElementById('append_parent').style.display=""	
		}
	}
	
	function showWindow1(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("alert_error").innerHTML = '取消收听成功';
					document.getElementById("pns1").innerHTML = '2 秒后窗口关闭';
					document.getElementById('append_parent').style.display=""
					setTimeout(function(){
						location.href = ""
				},2000)	
			}
		}
		xmlhttp.open("GET","<?=URL('bbs2.showwind1'),'&id='.V('r:id')?>",true);
		xmlhttp.send();			
		}else{	
			document.getElementById('append_parent').style.display=""	
		}
	}
	
	function send22(){
		var xmlhttp;
		var con = document.getElementById("pmmessage").value;
		if(con.length != 0){
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		 	}xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('append_parent1').style.display="none"	
					document.getElementById("alert_error").innerHTML = '发送成功';
					document.getElementById('append_parent').style.display=""	
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.send'),'&id='.V('r:id').'&con='?>"+con,true);
			xmlhttp.send();	
		}else{
			alert('请输入内容')
		}		
	}
	
	function seeend(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			document.getElementById('append_parent1').style.display=""	
		}else{
			document.getElementById('append_parent').style.display=""
		}
	}
	
	function hieddd(){
		document.getElementById('append_parent1').style.display="none"	
	}
	
	function fendcl(){
		document.getElementById('append_parent2').style.display="none"	
	}
		
	function showfend(){
		var idss1 = "<?=$_SESSION['u_uidss']?> ";
	
		if(idss1 != 0 ){
			document.getElementById('append_parent2').style.display=""	
		}else{
			document.getElementById('append_parent').style.display=""
		}
	}
					
	function addsubmit_btn1(){			
		var sel = document.getElementById('gid').value;
		var con = document.getElementById('note22').value;
		var xmlhttp;
		if(con.length != 0){
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){	 
				if (xmlhttp.readyState==4 && xmlhttp.status==200){			
					if(xmlhttp.responseText == 222){
						document.getElementById('append_parent2').style.display="none"	
						document.getElementById("alert_error").innerHTML = '此单位是你您友';
						document.getElementById('append_parent').style.display=""
					}else{
						document.getElementById('append_parent2').style.display="none"	
						document.getElementById("alert_error").innerHTML = '添加成功';
						document.getElementById('append_parent').style.display=""	
					}
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.fend'),'&id='.V('r:id').'&con='?>"+con+'&sel='+sel,true);
			xmlhttp.send();	
		}else{
			alert('请输入内容')
		}		
	}					
</script>


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
<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent2" style="display:none">
		<div id="fwin_a_friend_li_5057668" class="fwinmask" style="position: fixed; z-index: 1301; left: 458px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody>
                	<tr>
                    	<td id="fwin_content_a_friend_li_5057668" class="m_c" style="" fwin="a_friend_li_5057668">			
                        	<h3 class="flb" id="fctrl_a_friend_li_5057668" style="cursor: move;">
								<em id="return_a_friend_li_5057668" fwin="a_friend_li_5057668">加为好友</em>
								<span><a title="关闭" class="flbc" onclick="fendcl();" href="javascript:;">关闭</a></span>
							</h3>
							<form onsubmit="ajaxpost(this.id, 'return_a_friend_li_5057668');" action="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=5057668" name="addform_5057668" id="addform_5057668" autocomplete="off" method="post" fwin="a_friend_li_5057668">
                                <input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow&amp;uid=5057668&amp;do=view&amp;from=space" name="referer">
                                <input type="hidden" value="true" name="addsubmit">
                                <input type="hidden" value="a_friend_li_5057668" name="handlekey"><input type="hidden" value="c0954ebf" name="formhash">
                                <div class="c input_w_316">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th width="60" valign="top" class="avt"><a href="space-uid-5057668.html"><img src="<?=$nam[0]['head_img'] == NULL?'images/noavatar_big.gif':$nam[0]['head_img']?>"></a></th>
                                                <td valign="top">添加 <strong><?=$nam[0]['username']?></strong> 为好友，附言:<br>
                                                    <input type="text" style="margin:5px 0px;" onkeydown="ctrlEnter(event, 'addsubmit_btn', 1);" class="px" size="35" value="" id="note22" name="note">
                                                    <p class="mtn xg1">(附言为可选<?=$nam[0]['username']?> 会看到这条附言，最多50个字符 )</p>
                                                    <p style="margin:5px 0px;" class="mtm">分组: 
                                                        <select class="ps" name="gid" id="gid">
                                                            <option value="0">其他</option>
                                                            <option selected="selected" value="1">通过本站认识</option>
                                                            <option value="2">通过活动认识</option>
                                                            <option value="3">通过朋友认识</option>
                                                            <option value="4">亲人</option>
                                                            <option value="5">同事</option>
                                                            <option value="6">同学</option>
                                                            <option value="7">不认识</option>
                                                        </select>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								<p class="o pns btnbar_fwin_l"><a class="normalbtn bluebtn"><button value="true" onclick="addsubmit_btn1()" id="addsubmit_btn33" name="addsubmit_btn" type="button" fwin="a_friend_li_5057668"><strong>确定</strong></button></a></p>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="append_parent" style="display:none">
		<div id="fwin_followmod" class="fwinmask" style="position: absolute; z-index: 1301; left: 496px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_followmod" class="m_c" style="" fwin="followmod">
                    	<h3 class="flb" id="fctrl_followmod" style="cursor: move;"><em>提示信息</em><span><a title="关闭" onclick="hideWindow2();" class="flbc" href="javascript:;">关闭</a></span></h3>
						<div class="c altw">
							<div class="alert_error" id="alert_error">请先<a href="<?=URL('login')?>" target="_blank">登录</a></div>
						</div>
						<p class="o pns" id="pns1"><button   onclick = "hideWindow2()" id="closebtn" class="normalbtn bluebtn z" type="button" fwin="followmod"><strong>确定</strong></button>
					<script reload="1" type="text/javascript">if($('closebtn')) {$('closebtn').focus();}</script>
						</p>
					</td>
				</tr></tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<script>
		function hideWindow2(){
			document.getElementById('append_parent').style.display='none';
		}			
	</script>
	<div id="append_parent1" style="display:none">
		<div style="display: none;" id="append_parent">
			<div initialized="true" style="position: absolute; z-index: 1301; left: 496px; top: 226px;" class="fwinmask" id="fwin_followmod"><style type="text/css">object{visibility:hidden;}</style>
            	<table cellspacing="0" cellpadding="0" class="fwin">
                	<tbody><tr>
                    	<td fwin="followmod" style="" class="m_c" id="fwin_content_followmod">
                        	<h3 style="cursor: move;" id="fctrl_followmod" class="flb"><em>提示信息</em><span><a href="javascript:;" class="flbc" onclick="hideWindow2();" title="关闭">关闭</a></span></h3>
							<div class="c altw">
								<div id="alert_error" class="alert_error">您已经收听过了</div>
							</div>
							<p class="o pns"><button fwin="followmod" type="button" class="normalbtn bluebtn z" id="closebtn" onclick="hideWindow2()"><strong>确定</strong></button>
					<script type="text/javascript" reload="1">if($('closebtn')) {$('closebtn').focus();}</script>
							</p>
						</td>
					</tr></tbody>
				</table>
			</div>
			<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
		</div>
		<div id="fwin_showMsgBox" class="fwinmask" style="position: absolute; z-index: 1301; left: 502px; top: 99px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_showMsgBox" class="m_c login_showMsgBox" style="" fwin="showMsgBox">
                    	<div class="pm pm_chat">
							<h3 class="flb" id="fctrl_showMsgBox" style="cursor: move;"><span><a title="关闭" class="flbc" onclick="hieddd();" href="javascript:;">关闭</a></span></h3>
							<div class="pm_tac bbda cl">
        						<div class="fll"><?=$nam[0]['username']?></div>   
										<a target="_blank" class="pm_notes" href="<?=URL('bbs2.space','&uid='.$_SESSION['u_uidss'].'&followuid='.V('r:id'))?>"><div class="pm_notes_icon"> </div>查看聊天记录<div class="cr"></div></a>
								<a target="_blank" class="pm_space" href=""><div class="pm_space_icon"> </div>访问好友空间<div class="cr"></div></a>       	
								<div class="shadebox_chat"></div>
							</div>
        					<div class="pm_avatar"><img src="<?=$nam[0]['head_img'] == NULL?'images/noavatar_big.gif':$nam[0]['head_img']?>"></div>        
							<div class="c">
								<ul id="msglist" class="pmb" fwin="showMsgBox"></ul>
								<script type="text/javascript">
                                    var refresh = true;
                                    var refreshHandle = -1;
                                </script>
								<div class="pmfm">
                                    <form onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id,  'return_showMsgBox');refreshMsg();" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;touid=5057668" autocomplete="off" method="post" name="pmform_5057668" id="pmform_5057668" fwin="showMsgBox">
                                        <input type="hidden" value="true" name="pmsubmit">
                                        <input type="hidden" value="5057668" name="touid">
                                        <input type="hidden" value="c0954ebf" name="formhash">
                                    	<div style="margin-bottom:5px" class="xi1" id="return_showMsgBox" fwin="showMsgBox"></div>
										<input type="hidden" value="showMsgBox" name="handlekey">
										<div class="tedt">
											<div style="display:none;" class="bar">
                                            	<div class="fpd">
													<a onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;" id="pmsml" title="表情" class="fsml" href="javascript:;" fwin="showMsgBox"><em></em></a>
    												<a onclick="seditor_fastUpload('pm', 'img');doane(event);" class="fmg" title="图片" href="javascript:;" id="pmimg" fwin="showMsgBox"><em></em></a>   
												</div>
											</div>
											<div class="area">
												<textarea autofocus="" onkeydown="ctrlEnter(event, 'pmsubmit_btn');" id="pmmessage" class="pt" name="message" cols="80" rows="3" fwin="showMsgBox"></textarea>
												<input type="hidden" value="" id="messageappend" name="messageappend" fwin="showMsgBox">
											</div>
										</div>
										<div style="margin-top:20px;" class="mtn pns cl">
 											<button style="width:96px !important;" onclick="send22()" id="pmsubmit_btn1" class="pn normalbtn bluebtn" type="button" fwin="showMsgBox"><strong>发送</strong></button>
 											<div style="display:none;" class="pma mtn z"><a onclick="refreshMsg();" title="刷新" href="javascript:;"><img class="vm" alt="刷新" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/pm-ico5.png"> 刷新</a></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</td>
				</tr></tbody>
			</table>
		</div>
		<div style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;" id="fwin_dialog_cover"></div>
	</div>
	<div id="ajaxwaitid"></div>
	<div id="hd">
	<? TPL :: display('head');
	TPL :: display('headnav');?>
	<div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
	<? TPL :: display("bbs/hd");?>
	</div>               
	<div id="wp" class="wp"><style id="diy_style" type="text/css"></style>
		<div class="wp"><div id="diy1" class="area"></div></div>
		<div>
            <div id="meizu_space" >
        		<div class="space_box">
                    <div class="meizu_name">
                        <span class="inner_uname"><?=$nam[0]['username']?></span>
                        <a class="mzvip" href="#"><img src="images/mzvip3_b.jpg" title="" /><span class="cl"></span></a>
                    </div>
                    <div class="avatar_img">
                        <a class="avatar"><img src="<?
						
						if($nam[0]['head_img'] == NULL){
							echo 'images/noavatar_big.gif.png';
							}else{
							echo $nam[0]['head_img'];	
								}
						
						?>"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a>
                    </div>
                    <div class="top20" >
                        <div class="grid" >
                            <div class="number" ><?=$all1==NULL?0:$all1?></div>
                            <div class="explain" >帖子</div>
                        </div>
                        <div class="grid" >
                            <div class="number" ><?=$all2==NULL?0:$all2?></div>
                            <div class="explain" >收听</div>
                        </div>
                        <div class="grid" >
                            <div class="number" ><?=$all3==NULL?0:$all3?></div>
                            <div class="explain" >听众</div>
                        </div>
                        <div class="cr" ></div>
                    </div>
				</div>
        		<div  class="space_box cut_line" style="padding-top:10px;" >	
					<div>
					<? if($sa == NULL){?>
						<a id="followmod2" class="social_listen normalbtn bluebtn" onclick="showWindow();" href="javascript:;">收听</a>
 					<? }else{?>
						<a id="followmod2" class="social_listen normalbtn bluebtn" onclick="showWindow1();" href="javascript:;">取消收听</a>
					<? }?>	
            			</div>
					<div>
					
						<a  id="followmod2" class="social_listen normalbtn bluebtn" onclick="seeend();" href="#">发送消息</a>

            		</div>
            		<?php /*?><div>
                		<div  style="float:left;" >
                    		<a href="#" id="a_sendpm_4040818" onclick="seeend()" title="发送消息" class="social_contact normalbtn graybtn w80">发消息</a>
                		</div>
                		<div style="float:left; margin-left:15px;" >
							<a href="#" id="a_friend_li_4040818" onclick="showfend()"  class="xi2 social_contact normalbtn graybtn w80">加为好友</a>
						</div>
                		<div class="cr"></div>
            		</div><?php */?>
        		</div>
        		<?php /*?><div  class="space_box cut_line" >
        			<div>
            			<span style="color:#FF7400">
        					<a href="#" target="_blank"><font color="#FF7400">魅族版主</font></a>
        				</span>
            		</div>
            		<div class="mzpro_pic" style=" margin-top:15px; ">
                    	              
					</div>
				</div>  <?php */?>
        		<?php /*?><div  class="space_box cut_line" >
        			<div>
            			<span style="color:#FF7400">
        					<a href="#" target="_blank"><font color="#FF7400">魅族版主</font></a>
        				</span>
            		</div>
            		<div class="mzpro_pic" style=" margin-top:15px; ">
                    	 <img src='images/meizu_product_pic/m032.png' class='png_bg' alt='MX 四核手机 数量:1' title='MX 四核手机 数量:1' >
                    	 <img src='images/meizu_product_pic/m065.png' class='png_bg' alt='MX3 数量:2' title='MX3 数量:2' >
                    	 <img src='images/meizu_product_pic/m040.png' class='png_bg' alt='MX2 数量:1' title='MX2 数量:1' >                
                	</div>   
        		</div><?php */?>
        	</div>
<script type="text/javascript">
	function succeedhandle_followmod(url, msg, values) {
		var fObj = $('followmod');
        if(values['type'] == 'add') {
        	fObj.innerHTML = '取消收听';
fObj.className = 'social_listen normalbtn graybtn';
            fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
        } else if(values['type'] == 'del') {
        	fObj.innerHTML = '收听';
fObj.className = 'social_listen normalbtn bluebtn';
            fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&fuid='+values['fuid'];
        }
    }
</script>
			<div id="ct" class="ct1 wp cl personal_onfo" >
            	<div class="mn ptop30" >
            		<div id="diycontenttop" class="area"></div>
                	<div class="bm bw0" >
                		<div class="page_frame_navigation" >
    						<div class="follow_feed_cover" style="left:235px;" ></div>
                    		<ul class="mbw tb cl page_frame_ul" style="padding-left:
							
							20px;" >
                           		<li  ><a href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id'))?>" >广播</a></li>
        						<li ><a href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id').'&ccid=2')?>" >主题</a></li>
								
        						<li class="a" ><a href="<?= URL('bbsUser.user_info','&id='.V('r:id'))?>" >个人资料</a></li>
                        		<li class="manage_frame_nav" style="float:right;width:200px;position:relative"></li>
                    		</ul>
						</div>                    
						<div class="bm_c" >
							<div class="bm_c u_profile">
								<div class="pbm mbm bbda cl space_profile_box">
									<h2 class="mbn">基本资料</h2>
							<? $date = DS('publics._get','','users',"id=$id") ?>	
                            <table cellspacing="0" cellpadding="0" class="tb_profile">
                                <col width="120px" />
                                <col width="558px" />
                                <tr class="column2"><td>用户名</td><td><?= $date[0]['username']?></td></tr>
								 <tr class="column2"><td>爱好</td><td><?=$date[0]['hobby']?></td></tr>
								<tr class="column2"><td>生日</td><td>
								<? if($date[0]['birth_year']==NULL and $date[0]['birth_month']==NULL and $date[0]['birth_day']==NULL ){?>
								保密
								<? }else{?>
								<?=$date[0]['birth_year']?><?=$date[0]['birth_month']==NULL?'':'-'.$date[0]['birth_month']?><?=$date[0]['birth_day']==NULL?'':'-'.$date[0]['birth_day']?>
								<? }?>
								</td></tr>
							    <tr class="column2"><td>电话</td><td><?=$date[0]['phone']==NULL?'保密':$date[0]['phone']?></td></tr>
								
								<tr class="column2"><td>居住地</td><td><?=$date[0]['address']==NULL?'保密':$date[0]['address']?></td></tr>
								<tr class="column2"><td>邮箱</td><td><?=$date[0]['email']==NULL?'保密':$date[0]['email']?></td></tr>
								
								<tr class="column2"><td>职业</td><td><?=$date[0]['job']==NULL?'保密':$date[0]['job']?></td></tr>	
                               
							   
							   
							   
                               <?php /*?> <tr class="column2"><td>空间访问量</td><td><?= $info[0]['views']?></td></tr>
                                <tr class="column2"><td>邮箱验证状态</td><td>以验证</td></tr><?php */?>
                            </table>	
								</div>
								<div class="pbm mbm bbda cl space_profile_box">
									<h2 class="mbn">
									论坛统计<? $all5=DS('publics._get','','integral',"uid= $id limit 0,1");?>
									</h2>
									<table cellspacing="0" cellpadding="0" class="tb_profile">
									<colgroup><col width="120px">
									<col width="558px">
									</colgroup><tbody><tr class="column2">
										<tr class="column2">
									<td>听众</td>
									<td><?=$all3==NULL?0:$all3?></td>
									</tr>
									
									<tr class="column2">
									<td>收听</td>
									<td><?=$all2==NULL?0:$all2?></td>
									</tr>
								
								
								
									<tr class="column2">
									<td>积分</td>
									<td><?=$all5==NULL?0:$all5[0]['integralAll']?></td>
									</tr>
									
									<tr class="column2">
									<td>主题数</td>
									<td><?=$all1==NULL?0:$all1?></td>
									</tr>
									<tr class="column2">
									<td>回帖数</td>
									<td><?=$all4==NULL?0:$all4?></td>
									</tr>
									<tr class="column2">
									<td>帐号注册时间</td>
									<td><?=date('Y-m-d H:i',$nam[0]['addtime'])?></td>
									</tr>
									<tr class="column2">
									<td>最后登录时间</td>
									<td><?=date('Y-m-d H:i',$nam[0]['last_login'])?></td>
									</tr>
									
									</tbody></table>
								</div>
    						<?php /*?>	<div class="pbm mbm bbda cl space_profile_box">
									<h2 class="mbn">论坛统计</h2>
                            <table cellspacing="0" cellpadding="0" class="tb_profile"><col width="120px" /><col width="558px" />
                                <tr class="column2"><td>好友数</td><td><?= $info[0]['friends']?></td></tr>
                                <tr class="column2"><td>相册数</td><td><?= $info[0]['albums']?></td></tr>
                                <tr class="column2"><td>帖子数</td><td><?= $info[0]['posts']?></td></tr>
                                <tr class="column2"><td>主题数</td><td><?= $info[0]['threads']?></td></tr>
                            </table>
                        		</div>
								<div class="pbm mbm bbda cl space_profile_box">
									<h2 class="mbn">活跃概况</h2>
                            <table cellspacing="0" cellpadding="0" class="tb_profile">
                                <col width="120px" /><col width="558px" />
                                <tr class="column2"><td>管理组</td><td><font color="#0022FF">超级版主</font></td></tr>
                                <tr class="column2"><td>用户组</td><td><font color="#FF7400">魅族版主</font>&nbsp;&nbsp;</td></tr>
                                <tr class="column2"><td>在线时间</td><td><?= $info[0]['oltime']?></td></tr>
                                <tr class="column2"><td>注册时间</td><td><?= date('Y-m-d',$user[0]['regdate'])?></td></tr>
                                <tr class="column2"><td>上次活动时间</td><td>假的<?= $info[0]['views']?></td></tr>
                                <tr class="column2"><td>上次发表时间</td><td>假的<?= $info[0]['views']?></td></tr>
                                <tr class="column2"><td>所在时区</td><td> 使用系统默认</td></tr>
							</table>
								</div>
                                <div id="psts" class="cl space_profile_box" style="border:none;">
                                    <h2 class="mbn">统计信息</h2>
							<table cellspacing="0" cellpadding="0" class="tb_profile">
                                <col width="120px" /><col width="558px" />
                                <tr class="column2"><td>已用空间</td><td>   假的0 B </td></tr>
                                <tr class="column2"><td>威望</td><td><?= $info[0]['extcredits1']?></td></tr>
                                <tr class="column2"><td>魅币</td><td><?= $info[0]['extcredits2']?></td></tr>
                                <tr class="column2"><td>魅力</td><td><?= $info[0]['extcredits3']?></td></tr>
							</table>
								</div><?php */?>
							</div>                
							<div id="diycontentbottom" class="area"></div>                    
						</div>
					</div>
				</div>
			</div>
			<div class="cr"></div>
		</div>
		<div class="wp mtn"><div id="diy3" class="area"></div></div>	
</div>
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
     
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>