<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$titletop[0]['subject']?></title>



<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common2.css" /> 
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_viewthread.css" />
<script src="/js/bbsjs/tuji_emote.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery-1.js" type="text/javascript"></script>
<script src="/js/bbsjs/portal.js" type="text/javascript"></script>
<script src="/js/bbsjs/public.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery.js" type="text/javascript"></script>
<script src="/js/bbsjs/ping_hotclick.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/MjcxMTE4MTE.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/common.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>
<link rel="stylesheet" href="css/style.css" />
<link href="css/nav.css" rel="stylesheet" />
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
.mark span{
	
    background: inherit;
    display:initial;
    float: inherit;
    height: inherit;
    margin: inherit;
    position: inherit;
    width: inherit;

   
	}	
.preview-pic{
	 height:inherit;
	 }	

.mark em {
    font-style: inherit;
    height: inherit;
    left: inherit;
    line-height: inherit;
    position: inherit;
    top: 0;
}	
.preview-pic img {
	width:inherit; !important
	
}	
.preview-pic {
	width:inherit; !important
	}
.wp a{
	text-decoration:none; !important
	}		
</style>
</head>

				<? $tid= V('r:tid') == NULL?0:V('r:tid')?>
				
				<? $all2=DS('publics._get','','bbs_post', "pid= '".V('r:tid')."'");?>
<body id="nv_forum" class="pg_viewthread" onkeydown="if(event.==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
<?php
	TPL :: display('head');
	TPL :: display('headnav');
	?>
	<div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
	<?= TPL :: display('bbs/hd');?>                      
</div>                
<div id="wp" class="wp">
<script type="text/javascript">
	var fid = parseInt('22'), tid = parseInt('5285291');
</script>
<script src="js/bbsjs/forum_viewthread.js" type="text/javascript"></script>

<script type="text/javascript">
	zoomstatus = parseInt(0);var imagemaxwidth = '700';var aimgcount = new Array();
</script>
<style id="diy_style" type="text/css"></style>
	<div id="diynavtop" class="area"></div>
<style id="diy_style" type="text/css"></style>
	<div class="wp"><div id="diy1" class="area"></div></div>
	<div class="wp cl">
    	<?= TPL :: display('bbs/thread_right')?>
		
		<div id="ct" class="plate_mn postcontbox_mn">
		<div id="postlist" class="pl bm wp_postlist">
            <?php
				 TPL :: display('bbs/thread_content');
				?> 
				
				
				
				
					
				<div class="pl replypost_postlist">
					<h3 class="head_postlist cl"><span class="z"><em><?=$all2[0]['alltip']?></em>条回复</span><span class="y tofloor_postlist">
					<label id="fj_btn" class="z" title="跳转到指定楼层">楼层直达</label>
		<input type="text" class="p_fre z" id="p_fre" size="4" onkeyup="value=value.replace(/[^1234567890-]+/g,'');ssnn()"  onkeydown="if(event.keyCode==13 && this.value !== '' ) {location.href = ' <?=URL('bbs1.lctz','&fid='.V('r:fid').'&tid='.$tid.'&all='.$all2[0]['alltip'].'&lctz')?>'+document.getElementById('p_fre').value;return false;}"  /></span></h3>
<!--兼容删除的帖子直接跳过-->

<script>
	function tiaoz(){
	
		var zz = document.getElementById('p_fre').value; 
			alert(zz)
			alert(event.keyCode)
		if(event.keyCode==13 && zz != ''){
			
			}
		
	}
</script>



<? $num=DS('publics.get_total','','bbs_postcomment', "rpid = 0 and tid = $tid"); ?>

<?php
	 
	if($num%10 == 0){
		$num = ceil($num/10);	
		$num+=1;
		}else{
			$num = ceil($num/10);
			}
		
?>

