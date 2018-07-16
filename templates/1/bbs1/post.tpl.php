
<div class="bm bw0 cl editorbox_post">
	<ul class="tb cl mbw tab_editorbox"><li class="a"><a href="javascript:;" onclick="switchpost('forum.php?mod=post&action=newthread&sortid=154')">发表贴子</a></li></ul>
	<div id="draftlist_menu" style="display:none">
		<ul class="xl xl1"><li class="xi2"><a href="forum.php?mod=guide&amp;view=my&amp;type=thread&amp;filter=save&amp;fid=0" target="_blank">查看所有草稿</a></li></ul>
	</div>
	<div id="postbox">
		<div class="pbt cl">
			<input type="hidden" name="sortid" value="154" />
			<input type="hidden" name="con" value="" id="con"/>
			<div class="z">
				<span>帖子标题：<input type="text" name="subject" id="subject"  class="input_style3" value="" onblur="if($('tags')){relatekw('-1','-1');doane();}" onkeyup="strLenCalc(this, 'checklen', 80);" tabindex="1" /></span>
				
			</div>
		</div>
		<div id="attachnotice_attach" class="tbms mbm xl" style="display:none">您有 
			<span id="unusednum_attach"></span> 个未使用的附件 &nbsp; <a href="javascript:;" class="xi2" onclick="attachoption('attach', 2);" />查看</a>
			<span class="pipe">|</span><a href="javascript:;" class="xi2" onclick="attachoption('attach', 1)">使用</a>
			<span class="pipe">|</span><a href="javascript:;" class="xi2" onclick="attachoption('attach', 0)">删除</a>
			<div id="unusedlist_attach" style="display:none"></div>
		</div>
		<div id="attachnotice_img" class="tbms mbm xl" style="display:none">您有 
			<span id="unusednum_img"></span> 个未使用的图片 &nbsp; <a href="javascript:;" class="xi2" onclick="attachoption('img', 2);" />查看</a>
			<span class="pipe">|</span><a href="javascript:;" class="xi2" onclick="attachoption('img', 1)">使用</a>
			<span class="pipe">|</span><a href="javascript:;" class="xi2" onclick="attachoption('img', 0)">删除</a>
			<div id="unusedlist_img" style="display:none"></div>
		</div>
		<div class="exfm cl form_postbox input_w_141">	
			<input type="hidden" name="selectsortid" size="45" value="154" />
			<?php /*?><table cellspacing="0" cellpadding="0" class="tfm">
				<tr><th class="ptm pbm bbda"><span class="rq">*</span>论坛ID</th><td class="ptm pbm bbda"><div id="select_bbs_id"><input type="text" name="typeoptionbbs_id" id="typeoption_bbs_id" class="px" tabindex="1" size="20" onBlur="checkoption('bbs_id', '1', 'text', '0', '0', '30')" value="" 0 /></div><div class="d">最大长度 30&nbsp;</div></td><td class="ptm pbm bbda" width="180"><span id="checkbbs_id"></span></td></tr>
				<tr><th class="ptm pbm bbda"><span class="rq">*</span>魅族年龄</th><td class="ptm pbm bbda"><div id="select_bbs_age"><input type="text" name="typeoptionbbs_age" id="typeoption_bbs_age" class="px" tabindex="1" size="" onBlur="checkoption('bbs_age', '1', 'number', '0', '0')" value="" 0 /></div><div class="d">介绍下你认识魅族多少年了吧</div></td><td class="ptm pbm bbda" width="180"><span id="checkbbs_age"></span></td></tr>
				<tr><th class="ptm pbm bbda"><span class="rq">*</span>魅族产品</th><td class="ptm pbm bbda"><div id="select_mz_pd"><input type="text" name="typeoptionmz_pd" id="typeoption_mz_pd" class="px" tabindex="1" size="" onBlur="checkoption('mz_pd', '1', 'text', '0', '0')" value="" 0 /></div></td><td class="ptm pbm bbda" width="180"><span id="checkmz_pd"></span></td></tr>
				<tr><th class="ptm pbm bbda"><span class="rq">*</span>魅族宣言</th><td class="ptm pbm bbda"><div id="select_mz_solo"><textarea name="typeoptionmz_solo" tabindex="1" id="typeoption_mz_solo" rows="5" cols="50" onBlur="checkoption('mz_solo', '1', 'textarea', 0, 0)" 0 class="pt"></textarea></div></td><td class="ptm pbm bbda" width="180"><span id="checkmz_solo"></span></td></tr>
				<tr><th class="ptm pbm bbda"><span class="rq">*</span>来自哪里</th><td class="ptm pbm bbda"><div id="select_mz_where"><input type="text" name="typeoptionmz_where" id="typeoption_mz_where" class="px" tabindex="1" size="" onBlur="checkoption('mz_where', '1', 'text', '0', '0')" value="" 0 /></div></td><td class="ptm pbm bbda" width="180"><span id="checkmz_where"></span></td></tr>
				<tr><th class="ptm pbm bbda">靓照</th><td class="ptm pbm bbda"><div id="select_mz_photo"><a class="normalbtn bluebtn"><button type="button" class="pn" onclick="uploadWindow(function (aid, url){sortaid_mz_photo_upload(aid, url)})"><em>上传</em></button></a><input type="hidden" name="typeoption[mz_photo][aid]" value="" id="sortaid_mz_photo" /><input type="hidden" name="sortaid_mz_photo_url" id="sortaid_mz_photo_url" /><input type="hidden" name="typeoption[mz_photo][url]" id="sortattachurl_mz_photo"  tabindex="1" /><div id="sortattach_image_mz_photo" class="ptn"></div>
	
</div><div class="d">上传一张你的靓照吧</div>
</td><td class="ptm pbm bbda" width="180"><span id="checkmz_photo"></span></td>
				</tr>
			</table><?php */?>			
