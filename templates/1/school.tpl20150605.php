<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?= $info['title']?> - <?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value']?></title>     
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">     
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot.css" />
<link href="/css/jquery.alerts.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="/css/two_pages.css" />
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">  
<!-- 滚动图片 -->
<script type="text/javascript" src="/js/jQuery.v1.8.3-min.js"></script>
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/js/zzsc.js"></script>		        
<script>
    function setTab(name,cursel,n){
     for(i=1;i<=n;i++){
      var menu=document.getElementById(name+i);
      var con=document.getElementById("con_"+name+"_"+i);
      menu.className=i==cursel?"hover":"";
      con.style.display=i==cursel?"block":"none";
     }
    }
	$(document).ready(function () {
		$(document).keyup(function (evnet) {
			if (evnet.keyCode == '13') {
				$('#sosuo').click();
			}
		});
		
	});
</script>
<!-- 图片显示div -->
<script type="text/javascript" src="js/tc.min.js"></script>
</head>
<body>
<style>
	.fenxiang_con{position:fixed;top:50%;margin-top:-100px;left:50%;margin-left:-200px;width:400px;height:200px;display:none;background:#fff;box-shadow:0px 0px 2px 2px #ccc;z-index:10000;}
	.fenxiang_con p{color:#666666;font-weight:bold;margin:0 30px;font-size:18px;}
	.fenxiang_con span{display:block;color:#666666;font-weight:500;line-height:30px;font-size:14px;word-break: break-all;word-wrap: break-word;}
</style>
<div id="fenxiang_con" class="fenxiang_con">
    <div class="tit"><i class="close"><img id="closea" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
    <p id="links">分享址：<span>http://www.jsuyefahsyukegfjkshgyuegfhjsdfsdjksdhfuhiue.com</span></p>
</div>
<div id="maskLayer"></div>
<div class="container">
    <div class="top">
        <div class="top_con"> 
            <div class="logo">
                <a href="/index.php"><img src="images/xuea_img_06.png"/></a>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="#1F" style="width: 110px;">学校简介</a></li>
                    <li><a href="#2F" style="width: 110px;">学啊精品课程</a></li>
                    <li><a href="#3F" style="width: 110px;">mooc课程</a></li>
                    <li><a href="#4F" style="width: 110px;">校园新闻</a></li>
                    <li><a href="/index.php" style="width: 110px;">返回学啊</a></li>
                </ul>
                <div class="clearfloat"></div>
            </div>
            <div class="search">
                <input type="text" placeholder="搜索您感兴趣的课程" class="search_text" onFocus="if(this.value=='搜索您感兴趣的课程'){this.value='';this.style.color='#333'}" onBlur="if(this.value==''){this.value='搜索您感兴趣的课程';this.style.color='#666'}" name="searchQuery" id="ya" value="<?= V('g:c','搜索您感兴趣的课程');?>" /> 
                <a href="javascript:;" id="sosuo" onClick="sousuo()"><img src="images/search.png" class="search_btn"/></a>
            </div>
<script type="text/javascript"> 
function sousuo(){
	var val = formatStr($('#ya').val());
	if(val == '搜索您感兴趣的课程' || val.replace(/^\s*/g, "") == ''){
		jAlert('请输入您感兴趣的课程','温馨提示');
	}else{
		$.ajax({
			url:'<?= URL('courSystem.find')?>',
			type:'POST',
			data:{
				inter	:	val,
			},
			success:function(r){  
				e = eval('(' + r + ')'); 
				if(e.status == '1'){    
					window.location.href="<?= URL('courSystem.course','&c=')?>"+val;	  
				}else{
					jAlert(e.info,'温馨提示');
				}	
			}
		}); 	
	}
}
function formatStr(str) {
	str = str.replace(/<\/?[^>]*>/g,'');
	str = str.replace(/(&lt;)|(&gt;)/gi,'');
	str = str.replace(/(\')|(\")/g,'');
	return str;
}
</script>
            <div class="dengluhou" >
                <p class="name" style="float:left" id="a" onMouseOver="tabb()">
                    <a href="<?= URL('member.xmember')?>" title="<?= $uinfo[0]['realname']?>"><?php if(empty($uinfo[0]['logo'])){?><img src="images/course_conimg_27.png"><?php }else{?><img src="<?= $uinfo[0]['logo']?>"><?php }?><span title="<?= $uinfo[0]['realname']?>"><?= F("publics.substrByWidth",$uinfo[0]['realname'],8);?></span></a><?php if($uinfo[0]['type'] ==2){?><a href="<?= URL('member.xmember','&tid=6');?>"><span style="margin-left:10px;"><img src="images/student_img_06.png" style="height:15px;width:15px;position:relative;top:3px;border-radius:0;" /><?= $uinfo[0]['frozen_money']?></span></a><?php }?>
                </p>
                <div class="list" id="b" style="display:none;">
                    <?php if(empty($uinfo[0]['logo'])){?><img src="images/course_conimg_27.png"><?php }else{?><img src="<?= $uinfo[0]['logo']?>"><?php }?> 
                    <p style="margin-top:15px;">正使用手机账号登录</p>
                    <p><a href="<?= URL('member.xmember')?>">个人主页</a></p>
                    <?php if($uinfo[0]['type']==1){?>
                    <p><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">提问我的</a></p>
                    <p><a href="<?= URL('member.xmember','&tid=3');?>" style="color:black">安全中心</a></p>
                    <p><a href="<?= URL('member.xmember','&tid=4');?>" style="color:black">个人资料</a></p>
                    <?php }else{?>
                    <p><a href="<?= URL('member.xmember','&tid=1');?>" style="color:black">我的课程</a></p>
                    <p><a href="<?= URL('member.xmember','&tid=2');?>" style="color:black">我的问答</a></p>
                    <p><a href="<?= URL('member.xmember','&tid=7');?>" style="color:black">个人资料</a></p>
                    <?php }?>
                    <p style="border:0;"><a href="javascript:;" onClick="logOut()">退出</a></p>
                </div>
            </div>
<script type="text/javascript">
	$(function(){
		$(".dengluhou").hover(function(){$("#b").slideToggle()});
		//$(body).click(function(){$("#b").hide();return;});
	});
	
	function logOut(){
		$.ajax({
				url:'<?= URL('login.loginOut')?>',
				type:'POST',
				success:function(r){
					e = eval('(' + r + ')');
					if(e.status == '1'){
						//alert(1);
						window.location.href="/index.php";
					}else{
						jAlert("请稍后重试",'温馨提示');
					}	
				}
			});		
	}
</script>
            <div class="clearfloat"></div>
        </div>
    </div>
    <div class="index_show" style="background:url(images/zr.gif) center center no-repeat;">
        <ul class="bxslider" id="index-bxslider">
            <?php if(!empty($banner)){
                        foreach($banner as $bk=>$bv){
                            $num=$bk+1;	
            ?>
            <li class="item<?= $num?>" style="background: url(<?= $bv['imgurl']?>) center 0 no-repeat;"></li>
            <?php }}?>
        </ul>
        <div style="width:1440px;height:28px;margin:0 auto;position:absolute;bottom:0;left:0;">
            <div id="bx-pager">
                <a data-slide-index="0" href="javascript:void(0);"></a>
                <a data-slide-index="1" href="javascript:void(0);"></a>
                <a data-slide-index="2" href="javascript:void(0);"></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="content_top">
            <img src="<?= $info['imgurl']?>" class="con_top_left" style="width:170px;height:170px;margin:38px 0"/>
            <div class="con_top_right" style="width:960px">
                <a name="1F"></a><h3><?= $info['title']?></h3><?= $info['content']?>
            </div><div class="clearfloat"></div>
        </div>
        <div class="lib_Menubox" style="border:0;">
            <ul><li class="hover" style="background:none;"><a name="2F">学啊精品课程</a></li></ul> 
        </div>
        <div class="lib_Menubox lib_tabborder">
            <ul>
                <li id="one1" onClick="setTab('one',1,5)" class="hover">热门推荐</li>
                <li id="one2" onClick="setTab('one',2,5)" >人气最高</li> 
                <li id="one3" onClick="setTab('one',3,5)">项目实战</li>   
                <li id="one4" onClick="setTab('one',4,5)">仙人指路</li>
                <li id="one5" onClick="setTab('one',5,5)">企业之声</li>
            </ul> 
        </div>
        <input type="hidden" name="huid" id="huid" value="<?= $_SESSION['xr_id']?>">
        <input type="hidden" name="url" id="url" value="<?= $_SERVER['HTTP_HOST']?>">
		<link rel="stylesheet" media="screen" type="text/css" href="css/new-index.css"/>
        <div class="lib_Contentbox lib_tabborder">
            <div id="con_one_1" class="hover">
                <div class="tab_content n-course-box w-content">
                    <ul>
                      <?
                        if($exce1){
                            foreach($exce1 as $kex1 => $vex1){
                                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>
                            </div>
                            <div class="course-time">
                                <!--<a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>-->
                                <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                                 <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                            </div>
                        </div></li>
                    <?
                            }
                        }
                    ?>
                    </ul>
                    
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_one_2" class="hover" style="display:none">
                <div class="tab_content n-course-box w-content">
                    <ul>
                      <?
                        if($exce2){
                            foreach($exce2 as $kex1 => $vex1){
                                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>
                            </div>
                            <div class="course-time">
                               <!-- <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>-->
                                <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                                 <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                            </div>
                        </div></li>
                    <?
                            }
                        }
                    ?>
                    </ul>
                    
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_one_3" class="hover" style="display:none">
                <div class="tab_content n-course-box w-content">
                    <ul>
                      <?
                        if($exce3){
                            foreach($exce3 as $kex1 => $vex1){
                                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>
                            </div>
                            <div class="course-time">
                                <!--<a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>-->
                                <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                                 <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                            </div>
                        </div></li>
                    <?
                            }
                        }
                    ?>
                    </ul>
                    
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_one_4" class="hover" style="display:none">
                <div class="tab_content n-course-box w-content">
                    <ul>
                      <?
                        if($exce4){
                            foreach($exce4 as $kex1 => $vex1){
                                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>
                            </div>
                            <div class="course-time">
                               <!-- <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>-->
                                <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                                 <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                            </div>
                        </div></li>
                    <?
                            }
                        }
                    ?>
                    </ul>
                 
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_one_5" class="hover" style="display:none">
                <div class="tab_content n-course-box w-content">
                    <ul>
                      <?
                        if($exce5){
                            foreach($exce5 as $kex1 => $vex1){
                                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div></div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= count($buy_sys)?></em>人在学习</span>
                            </div>
                            <div class="course-time">
                                <!--<a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>-->
                                <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                                 <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                            </div>
                        </div></li>
                    <?
                            }
                        }
                    ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
        </div>
        <div class="lib_Menubox" style="border:0;">
            <ul><li class="hover" style="background:none;"><a name="3F">mooc课程</a></li></ul> 
        </div>
        <div class="lib_Menubox lib_tabborder">
            <ul> 
               <li id="two1" onclick="setTab('two',1,5)" class="hover">商学院</li>
               <li id="two2" onclick="setTab('two',2,5)" >计算机学院</li>
               <li id="two3" onclick="setTab('two',3,5)">土木工程</li>   
               <li id="two4" onclick="setTab('two',4,5)">艺术设计</li>
            </ul>
        </div>    
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script> 
        <div class="lib_Contentbox lib_tabborder">
            <div id="con_two_1" class="hover">
                <div class="tab_content  n-course-box w-content">
                    <ul>
                       <?           
                        if($course1){
                            foreach($course1 as $kex1 => $vex1){
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['imgurl']?>" /><div class="n-pic-mask"></div>
                        </div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="javascript:;"><?php echo $vex1['title']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= date("Y-m-d",strtotime($vex1['times']))?></em>更新</span>
                            </div>
                            <div class="course-time">
                                <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>
                                <span>时长：<em><?= !empty($vex1['description'])?$vex1['description']:'暂无内容'?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a onclick="dialog('<?= URL('university.video','&videoId='.$vex1['id']);?>','视频观看',800,600)" class="btn_genera2" id="btn_sub">观看视频</a></span>      
                            </div>
                        </div></li>
                        <?php
                            }} else{
						?>
                        		<div>暂无视频</div>
                        <?	}      
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_two_2" class="hover" style="display:none">
                <div class="tab_content  n-course-box w-content">
                    <ul>
                       <?           
                        if($course2){
                            foreach($course2 as $kex1 => $vex1){
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['imgurl']?>" /><div class="n-pic-mask"></div>
                        </div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="javascript:;"><?php echo $vex1['title']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= date("Y-m-d",strtotime($vex1['times']))?></em>更新</span>
                            </div>
                            <div class="course-time">
                                <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>
                                <span>时长：<em><?= !empty($vex1['description'])?$vex1['description']:'暂无内容'?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a onclick="dialog('<?= URL('university.video','&videoId='.$vex1['id']);?>','视频观看',800,600)" class="btn_genera2" id="btn_sub">观看视频</a></span>      
                            </div>
                        </div></li>
                        <?php
                            }} else{
						?>
                        		<div>暂无视频</div>
                        <?	}      
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_two_3" class="hover" style="display:none">
                <div class="tab_content  n-course-box w-content">
                    <ul>
                       <?           
                        if($course3){
                            foreach($course3 as $kex1 => $vex1){
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['imgurl']?>" /><div class="n-pic-mask"></div>
                        </div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="javascript:;"><?php echo $vex1['title']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= date("Y-m-d",strtotime($vex1['times']))?></em>更新</span>
                            </div>
                            <div class="course-time">
                                <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>
                                <span>时长：<em><?= !empty($vex1['description'])?$vex1['description']:'暂无内容'?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a onclick="dialog('<?= URL('university.video','&videoId='.$vex1['id']);?>','视频观看',800,600)" class="btn_genera2" id="btn_sub">观看视频</a></span>      
                            </div>
                        </div></li>
                        <?php
                            }} else{
						?>
                        		<div>暂无视频</div>
                        <?	}      
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="con_two_4" class="hover" style="display:none">
                <div class="tab_content  n-course-box w-content">
                    <ul>
                       <?           
                        if($course4){
                            foreach($course4 as $kex1 => $vex1){
                    ?>
                        <li style="margin:20px 0 0 12px"><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['imgurl']?>" /><div class="n-pic-mask"></div>
                        </div>
                        <div class="c-course-info">
                            <div class="c-course-name"><a href="javascript:;"><?php echo $vex1['title']?></a></div>
                            <div class="course-bot-info">
                                <span class="c-details right"><em><?= date("Y-m-d",strtotime($vex1['times']))?></em>更新</span>
                            </div>
                            <div class="course-time">
                                <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="share(<?= $vex1['id']?>,2)"></a>
                                <span>时长：<em><?= !empty($vex1['description'])?$vex1['description']:'暂无内容'?></em></span></div>
                            <div class="course-hover-btn">
                                <span class="study-btn"><a onclick="dialog('<?= URL('university.video','&videoId='.$vex1['id']);?>','视频观看',800,600)" class="btn_genera2" id="btn_sub">观看视频</a></span>      
                            </div>
                        </div></li>
                        <?php
                            }} else{
						?>
                        		<div>暂无视频</div>
                        <?	}      
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
                </div>
                <div class="clearfloat"></div>
            </div>
        </div>
    </div>
<script>
//收藏   
function collect(systemid,catid){     
var uid = $('#huid').val();            
if(uid != '' && uid != 0){
    $.ajax({
        url:'<?= URL('bone.collect_sys')?>',
        type:'POST',
        data:{
            uid		:	uid,
            systemid	:	systemid,
            catid	:	catid,	
        },
        success:function(r){
            e = eval('(' + r + ')');
            if(e.status == '1'){
                //alert(1);
                jAlert(e.info,'温馨提示');
                location.reload(true); 
            }else{
                jAlert(e.info,'温馨提示');
            }	
        }
    });
}else{
    //jAlert('请先登录','温馨提示');
     $("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();	
}
} 

//验证购买信息
function checkBuy(systemid,pid,coid,catid,type){
var uid = $("#huid").val();												//alert(uid); 
if(uid=='' || uid == 0){
   // jAlert('请先登录','温馨提示');
    $("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
}else{
    $.ajax({  
        url:'<?= URL('courSystem.checkBuy')?>',                   
        type:'POST',
        data:{uid:uid,systemid:systemid,pid:pid,coid:coid,catid:catid,type:type,},
        
        success:function(r){
            e = eval('(' + r + ')');
            if(e.status == '1'){
                $("#pricess1").html(e.info);
                $("#xiangxi").html(e.intro);
                $("#a1").show();
                $("#qwww").show();
                $("#buyuid1").val(uid);
                $("#type1").val('1');
                $("#systemid1").val(systemid);
                $("#pid1").val(pid);
                $("#coid1").val(coid);
                $("#catid1").val(catid);
				 $("#maskLayer").css("display","block");
            }else{
                jAlert(e.info,'温馨提示');	
            } 
        }
    });	
}
}

function buy(t){

var uid  	= $("#buyuid1").val();
var type 	= $("#type1").val();
var systemid	= $("#systemid1").val()
var pid		= $("#pid1").val();
var coid	= $("#coid1").val();
var catid	= $("#catid1").val();	
                                
$.ajax({  
    url:'<?= URL('courSystem.buy')?>',
    type:'POST',
    data:{
        uid		:	uid,
        systemid	:	systemid,
        type	:	type,
        pid		:	pid,
        coid	:	coid, 
        catid	:	catid, 
            
    },
    success:function(r){
        //alert(r)
        e = eval('(' + r + ')');
        
        if(e.status == '1'){
            //alert(1);
            $("#a1").hide();
            $("#a2").hide();
            $("#a3").hide();
            $("#qwww").show()
            jAlert(e.info,'温馨提示');
            location.reload(true); 
        }else{
            $("#a1").hide();
            $("#a2").hide();
            $("#a3").hide();
            jAlert(e.info,'温馨提示');
			$("#maskLayer").css("display","none");
            $("#qwww").hide()	
        } 
    }
});	
}
</script>
<script>
	function dialog(url,title,width,height){
		$.dialog({
			title:title,
			id: 'dialsg',
			width: width,
			height: height,
			fixed: true,
			lock: true,
			background: '#000',
			opacity: 0.5,
			content: 'url:'+url
		});
	}
</script>
    <div class="tanchu_one" id="a1" style="display:none">
        <h3>购买本体系课程<img src="images/one_img_03.png" id="b1" /></h3>
        <div class="clearfloat"></div><div class="xiangxi" id="xiangxi"></div>
        <p id="pricess1"></p>
        <input type="hidden" name="buyuid1" id="buyuid1" value="" />
        <input type="hidden" name="type1" id="type1" 	value="1" />
        <input type="hidden" name="systemid1" id="systemid1" value="" />
        <input type="hidden" name="pid1" id="pid1" value="" />
        <input type="hidden" name="coid1" id="coid1" value="" />
        <input type="hidden" name="catid1" id="catid1" value="" />
        <a href="javascript:;" onclick="buy(1)">立即购买</a>
    </div>
    <div class="news_back">
        <div class="content_news">
            <a name="4F"></a>
            <h3 class="school_news">校园新闻</h3><!--<a href="" class="all">全部></a>-->
            <div class="clearfloat"></div>
            <div class="schoolnews_left">
            <?php if(!empty($news)){
                        foreach($news as $nk=>$nv){	
                            if($nk != 0){
            ?>
                <div class="leftnews_content">
                    <p class="news_title">【<?= date("Y-m-d",strtotime($nv['times']))?>】<a onclick="dialog('<?= URL('university.news','&newsId='.$nv['id']);?>','院校新闻',1000,800)" style="cursor: pointer;"><?= F("cut_string.cut_string",$nv['title'],50);?></a></p>
                    <p class="news_content" title="<?= $nv['description']?>"><?= F("cut_string.cut_string",$nv['description'],100);?></p>
                </div> 
            <?php }}}?>     
                            
                
            </div>
            <div class="schoolnews_right">
                <a href="javascript:;" title="<?= $news[0]['title']?>" onclick="dialog('<?= URL('university.news','&newsId='.$news[0]['id']);?>','院校新闻',1000,800)"><img src="<?= $news[0]['imgurl']?>" class="news_img"/></a>
                <div class="newsright_content">
                    <h3> <a href="javascript:;" title="<?= $news[0]['title']?>" onclick="dialog('<?= URL('university.news','&newsId='.$news[0]['id']);?>','院校新闻',1000,800)"><?= $news[0]['title']?></a></h3>
                    <p><?= F("cut_string.cut_string",$news[0]['description'],120);?></a></p> 
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
    <div class="content friend_line">
        <span>友情链接：</span>
        <?php if(!empty($link)){
                foreach($link as $lk=>$lv){	
        ?>
        <a href="<?= ($lv['http']=='' || $lv['http'] == 'http://')?'javascript:;':$lv['http']?>"><?= $lv['title']?></a>
        <?php }}?>
    </div>
    <div class="footer" style="line-height: 25px;">
        <div class="foot_con">
            <?php $site_contact = DS('publics.get_index','','site_contact');?>
            <div class="bottom"><?= $site_contact[0]["value"];?><p>技术支持：<a target="_blank" href="http://vi163.com" style="color:#818181">北方互动</a></p></div>
        </div>
    </div>
</div>
<script>
	$(function(){ 
		$(".b1").hover(function(){
			$(this).siblings(".b2").fadeIn();
			
			},function(){$(this).siblings(".b2").fadeOut();})
	})
	
	$(function(){
		$("#closea").click(function(){
			$("#fenxiang_con").css("display","none");
			$("#maskLayer").css("display","none");
		});
	});
	
	$(function(){
		$("#b1").click(function(){
		$("#a1").css("display","none");
		$("#qwww").css("display","none");
		$("#maskLayer").css("display","none");
		})
		$("#b2").click(function(){
		$("#a2").css("display","none");
		$("#qwww").css("display","none");
		})
		$("#b3").click(function(){
		$("#a3").css("display","none");
		$("#qwww").css("display","none");
		})
	})
</script>
</body>
</html>