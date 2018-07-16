<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 — 一路听天下 </title>

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_follow.css" />
<script src="js/bbsjs/common.js" type="text/javascript"></script>

<script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/bbsjs/forum.js" type="text/javascript"></script>
<!--<script src="js/bbsjs/public.js" type="text/javascript"></script>-->
<script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>   

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
<script>
	var uids2 =  '<?=$_SESSION['u_uidss']?>';
	var cc = "<?=V('r:ccid')?>"
		if(uids2 == '' && cc != 3){
			location.href = "<?=URL('login')?>"
		}	
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
.wp a{
	text-decoration:none; !important
	}		
</style>
</head>

<body id="nv_home" class="pg_follow" onkeydown="if(event.keyCode==27) return false;">
<div id="ajaxwaitid"></div>
<div id="hd"><!--导航-->

<? TPL :: display('head');
 	TPL :: display('headnav');
 ?>
 <div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
<?= TPL :: display('bbs/hd')?></div>          
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
    	<!--右侧导航开始-->
		<div class="back_left bdl ">
        	<dl class="a" id="lf_">
                <dt>个人中心</dt>
                <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_submit')?>" title="帖子">帖子</a></dd>
                <dd class="bdl_a" ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
                <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
                <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><dd ></dd><?php */?>
                <dd ><div style="height:18px; width:100%;"></div></dd>
             </dl>
		</div>
        <!--右侧导航结束-->
        
		
		
		<div class="mn cont_wp float_l">
<div class="bm bw0 page_frame_navigation">
<div style="left:

<?php
						if(V('r:ccid') == 3){
						echo '235';
						}else if(V('r:ccid') == 2){
						echo '129';
					}else{
						echo '22';
						}
					?>px;" class="follow_feed_cover"></div>
<ul style="padding-left:20px;" class="tb cl page_frame_ul">

<li <? if(V('r:ccid') == 1 or V('r:ccid') == NULL){
		echo 'class="a"';}
		?>><a href="<?=URL('bbsUser.my_follow','&ccid=1')?>">收听</a></li>
<li <?=V('r:ccid') == 2?'class="a"':''?>><a href="<?=URL('bbsUser.my_follow','&ccid=2')?>">听众</a></li>
<li <?=V('r:ccid') == 3?'class="a"':''?>><a href="<?=URL('bbsUser.my_follow','&ccid=3')?>">搜索</a></li>

