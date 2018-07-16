<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); $ad_list=	DS("publics2._get","","article_class","classid=".$cid);echo $ad_list[0]['classname']  ." - ".  $site_name[0]['value']?></title>    
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
</head>
<body>
<div class="container">
    <?php TPL :: display("header1")?>
<div style="background:#f2f2f2;width:100%;margin:0 auto;">
	<!--<div class="banner" style="text-align:center;">
		<img src="images/wenda_img_02.png" />
		<div class="clearfloat"></div>
	</div>--> 
	<!--content-->
	<div class="content">    
		<div class="sort">
			<div class="sort-list">
				<ul>
				 	<li class="hover2"><span class="li_title">全部分类</span></li>
		<?
            $link_list = DS('publics._get','','linkage',' parentid = 0 and keyid = 1');
            if($link_list){
                foreach($link_list as $key => $val){
        ?>
					<li>
						<a href="javascript:;"><?= $val['name']?><img src="images/index_img_03.png"/></a>
						<ul>
				<?
                $c_list = DS('publics._get','','linkage',' parentid = '.$val['linkageid']);
                    if($c_list){
                        foreach($c_list as $ck => $cv){ 
                ?>
							<li><a href="<?= URL('courSystem.index','&couClass='.$cv['linkageid'])?>"><?=$cv['name']?></a></li>
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
		<link rel="stylesheet" type="text/css" href="css/interlocution.css" />
		<div class="content_right">
            <div class="right_top"> 
                <input class="searTxt ff4" type="text" onfocus="if(this.value=='请输入要搜索的问题或您的提问'){this.value='';this.style.color='#333'}" onblur="if(this.value=='' || this.value=='请输入要搜索的问题或您的提问'){this.value='请输入要搜索的问题或您的提问';this.style.color='#ccc'}" name="pro_name" id="pro_name" value="<?= !empty($pro_name)?$pro_name:'请输入要搜索的问题或您的提问'?>" style="color:#666;margin-left:0px">
                <input class="top_a sac" type="button" value="快速搜索" onclick="ser_form()" /><input type="button" class="top_a ans" onclick="make_question()" value="我要提问">       
                <input type="hidden" name="uid" value="<?= $_SESSION['xr_id']?>" id="uid">        
	<script>
        function make_question(){
            var uid = $("#uid").val();
            var pro_name	=	$("#pro_name").val();
            if(uid == ''){
                $("#alert").css("display","block");
                $("#maskLayer").css("display","block");	
            }else if(pro_name == '请输入要搜索的问题或您的提问' || $.trim(pro_name) == ''){
                jAlert('请输入您的提问','温馨提示');
            }else{
                $.ajax({
                    url:'<?= URL('reply.make_question')?>',
                    type:'POST',
                    data:{
                        uid			:	uid,
                        pro_name	:	pro_name,	
                    },
                    success:function(r){
                        e = eval('(' + r + ')');
                        if(e.status == '1'){
                            //alert(1);
                            location.reload(true); 
                        }else{
                            jAlert(e.info,'温馨提示');
                        }	
                    }
                });	
                    
            }
        }
        function ser_form() {
            var pro_name	=	$("#pro_name").val();		//alert(pro_name); 
            if(pro_name != '请输入要搜索的问题或您的提问' && $.trim(pro_name) != '') {
                location.href="<?= URL('reply.index','&pro_name=')?>"+pro_name;					
            }else{
                jAlert('请输入要搜索的问题','温馨提示');	
            }
        }
    </script> 
            </div>
			<div class="lib_Menubox lib_tabborder">
				<ul>
				   <li <?= ($qtype=='1' || $qtype =='')?'class="hover"':'' ?>><a href="<?= URL('reply.index','&qtype=1')?>">全部</a></li>
                   <li <?= $qtype=='2'?'class="hover"':''?>><a href="<?= URL('reply.index','&qtype=2')?>">已解决</a></li>
                   <li <?= $qtype=='3'?'class="hover"':''?>><a href="<?= URL('reply.index','&qtype=3')?>">未解决</a></li>
				</ul>
			</div>
			<div class="lib_Contentbox lib_tabborder">
				<div id="con_one_1">
                <?php
            if(!empty($question)){	
				foreach($question as $qk=>$qv){
				
				//得到问题下所有老师回复
				$que_reply1	=	DS("publics2._get","","question_reply","qid=".$qv['id']." and userType = 1");
				//得到问题下所有学生回复	
				$que_reply	=	DS("publics2._get","","question_reply","qid=".$qv['id']." and userType = 2");
				
				//判断问题是否解决
				$istrue		=	DS("publics2._get","","question_reply","qid=".$qv['id']." and istrue = '1'");
				
				//提问者信息
				$info		=	DS("publics2._get","","users","id=".$qv['uid']);
        	?>
					<div class="pl_bottom">
						<div class="pl_left">
							<a href="<?= URL('bbsUser.user_broadcast','&id='.$info[0]['id'])?>"><img <?= $info[0]['logo']==''?'src="images/wenda_img_03.png"':'src='.$info[0]['logo']?> class="tx_img"/></a>
							<span <?= !empty($qv['isdeal'])?'class="hot"':'class="hot_d"'?>><?=  !empty($qv['isdeal'])?'已解决':'待解决'?></span>
							<span class="jb_name"><?= date('Y-m-d',$qv['inputtime'])?></span><span class="jb_name"><img src="images/wenda_img_06.png" /><a href="<?= URL('bbsUser.user_broadcast','&id='.$info[0]['id'])?>" style="color:#A4A4A4"><?= $info[0]['realname']?></a></span>
							<div class="clearfloat"></div>
							<p class="pl_con"><?= $qv['askquiz']?></p>
						</div>
						<div class="clearfloat"></div>
						<div class="btm_advance">
							<span><!--2015-03-01--></span><span><!--11:30--></span><a href="<?= URL('reply.question_reply','&qid='.$qv['id'])?>">回答（<?= count($que_reply)?>）</a>
						</div>
						<div class="clearfloat"></div>
                         <?php
         			if(!empty($que_reply1)){
						foreach($que_reply1 as $rk1=>$rv1){			
		 	?>
						<p class="pl_content">老师回答：<?= str_replace('</p>','',str_replace('<p>','',$rv1['content']))?></p>
			 <?php
						}
					}
		 ?>     	
                        
           <?php
         			if(!empty($que_reply)){
						foreach($que_reply as $rk=>$rv){			
		 	?>
						<p class="pl_content">学生回答：<?= str_replace('</p>','',str_replace('<p>','',$rv['content']))?></p>
			 <?php
						}
					}
		 ?>     			
					</div>
				<?php
				}
			echo '<div class="fenye">';
	  				echo $qpagehtml;
			echo '</div>';		
		 }
	?>      
	
				</div>
			</div>
		</div>
		<div class="clearfloat"></div>
	</div>
    <div class="clearfloat"></div>
</div>

<!--footer-->            
<?php TPL :: display("footer1")?>
<!--footer-->
</div>
</body>
</html>

