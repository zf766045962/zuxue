<?php
/**************************************************
*  Created:  2014-10-09
*
*  bbs论坛用户中心
*
*  @Xsmart (C)2014-2099 Nit Inc.
*  @Author Chen
*
***************************************************/
header("Content-Type: text/html;charset=utf-8");
include('action.abs.php');
class bbs2_mod extends action
{

		function yzz(){
			echo $_SESSION['verify_code'];	
		}
		function yzz1(){
			echo $_SESSION['verify_code'];	
		}
		function content(){
			
			$ss = $_SESSION['u_uidss'];
			$author = DS('publics._get','','users', "id=$ss");
			if(V('r:con') != NULL and V('r:subject')!= NULL){
			$tiems = time();
				
				
			$data['fid'] 	= V('r:fid'); 
			$data['author'] 	= $author[0]['username']; 
			$data['authorid'] 	= $author[0]['id']; 
			$data['subject'] 	= V('r:subject'); 
			$data['dateline'] 	= $tiems; 
			$data['content'] 	=  V('r:con'); 
			if($_SESSION['u_uidss'] != NULL){
			DS('publics._save',5,$data,'bbs_post'); 
			}
		
		 $ididss = DS('publics._get','','bbs_post',"fid =".V('r:fid') . ' and authorid = '.$author[0]['id']
		  .' and dateline='.$tiems );

		 if($ididss != 	NULL){
			 
			 
		$remin['followid'] = $ss;
		$remin['information']   = V('r:subject');
		$remin['status']  	= 4;
		$remin['is_read']  	= 0;
		$remin['fid'] 	= V('r:fid');
		$remin['tid'] 	= $ididss[0]['pid'];
		$remin['addtime'] 	= time();
        DS('publics._save','',$remin,'remind');
		
		$comment['pid'] 	= V('r:fid');
		$comment['authorid'] 	= $author[0]['id'];
		$comment['dateline'] = $tiems;
		$comment['poststatus'] = 1;
		$comment['tid']   = $ididss[0]['pid'];
		if($_SESSION['u_uidss'] != NULL){
        DS('publics._save','',$comment,'bbs_postcomment');
		}	 
			 }	
		
			
			echo "<script> location.href='".URL('bbs.thread','&fid='. V('r:fid'))."' </script>";	
				
				}else{
					echo "<script> alert('网络错误') </script>";	
					echo "<script> location.href='".URL('bbsUser.send_submit','&fid='. V('r:fid'))."' </script>";
					}
		}
		function look(){
			$cont = DS('publics._get','','bbs_post', "pid='".V('r:tid')."'");
			$num = (int)$cont[0]['looknum'] + 1;
			DS('publics.date1','','bbs_post',"looknum = $num","pid = '".V('r:tid')."'");
			echo 1;	
		}
		function insers(){
			$ss = $_SESSION['u_uidss'];	
			$author=DS('publics._get','','users', "id=$ss");
			$author = $author[0]['username'];
			$data =	time();
			if(V('r:loid') == 2)
			{	
				DS('publics.date2','','bbs_postcomment',"tid,pid,author,authorid,dateline,comment,rpid,mood","'".V('r:tid')."','".V('r:fid')."','$author',$ss,'$data','".V('r:con')."','".V('r:id')."',1");
			}else{
				DS('publics.date2','','bbs_postcomment',"tid,pid,author,authorid,dateline,comment","'".V('r:tid')."','".V('r:fid')."','$author',$ss,'$data','".V('r:con')."'");	
				}
			DS('publics.date1','','bbs_post',"recoverytime = '$data'","pid = '".V('r:tid')."'");
			$all=DS('publics.get_total','','bbs_postcomment', "rpid = 0 and tid = '".V('r:tid')."' and comment != ''");
			DS('publics.date1','','bbs_post',"alltip = $all","pid = '".V('r:tid')."'");
					
			$sa = DS('publics._get','','bbs_postcomment',"rpid=0 and tid ='".V('r:tid')."' order by id desc limit 1");
			/*echo "<script> location.href=''</script>";*/
				
		}
	
	
		function showwind(){
			$ss = $_SESSION['u_uidss'];	
			$sa = DS('publics._get','','user_follow',"uid ='$ss' and followuid = '".V('r:id')."'");
			//print_r($sa);
			$yh1 = DS('publics._get','','users',"id=$ss");
			$yh2 = DS('publics._get','','users',"id='".V('r:id')."'");
			$au = $yh1[0]['username'];
			$au1 = $yh2[0]['username'];
			$time = time();
			//echo $ss;
			//echo 'll';
			//echo V('r:id');
			if($sa == NULL){
			 
				
		$cf = DS('publics._get','','remind','uid='.$_SESSION['u_uidss'] . ' and followid = '. V('r:id'));
		
		
		//var_dump($cf);	
	   if($cf ==NULL ){			
		$remin['uid'] = $_SESSION['u_uidss'];
		$remin['followid'] = V('r:id');
		//$remin['information']   = V('g:message');
		$remin['status']  	= 2;
		$remin['is_read']  	= 0;
		$remin['addtime'] 	= time();
        DS('publics._save','',$remin,'remind');
				
		}			
				
				DS('publics.date2','','user_follow',"uid,username,followuid,fusername,dateline","$ss,'$au','".V('r:id')."','$au1','$time'");	
			$alls2=DS('publics.get_total','','user_follow', "uid= '".V('r:id')."'"); 
			 $alls3=DS('publics.get_total','','user_follow', "followuid = '".V('r:id')."'"); 
			 echo  json_encode(array('alls2'=>$alls2,'alls3'=>$alls3));	
				
				}else{
					echo '2222';
				}
		}
		function send(){
			$ss = $_SESSION['u_uidss'];	
			
			//print_r($sa);
			$yh1 = DS('publics._get','','users',"id=$ss");
			$yh2 = DS('publics._get','','users',"id='".V('r:id')."'");
			$au = $yh1[0]['username'];
			$au1 = $yh2[0]['username'];
			$time = time();
			//echo $ss;
			//echo 'll';
			//echo V('r:id');
		
			DS('publics.date2','','user_msgs',"uid,username,followuid,fusername,message,sendTime","$ss,'$au','".V('r:id')."','$au1','".V('r:con')."','$time'");	
				

		}	
		
