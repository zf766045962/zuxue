<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加字段</title>
<link href="<?= CSS_PATH?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="<?= CSS_PATH?>table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?= JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/lhgdialogsc/lhgdialog.min.js?self=true&skin=discuz"></script>
<link href="/js/lhgdialogsc/skins/discuz.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function dialog(url,title,width,height){
	$.dialog({
		title:title,
		id: 'dialog',
		width: width,
		height: height,
		fixed: true,
		lock: true,
		background: '#000',
		opacity: 0.5,
		content: 'url:'+url
	});
}
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform"});
	$("#field").formValidator({onshow:"<?= L('input').L('fieldname')?>",onfocus:"<?= L('fieldname').L('between_1_to_20');?>"}).regexValidator({regexp:"^[a-zA-Z]{1}([a-zA-Z0-9]|[_]){0,19}$",onerror:"<?= L('fieldname_was_wrong');?>"}).inputValidator({min:1,max:20,onerror:"<?= L('fieldname').L('between_1_to_20');?>"}).ajaxValidator({
	    type : "get",
		url : "<?= URL('mgr/sitemodel_field.public_checkfield','modelid='.$modelid.'&t='.$tablename);?>",
		datatype : "html",
		cached:false,
		getdata:{issystem:'issystem'},
		async:'false',
		success : function(data){
            if( data == "1" ){
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "<?= L('fieldname').L('already_exist')?>",
		onwait : "<?= L('connecting_please_wait')?>"
	});
	$("#formtype").formValidator({onshow:"<?= L('select_fieldtype');?>",onfocus:"<?= L('select_fieldtype');?>",oncorrect:"<?= L('input_right');?>",defaultvalue:""}).inputValidator({min:1,onerror: "<?= L('select_fieldtype');?>"});
	$("#name").formValidator({onshow:"<?= L('input_nickname');?>",onfocus:"<?= L('nickname_empty');?>",oncorrect:"<?= L('input_right');?>"}).inputValidator({min:1,onerror:"<?= L('input_nickname');?>"});
})
</script>
<style type="text/css">
	html{_overflow-y:scroll}
	table textarea{ padding:3px 5px;}
	table label{ margin-right:5px;}
</style>
</head>
<?php require P_COMS.'/fields/fields.inc.php';?>
<body>
<link href="/css/admin/admin.css" rel="stylesheet" type="text/css" />
<div class="path">
    <p>当前位置：系统管理<span>&gt;</span>模型管理<span>&gt;</span><?= $m_r['name'];?>字段管理<span>&gt;</span>添加字段</p>
</div>
<div class="main-cont">
	<h3 class="title">添加字段
        <a href="<?= URL('mgr/sitemodel_field.init','modelid='.$modelid);?>" class="btn-general"><span>返回字段列表</span></a>
    </h3>
</div>

