<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>卡密生成</title>
<link href="<?php echo W_BASE_URL;?>css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='<?php echo W_BASE_URL;?>js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo W_BASE_URL;?>js/My97DatePicker/WdatePicker.js"></script>
</head>
<body>

<div class="main-wrap">
	<div class="path"><p>当前位置：后台管理<span>&gt;</span>充值卡<span>&gt;</span>卡密生成</p></div>
    <div class="main-cont">
        <h3 class="title">卡密生成</h3>
        <div class="set-area">
        	<div class="form web-info-form">
            	<form action="<?= URL('mgr/payCard.save_cardAdd');?>" name="form1" method="post" id="this_form">
                	<div class="form-row">
                        <label class="form-field">名称：</label>
                        <div class="form-cont">
                            <input name="title" id="title" class="input-txt" type="text" style="width:200px;" />
                            <p class="form-tips">* 请填写名称，如：五一活动积分二维码</p>
                        </div>
                    </div>
                    
                  	<!--<div class="form-row">
                        <label class="form-field">类型：</label>
                        <div class="form-cont">
                          <select name="card_type" id="card_type">
                          	<option value="0" selected="selected">--请选择--</option>
                          	<?php /*$card_type = explode(',',$info['card_type']);//var_dump($info['card_type']);
								foreach($card_type as $val){
							?>
                            <option value="<?= $val;?>"><?= $val;?></option>
                            <?php }*/?>
							<option value="25">一路听天下</option>
                          </select>
                        </div>
                    </div>-->
                    
                    <div class="form-row">
                        <label class="form-field">所属类别：</label>
                        <div class="form-cont">
                            <select name="classid" id="classid">
                            <option value="0" onclick="$('#prefixSpan').html('');$('#prefix').val('');">--请选择--</option>
                            <?php $class = DS("mgr/book.getclasslist",'','3 and parentid = 12');
                            if(!empty($class)){
                                foreach($class as $val){
                            ?>
                            <option value="<?= $val['classid'];?>" onclick="$('#prefix').val('<?= $val['uunique'];?>');"><?= $val['classname'];?></option>
                            <?php }}?>
                            </select>
                    	</div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">卡前缀：</label>
                        <div class="form-cont">
                            <input type="text" name="prefix" id="prefix" value="" class="input-txt" style="width:120px;"/>
                    	</div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">面值：</label>
                        <div class="form-cont">
                          <select name="face_value" id="face_value">
                          	<option value="0">--请选择--</option>
                          	<?php $face_value = explode(',',$info['face_value']);
								foreach($face_value as $val){
							?>
                            <option value="<?= $val;?>"><?= $val;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">卡号类型：</label>
                        <div class="form-cont">
                            <label>递增数列 <input type="radio" name="kaStyle" value="1" checked="checked"/></label>
                            <label>随机数列 <input type="radio" name="kaStyle" value="0"/></label>
                            <p class="form-tips">* 规则数列：数字组成；随机数列：由字母数字组成。</p>
                        </div>
                    </div>
					
                    <div class="form-row">
                        <label class="form-field">卡密位数：</label>
                        <div class="form-cont">
                        	<label>简单 <input type="radio" name="isOldPsw" value="1" onclick="$('#places').hide();" checked="checked"/></label>
                            <label>自定义 <input type="radio" name="isOldPsw" value="0" onclick="$('#places').show();"/></label>
                            
                            <input name="places" id="places" class="input-txt" type="text" style="width:120px; display:none;" maxlength="2" onkeyup="value=value.replace(/[^\d]/g,'')" value="16" readonly="readonly" />
                            <p class="form-tips">* 简单卡密由6位随机数字字母组成；自定义请自觉填写整数，16-32</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">有效期限：</label>
                        <div class="form-cont">
                            <input name="startDate" id="startDate" class="input-txt" type="text" value="<?= date('Y-m-d H:i:00');?>" style="width:120px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:00'})"/>至 
                            <input name="endDate" id="endDate" class="input-txt" type="text" value="" style="width:120px;" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:00'})"/>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">生成数量：</label>
                        <div class="form-cont">
                            <input name="num" id="num" class="input-txt" type="text" style="width:120px;" maxlength="5" onkeyup="value=value.replace(/[^\d]/g,'')" />
                            <p class="form-tips">* 请自觉填写整数</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">是否生成二维码：</label>
                        <div class="form-cont">
                            <label>是 <input type="radio" name="isQRcode" value="1" onclick="$('#QRcode_http').show();"/></label>
                            <label>否 <input type="radio" name="isQRcode" value="0" checked="checked" onclick="$('#QRcode_http').hide();"/></label>
                            <select name="QRcode_http" id="QRcode_http" style="display:none;">
                          	<?php $QRcode_http = explode(',',$info['QRcode_http']);
								foreach($QRcode_http as $val){
							?>
                            <option value="<?= $val;?>"><?= $val;?></option>
                            <?php }?>
                          	</select>
                            <p class="form-tips">* 如选择该项 则生成一个链接带卡密的二维码图片 <br />
                            生成二维码图片较慢，建议每次生成数量不超过500条。</p>
                        </div>
                    </div>
                    
                    <div>
                    <h3 class="title">更多卡密设置</h3>
                    <div class="form-row">
                        <label class="form-field">是否加入字母：</label>
                        <div class="form-cont">
                            <label>是 <input type="radio" name="isLetter" value="1"/></label>
                            <label>否 <input type="radio" name="isLetter" value="0" checked="checked"/></label>
                            <p class="form-tips">* 如选择该项会提高唯一性</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">字母大写：</label>
                        <div class="form-cont">
                            <label>是 <input type="radio" name="isUpper" value="1"/></label>
                            <label>否 <input type="radio" name="isUpper" value="0" checked="checked"/></label>
                            <p class="form-tips">* 如选择该项字母全是大写</p>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <label class="form-field">是否MD5：</label>
                        <div class="form-cont">
                            <label>是 <input type="radio" name="isMD5" value="1"/></label>
                            <label>否 <input type="radio" name="isMD5" value="0" checked="checked"/></label>
                            <p class="form-tips">* 如选择该项 则卡密位数为32位数字字母组合</p>
                        </div>
                    </div>
                    </div>
                    
                    
					<div class="btn-area" style="margin-top:0px;">
                        <a href="javascript:;" onclick="check()" class="btn-general highlight" name="生成">
                        <span>生成</span></a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
    
    
</div>
<script>
	function check(){
		if($('#title').val() == ''){
			alert('请填写生成卡密的名称');
			return false;
		}
		
		/*if($('#card_type').val() == 0){
			alert('请选择类型');
			return false;
		}*/
		
		if($('#classid').val() == 0){
			alert('请选择所属卡类型');
			return false;
		}
		
		if($('#face_value').val() == 0){
			alert('请选择生成面值');
			return false;
		}
		if($('#places').val() == 0 || $('#places').val() == ''){
			alert('请填写卡密位数');
			return false;
		}else if($('#places').val() < 16 || $('#places').val() > 32){
			alert('卡密位数16-32位');
			return false;
		}
		if($('#startDate').val() == '' || $('#endDate').val() == ''){
			alert('请填写有效期限');
			return false;
		}
		if($('#num').val() == 0 || $('#num').val() == ''){
			alert('请填写生成数量');
			return false;
		}
		
		$('#this_form').submit();
	}
</script>
</body>
</html>
