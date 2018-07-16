<?php TPL :: display('bbs/head_my_avatar')?>
<div id='urlssb' style="display:none"></div>
<div id="screenshotsShow" style="display:none"></div>
<? $nam=DS('publics._get','','users', "id='".$_SESSION['u_uidss']."'");?>
<body>
	<div id='content' class="content">	
		<input type='hidden' id="mz_csrf_tks" value=""/>
		<div class="headWrap">
			<a href="<?= URL('bbs.index')?>" class="headLogo"><i class='i_icon'></i></a>
			<ul class="headLeft">
				<li class="head-store"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
				<li class="head-products"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
				<li class="head-retail"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
                <li class="head-flyme"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
                <li class="head-services"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
                <li class="head-bbs"><a href="#" class="" hidefocus><i class='i_icon'></i></a></li>
            </ul>
            <div class="headRight">
                <span id='loginWrap' style=''>
                    <a id="head-name" class='linkAGray' href="<?= URL('bbsUser.my_dynamic')?>" title="用户<?=$nam[0]['username']?>"><?=$nam[0]['username']?></a><span class="line_head">|</span>
                    <a id="head-logout" class='linkAGray' href="<?= URL('login.logout')?>">退出</a>
                </span>
            </div>
        </div>
		<div class="flymeContent">	
			<style type="text/css">
                .navWrap{
                    height: 58px;
                    border-bottom: #e4e7e9 1px solid;
                }
                .navWrap .nav{
                    display: block;
                    float: left;
                    line-height: 58px;
                }
                .navWrap .nav li{
                    position: relative;
                    display: inline-block;
                    margin-right: 40px;
                    width: 100px;
                    height: 100%;
                    float: left;
                }
                .navWrap .nav li a{
                    display: inline-block;
                    width: 100%;
                    height: 56px;
                    font-size: 16px;
                    text-align: center;
                }
                .navWrap .nav .current{
                    margin: 0px auto;
                    height: 2px;
                    width: 100px;
                    overflow: hidden;
                    background-color: #1daeed;
                }
            </style>
			<style type="text/css">
				body,td,th {
					font-size:12px;
					font-family:Arial, Helvetica, sans-serif;
					color:#999999;
				}
				a { color:#0099FF; }
			</style>
			<script type="text/javascript" language="javascript">
				function getCookie(name){
				  var arr=document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
				  if(arr!=null && arr!=false) return decodeURIComponent(arr[2]);
				  return false;
				}
				window.onload=function(){
				  var screenshotsImg=getCookie('162100screenshotsImg');
				  var screenshotsSrc=screenshotsImg!=false?screenshotsImg:'i_include/userface_default.gif'
				  if(document.getElementById('screenshotsShow')!=null){
					document.getElementById('screenshotsShow').innerHTML='<img src="'+screenshotsSrc+'" /> ';
				  }
				}
            </script>
			<div id='navWrap' class="navWrap">
            <ul class="nav">
                <li id="accountManage"><a href="<?= URL('bbsUser.my_dynamic')?>" class="linkABlue">账户管理</a><div class='current'></div></li>
                <li id="contact"><a href="#" class="linkAGray">账户充值</a></li>
            </ul>
		</div>
		<div class='clear'></div>
		<div id="mainWrap" class='mainWrap'>
			<div id="topWrap" class="topWrap">
				<div class="top-leftWrap">
					<span class="display fontBig">当前头像</span>
					<img id="userImg" src="<?= $nam[0]['head_img']==NULL?'images/w100h100.jpg':$nam[0]['head_img']?>">
				</div><div class="clear"></div>
			</div>
			<div class="grayBorderB">
				<div class="titleWrap">
					<div class="leftWrap-bottom">
						<span class="fright">支持jpg、jpeg、png、bmp格式，文件小于5M</span>
						<span class="fontBig fleft">设置新头像</span>
					</div><div class="clear"></div>
				</div>
			</div>
			<div id="upload">
				<div class="contain">
					<div class="frame marginOrgFrame originalImg" >
						<img id="origImg"  class="originalMaxWH" data-src="<?=$nam222?>" style='display:block'>
						<iframe src="<?=URL('bbs1.start')?>" width="322" height="277" frameborder="0" scrolling="no"></iframe>
					</div>
					<div class="instrunction">您上传的头像会自动生成三种尺寸，请注意中小尺寸是否清晰</div>
					<div class="marginBigFrame bigImgTop" id="preview200">
						<div class="frame marginBigFrame bigImg">
							<img id="bigImg" src="images/wh.png" width="200px" height="200px">
						</div><span class="imgTip big">200*200px</span>
					</div>
                    <div class="commonFrame middleImgTop" id="preview100">
                        <div class="frame commonFrame middleImg">
                            <img id="middleImg" src="images/wh.png" width="100px" height="100px">
                        </div>
                        <span class="imgTip common">100*100px</span>
                    </div>
                    <div class="commonFrame smallImgTop" id="preview50"> 
                        <div class="frame commonFrame smallImg">
                            <img id="smallImg" src="images/wh.png" width="50px" height="50px">   
                        </div>
                        <span class="imgTip small">50*50px</span>
                    </div>
				</div>
				<div class='lineWrap ftop' style="">
					<a class="fullBtnBlue fleft" id='saves' onClick="save22('<?=$nam222?>')" style="width:156px">保存</a>
					<a class="fullBtnGray black iconCancel fleft" id='cancel1' href="<?=URL('bbsUser.my_userManage')?>">取消</a>
				</div>
				<script>
					function save22(nam){
						var urlh = document.getElementById('urlssb').innerHTML;
						if(urlh.length != 0){
							var xmlhttp;
							if(window.XMLHttpRequest){
								xmlhttp=new XMLHttpRequest();
							}else{
								xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange=function(){
								if (xmlhttp.readyState==4 && xmlhttp.status==200){
									//alert(xmlhttp.responseText)	
									location.href='<?=URL('bbsUser.my_avatar')?>';
									//document.getElementById("load11").innerHTML=xmlhttp.responseText;
								}
							}
							xmlhttp.open("GET","<?=URL('bbs1.savepagesss'),'&page='?>"+urlh,true);
							xmlhttp.send();												
						}
					}
					//DS('publics.date1','','users',"avatar = '$nam222'","id ='".V('r:uid')."'");	
				</script>	
			</div>
		</div>
	</div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<div id='flymeFooter' class='footerWrap' style="top: 868.917px;">
	<div class='footerInner'>
		<div class='footer-layer1'>
			<div class='footer-innerLink'>
				<a href="#" target="_blank" title="关于魅族">关于魅族</a><img class="foot-line" src="images/space.gif">
				<a href="#" target="_blank" title="工作机会">工作机会</a><img class="foot-line" src="images/space.gif">
				<a href="#" target="_blank" title="联系我们">联系我们</a><img class="foot-line" src="images/space.gif">
				<a href="#" target="_blank" title="法律声明">法律声明</a><img class="foot-line" src="images/space.gif">
				<a href="javascript:void(0);" id="globalName" class="footer-language" title="简体中文">简体中文&nbsp;&nbsp;&nbsp;</a>
			</div>
			<div class='footer-service'>
				<span class='service-label'>客服热线</span><span class='service-num'>400-788-3333</span>
				<a id='service-online' class='service-online' href="javascript:void(0);" title="在线客服">在线客服</a>
			</div>
			<div class='footer-outerLink'>
				<a class='footer-sinaMblog' href="http://weibo.com/meizumobile" target="_blank"><i class='i_icon'></i></a>
				<a class='footer-tencentMblog' href="http://t.qq.com/meizu_tech" target="_blank"><i class='i_icon'></i></a>
				<a id='footer-weChat' class='footer-weChat' href="javascript:void(0);" target="_blank"><i class='i_icon'></i></a>
				<a class='footer-qzone' href="http://user.qzone.qq.com/2762957059" target="_blank"><i class='i_icon'></i></a>
			</div>
			<div id="globalContainer" class="footer-language_menu">
				<a href="http://www.meizu.cn" title="简体中文" class="checked">简体中文</a>
				<a href="http://www.meizu.com.hk" title="繁體中文" class="ClobalItem">繁體中文</a>
				<a href="http://en.meizu.com" title="English" class="ClobalItem">English</a>
				<a href="http://ru.meizu.com" title="Русский" class="ClobalItem">Русский</a>
				<a href="http://il.meizu.com" title="עברית" class="ClobalItem" style="border-width:0px;">עברית</a>
			</div>
		</div>
		<div class='clear'></div>
		<div id='flymeCopyright' class="copyrightWrap">
			<div class="copyrightInner">
				<span>©2014 Meizu Telecom Equipment Co., Ltd. All rights reserved.</span>
				<a href="http://www.miitbeian.gov.cn/" class='linkAGray' target="_blank">备案号: 粤ICP备13003602号-4</a> 
				<a href="images/icp2.jpg" class='linkAGray' target="_blank">经营许可证编号: 粤B2-20130198</a>
				<a target="_blank" href="images/common/com_licence.jpg" hidefocus="true" class="linkAGray">营业执照</a>
			</div>
		</div>
	</div>
</div>
<div id="wechatPic"></div>
	<script charset="utf-8" type="text/javascript" src="js/bbsjs/jquery-1.7.1.min.js"></script>
	<script charset="utf-8" type="text/javascript" src="js/bbsjs/M20130902.js"></script>
	<script type="text/javascript" src="js/bbsjs/jquery.form.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/jquery.validate.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/utils.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/flyme.elements.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/base.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/modifyIcon.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/bbsjs/jquery.imgareaselect.min.js" charset="utf-8"></script>
	<script src="http://www.162100.com/ad/760_90-1_in_760px-w_p.js" language="javascript" type="text/javascript"></script>
	</body>
</html>