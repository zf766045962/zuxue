<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$linkname?>管理</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.css" rel="stylesheet" type="text/css" />
<script src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/datepick/jquery.datepick.min.js"></script>
<script src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script src="<?php echo W_BASE_URL;?>js/select.js"></script>
<link href="<?php echo W_BASE_URL;?>css/admin/base.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo W_BASE_URL;?>css/admin/calendar-win2k-1.css" title="win2k-1" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin/calendar.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin/calendar-cn.js"></script>
</head>
<body class="main-body">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>生成静态管理<span>&gt;</span>主页生成静态管理</p></div>
   	
    <div class="main-cont">
        	<h3 class="title">首页生成</h3>
            <div class="form-row">
                <label class="form-field">一键生成</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                <span style="color:#A0A0A4">一键生成以下全部的静态页面，但是时间会长一些。</span>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">网站首页</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=index')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">走进易得</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=about')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">售后服务</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=service')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">在线订购</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=order')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">联系我们</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=contact')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">友情链接</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=link')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            <div class="form-row">
                <label class="form-field">网站地图</label>
                <div class="form-cont">
				<a href="<?php echo URL('mgr/html.update_index','url=map')?>" style="margin-left:50px;" class="btn-general highlight" ><span>点击生成</span></a>
                </div>
            </div>
            
    </div>
   
</body>
</html>
