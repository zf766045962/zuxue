<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<meta property="qc:admins" content="254647636026375" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value'];?></title>
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>" />  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>" /> 


<link rel="stylesheet" type="text/css" href="css/head.css" /> 
<link rel="stylesheet" type="text/css" href="css/foot.css" /> 
<link href="/css/jquery.alerts.css" rel="stylesheet" />
<meta name="baidu-tc-verification" content="bbf97a97d2668dce1ed093cba54014e6" />

<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script><script type="text/javascript">uaredirect("http://m.xuer.com","http://www.xuer.com");</script> 

<!-- 滚动图片 -->
<!--  <script type="text/javascript" src="js/jQuery.v1.8.3-min.js"></script>-->
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript"> 
	var InterValObj; //timer变量，控制时间 
	var count = 60; //间隔函数，1秒执行 
	var curCount;//当前剩余秒数 
	function sendMessage() { 
		var usr		= $("#usr").val();
		var pwd 	= $("#pwd").val(); 
		var pwd1 	= $("#pwd1").val();
		var nk_name = $("#nk_name").val();
		var telReg = usr.match(/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
		curCount = count; 
		if(usr!='' && pwd!='' && pwd1 != '' && nk_name != '' && telReg && pwd == pwd1){
		　　//设置button效果，开始计时 
			　　 //向后台发送处理数据 
			$.ajax({
				url:'<?= URL('login.send_code')?>',
				type:'POST',
				data:{
					username	:	usr,
				},
				success:function(r){  
					e = eval('(' + r + ')'); 
					if(e.status == '1'){
						//jAlert(e.info,'温馨提示'); 
						$("#btnSendCode").attr("disabled", "true"); 
						$("#btnSendCode").val(curCount + "秒后重新发送"); 
						InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次    
						//$("#register1").css('display','');	  
					}else{
						jAlert(e.info,'温馨提示');
					}	
				}
			});
		}else if(usr == ''){
			jAlert('请填写手机号','温馨提示');	
		}else if(pwd == ''){
			jAlert('请填写密码','温馨提示');
		}else if(pwd != pwd1){
			jAlert('密码不一致','温馨提示');
		}else if(nk_name == ''){
			jAlert('请填写昵称','温馨提示');
		}else if(!telReg){
			jAlert('请填写合理手机号','温馨提示');	
		} 
	} 
			//timer处理函数 
	function SetRemainTime() { 
		if (curCount == 0) { 
			window.clearInterval(InterValObj);//停止计时器 
			$("#btnSendCode").removeAttr("disabled");//启用按钮 
			$("#btnSendCode").val("重新发送"); 
		} else { 
			curCount--; 
			$("#btnSendCode").val(curCount + "秒后重新发送"); 
		}
	}
</script>	
<!-- 选项卡 -->
<script>
    function setTab(name,cursel,n){
		for(i=1;i<=n;i++){
			var menu=document.getElementById(name+i);
			var con=document.getElementById("con_"+name+"_"+i);
			menu.className=i==cursel ? "hover" : "";
			//con.style.display=i==cursel ? "block" : "none";
			if(con.style.display=i==cursel){
				$(con).fadeIn();
			}else{
				con.style.display = "none";
			}
		}
    }
</script>
<!-- 点击左右滑动 -->
<script type="text/javascript" src="js/jq.Slide.js"></script>
<script type="text/javascript">
    $(function(){
        $("#temp4").Slide({
            effect : "scroolLoop",
            autoPlay:true,
            speed : "normal",
            timer : 3000,
            steps : 1
        });
    });
</script>
<!-- 图片显示div -->
<script type="text/javascript" src="js/tc.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {			
		t = $('.top').offset().top; //固定块距离窗口顶部位置				
		$(window).scroll(function(e){
			s = $(document).scrollTop();	//滚动条距离顶部高度
			if( s > t){
				$('.top').css('position','fixed');
				$('.top').css('top',0+'px');
				$('#left_class').fadeOut();
			}else{
				$('#left_class').fadeIn();
				$('.top').css('position','');
			}
		})
	});
	
