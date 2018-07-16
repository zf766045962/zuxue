<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); $cinfo 		= DS("publics2._get","","course","id=".$cid);echo $cinfo[0]['title']  ." - ".  $site_name[0]['value']?></title>    
<meta name="keywords" content="<?php echo $ad_list[0]['keyword']?>">  
<meta name="description" content="<?php echo $ad_list[0]['description']?>">
<link rel="stylesheet" type="text/css" href="/css/head.css" /> 
<link rel="stylesheet" type="text/css" href="/css/foot.css" /> 
<link href="/css/jquery.alerts.css" rel="stylesheet" />
<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("http://xuer.com","http://xuer.com");</script>
<!-- 滚动图片 -->
<!--  <script type="text/javascript" src="js/jQuery.v1.8.3-min.js"></script>-->
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/js/zzsc.js"></script>		
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
<script type="text/javascript" src="/js/jq.Slide.js"></script>
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
<script type="text/javascript" src="/js/tc.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="/css/course_vedios.css" />
<script src="/s/jquery-mousewheel.js"></script>
<script src="/js/antiscroll.js"></script>
<script>
  $(function () {
	scroller = $('.box-wrap').antiscroll().data('antiscroll');
  });
</script>
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
<div class="content">
    <div class="con_top">
    	<div class="con_left">
<?php 
	$sinfo		= DS("publics2._get","","system","id=".$sid);
    $pinfo 		= DS("publics2._get","","chapter","id=".$pid);
	$buy_sys 	= DS("publics2._get","","integral","userID = ".$_SESSION['xr_id']." and sourceType=1 and systemid=".$sid." and type=1");
	$buy_cha 	= DS("publics2._get","","integral","userID = ".$_SESSION['xr_id']." and sourceType=1 and pid=".$pid." and type=2");
	$good 		= DS("publics2._get","","course","id=".$cid);
?>
        	<h3><?php if($catid==2){?><a href="<?= URL('courSystem.courseCon','&classid='.$classid.'&sid='.$sid.'&catid=2')?>" style="color:#999999"><?= $sinfo[0]['stitle']?></a><?php }else if($catid == 3){?><a href="<?= URL('courAdvance.advanceCon','&classid='.$classid.'&sid='.$sid.'&catid=3')?>" style="color:#999999"><?= $sinfo[0]['stitle']?></a><?php }else{?><a href="<?= URL('courJob.jobCon','&classid='.$classid.'&sid='.$sid.'&catid=4')?>" style="color:#999999"><?= $sinfo[0]['stitle']?></a><?php }?> >> <?php if($catid==2){?><a href="<?= URL('courSystem.courseCon','&classid='.$classid.'&sid='.$sid.'&catid=2')?>" style="color:#999999"><?= $pinfo[0]['ctitle']?></a><?php }else if($catid == 3){?><a href="<?= URL('courAdvance.advanceCon','&classid='.$classid.'&sid='.$sid.'&catid=3')?>" style="color:#999999"><?= $pinfo[0]['ctitle']?></a><?php }else{?><a href="<?= URL('courJob.jobCon','&classid='.$classid.'&sid='.$sid.'&catid=4')?>" style="color:#999999"><?= $pinfo[0]['ctitle']?></a><?php }?>  >> <?= $cinfo[0]['title']?><p style="float:right;color:#999999;"><a href="javascript:;" onClick="comment('1')" style="color:#999999;font-size:14px" id="good"><img src="images/3.png" title="赞" style="height: 15px;position: relative;top: 2px;margin-right: 3px;">赞(<?= empty($good[0]['good'])?'0':$good[0]['good']?>)</a><a href="javascript:;" onClick="comment('2')" style="color:#999999;font-size:14px" id="bad"><img src="images/2.png" title="踩" style="height: 15px;position: relative;top: 2px;margin-right: 3px;">踩(<?= empty($good[0]['bad'])?'0':$good[0]['bad']?>)</a></p></h3>
            <div class="vedios"><? echo htmlspecialchars_decode($plist['mv_url'],ENT_QUOTES)?></div>
        </div> 
        <input type="hidden" name="huid" id="huid" value="<?= $_SESSION['xr_id']?>">
        <input type="hidden" name="coid" id="coid" value="<?= $cid?>">
