<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="addbg">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>添加内容</title>
<link href="<?php echo W_BASE_URL;?>css/admin/content/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo W_BASE_URL;?>css/admin/content/zh-cn-system.css" rel="stylesheet" type="text/css">
<link href="<?php echo W_BASE_URL;?>css/admin/content/table_form.css" rel="stylesheet" type="text/css">
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>



<?php
$show_dialog=1;
$show_validator=1;
$show_pc_hash;

if(isset($show_dialog)) {
?>
<link href="<?php echo CSS_PATH?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>dialog.js"></script>
<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/<?php echo SYS_STYLE;?>-styles1.css" title="styles1" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/<?php echo SYS_STYLE;?>-styles2.css" title="styles2" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/<?php echo SYS_STYLE;?>-styles3.css" title="styles3" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo CSS_PATH?>style/<?php echo SYS_STYLE;?>-styles4.css" title="styles4" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>styleswitch.js"></script>
<?php if(isset($show_validator)) { ?>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<?php } ?>
<script type="text/javascript">
	window.focus();
	var pc_hash = 'iM9tKO';
	<?php if(!isset($show_pc_hash)) { ?>
		window.onload = function(){
		var html_a = document.getElementsByTagName('a');
		var num = html_a.length;
		for(var i=0;i<num;i++) {
			var href = html_a[i].href;
			if(href && href.indexOf('javascript:') == -1) {
				if(href.indexOf('?') != -1) {
					html_a[i].href = href+'&pc_hash='+pc_hash;
				} else {
					html_a[i].href = href+'?pc_hash='+pc_hash;
				}
			}
		}

		var html_form = document.forms;
		var num = html_form.length;
		for(var i=0;i<num;i++) {
			var newNode = document.createElement("input");
			newNode.name = 'pc_hash';
			newNode.type = 'hidden';
			newNode.value = pc_hash;
			html_form[i].appendChild(newNode);
		}
	}
<?php } ?>
</script>
<script type="text/javascript">
<!--
	var charset = 'utf-8';
	var uploadurl = 'http://localhost/phpcms_v9_UTF8/uploadfile/';
//-->
</script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>content_addtop.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>colorpicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>cookie.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>swfupload/swf2ckeditor.js"></script>

<script type="text/javascript">var catid=6</script>
<body>
<?php 
$imgurl=W_BASE_URL_PATH.'statics/images/icon/upload-pic.png';
$imgurl_default=W_BASE_URL_PATH.'statics/images/icon/upload-pic.png';


 ?>
<form name="myform" id="myform" action="<?php echo URL('mgr/arcticlepublish.add2');?>" method="post" >

  <div class="addContent">
    <div class="crumbs">当前位置：内容  &gt; 内容发布管理 &gt; 添加内容</div>
    <div class="col-right">
      <div class="col-1">
        <div class="content pad-6">
          <h6> 缩略图</h6>
          <div class="upload-pic img-wrap">
            <input name="info[thumb]" id="thumb" value="" type="hidden">
            <a href="javascript:void(0);" onclick="flashupload('<?php echo URL('mgr/attachment.swfupload');?>','thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,0','content','6','');return false;"> <img src="<?php echo $imgurl ?>" id="thumb_preview" style="" height="113" width="135"></a>
            <input style="width: 66px;" class="button" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁切图片" type="button">
            <input style="width: 66px;" class="button" onclick="$('#thumb_preview').attr('src','<?php echo $imgurl_default ?>');$('#thumb').val(' ');return false;" value="取消图片" type="button">
            <script type="text/javascript">function crop_cut_thumb(id){
	if (id=='') { alert('请先上传缩略图');return false;}
	window.top.art.dialog({title:'裁切图片', id:'crop', iframe:'<?php echo URL('mgr/attachment.crop');?>'+'&picurl='+encodeURIComponent(id)+'&input=thumb&preview=thumb_preview', width:'680px', height:'480px'}, 	function(){var d = window.top.art.dialog({id:'crop'}).data.iframe;
	d.uploadfile();return false;}, function(){window.top.art.dialog({id:'crop'}).close()});
};</script>
          </div>
          <h6> 相关文章</h6>
          <input name="info[relation]" id="relation" value="" style="" type="hidden">
          <ul class="list-dot" id="relation_text">
          </ul>
          <div>
            <input value="添加相关" onclick="omnipotent('selectid','?m=content&amp;c=content&amp;a=public_relationlist&amp;modelid=1','添加相关文章',1)" class="button" style="width: 66px;" type="button">
            <span style="display: none;" class="edit_content">
            <input value="显示已有" onclick="show_relation(1,0)" class="button" style="width: 66px;" type="button">
            </span> </div>
          <h6> 发布时间</h6>
          <link rel="stylesheet" type="text/css" href="index.php_files/jscal2.css">
          <link rel="stylesheet" type="text/css" href="index.php_files/border-radius.css">
          <link rel="stylesheet" type="text/css" href="index.php_files/win2k.css">
          <script type="text/javascript" src="index.php_files/calendar.js"></script>
          <script type="text/javascript" src="index.php_files/en_002.js"></script>
          <input name="info[inputtime]" id="inputtime" value="2011-12-13 17:13:13" size="21" class="date input-text" readonly="readonly" type="text">
          &nbsp;
          <script type="text/javascript">
			Calendar.setup({
			weekNumbers: true,
		    inputField : "inputtime",
		    trigger    : "inputtime",
		    dateFormat: "%Y-%m-%d %H:%M:%S",
		    showTime: true,
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>
          <h6> 转向链接</h6>
          <input name="info[islink]" value="0" type="hidden">
          <input disabled="disabled" name="linkurl" id="linkurl" size="25" maxlength="255" class="input-text" type="text">
          <input name="info[islink]" id="islink" value="1" onclick="ruselinkurl();" type="checkbox">
          <font color="red">转向链接</font>
          <h6> 内容页模板</h6>
          <select name="info[template]" id="template">
            <option value="">请选择</option>
            <option selected="selected" value="show">文章内容页(show.html)</option>
            <option value="show_download">下载内容页(show_download.html)</option>
            <option value="show_picture">图片内容页(show_picture.html)</option>
          </select>
          <h6> 允许评论</h6>
          <label class="ib" style="width:88px">
          <input name="info[allow_comment]" id="allow_comment_1" checked="checked" value="1" type="radio">
          允许评论</label>
          <label class="ib" style="width:88px">
          <input name="info[allow_comment]" id="allow_comment_0" value="0" type="radio">
          不允许评论</label>
          <h6> 阅读收费</h6>
          <input class="input-text" name="info[readpoint]" size="5" type="text">
          <input name="info[paytype]" value="0" checked="checked" type="radio">
          点
          <input name="info[paytype]" value="1" type="radio">
          元
          <h6>状态</h6>
          <span class="ib" style="width:90px">
          <label>
          <input name="status" value="99" checked="checked" type="radio">
          发布 </label>
          </span> </div>
      </div>
    </div>
    <div class="col-auto">
      <div class="col-1">
        <div class="content pad-6">
          <table class="table_form" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <th width="80"> <font color="red">*</font> 栏目 </th>
                <td><input name="info[catid]" value="6" type="hidden">
                  国内 <a href="javascript:;" onclick="omnipotent('selectid','?m=content&amp;c=content&amp;a=add_othors&amp;siteid=1','同时发布到其他栏目',1);return false;" style="color: rgb(181, 191, 187);">[同时发布到其他栏目]</a>
                  <ul class="list-dot-othors" id="add_othors_text">
                  </ul></td>
              </tr>
              <tr>
                <th width="80"> <font color="red">*</font> 标题 </th>
                <td><input style="width: 400px;" name="info[title]" id="title" class="measure-input  input-text" onblur="$.post('<?php echo URL('mgr/content.get_keywords').'&sid='?>'+Math.random()*5, {data:$('#title').val()}, function(data){if(data &amp;&amp; $('#keywords').val()=='') $('#keywords').val(data); })" onkeyup="strlen_verify(this, 'title_len', 80);" type="text">
                  <input name="style_color" id="style_color" value="" type="hidden">
                  <input name="style_font_weight" id="style_font_weight" value="" type="hidden">
                  <input class="button" id="check_title_alt" value="检测重复" onclick="$.get('<?php echo URL('mgr/content.checkTitle').'&time='?>'+Math.random()*5, {data:$('#title').val()}, function(data){if(data=='1') {$('#check_title_alt').val('标题重复');$('#check_title_alt').css('background-color','#FFCC66');} else if(data=='0') {$('#check_title_alt').val('标题不重复');$('#check_title_alt').css('background-color','#F8FFE1')}})" style="width: 73px;" type="button">
                  <img src="index.php_files/colour.png" onclick="colorpicker('title_colorpanel','set_title_color');" style="" height="16" width="15"> <img src="index.php_files/bold.png" onclick="input_font_bold()" style="" height="10" width="10"> <span id="title_colorpanel" style="position:absolute;" class="colorpanel"></span>还可输入<b><span id="title_len">80</span></b> 个字符
                  <div style="display: none;" id="titleTip"></div></td>
              </tr>
              <tr>
                <th width="80"> 关键词 </th>
                <td><input name="info[keywords]" id="keywords" style="width: 280px;" class="input-text" type="text">
                  多关键词之间用空格或者“,”隔开</td>
              </tr>
              <tr>
                <th width="80"> 来源 </th>
                <td><input name="info[copyfrom]" style="width: 400px;" class="input-text" type="text">
                  <select name="copyfrom_data">
                    <option value="0" selected="selected">≡请选择≡</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th width="80"> 摘要 </th>
                <td><textarea name="info[description]" id="description" style="width: 98%; height: 46px;" onkeyup="strlen_verify(this, 'description_len', 255)"></textarea>
                  还可输入<b><span id="description_len">255</span></b> 个字符 </td>
              </tr>
              <tr>
                <th width="80"> <font color="red">*</font> 内容 </th>
                <td><div id="content_tip"></div>
                  <textarea style="display: none;" name="info[content]" id="content" boxid="content"></textarea>
                  <span id="cke_content" onmousedown="return false;" class="cke_skin_kama cke_editor_content" dir="ltr" title=" " role="application" aria-labelledby="cke_content_arialbl" lang="en"><span id="cke_content_arialbl" class="cke_voice_label">Rich Text Editor</span><span class="cke_browser_gecko" role="presentation"><span class="cke_wrapper cke_ltr" role="presentation">
                  <style>
.cke_skin_kama{visibility:hidden;}
</style>
                  </span></span><span tabindex="-1" style="position:absolute; left:-10000" role="presentation"></span></span>
                  <div class="editor_bottom">
                    <script type="text/javascript" src="index.php_files/swf2ckeditor.js"></script>
                    <div id="page_title_div">
                      <table border="0" cellpadding="0" cellspacing="1">
                        <tbody>
                          <tr>
                            <td class="title">子标题<span id="msg_page_title_value"></span></td>
                            <td><a class="close" href="javascript:;" onclick='javascript:$("#page_title_div").hide();'><span>×</span></a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><input name="page_title_value" id="page_title_value" class="input-text" size="30">
                              &nbsp;
                              <input class="button" value="提交" onclick='insert_page_title("content",1)' type="button"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="content_attr">
                    <label>
                    <input name="add_introduce" value="1" checked="checked" type="checkbox">
                    是否截取内容</label>
                    <input class="input-text" name="introcude_length" value="200" size="3" type="text">
                    字符至内容摘要
                    <label>
                    <input name="auto_thumb" value="1" checked="checked" type="checkbox">
                    是否获取内容第</label>
                    <input name="auto_thumb_no" value="1" size="2" class="input-text" type="text">
                    张图片作为标题图片 </div>
                  <div style="display: none;" id="contentTip"></div></td>
              </tr>
              <tr>
                <th width="80"> 分页方式 </th>
                <td><select name="info[paginationtype]" id="paginationtype" onchange="if(this.value==1)$('#paginationtype1').css('display','');else $('#paginationtype1').css('display','none');">
                    <option selected="selected" value="0">不分页</option>
                    <option value="1">自动分页</option>
                    <option value="2">手动分页</option>
                  </select>
                  <span id="paginationtype1" style="display:none">
                  <input class="input-text" name="info[maxcharperpage]" id="maxcharperpage" value="10000" size="8" maxlength="8" type="text">
                  字符数（包含HTML标记）</span> </td>
              </tr>
              <tr>
                <th width="80"> 推荐位 </th>
                <td><input name="info[posids][]" value="-1" type="hidden">
                  <label class="ib" style="width:125px">
                  <input name="info[posids][]" id="_1" value="2" type="checkbox">
                  首页头条推荐</label>
                  <label class="ib" style="width:125px">
                  <input name="info[posids][]" id="_2" value="1" type="checkbox">
                  首页焦点图推荐</label>
                  <label class="ib" style="width:125px">
                  <input name="info[posids][]" id="_3" value="9" type="checkbox">
                  网站顶部推荐</label>
                  <label class="ib" style="width:125px">
                  <input name="info[posids][]" id="_4" value="10" type="checkbox">
                  栏目首页推荐</label>
                  <label class="ib" style="width:125px">
                  <input name="info[posids][]" id="_5" value="12" type="checkbox">
                  首页图片推荐</label>
                </td>
              </tr>
              <tr>
                <th width="80"> 阅读权限 </th>
                <td><input name="info[groupids_view]" value="1" type="hidden">
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="8" type="checkbox">
                  游客</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="2" type="checkbox">
                  新手上路</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="6" type="checkbox">
                  注册会员</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="4" type="checkbox">
                  中级会员</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="5" type="checkbox">
                  高级会员</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="1" type="checkbox">
                  禁止访问</label>
                  <label class="ib" style="width:120px">
                  <input name="groupids_view[]" id="groupids_view" value="7" type="checkbox">
                  邮件认证</label>
                </td>
              </tr>
              <tr>
                <th width="80"> 添加投票 </th>
                <td><input class="input-text" name="info[voteid]" id="voteid" value="5" size="3" type="text">
                  <input value="选择已有投票" onclick="omnipotent('selectid','?m=vote&amp;c=vote&amp;a=public_get_votelist&amp;from_api=1','选择已有投票')" class="button" type="button">
                  <input value="新增投票" onclick="omnipotent('addvote','?m=vote&amp;c=vote&amp;a=add&amp;from_api=1','添加投票',0)" class="button" type="button">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-bottom">
    <div class="fixed-but text-c">
      <div class="button">
        <input value="保存后自动关闭" name="dosubmit" class="cu" style="width: 145px;" onclick="refersh_window()" type="submit">
      </div>
      <div class="button">
        <input value="保存并继续发表" name="dosubmit_continue" class="cu" style="width: 130px;" title="Alt+X" onclick="refersh_window()" type="submit">
      </div>
    </div>
  </div>
  <input value="a00wAK" name="pc_hash" type="hidden">
</form>
</body></html>
