<div class=" follow_feed_boxval ">
    <div class="page_frame_navigation" >
        <div class="follow_feed_cover" style="left:129px;" ></div>
        <ul class="mbw tb cl page_frame_ul" style="padding-left:20px;" >
            <li  ><a href="<?= URL('bbsUser.my_dynamic','&bottom=1')?>">关注</a></li>
            <li class="a" ><a href="<?= URL('bbsUser.my_dynamic','&bottom=2')?>">大厅</a></li>
           <?php /*?> <li ><a href="<?= URL('bbsUser.my_dynamic')?>">广播</a></li> <?php */?>                                 
        </ul>
    </div>
    <div class="flw_feed">
		<ul id="followlist">
        <?php
			//判断是否添加关注好友
			//var_dump($re);
			/*
        	if(!empty($re)){
				foreach($re as $ak=>$av){*/
					
					$re2 = DS('publics.get_info','','bbs_postcomment',"comment != '' and rpid=0 and tid != 0 or poststatus = 1  order by dateline desc limit 0,10");
				$all4=DS('publics.get_total','','bbs_postcomment', "comment != ''  and rpid=0 and tid != 0 or poststatus = 1   "); 
					if($re2 != NULL ){						
						foreach($re2 as $pk => $pv){
							if(!empty($pv)){
								$re4 = DS('publics.get_info','','users',"id='".$pv['authorid']."'");
								
		?>
			<? $postsubs = DS('publics._get','','bbs_post','pid='.$pv['tid']);
				if($postsubs[0]['content'] != ''){
			?>	
			
			<div id="pid<?=$pv['id']?>" style="display:none"><?=$pv['pid']?></div>
			<li class="cl" name="lili" id="feed_li_<?= $pv['authorid']?>" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">
            	<div class="feed_li_box" >
                	<div class="z flw_avt">
                    	<a class="avatar" id="stickthread_<?=$pv['id']?>" onmouseover="wzxx(<?=$pv['id']?>,<?=$pv['authorid']?>)">
                        <?php
							//判断关注好友是否设置头像
                        	if(!empty($re4[0]['logo'])){
						?>
                        <img src=<?= $re4[0]['logo']?> isdrift="true"><span class="shadowbox_avatar"> </span></a>
                        <?php
							}else{
						?>
                        <img src='images/course_conimg_27.png' isdrift="true"/><span class="shadowbox_avatar"> </span></a>
                        <?php
							} 
						?>
    					<span class="cnr"></span>
    				</div>       
					<div class="flw_article" style=" " >
                		<div class="flw_author">
							
                            <a class="name_feedlist" href="<?= URL('bbsUser.user_broadcast',"&id=".$pv['authorid']."")?>"><?= $re4[0]['realname']?>&nbsp;&nbsp;</a> 发表于 <span title="<?= date('Y-m-d H:i:s',$pv['dateline'])?>">
								<?php 
							if(date('Y',time()) != date('Y',(int)$pv['dateline'])){
								echo date('Y',time()) - date('Y',(int)$pv['dateline']);
								echo '年前';
							}else if(date('m',time()) != date('m',(int)$pv['dateline'])){
								echo date('m',time()) - date('m',(int)$pv['dateline']);
								echo '个月前';
							}else if(date('d',(int)$pv['dateline']) != date('d',time())){
								echo date('d',time()) - date('d',(int)$pv['dateline']);
								echo '天前';
							}else if(date('H',(int)$pv['dateline']) != date('H',time())){
								echo date('H',time()) - date('H',(int)$pv['dateline']);
								echo '小时前';
							}else if(date('i',(int)$pv['dateline']) != date('i',time())){
								echo date('i',time()) - date('i',(int)$pv['dateline']);
								echo '分钟前';
							}else if(date('s',(int)$pv['dateline']) != date('s',time())){
								echo date('s',time()) - date('s',(int)$pv['dateline']);
								echo '秒前';
							}else {
								echo '刚刚';
								}									
						?>
							</span>&nbsp;&nbsp;
							
                            <a href="<?= URL('bbs.thread','&fid='.$pv['pid'])?>">
							<? if($pv['rpid'] == 0){?>
									#
							<?	 $name = DS('publics._get','','bbs_forum','fid='.$pv['pid']);
								
								 echo $name[0]['name'];
								}?>
							
							
							</a>
                    	</div>
						<? if($pv['poststatus'] == 1){?>
						
								
										<h2 class="wx pbn">
                                    <a target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$pv['pid'].'&tid='.$pv['tid'])?>"><?=htmlspecialchars($postsubs[0]['subject'])?></a>
                                            </h2>
										<div id="original_content_15632896" class="pbm c cl atcont_flwlist">
                       						<?=$postsubs[0]['content']?>		
                                        </div>
										<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1(<?=$pv['id']?>)">回复&nbsp; </a></span>
												</div>
                            				</div>
						
						
						
						<? }else{?>
						
                		<div class="flw_quotenote xs2 pbw"><a href="<?= URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."")?>" target="_blank" > <?= htmlspecialchars($pv['comment'])?><br /></a></div>
						
						
						<div class="flw_quote guide_list_replay">
							<div class="arrow_guidelist"></div>
                         
							
							<? if($pv['rpid'] != 0){?>
								  <h2 class="wx pbn"><a href="<?= URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."")?>" target="_blank">	
							<?	 $name = DS('publics._get','','bbs_postcomment',"comment != '' and  id=".$pv['rpid'] );
								
								 echo htmlspecialchars($name[0]['comment']);?>
								  </a></h2> 
							<?	}else{?>
							   <h2 class="wx pbn"><a href="<?= URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."")?>" target="_blank">
							<?	 $tidname = DS('publics._get','','bbs_post','pid='.$pv['tid']);
								 echo htmlspecialchars($tidname[0]['subject']);?>
								
							
							
							</a></h2>
								
                            <div id="original_content_<?= $pv['authorid']?>" class="pbm c cl atcont_flwlist">
							 <? echo $tidname[0]['content'];?>
							
							</div>
                           	<? }?>

						    <div class="xg1 cl">
								<div class="y flw_btnbar"><span class="y">
								<?php /*?><a href="javascript:;" id="relay_<?= $pv['authorid']?>" onclick="quickrelay1(<?=$pv['id']?>);">转播&nbsp; </a><?php */?>
								<a href="javascript:;" onclick="quickreply1(<?=$pv['id']?>)">回复&nbsp; </a></span></div>
                            </div>
                		</div>
						<? }?>
						
                        <div class="cr"></div>
					
                <?php
				?>
                	</div>
					
	<script>
		function quickrelay1(id){
			document.getElementById('relaybox_'+id).style.display = "block";
			}
		function quickrelay2(id){
			document.getElementById('relaybox_'+id).style.display = "none";
			}	
		function quickreply1(id){
			$(".flw_replybox").attr("style","display:none")
			document.getElementById('replybox_'+id).style.display = "block";
			}
		function quickreply2(id){
			document.getElementById('replybox_'+id).style.display = "none";
			}	
		function insert(id,tid){
			var yz = document.getElementById("load11").innerHTML
			var yz1 = document.getElementById("seccodeverify_SAyd29av01"+id).value
			var con = document.getElementById('postmessage_'+id).value;
			var pid = document.getElementById('pid'+id).innerHTML;
			if(yz == yz1 && yz1.length != 0){
				if(con.length != 0 ){
		
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			  }else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
				xmlhttp.onreadystatechange=function(){
				 if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if(xmlhttp.responseText.length != 0){
						location.href='http://bbs.vi163.cn/index.php?m=bbs1.connment&names=%3Cscript%3Ealert%28%29%3C/script%3E&tid=81&fid=45'
						}else{
							location.href=''
							}
					
					//document.getElementById("load11").innerHTML=xmlhttp.responseText;
					}
					 }
				xmlhttp.open("GET","<?=URL('bbs2.insers'),'&con='?>"+con+'&tid='+tid+'&fid='+pid,true);
				xmlhttp.send();	
			}else{
				alert('请输入内容')
				}	
			}else{
				alert('验证码不正确')
				}
			
			}	
		
		
	</script>	
	<div id="load11" style="display:none"></div>			
					
					<div style="display:none" class="flw_replybox cl" id="relaybox_<?=$pv['id']?>"><span style="margin: -23px 135px 0 0;" class="cnr"></span>
<form onsubmit="return ajaxpost2(this.id, 'return_qrelay_12918932');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">
<input type="hidden" value="true" name="relaysubmit">
<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
<input type="hidden" value="3554c853" name="formhash">
<input type="hidden" value="5313176" name="tid">
<input type="hidden" value="qrelay_12918932" name="handlekey">
            <span class="flw_autopt">
            	<textarea onkeyup="strLenCalc(this, 'checklen5313176', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea>
            </span>
            
            <div style=" margin:30px 0px;">

<div style="float:left; width:400px;" class="mtm sec identifying_code">
<input type="hidden" value="SAyd29av0" name="sechash">

验证码 <span onclick="showMenu({'ctrlid':this.id,'win':'qrelay_12918932'})" id="seccodeSAyd29av0"><input type="text" tabindex="1" onblur="checksec('code', 'SAyd29av0')" class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0<?=$pv['id']?>" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>
        
<a class="xi2" onclick="updateseccode5('SAyd29av0','follow_rebroadcast');doane(event);" href="javascript:;">换一个</a>
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>
</div>
</div>                          
                <button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button>
            	<label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>         
                <div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div><div class="cr"></div>
            </div>
<div id="return_qrelay_12918932"></div>
</form>

<div class="cl closebar_replybox" onclick="quickrelay2(<?=$pv['id']?>)">
<a class="y xg1" onclick="display('relaybox_12918932')" href="javascript:;"></a>
</div>

<script type="text/javascript">
$('note_5313176').focus();
function succeedhandle_qrelay_12918932(url, message, values) {
$('relaybox_12918932').style.display = 'none';
showCreditPrompt();
}
</script>
</div>
					<div style="display:none" class="flw_replybox cl" id="replybox_<?=$pv['id']?>"><span class="cnr"></span>
<form class="mbm" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id, 'return_qreply_12918932', 'return_qreply_12918932', 'onerror');return false;" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
<input type="hidden" value="3554c853" id="formhash" name="formhash">
<input type="hidden" value="qreply_12918932" name="handlekey">
<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>

    <span class="flw_autopt">
    	<textarea rows="4" cols="80" class="pts" id="postmessage_<?=$pv['id']?>" name="message"></textarea>
    </span>
    <div style="margin:30px 0px;">
        <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit<?=$pv['id']?>" style="float:right; margin-left:20px;" type="button" onclick="insert(<?=$pv['id']?>,<?=$pv['tid']?>)"><span>回复</span></button>
        <div class="cr"></div>
    </div>
    
