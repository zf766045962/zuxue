<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$re = DS('publics._get','','users',"id='".$_SESSION['u_uidss']."'");
?>
<title>个人中心 - 学啊</title>

<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_common.css" />
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_home_space.css" />

<script src="js/bbsjs/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/bbsjs/home.js" type="text/javascript"></script>
<script src="js/bbsjs/public.js" type="text/javascript"></script>
<script src="js/bbsjs/jquery.elements.js" type="text/javascript"></script>       

<link rel="stylesheet" href="css/style.css" />
<link href="css/nav.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/head_select.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/subclass.js"></script>

<script>
window.onload=function(){
	TOP('list');
	TOP('list2');
	TOP('list3');
	TOP('list4');
};
</script>
<style>
body{
	font-family:"微软雅黑","Microsoft Yahei","宋体",Tahoma,"Simsun",Arial,Helvetica,sans-serif;
	font-size:14px;
	
	}
	a{text-decoration:none;}
.foot{
	font-size:12px;
	}
#cnzz_stat_icon_1253224175{
	padding:14px 0 0;
	}	
.wp a{
	text-decoration:none; !important
	}		
</style>
</head>

<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div id="hd">
<script>
	var uids2 =  '<?=$_SESSION['u_uidss']?>';
		if(uids2 == ''){
			location.href = "<?=URL('study','&cid=1')?>"
		}
		
	
		
	</script>
	<script>
					function readyes(){
						var xmlhttp;
						if (window.XMLHttpRequest){
									xmlhttp=new XMLHttpRequest();
						}else{
									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						 }xmlhttp.onreadystatechange=function(){
									if (xmlhttp.readyState==4 && xmlhttp.status==200){
									//alert(xmlhttp.responseText)
									location.href ="/index.php?m=bbsUser.my_msgs&ccid=3"
									
									}
									
						}
						xmlhttp.open("POST","/index.php?m=bbs2.readyes",true);
						xmlhttp.send();		
						}			
			
						setInterval(function ddss(){
							
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								if(xmlhttp.responseText == 1){
										$("#tpzs").html("<img src='images/login_msg.png'>")
									}else{
										$("#tpzs").html("<img src='images/login_msg1.png'>")
										}

								
								}
								
					}
		
						xmlhttp.open("POST","/index.php?m=bbs2.sfst",true);
						xmlhttp.send();		
						
		
							},5000);
								
												</script>
 <? TPL :: display('header');
 	 
 ?>
  
 <? TPL :: display("bbs/hd");?>
