<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); $ad_list=	DS("publics2._get","","article_class","classid=".$catid);echo $slist['stitle']  ." - ".  $site_name[0]['value']?></title>    
	<?php 
    	if(empty($sid)){
	?>
<meta name="keywords" content="<?php echo $ad_list[0]['keyword']?>">  
<meta name="description" content="<?php echo $ad_list[0]['description']?>">
	<?php
		}else{		
	?>
<meta name="keywords" content="<?= $slist['keyword']?>">  
<meta name="description" content="<?= $slist['description']?>">
    <?php }?> 
<link rel="stylesheet" type="text/css" href="css/head.css" /> 
<link rel="stylesheet" type="text/css" href="css/foot.css" /> 
<link href="css/jquery.alerts.css" rel="stylesheet" />
<!-- 滚动图片 -->
<!--  <script type="text/javascript" src="js/jQuery.v1.8.3-min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/zzsc.js"></script>		
<!-- 纵向导航 -->
<script type="text/javascript">
$(document).ready(function(){
    $(".sort-list>ul>li").hover(function(){
        $(this).addClass("hover");
    },function(){
        $(this).removeClass("hover");
    });
});
</script>

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
				$
			}else{
				$('.top').css('position','');
			}
		})
	});
	$(document).ready(function () {
		$(document).keyup(function (evnet) {
			if (evnet.keyCode == '13') {
				if($('#message12').css('display') == 'block'){
					$('#registerr').click();	
				}else if($('#alert').css('display') == 'block'){
					$('#log').click();	
				}else if($('#message12').css('display') == 'none' && $('#alert').css('display') == 'none'){
						
							$('#sosuo').click();
						
				}
			}
		});
		
	});
	
</script>
<link rel="stylesheet" type="text/css" href="css/course_content.css" />
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
<?php TPL :: display("header1")?>
<!--start_content-->
<style>

