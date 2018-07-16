<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="欢迎登录和注册魅族Flyme账户，您可以体验手机云服务功能，包括：在线下载应用，同步手机数据和查找手机等，让您的手机管理更加智能。" />
	<meta name="keywords" content="魅族  meizu 登录flyme 云服务  查找手机  充值账户  MX M9 MX2" />
	<meta content="width=1080" name="viewport"/>
	<title>账户管理</title>
	<link href="css/base.css" type="text/css" rel="Stylesheet"/>
	<link href="css/head.css" type="text/css" rel="Stylesheet"/>
	<link href="css/actmanage.css" type="text/css" rel="Stylesheet"/>
	<script type="text/javascript">
    	var ReceiveEmail = '';
	</script>
</head>
<body>
	<div id='content' class="content">
		

	
<input type='hidden' id="mz_csrf_tks" value=""/>
<div class="headWrap">
	<a href='<?= URL('default.index')?>' class="headLogo"><i class='i_icon'></i></a>
	<ul class="headLeft">
		<li class="head-store">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
		<li class="head-products">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
		<li class="head-retail">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
		<li class="head-flyme">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
		<li class="head-services">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
		<li class="head-bbs">
			<a href="#" class="" hidefocus><i class='i_icon'></i></a>
		</li>
	</ul>

	<div class="headRight">
		<span id='loginWrap' style=''>
			<a id="head-name" class='linkAGray' href='' title=用户38429708>用户38429708</a>
			<span class="line_head">|</span>
			<a id="head-logout" class='linkAGray' href="<?= URL('login')?>">退出</a>
		</span>
		<span id='unloginWrap'  style='display:none;'>
			<a href="javascript:window.location.href%20=%20'https://member.meizu.com/login.jsp?useruri='+encodeURIComponent(window.location.href);" class="head-name">登录</a>
			<span class="line_head">|</span>
			<a href='<?= URL('bbs.register')?>' class="head-logout">注册</a>
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
<div id='navWrap' class="navWrap" style="margin-left:100">
	<ul class="nav">
		<li id="accountManage"><a href="#" class="linkABlue">账户管理</a><div class='current'></div></li>
		<li id="contact"><a href="#" class="linkAGray">账户充值</a></li>
	</ul>
