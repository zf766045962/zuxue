<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="baidu-site-verification" content="mV1xuWEdD9" />
<meta http-equiv="X-UA-Compatible" content="IE=7;IE=9;IE=10;IE=Edge;IE=8">
<title><?php $site_name = DS('publics.get_index','','site_name'); echo $site_name[0]['value']?></title>    
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
<div class="content">
    <?php TPL :: display("member/member_left")?>
    <div class="lib_Contentbox lib_tabborder">
        <div id="con_one_5" class="hover">
        	<input type="hidden" name="uid" value="<?= $_SESSION['xr_id']?>" id="uid">
            <input type="hidden" name="coid" value="<?= $coid?>" id="coid">
            <h3 class="shiti_title">< <?= $course['title']?> 测试 ></h3>
            <p class="shiti_timu">请仔细阅读下面题目，选出每个题目中最合适您的选项。</p>
	<?php if(!empty($exam)){
			$num = 0; 
			foreach($exam as $ek => $ev){
				$num += 1;
				if($ev['type']==2){
						$arr = explode(",",$ev['answer']);
				}
				//var_dump($ev['answer']);
    ?>
            <div class="shiti_con">
                <p kk="<?= $ek?>"  yesnum ="<?= count($arr)?>"class="ti_title  <? if($ev['type']==2){echo "duoxuan";}?>" id="exam_<?= $ev['id']?>">(<?php  if($ev['type']==1){echo "单选题";}else if($ev['type']==2){echo "多选题";}else if($ev['type']==3){echo "判断题";}?>)<?= $num?>、<?= $ev['title']?>：</p>
		<?php $en = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F');
            for($i=1;$i<=6;$i++){
				$keys = "key".$i;
        ?>
        		
                <?php if(!empty($ev[$keys])){ 
					if($ev['type']==2){
						$arr = explode(",",$ev['answer']);
				?> 
                  
                <p><input type="checkbox" class="ckyes<?=$ek?>"  name="answer<?= $num?>" value="<?php if(in_array($i,$arr)){ echo 'true';}else{ echo 'false';}?>" answer="<?php if(in_array($i,$arr)){ echo 'true';}else{ echo 'false';}?>"/><?= $en[$i]?>、<?= $ev[$keys]?></p>
                <?php }else{?>
                <p><input type="radio"  name="answer<?= $num?>" value="<?= $ev['answer']==$i?'true':'false'?>" answer="<?= $ev['answer']==$i?'true':'false'?>"/><?= $en[$i]?>、<?= $ev[$keys]?></p>
				<?php }}?>
        <?php }?>
            </div>
	<?php }}?>
    <?php if(!empty($exam)){?>
            <p style="text-align:center"><input type="button" value="提&nbsp;&nbsp;&nbsp;交" class="shiti_submit" onclick="sbt()"/></p>
    <?php }else{?>
     <p style="text-align:center">暂无试题</p>
    <?php }?>
            <div class="score" style="display:none" id="score">
                <div class="score_left">
                    <h1>恭喜你得了<span id="scorenum"></span>分！</h1>
                    <p>再接再厉，下次争取满分哦！</p>
                    <a href="<?= URL('member.exam_detail','&coid='.$coid)?>">再次测试</a>
                    <a href="javascript:;" onclick="hidd()" style="margin-top:10px">确定</a>
                </div>
                <img src="images/fitting.png" />
                <div class="clearfloat"></div>
            </div>
<script>
	function hidd(){
		$("#score").css("display","none");	
	}

	function sbt(){
		var truenum  = 0; // 总计答对题目
		var errorques = new Array();
		
		$(".duoxuan").each(function(){
			var k = $(this).attr("kk")
			var yesnum = $(this).attr("yesnum")
			var yesture = 0;
			var yesture2 = "";	
			$(".ckyes"+k).each(function(){
			
				var checked = $(this).attr("checked")
				
				var yes = $(this).attr("answer");
				if(yes == 'true' && checked == 'checked'){
					yesture ++;
				}else if(yes == 'false' && checked == 'checked'){

					yesture2 = "no";
				}
			})	
			if(yesture == yesnum && yesture2 != "no"){
				truenum ++;		
			}
			
		})
		
		var k =$('input[type="radio"]:checked'); 
		for(var i=0;i<k.length;i++){
			if(k[i].value == 'true'){
				truenum ++;
			}
		}
		var total = truenum*100/<?= count($exam)?>;
		
		var uid			=	$('#uid').val();
		var coid		=	$('#coid').val();
		$.ajax({
			url:'<?= URL('member.save_grade')?>',
			type:'POST',
			data:{
				uid		: 	uid,
				coid	:	coid,
				scode	:	total,
			},
			success:function(r){
				e = eval('(' + r + ')');
				if(e.status == 1){
					$("#scorenum").html(total);
					$("#score").css("display","block");
				}else{
					jAlert(e.info,"温馨提示");	
				}
			}
		});
		; 
			
	}
</script>
        </div>
    </div>
    <div class="clearfloat"></div>
</div>
<?php TPL :: display("footer1")?>
</div>
</body>
</html>