</script>
<link rel="stylesheet" type="text/css" href="css/index1.css" /> 
<link rel="stylesheet" media="screen" type="text/css" href="css/new-index.css"/>
<link rel="stylesheet" href="css/swiper.min.css">
<style>
    .swiper-container {
        width: 100%;
        min-width:1190px;
        height: 502px;
        position:relative;
        max-width:1440px;
        /*background:url(images/zr.gif) no-repeat center center;*/
    }
    .swiper-slide {
        text-align: center;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet{width: 11px;height: 11px;text-align: center;margin:9px 10px;background:url(images/img_20.png) no-repeat;}
    .swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet-active{position: relative;background:url(images/img_21.png) no-repeat;}
 </style>
 <!--百度异步统计代码-->
 <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4449a883d67a851a47b40dd00c604602";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="container">
<img src="images/zr.gif" style="display:none;"/>
<?php TPL :: display("header");?>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/banner1.png"></div>
            <div class="swiper-slide"><img src="images/banner4.jpg"></div>
            <div class="swiper-slide"><img src="images/banner6.jpg"></div>
           	<?php if(!empty($banner)){
				foreach($banner as $bk => $bv){?>
            <div class="swiper-slide"><img src="<?= $bv['imgurl']?>"></div>
            <?php }}?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination" style="width:100%;min-width:1190px;height:28px;margin:0 auto;position:absolute;bottom:0;left:0;background:url(images/back.png);z-index:10;"></div>
        
    </div>
	<script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            effect : 'fade',
            loop: true,
            autoplay : 3000,
			autoplayDisableOnInteraction: false
        });
    </script>
    <!-- 纵向导航 -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".sort-list>ul>li").hover(function(){
                $(this).addClass("hover")
            },function(){
                $(this).removeClass("hover")
            });
           
        });
    </script>
<script>
  function setTabb($class,$id){
  $("."+$class).fadeOut();
    $("#"+$id).fadeIn();
  }