<script>
		function goExam(coid){
			var uid = $("#huid").val();										//alert(uid); 
		if(uid=='' || uid == 0){
		   // jAlert('请先登录','温馨提示');
			$("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
		}else{
			window.location.href="<?= URL('member.exam_detail','&coid=')?>"+coid;	
		}	
		}
	 function comment(type){
		var uid = $("#huid").val();										//alert(uid); 
		if(uid=='' || uid == 0){
		   // jAlert('请先登录','温馨提示');
			$("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
		}else{
			$.ajax({  
				url:'<?= URL('courSystem.comment_video')?>',                   
				type:'POST',
				data:{uid:uid,coid:<?= $cid?>,type:type,},
				
				success:function(r){
					e = eval('(' + r + ')');
					if(e.status == '1'){
						//jAlert(e.info,'温馨提示');
						$("#good").html("赞("+e.good+")");
						$("#bad").html("踩("+e.bad+")");		
					}else{
						jAlert(e.info,'温馨提示');	
					} 
				}
			});	
		}
	}
</script>
        <div class="con_right menu_body">
			<h3><img src="images/vadius_list.png" />课程列表</h3>
            <div class="box-wrap antiscroll-wrap">
                <div class="box">
                  <div class="antiscroll-inner box-inner">
                      <ul>
                      
<?php
	if($cha_info['choice_kc']){
		$arrkc = str_replace('\\','',$cha_info['choice_kc']);
		eval("\$arr = ".$arrkc.'; '); 	//var_dump($arr);die;   
		foreach($arr as $kkc => $vkc){
			if($vkc['id'] == $cid){
				$key = $kkc;	
			} 	
		}
	}      

	if($cha_info['choice_kc']){
		if(empty($buy_sys) && empty($buy_cha)){ 
			$arrkc = str_replace('\\','',$cha_info['choice_kc']);
			eval("\$arr = ".$arrkc.'; '); 
			//var_dump($arr);die;        
			foreach($arr as $kkc => $vkc){
				if($vkc['id'] != $cid){
					$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
					if($courinfo[0]['is_open'] == '1'){
	?>  	
    					<li><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>">免费</a></li>    
             <?php  }else{
						$buy_cou = DS("publics2._get","","integral","userID = ".$_SESSION['xr_id']." and sourceType=1 and coid=".$vkc['id']." and type=3");					
						if(empty($buy_cou)){
			?>            
                        <li><a href="javascript:;" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a href="javascript:void(0);" onClick="checkBuy(<?= $sid?>,<?= $pid?>,<?= $vkc['id']?>,2,'3')" class="buy_xj">购买</a></li> 
                        			
                <?  	}else{ ?>
						<li><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>">已购买</a></li>
				
                <?		}
					}      
                 }else{
				?>
                     <li class="hover"><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj">播放中</a></li>   
                <?		
						}
                   	}
				}else{
					$arrkc = str_replace('\\','',$cha_info['choice_kc']);
					eval("\$arr = ".$arrkc.'; '); 
					//var_dump($arr);die;   
					foreach($arr as $kkc => $vkc){
						if($vkc['id'] != $cid){ 
							$courinfo = DS("publics2._get","","course","id=".$vkc['id']);
							if($courinfo[0]['is_open'] == '1'){
				?>
						
							<li><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>">免费</a></li>
						<?php }else{?>            
							<li><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj" href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>">已购买</a></li>
				<?  		}
						}else{
				?>	
							<li><a href="<?= URL('courSystem.curriculumEver','classid='.V('r:classid').'&sid='.V('r:sid').'&pid='.$cha_info['id'].'&id='.$vkc['id'].'&catid='.$catid)?>" class="vedios_right" title="<?= $vkc['name']?>"><?= F("publics.substrByWidth",$vkc['name'],26);?></a><span class="xuxian"></span><a class="buy_xj">播放中</a></li>
				<?		
						}
					}
			   }     
			}
				?>
                    </ul>
                  </div>
                </div>
         	</div>
		</div>
        <!--<img src="images/shipin_img_03.png">-->
        <div class="clearfloat"></div>
    </div>
<script>
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
					if(e.status == '3'){
						$("#pricess3").html(e.info);
						$("#xiangxi3").html(e.intro);
						$("#a3").show();
						$("#qwww").show();
						$("#buyuid3").val(uid);
						$("#type3").val('3');
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
	
	$(function(){
		$("#acbiji").click(function(){
			$("#biji").css("display","block");
		})
		$("#guan").click(function(){
			$("#biji").css("display","none");
		})
		$("#acfatie").click(function(){
			$("#biji").css("display","none");
		})
	})
	$(function(){
		$("#acfatie").click(function(){
			$("#fatie").css("display","block");
		})
		$("#guan1").click(function(){
			$("#fatie").css("display","none");
		})
		$("#acbiji").click(function(){
			$("#fatie").css("display","none");
		})
	})
	
	function buy(t){
		var uid  	= $("#buyuid3").val();
		var type 	= $("#type3").val();
		var systemid	= $("#systemid3").val()
		var pid		= $("#pid3").val();
		var coid	= $("#coid3").val();
		var catid	= $("#catid3").val();			
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
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
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
    <div style="position:fixed;bottom:20%;right:0px;z-index:100;cursor:pointer;"><!--<img src="images/biji.png" onclick="dialog('<?= URL("courSystem")?>','做笔记',400,300)"/>--><!--<img src="images/xuer_img_03.jpg" id="acfatie" />--><a href="javascript:;" style="color:#369998;font-size:14px;display:block;" onclick="goExam(<?= $cinfo[0]['id']?>)"><img src="images/xuer_img_03.png" /></a><img src="images/xuer_img_05.png" id="acbiji" /></div>
    <div class="biji" id="biji" style="display:none;">
        <div class="tit"><span>做笔记</span><i class="close"><img id="guan" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
        <form>
            <p><span>标题：</span><input type="text" name="title" id="title" placeholder="请输入标题..." /></p>
            <p><span>内容：</span><textarea name="content" id="content" style="resize:none"></textarea></p>
            <input type="hidden" name="classid" id="classid" value="<?= $classid?>" />
            <input type="hidden" name="sid" id="sid" value="<?= $sid?>" />
            <input type="hidden" name="pid" id="pid" value="<?= $pid?>" />
            <input type="hidden" name="cid" id="cid" value="<?= $cid?>" />
            <input type="hidden" name="catid" id="catid" value="<?= $catid?>" />
            <input type="button" name="button" id= "bbtn" value="提交" class="biji_btn" />
            <p style="display:none"><input type="reset" name="rest" id="rest" value="重置"></p>
         </form>
    </div>
    <div class="biji" id="fatie" style="display:none;">
        <div class="tit"><span>发帖</span><i class="close"><img id="guan1" src="images/one_img_03.png"></i><div class="clearfloat"></div></div>
        <form>
            <p><span>主题：</span><input type="text" name="title" id="title1" placeholder="请输入标题..." /></p>
            <p><span>内容：</span><textarea name="content" id="content1" style="resize:none"></textarea></p>
            <input type="hidden" name="classid" id="classid1" value="<?= $classid?>" />
            <input type="hidden" name="sid" id="sid1" value="<?= $sid?>" />
            <input type="hidden" name="pid" id="pid1" value="<?= $pid?>" />
            <input type="hidden" name="cid" id="cid1" value="<?= $cid?>" />
            <input type="hidden" name="catid" id="catid1" value="<?= $catid?>" />
            <input type="button" name="button" id= "bbtn1" value="提交" class="biji_btn" />
            <p style="display:none"><input type="reset" name="rest" id="rest" value="重置"></p>
         </form>
    </div>
<?php
	//var_dump($classid);var_dump($sid);var_dump($pid);var_dump($cid);var_dump($catid);
?>  
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
    </script> 
        <div class="tanchu_one" id="a3" style="display:none">
            <h3>购买本小节课程<img src="images/one_img_03.png" id="b3" /></h3>
            <div class="clearfloat"></div>
            <div class="xiangxi" id="xiangxi3">
            </div>
            <p id="pricess3" class="pricess"></p>
            <input type="hidden" name="buyuid3" id="buyuid3" value="" />
            <input type="hidden" name="type3" id="type3" 	value="3" />
            <input type="hidden" name="systemid3" id="systemid3" value="" />
            <input type="hidden" name="pid3" id="pid3" value="" />
            <input type="hidden" name="coid3" id="coid3" value="" />
            <input type="hidden" name="catid3" id="catid3" value="" />
            <a href="javascript:;" onClick="buy(3)">立即购买</a>
        </div>
    <div id="qwww" style="width:100%; position: fixed; top:0; left:0; z-index:111; height:100%; background:#000; opacity:0.4;filter:alpha(opacity=40); display:none; "></div>
<div class="con_bottom">   
	<div class="con_btm_left">
		<div class="lib_Menubox">
			<ul>
			   <li id="one1" class="hover">相关问题</li>
			</ul>
		</div>
		<!--<img src="images/shipin_img_10.png" />-->
		<div style="padding:5px 15px">
            <form>
                <textarea name="askquiz" id="askquiz" cols="130" rows="5" style="width:840px;"></textarea>
                <input type="hidden" id="xrid" value="<?=$_SESSION['xr_id']?>" />
                <input type="hidden" id="xrname" value="<?=$_SESSION['xr_name']?>" />
                <center><input type="button" onClick="is_submit()" value="提交" /></center>
                <p style="display:none"><input type="reset" id="set" value="重置" /></p>
        	</form>
        </div>
		<script>
			$(document).ready(function(){
				$("#bbtn").click(function(){
					if($("#xrid").val()==""){
						$("#maskLayer").attr("style","display:block");
        				$("#alert").slideDown();
						return false;
					}else{
						var uid 		= 	$("#xrid").val();
						var classid 	= 	$("#classid").val();
						var sid 		= 	$("#sid").val();
						var pid 		= 	$("#pid").val();
						var cid 		= 	$("#cid").val();
						var catid 		= 	$("#catid").val();
						var title 		= 	$("#title").val();
						var content 	= 	$("#content").val();
						if(title == '' || title.replace(/^\s*/g, "") == ''){
							jAlert("请输入标题","温馨提示")	;
							return false;
						}
						
						if(content == '' || content.replace(/^\s*/g, "")){
							jAlert("请输入内容","温馨提示")	;
							return false; 
						}
						$.ajax({
							url:'<?= URL('courSystem.save_notes')?>',
							type:'POST',
							data:{
								uid		:	uid,
								sid		:	sid,
								pid		:	pid,
								cid		:	cid,
								catid	:	catid,
								title	:	title,
								content	:	content,
								classid	:	classid,	
							},
							success:function(r){
								e = eval('(' + r + ')');
								if(e.status == '1'){
									//alert(1);
									jAlert(e.info,'温馨提示');
									$("#rest").click();
									//location.reload(true); 
								}else{
									jAlert(e.info,'温馨提示');
								}	
							}
						});
					
					}
				});
			});
		
			$(document).ready(function(){
				$("#askquiz").click(function(){
					if($("#xrid").val()=="" || $("#xrid").val()==0){
						$("#alert").css("display","block");
            			//$("#maskLayer").css("display","block");
						return false;
					}
				});
			});
			     
			function is_submit(){
				
				if($("#xrid").val()=="" || $("#xrid").val() ==0){
					$("#maskLayer").attr("style","display:block");
        $("#alert").slideDown();
					return false;
				}	
					if($("#askquiz").val() == "" || $("#askquiz").val().replace(/^\s*/g, "") == ''){
						jAlert("请填写提问内容","提示");
						return false;
					}
					$url = "<?= URL('courSystem.ask_course')?>&classid=<?= V('r:classid')?>&sid=<?= V('r:sid')?>&pid=<?= V('r:pid')?>&id=<?= V('r:id')?>&askquiz="+encodeURIComponent($('#askquiz').val());
				//alert($url);
					$.post($url,function(data){
						//location = location;
						jAlert('您的问题已经提交','提示');
						$("#set").click();
					});
			}
		</script>
        <div id="questionId">
		<?
			if($alist){
				foreach($alist as $ka => $va){
		?>
		<div class="left_con" id="questionid">
        	<?php  $qinfo = DS("publics._get","","users","id=".$va['uid'])?>
			<img style=" display:inline-block;width:72px; height:72px; border:4px solid #fff; border-radius:100%" src="<?= !empty($qinfo[0]['logo'])?$qinfo[0]['logo']:'images/course_conimg_27.png'?>" />
			<div class="left_con_left">
				<h3><?= $va['askquiz']?></h3>
				<span><?= $va['realname']?></span>
				<span>提问时间：
                <?php
					$reply = DS("publics._get","","question_reply","qid=".$va['id']); 
					$istrue = DS("publics._get","","question_reply","qid=".$va['id']." and istrue=1"); 
				?>
				<?
					if($va['inputtime']){
						$time = time()-$va['inputtime'];
						if($time<60){
							echo floor($time)."秒前";
						}
						if($time>60&&$time<3600){
							echo floor($time/60)."分钟前";
						}
						if($time>3600){
							echo floor($time/3600)."小时前";
						}
					}
				?>
				</span><div class="clearfloat"></div>
                <?php
                	if(!empty($istrue)){
				?>
				<p><?= str_replace('</p>','',str_replace('<p>','',$istrue[0]['content']))?></p>
                <?php
					}
				?>
			</div>
			<div class="right_con_right">
				<span><?= count($reply)?></span>
				<?=  !empty($istrue)?"已解决":"待解决" ?> 
                <a href="javascript:;" style="color:#666;margin-left:10px;" onclick="replyshow(<?= $va['id']?>)">回复</a>
			</div>
            <style>
            	.huifu p{width: 800px;margin: 10px 20px;color: #666;line-height: 25px;text-indent: 2em;}
            </style>
			<div class="clearfloat"></div>
           <?php  
		   		if(!empty($reply)){
					foreach($reply as $rrk => $rrv){
			?>
            	<div class="huifu"><p><?= $rrv['content']?></p></div>
             
            <?php		
					}
				}
			?>
            <div style="padding:5px 15px;display:none" id="reply<?= $va['id']?>" class="replynone" replyid="reply<?= $va['id']?>">
            <form>
                <textarea name="recontent" id="recontent<?= $va['id']?>" cols="130" rows="5" style="width:800px;"></textarea>
                <input type="hidden" id="xrid" value="<?=$_SESSION['xr_id']?>" />
                <center><input type="button" onclick="reply(<?= $va['id']?>,<?= $va['uid']?>)" value="回复" /></center>
                <p style="display:none"><input type="reset" id="set22" value="重置" /></p>
        	</form>
        </div>
		</div>
		<? 
				}
			}
		?>
<script> 
	function replyshow(qid){
		$(".replynone").attr("style","padding:5px 15px;display:none");   
		$("#reply"+qid).attr("style","padding:5px 15px;display:block");
		//alert(qid);
		//alert(quid);
	}
	
	function reply(qid,quid){
		var content	=	formatStr($("#recontent"+qid).val());
		var requid	=	$("#xrid").val();
		if(requid ==''){ 
			$("#alert").slideDown();
			$("#maskLayer").css("display","block");
			return false;	
		}
		
		if(content == ''){ 
			jAlert('回复内容不能为空','温馨提示');
			return false;	
		}
		
		if(requid==quid){
			jAlert('自己不能回复自己','温馨提示');
			return false;	 
		}
		
		if(requid !='' && content != '' && requid!=quid){
			$.ajax({
				url:'<?= URL('reply.saveReply')?>',
				type:'POST',
				data:{
					requid	: requid,
					content:content,
					qid	:qid,
					quid	:quid	
				},
				success:function(r){
					e = eval('(' + r + ')');
					if(e.status == 1){
						$("#reply"+qid).attr("style","padding:5px 15px;display:none");
						$("#set22").click();	     
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
		str	= str.replace(/^\s*/g,'');
		return str;
	}

</script>
		<div class="fenye">
			<?= $pager?>
		</div>
        </div>
	</div>
	<div class="con_btm_right">
		<div class="con_right_top">
			<h3><?= $plist['title']?></h3>
			<div class="right_top_con">
				<span><?= $plist['kc_hours']?></span>
				<span><?= date('Y-m-d',$plist['inputtime'])?></span>
			</div>
            <?php  $buy = DS("publics._get","","integral","sourceType=1 and type= 3 and coid=".$cid);?> 
			<div class="right_btm_con">
                <script type="text/javascript">
					$(function(){
						$(".teacher_message").hover(function(){$("#teacher").fadeIn()},function(){$("#teacher").fadeOut()});
					});       
				</script>
                <div class="teacher_message">
                    <img class="teacher_head" src="<?= !empty($plist['logo'])?$plist['logo']:'images/course_conimg_27.png'?>" />
                    <div class="teacher" id="teacher" style="display:none;">
                        <p><span>姓名：</span><?= $plist['realname'];?></p>
                        <p><span>性别：</span><?php if($plist['sex']==1){echo '男';}else if($plist['sex']==2){echo '女';}else{echo '保密';};?></p>
                        <p><span>邮箱：</span><?= $plist['email'];?></p>
                        <p><span>手机：</span><?= $plist['username'];?></p>
                        <p><span>个人简介：</span><?=$plist['introduce']?></p>
                    </div>
                </div>
				<span class="right_title"><?= $plist['realname'];?></span>
				<span class="right_con">学啊教育金牌导师</span>
				<span class="right_con"><img src="images/course_conimg_22.png" style="height:14px;width:14px;position:relative;top:3px;" /><?= count($buy)?>人在学习</span>
				<div class="clearfloat"></div>
			</div>
			<div class="right_btm_con">
				<h4>讲师介绍：</h4>
				<p class="rgt_btm_con"><?=$plist['introduce']?></p>
			</div>
             <?php  $sys_info = DS("publics._get","","system","id=".$sid);?> 
			<div class="right_btm_con">
				<h4>课程内容：</h4>
				<p class="rgt_btm_con"><?= !empty($sys_info[0]['introduce'])?$sys_info[0]['introduce']:"暂无相关内容"?></p>
			</div>
		</div>
        <div class="con_right_top">
            <h3><?= count($buy_course)?>人在学习该课程</h3>
            <ul>
                <?
				if(!empty($buy_course)){
                        foreach($buy_course as $sk => $sv){
							$buyuser = DS("publics2._get","","users","id=".$sv['userID']." limit 0,4"); 
                ?>
                <li><img src="<?= !empty($buyuser[0]['logo'])?$buyuser[0]['logo']:'images/course_conimg_27.png' ?>" style="width:49px;height:49px"/><span><a href="<?= URL('bbsUser.user_broadcast','&id='.$buyuser[0]['id'])?>"><?= !empty($buyuser[0]['realname'])?$buyuser[0]['realname']:$buyuser[0]['username']?></span></li>
                <?
						}
                    }
                ?>
            </ul>
            <div class="clearfloat"></div>
        </div>
	</div>
	<div class="clearfloat"></div>
</div>
</div>
<!--end_content-->
<script type="text/javascript">
	function thisMovie(movieName){  
		if (window.document[movieName]){
			return window.document[movieName];　　  
		}else if (navigator.appName.indexOf("Microsoft")==-1){
			if (document.embeds && document.embeds[movieName])
				return document.embeds[movieName];
		}else{
			return document.getElementById(movieName);
		}
	}
    var ccplayer;
    function on_cc_player_init(vid, objectID) {
        ccplayer = thisMovie(objectID);
        console.info("on_cc_player_init", vid, objectID);
        if (ccplayer) {
            var config = {};            
            ccplayer.setConfig(config);
            console.info("setConfigSuccess");
        } else {
            console.info("setConfigFailed");
        }
    }
	ccplayer.setVolume(5);
</script>
<?php TPL :: display("footer1")?>
</div>
</body>
</html>