<form name="myform" id="myform" action="<?= URL('mgr/sitemodel_field.add');?>" method="post">
    <div class="common-form">
        <table width="100%" class="table_form contentWrap">
            <tr>
              <th><strong>字段类型</strong><br /></th>
              <td><?php $form = APP :: N('form'); echo $form->select($all_field,'','name="info[formtype]" id="formtype" onchange="javascript:field_setting(this.value);"','请选择字段类型');?></td>
            </tr>
            <tr> 
              <th><strong>作为主表字段</strong></th>
              <td><input type="hidden" name="issystem" id="issystem" value="1">
              <label><input type="radio" name="info[issystem]" id="field_basic_table1" value="1" onclick="$('#issystem').val('1');" checked> 是 </label>
              <label><input type="radio" id="field_basic_table0" name="info[issystem]" value="0" onclick="$('#issystem').val('0');"> 否 </label></td>
            </tr>
            <tr>
              <th width="25%"><font color="red">*</font> <strong>字段名</strong><br /><?= L('fieldname_tips');?></th>
              <td><input type="text" name="info[field]" id="field" size="20" class="input-text"></td>
            </tr>
            <tr>
              <th><font color="red">*</font> <strong>字段别名</strong></th>
              <td><input type="text" name="info[name]" id="name" size="30" class="input-text"></td>
            </tr>
            <tr>
              <th><strong>表单输入提示</strong><br /><?= L('field_tips');?></th>
              <td><textarea name="info[tips]" rows="2" cols="20" id="tips" style="height:40px; width:60%"></textarea></td>
            </tr>
            <tr>
              <th><strong>相关参数</strong><br /><?= L('relation_parm_tips');?></th>
              <td><div id="setting"></div></td>
            </tr>
            <tr id="formattribute"> 
              <th><strong>表单附加属性</strong><br /><?= L('form_attr_tips');?></th>
              <td><input type="text" name="info[formattribute]" value="" size="50" class="input-text"></td>
            </tr>
            <tr id="css"> 
              <th><strong>表单CSS样式名</strong></th>
              <td><input type="text" name="info[css]" value="" size="10" class="input-text"></td>
            </tr>
            <tr>
              <th><strong>字符长度取值范围</strong><br /><?= L('string_size_tips');?></th>
              <td>最小值：<input type="text" name="info[minlength]" id="field_minlength" value="0" size="5" class="input-text"> 最大值：<input type="text" name="info[maxlength]" id="field_maxlength" value="" size="5" class="input-text"></td>
            </tr>
            <tr>
              <th><strong>数据校验正则</strong><br /><?= L('data_preg_tips');?></th>
              <td><input type="text" name="info[pattern]" id="pattern" value="" size="40" class="input-text">
                <select name="pattern_select" onchange="javascript:$('#pattern').val(this.value)">
                    <option value=""><?= L('often_preg');?></option>
                    <option value="/^[0-9.-]+$/"><?= L('figure');?></option>
                    <option value="/^[0-9-]+$/"><?= L('integer');?></option>
                    <option value="/^[a-z]+$/i"><?= L('letter');?></option>
                    <option value="/^[0-9a-z]+$/i"><?= L('integer_letter');?></option>
                    <option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
                    <option value="/^[0-9]{5,20}$/">QQ</option>
                    <option value="/^http:\/\//"><?= L('hyperlink');?></option>
                    <option value="/^(1)[0-9]{10}$/"><?= L('mobile_number');?></option>
                    <option value="/^[0-9-]{6,13}$/"><?= L('tel_number');?></option>
                    <option value="/^[0-9]{6}$/"><?= L('zip');?></option>
                </select>
              </td>
            </tr>
            <tr>
              <th><strong>数据校验未通过的提示信息</strong></th>
              <td><input type="text" name="info[errortips]" value="" size="50" class="input-text"></td>
            </tr>
            <tr>
              <th><strong>值唯一</strong></th>
              <td><label><input type="radio" name="info[isunique]" value="1" id="field_allow_isunique1"> 是 </label><label><input type="radio" name="info[isunique]" value="0" id="field_allow_isunique0" checked> 否 </label></td>
            </tr>
            <tr>
              <th><strong>作为基本信息</strong><br /><?= L('basic_field_tips');?></th>
              <td><label><input type="radio" name="info[isbase]" value="1"  checked> 是 </label>
              <label><input type="radio" name="info[isbase]" value="0"> 否 </label></td>
            </tr>
            <tr>
              <th><strong>作为搜索条件</strong></th>
              <td><label><input type="radio" name="info[issearch]" value="1" id="field_allow_search1"> 是 </label><label><input type="radio" name="info[issearch]" value="0" id="field_allow_search0" checked> 否 </label></td>
            </tr>
            <tr>
              <th><strong>在表单中显示</strong><br />可作为预留字段，不做任何处理</th>
              <td><label><input type="radio" name="info[isadd]" value="1" checked /> 是 </label>
              <label><input type="radio" name="info[isadd]" value="0" /> 否 </label></td>
            </tr>
            <tr>
              <th><strong>作为全站搜索信息</strong></th>
              <td><label><input type="radio" name="info[isfulltext]" value="1" id="field_allow_fulltext1" checked/> 是 </label><label><input type="radio" name="info[isfulltext]" value="0" id="field_allow_fulltext0" /> 否 </label></td>
            </tr>
            <tr>
              <th><strong>作为万能字段的附属字段</strong><br><?= L('as_omnipotent_field_tips');?></th>
              <td><label><input type="radio" name="info[isomnipotent]" value="1" /> 是 </label>
              <label><input type="radio" name="info[isomnipotent]" value="0" checked/> 否 </label></td>
            </tr>
            <tr>
              <th><strong>列表中展示字段</strong></th>
              <td><label><input type="radio" name="info[isposition]" value="1" id="field_allow_isposition1"/> 是 </label>
              <label><input type="radio" name="info[isposition]" value="0" id="field_allow_isposition0" checked/> 否 </label></td>
            </tr>
        </table>
    </div>
    <input name="info[modelid]" type="hidden" value="<?= $modelid;?>">
    <input name="hidden[tablename]" type="hidden" value="<?= $tablename;?>">
    <div class="btn" style="text-align:center;">
    	<a onclick="$('#dosubmit').click();" class="btn-general highlight"><span>保存添加</span></a>
        <input id="dosubmit" type="button" value="保存" class="button" style="display:none;" onclick="$('#myform').submit();">
        <a href="<?= URL('mgr/sitemodel_field.init','modelid='.$modelid);?>" class="btn-general"><span>返回列表</span></a>
    </div>