.fenxiang_con .close {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #369998;
    border-radius: 50%;
    cursor: pointer;
    float: right;
    height: 20px;
    line-height: 20px;
    margin: 10px;
    text-align: center;
    transition: -moz-transform 1s ease 0s;
    width: 20px;
}
.fenxiang_con .close:hover{background:#369998;transform:rotate(360deg);}
.fenxiang_con .close img {
    height: 13px;
    margin-left: 0;
    margin-top: 4px;
    width: 13px;
}	.fenxiang_con{position:fixed;top:50%;margin-top:-100px;left:50%;margin-left:-200px;width:400px;height:200px;display:none;background:#fff;box-shadow:0px 0px 2px 2px #ccc;z-index:10000;}
	.fenxiang_con p{color:#666666;font-weight:bold;margin:0 30px;font-size:18px;}
	.fenxiang_con span{display:block;color:#666666;font-weight:500;line-height:30px;font-size:14px;word-break: break-all;word-wrap: break-word;}
	.demo-area{text-align:center;}
	.demo-area .my_clip_button{border: 0;background:#369998;color:#fff;height:30px;width:72px;border-radius:5px;font-family:微软雅黑;margin-top:25px;}
</style>
<div id="fenxiang_con" class="fenxiang_con">
    <div class="tit"><i class="close" id="closea"><img src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
    <p id="links">分享地址：<span><?= 'http://'.$_SERVER['SERVER_NAME'].URL('study','tuid='.$_SESSION['xr_id']);?></span></p>
    <div class="demo-area">
        <input type="button" id="d_clip_button" class="my_clip_button" title="点击复制地址" data-clipboard-target="fe_text" data-clipboard-text="<?= 'http://'.$_SERVER['SERVER_NAME'].URL('study','tuid='.$_SESSION['xr_id']);?>" value="复制地址" style="cursor:pointer;">
        <div class="fz_con" id="fz_con">复制成功，快点告诉小伙伴吧^_^</div>
    </div>
    <style>
	.fz_con {
		background-color: #dff0d8;
		border: 1px solid #a3d48e;
		border-radius: 2px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
		color: #468847;
		display: none;
		height: 20px;
		line-height: 20px;
		padding: 5px 10px;
		position: absolute;
		left: 100px;
		bottom: 16px;
		width: 180px;
		z-index: 9;
	}
    </style>
    <script type="text/javascript" src="/js/ZeroClipboard/ZeroClipboard.min.js"></script>
    <script language="JavaScript">
        $(document).ready(function() {
            var clip = new ZeroClipboard($("#d_clip_button"), {
            moviePath: "/js/ZeroClipboard/ZeroClipboard.swf"
            });
            clip.on('complete', function (client, args) {
				$("#fz_con").fadeIn().delay(1000).fadeOut();
            });
        });
    </script>
</div>
<div class="content">
<div class="con_top">
    <img width="600" height="338" src="<?= $slist['picture']?>">
    <div class="top_right">
        <h3><?= $slist['stitle']?></h3>
        <style>
            .fenxiang .star{display:inline-block;background:url(images/gray_star.png) no-repeat;width:21px;height:20px;}
            .fenxiang .star:hover{background:url(images/course_conimg_06.png) no-repeat;}
            .fenxiang .share{display:inline-block;background:url(images/gray_share.png) no-repeat;width:20px;height:18px;}
            .fenxiang .share:hover{background:url(images/course_conimg_09.png) no-repeat;}
        </style>
        <div class="fenxiang">
             <a href="javascript:;" onclick="collect(<?= $slist['id']?>,3)" title="收藏" class="star"></a>
            <a href="javascript:;" onclick="share(<?= $slist['id']?>,3)" title="分享" class="share"></a><br />
			<input type="hidden" name="huid" id="huid" value="<?= $_SESSION['xr_id']?>">
            <input type="hidden" name="url" id="url" value="<?= $_SERVER['HTTP_HOST']?>">
            <div class="clearfloat"></div>
        </div>
        <div class="clearfloat"></div>
        <p><?= $slist['introduce']?></p>
        <div class="buy"><a href="javascript:void(0);" onclick="checkBuy(<?= $slist['id']?>,0,0,3,1)">购买此课程</a></div>
       
    </div>
    <div class="clearfloat"></div>
</div>
<div class="tanchu2">
	<script>
    function collect(systemid,catid){ 
        var uid = $('#huid').val();
        if(uid != '' && uid!=0){
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
   function share(systemid,catid){
	var uid = $('#huid').val();            
	if(uid != '' && uid != 0){
		$("#fenxiang_con").fadeIn();
		$("#maskLayer").css("display","block");
	}else{
		$("#alert").slideDown();
		 $("#maskLayer").css("display","block");	
	}
}
    function checkBuy(systemid,pid,coid,catid,type){
        var uid = $("#huid").val();														//alert(uid); 
        if(uid=='' ||　uid ==0){
            //jAlert('请先登录','温馨提示');
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
						$("#xiangxi1").html(e.intro);
                        $("#a1").show();
                        $("#qwww").show();
                        $("#buyuid1").val(uid);  
                        $("#type1").val(1);
                        $("#systemid1").val(systemid);
                        $("#pid1").val(pid);
                        $("#coid1").val(coid);
                        $("#catid1").val(catid);
                    }else if(e.status == '2'){
                        $("#pricess2").html(e.info);
						$("#xiangxi2").html(e.intro);
                        $("#a2").show();
                        $("#qwww").show();
                        $("#buyuid2").val(uid);
                        $("#type2").val(2);
                        $("#systemid2").val(systemid);
                        $("#pid2").val(pid);
                        $("#coid2").val(coid);
                        $("#catid2").val(catid);
                    }else if(e.status == '3'){
                        $("#pricess3").html(e.info);
						$("#xiangxi3").html(e.intro);
                        $("#a3").show();
                        $("#qwww").show();
                        $("#buyuid3").val(uid);
                        $("#type3").val(3);
                        $("#systemid3").val(systemid);
                        $("#pid3").val(pid);
                        $("#coid3").val(coid);
                        $("#catid3").val(catid);	
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
		})
    </script>
   <div class="tanchu_one" id="a1" style="display:none">
        <h3>购买本体系课程<img src="images/one_img_03.png" id="b1" /></h3>
        <div class="clearfloat"></div>
        <div class="xiangxi" id="xiangxi1"></div>
        <p id="pricess1" class="pricess"></p>
        <input type="hidden" name="buyuid1" id="buyuid1" value="" />
        <input type="hidden" name="type1" id="type1" 	value="" />
        <input type="hidden" name="systemid1" id="systemid1" value="" />
        <input type="hidden" name="pid1" id="pid1" value="" />
        <input type="hidden" name="coid1" id="coid1" value="" />
        <input type="hidden" name="catid1" id="catid1" value="" />
        <a href="javascript:;" onclick="buy(1)">立即购买</a>
    </div>
    <div class="tanchu_one" id="a2" style="display:none">
        <h3>购买本章课程<img src="images/one_img_03.png" id="b2" /></h3>
        <div class="clearfloat"></div>
        <div class="xiangxi" id="xiangxi2">
        </div>
        <p id="pricess2" class="pricess"></p>
        <input type="hidden" name="buyuid2" id="buyuid2" value="" />
        <input type="hidden" name="type2" id="type2" 	value="" />
        <input type="hidden" name="systemid2" id="systemid2" value="" />
        <input type="hidden" name="pid2" id="pid2" value="" />
        <input type="hidden" name="coid2" id="coid2" value="" />
        <input type="hidden" name="catid2" id="catid2" value="" />
        <a href="javascript:;" onclick="buy(2)">立即购买</a>
    </div>
    <div class="tanchu_one" id="a3" style="display:none">
        <h3>购买本小节课程<img src="images/one_img_03.png" id="b3" /></h3>
        <div class="clearfloat"></div>
        <div class="xiangxi" id="xiangxi3">
        </div>
        <p id="pricess3" class="pricess"></p>
        <input type="hidden" name="buyuid3" id="buyuid3" value="" />
        <input type="hidden" name="type3" id="type3" 	value="" />
        <input type="hidden" name="systemid3" id="systemid3" value="" />
        <input type="hidden" name="pid3" id="pid3" value="" />
        <input type="hidden" name="coid3" id="coid3" value="" />
        <input type="hidden" name="catid3" id="catid3" value="" />
        <a href="javascript:;" onclick="buy(3)">立即购买</a>
    </div>
</div>
<div id="qwww" style="width:100%; position: fixed; top:0; left:0; z-index:111; height:100%; background:#000; opacity:0.4;filter:alpha(opacity=40); display:none; "></div>
<div class="con_bottom">
    <div class="con_btm_left">
<?php 
	if(!empty($_SESSION['xr_id'])){
		$userInfo 	= DS("publics2._get","","users","id=".$_SESSION['xr_id']);
		$userInfo	= $userInfo[0];
?>
        <div id="firstpane" class="menu_list">
<?php
	$issys = DS("publics._get","","integral","userID=".$_SESSION['xr_id']." and sourceType=1 and systemid=".$slist['id']." and type=1");
	//var_dump($issys);
	//购买体系
	if(!empty($issys)){	
		if($cha_list){
			foreach($cha_list as $kcha => $vcha){
?>
            <div class="menu_body" >       
                <div class="con_list2">     
                    <ul>                  
			<?php 
                if($vcha['choice_kc']){
                    $arrkc = str_replace('\\','',$vcha['choice_kc']);
                    eval("\$arr = ".$arrkc.'; '); 
                    foreach($arr as $kkc => $vkc){
						$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
							$teach	  =	DS("publics2._get","","users","id=".$courinfo[0]['teach_id']);
            ?>  
                        <li aid="<?=$vkc['id']?>"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><?= $vkc['name'];?></a>
                        	<div id="shipin_title<?=$vkc['id']?>" style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div>
                        </a><span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>">已购买</a><a href="javascript:;" class="buy_xj" <?= $userInfo['type']==2?'onclick="goExam('.$vkc['id'].')"':''?>>测评</a></li>
            <?php 	}	
				}
			?>
                    </ul>
                </div> 
            </div>
	<?php	}
		}else{
	?>
			<div class="menu_body" ><div class="con_list2" style="text-align:center">暂无相关课程</div> </div>    
	<?php 
		}
	}else{
		if($cha_list){
			foreach($cha_list as $kcha => $vcha){
		?>
                <div class="menu_body" >       
                    <div class="con_list2">     
                        <ul>            
			<? 
                if($vcha['choice_kc']){
                    $arrkc = str_replace('\\','',$vcha['choice_kc']);
                    eval("\$arr = ".$arrkc.'; '); 
                   foreach($arr as $kkc => $vkc){
                        $isc = DS("publics._get","","integral","userID=".$_SESSION['xr_id']." and sourceType=1 and coid=".$vkc['id']." and type=3");				$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
							$teach	  =	DS("publics2._get","","users","id=".$courinfo[0]['teach_id']);			
                        if(!empty($isc)){
                    ?>  
							<li aid="<?=$vkc['id']?>"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><?= $vkc['name'];?></a>
                            <div id="shipin_title<?=$vkc['id']?>"  style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div>
                            <span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>">已购买</a><a href="javascript:;" class="buy_xj" <?= $userInfo['type']==2?'onclick="goExam('.$vkc['id'].')"':''?>>测评</a></li>
					<?			
                        }else{
							$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
							$teach	  =	DS("publics2._get","","users","id=".$courinfo[0]['teach_id']);
											if($courinfo[0]['is_open'] == '1'){
												
                        ?>  
                        <li aid="<?=$vkc['id']?>"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><?= $vkc['name'];?></a>
                        	<div id="shipin_title<?=$vkc['id']?>"  style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div>
                        <span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>">免费</a><a href="javascript:;" class="buy_xj" <?= $userInfo['type']==2?'onclick="goExam('.$vkc['id'].')"':''?>>测评</a></li>
                        <?php }else{?>
							<li aid="<?=$vkc['id']?>"><a href="javascript:;" onclick="checkBuy(<?= $slist['id']?>,<?= $vcha['id']?>,<?= $vkc['id']?>,3,'3')" class="buy_title"><?= $vkc['name'];?></a>
                            <div id="shipin_title<?=$vkc['id']?>"  style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="javascript:;" onclick="checkBuy(<?= $slist['id']?>,<?= $vcha['id']?>,<?= $vkc['id']?>,3,'3')" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div>
                            <span class="xuxian"></span><a href="javascript:void(0);"  onclick="checkBuy(<?= $slist['id']?>,<?= $vcha['id']?>,<?= $vkc['id']?>,3,'3')" class="buy_xj">购买</a><a href="javascript:;" class="buy_xj" <?= $userInfo['type']==2?'onclick="goExam('.$vkc['id'].')"':''?>>测评</a></li>	
				<?
						}
						}            
					}
				}
				?>
						</ul>
					</div> 
				</div>
           <?php
			}
		}else{?>
        <div class="menu_body" ><div class="con_list2" style="text-align:center">暂无相关课程</div> </div>    
        <?php
		}
	}
	?>
        	</div>
        <?php
	}else{
		?>
        <!--未登录-->
        <div id="firstpane" class="menu_list">
            <?
                if($cha_list){
                    foreach($cha_list as $kcha => $vcha){
            ?>
                
                <div class="menu_body" >       
                    <div class="con_list2">     
                        <ul>            
                        <? 
                            if($vcha['choice_kc']){
                                $arrkc = str_replace('\\','',$vcha['choice_kc']);
                                eval("\$arr = ".$arrkc.'; '); 
                                foreach($arr as $kkc => $vkc){
									$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
							$teach	  =	DS("publics2._get","","users","id=".$courinfo[0]['teach_id']);
											if($courinfo[0]['is_open'] == '1'){
												
                        ?>  
                        <li aid="<?=$vkc['id']?>"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><?= $vkc['name'];?></a>
                        	<div id="shipin_title<?=$vkc['id']?>"  style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?><?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div><span class="xuxian"></span><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>"></a><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$vcha['id'].'&id='.$vkc['id'].'&catid=3')?>">免费</a><a href="javascript:;" class="buy_xj" onclick="jAler()">测评</a></li>
                        <?php }else{?>
                            <li aid="<?=$vkc['id']?>">
                            <a href="javascript:;" onclick="jAler()" class="buy_title"><?= $vkc['name'];?></a>
                            <div id="shipin_title<?=$vkc['id']?>"  style="display:none;float:left;position:absolute;left:350px;z-index:3;top:0;width:370px;">
                            	<p style="display:inline-block;"><a href="javascript:;" onclick="jAler()" class="buy_title"><img src="images/course_conimg_18.png" /></a></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">课时：<?= $courinfo[0]['kc_hours']?><?= $courinfo[0]['kc_hours']?></p>
                                <p style="color:#666;font-size:12px;margin-left:15px;display:inline-block;">赞（<?= $courinfo[0]['good']?>）踩（<?= $courinfo[0]['bad']?>）</p>
                            </div><span class="xuxian"></span>
                            <a href="javascript:void(0);"  onclick="checkBuy(<?= $slist['id']?>,<?= $vcha['id']?>,<?= $vkc['id']?>,3,'3')" class="buy_xj">购买</a><a href="javascript:;" class="buy_xj" onclick="jAler()">测评</a></li>
						<?	}
                                }
                            }
                        ?>
                        </ul>
                    </div> 
                </div>
            <?php	
				}
			}else{?>
			<div class="menu_body" ><div class="con_list2" style="text-align:center">暂无相关课程</div> </div>
            <?php
			}
            ?>
        </div>
        <?php
			}
		?>
    </div>
    <div class="con_btm_right">
        <div class="con_right_top">
            <h3>最热课程排行榜</h3>
            <?
                if($hot_list){
                    foreach($hot_list as $khot => $vhot){
					$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$vhot['id']." group by userID"); 
            ?>
            <div class="right_top_con">
                <a href="<?= URL('courSystem.courseCon','&clssid='.$vhot['couClass'].'&sid='.$vhot['id'].'&catid=2')?>">
                <img src="<?= !empty($vhot['thumb'])?$vhot['thumb']:'images/course_conimg_15.png' ?>" style="width:130px;height:65px"/>
                <span class="right_title"><?= $vhot['stitle']?></span>
                <span><?= $vhot['sys_hours']?></span>
                <span><img src="images/course_conimg_22.png" /><?= count($buy_sys)?>人在学习</span>
                <div class="clearfloat"></div>
                </a>
            </div>
            <?
                    }
                }
				$buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$sid." group by userID"); 
				//var_dump($buy_sys);die;
            ?>
        </div>
        <div class="con_right_top">
            <h3><?= count($buy_sys)?>人在学习该课程</h3>
            
            <ul>
                <?php
				
				if(!empty($buy_sys)){
                        foreach($buy_sys as $sk => $sv){
							$buyuser = DS("publics2._get","","users","id=".$sv['userID']." limit 0,4"); 
                ?>
                <li><img src="<?= !empty($buyuser[0]['logo'])?$buyuser[0]['logo']:'images/course_conimg_27.png' ?>" style="width:49px;height:49px"/><span><a href="<?= URL('bbsUser.user_broadcast','&id='.$buyuser[0]['id'])?>" style="color:black"><?= $buyuser[0]['realname']?></a></span></li>
                <?php
						}
                    }
                ?>
            </ul>
            <div>换一批</div>
            <div class="clearfloat"></div>
        </div> 
    </div>
    <div class="clearfloat"></div> 
</div>
</div>
<script type="text/javascript">
	
	$(".con_list2 ul li").mouseover(function(){
		var id = $(this).attr("aid");	
		$("#shipin_title"+id).css("display","block");
	});
	$(".con_list2 ul li").mouseout(function(){
		var id = $(this).attr("aid");	
		$("#shipin_title"+id).css("display","none");
	});
	
</script>


<script>
function goExam(coid){		
	window.location.href="<?= URL('member.exam_detail','&coid=')?>"+coid;	
}


function test(){
	$("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
}

function jAler(){
	$("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
}
function buy(t){
	if(t==1){
		var uid  	= $("#buyuid1").val();
		var type 	= $("#type1").val();
		var systemid	= $("#systemid1").val()
		var pid		= $("#pid1").val();
		var coid	= $("#coid1").val();
		var catid	= $("#catid1").val();	
	}else if(t==2){
		var uid  	= $("#buyuid2").val();
		var type 	= $("#type2").val();
		var systemid	= $("#systemid2").val();
		var pid		= $("#pid2").val();
		var coid	= $("#coid2").val();
		var catid	= $("#catid2").val();		
	}else if(t==3){
		var uid  	= $("#buyuid3").val();
		var type 	= $("#type3").val();
		var systemid	= $("#systemid3").val()
		var pid		= $("#pid3").val();
		var coid	= $("#coid3").val();
		var catid	= $("#catid3").val();			
	}
									
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
<!--footer-->
<?php TPL :: display("footer1")?>
<!--footer--end-->
</div>
</body>
</html>