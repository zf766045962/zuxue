<? $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id') ?>
<? $nam=DS('publics._get','','users', "id= $id");?>
<? $all1=DS('publics.get_total','','bbs_post', "authorid =$id  "); ?>
<? $con=DS('publics._get','','bbs_postcomment', "pid =$id  and comment != '' and tid != 0 order by dateline desc"); ?>
<? $all2=DS('publics.get_total','','user_follow', "uid = '".V('r:id')."'"); ?>
<? $all3=DS('publics.get_total','','user_follow', "followuid = '".V('r:id')."'"); ?>
<? $sa = DS('publics._get','','user_follow',"uid = '".$_SESSION['u_uidss']."' and followuid = '".V('r:id')."'");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $nam[0]['username']?>帖子  魅族社区 </title>
    <meta name="keywords" content="<?= $nam[0]['username']?>帖子" />
    <meta name="description" content="<?= $nam[0]['username']?>帖子 ,魅族社区" />
    <meta name="generator" content="MEIZU 2013" />
    <meta name="author" content="MEIZU" />
    <meta name="copyright" content="2003-2013 Comsenz Inc." />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
    <link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_space.css" />
    <script type="text/javascript">
        var STYLEID = '1', STATICURL = 'static/', IMGDIR = 'images', VERHASH = 'WMI', charset = 'utf-8', discuz_uid = '9594205', cookiepre = 'MZBBS_2132_', cookiedomain = '', cookiepath = '/', showusercard = '0', attackevasive = '0', disallowfloat = 'login|newthread|tradeorder|activity|debate|usergroups|task', creditnotice = '', defaultstyle = '', REPORTURL = 'aHR0cDovL2Jicy5tZWl6dS5jbi9ob21lLnBocD9tb2Q9c3BhY2UmdWlkPTQwNDA4MTgmZG89dGhyZWFkJmZyb209c3BhY2U=', SITEURL = 'http://127.0.0.1:8004/', JSPATH = 'js/';
    // 是否是手机浏览器// 手机浏览器 1 
        var BROWSER_IS_MOBILE	= 0;		   
    </script>
    <script src="js/bbsjs/common.js" type="text/javascript"></script> 
    <meta property="wb:webmaster" content="f1284c3017204ff7" />
    <meta property="qc:admins" content="1300463313655125636" />
    <meta name="application-name" content="魅族社区" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="msapplication-tooltip" content="魅族社区" />
    <meta name="msapplication-task" content="name=;action-uri=portal.php;icon-uri=images/portal.ico" />
    <meta name="msapplication-task" content="name=版块;action-uriforum.php;icon-uriimages/bbs.ico" />
    <meta name="msapplication-task" content="name=;action-uri=group.php;icon-uri=images/group.ico" />
    <script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/bbsjs/home.js" type="text/javascript"></script>
    <script src="js/bbsjs/public.js" type="text/javascript"></script>
    <script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>      
   <script>
	var oDiv=document.getElementById('fwin_dialog_close');
	oDiv.click=function(){
		document.getElementById('append_parent1').style.display='none'
	};
	
	function showWindow1(){
		if(<?=$_SESSION['u_uidss']?> != 0 ){
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
		if(<?=$_SESSION['u_uidss']?> != 0 ){
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if(xmlhttp.responseText == 333){			
						document.getElementById("alert_error").innerHTML = '收听成功';
						document.getElementById("pns1").innerHTML = '2 秒后窗口关闭';
						document.getElementById('append_parent').style.display=""
						setTimeout(function(){
							location.href = ""
						},2000)
					}else if(xmlhttp.responseText == '2222'){			
						document.getElementById("alert_error").innerHTML = '您已经收听过了';
						document.getElementById('append_parent').style.display=""		
					}
					
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.showwind'),'&id='.V('r:id')?>",true);
			xmlhttp.send();			
		}else{
			document.getElementById('append_parent').style.display=""	
		}
	}
	
	function showWindow1(){
		if(<?=$_SESSION['u_uidss']?> != 0 ){
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
		if(<?=$_SESSION['u_uidss']?> != 0 ){
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
		if(<?=$_SESSION['u_uidss']?> != 0 ){
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
</head>
<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
	<div id="append_parent2" style="display:none">
		<div id="fwin_a_friend_li_5057668" class="fwinmask" style="position: absolute; z-index: 601; left: 458px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
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
                                                <th width="60" valign="top" class="avt"><a href="space-uid-5057668.html"><img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="images/w50h50"></a></th>
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
	</div>
	<div id="append_parent" style="display:none">
		<div id="fwin_followmod" class="fwinmask" style="position: absolute; z-index: 601; left: 496px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
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
	</div>
	<script>
		function hideWindow2(){
			document.getElementById('append_parent').style.display='none';
		}			
	</script>
	<div id="append_parent1" style="display:none">
		<div style="display: none;" id="append_parent">
			<div initialized="true" style="position: absolute; z-index: 601; left: 496px; top: 226px;" class="fwinmask" id="fwin_followmod"><style type="text/css">object{visibility:hidden;}</style>
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
		</div>
		<div id="fwin_showMsgBox" class="fwinmask" style="position: absolute; z-index: 601; left: 502px; top: 99px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_showMsgBox" class="m_c login_showMsgBox" style="" fwin="showMsgBox">
                    	<div class="pm pm_chat">
							<h3 class="flb" id="fctrl_showMsgBox" style="cursor: move;"><span><a title="关闭" class="flbc" onclick="hieddd();" href="javascript:;">关闭</a></span></h3>
							<div class="pm_tac bbda cl">
        						<div class="fll"><?=$nam[0]['username']?></div>        	
								<div class="shadebox_chat"></div>
							</div>
        					<div class="pm_avatar"><img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="<?=$nam[0]['head_img']?>"></div>        
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
	</div>
	<div id="ajaxwaitid"></div>
	<div id="hd"><? TPL :: display("bbs/hd");?></div>               
	<div id="wp" class="wp"><style id="diy_style" type="text/css"></style>
		<div class="wp"><div id="diy1" class="area"></div></div>
		<div>
            <div id="meizu_space" >
        		<div class="space_box">
                    <div class="meizu_name">
                        <span class="inner_uname"><?=$nam[0]['username']?></span>
                        <a class="mzvip" href="#"><img src="images/mzvip3_b.jpg" title="魅族产品认证用户" /><span class="cl"></span></a>
                    </div>
                    <div class="avatar_img">
                        <a class="avatar"><img src="<?=$nam[0]['head_img']?>"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a>
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
                		<div  style="float:left;" >
                    		<a href="#" id="a_sendpm_4040818" onclick="seeend()" title="发送消息" class="social_contact normalbtn graybtn w80">发消息</a>
                		</div>
                		<div style="float:left; margin-left:15px;" >
							<a href="#" id="a_friend_li_4040818" onclick="showfend();" class="xi2 social_contact normalbtn graybtn w80">加为好友</a>
						</div>
                		<div class="cr"></div>
            		</div>
        		</div>
        		<div  class="space_box cut_line" >
        			<div>
            			<span style="color:#FF7400">
        					<a href="#" target="_blank"><font color="#FF7400">魅族版主</font></a>
        				</span>
            		</div>
            <div class="mzpro_pic" style=" margin-top:15px; ">
				<img src='images/meizu_product_pic/m032.png' class='png_bg' alt='MX 四核手机 数量:1' title='MX 四核手机 数量:1' >
                <img src='images/meizu_product_pic/m065.png' class='png_bg' alt='MX3 数量:2' title='MX3 数量:2' >
                <img src='images/meizu_product_pic/m040.png' class='png_bg' alt='MX2 数量:1' title='MX2 数量:1' >            </div>
        </div>
	</div>
    <script type="text/javascript">
// 魅族
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
    <div id="ct" class="ct1 wp cl personal_onfo">
        <div class="mn">
            <div id="diycontenttop" class="area"></div>
        	<div class="bm bw0">
            	<div class="page_frame_navigation" >
    				<div class="follow_feed_cover" style="left:129px" ></div>
                    <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
                                <li  ><a href="<?= URL('bbsUser.user_broadcast','&id='.V('r:id'))?>" >广播</a></li>
        <li  class="a"><a href="<?= URL('bbsUser.user_thread','&id='.V('r:id'))?>" >主题</a></li>
        <li  ><a href="<?= URL('bbsUser.user_info','&id='.V('r:id'))?>" >个人资料</a></li>
						<li class="manage_frame_nav" style="float:right;width:200px;position:relative"></li>
    				</ul>
				</div>            
                <div class="bm_c" >
					<div class="tl">
						<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
                            <input type="hidden" name="formhash" value="be406b22" />
                            <input type="hidden" name="delthread" value="true" />
<table cellspacing="0" cellpadding="0" class="space_thread_table" >
	<tr class="space_th" >
		<td class="icn">&nbsp;</td>
		<th>
                   
           	<p class="space_tbmu">
            <?php 
			if($typeid != 2){
		?>     
                <a id="ch1" href="javascript:;"  class="a">发表</a>
                <span class="pipe">|</span>
                <a id="ch2" href="javascript:;" onclick="chStatus2()" class="">回复</a>
                <?php
			}else{
		?>
                <a id="ch11" href="javascript:;"  class="" onclick="chStatus11()">发表</a>
                <span class="pipe">|</span>
                <a id="ch22" href="javascript:;"  class="a" >回复</a>
           <?php
			}
		 ?>
           </p>
           
        
                
         
           <script>
				function chStatus11(){
					//alert('1');
					var xmlhttp;
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();	
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 	
					}
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							if(xmlhttp.responseText == "1"){
								window.location.href="<?= URL('bbsUser.user_thread',"typeid=1&id=$uuid")?>";	
							}else{
								alert(xmlhttp.responseText);
								document.getElementById('ch1').style.display="none";
								document.getElementById('ch11').style.display="";
								document.getElementById('ch22').style.display="";
								document.getElementById('ch2').style.display="none";	
							}	
						}	
					}
					xmlhttp.open("GET","<?= URL('bbsUser.user_thread1')?>",true);
					xmlhttp.send();
					
				}
				function chStatus2(){
					//alert('2');
					var xmlhttp;
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();	
					}else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 	
					}
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							if(xmlhttp.responseText == "1"){
								window.location.href="<?= URL('bbsUser.user_thread',"typeid=2&id=$uuid")?>";
							}else{
								//alert(xmlhttp.responseText);
								document.getElementById('ch2').style.display="";
								document.getElementById('ch11').style.display="none";
								document.getElementById('ch1').style.display="";
								document.getElementById('ch22').style.display="none";	
							}	
						}	
					}
					xmlhttp.open("GET","<?= URL('bbsUser.user_thread1')?>",true);
					xmlhttp.send();
				}
           </script>
        </th>
          <td class="frm">版块</td><td class="num">回复/查看</td>
       <td class="by"><cite>发表时间</cite></td>
	</tr>
      
        <?php
		if($typeid != 2){
            if(!empty($thread1)){
				foreach($thread1 as $tk => $tv){
		?>
        <tr>
        	<td class="icn">&nbsp;</td>
        <th class="scontent"><a href="<?= URL('bbs.thread_detail',"tid=".$tv['tid'])?>" target="_blank" ><?= $tv['subject']?></a></th>
        <td><a href="<?= URL('bbs.thread')?>" class="forum" target="_blank"><?= $tv['typeid']?></a></td>
        <td class="num">
            <div class="sreply" ><a href="<?= URL('bbs.thread_detail',"tid=".$tv['tid'])?>" class="xi2" target="_blank"><?= $tv['replies']?></a></div>
            <div class="sview" ><?= $tv['views']?></div>
        </td>
        <td class="by">
            <div class="sview" ><a href="<?= URL('bbs.thread_detail')?>" target="_blank"><?= date('Y-m-d',$tv['dateline'])?></a></div>
        </td>
	</tr>
    <?php
			}
		}
	}else if($typeid == 2){
		if(empty($thread1)){
			foreach($thread1 as $hk => $hv ){
	?>
    <tr><td class="icn">&nbsp;</td>
	<th class="scontent"><a target="_blank" href="#">帖子ID<?= $hv['pid']?></a></th>
	<td><a target="_blank" class="forum" href="#"><?= $hv['tid']?></a></td>
	<td class="num">
		<div class="sreply"><a target="_blank" class="xi2" href="#">15</a></div>
		<div class="sview">282</div>
	</td>
	<td class="by">
		<div class="sview">
        	<a target="_blank" href="#"><?= date('Y-m-d',$hv['dateline'])?></a>
		</div>
	</td></tr>
	<tr>
		<td class="xg1" colspan="5">
			<div class="guide_list_replay">                            	
            	<div class="tl_reply">
					<a target="_blank" href="#">回复主题&nbsp;:&nbsp;<?= $hv['comment']?></a>
                </div>
                <div class="arrow_guidelist"></div>
            </div>
        </td>
	</tr>
	<?php
			}
		}
	}
	?>   	
</table>
</form>
			</div>
            <?php
            	if(!empty($thread1)){
			?>
			<div class="pgs cl mtm pagebar">
				<div class="pg"><a href="<?= URL('#')?>" class="nxt">下一页</a></div>
			</div>
           	<?php
				}
			?>		
			<script type="text/javascript">
                function fuidgoto(fuid) {
                    window.location.href = 'home.php?mod=space&do=thread&view=we&fuid='+fuid;
                }
                function viewforumthread(fid) {
                    window.location.href = 'home.php?mod=space&uid=4040818&do=thread&view=me&order=dateline&from=space&fid='+fid;
                }
            </script>
			<div id="diycontentbottom" class="area"></div>
			</div>
		</div>
	</div>
</div>
<div class="cr"></div><div class="wp mtn"><div id="diy3" class="area"></div></div>
<?php TPL :: display('footer');?>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>