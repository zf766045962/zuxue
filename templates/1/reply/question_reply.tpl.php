<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); echo "回复—".$site_name[0]['value']?></title>    
<meta name="keywords" content="<?php $site_keyword = DS('publics.get_index','','site_keyword'); echo $site_keyword[0]['value']?>">  
<meta name="description" content="<?php $site_meat = DS('publics.get_index','','site_meat'); echo $site_meat[0]['value']?>">  
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
	/*$(document).ready(function () {
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
		
	});*/
	
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
<link rel="stylesheet" type="text/css" href="css/interlocution_con.css" />
<!--<div style="background:url(images/wenda_img_01.png) center top no-repeat #f4f4f4;width:100%;margin:0 auto;height:100%;">-->
<div>
    <!--<div class="banner">
        <img src="images/wenda_img_02.png" />
        <div class="clearfloat"></div>
    </div> 
    <!--content--> 
    <div class="content">
        <div class="content_left">
            <div class="pl_top">   
            	<?php  
					$userInfo	=	DS("publics2._get","","users","id=".$question['uid']);
				?>
                <a href="<?= URL('bbsUser.user_broadcast','&id='.$userInfo[0]['id'])?>"><img <?= $userInfo[0]['logo']==''?'src="images/wenda_img_03.png"':'src='.$userInfo[0]['logo']?> class="tx_img"/></a>
                <div class="pl_left">
                    <div class="top_left">
                        <span class="jb_name"><?= date('Y-m-d',$question['inputtime'])?></span><span class="jb_name"><?= date('H:i',$question['inputtime'])?></span>
                        <span class="hot">楼主</span><span class="jb_name"><img src="images/wenda_img_06.png" /><a href="<?= URL('bbsUser.user_broadcast','&id='.$userInfo[0]['id'])?>" style="color:#A4A4A4;"><?= $userInfo[0]['realname']?></a></span>
                        <div class="clearfloat"></div>
                    </div> 
                    <div class="btm_left">
                    <span <?= $question['isdeal']=='1'?'class="hot"':'class="hot" style="background: none repeat scroll 0 0 #F6A843;"'?>><?= $question['isdeal']=='1'?'已解决':'待解决'?> </span><p class="pl_content"><?= $question['askquiz']?></p>
                        <div class="clearfloat"></div>
                    </div>
                </div>
                <input type="hidden" id="suid" name="suid" value="<?= $_SESSION['xr_id']?>">
                <input type="hidden" id="quid" name="quid" value="<?= $question['uid']?>">
                <input type="hidden" id="qid" name="qid" value="<?= $question['id']?>">
                <div class="clearfloat"></div>
                <div class="left_advance">
                    <a href="javascript:;">收藏</a>
                    <a href="#content444">我要回答</a>
                </div>
                <div class="btm_advance">
                   <!-- <span>赞（30）</span>-->
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style">
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_qzone"></a>
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->
                </div>
                <div class="clearfloat"></div>
            </div>
            <div id="add_reply">
            <style>
            	.pl_bottom p{
					float: left;
   					 left: 64px;
   					 position: absolute;
   					 top: 35px;	
				}   
            </style>
<?php 
	$istrue		=	DS("publics2._get","","question_reply","qid=".$qid." and istrue=1");
	if(!empty($istrue)){
		$reply_user1	= DS('publics2._get',"","users","id=".$istrue[0]['requid']); 
?>	
            <div class="pl_bottom">
                <div class="pl_left">
                    <a href="<?= URL('bbsUser.user_broadcast','&id='.$reply_user1[0]['id'])?>"><img <?= $reply_user1[0]['logo']==''?'src="images/wenda_img_03.png"':'src='.$reply_user1[0]['logo']?> class="tx_img"/></a>
                    <span class="jb_name"><?= date('Y-m-d',$istrue[0]['inputtime'])?></span>
                    <span class="jb_name"><?= date('H:i',$istrue[0]['inputtime'])?></span>
                    <span class="jb_name"><img src="images/wenda_img_06.png" /><a href="<?= URL('bbsUser.user_broadcast','&id='.$reply_user1[0]['id'])?>" style="color:#A4A4A4;"><?= $reply_user1[0]['realname']?></a></span>
                    <div class="clearfloat"></div>
                    <p class="pl_con"><font color="red">采纳答案：</font><?= str_replace('</p>','',str_replace('<p>','',$istrue[0]['content']))?></p>
                </div>
                <div class="clearfloat"></div>
            </div>		
<?php
	}
	
	if(!empty($reply)){ 
		foreach($reply as $rk=>$rv){
			$reply_user	= DS('publics2._get',"","users","id=".$rv['requid']); 
?>	
            <div class="pl_bottom">
                <div class="pl_left">
                    <a href="<?= URL('bbsUser.user_broadcast','&id='.$reply_user[0]['id'])?>"><img <?= $reply_user[0]['logo']==''?'src="images/wenda_img_03.png"':'src='.$reply_user[0]['logo']?> class="tx_img"/></a>
                    <span class="jb_name"><?= date('Y-m-d',$rv['inputtime'])?></span>
                    <span class="jb_name"><?= date('H:i',$rv['inputtime'])?></span>
                    <span class="jb_name"><img src="images/wenda_img_06.png" /> <a href="<?= URL('bbsUser.user_broadcast','&id='.$reply_user[0]['id'])?>" style="color:#A4A4A4;"><?= $reply_user[0]['realname']?></a></span>
                    <?php
                    	if(empty($istrue)){
					?>
                    <span class="jb_name" style="float:right"><a onClick="istrue(<?= $rv['id']?>)" style="color:red">采纳</a></span>
                    <?php
						}
					?>
                    <div class="clearfloat"></div>
                    <p class="pl_con"><?= str_replace('</p>','',str_replace('<p>','',$rv['content']))?></p>
                </div>
                <div class="clearfloat"></div>
            </div>
<?php
		}
	}