</ul>
</div>
<? if(V('r:ccid') == 3){?>
<div class="relat_search">

<? if(V("r:searchsubmit") != 'true'){?>
<form method="post" action="">
<table cellspacing="0" cellpadding="0" class="tfm">
                        	<colgroup><col width="116px;">
                            <col width="662px;">
</colgroup><tbody><tr class="uname_relats">
<th>用户名</th>
<td><input type="text" class="px sbox2_relats" value="" name="username" id="usernamesss">
 <label class="wrap_simcheck" id="chch">
<span class="box_simcheck"></span><span>精确搜索</span>
<input type="checkbox" value="1" class="pc" name="precision2" id="precision22">
<input type="hidden" value="1" class="pc" name="precision3" id="precision33">
</label>
</td>
</tr>
<tr class="uid_relats">
<th>用户 ID</th>
<td><input type="text" class="px sbox2_relats" value="" name="uiid" id="uiid"></td>
</tr>
                            
<tr class="btnbar_relats">
<td colspan="2">
<input type="hidden" value="true" name="searchsubmit">
                                    <a class="normalbtn bluebtn">
<button class="pn normalbtn" type="button" id="srrach"><em>查找</em></button>
                                    </a>
</td>
</tr>
</tbody></table>
<input type="hidden" value="" name="op">
<input type="hidden" value="spacecp" name="mod">
<input type="hidden" value="search" name="ac">
<input type="hidden" value="all" name="type">
</form>
<? }else{?>


<div class="sresult_ulist">
<ul class="buddy cl relat_ulist">

<?
 if(V('r:precision3') == 1){
	$where .= 'username like '.'\''.'%'.V('r:username').'%'.'\'';
	}else{
	$where .= "username =  '".V('r:username')."'";	
	}
 if(V('r:uiid') != NULL){
	 $where .= " and id =  '".V('r:uiid')."'";
	 }	
	
 if(V('r:username') == "" and V('r:uiid') == ""){
	 $nall = 1;
	 }else{
	 $nall =0;	 
	 }		
	//echo $where;
?>
	
<? $mark=DS('publics.page_list','',24,$where,'last_login desc',V('g'),'users');?>
<? if(isset($mark['info']) && !empty($mark['info']) and $nall != 1){?>
<? foreach($mark['info'] as $k=>$v){?>
<? $ssyou3332 = DS('publics._get','','user_follow','followuid='.$v['id'] . ' and uid = '.$_SESSION['u_uidss'] );	?>	
	<li class="bbda cl">
	<div class="flw_avt"><a target="_blank" href="<?=URL('bbsUser.user_broadcast','&id='.$v['id'])?>" class="avatar">
	<img src="<?=$v['head_img']==NULL?"images/noavatar_big.gif":$v['head_img']?>">
	</span></a></div>
	<div class="cont_ulist">
	<h4 class="uname_sresult">
	<a style="color:#999999;" target="_blank" title="222" href="<?=URL('bbsUser.user_broadcast','&id='.$v['id'])?>"><?=$v['username']?></a>
	</h4>
	
	<div class="xg1">
	<a title="查看资料" onclick="" id="a_friend_328747" href="<?=URL('bbsUser.user_info','&id='.$v['id'])?>">查看资料</a>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a style="margin-left:15px;display:<?=$ssyou3332 == NULL?'':'none'?>" href="javascript:;" onclick="follow5(<?=$v['id']?>)" id="a_followmod23_<?=$v['id']?>" >收听</a>
	
	<a style="margin-left:15px;display:<?=$ssyou3332 == NULL?'none':''?>" href="javascript:;" onclick="follow6(<?=$v['id']?>)" id="a_followmod231_<?=$v['id']?>" >取消收听</a>
	
	</div>
	<div class="xg1">
	<a title="去串个门" id="a_friend_328747" href="<?=URL('bbsUser.user_broadcast','&id='.$v['id'])?>">去串个门</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a style="margin-left:15px" href="javascript:;" id="a_followmod556_<?=$v['id']?>" onclick="sendmessages(<?=$v['id']?>)">发送消息</a></div>
	
	
	
	</div>
	<div class="cr"></div>
	</li>

 <? }?>

 
 <? }else{?>
 <div class="tips_sresult"><h3>没有找到相关用户<a href="<?=URL('bbsUser.my_follow','&ccid=3')?>">换个搜索条件试试</a></h3></div>
 <? }?>
	
                                                                                                                              <li style="height:0px;margin:0px;padding:0px !important;" class="cr"></li>
</ul>
</div>
 <? if($mark['info'] != NULL){?>
 <div class="mtm pgs cl pagebar"><div class="">

 				<div class="pages">
					<?=$mark['pagehtml']?>
				</div>
 </div></div>
<? }?>

<? }?>
<input type="hidden" id="ididnmbb">
</div>
<script>
	$("#srrach").click(function(){
		location.href = "<?=URL('bbsUser.my_follow','&ccid=3'.'&username=')?>"+encodeURIComponent($("#usernamesss").val())+'&searchsubmit=true&precision3=1&precision3='+$("#precision33").val()+'&uiid='+$("#uiid").val()
		})
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
					$("#fwin_dialog").attr("style","position: fixed; z-index: 1301; left: auto; top: auto; right: 505px; bottom: 250px;")
		document.getElementById('alertaa').style='block';
		 
	
			setTimeout(function(){
			document.getElementById('alertaa').style.display = "none";
			},2000)
			
		document.getElementById('alert_error').innerHTML='发送成功';	
				}
			}
			xmlhttp.open("GET","<?=URL('bbs2.send'),'&con='?>"+encodeURIComponent(con)+'&id='+$("#ididnmbb").val(),true);
			xmlhttp.send();	
		}else{
			alert('请输入内容')
		}		
	}
	function hieddd(){
		$("#append_parent1").attr("style","display:none")
		}
	function sendmessages(id){
		var id22 = "<?=$_SESSION['u_uidss']?>";
	
		var top = $("#a_followmod556_"+id).offset().top
		var left = $("#a_followmod556_"+id).offset().left
	
		if(id22 != 0 ){	
		  $("#pmmessage").val("")	
		  $("#ididnmbb").val(id)
		  $.post( '<?=URL('bbs2.informations')?>',{id:id}, function( i )
		  {
			 	
			
			var strJSON1 = i;//得到的JSON
			var obj = eval( "(" + strJSON1 + ")" );//转换后的JSON对象
			
			$("#lookmessages").attr("href","<?=URL('bbs2.space','&uid=')?>"+id+'&followuid='+"<?=$_SESSION['u_uidss']?>")
			$("#kjianmessage").attr("href","<?=URL('bbsUser.user_broadcast','&id=')?>"+id)
			$("#sengimg").attr("src",obj.head_image)
			$("#namemessage").text(obj.username) 	
		   $("#append_parent1").attr("style","display:")
		  });
		}else{
			
			$("#fwin_followmod33").attr("style","position: absolute; z-index: 1301; left:"+left+"px; top:"+top+"px; ")
			document.getElementById('append_parent').style.display=""
			}
	//	$("#fwin_showMsgBox").attr("style","position: absolute; z-index: 1301; left:"+left+"px; top:"+top+"px; ")
		}
	function follow5(id){
	var id22 = "<?=$_SESSION['u_uidss']?>";
	
	
	var top = $("#a_followmod23_"+id).offset().top
		var left = $("#a_followmod23_"+id).offset().left
		if(id22 != 0 ){	
	  $.post( '<?=URL('bbs2.showwind')?>',{'id':id}, function( i )
	  {
		
		
		
		$("#fwin_dialog").attr("style","position: absolute; z-index: 1301; left:"+left+"px; top:"+top+"px; ")
		document.getElementById('alertaa').style='block';
		 
	
			setTimeout(function(){
			document.getElementById('alertaa').style.display = "none";
			},2000)
			
		document.getElementById('alert_error').innerHTML='收听成功';	  
		document.getElementById("a_followmod231_"+id).style.display='';
		document.getElementById("a_followmod23_"+id).style.display='none';
		 	
	
	  });
		}else{
			$("#fwin_followmod33").attr("style","position: absolute; z-index: 1301; left:"+left+"px; top:"+top+"px; ")
			document.getElementById('append_parent').style.display=""
			}
		}
	function follow6(id){
		
	  $.post( '<?=URL('bbs2.showwind1')?>',{'id':id}, function( i )
	  {
		var top = $("#a_followmod231_"+id).offset().top
		var left = $("#a_followmod231_"+id).offset().left
		
		$("#fwin_dialog").attr("style","position: absolute; z-index: 1301; left:"+left+"px; top:"+top+"px; ")
		document.getElementById('alertaa').style='block';
		 
			setTimeout(function(){
			document.getElementById('alertaa').style.display = "none";
			},2000)
		document.getElementById('alert_error').innerHTML='取消收听成功';	 
		
		document.getElementById("a_followmod23_"+id).style.display='';
		//$("#a_followmod_1"+id).attr("style","margin-left:14px;display:none")
		document.getElementById("a_followmod231_"+id).style.display='none';	  	
	
	  });
		}
	function hideMenu1(){
		document.getElementById('alertaa').style.display = "none";
		}		
	$("#precision22").click(function(){
		var num = $("#precision22").val()
		
		num1 = 1-num
		$("#precision22").val(num1)
		$("#precision33").val(num1)
		if(num1 == 1){
			$("#chch").attr("class","wrap_simcheck ")	
			}else{
			$("#chch").attr("class","wrap_simcheck checked_simcheck")
			}
		})	
		
		
		
