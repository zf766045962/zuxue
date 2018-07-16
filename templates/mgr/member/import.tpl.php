<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员导入</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>会员管理<span>&gt;</span>会员导入</p></div>
    <div class="main-cont">
        <h3 class="title">会员导入</h3>
        <div class="set-area">
        	<div class="form web-info-form">

            	<form>
                    <div class="form-row">
                        <label class="form-field">含有会员信息的文本：</label>
                        <div class="form-cont"> <?php $upload = APP::N('show_upLoad');echo $upload->showUpload('file',1,'exls','','zh_CN','url1','image1','class="input-txt"');?>
                        </div>
                    </div>
                     
                    <div class="form-row">
                       <label class="form-field">选择要导入的院校：</label>
                        <div class="form-cont">
                          <select name="class" id="cid">
                          		<option value="" selected>请选择院校</option>
							<?php if(!empty($class)){
                           		foreach($class as $key=>$val){?>
                            	<option value="<?= $val['linkageid'];?>"><?= $val['name'];?></option>    
                            <?php }}?>
                          </select>
                        </div>
                    </div>
                    <div class="form-row">
                       <label class="form-field">选择要导入的角色：</label>
                        <div class="form-cont">
                          <select name="role" id="rid">
                          		<option value="" selected>请选择角色</option>
							<?php if(!empty($role)){
                           		foreach($role as $rk=>$rv){?>
                            	<option value="<?= $rv['id'];?>"><?= $rv['title'];?></option>    
                            <?php }}?>
                          </select>  
                          <!--<p class="form-tips">说明：<br />
                                * 文本格式：txt　<a href="#">查看示例</a><br />
                                * 文本导入：①将超大邮箱地址文本命名为<b>mailaddress.txt</b><br />
                                * 　　　　　②上传至<b>/var/upload/</b>目录<br />
                                * 　　　　　③在地址文本框内写入<b>/var/upload/mailaddress.txt</b>即可.<br />
                                * 上传导入：将含有会员信息的文本导入到指定的院校分类。 
                          </p>-->
                        </div>
                    </div>
                    
					<div class="btn-area" style="margin-top:0px;">
                        <a href="javascript:;" onclick="import_exl();" class="btn-general highlight" style="float:left;">
                        <span>开始导入</span></a>
                        <!--<div style="display:none;" id="now" class="statusDIV">
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
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
		function import_exl() {
			var url	=	$("#url1").val();
			var sch =	$("#cid").val();
			var rid =	$("#rid").val();
			
			if(url=='') {
				alert('请上传表单');
				return false;
			}
			if(sch ==''){
				alert('请选择院校');
				return false;	
			}
			
			if(rid ==''){
				alert('请选择角色');
				return false;	
			}
			
			location.href="<?= URL('mgr/member2.save_import','&url=')?>"+url+"&sch="+sch+"&rid="+rid;
		}
	</script>
    
</div>
</body>
</html>
