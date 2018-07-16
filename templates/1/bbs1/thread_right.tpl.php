<div id="expandBox" class="expandbox_mn">


			<div class="signinwrap_expand">
			<div id="signin_expand" class="signin_expand signin_expand_2">
			
				<a id="nosignin_link11" attribute="/plugin.php?id=dsu_amupper&amp;ppersubmit=true&amp;formhash=9e3f9660&amp;infloat=yes">
				<? $weekarray=array("日","一","二","三","四","五","六");  
				 $ss = "星期".$weekarray[date("w")]; 
				?>
					<div class="week_ban"><?=$ss?>
				</div>
					<? $dadada=DS('publics._get','','users',"id ='".$_SESSION['u_uidss']."'");?>	
					<div id="signin_status" class="btncont_signin btncont_signin_2"><?=$dadada[0]['qiandaodate'] != date('Ymd',time())?'签 到':'已 签 到'?></div>
					<div class="cr"></div>
				</a>
				<? if($_SESSION['u_uidss']== NULL ){$longin = 0;}else{$longin = $_SESSION['u_uidss'];}?>
			</div>
			
				<script>
						
					   var login = "<?=$_SESSION['u_uidss']?>";
						
						$j("#signin_expand").click(function(){
					
							if( login == 0 ){
								
								$j("#xcj").attr({ style: "display: none", style: "display: block" });
								
								$j("#xcj").click(function(){
										
								$j("#xcj").attr({ style: "display: block", style: "display: none" });
											 
								})	
								}else{
											var xmlhttp;
											if (window.XMLHttpRequest)
											  {
											  xmlhttp=new XMLHttpRequest();
											  }
											else
											  {
											  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
											  }
											xmlhttp.onreadystatechange=function()
											  {
											  if (xmlhttp.readyState==4 && xmlhttp.status==200)
												{	
												
													if(xmlhttp.responseText == 1){
														
														}else if(xmlhttp.responseText == '202'){
															
															document.getElementById('signin_status').innerHTML='已 签 到';
															document.getElementById('show222').style.display = "block";
															document.getElementById('show222').innerHTML='<span class="tipcont_signin">签到成功 获得积分+5</span>';
															vart=setTimeout(function(){
															document.getElementById('show222').style.display = "none";
															},4000)
															
															<?php /*?>document.getElementById('signin_status').innerHTML='已 签 到';
															document.getElementById('show222').style.display = "block";
															document.getElementById('show222').innerHTML='<span class="tipcont_signin">签到成功 获得奖励魅力+2，明日签到将获得魅力+4</span>';
															vart=setTimeout(function(){
															document.getElementById('show222').style.display = "none";
															},4000)
															}else if(xmlhttp.responseText == '3q'){
															document.getElementById('signin_status').innerHTML='已 签 到';	
															document.getElementById('show222').style.display = "block";
			document.getElementById('show222').innerHTML='<span class="tipcont_signin">签到成功 获得奖励魅力 +10</span>';
															vart=setTimeout(function(){
															document.getElementById('show222').style.display = "none";
															},4000)	
															}else{
														document.getElementById('signin_status').innerHTML='已 签 到';	
														document.getElementById('show222').style.display = "block";
		document.getElementById('show222').innerHTML='<span class="tipcont_signin">签到成功 获得奖励魅力 +'+xmlhttp.responseText+'，明日签到将获得魅力+'+ (parseInt(xmlhttp.responseText)+2) +'</span>';
														vart=setTimeout(function(){
														document.getElementById('show222').style.display = "none";
														},4000)<?php */?>
														
														
														}
												}
											  }
											xmlhttp.open("GET","<?=URL('bbs1.qiandao')?>",true);
											xmlhttp.send();	
									}
						})				
				</script>
			  

           
<script type="text/javascript">
	function signin_status(){
		$("#signin_status").text("已签到");
	}
</script>
					<div class="tips_signin" id='xcj' style="display:none;"><span class="tipcont_signin">
					<?php /*?><? if(V('r:tid') != NULL){?>
						请先<a href="/index.php?m=login" >登录</a></span><em class="point_signtip"></em>
					<? }else{?>
					
						请先<a href="javascript:void(0);" onclick="showPop();" >登录</a></span><em class="point_signtip"></em>
					<? }?>	<?php */?>
					请先<a href="javascript:void(0);" onclick="showPop();" >登录</a></span><em class="point_signtip"></em>
					</div>
					
					<div class="tips_signin" style="display: none;" id='show222'>
					
					<em class="point_signtip"></em>
					</div>	
			
		</div>
		
	<?php	
	 	
			 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));	

			 $couunm = DS('publics.get_total','','bbs_post','fid='.V('r:fid'). ' and '. 'dateline'.'>'. $beginToday);	
			
	?>
	<div class="titlebar_expand"><h3>版块信息</h3><span>今日发帖&nbsp;:&nbsp;<?=$couunm==NULL?'0':$couunm?></span></div>
	
	
	
	
	<div class="readblock_expand rules_expand">

                    <!--下面是管理面板等-->
                    <div id="forum_rules_110">
<div class="ptn xg2">

	<?  $con = DS('publics._get','','bbs_forum','fid = '.V('r:fid'));	?>
	<?=$con[0]['information']?>
	
	
</div>
</div>
</div>




<div class="titlebar_expand"><h3>推荐阅读</h3></div>





<div class="readblock_expand recread_expand">
                    <div class="inrotate_img block move-span" id="portal_block_701"><div class="dxb_bc" id="portal_block_701_content"><ul class="toprec_recread cl">
<? $read = DS('publics._get','','bbs_post','classid = 9 and status = 1 order by lmorder asc limit 0,2');?>	
<? foreach($read as $k=>$v){?>
			
	<li>
		<a  onClick="look(<?=$v['pid']?>,<?=$v['fid']?>)" href="javascript:;"><img width="124" height="100" cc="<?=$v['subject']?>" src="<?=$v['imgurl']?>"></a>
		<a  onClick="look(<?=$v['pid']?>,<?=$v['fid']?>)" href="javascript:;" title="<?=$v['subject']?>"><p><?=F("filter.cutStr",$v['subject'],18);?></p></a>
	</li>
<? }?>		

	</ul>
	</div>
	</div>    <div class="padding_margin0 block move-span" id="portal_block_760"><div class="bread_line">
		<div class="line"></div>
		<div class="cr"></div>
	</div><div class="dxb_bc" id="portal_block_760_content">
	<ul class="recitems_recread cl">
	<? $read1 = DS('publics._get','','bbs_post','classid = 9 and status = 1 order by lmorder asc limit 2,8');?>	
	<? foreach($read1 as $k=>$v){?>
	<li class="thread">
<a  onClick="look(<?=$v['pid']?>,<?=$v['fid']?>)" title="<?=$v['subject']?>" href="javascript:;" class="cg"><?=$v['subject']?></a>
	</li>
	<? }?>		
</ul></div></div></div>
		
		
    		
    	</div>