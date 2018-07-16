<!DOCTYPE HTML>
<html>
<head>
<meta property="qc:admins" content="2411272406706375" />
<meta property="wb:webmaster" content="e60ad6eb0df1a2b0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>版块 - <?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value']?></title>
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">  
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_post.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>


<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_index.css" />
<link rel="stylesheet" href="/css/style.css" />
<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	
.foot{
	font-size:12px;
	}	
.wp a{
	text-decoration:none; !important
	}	
</style>

</head>


<body id="nv_forum" class="pg_index" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="hd">
	<?php TPL :: display('header')?>

	 
    <? TPL :: display("bbs/hd");?>
</div>   
<div id="wp" class="wp">
	<link rel="stylesheet" type="text/css" id="css_mobile" href="/css/bbscss/index.css" />
	<meta name="viewport" content="width=1080"> 
	<?php
		//板块区
        TPL :: display('bbs/forum_area');
	?>        
</div>
<script>
    function custom_service(uid,name){
        if(uid!='' && name!=''){
            window.open ('http://kf2.meizu.com/webCompany.php?arg=meizu&username='+uid+','+name+'&style=1');
        }else{
            window.location="/login.php";
        }
    }
</script>
<div id="question_dialog">
    <div class="question_nav clearfix">
        <a href="javascript:;" class="question_tab act" dtype="1">未解决</a>
        <a href="javascript:;" class="question_tab" dtype="2">已解决</a>
        <a href="javascript:;" style="cursor: default;border-left: none;width:300px;"></a>
    </div>
    <div class="question_list">
        <ul>
           <li>&nbsp;</li>
           <li>&nbsp;</li>
           <li>&nbsp;</li>
           <li>&nbsp;</li>
           <li>&nbsp;</li>
        </ul>
        <div class="question_page">
        	<div class="pg clearfix"></div>
        </div>
    </div>
    <div class="question_btn">
        <button onclick="window.location='/forum.php?mod=post&action=newthread&fid=6&extra='">发帖反馈问题</button>
        <button onclick="window.open('http://www.meizu.com/services')">其他方式反馈</button>
        <button class="closeDialog" onclick="document.getElementById('fwin_dialog_close').click();">关闭</button>
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
