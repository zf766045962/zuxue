<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link type="text/css" rel="stylesheet" href="<?php echo W_BASE_URL;?>css/admin/admin.css" media="screen" />
<link type="text/css" rel="stylesheet" href="/css/admin/admin.css" media="screen" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script type="text/javascript">
	$(function(){
		$.ajax({
			url:'http://cc.vi163.cn/news.php',
			type:'get',
			dataType:'jsonp',
			success:function(r){
				$(r).each(function(){
					$("<li><a href='"+this.link_url+"' target='_blank'>"+this.title+"</a><span>"+this.create_time+"</span></li>")
					.appendTo($('#news'));
				});
			}
		})
	})
</script>
</head>

<body class="main-body">
	<div class="path">
			<p>当前位置：首页<span></span></p>
	</div>
	<div class="main-cont">
		<h3 class="title">系统信息</h3>
		<div class="btn-group clear" style="line-height:1.8em;">
                <table>
                <tr>
                <td>公司名称 ：</td><td>北方互动科技（北京）有限公司</td>　
				</tr>
                <tr>
                <td>公司地址 ：</td><td>北京市海淀区上地信息路甲28号科实大厦 B座6B　邮编：100085</td>　　　　
				</tr>
                <tr>
                <td>公司电话 ：</td><td>(8610)51669697     82781360     82782915</td>　　　　
				</tr>
                <tr>
                <td>公司传真 ：</td><td>(8610)51669697</td>　　　　　　　
				</tr>
                <tr>
                <td>公司邮箱 ：</td><td><label><a href="mailto:51669697@163.com">51669697@163.com</a></label></td>
                </tr>
                <tr>
				<td>公司网址 ：</td><td><label><a href="http://www.vi163.com" target="_blank">http://www.vi163.com</a></label></td>
                </tr>
                </table>
		</div>
		
	<?php 		if(V('-:appmode/member',0)){?>
		<h3 class="title"><a class="icon-shield" onclick="$('#member').toggle(200);"> 会员基本数据(点击隐藏)</a></h3>
	<div class="box" id="member">
        <ul class="group-item">
			<li>总用户数:<span><?php echo $counts['user'];?></span></li>
			<li>24小时注册数:<span><?php echo $counts['user_reg_last_day'];?></span></li>
			<li>1周内注册数:<span><?php echo $counts['user_reg_last_7day'];?></span></li>
			<li>1个月注册数:<span><?php echo $counts['user_reg_last_month'];?></span></li>
			<li>3个月注册数:<span><?php echo $counts['user_reg_last_3month'];?></span></li>
            <?php if(V('-:appmode/member_check',0)){?>
			<li>未审核用户:<span><?php echo $counts['user_reg_check'];?></span></li><?php 
			}?>
			<li>24小时内活跃用户:<span><?php echo $counts['user_login_last_day'];?></span></li>
			<li>1周内活跃用户量:<span><?php echo $counts['user_login_last_7day'];?></span></li>
			<li>1个月内活跃用户:<span><?php echo $counts['user_login_last_month'];?></span></li>
			<li>3个月内活跃用户:<span><?php echo $counts['user_login_last_3month'];?></span></li>
		</ul>
		</div>    
    <?php }?>


		<h3 class="title"><a class="icon-shield" onclick="$('#serverphpinfo').toggle(200);" style="cursor:pointer;"> 服务器内容(点击隐藏/显示)</a></h3>
	<div class="box" style="display:none;" id="serverphpinfo" >
    	<?php 			TPL :: display('mgr/phpinfo', '', 0, false);
?>
	</div>
	</div>
</body>
</html>