<div class="mtm">
<input type="hidden" value="SAyd29av0" name="sechash">

<ul><li><em class="d">验证码</em><span><input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01<?=$pv['id']?>" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" onclick="updateseccode5('SAyd29av0','follow_rebroadcast')"></span>
        
<a class="xi2" onclick="refreshCc(<?=$pv['id']?>)" href="javascript:;">换一个</a>
<img id="checkCodeImg1<?=$pv['id']?>" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc(<?=$pv['id']?>)">
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5('SAyd29av0','follow_rebroadcast');</script>
</div></li></ul>
</div>
</form>
<ul class="list_replybox" id="newreply_5313176_12918932">


		<? if($pv['rpid'] == 0){?>
			
		<?	 $name = DS('publics._get','','bbs_postcomment',"comment != '' and tid=".$pv['tid'] .' order by dateline desc limit 0,5');?>
			<? foreach($name as $kk22 =>$vv22 ){?> 
				<li><a class="d xi2" href="<?= URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."")?>"><?=$vv22['author']?>&nbsp;&nbsp;</a><?=htmlspecialchars($vv22['comment'])?></li>
			<? }?>
		<? }else{?>
				<?	 $name31222 = DS('publics._get','','bbs_postcomment',"comment != '' and rpid=".$pv['rpid'] .' order by dateline desc limit 0,5');?>	
				<? foreach($name31222 as $kk22 =>$vv22 ){?>
				<li><a class="d xi2" href="<?= URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."")?>"><?=$vv22['author']?>&nbsp;&nbsp;</a><?=htmlspecialchars($vv22['comment'])?></li>
		<? }?>
		<? }?>

