<div class="mn plate_mn">
	<div class="drag">
	<? $fid = V('r:fid') == NULL?0:V('r:fid')?>
		<div id="diy4" class="area"></div>
	</div>
	<div id="threadlist" class="tl bm bmw">
		<div class="th">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th class="filbarwrap_thread" colspan="2">
						<div class="tf filterbar_thread cl">
							<a href="<?=URL('bbs.thread','&fid='.V('r:fid'))?>" class="xi2 <?=V('r:cc')== NULL?'showmenu_elect':''?>">全部</a>
                 			<span class="pipe2"> </span>
                        	<a href="<?=URL('bbs.thread','&fid='.V('r:fid').'&cc=3')?>" class="xi2 <?=V('r:cc')==3?'showmenu_elect':''?>">推荐</a>
                        	<span class="pipe2"> </span>
                        	<a href="<?=URL('bbs.thread','&fid='.V('r:fid').'&cc=5')?>" class="xi2 <?=V('r:cc')==5?'showmenu_elect':''?>">热门</a>
							<span class="pipe2"> </span>
                        	<a href="<?=URL('bbs.thread','&fid='.V('r:fid').'&cc=1')?>" class="xi2 <?=V('r:cc')==1?'showmenu_elect':''?>">发帖时间</a>
                        	<span style=" margin-left:24px;">&nbsp;</span>
							
                         	<?php /*?><a id="filter_orderby" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">排序方式<em class="arrow_dark"></em></a><?php */?>
							<? if($_SESSION['u_uidss'] != NULL){?>	
							<a href="<?= URL('bbsUser.send_submit','&fid='.$fid)?>" class="bluebtn normalbtn y" id="newspecial"   title="发新帖">发帖</a>
							<? }?>
						</div>
					</th>
				</tr>
			</table>
		</div>
		<div class="bm_c">
			<script type="text/javascript">
				var lasttime = 1413173839;
            </script>
			<div id="forumnew" style="display:none"></div>
			<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=22&amp;infloat=yes&amp;nopost=yes">
				<input type="hidden" name="formhash" value="0e125d57" />
				<input type="hidden" name="listextra" value="page%3D1" />
			<table summary="forum_22" cellspacing="0" cellpadding="0">
			
				<? if(V('r:page') == 1 || V('r:page') == NULL and V('r:cc') == NULL){?>
				<? $date22 = DS('publics._get','','bbs_post',"fid=$fid and is_show = 0 and showindex = 1 order by  lmorder asc limit 0,10");?>	
				<? if($date22 != NULL){?>
				<? foreach($date22 as $k=>$val){?>	
    			<tbody id="stickthread_4636864">
    				<tr>
						<? $nam=DS('publics._get','','users', "id= '".$val['authorid']."'");?>
						<td class="userhead"><a class="avatar" id="stickthread_<?=$val['pid']?>" onmouseover="wzxx(<?=$val['pid']?>,<?=$val['authorid']?>)"><img src="<?=$nam[0]['logo']==NULL?'images/course_conimg_27.png':$nam[0]['logo']?>"  isdrift="true" uid="509495"  onerror="this.onerror=null;this.src='images/course_conimg_27.png'" /><span class="shadowbox_avatar"> </span></a></td>
    				<th class="common padding0 itemcont_threadlist">
						<div class="maincont_list" id="maincont_list_4636864">
							<a href="<?= URL('bbs.thread_detail','&tid='.$val['pid'].'&fid='.$fid)?>" id="5281958"  onclick="look(<?=$val['pid']?>)" class="xst gv"  title="<?=$val['subject']?>"><dd style="color:<?=$val['sizecolor']?>"><?=htmlspecialchars($val["subject"])?></dd></a>
    						<img src="images/folder_common.gif" style="display:none;visibility:hidden;" />
    						
    						
							<span class="cr"> </span>
						</div>
    				</th>
    				<td class="latestreply_list">
    				
    						<span><a href="<?= URL('bbsUser.user_broadcast','&id='.$val['authorid'])?>" class="author_list" c="1">
								<?=$val['author']?>
							</a>
						</span><br/>
                        <span class="date_list">
                            	<span title="<? date('Y-m-d',(int)$val['dateline'])?>">
								
								<?php 
								
							if(date('Y',time()) != date('Y',(int)$val['dateline'])){
								echo date('Y',time()) - date('Y',(int)$val['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$val['dateline'])){
								echo date('m',time()) - date('m',(int)$val['dateline']);
								echo '个月前';
							}else if(date('d',(int)$val['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$val['dateline']);
								echo '天前';
							}else if(date('H',(int)$val['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$val['dateline']);
								echo '小时前';
							}else if(date('i',(int)$val['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$val['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$val['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$val['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
							?>
								
								</span>
                            </span>
    				</td>
    				</tr>
    			</tbody>
				<? }?>
				<? }?>
				<tbody id="separatorline">
                	<tr class="ts">
						<th id="separatorlineItem" colspan="3">
							<a id="forumRefreshBar" href="" onclick="checkForumnew_btn('22')" title="查看更新" class="forumrefresh forumrefresh_bar"><span>版块主题</span><span class="refreshicon"> </span></a>
						</th>
					</tr>
				</tbody>
				<? }?>
				<? if(V('r:cc') == 1){
					$order = 'dateline desc';
					}else if(V('r:cc') == 3){
					$order = 'looknum desc';		
					}else if(V('r:cc') == 4){
					$order = 'recoverytime desc';
					}else if(V('r:cc') == 5){
					$order = 'alltip desc';
					}
					//var_dump($order);
				?>
				<? if(V('r:cc') ==NULL ){?>
				<? $con=DS('publics.page_list','',15,"fid=$fid and is_show = 0 and showindex = 0","$order",V('g'),'bbs_post');?>
				<? }else{?>
				<? $con=DS('publics.page_list','',15,"fid=$fid and is_show = 0 ","$order",V('g'),'bbs_post');?>	
				<? }?>
				<? foreach($con['info'] as $k=>$val){?>	
    			<tbody id="normalthread_5281958">
    				<tr>
						<? $nam=DS('publics._get','','users', "id= '".$val['authorid']."'");?>
						<td class="userhead"><a class="avatar" id="stickthread_<?=$val['pid']?>" onmouseover="wzxx(<?=$val['pid']?>,<?=$val['authorid']?>)"><img src="<?=$nam[0]['logo']==NULL?'images/course_conimg_27.png':$nam[0]['logo']?>"  isdrift="true" uid="509495"  onerror="this.onerror=null;this.src='images/noavatar_big.gif'" /><span class="shadowbox_avatar"> </span></a></td>
    					<th class="common padding0 itemcont_threadlist">
							<div class="maincont_list" id="maincont_list_5281958">
							<!--隐藏置定图片-->
							
     						<a href="javascript:;" id="5281958"  onclick="look(<?=$val['pid']?>,<?=$fid?>)" class="xst gv"  title="<?=strip_tags($val['subject'])?>"><dd style="color:<?=$val['sizecolor']?>"><?=htmlspecialchars($val["subject"])?></dd></a>
								
							</div>
    					</th>
    					<td class="latestreply_list">
    						<span><a href="<?= URL('bbsUser.user_broadcast','&id='.$val['authorid'])?>" class="author_list" c="1">
								<?=$val['author']?>
							</a></span><br/>
                            <span class="date_list">
                            	<span title="<? date('Y-m-d',(int)$val['dateline'])?>">
								
						<?php 
								
							if(date('Y',time()) != date('Y',(int)$val['dateline'])){
								echo date('Y',time()) - date('Y',(int)$val['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$val['dateline'])){
								echo date('m',time()) - date('m',(int)$val['dateline']);
								echo '个月前';
							}else if(date('d',(int)$val['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$val['dateline']);
								echo '天前';
							}else if(date('H',(int)$val['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$val['dateline']);
								echo '小时前';
							}else if(date('i',(int)$val['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$val['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$val['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$val['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
							?>
								
								</span>
                            </span>
    					</td>
    				</tr>
    			</tbody>
				<? }?>
			</table>
		</form>
	</div>
    <div class="bm bw0 pgs cl pagebar">
        <span id="fd_page_bottom">
		<?= !empty($con['info'])?$con['pagehtml']:''?>
        </span>
        <span style="display:none;"  class="pgb y">
        	<a href="forum.php">返&nbsp;回</a>
        </span>
	</div>
</div>

<div id="diyfastposttop" class="area"></div>
<div id="diyforumdisplaybottom" class="area"></div>
</div>
								<div id="appendss">

</div>
								<script>
								function wzxx(id,authorid){
											var top = $("#stickthread_"+id).offset().top
											var left = $("#stickthread_"+id).offset().left
											if($('#space_card_new_'+id).text().length == 0){
													var xmlhttp;
													if (window.XMLHttpRequest){
																xmlhttp=new XMLHttpRequest();
													}else{
																xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
													 }xmlhttp.onreadystatechange=function(){
																if (xmlhttp.readyState==4 && xmlhttp.status==200){
																$("#appendss").append(xmlhttp.responseText)	
																$('#space_card_new_'+id).attr("style","position: absolute; top:"+top+"px; left: "+left+"px;display:block")
																
																}
																
													}
								
														//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
														xmlhttp.open("POST","<?=URL("bbs2.showappenda")?>"+'&id='+id+'&authorid='+authorid,true);
														xmlhttp.send();		
											}else{
												$('#space_card_new_'+id).attr("style","position: absolute; top:"+top+"px; left: "+left+"px;display:block")
												}
										
											
									}
									function qxstyh(id,uid){
															var xmlhttp;
																	if (window.XMLHttpRequest){
																				xmlhttp=new XMLHttpRequest();
																	}else{
																				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
																	 }xmlhttp.onreadystatechange=function(){
																				if (xmlhttp.readyState==4 && xmlhttp.status==200){
																					
																			var strJSON1 = xmlhttp.responseText;//得到的JSON
																			var obj1 = eval( "(" + strJSON1 + ")" );//转换后的JSON对象
																				$(".stnmnm"+uid).text(obj1.alls2)
																				$(".tznmnm"+uid).text(obj1.alls3)
																	
																				$(".card_followmod_22"+uid).attr("style","display:none")
																				$(".card_followmod_11"+uid).attr("style","")
																				
																				
																				}
																			}
																		xmlhttp.open("GET","<?=URL("bbs2.showwind1")?>"+'&id='+uid,true);
																		xmlhttp.send();	
																	
															}	
														
															function styh(id,uid){
															var xmlhttp;
																	if (window.XMLHttpRequest){
																				xmlhttp=new XMLHttpRequest();
																	}else{
																				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
																	 }xmlhttp.onreadystatechange=function(){
																				if (xmlhttp.readyState==4 && xmlhttp.status==200){
																					
																				var strJSON1 = xmlhttp.responseText;//得到的JSON
																				var obj1 = eval( "(" + strJSON1 + ")" );//转换后的JSON对象
																				$(".stnmnm"+uid).text(obj1.alls2)
																				$(".tznmnm"+uid).text(obj1.alls3)	
																					
																				$(".card_followmod_22"+uid).attr("style","")
																				$(".card_followmod_11"+uid).attr("style","display:none")
																				
																				
																				}
																			}
																		xmlhttp.open("GET","<?=URL("bbs2.showwind")?>"+'&id='+uid+'&stat=2',true);
																		xmlhttp.send();	
																	
															}
								</script>
								<script>
									function look(pid,fid){
										
										var xmlhttp;
										if (window.XMLHttpRequest){
													xmlhttp=new XMLHttpRequest();
										}else{
													xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										 }xmlhttp.onreadystatechange=function(){
													if (xmlhttp.readyState==4 && xmlhttp.status==200){
													if(xmlhttp.responseText == 1){
														
														
														
														window.location.href = "<?= URL('bbs.thread_detail','&tid=')?>"+pid+'&fid='+fid;
														}
													}
										}
											xmlhttp.open("GET","<?=URL('bbs2.look','&tid=')?>"+pid,true);
											xmlhttp.send();	
										}
								</script>
							