?>
	</div>
    <script>
    	function istrue(rid){
			//alert(rid);
			var quid = $("#quid").val();
			var suid = $("#suid").val();
			var qid  = $("#qid").val();
			if(suid == ''){
				//jAlert("请先登录","温馨提示");
				$("#alert").css("display","block");
             $("#maskLayer").css("display","block");	
			}else{
				if(quid == suid){
					$.ajax({
						url:'<?= URL('reply.setdeal')?>',
						type:'POST',
						data:{
							qid : qid,
							rid : rid,
						},
						success:function(r){
							e = eval('(' + r + ')');
							if(e.status == 1){
								jAlert(e.info,"温馨提示");
								location.reload(true);	
							}else{
								jAlert(e.info,"温馨提示");	
							}
						}
					});	
				}else{
					jAlert("无权采纳","温馨提示");		
				}	
			}
				
		}
    </script>
            <div class="bjq"  id="content444">
                <!--<img src="images/wenda_img_04.png" />-->
                <textarea name="content" style="width:auto; height:auto" id="content"></textarea> 
              
			   <script type="text/javascript" charset="utf-8" src="ueditor/editor_config.js"></script>
               <script type="text/javascript" charset="utf-8" src="ueditor/editor_all.js"></script>
               <script type="text/javascript">
                  var editor = new UE.ui.Editor();editor.render("content");
               </script>
                <a href="javascript:;" onclick="sub(<?= $qid?>)">提交</a>
            </div>
        </div>  
<script type="text/javascript">
	function bianjq(){
		$("#editor.body.innerHTML").focus();
		$("#editor.body").focus();
		$("#content.body").focus();
	
	}
	
	function sub(qid){
		$("#content").html(editor.body.innerHTML);
		var content	=	$("#content").val();	//alert(content);
		var requid	=	$("#suid").val();
		//alert(requid);
		if(requid == ''){ 
			//jAlert('请先登录','温馨提示');
			$("#alert").css("display","block");
             $("#maskLayer").css("display","block");
			 return false;	
		}
		
		if(content == '<p><br></p>'){ 
			jAlert('回复内容不能为空','温馨提示');
			return false;	
		}
		
		if(requid == <?= $userInfo[0]['id']?>){
			jAlert('自己不能回答自己','温馨提示');
			return false;	
		}
	
		if(content !='<p><br></p>' && requid !='' && requid != <?= $userInfo[0]['id']?>){
			var html = $.ajax({ 
				url: "<?= URL('reply.save_reply');?>", 
				data:{'qid':qid,'requid':requid,'quid':<?= $userInfo[0]['id']?>,'content':content}, 
				type:'post', 
				async: false, 
			}).responseText; 
			location.reload(true);	
			$('#add_reply').append(html);
		}
	}
</script>
        <div class="tiwen">
            <span>我要提问</span>
        </div>
        <div class="content_right">
            <div class="xgwt">
                <h3 class="right_title">相关问题</h3>
                <a href="<?= URL('reply.index','&coid='.$question['coid'])?>" class="more">更多>></a>
                <div class="clearfloat"></div>
            </div>
            <div class="question_con">
                <ul>
			<?php
            	if(!empty($ques_relative)){
					foreach($ques_relative as $rk => $rv){
            ?>
                    <li><a href="<?= URL('reply.question_reply','&qid='.$rv['id'])?>"><?= $rv['askquiz']?></a></li>
            <?php
					}}
		   ?>
           
                </ul>                            
            </div>
            <div class="week">
                <h3 class="right_title" style="margin:0;">一周活动雷锋榜</h3>
                <div class="clearfloat"></div>
            </div>
            <?php
            	if(!empty($leifeng)){
					foreach($leifeng as $lk=>$lv){
						$uinfo = DS("publics2._get","","users","id=".$lv['requid']);
			?>
            <div class="week_con">
                <a href="<?= URL('bbsUser.user_broadcast','&id='.$uinfo[0]['id'])?>"><img src="<?= empty($uinfo[0]['logo'])?'images/course_conimg_27.png':$uinfo[0]['logo']?>" style="width:49px;height:49px;"/></a>
                <div class="week_left">
                    <span class="week_left_top"><a href="<?= URL('bbsUser.user_broadcast','&id='.$uinfo[0]['id'])?>" style="color:#A4A4A4;"><?= $uinfo[0]['realname']?></a></span>
                    <span class="week_left_btm"><?= !empty($uinfo[0]['introduce'])?$uinfo[0]['introduce']:'暂无简介'?></span>
                </div>
                <?php 
					$info = DS("publics2._get","","question_reply","requid=".$lv['requid']);
				?>
                <div class="week_right">
                    <span><?= count($info)?>条</span>
                    <span>回答</span>
                </div>
                <div class="clearfloat"></div>
            </div>
            <?php
					}
				}
			?>
        </div>
        <div class="clearfloat"></div>
    </div>
</div>     
<?php TPL :: display("footer1")?>
</div>
</body>
</html>