<script type="text/javascript" reload="1">
	function sortaid_mz_photo_upload(aid, url) {
		$('sortaid_mz_photo_url').value = url;
		updatesortattach(aid, url, 'data/attachment/forum', 'mz_photo');
	}
</script>
<script type="text/javascript" reload="1">
	var CHECKALLSORT = false;
	function warning(obj, msg) {
		obj.style.display = '';
		obj.innerHTML = '<img src="images/check_error.gif" width="16" height="16" class="vm" /> ' + msg;
		obj.className = "warning";
		if(CHECKALLSORT) {
		showDialog(msg);
		}
	}
	EXTRAFUNC['validator']['special'] = 'validateextra';
	function validateextra() {
		CHECKALLSORT = true;if(!checkoption('bbs_id', '1', 'text')) {
			return false;
		}
		if(!checkoption('bbs_age', '1', 'number')) {
			return false;
		}
		if(!checkoption('mz_pd', '1', 'text')) {
			return false;
		}
		if(!checkoption('mz_solo', '1', 'textarea')) {
			return false;
		}
		if(!checkoption('mz_where', '1', 'text')) {
			return false;
		}
		if(!checkoption('mz_photo', '0', 'image')) {
			return false;
		}
		return true;
	}
</script>
		</div>
		<div id="e_body_loading">
        	<img src="images/loading.gif" width="16" height="16" class="vm" /> 请稍后 ...
		</div>
		<script language="javascript">
	checkFun(".wrap_full_screen","checked_simcheck");
</script>
		<?php /*?><div class="edt" id="e_body" >

			<div id="e_controls" class="bar" >  
				<div id="e_button" style="position:relative;">
					<div class="teditor_new teditor_new2" id="wordprocess_box" style="display:none;">
						<div style="float:left; position:relative;margin-right:25px;">
							<a id="e_fontname" class="dp selectbox" title="设置字体" menupos="43!" style="width:75px;"><span id="e_font">微软雅黑</span></a><em class="arrow_dark"></em>
						</div>
						<a class="ed1" id="e_bold" title="文字加粗">B</a>
						<a class="ed1" id="e_underline" title="文字加下划线">U</a>
						<a class="ed2" id="e_forecolor" title="设置文字颜色">Color</a>
						<a class="ed2" id="e_insertunorderedlist" title="未排序列表">Unorderedlist</a>
						<a class="ed2" id="e_insertorderedlist" title="排序的列表">Orderedlist</a>
						<a class="ed2" id="e_justifyleft" title="居左">Left</a>
						<a class="ed2" id="e_justifycenter" title="居中">Center</a>
						<a class="ed2" id="e_removeformat" title="清除文本格式" style="margin:0px 6px 0px 0px;">Removeformat</a>
						<span class="arrow_wordprocess"></span>
						<div class="cr"></div>				
					</div>
					<div class="teditor_new">
						<a class="ed1" id="e_sml" title="添加表情">表情</a>
						<a class="ed1" id="e_image" title="添加图片" menupos="00" menuwidth="600">图片<div id="e_imagen" style="display:none">!</div></a>
                        <em id="e_modeswitch">
						<a class="ed1" id="e_url" title="添加链接">Url</a>
						<a class="ed1" id="e_quote" title="添加引用文字">引用</a>
						<a id="e_wordprocess"></a>
						<a id="e_more"></a>
						<span  style="float:left;display:none;" id="more_box"><a class="ed2" id="e_inserthorizontalrule" title="分隔线">Hr</a><a class="ed2" id="e_tbl" title="添加表格">Table</a><a class="ed2" id="e_hide" title="添加隐藏内容" style="visibility:hidden;">Hide</a></span>
						</em>
						<span style="float:right">
							<a id="e_simplemode">简单模式</a>	
							<a id="e_advancemode">高级模式</a>
							<em class="cr"></em>
						</span>
						<div class="cr"></div>
					</div>
				</div>
				<div class="cr"></div>
			</div>
			<div class="area">
				<div id="rstnotice" class="ntc_l bbs" style="display:none">
					<a href="javascript:;" title="清除内容" class="d y" onclick="userdataoption(0)">close</a>您有上次未提交成功的数据 <a class="xi2" href="javascript:;" onclick="userdataoption(1)"><strong>恢复数据</strong></a>
				</div>
				<textarea name="message" id="e_textarea" class="pt" rows="15" tabindex="2"></textarea>
			</div>
    		<div class="bbar" id="e_bbar">
    			<span id="e_resize"><img onmousedown="editorresize(event)" src="images/new_resize.png" class="png_bg"></span>
			</div><?php */?>
			
		<!--百度编辑器 开始--> 
		<script type="text/javascript" charset="utf-8" src="ueditor/editor_config.js"></script> 
		<script type="text/javascript" charset="utf-8" src="ueditor/editor_all.js"></script> 
		<!--百度编辑器 结束--> 
		<textarea id="edit_content" name="edit_content"></textarea>
		<script type="text/javascript"> 
			var editor = new UE.ui.Editor(); 
			editor.render("edit_content"); 
		</script>
			



			