</script>
<? }else if(V('r:ccid') == 2){?>
<div class="bm_c">
<ul class="flw_ulist relat_ulist">    
<?  $folowss22 = DS('publics._get','','user_follow','followuid='.$_SESSION['u_uidss']);	?>
<? if(isset($folowss22) && !empty($folowss22)){?>
<? foreach($folowss22 as $k=>$v){?>

<? $users2 = DS('publics._get','','users','id ='.$v['uid']);	?>	

<? $alls2=DS('publics.get_total','','user_follow', "uid= '".$v['uid']."'"); ?>
<? $alls3=DS('publics.get_total','','user_follow', "followuid = '".$v['uid']."'"); ?>

<? $shujects = DS('publics._get','','bbs_post','authorid ='.$v['uid'].' order by dateline desc limit 0,1');?>
<? $ssyou = DS('publics._get','','user_follow','followuid='.$v['uid'] . ' and uid = '.$_SESSION['u_uidss'] );	?>	
<? //var_dump($ssyou)?>
					<li class="cl">
<a class="flw_avt" id="edit_avt" title="<?=$users2[0]['username']?>" href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>">
                        <em class="avatar"><img src="<?=$users2[0]['head_img']==NULL?"images/noavatar_big.gif":$users2[0]['head_img']?>" style="cursor: pointer;">                        <span class="shadowbox_avatar"> </span></em>
</a>
								
          <a style="display:<?=$ssyou==NULL?"none":""?>" class="flw_btn_unfo flw_btn_eachother" onclick="qxstyh(<?=$v['id']?>,<?=$v['uid']?>)" href="javascript:;" id="a_followmod11_<?=$v['id']?>"><span class="icon_eachother"></span><span>取消收听</span></a>
								
		<a style="display:<?=$ssyou==NULL?"":"none"?>" class="flw_btn_fo" onclick="styh(<?=$v['id']?>,<?=$v['uid']?>)" href="javascript:;" id="a_followmod22_<?=$v['id']?>">收听</a>
								
                                <h6 class="pbn xs2 name_ulist"><a c="1" class="xi2" title="<?=$users2[0]['username']?>" href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><?=$users2[0]['username']?></a></h6>
<p class="xg1"><?=$shujects[0]['subject']==NULL?'这家伙很懒，什么都没有留下':$shujects[0]['subject']?></p>
<p class="ptm xg1 bar_ulist">
                            收听 <a ><strong class="xi2"><?=$alls2?></strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
听众 <a  class="xi2"><?=$alls3?></strong></a>

</p>
                        <script type="text/javascript">
						function qxstyh(id,uid){
							var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
												$("#a_followmod11_"+id).attr("style","display:none")
												$("#a_followmod22_"+id).attr("style","")
												
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind1")?>"+'&id='+uid,true);
										xmlhttp.send();	
									
							}	
						
							function styh(id,uid){
							var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
												$("#a_followmod11_"+id).attr("style","")
												$("#a_followmod22_"+id).attr("style","display:none")
												
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind")?>"+'&id='+uid+'&stat=2',true);
										xmlhttp.send();	
									
							}

                        </script>
                        </li>
						<? }?>
						<? }else{?>
		 
							<ul id="followlist">
							<div class="emp" style=" padding:20px 0px;">
								<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">您还没有听众</h2>
							</div>
						    </ul>
						
								
		 <? }?>
					
