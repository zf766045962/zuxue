<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>名人堂页面设置</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin/admin_lib.js"></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/admin-all.js"></script>
<script>
	window.onload = function() {
		$('#preview_loading').hide();
	}


	function preview(o) {
		$('#preview_loading').show();
		$('#logo_form').submit();
	}
	
	function uploadFinished(state, url) {
		$('#logo_form').get(0).reset();

		$('#preview_loading').hide();
		if (state != '200') {
			alert(state);
			return;
		}
		$('#logo_preview').attr('src', url);
		$('#logo').val(url);

	}
</script>
</head>
<body id="star-userlist" class="main-body">
	<div class="path">
			<p><span>当前位置：</span><a href="">界面管理</a>&gt;<a href="">页面设置</a>&gt;<span>名人堂设置</span>	</p>
	</div>
	<div class="main-cont clear">
		<h3 class="title large">名人堂设置</h3>
		<div class="drag-area clear">
			<div class="caption-box"><span>banner设置</span></div>
			<form action="<?php echo URL('mgr/celeb_mgr.uploadBanner');?>" id="logo_form" target="logo_upload"  method="post"  enctype="multipart/form-data">
				<div class="set-area">
					<div class="form web-info-form">
						<div class="form-row">
							<label class="form-field" for="upload_file">上传图片</label>
							<div class="form-cont">
								<input type="file" class="btn-file" id="upload_file" value="<?php echo $config['celeb_banner']; ?>" name="file" onChange="preview(this)"/>
								<p class="form-tips">建议图片尺寸758*120px</p>
							</div>
						</div>
						<div class="form-row logo_preview">
							<label for="upload_file" class="form-field">效果预览</label>
							<div class="form-cont preview-user-rec">
								<img id="logo_preview" src="<?php echo $config['celeb_banner'] ? F('fix_url', $config['celeb_banner']) : W_BASE_URL.'img/'. (WB_LANG_TYPE_CSS ? (WB_LANG_TYPE_CSS . '/') : '').'recommend_bg.png';?>" />
								<div class="preview_loading" id="preview_loading">正在上传图片，请稍候...</div>
							</div>
							<iframe name="logo_upload" style="display:none;"></iframe>
						</div>
						<div class="btn-area">
							<a name="保存修改" class="btn-general highlight" id="submitBtn" href="#"><span>提交</span></a>
						</div>
					</div>
				</div>
			</form>
		</div>
				<form id="this_form" method="post">
                    <input type="hidden" name="banner" id="logo" value="<?php echo $config['celeb_banner'];?>" />
				</form>
    </div>
<div class="win-pop win-fixed edit-famer hidden" id="pop_window"></div>
<div id="pop_mask" class="mask hidden"></div>
<script type="text/javascript">
var valid = new Validator({
	form: '#this_form',
	trigger: '#submitBtn'
});
</script>
</body>
</html>
