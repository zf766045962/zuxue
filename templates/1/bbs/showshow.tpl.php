
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>搜索 - 学啊</title>
 
 

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css">
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_search_forum1.css">

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


<?php
	//var_dump($_SESSION['username']);
	
	$_SESSION['u_uidss'] = $_SESSION['YLTTX_UID'];
	
?>


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
body,td,th { font-family: "微软雅黑", "Microsoft Yahei", "宋体", Tahoma, Simsun, Arial, Helvetica, sans-serif; }
</style>
</head>

<body id="nv_search" class="pg_forum" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
	<?php
	TPL :: display('header');

	?>

	</div> 
	
	<div id="wp" class="wp" style="margin-top:60px;"><!--国-->
	<div  class="wp"><!--国-->
	<?
	TPL :: display("bbs/hd");
	?>

<div  class="cl w">
<div class="mw">


<div class="tl">

 <div class="cr"></div>
<div class="mainbox threadlist" style="margin:0">
<table class="tsearch" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr style=" background-color:#E6EAEB;">
<th >标题</th>
<td class="forum" width="95" style="width:95px;" >板块</td>
<td class="author" width="130" style="width:130px;">作者</td>
<td class="nums" width="60" style="width:60px;">回复</td>
<td class="nums" width="60" style="width:60px;">查看</td>
<td class="lastpost" width="130" style="width:130px;">最后更新</td>
</tr>
</thead>