</div>
<div class='clear'></div>

			<div class='topWrap'>
				<div class='top-leftWrap'>
					<img id='userImg' src='images/w100h100.jpg'>
					<a id="modifyIconTip" class="modifyIconTip modify" href="<?= URL('bbsUser.my_avatar')?>">编辑头像</a>
					<a class="modifyIconTip-bg"></a>
				</div>
				<div class='top-rightWrap'>
					<div id="nickNameTitle" class='lineWrap nickname'>
						<label id='nickName'>
						用户38429708
						</label>
						<a id='nickNameEdite' class='pointer modify'><i class='i_icon'></i></a>

						
						<div id="getFunnyName" class="fleft getFunnyName" style='display: none'>
							<div class="fullBtnBlue fleft">
								<a class="getFunnyNameTitle pointer fleft">抢昵称</a>
							</div>
							<div class="fleft nickname_tips">
								<span id='funnyNameClose' class="fleft">
									<span class="funnyNameWrap">大家都在抢注昵称，赶快去抢哦!</span>
									<a class="funnyNameClose">
										<i class='i_icon pointer'></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div id="nickNameCon" class='lineWrap modify_content nickNameCon' style='display: none'>
						<form>
							<div class='lineWrap'>
								<input type="text" value="" name="nickname" id="newnickName" class="normalInput"/>
							</div>
							<div class='clear'></div>
							<div class= "edit">
								<a class="fullBtnBlue save_form fleft" id="editSave">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="editCancel">取消</a>
							</div>
							<div class='clear'></div>
						</form>
					</div>
					<div class='lineWrap grayTip nameWrapTop' id="getUserNameWrap" style='display: none'>
						<label>账户名：</label>
						
						<input type="hidden" value="" id="memberFlyme" />
					</div>
					<div id="setUserNameWrap" class='lineWrap grayTip ftop' >
						<a id="setuserName" class="blue modify" href="javascript:;">设置Flyme账户名</a>
					</div>
					<div id='setaccount' class="modify_content" style='display: none'>
						<form>
						<div>
							<div class="normalInput">
								<input type="text" value="" name="account" id="flyme" class="username" maxlength="32" placeholder="账户名">
							</div><div class='clear'></div>
							<label class="flymeTip">账户名保存后不可修改</label>
						</div>
							<div class='clear'></div>
							<div class='fBtnleft'>
								<a class="fullBtnBlue save_form fleft" id="newSave">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="newCancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
				</div>
				<div class='clear'></div>
			</div>
			<div class='mainWrap'>
				<div class='titleWrap grayBorderB grayBorderTop'>
					<div class='title-leftWrap'>
				
						<span>账户安全</span>
					</div>
					
					<div class='title-rightWrap'>
						<span>安全等级：</span>
						<span id='safeLevel'>50</span>
						<a id="safeLevelTip" class="pointer"><i class="i_icon"></i></a>
					</div>
					<div class='clear'></div>
				</div>
				<div class='bodyWrap'>
					<div id='pwdWrap' class='lineWrap pwdWrapTop'>
						<div class='item-right'><a href='javascript:void(0);' class='linkABlue modify' id="modifyPassword" onClick="ss()">修改</a></div>
						<div class='item-left'>密码</div>
						<div class='item-middle'></div>
						<div class='clear'></div>
					</div>
					<div id='changePasswordWrap' class='grayBorderB modify_content' style='display:none;'>
						<div class='cEmail-titleWrap'>
							<span>修改密码</span>
						</div>
						<form class='cEmail-bodyWrap' enctype="application/x-www-form-urlencoded">
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>账户密码</label>
								</div>	
								<input type="password" value="" name="password" id="ce-u-current_pwd" class='normalInput' maxlength='16'/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>新密码</label>
								</div>	
								<div class='normalInput'>
									<input type="text" value="" name="resetPassword" id="ce-u-new_pwd1" maxlength='16' value='' autocomplete="off"/>
									<input type="password" value="" id="ce-u-new_pwd2" maxlength='16' value='' autocomplete="off" style='display:none'/>
									<a id="pwdBtn" class="pwdBtnShow noselect" onselectstart="return false">
										<i class="i_icon"></i>
									</a>
									<div class='clear'></div>
								</div>
							</div>
							
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								
								<a href='javascript:;' class="fullBtnBlue save_form fleft" id="ce-u-pwdsave">保存</a>
								<a href='javascript:;' class="fullBtnGray cancel_form fleft" id="ce-u-pwdcancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
						
					</div>
					<div id='emailWrap' class='lineWrap'>
						<!--if未验证 -->
						<div class='item-right' style='display:none;'>
							<a id='emailbindEdite' href='javascript:void(0);' class='linkABlue modify' data-type="modify">修改</a>
						</div>
						<!-- end if -->
						<!--if已验证  -->
						<div class='item-right' style='display:none;'>
							<a id='emailEdite' href='javascript:void(0);' class='linkABlue modify' data-type="modify">修改</a>
						</div>
						<!-- end if -->
						<!--if-->
						<div class='item-right' >
							<a id='emailBind' href='javascript:void(0);' class='linkABlue modify' data-type="bind">绑定</a>
						</div>
						<div class='item-left'>邮箱</div>
						<!--if-->
						<div class='item-middle' id='email-item-middle1' style='display:none;'>
							<span id="current_email" class='email bold'></span><br>
							<span class='grayTip'>已验证，可通过邮箱找回密码</span>
						</div>
						<!-- end if -->
						<!--if-->
						<div class='item-middle' id='email-item-middle2' >
							<span class='bold'>未绑定</span><br>
							<span class='grayTip'>绑定后可通过邮箱找回密码</span>
						</div>
						<!-- end if -->
						<!--if-->
						<div class='item-middle' id='email-item-middle3' style='display:none;'>
							<!-- <span class='bold'>绑定未激活</span><br> -->
							<span class='email bold'></span><br>
							<span id='notice' class='ftipright'>已发验证邮件，请尽快验证</span>
							<a id='renotice' href='javascript:void(0);' data-status="1" class='linkABlue renotice'>重发</a>
							<span id='timeup' class="timeup" style="display:none;">60</span>
							<br>
							<span class='grayTip'>验证后可在互动社区发帖、回复等，还可通过邮箱找回密码，提高账户安全级别</span>
						</div>
						<!-- end if -->
						<!-- end if -->
						<div class='clear'></div>
					</div>
					<!-- //绑定输入框 -->
					<div id='bindEmailWrap' class='grayBorderT grayBorderB modify_content' style='display: none;'>
						<div class='bindEmail-titleWrap'>
							<span>绑定邮箱</span>
						</div>
						<form class='bindEmail-bodyWrap'>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>邮箱</label>
								</div>	
								<input type="text" value="" data-key="kapkey" name="email" id="ce-u-bind_email" class='normalInput' maxlength='32'/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="kapkey" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKey-bindEmail" data-value="5" href="javascript:void(0);" data-type="1" class="linkABlue invalidBtn get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue ce-u-save save_form fleft" id="ce-u-bindsave">保存</a>
								<a class="fullBtnGray ce-u-cancel cancel_form fleft" id="ce-u-bindcancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
					<div id='changeEmailWrap-unactiveone' class='grayBorderT grayBorderB modify_content ' style='display:none;'>
						<div class='cEmail-titleWrap'>
							<span id="editEmail">修改邮箱（验证密码）</span>
						</div>
						<form class='cEmail-bodyWrap'>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>账户密码</label>
								</div>	
								<input type="password" value="" name="password" id="ce-u-password" class='normalInput' maxlength='16'/>
							</div>

							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue ce-u-save save_form fleft" id="ce-u-savenext">下一步</a>
								<a class="fullBtnGray ce-u-cancel cancel_form fleft" id="ce-u-savenextcancel">取消</a>
								<div class='clear'></div>
							</div>
									<div class='clear'></div>
						</form>
					</div>
					<div id='changeEmailWrap-unactive' class='grayBorderT grayBorderB modify_content ' style='display:none;'>
						<div class='cEmail-titleWrap'>
							<span id="editEmail">修改邮箱</span>
						</div>
						<form class='cEmail-bodyWrap'>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>新邮箱</label>
								</div>	
								<input type="text" value="" data-key="kapkey" name="email" id="ce-u-new_email" class="normalInput" maxlength="32" />
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="ce-u-passwordvalidate_code" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKeynewEmail" data-value="15" href="javascript:void(0);" data-type="1" class="linkABlue invalidBtn get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue ce-u-save save_form fleft" id="ce-u-save">保存</a>
								<a class="fullBtnGray ce-u-cancel cancel_form fleft" id="ce-u-cancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
					<!-- //编辑输入框，激活 -->
					<div id='changeEmailWrap-activeone' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='cEmail-titleWrap'>
							<span>修改邮箱第一步</span>
						</div>
						<form class='cEmail-bodyWrap'>
							<div class='lineWrap' id="currentEmail">
							    <div class='leftWrap'>
									<label class='leftLabel'>当前邮箱</label>
								</div>	
								<span id='ce-u-current_email' data-key="kapkey" class='normalInput current_email bold'></span>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="ce-u-passwordvalidate_codeone" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKeyone" data-value="12" href="javascript:void(0);" data-type="2" class="linkABlue  get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue ce-u-save save_form fleft" id="ce-u-activenext">下一步</a>
								<a class="fullBtnGray ce-u-cancel cancel_form fleft" id="ce-u-activecancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
					<div id='changeEmailWrap-active-two' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='cEmail-titleWrap'>
							<span>修改邮箱第二步</span>
						</div>
						<form class='cEmail-bodyWrap'>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>新邮箱</label>
								</div>	
								<input type="text" value="" data-key="kapkey" name="email" id="ce-u-active_email" class='normalInput' maxlength='32'/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="ce-u-passwordvalidate_codetwo" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKey-activeEmail" data-value="12" href="javascript:void(0);" data-type="1" class="linkABlue invalidBtn get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue save_form fleft" id="ce-u-activesave">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="ce-u-activecanceltwo">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
					<div id='telWrap' class='lineWrap'>
						<!--if-->
						<div class='item-right' >
							<a id="editMobile" href='javascript:void(0);' class='linkABlue modify'>修改</a>
						</div>
						<!-- end if -->
						<!--if-->
						<div class='item-right' style='display:none;'>
							<a id="bindMobile" href='javascript:void(0);' class='linkABlue modify'>绑定</a>
						</div>
						<!-- end if -->
						<div class='item-left'>手机号码</div>
						<!--if-->
						<div class='item-middle' id='telModify' >
							<span id="current_phone" class='bold'>152****4824</span><br>
							<span class='grayTip'>已验证，可通过手机找回密码</span>
						</div>
						<!-- end if -->
						<!--if-->
						<div class='item-middle' id='telBind' style='display:none;'>
							<span class='bold'>未绑定</span><br>
							<span class='grayTip'>绑定后可通过手机号码登录、找回密码、异常登录提醒、<br>登录不常用设备验证</span>
						</div>
						<!-- end if -->
						<div class='clear'></div>
					</div>
					<div id='bindTelWrap' class='grayBorderT grayBorderB modify_content' style='display: none;'>
						<div class='bindTel-titleWrap'>
							<span>绑定手机号码</span>
						</div>
						<form class='bindTel-bodyWrap'>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>手机号码</label>
								</div>	
								<input type="text" value="" data-key="kapkey" name="mobile" id="ce-u-bind_tel" class='normalInput' maxlength='11' />
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="kapkeyEmail" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKey-bindTel" data-value="6" href="javascript:void(0);" data-type="1" class="linkABlue invalidBtn get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue save_form fleft" id="ce-u-bindTelsave">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="ce-u-bindTelcancel">取消</a>
								<div class='clear'></div>
							</div>
						</form>
					</div>
					<!-- 修改手机 验证密码 -->
					<div id='setTelCheckPass' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='setQuestion-titleWrap'>
							<span>修改手机号（验证密码）</span>
						</div>
						<form class='setQuestion-bodyWrap' >
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>账户密码</label>
									</div>	
									<input type="password" value="" name="password" id="ce-u-passwordNew"   class='normalInput' maxlength='16'/>
								</div>
								<div class='lineWrap'>
									<label class='fleft'>&nbsp;</label>
									<a class="fullBtnBlue save_form fleft" id="setTelCheckPassSave">下一步</a>
									<a class="fullBtnGray cancel_form fleft" id="setTelCheckPassCancel">取消</a>
									<div class='clear'></div>
								</div>
									<div class='clear'></div>
						</form>
					</div>
					<div id='changeTelWrap-activeNew' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='cTel-titleWrap'>
							<span>输入新手机号</span>
						</div>
						<form class='cEmail-bodyWrap'>	
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>新手机号码</label>
								</div>
								<input type="text" value="" data-key="kapkey" name="mobile" id="ce-u-cTelNew" class='normalInput' maxlength='11' />
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>验证码</label>
								</div>
								<div class="normalInput bottom">
									<input type="text" name="kapkey" id="kapkeyTelNew" class="kapkey" maxlength="6" autocomplete='off'>
									<span class="form-line"></span>
									<a id="getKey-activeTelNew" data-value="14" href="javascript:void(0);" data-type="1" class="linkABlue invalidBtn get_kapkey">获取验证码</a>
									<a href="javascript:void(0);" class="linkABlue kapkey_requested" style="display:none;">已发送 <span class="interval_num">60</span></a>
								</div>
								<div clear="clear"></div>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue save_form fleft" id="ce-u-telsaveNew">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="ce-u-telcancelNew">取消</a>
								<div class='clear'></div>
							</div>	
						</form>
					</div>
					<div id='questionWrap' class='lineWrap'>
						<div class='item-left'>密保问题</div>
						
						
							<div id="questionSetTip" class='item-right' >
								<a id="setSafe" href='javascript:void(0);' class='linkABlue modify'>设置</a>
							</div>
							<div id="questionUnSettedTip" class='item-middle'>
								<span id='tip' class='bold'>未设置</span><br> <span
									class='grayTip'>设置密保可大幅提升账户安全</span>
							</div>
						
						<div class='clear'></div>
					</div>
					<!-- 设置密保 -->
					<div id='setQuestion-stepOne' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='setQuestion-titleWrap'>
							<span>设置密保（验证密码）</span>
						</div>
						<form class='setQuestion-bodyWrap'>
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>账户密码</label>
									</div>	
									<input type="password" value="" name="password" id="setQuestion_pwd" class='normalInput' maxlength='16'/>
								</div>

								<div class='lineWrap'>
									<label class='fleft'>&nbsp;</label>
									<a class="fullBtnBlue save_form fleft" id="setQuestionSave">下一步</a>
									<a class="fullBtnGray cancel_form fleft" id="setQuestionCancel">取消</a>
									<div class='clear'></div>
								</div>	
									<div class='clear'></div>
						</form>
					</div>
					<div id='setQuestion-stepTwo' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='setQuestion-titleWrap'>
							<span>设置密保</span>
						</div>
						<form class='setQuestion-bodyWrap'>
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>问题一：</label>
									</div>
                                    <button type="button" class="dropdown" data-name="questionCode1" id="questionCode1"><span>请选择密保问题</span></button>
								</div>
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>答案：</label>
									</div>	
									<input type="text" value="" maxlength="32" name="answer1" id="qanswer1" class='normalInput'/>
								</div>
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>问题二：</label>
									</div>
                                    <button type="button" class="dropdown" data-name="questionCode2" id="questionCode2"><span>请选择密保问题</span></button>

								</div>
								<div class='lineWrap'>
									<div class='leftWrap'>
										<label class='leftLabel'>答案：</label>
									</div>	
									<input type="text" value="" maxlength="32" name="answer2" id="qanswer2" class='normalInput'/>
								</div>
								<div class='lineWrap'>
									<label class='fleft'>&nbsp;</label>
									<a class="fullBtnBlue save_form fleft" id="ce-u-setQuetionsave">保存</a>
									<a class="fullBtnGray cancel_form fleft" id="ce-u-setQuetioncancel">取消</a>
									<div class='clear'></div>
								</div>
						</form>
					</div>
					<!-- 修改密保 -->
					<div id='changeQuestionWrap' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='cQuestion-titleWrap'>
							<span>修改密保(验证)</span>
						</div>
						<form class='cQuestion-bodyWrap'>	
							<div class='questionlineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>问题一：</label>
								</div>	
								<span id='cqone' class="normalInput current_email"></span>
								<input type="hidden" name="questionCode1" value=""/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>答案：</label>
								</div>	
								<input type="text" value="" maxlength="32" name="answer1" id="answer1" class='normalInput'/>
							</div>
							<div class='questionlineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>问题二：</label>
								</div>	
								<span id='cqtwo' class="normalInput current_email"></span>
								<input type="hidden" name="questionCode2" value=""/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>答案：</label>
								</div>	
								<input type="text" value="" maxlength="32" name="answer2" id="answer2" class='normalInput'/>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue save_form fleft" id="ce-u-cquestionsave">下一步</a>
								<a class="fullBtnGray cancel_form fleft" id="ce-u-cquestioncansel">取消</a>
								<div class='clear'></div>
							</div>	
						</form>
					</div>
					<div id='resetQuestion' class='grayBorderT grayBorderB modify_content' style='display:none;'>
						<div class='cQuestion-titleWrap'>
							<span>修改密保(设置新的密保问答)</span>
						</div>
						<form class='cQuestion-bodyWrap'>	
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>问题一:</label>
								</div>	
                                <button type="button" class="dropdown" data-name="questionCode1" id="questionCode3"><span>请选择密保问题</span></button>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>答案：</label>
								</div>	
								<input type="text" value="" maxlength="32" name="answer1" id="resetanswer1" class='normalInput'/>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>问题二:</label>
								</div>
                                <button type="button" class="dropdown" data-name="questionCode2" id="questionCode4"><span>请选择密保问题</span></button>
							</div>
							<div class='lineWrap'>
								<div class='leftWrap'>
									<label class='leftLabel'>答案：</label>
								</div>
								<input type="text" value="" maxlength="32" name="answer2" id="resetanswer2" class='normalInput'/>
							</div>
							<div class='lineWrap'>
								<label class='fleft'>&nbsp;</label>
								<a class="fullBtnBlue save_form fleft" id="ce-u-resetQuetionsave">保存</a>
								<a class="fullBtnGray cancel_form fleft" id="ce-u-resetQuetioncancel">取消</a>
							    <div class='clear'></div>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<input type="hidden" name="form_resubmit_token_key" id="form_resubmit_token_key" value="" />
	<ul style='display:none;' id='mail' class='bRadius2 boxShadow10'></ul>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php 
	TPL :: display('User_footer');
	?>