<? $con=DS('publics.page_list','',10,"rpid=0 and tid=$tid and comment != ''",'id asc',V('g'),'bbs_postcomment');?>
<? if($con['info'] != NULL){?>
<? foreach($con['info'] as $k=>$val){?>
<? $fdnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".$val['id']."' and score = 1 and tid = $tid"); ?>
<? $zcnd=DS('publics.get_total','','bbs_postcomment', "rpid ='".$val['id']."' and score = 2 and tid = $tid"); ?>

<div id="post_118009247"  onmouseover="shuoshuo(<?=$val['id']?>)" class="item_postlist graybar_postlist" onclick="hid(<?=$val['id']?>)">
<table id="pid118009247" summary="pid118009247" cellspacing="0" cellpadding="0">
    <col width="64px" />
    <col width="594px"/>
    <tr id='<?=$val['id'] ?>'>
		<td class="pls" rowspan="2"> 
						<? $nam=DS('publics._get','','users', "id= '".$val['authorid']."'");?>
						<? $qianming=DS('publics._get','','user_info1', "uid= '".$val['authorid']."'");?>
						<div class="p_pop blk bui sign_card_user_box5" id="userinfo<?=$val['id']?>" style="display: none; margin-top: -11px; z-index:701;" onmouseout='hid(<?=$val['id']?>)'>
                        <div class="m z"><div id="userinfo118009247_ma" class="avatar">
						<a target="_blank" href="<?= URL('bbsUser.user_broadcast','&id='.$val['authorid'])?>" class="hidefocus"><img onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" src="<?= $nam[0]['head_img'] == NULL?'images/w100h100.jpg':$nam[0]['head_img']?>"><span class="shadowbox_avatar"> </span></a>
						</div></div>
						<div class="i y" >
							<div>
								<div class="sign_name" >
								
									<a href="<?= URL('bbsUser.user_broadcast','&id='.$val['authorid'])?>" target="_blank" class="xi2"><? echo $nam[0]['username']?></a><img src="images/mzvip3.jpg" class="mzvip"/>
                                    <a  target="_blank" class="mzpower" ><font color="#999999">
									<? 
									if($nam[0]['points'] < 50){
										echo '普通会员';
									}else if($nam[0]['points'] >= 50 and $nam[0]['points'] < 100  ){
										echo '铜牌会员';
									}else if($nam[0]['points'] >= 100 and $nam[0]['points'] < 150  ){
										echo '银牌会员';
									}else if($nam[0]['points'] >= 150 and $nam[0]['points'] < 300  ){
										echo '金牌会员';
									}else if($nam[0]['points'] >= 300 ){
										echo '钻石会员';
									}
									?>
									
</font></a>
									<div class="cr"></div>
                                </div>
							</div>
							<dl class="cl sign_info">
                                <dt>注册时间</dt><dd><?=date('m-d H:i:s',$nam[0]['addtime'])?></dd>
                                <!--<dt>最后登录</dt><dd><?=date('m-d H:i:s',$nam[0]['last_login'])?></dd>-->
                                <dt>个性签名</dt><dd><?=$nam[0]['hobby']?></dd>
                                <div class="cr" style="height:17px; overflow:hidden;">&nbsp;</div>
                                <?php /*?><dt>帖子</dt><dd>185</dd><?php */?>
								<? $all5=DS('publics._get','','integral',"uid= '".$val['authorid']."' limit 0,1");?>
                                <dt>积分</dt><dd><?=$all5==NULL?0:$all5[0]['integralAll']?></dd>
                                <?php /*?><dt>魅币</dt><dd>70</dd><?php */?>
                            </dl>
							<?php /*?><div class="mzpro_user_info">
 								<img src='images/meizu_product_pic/m9.png' class='png_bg' alt='M9 数量:1' title='M9 数量:1' >
                                <img src='images/meizu_product_pic/m8.png' class='png_bg' alt='M8 数量:1' title='M8 数量:1' >
                                <img src='images/meizu_product_pic/m040.png' class='png_bg' alt='MX2手机 数量:1' title='MX2手机 数量:1' >
							</div><?php */?>
                    		<div class="sign_user_info"><a href="<?= URL('bbsUser.user_broadcast','&id='.$nam[0]['id'])?>" target="_blank" title="查看详细资料"><em>更多资料</em><em class="arrow_2">&nbsp;</em></a></div>
							<div id="avatarfeed"><span id="threadsortswait"></span></div>
						</div>
						</div>
						<div>
							<div class="avatar head_uinfo" onmouseover="showauthor(this, 'userinfo118009247')" data-href="home.php?mod=space&amp;uid=1455083"><img src="<?= $nam[0]['head_img'] == NULL?'images/w100h100.jpg':$nam[0]['head_img']?>"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar" onmouseover="show(<?=$val['id']?>)" onmouseout="hidee(<?=$val['id']?>)" > </span></div>
						</div>
		</td>
		<td class="plc">
    					<div class="pi infobar_post">
<!--除开1楼的显示楼层数-->
							<div class="barr_post">
                				<strong class="z floor_infobar">
								
								<? $k1 =(($k+1)+((V('r:page')==NULL?1:V('r:page'))-1)*10)?>
								<? if($k1 == 1 ){
									echo '沙发';
									}else if($k1 == 2){
										echo '板凳';
									}else if($k1 == 3){
										echo '凉席';	
									}else if($k1 == 4){
										echo '地板';
									}else{
										echo $k1;
										echo '楼';
									} 						
								
								?>
								</strong>
       						</div>   
							<div class="pti barl_post">
								<div class="pdbt"></div>
                                <div class="authi"  >
                                	<a class="name_uinfo xw1" href="<?= URL('bbsUser.user_broadcast','&id='.$val['authorid'])?>" target="_blank"  title="<? echo $nam[0]['username']?>"><? echo htmlspecialchars($nam[0]['username'])?></a>
									<em class="userlevel_uinfo"><a class="mzvip" ><img src="images/mzvip3.jpg"  /></a><a target="_blank" class="mzpower" ><font color="#999999">
									<? 
									if($nam[0]['points'] < 50){
										echo '普通会员';
									}else if($nam[0]['points'] >= 50 and $nam[0]['points'] < 100  ){
										echo '铜牌会员';
									}else if($nam[0]['points'] >= 100 and $nam[0]['points'] < 150  ){
										echo '银牌会员';
									}else if($nam[0]['points'] >= 150 and $nam[0]['points'] < 300  ){
										echo '金牌会员';
									}else if($nam[0]['points'] >= 300 ){
										echo '钻石会员';
									}
									?>
									
									</font></a><span class="cr"></span></em>
                <span id="authorposton118009247"><span title="<?=date('Y-m-d H:i:s',(int)$val['dateline'])?>">
					<?php 
							if(date('Y',time()) != date('Y',(int)$val['dateline'])){
								echo date('Y',time()) - date('Y',(int)$val['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$val['dateline'])){
								echo date('m',time()) - date('m',(int)$val['dateline']);
								echo '个月前';
							}else if(date('d',(int)$val['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$val['dateline']);
								echo '天前';
							}else if(date('H',(int)$val['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$val['dateline']);
								echo '小时前';
							}else if(date('i',(int)$val['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$val['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$val['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$val['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
						?>
				</span></span>
								</div>
                			</div>
						</div>
						<div class="pct postcont_postlist fontsizelimit">
							<div class="pcb">
								<div class="t_fsz">
<table cellspacing="0" cellpadding="0">
	<tr>
    	<td class="t_f" id="postmessage_118009247" style="padding:0px 40px 0px 0px">
        							<div><?=htmlspecialchars($val['comment'])?></div>
        </td>
    </tr>
</table>
							</div>
    			 <div id="comment_118009274" class="cm comment_post"  >
    	<div class="comminner_post" >
        	<div class="pstl">
<!--<div class="psta"><a href="space-uid-1746854.html" c="1"><img src="http://img.res.meizu.com/img/download/uc/17/46/85/40/00/1746854/w50h50"  onerror="this.onerror=null;this.src='http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif'" /></a></div>-->
<? $con11=DS('publics._get','','bbs_postcomment', "rpid='".$val['id']."' and comment != '' and tid = $tid order by id asc"); ?>
<? foreach($con11 as $zhf){?>
						
<?php 
							if(date('Y',time()) != date('Y',(int)$zhf['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$zhf['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$zhf['dateline'])){
								$$times =  date('m',time()) - date('m',(int)$zhf['dateline']).'个月前';
							}else if(date('d',(int)$zhf['dateline']) != date('d',time())){
								$$times =  date('d',time()) - date('d',(int)$zhf['dateline']).'天前';
							}else if(date('H',(int)$zhf['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$zhf['dateline']).'小时前';
							}else if(date('i',(int)$zhf['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$zhf['dateline']).'分钟前';
							}else if(date('s',(int)$zhf['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$zhf['dateline']).'秒前';
							}else {
								$times =  '刚刚';
								}									
						?>
						
<div class="psti" id="<?=$zhf['id']?>" >
<a href="<?= URL('bbsUser.user_broadcast','&id='.$zhf['authorid'])?>" class="xi2 uname_pasth" title="<?=$zhf['author']?>"><?=$zhf['author']?></a><a class="comcont_pasth"  title="<?=$zhf['comment']?>">&nbsp;&nbsp;<?=htmlspecialchars($zhf['comment'])?></a><span class="xg1 comm_pasth"><span title="<?=date('Y-m-d H:i',(int)$zhf['dateline'])?>">
<?php echo $times;?>						
</span>
</span>
<span class="cr"> </span>
</div>
<? }?>
</div>
  </div>
</div>
</div></div>

</td></tr>
<tr><td class="plc plm">

</td>
</tr>
<tr>
<td class="pls"></td>
			
        <td class="plc cbar_postlist">
						<div class="score_post"><a title="评分" class="xi2" id="fontsss<?=$val['id']?>"><?=3*($zcnd - $fdnd)?> 分</a></div>
						<div class ='tipBox<?=$val['id']?>' id="tipBox<?=$val['id']?>" style="margin-top:-10px; margin-left:440px; display: none; background-color: #fe9233;
    color: #ffffff;
    line-height: 24px;
    max-width: 300px;
    padding: 6px 10px;
    position: absolute; "></div> 
						<div class="po cbarbox_postlist">
							<div class="pob" >
							<? if($_SESSION['u_uidss'] != NULL){?>
								<a class="fastre" href="#f_pst" id='sb' data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009247&amp;extra=page%3D1&amp;page=1" 
								onclick="idd(<?=$val['id']?>) ">回复</a>
							<?	}else{?>
								<a class="fastre"  href='javascript:;' id='sb' data-href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;repquote=118009247&amp;extra=page%3D1&amp;page=1" 
								onclick="idd1(<?=$val['id']?>) ">回复</a>
							<?	}?>
								<a id="<?='id'.$val['id']?>" class="support_oppose" href="javascript:;" onclick="con(<?=$val['id']?>)" title="<?=$fdnd?> 人反对" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=0&amp;tid=5285291&amp;pid=118009247&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" ><i>反对</i></a>
								
								<a id="<?='upid'.$val['id']?>" class="support_oppose" href="javascript:;"  onclick="up(<?=$val['id']?>)" title="<?=$zcnd != NULL?$zcnd:0 ?> 人支持" data-href="forum.php?mod=misc&amp;action=rate_extend&amp;support=1&amp;tid=5285291&amp;pid=118009247&amp;ratesubmit=yes&amp;infloat=yes&amp;page=1&amp;infloat=yes&amp;handlekey=rate&amp;inajax=1&amp;formhash=10149d6d&amp;ajaxtarget=fwin_content_rate" ><i>支持</i></a>
								<div id="action_plist_<?=$val['id']?>_menu" onmouseout="hidemenu(<?=$val['id']?>)" class="p_pop" style="width: 118px; position: absolute; z-index: 701; margin: 22px 170px; display: none;">
                    				<a class="float_l" href="forum.php?mod=viewthread&amp;tid=5285291&amp;page=1&amp;authorid=1455083" rel="nofollow">只看该作者</a>
									<a class="float_l" href="javascript:;" onclick="hideMenu('action_plist_118009247_menu','');showWindow('miscreport118009247', 'misc.php?mod=report&rtype=post&rid=118009247&tid=5285291&fid=22', 'get', -1);return false;">举报</a>
								</div>
								<?php /*?><em  ><a class="showmenu action_postlist" id="action_plist_<?=$val['id']?>" onmouseover="showMenu1(<?=$val['id']?>)" href="javascript:;" hidefocus="true">操作<span class="arrow_gray"></span></a></em><?php */?>
								<?php /*?><div id='nmb<?=$val['id']?>' style="background:red;border:1px solid red;width:70px;height:40px;margin-left:210px;position: absolute;margin-top:-9px;"></div><?php */?>
										
								<div class="cr"></div>
							</div>
          				</div><div class="cr"></div>
		</td>
	</tr>
	<tr class="ad"></td></tr>
</table>
<!--兼容删除的帖子普通用户直接跳过-->
					</div>
					<div id='cs'></div>
					
<?	} ?>
<? }?>
				
	<script>
	
	function show(id){
		
		//vart=setTimeout(function(){
			document.getElementById('userinfo'+id).style.display = "block";
			//},500)
		//vart=setTimeout(function(){
		//	document.getElementById('userinfo'+id).style.display = "none";
		//	},3000)	
		}
	
	function hid(id){
		document.getElementById('userinfo'+id).style.display = "none";
		}	
	</script>						
	<script>
		function showMenu1(id){
			//document.getElementById('action_plist_'+id+'_menu').style.display="block";
		};
		
		function hidemenu(id){
			document.getElementById('action_plist_'+id+'_menu').style.display="none";
		};	
		
		function shuoshuo(id){
		(function(){
			
			var oDiv=document.getElementById('action_plist_'+id+'_menu');
			var oDiv1=document.getElementById('userinfo'+id);
			var oBox2=document.getElementById('nmb'+id);
			oDiv.onmouseover=function(){
				this.style.display='block';
			};	
			oDiv1.onmouseover=function(){
				this.style.display='block';
			};
			oBox2.onmouseout=function(){
				document.getElementById('action_plist_'+id+'_menu').style.display='none';
			};	
			

			
		})();
		}
		
		function con(id){
			
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
				if(xmlhttp.responseText == '请先登录'){
					document.getElementById('tipBox'+id).style.display="block";
					document.getElementById('tipBox'+id).innerHTML="请先，<a onclick='showPop();' href='javascript:void(0);'>登录</a>";
					vart=setTimeout(function(){
					document.getElementById('tipBox'+id).style.display = "none";
					},2000)
					}else if(xmlhttp.responseText == '不能重复反对'){						
					document.getElementById('tipBox'+id).style.display="block";
					document.getElementById('tipBox'+id).innerHTML='抱歉，不能重复反对';
					vart=setTimeout(function(){
					document.getElementById('tipBox'+id).style.display = "none";
					},1000)
					}else if(xmlhttp.responseText == '你已经支持过了'){
						document.getElementById('tipBox'+id).style.display="block";
						document.getElementById('tipBox'+id).innerHTML='抱歉，你已经支持过了';
						vart=setTimeout(function(){
						document.getElementById('tipBox'+id).style.display = "none";
						},1000)
						}else{
							
							var soc = document.getElementById('fontsss'+id).innerHTML;	
							document.getElementById('fontsss'+id).innerHTML = (parseInt(soc)-3)+'&nbsp;'+'分';	
							document.getElementById('id'+id).title=xmlhttp.responseText;
							
						document.getElementById('tipBox'+id).style.display="block";
						document.getElementById('tipBox'+id).innerHTML='反对成功';
						vart=setTimeout(function(){
						document.getElementById('tipBox'+id).style.display = "none";
						},1000)
							
							
							}
			  }}
			xmlhttp.open("GET","<?=URL('bbs1.con','&tid='.$tid.'&cc=')?>"+id,true);
			xmlhttp.send();
			}
			
		function up(id){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
					
				if(xmlhttp.responseText == '请先登录'){
					document.getElementById('tipBox'+id).style.display="block";
					document.getElementById('tipBox'+id).innerHTML="请先，<a onclick='showPop();' href='javascript:void(0);'>登录</a>";
					vart=setTimeout(function(){
					document.getElementById('tipBox'+id).style.display = "none";
					},2000)
					}else if(xmlhttp.responseText == '不能重复支持'){
					document.getElementById('tipBox'+id).style.display="block";
					document.getElementById('tipBox'+id).innerHTML='抱歉，不能重复支持';
					vart=setTimeout(function(){
					document.getElementById('tipBox'+id).style.display = "none";
					},1000)
					}else if(xmlhttp.responseText == '你已经反对过了'){
						document.getElementById('tipBox'+id).style.display="block";
						document.getElementById('tipBox'+id).innerHTML='抱歉，你已经反对过了';
						vart=setTimeout(function(){
						document.getElementById('tipBox'+id).style.display = "none";
						},1000)
						}else{
							var soc = document.getElementById('fontsss'+id).innerHTML;	
							document.getElementById('fontsss'+id).innerHTML = (parseInt(soc)+3)+'&nbsp;'+'分';
							document.getElementById('upid'+id).title=xmlhttp.responseText;
							
						document.getElementById('tipBox'+id).style.display="block";
						document.getElementById('tipBox'+id).innerHTML='支持成功';
						vart=setTimeout(function(){
						document.getElementById('tipBox'+id).style.display = "none";
						},1000)
							
							
							}	
				}
			  }
			xmlhttp.open("GET","<?=URL('bbs1.up','tid='.$tid.'&cc=')?>"+id,true);
			xmlhttp.send();
			}	
			
			
	</script>				
	<script>
		function close1(){
			document.getElementById('sbhl').style.display = "";
			document.getElementById('ss').style.display = "block";
			document.getElementById('aa').style.display = "none";	
			document.getElementById('yc1').style.display = "none";
			document.getElementById('yc').style.display = "block";
			document.getElementById('fastposthiddenview').style.display = "none";
			}
		function idd1(id){
			document.getElementById('tipBox'+id).style.display="block";
			document.getElementById('tipBox'+id).innerHTML="请先，<a onclick='showPop();' href='javascript:void(0);'>登录</a>";
			vart=setTimeout(function(){
					document.getElementById('tipBox'+id).style.display = "none";
					},2000)
			}	
		function idd(id){
			<?php /*?>if(<? $_SESSION['u_uid'] == NULL?>){
				document.getElementById('tipBox'+id).style.display="block";
				document.getElementById('tipBox'+id).innerHTML="请先，<a href='<?=URL('login')?>'>登录</a>";
				}else{<?php */?>
			document.getElementById('sbhl').style.display = "none";
			document.getElementById('ss').style.display = "none";
			document.getElementById('aa').style.display = "block";
			document.getElementById('yc').style.display = "none";
			document.getElementById('yc1').style.display = "block";
			document.getElementById('fastposthiddenview').style.display = "block";
			var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("namess").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?=URL('bbs1.name1','&cc=')?>"+id,true);
xmlhttp.send();	




			var xmlhttp1;
if (window.XMLHttpRequest)
  {
  xmlhttp1=new XMLHttpRequest();
  }
else
  {
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
    document.getElementById("cont").innerHTML=xmlhttp1.responseText;
    }
  }
xmlhttp1.open("GET","<?=URL('bbs1.con2','&cc=')?>"+id,true);
xmlhttp1.send();


	var xmlhttp2;
if (window.XMLHttpRequest)
  {
  xmlhttp2=new XMLHttpRequest();
  }
else
  {
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
    document.getElementById("zhf").innerHTML=xmlhttp2.responseText;
    }
  }
xmlhttp2.open("GET","<?=URL('bbs1.zhfid','&cc=')?>"+id,true);
xmlhttp2.send();	
			
			}
	</script>				
					
					


<script type="text/javascript" reload="1">
aimgcount[118009377] = ['m2zn3'];
attachimggroup(118009377);
attachimgshow(118009377);
var aimgfid = 0;
</script>

<!--兼容删除的帖子普通用户直接跳过-->
<?php /*?></div><?php */?>
<!--兼容删除的帖子普通用户直接跳过-->
				<div id="postlistreply" ><div id="post_new" class="viewthread_table item_postlist graybar_postlist" style="display: none"></div></div>
				<div class="footdiv_post">
                    <form method="post" autocomplete="off" name="modactions" id="modactions">
                        <input type="hidden" name="formhash" value="10149d6d" />
                        <input type="hidden" name="optgroup" />
                        <input type="hidden" name="operation" />
                        <input type="hidden" name="listextra" value="page%3D1" />
                        <input type="hidden" name="page" value="1" />
                    </form>
					
					<div class="dividingline"></div>
					<div class="pgs mtm mbm cl pagebar">
						<span class="y"><a class="graybtn normalbtn" href="<?=URL('bbs.thread','&fid='.V('r:fid'))?>">返回列表</a></span>
						<?= !empty($con['info'])?$con['pagehtml']:''?>
						<?php /*?><div class="pg">
						<div class="pages">
						<?= !empty($con['info'])?$con['pagehtml']:''?>
							
						</div>
							<a class="prev disprev"><em class="previcon"></em></a><strong>1</strong><a href="#">2</a><a href="#">3</a><a href="thread-5285291-4-1.html">4</a><a href="#" class="last">... 14</a><a href="#" class="nxt"><em class="nxticon"></em></a>
						</div><?php */?>
					</div>
				</div>
			</div>
			<div id="diyfastposttop" class="area"></div>
<script type="text/javascript">
	var postminchars = parseInt('0');
	var postmaxchars = parseInt('50000');
	var disablepostctrl = parseInt('0');
</script>
			<div id="f_pst" class="pl bm bmw replybox_post" style="position: relative;overflow: hidden;">
			
			<? if($_SESSION['u_uidss'] == NULL){?>
			<div align="center" class="ui-mask" data-widget-cid="widget-0" style=" line-height:135px;position: absolute; width: 592px; height: 135px; margin-left:1px;margin-top:2px;z-index: 998; display: block; opacity: 1; background-color: rgb(249,249 ,249);">
    		 您需要登录后才能回复&nbsp;&nbsp;&nbsp;&nbsp;   
				<a href="<?=URL('login')?>" class="xi2" style="color:#32A5E7">登录</a>
        <a class="separator"></a>&nbsp;
   
   		 <img src="images/shug.png" style="margin-left:-9px" height='10px'>
    
				<a href="<?=URL('login.register')?>" class="xi2" style="color:#32A5E7">立刻注册</a>
</div>
<? }?>

				<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291&amp;extra=page%3D1&amp;replysubmit=yes&amp;infloat=yes&amp;handlekey=fastpost" onSubmit="return fasteditpostvalidate(this)">
				<span id="fastpostreturn"></span>
				
				<!--style="height:auto;"-->
				<div style="display:none;" id="fastposthiddenview"><div class="quote"><blockquote><font class="msginfo_quote"><font color="#999999" id='namess'></font> <img border="0" width="18" height="15" alt="" onload="thumbImg(this)" onmouseover="img_onmouseoverfunc(this)" src="images/mzvip3.jpg" class="zoom" onclick="zoom(this, this.src, 0, 0, 0)" id="aimg_KNe11"> </font><font class="cr"></font><p id='cont'></p></blockquote></div><div onclick="close1()" style="cursor: pointer;
    height: 24px;
    position: absolute;
    right: 35px;
    top: -10px;
    width: 54px" id="quoteDelBtn1"><img src="images/cl.png" ></div></div>
				
				
				<div id='yc1' style='display:none'>
					<textarea rows="6" cols="80" id='content2' value=''> </textarea>
					<?php /*?><div contenteditable="true" style="overflow-y: auto; overflow-x: hidden; height: 105px; width: 625px; margin-bottom: 10px; padding: 4px 5px; border: 1px solid rgb(204, 204, 204);outline:0 none;" id="content2">
					
					</div><?php */?>
					<?php /*?><textarea rows="6" cols="80" id='content2'> 
					 <?php */?>
					
				</div>
				<div id='yc'>
				<textarea rows="6" cols="80" id='content3' value=''  ></textarea> 
					<?php /*?><div contenteditable="true" style="overflow-y: auto; overflow-x: hidden; height: 105px; width: 625px; margin-bottom: 10px; padding: 4px 5px; border: 1px solid rgb(204, 204, 204);outline:0 none;" id="content3">
					
					</div><?php */?>
					<?php /*?><textarea rows="6" cols="80" id='content3' > 
					 <?php */?>
					
					<script>
						function s(e,a)
						{
							 if ( e && e.preventDefault )
									e.preventDefault();
							else 
							window.event.returnValue=false;
								a.focus();
								
						}
					</script>
				</div>
				<div class="cl" id='ycC' style="display:none">
					<div  id="fastposteditor">
						<div class="tedt mtn">
							<div class="bar">
							<span class="y advance_fastpost" id="advanceFastpost">
								<a href="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;tid=5285291" onclick="return switchAdvanceMode(this.href)">高级模式</a>
							</span>
							<div class="fpd">
									<a href="javascript:;" class="fsml" title="表情" id="fastpostsml" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"><em></em></a>
<script type="text/javascript" reload="1">smilies_show('fastpostsmiliesdiv', 8, 'fastpost');</script>
    								<a id="fastpostimg" href="javascript:;" title="图片" class="fmg" onclick="seditor_fastUpload('fastpost', 'img');doane(event);"><em></em></a>   
								</div>
<script src="js/bbsjs/seditor.js" type="text/javascript"></script>
<script src="js/bbsjs/bbcode.js" type="text/javascript"></script>
							</div>
                            <?php /*?><?php  
								if(isset($_SESSION['u_uid']) && $_SESSION['u_uid']>0){
							?><?php */?>
							<div class="area defaulttext_area ">
								<textarea rows="6" cols="80" name="message" id="fastpostmessage" onKeyDown="seditor_ctlent(event, 	'fastpostvalidate($(\'fastpostform\'))');" tabindex="4" class="pt" style="display: none;"></textarea>
                                <input type="hidden" value="1" name="wysiwyg" />
                                <input type="hidden" name="formhash" value="10149d6d"/>
                                <input type="hidden" name="usesig" value="" />
                                <input type="hidden" name="subject" value="  " />
                                <input type="hidden" name="reppost" value="">
                                <input type="hidden" name="reppid" value="">
                                <input type="hidden" name="noticeauthormsg" value="">
                                <input type="hidden" name="noticetrimstr" value="">
                                <input type="hidden" name="noticeauthor" value="">
								<div id="fastposthiddenview"></div>
							</div>
            <?php /*?>                <?php
								}else{
									
							?>
                            
                            <div class="area defaulttext_area ">
<div id="tipBoxLogin" class="pt hm tipbox_login">
您需要登录后才能回复&nbsp;&nbsp;&nbsp;<a class="xi2" href="<?= URL('bbsUser.login')?>">登录</a><a class="separator"></a><a class="xi2" href="<?= URL('bbsUser.register')?>">立刻注册</a>
</div>
</div>
                            <?php		
									}
							?>
		<?php */?>
							
						</div>
					</div>
				</div>
				
				<div class="mtm sec identifying_code">
					<input name="sechash" type="hidden" value="SsDkD4b0" />验证码 				
					<span id="seccodeSsDkD4b0" onclick="showMenu(this.id)"><input name="seccodeverify" id="seccodeverify_SsDkD4b0" type="text" autocomplete="off" style="ime-mode:disabled;width:100px" class="txt px vm" onblur="checksec1()" tabindex="1" />      
					
					<span class="seccode_image" id="seccode_SsDkD4b0_secshow">
						<input type="tex2t" tabindex="1" onblur="checksec1()" class="txt px vm" style="width: 100px;position: fixed;" autocomplete="off" id="seccodev321312erify_SsDkD4b0" name="secc2odeverify">
						
						</span> 
						<span id="seccode_SsDkD4b0_secshow" class="seccode_image" ></span>   
						
						    
						<?php /*?><a href="javascript:;" onclick="updateseccode5('SsDkD4b0','follow_rebroadcast');doane(event);" class="xi2">换一个</a><?php */?>
						<a href="javascript:;" onclick="refreshCc()" class="xi2">换一个</a>
						
						<?php /*?><span id="checkseccodeverify_SsDkD4b0" class="seccheck_status"><img src="images/none.gif" width="16" height="16" class="vm" /></span><?php */?>
						<span id="checkseccodeverify_SsDkD4b01" class="seccheck_status"><img id="checkCodeImg" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc()"/></span>
					</span>
					
					<div id='load11' style="display:none"></div>
					<div id='zhf' style="display:none"></div>
					<script>
					setTimeout('checksec1()',2000)
						function checksec1(){
							
											var xmlhttp;
												if (window.XMLHttpRequest)
												  {
												  xmlhttp=new XMLHttpRequest();
												  }
												else
												  {
												  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
												  }
												xmlhttp.onreadystatechange=function()
												  {
												  if (xmlhttp.readyState==4 && xmlhttp.status==200)
													{
													document.getElementById("load11").innerHTML=xmlhttp.responseText;
													}
												  }
												xmlhttp.open("GET","<?=URL('bbs1.yzz') ?>",true);
												xmlhttp.send();
																
							}
						function refreshCc() { 
										
										var xmlhttp;
												if (window.XMLHttpRequest)
												  {
												  xmlhttp=new XMLHttpRequest();
												  }
												else
												  {
												  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
												  }
												xmlhttp.onreadystatechange=function()
												  {
												  if (xmlhttp.readyState==4 && xmlhttp.status==200)
													{
													document.getElementById("load11").innerHTML=xmlhttp.responseText;
													}
												  }
												xmlhttp.open("GET","<?=URL('bbs1.yzz') ?>",true);
												xmlhttp.send();			
										
											
			var ccImg = document.getElementById("checkCodeImg"); 
							if (ccImg) { 
							ccImg.src= ccImg.src + '?' +Math.random(); 
							} 
							
							
							}

				function ss(){	
				
				//var msg = $("fastpostiframe").contentWindow.document.body.innerHTML;
				var content3 =document.getElementById("content3").value
				//var content3 =document.getElementById("content3").text
				//alert(content3)
				var ms =document.getElementById("load11").innerHTML;
				var ms1 =document.getElementById("seccodeverify_SsDkD4b0").value;	
				var con3 = content3.replace(/^(\s|\xA0)+|(\s|\xA0)+$/g, '');	
				if(ms1.length == 0){
					alert('请输入验证码')
				}else if(ms != ms1.toLowerCase()){
					alert('验证码不正确')		
					}else if(con3.length != 0){
						var chk = document.getElementById('fastpostrefresh');
						
							if($("#checkboxss").val() == 0){
								location.href='index.php?m=bbs1.connment'+'&names='+encodeURIComponent(con3)+'&tid='+<?=$tid?>+'&fid='+<?=V('r:fid')?>+'&page='+<?=$num?>;
							}else{
								location.href='index.php?m=bbs1.connment'+'&names='+encodeURIComponent(con3)+'&tid='+<?=$tid?>+'&fid='+<?=V('r:fid')?>; 
							}				
						
					}else{
						alert('您没输入任何内容')
						}	
					}
			function aa(){	
					
				var content2 =document.getElementById("content2").value
				//var content3 =document.getElementById("content3").value
				//var content2 =document.getElementById("content2").innerHTML
				//alert(content2)
				var ms =document.getElementById("load11").innerHTML;
			
				var ms1 =document.getElementById("seccodeverify_SsDkD4b0").value;	
				
				var zhfid =document.getElementById("zhf").innerHTML;
				
				var con3 = content2.replace(/^(\s|\xA0)+|(\s|\xA0)+$/g, '');
				
				if(ms1.length == 0){
					alert('请输入验证码')
				}else if(ms != ms1){
					alert('验证码不正确')		
					}else if(con3.length != 0){				
						location.href='index.php?m=bbs1.zhfsql'+'&names='+zhfid+'&con3='+encodeURIComponent(content2)+'&tid='+<?=$tid?>+'&page='+<?=V('r:page') !=NULL?V('r:page'):1?>+'&fid='+<?=V('r:fid')?>; 
					}else{
						alert('您没输入任何内容')
						}	
					
				  
			}
					</script>
					
					<div id="seccodeSsDkD4b0_menu" class="p_pop p_opt" style="display:none;height: 0px; width: 0px; border-width: 0px;">
						<span id="seccode_SsDkD4b0"></span>       
<script type="text/javascript" reload="1">updateseccode5('SsDkD4b0','follow_rebroadcast');</script>
					</div>
				</div>
				<p class="ptm pnpost cl">
					<?php /*?><a class="normalbtn bluebtn"><button type="submit" name="replysubmit" id="fastpostsubmit" class="pn vm " value="replysubmit" tabindex="5">发表回复</button></a><?php */?>
					<? if($_SESSION['u_uidss'] == NULL){?>
					<a class="normalbtn bluebtn" >发表回复</a>
					<? }else{?>	
					<a class="normalbtn bluebtn" onclick='ss()' id='ss'>发表回复</a>
					<? }?>
					<a class="normalbtn bluebtn" onclick='aa()' id='aa' style="display:none">发表回复</a>
					<em id='sbhl'> 
					<label for="fastpostrefresh" class="wrap_simcheck" style="float:left;margin:0px;" id="wrap_simcheck233">
        				<span class="box_simcheck" onclick="checked()"></span>
        				<span onclick="checked()">回帖后跳转到最后一页</span> 
        				<input id="fastpostrefresh" type="checkbox" class="pc"  onclick="checked()"/>
        			</label>
					<input type="hidden" value="1" id="checkboxss">
					</em>
<script type="text/javascript">
	function checked(){
		var ss = $("#checkboxss").val()
	
		var ss1 = 1 - ss
		 $("#checkboxss").val(ss1)
		if(ss1 == 1){
			$("#wrap_simcheck233").attr("class","wrap_simcheck")
			$("#fastpostrefresh").attr("checked","false")
			}else{
			$("#wrap_simcheck233").attr("class","wrap_simcheck checked_simcheck")
			$("#fastpostrefresh").attr("checked","checked")	
			}
		}
	if(getcookie('fastpostrefresh') == 1) {$('fastpostrefresh').checked=true;}
		try{
			if(getcookie('adddynamic') == 1) {
				$('adddynamic').checked=true;
			}else if(getcookie('adddynamic') == 2){
				$('adddynamic').checked=false;
			}else if($('adddynamic')){
				$('adddynamic').checked=true;
			}
		}catch(e){}
</script>
				</p>
<script type="text/javascript">
	var editorsubmit = $('fastpostsubmit');
	var editorform = $('fastpostform');
	// 创建 iframe
	newFastEditor(1, "textobj.value");
	ifmDelQuote("#quoteDelBtn"); 
	// 邮箱验证返回
	~function(){
		var url = window.location.toString();
		var id = url.split('#')[1];
		if(id){
			//alert(jQuery("body,html").html())
			// jQuery("body,html").animate({scrollTop:},200);
			jQuery(window).scrollTop($(id).offsetTop);
		}
	}()
</script>
				</form>
                <?php /*?><form method="post" enctype="multipart/form-data" action="misc.php?mod=swfupload&amp;operation=upload&amp;simple=1&amp;type=image" target="attachframe" style="position: absolute;float: left;left:80px;top:20px;">
                    <input type="file" name="Filedata" id="fastpost_file" onchange="seditor_fileChange(this,'fastpost')" style="opacity:0;height:40px;width:40px;position:absolute;cursor: pointer;filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"/>
                    <input type="hidden" name="uid" value="9594205"/>
                    <input type="hidden" name="hash" value="03239fe96e901c9c7dc1674ea30142db"/>
                </form><?php */?> 
				<div id="fastpost_tip" style="display:none;position:absolute;z-index:100;left:6px;top:70px;max-width:200px">
					<div style="width: 0;height: 0;border: 8px solid #000;border-left-color: transparent;border-top-color: transparent;border-right-color: transparent;position: relative;top: -16px;left: 86px;"></div>
					<div style="color:#fff;height:100%;padding:0px 10px;font-size: 14px;position: relative;top: -16px;line-height: 30px;background:#000;text-align: center;">上传的图片不符合要求</div>
				</div>
			</div>
		</div>
	<iframe name="attachframe" id="attachframe" style="display: none;" onload="seditor_fileOnLoad();"></iframe>
	</div>
<script type="text/javascript">
	document.onkeyup = function(e){keyPageScroll(e, 0, 1, 'forum.php?mod=viewthread&tid=5285291', 1);}
</script>
</div>

<div class="wp mtn"><div id="diy3" class="area"></div></div>
<script type="text/javascript">
	function succeedhandle_followmod(url, msg, values) {
		var fObj = $('followmod_'+values['fuid']);
		if(values['type'] == 'add') {
			fObj.innerHTML = '不收听';
			fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
		} else if(values['type'] == 'del') {
			fObj.innerHTML = '收听TA';
			fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=10149d6d&fuid='+values['fuid'];
		}
	}
	//支持反对
	var successSup = '';
	var supportId = '';
	function supportOp(_id){
	successSup = false;
	supportId = _id;
	}
	function succeedhandle_rate(locationhref) {
		try{
			document.getElementById('fwin_rate').style.display="none";
		}catch(e){}
			hideMenu('fwin_rate', 'dialog');
			successSup = true;
			supportOpFun(supportId)
	}
	click_product_omit_show();
	hoverSub(".item_postlist","graybar_postlist");
	checkFun(".wrap_simcheck","checked_simcheck");
	fastReplyFunc(".cbarbox_postlist .fastre","fastposteditor");
	followmodFunc("#mayLikeBox .attention_expand a");
</script>	
<?= TPL :: assign('footer')?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
	<div class="tip_c">积分 50, 距离下一级还需  积分</div><div class="tip_horn"></div>
</div>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
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
</body>
</html>
