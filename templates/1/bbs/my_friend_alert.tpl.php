<div id="append_parent"> 
    <!--修改备注窗口开始-->
    <?php
    	if(!empty($re)){
			foreach($re as $rk => $rv){
	?>
        <div id="fwin_followbkame_<?= $rv['fuid']?>" class="fwinmask" style="position: absolute; z-index: 601; left: 603px; top: 277.5px;display:none;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
    
            <table cellspacing="0" cellpadding="0" class="fwin">
                <tbody>
                    <tr>
                        <td id="fwin_content_followbkame_<?= $rv['fuid']?>" class="m_c" style="" fwin="followbkame_<?= $rv['fuid']?>">
                            <h3 class="flb" id="fctrl_followbkame_<?= $rv['fuid']?>" style="cursor: move;"><em id="return_followbkame_<?= $rv['fuid']?>" fwin="followbkame_<?= $rv['fuid']?>">为<?= $rv['fusername']?>添加备注</em><span><a title="关闭" class="flbc" onClick="hideupd(<?= $rv['fuid']?>);" href="javascript:;">关闭</a></span></h3>
                            <div class="c">
                            <table>
                                <tbody>
                                    <tr>
                                        <th width="60" valign="top" class="avt"><a href="#">
                                    <?php
										$finfo = DS('publics._get','users',"id='".$rv['fuid']."'");
                                        if(empty($finfo[0]['head_img'])){
                                    ?>
                                    <img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="images/w100h100.jpg">
                                    <?php
                                        }else{
                                    ?>
                                        <img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="<?= $finfo[0]['head_img']?>">
                                    <?php
                                        }
                                    ?>
                                    </a></th>
                                    <td valign="top">备注: <input type="text" class="px" size="35" name="bkname" id="bkname_<?= $rv['fuid']?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <p class="o pns" id="pbtm1_<?= $rv['fuid']?>"><button class="pn pnc" value="true" id="editsubmit_btn_<?= $rv['fuid']?>" name="editsubmit_btn" fwin="followbkame_<?= $rv['fuid']?>" onclick ="setupd(<?= $rv['fuid']?>)"><strong>保存</strong></button></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
<!--修改备注窗口结束-->

<!--发信息窗口开始-->
		<div id="fwin_showMsgBox_<?= $rv['fuid']?>" class="fwinmask" style="position: fixed; z-index: 601; left: auto; top: auto; right: 5px; bottom: 5px;display:none;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody>
                	<tr>
                    	<td id="fwin_content_showMsgBox" class="m_c" style="" fwin="showMsgBox">
                        	<div class="pm pm_chat">
								<h3 class="flb" id="fctrl_showMsgBox" style="cursor: move;"><span><a title="关闭" class="flbc" onClick="hideMessage(<?= $rv['fuid']?>);" href="javascript:;">关闭</a></span></h3>
								<div class="pm_tac bbda cl">
        							<div class="fll"><?= $rv['fusername']?></div>
        							<a target="_blank" class="pm_notes" href="#"><div class="pm_notes_icon"> </div>查看聊天记录<div class="cr"></div></a>
            						<a target="_blank" class="pm_space" href="#"><div class="pm_space_icon"> </div>访问好友空间<div class="cr"></div></a>
									<div class="shadebox_chat"></div>
								</div>
        						<div class="pm_avatar">
                                <?php
                                	$dd = DS('publics._get','','users',"id='".$rv['fuid']."'");
									if(empty($dd[0]['head_img'])){
								?>
                                	<img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="images/w100h100.jpg">
                                <?php
									}else{
								?>
                                	<img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="<?= $dd[0]['head_img']?>">
                                <?php
									}
								?>
                                </div>
        						<div class="c">
									<ul id="msglist" class="pmb" fwin="showMsgBox"></ul>
									<div class="pmfm">
										<div style="margin-bottom:5px" class="xi1" id="return_showMsgBox" fwin="showMsgBox"></div>
										<div class="tedt">
											<div style="display:none;" class="bar">
                                            	<div class="fpd">
													<a onClick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;" id="pmsml" title="表情" class="fsml" href="javascript:;" fwin="showMsgBox"><em></em></a>
													<a onClick="seditor_fastUpload('pm', 'img');doane(event);" class="fmg" title="图片" href="javascript:;" id="pmimg" fwin="showMsgBox"><em></em></a>
    											</div>
											</div>
											<div class="area">
												<textarea autofocus onKeyDown="ctrlEnter(event, 'pmsubmit_btn');" id="pmmessage_<?= $rv['fuid']?>" class="pt" name="message" cols="80" rows="3" fwin="showMsgBox"></textarea>
												<!--/*<input type="hidden" value="" id="messageappend" name="messageappend" fwin="showMsgBox">-->
											</div>
										</div>
										<div style="margin-top:20px;" class="mtn pns cl">
 											<button style="width:96px !important;" id="pmsubmit_btn_<?= $rv['fuid']?>" onclick="sendMsg(<?= $rv['fuid']?>)" class="pn normalbtn bluebtn" fwin="showMsgBox"><strong id = 'changeid_<?= $rv['fuid']?>'>发送</strong></button>
                                            <button style="width:96px !important; display:none;background-color:#808080;" id="bmsubmit_btn_<?= $rv['fuid']?>" class="pn normalbtn bluebtn" fwin="showMsgBox"><strong id = 'changeid_<?= $rv['fuid']?>'>发送中</strong></button>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
 				</tbody>
			</table>
		</div>
		<!--发信息窗口结束-->
        
        <!--好友分组窗口开始-->
        <div id="fwin_friend_group_<?= $rv['fuid']?>" class="fwinmask" style="position: absolute; z-index: 601; left: 639px; top: 159.5px;display:none;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody>
                	<tr>
                    	<td id="fwin_content_friend_group_<?= $rv['fuid']?>" class="m_c" style="" fwin="friend_group_<?= $rv['fuid']?>">
                        	<h3 class="flb" id="fctrl_friend_group_<?= $rv['fuid']?>" style="cursor: move;"><em id="return_friend_group_<?= $rv['fuid']?>" fwin="friend_group_<?= $rv['fuid']?>">好友分组</em><span><a title="关闭" class="flbc" onclick="hidegroup(<?= $rv['fuid']?>);" href="javascript:;">关闭</a></span></h3>
							<div class="c">
								<p style="margin-bottom:10px;">好友分组</p>
								<div id="spacecp_friend_radio" fwin="friend_group_<?= $rv['fuid']?>">
                                	<!--<label class="radiowrapper" for="radio_pway_0"><span class="radio_pway"></span><span class="text_pway">其他</span><input type="radio" style="display:none;" value="0" name="group" id="radio_pway_0"></label>-->
                                    <label class="radiowrapper" for="radio_pway_8_<?= $rv['fuid']?>"><input type="radio" value="8" name="group_<?= $rv['fuid']?>" id="radio_pway_8_<?= $rv['fuid']?>">其它</label>
                                    
									<label class="radiowrapper" for="radio_pway_1_<?= $rv['fuid']?>"><input type="radio" value="1" name="group_<?= $rv['fuid']?>" id="radio_pway_1_<?= $rv['fuid']?>">通过本站认识</label>
									<div class="cr"></div>
                                    
									<label class="radiowrapper" for="radio_pway_2_<?= $rv['fuid']?>"><input type="radio" value="2" name="group_<?= $rv['fuid']?>" id="radio_pway_2_<?= $rv['fuid']?>">通过活动认识</label>
                                   
									<label class="radiowrapper" for="radio_pway_3_<?= $rv['fuid']?>"><input type="radio" value="3" name="group_<?= $rv['fuid']?>" id="radio_pway_3_<?= $rv['fuid']?>">通过朋友认识</label>
                                    
									<div class="cr"></div>
									<label class="radiowrapper" for="radio_pway_4_<?= $rv['fuid']?>"><input type="radio" value="4" name="group_<?= $rv['fuid']?>" id="radio_pway_4_<?= $rv['fuid']?>">亲人</label>
                                   
									<label class="radiowrapper" for="radio_pway_5_<?= $rv['fuid']?>"><input type="radio" value="5" name="group_<?= $rv['fuid']?>" id="radio_pway_5_<?= $rv['fuid']?>">同事</label>
									<div class="cr"></div>
                                    
									<label class="radiowrapper" for="radio_pway_6_<?= $rv['fuid']?>"><input type="radio" value="6" name="group_<?= $rv['fuid']?>" id="radio_pway_6_<?= $rv['fuid']?>">同学</label>
                                    
									<label class="radiowrapper" for="radio_pway_7_<?= $rv['fuid']?>"><input type="radio" value="7" name="group_<?= $rv['fuid']?>" id="radio_pway_7_<?= $rv['fuid']?>">不认识</label>
                              
									<div class="cr"></div><div></div>
									<p class="o pns btnbar_fwin_l"><a class="normalbtn bluebtn"><button value="true" name="changegroupsubmit_btn" class="" onclick="selectgroup(<?= $rv['fuid']?>)"><strong>确定</strong></button></a></p>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	<!--好友分组窗口结束-->
    
    <!--打招呼窗口开始-->
    	<div id="fwin_a_poke_<?= $rv['fuid']?>" class="fwinmask" style="position: absolute; z-index: 601; left: 616px; top: 126px;display:none;" initialized="true"><style type="text/css">object{visibility:hidden;}</style>
        	<table cellspacing="0" cellpadding="0" class="fwin">
            	<tbody>
                	<tr>
                    	<td id="fwin_content_a_poke_<?= $rv['fuid']?>" class="m_c" style="" fwin="a_poke_<?= $rv['fuid']?>">
                            <h3 class="flb" id="fctrl_a_poke_<?= $rv['fuid']?>" style="cursor: move;"><em id="return_a_poke_<?= $rv['fuid']?>" fwin="a_poke_<?= $rv['fuid']?>">打个招呼</em><span><a title="关闭" class="flbc" onclick="hideapoke(<?= $rv['fuid']?>);" href="javascript:;">关闭</a></span></h3>
                                <div class="c altw">
                                    <div class="mbm xs2">
                                        <a class="avt avts" href="#">
                                    <?php
										$fuser = DS('publics._get','','users',"id='".$rv['fuid']."'");
                                        if(!empty($fuser[0]['head_img'])){
                                    ?>
                                            <img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="<?= $fuser[0]['head_img']?>">
                                    <?php
                                        }else{
                                    ?>
                                            <img onerror="this.onerror=null;this.src='images/noavatar_big.gif'" src="images/w100h100.jpg">
                                    <?php
                                        }
                                    ?>
                                        </a>向 <strong><?= $rv['fusername']?></strong> 打个招呼:
                                    </div>
                                    <ul class="poke cl">
                                        <li><label for="poke_0"><input type="radio" value="0" id="poke_0" name="iconid" fwin="a_poke_<?= $rv['fuid']?>" class="">不用动作</label></li>
                                        <li><label for="poke_1"><input type="radio" value="1" id="poke_1" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/cyx.gif" alt="cyx"> 踩一下</label></li>
                                        <li><label for="poke_2"><input type="radio" value="2" id="poke_2" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/wgs.gif" alt="wgs"> 握个手</label></li>
                                        <li><label for="poke_3"><input type="radio" checked="checked" value="3" id="poke_3" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/wx.gif" alt="wx"> 微笑</label></li>
                                        <li><label for="poke_4"><input type="radio" value="4" id="poke_4" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/jy.gif" alt="jy"> 加油</label></li>
                                        <li><label for="poke_5"><input type="radio" value="5" id="poke_5" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/pmy.gif" alt="pmy"> 抛媚眼</label></li>
                                        <li><label for="poke_6"><input type="radio" value="6" id="poke_6" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/yb.gif" alt="yb"> 拥抱</label></li>
                                        <li><label for="poke_7"><input type="radio" value="7" id="poke_7" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/fw.gif" alt="fw"> 飞吻</label></li>
                                        <li><label for="poke_8"><input type="radio" value="8" id="poke_8" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/nyy.gif" alt="nyy"> 挠痒痒</label></li>
                                        <li><label for="poke_9"><input type="radio" value="9" id="poke_9" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/gyq.gif" alt="gyq"> 给一拳</label></li>
                                        <li><label for="poke_10"><input type="radio" value="10" id="poke_10" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/dyx.gif" alt="dyx"> 电一下</label></li>
                                        <li><label for="poke_11"><input type="radio" value="11" id="poke_11" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/yw.gif" alt="yw"> 依偎</label></li>
                                        <li><label for="poke_12"><input type="radio" value="12" id="poke_12" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/ppjb.gif" alt="ppjb"> 拍拍肩膀</label></li>
                                        <li><label for="poke_13"><input type="radio" value="13" id="poke_13" name="iconid" fwin="a_poke_<?= $rv['fuid']?>"><img class="vm" src="images/yyk.gif" alt="yyk"> 咬一口</label></li>
                                    </ul>
                                    <input type="text" class="input_w_316" onkeydown="ctrlEnter(event, 'pokesubmit_btn', 1);" size="30" id="note_<?= $rv['fuid']?>" name="note" fwin="a_poke_<?= $rv['fuid']?>"><p class="mbm xg1">内容为可选，并且会覆盖之前的招呼，最多150个字符</p>
                                </div>
                                <p class="o pns btnbar_fwin_l" id="s_<?= $rv['fuid']?>"><span class="normalbtn bluebtn">
                                	<button class="pn pnc" value="true" id="pokesubmit_btn_<?= $rv['fuid']?>" name="pokesubmit_btn" type="submit" fwin="a_poke_<?= $rv['fuid']?>" onclick="sendapoke(<?= $rv['fuid']?>)"><strong>发送</strong></button>
                                    </span></p>
                                    <p class="o pns btnbar_fwin_l" style="display:none;" id="ss_<?= $rv['fuid']?>"><span class="normalbtn bluebtn">
                                	<button class="pn pnc" value="true" id="pokesubmit_btn_<?= $rv['fuid']?>" style="background-color:#808080;" name="pokesubmit_btn" type="submit" fwin="a_poke_<?= $rv['fuid']?>" ><strong>发送中...</strong></button>
                                </span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
       	</div>
    <!--打招呼窗口结束-->

	<script>
	//更改好友备注
		function setupd(id){
			var name = document.getElementById('bkname_'+id).value;
			//alert(id);
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					if(xmlhttp.responseText == "更改成功"){
						//alert(xmlhttp.responseText);	
						window.location.href = "<?= URL('bbsUser.my_friend')?>";
					}else{
						alert(xmlhttp.responseText);	
					}	
				}
			}
			xmlhttp.open("GET","<?= URL('bbsUser.updBKFname',"fid=")?>"+id+'&name='+name,true);	
			xmlhttp.send();
		}
		
	//发送信息
		function sendMsg(id){
			//alert(id)
			var msg = document.getElementById('pmmessage_'+id).value;
			document.getElementById('bmsubmit_btn_'+id).style.display = "";
			document.getElementById('pmsubmit_btn_'+id).style.display = "none";
			//alert(msg);
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					if(xmlhttp.responseText == "发送成功"){
						document.location.href = "<?= URL('bbsUser.my_friend')?>";
					}else{
						alert(xmlhttp.responseText);
						document.getElementById('pmsubmit_btn_'+id).style.display = "";
						document.getElementById('bmsubmit_btn_'+id).style.display = "none";
					}
				}
			}
			xmlhttp.open("GET","<?= URL('bbsUser.send_msg_finish',"username=".$rv['fusername']."&message=")?>"+msg+"&fid="+id,true);
			xmlhttp.send();	
		}
		
	//打招呼
		function sendapoke(id){
			//alert(id);
			note = document.getElementById('note_'+id).value;
			//alert(note);
			document.getElementById('s_'+id).style.display = "none";
			document.getElementById('ss_'+id).style.display = "";
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					if(xmlhttp.responseText == "挑逗成功"){
						document.location.href = "<?= URL('bbsUser.my_friend')?>";	
					}else{
						alert(xmlhttp.responseText);
						document.getElementById('ss_'+id).style.display = "none";
						document.getElementById('s_'+id).style.display = "";	
					}
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.send_a_poke',"fid=")?>"+id+"&note="+note,true);
			xmlhttp.send();
		}
		
	//更改分组
		function selectgroup(id){ 
			var value1="";
  			var radio=document.getElementsByName("group_"+id);
  			for(var i=0;i<radio.length;i++){
				if(radio[i].checked==true){
	  				value1=radio[i].value;
	  				break;
				}
  			}
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();	
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						if(xmlhttp.responseText == 1){
							window.location.href = "<?= URL('bbsUser.my_friend')?>";	
						}else{
							alert(xmlhttp.responseText);	
						}
				}	
			}
			xmlhttp.open("GET","<?= URL('bbsUser.setgroup',"fid=")?>"+id+"&groupid="+value1,true); 
			xmlhttp.send();
		}
    </script>
	<?php
			}
		}
		
	?>
	</div>