</div>               
<div id="wp" class="wp">
	<div id="ct" class="ct2_a wp cl">
		<? TPL :: display("bbs/nav");?>
		
		
		<div class="mn cont_wp wp_space_pm float_l">
			<div class="bm bw0 space">
        		<div class="page_frame_navigation" >
                    <div class="follow_feed_cover" style="left:
					<?php
					if(V('r:ccid') == 2){
						echo '129';
					}else if(V('r:ccid') == 3){
						echo '234';
					}else{
						echo '22';
						}
					?>px;" ></div>
                    <ul class="tb cl page_frame_ul" style="padding-left:20px;">
                        <li <? 
							if(V('r:ccid') == 1 or V('r:ccid') == NULL){
								echo 'class="a"';
							}
								
								?>
						 ><a href="<?= URL('bbsUser.my_msgs','&ccid=1')?>">个人消息</a></li>
                        <li <?=V('r:ccid') == 2?'class="a"':''?>><a href="<?= URL('bbsUser.my_msgs','&ccid=2')?>">系统消息</a></li>
					<li <?=V('r:ccid') == 3?'class="a"':''?>><a onclick="readyes()" href="javascript:;">提醒</a></li>
                        <?php /*?><li  ><a href="<?= URL('bbsUser.my_notice')?>">提醒</a></li><?php */?>
                    </ul>
                </div>      
				<? if(V('r:ccid') == 3){?>
				
					<div class="xld xlda notice_msg " >

			<div class="nts pml" id="inforsssss22">
	<?  $tixing = DS('publics._get','','remind','followid='.$_SESSION['u_uidss'].' order by addtime desc limit 0,25');	?>
				<? if(isset($tixing) && !empty($tixing)){?>
				<? foreach($tixing as $k=>$v){?>
				<? $user = DS('publics._get','','users','id ='.$v['uid']);	?>	
				<? $user2 = DS('publics._get','','users','id ='.$_SESSION['u_uidss']);	?>	
				<? if($v['status'] == 1){?>	
				<dl notice="6652481" class="cl" onmouseover="showin7(<?=$v['id']?>)">
													<table cellspacing="0" cellpadding="0">
														<colgroup><col width="34px">
														<col width="744px">
														</colgroup><tbody><tr>
															<th>
																<div class="avt mbn">
<a class="avatar" href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><img src="<?=$user[0]['logo']==NULL?"images/course_conimg_27.png":$user[0]['logo']?>" style="cursor: pointer;"><span class="shadowbox_avatar"> </span></a>
<? if($v['is_show'] == 0){?>
	<img style="width:12px;height:12px;margin:-5px 0 0px 34px" src="images/pm_unread22.png">
<?	}?>
																												</div>
															</th>
															<td>
	<div class="ntc_body readntc_body">
																												<a href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><?=$user[0]['realname']?></a> 发给您的信息 <a target="_blank" href="<?=URL('bbsUser.my_msgs','&ccid=1')?>" class="closenotice"><?=htmlspecialchars($v['information'])?></a> &nbsp; <a class="lit" target="_blank" href="<?=URL('bbs2.space','&uid='.$v['uid'].'&followuid='.$_SESSION['u_uidss'])?>">查看 ›</a>                                            </div>
																<div class="time_msgnotice">
<span class="xg1 xw0"><span title="<?=date("Y-m-d H-i-s",$v['addtime'])?>"><?=date("m月d号",$v['addtime'])?></span></span>
<a title="删除"  id="a_note_<?=$v['id']?>" href="javascript:;"  onclick="delxingx(<?=$v['id']?>)" class="shield_msgnotice">删除</a>


					</div>
																<div class="cr"></div>
															</td>
														</tr>
													</tbody></table>
												
					
					
					</dl>
				<? }else if($v['status'] == 3){?>	
				
		<?  $tidid = DS('publics._get','','bbs_postcomment','tid='.$v['tid'].' and pid='.$v['fid'].' and dateline = '.$v['tidaddtime']);	?>
					<dl notice="6652481" class="cl" onmouseover="showin7(<?=$v['id']?>)">
													<table cellspacing="0" cellpadding="0">
														<colgroup><col width="34px">
														<col width="744px">
														</colgroup><tbody><tr>
															<th>
																<div class="avt mbn">
<a class="avatar" href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><img src="<?=$user[0]['logo']==NULL?"images/noavatar_big.gif":$user[0]['logo']?>" style="cursor: pointer;"><span class="shadowbox_avatar"> </span></a>
<? if($v['is_show'] == 0){?>
	<img style="width:12px;height:12px;margin:-5px 0 0px 34px" src="images/pm_unread22.png">
<?	}?>
																												</div>
															</th>
															<td>
																											<div class="ntc_body readntc_body">
																												<a href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><?=$user[0]['realname']?></a> 回复了您的帖子 <a target="_blank" href="<?=URL('bbs.thread_detail','&tid='.$v['tid'].'&fid='.$v['fid'])?>" class="closenotice"><?=htmlspecialchars($v['information'])?></a> &nbsp; <a class="lit" target="_blank" href="<?= URL('bbs2.lczda','&lcid='.$tidid[0]['id'].'&tid='.$v['tid'].'&fid='.$v['fid'])?>">查看 ›</a>                                            </div>
																<div class="time_msgnotice">
<span class="xg1 xw0"><span title="<?=date("Y-m-d H-i-s",$v['addtime'])?>"><?=date("m月d号",$v['addtime'])?></span></span>
																	<a title="屏蔽"  id="a_note_<?=$v['id']?>" href="javascript:;"  onclick="delxingx(<?=$v['id']?>)" class="shield_msgnotice">删除</a>
					</div>
																<div class="cr"></div>
															</td>
														</tr>
													</tbody></table>
												
					
					
					</dl>
				<? }else if($v['status'] == 2 and $v[0]['uid'] != 0){?>	
					<dl notice="6641167" class="cl" onmouseover="showin7(<?=$v['id']?>)">
													<table cellspacing="0" cellpadding="0">
														<colgroup><col width="34px">
														<col width="744px">
														</colgroup><tbody><tr>
															<th>
																<div class="avt mbn">
	<a class="avatar"><img alt="systempm" src="<?=$user[0]['logo']==NULL?"images/noavatar_big.gif":$user[0]['logo']?>"><span class="shadowbox_avatar"> </span></a>
	<? if($v['is_show'] == 0){?>
	<img style="width:12px;height:12px;margin:-5px 0 0px 34px" src="images/pm_unread22.png">
<?	}?>
</div>
															</th>
															<td>
			<div class="ntc_body readntc_body">
			
		<a href="<?=URL('bbsUser.user_broadcast','&id='.$v['uid'])?>"><?=$user[0]['realname']?></a> 收听了您。<a href="<?=URL('bbsUser.my_follow','&ccid=2')?>">点击查看 ›</a>      
		                                      </div>
																<div class="time_msgnotice">
																	<span class="xg1 xw0"><span title="<?=date("Y-m-d H-i-s",$v['addtime'])?>"><?=date("m月d号",$v['addtime'])?></span></span>
																	<a title="删除" id="a_note_<?=$v['id']?>" href="javascript:;"  onclick="delxingx(<?=$v['id']?>)" class="shield_msgnotice">删除</a>
					</div>
																<div class="cr"></div>
															</td>
														</tr>
													</tbody></table>
												
					
					
					</dl>
				<? }else if($v['status'] == 4){?>	
					<dl notice="5543691" class="cl" onmouseover="showin7(<?=$v['id']?>)">
                            	<table cellspacing="0" cellpadding="0">
                                	<colgroup><col width="34px">
                                    <col width="744px">
                                	</colgroup><tbody><tr>
                                    	<th>
                                            <div class="avt mbn">
             <a class="avatar"><img alt="systempm" src="<?=$user[0]['logo']==NULL?"images/course_conimg_27.png":$user2[0]['logo']?>"><span class="shadowbox_avatar"> </span></a>
			 <? if($v['is_show'] == 0){?>
	<img style="width:12px;height:12px;margin:-5px 0 0px 34px" src="images/pm_unread22.png">
<?	}?>
                                                                                            </div>
                                        </th>
                                        <td>
                                        <div class="ntc_body readntc_body">您发表的主题 <a target="_blank" href="<?=URL('bbs.thread_detail','&tid='.$v['tid'].'&fid='.$v['fid'])?>"><?=htmlspecialchars($v['information'])?></a> 已发表成功！ &nbsp; <a class="lit" target="_blank" href="<?=URL('bbs.thread_detail','&tid='.$v['tid'].'&fid='.$v['fid'])?>">查看 ›</a>                                            </div>
                                            <div class="time_msgnotice">
                                                <span class="xg1 xw0"><span title="<?=date("Y-m-d H-i-s",$v['addtime'])?>"><?=date("m月d号",$v['addtime'])?></span></span>
                                                <a title="删除"  id="a_note_<?=$v['id']?>" href="javascript:;"  onclick="delxingx(<?=$v['id']?>)" class="shield_msgnotice">删除</a>
</div>
                                            <div class="cr"></div>
                                        </td>
                                    </tr>
                                </tbody></table>
                            


</dl>	
	  			 <? }?>	
				 <? }?>	
				 <? }?>	 


			</div>
			<div class="pgs cl pagebar">
</div>
			</div>
					
					
					
					
					
					
					
					
					
					
				<? }else ?>
				<? if(V('r:ccid') == 2){?>
				<? $uuids = DS('publics._get','','informationshow','userid ='.$_SESSION['u_uidss']);?>
				<? $useridaddtime = DS('publics._get','','users','id ='.$_SESSION['u_uidss']);?>
				<?php
				 if(!empty($uuids)){
				foreach($uuids as $ak=>$av){
					$ss .= $av['informationid'].',';	
				}
				}
					$newstrss = substr($ss,0,strlen($ss)-1);
					if($newstrss == NULL){
						$newstrss = 0;
					}
					//$newstrss = $ss.$_SESSION['u_uidss'];
				?>
				
				<? $information = DS('publics._get','','information'," 1=1 order by  addtime desc");?>

				<? if(isset($information) && !empty($information)){?>
					
				<div class="xld xlda notice_msg" id="inforsssss">

<div class="nts pml">
<? foreach($information as $k=>$v){?>

			<dl notice="6641562" class="cl" onmouseover="showin(<?=$v['id']?>)">
				<table cellspacing="0" cellpadding="0">
					<colgroup><col width="34px">
					<col width="744px">
					</colgroup><tbody><tr>
						<th>
							
						</th>
					<td>
				<div class="ntc_body">
			
						<?=$v['content']?>
				
				</div>
	<div class="time_msgnotice">
               <span class="xg1 xw0"><span title="<?=date('Y-m-d ',$v["addtime"])?>"><?=date('Y-m-d ',$v["addtime"])?></span></span>
       <a href="javascript:;" title="删除" onclick="delwiodow(<?=$v['id']?>);" id="a_note_<?=$v['id']?>" class="shield_msgnotice">删除</a>
</div>
				<div class="cr"></div>
						</td>
					</tr>
				</tbody></table>
			</dl>
				<?	}?>
				<?	}else{?>
			<div style="border:none;" class="pagebar_space">
                        <span style="float:left;">当前没有相应的短消息</span>
                       
                        <div class="cr"></div>
                    </div>
			<? }?>		
			<div class="pgs pbm cl pagebar">

</div>
</div>
</div>
		<script>					
   		 function delwiodow(id){
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								location.href =""
								}
								
					}
						var json = '{"user":"'+encodeURIComponent(id)+'"}';
						//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
						xmlhttp.open("POST","<?=URL("bbs2.delwiodow")?>"+'&json='+json,true);
						xmlhttp.send();		
			}			

							function showin(id){
								$(".time_msgnotice a").attr("style","color:#e6e6e6 !important")
								$("#a_note_"+id).attr("style","color:black !important")
							}
							$("#inforsssss").mouseout(function(){
								$(".time_msgnotice a").attr("style","color:#e6e6e6 !important")
								})
							
			 </script>

		
				<? }else if(V('r:ccid') == 1 or V('r:ccid') == NULL){?>
				                  
					<div id="deletepmform">
						<div class="pagebar_space">
							<label id="checkAllPm" for="delete_all" class="but1 pn normalbtn graybtn" style="padding:7px 8px;" onClick="checkall();"><span style="display:none;" ><input type="checkbox" name="chkall" id="delete_all" class="pc" onClick="allce()" /></span><strong>全选</strong></label>
							<em id="de"><span class="normalbtn graybtn disabledgraybtn" style="margin-left:20px;"<button id="deletePm" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button></span></em>
							<em id="de1" style="display:none" onClick="ded1()"><span class="normalbtn graybtn" style="margin-left:20px;"</span><button id="deletePm1" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>删除</strong></button></span></em>
							
							<em id="de2"><span class="normalbtn graybtn disabledgraybtn" style="margin-left:20px;"<button id="deletePm" class="pn but1 disabledgraybtn" type="submit" name="deletepmsubmit_btn" value="true"><strong>标记已读</strong></button></span></em>
							
							<em id="de3" style="display:none"><span class="normalbtn graybtn" style="margin-left:20px;"><button class="pn but1" type="button" name="markreadpm_btn" value="true" onClick="pagebar_space();"><strong>标记已读</strong></button></span></em>
							<a class="normalbtn bluebtn" style="float:right;" href="<?= URL('bbsUser.send_msg')?>" target="_blank" ><strong>发消息</strong></a><div class="cr"></div>			
						</div>
						<div class="xld xlda pml mtm mbm">
						<script>
							function de1(){
								var checklist = document.getElementsByName ("deletepm_deluid");
							
								 for(var i=0;i<checklist.length;i++)
									   {
										  if(checklist[i].checked == 1){
											  var ss = 1
											  }
									   }
								if(ss == 1){
									document.getElementById('de1').style.display = "";
									document.getElementById('de').style.display = "none";
									document.getElementById('de3').style.display = "";
									document.getElementById('de2').style.display = "none";
									}else{
									document.getElementById('de1').style.display = "none";
									document.getElementById('de').style.display = "";
									document.getElementById('de3').style.display = "none";
									document.getElementById('de2').style.display = "";
									}
								}
							function allce(){  
									var checklist = document.getElementsByName ("deletepm_deluid");
									   if(document.getElementById("delete_all").checked)
									   {
										document.getElementById('de1').style.display = "";
										document.getElementById('de').style.display = "none";
										document.getElementById('de3').style.display = "";
										document.getElementById('de2').style.display = "none";	   
									   for(var i=0;i<checklist.length;i++)
									   {
										  checklist[i].checked = 1;
									   }
									 }else{
										document.getElementById('de1').style.display = "none";
										document.getElementById('de').style.display = "";
										document.getElementById('de3').style.display = "none";
										document.getElementById('de2').style.display = ""; 
									  for(var j=0;j<checklist.length;j++)
									  {
										 checklist[j].checked = 0;
									  }
									 }
								} 		
						</script>
					
						
						
						<?php
						 
							if(!empty($res)){
								foreach($res['info'] as $pk => $pv){
									
									$re1 = DS('publics._get','','users',"username='".$pv['fusername']."'");
									 
							if($pv['uid'] == $_SESSION['u_uidss']){	
							$raae1 = DS('publics._get','','user_msgs',"followuid='".$pv['followuid']."' and uid = '".$pv['uid']."' and sendTime > '".$pv['sendTime']."' ");
							$raae2 = DS('publics._get','','user_msgs',"uid='".$pv['followuid']."' and followuid = '".$pv['uid']."' and sendTime > '".$pv['sendTime']."' ");
							
							if($raae1 == NULL and $raae2 == NULL){
						?>
							<dl id="pmlist_<?= $re1[0]['id']?>" class="bbda cur1 cl" onmouseover="sshow(<?=$pv['id']?>)" style="cursor: default;">
								<dd class="m avt">
									<div class="o"  >
										<span style="display:;"><input type="checkbox" name="deletepm_deluid" id="a_delete_<?= $pv['id']?>" class="pc" value="<?=$pv['followuid']?>"  onClick="de1()" 
										style="width: 16px;
 height: 55px;
 padding: 0 5px 0 0;
 background: url(checkbox.png) no-repeat;
 display: block;
 clear: left;
 float: left;"
										/></span>
										
										<?php /*?><span class="box_simcheck"></span><?php */?>
									</div>
									<div class="im" style="position:relative">
										<a href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank" class="avatar">
											<?php
												if(empty($re1[0]['logo'])){
											?>
											<img src="images/course_conimg_27.png" />
											<?php
												}else{
											?>
											<img src="<?= $re1[0]['logo']?>" />
											<?php
												}
											?>
											 <span class="shadowbox_avatar"> </span>
										</a>
									
									</div>
								</dd>
								<dd class="ptm pm_c">发给&nbsp;
								<a class="name_pmlist" href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank"><?= $pv['fusername']?></a>
								
								<span class="xg1"><span title="<?= date("m月d号 H:i",$pv['sendTime'])?>"><?= date("m月d号 H:i
								",$pv['sendTime'])?></span></span><br><p><?= htmlspecialchars($pv['message'])?></p></dd>
								<div class="cr"></div>
								<div class="mtop<?=$pv['id']?> operation" >
									<div class="y msg_btnbar">
									   <a href="<?=URL('bbs2.space','&uid='.$pv['uid'].'&followuid='.$pv['followuid'])?>" target="_blank" >回复</a>&nbsp;&nbsp;&nbsp;
									   <a href="javascript:;" onClick="del_msgs(<?=$pv['uid']?>,<?=$pv['followuid']?>)" >删除</a>
									</div>
									<div class="cr"></div>
								</div> 
							</dl>
							
							<? }}else{?>
							<? $re1 = DS('publics._get','','users',"id='".$pv['uid']."'");?>
							<?
							$raae1 = DS('publics._get','','user_msgs',"followuid='".$pv['followuid']."' and uid = '".$pv['uid']."' and sendTime > '".$pv['sendTime']."'");
							$raae2 = DS('publics._get','','user_msgs',"uid='".$pv['followuid']."' and followuid = '".$pv['uid']."' and sendTime > '".$pv['sendTime']."'");
							if($raae1 == NULL and $raae2 == NULL){
						?>
							<dl id="pmlist_<?= $re1[0]['id']?>" class="bbda cur1 cl" onmouseover="sshow(<?=$pv['id']?>)" style="cursor: default;">
								<dd class="m avt">
									<div class="o"  >
										<span style="display:;"><input type="checkbox" name="deletepm_deluid" id="a_delete_<?= $pv['id']?>" class="pc" value="<?=$pv['uid']?>"  onClick="de1()"  style="width: 16px;
 height: 55px;
 padding: 0 5px 0 0;
 background: url(checkbox.png) no-repeat;
 display: block;
 clear: left;
 float: left;"/></span>
										<?php /*?><span class="box_simcheck"></span><?php */?>
									</div>
									<div class="im" style="position:relative">
										<a href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank" class="avatar">
											<?php
												if(empty($re1[0]['logo'])){
											?>
											<img src="images/w100h100.jpg" />
											<?php
												}else{
											?>
											<img src="<?= $re1[0]['logo']?>" />
											<?php
												}
											?>
											 <span class="shadowbox_avatar"> </span>
										</a>
										<? if($pv['is_read'] != 1){?>
										<img style="width:12px;height:12px;margin:-9px 0 0px 34px" src="images/pm_unread22.png">
										<? }?>
									</div>
								</dd>
								<dd class="ptm pm_c">接收&nbsp;<a class="name_pmlist" href="<?= URL('bbsUser.user_broadcast',"&id=".$re1[0]['id']."")?>" target="_blank"><?= $pv['username']?></a><span class="xg1"><span title="<?= date("m月d号 H:i",$pv['sendTime'])?>"><?= date("m月d号  H:i
								",$pv['sendTime'])?></span></span><br><p><?= htmlspecialchars($pv['message'])?></p></dd>
								<div class="cr"></div>
								<div class="mtop<?=$pv['id']?> operation" >
									<div class="y msg_btnbar">
									<a href="<?=URL('bbs2.space','&uid='.$pv['uid'].'&followuid='.$pv['followuid'])?>" target="_blank" onclick="is_readl(<?=$pv['uid']?>,<?=$pv['followuid']?>)">回复</a>&nbsp;&nbsp;&nbsp;
									   <a href="javascript:;" onClick="del_msgs(<?=$pv['uid']?>,<?=$pv['followuid']?>)">删除</a>
									</div>
									<div class="cr"></div>
								</div> 
							</dl>
							
							
							
						<?php
							}}}
							}else{
						?>
						
					  <div class="bm bw0 pgs cl pagebar"></div>
						<?php
								}
						?>
						</div>
						<div class="pages" style="margin-top:40px;">
							<?= $res['pagehtml']?>
						</div>
						<div class="pgs pbm cl pagebar"></div>
					</div>
				<? }?>
				
<script type="text/javascript">
	addBlockLink('deletepmform', 'dl');
</script>
<script>				
							function is_readl(uid,followuid){
								$.post( '<?=URL('bbs2.is_read1')?>',{uid:uid,followuid:followuid}, function( i )
								  {
								   
								  });
								}		
							  

							function sshow(id){
							
								$(".operation a").attr("style","color:#e6e6e6 !important")
								$(".mtop"+id+" a").attr("style","color:black !important")
							}
							$("#deletepmform").mouseout(function(){
								$(".operation a").attr("style","color:#e6e6e6 !important")
								})
							
	function ded1(){
			
		var checklist = document.getElementsByName ("deletepm_deluid");
		
		var value = ""
		for(var i=0;i<checklist.length;i++){
			if(checklist[i].checked != false){
				
			var	value = value+checklist[i].value+',';
			}
		}		
	
		$.post( '<?=URL('bbs2.de')?>',{id:value}, function( i )
			{
				location.href =""
		    });		   
	}
	function pagebar_space(){
		var checklist = document.getElementsByName ("deletepm_deluid");
		
		var value = ""
		for(var i=0;i<checklist.length;i++){
			if(checklist[i].checked != false){
				
			var	value = value+checklist[i].value+',';
			}
		}		
	
		$.post( '<?=URL('bbs2.pagebar_space')?>',{id:value}, function( i )
			{
				location.href =""
		    });
		}
	function del_msgs(uid,followuid){
		$.post( '<?=URL('bbs2.delmsg')?>',{uid:uid,followuid:followuid}, function( i )
			{
				location.href =""
		    });
	}
</script>
	<script>
				setTimeout(function(){
					var ccid = "<?=V('r:ccid')?>"
					if(ccid == 3){
						var xmlhttp;
						if (window.XMLHttpRequest){
									xmlhttp=new XMLHttpRequest();
						}else{
									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						 }xmlhttp.onreadystatechange=function(){
									if (xmlhttp.readyState==4 && xmlhttp.status==200){
									
	
									}
									
						}
							//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
							xmlhttp.open("POST","<?=URL("bbs2.shownow")?>",true);
							xmlhttp.send();	
						
						
						}
					},3000)
					
	
				function delxingx(id){
								
					var xmlhttp;
					if (window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
					}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
								
									location.href=""
								}
								
					}
					

						//var json = '[{"aa":"33","bb":"44"},{"cc":"33","dd":"44"},{"ee":"33","ff":"44"}]';
						xmlhttp.open("POST","<?=URL("bbs2.tianxdel")?>"+'&id='+id,true);
						xmlhttp.send();		
			}			
		
								
							function showin7(id){
								$(".time_msgnotice a").attr("style","color:#e6e6e6 !important")
								$("#a_note_"+id).attr("style","color:black !important")
							}
							$("#inforsssss22").mouseout(function(){
							
								$(".time_msgnotice a").attr("style","color:#e6e6e6 !important")
								})
					</script>
			</div>
		</div>
	</div>