</ul>
<div class="bm bw0 pgs cl pagebar"></div>


</div>

<? }else{?>
<div class="bm_c">
<ul class="flw_ulist relat_ulist">  

<?  $folowss = DS('publics._get','','user_follow','uid='.$_SESSION['u_uidss']);	?>
<? if(isset($folowss) && !empty($folowss)){?>
<? foreach($folowss as $k=>$v){?>
<input type="hidden" id="statuss<?=$v['id']?>" value="0">
<? $user2 = DS('publics._get','','users','id ='.$v['followuid']);	?>	

<? $all2=DS('publics.get_total','','user_follow', "uid = '".$v['followuid']."'"); ?>
<? $all3=DS('publics.get_total','','user_follow', "followuid = '".$v['followuid']."'"); ?>

<? $shuject = DS('publics._get','','bbs_post','authorid ='.$v['followuid'].' order by dateline desc limit 0,1');	?>	
                    <li class="cl">
<a class="flw_avt" id="edit_avt" title="<?=$user2[0]['username']?>" href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>">
                        <em class="avatar"><img src="<?=$user2[0]['head_img']==NULL?"images/noavatar_big.gif":$user2[0]['head_img']?>">                        <span class="shadowbox_avatar"> </span></em>
</a>
<a class="flw_btn_unfo" onclick="qxst(<?=$v['id']?>,<?=$v['followuid']?>)" href="javascript:;" id="a_followmod_<?=$v['id']?>">取消收听</a>
<h6 class="pbn xs2 name_ulist"><a c="1" class="xi2" title="<?=$user2[0]['username']?>" href="<?=URL('bbsUser.user_broadcast','&id='.$v['followuid'])?>"><?=$user2[0]['username']?></a>&nbsp;<span class="xg1 xs1 xw0" id="followbkame_9607427"></span></h6>
                        <p class="xg1"><?=$shuject[0]['subject']==NULL?'这家伙很懒，什么都没有留下':$shuject[0]['subject']?></p>
<p class="ptm xg1 bar_ulist">
<? 
if($user2[0]['location_p'] != NULL and $user2[0]['location_c'] != NULL and $user2[0]['location_a'] != NULL){
	echo '来自：';
	echo $user2[0]['location_p'];
	echo '&nbsp;&nbsp;';
	echo $user2[0]['location_c'];
	echo '&nbsp;&nbsp;';
	echo $user2[0]['location_a'];
	
	}
?>
&nbsp;&nbsp;

收听 <a ><strong class="xi2"><?=$all2==NULL?"0":$all2?></strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
听众 <a ><strong id="followernum_9607427" class="xi2"><?=$all3==NULL?"0":$all3?></strong></a>


</p>
                        <script type="text/javascript">
						function qxst(id,fid){
							var stast = 1-parseInt($("#statuss"+id).val());
							$("#statuss"+id).val(stast)
							
							if($("#statuss"+id).val() == 1){
								
								
									var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
												
												$("#a_followmod_"+id).attr("class","flw_btn_fo")
												$("#a_followmod_"+id).text("收听")
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind1")?>"+'&id='+fid,true);
										xmlhttp.send();		
										
										
									
								}else{
									
									var xmlhttp;
									if (window.XMLHttpRequest){
												xmlhttp=new XMLHttpRequest();
									}else{
												xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									 }xmlhttp.onreadystatechange=function(){
												if (xmlhttp.readyState==4 && xmlhttp.status==200){
											
												$("#a_followmod_"+id).attr("class","flw_btn_unfo")
												$("#a_followmod_"+id).text("取消收听")
												
												}
											}
										xmlhttp.open("GET","<?=URL("bbs2.showwind")?>"+'&id='+fid,true);
										xmlhttp.send();	
									
									}			
	
							
							}
						
                        function succeedhandle_followmod(url, msg, values) {
var fObj = $('a_followmod_'+values['fuid']);
if(values['type'] == 'add') {
fObj.innerHTML = '取消收听';
fObj.className = 'flw_btn_unfo';
fObj.href = 'home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听';
fObj.className = 'flw_btn_fo';
fObj.href = 'home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=411141f6&amp;fuid='+values['fuid'];
}
}
                       	</script>
</li>

<? }?>
		 <? }else{?>
		 
							<ul id="followlist">
							<div class="emp" style=" padding:20px 0px;">
								<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">还没有收听其他用户</h2>
							</div>
						</ul>
						
								
		 <? }?>

                    