<link rel="stylesheet" type="text/css" href="/css/bbscss/style_1_editor.css" />
<script src="js/bbsjs/editor.js" type="text/javascript"></script>
<script src="js/bbsjs/bbcode.js" type="text/javascript"></script>



<script type="text/javascript">
	var editorid = 'e';
	var textobj = $(editorid + '_textarea');
	var wysiwyg = (BROWSER.ie || BROWSER.firefox || (BROWSER.opera >= 9)) && parseInt('1') == 1 ? 1 : 0;
	var allowswitcheditor = parseInt('1');	
	var allowhtml = parseInt('0');
	var allowsmilies = parseInt('1');
	var allowbbcode = parseInt('1');
	var allowimgcode = parseInt('1');
	var simplodemode = parseInt('1');
	var fontoptions = new Array("宋体", "新宋体", "黑体", "微软雅黑", "Arial", "Verdana", "simsun", "Helvetica", "Trebuchet MS", "Tahoma", "Impact", "Times New Roman", "仿宋,仿宋_GB2312", "楷体,楷体_GB2312");
	var smcols = 8;
	var custombbcodes = new Array();
</script>
		</div>
		<div id="post_extra" class="ptm cl">
			<?php /*?><div id="post_extra_tb" class="cl" onselectstart="return false">
            	<label id="extra_more_b" style="position:relative;width:65px;" onMouseOver="showMenu(this.id);"><span>更多选项</span><em class="arrow_dark"></em></label>
				<div id="extra_more_b_menu" class="p_pop" style="width:181px;display:none;">
        			<p class="wrap_simcheck" id="textId_1"> <a><span class="box_simcheck"></span><label id="e_switcher" class="bar_swch ptn" style=" clear:none; display:inline-block;" ><input id="e_switchercheck" type="checkbox" class="pc" name="checkbox" value="0"   />纯文本</label></a></p>
        			<p class="wrap_simcheck"><a><span class="box_simcheck"></span><input type="checkbox" name="smileyoff" id="smileyoff" class="pc" value="1"  /><label for="smileyoff">禁用表情</label></a></p>
					<p class="wrap_simcheck"><a><span class="box_simcheck"></span><input type="checkbox" name="hiddenreplies" id="hiddenreplies" class="pc" value="1"><label for="hiddenreplies">回帖仅作者可见</label></a></p>
					<p class="wrap_simcheck"><a><span class="box_simcheck"></span><input type="checkbox" name="allownoticeauthor" id="allownoticeauthor" class="pc" value="1" checked="checked" /><label for="allownoticeauthor">接收回复通知</label></a></p>
					<p class="wrap_simcheck" ><a><span class="box_simcheck"></span><input type="checkbox" name="parseurloff" id="parseurloff" class="pc" value="1"  /><label for="parseurloff">禁用链接识别</label></a></p>
				</div>
			</div><?php */?>
            <div id="post_extra_c"></div>
		</div>
<script type="text/javascript" reload="1">
	checkFun(".wrap_simcheck","checked_simcheck");
	simSelectFun("#post_extra select");
