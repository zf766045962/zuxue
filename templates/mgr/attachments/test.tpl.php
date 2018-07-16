<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>phpcmsV9 - 后台管理中心</title>
<link href="http://localhost/phpcms_v9_UTF8/statics/css/reset.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/phpcms_v9_UTF8/statics/css/zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/phpcms_v9_UTF8/statics/css/table_form.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/phpcms_v9_UTF8/statics/css/style/zh-cn-styles1.css" title="styles1" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="http://localhost/phpcms_v9_UTF8/statics/css/style/zh-cn-styles2.css" title="styles2" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="http://localhost/phpcms_v9_UTF8/statics/css/style/zh-cn-styles3.css" title="styles3" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="http://localhost/phpcms_v9_UTF8/statics/css/style/zh-cn-styles4.css" title="styles4" media="screen" />

<script language="javascript" type="text/javascript" src="http://localhost/phpcms_v9_UTF8/statics/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://localhost/phpcms_v9_UTF8/statics/js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="http://localhost/phpcms_v9_UTF8/statics/js/styleswitch.js"></script>
<script type="text/javascript">
	window.focus();
	var pc_hash = '3WEqTh';
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
</script>
</head>
<body>
<style type="text/css">
	html{_overflow-y:scroll}
</style>		    
<script type="text/javascript" src="http://localhost/phpcms_v9_UTF8/statics/js/crop/swfobject.js"></script>
<script>
			// 获取页面上的flash实例。
			// @param flashID 这个参数是：flash 的 ID 。本例子的flash ID是 "myFlashID" ，在本页面搜索一下 "myFlashID" 可看到。
			function getFlash(flashID) 
			{
				// 判断浏览器类型
				if (navigator.appName.indexOf("Microsoft") != -1) 
				{
					return window[flashID];
				} 
				else 
				{
					return document[flashID];
				}
			}
			
			// flash 上传图片完成时回调的函数。
			function uploadComplete(pic)
			{
				
				if(parent.document.getElementById('thumb')) {
					var input = parent.document.getElementById('thumb');
				} else {
					var input = parent.right.document.getElementById('thumb');
				}
								if(parent.document.getElementById('thumb_preview')) {
					var preview = parent.document.getElementById('thumb_preview');
				} else {
					var preview = parent.right.document.getElementById('thumb_preview');
				}
								if(pic) {
					input.value = pic;
					if (preview) preview.src = pic;
				}
				window.top.art.dialog({id:'crop'}).close();
			}

			function uploadfile() {
				getFlash('myFlashID').upload();
			}
            var swfVersionStr = "10.0.0";
            var xiSwfUrlStr = "http://localhost/phpcms_v9_UTF8/statics/js/crop/images/playerProductInstall.swf";
			
            var flashvars = {};
			// 图片地址
			flashvars.picurl = "http://localhost/phpcms_v9_UTF8/uploadfile/2011/1214/20111214054302974.jpg";
			// 上传地址，使用了 base64 加密
			flashvars.uploadurl = "aW5kZXgucGhwP209YXR0YWNobWVudCZjPWF0dGFjaG1lbnRzJmE9Y3JvcF91cGxvYWQmbW9kdWxlPWNvbnRlbnQmY2F0aWQ9NiZmaWxlPWh0dHAlM0ElMkYlMkZsb2NhbGhvc3QlMkZwaHBjbXNfdjlfVVRGOCUyRnVwbG9hZGZpbGUlMkYyMDExJTJGMTIxNCUyRjIwMTExMjE0MDU0MzAyOTc0LmpwZw==";
			
            var params = {};
            params.quality = "high";
            params.bgcolor = "#ffffff";
            params.allowscriptaccess = "always";
            params.allowfullscreen = "true";
            var attributes = {};
            attributes.id = "myFlashID";
            attributes.name = "myFlashID";
            attributes.align = "middle";
            swfobject.embedSWF(
                "http://localhost/phpcms_v9_UTF8/statics/js/crop/images/Main.swf", "flashContent", 
                "680", "480", 
                swfVersionStr, xiSwfUrlStr, 
                flashvars, params, attributes);
			<!-- JavaScript enabled so display the flashContent div in case it is not replaced with a swf object. -->
			swfobject.createCSS("#flashContent", "display:block;text-align:left;");
        </script>
    </head>

    <body>
        <div id="flashContent">
        	<p>
	        	To view this page ensure that Adobe Flash Player version 
				10.0.0 or greater is installed. 
			</p>
			<script type="text/javascript"> 
				var pageHost = ((document.location.protocol == "https:") ? "https://" :	"http://"); 
				document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='" 
								+ pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" ); 
			</script> 
        </div>
	   	
       	<noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="680" height="480" id="myFlashID">
                <param name="movie" value="http://localhost/phpcms_v9_UTF8/statics/js/crop/images/Main.swf" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#ffffff" />
                <param name="allowScriptAccess" value="always" />
                <param name="allowFullScreen" value="true" />
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="http://localhost/phpcms_v9_UTF8/statics/js/crop/images/Main.swf" width="680" height="480">
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#ffffff" />
                    <param name="allowScriptAccess" value="always" />
                    <param name="allowFullScreen" value="true" />
                <!--<![endif]-->
                <!--[if gte IE 6]>-->
                	<p> 
                		Either scripts and active content are not permitted to run or Adobe Flash Player version
                		10.0.0 or greater is not installed.
                	</p>
                <!--<![endif]-->
                    <a href="http://www.adobe.com/go/getflashplayer">
                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash Player" />
                    </a>
                <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
	    </noscript>
       </body>

       </html>