<? if(V('r:key') != NULL and strlen(V('r:key') != 1)){?>
<? $mark=DS('publics.page_list','',20,'subject like '.'\''.'%'.V('r:key').'%'.'\'','dateline desc',V('g'),'bbs_post');?>
<? }?>
<? if(isset($mark['info']) && !empty($mark['info'])){?>
<? foreach($mark['info'] as $k=>$v){?>

<? $plant = DS('publics._get','','bbs_forum',"fid ='".$v['fid']."'");	?>
<? $name  = DS('publics._get','','users',"id ='".$v['authorid']."'");	?>
<? $hflast = DS('publics._get','','bbs_postcomment',"tid='".$v['pid']."' and comment != '' order by dateline desc limit 0,1");	?>
<? $name2  = DS('publics._get','','users',"id ='".$hflast[0]['authorid']."'");	?>

<? //var_dump($hflast)?>
<tbody>
<tr>
<th>

<a href="<?= URL('bbs.thread_detail','&fid='.$v['fid'].'&tid='.$v['pid'])?>" target="_blank"  onclick="look(<?=$v['pid']?>)">

<? 
echo  str_replace(V('r:key'),'<strong><font color="#ff0000"><strong><font color="#ff0000">'.V('r:key').'</font></strong></font></strong>',htmlspecialchars($v['subject']));

?></a>

</th>
<td class="forum"><a href="<?= URL('bbs.thread','&fid='.$plant[0]['fid'])?>"><?=$plant[0]['name']?></a></td>
<td class="author">

<a href="<?= URL('bbsUser.user_broadcast','&id='.$v['authorid'])?>"><?=$name[0]['username']?></a>
<br />

<em><?=date('Y-m-d H:i',$v["dateline"])?></em>
</td>
<td class="nums"><strong><?=$v['alltip']?></strong> </td>
<td class="nums"><em><?=$v['looknum']?></em></td>
<td class="lastpost">
<? if($hflast[0]['tid'] == NULL){
	$tid = $v['pid'];
	}else{
	$tid = $hflast[0]['tid'];	
	}?>
<? if($hflast[0]['fid'] == NULL){
	$fid = $v['fid'];
	}else{
	$fid = $hflast[0]['fid'];	
	}?>	
<em><a href="<?= URL('bbs2.lczda','&lcid='.$hflast[0]['id'].'&tid='.$tid.'&fid='.$fid)?>" target="_blank" onclick="look(<?=$v['pid']?>)">

<span title="<?=date('Y-m-d H:i:ss',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline'])?>"><?php 

		if(date('Y',time()) != date('Y',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline'])){
		echo date('Y',time()) - date('Y',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline'])){
								echo date('m',time()) - date('m',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '个月前';
							}else if(date('d',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '天前';
							}else if(date('H',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '小时前';
							}else if(date('i',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$hflast[0]['dateline']==NULL?$v['dateline']:$hflast[0]['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
						?></span></a></em>
                <br />
<? 
if($hflast[0]['authorid'] == NULL){
	$idiid = $v['authorid'];
	}else{
	$idiid = $hflast[0]['authorid'];	
		}
?>				
<cite><a href="<?= URL('bbsUser.user_broadcast','&id='.$idiid)?>"><?=$name2[0]['username']==NULL?$name[0]['username']:$name2[0]['username']?></a></cite>
</td>
</tr>
</tbody>
	
	   	<? }?>				
	    <? }else{?>
			<tbody><tr><th colspan="6">对不起，没有找到匹配结果。</th></tr></tbody>
		<? }?>

</table>
</div>
				<div class="pages" style="margin:20px 0px 20px 40px;">
					<?= !empty($mark['info'])?$mark['pagehtml']:''?>
				</div>

</div>        
</div>
</div>	

</div>
</div>



                

<style>
.forumlist table, .threadlist table,.pages_btns{border-right:none;}
.threadlist td.lastpost{ width:120px;}
td.nums{text-align:center;}
.threadlist{ border-top:none;}
.pages_btns{ border-bottom:1px solid #DFDFDF;}

.tsearch tr td, .tsearch tr th{ height:52px; font-size:15px; color:#646464 !important; padding:0 5px 0 0;}
.tsearch tr th{padding:0 10px;}
.tsearch a{ color:#646464 !important; text-decoration:none;}
.tsearch a:hover{text-decoration:underline;}
.tsearch thead tr td,.tsearch thead tr th{ height:40px !important;}


</style>
<script>
									function look(pid){
										//alert()
										var xmlhttp;
										if (window.XMLHttpRequest){
													xmlhttp=new XMLHttpRequest();
										}else{
													xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										 }xmlhttp.onreadystatechange=function(){
													if (xmlhttp.readyState==4 && xmlhttp.status==200){
													
													}
										}
											xmlhttp.open("GET","<?=URL('bbs2.indexlook','&tid=')?>"+pid,true);
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

<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 216, 距离下一级还需  积分
</div>
<div class="tip_horn"></div>
</div>
<script type="text/javascript">
scrolltop_obj 	= new goto_top();
scrolltop_obj.init();

    (function(w, d) {
        var sub = d.getElementById('meizu-header-sub'),
                product = d.getElementById('meizu-header-link-product'),
                addHandle = function(element, type, handler) {
                    if (element.addEventListener) {
                        element.addEventListener(type, handler, false);
                    } else if (element.attachEvent) {
                        element.attachEvent('on' + type, handler);
                    } else {
                        element['on' + type] = handler;
                    }
                },
                getEvent = function(event) {
                    return event ? event : w.event;
                },
                getTarget = function(event) {
                    return event.target || event.srcElement;
                },
                setOpacity = function(element, num) {
                    element.style.opacity = num;
                },
                handler = function(event) {
                    event = getEvent(event);
                    var target = getTarget(event);
                    if (target.className === 'a-prod1') {
                        setOpacity(arr['a-prod1'], 1);
                        setOpacity(arr['a-prod2'], 0.5);
                        setOpacity(arr['a-prod3'], 0.5);
                    } else if (target.className === 'a-prod2') {
                        setOpacity(arr['a-prod1'], 0.5);
                        setOpacity(arr['a-prod2'], 1);
                        setOpacity(arr['a-prod3'], 0.5);
                    } else if (target.className === 'a-prod3') {
                        setOpacity(arr['a-prod1'], 0.5);
                        setOpacity(arr['a-prod2'], 0.5);
                        setOpacity(arr['a-prod3'], 1);
                    }
                },
                clear = function() {
                    setOpacity(arr['a-prod1'], 1);
                    setOpacity(arr['a-prod2'], 1);
                    setOpacity(arr['a-prod3'], 1);
                    d.getElementById('nav').className = '';
                },
                a = sub.getElementsByTagName('a'),
                arr = [];
        for (var i = a.length - 1; i >= 0; i--) {
            arr[a[i].className] = a[i];
            addHandle(a[i].parentNode, 'mouseover', handler);
        }
        ;
        addHandle(product, 'mouseleave', clear);
        addHandle(product, 'mouseover', function(){
            d.getElementById('nav').className = 'toggle';
        });
    })(window, document);
</script>

<script src="http://tongji.meizu.com/js/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
