<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>回复信息 - 一路听天下   </title>

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
.xlda dl {
    padding-left: 0px;
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
        
		 <? $dare = DS('publics._get','','user_msgs',' id = '.V('r:id'));	?>
		 <? $info1 = DS('publics._get','','users','id='.$_SESSION['u_uidss']);?>
		
		<div class="mn cont_wp wp_space_pm float_l">
<div class="bm bw0 space">
        	
                            <div>
                    <div id="pt" class="bm cl breadnav_space">
                        <div class="z">
                            <a href="<?=URL('bbsUser.my_msgs')?>">个人消息</a> <em>&gt;</em>
                            <a href="javascript:void(0);">回复消息</a>
                        </div>
                    </div>
                </div>
                        
<!-- 对话 发布框 -->					
<a name="last"></a><div class="xld xlda pml space_pm_post" id="pm_ul_post">
                        	<form onsubmit="this.message.value = parseurl(this.message.value);ajaxpost('pmform', 'pmforum_return', 'pmforum_return');return false;" action="home.php?mod=spacecp&amp;ac=pm&amp;op=send&amp;pmid=4822438&amp;daterange=0&amp;handlekey=pmsend&amp;pmsubmit=yes" autocomplete="off" method="post" name="pmform" id="pmform">
                                <dl class="cl self_msgdetail">
                                    <dd class="avt head_msgdetail">
                                        <a href="<?=URL('bbsUser.user_broadcast','&id='.$info1[0]['id'])?>">
										<img src="<?=$info1[0]['head_img']==NULL?"images/w100h100.jpg":$info1[0]['head_img']?>"></a>
                                    </dd>
                                    <dd class="cont_msgdetail">
                                            <div class="tedt">
                                                <div class="area">
                                                    <textarea onkeydown="ctrlEnter(event, 'pmsubmit');" id="replymessage" class="pt" name="message" cols="40" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="arrow_msgdetail"></div>
                                            <input type="hidden" value="e41a08d0" name="formhash">
                                            <input type="hidden" value="9607427" name="topmuid">
                                    </dd>
                                </dl>
                                <p class="mtn btnbar_space_pm">
                                	<a class="normalbtn bluebtn"><button value="true" id="pmsubmit" name="pmsubmit" type="button" onclick="sendMsg()"><strong>发送</strong></button></a><span id="pmforum_return"></span>
                                </p>
                            </form>
</div>
<!--end 对话 发布框 -->

<div class="xld xlda mbm pml" id="pm_ul"><a name="last"></a> 

<? if(V('r:followuid') == $_SESSION['u_uidss']){
	$id1a =  V('r:uid');
	}else{	
	$id1a =  V('r:followuid');	}?>  
	
<? if(V('r:uid') == $_SESSION['u_uidss']){
	$id1b =  V('r:followuid');
	}else{	
	$id1b =  V('r:uid');	}?>  	
	
<? $con = DS('publics._get','','user_msgs',"(uid = '".$_SESSION['u_uidss']."' and followuid = '".$id1a."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$id1b."') and is_de1 != '".$_SESSION['u_uidss']."' and is_de12 != '".$_SESSION['u_uidss']."' order by sendTime desc");?>
<? foreach($con as $k=>$v){?>
				
	 <? if($v['followuid'] == $_SESSION['u_uidss']){?> 
	 <? $info = DS('publics._get','','users','id='.$v['uid']);	?>
		<dl class="bbda cl other_msgdetail" id="pmlist_<?=$v['id']?>" onmouseover="sshow(<?=$v['id']?>)">
<dd id="bottom" class="avt head_msgdetail">
<a target="_blank" href="<?=URL('bbsUser.user_broadcast','&id='.$info[0]['id'])?>"><img src="<?=$info[0]['head_img']==NULL?"images/w100h100.jpg":$info[0]['head_img']?>"></a>
</dd>
<dd class="cont_msgdetail">
        <div class="msg_msgdetail">
        	            	<em class="uname_msgdetail">
                                    <a target="_blank" href="<?=URL('bbsUser.user_broadcast','&id='.$info[0]['id'])?>"><?=$info[0]['username']?></a>
                                </em> <?=htmlspecialchars($v['message'])?> </div>
        <div class="conbar_msgdetail">
        	<div class="time_msgdetail"><span class="xg1"><span title="<?= date("m月d号 H:i",$v['sendTime'])?>"><?= date("m月d号 H:i",$v['sendTime'])?></span></span></div>
            <div class="btn_msgdetail">
            	  <a title="删除" onclick="delss(<?=$v['id']?>)" id="a_pmdelete_<?=$v['id']?>" href="javascript:;">删除</a>                  
                            </div>
        </div>
        
        <div class="arrow_msgdetail"></div>
</dd>
</dl>
	<? }else{?>	
	 <? $info22 = DS('publics._get','','users','id='.$_SESSION['u_uidss']);	?>
		<dl class="bbda cl self_msgdetail" id="pmlist_<?= $v['id']?>" onmouseover="sshow(<?=$v['id']?>)">

<dd class="avt head_msgdetail">
<a target="_blank" href="<?=URL('bbsUser.user_broadcast','&id='.$info22[0]['id'])?>"><img src="<?=$info22[0]['head_img']==NULL?"images/w100h100.jpg":$info22[0]['head_img']?>"></a>
</dd>
<dd class="cont_msgdetail">
        <div class="msg_msgdetail">
        	            	<em class="uname_msgdetail">
                                    <span class="xi2">我</span>
                                </em><?=htmlspecialchars($v['message'])?> </div>
        <div class="conbar_msgdetail">
        	<div class="time_msgdetail"><span class="xg1"><span title="<?= date("m月d号 H:i",$v['sendTime'])?>"><?= date("m月d号 H:i",$v['sendTime'])?></span></span></div>
            <div class="btn_msgdetail">
           <a title="删除" onclick="delss(<?=$v['id']?>)" id="a_pmdelete_<?=$v['id']?>" href="javascript:;">删除</a>
             </div>
        </div>
        
        <div class="arrow_msgdetail"></div>
</dd>
</dl>
	<? }?>	
	<? }?>	
<div style="display: none" id="pm_append"></div>
</div>

</div>
</div>
	
	</div>	
	</div>	
<script>
							function sshow(id){
								$(".btn_msgdetail a").attr("style","color:#e6e6e6 !important")
								$("#a_pmdelete_"+id).attr("style","color:black !important")
							}
							$("#deletepmform").mouseout(function(){
								$(".operation a").attr("style","color:#e6e6e6 !important")
								})
				function delss(id){
								
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								$("#pmlist_"+id).attr("style","display:none")
								
								}			
					}
						//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
						xmlhttp.open("POST","<?=URL("bbs2.dell222")?>"+'&id='+id,true);
						xmlhttp.send();		
						
		
								}
							</script>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script>
	 
	function sendMsg(){
		var message = document.getElementById('replymessage');
	
		if(message.value.length == 0){
			//alert('请输入收件人');
			document.getElementById('inner').innerHTML = "请输入信息内容";
			usr.focus();	
			return false;
		}
		
		if(message.value != ''){
			
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
						alert()
						alert(xmlhttp.responseText);	
					}
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.send_msg_finish',"&uid='".$info[0]['id']."'&username=".$info[0]['username'])?>"+'&message='+encodeURIComponent(message.value),true);
			xmlhttp.send();
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