<script type="text/javascript">
	// 头像浮动
	adrift 	= new avatar_drift();
	adrift.init();	
	public.box_simcheck('pc');
	hoverAdd(".cont_msgdetail","conth_msgdetail")
	showBox('#msgSettingBtn','#msgSetting',560,560,true,true)
	focusBox(".cont_msgset textarea");
	checkFun(".wrap_simcheck","checked_simcheck");
	checkControlBtn("#checkAllPm","#deletepmform .checked_simcheck","#deletePm","disabledgraybtn","#deletepmform");
	checkControlBtn("#deletepmform .box_simcheck","#deletepmform .checked_simcheck","#deletePm","disabledgraybtn","#deletepmform");
</script>
<script type="text/javascript">
	var page = 1;
	var gid = -1;
	var showNum = 0;
	var haveFriend = true;
	function getUser(pageId, gid) {
		page = parseInt(pageId);
		gid = isUndefined(gid) ? -1 : parseInt(gid);
		var x = new Ajax();
		x.get('home.php?mod=spacecp&ac=friend&op=getinviteuser&inajax=1&page='+ page + '&gid=' + gid + '&' + Math.random(), function(s) {
		var data = eval('('+s+')');
		var singlenum = parseInt(data['singlenum']);
		var maxfriendnum = parseInt(data['maxfriendnum']);
		fs2.addDataSource(data, clearlist2);
		haveFriend = singlenum && singlenum == 20 ? true : false;
		if(singlenum && fs2.allNumber < 20 && fs2.allNumber < maxfriendnum && maxfriendnum > 20 && haveFriend) {
			page++;
			getUser(page);
		}
	});
	}
	function selector() {
		var parameter = {'searchId':'ignoreName','searchWpId':'ignoreNameWp', 'showId':'friends', 'formId':'', 'showType':3, 'handleKey':'fs2', 'selBox':'selectorBox', 'selBoxMenu':'showSelectBox_menu', 'maxSelectNumber':'20', 'selectTabId':'selectNum', 'unSelectTabId':'unSelectTab', 'maxSelectTabId':'remainNum'};
		fs2 = new friendSelector(parameter);
		var listObj = $('selBox');
		listObj.onscroll = function() {
		clearlist2 = 0;
		if(this.scrollTop >= this.scrollHeight/5) {
			page++;
			gid = isUndefined(gid) ? -1 : parseInt(gid);
			if(haveFriend) {
				getUser(page, gid);
			}
		}
	} 
		getUser(page);
	}
	selector();