</form>

<script type="text/javascript">
	function field_setting(fieldtype) {
		$('#formattribute').css('display','none');
		$('#css').css('display','none');
		$.each( ['<?= implode("','",$att_css_js);?>'], function(i, n){
			if(fieldtype == n) {
				$('#formattribute').css('display','');
				$('#css').css('display','');
			}
		});
	
		$.getJSON("<?= URL('mgr/sitemodel_field.public_field_setting')?>&fieldtype="+fieldtype, function(data){
			if(data.field_basic_table=='1') {
				$('#field_basic_table1').attr("checked",true);
				$('#field_basic_table0').attr("disabled",false);
				$('#field_basic_table1').attr("disabled",false);
				$('#issystem').val('1');
			} else {
				$('#field_basic_table0').attr("checked",true);
				$('#field_basic_table0').attr("disabled",true);
				$('#field_basic_table1').attr("disabled",true);
				$('#issystem').val('0');
			}
			if(data.field_allow_search=='1') {
				$('#field_allow_search0').attr("disabled",false);
				$('#field_allow_search1').attr("disabled",false);
			} else {
				$('#field_allow_search0').attr("checked",true);
				$('#field_allow_search0').attr("disabled",true);
				$('#field_allow_search1').attr("disabled",true);
			}
			if(data.field_allow_fulltext=='1') {
				$('#field_allow_fulltext0').attr("disabled",false);
				$('#field_allow_fulltext1').attr("disabled",false);
			} else {
				$('#field_allow_fulltext0').attr("checked",true);
				$('#field_allow_fulltext0').attr("disabled",true);
				$('#field_allow_fulltext1').attr("disabled",true);
			}
			if(data.field_allow_isunique=='1') {
				$('#field_allow_isunique0').attr("disabled",false);
				$('#field_allow_isunique1').attr("disabled",false);
			} else {
				$('#field_allow_isunique0').attr("checked",true);
				$('#field_allow_isunique0').attr("disabled",true);
				$('#field_allow_isunique1').attr("disabled",true);
			}
			if(data.field_allow_isposition=='1') {
				$('#field_allow_isposition0').attr("disabled",false);
				$('#field_allow_isposition1').attr("disabled",false);
			} else {
				$('#field_allow_isposition0').attr("checked",true);
				$('#field_allow_isposition0').attr("disabled",true);
				$('#field_allow_isposition1').attr("disabled",true);
			}
			$('#field_minlength').val(data.field_minlength);
			$('#field_maxlength').val(data.field_maxlength);
			$('#setting').html(data.setting);
		});
	}
</script>
</body>
</html>