</ul>
<div class="cl closebar_replybox">
<a title="关闭" class="y xg1" onclick="quickreply2(<?=$pv['id']?>)" href="javascript:;"></a>
<? if($pv['classid'] == 0 and $kk22 == 4){?>
<a class="xi2" target="_blank" href="<?= URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."")?>">去论坛查看所有回复<em class="arrow_2"> </em></a>
<? }?>
</div>
<script type="text/javascript">
function succeedhandle_qreply_12918932(url, msg, values) {
var x = new Ajax();
x.get('forum.php?mod=ajax&amp;action=getpost&amp;inajax=1&amp;tid='+values.tid+'&amp;fid='+values.fid+'&amp;pid='+values.pid, function(s){
newli = document.createElement("li");
newli.innerHTML = s;
var ulObj = $('newreply_'+values.tid+'_12918932');
ulObj.insertBefore(newli, ulObj.firstChild);
$('postmessage_5313176_12918932').value = '';
if(values.sechash) {  
updatesecqaa(values.sechash);
updateseccode(values.sechash);
$('seccodeverify_'+values.sechash).value='';
}
});

if(parseInt(values.feedid)) {
getNewFollowFeed(values.tid, values.fid, values.pid, values.feedid);
}
}
</script></div>   
					<div id="replybox_12245973" class="flw_replybox cl" style="display: none;"></div>
					<div id="relaybox_12245973" class="flw_replybox cl" style="display: none;"></div>