</script>
<div class="wp mtn"><div id="diy3" class="area"></div></div>	
</div>

</div>
<div style="margin-top:50px">
<?php TPL :: display('footer');?>
</div>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<!--统计代码-->
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/jquery.alerts.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.js"></script>
<script type="text/javascript">
// head-select
$(function(){
	$.head_select("#head_select","#inputselect");
});

//关注
atten();
recommend();
boutique('main_boutique');
//putaway();
ranking('ranOne');
ranking('ranTwo');
ranking('ranThree');


//团购
jQuery(".group-tab").slide({trigger:"click",effect:"left"});

// banner
jQuery(".slide_Box").slide({mainCell:".bd ul",autoPlay:true,trigger:"click"});

//重磅推荐jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
jQuery(".main-recommend").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//精品推荐jQuery(".main-boutique").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});
jQuery(".main-boutique").slide({trigger:"click"});

//新书上架
jQuery(".main-putaway").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"left",autoPlay:false,trigger:"click"});

//合作伙伴
jQuery(".slideBox").slide({ mainCell:"ul",vis:6,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

//友情链接
jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});

//总排行
jQuery(".ranking-box").slide({autoPlay:false,trigger:"click"});

//听书产品 jQuery(".main-product").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
jQuery(".main-product").slide({trigger:"click"});

//广告
jQuery(".main-ad").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:1,trigger:"click"});
</script>
<script type="text/javascript">
	scrolltop_obj 	= new goto_top();
	scrolltop_obj.init();
</script>
<script src="js/bbsjs/flow.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>