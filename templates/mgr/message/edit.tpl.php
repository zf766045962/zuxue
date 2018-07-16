<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ubbname?>分类管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>

<script>
$(function(){
	var submitBtn=$('#submitBtn');
	var form1=$('#form1');
	submitBtn.click(function(){		
			form1.submit();		
	})
})

</script>

</head>
<body class="main-body">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>留言管理</p></div>

	   <div class="main-cont">
    	 <h3 class="title">留言信息</h3>
         <form  name="form1" id="form1" method="post" action="<?php echo URL('mgr/message.savemessage')?>">
         <div class="set-area">
            <div class="form-row">
            	  <label class="form-field">留言人</label>
                  <div class="form-cont">
                       <input class="input-txt" type="text" name=data[name] value="<?php echo isset($info["name"])&&!empty($info["name"])?$info["name"]:""?>">       
                  </div>                      
            </div>      
         </div>
          <div class="set-area">
            <div class="form-row">
            	  <label class="form-field">联系电话</label>
                  <div class="form-cont">
                       <input class="input-txt" type="text" name=data[tel] value="<?php echo isset($info["tel"])&&!empty($info["tel"])?$info["tel"]:""?>">       
                  </div>                      
            </div>      
         </div>
         <?php /*?> <div class="set-area">
            <div class="form-row">
            	  <label class="form-field">手机</label>
                  <div class="form-cont">
                       <input class="input-txt" type="text" name=data[phone] value="<?php echo isset($info["phone"])&&!empty($info["phone"])?$info["phone"]:""?>">       
                  </div>                      
            </div>      
         </div><?php */?>
          <div class="set-area">
            <div class="form-row">
            	  <label class="form-field">Email</label>
                  <div class="form-cont">
                       <input class="input-txt" type="text" name=data[email] value="<?php echo isset($info["email"])&&!empty($info["email"])?$info["email"]:""?>">       
                  </div>                      
            </div>      
         </div>
         
         <div class="set-area">
            <div class="form-row">
                  <label class="form-field">留言内容</label>
                  <div class="form-cont">
                  	<textarea class="input-area" style="color:#000;overflow-x: hidden;overflow-y: auto;padding: 8px 5px 8px 7px;vertical-align: middle;width: 430px;height:100px;" name="data[content]" ><?php echo isset($info["content"])&&!empty($info["content"])?$info["content"]:""?></textarea>      
                  </div>                      
            </div>
           
         </div> 

          <div class="btn-area">
          		<input type="hidden" name="id" value="<?php echo !empty($info['id'])?$info['id']:''?>">
				<a id="submitBtn" class="btn-general highlight" style="margin-left:150px;" name="<?php echo isset($info["replyMsg"])&&!empty($info["replyMsg"])?'确认修改':'确认添加'?>">
					<span><?=isset($info["id"])&&!empty($info["id"])?'确认修改':'确认添加'?></span>
				</a>
						
         </div> 
         </form>
	</div>

</body>
</html>