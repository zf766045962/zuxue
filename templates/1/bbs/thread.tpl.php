

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$titletop[0]['name']?> - 学啊</title>
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css">
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_index.css">

<style id="diy_style" type="text/css"></style>
<link href="/css/bbscss/common.css" rel="stylesheet" type="text/css">
<style id="diy_style" type="text/css"></style>
<link href="/css/bbscss/common.css" rel="stylesheet" type="text/css">
<script src="/js/bbsjs/tuji_emote.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery-1.js" type="text/javascript"></script>
<script src="/js/bbsjs/portal.js" type="text/javascript"></script>
<script src="/js/bbsjs/public.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery.js" type="text/javascript"></script>
<script src="/js/bbsjs/ping_hotclick.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/MjcxMTE4MTE.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/common.js" type="text/javascript"></script>
	 
	 
	

 

	<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
	<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_forumdisplay.css" />
	<link rel="stylesheet" href="/css/style.css" />  

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

<body id="nv_forum" class="pg_forumdisplay" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="hd">
 <?php TPL :: display('header')?>
	 
 <? TPL :: display("bbs/hd");?>
</div>               
<div id="wp" class="wp">
	<style id="diy_style" type="text/css"></style>
    <div id="diynavtop" class="area"></div>
    <div class="wp">
		<div id="diy1" class="area"></div>
	</div>
<div class="boardnav">
	<div id="ct" class="wp cl">
		<?php
        	TPL :: display('bbs/thread_right');
			TPL :: display('bbs/thread_left');
		?>
	</div>
</div>

<div class="wp mtn">
	<div id="diy3" class="area"></div>
</div>	
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


<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>

<!--统计代码-->
<?php /*?><script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script><?php */?>

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