</ul>
<div class="bm bw0 pgs cl pagebar"></div>


</div>
<? }?>
</div>
		
		
		
	</div>
	</div>
   <!-- 取消关注js-->
<script>
	function del_follow(id){
		//alert('a_followmod_'+id);
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();	
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				//alert(xmlhttp.responseText)
				if(xmlhttp.responseText == "成功取消关注")	{
					document.getElementById('a_followmod_'+id).style.display = "none";
					document.getElementById('b_followmod_'+id).style.display = "block";
				}else{
					alert(xmlhttp.responseText);	
				}
			}
		}
		xmlhttp.open("GET","<?= URL('bbsUser.del_follow',"&fid=")?>"+id,true);
		xmlhttp.send();
	}
</script>
<!-- 添加关注js-->
<script>
	function add_follow(id){
		var xmlhttp;
		//alert('a_followmod_'+id);
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();	
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText == "成功添加关注")	{
					document.getElementById('a_followmod_'+id).style.display = "block";
					document.getElementById('b_followmod_'+id).style.display = "none";
				}else{
					alert(xmlhttp.responseText);	
				}
			}
		}
		xmlhttp.open("GET","<?= URL('bbsUser.add_follow',"&fid=")?>"+id,true);
		xmlhttp.send();
	}
</script>		
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
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<div id='alertaa' style="display:none">
<div style="position: absolute; z-index: 1301; left: 496px; top: 658px; " class="fwinmask" id="fwin_dialog" initialized="true"><style type="text/css">object{visibility:hidden;}</style><table cellspacing="0" cellpadding="0" class="fwin"><tbody><tr><td class="m_c"><h3 class="flb"><em>提示信息</em><span><a title="关闭" onclick="hideMenu1()" class="flbc" id="fwin_dialog_close" href="javascript:;">关闭</a></span></h3><div class="ie6_repair_minbox"> </div><div class="c altw"><div class="alert_error" id="alert_error"><p>抱歉，您尚未输入标题或内容</p></div></div><p class="o pns"><span class="z xg1">2 秒后窗口关闭</span></p></td></tr></tbody></table></div> 
<div id="fwin_dialog_cover" style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 1637px; background-color: rgb(0, 0, 0); opacity: 0.5;"></div>
</div>
<div style="display: none;" id="append_parent1">

		<div initialized="true" style="position: fixed; z-index: 1301; left: auto; top: auto; right: 505px; bottom: 190px;" class="fwinmask" id="fwin_showMsgBox">
		<?php /*?><div initialized="true" style="position: absolute; z-index: 1301; left: 502px; top: 99px;" class="fwinmask" id="fwin_showMsgBox"><?php */?>
		<style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td fwin="showMsgBox" style="" class="m_c login_showMsgBox" id="fwin_content_showMsgBox">
                    	<div class="pm pm_chat">
							<h3 style="cursor: move;" id="fctrl_showMsgBox" class="flb"><span><a href="javascript:;" onclick="hieddd();" class="flbc" title="关闭">关闭</a></span></h3>
							<div class="pm_tac bbda cl">
        						<div class="fll" id="namemessage"></div>   
								<a href="" class="pm_notes" id="lookmessages" target="_blank"><div class="pm_notes_icon"> </div>查看聊天记录<div class="cr"></div></a>
								<a href="" class="pm_space" id="kjianmessage" target="_blank"><div class="pm_space_icon"> </div>访问好友空间<div class="cr"></div></a>     	
								<div class="shadebox_chat"></div>
							</div>
        					<div class="pm_avatar"><img id="sengimg" src=""></div>        
							<div class="c">
								<ul fwin="showMsgBox" class="pmb" id="msglist"></ul>
								<script type="text/javascript">
                                    var refresh = true;
                                    var refreshHandle = -1;
                                </script>
								<div class="pmfm">
                                    <form fwin="showMsgBox" id="pmform_5057668" name="pmform_5057668" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;touid=5057668" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id,  'return_showMsgBox');refreshMsg();">
                                        <input type="hidden" name="pmsubmit" value="true">
                                        <input type="hidden" name="touid" value="5057668">
                                        <input type="hidden" name="formhash" value="c0954ebf">
                                    	<div fwin="showMsgBox" id="return_showMsgBox" class="xi1" style="margin-bottom:5px"></div>
										<input type="hidden" name="handlekey" value="showMsgBox">
										<div class="tedt">
											<div class="bar" style="display:none;">
                                            	<div class="fpd">
													<a fwin="showMsgBox" href="javascript:;" class="fsml" title="表情" id="pmsml" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"><em></em></a>
    												<a fwin="showMsgBox" id="pmimg" href="javascript:;" title="图片" class="fmg" onclick="seditor_fastUpload('pm', 'img');doane(event);"><em></em></a>   
												</div>
											</div>
											<div class="area">
												<textarea fwin="showMsgBox" rows="3" cols="80" name="message" class="pt" id="pmmessage" onkeydown="ctrlEnter(event, 'pmsubmit_btn');" autofocus=""></textarea>
												<input type="hidden" fwin="showMsgBox" name="messageappend" id="messageappend" value="">
											</div>
										</div>
										<div class="mtn pns cl" style="margin-top:20px;">
 											<button fwin="showMsgBox" type="button" class="pn normalbtn bluebtn" id="pmsubmit_btn1" onclick="send22()" style="width:96px !important;"><strong>发送</strong></button>
 											<div class="pma mtn z" style="display:none;"><a href="javascript:;" title="刷新" onclick="refreshMsg();"><img src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/pm-ico5.png" alt="刷新" class="vm"> 刷新</a></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</td>
				</tr></tbody>
			</table>
		</div>
		<div id="fwin_dialog_cover" style="position: fixed; z-index: 1300; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgb(0, 0, 0); opacity: 0.5;"></div>
	</div>
<div id="append_parent" name="append_parentlo" style="display:none">
		<div id="fwin_followmod33" class="fwinmask" style="position: absolute; z-index: 1301; left: 496px; top: 226px;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody><tr>
                	<td id="fwin_content_followmod" class="m_c" style="" fwin="followmod">
                    	<h3 class="flb" id="fctrl_followmod" style="cursor: move;"><em>提示信息</em><span><a title="关闭" onclick="hideWindow2();" class="flbc" href="javascript:;">关闭</a></span></h3>
						<div class="c altw">
							<div class="alert_error" id="alert_error">请先<a href="<?=URL('login')?>" target="_blank" >登录</a></div>
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
</body>
</html>