<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 - 一路听天下 </title>

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_forumdisplay.css" />

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

<body id="nv_forum" class="pg_guide" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<script>
	var uids2 =  '<?=$_SESSION['u_uidss']?>';
		if(uids2 == ''){
			location.href = "<?=URL('login')?>"
		}
		
	
		
	</script>
 <? TPL :: display('head');
 TPL :: display('headnav');
 ?>
 <div class="second-banner tc">
    	<img src="/images/second_r.gif" />
    </div>
<div id="hd"><?= TPL :: display('bbs/hd')?></div>
<div id="wp" class="wp">
<style type="text/css">
	.xl2 { background: url(images/vline.png) repeat-y 50% 0; }
	.xl2 li { width: 49.9%; }
	.xl2 li em { padding-right: 10px; }
	.xl2 .xl2_r em { padding-right: 0; }
	.xl2 .xl2_r i { padding-left: 10px; }
</style>
<div class="boardnav">
 <!-- 个人中心 帖子 -->
<div id="ct" class="ct2_a wp cl" >
	<div  id="sd_bdl" class="back_left bdl" onMouseOver="showMenu({'ctrlid':this.id, 'pos':'dz'});" >
    	<dl class="a" id="lf_">
            <dt>个人中心</dt>
            <dd ><a href="<?= URL('bbsUser.my_dynamic')?>" title="动态">动态</a></dd>
            <dd  class="bdl_a"><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>" title="帖子">帖子</a></dd>
            <dd  ><a href="<?= URL('bbsUser.my_follow')?>" title="关系">关系</a></dd>
            <dd ><a href="<?= URL('bbsUser.my_msgs')?>" title="消息">消息</a></dd>
            <?php /*?><dd ><a href="<?= URL('bbsUser.my_basic_info')?>" title="设置">设置</a></dd><?php */?>
            <dd ></dd>
            <dd ><div style="height:18px; width:100%;"></div></dd>
		</dl>
	</div>
	<div class="mn ct1_feed float_l" >
		<div id="threadlist" class="tl bm cont_wp">
			<div class="thmenu">
				<div class="page_frame_navigation" >
                	<div class="follow_feed_cover" style="left:129px;" ></div>
                    <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
                        <li  ><a href="<?= URL('bbsUser.my_submit',"&cid=1")?>">主题</a></li>
                        <li  class="a" ><a href="<?= URL('bbsUser.my_submit',"&cid=2")?>">回复</a></li>
                        <?php /*?><li ><a href="<?= URL('bbsUser.my_submit',"&cid=3")?>" >点评</a></li>
                        <li ><a href="<?= URL('bbsUser.my_favorite')?>" >收藏</a></li><?php */?>
                    </ul>
                </div>
            </div>
				<div class="guide_indicate bm_c">
<table class="conbar_guide" cellspacing="0" cellpadding="0">
	<col width="300px" /><col width="90px" /><col width="90px" /><col width="88px" /><col width="108px" />
	<tr>
		<td class="common" >
		<!--主题 回复 下面的筛选框-->
					<?php /*?><div class="cname" style="margin-right:8px;">状态</div>
					<div class="select_box select_box_1" style="float:left; position:relative;">
                    	<div class="box_menu" value="" vl="" style="color:#1daeed;" filter="true" >全部<span class="arrow_dark"></span></div>
						<div class="son_menu" style="position:absolute; display:none;width:118px;">
                        	<ul>
                            	<li value="" vl=""  class="one" >全部</li>
                                <li value="common" vl="common"    class="" >已发表</li>
                                <li value="save" vl="save"    class="" >草稿</li>
                                <li value="close" vl="close"    class="" >关闭</li>
                                <li value="aduit" vl="aduit"    class="" >待审核</li>
                            </ul>
                        </div>
                    </div><?php */?>
					
            <script>
			(function(){
				var oSon=document.getElementById('son_menu');
				var oMenu=document.getElementById('box_menu');
				var timer=null;
				
				oSon.onmouseover=oMenu.onmouseover=function(){
					clearInterval(timer);
					oSon.style.display='block';
				};
				
				oSon.onmouseout=oMenu.onmouseout=function(){
					timer=setInterval(function(){
						oSon.style.display='none';
					}, 500);
					
				};
			})();
		</script>
        <script>
				function selStatus(status){
					window.location.href = "<?= URL('bbsUser.my_submit',"status=")?>"+status;
				}
				
		</script>
		<div class="cname" style="margin-left:30px;margin-right:8px;" >选择版块</div>
		<div class="select_box select_box_2" style="float:left; position:relative;">
			<div class="box_menu" value="0"  vl="0" style="color:#1daeed;" filter="true" id="box_menu1">
			<?php 
				if(empty($fffid)){
			?>	
            	全部
            <?php
				}else{
					$plantname = DS('publics._get','','bbs_forum','fid='.V('r:forum_id'));	
					echo $plantname[0]['name'];
				}
			?>
            <span class="arrow_dark"></span></div>
			<div class="son_menu" style="position:absolute; display:none;width:138px;height:320px;overflow-y:scroll;" id="son_menu1">
				<ul>
						<li value="0" 	 vl="<?=$v['fid']?>"   onclick="selForum(this.value)" class="one" >全部</li>
					<? $plantlist = DS('publics._get','','bbs_forum','status = 1');?>
					<? if(isset($plantlist) && !empty($plantlist)){?>
					<? foreach($plantlist as $k=>$v){?>
						<li value="<?=$v['fid']?>" 	 vl="<?=$v['name']?>"   onclick="selForum(this.value)" class="one" ><?=$v['name']?></li>
				 	<? }?>
					<? }?>
				</ul>
			</div>
		</div>
		</td>
    	<td class="by">板块</td><td class="by">作者</td><td class="num">回复/查看</td><td class="by">发表时间</td>
	</tr>
