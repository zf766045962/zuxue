<? $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id') ?>
<? $nam=DS('publics._get','','users', "id= $id");?>
<? $all1=DS('publics.get_total','','bbs_post', "authorid =$id  "); ?>
<? $con=DS('publics._get','','bbs_postcomment', "pid =$id  and comment != '' and tid != 0 order by tid asc"); ?>
<? $all=DS('publics.get_total','','bbs_postcomment', "rpid = 0 and tid = $tid and comment != ''"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$nam[0]['username']?>的广播  魅族社区 </title>

<meta name="keywords" content="<?=$nam[0]['username']?>的广播" />
<meta name="description" content="<?=$nam[0]['username']?>的广播 ,魅族社区" />
<meta name="generator" content="MEIZU 2013" />
<meta name="author" content="MEIZU" />
<meta name="copyright" content="2003-2013 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
    <meta name="msapplication-tap-highlight" content="no" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel="stylesheet" type="text/css" href="css/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="css/style_1_home_follow.css" />
<script type="text/javascript">
	var STYLEID = '1', STATICURL = 'static/', IMGDIR = 'http://127.0.0.1/images/', VERHASH = 'WMI', charset = 'utf-8', discuz_uid = '9594205', cookiepre = 'MZBBS_2132_', cookiedomain = '', cookiepath = '/', showusercard = '0', attackevasive = '0', disallowfloat = 'login|newthread|tradeorder|activity|debate|usergroups|task', creditnotice = '', defaultstyle = '', REPORTURL = 'aHR0cDovL2Jicy5tZWl6dS5jbi9zcGFjZS11aWQtNDA0MDgxOC5odG1s', SITEURL = 'http://127.0.0.1/', JSPATH = 'http://127.0.0.1/js/';
// 是否是手机浏览器
	var BROWSER_IS_MOBILE	= 0;		
// 手机浏览器 1   
</script>
<script src="js/common.js" type="text/javascript"></script>
<meta property="wb:webmaster" content="f1284c3017204ff7" />
<meta property="qc:admins" content="1300463313655125636" />
<meta name="application-name" content="魅族社区" />
<meta name="msapplication-tap-highlight" content="no" />
<meta name="msapplication-tooltip" content="魅族社区" />
<meta name="msapplication-task" content="name=;action-uri=http://bbs.meizu.cn/portal.php;icon-uri=http://127.0.0.1/resources/images/portal.ico" /><meta name="msapplication-task" content="name=版块;action-uri=http://127.0.0.1:8004/forum.php;icon-uri=http://127.0.0.1/images/bbs.ico" />
<meta name="msapplication-task" content="name=;action-uri=http://127.0.0.1/group.php;icon-uri=http://127.0.0.1/images/group.ico" />
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/home.js" type="text/javascript"></script>
<script src="js/public.js" type="text/javascript"></script>
<script src="js/jquery.elements.js" type="text/javascript"></script>
</head>

<body id="nv_home" class="pg_follow" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<? TPL :: display("hd");?>
</div>
                
<div id="wp" class="wp"><style id="diy_style" type="text/css"></style>

            <div id="ct" class="ct2_a wp cl">
                <div id="meizu_space" >
        <div class="space_box">
        	<div class="meizu_name">
<span class="inner_uname"><?=$nam[0]['username']?></span>
                <a class="mzvip" href="#">
                	<img src="images/mzvip3_b.jpg" title="魅族产品认证用户" />
                <span class="cl"></span>
</div>
            <div class="avatar_img">
            	<a class="avatar"><img src="<?=$nam[0]['avatar']?>"  onerror="this.onerror=null;this.src='http://127.0.0.1/images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a>
            </div>
            
            <div class="top20" >
            	<div class="grid" >
                	<div class="number" ><?=$all1?></div>
                	<div class="explain" >帖子</div>
                </div>
                <div class="grid" >
                	<div class="number" >0</div>
                    <div class="explain" >收听</div>
                </div>
                <div class="grid" >
                	<div class="number" >800</div>
                    <div class="explain" >听众</div>
                </div>
                <div class="cr" ></div>
            </div>
        </div>
        <div  class="space_box cut_line" style="padding-top:10px;" >
        	<div>
<a id="followmod" class="social_listen normalbtn bluebtn" onclick="showWindow(this.id, this.href, 'get', 0);" href="#">收听</a>
 
            </div>
            
            <div>
                <div  style="float:left;" >
                    <a href="#" id="a_sendpm_4040818" onclick="showWindow('showMsgBox', this.href, 'get', 0)" title="发送消息" class="social_contact normalbtn graybtn w80">发消息</a>
                </div>
                
                <div style="float:left; margin-left:15px;" >
                                        <a href="#" id="a_friend_li_4040818" onclick="showWindow(this.id, this.href, 'get', 0);" class="xi2 social_contact normalbtn graybtn w80">加为好友</a>
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
                     <img src='images/meizu_product_pic/m032.png' class='png_bg' alt='MX 四核手机 数量:1' title='MX 四核手机 数量:1' ><img src='images/meizu_product_pic/m065.png' class='png_bg' alt='MX3 数量:2' title='MX3 数量:2' ><img src='images/meizu_product_pic/m040.png' class='png_bg' alt='MX2 数量:1' title='MX2 数量:1' >                </div>
                        
            
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
            	<div class="ct1 wp cl personal_onfo" >
    <div class=" ">

                                	<!-- 个人中心 -->
                <div class="page_frame_navigation" >
    <div class="follow_feed_cover" style="left:22px;" ></div>
    <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
        <li class="a" ><a href="<?= URL('bbsUser.user_broadcast')?>" >广播</a></li>
        <li  ><a href="<?= URL('bbsUser.user_thread')?>" >主题</a></li>
        <li  ><a href="<?= URL('bbsUser.user_info')?>" >个人资料</a></li>
<li class="manage_frame_nav" style="float:right;width:200px;position:relative">
</li>
    </ul>
</div>                               
<div class="flw_feed">
<ul id="followlist">
<? foreach($con as $k=>$v){?>
<? $con66=DS('publics._get','','bbs_post', "pid ='".$v['tid']."'"); ?>
<li class="cl" id="feed_li_3639169" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">

<?php 
							if(date('Y',time()) != date('Y',(int)$v['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$v['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$zhf['dateline'])){
								$$times =  date('m',time()) - date('m',(int)$v['dateline']).'个月前';
							}else if(date('d',(int)$v['dateline']) != date('d',time())){
								$$times =  date('d',time()) - date('d',(int)$v['dateline']).'天前';
							}else if(date('H',(int)$v['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$v['dateline']).'小时前';
							}else if(date('i',(int)$v['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$v['dateline']).'分钟前';
							}else if(date('s',(int)$v['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$v['dateline']).'秒前';
							}else {
								$times =  '刚刚';
								}									
						?>

<div class="feed_li_box" >      	            
            <div class="flw_article" style="margin-left:0; padding-left:0px;" >
                                <div class="flw_author">
                                        	<a class="name_feedlist" href="javascript:;"><?=$nam[0]['username']?>&nbsp;&nbsp;</a> 发表于 <span title="<?=date('Y-m-d h:i',(int)$v['dateline'])?>"><?=date('m月d号',(int)$v['dateline'])?></span>                                        
                                        	&nbsp;&nbsp;#<a href="<?= URL('bbs.thread','&fid='.$v['fid'])?>">产品讨论</a>
                                    </div>
                                <div class="flw_quotenote xs2 pbw">
                     <a href="#" target="_blank" ><?=$v['comment']?> <br />
</a>                 </div>
                <div class="flw_quote guide_list_replay">
<div class="arrow_guidelist"></div>
                   <?=$con66[0]['content']?>                                              
                <div class="xg1 cl">
								<div class="y flw_btnbar"><span class="y"><a href="javascript:;" id="relay_<?= $v['authorid']?>" onclick="quickrelay1(<?=$v['id']?>);">转播&nbsp; </a><a href="javascript:;" onclick="quickreply1(<?=$v['id']?>)">回复&nbsp; </a></span></div>
                            </div>
                		</div>
                        <div class="cr"></div>
            </div>
			
			
			
				<script>
		function quickrelay1(id){
			document.getElementById('relaybox_'+id).style.display = "block";
			}
		function quickrelay2(id){
			document.getElementById('relaybox_'+id).style.display = "none";
			}	
		function quickreply1(id){
			
			document.getElementById('replybox_'+id).style.display = "block";
			}
		function quickreply2(id){
			document.getElementById('replybox_'+id).style.display = "none";
			}	
		function insert(id){
			var yz = document.getElementById("load11").innerHTML
			var yz1 = document.getElementById("seccodeverify_SAyd29av01"+id).value
			var con = document.getElementById('postmessage_'+id).value;
			if(yz == yz1 && yz1.length != 0){
				if(con.length != 0 ){
		
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			  }else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
				xmlhttp.onreadystatechange=function(){
				 if (xmlhttp.readyState==4 && xmlhttp.status==200){
					location.href=''
					//document.getElementById("load11").innerHTML=xmlhttp.responseText;
					}
					 }
				xmlhttp.open("GET","<?=URL('bbs2.insers'),'&con='?>"+con+'&tid='+id,true);
				xmlhttp.send();	
			}else{
				alert('请输入内容')
				}	
			}else{
				alert('验证码不正确')
				}
			
			}	
		
		setTimeout('refreshCc()',3000)
		function refreshCc(id) { 
				var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								document.getElementById("load11").innerHTML=xmlhttp.responseText;
								//alert(xmlhttp.responseText)
								}
					}
						xmlhttp.open("GET","<?=URL('bbs2.yzz1') ?>",true);
						xmlhttp.send();			
						var ccImg = document.getElementById("checkCodeImg1"+id); 
						if (ccImg) { 
							ccImg.src= ccImg.src + '?' +Math.random(); 
						} 
		

							}
	</script>	
	<div id="load11" style="display:none"></div>			
					
					<div style="display:none" class="flw_replybox cl" id="relaybox_<?=$v['id']?>"><span style="margin: -23px 135px 0 0;" class="cnr"></span>
<form onsubmit="return ajaxpost2(this.id, 'return_qrelay_12918932');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">
<input type="hidden" value="true" name="relaysubmit">
<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
<input type="hidden" value="3554c853" name="formhash">
<input type="hidden" value="5313176" name="tid">
<input type="hidden" value="qrelay_12918932" name="handlekey">
            <span class="flw_autopt">
            	<textarea onkeyup="strLenCalc(this, 'checklen5313176', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea>
            </span>
            
            <div style=" margin:30px 0px;">

<div style="float:left; width:400px;" class="mtm sec identifying_code">
<input type="hidden" value="SAyd29av0" name="sechash">

验证码 <span onclick="showMenu({'ctrlid':this.id,'win':'qrelay_12918932'})" id="seccodeSAyd29av0"><input type="text" tabindex="1" onblur="checksec('code', 'SAyd29av0')" class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0<?=$v['id']?>" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>
        
<a class="xi2" onclick="updateseccode5('SAyd29av0','follow_rebroadcast');doane(event);" href="javascript:;">换一个</a>
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>
        
<script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>

</div>

</div>
                
                
                <button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button>
            	<label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>
                
                <div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div>
            	<div class="cr"></div>
            </div>
            


<div id="return_qrelay_12918932"></div>
</form>

<div class="cl closebar_replybox" onclick="quickrelay2(<?=$v['id']?>)">
<a class="y xg1" onclick="display('relaybox_12918932')" href="javascript:;"></a>
</div>

<script type="text/javascript">
$('note_5313176').focus();
function succeedhandle_qrelay_12918932(url, message, values) {
$('relaybox_12918932').style.display = 'none';
showCreditPrompt();
}
</script>
</div>
					
					
					
					
					
					<div style="display:none" class="flw_replybox cl" id="replybox_<?=$v['id']?>"><span class="cnr"></span>
<form class="mbm" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id, 'return_qreply_12918932', 'return_qreply_12918932', 'onerror');return false;" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
<input type="hidden" value="3554c853" id="formhash" name="formhash">
<input type="hidden" value="qreply_12918932" name="handlekey">
<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>

    <span class="flw_autopt">
    	<textarea rows="4" cols="80" class="pts" id="postmessage_<?=$v['id']?>" name="message"></textarea>
    </span>
    <div style="margin:30px 0px;">
        <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit<?=$v['id']?>" style="float:right; margin-left:20px;" type="submit" onclick="insert(<?=$v['id']?>)"><span>回复</span></button>
        <div class="cr"></div>
    </div>
    
<div class="mtm">
<input type="hidden" value="SAyd29av0" name="sechash">

<ul><li><em class="d">验证码</em><span><input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01<?=$v['id']?>" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>
        
<a class="xi2" onclick="refreshCc(<?=$v['id']?>)" href="javascript:;">换一个</a>
<img id="checkCodeImg1<?=$v['id']?>" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc(<?=$v['id']?>)">
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>
        
<script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>

</div></li></ul>

</div>
</form>
<ul class="list_replybox" id="newreply_5313176_12918932">

<? $re5 = DS('publics._get','','bbs_postcomment',"tid='".$con66[0]['pid']."' and rpid = 0 and comment != ''")?>
<? foreach($re5 as $k1=>$vv ){?>
<? if($k1 <= 5 ){?>
<li><a class="d xi2" href="space-uid-8385494.html"><?=$vv['author']?>&nbsp;&nbsp;</a><?=$vv['comment']?></li>
<? }else{?>
	<a class="xi2" target="_blank" href="<?= URL('bbs.thread_detail','&tid='.$v['tid'])?>">去论坛查看所有回复<em class="arrow_2"> </em></a>
<?	}?>
<? }?>
</ul>
<div class="cl closebar_replybox">
<a title="关闭" class="y xg1" onclick="quickreply2(<?=$v['id']?>)" href="javascript:;"></a>

</div>
<script type="text/javascript">
function succeedhandle_qreply_12918932(url, msg, values) {
var x = new Ajax();
x.get('forum.php?mod=ajax&amp;action=getpost&amp;inajax=1&amp;tid='+values.tid+'&amp;fid='+values.fid+'&amp;id='+values.id, function(s){
newli = document.createElement("li");
newli.innerHTML = s;
var ulObj = $('newreply_'+values.tid+'_12918932');
ulObj.insertBefore(newli, ulObj.firstChild);
$('postmessage_5313176_12918932').value = '';
if(values.sechash) {
updatesecqaa(values.sechash);
updateseccode(values.sechash);
$('seccodeverify_'+values.sechash).value='';
}
});

if(parseInt(values.feedid)) {
getNewFollowFeed(values.tid, values.fid, values.pid, values.feedid);
}
}
</script></div>
					
			
			
			
			
			
			
			
			
			
			
            <div id="replybox_3639169" class="flw_replybox cl" style="display: none;"></div>
            <div id="relaybox_3639169" class="flw_replybox cl" style="display: none;"></div>
<script type="text/javascript">
	spaceClosedFun();
</script>
        </div>
	
</li>
	<? }?>
</ul>

<div id="loadingfeed" class="flw_more"><a href="javascript:;" onclick="loadmore();return false;" class="xi2">更多 &raquo;</a></div>
<iframe id="downloadframe" name="downloadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<script type="text/javascript">
function succeedhandle_attachpay(url, msg, values) {
hideWindow('attachpay');
window.location.href = url;
//$('downloadframe').src = url;
}
</script>
</div>
<script type="text/javascript" reload="1" >
var scrollY = 0;
var page = 2;
var feedInfo = {scrollY: 0, archiver: 1, primary: 1, query: true, scrollNum:1};
var loadingfeed = $('loadingfeed');

function loadmore() {
var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
var sHeight = document.documentElement.scrollHeight;
if(currentScroll >= scrollY && currentScroll > (sHeight/5-5) && (feedInfo.primary ||feedInfo.archiver) && feedInfo.query) {
/*
if(feedInfo.scrollNum) {
loadingfeed.className="flw_loading hm vm";
loadingfeed.innerHTML = "<img src=\"http://bbs.res.meizu.com/resources/php/bbs/static/image/common/loading.gif\" class=\"vm\" /> 加载中...";
}
*/
feedInfo.query = false;
var archiver = 0;
if(feedInfo.primary) {
archiver = 0;
} else if(feedInfo.archiver) {
archiver = 1;
}

var url = 'home.php?mod=spacecp&ac=follow&op=getfeed&archiver='+archiver+'&page='+page+'&inajax=1'+'&uid=4040818&banavatar=1';
var x = new Ajax();

x.get(url, function(s) {
if(trim(s) == 'false') {
loadingfeed.innerHTML = "";
loadingfeed.style.margin = "-1px 0px 0px 0px";
if(!archiver) {
feedInfo.primary = false;
loadmore();
page = 1;
} else {
feedInfo.archiver = false;
page = 1;
}
} else {
$('followlist').innerHTML = $('followlist').innerHTML + s;
}
if(!feedInfo.primary && !feedInfo.archiver) {
loadingfeed.className = "";
loadingfeed.innerHTML = "";
}
feedInfo.query = true;
});
page++;
if(feedInfo.scrollNum) {
feedInfo.scrollNum--;
} else if(!feedInfo.scrollNum) {
window.onscroll = null;
}

}
scrollY = currentScroll;
}

window.onload = function() {
scrollY =  document.documentElement.scrollTop || document.body.scrollTop;
window.onscroll = loadmore;
}
</script>
<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--></div>
</div>
</div>
</div>
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<script type="text/javascript" reload="1">
checkFun(".wrap_simcheck","checked_simcheck");
// 头像浮动
adrift 	= new avatar_drift();
adrift.init();
function succeedhandle_followmod(url, msg, values) {
var numObj = $('followernum_'+values['fuid']);
if(numObj) {followernum = parseInt(numObj.innerHTML);}
if(values['type'] == 'add') {
if(values['from'] == 'head') {
if($('followflag')) $('followflag').style.display = '';
if($('unfollowflag')) $('unfollowflag').style.display = 'none';
if($('fbkname_'+values['fuid'])) $('fbkname_'+values['fuid']).style.display = '';
} else if($('a_followmod_'+values['fuid'])) {

$('a_followmod_'+values['fuid']).innerHTML = '取消收听';
$('a_followmod_'+values['fuid']).className = 'listen_off';
if(values['from'] != 'block') {
$('a_followmod_'+values['fuid']).className = 'flw_btn_unfo';
}
$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');

}
if(numObj) {
numObj.innerHTML = followernum + 1;
}

} else if(values['type'] == 'del') {
if(values['from'] == 'head') {
if($('followflag')) $('followflag').style.display = 'none';
if($('unfollowflag')) $('unfollowflag').style.display = '';
if($('followbkame_'+values['fuid'])) $('followbkame_'+values['fuid']).innerHTML = '';
if($('fbkname_'+values['fuid'])) {
$('fbkname_'+values['fuid']).innerHTML = '[添加备注]';
$('fbkname_'+values['fuid']).style.display = 'none';
}
} else if($('a_followmod_'+values['fuid']))  {
$('a_followmod_'+values['fuid']).innerHTML = '收听';
$('a_followmod_'+values['fuid']).className = 'listen_in';
if(values['from'] != 'block') {
$('a_followmod_'+values['fuid']).className = 'flw_btn_fo';
}
$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');
}
if(numObj) {
numObj.innerHTML = followernum - 1;
}
} else if(values['type'] == 'special') {
if(values['from'] == 'head') {
var specialObj = $('specialflag_'+values['fuid']);
if(values['special'] == 1) {
specialObj.className = 'flw_specialfo';
specialObj.innerHTML = '添加特别收听';
} else {
specialObj.className = 'flw_specialunfo';
specialObj.innerHTML = '取消特别收听';
}
specialObj.title = specialObj.innerHTML;
specialObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&special='+values['special']+'&fuid='+values['fuid']+'&from=head';
} else {
$('a_specialfollow_'+values['fuid']).innerHTML = values['special'] == 1 ? '添加特别收听' : '取消特别收听';
$('a_specialfollow_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=be406b22&special='+values['special']+'&fuid='+values['fuid'];
}
}
}
function changefeed(tid, pid, flag, obj) {
var x = new Ajax();
var o = obj.parentNode;
for(var i = 0; i < 4; i++) {
if(o.id.indexOf('original_content_') == -1) {
o = o.parentNode;
} else {
break;
}
}
x.get('forum.php?mod=ajax&action=getpostfeed&inajax=1&tid='+tid+'&pid='+pid+'&type=changefeed&flag='+flag, function(s){
o.innerHTML = s;
});
}
function vieworiginal(clickobj, id) {
var obj = $(id);
if(obj.style.display == 'none') {
obj.style.display =  '';
clickobj.innerHTML = '- 收起';
} else {
obj.style.display =  'none';
clickobj.innerHTML = '+ 展开全文';
}
}
ab = new img_move_float_box();
ab.init('follow_avatar');
</script>	
<? TPL :: display("footer");?>       
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/flow.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
