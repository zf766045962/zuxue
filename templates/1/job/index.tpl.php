<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); $ad_list=	DS("publics2._get","","article_class","classid=".$catid);echo $ad_list[0]['classname']  ." - ".  $site_name[0]['value']?></title>    
<meta name="keywords" content="<?php echo $ad_list[0]['keyword']?>">  
<meta name="description" content="<?php echo $ad_list[0]['description']?>"> 
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
<link rel="stylesheet" type="text/css" href="css/course.css" />
<link rel="stylesheet" media="screen" type="text/css" href="css/new-index.css"/>
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
<div class="zong">
	<div class="content">
    	
        <!--分类导航-->
		<div class="sort">
			<div class="sort-list"> 
				<ul>
					<li class="hover2"> <span class="li_title">全部分类</span> </li>
		<?
        $link_list = DS('publics._get','','linkage',' parentid = 0 and keyid = 1');
            if($link_list){
                foreach($link_list as $key => $val){
        ?>
					<li><a href="<?= URL('courSystem.index','&couClass='.$val['linkageid'])?>">
						<?= $val['name']?>
						<img src="images/index_img_03.png"/><!--<span>IOS/iPhone/AndroidARM</span>--></a>
						<ul>
					<?
                    $c_list = DS('publics._get','','linkage',' parentid = '.$val['linkageid']);
                    if($c_list){
                        foreach($c_list as $ck => $cv){
                    ?>
							<li><a href="<?= URL('courSystem.index','&couClass='.$cv['linkageid'])?>"><?= $cv['name']?></a></li>
					<?
                        }
                    }
					?>
						</ul>
					</li>
		<?
				}
			}
		?>
				</ul>
			</div>
		</div>
        <!--分类导航-->
        
        <!--video-->
		<div class="content_right n-course-box w-content">
			<ul>
	<?
        if($slist){
            foreach($slist as $sk => $sv){
                $buy_sys	=	DS("publics2._get","","integral","sourceType=1 and systemid=".$sv['id']." group by userID"); 
    ?>
				<li>
                	<div class="course-pic-txt"><img width="273" height="158" src="<?=$sv['thumb']?>" /><div class="n-pic-mask"></div></div>
                    <div class="c-course-info">
                        <div class="c-course-name"><a href="<?= URL('courJob.jobCon','classid='.$sv['couClass'].'&sid='.$sv['id'].'&catid=4');?>" target="_blank"><?php echo $sv['stitle']?></a></div>
                        <div class="course-bot-info">
                        	<span class="c-details right">更新时间：<em><?= date("Y-m-d",$sv['inputtime'])?></em></span>
                            <span class="c-details right" style="float:right;margin-right:10px;"><em><?= count($buy_sys)?></em>人在学习</span>
                        </div>
                        <div class="course-time">
                            <a  class="n-collect" status="0"  href="javascript:void(0);" treeid="9094" onclick="collect(<?= $sv['id']?>,4)"></a>
                            <span>时长：<em><?php echo $sv['sys_hours']?></em></span></div>
                        <div class="course-hover-btn">
                            <span class="study-btn"><a href="<?= URL('courJob.jobCon','classid='.$sv['couClass'].'&sid='.$sv['id'].'&catid=4');?>" target="_blank">开始学习</a></span>
                            <span class="det-btn"><a title="购买" href="javascript:;" onclick="checkBuy(<?= $sv['id']?>,0,0,4,1)">购买</a></span> 
                        </div>
                    </div>
				</li>
	<? 
            }
        }
    ?>
			</ul>
			<div class="clearfloat"></div>
        	<div class="fenye"><?= $pager?></div>
         	<input type="hidden" name="huid" id="huid" value="<?= $_SESSION['xr_id']?>">
            <input type="hidden" name="url" id="url" value="<?= $_SERVER['HTTP_HOST']?>">
		</div>
		<div class="clearfloat"></div>
        <!--video-->
	
    </div>
</div>
<div class="tanchu2">
<script>   
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
        <a href="javascript:;" onclick="buy(1)">立即购买</a>
    </div>
</div>
<div id="qwww" style="width:100%; position: fixed; top:0; left:0; z-index:111; height:100%; background:#000; opacity:0.4;filter:alpha(opacity=40); display:none; "></div>
<!--footer-->
<?php TPL :: display("footer1")?>
<!--footer--end-->
</div>
</body>
</html>
