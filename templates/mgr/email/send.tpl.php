<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮箱导入</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>邮件发送</p></div>
    <div class="main-cont">
        <h3 class="title">邮件发送</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<form action="sendEmail.php" method="post" id="this_form" onsubmit="return send()">
                  	<div class="form-row" style="margin-left:84px;">
                        <label>群发：<input type="radio" name="sendType" value="1" onclick="qh(1)" checked="checked"/></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>单发：<input type="radio" name="sendType" value="2" onclick="qh(2)" /></label>
                    </div>
                   
                    <div class="form-row" style="display:block;" id="div1">
                        <label class="form-field">选择群发地址表：</label>
                        <div class="form-cont">
                          <select name="cid" id="cid">
                          	<option value="0">请选择</option>
							<?php if(!empty($class)){
                                foreach($class as $key=>$val){
                                    $class_arr[$val['classid']] = $val['classname'];
                            ?>
                                <option value="<?= $val['classid'];?>"><?= $val['classname'];?></option>
                            <?php }}?>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-row" style="display:none;" id="div2">
                        <label class="form-field">收件人E-mail：</label>
                        <div class="form-cont">
                          <input name="address[0][address]" id="address" class="input-txt" warntip="#nameTip" type="text" style="width:350px;" />
                        </div>
                    </div>
                      
                    <div class="form-row">
                        <label class="form-field">使用HTML格式：</label>
                        <div class="form-cont">
                            <select name="is_html" id="is_html">
                          		<option value="0">否</option>
                                <option value="1" selected="selected">是</option>
                          	</select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">　</label>
                        <div class="form-cont">
                       		<label><input type="checkbox" name="is_file" id="is_file" value="1"/> 附件</label>
                        	<div style="display:none;" id="fileDiv"><?php $upload = APP :: N('show_upLoad');echo $upload->showUpload('file',1,'fileUrl','','zh_CN','fileUrl','file','class="input-txt"');?></div>
                        	<p class="form-tips" style="color:#F00;">* 发送时请勿关闭此页面 </p>
                        </div>
                   	</div>
                    
					<div class="btn-area" style="margin-top:0px;">
                   		<input type="submit" id="submit" style="display:none;" />
                        <a href="javascript:;" onclick="$('#submit').click();" class="btn-general highlight" name="确定发送">
                        <span>确定发送</span></a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function qh(n){
		var m	   = n == 1?2:1;
		var obj	   = document.getElementById('div'+n);
		var obj2   = document.getElementById('div'+m);
		var status = document.getElementById('div'+n).style.display;
		if(status == 'none'){
			obj.style.display  = 'block';
			obj2.style.display = 'none';
			$('#address').val('');
		}
	}
	
	$(function() {
		$("#is_file").click(function() {
			if($("#is_file").attr("checked")){
				$('#fileDiv').css('display','block');
				$('#fileUrl').val('');
			}else{
				$('#fileDiv').css('display','none');
				$('#fileUrl').val('');
			}
		});
    });
	
	function send(){
		var sendType = $(':radio[name="sendType"]:checked').val();
		if(sendType == 1){
			if($('#cid').val() == 0){
				alert('请选择群发地址表');
				return false;
			}
		}
		if(sendType == 2){
			if($('#address').val() == ''){
				alert('请填写收件人E-mail');
				return false;
			}	
		}
		if($('#is_file').is(":checked")){
			if($('#fileUrl').val() == ''){
				alert('请填上传附件');
				return false;
			}
		}
		return true;
	}
</script>
</body>
</html>