</script>
<div class="content">
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
	<div class="lib_Contentbox lib_tabborder" style="width:1190px;height:580px;overflow:hidden;">
		<div id="con_one_1" class="hover n-index-course">
			<div class="tab_content n-course-box w-content">
				<ul style="margin-left:-20px">
				<?php
					if($exce1){
						foreach($exce1 as $kex1 => $vex1){
							$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex1['id']." group by userID"); 
				?>
					<li><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex1['thumb']?>" /><div class="n-pic-mask"></div>
                    </div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank"><?php echo $vex1['stitle']?></a></div>
                        <div class="course-bot-info">
                        	<span class="c-details right">更新时间：<em><?= date("Y-m-d", $vex1['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $vex1['id']?>,2)"></a>
                           <!-- <a  href="javascript:void(0);"><img src="images/course_conimg_09.png" title="分享"/></a>-->
                            <span>时长：<em><?php echo $vex1['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex1['couClass'].'&sid='.$vex1['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onClick="checkBuy(<?= $vex1['id']?>,0,0,2,1)">购买</a></span>
                        </div>
                    </div></li>
				<?php
						}
					}
				?>
				</ul>
				<div class="clearfloat"></div>
			</div>
		</div>
		<div id="con_one_2" class="hover n-index-course" style="display:none">
			<div class="tab_content n-course-box w-content">
				<ul style="margin-left:-20px">
				<?
					if($exce2){
						foreach($exce2 as $kex2 => $vex2){
							$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex2['id']." group by userID"); 
				?>
					<li><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex2['thumb']?>" /><div class="n-pic-mask"></div>
                    </div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex2['couClass'].'&sid='.$vex2['id'].'&cid=2')?>" target="_blank"><?php echo $vex2['stitle']?></a></div>
                        <div class="course-bot-info">
                            <span class="c-details right">更新时间：<em><?= date("Y-m-d", $vex2['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $vex2['id']?>,2)"></a>
                            <span>时长：<em><?php echo $vex2['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex2['couClass'].'&sid='.$vex2['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onClick="checkBuy(<?= $vex2['id']?>,0,0,2,1)">购买</a></span>
                        </div>
                    </div></li>
				<?
						}
					}
				?>
				</ul>
				<div class="clearfloat"></div>
			</div>
		</div>
		<div id="con_one_3" class="hover n-index-course" style="display:none">
			<div class="tab_content n-course-box w-content">
				<ul style="margin-left:-20px">
				<?
					if($exce3){
						foreach($exce3 as $kex3 => $vex3){
							$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex3['id']." group by userID"); 
				?>
					<li><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex3['thumb']?>" /><div class="n-pic-mask"></div>
                    </div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex3['couClass'].'&sid='.$vex3['id'].'&cid=2')?>" target="_blank"><?php echo $vex3['stitle']?></a></div>
                        <div class="course-bot-info">
                        	<span class="c-details right">更新时间：<em><?= date("Y-m-d", $vex3['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $vex3['id']?>,2)"></a>
                            <span>时长：<em><?php echo $vex3['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex3['couClass'].'&sid='.$vex3['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onClick="checkBuy(<?= $vex3['id']?>,0,0,2,1)">购买</a></span>
                        </div>
                    </div></li>
				<?
						}
					}
				?>
				</ul>
				<div class="clearfloat"></div>
			</div>
		</div>
		<div id="con_one_4" class="hover n-index-course" style="display:none">
			<div class="tab_content n-course-box w-content">
				<ul style="margin-left:-20px">
				<?
					if($exce4){
						foreach($exce4 as $kex4 => $vex4){
							$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex4['id']." group by userID"); 
				?>
					<li><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex4['thumb']?>" /><div class="n-pic-mask"></div>
                    </div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex4['couClass'].'&sid='.$vex4['id'].'&cid=2')?>" target="_blank"><?php echo $vex4['stitle']?></a></div>
                        <div class="course-bot-info">
                        	<span class="c-details right">更新时间：<em><?= date("Y-m-d", $vex4['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $vex4['id']?>,2)"></a>
                            <span>时长：<em><?php echo $vex4['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex4['couClass'].'&sid='.$vex4['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onClick="checkBuy(<?= $vex4['id']?>,0,0,2,1)">购买</a></span>
                        </div>
                    </div></li>
				<?
						}
					}
				?>
				</ul>
				<div class="clearfloat"></div>
			</div>
		</div>
		<div id="con_one_5" class="hover n-index-course" style="display:none">
			<div class="tab_content n-course-box w-content">
				<ul style="margin-left:-20px">
				<?
					if($exce5){
						foreach($exce5 as $kex5 => $vex5){
							$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vex5['id']." group by userID"); 
				?>
					<li><div class="course-pic-txt"><img width="273" height="158" src="<?=$vex5['thumb']?>" /><div class="n-pic-mask"></div>
                    </div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courSystem.courseCon','classid='.$vex5['couClass'].'&sid='.$vex5['id'].'&cid=2')?>" target="_blank"><?php echo $vex5['stitle']?></a></div>
                        <div class="course-bot-info">
                        	<span class="c-details right">更新时间：<em><?= date("Y-m-d", $vex5['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $vex5['id']?>,2)"></a>
                            <span>时长：<em><?php echo $vex5['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courSystem.courseCon','classid='.$vex5['couClass'].'&sid='.$vex5['id'].'&cid=2')?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onClick="checkBuy(<?= $vex5['id']?>,0,0,2,1)">购买</a></span>
                        </div>
                    </div></li>
				<?
						}
					}
				?>
				</ul>
				<div class="clearfloat"></div>
			</div>
		</div>
	</div>
</div>
<!--video-->

<div class="tanchu2">
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
			 $("#alert").css("display","block");
			 $("#maskLayer").css("display","block");		
		}
	} 
	//分享   
	function share(systemid,catid){
		var uid = $('#huid').val();
		var url =  $('#url').val();
		//alert(url);
		if(uid != '' && uid != 0){
			$.ajax({
				url:'<?= URL('bone.share')?>',
				type:'POST',
				data:{  
					uid		:	uid,
					url		:	url,
				},
				success:function(r){
					e = eval('(' + r + ')');
					if(e.status == '1'){
						//alert(1);
						//jAlert(e.info,'温馨提示');
						//location.reload(true); 
						$("#links").html(e.url)
						$("#fenxiang_con").css("display","block");
						$("#maskLayer").css("display","block");
					}else{
						jAlert(e.info,'温馨提示');
					}	
				}
			});
		}else{
			//jAlert('请先登录','温馨提示');
			 $("#alert").css("display","block");
			 $("#maskLayer").css("display","block");		
		}
	}
	//验证购买信息
	function checkBuy(systemid,pid,coid,catid,type){
		var uid = $("#huid").val();												//alert(uid); 
		if(uid=='' || uid == 0){
		   // jAlert('请先登录','温馨提示');
			$("#alert").css("display","block");
			$("#maskLayer").css("display","block");
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
					}else{
						jAlert(e.info,'温馨提示');	
					} 
				}
			});	
		}
	}
