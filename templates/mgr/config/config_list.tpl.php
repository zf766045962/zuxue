<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点设置</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/admin/admin_lib.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/ueditor/editor_config.js'></script>
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/ueditor/editor_ui_all.js'></script>
<link rel="stylesheet" type="text/css"  href="<?php echo W_BASE_URL;?>js/ueditor/themes/default/ueditor.css"/>
</head>
<body>
<div class="main-wrap">
<div class="path">
  <p>当前位置：系统设置<span>&gt;</span>接口设置</p>
</div>
<?php if($class=="edit"){?>

<form action="<?php echo URL('mgr/config.config_edit')?>" method="post" name="form1">
  <?php if($type=="sms_account"){?>
  <div class="main-cont">
    <h3 class="title">短信接口设置</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">短信接口账号</label>
          <div class="form-cont">
            <input name="info[sms_username]" type="text" class="input-txt" value="<?=$sms_username?>" />
            <span class="tips-error hidden" id="sms_username"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">短信接口密码</label>
          <div class="form-cont">
            <input name="info[sms_password]" type="text" class="input-txt" value="<?=$sms_password?>"/>
            <span class="tips-error hidden" id="sms_password"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">短信接口网关</label>
          <div class="form-cont">
            <input name="info[sms_gateway]" type="text" class="input-txt" value="<?=$sms_gateway?>"/>
            <span class="tips-error hidden" id="sms_password"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">短信注册模板</label>
          <div class="form-cont">
            <textarea name="info[sms_reg_template]" rows="5" class="input-txt" id="sms_reg_template" type="text" style="height:120px"><?=$sms_reg_template?>
</textarea>
            <span>$reg_code是用户验证码 切勿删除</span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">短信订单模板</label>
          <div class="form-cont">
            <textarea name="info[sms_order_template]" rows="5" class="input-txt" id="sms_order_template" type="text" style="height:120px"><?=$sms_order_template?>
</textarea>
            <span>$username用户名称</span> </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>

  <?php if($type=="pay_yeepay"){?>
  <div class="main-cont">
    <h3 class="title">易宝支付接口</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">收款易宝支付商户编号</label>
          <div class="form-cont">
            <input name="info[yeepay_key]" type="text" class="input-txt" id="yeepay_key" value="<?=$yeepay_key?>" />
          </div>
        </div>
        <div class="form-row">
          <label class="form-field">收款易宝支付商户密钥</label>
          <div class="form-cont">
            <input name="info[yeepay_value]" class="input-txt" value="<?=$yeepay_value?>" id="yeepay_value" />
            </span></div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <?php if($type=="pay_tenpay"){?>
  <div class="main-cont">
    <h3 class="title">财付通支付接口</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">收款财付通商户编号</label>
          <div class="form-cont">
            <input name="info[tenpay_key]" type="text" class="input-txt" id="tenpay_key" value="<?=$tenpay_key?>" />
            <span class="tips-error hidden" id="nameTip"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">收款财付通商户密钥</label>
          <div class="form-cont">
            <input name="info[tenpay_value]" class="input-txt" value="<?=$tenpay_value?>" id="tenpay_value" />
            </span></div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <?php if($type=="pay_alipay"){?>
  <div class="main-cont">
    <h3 class="title">支付宝支付接口</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">收款支付宝帐号</label>
          <div class="form-cont">
            <input name="info[alipay_key]" type="text" class="input-txt" id="alipay_key" value="<?=$alipay_key?>" />
            <span class="tips-error hidden" id="nameTip"></span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">交易安全校验码（key）</label>
          <div class="form-cont">
            <input name="info[alipay_value]" class="input-txt" value="<?=$alipay_value?>" id="alipay_value" />
            </span></div>
        </div>
        <div class="form-row">
          <label class="form-field">合作者身份（partnerID）</label>
          <div class="form-cont">
            <input name="info[alipay_partnerid]" class="input-txt" value="<?=$alipay_partnerid?>" />
            </span></div>
        </div>
        <div class="form-row">
          <label class="form-field">接口类型</label>
          <div class="form-cont">
            <select name="info[alipay_type]" id="alipay_type">
              <option value="create_partner_trade_by_buyer" <?php if (!(strcmp("create_partner_trade_by_buyer", "$alipay_type"))) {echo "selected=\"selected\"";} ?>>纯担保交易</option>
              <option value="trade_create_by_buyer" <?php if (!(strcmp("trade_create_by_buyer", "$alipay_type"))) {echo "selected=\"selected\"";} ?>>标准实物</option>
              <option value="create_direct_pay_by_user" <?php if (!(strcmp("create_direct_pay_by_user", "$alipay_type"))) {echo "selected=\"selected\"";} ?>>即时到账</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <label class="form-field">提交方式</label>
          <div class="form-cont">
            <select name="info[alipay_transport]">
              <option value="https" <?php if (!(strcmp("https", "$alipay_transport"))) {echo "selected=\"selected\"";} ?>>https</option>
              <option value="http" <?php if (!(strcmp("http", "$alipay_transport"))) {echo "selected=\"selected\"";} ?>>http</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <?php if($type=="email_setup"){?>
  <div class="main-cont">
    <h3 class="title">电子邮件设置</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">SMTP 服务器 </label>
          <div class="form-cont">
            <input name="info[email_server]" class="input-txt" type="text" value="<?=$email_server?>"/>
            </span> </div>
        </div>
        <div class="form-row">
          <label class="form-field">SMTP 端口</label>
          <div class="form-cont">
            <input name="info[email_port]" class="input-txt" value="<?=$email_port?>" />
            </span></div>
        </div>
        <div class="form-row">
          <label class="form-field">邮箱帐号</label>
          <div class="form-cont">
            <input name="info[email_username]" class="input-txt" value="<?=$email_username?>" />
            </span></div>
        </div>
        <div class="form-row">
          <label class="form-field">邮箱密码</label>
          <div class="form-cont">
            <input name="info[email_password]" class="input-txt" value="<?=$email_password?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>

  <div class="btn-area" style=" padding-left:20%"><a href="javascript:document.form1.submit()" id="submitBtn" class="btn-general highlight" name="保存修改"><span>提交</span></a></div>

</form>

<?php }?>

<?php if($class=="select"){?>

 <?php if($type=="sms_balance"){?>
  <div class="main-cont">
    <h3 class="title">短信余额查询</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">短信余额</label>
          <div class="form-cont">
            <input name="site_name" type="text" disabled="disabled" class="input-txt" value="<?=$sms_balance?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php }?>
 
<?php if($type=="sms_each_fee"){?>
  <div class="main-cont">
    <h3 class="title">短信单价查询</h3>
    <div class="set-area">
      <div class="form web-info-form">
        <div class="form-row">
          <label class="form-field">短信单价</label>
          <div class="form-cont">
            <input name="site_name" type="text" disabled="disabled" class="input-txt" value="<?=$sms_each_fee?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php }?>
 
<?php }?>


<script type="text/javascript">
var valid = new Validator({
	form: '#this_form',
	trigger: '#submitBtn'
});
</script>
</body>
</html>
