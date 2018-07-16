<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php $site_name = DS('publics.get_index','','site_name'); $ad_list=	DS("publics2._get","","article_class","classid=5");echo $ad_list[0]['classname']  ." - ".  $site_name[0]['value']?></title>    
<meta name="keywords" content="<?php echo $ad_list[0]['keyword']?>">  
<meta name="description" content="<?php echo $ad_list[0]['description']?>">
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css">
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_index.css">
<link rel="stylesheet" type="text/css" href="css/head.css" /> 
<link rel="stylesheet" type="text/css" href="css/foot.css" /> 
<style id="diy_style" type="text/css"></style>

<script src="/js/bbsjs/tuji_emote.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery-1.js" type="text/javascript"></script>
<script src="/js/bbsjs/portal.js" type="text/javascript"></script>
<script src="/js/bbsjs/public.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery.js" type="text/javascript"></script>
<script src="/js/bbsjs/ping_hotclick.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/MjcxMTE4MTE.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/common.js" type="text/javascript"></script>


<?php
	//var_dump($_SESSION['username']);      
	$_SESSION['u_uidss'] = $_SESSION['xr_id'];
	
?>


<!--<link rel="stylesheet" href="css/style.css" />-->
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>
<link href="/css/bbscss/common.css" rel="stylesheet" type="text/css">
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
<body id="nv_portal" class="pg_index" onkeydown="if(event.keyCode==27) return false;" >
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div id="hd">
	<?php
	TPL :: display('header1'); 
	?>
	<?
	TPL :: display("bbs/hd");
	?>
</div>                
<div id="wp" class="wp">
<div class="wp">
    <div class="index_content">
    	<div class="index_left">
        	<div class="box1">
                <div class="banana_rotate">
                    <div class="roll_img" id="roll_img_cc">
                    	<div id="portal_block_500" class="inrotate_img block move-span">	
                        	<div id="portal_block_500_content" class="dxb_bc">
                        		<div class="roll_img_cc" style="width: 2090px; position: absolute; left: 0px;">
									<ul>
										<? $banner = DS('publics._get','','bbs_post','classid = 12 and status = 1 order by lmorder asc limit 0,3');?>	
										<? if(!empty($banner)){?>	
										<? foreach($banner as $k=>$v){?>
                                    	<li style="float:left;"><a href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" onClick="look(<?=$v['pid']?>)" target="_blank"><div class="roll_img_kk" id="roll_img_kk_1" rurl="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" alt="<?=$v['subject']?>" src="<?=$v['imgurl']?>" style="background:url('<?=$v['imgurl']?>');width:686px;height:278px;"></div></a></li>
										  <? }}?>	
                          
										
										
									</ul>
								</div>
							</div>
						</div>                        
                        <div class="leftbtn_picturn"></div>
						<div class="rightbtn_picturn"></div>
                        <div class="cr"></div>
                    </div>
                    <div style="display: block;" class="roll_opacity"></div>
                    <div style="display: block;" class="roll">
                        <div class="roll_title"><a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>"></a></div>
                        <div class="roll_small_signimg_div">
					<? if($banner[0]['imgurl'] != NULL ){?>	
                    <img class="roll_small_signimg current_con" src="<?=$banner[0]['imgurl'] ?>" height="29" width="50">
					<? }if($banner[1]['imgurl'] != NULL ){?>
					<img class="roll_small_signimg" src="<?=$banner[1]['imgurl'] ?>" height="29" width="50"><? }if($banner[2]['imgurl'] != NULL ){?><img class="roll_small_signimg" src="<?=$banner[2]['imgurl'] ?>" height="29" width="50"><? }?>
					
                        </div>
                    </div>
                </div>
        	</div>
			
            <!-- 活动 -->
           <? TPL :: display("bbs/index_activitys");?>  
            <!--社区热帖-->       
            <? TPL :: display("bbs/index_host");?>
            <div style="padding:20px 20px 20px 20px;"></div>    
        </div>
    	<!--签到/热门板块-->
        <? TPL :: display("bbs/index_right_top");?>
        <div class="cr"></div>
    </div>
<!--[/diy]-->
</div>
<script language="javascript" type="text/javascript">
// 复制 id1 HTML的数据到 id2
function copy_html(id1,id2){
	try{
		var html 	= document.getElementById(id1).innerHTML;
		document.getElementById(id2).innerHTML	= html;
		}catch(e){}
	}
	// 首页js 初使化
	index_js.init();
	// 签到
	signinFunc(".signin_expand",".tips_signin");
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();
	// 删除底部线条
	delete_bottom_line();
</script>
<div class="tborder_foot"></div>	


<script src="js/pic.js" type="text/javascript"></script>



</div>
<div style="margin-top:50px">
<?php TPL :: display('footer1');?>
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