</script>
<script>
	$(function(){
		$("#b1").click(function(){
			$("#a1").css("display","none");
			$("#qwww").css("display","none");
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
					$("#qwww").hide()	
				} 
			}
		});	
	}
</script>
    <div class="tanchu_one" id="a1" style="display:none">
        <h3>购买本体系课程<img src="images/one_img_03.png" id="b1" /></h3>
        <div class="clearfloat"></div>
        <div class="xiangxi" id="xiangxi"></div>
        <p id="pricess1"></p>
        <input type="hidden" name="buyuid1" id="buyuid1" value="" />
        <input type="hidden" name="type1" id="type1" 	value="1" />
        <input type="hidden" name="systemid1" id="systemid1" value="" />
        <input type="hidden" name="pid1" id="pid1" value="" />
        <input type="hidden" name="coid1" id="coid1" value="" />
        <input type="hidden" name="catid1" id="catid1" value="" />
        <a href="javascript:;" onClick="buy(1)">立即购买</a>
    </div>
</div>

<div id="qwww" style="width:100%; position: fixed; top:0; left:0; z-index:111; height:100%; background:#000; opacity:0.4;filter:alpha(opacity=40); display:none; "></div>
<!--study-->
<div class="study">
	<?
		 $ad_list = DS('publics._get','','ad',' id = 1 and classid = 1 and audit = 1');
	?>
	<div class="study_top">
    	<img src="images/xuea_img_28.png" /><span class="study_lc">学习流程</span><img src="images/xuea_img_28.png" />
    </div>
	<div class="study_bottom">
        <a href="javascript:void(0);" class="one_a">
            <span class="ico_back one_back"></span>
            <span class="one_con">注册学啊网</span>
        </a>
        <a href="javascript:void(0);" class="two_a">
            <span class="ico_back two_back"></span>
            <span class="one_con">直接上课</span>
        </a>
        <a href="javascript:void(0);" class="three_a">
            <span class="ico_back three_back"></span>
            <span class="one_con">个人中心</span>
        </a>
        <a href="javascript:void(0);" class="four_a">
            <span class="two_con">免费课程</span>
            <span class="two_con">购买体系</span>
            <span class="two_con">挣金币免学费</span>
        </a>
        <a href="javascript:void(0);" class="five_a">
            <span class="two_con">收藏课程</span>
            <span class="two_con">学啊测试金牌系统</span>
            <span class="two_con">推广赚学币</span>
        </a>
        <a href="javascript:void(0);" class="five_btm">
            <span class="two_con" style="margin:0">学币购买任何课程</span>
        </a>
        <a href="javascript:void(0);" class="five_btm btm_two">
            <span class="two_con" style="margin:0">学习完毕</span>
        </a>
        <a href="javascript:void(0);" class="six_a">
            <span class="ico_back six_back"></span>
            <span class="one_con">免费就业指导服务</span>
        </a>
        <a href="javascript:void(0);" class="seven_a">
            <span class="ico_back six_back" style="margin-left:28px"></span>
            <span class="one_con">进阶课程免费学习体验</span>
        </a>
        <a href="javascript:void(0);" class="five_btm btm_three">
            <span class="two_con" style="margin:0">就业</span>
        </a>
        <a href="javascript:void(0);" class="eight_a">
            <span class="ico_back eight_back"></span>
            <span class="one_con" style="width:90px">金牌会员终身享受讲师在线指导</span>
        </a>
        
        <div class="n-fc-round">
            <a href="javascript:void(0);" class="n-round-center viphover">
                <span class="study_back">在线学习</span>
            </a>
            <div class="n-fc-ring">
                <div class="n-ring-con">
                    <a class="n-round-icon n-sshd" href="javascript:void(0);">
                        <span>在线师生互动</span>
                    </a>
                    <a class="n-round-icon n-zxbj" href="javascript:void(0);">
                        <span>实时在线笔记</span>
                    </a>
                    <a class="n-round-icon n-zxb" href="javascript:void(0);">
                        <span>边学习边分享边赚学币</span>
                    </a>
                    <a class="n-round-icon n-xmtd" href="javascript:void(0);">
                        <span>在线组织项目团队</span>
                    </a>
                    <a class="n-round-icon n-xxcs" href="javascript:void(0);">
                        <span>课后学习测试</span>
                    </a>
                    <a class="n-round-icon n-jszd" href="javascript:void(0);">
                        <span>讲师课下即时指导</span>
                    </a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $('.n-round-center').hover(function() {
                    $('.n-fc-round').addClass('open');
                    $(this).removeClass('viphover');
                });
                $('.n-fc-round').hover(function() {
                }, function() {
                    $(this).removeClass('open');
                    $('.n-round-center').addClass('viphover');
                })
            });
        </script>
    </div>