</tbody>
</table>
	</div>
    <script>
			(function(){
				var oSon1=document.getElementById('son_menu1');
				var oMenu1=document.getElementById('box_menu1');
				var timer=null;
				
				oSon1.onmouseover=oMenu1.onmouseover=function(){
					clearInterval(timer);
					oSon1.style.display='block';
				};
				
				oSon1.onmouseout=oMenu1.onmouseout=function(){
					timer=setInterval(function(){
						oSon1.style.display='none';
					}, 500);
					
				};
			})();
			</script>
			<script>
				function selForum(forumId){
					//alert(forumId)
					window.location.href = "<?= URL('bbsUser.my_submit',"&cid=2&forum_id=")?>"+forumId;
				}
			</script>				<div class="guide_indicate bm_c"><div id="forumnew" style="display:none"></div>
<table cellspacing="0" cellpadding="0"  class="guide_reply" >
	<?php
    	//var_dump($re);
		
		//判断是否发帖
		if(!empty($re)){
			foreach($re as $pk => $pv){
				
			 $plant = DS('publics._get','','bbs_forum','fid='.$pv['pid']);	
			 $tzi = DS('publics._get','','bbs_post','pid='.$pv['tid']);		
				//$re1 = DS('publics.get_info','','bbs_post',"pid='".$pv['pid']."'");//var_dump($re1);
				/*if(!empty($re1)){
					foreach($re1 as $ak => $av){*/
	?>
	<tbody id="normalthread_5281412">
		<tr>
			<th class="common">
					<div class="title_guidelist">
					
 			<a href="<?= URL('bbs2.lczda','&lcid='.$pv['id'].'&tid='.$pv['tid'].'&fid='.$pv['pid'])?>" target="_blank" class="xst" title="<?= $pv['comment']?>"><?= htmlspecialchars($pv['comment'])?></a>
                    </div>
			</th>
			
			<td class="by"><a href="<?= URL('bbs.thread','&fid='.$tzi[0]['fid'])?>" target="_blank"><?= $plant[0]['name']?></a></td>
			<td class="by"><cite><a href="<?= URL('bbsUser.user_broadcast','&id='.$pv['authorid'])?>" c="1"><?= $pv['author']?></a></cite></td>
			<td class="num"><a href="<?= URL('bbs.thread_detail','&fid='.$plant[0]['fid'].'&tid='.$tzi[0]['pid'])?>" class="xi2"><?= $tzi[0]['alltip']?></a><div class="br"><em><?= $tzi[0]['looknum']?></em></div></td>
            <td class="by" style="padding-right:20px;"><div class="br"><em><span title="<?= date("m月d日",$pv['dateline'])?>"><?= date("m月d日",$pv['dateline'])?></span></em></div></td>
		</tr>
	</tbody>
    <tbody class="bw0_all">
		<tr><td colspan="5"><div class="guide_list_replay"><div class="tl_reply pbm xg1"><a target="_blank"
		 href="<?= URL('bbs.thread_detail','&fid='.$plant[0]['fid'].'&tid='.$tzi[0]['pid'])?> ">回复主题&nbsp;:&nbsp;<?=htmlspecialchars($tzi[0]['subject'])?> </a></div><div class="arrow_guidelist"></div></div></td></tr>
	</tbody>
   <?php 
					
			}
		}else{
	?>
    <tbody class="bw0_all"><tr><th colspan="5"><p class="emp">暂时还没有回复</p></th></tr></tbody>
    <?php
		}
	?>
</table>
                    <div class="cr"></div>
				</div>
                <div class="bm bw0 pgs cl pagebar"></div>
			</div>
		</div>
	</div>
</div>
<div id="filter_special_menu" class="p_pop" style="display:none">
	<ul>
        <li><a href="<?= URL('')?>" target="_blank">投票</a></li>
        <li><a href="<?= URL('')?>" target="_blank">商品</a></li>
        <li><a href="<?= URL('')?>" target="_blank">悬赏</a></li>
        <li><a href="<?= URL('')?>" target="_blank">活动</a></li>
	</ul>
</div>

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
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
<script type="text/javascript">
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	aa = new menu_box();
	aa.init('select_box_1' , 'reply');
	bb = new menu_box();
	bb.init('select_box_2' , 'reply');
	hoverAdd(".guide_theme tbody","listhover_forum");
</script>