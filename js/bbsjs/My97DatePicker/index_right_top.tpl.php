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
					<div id="signin_status" class="btncont_signin btncont_signin_2">签 到</div>
					<div class="cr"></div>
				</a>
				
		
				<script>
					
					$j("#signin_expand").click(function(){
							if( <?=$_SESSION['uid']?> == 0){
								$j(".tips_signin").attr({ style: "display: none", style: "display: block" });
								
								$j("#xcj").click(function(){
										
											$j(".tips_signin").attr({ style: "display: block", style: "display: none" });
											
								})	
								}
							
						})
						
					//$j("#xcj").click(function(){
					//		alert()
					//	})	
				</script>
			   <div class="tips_signin"  id='xcj' style="display: none;"><span class="tipcont_signin">请先<a href="<?=URL('bbsUser.login') ?>" target="_blank">登录</a></span><em class="point_signtip"></em></div>
            </div>
			
<script type="text/javascript">
	function signin_status(){
		$("#signin_status").text("已签到");
	}
</script>
				
			<div class="tips_signin1" style="display:none;">
            	<span class="tipcont_signin"></span><em class="point_signtip"></em>
			</div>
		</div>
		<div class="column_r10">
            <div id="portal_block_613" class="padding_margin0 block move-span">
            	<div class="blocktitle title padding0">
                	<span class="titletext2">热门版块</span>
                </div>
                <div id="portal_block_613_content" class="dxb_bc">
                	<div class="module cl xl forum_list">
						<ul>
                        	<li class="thread_1"><a class="cg" href="<?= URL('bbs.thread')?>" title="产品讨论" target="_blank">产品讨论</a></li>
                           	<li class="thread_2"><a class="cg" href="" title="魅友家大本营" target="_blank">魅友家大本营</a></li>
                            <li class="thread_3"><a class="cg" href="" title="我爱 Flyme" target="_blank">我爱 Flyme</a></li>
                            <li class="thread_4"><a class="cg" href="" title="摄影天地" target="_blank">摄影天地</a></li>
                            <li class="thread_5"><a class="cg" href="" title="资源分享" target="_blank">资源分享</a></li>
                            <li class="thread_6"><a class="cg" href="" title="玩机达人" target="_blank">玩机达人</a></li>
                            <li class="thread_7"><a class="cg" href="" title="社区办公室" target="_blank">社区办公室</a></li>
                            <li class="thread_8"><a class="cg" href="" title="科技前沿" target="_blank">科技前沿</a></li>
                            <li class="thread_9"><a class="cg" href="" title="魅友广场" target="_blank">魅友广场</a></li>
                            <li class="thread_10"><a class="cg" href="" title="新人报到" target="_blank">新人报到</a></li>
						</ul>
					</div>
                </div>
			</div>            
		</div>
		<div class="column_r5">
            <div id="portal_block_606" class="inrotate_img block move-span">
            	<div class="blocktitle title padding0">
                	<span class="titletext2">最新活动</span>
                </div>
				<div class="bread_line">
    				<div class="line"></div>
    				<div class="cr"></div>
				</div>
                <div id="portal_block_606_content" class="dxb_bc">
                	<div class="module cl ml" style="padding-top:15px;">
						<ul>
                        	<li><div class="img_l"><img src="images/a63e06e03ea907c85ae525fd4e5c7d11.jpg.png" title="踩楼晒图领好礼" height="92" width="121"></div><div class="mhometitle"><div class="title">踩楼晒图领好礼</div><div class="summary"> DIY手机桌面 做有个性的你</div><a href="#" target="_blank"><div class="but">立即参加</div></a></div><div class="cr"></div></li>
                            <li><div class="img_l">	<img src="images/1c7c9b39d26fe1974b6e59ab6c099769.jpg.png" title="论坛盖楼有礼" height="92" width="121"></div><div class="mhometitle"><div class="title">论坛盖楼有礼</div><div class="summary">Flyme阅读适配MX3、MX2</div><a href="" target="_blank"><div class="but">立即参加</div></a></div><div class="cr"></div></li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
        <!--体验固件/正式固件/新店速递/新人课堂-->
        <? TPL :: display("index_right_center");?>
        <!-- 微博社区/官方微博 -->
        <? TPL :: display("index_button_right");?>
    </div>
</div>