</div>
<div class="content">
	<div class="con_left">
		<div class="con_left_top">
<?
	$zhaopin_pic	= DS('publics2._get','','ad',' id = 7');
	$zp_pic1		= DS('publics2._get','','news',' catid = 16 and audit=1 order by ontop desc,recommend desc,listorder asc limit 0,6');//var_dump($zp_pic1);
	$zp_pic2		= DS('publics2._get','','news',' catid = 16 and audit=1 order by ontop desc,recommend desc,listorder asc limit 7,6');//var_dump($zp_pic2);
?>
		
			<img src="images/xuea_img_28.png" class="sty_img1"/><span class="study_lc">企业招聘</span><img src="images/xuea_img_28.png" class="sty_img1"/>
		</div> 
		<img src="<?= $zhaopin_pic[0]['imgurl']?>" />
<div class="clearfloat"></div>
		<div class="con_cpy">
			<ul>
			<?php
				if(!empty($zp_pic1)){
					foreach($zp_pic1 as $zpk1 => $zpv1){
			?>
				<li><img src="images/li_img_03.png" /><a href="<?= URL('bottom.foot_linkCon','&catid=16&id='.$zpv1["id"])?>" title="<?= $zpv1['title']?>"><?= F("publics.substrByWidth",$zpv1['title'],26);?></a><span class="cpy_right"><?= date("Y-m-d",$zpv1['inputtime'])?></span></li>
				<?php }}?>
			</ul>
		</div>
		<div class="con_cpy" style="margin-left:30px">
			<ul>
		<?php
				if(!empty($zp_pic2)){
					foreach($zp_pic2 as $zpv2){
			?>
				<li><img src="images/li_img_03.png" /><a href="<?= URL('bottom.foot_linkCon','&catid=16&id='.$zpv2["id"])?>" title="<?= $zpv2['title']?>"><?= F("publics.substrByWidth",$zpv2['title'],26);?></a><span class="cpy_right"><?= date("Y-m-d",$zpv2['inputtime'])?></span></li>

 
				<?php }}?> 
			</ul>
		</div>
		<a href="<?= URL('bottom.foot_link','&cid=16')?>" ><img src="images/xuea_img_64.png" class="more" style="float:right;" /></a>
		<div class="clearfloat"></div>
	</div>
    
   <!-- 合作院校-->
	<div class="con_right">
		<div class="con_left_top">
			<img src="images/xuea_img_28.png" class="sty_img2"/><span class="study_lc">合作院校</span><img src="images/xuea_img_28.png" class="sty_img2"/>
		</div>
		<div id="slide-box">
			<b class="corner"></b>
			<div class="slide-content" id="temp4">  
				<div class="wrap">
					<ul class="JQ-slide-content">
						<li>
			<?php
               if(!empty($coop)){
					$num	=	count($coop);
                  	foreach($coop as $ck => $cv){
						//院校简介（显示图片和标题）
                        $desc = DS("publics2._get","","ad","bid=20 and orid1=".$cv['linkageid']);
                             
            ?>
							<!--<a href="<?= URL('university.school','&unid='.$cv['linkageid'])?>" target="_blank"><img src="<?= $desc[0]['imgurl']?>" title="<?= $desc[0]['title']?>"/></a>-->
                            <a href="javascript:;" onClick="inter(<?= $cv['linkageid']?>)"><img src="<?= $desc[0]['imgurl']?>" title="<?= $cv['name']?>"/></a>
                       		<?php if(($ck%6 == 5 && $num != $ck+1)){?>
                            </li><li>
                            
                           
			<?php
					}
                		
					}
				  }
            ?>
						</li>
					</ul>
				</div>
				<script>
                function inter(schid){
                    var uid = $("#huid").val();
                    if(uid=='' || uid == 0){
                        // jAlert('请先登录','温馨提示');
                         $("#maskLayer").attr("style","display:block");
                                $("#alert").slideDown();
                    }else{
                        $.ajax({  
                            url:'<?= URL('university.checkinter')?>',                   
                            type:'POST',
                            data:{uid:uid,schid:schid},
                            
                            success:function(r){
                                e = eval('(' + r + ')');
                                if(e.status == '1'){
                                    window.location.href = '<?= URL("university.school","&unid=")?>'+schid;
                                }else{
                                    jAlert(e.info,'温馨提示');	
                                } 
                            }
                        });	
                    }	
                }
                </script>
				<div class="JQ-slide-nav">
					<a class="prev" href="javascritpt:void(0);">
						<b class="corner"></b>
						<span><img src="images/xuea_img_44.png" /></span>
						<b class="corner"></b>
					</a>
					<a class="next" href="javascritpt:void(0);">
						<b class="corner"></b>
						<span><img src="images/xuea_img_47.png" /></span>
						<b class="corner"></b>
					</a>
				</div>
			</div>
			<b class="corner"></b>
		</div>
	</div>
	<div class="clearfloat"></div>
	<div class="news">
    	<!--明星学员-->
		<div class="news_left">
			<h3 class="news_title" style="text-align:left;display:block;margin:10px 0 5px 20px;"><a href="<?= URL('star')?>" style="color:#FFFFFF">明星学员</a><a href="<?= URL('star')?>" ><img src="images/xuea_img_64.png" class="more" style="margin-left: 10px;position: relative;top: 3px" /></a></h3>
			<img src="images/xuea_img_70.png"/>
			<script>
				$(function(){ 
					$(".b1").hover(function(){
						$(this).siblings(".b2").fadeIn();
						
						},function(){$(this).siblings(".b2").fadeOut();})
				})
			</script>
            <script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
		 <?php  
			if(!empty($star)){
				foreach($star as $sk=>$sv){
					if($sk==0){
		?> 
			<div class="a1"> 
				<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:250px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:250px;height:111px;"/></a>
				</div>
				<div class="b2" style="left:258px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
				<div class="clearfloat"></div>
			</div>
        <?php }else if($sk==1){?>
            <div class="a1">
            	<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:121px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:121px;height:111px;" /></a>
				</div>
				<div class="b2" style="left:129px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
            </div>
        <?php }else if($sk ==2){?>
            <div class="a1">
            	<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:121px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:121px;height:111px;" /></a>
				</div>
				<div class="b2" style="left:129px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
            </div>
        <?php }else if($sk==3){?>
            <div class="a1"> 
				<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:250px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:250px;height:111px;" /></a>
				</div>
				<div class="b2" style="left:258px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
				<div class="clearfloat"></div>
			</div>
       	<?php }else if($sk==4){?>
            <div class="a1"> 
				<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:250px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:250px;height:111px;" /></a>
				</div>
				<div class="b2" style="left:258px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
				<div class="clearfloat"></div>
			</div>
        <?php }else if($sk==5){?>
            <div class="a1">
            	<div class="b1" onMouseOver="setTimeout('tab( )', 500)" onMouseOut="ta()" style="width:121px;">
					<a href="javascript:;" onclick="dialog('<?= URL('star.videos','&stuId='.$sv['id']);?>','感人视频',545,525)"><img src="<?= $sv['thumb']?>" style="width:121px;height:111px;" /></a>
				</div>
				<div class="b2" style="left:129px;">
					<span style="color:#fff;font-size:15px;font-weight:bold;display:block;margin:10px 15px;"><?= $sv['username']?></span>
					<span style="color:#beebf0;display:block;margin:0 15px;"><?= $sv['student_type']?></span>
					<span style="display:block;color:#beebf0;float:left;margin:10px 15px;">学习<span style="color:#fff;display:block;"><?= $sv['study_time']?>天</span></span>
					<span style="display:block;color:#beebf0;float:right;margin:10px 15px;">报名<span style="color:#fff;display:block;"><?= $sv['course_num']?>门课程</span></span>
				</div>
            </div>
        <?php } }}?>

			<div class="clearfloat"></div>
		</div>
		
        <!--官方活动-->
		<div class="news_center">
			<a href="<?= URL('bottom.foot_linkcon','&catid='.$cial_activity[0]['catid'].'&id='.$cial_activity[0]['id'])?>" title="<?= $cial_activity[0]['title']?>" ><img src="<?= $cial_activity[0]['thumb']?>" style="float:left;display:inline-block;width:395px;height:205px;"/></a>
			<div class="news_cen_btm">
				<h3 class="news_title"> <a href="<?= URL('bottom.foot_link','&cid=14')?>" style="color:#FFFFFF"><?= $cial_activity1[0]['classname'];?></a></h3>
                <a href="<?= URL('bottom.foot_link','&cid=14')?>" ><img src="images/xuea_img2_64.png" class="more" style="margin-left: 10px;position: relative;top: 3px" /></a>   
				<img src="images/xuea_img_70.png" />
				<ul>
				<?php
					if($cial_activity){
						foreach($cial_activity as $kca => $vca){
				?>
					<li><img src="images/li_img_04.png" /><a href="<?= URL('bottom.foot_linkCon','&catid='.$vca['catid'].'&id='.$vca['id'])?>" title="<?= $vca['title']?>"><?= F("publics.substrByWidth",$vca['title'],48);?></a></li>      
				<?php
						}
					}
				?>
				</ul>
			</div>
			<div class="clearfloat"></div>
		</div>
        
       <!-- 新闻喜讯-->
		<div class="news_right">
			<div class="news_cen_btm">
				<h3 class="news_title"><a href="<?= URL('bottom.foot_link','&cid=15')?>" style="color:#FFFFFF"><?= $news_activity1[0]['classname'];?></a></h3>
                <a href="<?= URL('bottom.foot_link','&cid=15')?>" ><img src="images/xuea_img_64.png" class="more" style="margin-left: 10px;position: relative;top: 3px" /></a>   
				<img src="images/xuea_img_70.png"/>
				<ul>
				<?php
					if($news_activity){
						foreach($news_activity as $kca => $vca){
				?>  
					<li><img src="images/li_img_07.png" /><a href="<?= URL('bottom.foot_linkCon','&catid='.$vca['catid'].'&id='.$vca['id'])?>" title="<?= $vca['title']?>"><?= F("publics.substrByWidth",$vca['title'],48);?></a></li>
				<?php
						}
					}          
				?>  
				</ul> 
			</div>
			<a href="<?= URL('bottom.foot_linkcon','&catid='.$news_activity[0]['catid'].'&id='.$news_activity[0]['id'])?>" title="<?= $news_activity[0]['title']?>"><img src="<?= $news_activity[0]['thumb']?>" style="float:left;display:inline-block;width:397px;height:196px;"/></a>
			<div class="clearfloat"></div>
		</div>
		<div class="clearfloat"></div>
	</div>
</div>
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
<!--<script>
$(document).ready(function () {
	var event = arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异  
		$(document).keyup(function (evnet) {
			if (evnet.keyCode == '13') {				
				$('#sosuo').click();
				//alert(1);	
			}
		});
		
	});
</script>-->

<?php TPL :: display("footer1")?>
</div>
</body>
</html>