</script>
<div style="display:none" id='load11'> </div>
		<div class="mtm identifying_code" style="margin:20px 0 0 0">
			<input name="sechash" type="hidden" value="SgJZJWb0" />验证码 
            <span id="seccodeSgJZJWb0" onclick="showMenu(this.id);"><input name="seccodeverify" id="seccodeverify_SgJZJWb0" type="text" autocomplete="off" style="ime-mode:disabled;width:100px;" class="txt px vm" onblur="checksec('code', 'SgJZJWb0')" tabindex="1" /><span id="seccode_SgJZJWb0_secshow" class="seccode_image" ></span><a href="javascript:;"  onclick="refreshCc()" class="xi2">换一个</a><span id="checkseccodeverify_SgJZJWb01" class="seccheck_status"><img id="checkCodeImg" onclick="refreshCc()" src="/code/vdimgck.php" width="68" height="24" class="yz"/></span>
</span>
			<div id="seccodeSgJZJWb0_menu" class="p_pop p_opt" style="display:none;height: 0px; width: 0px; border-width: 0px;">
            	<span id="seccode_SgJZJWb0"></span>
				
<script>
		
		
		setTimeout('checksec1()',2000)
						function checksec1(){
							
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
													document.getElementById("load11").innerHTML=xmlhttp.responseText;
													}
												  }
												xmlhttp.open("GET","<?=URL('bbs1.yzz') ?>",true);
												xmlhttp.send();
																
							}
		
			function refreshCc() { 
				//alert(document.getElementById("load11").innerHTML)
											var ccImg = document.getElementById("checkCodeImg"); 
											if (ccImg) { 
											ccImg.src= ccImg.src + '?' +Math.random(); 
											} 
											
										   return checksec1();

							}
</script>       
<script type="text/javascript" reload="1">
	updateseccode5('SgJZJWb0','follow_rebroadcast');
</script>
			</div>
		</div>
<script>
	function hideMenu1(){
		document.getElementById('alertaa').style.display = "none";
		}
	
	function contentkk(){
		
		var yam1 = document.getElementById('seccodeverify_SgJZJWb0').value;	
		var zcd = document.getElementById('load11').innerHTML;
		var subject = document.getElementById('subject').value;
		
		//var typeoptionbbs_id = document.getElementById('typeoption_bbs_id').value;
		//var typeoptionbbs_age = document.getElementById('typeoption_bbs_age').value;
		//var typeoptionmz_pd = document.getElementById('typeoption_mz_pd').value;
		//var typeoptionmz_solo = document.getElementById('typeoption_mz_solo').value;
		//var typeoptionmz_where = document.getElementById('typeoption_mz_where').value;
	
		if(subject.length == 0 || editor.body.innerHTML.length < 13){
			document.getElementById('alertaa').style='block';
			setTimeout(function(){
			document.getElementById('alertaa').style.display = "none";
			},3000)
			//}else if(typeoptionbbs_id.length == 0 || typeoptionbbs_age.length == 0 || typeoptionmz_pd.length == 0 || typeoptionmz_solo.length == 0|| typeoptionmz_where.length == 0){
			//document.getElementById('alertaa').style='block';
			//document.getElementById('alert_error').innerHTML='必选项没有填写';
			//setTimeout(function(){
			//document.getElementById('alertaa').style.display = "none";
			//},3000)
			}else if(yam1.toLowerCase() == zcd){
				
				document.getElementById('con').value = editor.body.innerHTML
				
				document.getElementById('postform').action = "<?= URL('bbs2.content','&fid='.V('r:fid'))?>"
				document.getElementById('postform').submit();
				}else{
					document.getElementById('alertaa').style='block';
					document.getElementById('alert_error').innerHTML='验证码不正确';
					setTimeout(function(){
					document.getElementById('alertaa').style.display = "none";
					},3000)
					}	
		}
</script>		
		
		<div class="mtm mbm pnpost" style="margin-top:10px;" >
		<a style="width:110px;" class="normalbtn bluebtn"><button name="topicsubmit" value="true" style="width:110px;margin:0px;" id="postsubmit" type="button" onclick='contentkk()'>
                                                    <span>发表帖子</span>
                                                    </button></a>
			<?php /*?><a class="normalbtn bluebtn" style="width:110px;" href='<?= URL('bbsUser.show_submit')?>'>发表帖子</a><?php */?>
			<input type="hidden" id="postsave" name="save" value="" />
			<?php /*?><button type="button" id="postsubmit" class="normalbtn graybtn mzCancelBtn" value="true" onclick="validatesavedraft()"><em>保存草稿</em></button><?php */?>
			<div class="cr"></div>
		</div>
		<div class="cr"></div>
	</div>
</div>