		function fend(){
			$ss = $_SESSION['u_uidss'];	
			$sa = DS('publics._get','','user_friend',"uid ='$ss' and fuid = '".V('r:id')."'");
			//print_r($sa);
			$yh1 = DS('publics._get','','users',"id=$ss");
			$yh2 = DS('publics._get','','users',"id='".V('r:id')."'");
			$au = $yh1[0]['username'];
			$au1 = $yh2[0]['username'];
			$time = time();
			//echo $ss;
			//echo 'll';
			//echo V('r:id');
			//echo V('r:con');
			//echo V('r:sel');
			if($sa == 	NULL){
			DS('publics.date2','','user_friend',"uid,fuid,fusername,gid,dateline,note","$ss,'".V('r:id')."','$au1','".V('r:sel')."','$time','".V('r:con')."'");	
			}else{
				echo 222;
				}

		}
		
		function showwind1(){
			
			
			$ss = $_SESSION['u_uidss'];	
			$sa = DS('publics._get','','user_follow',"uid ='$ss' and followuid = '".V('r:id')."'");
			DS('publics._del',3,'user_follow','id='.$sa[0]['id']);
			DS('publics._del',3,'remind','uid='.$_SESSION['u_uidss'] . ' and followid = '. V('r:id'));	
			
			 $alls2=DS('publics.get_total','','user_follow', "uid= '".V('r:id')."'"); 
			 $alls3=DS('publics.get_total','','user_follow', "followuid = '".V('r:id')."'"); 
			 echo  json_encode(array('alls2'=>$alls2,'alls3'=>$alls3));
			
		}
		function indexlook(){
			$cont = DS('publics._get','','bbs_post', "pid='".V('r:tid')."'");
			$num = (int)$cont[0]['looknum'] + 1;
			DS('publics.date1','','bbs_post',"looknum = $num","pid = '".V('r:tid')."'");	
		}
		function insrtsa(){
			$ss = $_SESSION['u_uidss'];
			$idss = DS('publics._get','','user_info1','uid = '.$ss);	
			if($idss == NULL){	
			foreach(V('r:date') as $k=>$v){
				$data[$k] 	= $v; 	
			}
			$data['uid'] 	= $ss; 
			DS('publics._save',3,$data,'user_info1'); 
			
			}else{
				foreach(V('r:date') as $k=>$v){
		
				$aa .= $k.'='."'$v'".',';
				
			  }
			$wh = $aa.'uid='.$ss;
			//echo $wh;
			DS('publics.date1','','user_info1',"$wh","uid = '".$ss."'");
			
			}	
			if(V('r:staue') == NULL){
				echo "<script> location.href='".URL('bbsUser.my_basic_info')."' </script>";
			}else if(V('r:staue') == 1){
				echo "<script> location.href='".URL('bbsUser.my_profession_info')."' </script>";	
			}else if(V('r:staue') == 2){
				echo "<script> location.href='".URL('bbsUser.my_activity_info')."' </script>";	
			}else if(V('r:staue') == 3){
				echo "<script> location.href='".URL('bbsUser.my_info')."' </script>";	
			}
		}
		function fridend(){
			$fend = DS('publics._get','','user_friend','uid ='.$_SESSION['u_uidss']);
			
			 foreach($fend as $k=>$v){
				if($v['fuid'] == V('r:id')){
						echo 1;
					}
	   		 }
				
		}
		function lorderlist(){
			 $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id'); 
			 $con=DS('publics._get','','bbs_postcomment', "authorid =$id  and comment != '' and tid != 0 and rpid = 0 or poststatus = 1 and authorid =$id order by dateline desc limit ".(int)V('r:num').",6"); 
			 
						foreach($con as $k=>$v){
					
					
						 $con66=DS('publics._get','','bbs_post', "pid ='".$v['tid']."'"); 
	$html .=  '<li class="cl" name = "lili" id="feed_li_3639169" onmouseover="this.className='.'\'flw_feed_hover cl\''.'" onmouseout="this.className='.'\'cl\''.'">';
							if(date('Y',time()) != date('Y',(int)$v['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$v['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$zhf['dateline'])){
								$times =  date('m',time()) - date('m',(int)$v['dateline']).'个月前';
							}else if(date('d',(int)$v['dateline']) != date('d',time())){
								$times =  date('d',time()) - date('d',(int)$v['dateline']).'天前';
							}else if(date('H',(int)$v['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$v['dateline']).'小时前';
							}else if(date('i',(int)$v['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$v['dateline']).'分钟前';
							}else if(date('s',(int)$v['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$v['dateline']).'秒前';
							}else {
								$times =  '刚刚';
								}	
			$html .=	'<div class="feed_li_box" >      	            
            						<div class="flw_article" style="margin-left:0; padding-left:0px;" >
                                		<div class="flw_author">';
										
								$name = DS('publics._get','','bbs_forum','fid='.$v['pid']);
                        	$html .=	'      <a class="name_feedlist" href="javascript:;">';
							$html .= $v['author'];
							$html .=  ' &nbsp;&nbsp;';
							$html .=   ' </a> 发表于 <span title=';
							$html .=  date('Y-m-d h:i',(int)$v['dateline']);
							
							$html .= '>';
							$html .=  date('m月d号',(int)$v['dateline']);
							$html .= '</span>&nbsp;&nbsp;#<a href="';
							$html .= URL('bbs.thread','&fid='.$v['pid']);
							$html .= '">';
							$html .= $name[0]['name'];
							$html .= '</a></div>';	
						if($v['poststatus'] == 1){
							$postsubs = DS('publics._get','','bbs_post','pid='.$v['tid']);
							$html .=	'<h2 class="wx pbn">
                                    <a target="_blank" href="'.URL('bbs.thread_detail','&fid='.$v['pid'].'&tid='.$v['tid']).'">'.htmlspecialchars($postsubs[0]['subject']).'</a>
                                            </h2>
										<div id="original_content_15632896" class="pbm c cl atcont_flwlist">
                       						'.$postsubs[0]['content'].'
                                        </div>
										<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$v['id'].')">回复&nbsp; </a></span>
												</div>
                            				</div>';	
						}else{		
							$html .= '<div class="flw_quotenote xs2 pbw"><a href="'.URL('bbs.thread_detail','&fid='.$v['pid'].'&tid='.$v['tid']).'" target="_blank" >'.htmlspecialchars($v['comment']).' <br /></a></div>
                						<div class="flw_quote guide_list_replay">
											<div class="arrow_guidelist"></div>						
				 <h2 class="wx pbn"><a href="'. URL('bbs.thread_detail','&fid='.$v['pid']."&tid=".$v['tid']."").'" target="_blank">';
				 
				 	 $tidname = DS('publics._get','','bbs_post','pid='.$v['tid']);
							$html .= htmlspecialchars($tidname[0]['subject']);
								
							$html .= '</a></h2>';
							
							$html .= '<div id="original_content_'.$pv['authorid'].'" class="pbm c cl atcont_flwlist">'.
							 $tidname[0]['content'].'
							
							</div>                                            
                							<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$v['id'].')">回复&nbsp; </a></span></div>
                            				</div>';
						}
                			$html .=		'</div><div class="cr"></div>
            						</div>	';
							
							
							$html .= 	'<div id="load11" style="display:none"></div>			
									<div style="display:none" class="flw_replybox cl" id="relaybox_';
							$html .= 	$v['id'].'">';
								
                            $html .=    '<span style="margin: -23px 135px 0 0;" class="cnr"></span>';
						 $html .= 	'<form onsubmit="return ajaxpost2(this.id, '.'return_qrelay_12918932'.');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">';
						
					 $html .= 	'<input type="hidden" value="true" name="relaysubmit">
                                        	<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
                                        	<input type="hidden" value="3554c853" name="formhash">
                                        	<input type="hidden" value="5313176" name="tid">
                                        	<input type="hidden" value="qrelay_12918932" name="handlekey">	';
											
						$html .= '<span class="flw_autopt"><textarea onkeyup="strLenCalc(this, '.'checklen5313176'.', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea></span>	';	
						
					$html .= 	'<div style=" margin:30px 0px;">
												<div style="float:left; width:400px;" class="mtm sec identifying_code">
													<input type="hidden" value="SAyd29av0" name="sechash">验证码 			
                                                    <span onclick="showMenu({'.'ctrlid'.':this.id,'.'win'.':'.'qrelay_12918932'.'})" id="seccodeSAyd29av0">
                                                        <input type="text" tabindex="1" onblur="checksec('.'code'.', '.'SAyd29av0'.')" 
														
														class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0'.$v['id'].'" name="seccodeverify">
        												<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" 
														height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5('.'SAyd29av0'.','.'follow_rebroadcast'.')"></span> ';       			
				$html .= '<a class="xi2" onclick="updateseccode5('.'SAyd29av0'.','.'follow_rebroadcast'.');doane(event);" href="javascript:;">换一个</a>
														<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
													</span>
                                                    <div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span> ';
				$html .= '</div>
												</div>
                								<button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button><label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>      
                								<div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div><div class="cr"></div>
            								</div>
											<div id="return_qrelay_12918932"></div>
										</form>
										<div class="cl closebar_replybox" onclick="quickrelay2('.$v['id'].')"><a class="y xg1" onclick="display('.'relaybox_12918932'.')" href="javascript:;"></a></div>';		
										
				$html .= '</div>
				
									<div style="display:none" class="flw_replybox cl" id="replybox_'.$v['id'].'">	
									
                                    	<span class="cnr"></span>
										<form class="mbm"  action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
											<input type="hidden" value="3554c853" id="formhash" name="formhash">
											<input type="hidden" value="qreply_12918932" name="handlekey">
											<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>
    										<span class="flw_autopt"><textarea rows="4" cols="80" class="pts" id="postmessage_'.$v['id'].'" name="message"></textarea></span>
                                            <div style="margin:30px 0px;">
                 <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit'.$v['id'].'"style="float:right; 
				 margin-left:20px;" type="button" onclick="insert('.$v['id'].','.$con66[0]['pid'].','.$v['pid'].')"><span>回复</span></button><div class="cr"></div>
                                            </div>    
											<div class="mtm">
												<input type="hidden" value="SAyd29av0" name="sechash">
												<ul>
                                                	<li><em class="d">验证码</em>
                                                    	<span>
                                                        	<input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01'.$v['id'].'" name="seccodeverify">        
															<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" 
				
				onclick="updateseccode5('.'SAyd29av0'.','.'follow_rebroadcast'.')"></span>        
				
				
				<a class="xi2" onclick="refreshCc('.$v['id'].')" href="javascript:;">换一个</a><img id="checkCodeImg1'.$v['id'].'" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc('.$v['id'].')">
															<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
														</span>
														<div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>        

										</div></li></ul></div></form>
										<ul class="list_replybox" id="newreply_5313176_12918932">';		
										
							
							
							 if($v['rpid'] == 0){
			
		 $name = DS('publics._get','','bbs_postcomment',"comment != '' and tid=".$v['tid'] .' and rpid = 0 order by dateline desc limit 0,5');
			 foreach($name as $kk22 =>$vv22 ){ 
		$html .= 	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.$vv22['comment'].'</li>';
			 }
		 }else{
					 $name31222 = DS('publics._get','','bbs_postcomment',"comment != '' and rpid=".$vv22['rpid'] .' order by dateline desc limit 0,5');
				 foreach($name31222 as $kk22 =>$vv22 ){
			$html .= 	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.$vv22['comment'].'</li>';
		}
		}
		$html .= '</ul>
		<div class="cl closebar_replybox"><a title="关闭" class="y xg1" onclick="quickreply2('.$v['id'].')" href="javascript:;"></a>';
		 if($pv['classid'] == 0 and $kk22 == 4){
		$html .= 	 
	'<a class="xi2" target="_blank" href="'. URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'">去论坛查看所有回复<em class="arrow_2"> </em></a>';
 }		
															
				
	
	    }
			
			echo $html;
		}
		
		
		
		function lorderlist2(){
			 $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id'); 
			 //$con=DS('publics._get','','bbs_postcomment', "authorid =$id  and comment != '' and tid != 0 and rpid = 0 order by dateline desc limit ".(int)V('r:num').",6");
			 $newstrss = V('r:newlist');
			$re2 = DS('publics._get','','bbs_postcomment',"authorid in ($newstrss) and comment != '' and  mood != 1 or poststatus = 1 and authorid in ($newstrss) ORDER BY dateline desc limit ".(int)V('r:num').",6"); 
			 //var_dump($con);//echo $id;
			 
						foreach($re2 as $pk => $pv){
							if(!empty($pv)){
								$re4 = DS('publics.get_info','','users',"id='".$pv['authorid']."'");
								$html .=  
							'<div id="pid'.$pv['id'].'" style="display:none">'.$pv['pid'].'</div>
			<li class="cl" name = "lili" id="feed_li_'.$pv['authorid'].'" onmouseover="this.className=\''.'flw_feed_hover cl'.'\'" onmouseout="this.className=\''.'cl'.'\'">
            	<div class="feed_li_box" >
                	<div class="z flw_avt">
                    	<a class="avatar" id="stickthread_'.$pv['id'].'" onmouseover="wzxx('.$pv['id'].','.$pv['authorid'].')">';
                        
							//判断关注好友是否设置头像
                        	if(!empty($re4[0]['head_img'])){
						
                       $html .= ' <img src="'.$re4[0]['head_img'] .'"isdrift="true"><span class="shadowbox_avatar"> </span></a>';
                       
							}else{
						
                        $html .= ' <img src="images/w100h100.jpg" isdrift="true"/><span class="shadowbox_avatar"> </span></a>';
                       
							} 
						
    				$html .= '<span class="cnr"></span>
    				</div>       
					<div class="flw_article" style=" " >
                		<div class="flw_author"> ';
						
						if(date('Y',time()) != date('Y',(int)$pv['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$pv['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$pv['dateline'])){
								$times =  date('m',time()) - date('m',(int)$pv['dateline']).'个月前';
							}else if(date('d',(int)$pv['dateline']) != date('d',time())){
								$times =  date('d',time()) - date('d',(int)$pv['dateline']).'天前';
							}else if(date('H',(int)$pv['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$pv['dateline']).'小时前';
							}else if(date('i',(int)$pv['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$pv['dateline']).'分钟前';
							}else if(date('s',(int)$pv['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$pv['dateline']).'秒前';
							}else {
								$times =  '刚刚';
							}
						
					$html .=	'<a class="name_feedlist" href="'.URL('bbsUser.user_broadcast',"&id=".$pv['authorid']."").'">'.$re4[0]['username'].'&nbsp;&nbsp;</a> 发表于 <span title="'.date('Y-m-d H:i:s',$pv['dateline']).'">'.$times;
																
						
						$html .=	'</span>&nbsp;&nbsp; <a href="'.URL('bbs.thread','&fid='.$pv['pid']).'">';
								
								
								 $name = DS('publics._get','','bbs_forum','fid='.$pv['pid']);
								 if($name[0]['name'] != NULL){
							$html .='#';
								$html .=  $name[0]['name'];
								 };
								
							
						$html .='	</a>
                    	</div>';
						
						
					
							 if($pv['poststatus'] == 1){
						
								 $postsubs = DS('publics._get','','bbs_post','pid='.$pv['tid']);	
								$html .='		<h2 class="wx pbn">
                                    <a target="_blank" href="'.URL('bbs.thread_detail','&fid='.$pv['pid'].'&tid='.$pv['tid']).'">'.htmlspecialchars($postsubs[0]['subject']).'</a>
                                            </h2>
										<div id="original_content_15632896" class="pbm c cl atcont_flwlist">
                       						'.$postsubs[0]['content'].'	
                                        </div>
										<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$pv['id'].')">回复&nbsp; </a></span>
												</div>
                            				</div>';
						
						}else{
					$html .=	'<div class="flw_quotenote xs2 pbw">';
						 if($pv['classid'] == 1){
					$html .= '<div id="original_content_15038108" class="pbm c cl">'.htmlspecialchars($pv['comment']).'</div>';
							 }else{ 
							 
					$html .=	'<a href="'.URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'" target="_blank" > '
						. htmlspecialchars($pv['comment']).'<br /></a></div>';
						 }
						
						 if($pv['classid'] == 1){
						$html .= '<div class="xg1 cl">
							<div class="y flw_btnbar">
							<span class="y"> 
							<a onclick="quickreply1('.$pv['id'].',2)" href="javascript:;">回复&nbsp; </a>
							</span>
							</div>
                    	</div>';
						 }else{
					$html .=	'<div class="flw_quote guide_list_replay">
							<div class="arrow_guidelist"></div>
						
                         	
							
							   <h2 class="wx pbn"><a href="'. URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'" target="_blank">';
								 $tidname = DS('publics._get','','bbs_post','pid='.$pv['tid']);
						$html .=		  htmlspecialchars($tidname[0]['subject']);
								
							
							
					$html .=		'</a></h2>
								
                           <div id="original_content_'.$pv['authorid'].'" class="pbm c cl atcont_flwlist">'. $tidname[0]['content'].'
							
							</div>
                           	

						    <div class="xg1 cl">
								<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$pv['id'].')">回复&nbsp; </a></span></div>
                            </div>';
							 }
                	$html .=	'</div>';
						}
                   $html .='    <div class="cr"></div>
					
                
                	</div>
				<input type="hidden" value="" id="loid">	';
					
					
					
					
				$html .='	<div id="load11" style="display:none"></div>			
					
					<div style="display:none" class="flw_replybox cl" id="relaybox_'.$pv['id'].'"><span style="margin: -23px 135px 0 0;" class="cnr"></span>
<form onsubmit="return ajaxpost2(this.id, \''.'return_qrelay_12918932'.'\');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">
<input type="hidden" value="true" name="relaysubmit">
<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
<input type="hidden" value="3554c853" name="formhash">
<input type="hidden" value="5313176" name="tid">
<input type="hidden" value="qrelay_12918932" name="handlekey">
            <span class="flw_autopt">
            	<textarea onkeyup="strLenCalc(this, \''.'checklen5313176'.'\', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea>
            </span>
            
            <div style=" margin:30px 0px;">

<div style="float:left; width:400px;" class="mtm sec identifying_code">
<input type="hidden" value="SAyd29av0" name="sechash">

验证码 <span onclick="showMenu({ \''.'ctrlid'.'\':this.id,\''.'win'.'\':\''.'qrelay_12918932'.'\'})" id="seccodeSAyd29av0"><input type="text" tabindex="1" onblur="checksec(\''.'code'.'\', \''.'SAyd29av0'.'\')" class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0'.$pv['id'].'" name="seccodeverify">';

           
		   
		$html .=  ' <span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\')"></span>
        
<a class="xi2" onclick="updateseccode5( \''.'SAyd29av0'.'\', \''.'follow_rebroadcast'.'\');doane(event);" href="javascript:;">换一个</a>
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5( \''.'SAyd29av0'.'\', \''.'follow_rebroadcast'.'\');</script>
</div>
</div>                          
                <button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button>
            	<label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>         
                <div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div><div class="cr"></div>
            </div>
<div id="return_qrelay_12918932"></div>
</form>

<div class="cl closebar_replybox" onclick="quickrelay2('.$pv['id'].')">
<a class="y xg1" onclick="display(\''.'relaybox_12918932'.'\')" href="javascript:;"></a>
</div>';



   $html .=  '</div>
					<div style="display:none" class="flw_replybox cl" id="replybox_'.$pv['id'].'"><span class="cnr"></span>
<form class="mbm" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id, \''.'return_qreply_12918932'.'\', \''.'return_qreply_12918932'.'\', \''.'onerror'.'\');return false;" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
<input type="hidden" value="3554c853" id="formhash" name="formhash">
<input type="hidden" value="qreply_12918932" name="handlekey">
<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>

    <span class="flw_autopt">
    	<textarea rows="4" cols="80" class="pts" id="postmessage_'.$pv['id'].'" name="message"></textarea>
    </span>
    <div style="margin:30px 0px;">
        <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit'.$pv['id'].'" style="float:right; margin-left:20px;" type="submit" onclick="insert('.$pv['id'].','.$pv['tid'].')"><span>回复</span></button>
        <div class="cr"></div>
    </div>
    
<div class="mtm">
<input type="hidden" value="SAyd29av0" name="sechash">';


             $html .=     
				  '<ul><li><em class="d">验证码</em><span><input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01'.$pv['id'].'" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" onclick="updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\')"></span>
        
<a class="xi2" onclick="refreshCc('.$pv['id'].')" href="javascript:;">换一个</a>
<img id="checkCodeImg1'.$pv['id'].'" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc('.$pv['id'].')">
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\');</script>
</div></li></ul>
</div>
</form>
<ul class="list_replybox" id="newreply_5313176_12918932">';

			if($pv['classid'] == 0 ){
			
			 $name = DS('publics._get','','bbs_postcomment',"comment != '' and tid=".$pv['tid'] .' order by dateline desc limit 0,5');
			 foreach($name as $kk22 => $vv22 ){
			$html .=  	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.htmlspecialchars($vv22['comment']).'</li>';
		 }
			 }else{
				 $name2 = DS('publics._get','','bbs_postcomment',"rpid ='".$pv['id']."' order by dateline desc limit 0,5");	
				  foreach($name2 as $kk22 =>$vv22 ){ 
			$html .=	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.htmlspecialchars($vv22['comment']).'</li>';
			 }
		 }	
					
					
					
					
			$html .='		</ul>
<div class="cl closebar_replybox">
<a title="关闭" class="y xg1" onclick="quickreply2('.$pv['id'].')" href="javascript:;"></a>';

 if($pv['classid'] == 0 and $kk22 == 4){
	$html .=	'<a class="xi2" target="_blank" href="'.URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'">去论坛查看所有回复<em class="arrow_2"> </em></a>';
 }
	$html .= '</div>';
	
	
	
	           $html .=         ' </div>   
					<div id="replybox_12245973" class="flw_replybox cl" style="display: none;"></div>
					<div id="relaybox_12245973" class="flw_replybox cl" style="display: none;"></div>

				</div>
 			</li>';
         
					
						
					
							}
							}
							echo $html;
							}
							
							
function lorderlist3(){
			 $id = V('r:id')==NULL?$_SESSION['u_uidss']:V('r:id'); 
			 //$con=DS('publics._get','','bbs_postcomment', "authorid =$id  and comment != '' and tid != 0 and rpid = 0 order by dateline desc limit ".(int)V('r:num').",6");
			 //$newstrss = V('r:newlist');comment != '' and rpid=0 and tid != 0 
			$re2 = DS('publics._get','','bbs_postcomment',"comment != ''  and rpid=0 and tid != 0 or poststatus = 1  ORDER BY dateline desc limit ".(int)V('r:num').",6"); 
			 //var_dump($con);//echo $id;
			 
						foreach($re2 as $pk => $pv){
							if(!empty($pv)){
								$re4 = DS('publics.get_info','','users',"id='".$pv['authorid']."'");
								$html .=  
							'<div id="pid'.$pv['id'].'" style="display:none">'.$pv['pid'].'</div>
			<li class="cl" name = "lili" id="feed_li_'.$pv['authorid'].'" onmouseover="this.className=\''.'flw_feed_hover cl'.'\'" onmouseout="this.className=\''.'cl'.'\'">
            	<div class="feed_li_box" >
                	<div class="z flw_avt">
                    	<a class="avatar" id="stickthread_'.$pv['id'].'" onmouseover="wzxx('.$pv['id'].','.$pv['authorid'].')">';
                        
							//判断关注好友是否设置头像
                        	if(!empty($re4[0]['head_img'])){
						
                       $html .= ' <img src="'.$re4[0]['head_img'] .'"isdrift="true"><span class="shadowbox_avatar"> </span></a>';
                       
							}else{
						
                        $html .= ' <img src="images/w100h100.jpg" isdrift="true"/><span class="shadowbox_avatar"> </span></a>';
                       
							} 
						
    				$html .= '<span class="cnr"></span>
    				</div>       
					<div class="flw_article" style=" " >
                		<div class="flw_author"> ';
						
						if(date('Y',time()) != date('Y',(int)$pv['dateline'])){
								$times =  date('Y',time()) - date('Y',(int)$pv['dateline']).'年前';
							}else if(date('m',time()) != date('m',(int)$pv['dateline'])){
								$times =  date('m',time()) - date('m',(int)$pv['dateline']).'个月前';
							}else if(date('d',(int)$pv['dateline']) != date('d',time())){
								$times =  date('d',time()) - date('d',(int)$pv['dateline']).'天前';
							}else if(date('H',(int)$pv['dateline']) != date('H',time())){
								$times =  date('H',time()) - date('H',(int)$pv['dateline']).'小时前';
							}else if(date('i',(int)$pv['dateline']) != date('i',time())){
								$times =  date('i',time()) - date('i',(int)$pv['dateline']).'分钟前';
							}else if(date('s',(int)$pv['dateline']) != date('s',time())){
								$times =  date('s',time()) - date('s',(int)$pv['dateline']).'秒前';
							}else {
								$times =  '刚刚';
							}
						
					$html .=	'<a class="name_feedlist" href="'.URL('bbsUser.user_broadcast',"&id=".$pv['authorid']."").'">'.$re4[0]['username'].'&nbsp;&nbsp;</a> 发表于 <span title="'.date('Y-m-d H:i:s',$pv['dateline']).'">'.$times;
																
						
						$html .=	'</span>&nbsp;&nbsp; <a href="'.URL('bbs.thread','&fid='.$pv['pid']).'">';
								
								
								 $name = DS('publics._get','','bbs_forum','fid='.$pv['pid']);
								 if($name[0]['name'] != NULL){
							$html .='#';
								$html .=  $name[0]['name'];
								 };
								
							
						$html .='	</a>
                    	</div>';
						
						if($pv['poststatus'] == 1){
							
							   $postsubs = DS('publics._get','','bbs_post','pid='.$pv['tid']);	
								$html .='		<h2 class="wx pbn">
                                    <a target="_blank" href="'.URL('bbs.thread_detail','&fid='.$pv['pid'].'&tid='.$pv['tid']).'">'.htmlspecialchars($postsubs[0]['subject']).'</a>
                                            </h2>
										<div id="original_content_15632896" class="pbm c cl atcont_flwlist">
                       						'.$postsubs[0]['content'].'	
                                        </div>
										<div class="xg1 cl">
												<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$pv['id'].')">回复&nbsp; </a></span>
												</div>
                            				</div>';
							}else{
						
						
					$html .=	'<div class="flw_quotenote xs2 pbw">';
						 if($pv['classid'] == 1){
					$html .= '<div id="original_content_15038108" class="pbm c cl">'.$pv['comment'].'</div>';
							 }else{ 
							 
					$html .=	'<a href="'.URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'" target="_blank" > '
						. htmlspecialchars($pv['comment']).'<br /></a></div>';
						 }
						
						 if($pv['classid'] == 1){
						$html .= '<div class="xg1 cl">
							<div class="y flw_btnbar">
							<span class="y"> 
							<a onclick="quickreply1('.$pv['id'].',2)" href="javascript:;">回复&nbsp; </a>
							</span>
							</div>
                    	</div>';
						 }else{
					$html .=	'<div class="flw_quote guide_list_replay">
							<div class="arrow_guidelist"></div>
						
                         	
							
							   <h2 class="wx pbn"><a href="'. URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'" target="_blank">';
								 $tidname = DS('publics._get','','bbs_post','pid='.$pv['tid']);
								 $html .=htmlspecialchars($tidname[0]['subject']);
								
							
							
					$html .=		'</a></h2>
								
                           <div id="original_content_'.$pv['authorid'].'" class="pbm c cl atcont_flwlist">'. $tidname[0]['content'].'
							
							</div>
                           	

						    <div class="xg1 cl">
								<div class="y flw_btnbar"><span class="y"><a href="javascript:;" onclick="quickreply1('.$pv['id'].')">回复&nbsp; </a></span></div>
                            </div>';
							 }
                	$html .=	'</div>';
						}
                   $html .='<div class="cr"></div>
					
                
                	</div>
				<input type="hidden" value="" id="loid">	';
					
					
					
					
				$html .='	<div id="load11" style="display:none"></div>			
					
					<div style="display:none" class="flw_replybox cl" id="relaybox_'.$pv['id'].'"><span style="margin: -23px 135px 0 0;" class="cnr"></span>
<form onsubmit="return ajaxpost2(this.id, \''.'return_qrelay_12918932'.'\');" action="home.php?mod=spacecp&amp;ac=follow&amp;op=relay&amp;tid=5313176" id="postform_5313176" autocomplete="off" method="post">
<input type="hidden" value="true" name="relaysubmit">
<input type="hidden" value="http://bbs.meizu.cn/home.php?mod=follow" name="referer">
<input type="hidden" value="3554c853" name="formhash">
<input type="hidden" value="5313176" name="tid">
<input type="hidden" value="qrelay_12918932" name="handlekey">
            <span class="flw_autopt">
            	<textarea onkeyup="strLenCalc(this, \''.'checklen5313176'.'\', 140);" rows="4" cols="80" class="pts" name="note" id="note_5313176"></textarea>
            </span>
            
            <div style=" margin:30px 0px;">

<div style="float:left; width:400px;" class="mtm sec identifying_code">
<input type="hidden" value="SAyd29av0" name="sechash">

验证码 <span onclick="showMenu({ \''.'ctrlid'.'\':this.id,\''.'win'.'\':\''.'qrelay_12918932'.'\'})" id="seccodeSAyd29av0"><input type="text" tabindex="1" onblur="checksec(\''.'code'.'\', \''.'SAyd29av0'.'\')" class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av0'.$pv['id'].'" name="seccodeverify">';

           
		   
		$html .=  ' <span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=22881&amp;idhash=SAyd29av0" onclick="updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\')"></span>
        
<a class="xi2" onclick="updateseccode5( \''.'SAyd29av0'.'\', \''.'follow_rebroadcast'.'\');doane(event);" href="javascript:;">换一个</a>
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none;height:0px; width:0px; border-width:0px;" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5( \''.'SAyd29av0'.'\', \''.'follow_rebroadcast'.'\');</script>
</div>
</div>                          
                <button tabindex="23" value="true" class="pn pnc" id="relaysubmit_btn" name="relaysubmit_btn" type="submit" style="float:right; margin-left:20px;"><span>转播</span></button>
            	<label style="margin-top:8px;" class="y wrap_simcheck checked_simcheck"><span class="box_simcheck"></span><input type="checkbox" checked="checked" value="1" class="pc" name="addnewreply">同时回复</label>         
                <div style="float:right;  margin:8px 20px 0 0;">还能输入<span class="xg1" id="checklen5313176">140</span>字</div><div class="cr"></div>
            </div>
<div id="return_qrelay_12918932"></div>
</form>

<div class="cl closebar_replybox" onclick="quickrelay2('.$pv['id'].')">
<a class="y xg1" onclick="display(\''.'relaybox_12918932'.'\')" href="javascript:;"></a>
</div>';



   $html .=  '</div>
					<div style="display:none" class="flw_replybox cl" id="replybox_'.$pv['id'].'"><span class="cnr"></span>
<form class="mbm" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost(this.id, \''.'return_qreply_12918932'.'\', \''.'return_qreply_12918932'.'\', \''.'onerror'.'\');return false;" action="forum.php?mod=post&amp;action=reply&amp;fid=22&amp;extra=&amp;tid=5313176&amp;replysubmit=yes" id="postform_12918932" autocomplete="off" method="post">
<input type="hidden" value="3554c853" id="formhash" name="formhash">
<input type="hidden" value="qreply_12918932" name="handlekey">
<span style="display: none;" id="subjectbox"><input style="width: 25em" tabindex="21" value="" class="px" id="subject" name="subject"></span>

    <span class="flw_autopt">
    	<textarea rows="4" cols="80" class="pts" id="postmessage_'.$pv['id'].'" name="message"></textarea>
    </span>
    <div style="margin:30px 0px;">
        <button tabindex="23" name="" value="true" class="pn pnc" id="postsubmit'.$pv['id'].'" style="float:right; margin-left:20px;" type="submit" onclick="insert('.$pv['id'].','.$pv['tid'].')"><span>回复</span></button>
        <div class="cr"></div>
    </div>
    
<div class="mtm">
<input type="hidden" value="SAyd29av0" name="sechash">';


             $html .=     
				  '<ul><li><em class="d">验证码</em><span><input type="text" tabindex="1"  class="txt px vm" style="ime-mode:disabled;width:100px" autocomplete="off" id="seccodeverify_SAyd29av01'.$pv['id'].'" name="seccodeverify">
        
<span class="seccode_image" id="seccode_SAyd29av0_secshow"><img width="150" height="60" alt="" class="vm" src="misc.php?mod=seccode&amp;update=76004&amp;idhash=SAyd29av0" onclick="updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\')"></span>
        
<a class="xi2" onclick="refreshCc('.$pv['id'].')" href="javascript:;">换一个</a>
<img id="checkCodeImg1'.$pv['id'].'" src="/code/vdimgck.php" width="68" height="24" class="yz" onclick="refreshCc('.$pv['id'].')">
<span class="seccheck_status" id="checkseccodeverify_SAyd29av0"><img width="16" height="16" class="vm" src="http://bbs.res.meizu.com/resources/php/bbs/static/image/common/none.gif"></span>
</span><div style="display:none" class="p_pop p_opt" id="seccodeSAyd29av0_menu"><span id="seccode_SAyd29av0" style="display: none;"></span>      
<script reload="1" type="text/javascript">updateseccode5(\''.'SAyd29av0'.'\',\''.'follow_rebroadcast'.'\');</script>
</div></li></ul>
</div>
</form>
<ul class="list_replybox" id="newreply_5313176_12918932">';

			if($pv['classid'] == 0 ){
			
			 $name = DS('publics._get','','bbs_postcomment',"comment != '' and tid=".$pv['tid'] .' order by dateline desc limit 0,5');
			 foreach($name as $kk22 => $vv22 ){
			$html .=  	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.htmlspecialchars($vv22['comment']).'</li>';
		 }
			 }else{
				 $name2 = DS('publics._get','','bbs_postcomment',"rpid ='".$pv['id']."' order by dateline desc limit 0,5");	
				  foreach($name2 as $kk22 =>$vv22 ){ 
			$html .=	'<li><a class="d xi2" href="'. URL('bbsUser.user_broadcast',"&id=".$vv22['authorid']."").'">'.$vv22['author'].'&nbsp;&nbsp;</a>'.htmlspecialchars($vv22['comment']).'</li>';
			 }
		 }	
					
					
					
					
			$html .='		</ul>
<div class="cl closebar_replybox">
<a title="关闭" class="y xg1" onclick="quickreply2('.$pv['id'].')" href="javascript:;"></a>';

 if($pv['classid'] == 0 and $kk22 == 4){
	$html .=	'<a class="xi2" target="_blank" href="'.URL('bbs.thread_detail','&fid='.$pv['pid']."&tid=".$pv['tid']."").'">去论坛查看所有回复<em class="arrow_2"> </em></a>';
 }
	$html .= '</div>';
	
	
	
	           $html .=         ' </div>   
					<div id="replybox_12245973" class="flw_replybox cl" style="display: none;"></div>
					<div id="relaybox_12245973" class="flw_replybox cl" style="display: none;"></div>

				</div>
 			</li>';
         
					
						
					
							}
							}
							echo $html;
							}
	function delwiodow(){
			$decode = json_decode(V('r:json'),true);		
			$data['userid']  	= $_SESSION['u_uidss']; 
			$data['informationid']  =  $decode['user'];
			$data['status']  =  1;
			DS('publics._save',3,$data,'informationshow'); 
			echo  1;
		
	}	
	function space(){
		TPL :: display('bbs/space');
		
	}
	function tianxdel(){
		
		DS('publics._del',3,'remind','id='.V('r:id'));
		echo  1;
	}			
	function sfst(){
		
		$isread = DS('publics._get','','remind','followid='.$_SESSION['YLTTX_UID'] .' and is_read = 0 and is_read = 0');
		if($isread != NULL){
			echo 1;
		}else{
			echo 2;	
		}	
	}	
	function readyes(){
		
		DS('publics.date1','','remind',"is_read  =	1","followid = '".$_SESSION['YLTTX_UID']."'");	
	}
	function shownow(){
		
		DS('publics.date1','','remind',"is_show  =	1","followid = '".$_SESSION['YLTTX_UID']."'");	
	}		
	function lczda(){
		$alls2=DS('publics.get_total','','bbs_postcomment', "rpid=0 and tid='".V('r:tid')."' and comment != '' and id <= '".V('r:lcid')."'"); 
		$page = ceil($alls2/10);
		if($page == 0){
			$page = 1;
			}
		echo "<script> location.href='".URL('bbs.thread_detail','&tid='.V('r:tid').'&fid='.V('r:fid').'&page='.$page.'#'.V('r:lcid'))."' </script>";	
	}		
	function showappenda(){
		 $ss = DS('publics._get','','users','id ='.V('r:authorid'));	
		 $all1=DS('publics.get_total','','bbs_post', "authorid ='".V('r:authorid')."'"); 
		 $all2=DS('publics.get_total','','user_follow', "uid = '".V('r:authorid')."'"); 
		 $all3=DS('publics.get_total','','user_follow', "followuid = '".V('r:authorid')."'"); 
		 $ssyou = DS('publics._get','','user_follow','followuid='.V('r:authorid') . ' and uid = '.$_SESSION['u_uidss'] );	
		$html .='<div style="display: none;" class="space_card_user_box" id="space_card_new_'.V("r:id").'"><div class="card_new">
<div class="head_avatar avatar">';

    $html .=	'<a target="_blank" href="'.URL('bbsUser.user_broadcast','&id='.V('r:authorid')).'">
	<img src="';
	if($ss[0]['logo']==NULL){
		 $html .='images/course_conimg_27.png';
		}else{
		 $html .=	$ss[0]['logo'];
		}
	
	
 $html .='"></a>
</div>';
   $html .= ' <div class="user_info">
    	<div class="user_name"><a target="_blank" href="'.URL('bbsUser.user_broadcast','&id='.V('r:authorid')).'">'.$ss[0]['realname'].'</a></div>
        <div class="sightml">
         </div>
        <div class="user_info_r">
        	<div class="r">
            	<span>帖子</span> <span class="in">'.$all1.'</span>
            </div>
            <div class="r rmargin">
            	<span>收听</span> <span class="in stnmnm'.V('r:authorid').'">'.$all2.'</span>
            </div>
            <div class="r rmargin">
            	<span>听众</span> <span class="in tznmnm'.V('r:authorid').'">'.$all3.'</span>
            </div>
            <div class="cr"></div>
        </div>
        <div>';
        	
		
		$html .=  '<a  style="display:';
		if($ssyou==NULL){
			$html .='';
		}else{
			$html .='none';
			}
		if($_SESSION['u_uidss'] != 	NULL){	
		$html .='"  class="follow_la card_followmod_11'.V('r:authorid').'" onclick="styh('.V('r:id').','.V('r:authorid').')" id="card_followmod_11'.V('r:authorid').'" href="javascript:;">收听TA</a>';
		
		$html .= '<a  style="display:';
		if($ssyou != NULL){
			$html .='';
		}else{
			$html .='none';
			}
		$html .= '"  class="follow_lb card_followmod_22'.V('r:authorid').'" onclick="qxstyh('.V('r:id').','.V('r:authorid').')" id="card_followmod_22'.V('r:authorid').'" href="javascript:;">取消收听</a>';
		}else{
			$html .='"  class="follow_la card_followmod_11'.V('r:authorid').'" onclick="showPop()" id="card_followmod_11'.V('r:authorid').'" href="javascript:;">收听TA</a>';
			}
		
      $html .= ' </div>
    </div>
    <div class="cr"></div>
</div></div>';


	echo $html;
	}
				
	
	function showshow(){
		
		TPL :: display('bbs/showshow');
		}
function is_read1(){
		 if(V('r:followuid') == $_SESSION['u_uidss']){
	$id1a =  V('r:uid');
	}else{	
	$id1a =  V('r:followuid');	}
	
 if(V('r:uid') == $_SESSION['u_uidss']){
	$id1b =  V('r:followuid');
	}else{	
	$id1b =  V('r:uid');	}	
	
 DS('publics.date1','','user_msgs',"is_read  =	1","followuid = '".$_SESSION['u_uidss']."' and uid = '".$id1b."'");
		}	
function delmsg(){
	if(V('r:followuid') == $_SESSION['u_uidss']){
	$id1a =  V('r:uid');
	}else{	
	$id1a =  V('r:followuid');	}
	
 if(V('r:uid') == $_SESSION['u_uidss']){
	$id1b =  V('r:followuid');
	}else{	
	$id1b =  V('r:uid');	}	
	
	
$sa2 = DS('publics._get','','user_msgs',"uid = '".$_SESSION['u_uidss']."' and followuid = '".$id1a."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$id1b."'");

			foreach($sa2 as $k=>$v){
				if($v['is_de1'] != 0 ){
						$ss22 = $v['is_de1'];	
					}
				}
	
	if($ss22 == $_SESSION['u_uidss'] or $ss22 == NULL){
		
	   DS('publics.date1','','user_msgs',"is_de1  =	'".$_SESSION['u_uidss']."'","uid = '".$_SESSION['u_uidss']."' and followuid = '".$id1a."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$id1b."'");	
	}else{
		DS('publics.date1','','user_msgs',"is_de12 =	'".$_SESSION['u_uidss']."'","uid = '".$_SESSION['u_uidss']."' and followuid = '".$id1a."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$id1b."'");
		}
	
	
	
		}	
		
	function de(){
			$ss =explode(",",V('r:id'));
			foreach($ss as $k=>$v1){
		$sa2 = DS('publics._get','','user_msgs',"uid = '".$_SESSION['u_uidss']."' and followuid = '".$v1."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$v1."'");	
			foreach($sa2 as $k=>$v){
				if($v['is_de1'] != 0 ){
						$ss22 = $v['is_de1'];	
					}
				}
				var_dump($ss22);
		if($ss22 == $_SESSION['u_uidss'] or $ss22 == NULL){
		
	   DS('publics.date1','','user_msgs',"is_de1  =	'".$_SESSION['u_uidss']."'","uid = '".$_SESSION['u_uidss']."' and followuid = '".$v1."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$v1."'");	
	}else{
		DS('publics.date1','','user_msgs',"is_de12 =	'".$_SESSION['u_uidss']."'","uid = '".$_SESSION['u_uidss']."' and followuid = '".$v1."' or followuid = '".$_SESSION['u_uidss']."' and uid = '".$v1."'");
		}

				}	
		
			
		}	
	function dell222(){
		
		$sa2 = DS('publics._get','','user_msgs',"id = '".V('r:id')."'");	
		if($sa2[0]['is_del'] == 0){
			DS('publics.date1','','user_msgs',"is_de1  =	'".$_SESSION['u_uidss']."'","id = '".V('r:id')."'");	
			}else{
			DS('publics.date1','','user_msgs',"is_de12 =	'".$_SESSION['u_uidss']."'","id = '".V('r:id')."'");	
			}
	
		}		
	function pagebar_space(){
			$ss =explode(",",V('r:id'));
			foreach($ss as $k=>$v){
	
		
	   DS('publics.date1','','user_msgs',"is_read  =	1","followuid = '".$_SESSION['u_uidss']."' and uid = '".$v."'");
	
		}
		}
	function informations(){
		 $info = DS('publics._get','','users',"id= '".V('r:id')."'");	
		 if($info[0]['head_img'] == NULL){
			    $head = 'images/noavatar_big.gif';
			 }else{
				$head = $info[0]['head_img'];
			 }
		 echo  json_encode(array('username'=>$info[0]['username'],'head_image'=>$head));
		 
		}	
				
}