<div id="wechatPic"></div>
	<script charset="utf-8" type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script charset="utf-8" type="text/javascript" src="js/M20130902.js"></script>
	<script type="text/javascript" src="js/jquery.form.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/jquery.validate.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/utils.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/flyme.elements.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/base.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/jquery.autoEmail.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/dropdown.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/actmanage.js" charset="utf-8"></script>
	
    <ul class="dropdown_menu" data-target="#questionCode1" >
    
    <li data-text="您的出生地是？" data-value="1">您的出生地是？</li>
    
    <li data-text="您母亲的姓名是？" data-value="2">您母亲的姓名是？</li>
    
    <li data-text="您父亲的姓名是？" data-value="3">您父亲的姓名是？</li>
    
    <li data-text="您配偶的姓名是？" data-value="4">您配偶的姓名是？</li>
    
    <li data-text="您的小学校名是？" data-value="5">您的小学校名是？</li>
    
    <li data-text="您母亲的生日是？" data-value="6">您母亲的生日是？</li>
    
    <li data-text="您父亲的生日是？" data-value="7">您父亲的生日是？</li>
    
    <li data-text="您配偶的生日是？ " data-value="8">您配偶的生日是？ </li>
    
    <li data-text="您初中班主任的名字是？" data-value="9">您初中班主任的名字是？</li>
    
    <li data-text="您小时候的绰号是什么？" data-value="10">您小时候的绰号是什么？</li>
    
    <li data-text="您小时候最好的朋友叫什么名字？" data-value="11">您小时候最好的朋友叫什么名字？</li>
    
    </ul>
    <ul class="dropdown_menu" data-target="#questionCode2" >
    
    <li data-text="您的出生地是？" data-value="1">您的出生地是？</li>
    
    <li data-text="您母亲的姓名是？" data-value="2">您母亲的姓名是？</li>
    
    <li data-text="您父亲的姓名是？" data-value="3">您父亲的姓名是？</li>
    
    <li data-text="您配偶的姓名是？" data-value="4">您配偶的姓名是？</li>
    
    <li data-text="您的小学校名是？" data-value="5">您的小学校名是？</li>
    
    <li data-text="您母亲的生日是？" data-value="6">您母亲的生日是？</li>
    
    <li data-text="您父亲的生日是？" data-value="7">您父亲的生日是？</li>
    
    <li data-text="您配偶的生日是？ " data-value="8">您配偶的生日是？ </li>
    
    <li data-text="您初中班主任的名字是？" data-value="9">您初中班主任的名字是？</li>
    
    <li data-text="您小时候的绰号是什么？" data-value="10">您小时候的绰号是什么？</li>
    
    <li data-text="您小时候最好的朋友叫什么名字？" data-value="11">您小时候最好的朋友叫什么名字？</li>
    
    </ul>
    <ul class="dropdown_menu" data-target="#questionCode3" >
    
    <li data-text="您的出生地是？" data-value="1">您的出生地是？</li>
    
    <li data-text="您母亲的姓名是？" data-value="2">您母亲的姓名是？</li>
    
    <li data-text="您父亲的姓名是？" data-value="3">您父亲的姓名是？</li>
    
    <li data-text="您配偶的姓名是？" data-value="4">您配偶的姓名是？</li>
    
    <li data-text="您的小学校名是？" data-value="5">您的小学校名是？</li>
    
    <li data-text="您母亲的生日是？" data-value="6">您母亲的生日是？</li>
    
    <li data-text="您父亲的生日是？" data-value="7">您父亲的生日是？</li>
    
    <li data-text="您配偶的生日是？ " data-value="8">您配偶的生日是？ </li>
    
    <li data-text="您初中班主任的名字是？" data-value="9">您初中班主任的名字是？</li>
    
    <li data-text="您小时候的绰号是什么？" data-value="10">您小时候的绰号是什么？</li>
    
    <li data-text="您小时候最好的朋友叫什么名字？" data-value="11">您小时候最好的朋友叫什么名字？</li>
    
    </ul>
    <ul class="dropdown_menu" data-target="#questionCode4" >
    
    <li data-text="您的出生地是？" data-value="1">您的出生地是？</li>
    
    <li data-text="您母亲的姓名是？" data-value="2">您母亲的姓名是？</li>
    
    <li data-text="您父亲的姓名是？" data-value="3">您父亲的姓名是？</li>
    
    <li data-text="您配偶的姓名是？" data-value="4">您配偶的姓名是？</li>
    
    <li data-text="您的小学校名是？" data-value="5">您的小学校名是？</li>
    
    <li data-text="您母亲的生日是？" data-value="6">您母亲的生日是？</li>
    
    <li data-text="您父亲的生日是？" data-value="7">您父亲的生日是？</li>
    
    <li data-text="您配偶的生日是？ " data-value="8">您配偶的生日是？ </li>
    
    <li data-text="您初中班主任的名字是？" data-value="9">您初中班主任的名字是？</li>
    
    <li data-text="您小时候的绰号是什么？" data-value="10">您小时候的绰号是什么？</li>
    
    <li data-text="您小时候最好的朋友叫什么名字？" data-value="11">您小时候最好的朋友叫什么名字？</li>
    
    </ul>
    </body>
</html>