
<div class="index_right">
	<div class="index_right_2">
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
					
							
						$j("#signin_expand").click(function(){
						
							if( <?=$longin?> == 0 ){
								
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
						请先<a href="javascript:void(0);" onclick="showPop();">登录</a></span><em class="point_signtip"></em>
					</div>
					
					<div class="tips_signin" style="display: none;" id='show222'>
					
					<em class="point_signtip"></em>
					</div>	
			
		</div>
		<div class="column_r10">
            <div id="portal_block_613" class="padding_margin0 block move-span">
            	<div class="blocktitle title padding0" style="border:0px solid red">
                	<span class="titletext2">热门版块</span>
                </div>
                <div id="portal_block_613_content" class="dxb_bc">
                	<div class="module cl xl forum_list" style="margin-top:0px;">
						<ul>
							<? $hostplate = $classlist = DS('publics._get','','bbs_forum',"is_showindex != 1 order by indexlmorder asc");	?>
							<? if(isset($hostplate) && !empty($hostplate)){?>
							<? if(count($hostplate)%2 == 0){?>
						
							
							<? foreach($hostplate as $k=>$v){?>
							
                        	<li class="thread_<?=$k+1?>"><a class="cg" href="<?= URL('bbs.thread','&fid='.$v['fid'])?>" title="<?=$v['name']?>" target="_blank"><?=$v['name']?></a></li>	
	   						 <? }?>
							 	
							 <? }else{?>
							 <? foreach($hostplate as $k1=>$v){?>
							
							<? if($k1+1 != count($hostplate)){?>
                        	<li class="thread_<?=$k1+1?>"><a class="cg" href="<?= URL('bbs.thread','&fid='.$v['fid'])?>" title="<?=$v['name']?>" target="_blank"><?=$v['name']?></a></li>	
	   						 <? }?>
							 <? }?>
							 
							 <? }?>
							 <? }?>
                           
						</ul>
					</div>
                </div>
			</div>            
		</div>
		<!--<div class="column_r5">
            <div id="portal_block_606" class="inrotate_img block move-span">
            	<div class="blocktitle title padding0" style="border:0px solid red">
                	<span class="titletext2">最新课程</span>
                </div>
				<div class="bread_line">
    				<div class="line" style="border: 0px solid #ccc;"></div>
    				<div class="cr"></div>
				</div>
                <div id="portal_block_606_content" class="dxb_bc">
                	<div  style="padding-top:15px;margin-top:0px">
						<ul>
							<? $read23 = DS('publics._get','','system','id > 0 order by updatetime desc,inputtime desc,listorder asc limit 0,2');?>	
							<? if(isset($read23) && !empty($read23)){?>
							<? foreach($read23 as $k=>$v){?>
							<li><div class="img_l"><img style="height:92px; width:121px" title="<?=$v['stitle']?>" src="<?= $v['thumb']?>"></div><div class="mhometitle"><div style="border:0px solid red" class="title"><?=$v['stitle']?></div><div><?=F("filter.cutStr",$v['introduce'],18);?></div><a target="_blank" href="<?= URL('courSystem.courseCon','&sid='.$v['id'].'&catid='.$v['catid'])?>"><div class="but">立即购买</div></a></div><div class="cr"></div></li>	
							<? }?>	
							<? }?>	
                        </ul>
                    </div>
                </div>
            </div>            
        </div>-->
        <!--体验固件/正式固件/新店速递/新人课堂-->
        <? TPL :: display("bbs/index_right_center");?>
        <!-- 微博社区/官方微博 -->
        <?php /*?><? TPL :: display("bbs/index_button_right");?><?php */?>
    </div>
</div> 
	