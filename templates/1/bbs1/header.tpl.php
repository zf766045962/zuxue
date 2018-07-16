<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>社区 - 学啊教育</title>
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css">
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_forum_index.css">
<style id="diy_style" type="text/css"></style>
<link href="/css/bbscss/common.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/head.css" />
<link rel="stylesheet" type="text/css" href="css/community.css" />
<script src="/js/bbsjs/tuji_emote.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery-1.js" type="text/javascript"></script>
<script src="/js/bbsjs/portal.js" type="text/javascript"></script>
<script src="/js/bbsjs/public.js" type="text/javascript"></script>
<script src="/js/bbsjs/jquery.js" type="text/javascript"></script>
<script src="/js/bbsjs/ping_hotclick.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/MjcxMTE4MTE.js" charset="utf-8" type="text/javascript"></script>
<script src="/js/bbsjs/common.js" type="text/javascript"></script>
<?php	$_SESSION['u_uidss'] = $_SESSION['YLTTX_UID'];											//var_dump($_SESSION['username']);?>
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
<body id="nv_portal" class="pg_index" onkeydown="if(event.keyCode==27) return false;" >
<div class="container">
	<!--head-->
	<div class="top">
            <div class="top_con">
                <div class="logo">
                    <img src="images/xuea_img_06.png"/>
                </div>
                <div class="nav">
                    <ul>
                        <?
                            $article_list = DS('publics._get','','article_class',' parentid = 0 limit 6');
                            if($article_list){
                                foreach($article_list as $key => $val){
                        ?>
                            <li><a href="<?= $val['classurl'].'&cid='.$val['classid']?>"><?= $val['classname']?></a></li>
                        <?
                                }
                            }
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="search">
                    <input type="text" placeholder="搜索您感兴趣的课程" class="search_text"/>
                    <a href=""><img src="images/search.png" class="search_btn"/></a>
                </div>
                <div class="dengluqian">
                    <input type="button" value="注册" id="zhucee" class="zc_btn zc"/>
                    <input type="button" value="登录" id="zc" class="zc_btn dl"/>
                </div>
                <div class="clearfloat"></div>
            </div>
        </div>
    <!--head-->
    <!--content-->
	<div class="content">
		<div class="con_top">
			<div class="child_nav">
				<ul>
					<!--<li><a href="<?= URL('bbs')?>">首页</a></li><span>|</span>
                    <li><a href="<?= URL('bbs.forum')?>">版块</a></li><span>|</span>
                    <li><a href="<?= URL('bbs.group')?>">学啊家族</a></li>-->
                    <li><a href="<?= URL('bbs')?>">首页</a></li><span>|</span>
                    <li><a href="javascript:;">版块</a></li><span>|</span>
                    <li><a href="javascript:;">学啊家族</a></li>
				</ul>
				<div class="clearfloat"></div>
			</div>
            <div class="child_search">
				<input type="text" name="" id="" placeholder="搜索话题和用户" class="child_sec_text" />
				<a href=""><img src="images/shequ_img_04.png" /></a>
			</div>
          	<div class="clearfloat"></div>
		</div>
	</div>
</div>