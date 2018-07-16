<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员组 - 角色管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<script>
var valid = Xwb.use('Validator', {

	form: '#from1',
    trigger:'#submitBtn',
	comForm : true,
		validators : {next();}
/*
	validators : {
				
			 'pw': function(elem, v, data, next){
						var reg = /^[a-zA-Z-0-9\.\-_\?]+$/;
						if(v){
							if(!data.m && data.m !== 0)
								data.m = '非法字符';
							this.report(reg.test(v), data);
						} else this.report(true, data);
						next();
			 },
			 'repw':function(elem, v, data, next){
						if($('#repassword').val!= $('#password').val){
							data.m = '两次输入不一致';
							this.report(false, data);
						} else{ 
							data.m = '验证通过';
						this.report(true, data);
			  }
						next();
			 
			 }*/
			 
			}

});


</script>
</head>
<body class="main-body">
<form id="from1" method="post" name="form1" action="">
  <div class="main-cont">
  	<?php if($app=="app"){?>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">应用标题</label>
          <div class="form-cont">
            <input type="text"  vrel="_f|ft|english|ne=m:不能为空|sz=min:6,max:20,m:长度在6-20个字符之间,ww" warntip="#usernameTip3" class="input-txt" name="site_name">
            <span class="tips-error hidden" id="usernameTip3">格式不正确</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">应用名称</label>
          <div class="form-cont">
            <input type="text" warntip="#nameTip4" vrel="sz=max:10,m:请缩减至十个字内|ne=m:不能为空" class="input-txt" name="site_name">
            <span id="nameTip4" class="tips-error hidden"></span> </div>
        </div>
        <input type="hidden" value="" id="logo" name="logo">
      </div>
    </div>
	<?php }else{?>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">模块标题</label>
          <div class="form-cont">
            <input type="text" warntip="#nameTip1" vrel="sz=max:10,m:请缩减至十个字内|ne=m:不能为空" class="input-txt" name="site_name">
            <span id="nameTip1" class="tips-error hidden"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">模块名称</label>
          <div class="form-cont">
            <input type="text" warntip="#nameTip2" vrel="sz=max:10,m:请缩减至十个字内|ne=m:不能为空" class="input-txt" name="site_name">
            <span id="nameTip2" class="tips-error hidden"></span> </div>
        </div>
        
    </div>
	<?php }?>
    <div class="btn-area"><a name="保存修改" class="btn-general highlight" id="submitBtn" href="#"><span>提交</span></a></div>
      </div>
  <a class="ico-close-btn" href="#" id="xwb_cls" title="关闭"></a>
</form>

</body>
</html>
