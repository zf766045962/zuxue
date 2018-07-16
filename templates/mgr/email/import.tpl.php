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
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>EDM营销<span>&gt;</span>邮箱导入</p></div>
    <div class="main-cont">
        <h3 class="title">邮箱导入</h3>
        <div class="set-area">
        	<div class="form web-info-form">

            	<form>
                    <div class="form-row">
                        <label class="form-field">含有邮件地址的文本：</label>
                        <div class="form-cont"><?php $upload = APP :: N('show_upLoad');
						echo $upload->showUpload('file',1,'fileUrl','','zh_CN','fileUrl','file','class="input-txt"');?>
                        </div>
                    </div>
                     
                    <div class="form-row">
                        <label class="form-field">选择要导入的类目：</label>
                        <div class="form-cont">
                          <select name="class" id="cid">
                          	<option value="0" selected="selected">请选择</option>
							<?php if(!empty($class)){
                           		foreach($class as $key=>$val){?>
                            	<option value="<?= $val['classid'];?>"><?= $val['classname'];?></option>    
                            <?php }}?>
                          </select>
                          <p class="form-tips">说明：<br />
                                * 文本格式：txt　<a href="#">查看示例</a><br />
                                * 文本导入：①将超大邮箱地址文本命名为<b>mailaddress.txt</b><br />
                                * 　　　　　②上传至<b>/var/upload/</b>目录<br />
                                * 　　　　　③在地址文本框内写入<b>/var/upload/mailaddress.txt</b>即可.<br />
                                * 上传导入：将含有邮箱地址的文本导入到指定的邮箱分类。 
                          </p>
                        </div>
                    </div>
                    
					<div class="btn-area" style="margin-top:0px;">
                        <a href="javascript:Import();" class="btn-general highlight" style="float:left;">
                        <span>开始导入</span></a>
                        <div style="display:none;" id="now" class="statusDIV">
                        	<img src="/images/waiting.gif" width="20" align="left";/>&nbsp;
                        	<span style="color:#666;">正在导入，请稍后...</span>
                        </div>
                        <div style="display:none;" id="ok" class="statusDIV">
                        	<img src="/images/succeed.png" width="20" align="left";/>&nbsp;
                        	<span style="color:#666;">导入已完成！</span>
                        </div>
                        <div style="display:none;" id="error" class="statusDIV">
                        	<img src="/images/failured.png" width="20" align="left";/>&nbsp;
                        	<span style="color:#666;">导入失败！</span>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function Import(){
		var cid = $('#cid').val();
		var url = $('#fileUrl').val();
		if(url == ''){
			alert('请上传文本或直接写入文本导入地址');return;
		}
		if(cid == 0){
			alert('请选择导入的类目');return;
		}
		status(0);
		var n = $.ajax({
			url: "<?= URL("mgr/email.save_import");?>",
			data:'url='+url+'&cid='+cid,
			type:'post',
			async: false
		}).responseText;
		status(n);
	}
	
	function status(n){
		if(n == 0){
			$('#now').css('display','block');
			$('#ok').css('display','none');
			$('#error').css('display','none');
		}
		if(n == 1){
			$('#ok').css('display','block');
			$('#now').css('display','none');
			$('#error').css('display','none');
		}
		if(n == 2){
			$('#error').css('display','block');
			$('#now').css('display','none');
			$('#ok').css('display','none');
		}
	}
</script>
</body>
</html>