<script type="text/javascript">
	spaceClosedFun();
</script>
				</div>
 			</li>
          <?php
							
				}}}
					}else{?>
					<div class="flw_feed">
		<ul id="followlist">
                    <div class="emp" style=" padding:20px 0px;">
			<h2 class="mbw xg1 xs2 hm" style="margin:30px 0;">还没有新的内容</h2>
        </div>
            		</ul>
                			
</div>
					<? }?>
				
</div>
<?php ?><? if($pk == 9){?>
		<div class="flw_more" id="loadingfeed"><a id="moreless" class="xi2" onclick="loadmore4(<?=$id?>);return false;" href="javascript:;"  id = "moreless">更多 »</a></div>
	<? } ?><?php ?>
<script>
	setTimeout('refreshCc()',3000)
		function refreshCc(id) { 
				var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								document.getElementById("load11").innerHTML=xmlhttp.responseText;
								//alert(xmlhttp.responseText)
								}
					}
						xmlhttp.open("GET","<?=URL('bbs2.yzz1') ?>",true);
						xmlhttp.send();			
						var ccImg = document.getElementById("checkCodeImg1"+id); 
						if (ccImg) { 
							ccImg.src= ccImg.src + '?' +Math.random(); 
						} 
		

							}
	function add_follow(id){
		var	xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText != ""){
					document.getElementById('listen_in_'+id).style.display="none";
					document.getElementById('listen_'+id).style.display="block";
				}else{
					alert('网络繁忙');
				}
			}	
		}
		xmlhttp.open("GET","<?= URL('bbs.add_follow',"&fid=")?>"+id,true);
		xmlhttp.send();
	}
	function loadmore4(id){
		var num = document.getElementsByName("lili").length;
		//alert(num);
			
				var liall = '<?=$all4?>';
				
				if(num == liall || num > liall){
				   document.getElementById('moreless').innerHTML='没有更多了 »';
				 }else{
						
						                         
				//alert(document.getElementById("followlist").getElementsByTagName("li").length)
				var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								//document.getElementById('name'+id1).innerHTML = t1
								//document.getElementById("load11").innerHTML=xmlhttp.responseText;
								//alert();
								
									var oDiv=document.getElementById("followlist");
									var newNode = document.createElement("ddd");
									newNode.innerHTML = xmlhttp.responseText; 
									oDiv.appendChild(newNode);
									if(num == liall || num > liall){
										 document.getElementById('moreless').innerHTML='没有更多了 »';
										}
								
								}
					}
						xmlhttp.open("GET","<?=URL("bbs2.lorderlist3",'&num=')?>"+num+'&id='+id,true);
						xmlhttp.send();	
						
						}	
					
		
		
		}
</script>
<div id="diycontentbottom" class="area"></div></div><div id="appendss">

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